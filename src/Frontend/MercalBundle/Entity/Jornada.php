<?php

namespace Frontend\MercalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Jornada
 *
 * @ORM\Table(name="mercal.jornada")
 * @ORM\Entity
 */
class Jornada
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mercal.jornada_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombrejornada", type="string", nullable=false)
     * @Assert\NotBlank()
     */
    private $nombrejornada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechajornada", type="date", nullable=false)
     * @Assert\NotBlank()
     */
    private $fechajornada;

    /**
     * @var string
     *
     * @ORM\Column(name="culminada", type="boolean", nullable=true)
     */
    private $culminada=false;

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
     * Set user
     *
     * @param \Administracion\UsuarioBundle\Entity\User $user
     * @return Tipooperador
     */
    public function setNombrejornada($nombrejornada)
    {
        $this->nombrejornada = $nombrejornada;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Administracion\UsuarioBundle\Entity\User 
     */
    public function getNombrejornada()
    {
        return $this->nombrejornada;
    }

    /**
     * Set user
     *
     * @param \Administracion\UsuarioBundle\Entity\User $user
     * @return Tipooperador
     */
    public function setCulminada($culminada)
    {
        $this->culminada = $culminada;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Administracion\UsuarioBundle\Entity\User 
     */
    public function getCulminada()
    {
        return $this->culminada;
    }

    /**
     * Set fechasolicitud
     *
     * @param \DateTime $fechasolicitud
     * @return Ticket
     */
    public function setFechajornada($fechajornada)
    {
        $this->fechajornada = $fechajornada;
    
        return $this;
    }

    /**
     * Get fechasolicitud
     *
     * @return \DateTime 
     */
    public function getFechajornada()
    {
        return $this->fechajornada;
    }
}