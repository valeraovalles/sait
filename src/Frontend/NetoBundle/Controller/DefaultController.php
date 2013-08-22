<?php

namespace Frontend\NetoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$tipnom=array('s'=>'Seleccione', 'n'=>'Nómina', 'a'=>'Aguinaldos');
    	
    	$meses= array('s'=>'Seleccione','1'=>'Enero','2'=>'Febrero','3'=>'Marzo','4'=>'Abril','5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto','9'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');
        $form = $this->createFormBuilder()
                ->add('tipnom', 'choice', array(
                    'choices'   => $tipnom,
                ))
                 ->add('meses', 'choice', array(
                    'choices'   => $meses,
                ))




        ->getForm();

        return $this->render('NetoBundle:Default:index.html.twig',array('form'=>$form->createView()));
    }
}
