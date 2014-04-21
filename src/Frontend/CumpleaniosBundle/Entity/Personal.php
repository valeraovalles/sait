<?php

namespace Frontend\CumpleaniosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Personal
 *
 * @ORM\Table(name="cumpleanios.personal")
 * @ORM\Entity
 */
class Personal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cumpleanios.personal_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;   

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", nullable=false)
     * @Assert\NotBlank(message="El campo nombre no puede estar en blanco.").
     */
    private $nombre;
    
    /**
     * @var float
     *
     * @ORM\Column(name="apellido", type="string", nullable=true)
     * 
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="cedpas", type="string", nullable=true)
     */
    private $cedpas;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", nullable=true)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", nullable=true)
     */
    private $ubicacion;


    /**
     * @var string
     *
     * @ORM\Column(name="fechanac", type="date", nullable=true)
     */
    private $fechanac;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", nullable=true, length=2)
     */
    private $sexo;



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
     * @return Cargo
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
     * @return Cargo
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
     * Set cedpas
     *
     * @param string $cedpas
     * @return Personal
     */
    public function setCedpas($cedpas)
    {
        $this->cedpas = $cedpas;
    
        return $this;
    }

    /**
     * Get cedpas
     *
     * @return string 
     */
    public function getCedpas()
    {
        return $this->cedpas;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Personal
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    
        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }


    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     * @return Personal
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    
        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string 
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }    

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Personal
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    
        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    } 

    /**
     * Set fechanac
     *
     * @param \DateTime $fechanac
     * @return Personal
     */
    public function setFechanac($fechanac)
    {
        $this->fechanac = $fechanac;
    
        return $this;
    }

    /**
     * Get fechanac
     *
     * @return \DateTime 
     */
    public function getFechanac()
    {
        return $this->fechanac;
    }
  

    public function __toString()
    {
        return $this->getNombre();
    }
}