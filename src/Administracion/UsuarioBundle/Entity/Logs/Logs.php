<?php

namespace Administracion\UsuarioBundle\Entity\Logs;

use Doctrine\ORM\Mapping as ORM;

/**
 * logs_analitics
 *
 * @ORM\Table(name="log.logs_analitics")
 * @ORM\Entity(repositoryClass="Administracion\UsuarioBundle\Entity\Logs\LogsRepository")
 */
class Logs {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="log.logs_analitics_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="utc", type="string", nullable=false)
     */
    private $utc;

    /**
     * @var string
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time", nullable=false)
     */
    private $hora;
    
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Perfil")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     * })
     */
    private $usuario;
    
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", nullable=false)
     */
    private $url;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", nullable=false)
     */
    private $ip;
    
    /**
     * @var string
     *
     * @ORM\Column(name="navegador", type="string", nullable=false)
     */
    private $navegador;
    


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
     * Set utc
     *
     * @param string $utc
     * @return Logs
     */
    public function setUtc($utc)
    {
        $this->utc = $utc;
    
        return $this;
    }

    /**
     * Get utc
     *
     * @return string 
     */
    public function getUtc()
    {
        return $this->utc;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Logs
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     * @return Logs
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    
        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime 
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Logs
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Logs
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    
        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set navegador
     *
     * @param string $navegador
     * @return Logs
     */
    public function setNavegador($navegador)
    {
        $this->navegador = $navegador;
    
        return $this;
    }

    /**
     * Get navegador
     *
     * @return string 
     */
    public function getNavegador()
    {
        return $this->navegador;
    }

    /**
     * Set usuario
     *
     * @param \Administracion\UsuarioBundle\Entity\Perfil $usuario
     * @return Logs
     */
    public function setUsuario(\Administracion\UsuarioBundle\Entity\Perfil $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Administracion\UsuarioBundle\Entity\Perfil 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}