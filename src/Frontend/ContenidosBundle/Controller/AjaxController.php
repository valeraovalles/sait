<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ContenidosBundle\Entity\Unidadadministrativa;

/*
*
* CONTROLADOR AJAX
*
*/
class AjaxController extends Controller
{
    /*
    *
    * FUNCION PARA MOSTRAR UNIDADES SOLICITANTES Y DETALLES DE TIPO PROVEEDOR DE ACUERDO A EL TIPO DE PROVEEDOR
    *
    */
    public function datosproveedorAction($datos)
    {
        $em = $this->getDoctrine()->getManager();

        $ajax=1; //variable en 1 para indicar que entro al ajax
    	
        //si el proveedor es de compras
    	if ($datos == 1)
    	{
            //se hace la consulta para obtener las unidades solicitantes
    		$dql   = "SELECT det FROM ContenidosBundle:Unidadsolicitante det where det.idTipoproveedor= :id";
            $query = $em->createQuery($dql)->setParameter('id',$datos);
            $detalle=$query->getResult();

            foreach ($detalle as $key) {
            	$unidadsolicitante[$key->getId()]=$key->getNombre();

            }

            //se crea el formulario, mostrará solo unidades solicitantes
             $form = $this->createFormBuilder()
                    ->add('unidadsolicitante', 'choice', array(
                        'choices'   => $unidadsolicitante,
                    ))
            ->getForm();
    	}

        elseif($datos == 2) //si el proveedor es de la vicepresidencia de contenidos
    	{
            //se realiza la consulta para obtener primero la unidad solicitante
    		$dql   = "SELECT det FROM ContenidosBundle:Unidadsolicitante det where det.idTipoproveedor= :id";
            $query = $em->createQuery($dql)->setParameter('id',$datos);
          
            $unidad=$query->getResult();
            foreach ($unidad as $key) 
            {
            	$unidadsolicitante[$key->getId()]=$key->getNombre();
            } 
            
            //se realiza el segundo query para tener los detalle de tipo de proveedor
            $dql   = "SELECT det FROM ContenidosBundle:DetalleTipoproveedor det where det.idTipoproveedo= :id";
            $query = $em->createQuery($dql)->setParameter('id',$datos);
            $detalle=$query->getResult();
            foreach ($detalle as $key) 
            {
            	$detalletipo[$key->getId()]=$key->getNombre();
            }

            //se crea el formulario con los datos de las unidades solicitantes y el detalle de tipos de prov
            $form = $this->createFormBuilder()
                    ->add('unidadsolicitante', 'choice', array(
                          'choices'   => $unidadsolicitante,                          
                    	 ))
                    ->add('detalle', 'choice', array(
                          'choices'   => $detalletipo,
                    	 ))
                    
            ->getForm();
    	}
        
        elseif ($datos == 4) //si el proveedor es de equipos telesur
    	{

            //se realiza el primer dql para obtener las unidades solicitantes
    		$dql   = "SELECT det FROM ContenidosBundle:Unidadsolicitante det where det.idTipoproveedor= :id";
            $query = $em->createQuery($dql)->setParameter('id',$datos);
          
            $unidad=$query->getResult();
            foreach ($unidad as $key) 
            {
            	$unidadsolicitante[$key->getId()]=$key->getNombre();
            } 
            
            //se realiza el segundo query para tener los detalles de tipo de proveedor
            $dql   = "SELECT det FROM ContenidosBundle:DetalleTipoproveedor det where det.idTipoproveedo= :id";
            $query = $em->createQuery($dql)->setParameter('id',$datos);
            $detalle=$query->getResult();
            foreach ($detalle as $key) 
            {
            	$detalletipo[$key->getId()]=$key->getNombre();
            }

            //se crea el formulario con los datos de las unidades solicitantes y el detalle de tipos de prov
            $form = $this->createFormBuilder()
                    ->add('unidadsolicitante', 'choice', array(
                          'choices'   => $unidadsolicitante,
                    	 ))
                    ->add('detalle', 'choice', array(
                          'choices'   => $detalletipo,
                    	 ))
                    
            ->getForm();
    	}

        //se envia a la vista 
    	return $this->render('ContenidosBundle:Ajax:datosproveedor.html.twig', array(
            'datos' => $datos,
            'ajax'=> $ajax,
            'form'   => $form->createView(),
        ));
    }

