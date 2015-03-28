<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use EAMBundle\Entity\Empleado;
use EAMBundle\Entity\EmpleadoRole;
use EAMBundle\Entity\Role;
use EAMBundle\Entity\Bitacora;


use EAMBundle\Form\EmpleadoType;

class EmpleadoController extends Controller
{
    public function indexAction()
    {

        return $this->redirect($this->generaateUrl('login'));
    }

    /*
    * Esta acción permite crear un nuevo empleado. 
    */
    public function NuevoAction()
    {

      /*¿Iniciada la sesión?*/
      /*Validar si esta logeado*/
  		/**************************************************************/
  		if ( $this->getUser() === NULL ) 
  		{
  			return $this->redirect($this->generateUrl('login'));
  		}
		  /**************************************************************/
          $error = "";
      	  $user = new Empleado();
          $rol_ = new Role();
      	  $form = $this->createForm(new EmpleadoType(), $user);

          /*Este botoón es único en la vista de añadir nuevo, por lo tanto solo debe agregarse al formulario cuando se invica a NuevoAction()*/
          $form->add('Guardar_otro', 'submit', array('label' => 'Guardar y volver'));

      	  $request = $this->getRequest();

      	  if ( $request->getMethod() == "POST")
      	  {
      	  		$form->handleRequest($request);

              if ($form->get('Cancelar')->isClicked())
              {
                  return $this->redirect($this->generateUrl('Home'));
              }
      	  		/*Verificar validez del formulario*/
              if ( $form->isValid() )
      	  		{
                
      	  			/*verificamos que no exista en la base de datos.
                  La consulta se realiza basandose en el número de seguro social, que es único.
                */
                $em = $this->getDoctrine()->getRepository('EAMBundle:Empleado')->findBySeguroSocial( $user->getseguroSocial() );
               
                /*¿Existe el empleado?*/
                if( !$em ) //¿No existe? -> No. Procedo a agregarlo a la BD.
                {
                  /*Se busca en la tabla role el id del role que eligieron:*/
                  $repositorio = $this->getDoctrine()->getRepository('EAMBundle:Role');
                  $query = $repositorio->createQueryBuilder('r')
                                       ->Where('r.name = :name')
                                       ->setParameter('name', $user->getTipo())
                                       ->getQuery();

                  /*La variable ron contiene el objeto tipo array dentro del cual está el objeto tipo Role.*/
                  $rol = $query->getResult();

                  foreach ($rol as $key => $value) {
                    $rol_ = $value;
                  }
                  
                  if ($user->getTipo() == "Administrativo") {
                    $t_rol = "ROLE_ADMINISTRATIVO";
                  }
                  else
                  {
                    if ($user->getTipo() == "Medico") {
                      $t_rol = "ROLE_MEDICO";
                    }
                    else
                    {
                      $t_rol = "ROLE_ENFERMERA";
                    }
                  }

                  $em = $this->getDoctrine()->getManager();
                  /*Se agrega al nuevo empleado su rol correspondiente*/
                  $user->addRole($rol_); 
                  /*se prepara para almacenarse*/                
                  $em->persist($user);
                  /*Se envía la BD*/
                  $em->flush();

                  /*Entrada en la bitacora*/
                  $this->addLog( $this->getUser()->getId(), 'Agregado empleado: '. $user->getId() );

                  /*Detectamos que botón fue clickeado:*/
                  if ( $form->get('Guardar')->isClicked() )
                  {                  
                    return $this->redirect($this->generateUrl('Nuevo_empleado'));
                  }
                  else
                  {
                      return $this->redirect($this->generateUrl('Home'));
                  }

                  /*Redireccionamos a Home path:*/
                  return $this->redirect($this->generateUrl('Home'));

                }else
                {
                  $error = "user_registered";
                }
      	  			
      	  		}
      	  }

      	  return $this->render('EAMBundle:Empleado:nuevo.html.twig', array('form' => $form->createView() , 'nombre' => $this->getUser()->getnombreUsuario(), 'error' => $error));
    }

   /*
    * Esta función se encarga de recopilar todos los empleados en la BD y de invocar a la vista "show" (mostrar) para listarlos.
    */

    public function MostrarAction()
    {
      /*¿Iniciada la sesión?*/
      /*Validar si esta logeado*/
      /**************************************************************/
      if ( $this->getUser() === NULL ) 
      {
        return $this->redirect($this->generateUrl('login'));
      }
      /**************************************************************/

      $em = $this->getDoctrine()->getManager();
      $entities = $em->getRepository('EAMBundle:Empleado')->findAll();

      return $this->render('EAMBundle:Empleado:show.html.twig', array('entidades' => $entities, 'nombre' => $this->getUser()->getnombreUsuario()));
    }

