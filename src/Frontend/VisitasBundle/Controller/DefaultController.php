<?php

namespace Frontend\VisitasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Frontend\VisitasBundle\Entity\Reporte;
use Symfony\Component\HttpFoundation\Request;



class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FrontendVisitasBundle:Default:index.html.twig', array('name' => $name));
    }




 public function pruebarepAction(Request $request)
    {
        $task = new Reporte();

        $form = $this->createFormBuilder($task)

            ->add('Desde','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                ))
            ->add('Hasta','date',array(
                  'widget' => 'single_text',
                  'format' => 'yyyy-MM-dd',))

            ->add('Formato','choice', array(
                            'expanded'=>false, 
                            'multiple'=>false,
                            'choices' => array(
                                                    "0"=> "PDF", 
                                                    "1"=> "DOC"
                                                  )
                                        ))
            ->getForm();
 
 
        return $this->render('FrontendVisitasBundle:Reporte:repor.html.twig', array(
            'form' => $form->createView(),
        ));
    }




}
