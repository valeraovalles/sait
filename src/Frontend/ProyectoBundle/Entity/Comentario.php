<?php

namespace Frontend\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comentario
 *
 * @ORM\Table(name="proyecto.comentario")
 * @ORM\Entity
 */
class Comentario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="proyecto.comentario_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;  

    /**
     * @var \Proyecto
     *
     * @ORM\ManyToOne(targetEntity="Proyecto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="proyecto_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $proyectoId;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="string", nullable=false)
     * @Assert\NotBlank(message="El campo comentario no puede estar en blanco.").
     */
    private $comentario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="date", nullable=false)
     */
    private $fechaRegistro;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /*
     * Set proyectoId
     *
     * @param \Frontend\ProyectoBundle\Entity\Proyecto $proyectoId
     * @return Comentario
     */
    public function setProyectoId(\Frontend\ProyectoBundle\Entity\Proyecto $proyectoId = null)
    {
        $this->proyectoId = $proyectoId;
    
        return $this;
    }

    /**
     * Get proyectoId
     *
     * @return \Frontend\ProyectoBundle\Entity\Proyecto 
     */
    public function getProyectoId()
    {
        return $this->proyectoId;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return Cargo
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
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     * @return Contratos
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
    
        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime 
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    public function __toString()
    {
        return $this->getComentario();
    }
}