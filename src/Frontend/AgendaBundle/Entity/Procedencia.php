<?php

namespace Frontend\AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agen.procedencia
 *
 * @ORM\Table(name="agen.procedencia")
 * @ORM\Entity
 */
class Procedencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="agen.procedencia_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="institucion", type="string", nullable=false)
     */
    private $institucion;

    /**
     * @var string
     *
     * @ORM\Column(name="director", type="string", nullable=false)
     */
    private $director;

    /**
     * @var string
     *
     * @ORM\Column(name="areainst", type="string", nullable=false)
     */
    private $areainst;

    /**
     * @var string
     *
     * @ORM\Column(name="telfinst", type="string", nullable=false)
     */
    private $telfinst;

    /**
     * @var string
     *
     * @ORM\Column(name="emailinst", type="string", nullable=false)
     */
    private $emailinst;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", nullable=false)
     */
    private $direccion;



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
     * Set institucion
     *
     * @param string $institucion
     * @return Procedencia
     */
    public function setInstitucion($institucion)
    {
        $this->institucion = $institucion;
    
        return $this;
    }

    /**
     * Get institucion
     *
     * @return string 
     */
    public function getInstitucion()
    {
        return $this->institucion;
    }

    /**
     * Set director
     *
     * @param string $director
     * @return Procedencia
     */
    public function setDirector($director)
    {
        $this->director = $director;
    
        return $this;
    }

    /**
     * Get director
     *
     * @return string 
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set areainst
     *
     * @param string $areainst
     * @return Procedencia
     */
    public function setAreainst($areainst)
    {
        $this->areainst = $areainst;
    
        return $this;
    }

    /**
     * Get areainst
     *
     * @return string 
     */
    public function getAreainst()
    {
        return $this->areainst;
    }

    /**
     * Set telfinst
     *
     * @param string $telfinst
     * @return Procedencia
     */
    public function setTelfinst($telfinst)
    {
        $this->telfinst = $telfinst;
    
        return $this;
    }

    /**
     * Get telfinst
     *
     * @return string 
     */
    public function getTelfinst()
    {
        return $this->telfinst;
    }

    /**
     * Set emailinst
     *
     * @param string $emailinst
     * @return Procedencia
     */
    public function setEmailinst($emailinst)
    {
        $this->emailinst = $emailinst;
    
        return $this;
    }

    /**
     * Get emailinst
     *
     * @return string 
     */
    public function getEmailinst()
    {
        return $this->emailinst;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Procedencia
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }




    public function __toString()
    {
        return $this->getDireccion();

    }




}