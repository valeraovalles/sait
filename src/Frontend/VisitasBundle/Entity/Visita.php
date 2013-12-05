<?php

namespace Frontend\VisitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Visita
 *
 * @ORM\Table(name="visita.visita")
 * @ORM\Entity
 */
class Visita
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="visita.visita_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="fechaentrada", type="date")
     */
    private $fechaentrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaentrada", type="time")
     */
    private $horaentrada;

    /**
     * @var \DateTime
     * @Assert\Time()
     *
     * @ORM\Column(name="fechasalida", type="date", nullable=true)
     */
    private $fechasalida;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horasalida", type="time", nullable=true)
     */
    private $horasalida;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="contacto", type="string", nullable=false)
     */
    private $contacto;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="observaciones", type="string", nullable=true)
     */
    private $observaciones;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estatus", type="boolean", nullable=true)
     */
    private $estatus=false;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;



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
     * Set fechaentrada
     *
     * @param \DateTime $fechaentrada
     * @return Visita
     */
    public function setFechaentrada($fechaentrada)
    {
        $this->fechaentrada = $fechaentrada;
    
        return $this;
    }

    /**
     * Get fechaentrada
     *
     * @return \DateTime 
     */
    public function getFechaentrada()
    {
        return $this->fechaentrada;
    }

    /**
     * Set horaentrada
     *
     * @param \DateTime $horaentrada
     * @return Visita
     */
    public function setHoraentrada($horaentrada)
    {
        $this->horaentrada = $horaentrada;
    
        return $this;
    }

    /**
     * Get horaentrada
     *
     * @return \DateTime 
     */
    public function getHoraentrada()
    {
        return $this->horaentrada;
    }

    /**
     * Set fechasalida
     *
     * @param \DateTime $fechasalida
     * @return Visita
     */
    public function setFechasalida($fechasalida)
    {
        $this->fechasalida = $fechasalida;
    
        return $this;
    }

    /**
     * Get fechasalida
     *
     * @return \DateTime 
     */
    public function getFechasalida()
    {
        return $this->fechasalida;
    }

    /**
     * Set horasalida
     *
     * @param \DateTime $horasalida
     * @return Visita
     */
    public function setHorasalida($horasalida)
    {
        $this->horasalida = $horasalida;
    
        return $this;
    }

    /**
     * Get horasalida
     *
     * @return \DateTime 
     */
    public function getHorasalida()
    {
        return $this->horasalida;
    }

    /**
     * Set contacto
     *
     * @param string $contacto
     * @return Visita
     */
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;
    
        return $this;
    }

    /**
     * Get contacto
     *
     * @return string 
     */
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Visita
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    
        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set estatus
     *
     * @param boolean $estatus
     * @return Operador
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    
        return $this;
    }

    /**
     * Get estatus
     *
     * @return boolean 
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Set usuario
     *
     * @param \Frontend\VisitasBundle\Entity\Usuario $usuario
     * @return Visita
     */
    public function setUsuario(\Frontend\VisitasBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Frontend\VisitasBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }




    public function __toString()
    {
        return $this->getFechaentrada();

        return $this->getHoraentrada();

        return $this->getFechasalida();

        return $this->getHorasalida();
    

    }

















}