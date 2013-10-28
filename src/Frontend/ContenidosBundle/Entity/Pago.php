<?php

namespace Frontend\ContenidosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Pago
 *
 * @ORM\Table(name="contenidos.pago")
 * @ORM\Entity
 */
class Pago
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contenidos.pago_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="num_memo", type="string", length=30, nullable=false)
     * @Assert\NotBlank()
     */
    private $numMemo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_unidadejec", type="date", nullable=false)
     * @Assert\NotBlank()
     */
    private $fechaUnidadejec;

    /**
     * @var string
     *
     * @ORM\Column(name="num_factura", type="string", length=30, nullable=false)
     * @Assert\NotBlank()
     */
    private $numFactura;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_factura", type="date", nullable=false)
     * @Assert\NotBlank()
     */
    private $fechaFactura;

    /**
     * @var float
     *
     * @ORM\Column(name="monto_me", type="decimal", nullable=false)
     */

    private $montoMe;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tipo_moneda", type="boolean", nullable=true)
     */
    private $tipoMoneda;    

    /**
     * @var float
     *
     * @ORM\Column(name="monto_bs", type="decimal", nullable=false)
     * @Assert\NotBlank()
     */
    private $montoBs;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tipo_pago", type="boolean", nullable=true)
     * @Assert\NotBlank()
     */
    private $tipoPago;

    /**
     * @var string
     *
     * @ORM\Column(name="num_pago", type="string", length=30, nullable=false)
     */
    private $numPago;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_pago", type="date", nullable=false)
     */
    private $fechaPago;

    /**
     * @var boolean
     *
     * @ORM\Column(name="contra_entrega", type="boolean", nullable=true)
     */
    private $contraEntrega;

    /**
     * @var \Contenidos.diasentrega
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Diasentrega")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dias_entrega", referencedColumnName="id")
     * })
     */
    private $diasEntrega;

    /**
     * @var \Contenidos.unidadejecutora
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Unidadejecutora")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_unidadejec", referencedColumnName="id")
     * })
     */
    private $idUnidadejec;

    /**
     * @var \Contenidos.datosproveedor
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Contratacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contratacion", referencedColumnName="id")
     * })
     */
    private $idContratacion;



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
     * Set numMemo
     *
     * @param string $numMemo
     * @return Pago
     */
    public function setNumMemo($numMemo)
    {
        $this->numMemo = $numMemo;
    
        return $this;
    }

    /**
     * Get numMemo
     *
     * @return string 
     */
    public function getNumMemo()
    {
        return $this->numMemo;
    }

    /**
     * Set fechaUnidadejec
     *
     * @param \DateTime $fechaUnidadejec
     * @return Pago
     */
    public function setFechaUnidadejec($fechaUnidadejec)
    {
        $this->fechaUnidadejec = $fechaUnidadejec;
    
        return $this;
    }

    /**
     * Get fechaUnidadejec
     *
     * @return \DateTime 
     */
    public function getFechaUnidadejec()
    {
        return $this->fechaUnidadejec;
    }

    /**
     * Set numFactura
     *
     * @param string $numFactura
     * @return Pago
     */
    public function setNumFactura($numFactura)
    {
        $this->numFactura = $numFactura;
    
        return $this;
    }

    /**
     * Get numFactura
     *
     * @return string 
     */
    public function getNumFactura()
    {
        return $this->numFactura;
    }

    /**
     * Set fechaFactura
     *
     * @param \DateTime $fechaFactura
     * @return Pago
     */
    public function setFechaFactura($fechaFactura)
    {
        $this->fechaFactura = $fechaFactura;
    
        return $this;
    }

    /**
     * Get fechaFactura
     *
     * @return \DateTime 
     */
    public function getFechaFactura()
    {
        return $this->fechaFactura;
    }

    /**
     * Set montoMe
     *
     * @param float $montoMe
     * @return Pago
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
     * @return Pago
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
     * Set tipoPago
     *
     * @param boolean $tipoPago
     * @return Pago
     */
    public function setTipoPago($tipoPago)
    {
        $this->tipoPago = $tipoPago;
    
        return $this;
    }

    /**
     * Get tipoPago
     *
     * @return boolean 
     */
    public function getTipoPago()
    {
        return $this->tipoPago;
    }

    /**
     * Set tipoMoneda
     *
     * @param boolean $tipoMoneda
     * @return Pago
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
     * Set numPago
     *
     * @param string $numPago
     * @return Pago
     */
    public function setNumPago($numPago)
    {
        $this->numPago = $numPago;
    
        return $this;
    }

    /**
     * Get numPago
     *
     * @return string 
     */
    public function getNumPago()
    {
        return $this->numPago;
    }

    /**
     * Set fechaPago
     *
     * @param \DateTime $fechaPago
     * @return Pago
     */
    public function setFechaPago($fechaPago)
    {
        $this->fechaPago = $fechaPago;
    
        return $this;
    }

    /**
     * Get fechaPago
     *
     * @return \DateTime 
     */
    public function getFechaPago()
    {
        return $this->fechaPago;
    }

    /**
     * Set contraEntrega
     *
     * @param boolean $contraEntrega
     * @return Pago
     */
    public function setContraEntrega($contraEntrega)
    {
        $this->contraEntrega = $contraEntrega;
    
        return $this;
    }

    /**
     * Get contraEntrega
     *
     * @return boolean 
     */
    public function getContraEntrega()
    {
        return $this->contraEntrega;
    }

    /**
     * Set diasEntrega
     *
     * @param \Frontend\ContenidosBundle\Entity\Diasentrega $diasEntrega
     * @return Pago
     */
    public function setDiasEntrega(\Frontend\ContenidosBundle\Entity\Diasentrega $diasEntrega = null)
    {
        $this->diasEntrega = $diasEntrega;
    
        return $this;
    }

    /**
     * Get diasEntrega
     *
     * @return \Frontend\ContenidosBundle\Entity\Diasentrega 
     */
    public function getDiasEntrega()
    {
        return $this->diasEntrega;
    }

    /**
     * Set idUnidadejec
     *
     * @param \Frontend\ContenidosBundle\Entity\Unidadejecutora $idUnidadejec
     * @return Pago
     */
    public function setIdUnidadejec(\Frontend\ContenidosBundle\Entity\Unidadejecutora $idUnidadejec = null)
    {
        $this->idUnidadejec = $idUnidadejec;
    
        return $this;
    }

    /**
     * Get idUnidadejec
     *
     * @return \Frontend\ContenidosBundle\Entity\Unidadejecutora 
     */
    public function getIdUnidadejec()
    {
        return $this->idUnidadejec;
    }

    /**
     * Set idContratacion
     *
     * @param \Frontend\ContenidosBundle\Entity\Contratacion $idContratacion
     * @return Pago
     */
    public function setIdContratacion(\Frontend\ContenidosBundle\Entity\Contratacion $idContratacion = null)
    {
        $this->idContratacion = $idContratacion;
    
        return $this;
    }

    /**
     * Get idContratacion
     *
     * @return \Frontend\ContenidosBundle\Entity\Contratacion 
     */
    public function getIdContratacionContratacion()
    {
        return $this->idContratacion;
    }
}