<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use EAMBundle\Entity\Empleado;
use Symfony\Component\HttpFoundation\Request;
use EAMBundle\Form\EmpleadoType;
use EAMBundle\Entity\Bitacora;

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
		
		/*Acá se deben obtener las cantidades que serán mostradas en el home:*/
		if ( $this->getUser()->getTipo() == "Administrador")
		{
			/*Cantidad de empleados*/
			$em = $this->getDoctrine()->getManager();
			$query = $em->createQuery(
					'select count(e) from EAMBundle:Empleado e'
				);
			$cantidad_empleados = $query->getSingleScalarResult() - 1;

			/*Cantidad de medicos*/
			$em = $this->getDoctrine()->getManager();
			$query = $em->createQueryBuilder();
			$query->select('count(e)');
			$query->from('EAMBundle:Empleado', 'e');
			$query->where('e.tipo = :tipo');
			$query->setParameter('tipo',"Medico");

			$cantidad_medicos = $query->getQuery()->getSingleScalarResult();

			/*Cantidad de enfermeras*/
			$em = $this->getDoctrine()->getManager();
			$query = $em->createQueryBuilder();
			$query->select('count(e)');
			$query->from('EAMBundle:Empleado', 'e');
			$query->where('e.tipo = :tipo');
			$query->setParameter('tipo',"Enfermera");

			$cantidad_enfemeras = $query->getQuery()->getSingleScalarResult();
			
			/*Cantidad de administrativos*/
			$em = $this->getDoctrine()->getManager();
			$query = $em->createQueryBuilder();
			$query->select('count(e)');
			$query->from('EAMBundle:Empleado', 'e');
			$query->where('e.tipo = :tipo');
			$query->setParameter('tipo',"Administrativo");

			$cantidad_administrativos = $query->getQuery()->getSingleScalarResult();

			return $this->render('::baseClinica.html.twig',array('nombre' => $this->getUser()->getUsername(),'cantidad_empleados' => $cantidad_empleados,
							 'cantidad_medicos' => $cantidad_medicos, 'cantidad_enfermeras' => $cantidad_enfemeras, 'cantidad_administrativos' => $cantidad_administrativos));
			
		}

		return $this->render('::baseClinica.html.twig',array('nombre' => $this->getUser()->getUsername()));
	}
}