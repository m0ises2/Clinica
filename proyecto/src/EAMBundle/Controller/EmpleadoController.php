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

                  /*Redireccionamos a Home path:*/
                  return $this->redirect($this->generateUrl('Home'));

                }else
                {
                  $error = "Empleado ya registrado.";
                }
      	  			
      	  		}
      	  		else
      	  		{

      	  		}
      	  }

      	  return $this->render('EAMBundle:Empleado:nuevo.html.twig', array('form' => $form->createView() , 'nombre' => $this->getUser()->getnombreUsuario(), 'error' => $error));
    }

}
