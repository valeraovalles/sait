<?php

namespace Frontend\DistribucionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comodato
 *
 * @ORM\Table(name="distribucion.comodato")
 * @ORM\Entity
 */
class Comodato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="distribucion.comodato_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

     /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=20, nullable=true, unique=true)
     * 
     */
    private $codigo;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechainicioacuerdo", type="date", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    private $fechainicioacuerdo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechafinacuerdo", type="date", nullable=true)
     * @Assert\Date()
     */
    private $fechafinacuerdo;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", nullable=true)
     */
    private $observacion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Objetocomodato", inversedBy="comodato")
     * @ORM\JoinTable(name="distribucion.comodatoobjeto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="comodato_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="objetocomodato_id", referencedColumnName="id")
     *   }
     * )
     * 
     * 
     */
    private $objetocomodato;

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
     * @var \DateTime
     *
     * @ORM\Column(name="fechamodificacion", type="datetime", nullable=true)
     */
    private $fechamodificacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="recibereceptor", type="boolean", nullable=true)
     */
    private $recibereceptor;

        /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecharecepcion", type="date", nullable=true)
     * @Assert\Date()
     */
    private $fecharecepcion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->objetocomodato = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

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
     * Set recibereceptor
     *
     * @param boolean $recibereceptor
     * @return Comodato
     */
    public function setRecibereceptor($recibereceptor)
    {
        $this->recibereceptor = $recibereceptor;
    
        return $this;
    }

    /**
     * Get estatus
     *
     * @return boolean 
     */
    public function getRecibereceptor()
    {
        return $this->recibereceptor;
    }


     /**
     * Set codigo
     *
     * @param string $url
     * @return Comodato
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    
        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }
    
    /**
     * Set fechainicioacuerdo
     *
     * @param \DateTime $fechainicioacuerdo
     * @return Comodato
     */
    public function setFechainicioacuerdo($fechainicioacuerdo)
    {
        $this->fechainicioacuerdo = $fechainicioacuerdo;
    
        return $this;
    }

    /**
     * Get fechainicioacuerdo
     *
     * @return \DateTime 
     */
    public function getFechainicioacuerdo()
    {
        return $this->fechainicioacuerdo;
    }

    /**
     * Set fechafinacuerdo
     *
     * @param \DateTime $fechafinacuerdo
     * @return Comodato
     */
    public function setFechafinacuerdo($fechafinacuerdo)
    {
        $this->fechafinacuerdo = $fechafinacuerdo;
    
        return $this;
    }

    /**
     * Get fechafinacuerdo
     *
     * @return \DateTime 
     */
    public function getFechafinacuerdo()
    {
        return $this->fechafinacuerdo;
    }


    /**
     * Set fecharecepcion
     *
     * @param \DateTime $fecharecepcion
     * @return Comodato
     */
    public function setFecharecepcion($fecharecepcion)
    {
        $this->fecharecepcion = $fecharecepcion;
    
        return $this;
    }

    /**
     * Get fecharecepcion
     *
     * @return \DateTime 
     */
    public function getFecharecepcion()
    {
        return $this->fecharecepcion;
    }


    /**
     * Set observacion
     *
     * @param string $observacion
     * @return Comodato
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    
        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Add objetocomodato
     *
     * @param \Frontend\DistribucionBundle\Entity\Objetocomodato $objetocomodato
     * @return Comodato
     */
    public function addObjetocomodato(\Frontend\DistribucionBundle\Entity\Objetocomodato $objetocomodato)
    {
        $this->objetocomodato[] = $objetocomodato;
    
        return $this;
    }

    /**
     * Remove objetocomodato
     *
     * @param \Frontend\DistribucionBundle\Entity\Objetocomodato $objetocomodato
     */
    public function removeObjetocomodato(\Frontend\DistribucionBundle\Entity\Objetocomodato $objetocomodato)
    {
        $this->objetocomodato->removeElement($objetocomodato);
    }

    /**
     * Get objetocomodato
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getObjetocomodato()
    {
        return $this->objetocomodato;
    }
    
    /**
     * Set user
     *
     * @param \Administracion\UsuarioBundle\Entity\Perfil $user
     * @return Comodato
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

    /**
     * Set fechamodificacion
     *
     * @param \DateTime $fechamodificacion
     * @return Comodato
     */
    public function setFechamodificacion($fechamodificacion)
    {
        $this->fechamodificacion = $fechamodificacion;
    
        return $this;
    }

    /**
     * Get fechamodificacion
     *
     * @return \DateTime 
     */
    public function getFechamodificacion()
    {
        return $this->fechamodificacion;
    }

    public function __toString()
    {
        return $this->getObservacion();
    }
}