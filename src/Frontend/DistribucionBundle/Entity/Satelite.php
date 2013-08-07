<?php

namespace Frontend\DistribucionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Satelite
 *
 * @ORM\Table(name="distribucion.satelite")
 * @ORM\Entity
 */
class Satelite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="distribucion.satelite_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="satelite", type="string", length=200, nullable=false)
     * @Assert\NotBlank()
     */
    private $satelite;

    /**
     * @var string
     *
     * @ORM\Column(name="transponder", type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     */
    private $transponder;

    /**
     * @var string
     *
     * @ORM\Column(name="frecuencia", type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     */
    private $frecuencia;

    /**
     * @var string
     *
     * @ORM\Column(name="polarizacion", type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     */
    private $polarizacion;

    /**
     * @var string
     *
     * @ORM\Column(name="modulacion", type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     */
    private $modulacion;

    /**
     * @var string
     *
     * @ORM\Column(name="symbolrate", type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     */
    private $symbolrate;

    /**
     * @var string
     *
     * @ORM\Column(name="fec", type="string", length=50, nullable=true)
     */
    private $fec;

    /**
     * @var string
     *
     * @ORM\Column(name="sid", type="string", length=50, nullable=true)
     */
    private $sid;

    /**
     * @var string
     *
     * @ORM\Column(name="videopid", type="string", length=100, nullable=true)
     */
    private $videopid;

    /**
     * @var string
     *
     * @ORM\Column(name="audiopid", type="string", length=100, nullable=true)
     */
    private $audiopid;

    /**
     * @var string
     *
     * @ORM\Column(name="tvro", type="string", length=50, nullable=true)
     */
    private $tvro;

    /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;
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
     * Set satelite
     *
     * @param string $satelite
     * @return Satelite
     */
    public function setSatelite($satelite)
    {
        $this->satelite = $satelite;
    
        return $this;
    }

    /**
     * Get satelite
     *
     * @return string 
     */
    public function getSatelite()
    {
        return $this->satelite;
    }

    /**
     * Set transponder
     *
     * @param string $transponder
     * @return Satelite
     */
    public function setTransponder($transponder)
    {
        $this->transponder = $transponder;
    
        return $this;
    }

    /**
     * Get transponder
     *
     * @return string 
     */
    public function getTransponder()
    {
        return $this->transponder;
    }

    /**
     * Set frecuencia
     *
     * @param string $frecuencia
     * @return Satelite
     */
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;
    
        return $this;
    }

    /**
     * Get frecuencia
     *
     * @return string 
     */
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }

     /**
     * Set polarizacion
     *
     * @param string $polarizacion
     * @return Satelite
     */
    public function setPolarizacion($polarizacion)
    {
        $this->polarizacion = $polarizacion;
    
        return $this;
    }

    /**
     * Get polarizacion
     *
     * @return string 
     */
    public function getPolarizacion()
    {
        return $this->polarizacion;
    }

    /**
     * Set modulacion
     *
     * @param string $modulacion
     * @return Satelite
     */
    public function setModulacion($modulacion)
    {
        $this->modulacion = $modulacion;
    
        return $this;
    }

    /**
     * Get modulacion
     *
     * @return string 
     */
    public function getModulacion()
    {
        return $this->modulacion;
    }

    /**
     * Set symbolrate
     *
     * @param string $symbolrate
     * @return Satelite
     */
    public function setSymbolrate($symbolrate)
    {
        $this->symbolrate = $symbolrate;
    
        return $this;
    }

    /**
     * Get symbolrate
     *
     * @return string 
     */
    public function getSymbolrate()
    {
        return $this->symbolrate;
    }

    /**
     * Set fec
     *
     * @param string $fec
     * @return Satelite
     */
    public function setFec($fec)
    {
        $this->fec = $fec;
    
        return $this;
    }

    /**
     * Get fec
     *
     * @return string 
     */
    public function getFec()
    {
        return $this->fec;
    }

    /**
     * Set sid
     *
     * @param string $sid
     * @return Satelite
     */
    public function setSid($sid)
    {
        $this->sid = $sid;
    
        return $this;
    }

    /**
     * Get sid
     *
     * @return string 
     */
    public function getSid()
    {
        return $this->sid;
    }

    /**
     * Set videopid
     *
     * @param string $videopid
     * @return Satelite
     */
    public function setVideopid($videopid)
    {
        $this->videopid = $videopid;
    
        return $this;
    }

    /**
     * Get videopid
     *
     * @return string 
     */
    public function getVideopid()
    {
        return $this->videopid;
    }

    /**
     * Set audiopid
     *
     * @param string $audiopid
     * @return Satelite
     */
    public function setAudiopid($audiopid)
    {
        $this->audiopid = $audiopid;
    
        return $this;
    }

    /**
     * Get audiopid
     *
     * @return string 
     */
    public function getAudiopid()
    {
        return $this->audiopid;
    }

    /**
     * Set tvro
     *
     * @param string $tvro
     * @return Satelite
     */
    public function setTvro($tvro)
    {
        $this->tvro = $tvro;
    
        return $this;
    }

    /**
     * Get tvro
     *
     * @return string 
     */
    public function getTvro()
    {
        return $this->tvro;
    }

    /**
     * Set user
     *
     * @param \Administracion\UsuarioBundle\Entity\Perfil $user
     * @return Satelite
     */
    public function setUser(\Administracion\UsuarioBundle\Entity\Perfil $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Administracion\UsuarioBundle\Entity\Perfil 
     */
    public function getUser()
    {
        return $this->user;
    }
}