<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Almacena
 *
 * @ORM\Table(name="almacena")
 * @ORM\Entity
 */
class Almacena
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
     * @ORM\Column(name="id_alergia", type="integer", nullable=false)
     */
    private $idAlergia;

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
     * @return Almacena
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
     * Set idAlergia
     *
     * @param integer $idAlergia
     * @return Almacena
     */
    public function setIdAlergia($idAlergia)
    {
        $this->idAlergia = $idAlergia;

        return $this;
    }

    /**
     * Get idAlergia
     *
     * @return integer 
     */
    public function getIdAlergia()
    {
        return $this->idAlergia;
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
