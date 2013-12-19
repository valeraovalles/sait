<?php

namespace Frontend\ContratosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Contratos
 *
 * @ORM\Table(name="contratos.contratos")
 * @ORM\Entity
 */
class Contratos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contratos.contratos_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="date", nullable=false)
     */
    private $fechaRegistro;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=20, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="empresa", type="string", length=200, nullable=false)
     * @Assert\NotBlank()
     */
    private $empresa;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=false)
     * @Assert\NotBlank()
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=true)
     */
    private $fechaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="duracion", type="string", length=100, nullable=true)
     */
    private $duracion;

    /**
     * @var float
     *
     * @ORM\Column(name="monto_bs", type="decimal", nullable=true)
     */
    private $montoBs;

    /**
     * @var float
     *
     * @ORM\Column(name="monto_dolares", type="decimal", nullable=true)
     */
    private $montoDolares;

    /**
     * @var float
     *
     * @ORM\Column(name="monto_euros", type="decimal", nullable=true)
     */
    private $montoEuros;

    /**
     * @var string
     *
     * @ORM\Column(name="obra", type="string", length=200, nullable=true)
     */
    private $obra;

    /**
     * @var \Contratos.direccionsolicitante
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContratosBundle\Entity\Direccionsolicitante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_direccion", referencedColumnName="id")
     * })
     * @Assert\NotBlank()
     */
    private $idDireccion;

    /**
     * @var \Contratos.abogados
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContratosBundle\Entity\Abogados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_abogado", referencedColumnName="id")
     * })
     * @Assert\NotBlank()
     */
    private $idAbogado;

    /**
     * @Assert\File(maxSize="5000000", maxSizeMessage="El archivo que intenta subir es demasiado grande.")
     *  
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="archivo", type="string", length=500, nullable=true)
     */
    private $archivo;



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
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set archivo
     *
     * @param string $archivo
     * @return Ticket
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



    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     * @return Contratos
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
    
        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime 
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Contratos
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    
        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set empresa
     *
     * @param string $empresa
     * @return Contratos
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    
        return $this;
    }

    /**
     * Get empresa
     *
     * @return string 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Contratos
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    
        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Contratos
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    
        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set duracion
     *
     * @param string $duracion
     * @return Contratos
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    
        return $this;
    }

    /**
     * Get duracion
     *
     * @return string 
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set montoBs
     *
     * @param float $montoBs
     * @return Contratos
     */
    public function setMontoBs($montoBs)
    {
        $this->montoBs = $montoBs;
    
        return $this;
    }

    /**
     * Get montoBs
     *
     * @return float 
     */
    public function getMontoBs()
    {
        return $this->montoBs;
    }

    /**
     * Set montoDolares
     *
     * @param float $montoDolares
     * @return Contratos
     */
    public function setMontoDolares($montoDolares)
    {
        $this->montoDolares = $montoDolares;
    
        return $this;
    }

    /**
     * Get montoDolares
     *
     * @return float 
     */
    public function getMontoDolares()
    {
        return $this->montoDolares;
    }

    /**
     * Set montoEuros
     *
     * @param float $montoEuros
     * @return Contratos
     */
    public function setMontoEuros($montoEuros)
    {
        $this->montoEuros = $montoEuros;
    
        return $this;
    }

    /**
     * Get montoEuros
     *
     * @return float 
     */
    public function getMontoEuros()
    {
        return $this->montoEuros;
    }

    /**
     * Set obra
     *
     * @param string $obra
     * @return Contratos
     */
    public function setObra($obra)
    {
        $this->obra = $obra;
    
        return $this;
    }

    /**
     * Get obra
     *
     * @return string 
     */
    public function getObra()
    {
        return $this->obra;
    }

    /**
     * Set idDireccion
     *
     * @param \Frontend\ContratosBundle\Entity\Direccionsolicitante $idDireccion
     * @return Contratos
     */
    public function setIdDireccion(\Frontend\ContratosBundle\Entity\Direccionsolicitante $idDireccion = null)
    {
        $this->idDireccion = $idDireccion;
    
        return $this;
    }

    /**
     * Get idDireccion
     *
     * @return \Frontend\ContratosBundle\Entity\Direccionsolicitante 
     */
    public function getIdDireccion()
    {
        return $this->idDireccion;
    }

    /**
     * Set idAbogado
     *
     * @param \Frontend\ContratosBundle\Entity\Abogados $idAbogado
     * @return Contratos
     */
    public function setIdAbogado(\Frontend\ContratosBundle\Entity\Abogados $idAbogado = null)
    {
        $this->idAbogado = $idAbogado;
    
        return $this;
    }

    /**
     * Get idAbogado
     *
     * @return \Frontend\ContratosBundle\Entity\Abogados 
     */
    public function getIdAbogado()
    {
        return $this->idAbogado;
    }
}