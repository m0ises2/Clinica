<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visita
 *
 * @ORM\Table(name="visita")
 * @ORM\Entity
 */
class Visita
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time", nullable=false)
     */
    private $hora;

    /**
     * @ORM\ManyToOne(targetEntity="Paciente", inversedBy="visitas")
     * @ORM\JoinColumn(name="id_paciente", referencedColumnName="id")
     */
    private $paciente;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_medico", type="integer", nullable=false)
     */
    private $idMedico;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Visita
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     * @return Visita
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime 
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set idMedico
     *
     * @param integer $idMedico
     * @return Visita
     */
    public function setIdMedico($idMedico)
    {
        $this->idMedico = $idMedico;

        return $this;
    }

    /**
     * Get idMedico
     *
     * @return integer 
     */
    public function getIdMedico()
    {
        return $this->idMedico;
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

    /**
     * Set paciente
     *
     * @param \EAMBundle\Entity\Paciente $paciente
     * @return Visita
     */
    public function setPaciente(\EAMBundle\Entity\Paciente $paciente = null)
    {
        $this->paciente = $paciente;
    
        return $this;
    }

    /**
     * Get paciente
     *
     * @return \EAMBundle\Entity\Paciente 
     */
    public function getPaciente()
    {
        return $this->paciente;
    }
}
