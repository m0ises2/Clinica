<?php

namespace EAMBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



use EAMBundle\Entity\HCInicial;
use EAMBundle\Entity\HistoriaClinica;
use EAMBundle\Form\HCInicialType;

use EAMBundle\Form\HistoriaClinicaType;

use Symfony\Component\HttpFoundation\Response;

use EAMBundle\Entity\Paciente;

use EAMBundle\Entity\NumerosTelefonicos;


use EAMBundle\Entity\Bitacora;

use EAMBundle\Entity\Alergias;
use EAMBundle\Entity\MedicamentosUsados;

use EAMBundle\Entity\ContactoEmergencia;


use EAMBundle\Form\PacienteType;
use EAMBundle\Form\PacienteHType;

/**
 * HCInicial controller.
 *
 */
class HCInicialController extends Controller
{

    public function NuevaAction(){

        

        if ( $this->getUser() === NULL ){
            return $this->redirect($this->generateUrl('login'));
        }

        $error ="";

        $paciente = new Paciente();

        $numero1 = new NumerosTelefonicos();

        $numero2 = new ContactoEmergencia();

        $historiaC = new HCInicial();

        $alergia = new Alergias();

        $medicamentosUsuados =  new MedicamentosUsados();

        $historiaC->getMedicamentosUsados()->add($medicamentosUsuados);

        $historiaC->getAlergias()->add($alergia);

        

        $paciente->getTelefonos()->add($numero1);

        $paciente->getEmergencias()->add($numero2);

        $paciente->setHistoriaClinica($historiaC);

        

        $medico =   $this->getDoctrine()->getRepository('EAMBundle:Empleado')->findByTipo('Medico');

        $form = $this ->createForm(new PacienteHType(), $paciente);



        $request = $this->getRequest();

        if($request->getMethod() == "POST"){

            $form->handleRequest($request);



            if($form->isValid()){

                
                $repo =  $this->getDoctrine()->getRepository('EAMBundle:Paciente')->findByNumSeguroSocial($paciente->getNumSeguroSocial());

                if($repo){

                    $error = "duplicado";

                    $request->getSession()->getFlashBag()->add('Duplicado', 'Ya existe un paciente asociado a ese numero de seguro social.');

                    return $this->redirect($this->generateUrl('Nueva_Historia'));

                }else{



                    $tel = $paciente->getTelefonos();
                    $paciente->setTelefonos($tel);

                    $emer  = $paciente->getEmergencias();
                    $paciente->setEmergencias($emer);  



                    $his = $paciente->getHistoriaClinica();
                    $his2 = $his->getAlergias();
                    $his2 = $his->setAlergias($his2);
                    $paciente->setHistoriaClinica($his);

                    $his = $paciente->getHistoriaClinica();
                    $his2 = $his->getMedicamentosUsados();
                    $his2 = $his->setMedicamentosUsados($his2);
                    $paciente->setHistoriaClinica($his);                    




                    $em = $this->getDoctrine()->getManager();

                    $em->persist($paciente);

                    $em->flush();

                    $error = "guardado";

                    $this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Agregado Paciente: '. $paciente->getNombre().' '. $paciente->getApellido() );
                    $this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Agregado Historia Medica: N°'. $paciente->getHistoriaClinica()->getId());                    

                    $paciente = new Paciente();
                    $form = $this ->createForm(new PacienteHType(), $paciente);

                    //return $this->render('EAMBundle:HCInicial:nuevo.html.twig', array('form'=>$form->createView(),'error'=>$error,'nombre' => $this->getUser()->getnombreUsuario()));
                    return $this->redirect($this->generateUrl('Buscar_Historia'));
                    
                }
            }
        
        }


        
        return $this->render('EAMBundle:HCInicial:nuevo.html.twig',array('form'=>$form->createView(), 'nombre' => $this->getUser()->getnombreUsuario(), 'error' => $error,'medico' =>$medico) ) ;

    }

    public function BuscarAction(){

        $error = "";

        if ( $this->getUser() === NULL ){
            return $this->redirect($this->generateUrl('login'));
        }

        $repo = $this->getDoctrine()->getManager();
        $pacientes = $repo->getRepository('EAMBundle:Paciente')->findAll();

        return $this->render('EAMBundle:HCInicial:buscarHC.html.twig',array('pacientes'=>$pacientes,'nombre' => $this->getUser()->getnombreUsuario(), 'error' => $error) ) ;
    }

