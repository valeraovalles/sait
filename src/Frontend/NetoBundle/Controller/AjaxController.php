<?php

namespace Frontend\NetoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AjaxController extends Controller
{
    public function indexAction()
    {
    	$tipnom=array(''=>'Seleccione', 'n'=>'Nómina', 'a'=>'Aguinaldos');
    	$anios=array(''=>'Seleccione', date('Y')-1 => date('Y')-1, date('Y') => date('Y'));
    	$meses= array(''=>'Seleccione','1'=>'Enero','2'=>'Febrero','3'=>'Marzo','4'=>'Abril','5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');
    	
        $form = $this->createFormBuilder()
                ->add('tipnom', 'choice', array(
                    'choices'   => $tipnom,
                ))
                ->add('periodo', 'choice', array(
                    'choices'   => $periodo,
                ))
                 ->add('meses', 'choice', array(
                    'choices'   => $meses,
                ))

                ->add('anios', 'choice', array(
                    'choices'   => $anios,
                ))


        ->getForm();

        return $this->render('NetoBundle:Default:index.html.twig',array('form'=>$form->createView()));
    }
    public function ajaxnetoAction($datos,$mostrar)
    {
        $em = $this->getDoctrine()->getManager();
        $datos=explode("-", $datos);

        if ($mostrar=='periodo' and $datos[0]!='s' and $datos[0]!='a'){
            $periodo=array('s'=>'Seleccione','1'=>'Primera quincena','2'=>'Segunda quincena','m'=>'Mensual');
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
            $anios=array('s'=>'Seleccione', date('Y')-1 => date('Y')-1, date('Y') => date('Y'));
            $form = $this->createFormBuilder()
            ->add('anios', 'choice', array(
                'choices'   => $anios,
            ))->getForm();
        }

        else if ($mostrar=='mes' and $datos[0]!='s'){
            $meses= array('s'=>'Seleccione','1'=>'Enero','2'=>'Febrero','3'=>'Marzo','4'=>'Abril','5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');

            $form = $this->createFormBuilder()
            ->add('meses', 'choice', array(
                'choices'   => $meses,
            ))->getForm();
        }

        else if ($mostrar=='boton' and $datos[0]!='s'){
            echo '<input type="submit" value="Generar recibo" class="btn btn-primary">';
            die;
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
