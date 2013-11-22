<?php

namespace Frontend\MercalBundle\Controller;

use Frontend\MercalBundle\Entity\Numeracion;
use Frontend\MercalBundle\Entity\Usernumero;
use Administracion\UsuarioBundle\Entity\Perfil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AjaxController extends Controller
{
    public function cerrarjornadaAction($idjornada)
    {

        $em = $this->getDoctrine()->getManager();
        //consulto jornada
        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);
        $json[0]=array(
            'usernumeroid'=>0,
            'numero'=>0,
            'nombre'=>"JORNADA CULMINADA",
            'cedula'=>null,
            'tipo'=>null,
            'valor'=>0,
            'compro'=>'fin'
        );        
        $jsonencoded = json_encode($json);
        $fh = fopen("uploads/jornada/".$jornada->getNombrejornada().$jornada->getFechajornada()->format("dmY").".json", 'w+');
        fwrite($fh, $jsonencoded);
        fclose($fh);

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
                <div id="numeracion"> 
                    <div class="numero">'.$datos[0]['numero'].'</div>
                    <div class="nombre">'.$datos[0]['nombre'].'<br><br>'.$datos[0]['cedula'].'</div>
                </div>
            ';
        } else{

            echo'
                <div id="numeracion"> 
                    <div class="numero">0</div>
                    <div class="nombre">SIN COMENZAR</div>
                </div>';
        }
           
        die;

    }

    public function ajaxmercalsiguientecomprobarAction($valor,$idjornada)
    {

        //el valor lo utilixo para consultar los registros uno por uno estilo paginación
        $valor=$valor+1;
        
        $em = $this->getDoctrine()->getManager();

        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        //consulto datos del trabajador siguiente en la numeracion
        $dql = "select un from MercalBundle:Usernumero un where un.jornada= :jornada order by un.numero ASC ";
        $query = $em->createQuery($dql);
        $query->setParameter('jornada', $idjornada);
        $query->setMaxResults(1);
        $query->setFirstResult($valor);
        $usernumero = $query->getResult();


        if(!empty($usernumero)){
           $usernumero=$usernumero[0];  

            if($usernumero->getFamiliar()==null){
                $nomape=$usernumero->getTrabajador()->getPrimerNombre().' '.$usernumero->getTrabajador()->getPrimerApellido();
                $cedula=$usernumero->getTrabajador()->getCedula();
                $tipo="t";
            }
            else{
                $nomape="Familiar: ".$usernumero->getFamiliar()->getNombres().' '.$usernumero->getFamiliar()->getApellidos();
                $cedula=$usernumero->getFamiliar()->getCedula();
                $tipo="f";
            }


            echo '
                <div class="numero">'.$usernumero->getNumero().'</div>
                <div class="nombre">'.$nomape.'<br><br>C.I '.$cedula.'</div>
                <input id="valor" type="hidden" value="'.$valor.'">
                <input type="hidden" id="usernumeroid" value="'.$usernumero->getId().'">
            ';


            $json[0]=array(
                'usernumeroid'=>$usernumero->getId(),
                'numero'=>$usernumero->getNumero(),
                'nombre'=>strtoupper($nomape),
                'cedula'=>'C.I. '.$cedula,
                'tipo'=>$tipo,
                'valor'=>$valor,
                'compro'=>null
            );
            $jsonencoded = json_encode($json);
            $fh = fopen("uploads/jornada/".$jornada->getNombrejornada().$jornada->getFechajornada()->format("dmY").".json", 'w+');
            fwrite($fh, $jsonencoded);
            fclose($fh);

            $this->get('session')->getFlashBag()->add('notice', 'Se ha resstablecido la cola');

        }else $this->get('session')->getFlashBag()->add('notice', 'No se han encontrado nuevos usuarios en cola');

        return $this->redirect($this->generateUrl('mercal_homepage',array('idjornada'=>$jornada->getId())));
    }

    public function ajaxmercalsiguienteAction($valor,$idjornada,$usernumeroid,$compro)
    {
        //el valor lo utilixo para consultar los registros uno por uno estilo paginación
        $valor=$valor+1;
        
        $em = $this->getDoctrine()->getManager();

        //consulto jornada
        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);
        $usernumero =  $em->getRepository('MercalBundle:Usernumero')->find($usernumeroid);


        //guarda datos del trabajador enviado en la tabla numeracion para saber si compro o no
        $entity  = new Numeracion();
        $entity->setUsernumero($usernumero);
        $fechahora = date_create_from_format('Y-m-d G:i:s', \date("Y-m-d G:i:s"));
        $entity->setFechahora($fechahora);
        $entity->setValor($valor);
        $entity->setCompro($compro);
        $em->persist($entity);
        $em->flush();

        //actualizo el campo compro del usuario
        $str_datos = file_get_contents("uploads/jornada/".$jornada->getNombrejornada().$jornada->getFechajornada()->format("dmY").".json");
        $datos = json_decode($str_datos,true);
        $datos[0]["compro"] = $compro;
        $fh = fopen("uploads/jornada/".$jornada->getNombrejornada().$jornada->getFechajornada()->format("dmY").".json", 'w') or die("Error al abrir fichero de salida");
        fwrite($fh, json_encode($datos));
        fclose($fh);


        //consulto datos del trabajador siguiente en la numeracion
        $dql = "select un from MercalBundle:Usernumero un where un.jornada= :jornada order by un.numero ASC ";
        $query = $em->createQuery($dql);
        $query->setParameter('jornada', $idjornada);
        $query->setMaxResults(1);
        $query->setFirstResult($valor);
        $usernumero = $query->getResult();


        if(!empty($usernumero)){
           $usernumero=$usernumero[0];  

            if($usernumero->getFamiliar()==null){
                $nomape=$usernumero->getTrabajador()->getPrimerNombre().' '.$usernumero->getTrabajador()->getPrimerApellido();
                $cedula=$usernumero->getTrabajador()->getCedula();
                $tipo="t";
            }
            else{
                $nomape="Familiar: ".$usernumero->getFamiliar()->getNombres().' '.$usernumero->getFamiliar()->getApellidos();
                $cedula=$usernumero->getFamiliar()->getCedula();
                $tipo="f";
            }


   		    echo '
                <div class="numero">'.$usernumero->getNumero().'</div>
                <div class="nombre">'.$nomape.'<br><br>'.$cedula.'</div>
                <input id="valor" type="hidden" value="'.$valor.'">
                <input type="hidden" id="usernumeroid" value="'.$usernumero->getId().'">
            ';


            $json[0]=array(
                'usernumeroid'=>$usernumero->getId(),
                'numero'=>$usernumero->getNumero(),
                'nombre'=>strtoupper($nomape),
                'cedula'=>'C.I. '.$cedula,
                'tipo'=>$tipo,
                'valor'=>$valor,
                'compro'=>null
            );
            $jsonencoded = json_encode($json);
            $fh = fopen("uploads/jornada/".$jornada->getNombrejornada().$jornada->getFechajornada()->format("dmY").".json", 'w+');
            fwrite($fh, $jsonencoded);
            fclose($fh);
        }
        /*else{      
            $valor=$valor-1; 
           echo '
            <div class="numero">0</div>
            <div class="nombre">JORNADA CULMINADA</div>
            <input id="valor" type="hidden" value="'.$valor.'">
            ';

            $json[0]=array(
                'numero'=>"0",
                'nombre'=>"JORNADA CULMINADA"
            );

            $jsonencoded = json_encode($json);
            $fh = fopen("uploads/jornada/".$jornada->getNombrejornada().".json", 'w+');
            fwrite($fh, $jsonencoded);
            fclose($fh);

        }*/
        return $this->redirect($this->generateUrl('mercal_homepage',array('idjornada'=>$jornada->getId())));
    }

}
