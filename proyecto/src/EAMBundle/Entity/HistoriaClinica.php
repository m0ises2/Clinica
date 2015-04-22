<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\OneToMany(targetEntity="Examen", mappedBy="historiaclinica",cascade={"persist","remove"})
     */
    private $examenes;

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
    *@ORM\oneToMany(targetEntity="Diagnostico", mappedBy="idHistoriaClinica", cascade={"persist","remove"})
    */
    private $diagnosticos;

    /**
    *@ORM\oneToMany(targetEntity="Prescripciones", mappedBy="idHistoriaClinica", cascade={"persist","remove"})
    */
    private $prescripciones;   

    /**
    *@ORM\oneToMany(targetEntity="Referencia", mappedBy="idHistoriaClinica", cascade={"persist","remove"})
    */
    private $referencias; 



    public function  __toString(){
        return (string) $this->id;
    }

    public function __construct(){
        $this->examenes = new ArrayCollection();
        $this->diagnosticos = new ArrayCollection();
        $this->prescripciones = new ArrayCollection();
        $this->referencias = new ArrayCollection();
    }


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

    /**
     * Add examenes
     *
     * @param \EAMBundle\Entity\Examen $examenes
     * @return HistoriaClinica
     */
    public function addExamene(\EAMBundle\Entity\Examen $examenes)
    {
        $this->examenes[] = $examenes;
    
        return $this;
    }

    /**
     * Remove examenes
     *
     * @param \EAMBundle\Entity\Examen $examenes
     */
    public function removeExamene(\EAMBundle\Entity\Examen $examenes)
    {
        $this->examenes->removeElement($examenes);
    }

    /**
     * Get examenes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExamenes()
    {
        return $this->examenes;
    }

    public function setDiagnosticos($diagnosticos){
        $this->diagnosticos = $diagnosticos;
        foreach ($diagnosticos as $dia) {
            $dia->setIdHistoriaClinica($this);
        }
    }

    public function getDiagnosticos()
    {
        return $this->diagnosticos;
    }

    public function addDiagnostico(Diagnostico $dia){
        $dia->addHistoriaClinica($this);
        $this->diagnosticos->add($dia);
    }

    public function setPrescripciones($prescripciones){
        $this->prescripciones = $prescripciones;
        foreach ($prescripciones as $pre) {
            $pre->setIdHistoriaClinica($this);
        }
    }

    public function getPrescripciones()
    {
        return $this->prescripciones;
    }

    public function addPrescipciones(Prescripciones $pre){
        $pre->addHistoriaClinica($this);
        $this->prescripciones->add($pre);
    }

    public function setReferencias($referencias){
        $this->referencias = $referencias;
        foreach ($referencias as $ref) {
            $ref->setIdHistoriaClinica($this);
        }
    }

    public function getReferencias()
    {
        return $this->referencias;
    }

    public function addReferencias(Referencias $ref){
        $ref->addHistoriaClinica($this);
        $this->referencias->add($ref);
    }
}
