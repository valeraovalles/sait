<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

//ASOCIO LAS ENTIDADES QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Entity\Contratacion;
use Frontend\ContenidosBundle\Entity\Presupuesto;
use Frontend\ContenidosBundle\Entity\Datosproveedor;

//ASOCIO LOS FORMULARIOS QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Form\ContratacionType;


/*
*
* CONTROLADOR DE LAS CONTRATACIONES
*
*/
class ContratacionController extends Controller
{
    /*
    *
    * LISTA DE TODAS LAS CONTRATACIONES ASOCIADAS A UN PRESUPUESTO
    *
    */
    public function indexAction($id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();
              
        //obtengo la disponibilidad en bs del preseupuesto seleccionado
        $presupuesto = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
        $disponibilidad = $presupuesto->getDisponibilidad();
        
        //DETERMINO EL TIPO DE MONEDA
        $dolares = $presupuesto->getMontoDolares();
        $euros = $presupuesto->getMontoEuros();

        if (($dolares == 0 || $dolares== NULL) && ($euros != 0 || $euros!=NULL))
        {
            $tipomoneda= '2';//moneda es EUROS
        }elseif(($euros == 0 || $euros==NULL) && (($dolares != 0 || $dolares!= NULL)))
        {
            $tipomoneda = '1';//moneda es DOLARES
        }elseif(($dolares == 0 || $dolares== NULL) && ($euros == 0 || $euros==NULL))
        {
            $tipomoneda = '3'; //moneda es Bs
        }


        //obtengo los datos de la contratacion segun id
        $entities = $em->getRepository('ContenidosBundle:Contratacion')->findByidPresupuesto($id_presupuesto);

        //envío a la vista
        return $this->render('ContenidosBundle:Contratacion:index.html.twig', array(
            'entities'          => $entities,
            'id_presupuesto'    => $id_presupuesto,
            'id_proveedor'      => $id_proveedor,
            'pres'              => $presupuesto,
            'tipomoneda'        => $tipomoneda,
        ));
    }

    /*
    *
    * FUNCION PARA CREAR UNA CONTRATACION
    *
    */
    public function createAction(Request $request,$id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();
        $alert = 0;

        //instancio la clase
        $entity  = new Contratacion();

        //asocio al formulario la entidad 
        $form = $this->createForm(new ContratacionType(), $entity);
        
        // obtengo los datos que envio el usuario
        $form->bind($request);

        //obtengo la disponibilidad en bs del preseupuesto seleccionado
        $presupuesto = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
        $disp_ant[0] = $presupuesto->getDisponibilidad();
        $disp_ant[1] = $presupuesto->getDisponibilidadDolares();
        $disp_ant[2] = $presupuesto->getDisponibilidadEuros();
        
        //DETERMINO EL TIPO DE MONEDA
        $dolares = $presupuesto->getMontoDolares();
        $euros = $presupuesto->getMontoEuros();

        if (($dolares == 0 || $dolares== NULL) && ($euros != 0 || $euros!=NULL))
        {
            $tipomoneda= '2';//moneda es EUROS
        }elseif(($euros == 0 || $euros==NULL) && (($dolares != 0 || $dolares!= NULL)))
        {
            $tipomoneda = '1';//moneda es DOLARES
        }elseif(($dolares == 0 || $dolares== NULL) && ($euros == 0 || $euros==NULL))
        {
            $tipomoneda = '3'; //moneda es Bs
        }

        $monto[0]=$entity->getMontoBs();
        $monto[1]=$entity->getMontoMe();

        
            $disp_act[0] = $disp_ant[0] - $monto[0];
            if($tipomoneda == 1)
            {
                if($monto[1] == 0 or $monto[1] == NULL )
                {
                    $alert = 1;
                    $mensaje = "INSERTE EL MONTO EN DOLARES";
                }else
                {
                    $disp_act[1] = $disp_ant[1] - $monto[1]; 
                    $disp_act[2] = 0;  
                }
                
            }elseif($tipomoneda == 2)
            {
                if($monto[1] == 0 or $monto[1] == NULL )
                {
                    $alert = 1;
                    $mensaje = "INSERTE EL MONTO EN EUROS";
                }else
                {
                    $disp_act[1] = 0;    
                    $disp_act[2] = $disp_ant[2] - $monto[1];
                }  
            }elseif(($disp_act[0] < 0) or ($disp_act[1] < 0) or ($disp_act[2] < 0) )
            {
                $alert= 1;
                $mensaje = "NO EXISTE DISPONIBILIDAD PRESUPUESTARIA";
            }
        
        
        //obtengo el tipo de proveedor del proveedor de acuerdo a un ID
        $entity1 = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id_proveedor);
        $tipoprov= $entity1->getIdTipoprov();

