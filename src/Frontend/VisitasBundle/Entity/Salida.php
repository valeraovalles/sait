<?php

namespace Frontend\VisitasBundle\Entity;
 
class Salida
{

    protected $hora;
 
    protected $fecha;
 


    public function getHora()
    {
        return $this->hora;
    }

    public function setHora($hora)
    {
        $this->hora = $hora;
        return $this;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setHasta(\DateTime $fecha = null)
    {
        $this->fecha = $fecha;
        return $this;
    }


}