    /*
    *
    * FUNCION PARA CREAR FORMULARIO SI EL DETALLE DE TIPO PROVEEDOR ES "SATELITES"
    *
    */
    public function datossatAction($sats)
    {
        $ajax=1; //variable en 1 para indicar que entro al ajax
        $em = $this->getDoctrine()->getManager();

        //se crea el formulario con los tipos de satelites
        $form = $this->createFormBuilder()           
            ->add('tipoSatelite','choice', array(
                                                    'expanded'=>false, 
                                                    'multiple'=>false,
                                                    'choices' => array(
                                                                        "0" =>"Ocasional", 
                                                                        "1" =>"Fijo"
                                                                       )
                                                )
                )
            ->getForm();

        //envio a la vista
        return $this->render('ContenidosBundle:Ajax:satelites.html.twig', array(
            'sats' => $sats,
            'ajax'=> $ajax,
            'form'   => $form->createView(),
        ));
    }

    /*
    *
    * FUNCION PARA CREAR FORMULARIO EN PAGOS (DIAS DE ENTREGA) ASOCIADOS A UNA CONTRATACION
    *
    */
    public function pagoAction($dias)
    {
        if($dias == '0')
        {
            $em = $this->getDoctrine()->getManager();  

            //se realiza el query         
            $dql   = "SELECT d FROM ContenidosBundle:Diasentrega d";
            $query = $em->createQuery($dql);
              
            $diasentreg=$query->getResult();

            foreach ($diasentreg as $key) 
            {
                $diasent[$key->getId()]=$key->getNombre();
            }

            $form = $this->createFormBuilder()
                ->add('diasentrega', 'choice', array(
                                                      'choices'   => $diasent,
                                                    )
                     )                    
                ->getForm();

            //envio a la vista
            return $this->render('ContenidosBundle:Ajax:dias.html.twig', array(
                'dias' => $dias,
                'form'   => $form->createView(),
            ));
        }
        elseif ($dias == '1')
        {
            die;
        }
    }

    
    /*
    *
    * FUNCION PARA CREAR FORMULARIO EN DISPONIBILIDAD DE ACUERDO AL TIPO DE PRESUPUESTO Y EL ID DEL PROVEEDOR
    *
    */
    public function disAction($datos,$mostrar)
    {
        $em = $this->getDoctrine()->getManager();

        if($mostrar == 'presupuesto')
        {
            $tipo='N';  
            //se realiza el query         
            $dql   = "SELECT pre FROM ContenidosBundle:Presupuesto pre 
                        where pre.idProveedor= :id 
                        and pre.tipo like :tipo";
            $query = $em->createQuery($dql)->setParameters(
                                                            array(
                                                                    'id'=> $datos, 
                                                                    'tipo' => $tipo,
                                                                  )
                                                          );
              
            $presupuesto=$query->getResult();

            foreach ($presupuesto as $key) 
            {
                $presup[$key->getId()]=$key->getDescripcion();
            }

            $form = $this->createFormBuilder()
                ->add('descripcion', 'choice', array(
                                                      'choices'   => $presup,
                                                      'empty_value' => 'Seleccione...',
                                                    )
                     )                    
                ->getForm();


                

        }elseif($mostrar == 'contratacion')
        {

            $dql   = "SELECT cont FROM ContenidosBundle:Contratacion cont 
                        where cont.idPresupuesto= :id";
            $query = $em->createQuery($dql)->setParameter('id', $datos);
            $contrataciones=$query->getResult();


            foreach ($contrataciones as $key) 
            {
                $contr[$key->getId()]=$key->getDescripcion();
                echo $contr[$key->getId()];
            }
die;
            $form = $this->createFormBuilder()
                ->add('contratacion', 'choice', array(
                                                      'choices'   => $contr,
                                                      'empty_value' => 'Seleccione...',
                                                    )
                     )                    
                ->getForm();

        }

        return $this->render('ContenidosBundle:Ajax:disponibilidad.html.twig', array(
                    'datos'     => $datos,
                    'mostrar'   => $mostrar,
                    'form'      => $form->createView(),
                ));



           // die;
        //envio a la vista
        
    }

    
}//fin de la clase