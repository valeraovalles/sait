<?php

namespace Frontend\TransporteBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
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
     * @var \Solicitudes
     * 
     * @ORM\ManyToOne(targetEntity="Solicitudes", inversedBy="Asignaciones")
     * @ORM\JoinColumn(name="id_solicitud", referencedColumnName="id")     
     * @Assert\NotBlank() 
     */
    private $idSolicitud;

 
    /**
     * @var \Vehiculos
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Vehiculos", inversedBy="Asignaciones")
     * @ORM\JoinColumn(name="id_vehiculo", referencedColumnName="id")     
     */
    private $idVehiculo;



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
     * @param \Frontend\TransporteBundle\Entity\Solicitudes $idSolicitud
     * @return Solicitudes
     */
    public function setIdSolicitud(\Frontend\TransporteBundle\Entity\Solicitudes $idSolicitud = null)
    {
        $this->idSolicitud = $idSolicitud;
    
        return $this;
    }

    /**
     * Get idSolicitud
     *
     * @return \Frontend\TransporteBundle\Entity\Solicitudes 
     */
    public function getIdSolicitud()
    {
        return $this->idSolicitud;
    }

  /**
     * Set idVehiculo
     *
     * @param \Frontend\TransporteBundle\Entity\Vehiculos $idVehiculo
     * @return Vehiculos
     */
    public function setIdVehiculo(\Frontend\TransporteBundle\Entity\Vehiculos $idVehiculo = null)
    {
        $this->idVehiculo = $idVehiculo;
    
        return $this;
    }

  /**
     * Get idVehiculo
     *
     * @return \Frontend\TransporteBundle\Entity\Vehiculos 
     */
    public function getIdVehiculo()
    {
        return $this->idVehiculo;
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
