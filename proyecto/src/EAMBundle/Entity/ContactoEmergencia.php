<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactoEmergencia
 *
 * @ORM\Table(name="contacto_emergencia")
 * @ORM\Entity
 */
class ContactoEmergencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="relacion_paciente", type="string", length=15, nullable=false)
     */
    private $relacionPaciente;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Paciente", inversedBy="emergencia")
     * @ORM\JoinColumn(name="id_paciente", referencedColumnName="id")
     */
    private $idPaciente;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=15, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=15, nullable=false)
     */
    private $apellido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_anhadido", type="date", nullable=false)
     */
    private $fechaAnhadido;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    



    /**
     * Set numero
     *
     * @param integer $numero
     * @return ContactoEmergencia
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return integer 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set relacionPaciente
     *
     * @param string $relacionPaciente
     * @return ContactoEmergencia
     */
    public function setRelacionPaciente($relacionPaciente)
    {
        $this->relacionPaciente = $relacionPaciente;

        return $this;
    }

    /**
     * Get relacionPaciente
     *
     * @return string 
     */
    public function getRelacionPaciente()
    {
        return $this->relacionPaciente;
    }

    /**
     * Set idPaciente
     *
     * @param integer $idPaciente
     * @return ContactoEmergencia
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
     * Set nombre
     *
     * @param string $nombre
     * @return ContactoEmergencia
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
     * Set apellido
     *
     * @param string $apellido
     * @return ContactoEmergencia
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
     * Set fechaAnhadido
     *
     * @param \DateTime $fechaAnhadido
     * @return ContactoEmergencia
     */
    public function setFechaAnhadido($fechaAnhadido)
    {
        $this->fechaAnhadido = $fechaAnhadido;

        return $this;
    }

    /**
     * Get fechaAnhadido
     *
     * @return \DateTime 
     */
    public function getFechaAnhadido()
    {
        return $this->fechaAnhadido;
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

    public function addPaciente(Paciente $paciente){
        if(!$this->emergencia->contains($paciente)){
            $this->emergencia->add($paciente);
        }
    }
}
