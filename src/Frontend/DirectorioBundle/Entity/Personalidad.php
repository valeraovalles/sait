<?php

namespace Frontend\DirectorioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Directorio.personalidad
 *
 * @ORM\Table(name="directorio.personalidad")
 * @ORM\Entity
 */
class Personalidad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="directorio.personalidad_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", nullable=false)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=30, nullable=false)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", nullable=false)
     */
    private $email;

  
    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Frontend\DirectorioBundle\Entity\Especialidad")
     * 
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="area", referencedColumnName="id")
     * })
     * @Assert\NotBlank()
     */
    private $especialidad;


    /**
     * @var \Pais
     *
     * @ORM\ManyToOne(targetEntity="Frontend\DistribucionBundle\Entity\Pais")
     * 
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais", referencedColumnName="id")
     * })
     * @Assert\NotBlank()
     */
    private $pais;


    /**
     * @var \Pais
     *
     * @ORM\ManyToOne(targetEntity="Frontend\DistribucionBundle\Entity\Pais")
     * 
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="paisprocedencia", referencedColumnName="id")
     * })
     * @Assert\NotBlank()
     */
    private $paisprocedencia;


    /**
     * @var string
     *
     * @ORM\Column(name="ciudad", type="string", nullable=false)
     */
    private $ciudad;


    /**
     * @var string
     *
     * @ORM\Column(name="archivo", type="string", length=500, nullable=true)
     */
    private $archivo;
    

    /**
    * @Assert\File(maxSize="1M", mimeTypes={"image/png", "image/jpeg","image/jpg", "image/gif"})
    */
    private $file;



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
     * @return Personalidad
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
     * Set apellido
     *
     * @param string $apellido
     * @return Personalidad
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     * @return Personalidad
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Personalidad
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set especialidad
     *
     * @param string $especialidad
     * @return Personalidad
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;
    
        return $this;
    }

    /**
     * Get especialidad
     *
     * @return string 
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * Set pais
     *
     * @param \Frontend\DistribucionBundle\Entity\Pais $pais
     * @return Personalidad
     */
    public function setPais(\Frontend\DistribucionBundle\Entity\Pais $pais = null)
    {
        $this->pais = $pais;
    
        return $this;
    }

    /**
     * Get pais
     *
     * @return \Frontend\DistribucionBundle\Entity\Pais 
     */
    public function getPais()
    {
        return $this->pais;
    }


    /**
     * Set paisprocedencia
     *
     * @param \Frontend\DistribucionBundle\Entity\Pais $pais
     * @return Personalidad
     */
    public function setPaisprocedencia(\Frontend\DistribucionBundle\Entity\Pais $pais = null)
    {
        $this->paisprocedencia = $pais;
    
        return $this;
    }

    /**
     * Get paisprocedencia
     *
     * @return \Frontend\DistribucionBundle\Entity\Pais 
     */
    public function getPaisprocedencia()
    {
        return $this->paisprocedencia;
    }


    /**
     * Set ciudad
     *
     * @param string $ciudad
     * @return Personalidad
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    
        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }


    /**
     * Set archivo
     *
     * @param string $archivo
     * @return string
     */
    public function setArchivo($archivo)
    {
        $this->archivo = $archivo;
    
        return $this;
    }

    /**
     * Get archivo
     *
     * @return string 
     */
    public function getArchivo()
    {
        return $this->archivo;
    }

      
    public function setFile($file)
    {
        $this->file = $file;
    
        return $this;
    }

    /**
     * Get archivo
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

}