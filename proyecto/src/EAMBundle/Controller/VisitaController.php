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
	    $visita = new Visita();
	    $form = $this->createForm(new VisitaType(), $visita);
	    $request = $this->getRequest();
	    $error = "";
        $tipo = "Visita de Emergencia";
        if ( $request->getMethod() == "POST")
        {          
            $form->handleRequest($request); //Manejo la solicitud
            if($form->isValid()) //si el formulario es valido
            {
              $em = $this->getDoctrine()->getManager()->getRepository('EAMBundle:Paciente')->findByNumSeguroSocial($visita->getSegurosocial());
              if($em) //se busca al paciente en la base de datos
              {
                /*Vemos si el paciente tiene otras visitas*/
                $busqueda = $this->getDoctrine()->getManager()->getRepository('EAMBundle:Visita')->findBySegurosocial($visita->getSegurosocial());
                if ($busqueda) //el paciente tiene otras visitas
                {
	                //la variable busqueda contiene objeto tipo consulta de visita
	                foreach ($busqueda as $key => $value) //para acceder al objeto visita
	                {                  
	        	        if ($value->getFecha() == $visita->getFecha() && $value->getHora() == $visita->getHora() )
	                    {         
	                      //el paciente ya tiene una visita registrada ese dia a esa hora
	                      $session = $request->getSession();
	                      $this->addFlash(
	                          'error',
	                          'El paciente ya tiene una visita registrada con la misma fecha y hora'
	                       );
	                      $error='true';  
	                    }
	                }
	                if (!$error) //en las tuplas no hay visitas con fecha igual para ese paciente
	                {
	                    //Se agrega el paciente a la visita
	                      foreach ($em as $key => $value) {
	                        $paciente = $value;
	                      }
	                      $visita->setPaciente($paciente);
	                      $visita->setTipo($tipo);
	                      $_visita = $this->getDoctrine()->getManager();
	                      $_visita->persist($visita);
	                      $_visita->flush();
	                      $request->getSession()->getFlashBag()->add('Añadida', 'La visita ha sido añadida exitosamente.');
	                      /*Entrada en la bitacora*/
	                      $this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Agregada Visita de emergencia: '. $paciente->getNombre().' '. $paciente->getApellido());
	                      return $this->redirect($this->generateUrl('Visita_Mostrar'));
	                }
                }
                else //EL paciente NO tiene ninguna visita
                {
                     //Se agrega el paciente a la visita
                      foreach ($em as $key => $value) {
                        $paciente = $value;
                      }
                      $visita->setPaciente($paciente);
                      $visita->setTipo($tipo);
                      $_visita = $this->getDoctrine()->getManager();
                      $_visita->persist($visita);
                      $_visita->flush();
                      $request->getSession()->getFlashBag()->add('Añadida', 'La visita ha sido añadida exitosamente.');
                      /*Entrada en la bitacora*/
                      $this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Agregada Visita de emergencia: '. $paciente->getNombre().' '. $paciente->getApellido());
                      return $this->redirect($this->generateUrl('Visita_Mostrar'));
                }
              }
              else //No existe el paciente en la base de datos
              {
	                $session = $request->getSession();
	                      $this->addFlash(
	                          'error',
	                          'El paciente debe estar registrado'
	                       );
              }
            }
        } 
        return $this->render('EAMBundle:Visita:Nueva.html.twig', array('nombre' => $this->getUser()->getnombreUsuario(), 'form' => $form->createView() ));    
    }

    /* Muestra todas las visitas*/
    public function MostrarVisitasAction()
    {
      /*Validar si esta logeado*/
      /**************************************************************/
      if ( $this->getUser() === NULL ) 
      {
        return $this->redirect($this->generateUrl('login'));
      }
      /**************************************************************/
      
      $visitas = $this->getDoctrine()->getManager()->getRepository('EAMBundle:Visita')->findAll();
      
      return $this->render('EAMBundle:Visita:mostrarvisitas.html.twig',array('nombre' => $this->getUser()->getnombreUsuario(),'visitas'=>$visitas));
    }

    /*editar visita*/
    public function EditarVisitaAction($id)
    {
      /*Validar si esta logeado*/
      /**************************************************************/
      if ( $this->getUser() === NULL ) 
      {
        return $this->redirect($this->generateUrl('login'));
      }
      /**************************************************************/
        $em = $this->getDoctrine()->getManager();

        $visita = $em->getRepository('EAMBundle:Visita')->find($id);

        if (!$visita) {
            throw $this->createNotFoundException('No se encontro la visita.');
        }else
        {
	        $_visita_id = $visita->getId();
	        $form = $this->createForm(new VisitaType(), $visita);
        }
        return $this->render('EAMBundle:Visita:EditarVisita.html.twig', array('nombre' => $this->getUser()->getnombreUsuario(),'form' => $form->createView(),
          'visita'      => $visita,'id' => $_visita_id));
    }

    /*Esta funcion es la que valida el formulario y actualiza los datos de la cita*/
    public function ActualizarVisitaAction($id)
    {
      /**************************************************************/
      if ( $this->getUser() === NULL ) 
      {
        return $this->redirect($this->generateUrl('login'));
      }
      /**************************************************************/

      $request = $this->getRequest();
        if ($request->getMethod() == "POST") 
      	{
	        $em = $this->getDoctrine()->getManager();
	        $visita = $em->getRepository('EAMBundle:Visita')->find($id);
	        if ($visita) //existe la visita seleccionada
	        {     
	              $form = $this->createForm(new VisitaType(), $visita);
	              $form->handleRequest($request);
	              //seleccionaron cancelar
	              if ( $form->get('Cancelar')->isClicked() )
	              {
	                 return $this->redirect($this->generateUrl('Visita_Mostrar'));
	              }
	              if ($form->isValid()) 
	              {
	                  $em->persist($visita);
	                  $em->flush();
	                  /*Entrada en la bitacora*/
	                  $this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Editada Visita: '. $visita->getId());
	                  $request->getSession()->getFlashBag()->add('Actualizada', 'La visita ha sido actualizada.');
	                  return $this->redirect($this->generateUrl('Visita_Mostrar'));
	              }
	        } //no se encontro la visita 
	        else
	        {
	          throw $this->createNotFoundException('Visita no existe.');
	        }
      	}
      	return $this->redirect($this->generateUrl('Visita_Mostrar'));
    }

    /*Esta funcion elimina una visita*/
    public function EliminarVisitaAction($id)
    {
        /*Validar si esta logeado*/
        /**************************************************************/
        if ( $this->getUser() === NULL ) 
        {
          return $this->redirect($this->generateUrl('login'));
        }
        /**************************************************************/
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        $visita = $em->getRepository('EAMBundle:Visita')->find($id);

        if (!$visita) 
        {
          throw $this->createNotFoundException('No se encontro la visita');
        }
        else
        {
             $em->remove($visita);
             $em->flush();
             $this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Eliminada Visita: '.$id);
             $request->getSession()->getFlashBag()->add('Eliminada', 'La visita ha sido eliminada exitosamente.');
            return $this->redirect($this->generateUrl('Visita_Mostrar'));

        }
        $visitas = $this->getDoctrine()->getManager()->getRepository('EAMBundle:Visita')->findAll();
        return $this->render('EAMBundle:Visita:mostrarvisitas.html.twig',array('nombre' => $this->getUser()->getnombreUsuario(),'visitas'=>$visitas));

    }

    /*Funciones para guardar la bitácora:
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
