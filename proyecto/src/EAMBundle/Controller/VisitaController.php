<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use EAMBundle\Entity\Cita;
use EAMBundle\Entity\Empleado;
use EAMBundle\Entity\Bitacora;
use EAMBundle\Entity\Paciente;
use EAMBundle\Entity\Visita;

use EAMBundle\Form\VisitaType;

class VisitaController extends Controller
{
    public function NuevaAction()
    {
    	/*Validar si esta logeado*/
	      if ($this->getUser() === NULL )
	      {
	        return $this->redirect($this->generateUrl('login'));
	      }
        return $this->render('EAMBundle:Visita:Nueva.html.twig', array(
                // ...
            ));    
    }

}
