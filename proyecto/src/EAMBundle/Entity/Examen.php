<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Examen
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Examen
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Date
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     * @Assert\NotBlank(message="Debe escribir la fecha del examen")
     * @Assert\Date()
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="perfil", type="string", length=100)
     */
    private $perfil;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity="HistoriaClinica", inversedBy="examenes")
     * @ORM\JoinColumn(name="historiaclinica_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $historiaclinica;


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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Examen
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
     * Set perfil
     *
     * @param string $perfil
     * @return Examen
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    
        return $this;
    }

    /**
     * Get perfil
     *
     * @return string 
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Examen
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
     * Set historiaclinica
     *
     * @param \EAMBundle\Entity\HistoriaClinica $historiaclinica
     * @return Examen
     */
    public function setHistoriaclinica(\EAMBundle\Entity\HistoriaClinica $historiaclinica = null)
    {
        $this->historiaclinica = $historiaclinica;
    
        return $this;
    }

    /**
     * Get historiaclinica
     *
     * @return \EAMBundle\Entity\HistoriaClinica 
     */
    public function getHistoriaclinica()
    {
        return $this->historiaclinica;
    }
    public function addHistoriaClinica(HistoriaClinica $historia){
        if(!$this->examenes->contains($historia)){
            $this->examenes->add($historia);
        }
    }
}
