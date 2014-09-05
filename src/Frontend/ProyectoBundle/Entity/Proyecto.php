<?php

namespace Frontend\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Proyecto
 *
 * @ORM\Table(name="proyecto.proyecto")
 * @ORM\Entity
 */
class Proyecto
{
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", nullable=false)
     * @Assert\NotBlank(message="El nombre del proyecto no puede estar en blanco.")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=500, nullable=false)
     * @Assert\NotBlank(message="La descripcion del proyecto no puede estar en blanco.")
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechainicio", type="date", nullable=true)
     */
    private $fechainicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechafinestimada", type="date", nullable=true)
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
     * @ORM\Column(name="estatus", type="integer", nullable=false)
     */

    private $estatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="porcentaje", type="integer", nullable=false)
     */
    
    private $porcentaje;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Administracion\UsuarioBundle\Entity\Perfil", inversedBy="proyecto")
     * @ORM\JoinTable(name="proyecto.responsableproyecto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="proyecto_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="responsable_id", referencedColumnName="id")
     *   }
     * )
     * @Assert\Count(
     *      min = "1",
     *      minMessage = "Debe seleccionar al menos 1 encargado de proyecto.",
     * )
     */
   
    private $responsable;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="proyecto.proyecto_id_seq", allocationSize=1, initialValue=1)
     */

    private $id;
    
    /**
     * @var \"user"
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Nivelorganizacional")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nivelorganizacional_id", referencedColumnName="id")
     * })
     */
    private $nivelorganizacional;

    

    public function __construct()
    {
        $this->responsable = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Proyecto
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Proyecto
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
     * @return Proyecto
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
     * Set fechafin
     *
     * @param \DateTime $fechafin
     * @return Proyecto
     */
    public function setFechafin($fechafin)
    {
        $this->fechafin = $fechafin;

        return $this;
    }

    /**
     * Get fechafin
     *
     * @return \DateTime 
     */
    public function getFechafin()
    {
        return $this->fechafin;
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
     * Set porcentaje
     *
     * @param integer $porcentaje
     * @return Proyecto
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
     * Set responsableId
     *
     * @param integer $responsableId
     * @return Tarea
     */
    public function setResponsable(\Administracion\UsuarioBundle\Entity\Perfil $responsable = null)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsableId
     *
     * @return integer 
     */
    public function getResponsable()
    {
        return $this->responsable;
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
     * Set nivelorganizacional
     *
     * @param \Administracion\UsuarioBundle\Entity\nivelorganizacional $nivelorganizacional
     * @return Perfil
     */
    public function setNivelorganizacional(\Administracion\UsuarioBundle\Entity\nivelorganizacional $nivelorganizacional = null)
    {
        $this->nivelorganizacional = $nivelorganizacional;
    
        return $this;
    }

    /**
     * Get nivelorganizacional
     *
     * @return \Administracion\UsuarioBundle\Entity\nivelorganizacional 
     */
    public function getNivelorganizacional()
    {
        return $this->nivelorganizacional;
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
    
}