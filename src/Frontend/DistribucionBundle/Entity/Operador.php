<?php

namespace Frontend\DistribucionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Operador
 *
 * @ORM\Table(name="distribucion.operador")
 * @ORM\Entity(repositoryClass="Frontend\DistribucionBundle\Entity\OperadorRepository")
 */
class Operador
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="distribucion.operador_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=300, nullable=false)
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="numeroabonados", type="bigint", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Type(type="numeric", message="Este valor debe ser numérico {{ type }}")
     */
    private $numeroabonados;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechamodificacionabonados", type="datetime", nullable=true)
     */
    private $fechamodificacionabonados;

    /**
     * @var integer
     *
     * @ORM\Column(name="dialUrl", type="string", length=100, nullable=true)
     * @Assert\NotBlank()
     * @Assert\NotEqualTo(value = "0")
     */
    private $dialUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="dialUrl2", type="string", length=100, nullable=true)
     * @Assert\NotEqualTo(value = "0")
     */
    private $dialUrl2;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=500, nullable=false)
     * @Assert\NotBlank()
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=500, nullable=true)
     * 
     */
    private $observacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estatus", type="boolean", nullable=false)
     */
    private $estatus;

    /**
     * @var \Comodato
     *
     * @ORM\ManyToOne(targetEntity="Comodato",cascade = {"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comodato_id", referencedColumnName="id")
     * })
     * @Assert\Valid()
     */
    private $comodato;

    /**
     * @var \Tipooperador
     *
     * @ORM\ManyToOne(targetEntity="Tipooperador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipooperador_id", referencedColumnName="id")
     * })
     * @Assert\Valid()
     */
    private $tipooperador;

    /**
     * @var \Pais
     *
     * @ORM\ManyToOne(targetEntity="Pais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais_id", referencedColumnName="id")
     * })
     * @Assert\NotBlank()
     */
    private $pais;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Estado", inversedBy="operador")
     * @ORM\JoinTable(name="distribucion.operadorestado",
     *   joinColumns={
     *     @ORM\JoinColumn(name="operador_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="estado_id", referencedColumnName="id")
     *   }
     * )
     * @Assert\Count(min="1",minMessage="Debe seleccionar al menos 1 estado.")
     * 
     * 
     */
    private $estado;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Ciudad", inversedBy="operador")
     * @ORM\JoinTable(name="distribucion.operadorciudad",
     *   joinColumns={
     *     @ORM\JoinColumn(name="operador_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ciudad_id", referencedColumnName="id")
     *   }
     * )
     */
    private $ciudad;

    /**
     * @var string
     *
     * @ORM\Column(name="cobertura", type="string", length=200, nullable=true)
     * @Assert\NotBlank()
     */
    private $cobertura;

    /**
     * @var \Pais
     *
     * @ORM\ManyToOne(targetEntity="Zona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="zona_id", referencedColumnName="id")
     * })
     * @Assert\NotBlank()
     */
    private $zona;
    
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
     * @var \Paquete
     *
     * @ORM\ManyToOne(targetEntity="Paquete")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="paquete_id", referencedColumnName="id")
     * })
     * @Assert\NotBlank()
     */
    private $paquete;

    /**
     * @var string
     *
     * @ORM\Column(name="urlweb", type="string", length=200, nullable=true)
     * @Assert\Url()
     */
    private $urlweb;

    /**
     * @var string
     *
     * @ORM\Column(name="urlfacebook", type="string", length=200, nullable=true)
     * @Assert\Url()
     */
    private $urlfacebook;

    /**
     * @var string
     *
     * @ORM\Column(name="urltwitter", type="string", length=200, nullable=true)
     * @Assert\Url()
     */
    private $urltwitter;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecharegistro", type="datetime", nullable=true)
     */
    private $fecharegistro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechamodificacion", type="datetime", nullable=true)
     */
    private $fechamodificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="franjatransmision", type="string", length=500, nullable=true)
      */
    private $franjatransmision;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->estado = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ciudad = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Operador
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
     * Set numeroabonados
     *
     * @param integer $numeroabonados
     * @return Operador
     */
    public function setNumeroabonados($numeroabonados)
    {
        $this->numeroabonados = $numeroabonados;
    
        return $this;
    }

    /**
     * Get numeroabonados
     *
     * @return integer 
     */
    public function getNumeroabonados()
    {
        return $this->numeroabonados;
    }

    /**
     * Set dial
     *
     * @param integer $dial
     * @return Comodato
     */
    public function setDialUrl($dialUrl)
    {
        $this->dialUrl = $dialUrl;
    
        return $this;
    }

    /**
     * Get dial
     *
     * @return integer 
     */
    public function getDialUrl()
    {
        return $this->dialUrl;
    }

   /**
     * Set dial
     *
     * @param integer $dial
     * @return Comodato
     */
    public function setDialUrl2($dialUrl2)
    {
        $this->dialUrl2 = $dialUrl2;
    
        return $this;
    }

    /**
     * Get dial
     *
     * @return integer 
     */
    public function getDialUrl2()
    {
        return $this->dialUrl2;
    }
    
    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Operador
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
     * Set observacion
     *
     * @param string $observacion
     * @return Operador
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
     * Set estatus
     *
     * @param boolean $estatus
     * @return Operador
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    
        return $this;
    }

    /**
     * Get estatus
     *
     * @return boolean 
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Set comodato
     *
     * @param \Frontend\DistribucionBundle\Entity\Comodato $comodato
     * @return Operador
     */
    public function setComodato(\Frontend\DistribucionBundle\Entity\Comodato $comodato = null)
    {
        $this->comodato = $comodato;
    
        return $this;
    }

    /**
     * Get comodato
     *
     * @return \Frontend\DistribucionBundle\Entity\Comodato 
     */
    public function getComodato()
    {
        return $this->comodato;
    }

    /**
     * Set tipooperador
     *
     * @param \Frontend\DistribucionBundle\Entity\Tipooperador $tipooperador
     * @return Operador
     */
    public function setTipooperador(\Frontend\DistribucionBundle\Entity\Tipooperador $tipooperador = null)
    {
        $this->tipooperador = $tipooperador;
    
        return $this;
    }

    /**
     * Get tipooperador
     *
     * @return \Frontend\DistribucionBundle\Entity\Tipooperador 
     */
    public function getTipooperador()
    {
        return $this->tipooperador;
    }

    /**
     * Set pais
     *
     * @param \Frontend\DistribucionBundle\Entity\Pais $pais
     * @return Operador
     */
    public function setPais(\Frontend\DistribucionBundle\Entity\Pais $pais = null)
    {
        $this->pais = $pais;
    
        return $this;
    }

    /**
     * Get pais
     *
     * @return \Frontend\DistribucionBundle\Entity\Pais 
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set user
     *
     * @param \Administracion\UsuarioBundle\Entity\Perfil $user
     * @return Operador
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
     * Set zona
     *
     * @param string $zona
     * @return Operador
     */
    public function setZona($zona)
    {
        $this->zona = $zona;
    
        return $this;
    }

    /**
     * Get zona
     *
     * @return string 
     */
    public function getZona()
    {
        return $this->zona;
    }
    
     /**
     * Set coertura
     *
     * @param string $cobertura
     * @return Operador
     */
    public function setCobertura($cobertura)
    {
        $this->cobertura = $cobertura;
    
        return $this;
    }

    /**
     * Get zona
     *
     * @return string 
     */
    public function getCobertura()
    {
        return $this->cobertura;
    }
    /**
     * Add estado
     *
     * @param \Frontend\DistribucionBundle\Entity\Estado $estado
     * @return Operador
     */
    public function addEstado(\Frontend\DistribucionBundle\Entity\Estado $estado)
    {
        $this->estado[] = $estado;
    
        return $this;
    }

    /**
     * Remove estado
     *
     * @param \Frontend\DistribucionBundle\Entity\Estado $estado
     */
    public function removeEstado(\Frontend\DistribucionBundle\Entity\Estado $estado)
    {
        $this->estado->removeElement($estado);
    }

    /**
     * Get estado
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEstado()
    {
        return $this->estado;
    }

   /**
     * Add ciudad
     *
     * @param \Frontend\DistribucionBundle\Entity\Ciudad $ciudad
     * @return Operador
     */
    public function addCiudad(\Frontend\DistribucionBundle\Entity\Ciudad $ciudad)
    {
        $this->ciudad[] = $ciudad;
    
        return $this;
    }

    /**
     * Remove ciudad
     *
     * @param \Frontend\DistribucionBundle\Entity\Ciudad $ciudad
     */
    public function removeCiudad(\Frontend\DistribucionBundle\Entity\Ciudad $ciudad)
    {
        $this->ciudad->removeElement($ciudad);
    }

    /**
     * Get ciudad
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set paquete
     *
     * @param \Frontend\DistribucionBundle\Entity\Paquete $paquete
     * @return Operador
     */
    public function setPaquete(\Frontend\DistribucionBundle\Entity\Paquete $paquete = null)
    {
        $this->paquete = $paquete;
    
        return $this;
    }

    /**
     * Get paquete
     *
     * @return \Frontend\DistribucionBundle\Entity\Paquete 
     */
    public function getPaquete()
    {
        return $this->paquete;
    }
    
  /**
     * Set urlweb
     *
     * @param string $urlweb
     * @return Operador
     */
    public function setUrlweb($urlweb)
    {
        $this->urlweb = $urlweb;
    
        return $this;
    }

    /**
     * Get urlweb
     *
     * @return string 
     */
    public function getUrlweb()
    {
        return $this->urlweb;
    }

    /**
     * Set urlfacebook
     *
     * @param string $urlfacebook
     * @return Operador
     */
    public function setUrlfacebook($urlfacebook)
    {
        $this->urlfacebook = $urlfacebook;
    
        return $this;
    }

    /**
     * Get urlfacebook
     *
     * @return string 
     */
    public function getUrlfacebook()
    {
        return $this->urlfacebook;
    }

    /**
     * Set urltwitter
     *
     * @param string $urltwitter
     * @return Operador
     */
    public function setUrltwitter($urltwitter)
    {
        $this->urltwitter = $urltwitter;
    
        return $this;
    }

    /**
     * Get urltwitter
     *
     * @return string 
     */
    public function getUrltwitter()
    {
        return $this->urltwitter;
    }

    /**
     * Set fecharegistro
     *
     * @param \DateTime $fecharegistro
     * @return Comodato
     */
    public function setFecharegistro($fecharegistro)
    {
        $this->fecharegistro = $fecharegistro;
    
        return $this;
    }

    /**
     * Get fecharegistro
     *
     * @return \DateTime 
     */
    public function getFecharegistro()
    {
        return $this->fecharegistro;
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

    /**
     * Set fechamodificacion
     *
     * @param \DateTime $fechamodificacionabonados
     * @return Comodato
     */
    public function setFechamodificacionabonados($fechamodificacionabonados)
    {
        $this->fechamodificacionabonados = $fechamodificacionabonados;
    
        return $this;
    }

    /**
     * Get fechamodificacion
     *
     * @return \DateTime 
     */
    public function getFechamodificacionabonados()
    {
        return $this->fechamodificacionabonados;
    }
    

    /**
     * Set franjatransmision
     *
     * @param string $franjatransmision
     * @return franjatransmision
     */
    public function setFranjatransmision($franjatransmision)
    {
        $this->franjatransmision = $franjatransmision;
    
        return $this;
    }

    /**
     * Get franjatransmision
     *
     * @return string 
     */
    public function getFranjatransmision()
    {
        return $this->franjatransmision;
    }

    public function __toString()
    {
        return $this->getNombre();
    }
}