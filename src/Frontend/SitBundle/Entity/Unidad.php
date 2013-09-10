<?php

namespace Frontend\SitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unidad
 *
 * @ORM\Table(name="unidad")
 * @ORM\Entity
 */
class Unidad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="unidad_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=100, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=50, nullable=false)
     */
    private $correo;


    /**
     * @ORM\ManyToMany(targetEntity="Administracion\UsuarioBundle\Entity\User", inversedBy="unidad")
     * @ORM\JoinTable(name="usuarios.usuariounidad",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="unidad_id", referencedColumnName="id")}
     *      )
     **/

    private $user;

    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Unidad
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Unidad
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    
        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }


     /**
     * Add user
     *
     * @param \Administracion\UsuarioBundle\Entity\User $user
     * @return Usuario
     */
    public function addUser(\Administracion\UsuarioBundle\Entity\User $user)
    {
        $this->user[] = $user;
        return $this;
    }

    /**
     * Remove user
     *
     * @param \Administracion\UsuarioBundle\Entity\User $user
     */
    public function removeUser(\Administracion\UsuarioBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }


    public function __toString(){
        return $this->getDescripcion();
    }
}

