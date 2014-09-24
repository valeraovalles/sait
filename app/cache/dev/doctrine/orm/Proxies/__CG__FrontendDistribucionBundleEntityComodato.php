<?php

namespace Proxies\__CG__\Frontend\DistribucionBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Comodato extends \Frontend\DistribucionBundle\Entity\Comodato implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setRecibereceptor($recibereceptor)
    {
        $this->__load();
        return parent::setRecibereceptor($recibereceptor);
    }

    public function getRecibereceptor()
    {
        $this->__load();
        return parent::getRecibereceptor();
    }

    public function setCodigo($codigo)
    {
        $this->__load();
        return parent::setCodigo($codigo);
    }

    public function getCodigo()
    {
        $this->__load();
        return parent::getCodigo();
    }

    public function setFechainicioacuerdo($fechainicioacuerdo)
    {
        $this->__load();
        return parent::setFechainicioacuerdo($fechainicioacuerdo);
    }

    public function getFechainicioacuerdo()
    {
        $this->__load();
        return parent::getFechainicioacuerdo();
    }

    public function setFechafinacuerdo($fechafinacuerdo)
    {
        $this->__load();
        return parent::setFechafinacuerdo($fechafinacuerdo);
    }

    public function getFechafinacuerdo()
    {
        $this->__load();
        return parent::getFechafinacuerdo();
    }

    public function setFecharecepcion($fecharecepcion)
    {
        $this->__load();
        return parent::setFecharecepcion($fecharecepcion);
    }

    public function getFecharecepcion()
    {
        $this->__load();
        return parent::getFecharecepcion();
    }

    public function setObservacion($observacion)
    {
        $this->__load();
        return parent::setObservacion($observacion);
    }

    public function getObservacion()
    {
        $this->__load();
        return parent::getObservacion();
    }

    public function addObjetocomodato(\Frontend\DistribucionBundle\Entity\Objetocomodato $objetocomodato)
    {
        $this->__load();
        return parent::addObjetocomodato($objetocomodato);
    }

    public function removeObjetocomodato(\Frontend\DistribucionBundle\Entity\Objetocomodato $objetocomodato)
    {
        $this->__load();
        return parent::removeObjetocomodato($objetocomodato);
    }

    public function getObjetocomodato()
    {
        $this->__load();
        return parent::getObjetocomodato();
    }

    public function setUser(\Administracion\UsuarioBundle\Entity\Perfil $user = NULL)
    {
        $this->__load();
        return parent::setUser($user);
    }

    public function getUser()
    {
        $this->__load();
        return parent::getUser();
    }

    public function setFechamodificacion($fechamodificacion)
    {
        $this->__load();
        return parent::setFechamodificacion($fechamodificacion);
    }

    public function getFechamodificacion()
    {
        $this->__load();
        return parent::getFechamodificacion();
    }

    public function __toString()
    {
        $this->__load();
        return parent::__toString();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'codigo', 'fechainicioacuerdo', 'fechafinacuerdo', 'observacion', 'fechamodificacion', 'recibereceptor', 'fecharecepcion', 'objetocomodato', 'user');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}