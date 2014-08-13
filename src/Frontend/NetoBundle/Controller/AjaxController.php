<?php

namespace Frontend\NetoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AjaxController extends Controller
{
    public function ajaxnetoAction($datos,$mostrar)
    {
        $em = $this->getDoctrine()->getManager();
        $datos=explode("-", $datos);

        if ($mostrar=='periodo' and $datos[0]!='s' and $datos[0]!='a'){
            $periodo=array('s'=>'Seleccione','1'=>'Primera quincena','2'=>'Segunda quincena');
            $form = $this->createFormBuilder()
                ->add('periodo', 'choice', array(
                    'choices'   => $periodo,
                ))->getForm();
        }

        else if ($mostrar=='periodo' and $datos[0]=='a'){
            $anios=array('s'=>'Seleccione', date('Y')-1 => date('Y')-1, date('Y') => date('Y'));
            $form = $this->createFormBuilder()
            ->add('aniosaguinaldos', 'choice', array(
                'choices'   => $anios,
            ))->getForm();
        }

        else if ($mostrar=='anio' and $datos[0]!='s'){
            $anios=array('s'=>'Seleccione', date('Y')-2 => date('Y')-2, date('Y')-1 => date('Y')-1, date('Y') => date('Y'));
            $form = $this->createFormBuilder()
            ->add('anios', 'choice', array(
                'choices'   => $anios,
            ))->getForm();
        }

        else if ($mostrar=='mes' and $datos[0]!='s'){
            $meses= array('s'=>'Seleccione','01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');

            $form = $this->createFormBuilder()
            ->add('meses', 'choice', array(
                'choices'   => $meses,
            ))->getForm();
        }


        if($datos[0]=='s'){
            $form = $this->createFormBuilder()
                ->add('vacio', 'choice', array(
                    'choices'   => array(),
                ))
            ->getForm();
        }
        

         return $this->render('NetoBundle:Ajax:ajaxneto.html.twig',array('form'=>$form->createView(),'mostrar'=>$mostrar,'datos'=>$datos));
    }
}
