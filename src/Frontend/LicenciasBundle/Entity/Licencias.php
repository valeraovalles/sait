<?php

namespace Frontend\LicenciasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Licencias
 *
 * @ORM\Table(name="licencias.licencias")
 * @ORM\Entity
 */
class Licencias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="licencias.licencias_id_seq", allocationSize=1, initialValue=1)
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=500, nullable=false)
     */
    protected $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=20, nullable=false)
     */
    private $codigo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_compra", type="date", nullable=false)
     */
    private $fechaCompra;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_vencimiento", type="date", nullable=false)
     */
    private $fechaVencimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=250, nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="bandera_correo", type="integer", nullable=true)
     */
    private $banderaCorreo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=1, nullable=true)
     */
    private $tipo;

    /**
     * @var \Usuarios.user
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\User")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * @var \Usuarios.depend
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Depend")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="depend", referencedColumnName="id")
     * })
     */
    private $depend;



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
     * @return Licencias
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
     * Set codigo
     *
     * @param string $codigo
     * @return Licencias
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    
        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set fechaCompra
     *
     * @param \DateTime $fechaCompra
     * @return Licencias
     */
    public function setFechaCompra($fechaCompra)
    {
        $this->fechaCompra = $fechaCompra;
    
        return $this;
    }

    /**
     * Get fechaCompra
     *
     * @return \DateTime 
     */
    public function getFechaCompra()
    {
        return $this->fechaCompra;
    }

    /**
     * Set fechaVencimiento
     *
     * @param \DateTime $fechaVencimiento
     * @return Licencias
     */
    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;
    
        return $this;
    }

    /**
     * Get fechaVencimiento
     *
     * @return \DateTime 
     */
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Licencias
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set banderaCorreo
     *
     * @param integer $banderaCorreo
     * @return Licencias
     */
    public function setBanderaCorreo($banderaCorreo)
    {
        $this->banderaCorreo = $banderaCorreo;
    
        return $this;
    }

    /**
     * Get banderaCorreo
     *
     * @return integer 
     */
    public function getBanderaCorreo()
    {
        return $this->banderaCorreo;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Licencias
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
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

    /**
     * Set 
     *
     * @param \Administracion\UsuarioBundle\Entity\Depend $depend
     * @return Licencias
     */
    public function setDepend(\Administracion\UsuarioBundle\Entity\Depend $depend = null)
    {
        $this->depend = $depend;
        return $this;
    }

    /**
     * Get depend
     *
     * @return \Administracion\UsuarioBundle\Entity\Depend 
     */
    public function getDepend()
    {
        return $this->depend;
    }

    public function serialize()
    {
       return serialize($this->getId());
    }
 
    public function unserialize($data)
    {
        $this->id = unserialize($data);
    }

}