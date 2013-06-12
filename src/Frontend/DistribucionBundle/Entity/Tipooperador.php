<?php

namespace Frontend\DistribucionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Tipooperador
 *
 * @ORM\Table(name="distribucion.tipooperador")
 * @ORM\Entity
 * @UniqueEntity("codigo")
 */
class Tipooperador
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="distribucion.tipooperador_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="operador", type="string", length=100, nullable=false, unique=true)
     * @Assert\NotBlank()
     */
    private $operador;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=10, nullable=false, length=3, unique=true)
     * @Assert\NotBlank()
     * @Assert\Length(min="3", minMessage="El código debe ser de 3 caracteres")
     */
    private $codigo;

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
     * Set operador
     *
     * @param string $operador
     * @return Tipooperador
     */
    public function setOperador($operador)
    {
        $this->operador = $operador;
    
        return $this;
    }

    /**
     * Get operador
     *
     * @return string 
     */
    public function getOperador()
    {
        return $this->operador;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Tipooperador
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
     * Set user
     *
     * @param \Administracion\UsuarioBundle\Entity\Perfil $user
     * @return Tipooperador
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
        return $this->getOperador();
    }
}