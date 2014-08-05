<?php

namespace Frontend\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="estatus", type="integer", nullable=false)
     */
    private $estatus;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=500, nullable=false)
     */
    private $descripcion;

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
     * @var \Frontend\ProyectoBundle\Entity\Tarea
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ProyectoBundle\Entity\Tarea")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tarea_id", referencedColumnName="id")
     * })
     */
    private $tarea;



    /**
     * Set estatus
     *
     * @param integer $estatus
     * @return Actividad
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
     * Get tarea
     *
     * @return \Frontend\ProyectoBundle\Entity\Tarea 
     */
    public function getTarea()
    {
        return $this->tarea;
    }
}
