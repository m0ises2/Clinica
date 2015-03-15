<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use EAMBundle\Entity\Empleado;
use Symfony\Component\HttpFoundation\Request;
use EAMBundle\Form\EmpleadoType;

class InicioController extends Controller
{
	/*
	Renderiza la vista de inicio de sesión.
	*/
	function indexAction()
	{
		$empleado = new Empleado();
		$form = $this->createForm(new EmpleadoType(), $empleado);
		$e = FALSE;
		$request = $this->getRequest();

		if ($request->getMethod() == 'POST')
		{

			$form->handleRequest($request);

			if ( $form->isValid() )
			{
				/*Validación del usuario suministrado contra usuario en la Base de Datos:*/
				$em = $this->getDoctrine()->getRepository("EAMBundle:Empleado");
				$em = $em->findBy( array('nombreUsuario' => $empleado->getUserName(), 'contrasenha' => $empleado->getPassword()) );

				/*¿Hay match?*/
				if( $em )
				{
					return $this->redirect($this->generateUrl('Home'));
				}else
				{
					/*Mensaje flash que indique error en inicio de sesión.*/
            		$request->getSession()->getFlashBag()->add('Error','Error de Autenticación');
            		return $this->render('EAMBundle:Inicio:login.html.twig', array( 'form' => $form->createView(), 'error' => $e ));			
				}				
			}else
			{
				/*Manera en que se le avisa a la vista que hay errores. HORRIBLE COMO SE VEN, PERO EQUIS jajaja*/
				$e = TRUE;
			}
						
		}

		return $this->render('EAMBundle:Inicio:login.html.twig', array( 'form' => $form->createView(), 'error' => $e ));
	}

	function loginAction( Request $request )
	{
		$authenticationUtils = $this->get('security.authentication_utils');

		/*Validar si esta logeado*/
		/**************************************************************/
		if ( $this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') ) 
		{
			$usr = $this->getUser();
			return $this->render('::baseClinica.html.twig', array('nombre' => $usr->getNombre()));
		}
		/**************************************************************/

	    // get the login error if there is one
	    $error = $authenticationUtils->getLastAuthenticationError();

	    return $this->render('EAMBundle:Inicio:login.html.twig',
	        array('error'         => $error,
	        )
	    );
	}

	function loginCheckAction()
	{
		return $this->redirect($this->generateUrl('login'));
	}

	function iniciarAction()
	{
		/*Validar si esta logeado*/
		/**************************************************************/
		if ( $this->getUser() === NULL ) 
		{
			return $this->redirect($this->generateUrl('login'));
		}
		/**************************************************************/

		return $this->render('::baseClinica.html.twig',array('nombre' => $this->getUser()->getUsername()));
	}
}
