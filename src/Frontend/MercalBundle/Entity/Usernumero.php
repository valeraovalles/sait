<?php

namespace Frontend\MercalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Numeracion
 *
 * @ORM\Table(name="mercal.usernumero")
 * @ORM\Entity
 */
class Usernumero
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mercal.usernumero_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;


    /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="trabajador_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $trabajador;


    /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Jornada")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="jornada_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $jornada;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="integer", length=3, nullable=false)
     */
    private $numero;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechahoraasignacion", type="datetime", nullable=false)
     */
    private $fechahoraasignacion;

    /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Familiar")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="familiar_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $familiar;

    /**
     * @var string
     *
     * @ORM\Column(name="compro", type="boolean", nullable=true)
     */
    private $compro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechahoranumeracion", type="datetime", nullable=true)
     */
    private $fechahoranumeracion;

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
     * Set trabajador
     *
     * @param \Administracion\UsuarioBundle\Entity\Perfil $trabajador
     * @return Operador
     */
    public function setTrabajador(\Administracion\UsuarioBundle\Entity\Perfil $trabajador = null)
    {
        $this->trabajador = $trabajador;
    
        return $this;
    }

    /**
     * Get trabajador
     *
     * @return \Administracion\UsuarioBundle\Entity\Perfil 
     */
    public function getTrabajador()
    {
        return $this->trabajador;
    }

    /**
     * Set user
     *
     * @param \Administracion\UsuarioBundle\Entity\User $user
     * @return Tipooperador
     */
    public function setCompro($compro)
    {
        $this->compro = $compro;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Administracion\UsuarioBundle\Entity\User 
     */
    public function getCompro()
    {
        return $this->compro;
    }

    /**
     * Set user
     *
     * @param \Administracion\UsuarioBundle\Entity\User $user
     * @return Tipooperador
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Administracion\UsuarioBundle\Entity\User 
     */
    public function getNumero()
    {
        return $this->numero;
    }


    /**
     * Set fechasolicitud
     *
     * @param \DateTime $fechasolicitud
     * @return Ticket
     */
    public function setFechahoraasignacion($fechahoraasignacion)
    {
        $this->fechahoraasignacion = $fechahoraasignacion;
    
        return $this;
    }

    /**
     * Get fechasolicitud
     *
     * @return \DateTime 
     */
    public function getFechahoraasignacion()
    {
        return $this->fechahoraasignacion;
    }

    /**
     * Set fechasolicitud
     *
     * @param \DateTime $fechasolicitud
     * @return Ticket
     */
    public function setFechahoranumeracionn($fechahoranumeracion)
    {
        $this->fechahoranumeracion = $fechahoranumeracion;
    
        return $this;
    }

    /**
     * Get fechasolicitud
     *
     * @return \DateTime 
     */
    public function getFechahoranumeracion()
    {
        return $this->fechahoranumeracion;
    }

    /**
     * Set jornada
     *
     * @param \Frontend\SitBundle\Entity\Jornada $jornada
     * @return Ticket
     */
    public function setJornada(\Frontend\MercalBundle\Entity\Jornada $jornada = null)
    {
        $this->jornada = $jornada;
    
        return $this;
    }

    /**
     * Get jornada
     *
     * @return \Frontend\SitBundle\Entity\Jornada 
     */
    public function getJornada()
    {
        return $this->jornada;
    }

    /**
     * Set familiar
     *
     * @param \Frontend\SitBundle\Entity\Familiar $familiar
     * @return Ticket
     */
    public function setFamiliar(\Frontend\MercalBundle\Entity\Familiar $familiar = null)
    {
        $this->familiar = $familiar;
    
        return $this;
    }

    /**
     * Get familiar
     *
     * @return \Frontend\SitBundle\Entity\Familiar 
     */
    public function getFamiliar()
    {
        return $this->familiar;
    }
}