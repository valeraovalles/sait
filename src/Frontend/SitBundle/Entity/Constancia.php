<?php

namespace Frontend\SitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Ciudad
 *
 * @ORM\Table(name="sit.sit")
 * @ORM\Entity
 */
class Sit
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sit.sit_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=100, nullable=false)
     * @Assert\NotBlank(message="Debe seleccionar un tipo de constancia.")
     */
    private $tipo;


    /**
     * @var boolean
     *
     * @ORM\Column(name="bonoalimentacion", type="boolean", nullable=true)
     */
    private $bonoalimentacion;

    /**
     * @var string
     *
     * @ORM\Column(name="dirigida", type="string", length=100, nullable=false)
     * @Assert\NotBlank(message="Debe escribir a quien va dirigida la constancia.")
     */
    private $dirigida;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="string", length=100, nullable=true)
     */
    private $motivo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="culminada", type="boolean", nullable=true)
     */
    private $culminada=false;

    /**
     * @var date
     *
     * @ORM\Column(name="fechasolicitud", type="datetime", nullable=true)
     */
    private $fechasolicitud;

    /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $user;
    
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
     * Set tipo
     *
     * @param string $tipo
     * @return Tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set bonoalimentacion
     *
     * @param string $bonoalimentacion
     * @return Bonoalimentacion
     */
    public function setBonoalimentacion($bonoalimentacion)
    {
        $this->bonoalimentacion = $bonoalimentacion;
    
        return $this;
    }

    /**
     * Get bonoalimentacion
     *
     * @return string 
     */
    public function getBonoalimentacion()
    {
        return $this->bonoalimentacion;
    }

    /**
     * Set dirigida
     *
     * @param string $dirigida
     * @return Dirigida
     */
    public function setDirigida($dirigida)
    {
        $this->dirigida = $dirigida;
    
        return $this;
    }

    /**
     * Get dirigida
     *
     * @return string 
     */
    public function getDirigida()
    {
        return $this->dirigida;
    }

    /**
     * Set motivo
     *
     * @param string $motivo
     * @return Motivo
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    
        return $this;
    }

    /**
     * Get motivo
     *
     * @return string 
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * Set bonoalimentacion
     *
     * @param string $culminada
     * @return Culminada
     */
    public function setCulminada($culminada)
    {
        $this->culminada = $culminada;
    
        return $this;
    }

    /**
     * Get culminada
     *
     * @return string 
     */
    public function getCulminada()
    {
        return $this->culminada;
    }


    /**
     * Set bonoalimentacion
     *
     * @param string $fechasolicitud
     * @return Fechasolicitud
     */
    public function setFechasolicitud($fechasolicitud)
    {
        $this->fechasolicitud = $fechasolicitud;
    
        return $this;
    }

    /**
     * Get fechasolicitud
     *
     * @return string 
     */
    public function getFechasolicitud()
    {
        return $this->fechasolicitud;
    }
/**
     * Set user
     *
     * @param \Administracion\UsuarioBundle\Entity\Perfil $user
     * @return Operador
     */
    public function setUser(\Administracion\UsuarioBundle\Entity\Perfil $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Administracion\UsuarioBundle\Entity\Perfil 
     */
    public function getUser()
    {
        return $this->user;
    }
}