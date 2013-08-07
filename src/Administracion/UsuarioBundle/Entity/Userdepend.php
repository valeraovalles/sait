<?php

namespace Administracion\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userdepend
 *
 * @ORM\Table(name="usuarios.userdepend")
 * @ORM\Entity
 */
class Userdepend
{
    /**
     * @var \Usuarios.user
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Administracion\UsuarioBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    public $idUser;

    /**
     * @var \Usuarios.depend
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Depend")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_depend", referencedColumnName="id")
     * })
     */
    public $idDepend;

    /**
     * Set idUser
     *
     * @param \Administracion\UsuarioBundle\Entity\User $idUser
     * @return Userdepend
     */
    public function setIdUser(\Administracion\UsuarioBundle\Entity\User $idUser)
    {
        $this->idUser = $idUser;
    
        return $this;
    }

    /**
     * Get idUser
     *
     * @return \Administracion\UsuarioBundle\Entity\User 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idDepend
     *
     * @param \Administracion\UsuarioBundle\Entity\Depend $idDepend
     * @return Userdepend
     */
    public function setIdDepend(\Administracion\UsuarioBundle\Entity\Depend $idDepend = null)
    {
        $this->idDepend = $idDepend;
    
        return $this;
    }

    /**
     * Get idDepend
     *
     * @return \Administracion\UsuarioBundle\Entity\Depend 
     */
    public function getIdDepend()
    {
        return $this->idDepend;
    }

    public function __toString()
    {
        return $this->IdDepend();
    }
}