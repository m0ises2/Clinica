<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genera
 *
 * @ORM\Table(name="genera")
 * @ORM\Entity
 */
class Genera
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_cita", type="integer", nullable=false)
     */
    private $idCita;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_visita", type="integer", nullable=false)
     */
    private $idVisita;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set idCita
     *
     * @param integer $idCita
     * @return Genera
     */
    public function setIdCita($idCita)
    {
        $this->idCita = $idCita;

        return $this;
    }

    /**
     * Get idCita
     *
     * @return integer 
     */
    public function getIdCita()
    {
        return $this->idCita;
    }

    /**
     * Set idVisita
     *
     * @param integer $idVisita
     * @return Genera
     */
    public function setIdVisita($idVisita)
    {
        $this->idVisita = $idVisita;

        return $this;
    }

    /**
     * Get idVisita
     *
     * @return integer 
     */
    public function getIdVisita()
    {
        return $this->idVisita;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
