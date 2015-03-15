<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medico
 *
 * @ORM\Table(name="medico")
 * @ORM\Entity
 */
class Medico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="especialidad", type="integer", nullable=false)
     */
    private $especialidad;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_medico", type="string", length=15, nullable=false)
     */
    private $codigoMedico;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set especialidad
     *
     * @param integer $especialidad
     * @return Medico
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;

        return $this;
    }

    /**
     * Get especialidad
     *
     * @return integer 
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * Set codigoMedico
     *
     * @param string $codigoMedico
     * @return Medico
     */
    public function setCodigoMedico($codigoMedico)
    {
        $this->codigoMedico = $codigoMedico;

        return $this;
    }

    /**
     * Get codigoMedico
     *
     * @return string 
     */
    public function getCodigoMedico()
    {
        return $this->codigoMedico;
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
