<?php

namespace EAMBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Cita
 *
 * @ORM\Table(name="cita")
 * @ORM\Entity
 */
class Cita
{
    /**
     * @var integer
     *
     * @ORM\Column(name="segurosocial", type="integer", nullable=false)
     */
    private $segurosocial;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     * @Assert\Date()
     */
    private $fecha;

    /**
     * @var \Time
     *
     * @ORM\Column(name="hora", type="time", nullable=false)
     * @Assert\Time()
     */
    private $hora;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="string", length=250, nullable=false)
     * @Assert\NotBlank(message="Debe escribir el motivo de la cita")
     */
    private $motivo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Paciente", inversedBy="citas")
     * @ORM\JoinColumn(name="paciente_id", referencedColumnName="id")
     */
    private $paciente;


     /**
     * @ORM\OneToOne(targetEntity="Visita")
     * @ORM\JoinColumn(name="id_visita", referencedColumnName="id")
     */
    private $visita;


    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Cita
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
     * @return Cita
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
     * Set motivo
     *
     * @param string $motivo
     * @return Cita
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;

        return $this;
    }

    /**
     * Get motivo
     *
     * @return string 
     */
    public function getMotivo()
    {
        return $this->motivo;
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
     * Set visita
     *
     * @param \EAMBundle\Entity\Visita $visita
     * @return Cita
     */
    public function setVisita(\EAMBundle\Entity\Visita $visita = null)
    {
        $this->visita = $visita;
    
        return $this;
    }

    /**
     * Get visita
     *
     * @return \EAMBundle\Entity\Visita 
     */
    public function getVisita()
    {
        return $this->visita;
    }


    /**
     * Set paciente
     *
     * @param \EAMBundle\Entity\Paciente $paciente
     * @return Cita
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

    /**
     * Set segurosocial
     *
     * @param integer $segurosocial
     * @return Cita
     */
    public function setSegurosocial($segurosocial)
    {
        $this->segurosocial = $segurosocial;
    
        return $this;
    }

    /**
     * Get segurosocial
     *
     * @return integer 
     */
    public function getSegurosocial()
    {
        return $this->segurosocial;
    }
}
