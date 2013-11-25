<?php

namespace Frontend\MercalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Perfil
 *
 * @ORM\Table(name="mercal.familiar")
 * @ORM\Entity
 */
class Familiar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mercal.familiar_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     */
    private $apellidos;


    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", length=20, nullable=false)
     * @Assert\NotBlank()
     */
    private $cedula;

    /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="trabajador_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $trabajador;


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
     * Set nombres
     *
     * @param string $nombres
     * @return Perfil
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    
        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set trabajador
     *
     * @param \Administracion\UsuarioBundle\Entity\Perfil $trabajador
     * @return Operador
     */
    public function setTrabajador(\Administracion\UsuarioBundle\Entity\Perfil $trabajador = null)
    {
        $this->trabajador = $trabajador;
    
        return $this;
    }

    /**
     * Get trabajador
     *
     * @return \Administracion\UsuarioBundle\Entity\Perfil 
     */
    public function getTrabajador()
    {
        return $this->trabajador;
    }

    
    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Perfil
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }


    /**
     * Set cedula
     *
     * @param string $cedula
     * @return Perfil
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    
        return $this;
    }

    /**
     * Get cedula
     *
     * @return string 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    
    public function __toString()
    {
        return $this->getPrimernombre().' '.$this->getPrimerapellido();
    }
}