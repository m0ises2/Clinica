<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HCInicial
 *
 * @ORM\Table(name="h_c_inicial")
 * @ORM\Entity
 */
class HCInicial
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_paciente", type="integer", nullable=false)
     */
    private $idPaciente;

    /**
     * @var string
     *
     * @ORM\Column(name="tabaco", type="string", length=4, nullable=false)
     */
    private $tabaco;

    /**
     * @var string
     *
     * @ORM\Column(name="alcohol", type="string", length=4, nullable=false)
     */
    private $alcohol;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set idPaciente
     *
     * @param integer $idPaciente
     * @return HCInicial
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
     * Set tabaco
     *
     * @param string $tabaco
     * @return HCInicial
     */
    public function setTabaco($tabaco)
    {
        $this->tabaco = $tabaco;

        return $this;
    }

    /**
     * Get tabaco
     *
     * @return string 
     */
    public function getTabaco()
    {
        return $this->tabaco;
    }

    /**
     * Set alcohol
     *
     * @param string $alcohol
     * @return HCInicial
     */
    public function setAlcohol($alcohol)
    {
        $this->alcohol = $alcohol;

        return $this;
    }

    /**
     * Get alcohol
     *
     * @return string 
     */
    public function getAlcohol()
    {
        return $this->alcohol;
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
