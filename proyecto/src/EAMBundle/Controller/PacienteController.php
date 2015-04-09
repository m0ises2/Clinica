<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use EAMBundle\Entity\Paciente;

use EAMBundle\Entity\NumerosTelefonicos;

use EAMBundle\Entity\Bitacora;

use EAMBundle\Entity\ContactoEmergencia;


use EAMBundle\Form\PacienteType;


class PacienteController extends Controller{

	public function NuevoAction(){

		$error ="";

		$paciente = new Paciente();

		$numero1 = new NumerosTelefonicos();

		$numero2 = new ContactoEmergencia();

		

		$paciente->getTelefonos()->add($numero1);

		$paciente->getEmergencias()->add($numero2);

		/*$numero2 = new NumerosTelefonicos();		
		$numero2->setCodigo('0242');
		$numero2->setNumero('3619032');
		$numero2->setTipo('Casa');

		$paciente->getTelefonos()->add($numero2);*/

		$form = $this ->createForm(new PacienteType(), $paciente);



		$request = $this->getRequest();

		if($request->getMethod() == "POST"){

			$form->handleRequest($request);

			if($form->isValid()){

				
				$repo =  $this->getDoctrine()->getRepository('EAMBundle:Paciente')->findByNumSeguroSocial($paciente->getNumSeguroSocial());

				if($repo){

					$error = "duplicado"

				}else{



					$tel = $paciente->getTelefonos();
					$paciente->setTelefonos($tel);

					$emer  = $paciente->getEmergencias();
					$paciente->setEmergencias($emer);				


					$em = $this->getDoctrine()->getManager();

					$em->persist($paciente);

					$em->flush();



					return new Response('<!DOCTYPE html>
					<html>
					<head>
						<title></title>
					</head>
					<body>
						<h1>guardando el paciente</h1>
					</body>
					</html>');

				}
			}
		
		}


		
		return $this->render('EAMBundle:Paciente:Nuevo.html.twig',array('form'=>$form->createView(), 'nombre' => $this->getUser()->getnombreUsuario(), 'error' => $error) ) ;
	}

	public function GuardarAction(){

		
	}
}


