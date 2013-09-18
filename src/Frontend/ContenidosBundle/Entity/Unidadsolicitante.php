<?php

namespace Frontend\ContenidosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unidadsolicitante
 *
 * @ORM\Table(name="contenidos.unidadsolicitante")
 * @ORM\Entity
 */
class Unidadsolicitante
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contenidos.unidadsolicitante_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true)
     */
    private $nombre;

    /**
     * @var \Contenidos.tipoproveedor
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Tipoproveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipoproveedor", referencedColumnName="id")
     * })
     */
    private $idTipoproveedor;



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
     * @return Unidadsolicitante
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
     * Set idTipoproveedor
     *
     * @param \Frontend\ContenidosBundle\Entity\Tipoproveedor $idTipoproveedor
     * @return Unidadsolicitante
     */
    public function setIdTipoproveedor(\Frontend\ContenidosBundle\Entity\Tipoproveedor $idTipoproveedor = null)
    {
        $this->idTipoproveedor = $idTipoproveedor;
    
        return $this;
    }

    /**
     * Get idTipoproveedor
     *
     * @return \Frontend\ContenidosBundle\Entity\Tipoproveedor 
     */
    public function getIdTipoproveedor()
    {
        return $this->idTipoproveedor;
    }

    public function __toString()
    {
        return $this->getNombre();
    }
}