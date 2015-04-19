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

use EAMBundle\Form\CitaType;
use EAMBundle\Form\VisitaType;

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
      /*Validar si esta logeado*/
      if ($this->getUser() === NULL )
      {
        return $this->redirect($this->generateUrl('login'));
      }
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
                /*ahora validamos que el paciente no tenga una cita para el mismo dia, se ven todas las citas del paciente, y luego comparamos*/
                $busqueda = $this->getDoctrine()->getManager()->getRepository('EAMBundle:Cita')->findBySegurosocial($cita->getSegurosocial());
                if ($busqueda) //si el paciente tiene citas
                {
                  //la variable busqueda contiene objeto tipo consulta de cita
                  foreach ($busqueda as $key => $value) //para acceder al objeto cita
                  {                  
                    if ($value->getFecha() == $cita->getFecha() && $value->getHora() == $cita->getHora() )
                    {         
                      //el paciente tiene una cita este dia (no se puede permitir)
                      $session = $request->getSession();
                      $this->addFlash(
                          'error',
                          'El paciente ya tiene una cita este dia y en esta hora'
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
                      $request->getSession()->getFlashBag()->add('Añadida', 'La cita ha sido añadida exitosamente.');
                      /*Entrada en la bitacora*/
                      $this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Agregada Cita: '. $paciente->getNombre().' '. $paciente->getApellido());
                      return $this->redirect($this->generateUrl('Mostrar_citas'));
                  }
                }
                else //EL paciente NO tiene ninguna cita
                {
                     foreach ($em as $key => $value) {
                        $paciente = $value;
                      }
                      $cita->setPaciente($paciente);
                      $_cita = $this->getDoctrine()->getManager();
                      $_cita->persist($cita);
                      $_cita->flush();
                      $request->getSession()->getFlashBag()->add('Añadida', 'La cita ha sido añadida exitosamente.');
                      /*Entrada en la bitacora*/
                      $this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Agregada Cita: '. $paciente->getNombre().' '. $paciente->getApellido());
                      return $this->redirect($this->generateUrl('Mostrar_citas'));
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
        return $this->render('EAMBundle:Cita:nueva.html.twig', array('nombre' => $this->getUser()->getnombreUsuario(),'form' => $form->createView()));
    }

    /* Muestra todas las Citas*/
    public function MostrarCitasAction()
    {
      /*Validar si esta logeado*/
      /**************************************************************/
      if ( $this->getUser() === NULL ) 
      {
        return $this->redirect($this->generateUrl('login'));
      }
      /**************************************************************/
      
      $citas = $this->getDoctrine()->getManager()->getRepository('EAMBundle:Cita')->findAll();
      
      return $this->render('EAMBundle:Cita:mostrarcita.html.twig',array('nombre' => $this->getUser()->getnombreUsuario(),'citas'=>$citas));
    }

    /*Esta funcion es para saber en la tabla de mostrar citas si desean eliminar o editar la cita*/
    public function EliminarCitaAction($id)
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
        $cita = $em->getRepository('EAMBundle:Cita')->find($id);

        if (!$cita) 
        {
          throw $this->createNotFoundException('No se encontro la cita');
        }
        else
        {
             $em->remove($cita);
             $em->flush();
             $this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Eliminada Cita: '.$id);
             $request->getSession()->getFlashBag()->add('Eliminada', 'La cita ha sido eliminada exitosamente.');
            return $this->redirect($this->generateUrl('Mostrar_citas'));

        }
        $citas = $this->getDoctrine()->getManager()->getRepository('EAMBundle:Cita')->findAll();
        return $this->render('EAMBundle:Cita:mostrarcita.html.twig',array('nombre' => $this->getUser()->getnombreUsuario(),'citas'=>$citas));

    }
    /*editar cita*/
    public function EditarCitaAction($id)
    {
      /*Validar si esta logeado*/
      /**************************************************************/
      if ( $this->getUser() === NULL ) 
      {
        return $this->redirect($this->generateUrl('login'));
      }
      /**************************************************************/
        $em = $this->getDoctrine()->getManager();

        $cita = $em->getRepository('EAMBundle:Cita')->find($id);

        if (!$cita) {
            throw $this->createNotFoundException('No se encontro la cita.');
        }
        $_cita_id = $cita->getId();
        $form = $this->createForm(new CitaType(), $cita);
        return $this->render('EAMBundle:Cita:EditarCita.html.twig', array('nombre' => $this->getUser()->getnombreUsuario(),'form' => $form->createView(),
          'cita'      => $cita,'id' => $_cita_id));
    }

    /*Esta funcion es la que valida el formulario y actualiza los datos de la cita*/
    public function ActualizarCitaAction($id)
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
        $cita = $em->getRepository('EAMBundle:Cita')->find($id);
        if ($cita) //existe la cita seleccionada
        {     
              $form = $this->createForm(new CitaType(), $cita);
              $form->handleRequest($request);
              //seleccionaron cancelar
              if ( $form->get('Cancelar')->isClicked() )
              {
                 return $this->redirect($this->generateUrl('Mostrar_citas'));
              }
              if ($form->isValid()) 
              {
                  $em->persist($cita);
                  $em->flush();
                  /*Entrada en la bitacora*/
                  $this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Editada Cita: '. $cita->getId());
                  $request->getSession()->getFlashBag()->add('Actualizada', 'La cita ha sido actualizada.');
                  return $this->redirect($this->generateUrl('Mostrar_citas'));
              }
        } //no se encontro la cita 
        else
        {
          throw $this->createNotFoundException('Cita no existe.');
        }
        
      }
    }
    /*esta funcion agrega una nueva visita que tenga una cita anteriormente*/
    public function VisitaAction($id)
    {
      /*Validar si esta logeado*/
        /**************************************************************/
        if ( $this->getUser() === NULL ) 
        {
          return $this->redirect($this->generateUrl('login'));
        }
        /**************************************************************/
        $visita = new Visita();
        $visita_ = new Visita();
        $cita = new Cita();
        $paciente = new Paciente();
        $empleado = new Empleado();
        $em = $this->getDoctrine()->getManager();
        $cita = $em->getRepository('EAMBundle:Cita')->find($id);
        $error = "";
        if (!$cita) {
            throw $this->createNotFoundException('No se encontro la cita.');
        }
        $_cita_id = $cita->getId();
        $form = $this->createForm(new VisitaType(), $visita);
        $request = $this->getRequest();
        $visita_ =$cita->getVisita();
        if ($visita_) 
        {
          $request->getSession()->getFlashBag()->add('citaV', 'Esta cita ya tiene una visita registrada.');
          return $this->redirect($this->generateUrl('Mostrar_citas'));
        }
        if ($request->getMethod() == "POST") 
        {
              $form->handleRequest($request);
              $repo = $this->getDoctrine()->getManager()->getRepository('EAMBundle:Paciente')->findByNumSeguroSocial($cita->getSegurosocial());
              foreach ($repo as $key => $value) {
                $paciente = $value;
              }
              $visita->setPaciente($paciente);
              $visita->setFecha($cita->getFecha());
              $visita->setHora($cita->getHora());
              $cita->setVisita($visita);
              $_visita = $this->getDoctrine()->getManager();
              $_visita->persist($visita);
              $_visita->flush();
              $request->getSession()->getFlashBag()->add('AñadidaV', 'La visita ha sido añadida exitosamente.');
              /*Entrada en la bitacora*/
              $this->addLog( $this->getUser()->getnombreUsuario(), $this->getUser()->getId(), 'Agregada Visita: '. $paciente->getNombre().' '. $paciente->getApellido());
              return $this->redirect($this->generateUrl('Mostrar_citas'));
        }
        return $this->render('EAMBundle:Cita:nuevacitavisita.html.twig', array('nombre' => $this->getUser()->getnombreUsuario(),'id' => $_cita_id,'cita'=> $cita,'form' => $form->createView()));
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
