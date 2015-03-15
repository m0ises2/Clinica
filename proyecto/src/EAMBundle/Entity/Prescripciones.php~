<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prescripciones
 *
 * @ORM\Table(name="prescripciones")
 * @ORM\Entity
 */
class Prescripciones
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=20, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="instrucciones", type="string", length=250, nullable=false)
     */
    private $instrucciones;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechas", type="date", nullable=false)
     */
    private $fechas;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_medico", type="integer", nullable=false)
     */
    private $idMedico;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_historia_clinica", type="integer", nullable=false)
     */
    private $idHistoriaClinica;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Prescripciones
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set instrucciones
     *
     * @param string $instrucciones
     * @return Prescripciones
     */
    public function setInstrucciones($instrucciones)
    {
        $this->instrucciones = $instrucciones;

        return $this;
    }

    /**
     * Get instrucciones
     *
     * @return string 
     */
    public function getInstrucciones()
    {
        return $this->instrucciones;
    }

    /**
     * Set fechas
     *
     * @param \DateTime $fechas
     * @return Prescripciones
     */
    public function setFechas($fechas)
    {
        $this->fechas = $fechas;

        return $this;
    }

    /**
     * Get fechas
     *
     * @return \DateTime 
     */
    public function getFechas()
    {
        return $this->fechas;
    }

    /**
     * Set idMedico
     *
     * @param integer $idMedico
     * @return Prescripciones
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
     * Set idHistoriaClinica
     *
     * @param integer $idHistoriaClinica
     * @return Prescripciones
     */
    public function setIdHistoriaClinica($idHistoriaClinica)
    {
        $this->idHistoriaClinica = $idHistoriaClinica;

        return $this;
    }

    /**
     * Get idHistoriaClinica
     *
     * @return integer 
     */
    public function getIdHistoriaClinica()
    {
        return $this->idHistoriaClinica;
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
