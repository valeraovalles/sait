<?php

namespace Frontend\TransporteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Solicitudes
 *
 * @ORM\Table(name="transporte.solicitudes")
 * @ORM\Entity(repositoryClass="Frontend\TransporteBundle\Entity\SolicitudesRepository")
 */
class Solicitudes
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
     * @ORM\OneToMany(targetEntity="Asignaciones", mappedBy="Solicitudes")
     * @Assert\NotBlank()
     */
    private $asignaciones;
 
    public function __construct()
    {
        $this->asignaciones = new ArrayCollection();
    }
      /**
     * @var \Usuarios.user
     * 
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\User", inversedBy="Solicitudes")
     * @ORM\JoinColumn(name="id_solicitante", referencedColumnName="id")      
     */
    private $idSolicitante;

    /**
     * @var string
     * @ORM\Column(name="asistentes", type="string", length=255)
     */
    private $asistentes;

    /**
     * @var \DateTime
     * @ORM\Column(name="fecha_solicitud", type="date")
     */
    private $fechaSolicitud;

    /**
     * @var \DateTime
     * @Assert\NotBlank()
     * @ORM\Column(name="fecha_salida", type="date")
     */
    private $fechaSalida;

    /**
     * @var \DateTime
     * @Assert\NotBlank()
     * @ORM\Column(name="hora_salida", type="time")
     */
    private $horaSalida;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="direccion_desde", type="string", length=255)
     */
    private $direccionDesde;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="direccion_hasta", type="string", length=255)
     */
    private $direccionHasta;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="descripcion_equipos", type="string", length=255)
     */
    private $descripcionEquipos;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="datos_interes_razon", type="string", length=255)
     */
    private $datosInteresRazon;
  
    /**
     * @var string
     *
     * @ORM\Column(name="justificacion", type="string", length=255, nullable=true)
     */
    private $justificacion;

    /**
     * @var string
     * 
     * @ORM\Column(name="estatus", type="string", length=2)
     */
    private $estatus;

    public function __toString()
    {
        return 'Nro. '. $this->getId(). ': ' .$this->getDatosInteresRazon();
    }
 
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
     * Set idSolicitante
     *
     * @param integer $idSolicitante
     * @return Solicitudes
     */
    public function setIdSolicitante($idSolicitante)
    {
        $this->idSolicitante = $idSolicitante;
    
        return $this;
    }

    /**
     * Get idSolicitante
     *
     * @return integer 
     */
    public function getIdSolicitante()
    {
        return $this->idSolicitante;
    }
  
    /**
     * Set asistentes
     *
     * @param string $asistentes
     * @return Solicitudes
     */
    public function setAsistentes($asistentes)
    {
        $this->asistentes = $asistentes;
    
        return $this;
    }

    /**
     * Get asistentes
     *
     * @return string 
     */
    public function getAsistentes()
    {
        return $this->asistentes;
    }

    /**
     * Set fechaSolicitud
     *
     * @param \DateTime $fechaSolicitud
     * @return Solicitudes
     */
    public function setFechaSolicitud($fechaSolicitud)
    {
        $this->fechaSolicitud = $fechaSolicitud;
    
        return $this;
    }

    /**
     * Get fechaSolicitud
     *
     * @return \DateTime 
     */
    public function getFechaSolicitud()
    {
        return $this->fechaSolicitud;
    }

    /**
     * Set fechaSalida
     *
     * @param \DateTime $fechaSalida
     * @return Solicitudes
     */
    public function setFechaSalida($fechaSalida)
    {
        $this->fechaSalida = $fechaSalida;
    
        return $this;
    }

    /**
     * Get fechaSalida
     *
     * @return \DateTime 
     */
    public function getFechaSalida()
    {
        return $this->fechaSalida;
    }

    /**
     * Set horaSalida
     *
     * @param \DateTime $horaSalida
     * @return Solicitudes
     */
    public function setHoraSalida($horaSalida)
    {
        $this->horaSalida = $horaSalida;
    
        return $this;
    }

    /**
     * Get horaSalida
     *
     * @return \DateTime 
     */
    public function getHoraSalida()
    {
        return $this->horaSalida;
    }

    /**
     * Set direccionDesde
     *
     * @param string $direccionDesde
     * @return Solicitudes
     */
    public function setDireccionDesde($direccionDesde)
    {
        $this->direccionDesde = $direccionDesde;
    
        return $this;
    }

    /**
     * Get direccionDesde
     *
     * @return string 
     */
    public function getDireccionDesde()
    {
        return $this->direccionDesde;
    }

    /**
     * Set direccionHasta
     *
     * @param string $direccionHasta
     * @return Solicitudes
     */
    public function setDireccionHasta($direccionHasta)
    {
        $this->direccionHasta = $direccionHasta;
    
        return $this;
    }

    /**
     * Get direccionHasta
     *
     * @return string 
     */
    public function getDireccionHasta()
    {
        return $this->direccionHasta;
    }

    /**
     * Set descripcionEquipos
     *
     * @param string $descripcionEquipos
     * @return Solicitudes
     */
    public function setDescripcionEquipos($descripcionEquipos)
    {
        $this->descripcionEquipos = $descripcionEquipos;
    
        return $this;
    }

    /**
     * Get descripcionEquipos
     *
     * @return string 
     */
    public function getDescripcionEquipos()
    {
        return $this->descripcionEquipos;
    }

    /**
     * Set datosInteresRazon
     *
     * @param string $datosInteresRazon
     * @return Solicitudes
     */
    public function setDatosInteresRazon($datosInteresRazon)
    {
        $this->datosInteresRazon = $datosInteresRazon;
    
        return $this;
    }

    /**
     * Get datosInteresRazon
     *
     * @return string 
     */
    public function getDatosInteresRazon()
    {
        return $this->datosInteresRazon;
    }

    

    /**
     * Set justificacion
     *
     * @param string $justificacion
     * @return Solicitudes
     */
    public function setJustificacion($justificacion)
    {
        $this->justificacion = $justificacion;
    
        return $this;
    }

    /**
     * Get justificacion
     *
     * @return string 
     */
    public function getJustificacion()
    {
        return $this->justificacion;
    }

    /**
     * Set estatus
     *
     * @param string $estatus
     * @return Solicitudes
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    
        return $this;
    }

    /**
     * Get estatus
     *
     * @return string 
     */
    public function getEstatus()
    {
        return $this->estatus;
    }
}
