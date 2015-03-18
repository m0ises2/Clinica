<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class EmpleadoController extends Controller
{
    public function indexAction()
    {
        return $this->render('EAMBundle:Empleado:index.html.twig', array(
                // ...
            ));    }

    public function NuevoAction()
    {
        return new response('Nuevo usuario');
    }

}
