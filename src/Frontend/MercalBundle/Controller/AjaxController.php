<?php

namespace Frontend\MercalBundle\Controller;

use Frontend\MercalBundle\Entity\Numeracion;
use Frontend\MercalBundle\Entity\Usernumero;
use Administracion\UsuarioBundle\Entity\Perfil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Frontend\MercalBundle\Controller\DefaultController;

class AjaxController extends Controller
{

    //revisado
    public function ajaxmercalsiguienteAction($idjornada,$usernumeroid,$compro)
    {
        $em = $this->getDoctrine()->getManager();

        //consulto jornada
        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);
        $usernumero =  $em->getRepository('MercalBundle:Usernumero')->find($usernumeroid);

        $fechahora = date_create_from_format('Y-m-d G:i:s', \date("Y-m-d G:i:s"));
        $query = $em->createQuery('update MercalBundle:Usernumero un set un.fechahoranumeracion= :fechahoranumeracion, un.compro= :compro WHERE un.id = :id and un.jornada= :idjornada');
        $query->setParameter('fechahoranumeracion', $fechahora);
        $query->setParameter('compro', $compro);
        $query->setParameter('id', $usernumeroid);
        $query->setParameter('idjornada', $idjornada);
        $query->execute();

        return $this->redirect($this->generateUrl('mercal_homepage',array('idjornada'=>$jornada->getId())));
    }

    //revisado
    public function ajaxmercalsiguientecomprobarAction($idjornada)
    {


        $em = $this->getDoctrine()->getManager();

        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        $this->get('session')->getFlashBag()->add('notice', 'Verificación realizada');

        return $this->redirect($this->generateUrl('mercal_homepage',array('idjornada'=>$jornada->getId())));
    }


    public function cerrarjornadaAction($idjornada)
    {

        $em = $this->getDoctrine()->getManager();
        //consulto jornada
        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);
        $query = $em->createQuery('update MercalBundle:Jornada j set j.culminada=true WHERE j.id = :idjornada');
        $query->setParameter('idjornada', $idjornada);
        $query->execute();

        $this->get('session')->getFlashBag()->add('notice', 'Jornada culminada.');
        return $this->redirect($this->generateUrl('mercal_homepage',array('idjornada'=>$jornada->getId())));
    }


    public function ajaxmercalsiguienteautomaticoAction($idjornada)
    {

        $em = $this->getDoctrine()->getManager();

        //consulto jornada
        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        if (file_exists("uploads/jornada/".$jornada->getNombrejornada().$jornada->getFechajornada()->format("dmY").".json")) {
            $str_datos = file_get_contents("uploads/jornada/".$jornada->getNombrejornada().$jornada->getFechajornada()->format("dmY").".json");
            $datos = json_decode($str_datos,true);

            echo'
                    <div class="numero">'.$datos[0]['numero'].'</div>
                    <div class="nombre">'.$datos[0]['nombre'].'</div>
                    <div class="cedula">'.$datos[0]['cedula'].'</div>
            ';
        }
           
        die;

    }


    

}
