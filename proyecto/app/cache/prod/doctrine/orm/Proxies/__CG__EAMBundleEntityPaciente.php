<?php

namespace Proxies\__CG__\EAMBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Paciente extends \EAMBundle\Entity\Paciente implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'EAMBundle\\Entity\\Paciente' . "\0" . 'apellido', '' . "\0" . 'EAMBundle\\Entity\\Paciente' . "\0" . 'nombre', '' . "\0" . 'EAMBundle\\Entity\\Paciente' . "\0" . 'fechasNac', '' . "\0" . 'EAMBundle\\Entity\\Paciente' . "\0" . 'direccion', '' . "\0" . 'EAMBundle\\Entity\\Paciente' . "\0" . 'numSeguroSocial', '' . "\0" . 'EAMBundle\\Entity\\Paciente' . "\0" . 'drPreferido', '' . "\0" . 'EAMBundle\\Entity\\Paciente' . "\0" . 'id');
        }

        return array('__isInitialized__', '' . "\0" . 'EAMBundle\\Entity\\Paciente' . "\0" . 'apellido', '' . "\0" . 'EAMBundle\\Entity\\Paciente' . "\0" . 'nombre', '' . "\0" . 'EAMBundle\\Entity\\Paciente' . "\0" . 'fechasNac', '' . "\0" . 'EAMBundle\\Entity\\Paciente' . "\0" . 'direccion', '' . "\0" . 'EAMBundle\\Entity\\Paciente' . "\0" . 'numSeguroSocial', '' . "\0" . 'EAMBundle\\Entity\\Paciente' . "\0" . 'drPreferido', '' . "\0" . 'EAMBundle\\Entity\\Paciente' . "\0" . 'id');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Paciente $proxy) {
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
    public function setFechasNac($fechasNac)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFechasNac', array($fechasNac));

        return parent::setFechasNac($fechasNac);
    }

    /**
     * {@inheritDoc}
     */
    public function getFechasNac()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFechasNac', array());

        return parent::getFechasNac();
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
    public function setNumSeguroSocial($numSeguroSocial)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNumSeguroSocial', array($numSeguroSocial));

        return parent::setNumSeguroSocial($numSeguroSocial);
    }

    /**
     * {@inheritDoc}
     */
    public function getNumSeguroSocial()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNumSeguroSocial', array());

        return parent::getNumSeguroSocial();
    }

    /**
     * {@inheritDoc}
     */
    public function setDrPreferido($drPreferido)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDrPreferido', array($drPreferido));

        return parent::setDrPreferido($drPreferido);
    }

    /**
     * {@inheritDoc}
     */
    public function getDrPreferido()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDrPreferido', array());

        return parent::getDrPreferido();
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

}