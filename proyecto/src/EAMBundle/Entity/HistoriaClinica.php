<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoriaClinica
 *
 * @ORM\Table(name="historia_clinica")
 * @ORM\Entity
 */
class HistoriaClinica
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_visita", type="date", nullable=false)
     */
    private $fechaVisita;

    /**
     * @var integer
     *
     * @ORM\Column(name="altura", type="integer", nullable=false)
     */
    private $altura;

    /**
     * @var float
     *
     * @ORM\Column(name="peso", type="float", precision=10, scale=0, nullable=false)
     */
    private $peso;

    /**
     * @var string
     *
     * @ORM\Column(name="presion_arterial", type="string", length=8, nullable=false)
     */
    private $presionArterial;

    /**
     * @var integer
     *
     * @ORM\Column(name="frecuencia_card", type="integer", nullable=false)
     */
    private $frecuenciaCard;

    /**
     * @var integer
     *
     * @ORM\Column(name="temperatura", type="integer", nullable=false)
     */
    private $temperatura;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_paciente", type="integer", nullable=false)
     */
    private $idPaciente;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set fechaVisita
     *
     * @param \DateTime $fechaVisita
     * @return HistoriaClinica
     */
    public function setFechaVisita($fechaVisita)
    {
        $this->fechaVisita = $fechaVisita;

        return $this;
    }

    /**
     * Get fechaVisita
     *
     * @return \DateTime 
     */
    public function getFechaVisita()
    {
        return $this->fechaVisita;
    }

    /**
     * Set altura
     *
     * @param integer $altura
     * @return HistoriaClinica
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }

    /**
     * Get altura
     *
     * @return integer 
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Set peso
     *
     * @param float $peso
     * @return HistoriaClinica
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get peso
     *
     * @return float 
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set presionArterial
     *
     * @param string $presionArterial
     * @return HistoriaClinica
     */
    public function setPresionArterial($presionArterial)
    {
        $this->presionArterial = $presionArterial;

        return $this;
    }

    /**
     * Get presionArterial
     *
     * @return string 
     */
    public function getPresionArterial()
    {
        return $this->presionArterial;
    }

    /**
     * Set frecuenciaCard
     *
     * @param integer $frecuenciaCard
     * @return HistoriaClinica
     */
    public function setFrecuenciaCard($frecuenciaCard)
    {
        $this->frecuenciaCard = $frecuenciaCard;

        return $this;
    }

    /**
     * Get frecuenciaCard
     *
     * @return integer 
     */
    public function getFrecuenciaCard()
    {
        return $this->frecuenciaCard;
    }

    /**
     * Set temperatura
     *
     * @param integer $temperatura
     * @return HistoriaClinica
     */
    public function setTemperatura($temperatura)
    {
        $this->temperatura = $temperatura;

        return $this;
    }

    /**
     * Get temperatura
     *
     * @return integer 
     */
    public function getTemperatura()
    {
        return $this->temperatura;
    }

    /**
     * Set idPaciente
     *
     * @param integer $idPaciente
     * @return HistoriaClinica
     */
    public function setIdPaciente($idPaciente)
    {
        $this->idPaciente = $idPaciente;

        return $this;
    }

    /**
     * Get idPaciente
     *
     * @return integer 
     */
    public function getIdPaciente()
    {
        return $this->idPaciente;
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
