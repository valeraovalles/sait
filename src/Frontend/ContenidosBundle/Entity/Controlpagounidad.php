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
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Unidadadministrativa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ejecutora", referencedColumnName="id")
     * })
     */
    private $idEjecutora;

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
     * @param \Frontend\ContenidosBundle\Entity\Unidadadministrativa $idEjecutora
     * @return Controlpagounidad
     */
    public function setIdEjecutora(\Frontend\ContenidosBundle\Entity\Unidadadministrativa $idEjecutora = null)
    {
        $this->idEjecutora = $idEjecutora;
    
        return $this;
    }

    /**
     * Get idEjecutora
     *
     * @return \Frontend\ContenidosBundle\Entity\Unidadadministrativa 
     */
    public function getIdEjecutora()
    {
        return $this->idEjecutora;
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
}