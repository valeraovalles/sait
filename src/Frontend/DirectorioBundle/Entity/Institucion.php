<?php

namespace Frontend\DirectorioBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Directorio.institucion
 *
 * @ORM\Table(name="directorio.institucion")
 * @ORM\Entity
 */
class Institucion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="directorio.institucion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="institucion", type="string", nullable=false)
     * @Assert\NotBlank()
     */
    private $institucion;

    /**
     * @var string
     *
     * @ORM\Column(name="director", type="string", nullable=false)
     * @Assert\NotBlank()
     */
    private $director;

    /**
     * @var string
     *
     * @ORM\Column(name="areainst", type="string", nullable=false)
     * @Assert\NotBlank()
     */
    private $areainst;

    /**
     * @var string
     *
     * @ORM\Column(name="telfinst", type="string", length=100, nullable=false)
     * @Assert\NotBlank()
     */
    private $telfinst;

    /**
     * @var string
     *
     * @ORM\Column(name="emailinst", type="string", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $emailinst;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", nullable=true)
     */
    private $direccion;


    /**
     * @var \Pais
     *
     * @ORM\ManyToOne(targetEntity="Frontend\DistribucionBundle\Entity\Pais")
     * 
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais", referencedColumnName="id")
     * })
     * @Assert\NotBlank()
     */
    private $pais;



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
     * @return Institucion
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
     * @return Institucion
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
     * @return Institucion
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
     * @return Institucion
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
     * @return Institucion
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
     * @return Institucion
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


    /**
     * Set pais
     *
     * @param \Frontend\DistribucionBundle\Entity\Pais $pais
     * @return Institucion
     */
    public function setPais(\Frontend\DistribucionBundle\Entity\Pais $pais = null)
    {
        $this->pais = $pais;
    
        return $this;
    }

    /**
     * Get pais
     *
     * @return \Frontend\DistribucionBundle\Entity\Pais 
     */
    public function getPais()
    {
        return $this->pais;
    }







}