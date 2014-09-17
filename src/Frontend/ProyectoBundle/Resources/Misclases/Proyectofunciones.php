<?php

namespace Frontend\ProyectoBundle\Resources\Misclases;

class Proyectofunciones
{
    //verificar tiempo actividad en proceso
    public function vertieactpro($em,$actividad){
        $e = $actividad;
        $comienzo=new \DateTime($e->getComienzo()->format("d-m-Y G:i:s"));
        $fa=new \DateTime(\date("d-m-Y G:i:s"));

        //sumo el tiempo de la actividad 
        if($e->getTipotiempo()==1)$tt='day';
        else if($e->getTipotiempo()==2)$tt='hour';
        else if($e->getTipotiempo()==3)$tt='minute';
        $duracionestimada = strtotime ( '+'.$e->getTiempoestimado().' '.$tt , strtotime ( $comienzo->format("d-m-Y G:i:s") ) ) ;
        $duracionestimada = date ( 'Y-m-d G:i:s' , $duracionestimada );
        $duracionestimada=new \DateTime($duracionestimada);
        
        
        
        if(strtotime($duracionestimada->format("d-m-Y G:i:s"))< strtotime($fa->format("d-m-Y G:i:s"))) return 'true'; else return 'false';
        
        
        
    }
}