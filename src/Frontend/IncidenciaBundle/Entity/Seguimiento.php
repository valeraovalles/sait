<?php

namespace Frontend\IncidenciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Seguimiento
 *
 * @ORM\Table(name="incidencia.seguimiento")
 * @ORM\Entity
 */
class Seguimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="incidencia.seguimiento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="seguimiento", type="string", nullable=false)
     * @Assert\NotBlank(message="El campo seguimiento no puede estar en blanco.")
     */
    private $seguimiento;

    /**
     * @var date
     * 
     * @ORM\Column(name="fechaseguimiento", type="date", nullable=false)
     * @Assert\NotBlank(message="El campo fecha no puede estar en blanco.")
     */
    private $fechaSeguimiento;
    
    /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $responsable; 
      
    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    public function getSeguimiento() {
        return $this->seguimiento;
    }

    public function getFechaSeguimiento() {
        return $this->fechaSeguimiento;
    }

    public function getResponsable() {
        return $this->responsable;
    }

    public function setSeguimiento($seguimiento) {
        $this->seguimiento = $seguimiento;
    }

    public function setFechaSeguimiento(date $fechaSeguimiento) {
        $this->fechaSeguimiento = $fechaSeguimiento;
    }

    public function setResponsable(\Perfil $responsable) {
        $this->responsable = $responsable;
    }




   
}