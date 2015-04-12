<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use EAMBundle\Entity\Cita;
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
        $form = $this->createForm(new CitaType(), $cita);     
        $request = $this->getRequest();

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
                      //el paciente tiene una cita este dia (no se puede permitir)
                      $session = $request->getSession();
                      $this->addFlash(
                          'error',
                          'El paciente ya tiene una cita este dia'
                       );
                    }
                    else //la fecha de la cita es diferente a las citas del paciente
                    {
                      
                      /*return new response("NO son iguales"); sirve para depurar*/
                      //Se agrega el paciente a la cita
                      foreach ($em as $key => $value) {
                        $paciente = $value;
                      }
                      $cita->setPaciente($paciente);
                      $_cita = $this->getDoctrine()->getManager();
                      $_cita->persist($cita);
                      $_cita->flush();
                      return $this->redirect($this->generateUrl('Home'));
                    }
                  }
                }
                else //EL paciente NO tiene ninguna cita
                {
                  /*Se agrega el paciente a la cita*/
                     foreach ($em as $key => $value) {
                        $paciente = $value;
                      }
                      $cita->setPaciente($paciente);
                      $_cita = $this->getDoctrine()->getManager();
                      $_cita->persist($cita);
                      $_cita->flush();
                }
              }
              else //No existe el paciente en la base de datos
              {
                $session = $request->getSession();
                      $this->addFlash(
                          'paciente',
                          'El paciente no existe'
                       );
              }
            } 
        }
        return $this->render('EAMBundle:Cita:nueva.html.twig', array('form' => $form->createView()));
    }
}
