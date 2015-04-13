<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use EAMBundle\Entity\Cita;
use EAMBundle\Entity\Empleado;
use EAMBundle\Entity\EmpleadoRole;
use EAMBundle\Entity\Bitacora;
use EAMBundle\Entity\Paciente;

use EAMBundle\Form\CitaType;

class CitaController extends Controller
{
     public function indexAction()
    {
      /*¿Iniciada la sesión?*/
      /*Validar si esta logeado*/
      /**************************************************************/
      if ($this->getUser() === NULL )
      {
        return $this->redirect($this->generateUrl('login'));
      }
      else //si esta logueado llevarlo a nueva cita
      {
        return $this->redirect($this->generateUrl('Nueva_cita'));

      }
      /**************************************************************/
    }  

    /* Crear una nueva Cita*/
    public function NuevaCitaAction()
    {
      /*¿Iniciada la sesión?*/
      /*Validar si esta logeado*/
      /**************************************************************/
      if ($this->getUser() === NULL )
      {
        return $this->redirect($this->generateUrl('login'));
      }
      /**************************************************************/
        $cita = new Cita();
        $paciente = new Paciente();
        $empleado = new Empleado();
        $form = $this->createForm(new CitaType(), $cita);     
        $request = $this->getRequest();
        $error = "";
        if ( $request->getMethod() == "POST")
        {
          
            $form->handleRequest($request); //Manejo la solicitud
            if($form->isValid()) //si el formulario es valido
            {
              $em = $this->getDoctrine()->getManager()->getRepository('EAMBundle:Paciente')->findByNumSeguroSocial($cita->getSegurosocial());
              if($em) //se busca al paciente en la base de datos
              {
                /*ahora validamos que el paciente no tenga una cita para el mismo dia u hora
                  se ven todas las citas del paciente, y luego comparamos*/
                $busqueda = $this->getDoctrine()->getManager()->getRepository('EAMBundle:Cita')->findBySegurosocial($cita->getSegurosocial());
                if ($busqueda) //si el paciente tiene citas
                {
                  //echo $cita->getSegurosocial();
                  //return new response("Consiguio las citas"); /*sirve para depurar*/
                  //la variable busqueda contiene objeto tipo consulta de cita
                  foreach ($busqueda as $key => $value) //para acceder al objeto cita
                  {                  
                    if ($value->getFecha() == $cita->getFecha())
                    {  
                      //return new response("son iguales");                    
                      //el paciente tiene una cita este dia (no se puede permitir)
                      $session = $request->getSession();
                      $this->addFlash(
                          'error',
                          'El paciente ya tiene una cita este dia'
                       );
                      $error='true';  
                    }
                  }
                  if (!$error) //en las tuplas no hay una cita con fecha igual para ese paciente
                  {
                    //Se agrega el paciente a la cita
                      foreach ($em as $key => $value) {
                        $paciente = $value;
                      }
                      $cita->setPaciente($paciente);
                      $_cita = $this->getDoctrine()->getManager();
                      $_cita->persist($cita);
                      $_cita->flush();
                      /*Entrada en la bitacora*/
                      $this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Agregada Cita: '. $paciente->getNombre().' '. $paciente->getApellido());
                      return $this->redirect($this->generateUrl('Home'));

                  }
                }
                else //EL paciente NO tiene ninguna cita
                {
                  //return new response("ACA");  
                  /*Se agrega el paciente a la cita*/
                     foreach ($em as $key => $value) {
                        $paciente = $value;
                      }
                      $cita->setPaciente($paciente);
                      $_cita = $this->getDoctrine()->getManager();
                      $_cita->persist($cita);
                      $_cita->flush();
                      /*Entrada en la bitacora*/
                      $this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Agregada Cita: '. $paciente->getNombre().' '. $paciente->getApellido());
                      return $this->redirect($this->generateUrl('Home'));
                }
              }
              else //No existe el paciente en la base de datos
              {
                //return new response("aca");  
                $session = $request->getSession();
                      $this->addFlash(
                          'error',
                          'El paciente no existe'
                       );
              }
            } 
            //return new response("NOVALIDO");
        }
        
        return $this->render('EAMBundle:Cita:nueva.html.twig', array('form' => $form->createView()));
    }

    /*Funciones para guardar la bitácora:*/
    /*
    * Esta función agrega una nueva entrada a la tabla bitácora.
    */
    private function addLog( $nombreUsuario, $user_id, $mensaje )
    {
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
