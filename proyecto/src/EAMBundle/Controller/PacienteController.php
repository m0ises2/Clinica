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

		if ( $this->getUser() === NULL ){
  			return $this->redirect($this->generateUrl('login'));
  		}

		$error ="";

		$paciente = new Paciente();

		$numero1 = new NumerosTelefonicos();

		$numero2 = new ContactoEmergencia();

		

		$paciente->getTelefonos()->add($numero1);

		$paciente->getEmergencias()->add($numero2);

		$medico =	$this->getDoctrine()->getRepository('EAMBundle:Empleado')->findByTipo('Medico');

		$form = $this ->createForm(new PacienteType(), $paciente);



		$request = $this->getRequest();

		if($request->getMethod() == "POST"){

			$form->handleRequest($request);



			if($form->isValid()){

				
				$repo =  $this->getDoctrine()->getRepository('EAMBundle:Paciente')->findByNumSeguroSocial($paciente->getNumSeguroSocial());

				if($repo){

					$error = "duplicado";

				}else{



					$tel = $paciente->getTelefonos();
					$paciente->setTelefonos($tel);

					$emer  = $paciente->getEmergencias();
					$paciente->setEmergencias($emer);				


					$em = $this->getDoctrine()->getManager();

					$em->persist($paciente);

					$em->flush();

					$error = "guardado";

					$this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Agregado Paciente: '. $paciente->getNombre().' '. $paciente->getApellido() );



					return $this->render('EAMBundle:Paciente:verPaciente.html.twig', array('paciente' => $paciente,'nombre' => $this->getUser()->getnombreUsuario()));


				}
			}
		
		}


		
		return $this->render('EAMBundle:Paciente:Nuevo.html.twig',array('form'=>$form->createView(), 'nombre' => $this->getUser()->getnombreUsuario(), 'error' => $error,'medico' =>$medico) ) ;
	}


	public function VerAction($id){

		$repo = $this->getDoctrine()->getManager();
		$paciente = $repo->getRepository('EAMBundle:Paciente')->find($id);

		return $this->render('EAMBundle:Paciente:ver_paciente.html.twig', array( 'paciente' => $paciente,'nombre' => $this->getUser()->getnombreUsuario()));

	}

	public function BuscarAction(){

		if ( $this->getUser() === NULL ){
        	return $this->redirect($this->generateUrl('login'));
      	}

		$repo = $this->getDoctrine()->getManager();
		$pacientes = $repo->getRepository('EAMBundle:Paciente')->findAll();

		return $this->render('EAMBundle:Paciente:buscarPaciente.html.twig', array('pacientes' => $pacientes, 'error' => '', 'nombre' => $this->getUser()->getnombreUsuario()));
	}

	public function EditarAction($id){
		if ( $this->getUser() === NULL ){
        	return $this->redirect($this->generateUrl('login'));
      	}

      	$repo = $this->getDoctrine()->getManager();

      	$paciente = $repo->getRepository('EAMBundle:Paciente')->find($id);
      	if($paciente){

	      	$form = $this->createForm(new PacienteType(), $paciente);

	      	return $this->render('EAMBundle:Paciente:editar.html.twig', array('form' => $form->createView(),'paciente' => $paciente, 'nombre' => $this->getUser()->getnombreUsuario(), 'error' => "error"));
      	}else{
      		throw $this->createNotFoundException('Paciente no existe.');
      	}
	}

	public function ActualizarAction($id){

		if ( $this->getUser() === NULL ){
			return $this->redirect($this->generateUrl('login'));
		}

		$request = $this->getRequest();

		if($request->getMethod() == "POST"){
			$repo = $this->getDoctrine()->getManager();
          	$paciente = $repo->getRepository('EAMBundle:Paciente')->find($id);

          	if($paciente){
          		$form = $this->createForm(new PacienteType(), $paciente);

              	$form->handleRequest($request);

              	if($form->get('Cancelar')->isClicked()){
              		return $this->redirect($this->generateUrl('Buscar_Pacientes'));
              	}


              	if ( $form->isValid() ){

              		$tel = $paciente->getTelefonos();
					$paciente->setTelefonos($tel);

					$emer  = $paciente->getEmergencias();
					$paciente->setEmergencias($emer);
					
              		$this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Editado Paciente: '. $paciente->getNombre().' '. $paciente->getApellido() );
              		$repo->flush();              	
              	}



              	//return $this->redirect($this->generateUrl('Buscar_Pacientes'));

              	$repo = $this->getDoctrine()->getManager();
				$pacientes = $repo->getRepository('EAMBundle:Paciente')->findAll();

              	return $this->render('EAMBundle:Paciente:buscarPaciente.html.twig', array('pacientes'=>$pacientes, 'error' => 'actualizado', 'nombre' => $this->getUser()->getnombreUsuario()));


          	}
		}

		return $this->render('EAMBundle:Paciente:buscarPaciente.html.twig', array('pacientes' => $pacientes, 'nombre' => $this->getUser()->getnombreUsuario()));
	}


	public function EliminarAction($id){

		if ( $this->getUser() === NULL ){
			return $this->redirect($this->generateUrl('login'));
		}

		$repo = $this->getDoctrine()->getManager();
		$paciente = $repo->getRepository('EAMBundle:Paciente')->find($id);

		if($paciente){

			$this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Eliminado Paciente: '. $paciente->getNombre().' '. $paciente->getApellido() );

			$repo->remove($paciente);
            $repo->flush();

			$repo = $this->getDoctrine()->getManager();
			$pacientes = $repo->getRepository('EAMBundle:Paciente')->findAll();

            return $this->render('EAMBundle:Paciente:buscarPaciente.html.twig', array('pacientes'=>$pacientes, 'error' => 'eliminado', 'nombre' => $this->getUser()->getnombreUsuario()));

		}else{

			 throw $this->createNotFoundException('Paciente no existe.');
		}


		$repo = $this->getDoctrine()->getManager();
		$pacientes = $repo->getRepository('EAMBundle:Paciente')->findAll();

        return $this->render('EAMBundle:Paciente:buscarPaciente.html.twig', array('pacientes'=>$pacientes, 'nombre' => $this->getUser()->getnombreUsuario()));
	}



	private function addLog( $nombreUsuario, $user_id, $mensaje ){
        /* Se obtiene la hora del evento:*/
        
        $time = new \DateTime();
        /*Se establece la zona horaria correctamente.*/
        $zone = $this->container->getParameter('time_zone');
        $time->setTimezone( new \DateTimeZone($zone));
        

        /*Se crea el objeto bitacora para almacenarlo posteriormente*/
        $log = new Bitacora();
        $log->setIdEmpleado( $user_id )
            ->setEmpleado($nombreUsuario)
            ->setFecha( $time )
            ->setMensaje( $mensaje );

        $em = $this->getDoctrine()->getManager();
        $em->persist($log);
        $em->flush();

        return $this;

    }

	

	
}


