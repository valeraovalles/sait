<?php

namespace Frontend\CreatvBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class Txt
{

    /**
     * @Assert\NotBlank() 
     */
    private $tipo;
    /**
     * @Assert\Date()
     * @Assert\NotBlank() 
     */
    private $fecha;

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Comodato
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set tipo
     *
     * @param \DateTime $tipo
     * @return Comodato
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return \DateTime 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}