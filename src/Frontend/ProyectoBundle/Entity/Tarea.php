<?php

namespace Frontend\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tarea
 *
 * @ORM\Table(name="proyecto.tarea", indexes={@ORM\Index(name="IDX_3CA05366F625D1BA", columns={"proyecto_id"})})
 * @ORM\Entity
 */
class Tarea
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="proyecto.tarea_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;
    
    /**
     * @var integer
     * @ORM\Column(name="estatus", type="integer", nullable=false)
     */

    private $estatus;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", nullable=false)
     * @Assert\NotBlank(message="El nombre no puede estar en blanco.")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=500, nullable=true)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechainicio", type="date", nullable=false)
     * @Assert\NotBlank(message="La fecha de inicio puede estar en blanco.")
     */
    private $fechainicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechafinestimada", type="date", nullable=true)
     * @Assert\NotBlank(message="La fecha de fin estimada puede estar en blanco.")
     */
    private $fechafinestimada;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechafinreal", type="date", nullable=true)
     */
    private $fechafinreal;

    /**
     * @var integer
     *
     * @ORM\Column(name="porcentaje", type="integer", nullable=false)
     */
    private $porcentaje;


    /**
     * @var \Frontend\ProyectoBundle\Entity\Proyecto
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ProyectoBundle\Entity\Proyecto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="proyecto_id", referencedColumnName="id")
     * })
     */
    private $proyecto;



    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Tarea
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
     * Set estatus
     *
     * @param integer $estatus
     * @return Proyecto
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Get estatus
     *
     * @return integer 
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Tarea
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
     * Set fechainicio
     *
     * @param \DateTime $fechainicio
     * @return Tarea
     */
    public function setFechainicio($fechainicio)
    {
        $this->fechainicio = $fechainicio;
        return $this;
    }

    /**
     * Get fechainicio
     *
     * @return \DateTime 
     */
    public function getFechainicio()
    {
        return $this->fechainicio;
    }

    /**
     * Set fechafinreal
     *
     * @param \DateTime $fechafinreal
     * @return Tarea
     */
    public function setFechafinreal($fechafinreal)
    {
        $this->fechafinreal = $fechafinreal;

        return $this;
    }

    /**
     * Get fechafinreal
     *
     * @return \DateTime 
     */
    public function getFechafinreal()
    {
        return $this->fechafinreal;
    }
    
    /**
     * Set fechafinestimada
     *
     * @param \DateTime $fechafinestimada
     * @return Tarea
     */
    public function setFechafinestimada($fechafinestimada)
    {
        $this->fechafinestimada = $fechafinestimada;

        return $this;
    }

    /**
     * Get fechafinestimada
     *
     * @return \DateTime 
     */
    public function getFechafinestimada()
    {
        return $this->fechafinestimada;
    }

    /**
     * Set porcentaje
     *
     * @param integer $porcentaje
     * @return Tarea
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    /**
     * Get porcentaje
     *
     * @return integer 
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
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
     * Set proyecto
     *
     * @param \Frontend\ProyectoBundle\Entity\Proyecto $proyecto
     * @return Tarea
     */
    public function setProyecto(\Frontend\ProyectoBundle\Entity\Proyecto $proyecto = null)
    {
        $this->proyecto = $proyecto;

        return $this;
    }

    /**
     * Get proyecto
     *
     * @return \Frontend\ProyectoBundle\Entity\Proyecto 
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }
    

}
