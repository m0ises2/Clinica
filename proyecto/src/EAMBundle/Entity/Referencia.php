<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referencia
 *
 * @ORM\Table(name="referencia")
 * @ORM\Entity
 */
class Referencia
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre_doc", type="string", length=35, nullable=false)
     */
    private $nombreDoc;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=250, nullable=false)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_medico", type="integer", nullable=false)
     */
    private $idMedico;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="HistoriaClinica", inversedBy="referencias")
     * @ORM\JoinColumn(name="id_historia_clinica", referencedColumnName="id", onDelete="CASCADE")
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
     * Set nombreDoc
     *
     * @param string $nombreDoc
     * @return Referencia
     */
    public function setNombreDoc($nombreDoc)
    {
        $this->nombreDoc = $nombreDoc;

        return $this;
    }

    /**
     * Get nombreDoc
     *
     * @return string 
     */
    public function getNombreDoc()
    {
        return $this->nombreDoc;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Referencia
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Referencia
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
     * Set idMedico
     *
     * @param integer $idMedico
     * @return Referencia
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
     * @return Referencia
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

    public function addHistoriaClinica(HistoriaClinica $historia){
        if(!$this->referencias->contains($historia)){
            $this->referencias->add($historia);
        }
    }
}
