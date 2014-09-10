<?php

namespace Frontend\ProyectoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Proyecto
 *
 */
class Proyectogeneral
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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="proyecto.proyecto_id_seq", allocationSize=1, initialValue=1)
     */

    private $id;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Administracion\UsuarioBundle\Entity\Nivelorganizacional", inversedBy="proyecto")
     * @ORM\JoinTable(name="proyecto.nivelproyecto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="proyecto_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="nivelorganizacional_id", referencedColumnName="id")
     *   }
     * )
     * @Assert\Count(
     *      min = "1",
     *      minMessage = "Debe seleccionar al menos 1 nivel organizacional.",
     * )
     */
   
    private $nivelorganizacional;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
  /**
     * Add nivelorganizacional
     *
     * @param \Administracion\UsuarioBundle\Entity\Nivelorganizacional $nivelorganizacional
     * @return Usuario
     */
    public function addNivelorganizacional(\Administracion\UsuarioBundle\Entity\Nivelorganizacional $nivelorganizacional)
    {
        $this->nivelorganizacional[] = $nivelorganizacional;
        return $this;
    }

    /**
     * Remove nivelorganizacional
     *
     * @param \Administracion\UsuarioBundle\Entity\Nivelorganizacional $nivelorganizacional
     */
    public function removeNivelorganizacional(\Administracion\UsuarioBundle\Entity\Nivelorganizacional $nivelorganizacional)
    {
        $this->nivelorganizacional->removeElement($nivelorganizacional);
    }

    /**
     * Get nivelorganizacional
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNivelorganizacional()
    {
        return $this->nivelorganizacional;
    }

    
    
}
