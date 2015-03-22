<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use EAMBundle\Entity\Empleado;
use EAMBundle\Entity\EmpleadoRole;
use EAMBundle\Entity\Role;

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
      	  $form = $this->createForm(new EmpleadoType(), $user);

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
                $role = NULL;
                $role_id = NULL;
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
                     $id = $value->getId();
                     $_user_id = $user->getId();
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

                  /*Creamos la entrada en la BD que representa la relación entre un empleado y un rol*/
                  $_tmp_empleadoRole = new EmpleadoRole();
                  $_tmp_empleadoRole->setRole($rol_);
                  $_tmp_empleadoRole->setEmpleado($user);

                  $em = $this->getDoctrine()->getManager();
                  $em->persist($_tmp_empleadoRole);
                  $em->flush();

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

      $form = $this->formularioAcciones();

      /*Si el empleado existe, se procede a mostrarse en la vista sino, se arroja un error 404 "empleado no existe".*/
      if ( !$_user )
      {
        throw $this->createNotFoundException('Empleado no existe.'); 
      }  

      return $this->render('EAMBundle:Empleado:User_details.html.twig', array('nombre' => $this->getUser()->getnombreUsuario(), 'entidad' => $_user, 'form' => $form->createView()));     
    }

    /*

    Esta función realiza la detección de que botón en la vista de detalles de usuario, fue pulsado. ¿Regresar, Editar o Borrar?

    */
    public function ElegirAction()
    {
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
              return $this->redirect($this->generateUrl('Ver_empleados'));
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

}
