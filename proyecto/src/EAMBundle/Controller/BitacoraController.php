<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class BitacoraController extends Controller
{

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

		$em = $this->getDoctrine()->getManager()->getRepository("EAMBundle:Bitacora");
		$registros = $em->findAll();

		return $this->render('EAMBundle:Bitacora:show.html.twig', array('registros' => $registros, 'nombre' => $this->getUser()->getnombreUsuario()));

	}

}
