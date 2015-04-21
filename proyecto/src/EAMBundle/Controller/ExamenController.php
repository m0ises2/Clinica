<?php

namespace EAMBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use EAMBundle\Entity\Bitacora;
use EAMBundle\Entity\HistoriaClinica;

use EAMBundle\Form\ExamenType;

class ExamenController extends Controller
{
    public function NuevoAction()
    {
        return $this->render('EAMBundle:Examen:Nuevo.html.twig', array(
                // ...
            ));    }

    public function EditarAction()
    {
        return $this->render('EAMBundle:Examen:Editar.html.twig', array(
                // ...
            ));    }

    public function EliminarAction()
    {
        return $this->render('EAMBundle:Examen:Eliminar.html.twig', array(
                // ...
            ));    }

}
