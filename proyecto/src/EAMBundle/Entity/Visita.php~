<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Visita
 *
 * @ORM\Table(name="visita")
 * @ORM\Entity
 */
class Visita
{
    /**
     * @var integer
     * 
     * @ORM\Column(name="segurosocial", type="integer", nullable=false)
     * @Assert\NotBlank(message="Debe escribir el Numero de Seguro Social")
     */
    private $segurosocial;
    
    /**
     * @var \Date
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     * @Assert\NotBlank(message="Debe escribir la fecha de la cita")
     * @Assert\Date()
     */
    private $fecha;

    /**
     * @var \string
     *
     * @ORM\Column(name="hora", type="string", length=15, nullable=false)
     * @Assert\NotBlank(message="Debe escribir la hora de la visita")
     * 
     */
    private $hora;

    /**
     * @ORM\ManyToOne(targetEntity="Paciente", inversedBy="visitas")
     */
    private $paciente;

    /**
     * @var string
     *
     * @ORM\Column(name="medico", type="string",length=80,nullable=false )
     * @Assert\NotBlank(message="Debe escribir el doctor que atendio la visita")
     */
    private $medico;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string",length=80)
     */
    private $tipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function  __toString(){
        return (string) $this->segurosocial;
    }


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

    /**
     * Set medico
     *
     * @param string $medico
     * @return Visita
     */
    public function setMedico($medico)
    {
        $this->medico = $medico;
    
        return $this;
    }

    /**
     * Get medico
     *
     * @return string 
     */
    public function getMedico()
    {
        return $this->medico;
    }

    /**
     * Set segurosocial
     *
     * @param integer $segurosocial
     * @return Visita
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

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Visita
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}
