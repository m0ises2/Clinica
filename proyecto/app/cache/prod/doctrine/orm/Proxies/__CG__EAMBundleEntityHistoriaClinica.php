<?php

namespace Proxies\__CG__\EAMBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class HistoriaClinica extends \EAMBundle\Entity\HistoriaClinica implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'fechaVisita', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'altura', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'peso', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'presionArterial', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'frecuenciaCard', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'temperatura', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'idPaciente', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'id');
        }

        return array('__isInitialized__', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'fechaVisita', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'altura', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'peso', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'presionArterial', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'frecuenciaCard', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'temperatura', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'idPaciente', '' . "\0" . 'EAMBundle\\Entity\\HistoriaClinica' . "\0" . 'id');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (HistoriaClinica $proxy) {
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
    public function setFechaVisita($fechaVisita)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFechaVisita', array($fechaVisita));

        return parent::setFechaVisita($fechaVisita);
    }

    /**
     * {@inheritDoc}
     */
    public function getFechaVisita()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFechaVisita', array());

        return parent::getFechaVisita();
    }

    /**
     * {@inheritDoc}
     */
    public function setAltura($altura)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAltura', array($altura));

        return parent::setAltura($altura);
    }

    /**
     * {@inheritDoc}
     */
    public function getAltura()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAltura', array());

        return parent::getAltura();
    }

    /**
     * {@inheritDoc}
     */
    public function setPeso($peso)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPeso', array($peso));

        return parent::setPeso($peso);
    }

    /**
     * {@inheritDoc}
     */
    public function getPeso()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPeso', array());

        return parent::getPeso();
    }

    /**
     * {@inheritDoc}
     */
    public function setPresionArterial($presionArterial)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPresionArterial', array($presionArterial));

        return parent::setPresionArterial($presionArterial);
    }

    /**
     * {@inheritDoc}
     */
    public function getPresionArterial()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPresionArterial', array());

        return parent::getPresionArterial();
    }

    /**
     * {@inheritDoc}
     */
    public function setFrecuenciaCard($frecuenciaCard)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFrecuenciaCard', array($frecuenciaCard));

        return parent::setFrecuenciaCard($frecuenciaCard);
    }

    /**
     * {@inheritDoc}
     */
    public function getFrecuenciaCard()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFrecuenciaCard', array());

        return parent::getFrecuenciaCard();
    }

    /**
     * {@inheritDoc}
     */
    public function setTemperatura($temperatura)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTemperatura', array($temperatura));

        return parent::setTemperatura($temperatura);
    }

    /**
     * {@inheritDoc}
     */
    public function getTemperatura()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTemperatura', array());

        return parent::getTemperatura();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdPaciente($idPaciente)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdPaciente', array($idPaciente));

        return parent::setIdPaciente($idPaciente);
    }

    /**
     * {@inheritDoc}
     */
    public function getIdPaciente()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdPaciente', array());

        return parent::getIdPaciente();
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
