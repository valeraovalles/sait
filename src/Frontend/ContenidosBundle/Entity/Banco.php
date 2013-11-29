<?php

namespace Frontend\ContenidosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Banco
 *
 * @ORM\Table(name="contenidos.banco")
 * @ORM\Entity
 */
class Banco
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contenidos.banco_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_beneficiario", type="string", length=100, nullable=false)
     * @Assert\NotBlank()
     */
    private $nombreBeneficiario;

    /**
     * @var string
     *
     * @ORM\Column(name="banco_interm", type="string", length=100, nullable=true)
     */
    private $bancoInterm;

    /**
     * @var string
     *
     * @ORM\Column(name="swift_interm", type="string", length=50, nullable=true)
     */
    private $swiftInterm;

    /**
     * @var string
     *
     * @ORM\Column(name="aba_interm", type="string", length=50, nullable=true)
     */
    private $abaInterm;

    /**
     * @var string
     *
     * @ORM\Column(name="iban_interm", type="string", length=50, nullable=true)
     */
    private $ibanInterm;

    /**
     * @var string
     *
     * @ORM\Column(name="cuenta_interm", type="string", length=50, nullable=true)
     */
    private $cuentaInterm;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_bancointerm", type="string", length=500, nullable=true)
     */
    private $direccionBancointerm;

    /**
     * @var string
     *
     * @ORM\Column(name="banco_benef", type="string", length=100, nullable=false)
     * @Assert\NotBlank()
     */
    private $bancoBenef;

    /**
     * @var string
     *
     * @ORM\Column(name="cuenta_benef", type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     */
    private $cuentaBenef;

    /**
     * @var string
     *
     * @ORM\Column(name="swift_benef", type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     */
    private $swiftBenef;

    /**
     * @var string
     *
     * @ORM\Column(name="aba_benef", type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     */
    private $abaBenef;

    /**
     * @var string
     *
     * @ORM\Column(name="iban_benef", type="string", length=50, nullable=false)
     * @Assert\NotBlank()
     */
    private $ibanBenef;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_bancobenef", type="string", length=500, nullable=false)
     * @Assert\NotBlank()
     */
    private $direccionBancobenef;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion_beneficiario", type="string", length=500, nullable=false)
     * @Assert\NotBlank()
     */
    private $direccionBeneficiario;

    /**
     * @var \Contenidos.datosproveedor
     *
     * @ORM\ManyToOne(targetEntity="Frontend\ContenidosBundle\Entity\Datosproveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_proveedor", referencedColumnName="id")
     * })
     */
    private $idProveedor;

    /**
     * @var \Distribucion.pais
     *
     * @ORM\ManyToOne(targetEntity="Frontend\DistribucionBundle\Entity\Pais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais", referencedColumnName="id")
     * })
     * @Assert\NotBlank()
     */
    private $pais;



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
     * Set nombreBeneficiario
     *
     * @param string $nombreBeneficiario
     * @return Banco
     */
    public function setNombreBeneficiario($nombreBeneficiario)
    {
        $this->nombreBeneficiario = $nombreBeneficiario;
    
        return $this;
    }

    /**
     * Get nombreBeneficiario
     *
     * @return string 
     */
    public function getNombreBeneficiario()
    {
        return $this->nombreBeneficiario;
    }

    /**
     * Set bancoInterm
     *
     * @param string $bancoInterm
     * @return Banco
     */
    public function setBancoInterm($bancoInterm)
    {
        $this->bancoInterm = $bancoInterm;
    
        return $this;
    }

    /**
     * Get bancoInterm
     *
     * @return string 
     */
    public function getBancoInterm()
    {
        return $this->bancoInterm;
    }

    /**
     * Set swiftInterm
     *
     * @param string $swiftInterm
     * @return Banco
     */
    public function setSwiftInterm($swiftInterm)
    {
        $this->swiftInterm = $swiftInterm;
    
        return $this;
    }

    /**
     * Get swiftInterm
     *
     * @return string 
     */
    public function getSwiftInterm()
    {
        return $this->swiftInterm;
    }

    /**
     * Set abaInterm
     *
     * @param string $abaInterm
     * @return Banco
     */
    public function setAbaInterm($abaInterm)
    {
        $this->abaInterm = $abaInterm;
    
        return $this;
    }

    /**
     * Get abaInterm
     *
     * @return string 
     */
    public function getAbaInterm()
    {
        return $this->abaInterm;
    }

    /**
     * Set ibanInterm
     *
     * @param string $ibanInterm
     * @return Banco
     */
    public function setIbanInterm($ibanInterm)
    {
        $this->ibanInterm = $ibanInterm;
    
        return $this;
    }

    /**
     * Get ibanInterm
     *
     * @return string 
     */
    public function getIbanInterm()
    {
        return $this->ibanInterm;
    }

    /**
     * Set cuentaInterm
     *
     * @param string $cuentaInterm
     * @return Banco
     */
    public function setCuentaInterm($cuentaInterm)
    {
        $this->cuentaInterm = $cuentaInterm;
    
        return $this;
    }

    /**
     * Get cuentaInterm
     *
     * @return string 
     */
    public function getCuentaInterm()
    {
        return $this->cuentaInterm;
    }

    /**
     * Set direccionBancointerm
     *
     * @param string $direccionBancointerm
     * @return Banco
     */
    public function setDireccionBancointerm($direccionBancointerm)
    {
        $this->direccionBancointerm = $direccionBancointerm;
    
        return $this;
    }

    /**
     * Get direccionBancointerm
     *
     * @return string 
     */
    public function getDireccionBancointerm()
    {
        return $this->direccionBancointerm;
    }

    /**
     * Set bancoBenef
     *
     * @param string $bancoBenef
     * @return Banco
     */
    public function setBancoBenef($bancoBenef)
    {
        $this->bancoBenef = $bancoBenef;
    
        return $this;
    }

    /**
     * Get bancoBenef
     *
     * @return string 
     */
    public function getBancoBenef()
    {
        return $this->bancoBenef;
    }

    /**
     * Set cuentaBenef
     *
     * @param string $cuentaBenef
     * @return Banco
     */
    public function setCuentaBenef($cuentaBenef)
    {
        $this->cuentaBenef = $cuentaBenef;
    
        return $this;
    }

    /**
     * Get cuentaBenef
     *
     * @return string 
     */
    public function getCuentaBenef()
    {
        return $this->cuentaBenef;
    }

    /**
     * Set swiftBenef
     *
     * @param string $swiftBenef
     * @return Banco
     */
    public function setSwiftBenef($swiftBenef)
    {
        $this->swiftBenef = $swiftBenef;
    
        return $this;
    }

    /**
     * Get swiftBenef
     *
     * @return string 
     */
    public function getSwiftBenef()
    {
        return $this->swiftBenef;
    }

    /**
     * Set abaBenef
     *
     * @param string $abaBenef
     * @return Banco
     */
    public function setAbaBenef($abaBenef)
    {
        $this->abaBenef = $abaBenef;
    
        return $this;
    }

    /**
     * Get abaBenef
     *
     * @return string 
     */
    public function getAbaBenef()
    {
        return $this->abaBenef;
    }

    /**
     * Set ibanBenef
     *
     * @param string $ibanBenef
     * @return Banco
     */
    public function setIbanBenef($ibanBenef)
    {
        $this->ibanBenef = $ibanBenef;
    
        return $this;
    }

    /**
     * Get ibanBenef
     *
     * @return string 
     */
    public function getIbanBenef()
    {
        return $this->ibanBenef;
    }

    /**
     * Set direccionBancobenef
     *
     * @param string $direccionBancobenef
     * @return Banco
     */
    public function setDireccionBancobenef($direccionBancobenef)
    {
        $this->direccionBancobenef = $direccionBancobenef;
    
        return $this;
    }

    /**
     * Get direccionBancobenef
     *
     * @return string 
     */
    public function getDireccionBancobenef()
    {
        return $this->direccionBancobenef;
    }

    /**
     * Set direccionBeneficiario
     *
     * @param string $direccionBeneficiario
     * @return Banco
     */
    public function setDireccionBeneficiario($direccionBeneficiario)
    {
        $this->direccionBeneficiario = $direccionBeneficiario;
    
        return $this;
    }

    /**
     * Get direccionBeneficiario
     *
     * @return string 
     */
    public function getDireccionBeneficiario()
    {
        return $this->direccionBeneficiario;
    }

    /**
     * Set idProveedor
     *
     * @param \Frontend\ContenidosBundle\Entity\Datosproveedor $idProveedor
     * @return Banco
     */
    public function setIdProveedor(\Frontend\ContenidosBundle\Entity\Datosproveedor $idProveedor = null)
    {
        $this->idProveedor = $idProveedor;
    
        return $this;
    }

    /**
     * Get idProveedor
     *
     * @return \Frontend\ContenidosBundle\Entity\Datosproveedor 
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * Set pais
     *
     * @param \Frontend\DistribucionBundle\Entity\Pais $pais
     * @return Banco
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

    public function __toString()
    {   
        return strval($this->id);
    }

}