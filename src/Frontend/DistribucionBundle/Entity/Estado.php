<?php

namespace Frontend\DistribucionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Estado
 *
 * @ORM\Table(name="distribucion.estado")
 * @ORM\Entity
 */
class Estado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="distribucion.estado_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=100, nullable=false)
     */
    private $estado;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Operador", mappedBy="estado")
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
     * Set estado
     *
     * @param string $estado
     * @return Estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set pais
     *
     * @param \Frontend\DistribucionBundle\Entity\Pais $pais
     * @return Estado
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
     * Add operador
     *
     * @param \Frontend\DistribucionBundle\Entity\Operador $operador
     * @return Estado
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

    public function __toString()
    {
        return $this->getEstado();
    }
}