<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use EAMBundle\Entity\Cita;
use EAMBundle\Entity\Bitacora;
use EAMBundle\Entity\Paciente;
use EAMBundle\Form\EmpleadoType;

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

      }
      /**************************************************************/
    }  

    public function NuevaCitaAction()
    {
        

    }
}
