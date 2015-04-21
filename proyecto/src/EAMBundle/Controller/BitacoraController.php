<?php

namespace EAMBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class BitacoraController extends Controller
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

		$em = $this->getDoctrine()->getManager()->getRepository("EAMBundle:Bitacora");
		$registros = $em->findAll();

		return $this->render('EAMBundle:Bitacora:show.html.twig', array('registros' => $registros, 'nombre' => $this->getUser()->getnombreUsuario()));

	}

	public function DonutAction()
	{
		/*Validar si esta logeado*/
		/**************************************************************/
		if ( $this->getUser() === NULL ) 
		{
			return $this->redirect($this->generateUrl('login'));
		}
		/**************************************************************/

		/*Acá se deben obtener las cantidades que serán mostradas en el home:*/
		if ( $this->getUser()->getTipo() == "Administrador")
		{
			/*Cantidad de empleados*/
			$em = $this->getDoctrine()->getManager();
			$query = $em->createQuery(
					'select count(e) from EAMBundle:Empleado e'
				);
			$cantidad_empleados = $query->getSingleScalarResult() - 1;

			/*Cantidad de medicos*/
			$em = $this->getDoctrine()->getManager();
			$query = $em->createQueryBuilder();
			$query->select('count(e)');
			$query->from('EAMBundle:Empleado', 'e');
			$query->where('e.tipo = :tipo');
			$query->setParameter('tipo',"Medico");

			$cantidad_medicos = $query->getQuery()->getSingleScalarResult();

			/*Cantidad de enfermeras*/
			$em = $this->getDoctrine()->getManager();
			$query = $em->createQueryBuilder();
			$query->select('count(e)');
			$query->from('EAMBundle:Empleado', 'e');
			$query->where('e.tipo = :tipo');
			$query->setParameter('tipo',"Enfermera");

			$cantidad_enfemeras = $query->getQuery()->getSingleScalarResult();
			
			/*Cantidad de administrativos*/
			$em = $this->getDoctrine()->getManager();
			$query = $em->createQueryBuilder();
			$query->select('count(e)');
			$query->from('EAMBundle:Empleado', 'e');
			$query->where('e.tipo = :tipo');
			$query->setParameter('tipo',"Administrativo");

			$cantidad_administrativos = $query->getQuery()->getSingleScalarResult();

			return $this->render('EAMBundle:DonutChart:DonutReport.html.twig',array('nombre' => $this->getUser()->getUsername(),'cantidad_empleados' => $cantidad_empleados,
							 'cantidad_medicos' => $cantidad_medicos, 'cantidad_enfermeras' => $cantidad_enfemeras, 'cantidad_administrativos' => $cantidad_administrativos));
			
		}

		return $this->redirect(generateUrl('Home'));
	}

}
