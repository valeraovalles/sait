<?php

namespace Frontend\VisitasBundle\Entity;
 
class Reporte
{

    protected $desde;
 
    protected $hasta;
 
    protected $formato;



    public function getDesde()
    {
        return $this->desde;
    }

    public function setDesde($desde)
    {
        $this->desde = $desde;
        return $this;
    }

    public function getHasta()
    {
        return $this->hasta;
    }

    public function setHasta(\DateTime $hasta = null)
    {
        $this->hasta = $hasta;
        return $this;
    }


    public function getFormato()
    {
        return $this->formato;
    }

    public function setFormato(\DateTime $formato = null)
    {
        $this->formato = $formato;
        return $this;
    }




}