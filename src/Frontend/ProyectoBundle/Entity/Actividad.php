<?php

namespace Frontend\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Actividad
 *
 * @ORM\Table(name="proyecto.actividad", indexes={@ORM\Index(name="IDX_8DF2BD066D5BDFE1", columns={"tarea_id"})})
 * @ORM\Entity
 */
class Actividad
{
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="proyecto.actividad_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="diasestimados", type="integer", nullable=false)
     * @Assert\NotBlank(message="Los días estimados no deben estar en blanco.")
     * @Assert\Type(type="digit", message="Los días deben ser con números.").
     * @Assert\NotEqualTo(value = "0", message="Los días no pueden ser igual a 0.")
     */
    private $diasestimados;
    
    /**
     * @var string
     *
     * @ORM\Column(name="diasreales", type="integer", nullable=true)
     */
    private $diasreales;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="integer", nullable=false)
     */
    private $ubicacion;
    
    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=500, nullable=false)
     * @Assert\NotBlank(message="La descripción no debe estar en blanco.")
     */
    private $descripcion;
    


    /**
     * @var \Frontend\ProyectoBundle\Entity\Tarea
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ProyectoBundle\Entity\Tarea")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tarea_id", referencedColumnName="id")
     * })
     */
    private $tarea;

        /**
     * @var \Frontend\ProyectoBundle\Entity\Tarea
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="responsable_id", referencedColumnName="id")
     * })
     * @Assert\NotBlank(message="Debe seleccionar un responsable.")
     */
    private $responsable;
    
    /**
     * Set ubicacion
     *
     * @param integer $ubicacion
     * @return Actividad
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return integer 
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set diasestimados
     *
     * @param integer $diasestimados
     * @return Actividad
     */
    public function setDiasestimados($diasestimados)
    {
        $this->diasestimados = $diasestimados;

        return $this;
    }

    /**
     * Get diasestimados
     *
     * @return integer 
     */
    public function getDiasestimados()
    {
        return $this->diasestimados;
    }
    
    /**
     * Set diasreales
     *
     * @param integer $diasreales
     * @return Actividad
     */
    public function setDiasreales($diasreales)
    {
        $this->diasreales = $diasreales;

        return $this;
    }

    /**
     * Get diasreales
     *
     * @return integer 
     */
    public function getDiasreales()
    {
        return $this->diasreales;
    }
    
    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Actividad
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tarea
     *
     * @param \Frontend\ProyectoBundle\Entity\Tarea $tarea
     * @return Actividad
     */
    public function setTarea(\Frontend\ProyectoBundle\Entity\Tarea $tarea = null)
    {
        $this->tarea = $tarea;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return \Frontend\ProyectoBundle\Entity\Responsable 
     */
    public function getResponsable()
    {
        return $this->responsable;
    }
    
    /**
     * Set responsable
     *
     * @param \Frontend\ProyectoBundle\Entity\Responsable $responsable
     * @return Actividad
     */
    public function setResponsable(\Administracion\UsuarioBundle\Entity\Perfil $responsable = null)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get tarea
     *
     * @return \Frontend\ProyectoBundle\Entity\Tarea 
     */
    public function getTarea()
    {
        return $this->tarea;
    }
}
