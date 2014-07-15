<?php

namespace Frontend\TransporteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Vehiculos
 *
 * @ORM\Table(name="transporte.vehiculos")
 * @ORM\Entity(repositoryClass="Frontend\TransporteBundle\Entity\VehiculosRepository")
 */
class Vehiculos
{
     /**
     * @ORM\OneToMany(targetEntity="Asignaciones", mappedBy="Vehiculos")
     */
    private $asignaciones;
 
    public function __construct()
    {
        $this->asignaciones = new ArrayCollection();
    }
    
    /*
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }
   */
   public function __toString()
    {
        return $this->getTipo().' '.$this->getPlaca().' '.$this->getModelo();
    }

    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="tipo", type="string", length=100)
     */
    private $tipo;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="placa", type="string", length=10)
     */
    private $placa;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="modelo", type="string", length=50)
     */
    private $modelo;

    /**
     * @var integer
     * @Assert\NotBlank()
     * @ORM\Column(name="ano", type="integer")
     */
    private $ano;

    /**
     * @var string
     * 
     * @ORM\Column(name="color", type="string", length=50)
     */
    private $color;

    /**
     * @var integer
     *
     * @ORM\Column(name="estatus", type="integer")
     */
    private $estatus;


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
     * @return Vehiculos
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
     * Set placa
     *
     * @param string $placa
     * @return Vehiculos
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;
    
        return $this;
    }

    /**
     * Get placa
     *
     * @return string 
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return Vehiculos
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    
        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set ano
     *
     * @param integer $ano
     * @return Vehiculos
     */
    public function setAno($ano)
    {
        $this->ano = $ano;
    
        return $this;
    }

    /**
     * Get ano
     *
     * @return integer 
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Vehiculos
     */
    public function setColor($color)
    {
        $this->color = $color;
    
        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set estatus
     *
     * @param integer $estatus
     * @return Vehiculos
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
}
