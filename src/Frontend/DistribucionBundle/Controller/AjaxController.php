<?php

namespace Frontend\DistribucionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Frontend\DistribucionBundle\Entity\Operador;
use Frontend\DistribucionBundle\Form\OperadorType;
use Doctrine\ORM\EntityRepository;

class AjaxController extends Controller
{
    public function formularioAction($datos,$mostrar)
    {
        $em = $this->getDoctrine()->getManager();


        if($mostrar=='operador'){

            $datos=explode("-", $datos);
            $idpais=$datos[0];
            $idtipooperador=$datos[1];

            //SI SELECCIONO TODOS QUITO DEL WHERE EL TIPO DE OPERADOR
            if($idtipooperador=='t')
                $dql = "select o.id, o.nombre from DistribucionBundle:Operador o where o.pais= :idpais order by o.nombre ASC";
            else
                $dql = "select o.id, o.nombre from DistribucionBundle:Operador o where o.pais= :idpais and o.tipooperador= :idtipooperador order by o.nombre ASC";
            
            $consulta = $em->createQuery($dql);
            $consulta->setParameter('idpais', $idpais);

            if($idtipooperador!='t')
            $consulta->setParameter('idtipooperador', $idtipooperador);
            $operador = $consulta->getResult();


            if(!empty($operador)){
                $array['s']="seleccione";
                $array['t']="todos";
                foreach ($operador as $o) {
                    $array[$o['id']]=$o['nombre'];
                }
            } else $array=array(''=>'vacio');


            // create a task and give it some dummy data for this example
            $form = $this->createFormBuilder()
                    ->add('operador', 'choice', array(
                        'choices'   => $array,
           
                    ))
                ->getForm();

        }

        else if($mostrar=='tipooperador'){

            $id=explode("-", $datos);
            $id=$id[0];

            $dql = "select distinct p.id, p.operador from DistribucionBundle:Operador o join o.tipooperador p where o.pais= :idpais order by p.operador ASC";
            $consulta = $em->createQuery($dql);
            $consulta->setParameter('idpais', $id);
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

        return $this->render('DistribucionBundle:Ajax:ajax.html.twig',array('form'=>$form->createView(),'mostrar'=>$mostrar,'mostrar'=>$mostrar));
    }
}
