<?php

namespace Frontend\MercalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Numeracion
 *
 * @ORM\Table(name="mercal.numeracion")
 * @ORM\Entity
 */
class Numeracion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mercal.numeracion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechahora", type="datetime", nullable=false)
     */
    private $fechahora;

    /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Usernumero")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usernumero_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $usernumero;


    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="integer", length=3, nullable=false)
     */
    private $valor;


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
    public function setValor($valor)
    {
        $this->valor = $valor;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Administracion\UsuarioBundle\Entity\User 
     */
    public function getValor()
    {
        return $this->valor;
    }


    /**
     * Set fechasolicitud
     *
     * @param \DateTime $fechasolicitud
     * @return Ticket
     */
    public function setFechahora($fechahora)
    {
        $this->fechahora = $fechahora;
    
        return $this;
    }

    /**
     * Get fechasolicitud
     *
     * @return \DateTime 
     */
    public function getFechahora()
    {
        return $this->fechahora;
    }
    
   /**
     * Set usernumero
     *
     * @param \Frontend\SitBundle\Entity\Usernumero $usernumero
     * @return Ticket
     */
    public function setUsernumero(\Frontend\MercalBundle\Entity\Usernumero $usernumero = null)
    {
        $this->usernumero = $usernumero;
    
        return $this;
    }

    /**
     * Get usernumero
     *
     * @return \Frontend\SitBundle\Entity\Usernumero 
     */
    public function getUsernumero()
    {
        return $this->usernumero;
    }

}