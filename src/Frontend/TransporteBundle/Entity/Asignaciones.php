<?php

namespace Frontend\TransporteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Asignaciones
 *
 * @ORM\Table(name="transporte.asignaciones")
 * @ORM\Entity(repositoryClass="Frontend\TransporteBundle\Entity\AsignacionesRepository")
 */
class Asignaciones
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     * 
     * @ORM\ManyToOne(targetEntity="Solicitudes", inversedBy="Asignaciones")
     * @ORM\JoinColumn(name="id_solicitud", referencedColumnName="id")      
     */
    private $idSolicitud;

 
    /**
     * @var \Vehiculos
     *
     * @ORM\ManyToOne(targetEntity="Vehiculos")
     * @ORM\JoinColumn(name="id_vehiculo", referencedColumnName="id")     
     */
    private $idVehiculo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_conductor", type="integer")
     */
    private $idConductor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_asignacion", type="datetime")
     */
    private $fechaAsignacion;


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
     * Set idSolicitud
     *
     * @param integer $idSolicitud
     * @return Asignaciones
     */
    public function setIdSolicitud($idSolicitud)
    {
        $this->idSolicitud = $idSolicitud;
    
        return $this;
    }

    /**
     * Get idSolicitud
     *
     * @return integer 
     */
    public function getIdSolicitud()
    {
        return $this->idSolicitud;
    }

    /**
     * Set idVehiculo
     *
     * @param integer $idVehiculo
     * @return Asignaciones
     */
    public function setIdVehiculo($idVehiculo)
    {
        $this->idVehiculo = $idVehiculo;
    
        return $this;
    }

    /**
     * Get idVehiculo
     *
     * @return integer 
     */
    public function getIdVehiculo()
    {
        return $this->idVehiculo;
    }

    /**
     * Set idConductor
     *
     * @param integer $idConductor
     * @return Asignaciones
     */
    public function setIdConductor($idConductor)
    {
        $this->idConductor = $idConductor;
    
        return $this;
    }

    /**
     * Get idConductor
     *
     * @return integer 
     */
    public function getIdConductor()
    {
        return $this->idConductor;
    }

    /**
     * Set fechaAsignacion
     *
     * @param \DateTime $fechaAsignacion
     * @return Asignaciones
     */
    public function setFechaAsignacion($fechaAsignacion)
    {
        $this->fechaAsignacion = $fechaAsignacion;
    
        return $this;
    }

    /**
     * Get fechaAsignacion
     *
     * @return \DateTime 
     */
    public function getFechaAsignacion()
    {
        return $this->fechaAsignacion;
    }
}
