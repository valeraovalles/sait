<?php

namespace Frontend\ContenidosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleTipoproveedor
 *
 * @ORM\Table(name="contenidos.detalle_tipoproveedor")
 * @ORM\Entity
 */
class DetalleTipoproveedor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contenidos.detalle_tipoproveedor_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var \Contenidos.tipoproveedor
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Tipoproveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipoproveedo", referencedColumnName="id")
     * })
     */
    private $idTipoproveedo;



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
     * @return DetalleTipoproveedor
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
     * Set idTipoproveedo
     *
     * @param \Frontend\ContenidosBundle\Entity\Tipoproveedor $idTipoproveedo
     * @return DetalleTipoproveedor
     */
    public function setIdTipoproveedo(\Frontend\ContenidosBundle\Entity\Tipoproveedor $idTipoproveedo = null)
    {
        $this->idTipoproveedo = $idTipoproveedo;
    
        return $this;
    }

    /**
     * Get idTipoproveedo
     *
     * @return \Frontend\ContenidosBundle\Entity\Tipoproveedor 
     */
    public function getIdTipoproveedo()
    {
        return $this->idTipoproveedo;
    }

    public function __toString()
    {
        return $this->getNombre();
    }
}