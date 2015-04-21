<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Paciente
 *
 * @ORM\Entity(repositoryClass="EAMBundle\Entity\PacienteRepository")
 * @ORM\Table(name="paciente")
 * @ORM\Entity
 */
class Paciente
{
    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=12, nullable=false)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=12, nullable=false)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechas_nac", type="date", nullable=false)
     */
    private $fechasNac;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=95, nullable=false)
     */
    private $direccion;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_seguro_social", type="integer", nullable=false)
     */
    private $numSeguroSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="dr_preferido", type="string", length=20, nullable=false)
     */
    private $drPreferido;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Cita", mappedBy="paciente",cascade={"persist","remove"})
     */
    private $citas;

    /**
     * @ORM\OneToMany(targetEntity="Visita", mappedBy="paciente",cascade={"persist","remove"})
     */
    private $visitas;

    /**
     * @ORM\OneToMany(targetEntity="NumerosTelefonicos", mappedBy="idPaciente", cascade={"persist","remove"})
     */
    private $telefonos;

    /**
    *@ORM\OneToMany(targetEntity="ContactoEmergencia", mappedBy="idPaciente", cascade={"persist","remove"})
    */

    private $emergencia;


    public function  __toString(){
        return (string) $this->numSeguroSocial;
    }

    public function __construct(){
        $this->telefonos = new ArrayCollection();
        $this->emergencia = new ArrayCollection();
        $this->citas = new ArrayCollection();
        $this->visitas = new ArrayCollection();
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Paciente
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Paciente
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
     * Set fechasNac
     *
     * @param \DateTime $fechasNac
     * @return Paciente
     */
    public function setFechasNac($fechasNac)
    {
        $this->fechasNac = $fechasNac;

        return $this;
    }

    /**
     * Get fechasNac
     *
     * @return \DateTime 
     */
    public function getFechasNac()
    {
        return $this->fechasNac;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Paciente
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set numSeguroSocial
     *
     * @param integer $numSeguroSocial
     * @return Paciente
     */
    public function setNumSeguroSocial($numSeguroSocial)
    {
        $this->numSeguroSocial = $numSeguroSocial;

        return $this;
    }

    /**
     * Get numSeguroSocial
     *
     * @return integer 
     */
    public function getNumSeguroSocial()
    {
        return $this->numSeguroSocial;
    }

    /**
     * Set drPreferido
     *
     * @param string $drPreferido
     * @return Paciente
     */
    public function setDrPreferido($drPreferido)
    {
        $this->drPreferido = $drPreferido;

        return $this;
    }

    /**
     * Get drPreferido
     *
     * @return string 
     */
    public function getDrPreferido()
    {
        return $this->drPreferido;
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

    public function setTelefonos($telefonos){
        $this->telefonos = $telefonos;
        foreach ($telefonos as $telP) {
            $telP->setIdPaciente($this);
        }
    }

    public function getTelefonos()
    {
        return $this->telefonos;
    }

    public function addTelefono(NumerosTelefonicos $tlf){
        $tlf->addPaciente($this);
        $this->telefono->add($tlf);
    }

    public function removeTelefono(NumerosTelefonicos $tlf){
        $this->telefonos->removeElement($tlf);
    }

    public function getEmergencias(){
        return $this->emergencia;
    }

    public function setEmergencias($emergencia){
        $this->emergencia = $emergencia;
        foreach ($emergencia as $emer) {
            $emer->setIdPaciente($this);
        }
    }

    public function removeEmergencia(ContactoEmergencia $emr){
        $this->emergencia->removeElement($emr);
    }


    public function addEmergencia(ContactoEmergencia $emr){
        $emergencia->addPaciente($this);
        $this->emergencia->add($emr);
    }
    /**
     * Add citas
     *
     * @param \EAMBundle\Entity\Cita $citas
     * @return Paciente
     */
    public function addCita(\EAMBundle\Entity\Cita $citas)
    {
        $this->citas[] = $citas;
    
        return $this;
    }

    /**
     * Remove citas
     *
     * @param \EAMBundle\Entity\Cita $citas
     */
    public function removeCita(\EAMBundle\Entity\Cita $citas)
    {
        $this->citas->removeElement($citas);
    }

    /**
     * Get citas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCitas()
    {
        return $this->citas;
    }  

    /**
     * Add visitas
     *
     * @param \EAMBundle\Entity\Visita $visitas
     * @return Paciente
     */
    public function addVisita(\EAMBundle\Entity\Visita $visitas)
    {
        $this->visitas[] = $visitas;
    
        return $this;
    }

    /**
     * Remove visitas
     *
     * @param \EAMBundle\Entity\Visita $visitas
     */
    public function removeVisita(\EAMBundle\Entity\Visita $visitas)
    {
        $this->visitas->removeElement($visitas);
    }

    /**
     * Get visitas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVisitas()
    {
        return $this->visitas;
    }


}
