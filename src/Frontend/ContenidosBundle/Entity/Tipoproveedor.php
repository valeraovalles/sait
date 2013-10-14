<?php

namespace Frontend\ContenidosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipoproveedor
 *
 * @ORM\Table(name="contenidos.tipoproveedor")
 * @ORM\Entity
 */
class Tipoproveedor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contenidos.tipoproveedor_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Frontend\ContenidosBundle\Entity\Datosproveedor", mappedBy="idTipoproveedor")
     */
    private $idProveedor;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idProveedor = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Tipoproveedor
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
     * Add idProveedor
     *
     * @param \Frontend\ContenidosBundle\Entity\Datosproveedor $idProveedor
     * @return Tipoproveedor
     */
    public function addIdProveedor(\Frontend\ContenidosBundle\Entity\Datosproveedor $idProveedor)
    {
        $this->idProveedor[] = $idProveedor;
    
        return $this;
    }

    /**
     * Remove idProveedor
     *
     * @param \Frontend\ContenidosBundle\Entity\Datosproveedor $idProveedor
     */
    public function removeIdProveedor(\Frontend\ContenidosBundle\Entity\Datosproveedor $idProveedor)
    {
        $this->idProveedor->removeElement($idProveedor);
    }

    /**
     * Get idProveedor
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }
    public function __toString()
    {
        return $this->getNombre();
    }
}