   /*
    * Esta función se encarga de mostrar mas detalles de la información referente a un empleado.
    */
    public function VerAction()
    {
      /*¿Iniciada la sesión?*/
      /*Validar si esta logeado*/
      /**************************************************************/
      if ( $this->getUser() === NULL ) 
      {
        return $this->redirect($this->generateUrl('login'));
      }
      /**************************************************************/
      
      $request = $this->getRequest();
      /*De esta manera obtengo los datos tipo hidden en un formulario que no está asociado a una entidad*/
      $_user_id = $request->get('id');

  
      if ( $_user_id == NULL )
      {
          return $this->redirect($this->generateUrl('Ver_empleados'));
      }

      /*Consulto en la BD al empleado, para posteriormente mostrar sus datos personales:*/
      $em = $this->getDoctrine()->getManager();
      $_user = $em->getRepository('EAMBundle:Empleado')->find($_user_id);

      /*
      * Condicional para saber si el boton editar fue pulsado.
      */
      if ( $request->request->has('editar') )
      {
        $_user_id = base64_encode($request->get('id'));
        return $this->redirect($this->generateUrl('Editar', array('id' => $_user_id)));
      }

      /*formulario de acciones de la tabla*/
      $form = $this->formularioAcciones();

      /*Si el empleado existe, se procede a mostrarse en la vista sino, se arroja un error 404 "empleado no existe".*/
      if ( !$_user )
      {
        throw $this->createNotFoundException('Empleado no existe.'); 
      }  

      return $this->render('EAMBundle:Empleado:User_details.html.twig', array('nombre' => $this->getUser()->getnombreUsuario(), 'entidad' => $_user, 'form' => $form->createView()));     
    }

   /*
    * Esta función realiza la detección de que botón en la vista de detalles de usuario, fue pulsado. ¿Regresar, Editar o Borrar?.
    */
    public function ElegirAction()
    {

        /*¿Iniciada la sesión?*/
        /*Validar si esta logeado*/
        /**************************************************************/
        if ( $this->getUser() === NULL ) 
        {
          return $this->redirect($this->generateUrl('login'));
        }
        /**************************************************************/

        $form = $this->formularioAcciones();
        $request = $this->getRequest();        

        if ( $request->getMethod() == "POST" )
        {
            $form->handleRequest($request);

            /*Extraigo los datos del formulario, para posteriormente obtener el id del empleado que se esta manejando.*/
            $data = $form->getData();
            $_user_id = $data['id'];

            /*¿Que botón fue clickeado?*/
            if ( $form->get('Regresar')->isClicked() )
            {
              return $this->redirect($this->generateUrl('Ver_empleados'));
            }

            if ( $form->get('Editar')->isClicked() )
            {
              return $this->redirect($this->generateUrl('Editar', array('id' => base64_encode($_user_id))));
            }

            if ( $form->get('Borrar')->isClicked() )
            {
              /*Se procede con las validaciones de existencia del usuario:*/
              $query = $this->getDoctrine()->getManager();
              $em = $query->getRepository('EAMBundle:Empleado')->find($_user_id);

              if ( $em )
              {
                $query->remove($em);
                $query->flush();
                /* Se crea el flashmessage para que en la vista se aprecie el cambio. */
                $request->getSession()->getFlashBag()->add('Eliminado', 'El empleado ha sido eliminado con exito.');

                /*Entrada en la bitacora*/
                $this->addLog( $this->getUser()->getId(), 'Eliminado empleado: '. $_user_id);

                return $this->redirect($this->generateUrl('Ver_empleados'));
              }
              else
              { 
                throw $this->createNotFoundException('Empleado no existe.');
              }
            }            
        }
        else
        {
          return $this->redirect($this->generateUrl('Home'));
        }
    }

    /*
        Esta función es la encargada de crear el formulario que renderiza los tres botones de acción en la vista de detalles del empleado.
    */
    private function formularioAcciones()
    {
        $form = $this->createFormBuilder()
             ->add('id','hidden')
             ->add('Regresar', 'submit')
             ->add('Borrar', 'submit')
             ->add('Editar', 'submit')
             ->getForm();

        return $form;
    }

