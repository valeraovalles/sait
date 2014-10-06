<?php

namespace Frontend\ProyectoBundle\Resources\Misclases;

class Servicio
{
    
    function __construct($em) {
        $this->em = $em;
    }

    //verificar tiempo actividad en proceso
    public function holamundo(){

            return $this->em->getRepository("ProyectoBundle:Proyecto")->findAll();
        
    }
}