    public function VerAction($id){
        
        if ( $this->getUser() === NULL ){
            return $this->redirect($this->generateUrl('login'));
        }

        $repo = $this->getDoctrine()->getManager();
        $HCI = $repo->getRepository('EAMBundle:HCInicial')->findOneByIdPaciente($id);

        if(!$HCI){
            $HCI = null;
        }


        $repo = $this->getDoctrine()->getManager();
        $paciente = $repo->getRepository('EAMBundle:Paciente')->find($id);        

        $HC = new HistoriaClinica();
        $form = $this ->createForm(new HistoriaClinicaType(), $HC);

        

        $Historial = $repo->getRepository('EAMBundle:HistoriaClinica')->findByIdPaciente($id);


        return $this->render('EAMBundle:HCInicial:ver_historia.html.twig', array('historial'=>$Historial,'id_medico' => $this->getUser()->getId(),'error' => '','form' => $form->createView(),'paciente' => $paciente, 'HCI' => $HCI,'nombre' => $this->getUser()->getnombreUsuario()));



    }

    public function EditarAction($id){

        if ( $this->getUser() === NULL ){
            return $this->redirect($this->generateUrl('login'));
        }

        $repo = $this->getDoctrine()->getManager();
        $HCI = $repo->getRepository('EAMBundle:HCInicial')->findOneByIdPaciente($id);

        $repo = $this->getDoctrine()->getManager();
        $paciente = $repo->getRepository('EAMBundle:Paciente')->find($id);

        $form = $this ->createForm(new PacienteHType(), $paciente);

        return $this->render('EAMBundle:HCInicial:editar.html.twig', array('error'=>'','form' => $form->createView(),'paciente' => $paciente, 'HCI' => $HCI,'nombre' => $this->getUser()->getnombreUsuario()));
    }

    public function ActualizarAction($id){

        if ( $this->getUser() === NULL ){
            return $this->redirect($this->generateUrl('login'));
        }

        $request = $this->getRequest();

        if ( $request->getMethod() == "POST" ){

            $repo = $this->getDoctrine()->getManager();
            $paciente = $repo->getRepository('EAMBundle:Paciente')->find($id);

            if($paciente ){

                $form = $this->createForm(new PacienteHType(), $paciente);
                $form->handleRequest($request);

                if ( $form->isValid() ){
                    

                    $tel = $paciente->getTelefonos();
                    $paciente->setTelefonos($tel);

                    $emer  = $paciente->getEmergencias();
                    $paciente->setEmergencias($emer);

                    $em = $this->getDoctrine()->getManager();


                    $his = $paciente->getHistoriaClinica();
                    $his2 = $his->getAlergias();
                    $his2 = $his->setAlergias($his2);
                    $paciente->setHistoriaClinica($his);

                    $his = $paciente->getHistoriaClinica();
                    $his2 = $his->getMedicamentosUsados();
                    $his2 = $his->setMedicamentosUsados($his2);
                    $paciente->setHistoriaClinica($his);

                    $em->persist($paciente);

                    $em->flush();

                    $this->addLog( $this->getUser()->getnombreUsuario() ,$this->getUser()->getId(), 'Editado Historia Clinica del paciente '. $paciente->getNombre().' '. $paciente->getApellido() );

                    $error = "actualizado";


                    $request->getSession()->getFlashBag()->add('Actualizado', 'El empleado ha sido actualizado con éxito.');

                    return $this->redirect($this->generateUrl('Buscar_Historia'));

                    /*
                    $repo = $this->getDoctrine()->getManager();
                    $pacientes = $repo->getRepository('EAMBundle:Paciente')->findAll();
                    return $this->render('EAMBundle:HCInicial:buscarHC.html.twig', array('pacientes'=>$pacientes,'error'=>$error,'nombre' => $this->getUser()->getnombreUsuario()));
                    */
                }

            }else{
                throw $this->createNotFoundException('Empleado no existe.');
            }

        }

        $repo = $this->getDoctrine()->getManager();
        $pacientes = $repo->getRepository('EAMBundle:Paciente')->findAll();
        return $this->render('EAMBundle:HCInicial:buscarHC.html.twig', array('nombre' => $this->getUser()->getnombreUsuario()));
        
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
