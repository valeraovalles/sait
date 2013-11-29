<?php

namespace Frontend\ContenidosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contratacion
 *
 * @ORM\Table(name="contenidos.contratacion")
 * @ORM\Entity
 */
class Contratacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contenidos.contratacion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="concepto", type="string", length=300, nullable=false)
     * @Assert\NotBlank()
     */
    private $concepto;


    /**
     * @var integer
     *
     * @ORM\Column(name="tipo_moneda", type="integer", nullable=false)
     */
    private $tipoMoneda;

    /**
     * @var float
     *
     * @ORM\Column(name="monto_me", type="decimal", nullable=true)
     */
    private $montoMe;

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
     * @ORM\Column(name="num_solicitud", type="string", length=30, nullable=false)
     * @Assert\NotBlank()
     */
    private $numSolicitud;

    /**
     * @var string
     *
     * @ORM\Column(name="num_conformacion", type="string", length=30, nullable=false)
     */
    private $numConformacion;

    /**
     * @var string
     *
     * @ORM\Column(name="num_puntocuenta", type="string", length=30, nullable=false)
     * @Assert\NotBlank()
     */
    private $numPuntocuenta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_punto", type="date", nullable=false)
     * @Assert\NotBlank()
     */
    private $fechaPunto;

    /**
     * @var string
     *
     * @ORM\Column(name="num_alcance", type="string", length=30, nullable=false)
     * @Assert\NotBlank()
     */
    private $numAlcance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alcance", type="date", nullable=false)
     * @Assert\NotBlank()
     */
    private $fechaAlcance;

    /**
     * @var string
     *
     * @ORM\Column(name="num_contrato", type="string", length=30, nullable=false)
     * @Assert\NotBlank()
     */
    private $numContrato;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_contrato", type="date", nullable=false)
     * @Assert\NotBlank()
     */
    private $fechaContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="num_addendum", type="string", length=30, nullable=false)
     */
    private $numAddendum;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_addendum", type="date", nullable=false)
     */
    private $fechaAddendum;

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
     * @var string
     *
     * @ORM\Column(name="observaciones_compras", type="string", length=500, nullable=true)
     */
    private $observacionesCompras;

    /**
     * @var \Contenidos.analista
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Analista")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="analista_compras", referencedColumnName="id")
     * })
     */
    private $analistaCompras;

    /**
     * @var \Contenidos.presupuesto
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Presupuesto")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="id_presupuesto", referencedColumnName="id")
     * })
     */
    private $idPresupuesto;

    /**
     * @var float
     *
     * @ORM\Column(name="debe_bs", type="decimal", nullable=true)
     */
    private $debeBs;

    /**
     * @var float
     *
     * @ORM\Column(name="debe_me", type="decimal", nullable=true)
     */
    private $debeMe;




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
     * Set concepto
     *
     * @param string $concepto
     * @return Contratacion
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;
    
        return $this;
    }

    /**
     * Get concepto
     *
     * @return string 
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set tipoMoneda
     *
     * @param boolean $tipoMoneda
     * @return Contratacion
     */
    public function setTipoMoneda($tipoMoneda)
    {
        $this->tipoMoneda = $tipoMoneda;
    
        return $this;
    }

    /**
     * Get tipoMoneda
     *
     * @return boolean 
     */
    public function getTipoMoneda()
    {
        return $this->tipoMoneda;
    }

    /**
     * Set montoMe
     *
     * @param float $montoMe
     * @return Contratacion
     */
    public function setMontoMe($montoMe)
    {
        $this->montoMe = $montoMe;
    
        return $this;
    }

    /**
     * Get montoMe
     *
     * @return float 
     */
    public function getMontoMe()
    {
        return $this->montoMe;
    }

    /**
     * Set montoBs
     *
     * @param float $montoBs
     * @return Contratacion
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
     * Set numSolicitud
     *
     * @param string $numSolicitud
     * @return Contratacion
     */
    public function setNumSolicitud($numSolicitud)
    {
        $this->numSolicitud = $numSolicitud;
    
        return $this;
    }

    /**
     * Get numSolicitud
     *
     * @return string 
     */
    public function getNumSolicitud()
    {
        return $this->numSolicitud;
    }

    /**
     * Set numConformacion
     *
     * @param string $numConformacion
     * @return Contratacion
     */
    public function setNumConformacion($numConformacion)
    {
        $this->numConformacion = $numConformacion;
    
        return $this;
    }

    /**
     * Get numConformacion
     *
     * @return string 
     */
    public function getNumConformacion()
    {
        return $this->numConformacion;
    }

    /**
     * Set numPuntocuenta
     *
     * @param string $numPuntocuenta
     * @return Contratacion
     */
    public function setNumPuntocuenta($numPuntocuenta)
    {
        $this->numPuntocuenta = $numPuntocuenta;
    
        return $this;
    }

    /**
     * Get numPuntocuenta
     *
     * @return string 
     */
    public function getNumPuntocuenta()
    {
        return $this->numPuntocuenta;
    }

    /**
     * Set fechaPunto
     *
     * @param \DateTime $fechaPunto
     * @return Contratacion
     */
    public function setFechaPunto($fechaPunto)
    {
        $this->fechaPunto = $fechaPunto;
    
        return $this;
    }

    /**
     * Get fechaPunto
     *
     * @return \DateTime 
     */
    public function getFechaPunto()
    {
        return $this->fechaPunto;
    }

    /**
     * Set numAlcance
     *
     * @param string $numAlcance
     * @return Contratacion
     */
    public function setNumAlcance($numAlcance)
    {
        $this->numAlcance = $numAlcance;
    
        return $this;
    }

    /**
     * Get numAlcance
     *
     * @return string 
     */
    public function getNumAlcance()
    {
        return $this->numAlcance;
    }

    /**
     * Set fechaAlcance
     *
     * @param \DateTime $fechaAlcance
     * @return Contratacion
     */
    public function setFechaAlcance($fechaAlcance)
    {
        $this->fechaAlcance = $fechaAlcance;
    
        return $this;
    }

    /**
     * Get fechaAlcance
     *
     * @return \DateTime 
     */
    public function getFechaAlcance()
    {
        return $this->fechaAlcance;
    }

    /**
     * Set numContrato
     *
     * @param string $numContrato
     * @return Contratacion
     */
    public function setNumContrato($numContrato)
    {
        $this->numContrato = $numContrato;
    
        return $this;
    }

    /**
     * Get numContrato
     *
     * @return string 
     */
    public function getNumContrato()
    {
        return $this->numContrato;
    }

    /**
     * Set fechaContrato
     *
     * @param \DateTime $fechaContrato
     * @return Contratacion
     */
    public function setFechaContrato($fechaContrato)
    {
        $this->fechaContrato = $fechaContrato;
    
        return $this;
    }

    /**
     * Get fechaContrato
     *
     * @return \DateTime 
     */
    public function getFechaContrato()
    {
        return $this->fechaContrato;
    }

    /**
     * Set numAddendum
     *
     * @param string $numAddendum
     * @return Contratacion
     */
    public function setNumAddendum($numAddendum)
    {
        $this->numAddendum = $numAddendum;
    
        return $this;
    }

    /**
     * Get numAddendum
     *
     * @return string 
     */
    public function getNumAddendum()
    {
        return $this->numAddendum;
    }

    /**
     * Set fechaAddendum
     *
     * @param \DateTime $fechaAddendum
     * @return Contratacion
     */
    public function setFechaAddendum($fechaAddendum)
    {
        $this->fechaAddendum = $fechaAddendum;
    
        return $this;
    }

    /**
     * Get fechaAddendum
     *
     * @return \DateTime 
     */
    public function getFechaAddendum()
    {
        return $this->fechaAddendum;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Contratacion
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
     * @return Contratacion
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
     * Set observacionesCompras
     *
     * @param string $observacionesCompras
     * @return Contratacion
     */
    public function setObservacionesCompras($observacionesCompras)
    {
        $this->observacionesCompras = $observacionesCompras;
    
        return $this;
    }

    /**
     * Get observacionesCompras
     *
     * @return string 
     */
    public function getObservacionesCompras()
    {
        return $this->observacionesCompras;
    }

    /**
     * Set analistaCompras
     *
     * @param \Frontend\ContenidosBundle\Entity\Analista $analistaCompras
     * @return Contratacion
     */
    public function setAnalistaCompras(\Frontend\ContenidosBundle\Entity\Analista $analistaCompras = null)
    {
        $this->analistaCompras = $analistaCompras;
    
        return $this;
    }

    /**
     * Get analistaCompras
     *
     * @return \Frontend\ContenidosBundle\Entity\Analista 
     */
    public function getAnalistaCompras()
    {
        return $this->analistaCompras;
    }

    /**
     * Set idPresupuesto
     *
     * @param \Frontend\ContenidosBundle\Entity\Presupuesto $idPresupuesto
     * @return Contratacion
     */
    public function setIdPresupuesto(\Frontend\ContenidosBundle\Entity\Presupuesto $idPresupuesto = null)
    {
        $this->idPresupuesto = $idPresupuesto;
    
        return $this;
    }

    /**
     * Get idPresupuesto
     *
     * @return \Frontend\ContenidosBundle\Entity\Presupuesto 
     */
    public function getIdPresupuesto()
    {
        return $this->idPresupuesto;
    }

    /**
     * Set debeBs
     *
     * @param float $debeBs
     * @return Contratacion
     */
    public function setDebeBs($debeBs)
    {
        $this->debeBs = $debeBs;
    
        return $this;
    }

    /**
     * Get debeBs
     *
     * @return float 
     */
    public function getDebeBs()
    {
        return $this->debeBs;
    }

    /**
     * Set debeMe
     *
     * @param float $debeMe
     * @return Contratacion
     */
    public function setDebeMe($debeMe)
    {
        $this->debeMe = $debeMe;
    
        return $this;
    }

    /**
     * Get debeMe
     *
     * @return float 
     */
    public function getDebeMe()
    {
        return $this->debeMe;
    }


    public function __toString()
    {
        return $this->getConcepto();
    }
}