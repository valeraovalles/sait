<?php

namespace Frontend\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comentarioactividad
 *
 * @ORM\Table(name="proyecto.comentarioactividad", indexes={@ORM\Index(name="IDX_6313EDF6014FACA", columns={"actividad_id"})})
 * @ORM\Entity
 */
class Comentarioactividad
{
    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="string", length=2000, nullable=false)
     * @Assert\NotBlank(message="El comentario no puede estar en blanco.")
     */
    private $comentario;
    
    /**
     * @var string
     *
     * @ORM\Column(name="fechahora", type="datetime", nullable=false)
     */
    private $fechahora;

    
     /**
     * @var \Frontend\ProyectoBundle\Entity\Actividad
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="responsable_id", referencedColumnName="id")
     * })
     */
   

    private $responsable;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="proyecto.comentarioactividad_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Frontend\ProyectoBundle\Entity\Actividad
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ProyectoBundle\Entity\Actividad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="actividad_id", referencedColumnName="id")
     * })
     */
    private $actividad;



    /**
     * Set comentario
     *
     * @param string $comentario
     * @return Comentarioactividad
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario()
    {
        return $this->comentario;
    }
    
    /**
     * Set fechahora
     *
     * @param string $fechahora
     * @return Fechahoraactividad
     */
    public function setFechahora($fechahora)
    {
        $this->fechahora = $fechahora;

        return $this;
    }

    /**
     * Get fechahora
     *
     * @return string 
     */
    public function getFechahora()
    {
        return $this->fechahora;
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
     * Set actividad
     *
     * @param \Frontend\ProyectoBundle\Entity\Actividad $actividad
     * @return Comentarioactividad
     */
    public function setActividad(\Frontend\ProyectoBundle\Entity\Actividad $actividad = null)
    {
        $this->actividad = $actividad;

        return $this;
    }

    /**
     * Get actividad
     *
     * @return \Frontend\ProyectoBundle\Entity\Actividad 
     */
    public function getActividad()
    {
        return $this->actividad;
    }
}
