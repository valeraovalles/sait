<?php

namespace Frontend\ContenidosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=false)
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=false)
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
     */
    private $montoBs;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
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
     * Set idProveedor
     *
     * @param \Frontend\ContenidosBundle\Entity\Datosproveedor $idProveedor
     * @return Presupuesto
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
}