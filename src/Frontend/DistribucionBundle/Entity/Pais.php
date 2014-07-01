<?php

namespace Frontend\DistribucionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Pais
 *
 * @ORM\Table(name="distribucion.pais")
 * @ORM\Entity
 */
class Pais
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="distribucion.pais_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="pais", type="string", length=200, nullable=false)
     * @Assert\NotBlank()
     */
    private $pais;

    /**
     * @var string
     *
     * @ORM\Column(name="referencia", type="string", length=200, nullable=true)
     */
    private $referencia;


    /**
     * @var string
     *
     * @ORM\Column(name="latitud", type="float", nullable=true)
     */
    private $latitud;

    /**
     * @var string
     *
     * @ORM\Column(name="longitud", type="float", nullable=true)
     */
    private $longitud;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=10, nullable=true)
     */
    private $codigo;

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
     * Set pais
     *
     * @param string $pais
     * @return Pais
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
     * Set lalon
     *
     * @param string $lalon
     * @return Lalon
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    
        return $this;
    }

    /**
     * Get lalon
     *
     * @return string 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

   /**
     * Set lalon
     *
     * @param string $lalon
     * @return Lalon
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    
        return $this;
    }

    /**
     * Get lalon
     *
     * @return string 
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set capital
     *
     * @param string $capital
     * @return Pais
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;
    
        return $this;
    }

    /**
     * Get capital
     *
     * @return string 
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set referencia
     *
     * @param string $referencia
     * @return Pais
     */
    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    
        return $this;
    }

    /**
     * Get referencia
     *
     * @return string 
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Codigo
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

    public function __toString()
    {
        return $this->getPais();
    }

}