<?php

namespace Administracion\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


class Cambioclave
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     */
    private $claveanterior;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\NotEqualTo(value = "123456", message="La clave no puede ser igual a 123456.")
     * @Assert\Length(
     *      min = "6",
     *      max = "15",
     *      minMessage = "La clave no puede se menor a {{ limit }} caracteres de largo.",
     *      maxMessage = "La clave no puede se mayor a {{ limit }} caracteres de largo."
     * )
     */
    private $clavenueva;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\NotEqualTo(value = "123456", message="La clave no puede ser igual a 123456.")
     * @Assert\Length(
     *      min = "6",
     *      max = "15",
     *      minMessage = "La clave no puede se menor a {{ limit }} caracteres de largo.",
     *      maxMessage = "La clave no puede se mayor a {{ limit }} caracteres de largo."
     * )
     */
    private $claveconfirmacion;

     /**
     * Set claveanterior
     *
     * @param string $claveanterior
     * @return Perfil
     */
    public function setClaveanterior($claveanterior)
    {
        $this->claveanterior = $claveanterior;
    
        return $this;
    }
    
    /**
     * Get claveanterior
     *
     * @return string 
     */
    public function getClaveanterior()
    {
        return $this->claveanterior;
    }

     /**
     * Set clavenueva
     *
     * @param string $clavenueva
     * @return Perfil
     */
    public function setClavenueva($clavenueva)
    {
        $this->clavenueva = $clavenueva;
    
        return $this;
    }
    
    /**
     * Get clavenueva
     *
     * @return string 
     */
    public function getClavenueva()
    {
        return $this->clavenueva;
    }

     /**
     * Set claveconfirmacion
     *
     * @param string $claveconfirmacion
     * @return Perfil
     */
    public function setClaveconfirmacion($claveconfirmacion)
    {
        $this->claveconfirmacion = $claveconfirmacion;
    
        return $this;
    }
    
    /**
     * Get claveconfirmacion
     *
     * @return string 
     */
    public function getClaveconfirmacion()
    {
        return $this->claveconfirmacion;
    }
}