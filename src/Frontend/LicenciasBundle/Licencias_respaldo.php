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
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=250, nullable=false)
     */
    private $nombre;

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
     * @ORM\Column(name="descripcion", type="string", length=500, nullable=false)
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
     * @ORM\Column(name="tipo", type="string", length=1, nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=30, nullable=false)
     */
    private $codigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_dependencia", type="integer", nullable=false)
     */
    private $idDependencia;

    /**
     * @var \Usuarios.perfil
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="perfil_id", referencedColumnName="id")
     * })
     */
    private $perfil;



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
     * Set idDependencia
     *
     * @param integer $idDependencia
     * @return Licencias
     */
    public function setIdDependencia($idDependencia)
    {
        $this->idDependencia = $idDependencia;
    
        return $this;
    }

    /**
     * Get idDependencia
     *
     * @return integer 
     */
    public function getIdDependencia()
    {
        return $this->idDependencia;
    }

    /**
     * Set perfil
     *
     * @param \Administracion\UsuarioBundle\Entity\Perfil $perfil
     * @return Licencias
     */
    public function setPerfil(\Administracion\UsuarioBundle\Entity\Perfil $perfil = null)
    {
        $this->perfil = $perfil;
    
        return $this;
    }

    /**
     * Get perfil
     *
     * @return \Administracion\UsuarioBundle\Entity\Perfil 
     */
    public function getPerfil()
    {
        return $this->perfil;
    }
    public function __toString()
    {
        return $this->getNombre();
    }
}