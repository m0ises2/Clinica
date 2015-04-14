<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AyudaController extends Controller
{
    public function MostrarAction()
    {
        return $this->render('EAMBundle:Ayuda:Ayuda.html.twig');
    }

}
