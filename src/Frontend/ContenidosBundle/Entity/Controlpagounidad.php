<?php

namespace Frontend\ContenidosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Controlpagounidad
 *
 * @ORM\Table(name="contenidos.controlpagounidad")
 * @ORM\Entity
 */
class Controlpagounidad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contenidos.controlpagounidad_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var \Contenidos.unidadadministrativa
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Unidadejecutora")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ejecutora", referencedColumnName="id")
     * })
     */
    private $idEjecutora;

    /**
     * @var \Contenidos.unidadadministrativa
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Contratacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_contratacion", referencedColumnName="id")
     * })
     */
    private $idContratacion;


    /**
     * @var \Contenidos.pago
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Pago")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pago", referencedColumnName="id")
     * })
     */
    private $idPago;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_unidaduno", type="date", nullable=true)
     */
    private $fechaUnidaduno;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_unidaddos", type="date", nullable=true)
     */
    private $fechaUnidaddos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_unidadtres", type="date", nullable=true)
     */
    private $fechaUnidadtres;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_unidadcuatro", type="date", nullable=true)
     */
    private $fechaUnidadcuatro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_unidadcinco", type="date", nullable=true)
     */
    private $fechaUnidadcinco;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_unidadseis", type="date", nullable=true)
     */
    private $fechaUnidadseis;    



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
     * Set status
     *
     * @param integer $status
     * @return Controlpagounidad
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set idEjecutora
     *
     * @param \Frontend\ContenidosBundle\Entity\Unidadejecutora $idEjecutora
     * @return Controlpagounidad
     */
    public function setIdEjecutora(\Frontend\ContenidosBundle\Entity\Unidadejecutora $idEjecutora = null)
    {
        $this->idEjecutora = $idEjecutora;
    
        return $this;
    }

    /**
     * Get idEjecutora
     *
     * @return \Frontend\ContenidosBundle\Entity\Unidadejecutora 
     */
    public function getIdEjecutora()
    {
        return $this->idEjecutora;
    }

    /**
     * Set idContratacion
     *
     * @param \Frontend\ContenidosBundle\Entity\Contratacion $idContratacion
     * @return Controlpagounidad
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
    public function getIdContratacion()
    {
        return $this->idContratacion;
    }

    /**
     * Set idPago
     *
     * @param \Frontend\ContenidosBundle\Entity\Pago $idPago
     * @return Controlpagounidad
     */
    public function setIdPago(\Frontend\ContenidosBundle\Entity\Pago $idPago = null)
    {
        $this->idPago = $idPago;
    
        return $this;
    }

    /**
     * Get idPago
     *
     * @return \Frontend\ContenidosBundle\Entity\Pago 
     */
    public function getIdPago()
    {
        return $this->idPago;
    }

    /**
     * Set fechaUnidaduno
     *
     * @param \DateTime $fechaUnidaduno
     * @return Controlpagounidad
     */
    public function setFechaUnidaduno($fechaUnidaduno)
    {
        $this->fechaUnidaduno = $fechaUnidaduno;
    
        return $this;
    }

    /**
     * Get fechaUnidaduno
     *
     * @return \DateTime 
     */
    public function getFechaUnidaduno()
    {
        return $this->fechaUnidaduno;
    }

    /**
     * Set fechaUnidaddos
     *
     * @param \DateTime $fechaUnidaddos
     * @return Controlpagounidad
     */
    public function setFechaUnidaddos($fechaUnidaddos)
    {
        $this->fechaUnidaddos = $fechaUnidaddos;
    
        return $this;
    }

    /**
     * Get fechaUnidaddos
     *
     * @return \DateTime 
     */
    public function getFechaUnidaddos()
    {
        return $this->fechaUnidaddos;
    }

    /**
     * Set fechaUnidadtres
     *
     * @param \DateTime $fechaUnidadtres
     * @return Controlpagounidad
     */
    public function setFechaUnidadtres($fechaUnidadtres)
    {
        $this->fechaUnidadtres = $fechaUnidadtres;
    
        return $this;
    }

    /**
     * Get fechaUnidadtres
     *
     * @return \DateTime 
     */
    public function getFechaUnidadtres()
    {
        return $this->fechaUnidadtres;
    }

    /**
     * Set fechaUnidadcuatro
     *
     * @param \DateTime $fechaUnidadcuatro
     * @return Controlpagounidad
     */
    public function setFechaUnidadcuatro($fechaUnidadcuatro)
    {
        $this->fechaUnidadcuatro = $fechaUnidadcuatro;
    
        return $this;
    }

    /**
     * Get fechaUnidadcuatro
     *
     * @return \DateTime 
     */
    public function getFechaUnidadcuatro()
    {
        return $this->fechaUnidadcuatro;
    }

    /**
     * Set fechaUnidadcinco
     *
     * @param \DateTime $fechaUnidadcinco
     * @return Controlpagounidad
     */
    public function setFechaUnidadcinco($fechaUnidadcinco)
    {
        $this->fechaUnidadcinco = $fechaUnidadcinco;
    
        return $this;
    }

    /**
     * Get fechaUnidadcinco
     *
     * @return \DateTime 
     */
    public function getFechaUnidadcinco()
    {
        return $this->fechaUnidadcinco;
    }


    /**
     * Set fechaUnidadseis
     *
     * @param \DateTime $fechaUnidadseis
     * @return Controlpagounidad
     */
    public function setFechaUnidadseis($fechaUnidadseis)
    {
        $this->fechaUnidadseis = $fechaUnidadseis;
    
        return $this;
    }

    /**
     * Get fechaUnidadseis
     *
     * @return \DateTime 
     */
    public function getFechaUnidadseis()
    {
        return $this->fechaUnidadseis;
    }



    public function __toString()
    {
        return $this->getStatus();
    }
}