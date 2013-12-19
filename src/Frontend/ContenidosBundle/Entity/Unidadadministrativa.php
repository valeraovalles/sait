<?php

namespace Frontend\ContenidosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Unidadadministrativa
 *
 * @ORM\Table(name="contenidos.unidadadministrativa")
 * @ORM\Entity
 */
class Unidadadministrativa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contenidos.unidadadministrativa_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60, nullable=false)
     * @Assert\NotBlank()
     */
    private $nombre;

    /**
     * @var \Contenidos.unidadejecutora
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Unidadejecutora")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_unidadejecutora", referencedColumnName="id")
     * })
     * @Assert\NotBlank()
     */
    private $idUnidadejecutora;



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
     * Set nombre
     *
     * @param string $nombre
     * @return Unidadadministrativa
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set idUnidadejecutora
     *
     * @param \Frontend\ContenidosBundle\Entity\Unidadejecutora $idUnidadejecutora
     * @return Unidadadministrativa
     */
    public function setIdUnidadejecutora(\Frontend\ContenidosBundle\Entity\Unidadejecutora $idUnidadejecutora = null)
    {
        $this->idUnidadejecutora = $idUnidadejecutora;
    
        return $this;
    }

    /**
     * Get idUnidadejecutora
     *
     * @return \Frontend\ContenidosBundle\Entity\Unidadejecutora 
     */
    public function getIdUnidadejecutora()
    {
        return $this->idUnidadejecutora;
    }
}