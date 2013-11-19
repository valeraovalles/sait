<?php

namespace Frontend\MercalBundle\Controller;

use Frontend\MercalBundle\Entity\Numeracion;
use Frontend\MercalBundle\Entity\Usernumero;
use Administracion\UsuarioBundle\Entity\Perfil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AjaxController extends Controller
{
    public function ajaxmercalanteriorAction($valor)
    {
    	if($valor==1)
    		echo $valor."<input id='valor'type='hidden' value='".$valor."'>";
    	else{
    		$valor=$valor-1;
    		echo $valor."<input id='valor'type='hidden' value='".$valor."'>";
    	}

    	$em = $this->getDoctrine()->getManager();
        $entity  = new Numeracion();
        $entity->setNumero($valor);
        $fechahora = date_create_from_format('Y-m-d G:i:s', \date("Y-m-d G:i:s"));
        $entity->setFechahora($fechahora);
 		$em->persist($entity);
        $em->flush();
    	die;
    	
    }


    public function ajaxmercalsiguienteAction($valor,$idjornada)
    {
    	$valor=$valor+1;

        //consulto si el numero lo posee alguien
        $em = $this->getDoctrine()->getManager();
        $dql = "select un from MercalBundle:Usernumero un where un.jornada= :jornada and un.numero= :numero and un.familiar is null";
        $query = $em->createQuery($dql);
        $query->setParameter('jornada', $idjornada);
        $query->setParameter('numero', $valor);
        $usernumero = $query->getResult();

print_r($usernumero->getNumero());
die;
        if(!empty($usernumero))        
   		   echo $valor."<br>".$usernumero->getTrabajador()->getPrimerNombre()."<input id='valor' type='hidden' value='".$valor."'>";

die;
    	$em = $this->getDoctrine()->getManager();
        $entity  = new Numeracion();
        $entity->setNumero($valor);
        $fechahora = date_create_from_format('Y-m-d G:i:s', \date("Y-m-d G:i:s"));
        $entity->setFechahora($fechahora);
 		$em->persist($entity);
        $em->flush();
        die;
    }

}
