<?php

namespace Frontend\ContenidosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Datosproveedor
 *
 * @ORM\Table(name="contenidos.datosproveedor")
 * @ORM\Entity
 */
class Datosproveedor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contenidos.datosproveedor_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="num_identificacionfiscal", type="string", length=30, nullable=true)
     */
    private $numIdentificacionfiscal;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_empresa", type="string", length=500, nullable=true)
     */
    private $direccionEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="oficina1", type="string", length=100, nullable=true)
     */
    private $oficina1;

    /**
     * @var string
     *
     * @ORM\Column(name="oficina2", type="string", length=100, nullable=true)
     */
    private $oficina2;

    /**
     * @var string
     *
     * @ORM\Column(name="movil", type="string", length=100, nullable=true)
     */
    private $movil;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_empresa", type="string", length=60, nullable=true)
     */
    private $correoEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="skype_empresa", type="string", length=60, nullable=true)
     */
    private $skypeEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_repr", type="string", length=60, nullable=true)
     */
    private $nombreRepr;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_repr", type="string", length=60, nullable=true)
     */
    private $apellidoRepr;

    /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="string", length=100, nullable=true)
     */
    private $cargo;

    /**
     * @var string
     *
     * @ORM\Column(name="telfhab", type="string", length=100, nullable=true)
     */
    private $telfhab;

    /**
     * @var string
     *
     * @ORM\Column(name="movil2", type="string", length=100, nullable=true)
     */
    private $movil2;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_repr", type="string", length=60, nullable=true)
     */
    private $correoRepr;

    /**
     * @var string
     *
     * @ORM\Column(name="skype_repr", type="string", length=60, nullable=true)
     */
    private $skypeRepr;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tipo_satelite", type="boolean", nullable=true)
     */
    private $tipoSatelite;

    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Frontend\ContenidosBundle\Entity\Tipoproveedor", inversedBy="idProveedor")
     * @ORM\JoinTable(name="contenidos.proveedor_tipoproveedor",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_proveedor", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_tipoproveedor", referencedColumnName="id")
     *   }
     * )
     */
    private $idTipoproveedor;

    /**
     * @var \Contenidos.tipoproveedor
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Tipoproveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipoprov", referencedColumnName="id")
     * })
     */
    private $idTipoprov;

    /**
     * @var \Distribucion.pais
     *
     * @ORM\ManyToOne(targetEntity="Frontend\DistribucionBundle\Entity\Pais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais", referencedColumnName="id")
     * })
     */
    private $pais;

    /**
     * @var \Contenidos.detalleTipoproveedor
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\DetalleTipoproveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_detalletipoproveedor", referencedColumnName="id")
     * })
     */
    private $idDetalletipoproveedor;

    /**
     * @var \Contenidos.Unidadsolicitante
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Unidadsolicitante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_unidad", referencedColumnName="id")
     * })
     */
    private $idUnidad;

    /**
     * @var string
     *
     * @ORM\Column(name="estatus", type="string", length=1, nullable=true)
     */
    private $estatus;

   /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="date", nullable=true)
     */
    private $fechaRegistro;

    
    /**
     * @var \Usuarios.user
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     * })
     */
    private $usuario;




    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idTipoproveedor = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Datosproveedor
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
     * Set numIdentificacionfiscal
     *
     * @param string $numIdentificacionfiscal
     * @return Datosproveedor
     */
    public function setNumIdentificacionfiscal($numIdentificacionfiscal)
    {
        $this->numIdentificacionfiscal = $numIdentificacionfiscal;
    
        return $this;
    }

    /**
     * Get numIdentificacionfiscal
     *
     * @return string 
     */
    public function getNumIdentificacionfiscal()
    {
        return $this->numIdentificacionfiscal;
    }

    /**
     * Set direccionEmpresa
     *
     * @param string $direccionEmpresa
     * @return Datosproveedor
     */
    public function setDireccionEmpresa($direccionEmpresa)
    {
        $this->direccionEmpresa = $direccionEmpresa;
    
        return $this;
    }

    /**
     * Get direccionEmpresa
     *
     * @return string 
     */
    public function getDireccionEmpresa()
    {
        return $this->direccionEmpresa;
    }

    /**
     * Set oficina1
     *
     * @param integer $oficina1
     * @return Datosproveedor
     */
    public function setOficina1($oficina1)
    {
        $this->oficina1 = $oficina1;
    
        return $this;
    }

    /**
     * Get oficina1
     *
     * @return integer 
     */
    public function getOficina1()
    {
        return $this->oficina1;
    }

    /**
     * Set oficina2
     *
     * @param integer $oficina2
     * @return Datosproveedor
     */
    public function setOficina2($oficina2)
    {
        $this->oficina2 = $oficina2;
    
        return $this;
    }

    /**
     * Get oficina2
     *
     * @return integer 
     */
    public function getOficina2()
    {
        return $this->oficina2;
    }

    /**
     * Set movil
     *
     * @param integer $movil
     * @return Datosproveedor
     */
    public function setMovil($movil)
    {
        $this->movil = $movil;
    
        return $this;
    }

    /**
     * Get movil
     *
     * @return integer 
     */
    public function getMovil()
    {
        return $this->movil;
    }

    /**
     * Set correoEmpresa
     *
     * @param string $correoEmpresa
     * @return Datosproveedor
     */
    public function setCorreoEmpresa($correoEmpresa)
    {
        $this->correoEmpresa = $correoEmpresa;
    
        return $this;
    }

    /**
     * Get correoEmpresa
     *
     * @return string 
     */
    public function getCorreoEmpresa()
    {
        return $this->correoEmpresa;
    }

    /**
     * Set skypeEmpresa
     *
     * @param string $skypeEmpresa
     * @return Datosproveedor
     */
    public function setSkypeEmpresa($skypeEmpresa)
    {
        $this->skypeEmpresa = $skypeEmpresa;
    
        return $this;
    }

    /**
     * Get skypeEmpresa
     *
     * @return string 
     */
    public function getSkypeEmpresa()
    {
        return $this->skypeEmpresa;
    }

    /**
     * Set nombreRepr
     *
     * @param string $nombreRepr
     * @return Datosproveedor
     */
    public function setNombreRepr($nombreRepr)
    {
        $this->nombreRepr = $nombreRepr;
    
        return $this;
    }

    /**
     * Get nombreRepr
     *
     * @return string 
     */
    public function getNombreRepr()
    {
        return $this->nombreRepr;
    }

    /**
     * Set apellidoRepr
     *
     * @param string $apellidoRepr
     * @return Datosproveedor
     */
    public function setApellidoRepr($apellidoRepr)
    {
        $this->apellidoRepr = $apellidoRepr;
    
        return $this;
    }

    /**
     * Get apellidoRepr
     *
     * @return string 
     */
    public function getApellidoRepr()
    {
        return $this->apellidoRepr;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     * @return Datosproveedor
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
     * Set telfhab
     *
     * @param integer $telfhab
     * @return Datosproveedor
     */
    public function setTelfhab($telfhab)
    {
        $this->telfhab = $telfhab;
    
        return $this;
    }

    /**
     * Get telfhab
     *
     * @return integer 
     */
    public function getTelfhab()
    {
        return $this->telfhab;
    }

    /**
     * Set movil2
     *
     * @param integer $movil2
     * @return Datosproveedor
     */
    public function setMovil2($movil2)
    {
        $this->movil2 = $movil2;
    
        return $this;
    }

    /**
     * Get movil2
     *
     * @return integer 
     */
    public function getMovil2()
    {
        return $this->movil2;
    }

    /**
     * Set correoRepr
     *
     * @param string $correoRepr
     * @return Datosproveedor
     */
    public function setCorreoRepr($correoRepr)
    {
        $this->correoRepr = $correoRepr;
    
        return $this;
    }

    /**
     * Get correoRepr
     *
     * @return string 
     */
    public function getCorreoRepr()
    {
        return $this->correoRepr;
    }

    /**
     * Set skypeRepr
     *
     * @param string $skypeRepr
     * @return Datosproveedor
     */
    public function setSkypeRepr($skypeRepr)
    {
        $this->skypeRepr = $skypeRepr;
    
        return $this;
    }

    /**
     * Get skypeRepr
     *
     * @return string 
     */
    public function getSkypeRepr()
    {
        return $this->skypeRepr;
    }

    /**
     * Set tipoSatelite
     *
     * @param boolean $tipoSatelite
     * @return Datosproveedor
     */
    public function setTipoSatelite($tipoSatelite)
    {
        $this->tipoSatelite = $tipoSatelite;
    
        return $this;
    }

    /**
     * Get tipoSatelite
     *
     * @return boolean 
     */
    public function getTipoSatelite()
    {
        return $this->tipoSatelite;
    }

    /**
     * Add idTipoproveedor
     *
     * @param \Frontend\ContenidosBundle\Entity\Tipoproveedor $idTipoproveedor
     * @return Datosproveedor
     */
    public function addIdTipoproveedor(\Frontend\ContenidosBundle\Entity\Tipoproveedor $idTipoproveedor)
    {
        $this->idTipoproveedor[] = $idTipoproveedor;
    
        return $this;
    }

    /**
     * Remove idTipoproveedor
     *
     * @param \Frontend\ContenidosBundle\Entity\Tipoproveedor $idTipoproveedor
     */
    public function removeIdTipoproveedor(\Frontend\ContenidosBundle\Entity\Tipoproveedor $idTipoproveedor)
    {
        $this->idTipoproveedor->removeElement($idTipoproveedor);
    }

    /**
     * Get idTipoproveedor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdTipoproveedor()
    {
        return $this->idTipoproveedor;
    }

    /**
     * Set idTipoprov
     *
     * @param \Frontend\ContenidosBundle\Entity\Tipoproveedor $idTipoprov
     * @return Datosproveedor
     */
    public function setIdTipoprov(\Frontend\ContenidosBundle\Entity\Tipoproveedor $idTipoprov = null)
    {
        $this->idTipoprov = $idTipoprov;
    
        return $this;
    }

    /**
     * Get idTipoprov
     *
     * @return \Frontend\ContenidosBundle\Entity\Tipoproveedor 
     */
    public function getIdTipoprov()
    {
        return $this->idTipoprov;
    }

    /**
     * Set pais
     *
     * @param \Frontend\DistribucionBundle\Entity\Pais $pais
     * @return Datosproveedor
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
     * Set idDetalletipoproveedor
     *
     * @param \Frontend\ContenidosBundle\Entity\DetalleTipoproveedor $idDetalletipoproveedor
     * @return Datosproveedor
     */
    public function setIdDetalletipoproveedor(\Frontend\ContenidosBundle\Entity\DetalleTipoproveedor $idDetalletipoproveedor = null)
    {
        $this->idDetalletipoproveedor = $idDetalletipoproveedor;
    
        return $this;
    }

    /**
     * Get idDetalletipoproveedor
     *
     * @return \Frontend\ContenidosBundle\Entity\DetalleTipoproveedor 
     */
    public function getIdDetalletipoproveedor()
    {
        return $this->idDetalletipoproveedor;
    }

    /**
     * Set idUnidad
     *
     * @param \Frontend\ContenidosBundle\Entity\Unidadsolicitante $idUnidad
     * @return Datosproveedor
     */
    public function setIdUnidad(\Frontend\ContenidosBundle\Entity\Unidadsolicitante $idUnidad = null)
    {
        $this->idUnidad = $idUnidad;
    
        return $this;
    }

    /**
     * Get idUnidad
     *
     * @return \Frontend\ContenidosBundle\Entity\Unidadsolicitante 
     */
    public function getIdUnidad()
    {
        return $this->idUnidad;
    }

    /**
     * Set estatus
     *
     * @param string $estatus
     * @return Datosproveedor
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    
        return $this;
    }

    /**
     * Get estatus
     *
     * @return string 
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     * @return Contratacion
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
    
        return $this;
    }
    /**
     * Get fechaRegistro
     *
     * @return \DateTime 
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }


    /**
     * Set usuario
     *
     * @param \Administracion\UsuarioBundle\Entity\User $usuario
     * @return Licencias
     */
    public function setUsuario(\Administracion\UsuarioBundle\Entity\User $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Administracion\UsuarioBundle\Entity\User 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }






    public function __toString()
    {
        return $this->getNombre();
    }
}