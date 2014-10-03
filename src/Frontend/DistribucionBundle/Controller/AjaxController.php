<?php

namespace Frontend\DistribucionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Frontend\DistribucionBundle\Entity\Operador;
use Frontend\DistribucionBundle\Form\OperadorType;
use Doctrine\ORM\EntityRepository;

class AjaxController extends Controller
{
    public function ajaxgraficoAction($datos,$mostrar)
    {
        $em = $this->getDoctrine()->getManager();

        if($mostrar=='aniomes'){

            $dato=explode("-", $datos);
            $lapso=$dato[0];
            $formulario=$dato[1];
            $valorcampo=$dato[2];

            $dql   = "SELECT o FROM DistribucionBundle:Operador o order by o.fecharegistro ASC";
            $query = $em->createQuery($dql);
            $operador=$query->getResult(); 
            $anios=array('s'=>'Seleccione...'); $meses=array('s'=>'Seleccione...');
            foreach ($operador as $op) {
                $mes=$op->getFecharegistro()->format('n');
                $meses[$mes]=$mes;

                $anio=$op->getFecharegistro()->format('Y');
                $anios[$anio]=$anio;
            }
                $meshasta=$meses;
                $aniohasta=$anios;

                $mesdesde=$meses;
                $aniodesde=$anios;
                
                ksort($mesdesde);
                ksort($meshasta);
                ksort($aniodesde);
                ksort($aniohasta);
                ksort($anios);

            if($lapso=='a'){
                if($formulario==1){
                    $form = $this->createFormBuilder()
                            ->add('aniodesde', 'choice', array(
                                'choices'   => $aniodesde,
                            ))
                    ->getForm();
                }
                else if($formulario==2){
                    $form = $this->createFormBuilder()
                            ->add('aniohasta', 'choice', array(
                                'choices'   => $aniohasta,
                            ))
                    ->getForm(); 
                }
            }

            else if($lapso=='m'){
                if($formulario==1){
                    $form = $this->createFormBuilder()
                            ->add('anios', 'choice', array(
                                'choices'   => $anios,
                            ))
                    ->getForm();
                }
                else if($formulario==2){
                    $form = $this->createFormBuilder()
                            ->add('mesdesde', 'choice', array(
                                'choices'   => $mesdesde,
                            ))
                    ->getForm();
                }
                else if($formulario==3){
                    $form = $this->createFormBuilder()
                            ->add('meshasta', 'choice', array(
                                'choices'   => $meshasta,
                            ))
                    ->getForm();
                }
            }
        }

        if($mostrar=='tipografico'){

            $dato=explode("-", $datos);
            $valorcampo=$dato[0];

            $tipografico=array('s'=>'Seleccione...','c'=>'Cantidad','a'=>'Abonados');
            $form = $this->createFormBuilder()
                    ->add('tipografico', 'choice', array(
                        'choices'   => $tipografico,
                    ))
            ->getForm();

        }

        if($mostrar=='pais'){
            $dato=explode("-", $datos);
            $valorcampo=$dato[0];

            $dql   = "SELECT o FROM DistribucionBundle:Operador o JOIN o.pais p";
            $query = $em->createQuery($dql);
            $operador=$query->getResult();

            $paises=array('s'=>'Seleccione...','t'=>'Todos');
            foreach ($operador as $value) {
                
                $paises[$value->getPais()->getId()]=$value->getPais()->getPais();
            }
            ksort($paises);
            $form = $this->createFormBuilder()
                    ->add('pais', 'choice', array(
                        'choices'   => $paises,
                    ))
            ->getForm();

        }

        if($mostrar=='tipooperador'){

            $dato=explode("-", $datos);
            $valorcampo=$dato[0];
            if($valorcampo!='t')
                $dql = "select distinct p.id, p.operador from DistribucionBundle:Operador o join o.tipooperador p where o.pais= :idpais order by p.operador ASC";
            else
                $dql = "select distinct p.id, p.operador from DistribucionBundle:Operador o join o.tipooperador p order by p.operador ASC";
            $consulta = $em->createQuery($dql);
            if($valorcampo!='t')
                $consulta->setParameter('idpais', $valorcampo);
            $tipooperador = $consulta->getResult();

            if(!empty($tipooperador)){
                $array['s']="seleccione";
                $array['t']="todos";
                foreach ($tipooperador as $tp) {
                    $array[$tp['id']]=$tp['operador'];
                }
            } else $array=array(''=>'vacio');

                // create a task and give it some dummy data for this example
                $form = $this->createFormBuilder()
                    ->add('tipooperador', 'choice', array(
                        'choices'   => $array,
           
                    ))
                ->getForm();

        }

        if($mostrar=='botones'){
            $dato=explode("-", $datos);
            $valorcampo=$dato[0];
            $array=array();
            // create a task and give it some dummy data for this example
            $form = $this->createFormBuilder()
                    ->add('formato', 'choice', array(
                        'choices'   => $array,
           
                    ))
                ->getForm();
        }

        if($valorcampo=='s'){
            $mostrar='s';
            $form = $this->createFormBuilder()
                ->add('vacio', 'choice', array(
                    'choices'   => array(),
                ))
            ->getForm();
        }
        return $this->render('DistribucionBundle:Ajax:ajax_grafico.html.twig',array('form'=>$form->createView(),'mostrar'=>$mostrar,'dato'=>$dato));
    }
    public function topAction($datos,$mostrar)
    {
        $em = $this->getDoctrine()->getManager();

        if($mostrar=='tipooperador'){
            $id=explode("-", $datos);
            $id=$id[0];
            $dql = "select distinct p.id, p.operador from DistribucionBundle:Operador o join o.tipooperador p where o.pais= :idpais order by p.operador ASC";
            $consulta = $em->createQuery($dql);
            $consulta->setParameter('idpais', $id);
            $tipooperador = $consulta->getResult();

            if(!empty($tipooperador)){
                $array['s']="seleccione";
                foreach ($tipooperador as $tp) {
                    $array[$tp['id']]=$tp['operador'];
                }
            } else $array=array(''=>'vacio');

            // create a task and give it some dummy data for this example
            $form = $this->createFormBuilder()
                    ->add('tipooperador', 'choice', array(
                        'choices'   => $array,
           
                    ))
                ->getForm();

            return $this->render('DistribucionBundle:Ajax:ajax_top.html.twig',array('form'=>$form->createView(),'mostrar'=>'tipooperador'));
        }

        if($mostrar=='top'){
            $datos=explode("-", $datos);
            $idpais=$datos[0];
            $idtipooperador=$datos[1];

            $dql   = "
            SELECT r FROM DistribucionBundle:Representante r JOIN r.operador o JOIN o.tipooperador t JOIN o.pais p
            where o.pais= :idpais and o.tipooperador= :idtipooperador order by o.numeroabonados DESC
            ";
            $query = $em->createQuery($dql)->SetMaxResults(5);
            $query->setParameter('idpais', $idpais);
            $query->setParameter('idtipooperador', $idtipooperador);
            $operadores=$query->getResult();

            return $this->render('DistribucionBundle:Ajax:ajax_top.html.twig',array('datos'=>$operadores, 'mostrar'=>'top'));
        }

        
    }
    public function formularioAction($datos,$mostrar)
    {

        $em = $this->getDoctrine()->getManager();

        if($mostrar=='pais'){
            
            $idzona=$datos;

            //SI SELECCIONO TODOS QUITO DEL WHERE EL TIPO DE OPERADOR
            if($idzona!='t'){
                $dql = "select p.id ,p.pais from DistribucionBundle:Operador o join o.pais p join o.zona z where z.id in (:idzona) order by p.pais ASC";
                $consulta = $em->createQuery($dql);
                $consulta->setParameter('idzona', $idzona);
            }else{
                $dql = "select p.id,p.pais from DistribucionBundle:Pais p order by p.pais ASC";
                $consulta = $em->createQuery($dql);
            }
            $pais = $consulta->getResult();

            
            
            if(!empty($pais)){
                $array['t']="Todos";
                foreach ($pais as $p) {
                    $array[$p['id']]=$p['pais'];
                }
            } else $array=array(''=>'vacio');
            
            // create a task and give it some dummy data for this example
            $form = $this->createFormBuilder()
                    ->add('pais', 'choice', array(
                        'choices'   => $array,
                        'expanded'=>false, 
                        'multiple'=>true,
                        'empty_value' => 'Seleccione...',


                    ))
                ->getForm();

        }
        
        
        else if($mostrar=='operador'){

            $datos=explode("-", $datos);
            $idpais=explode(",",$datos[0]);
            $idtipooperador=explode(",",$datos[1]);


            //SI SELECCIONO TODOS QUITO DEL WHERE EL TIPO DE OPERADOR
            $dql = "select o.id, o.nombre from DistribucionBundle:Operador o where o.pais in (:idpais) and o.tipooperador in (:idtipooperador) order by o.nombre ASC";
            
            $consulta = $em->createQuery($dql);
            $consulta->setParameter('idpais', $idpais);
            $consulta->setParameter('idtipooperador', $idtipooperador);
            $operador = $consulta->getResult();

            $array['t']="Todos";
            if(!empty($operador)){
                foreach ($operador as $o) {
                    $array[$o['id']]=$o['nombre'];
                }
            } else $array=array(''=>'vacio');


            // create a task and give it some dummy data for this example
            $form = $this->createFormBuilder()
                    ->add('operador', 'choice', array(
                        'choices'   => $array,
                        'expanded'=>false, 
                        'multiple'=>false,
                        'empty_value' => 'Seleccione...',


                    ))
                ->getForm();

        }
        
       

        else if($mostrar=='tipooperador'){

            $id=explode(",", $datos);

            $dql = "select distinct p.id, p.operador from DistribucionBundle:Operador o join o.tipooperador p where o.pais in (:idpais) order by p.operador ASC";
            $consulta = $em->createQuery($dql);
            $consulta->setParameter('idpais', $id);
            $tipooperador = $consulta->getResult();

            if(!empty($tipooperador)){
                foreach ($tipooperador as $tp) {
                    $array[$tp['id']]=$tp['operador'];
                }
            } else $array=array(''=>'vacio');

            // create a task and give it some dummy data for this example
            $form = $this->createFormBuilder()
                    ->add('tipooperador', 'choice', array(
                        'choices'   => $array,
                        'expanded'=>false, 
                        'multiple'=>true,
           
                    ))
                ->getForm();
        }


        else if($mostrar=='fechadesde'){

            $form = $this->createFormBuilder()
            ->add('fechadesde', 'date', array(
                    'widget' => 'single_text',
                    'format' => 'dd-MM-y',
            ))->getForm();
        }

        else if($mostrar=='fechahasta'){

            $form = $this->createFormBuilder()
            ->add('fechahasta', 'date', array(
                    'widget' => 'single_text',
                    'format' => 'dd-MM-y',
            ))->getForm();
        }

        else if($mostrar=='formato'){

            $array=array('s'=>'seleccionar','xls'=>'Excel','pdf'=>'Pdf');
            // create a task and give it some dummy data for this example
            $form = $this->createFormBuilder()
                    ->add('formato', 'choice', array(
                        'choices'   => $array,
           
                    ))
                ->getForm();
        }

        else if($mostrar=='botones'){

            $array=array('s'=>'seleccionar','xls'=>'Excel','pdf'=>'Pdf');
            // create a task and give it some dummy data for this example
            $form = $this->createFormBuilder()
                    ->add('formato', 'choice', array(
                        'choices'   => $array,
           
                    ))
                ->getForm();
        }

        return $this->render('DistribucionBundle:Ajax:ajax.html.twig',array('form'=>$form->createView(),'mostrar'=>$mostrar));
    }
}
