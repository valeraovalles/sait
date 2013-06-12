<?php

namespace Frontend\DistribucionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feria
 *
 * @ORM\Table(name="distribucion.feria")
 * @ORM\Entity
 */
class Feria
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="distribucion.feria_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreinforme", type="string", length=100, nullable=true)
     */
    private $nombreinforme;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreimg1", type="string", length=100, nullable=true)
     */
    private $nombreimg1;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreimg2", type="string", length=100, nullable=false)
     */
    private $nombreimg2;

    /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



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
     * Set nombreinforme
     *
     * @param string $nombreinforme
     * @return Feria
     */
    public function setNombreinforme($nombreinforme)
    {
        $this->nombreinforme = $nombreinforme;
    
        return $this;
    }

    /**
     * Get nombreinforme
     *
     * @return string 
     */
    public function getNombreinforme()
    {
        return $this->nombreinforme;
    }

    /**
     * Set nombreimg1
     *
     * @param string $nombreimg1
     * @return Feria
     */
    public function setNombreimg1($nombreimg1)
    {
        $this->nombreimg1 = $nombreimg1;
    
        return $this;
    }

    /**
     * Get nombreimg1
     *
     * @return string 
     */
    public function getNombreimg1()
    {
        return $this->nombreimg1;
    }

    /**
     * Set nombreimg2
     *
     * @param string $nombreimg2
     * @return Feria
     */
    public function setNombreimg2($nombreimg2)
    {
        $this->nombreimg2 = $nombreimg2;
    
        return $this;
    }

    /**
     * Get nombreimg2
     *
     * @return string 
     */
    public function getNombreimg2()
    {
        return $this->nombreimg2;
    }

    /**
     * Set user
     *
     * @param \Administracion\UsuarioBundle\Entity\Perfil $user
     * @return Feria
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
}