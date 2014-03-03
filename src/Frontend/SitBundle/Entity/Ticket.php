<?php

namespace Frontend\SitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Ticket
 *
 * @ORM\Table(name="sit.ticket")
 * @ORM\Entity(repositoryClass="Frontend\SitBundle\Entity\TicketRepository")
 */
class Ticket
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sit.ticket_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;


    /**
     * @var \Perfil
     *
     * @ORM\ManyToOne(targetEntity="Administracion\UsuarioBundle\Entity\Perfil")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $solicitante;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechasolicitud", type="date", nullable=false)
     */
    private $fechasolicitud;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horasolicitud", type="time", nullable=false)
     */
    private $horasolicitud;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechasolucion", type="date", nullable=true)
     */
    private $fechasolucion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horasolucion", type="time", nullable=true)
     */
    private $horasolucion;

    /**
     * @var string
     *
     * @ORM\Column(name="solicitud", type="string", length=1000, nullable=false)
     * @Assert\NotBlank(message="Debe escribir la solicitud.")
     * @Assert\Length(
     *      min = "10",
     *      max = "1000",
     *      minMessage = "La solicitud no puede se menor a {{ limit }} caracteres de largo.",
     *      maxMessage = "La solicitud no puede se mayor a {{ limit }} caracteres de largo."
     * )
     * )
     */
    private $solicitud;

    /**
     * @var string
     *
     * @ORM\Column(name="solucion", type="string", length=500, nullable=true)
     */
    private $solucion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="reasignado", type="boolean", nullable=false)
     */
    private $reasignado=false;

    /**
     * @var integer
     *
     * @ORM\Column(name="estatus", type="integer", nullable=false)
     */
    private $estatus=1;

    /**
     * @var string
     *
     * @ORM\Column(name="archivo", type="string", length=500, nullable=true)
     */
    private $archivo;

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
     * @var \Subcategoria
     *
     * @ORM\ManyToOne(targetEntity="Subcategoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subcategoria_id", referencedColumnName="id")
     * })
     */
    private $subcategoria;

    /**
     * @var \Unidad
     *
     * @ORM\ManyToOne(targetEntity="Unidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unidad_id", referencedColumnName="id")
     * })
     * @Assert\NotBlank(message="Debe seleccionar una unidad.")
     */
    private $unidad;

     /**
     * @Assert\File(maxSize="5000000", maxSizeMessage="El archivo que intenta subir debe ser menos 5Mb")
     *  
     */
    private $file;


    /**
     * @ORM\ManyToMany(targetEntity="Administracion\UsuarioBundle\Entity\Perfil")
     * @ORM\JoinTable(name="sit.usuarioticket",
     *      joinColumns={@ORM\JoinColumn(name="ticket_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
     *      )
     **/

    private $user;



     /**
     * Add user
     *
     * @param \Administracion\UsuarioBundle\Entity\User $user
     * @return Usuario
     */
    public function addUser(\Administracion\UsuarioBundle\Entity\Perfil $user)
    {
        $this->user[] = $user;
        return $this;
    }

    /**
     * Remove user
     *
     * @param \Administracion\UsuarioBundle\Entity\User $user
     */
    public function removeUser(\Administracion\UsuarioBundle\Entity\Perfil $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set solicitante
     *
     * @param \Administracion\UsuarioBundle\Entity\Perfil $solicitante
     * @return Operador
     */
    public function setSolicitante(\Administracion\UsuarioBundle\Entity\Perfil $solicitante = null)
    {
        $this->solicitante = $solicitante;
    
        return $this;
    }

    /**
     * Get solicitante
     *
     * @return \Administracion\UsuarioBundle\Entity\Perfil 
     */
    public function getSolicitante()
    {
        return $this->solicitante;
    }

    /**
     * Set fechasolicitud
     *
     * @param \DateTime $fechasolicitud
     * @return Ticket
     */
    public function setFechasolicitud($fechasolicitud)
    {
        $this->fechasolicitud = $fechasolicitud;
    
        return $this;
    }

    /**
     * Get fechasolicitud
     *
     * @return \DateTime 
     */
    public function getFechasolicitud()
    {
        return $this->fechasolicitud;
    }

    /**
     * Set horasolicitud
     *
     * @param \DateTime $horasolicitud
     * @return Ticket
     */
    public function setHorasolicitud($horasolicitud)
    {
        $this->horasolicitud = $horasolicitud;
    
        return $this;
    }

    /**
     * Get horasolicitud
     *
     * @return \DateTime 
     */
    public function getHorasolicitud()
    {
        return $this->horasolicitud;
    }

    /**
     * Set fechasolucion
     *
     * @param \DateTime $fechasolucion
     * @return Ticket
     */
    public function setFechasolucion($fechasolucion)
    {
        $this->fechasolucion = $fechasolucion;
    
        return $this;
    }

    /**
     * Get fechasolucion
     *
     * @return \DateTime 
     */
    public function getFechasolucion()
    {
        return $this->fechasolucion;
    }

    /**
     * Set horasolucion
     *
     * @param \DateTime $horasolucion
     * @return Ticket
     */
    public function setHorasolucion($horasolucion)
    {
        $this->horasolucion = $horasolucion;
    
        return $this;
    }

    /**
     * Get horasolucion
     *
     * @return \DateTime 
     */
    public function getHorasolucion()
    {
        return $this->horasolucion;
    }

    /**
     * Set solicitud
     *
     * @param string $solicitud
     * @return Ticket
     */
    public function setSolicitud($solicitud)
    {
        $this->solicitud = $solicitud;
    
        return $this;
    }

    /**
     * Get solicitud
     *
     * @return string 
     */
    public function getSolicitud()
    {
        return $this->solicitud;
    }

    /**
     * Set solucion
     *
     * @param string $solucion
     * @return Ticket
     */
    public function setSolucion($solucion)
    {
        $this->solucion = $solucion;
    
        return $this;
    }

    /**
     * Get solucion
     *
     * @return string 
     */
    public function getSolucion()
    {
        return $this->solucion;
    }

    /**
     * Set reasignado
     *
     * @param boolean $reasignado
     * @return Ticket
     */
    public function setReasignado($reasignado)
    {
        $this->reasignado = $reasignado;
    
        return $this;
    }

    /**
     * Get reasignado
     *
     * @return boolean 
     */
    public function getReasignado()
    {
        return $this->reasignado;
    }

    /**
     * Set estatus
     *
     * @param string $estatus
     * @return Ticket
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    
        return $this;
    }

    /**
     * Get estatus
     *
     * @return string 
     */
    public function getEstatus()
    {
        return $this->estatus;
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
     * Set categoria
     *
     * @param \Frontend\SitBundle\Entity\Categoria $categoria
     * @return Ticket
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

    /**
     * Set subcategoria
     *
     * @param \Frontend\SitBundle\Entity\Subcategoria $subcategoria
     * @return Ticket
     */
    public function setSubcategoria(\Frontend\SitBundle\Entity\Subcategoria $subcategoria = null)
    {
        $this->subcategoria = $subcategoria;
    
        return $this;
    }

    /**
     * Get subcategoria
     *
     * @return \Frontend\SitBundle\Entity\Subcategoria 
     */
    public function getSubcategoria()
    {
        return $this->subcategoria;
    }

    /**
     * Set unidad
     *
     * @param \Frontend\SitBundle\Entity\Unidad $unidad
     * @return Ticket
     */
    public function setUnidad(\Frontend\SitBundle\Entity\Unidad $unidad = null)
    {
        $this->unidad = $unidad;
    
        return $this;
    }

    /**
     * Get unidad
     *
     * @return \Frontend\SitBundle\Entity\Unidad 
     */
    public function getUnidad()
    {
        return $this->unidad;
    }
}

