<?php

namespace Frontend\SitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Subcategoria
 *
 * @ORM\Table(name="sit.subcategoria")
 * @ORM\Entity
 */
class Subcategoria
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sit.subcategoria_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="subcategoria", type="string", length=50, nullable=false)
     * @Assert\NotBlank(message="Debe escribir la subcategoria.")
     */
    private $subcategoria;

    /**
     * @var \Categoria
     *
     * @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     * })
     */
    private $categoria;



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
     * Set subcategoria
     *
     * @param string $subcategoria
     * @return Subcategoria
     */
    public function setSubcategoria($subcategoria)
    {
        $this->subcategoria = $subcategoria;
    
        return $this;
    }

    /**
     * Get subcategoria
     *
     * @return string 
     */
    public function getSubcategoria()
    {
        return $this->subcategoria;
    }

    /**
     * Set categoria
     *
     * @param \Frontend\SitBundle\Entity\Categoria $categoria
     * @return Subcategoria
     */
    public function setCategoria(\Frontend\SitBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Frontend\SitBundle\Entity\Categoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
}