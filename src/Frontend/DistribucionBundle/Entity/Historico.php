<?php

namespace Frontend\DistribucionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Paquete
 *
 * @ORM\Table(name="distribucion.historico")
 * @ORM\Entity
 */
class Historico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="distribucion.historico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="numeroabonados", type="bigint", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Type(type="numeric", message="Este valor debe ser numérico {{ type }}")
     */
    private $numeroabonados;

    /**
     * @var \Operador
     *
     * @ORM\ManyToOne(targetEntity="Frontend\DistribucionBundle\Entity\Operador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="operador_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $operador;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechamodificacion", type="date", nullable=true)
     */
    private $fechamodificacion;

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
     * Set numeroabonados
     *
     * @param integer $numeroabonados
     * @return Operador
     */
    public function setNumeroabonados($numeroabonados)
    {
        $this->numeroabonados = $numeroabonados;
    
        return $this;
    }

    /**
     * Get numeroabonados
     *
     * @return integer 
     */
    public function getNumeroabonados()
    {
        return $this->numeroabonados;
    }

    
    /**
     * Set oprador
     *
     * @param \Administracion\UsuarioBundle\Entity\Operador $operador
     * @return Representante
     */
    public function setOperador(\Frontend\DistribucionBundle\Entity\Operador $operador = null)
    {
        $this->operador = $operador;
    
        return $this;
    }

    /**
     * Get oprador
     *
     * @return \Administracion\UsuarioBundle\Entity\Operador 
     */
    public function getOperador()
    {
        return $this->operador;
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
        return $this->getNumeroabonados();
    }
}