   /*
    * Esta funcion se encarga de renderizar el formulario para la edición de un empleado.
    */
    public function EditarAction($id)
    {
      /*¿Iniciada la sesión?*/
      /*Validar si esta logeado*/
      /**************************************************************/
      if ( $this->getUser() === NULL ) 
      {
        return $this->redirect($this->generateUrl('login'));
      }
      /**************************************************************/

       /* Se genera el formulario para la edición del empleado: */
      $em = $this->getDoctrine()->getManager();
      $query = $em->getRepository('EAMBundle:Empleado')->find(base64_decode($id));

      if ( $query )
      {
          $form = $this->createForm(new EmpleadoType(), $query);

          /*Encriptar el id es necesario por cuestiones de seguridad, por lo tanto:*/
          $_id_tmp = base64_encode($query->getId());
          
          return $this->render('EAMBundle:Empleado:Edit.html.twig', array('form' => $form->createView(),'id' => $_id_tmp, 'entidad' => $query, 'nombre' => $this->getUser()->getnombreUsuario()));               
      }
      else
      {
        throw $this->createNotFoundException('Empleado no existe.');
      }

      return $this->redirect($this->generateUrl('Ver_empleados'));
    }

   /*
    * Esta duncion se encarga de modificar los registros de empleados en la base de datos, con la finalidad de agregar los cambios realizados en la información de un empleado.
    */
    public function ActualizarAction($id)
    {
      /*¿Iniciada la sesión?*/
      /*Validar si esta logeado*/
      /**************************************************************/
      if ( $this->getUser() === NULL ) 
      {
        return $this->redirect($this->generateUrl('login'));
      }
      /**************************************************************/
      
      $request = $this->getRequest();

      if ( $request->getMethod() == "POST" )
      {
          $em = $this->getDoctrine()->getManager();
          $query = $em->getRepository('EAMBundle:Empleado')->find(base64_decode($id));

          if ( $query )
          {
              $form = $this->createForm(new EmpleadoType(), $query);
              $form->handleRequest($request);
                      
              /*¿Pulsaron el botón de cancelar?*/
              if ( $form->get('Cancelar')->isClicked() )
              {
                 return $this->redirect($this->generateUrl('Ver_empleados'));
              }

              /*Si el formulario que cargaron es valido, entoces se procede con la actulización de la entrada en la BD:*/
              if ( $form->isValid() )
              { 
                $user_tipo_tmp = $form->getData()->getTipo();                
                $user_roles_tmp = $form->getData()->getRoles();

                foreach ($user_roles_tmp as $key => $value) {
                  $tmp = $value->getName();
                  $rol_prev = $value;
                }

                /*¿Tiene asignado un role diferente al previo de la actualización?*/
                if ( $user_tipo_tmp != $tmp )
                {
                  $rol_ = new Role();
                  /*Se busca en la tabla role el id del role que eligieron:*/
                  $repositorio = $this->getDoctrine()->getRepository('EAMBundle:Role');
                  $query_ = $repositorio->createQueryBuilder('r')
                                       ->Where('r.name = :name')
                                       ->setParameter('name', $query->getTipo())
                                       ->getQuery();
                                           
                  /*La variable ron contiene el objeto tipo array dentro del cual está el objeto tipo Role.*/
                  $rol = $query_->getResult();

                  foreach ($rol as $key => $value)
                  {
                    $rol_ = $value;
                  }

                  /*Eliminamos el rol anterior*/
                  $query->removeRole($rol_prev);

                  /*Creo un nuevo rol, el cual será el asignado en la actualización*/
                  $query->addRole($rol_);

                }

                $em->flush();

                /*Entrada en la bitacora*/
                $this->addLog( $this->getUser()->getId(), 'Modificación de empleado: '. base64_decode($id));

                 /* Se crea el flashmessage para que en la vista se aprecie el cambio. */
                $request->getSession()->getFlashBag()->add('Actualizado', 'El empleado ha sido actualizado con exito.');
                
                return $this->redirect($this->generateUrl('Ver_empleados'));
              }
          }
          else
          {
            throw $this->createNotFoundException('Empleado no existe.');
          }
      }
      return $this->render('EAMBundle:Empleado:Edit.html.twig', array('form' => $form->createView(), 'entidad' => $query, 'nombre' => $this->getUser()->getnombreUsuario()));
    }

    /*Funciones para guardar la bitácora:*/
   /*
    * Esta función agrega una nueva entrada a la tabla bitácora.
    */
    private function addLog( $user_id, $mensaje )
    {
        /* Se obtiene la hora del evento:*/
        
        $time = new \DateTime();
        

        /*Se crea el objeto bitacora para almacenarlo posteriormente*/
        $log = new Bitacora();
        $log->setIdEmpleado( $user_id )
            ->setFecha( $time )
            ->setMensaje( $mensaje );

        $em = $this->getDoctrine()->getManager();
        $em->persist($log);
        $em->flush();

        return $this;

    }

    private function getLog()
    {

    }

    /*Fin de funciones para guardar la bitácora*/

}
