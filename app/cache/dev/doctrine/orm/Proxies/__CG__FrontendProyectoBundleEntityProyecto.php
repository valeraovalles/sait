<?php

namespace Proxies\__CG__\Frontend\ProyectoBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Proyecto extends \Frontend\ProyectoBundle\Entity\Proyecto implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function setNombre($nombre)
    {
        $this->__load();
        return parent::setNombre($nombre);
    }

    public function getNombre()
    {
        $this->__load();
        return parent::getNombre();
    }

    public function setDescripcion($descripcion)
    {
        $this->__load();
        return parent::setDescripcion($descripcion);
    }

    public function getDescripcion()
    {
        $this->__load();
        return parent::getDescripcion();
    }

    public function setFechainicio($fechainicio)
    {
        $this->__load();
        return parent::setFechainicio($fechainicio);
    }

    public function getFechainicio()
    {
        $this->__load();
        return parent::getFechainicio();
    }

    public function setFechafin($fechafin)
    {
        $this->__load();
        return parent::setFechafin($fechafin);
    }

    public function getFechafin()
    {
        $this->__load();
        return parent::getFechafin();
    }

    public function setEstatus($estatus)
    {
        $this->__load();
        return parent::setEstatus($estatus);
    }

    public function getEstatus()
    {
        $this->__load();
        return parent::getEstatus();
    }

    public function setPorcentaje($porcentaje)
    {
        $this->__load();
        return parent::setPorcentaje($porcentaje);
    }

    public function getPorcentaje()
    {
        $this->__load();
        return parent::getPorcentaje();
    }

    public function setResponsable(\Administracion\UsuarioBundle\Entity\Perfil $responsable = NULL)
    {
        $this->__load();
        return parent::setResponsable($responsable);
    }

    public function getResponsable()
    {
        $this->__load();
        return parent::getResponsable();
    }

    public function setNivelorganizacional(\Administracion\UsuarioBundle\Entity\Nivelorganizacional $nivelorganizacional = NULL)
    {
        $this->__load();
        return parent::setNivelorganizacional($nivelorganizacional);
    }

    public function addNivelorganizacional(\Administracion\UsuarioBundle\Entity\Nivelorganizacional $nivelorganizacional)
    {
        $this->__load();
        return parent::addNivelorganizacional($nivelorganizacional);
    }

    public function removeNivelorganizacional(\Administracion\UsuarioBundle\Entity\Nivelorganizacional $nivelorganizacional)
    {
        $this->__load();
        return parent::removeNivelorganizacional($nivelorganizacional);
    }

    public function getNivelorganizacional()
    {
        $this->__load();
        return parent::getNivelorganizacional();
    }

    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function __toString()
    {
        $this->__load();
        return parent::__toString();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'nombre', 'descripcion', 'fechainicio', 'fechafin', 'estatus', 'porcentaje', 'id', 'responsable', 'nivelorganizacional');
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