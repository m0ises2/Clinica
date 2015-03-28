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
		return NULL;
	}

	function loginAction( Request $request )
	{
		$authenticationUtils = $this->get('security.authentication_utils');

		/*Validar si esta logeado*/
		/**************************************************************/
		if ( $this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY') ) 
		{
			$usr = $this->getUser();
			return $this->redirect($this->generateUrl('Home'));
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