        if ($alert == 1)
        {
            $this->get('session')->getFlashBag()->add('alert', $mensaje); 
        }else
        {
           //verifico el formulario
            if ($form->isValid()) 
            {
                $montobs = $entity->getMontoBs();
                $montome = $entity->getMontoMe();
                
                //seteo la disponibilidad, el signo en la variable presupuesto
                $presupuesto->setDisponibilidad($disp_act[0]);
                $presupuesto->setDisponibilidadDolares($disp_act[1]);
                $presupuesto->setDisponibilidadEuros($disp_act[2]);

               // $presupuesto->setSigno($signo);

                //seteo el id del presupuesto y el tipo de moneda en la variable $entity
                $entity->setIdPresupuesto($presupuesto);
                $entity->setTipoMoneda($tipomoneda);
                $entity->setDebeBs($montobs);
                $entity->setdebeMe($montome);


                //inserto las variables $entity y $presupuesto en la BD
                $em->persist($entity);
                $em->persist($presupuesto);
                $em->flush();

                //envio a notificacion de que el registro fue creado
                $this->get('session')->getFlashBag()->add('notice', 'SE REGISTRO EXITOSAMENTE LA CONTRATACION');
                
                //envio a la vista
                return $this->redirect($this->generateUrl('contratacion_show', array(
                                                                        'id'            => $entity->getId(),
                                                                        'id_proveedor'  => $id_proveedor,
                                                                        'id_presupuesto'=>$id_presupuesto
                                                                        )));
            }
        }
        //envio a otra vista si el form no es válido
        return $this->render('ContenidosBundle:Contratacion:new.html.twig', array(
                                                                    'id'            => $entity->getId(),
                                                                    'id_proveedor'  => $id_proveedor,
                                                                    'id_presupuesto'=>$id_presupuesto,
                                                                    'form'          =>$form->createView(),
                                                                    'entity'        => $entity,
                                                                    'tipoprov'      => $tipoprov,
                                                                    'tipomoneda'    => $tipomoneda,
                                                                    'dolares'       => $dolares,
                                                                    'euros'         => $euros,
                                                                    ));

            
        
    }

    /*
    *
    * FORMULARIO PARA CREAR UNA CONTRATACION.
    *
    */
    public function newAction($id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //obtengo el id del proveedor segun el presupuesto
        $entity2 = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
        $prov = $entity2-> getIdProveedor();


        //DETERMINO EL TIPO DE MONEDA (DOLARES O EUROS)
        $dolares = $entity2->getMontoDolares();
        $euros = $entity2->getMontoEuros();
        
        if (($dolares == 0 || $dolares== NULL) && ($euros != 0 || $euros!=NULL))
        {
            $tipomoneda= '2';//moneda es EUROS
        }elseif(($euros == 0 || $euros==NULL) && (($dolares != 0 || $dolares!= NULL)))
        {
            $tipomoneda = '1';//moneda es DOLARES
        }elseif(($dolares == 0 || $dolares== NULL) && ($euros == 0 || $euros==NULL))
        {
            $tipomoneda = '3'; //moneda es Bs
        }


        //instancio la clase Contratacion
        $entity = new Contratacion();

        //asocio la clase al formulario
        $form   = $this->createForm(new ContratacionType(), $entity);

        //obtengo el tipo de proveedor del proveedor de acuerdo a un ID
        $entity1 = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id_proveedor);
        $tipoprov= $entity1->getIdTipoprov();

        //envio a la vista
        return $this->render('ContenidosBundle:Contratacion:new.html.twig', array(
            'entity'        => $entity,
            'id_proveedor'  => $id_proveedor,
            'tipoprov'      => $tipoprov,
            'tipomoneda'    => $tipomoneda,
            'id_presupuesto'=> $id_presupuesto,
            'form'          => $form->createView(),
        ));

    }

    /*
    *
    * DETALLES DE UNA CONTRATACION
    *
    */
    public function showAction($id_presupuesto,$id, $id_proveedor)
    {
        
        $em = $this->getDoctrine()->getManager();

        //obtengo el id del presupuesto desde la contratacion
        $entity1 = $em->getRepository('ContenidosBundle:Contratacion')->find($id);
        $pres= $entity1->getIdPresupuesto();

        //obtengo el id del proveedor segun el presupuesto
        $entity2 = $em->getRepository('ContenidosBundle:Presupuesto')->find($pres);
        $prov = $entity2-> getIdProveedor();


        //DETERMINO EL TIPO DE MONEDA (DOLARES O EUROS)
        $dolares = $entity2->getMontoDolares();
        $euros = $entity2->getMontoEuros();
        
        if (($dolares == 0 || $dolares== NULL) && ($euros != 0 || $euros!=NULL))
        {
            $tipomoneda= '2';//moneda es EUROS
        }elseif(($euros == 0 || $euros==NULL) && (($dolares != 0 || $dolares!= NULL)))
        {
            $tipomoneda = '1';//moneda es DOLARES
        }elseif(($dolares == 0 || $dolares== NULL) && ($euros == 0 || $euros==NULL))
        {
            $tipomoneda = '3'; //moneda es Bs
        }


        //obtengo el id del tipo de proveedor segun el proveedor
        $entity3 = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
        $tipoprov= $entity3->getIdTipoprov();


        //obtengo todos los datos de una contratacion segun ID
        $entity = $em->getRepository('ContenidosBundle:Contratacion')->find($id);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //envio a la vista
        return $this->render('ContenidosBundle:Contratacion:show.html.twig', array(
            'entity'            => $entity,
            'id_presupuesto'    => $id_presupuesto,
            'id_proveedor'      => $id_proveedor,
            'prov'              => $prov,
            'tipomoneda'        => $tipomoneda,
            'tipoprov'          => $tipoprov,
            'delete_form'       => $deleteForm->createView(),  ));
    }

    /*
    *
    * FORMULARIO PARA EDITAR UNA CONTRATACION
    *
    */
    public function editAction($id,$id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //obtengo el id del presupuesto desde la contratación       
        $entity = $em->getRepository('ContenidosBundle:Contratacion')->find($id);
        $pres= $entity->getIdPresupuesto();

        //obtengo el id del proveedor desde el presupuesto
        $entity2 = $em->getRepository('ContenidosBundle:Presupuesto')->find($pres);
        $prov = $entity2-> getIdProveedor();

        //DETERMINO EL TIPO DE MONEDA (DOLARES O EUROS)
        $dolares = $entity2->getMontoDolares();
        $euros = $entity2->getMontoEuros();
        
        if (($dolares == 0 || $dolares== NULL) && ($euros != 0 || $euros!=NULL))
        {
            $tipomoneda= '2';//moneda es EUROS
        }elseif(($euros == 0 || $euros==NULL) && (($dolares != 0 || $dolares!= NULL)))
        {
            $tipomoneda = '1';//moneda es DOLARES
        }elseif(($dolares == 0 || $dolares== NULL) && ($euros == 0 || $euros==NULL))
        {
            $tipomoneda = '3'; //moneda es Bs
        }


        //obtengo el id del tipo del proveedor desde los datos del proveedor
        $entity3 = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
        $tipoprov= $entity3->getIdTipoprov();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratacion entity.');
        }

        //asocio la clase al formulario
        $editForm = $this->createForm(new ContratacionType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        //envio a la vista
        return $this->render('ContenidosBundle:Contratacion:edit.html.twig', array(
            'entity'        => $entity,
            'tipoprov'      => $tipoprov,
            'prov'          => $prov,
            'pres'          => $pres,
            'id_proveedor'  => $id_proveedor,
            'id_presupuesto'=> $id_presupuesto,
            'tipomoneda'    => $tipomoneda,
            'edit_form'     => $editForm->createView(),
            'delete_form'   => $deleteForm->createView(),
        ));
    }

    /*
    *
    * ACTUALIZAR LA CONTRATACION.
    *
    */
    public function updateAction(Request $request, $id, $id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //obtengo datos de la contratacion
        $entity = $em->getRepository('ContenidosBundle:Contratacion')->find($id);
        $pres= $entity->getIdPresupuesto();

        //obtengo datos del presupuesto
        $presupuesto = $em->getRepository('ContenidosBundle:Presupuesto')->find($pres);
        $prov = $presupuesto-> getIdProveedor();

        //obtengo el id del tipo del proveedor desde los datos del proveedor
        $entity3 = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
        $tipoprov= $entity3->getIdTipoprov();

        //DETERMINO EL TIPO DE MONEDA (DOLARES O EUROS)
        $dolares = $presupuesto->getMontoDolares();
        $euros = $presupuesto->getMontoEuros();
        
        if (($dolares == 0 || $dolares== NULL) && ($euros != 0 || $euros!=NULL))
        {
            $tipomoneda= '2';//moneda es EUROS
        }elseif(($euros == 0 || $euros==NULL) && (($dolares != 0 || $dolares!= NULL)))
        {
            $tipomoneda = '1';//moneda es DOLARES
        }elseif(($dolares == 0 || $dolares== NULL) && ($euros == 0 || $euros==NULL))
        {
            $tipomoneda = '3'; //moneda es Bs
        }

        //OBTENGO LA DISPONIBILIDAD Y EL MONTO ANTERIOR
        $disp_ant[0] = $presupuesto->getDisponibilidad();
        $disp_ant[1] = $presupuesto->getDisponibilidadDolares();
        $disp_ant[2] = $presupuesto->getDisponibilidadEuros();

        $monto_ant[0] = $entity->getMontoBs();
        if ($tipomoneda == 1)
        {
            $monto_ant[1] = $entity->getMontoMe();
            $monto_ant[2] = 0;
        }elseif ($tipomoneda == 2)
        {
            $monto_ant[1] = 0;
            $monto_ant[2] = $entity->getMontoMe();
        }else {
            $monto_ant[1] = 0;
            $monto_ant[2] = 0;
        }
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContratacionType(), $entity);
        $editForm->bind($request);

        //OBTENGO EL MONTO ACTUAL
        $monto_act[0]= $entity->getMontoBs();
        if($tipomoneda == 1)
        {
            $monto_act[1]= $entity->getMontoMe();
            $monto_act[2]= 0;
        }elseif($tipomoneda == 2)
        {
            $monto_act[1]= 0;
            $monto_act[2]= $entity->getMontoMe();
        }else
        {
            $monto_act[1]= 0;
            $monto_act[2]= 0;
        }

        $dife[0] = $monto_ant[0] - $monto_act[0];
        $dife[1] = $monto_ant[1] - $monto_act[1];
        $dife[2] = $monto_ant[2] - $monto_act[2];

        $disp_actual[0] = $disp_ant[0] + $dife[0];
        $disp_actual[1] = $disp_ant[1] + $dife[1];
        $disp_actual[2] = $disp_ant[2] + $dife[2];

        //verifico el formulario
        if ($editForm->isValid())
        {
            //seteo el id del presupuesto
            $entity-> setIdPresupuesto($presupuesto);
            
            //seteo la disponibilidad
            $presupuesto->setDisponibilidad($disp_actual[0]);
            $presupuesto->setDisponibilidadDolares($disp_actual[1]);
            $presupuesto->setDisponibilidadEuros($disp_actual[2]);

            //seteo el tipo de moneda (DOLARES O EUROS)
            $entity->setTipoMoneda($tipomoneda);

            //inserto en la BD
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', 'SE EDITO EXITOSAMENTE LA CONTRATACION');

            //envio a la vista
            return $this->redirect($this->generateUrl('contratacion_show', array(
                                                                                    'id' => $id,
                                                                                    'id_proveedor'=> $id_proveedor,
                                                                                    'id_presupuesto'=>$id_presupuesto,
                                                                                )));  
        }

            //envio a otra vista si el form no es válido
            return $this->render('ContenidosBundle:Contratacion:edit.html.twig', array(
            'entity'      => $entity,
            'tipoprov'    => $tipoprov,
            'prov'        => $prov,
            'pres'        => $pres,
            'id_presupuesto'    =>$id_presupuesto,
            'id_proveedor'  => $id_proveedor,
            'tipomoneda'    => $tipomoneda,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            ));
    }

    /*
    *
    * ELIMINAR UNA CONTRATACION.
    *
    */
    public function deleteAction($id,$id_presupuesto,$id_proveedor)
    {
        
        $em = $this->getDoctrine()->getManager();

        //obtengo los datos de la contratacion segun ID
        $entity = $em->getRepository('ContenidosBundle:Contratacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratacion entity.');
        }

        //obtengo la disponibilidad en bs del preseupuesto seleccionado
        $presupuesto = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
        $disp_ant[0] = $presupuesto->getDisponibilidad();
        $disp_ant[1] = $presupuesto->getDisponibilidadDolares();
        $disp_ant[2] = $presupuesto->getDisponibilidadEuros();
        
        //DETERMINO EL TIPO DE MONEDA
        $dolares = $presupuesto->getMontoDolares();
        $euros = $presupuesto->getMontoEuros();

        if (($dolares == 0 || $dolares== NULL) && ($euros != 0 || $euros!=NULL))
        {
            $tipomoneda= '2';//moneda es EUROS
        }elseif(($euros == 0 || $euros==NULL) && (($dolares != 0 || $dolares!= NULL)))
        {
            $tipomoneda = '1';//moneda es DOLARES
        }elseif(($dolares == 0 || $dolares== NULL) && ($euros == 0 || $euros==NULL))
        {
            $tipomoneda = '3'; //moneda es Bs
        }

        $monto[0] = $entity->getMontoBs();
        $monto[1] = $entity->getMontoMe();


        $disp_act[0] = $disp_ant[0] + $monto[0];
        if ($tipomoneda == 1)
        {
            $disp_act[1] = $disp_ant[1] + $monto[1];
            $disp_act[2] = 0;
        }elseif($tipomoneda == 2)
        {
            $disp_act[1] = 0;
            $disp_act[2] = $disp_ant[2] + $monto[1];
        }else
        {
            $disp_act[1] = 0;
            $disp_act[2] = 0;
        }

        $presupuesto->setDisponibilidad($disp_act[0]);
        $presupuesto->setDisponibilidadDolares($disp_act[1]);
        $presupuesto->setDisponibilidadEuros($disp_act[2]);

        //obtengo los datos de la contratacion segun id
        $entities = $em->getRepository('ContenidosBundle:Contratacion')->findByidPresupuesto($id_presupuesto);


        $dql   = "SELECT pg FROM ContenidosBundle:Pago pg 
                    where pg.idContratacion= :id";
        $query = $em->createQuery($dql)->setParameter('id',$id);
        $pago=$query->getResult();

        if ($pago == NULL)
        {
            //ELIMINO LOS DATOS DE LA CONTRATACION SI NO TENGO PAGOS ASOCIADOS
            $em->remove($entity);
            $em->flush();
            
            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE ELIMINARON LOS DATOS DE LA CONTRATACION EXITOSAMENTE');
            
            //ENVIO A LA VISTA SHOW PARA MOSTRAR PAGO CREADO
            return $this->redirect($this->generateUrl('contratacion', array(
                                                                            'entities'         => $entities,
                                                                            'id_proveedor'     => $id_proveedor,
                                                                            'id_presupuesto'   => $id_presupuesto,
                                                                            'tipomoneda'       => $tipomoneda,
                                                                            'pres'             => $presupuesto,
                                                                            )));
        }else
        {
            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('alert', 'LA CONTRATACION TIENE PAGOS ASOCIADOS');

            //ENVIO A LA VISTA SHOW PARA MOSTRAR PAGO CREADO
            return $this->redirect($this->generateUrl('contratacion', array(
                                                                            'entities'         => $entities,
                                                                            'id_proveedor'     => $id_proveedor,
                                                                            'id_presupuesto'   => $id_presupuesto,
                                                                            'tipomoneda'       => $tipomoneda,
                                                                            'pres'             => $presupuesto,
                                                                            )));
        }

    }

    /*
    *
    * Creates a form to delete a Contratacion entity by id.
    *
    * @param mixed $id The entity id
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }

#########################################################################################################
#########################################################################################################
#
#                            DISPONIBILIDAD DE CONTRATACION CON LOS PAGOS
#
#########################################################################################################
#########################################################################################################

    /*
    *
    * FORMULARIO PARA LA DISPONIBILIDAD DE CONTRATACION CON LOS PAGOS
    *
    */
    public function disponibilidadpagoAction()
    {
        $em = $this->getDoctrine()->getManager();

        //creo el formualrio
        $form = $this->createFormBuilder()    
            ->add('concepto', 'entity', array(
                                            'class'     => 'ContenidosBundle:Contratacion',
                                            'property'  => 'concepto',
                                            'multiple'  => false,
                                            ))
            ->getForm();

        //envio a la vista
        return $this->render('ContenidosBundle:Contratacion:disponibilidadpago.html.twig', array(
            'form'   => $form->createView(),
        ));  
    }

    /*
    *
    *  FUNCION PARA GENERAR EL REPORTE DE DISPONIBILIDAD DE PAGOS
    *
    */
    public function disponibilidadpagoshowAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //Obtengo los datos del formulario AJAX
        $formulario = $request->request->all();
        $formulario = $formulario['form'];
        $concepto   = $formulario['concepto'];
        $factura    = $formulario['factura'];
         
    }

}//fin de la clase