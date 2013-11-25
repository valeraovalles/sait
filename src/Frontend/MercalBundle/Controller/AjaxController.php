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


    public function ajaxmercalsiguienteautomaticoAction($idjornada)
    {

        $em = $this->getDoctrine()->getManager();

        //consulto jornada
        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);
        
        if (file_exists("uploads/jornada/".$jornada->getNombrejornada().".json")) {
            $str_datos = file_get_contents("uploads/jornada/".$jornada->getNombrejornada().".json");
            $datos = json_decode($str_datos,true);

            echo'
                <div id="numeracion"> 
                    <div class="numero">'.$datos[0]['numero'].'</div>
                    <div class="nombre">'.$datos[0]['nombre'].'</div>
                </div>
            ';
        } else{

            echo'
                <div id="numeracion"> 
                    <div class="numero">0</div>
                    <div class="nombre">JORNADA INACTIVA</div>
                </div>
            ';  
        }
        die;

    }
    public function ajaxmercalsiguienteAction($valor,$idjornada)
    {

        $valor=$valor+1;
        
        $em = $this->getDoctrine()->getManager();

        //consulto jornada
        $jornada =  $em->getRepository('MercalBundle:Jornada')->find($idjornada);

        //consulto numero de trabajador
        $dql = "select un from MercalBundle:Usernumero un where un.jornada= :jornada order by un.numero ASC ";
        $query = $em->createQuery($dql);
        $query->setParameter('jornada', $idjornada);
        $query->setMaxResults(1);
        $query->setFirstResult($valor);
        $numeracion = $query->getResult();


        if(!empty($numeracion)){
           $numeracion=$numeracion[0];  

            if($numeracion->getFamiliar()==null){
                $nomape=$numeracion->getTrabajador()->getPrimerNombre().' '.$numeracion->getTrabajador()->getPrimerApellido();
            }
            else{
                $nomape="Familiar: ".$numeracion->getFamiliar()->getNombres().' '.$numeracion->getFamiliar()->getApellidos();
            }


   		    echo '
                <div class="numero">'.$numeracion->getNumero().'</div>
                <div class="nombre">'.$nomape.'</div>
                <input id="valor" type="hidden" value="'.$valor.'">
            ';

            //guarda numeracion
            $entity  = new Numeracion();
            $entity->setUsernumero($numeracion);
            $fechahora = date_create_from_format('Y-m-d G:i:s', \date("Y-m-d G:i:s"));
            $entity->setFechahora($fechahora);
            $entity->setValor($valor);
            $em->persist($entity);
            $em->flush();

            $json[0]=array(
                'numero'=>$numeracion->getNumero(),
                'nombre'=>strtoupper($nomape)
            );
            $jsonencoded = json_encode($json);
            $fh = fopen("uploads/jornada/".$jornada->getNombrejornada().".json", 'w+');
            fwrite($fh, $jsonencoded);
            fclose($fh);
        }
        else{      
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

        }
        die;
    }

}
