<?php

namespace Proxies\__CG__\EAMBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Empleado extends \EAMBundle\Entity\Empleado implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'nombreUsuario', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'contrasenha', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'nombre', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'apellido', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'fechaNac', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'seguroSocial', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'direccion', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'roles', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'fechaInicio', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'telefono', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'id', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'tipo');
        }

        return array('__isInitialized__', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'nombreUsuario', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'contrasenha', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'nombre', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'apellido', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'fechaNac', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'seguroSocial', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'direccion', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'roles', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'fechaInicio', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'telefono', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'id', '' . "\0" . 'EAMBundle\\Entity\\Empleado' . "\0" . 'tipo');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Empleado $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getUsername()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsername', array());

        return parent::getUsername();
    }

    /**
     * {@inheritDoc}
     */
    public function isEqualTo(\Symfony\Component\Security\Core\User\UserInterface $user)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isEqualTo', array($user));

        return parent::isEqualTo($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getSalt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSalt', array());

        return parent::getSalt();
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassword', array());

        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function getRoles()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRoles', array());

        return parent::getRoles();
    }

    /**
     * {@inheritDoc}
     */
    public function eraseCredentials()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'eraseCredentials', array());

        return parent::eraseCredentials();
    }

    /**
     * {@inheritDoc}
     */
    public function serialize()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'serialize', array());

        return parent::serialize();
    }

    /**
     * {@inheritDoc}
     */
    public function unserialize($serialized)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'unserialize', array($serialized));

        return parent::unserialize($serialized);
    }

    /**
     * {@inheritDoc}
     */
    public function setNombreUsuario($nombreUsuario)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNombreUsuario', array($nombreUsuario));

        return parent::setNombreUsuario($nombreUsuario);
    }

    /**
     * {@inheritDoc}
     */
    public function getNombreUsuario()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNombreUsuario', array());

        return parent::getNombreUsuario();
    }

    /**
     * {@inheritDoc}
     */
    public function setContrasenha($contrasenha)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContrasenha', array($contrasenha));

        return parent::setContrasenha($contrasenha);
    }

    /**
     * {@inheritDoc}
     */
    public function getContrasenha()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContrasenha', array());

        return parent::getContrasenha();
    }

    /**
     * {@inheritDoc}
     */
    public function setNombre($nombre)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNombre', array($nombre));

        return parent::setNombre($nombre);
    }

    /**
     * {@inheritDoc}
     */
    public function getNombre()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNombre', array());

        return parent::getNombre();
    }

    /**
     * {@inheritDoc}
     */
    public function setApellido($apellido)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setApellido', array($apellido));

        return parent::setApellido($apellido);
    }

    /**
     * {@inheritDoc}
     */
    public function getApellido()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getApellido', array());

        return parent::getApellido();
    }

    /**
     * {@inheritDoc}
     */
    public function setFechaNac($fechaNac)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFechaNac', array($fechaNac));

        return parent::setFechaNac($fechaNac);
    }

    /**
     * {@inheritDoc}
     */
    public function getFechaNac()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFechaNac', array());

        return parent::getFechaNac();
    }

    /**
     * {@inheritDoc}
     */
    public function setSeguroSocial($seguroSocial)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSeguroSocial', array($seguroSocial));

        return parent::setSeguroSocial($seguroSocial);
    }

    /**
     * {@inheritDoc}
     */
    public function getSeguroSocial()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSeguroSocial', array());

        return parent::getSeguroSocial();
    }

    /**
     * {@inheritDoc}
     */
    public function setDireccion($direccion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDireccion', array($direccion));

        return parent::setDireccion($direccion);
    }

    /**
     * {@inheritDoc}
     */
    public function getDireccion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDireccion', array());

        return parent::getDireccion();
    }

    /**
     * {@inheritDoc}
     */
    public function setFechaInicio($fechaInicio)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFechaInicio', array($fechaInicio));

        return parent::setFechaInicio($fechaInicio);
    }

    /**
     * {@inheritDoc}
     */
    public function getFechaInicio()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFechaInicio', array());

        return parent::getFechaInicio();
    }

    /**
     * {@inheritDoc}
     */
    public function setTelefono($telefono)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTelefono', array($telefono));

        return parent::setTelefono($telefono);
    }

    /**
     * {@inheritDoc}
     */
    public function getTelefono()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTelefono', array());

        return parent::getTelefono();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getTipo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTipo', array());

        return parent::getTipo();
    }

    /**
     * {@inheritDoc}
     */
    public function setTipo($Tipo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTipo', array($Tipo));

        return parent::setTipo($Tipo);
    }

    /**
     * {@inheritDoc}
     */
    public function addRol(\EAMBundle\Entity\Role $rol)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addRol', array($rol));

        return parent::addRol($rol);
    }

    /**
     * {@inheritDoc}
     */
    public function removeRol(\EAMBundle\Entity\Role $rol)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeRol', array($rol));

        return parent::removeRol($rol);
    }

    /**
     * {@inheritDoc}
     */
    public function addRole(\EAMBundle\Entity\Role $role)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addRole', array($role));

        return parent::addRole($role);
    }

    /**
     * {@inheritDoc}
     */
    public function removeRole(\EAMBundle\Entity\Role $role)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeRole', array($role));

        return parent::removeRole($role);
    }

    /**
     * {@inheritDoc}
     */
    public function getRole()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRole', array());

        return parent::getRole();
    }

}