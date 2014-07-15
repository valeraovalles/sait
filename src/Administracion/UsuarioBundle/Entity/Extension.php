<?php

namespace Administracion\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


class Extension
{
    /**
     * @var string
     *
     * @Assert\NotBlank(message="La extensión no debe estar en blanco.")
     * @Assert\Type(type="digit", message="La extensión debe ser un número.")
     * @Assert\NotEqualTo(value = "0", message="La extensión no puede ser igual a 0.")
     */
    private $extension=null;

     /**
     * Set extension
     *
     * @param string $extension
     * @return Perfil
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;
    
        return $this;
    }
    
    /**
     * Get extension
     *
     * @return string 
     */
    public function getExtension()
    {
        return $this->extension;
    }
}