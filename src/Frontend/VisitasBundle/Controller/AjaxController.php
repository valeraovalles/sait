<?php

namespace Frontend\VisitasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Frontend\VisitasBundle\Entity\Reporte;
use Frontend\VisitasBundle\Entity\Visita;
use Doctrine\ORM\EntityRepository;



class AjaxController extends Controller
{




    public function formularioAction($datos,$mostrar)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = new Reporte();
        $form = $this->createFormBuilder($entity);

       

        if($mostrar=='hasta'){

            $form = $this->createFormBuilder()
                ->add('Hasta','date', array(
                  'widget' => 'single_text',
                  'format' => 'yyyy-MM-dd',))
            ->getForm();
        }

        else if($mostrar=='formato'){
            $form = $this->createFormBuilder()
                ->add('Formato','choice', array(
                        'expanded'=>false, 
                        'multiple'=>false,
                        'choices' => array(
                                    'empty_value' => 'seleccione', 
                                    "0"=> "xls", 
                                    "1"=> "pdf"
                                              )
                                    ))
            ->getForm();
        }

        else if($mostrar=='botones'){
            $form = $this->createFormBuilder()
                ->add('Reporte', 'submit')
            ->getForm();

        }
        

        return $this->render('FrontendVisitasBundle:Ajax:ajax.html.twig',array(
            'form'=>$form->createView(),
            'mostrar'=>$mostrar,
            'datos'=>$datos));
    }
}