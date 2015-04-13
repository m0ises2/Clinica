<?php


namespace EAMBundle\Entity;
use Doctrine\ORM\EntityRepository;

class PacienteRepository extends EntityRepository{

	

	public function findMedicos(){

		return "1";
	}
}