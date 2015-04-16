<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AyudaController extends Controller
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
      
      return $this->render('EAMBundle:Ayuda:Ayuda.html.twig');
    }

}
