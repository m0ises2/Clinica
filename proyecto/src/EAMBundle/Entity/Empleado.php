<?php

namespace EAMBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Empleado
 *
 * @ORM\Table(name="empleado")
 * @ORM\Entity
 */
class Empleado implements UserInterface, \Serializable
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre_usuario", type="string", length=15, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(max=15)
     */
    private $nombreUsuario;

    /**
     * @var integer
     *
     * @ORM\Column(name="contrasenha", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $contrasenha;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=15, nullable=false)
     * @Assert\Length(max=15)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=15, nullable=false)
     * @Assert\Length(max=15)
     */
    private $apellido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nac", type="date", nullable=false)
     * @Assert\Date()
     */
    private $fechaNac;

    /**
     * @var integer
     *
     * @ORM\Column(name="seguro_social", type="integer", nullable=false)
     */
    private $seguroSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=120, nullable=false)
     * @Assert\Length(max=120)
     * @Assert\Length(min=1)
     */
    private $direccion;

    /*el atributo rol DEBE ser array, porque sino da errores de conversión (Illegal offset type in isset or empty) al momento de validar los roles la capa de seguridad.*/
    /**
    * @var array
    * @ORM\ManyToMany(targetEntity="Role", inversedBy="users")
    */
    private $roles;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=false)
     * @Assert\Date()
     */
    private $fechaInicio;

    /**
     * @var integer
     *
     * @ORM\Column(name="telefono", type="integer", nullable=false)
     */
    private $telefono;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
    }

////////////////////////////////////////////////////////////////////
    /**
    * @inheritDoc
    */
    public function getUsername()
    {
        return $this->nombreUsuario;
    }

    /**
    * @inheritDoc
    */
    public function isEqualTo(UserInterface $user)
    {
        return $this->id === $user->getId();
    }

    /**
    * @inheritDoc
    */
    public function getSalt()
    {
    // you *may* need a real salt depending on your encoder
    // see section on salt below
        return null;
    }

    /**
    * @inheritDoc
    */
    public function getPassword()
    {
        return $this->contrasenha;
    }

    /**
    * @inheritDoc
    */
    public function getRoles()
    {
        /*Debe retornar el array de roles para un usuario determinado, sino da error Illegal offset type in isset or empty */
        return $this->roles->toArray();
    }

    /**
    * @inheritDoc
    */
    public function eraseCredentials()
    {
    }

    /**
    * @see \Serializable::serialize()
    */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->nombreUsuario,
            $this->contrasenha,
            // see section on salt below
            // $this->salt,

    ));
    }

    /**
    * @see \Serializable::unserialize()
    */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
////////////////////////////////////////////////////////////////////

    /**
     * Set nombreUsuario
     *
     * @param string $nombreUsuario
     * @return Empleado
     */
    public function setNombreUsuario($nombreUsuario)
    {
        $this->nombreUsuario = $nombreUsuario;

        return $this;
    }

    /**
     * Get nombreUsuario
     *
     * @return string 
     */
    public function getNombreUsuario()
    {
        return $this->nombreUsuario;
    }

    /**
     * Set contrasenha
     *
     * @param integer $contrasenha
     * @return Empleado
     */
    public function setContrasenha($contrasenha)
    {
        $this->contrasenha = $contrasenha;

        return $this;
    }

    /**
     * Get contrasenha
     *
     * @return integer 
     */
    public function getContrasenha()
    {
        return $this->contrasenha;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Empleado
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
     * @return Empleado
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
     * Set fechaNac
     *
     * @param \DateTime $fechaNac
     * @return Empleado
     */
    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;

        return $this;
    }

    /**
     * Get fechaNac
     *
     * @return \DateTime 
     */
    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    /**
     * Set seguroSocial
     *
     * @param integer $seguroSocial
     * @return Empleado
     */
    public function setSeguroSocial($seguroSocial)
    {
        $this->seguroSocial = $seguroSocial;

        return $this;
    }

    /**
     * Get seguroSocial
     *
     * @return integer 
     */
    public function getSeguroSocial()
    {
        return $this->seguroSocial;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Empleado
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
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Empleado
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     * @return Empleado
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer 
     */
    public function getTelefono()
    {
        return $this->telefono;
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

    /**
     * Add rol
     *
     * @param \EAMBundle\Entity\Role $role
     * @return Empleado
     */
    public function addRol(\EAMBundle\Entity\Role $rol)
    {
        $this->rol[] = $rol;

        return $this;
    }

    /**
     * Remove rol
     *
     * @param \EAMBundle\Entity\Role $role
     */
    public function removeRol(\EAMBundle\Entity\Role $rol)
    {
        $this->rol->removeElement($rol);
    }

    /**
     * Add role
     *
     * @param \EAMBundle\Entity\Role $role
     * @return Empleado
     */
    public function addRole(\EAMBundle\Entity\Role $role)
    {
        $this->role[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \EAMBundle\Entity\Role $role
     */
    public function removeRole(\EAMBundle\Entity\Role $role)
    {
        $this->role->removeElement($role);
    }

    /**
     * Get role
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRole()
    {
        return $this->role;
    }   
}
