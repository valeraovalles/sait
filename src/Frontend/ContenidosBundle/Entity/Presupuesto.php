<?php

namespace Frontend\ContenidosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Presupuesto
 *
 * @ORM\Table(name="contenidos.presupuesto")
 * @ORM\Entity
 */
class Presupuesto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contenidos.presupuesto_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=100, nullable=true)
     * @Assert\NotBlank()
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=10, nullable=true)
     */
    private $codigo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=false)
     * @Assert\NotBlank()
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=false)
     * @Assert\NotBlank()
     */
    private $fechaFin;

    /**
     * @var float
     *
     * @ORM\Column(name="monto_dolares", type="decimal", nullable=true)
     */
    private $montoDolares;

    /**
     * @var float
     *
     * @ORM\Column(name="monto_euros", type="decimal", nullable=true)
     */
    private $montoEuros;

    /**
     * @var float
     *
     * @ORM\Column(name="monto_bs", type="decimal", nullable=false)
     * @Assert\NotBlank()
     */
    private $montoBs;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=1, nullable=true)
     */
    private $tipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_presext", type="integer", nullable=true)
     */
    private $idPresext;

    /**
     * @var \Contenidos.datosproveedor
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Datosproveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proveedor", referencedColumnName="id")
     * })
     */
    private $idProveedor;

    /**
     * @var float
     *
     * @ORM\Column(name="disponibilidad", type="decimal", nullable=true)
     */
    private $disponibilidad;

    /**
     * @var boolean
     *
     * @ORM\Column(name="signo", type="boolean", nullable=true)
     */
    private $signo;


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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Presupuesto
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
     * Set codigo
     *
     * @param string $codigo
     * @return Presupuesto
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
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Presupuesto
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    
        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Presupuesto
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    
        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set montoDolares
     *
     * @param float $montoDolares
     * @return Presupuesto
     */
    public function setMontoDolares($montoDolares)
    {
        $this->montoDolares = $montoDolares;
    
        return $this;
    }

    /**
     * Get montoDolares
     *
     * @return float 
     */
    public function getMontoDolares()
    {
        return $this->montoDolares;
    }

    /**
     * Set montoEuros
     *
     * @param float $montoEuros
     * @return Presupuesto
     */
    public function setMontoEuros($montoEuros)
    {
        $this->montoEuros = $montoEuros;
    
        return $this;
    }

    /**
     * Get montoEuros
     *
     * @return float 
     */
    public function getMontoEuros()
    {
        return $this->montoEuros;
    }

    /**
     * Set montoBs
     *
     * @param float $montoBs
     * @return Presupuesto
     */
    public function setMontoBs($montoBs)
    {
        $this->montoBs = $montoBs;
    
        return $this;
    }

    /**
     * Get montoBs
     *
     * @return float 
     */
    public function getMontoBs()
    {
        return $this->montoBs;
    }

    /**
     * Set tipo
     *
     * @param boolean $tipo
     * @return Presupuesto
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     * @return boolean 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set idPresext
     *
     * @param integer $idPresext
     * @return Presupuesto
     */
    public function setIdPresext($idPresext)
    {
        $this->idPresext = $idPresext;
    
        return $this;
    }

    /**
     * Get idPresext
     * @return integer 
     */
    public function getIdPresext()
    {
        return $this->idPresext;
    }


    /**
     * Set idProveedor
     *
     * @param \Frontend\ContenidosBundle\Entity\Datosproveedor $idProveedor
     * @return Banco
     */
    public function setIdProveedor(\Frontend\ContenidosBundle\Entity\Datosproveedor $idProveedor = null)
    {
        $this->idProveedor = $idProveedor;
    
        return $this;
    }

    /**
     * Get idProveedor
     *
     * @return \Frontend\ContenidosBundle\Entity\Datosproveedor 
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * Set disponibilidad
     *
     * @param float $disponibilidad
     * @return Presupuesto
     */
    public function setDisponibilidad($disponibilidad)
    {
        $this->disponibilidad = $disponibilidad;
    
        return $this;
    }

    /**
     * Get disponibilidad
     *
     * @return float 
     */
    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }
    
    /**
     * Set signo
     *
     * @param boolean $signo
     * @return Contratacion
     */
    public function setSigno($signo)
    {
        $this->signo = $signo;
    
        return $this;
    }

    /**
     * Get signo
     *
     * @return boolean 
     */
    public function getSigno()
    {
        return $this->signo;
    }

    public function __toString()
    {
        return $this->getDescripcion();
    }


}