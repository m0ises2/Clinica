<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use EAMBundle\Entity\Paciente;

use EAMBundle\Entity\NumerosTelefonicos;

use EAMBundle\Entity\Bitacora;

use EAMBundle\Entity\ContactoEmergencia;

use EAMBundle\Entity\HistoriaClinica;

use EAMBundle\Entity\Diagnostico;

use EAMBundle\Entity\Prescripciones;

use EAMBundle\Entity\Referencia;


use EAMBundle\Form\HistoriaClinicaType;


class HistoriaClinicaController extends Controller{

	public function NuevoAction($id){

		if ( $this->getUser() === NULL ){
            return $this->redirect($this->generateUrl('login'));
        }

        $error ="";

        $HC = new HistoriaClinica();

        $diagnostico = new Diagnostico();
        $prescripciones = new Prescripciones();

        $referencia =  new Referencia();


        $HC->getDiagnosticos()->add($diagnostico);
        $HC->getPrescripciones()->add($prescripciones);
        $HC->getReferencias()->add($referencia);

        $form = $this ->createForm(new HistoriaClinicaType(), $HC);

        $request = $this->getRequest();

        if($request->getMethod() == "POST"){
            
        	$form->handleRequest($request);

        	if($form->isValid()){

        		$HC->setIdPaciente($id);

                $dia = $HC->getDiagnosticos();


                foreach ($dia as $di) {
                    $di->setIdMedico($request->get('id_medico'));
                }

                $HC->setDiagnosticos($dia);


                $pre = $HC->getPrescripciones();


                foreach ($pre as $pe) {
                    $pe->setIdMedico($request->get('id_medico'));

                }

                $HC->setPrescripciones($pre);

                $ref = $HC->getReferencias();


                foreach ($ref as $re) {
                    $re->setIdMedico($request->get('id_medico'));

                }

                $HC->setReferencias($ref);


        		$em = $this->getDoctrine()->getManager();

				$em->persist($HC);

				$em->flush();

				$paciente = $em->getRepository('EAMBundle:Paciente')->find($id);

				$this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Agregada Nueva Historia CLinica al paciente: '. $paciente->getNombre().' '. $paciente->getApellido() );

				$error = "actualizado";

        	}
        }

        $repo = $this->getDoctrine()->getManager();
        $pacientes = $repo->getRepository('EAMBundle:Paciente')->findAll();


		return $this->render('EAMBundle:HCInicial:buscarHC.html.twig', array('pacientes' => $pacientes,'form' => $form->createView() , 'nombre' => $this->getUser()->getnombreUsuario(), 'error' => $error)); 
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