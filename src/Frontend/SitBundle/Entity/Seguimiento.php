<?php

namespace Frontend\SitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unidad
 *
 * @ORM\Table(name="sit.seguimiento")
 * @ORM\Entity
 */
class Seguimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sit.seguimiento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Ticket
     *
     * @ORM\ManyToOne(targetEntity="Ticket")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ticket_id", referencedColumnName="id")
     * })
     */
    private $ticket;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="evento", type="string", length=2000, nullable=false)
     */
    private $evento;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoevento", type="string", length=2, nullable=false)
     */
    private $tipo; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var \Ticket
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="responsable_id", referencedColumnName="id")
     * })
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="archivo", type="string", length=100, nullable=true)
     */
    private $archivo; 
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
     * Set responsable
     *
     * @param \Administracion\UsuarioBundle\Entity\Perfil $responsable
     * @return Operador
     */
    public function setResponsable(\Administracion\UsuarioBundle\Entity\Perfil $responsable = null)
    {
        $this->responsable = $responsable;
    
        return $this;
    }

    /**
     * Get responsable
     *
     * @return \Administracion\UsuarioBundle\Entity\Perfil 
     */
    public function getResponsable()
    {
        return $this->responsable;
    }
    
     /**
     * Set ticket
     *
     * @param \Administracion\UsuarioBundle\Entity\Perfil $ticket
     * @return Operador
     */
    public function setTicket(\Frontend\SitBundle\Entity\Ticket $ticket = null)
    {
        $this->ticket = $ticket;
    
        return $this;
    }

    /**
     * Get ticket
     *
     * @return \Administracion\UsuarioBundle\Entity\Perfil 
     */
    public function getTicket()
    {
        return $this->ticket;
    }
    
    
    /**
     * Set evento
     *
     * @param string $evento
     * @return Unidad
     */
    public function setEvento($evento)
    {
        $this->evento = $evento;
    
        return $this;
    }

    /**
     * Get evento
     *
     * @return string 
     */
    public function getEvento()
    {
        return $this->evento;
    }
    
    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Unidad
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
     * Set fecha
     *
     * @param string $fecha
     * @return Unidad
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return string 
     */
    public function getFecha()
    {
        return $this->fecha;
    }  
    
    /**
     * Set archivo
     *
     * @param string $archivo
     * @return Ticket
     */
    public function setArchivo($archivo)
    {
        $this->archivo = $archivo;
    
        return $this;
    }

    /**
     * Get archivo
     *
     * @return string 
     */
    public function getArchivo()
    {
        return $this->archivo;
    }
}

