<?php

namespace Frontend\SitBundle\Entity\extras;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Unidad
 *
 */
class Correoseguimiento
{
    
    /**
     * @Assert\NotBlank(message="El campo 'cuerpo' no debe estar en blanco.")
     */
    private $cuerpo;

    /**
     * @Assert\NotBlank(message="El campo 'para' no debe estar en blanco.")
     */
    private $para; 
    
    /**
     * @Assert\NotBlank(message="El campo 'asunto' no debe estar en blanco.")
     */
    private $asunto;

     /**
     * @Assert\File(maxSize="5000000", maxSizeMessage="El archivo que intenta subir es demasiado grande. El tamaño máximo permitido es 5mb.")
     */
    private $file;
    
    
    /**
     * Set cuerpo
     *
     * @param string $cuerpo
     * @return Unidad
     */
    public function setCuerpo($cuerpo)
    {
        $this->cuerpo = $cuerpo;
    
        return $this;
    }

    /**
     * Get cuerpo
     *
     * @return string 
     */
    public function getCuerpo()
    {
        return $this->cuerpo;
    }
    
    /**
     * Set para
     *
     * @param string $para
     * @return Unidad
     */
    public function setPara($para)
    {
        $this->para = $para;
    
        return $this;
    }

    /**
     * Get para
     *
     * @return string 
     */
    public function getPara()
    {
        return $this->para;
    }
    
    /**
     * Set asunto
     *
     * @param string $asunto
     * @return Unidad
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;
    
        return $this;
    }

    /**
     * Get asunto
     *
     * @return string 
     */
    public function getAsunto()
    {
        return $this->asunto;
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
    
}

