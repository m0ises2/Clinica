<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use EAMBundle\Entity\Empleado;
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
                
      	  			/*verificamos que no exista en la base de datos*/
                $em = $this->getDoctrine()->getRepository('EAMBundle:Empleado')->findBySeguroSocial( $user->getseguroSocial() );

                if( !$em )
                {
                 
                  /*agregamos a la base de datos*/
                  $em = $this->getDoctrine()->getManager();
                  $em->persist($user);
                  $em->flush();

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
