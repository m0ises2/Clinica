<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     * 
     * @ORM\OneToOne(targetEntity="Paciente", inversedBy="historiaClinica")
     * @ORM\JoinColumn(name="id_paciente", referencedColumnName="id", onDelete="CASCADE")
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
     * @ORM\OneToMany(targetEntity="Alergias", mappedBy="idHistoria", cascade={"persist","remove"})
     */
    private $alergias;


    /**
     * @ORM\OneToMany(targetEntity="MedicamentosUsados", mappedBy="idHistoria", cascade={"persist","remove"})
     */
    private $medicamentosUsados;




    public function  __toString(){
        return (string) $this->id;
    }

    public function __construct(){
        $this->alergias = new ArrayCollection();
        $this->medicamentosUsados = new ArrayCollection();
    }


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


    public function getAlergias(){
        return $this->alergias;
    }


    public function setAlergias($Alergias){
        $this->alergias = $Alergias;
        foreach ($Alergias as $aler) {
            $aler->setIdHistoria($this);
        }
    }

    public function addAlergia(Alergias $alg){
        $alg->addPaciente($this);
        $this->alergias->add($alg);
    }

    public function getMedicamentosUsados(){
        return $this->medicamentosUsados;
    }

    public function setMedicamentosUsados($medicamentos){
        $this->medicamentosUsados = $medicamentos;
        foreach ($medicamentos as $medi) {
            $medi->setIdHistoria($this);
        }
    }

    public function addMedicamentosUsados(MedicamentosUsados $med){
        $med->addPaciente($this);
        $this->medicamentosUsados->add($med);
    }
    

}
