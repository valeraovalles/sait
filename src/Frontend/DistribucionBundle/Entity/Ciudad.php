<?php

namespace Frontend\DistribucionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ciudad
 *
 * @ORM\Table(name="distribucion.ciudad")
 * @ORM\Entity
 */
class Ciudad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="distribucion.ciudad_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ciudad", type="string", length=300, nullable=false)
     */
    private $ciudad;

    /**
     * @var string
     *
     * @ORM\Column(name="latitud", type="string", length=50, nullable=false)
     */
    private $latitud;

    /**
     * @var string
     *
     * @ORM\Column(name="longitud", type="string", length=50, nullable=false)
     */
    private $longitud;

    /**
     * @var \Pais
     *
     * @ORM\ManyToOne(targetEntity="Pais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais_id", referencedColumnName="id")
     * })
     */
    private $pais;

    /**
     * @var \Estado
     *
     * @ORM\ManyToOne(targetEntity="Estado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estado_id", referencedColumnName="id")
     * })
     */
    private $estado;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Operador", mappedBy="ciudad")
     */
    private $operador;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->operador = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set ciudad
     *
     * @param string $ciudad
     * @return Ciudad
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    
        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set latitud
     *
     * @param string $latitud
     * @return Ciudad
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    
        return $this;
    }

    /**
     * Get latitud
     *
     * @return string 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param string $longitud
     * @return Ciudad
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    
        return $this;
    }

    /**
     * Get longitud
     *
     * @return string 
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Set pais
     *
     * @param \Frontend\DistribucionBundle\Entity\Pais $pais
     * @return Ciudad
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

    /**
     * Set estado
     *
     * @param \Frontend\DistribucionBundle\Entity\Estado $estado
     * @return Ciudad
     */
    public function setEstado(\Frontend\DistribucionBundle\Entity\Estado $estado = null)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return \Frontend\DistribucionBundle\Entity\Estado 
     */
    public function getEstado()
    {
        return $this->estado;
    }
    
   /**
     * Add operador
     *
     * @param \Frontend\DistribucionBundle\Entity\Operador $operador
     * @return Ciudad
     */
    public function addOperador(\Frontend\DistribucionBundle\Entity\Operador $operador)
    {
        $this->operador[] = $operador;
    
        return $this;
    }

    /**
     * Remove operador
     *
     * @param \Frontend\DistribucionBundle\Entity\Operador $operador
     */
    public function removeOperador(\Frontend\DistribucionBundle\Entity\Operador $operador)
    {
        $this->operador->removeElement($operador);
    }

    /**
     * Get operador
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOperador()
    {
        return $this->operador;
    }

}