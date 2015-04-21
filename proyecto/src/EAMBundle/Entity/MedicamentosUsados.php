<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MedicamentosUsados
 *
 * @ORM\Table(name="medicamentos_usados")
 * @ORM\Entity
 */
class MedicamentosUsados
{
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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="HCInicial", inversedBy="medicamentosUsados")
     * @ORM\JoinColumn(name="id_historia", referencedColumnName="id", onDelete="CASCADE")
     */
    private $idHistoria;



    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return MedicamentosUsados
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
     * @return MedicamentosUsados
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function setIdHistoria($id){
        $this->idHistoria = $id;
        return $this;
    }

    public function getIdHistoria(){
        return $this->idHistoria;
    }

    public function addPaciente(Paciente $paciente){
        if(!$this->medicamentosUsados->contains($paciente)){
            $this->medicamentosUsados->add($paciente);
        }
    }
}
