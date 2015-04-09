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
       // $form;


        $request = $this->getRequest();

        if ( $request->getMethod() == "POST")
        {
            $form->handleRequest($request); //Manejo la solicitud
            if($form->isValid()) //si el formulario es valido
            {
              $em = $this->getDoctrine()->getRepository('EAMBundle:Paciente')->findByNombre();
              

            } 
        }
        return $this->render('EAMBundle:Cita:nueva.html.twig', array('form' => $form->createView()));
    }
}
