<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



/**
 * Datosproveedor controller.
 *
 */
class AjaxController extends Controller
{
    public function datosproveedorAction($datos)
    {
    	$em = $this->getDoctrine()->getManager();
    	if ($datos == 1)
    	{

    		$dql   = "SELECT det FROM ContenidosBundle:Unidadsolicitante det where det.idTipoproveedor= :id";
            $query = $em->createQuery($dql)->setParameter('id',$datos);
          
            $detalle=$query->getResult();
            foreach ($detalle as $key) {
            	$unidadsolicitante[$key->getId()]=$key->getNombre();

            }
             $form = $this->createFormBuilder()
                    ->add('unidadsolicitante', 'choice', array(
                        'choices'   => $unidadsolicitante,
                    ))
            ->getForm();

    	}elseif($datos == 2)
    	{
    		$dql   = "SELECT det FROM ContenidosBundle:Unidadsolicitante det where det.idTipoproveedor= :id";
            $query = $em->createQuery($dql)->setParameter('id',$datos);
          
            $unidad=$query->getResult();
            foreach ($unidad as $key) {
            	$unidadsolicitante[$key->getId()]=$key->getNombre();

            } 
            
            $dql   = "SELECT det FROM ContenidosBundle:DetalleTipoproveedor det where det.idTipoproveedo= :id";
            $query = $em->createQuery($dql)->setParameter('id',$datos);
            $detalle=$query->getResult();
            foreach ($detalle as $key) {
            	$detalletipo[$key->getId()]=$key->getNombre();
            }

            $form = $this->createFormBuilder()
                    ->add('unidadsolicitante', 'choice', array(
                          'choices'   => $unidadsolicitante,                          
                    	 ))
                    ->add('observacionTipoproveedor','textarea')
                    ->add('detalle', 'choice', array(
                          'choices'   => $detalletipo,
                    	 ))
                    ->add('observacionUnidadsolicitante','textarea')
                    
            ->getForm();



    	}elseif ($datos == 3)
    	{
    		$dql   = "SELECT det FROM ContenidosBundle:Unidadsolicitante det where det.idTipoproveedor= :id";
            $query = $em->createQuery($dql)->setParameter('id',$datos);
          
            $detalle=$query->getResult();
            foreach ($detalle as $key) {
            	$unidadsolicitante[$key->getId()]=$key->getNombre();

            }
            $form = $this->createFormBuilder()
                    ->add('unidadsolicitante', 'choice', array(
                          'choices'   => $unidadsolicitante,
                    	 ))
                    ->add('tipoSatelite','choice', array(
			                                            'expanded'=>false, 
			                                            'multiple'=>false,
			                                            'empty_value' => 'Seleccione...',
			                                            'choices' => array(
			                                                                    "0" =>"Ocasional", 
			                                                                    "1" =>"Fijo"
			                                                              )
                                        				)
                		)
            ->getForm();
    	}elseif ($datos == 4) 
    	{


    		$dql   = "SELECT det FROM ContenidosBundle:Unidadsolicitante det where det.idTipoproveedor= :id";
            $query = $em->createQuery($dql)->setParameter('id',$datos);
          
            $unidad=$query->getResult();
            foreach ($unidad as $key) {
            	$unidadsolicitante[$key->getId()]=$key->getNombre();

            } 
            
            $dql   = "SELECT det FROM ContenidosBundle:DetalleTipoproveedor det where det.idTipoproveedo= :id";
            $query = $em->createQuery($dql)->setParameter('id',$datos);
            $detalle=$query->getResult();
            foreach ($detalle as $key) {
            	$detalletipo[$key->getId()]=$key->getNombre();
            }

            $form = $this->createFormBuilder()
                    ->add('unidadsolicitante', 'choice', array(
                          'choices'   => $unidadsolicitante,
                    	 ))
                    ->add('detalle', 'choice', array(
                          'choices'   => $detalletipo,
                    	 ))
                    
            ->getForm();

    	}
    	return $this->render('ContenidosBundle:Ajax:datosproveedor.html.twig', array(
            'datos' => $datos,
            'form'   => $form->createView(),
        ));
    }

}