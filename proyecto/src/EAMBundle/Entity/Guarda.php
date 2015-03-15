<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guarda
 *
 * @ORM\Table(name="guarda")
 * @ORM\Entity
 */
class Guarda
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_h_c_inicial", type="integer", nullable=false)
     */
    private $idHCInicial;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_medicamento", type="integer", nullable=false)
     */
    private $idMedicamento;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set idHCInicial
     *
     * @param integer $idHCInicial
     * @return Guarda
     */
    public function setIdHCInicial($idHCInicial)
    {
        $this->idHCInicial = $idHCInicial;

        return $this;
    }

    /**
     * Get idHCInicial
     *
     * @return integer 
     */
    public function getIdHCInicial()
    {
        return $this->idHCInicial;
    }

    /**
     * Set idMedicamento
     *
     * @param integer $idMedicamento
     * @return Guarda
     */
    public function setIdMedicamento($idMedicamento)
    {
        $this->idMedicamento = $idMedicamento;

        return $this;
    }

    /**
     * Get idMedicamento
     *
     * @return integer 
     */
    public function getIdMedicamento()
    {
        return $this->idMedicamento;
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
