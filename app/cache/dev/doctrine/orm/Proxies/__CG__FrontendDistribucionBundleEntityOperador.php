<?php

namespace Proxies\__CG__\Frontend\DistribucionBundle\Entity;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Operador extends \Frontend\DistribucionBundle\Entity\Operador implements \Doctrine\ORM\Proxy\Proxy
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

    public function setNumeroabonados($numeroabonados)
    {
        $this->__load();
        return parent::setNumeroabonados($numeroabonados);
    }

    public function getNumeroabonados()
    {
        $this->__load();
        return parent::getNumeroabonados();
    }

    public function setDialUrl($dialUrl)
    {
        $this->__load();
        return parent::setDialUrl($dialUrl);
    }

    public function getDialUrl()
    {
        $this->__load();
        return parent::getDialUrl();
    }

    public function setDialUrl2($dialUrl2)
    {
        $this->__load();
        return parent::setDialUrl2($dialUrl2);
    }

    public function getDialUrl2()
    {
        $this->__load();
        return parent::getDialUrl2();
    }

    public function setDireccion($direccion)
    {
        $this->__load();
        return parent::setDireccion($direccion);
    }

    public function getDireccion()
    {
        $this->__load();
        return parent::getDireccion();
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

    public function setComodato(\Frontend\DistribucionBundle\Entity\Comodato $comodato = NULL)
    {
        $this->__load();
        return parent::setComodato($comodato);
    }

    public function getComodato()
    {
        $this->__load();
        return parent::getComodato();
    }

    public function setTipooperador(\Frontend\DistribucionBundle\Entity\Tipooperador $tipooperador = NULL)
    {
        $this->__load();
        return parent::setTipooperador($tipooperador);
    }

    public function getTipooperador()
    {
        $this->__load();
        return parent::getTipooperador();
    }

    public function setPais(\Frontend\DistribucionBundle\Entity\Pais $pais = NULL)
    {
        $this->__load();
        return parent::setPais($pais);
    }

    public function getPais()
    {
        $this->__load();
        return parent::getPais();
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

    public function setZona($zona)
    {
        $this->__load();
        return parent::setZona($zona);
    }

    public function getZona()
    {
        $this->__load();
        return parent::getZona();
    }

    public function setCobertura($cobertura)
    {
        $this->__load();
        return parent::setCobertura($cobertura);
    }

    public function getCobertura()
    {
        $this->__load();
        return parent::getCobertura();
    }

    public function addEstado(\Frontend\DistribucionBundle\Entity\Estado $estado)
    {
        $this->__load();
        return parent::addEstado($estado);
    }

    public function removeEstado(\Frontend\DistribucionBundle\Entity\Estado $estado)
    {
        $this->__load();
        return parent::removeEstado($estado);
    }

    public function getEstado()
    {
        $this->__load();
        return parent::getEstado();
    }

    public function addCiudad(\Frontend\DistribucionBundle\Entity\Ciudad $ciudad)
    {
        $this->__load();
        return parent::addCiudad($ciudad);
    }

    public function removeCiudad(\Frontend\DistribucionBundle\Entity\Ciudad $ciudad)
    {
        $this->__load();
        return parent::removeCiudad($ciudad);
    }

    public function getCiudad()
    {
        $this->__load();
        return parent::getCiudad();
    }

    public function setPaquete(\Frontend\DistribucionBundle\Entity\Paquete $paquete = NULL)
    {
        $this->__load();
        return parent::setPaquete($paquete);
    }

    public function getPaquete()
    {
        $this->__load();
        return parent::getPaquete();
    }

    public function setUrlweb($urlweb)
    {
        $this->__load();
        return parent::setUrlweb($urlweb);
    }

    public function getUrlweb()
    {
        $this->__load();
        return parent::getUrlweb();
    }

    public function setUrlfacebook($urlfacebook)
    {
        $this->__load();
        return parent::setUrlfacebook($urlfacebook);
    }

    public function getUrlfacebook()
    {
        $this->__load();
        return parent::getUrlfacebook();
    }

    public function setUrltwitter($urltwitter)
    {
        $this->__load();
        return parent::setUrltwitter($urltwitter);
    }

    public function getUrltwitter()
    {
        $this->__load();
        return parent::getUrltwitter();
    }

    public function setFecharegistro($fecharegistro)
    {
        $this->__load();
        return parent::setFecharegistro($fecharegistro);
    }

    public function getFecharegistro()
    {
        $this->__load();
        return parent::getFecharegistro();
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

    public function setFechamodificacionabonados($fechamodificacionabonados)
    {
        $this->__load();
        return parent::setFechamodificacionabonados($fechamodificacionabonados);
    }

    public function getFechamodificacionabonados()
    {
        $this->__load();
        return parent::getFechamodificacionabonados();
    }

    public function setFranjatransmision($franjatransmision)
    {
        $this->__load();
        return parent::setFranjatransmision($franjatransmision);
    }

    public function getFranjatransmision()
    {
        $this->__load();
        return parent::getFranjatransmision();
    }

    public function __toString()
    {
        $this->__load();
        return parent::__toString();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'nombre', 'numeroabonados', 'fechamodificacionabonados', 'dialUrl', 'dialUrl2', 'direccion', 'observacion', 'estatus', 'cobertura', 'urlweb', 'urlfacebook', 'urltwitter', 'fecharegistro', 'fechamodificacion', 'franjatransmision', 'comodato', 'tipooperador', 'pais', 'estado', 'ciudad', 'zona', 'user', 'paquete');
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