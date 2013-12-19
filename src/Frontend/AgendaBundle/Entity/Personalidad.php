<?php

namespace Frontend\AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agen.personalidad
 *
 * @ORM\Table(name="agen.personalidad")
 * @ORM\Entity
 */
class Personalidad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="agen.personalidad_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", nullable=false)
     */
    private $apellido;

    /**
     * @var integer
     *
     * @ORM\Column(name="telefono", type="integer", nullable=false)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="especialidad", type="string", nullable=false)
     */
    private $especialidad;

    /**
     * @var string
     *
     * @ORM\Column(name="pais", type="string", nullable=false)
     */
    private $pais;

    /**
     * @var \Agen.procedencia
     *
     * @ORM\ManyToOne(targetEntity="Frontend\AgendaBundle\Entity\Procedencia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_procedencia", referencedColumnName="id")
     * })
     */
    private $idProcedencia;



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
     * Set nombre
     *
     * @param string $nombre
     * @return Personalidad
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
     * Set apellido
     *
     * @param string $apellido
     * @return Personalidad
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     * @return Personalidad
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Personalidad
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set especialidad
     *
     * @param string $especialidad
     * @return Personalidad
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;
    
        return $this;
    }

    /**
     * Get especialidad
     *
     * @return string 
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * Set pais
     *
     * @param string $pais
     * @return Personalidad
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
    
        return $this;
    }

    /**
     * Get pais
     *
     * @return string 
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set idProcedencia
     *
     * @param \Frontend\AgendaBundle\Entity\Procedencia $idProcedencia
     * @return Personalidad
     */
    public function setIdProcedencia(\Frontend\AgendaBundle\Entity\Procedencia $idProcedencia = null)
    {
        $this->idProcedencia = $idProcedencia;
    
        return $this;
    }

    /**
     * Get idProcedencia
     *
     * @return \Frontend\AgendaBundle\Entity\Procedencia 
     */
    public function getIdProcedencia()
    {
        return $this->idProcedencia;
    }




}