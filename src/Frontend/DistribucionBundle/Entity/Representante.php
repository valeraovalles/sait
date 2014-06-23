<?php

namespace Frontend\DistribucionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Representante
 *
 * @ORM\Table(name="distribucion.representante")
 * @ORM\Entity(repositoryClass="Frontend\DistribucionBundle\Entity\RepresentanteRepository")
 */
class Representante
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="distribucion.representante_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=100, nullable=false)
     * @Assert\NotBlank()
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=100, nullable=false)
     * @Assert\NotBlank()
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="string", length=200, nullable=false)
     * @Assert\NotBlank()
     */
    private $cargo;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=100, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Email()
     * 
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono1", type="string", nullable=true)
     * @Assert\NotBlank()
     * @Assert\NotEqualTo(value = "0", message="La extensión no puede ser igual a 0.")
     * @Assert\Type(type="digit", message="Debe ser un número.").
     */
    private $telefono1;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono2", type="string", nullable=true)
     * @Assert\Type(type="digit", message="Debe ser un número.").
     * @Assert\NotEqualTo(value = "0", message="La extensión no puede ser igual a 0.")
     */
    private $telefono2;

    /**
     * @var string
     *
     * @ORM\Column(name="fax",type="bigint", nullable=true)
     * @Assert\Type(type="numeric", message="La extensión debe ser un número.")
     * @Assert\NotEqualTo(value = "0", message="La extensión no puede ser igual a 0.")
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=500, nullable=true)
     */
    private $observacion;

    /**
     * @var \Operador
     *
     * @ORM\ManyToOne(targetEntity="Operador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="operador_id", referencedColumnName="id")
     * })
     */
    private $operador;
    
        /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechamodificacion", type="datetime", nullable=true)
     */
    private $fechamodificacion;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->operador = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombres
     *
     * @param string $nombres
     * @return Representante
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    
        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Representante
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     * @return Representante
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    
        return $this;
    }

    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Representante
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    
        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set telefono1
     *
     * @param integer $telefono1
     * @return Representante
     */
    public function setTelefono1($telefono1)
    {
        $this->telefono1 = $telefono1;
    
        return $this;
    }

    /**
     * Get telefono1
     *
     * @return integer 
     */
    public function getTelefono1()
    {
        return $this->telefono1;
    }

    /**
     * Set telefono2
     *
     * @param integer $telefono2
     * @return Representante
     */
    public function setTelefono2($telefono2)
    {
        $this->telefono2 = $telefono2;
    
        return $this;
    }

    /**
     * Get telefono2
     *
     * @return integer 
     */
    public function getTelefono2()
    {
        return $this->telefono2;
    }

    /**
     * Set fax
     *
     * @param integer $fax
     * @return Representante
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    
        return $this;
    }

    /**
     * Get fax
     *
     * @return integer 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return Representante
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    
        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }
    
    /**
     * Set oprador
     *
     * @param \Administracion\UsuarioBundle\Entity\Operador $operador
     * @return Representante
     */
    public function setOperador(\Frontend\DistribucionBundle\Entity\Operador $operador = null)
    {
        $this->operador = $operador;
    
        return $this;
    }

    /**
     * Get oprador
     *
     * @return \Administracion\UsuarioBundle\Entity\Operador 
     */
    public function getOperador()
    {
        return $this->operador;
    }
    
  /**
     * Set user
     *
     * @param \Administracion\UsuarioBundle\Entity\Perfil $user
     * @return Representante
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

    /**
     * Set fechamodificacion
     *
     * @param \DateTime $fechamodificacion
     * @return Comodato
     */
    public function setFechamodificacion($fechamodificacion)
    {
        $this->fechamodificacion = $fechamodificacion;
    
        return $this;
    }

    /**
     * Get fechamodificacion
     *
     * @return \DateTime 
     */
    public function getFechamodificacion()
    {
        return $this->fechamodificacion;
    }
    
    public function __toString()
    {
        return $this->getNombres().' '.$this->getApellidos();
    }
}