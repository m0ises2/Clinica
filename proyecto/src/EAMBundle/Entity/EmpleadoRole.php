<?php

namespace EAMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmpleadoRole
 *
 * @ORM\Table(name="empleado_role", indexes={@ORM\Index(name="IDX_DF2C48FF952BE730", columns={"empleado_id"}), @ORM\Index(name="IDX_DF2C48FFD60322AC", columns={"role_id"})})
 * @ORM\Entity
 */
class EmpleadoRole
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \EAMBundle\Entity\Role
     *
     * @ORM\ManyToOne(targetEntity="EAMBundle\Entity\Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     * })
     */
    private $role;

    /**
     * @var \EAMBundle\Entity\Empleado
     *
     * @ORM\ManyToOne(targetEntity="EAMBundle\Entity\Empleado",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="empleado_id", referencedColumnName="id")
     * })
     */
    private $empleado;



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
     * Set role
     *
     * @param \EAMBundle\Entity\Role $role
     * @return EmpleadoRole
     */
    public function setRole(\EAMBundle\Entity\Role $role = null)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return \EAMBundle\Entity\Role 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set empleado
     *
     * @param \EAMBundle\Entity\Empleado $empleado
     * @return EmpleadoRole
     */
    public function setEmpleado(\EAMBundle\Entity\Empleado $empleado = null)
    {
        $this->empleado = $empleado;
    
        return $this;
    }

    /**
     * Get empleado
     *
     * @return \EAMBundle\Entity\Empleado 
     */
    public function getEmpleado()
    {
        return $this->empleado;
    }
}
