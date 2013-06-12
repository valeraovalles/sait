<?php

namespace Frontend\DistribucionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Objetocomodato
 *
 * @ORM\Table(name="distribucion.objetocomodato")
 * @ORM\Entity
 */
class Objetocomodato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="distribucion.objetocomodato_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="objeto", type="string", length=500, nullable=false, unique=true)
     * @Assert\NotBlank()
     */
    private $objeto;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Comodato", mappedBy="objetocomodato")
     */
    private $comodato;

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
     * Constructor
     */
    public function __construct()
    {
        $this->comodato = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set objeto
     *
     * @param string $objeto
     * @return Objetocomodato
     */
    public function setObjeto($objeto)
    {
        $this->objeto = $objeto;
    
        return $this;
    }

    /**
     * Get objeto
     *
     * @return string 
     */
    public function getObjeto()
    {
        return $this->objeto;
    }

    /**
     * Add comodato
     *
     * @param \Frontend\DistribucionBundle\Entity\Comodato $comodato
     * @return Objetocomodato
     */
    public function addComodato(\Frontend\DistribucionBundle\Entity\Comodato $comodato)
    {
        $this->comodato[] = $comodato;
    
        return $this;
    }

    /**
     * Remove comodato
     *
     * @param \Frontend\DistribucionBundle\Entity\Comodato $comodato
     */
    public function removeComodato(\Frontend\DistribucionBundle\Entity\Comodato $comodato)
    {
        $this->comodato->removeElement($comodato);
    }

    /**
     * Get comodato
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComodato()
    {
        return $this->comodato;
    }
    
    /**
     * Set user
     *
     * @param \Administracion\UsuarioBundle\Entity\Perfil $user
     * @return Objetocomodato
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
    
    public function __toString()
    {
        return $this->getObjeto();
    }
}