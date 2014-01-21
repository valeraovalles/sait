<?php

namespace Frontend\IncidenciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Relaciongasto
 *
 * @ORM\Table(name="incidencia.incidencia")
 * @ORM\Entity
 */
class Incidencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="incidencia.incidencia_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="incidencia", type="string", nullable=false)
     * @Assert\NotBlank(message="El campo incidencia no puede estar en blanco.")
     */
    private $incidencia;

    /**
     * @var date
     * 
     * @ORM\Column(name="fechaincidencia", type="date", nullable=false)
     * @Assert\NotBlank(message="El campo fecha no puede estar en blanco.")
     */
    private $fechaIncidencia;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="emisorincidencia", type="string", nullable=false)
     * @Assert\NotBlank(message="El campo emisor de incidencia no puede estar en blanco")
     */
    private $emisorIncidencia;
    
   
    /**
     * @var \Tipoincidencia
     *
     * @ORM\ManyToOne(targetEntity="tipoincidencia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoincidencia_id", referencedColumnName="id")
     * })
     */
    private $tipoincidencia;
    
      
    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    public function getIncidencia() {
        return $this->incidencia;
    }

    public function getFechaIncidencia() {
        return $this->fechaIncidencia;
    }

    public function getEmisorIncidencia() {
        return $this->emisorIncidencia;
    }

    public function getTipoincidencia() {
        return $this->tipoincidencia;
    }

    public function setIncidencia($incidencia) {
        $this->incidencia = $incidencia;
    }

    public function setFechaIncidencia(date $fechaIncidencia) {
        $this->fechaIncidencia = $fechaIncidencia;
    }

    public function setEmisorIncidencia($emisorIncidencia) {
        $this->emisorIncidencia = $emisorIncidencia;
    }

    public function setTipoincidencia(\Tipoincidencia $tipoincidencia) {
        $this->tipoincidencia = $tipoincidencia;
    }


    
    
    

   
}