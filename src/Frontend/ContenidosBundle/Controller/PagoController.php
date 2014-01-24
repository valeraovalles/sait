<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

//ASOCIO LAS ENTIDADES QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Entity\Pago;
use Frontend\ContenidosBundle\Entity\Datosproveedor;
use Frontend\ContenidosBundle\Entity\Presupuesto;
use Frontend\ContenidosBundle\Entity\Unidadadministrativa;
use Frontend\ContenidosBundle\Entity\Unidadejecutora;
use Frontend\ContenidosBundle\Entity\Contratacion;
use Frontend\ContenidosBundle\Entity\Controlpagounidad;
use Frontend\ContenidosBundle\Entity\Diasentrega;
use Frontend\ContenidosBundle\Entity\Tipoproveedor;

//ASOCIO LOS FORMULARIOS QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Form\PagoType;
use Frontend\ContenidosBundle\Form\ControlpagounidadType;
use Frontend\ContenidosBundle\Form\DiasType;

/**
 * CONTROLADOR ENTIDAD PAGOS
 *
 */
class PagoController extends Controller
{
    /*
    *
    * LISTA DE TODOS LOS PAGOS 
    *
    */
    public function indexAction($id_contratacion,$id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE LOS PAGOS ASOCIADOS A UNA CONTRATACION
        $entities = $em->getRepository('ContenidosBundle:Pago')->findByIdContratacion($id_contratacion);

        //RETORNO A LA VISTA PARA MOSTRAR LISTADO
        return $this->render('ContenidosBundle:Pago:index.html.twig', array(
            'entities'          => $entities,
            'id_contratacion'   => $id_contratacion,
            'id_presupuesto'    => $id_presupuesto,
            'id_proveedor'      => $id_proveedor,
        ));
    }
    
    /*
    *
    * FUNCION PARA CREAR UN NUEVO PAGO
    *
    */
    public function createAction(Request $request,$id_contratacion,$id_presupuesto,$id_proveedor, $tipomoneda)
    {
        $alert = 0;

        $em = $this->getDoctrine()->getManager();

        //OBTENGO EL TIPO DE PROVEEDOR
        $pres = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
        $prov = $pres->getIdProveedor();

        $prove = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
        $id_prov = $prove->getIdTipoprov();

        $compras = 0;
        if($id_prov == 'COMPRAS')
        {
           $compras=1;
        }

        //OBTENGO LOS DATOS DE LA CONTRATACION
        $contrat = $em->getRepository('ContenidosBundle:Contratacion')->find($id_contratacion);

        //OBTENGO LOS DATOS DEL PROVEEDOR DE ACUERDO A UNA CONTRATACION 
        $entities = $em->getRepository('ContenidosBundle:Datosproveedor')->findBynombre($id_contratacion);

        //INSTANCIO LAS VARIABLES ENTITY Y ENTITY1
        $entity  = new Pago();
        $entity1 = new Controlpagounidad();
        
        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $form   = $this->createForm(new PagoType(), $entity);
        $form1  = $this->createForm(new ControlpagounidadType(), $entity1);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form->bind($request);
        $form1->bind($request);

        if ($compras == 1)
        {
            $contraentrega = $entity->getContraEntrega();
            //Obtengo los dias de entrega
            if ($contraentrega == 0 )
            {
                // obtengo los datos del formulario AJAX
                $datosform = $request->request->all();
                $datosform = $datosform['form'];
                $diasentrega = $datosform['diasentrega'];
            }else
            {
                $diasentrega = 0;
            }
        }else
        {
            $diasentrega = 0;
        }

        //OBTENGO LA UNIDAD EJECUTORA
        $ejec= $entity->getIdUnidadejec();
        $ejecu = $em->getRepository('ContenidosBundle:Unidadejecutora')->find($ejec);
        $unidadejecutora = $ejecu->getId();

        //TOMO ESTE CAMPO COMO REFERENCIA, PARA TRAER LOS DATOS DEL PAGO
        $numerofactura= $entity->getNumFactura();        

        //BLOQUE PARA DETERMINAR SI EL NUM DE LA FACTURA ES UNICO
        $pago_repetido = $em->getRepository('ContenidosBundle:Pago')->findBynumFactura($numerofactura);
        $cont = 0;
        
        foreach ($pago_repetido as $key ) {
            $cont ++; 
        }
        if ($cont != 0)
        {
            $alert = 1;
            $mensaje = "EL NUMERO DE LA FACTURA ESTA REPETIDO";
        }

        //BLOQUE PARA DETERMINAR SI SE INGRESARON LOS MONTOS DE ACUERDO AL TIPO DE MONEDA
        $monto[0] = $entity->getMontoBs();
        $monto[1] = $entity->getMontoMe();

        if ($tipomoneda == 1)
        {
            if ($monto[1] == NULL or $monto[1] == 0 )
            {
                $alert= 1;
                $mensaje = "DEBE INGRESAR EL MONTO EN DOLARES";
            }
        }elseif($tipomoneda == 2)
        {
            if ($monto[1] == NULL or $monto[1] == 0 )
            {
                $alert= 1;
                $mensaje = "DEBE INGRESAR EL MONTO EN EUROS";
            }
        }elseif ($tipomoneda == 3) 
        {
            if ($monto[0] == NULL or $monto[0] == 0 )
            {
                $alert= 1;
                $mensaje = "DEBE INGRESAR EL MONTO EN BOLIVARES";
            }
        }

        //BLOQUE PARA DETERMINAR SI EL PAGO ES VÁLIDO
        $debe[0] = $contrat->getDebeBs();
        $debe[1] = $contrat->getDebeMe();
        
        //CALCULO LA DEUDA ACTUAL
        $debe_act[0] = $debe[0] - $monto[0];
        $debe_act[1] = $debe[1] - $monto[1];

        if (($debe[0]== 0) or ($debe[1] == 0 ))
        {
            $alert = 1;
            $mensaje = "LA CONTRATACION YA SE PAGO COMPLETAMENTE";
        }else
        {
            if (($debe_act[0]< 0) or ($debe_act[1]< 0))
            {
                $alert = 1;
                $mensaje = "EL PAGO EXCEDE EL MONTO DE LA DEUDA";
            }else
            {
                $contrat->setDebeBs($debe_act[0]);
                $contrat->setDebeMe($debe_act[1]);
            }
        }

        if ($alert == 0 )
        {
            //VERIFICO SI EL  FORMULARIO ES VALIDO
            if($form->isValid()) 
            { 

                $cont = $em->getRepository('ContenidosBundle:Contratacion')->find($id_contratacion);
                $dias = $em->getRepository('ContenidosBundle:Diasentrega')->find($diasentrega);
                
                //SETEO VALORES EN LA ENTIDAD PAGO
                $entity->setidContratacion($cont);
                $entity->setDiasEntrega($dias);
                $entity->setTipoMoneda($tipomoneda); 

                if($tipomoneda == 3)
                {
                    $monto = 0;
                    $entity->setMontoMe($monto);
                }      
                
                $alert = 0;

                $fecha[1] = $entity1->getFechaUnidaduno();
                $fecha[2] = $entity1->getFechaUnidaddos();
                $fecha[3] = $entity1->getFechaUnidadtres(); 

                if(!empty($fecha[3]))
                {
                    $status = 3;
                }elseif(!empty($fecha[2]))
                {
                    $status = 2;
                }elseif(!empty($fecha[1]))
                {
                    $status = 1;
                }else
                {
                    $status = 7; //no tiene ninguna fecha de entrega
                }
                 
                $entity1->setIdEjecutora($ejecu);
                $entity1->setIdContratacion($cont);
                $entity1->setStatus($status);  

                $em->persist($entity);

                $id_pago = $entity->getId();

                $pagooo = $em->getRepository('ContenidosBundle:Pago')->find($id_pago);
                $entity1->setIdPago($pagooo);

                //INSERTO LOS VALORES EN LA TABLA PAGO Y CONTROLPAGOUNIDAD
                
                $em->persist($entity1);
                $em->flush();
            

                //envio a notificacion de que el registro fue creado
                $this->get('session')->getFlashBag()->add('notice', ' SE REGISTRO EXITOSAMENTE EL PAGO');

                //ENVIO A LA VISTA SHOW PARA MOSTRAR PAGO CREADO
                return $this->redirect($this->generateUrl('pago_show', array(
                                                                             'id'               => $entity->getId(),
                                                                             'id_contratacion'  => $id_contratacion,
                                                                             'id_proveedor'     => $id_proveedor,
                                                                             'id_presupuesto'   => $id_presupuesto,
                                                                            )));
                
            }
        }else
        {
            //envio a alerta
            $this->get('session')->getFlashBag()->add('alert', $mensaje);
        }
        //ENVIO A LA VISTA NEW PARA MOSTRAR FORMULARIO DE PAGO
        return $this->render('ContenidosBundle:Pago:new.html.twig', array(
            'entity'            => $entity,
            'entity1'           => $entity1,
            'form'              => $form->createView(),
            'form1'             => $form1->createView(),
            'id_contratacion'   => $id_contratacion,
            'id_proveedor'      => $id_proveedor,
            'id_presupuesto'    => $id_presupuesto,
            'compras'           => $compras,
            'tipomoneda'        => $tipomoneda,
        ));
    }

    /*
    *
    * FUNCION PARA MOSTRAR EL FORMULARIO PARA CREAR NUEVO PAGO.
    *
    */
    public function newAction($id_contratacion,$id_presupuesto,$id_proveedor)
    {

        $em = $this->getDoctrine()->getManager();
     
        //OBTENGO EL TIPO DE PROVEEDOR
         $pres = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
         $prov = $pres->getIdProveedor();

         $prove = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
         $id_prov = $prove->getIdTipoprov();

         $compras = 0;
         if($id_prov == 'COMPRAS')
         {
            $compras=1;
         }

        $entities = $em->getRepository('ContenidosBundle:Contratacion')->find($id_contratacion);

        $tipomoneda= $entities->getTipoMoneda();

        //INSTANCIO LA CLASE PAGO
        $entity         = new Pago();
        $entity1        = new Controlpagounidad();

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $form       = $this->createForm(new PagoType(), $entity);
        $form1      = $this->createForm(new ControlpagounidadType(), $entity1);
        
        //ENVIO A LA VISTA NEW PARA MOSTRAR FORMULARIO
        return $this->render('ContenidosBundle:Pago:new.html.twig', array(
            'entity'            => $entity,
            'entity1'           => $entity1,
            'compras'           => $compras,
            'form'              => $form->createView(),
            'form1'             => $form1->createView(),
            'id_contratacion'   => $id_contratacion,
            'id_proveedor'      => $id_proveedor,
            'id_presupuesto'    => $id_presupuesto,
            'tipomoneda'        => $tipomoneda,
        ));
    }

    /*
    *
    * FUNCION PARA MOSTRAR DETALLES DEL PAGO
    *
    */
    public function showAction($id,$id_contratacion, $id_presupuesto, $id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO EL TIPO DE PROVEEDOR
        $pres = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
        $prov = $pres->getIdProveedor();

        $prove = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
        $id_prov = $prove->getIdTipoprov();

        $compras = 0;
        if($id_prov == 'COMPRAS')
        {
           $compras=1;
        }

        //OBTENGO LOS DATOS DEL PAGO DE ACUERDO AL ID ENVIADO
        $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);
        $idpago = $entity->getId();
        $entity1 = $em->getRepository('ContenidosBundle:Controlpagounidad')->findByIdPago($idpago);

        foreach ($entity1 as $key) 
        {
            $est[$key->getId()]=$key->getStatus();
            $estatus = $est[$key->getId()];

            $entity2 = $em->getRepository('ContenidosBundle:Unidadadministrativa')->find($estatus);
            $unidad = $entity2->getNombre();
        }

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pago entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //ENVIO A LA VISTA SHOW PARA MOSTRAR LOS DETALLES DEL PAGO
        return $this->render('ContenidosBundle:Pago:show.html.twig', array(
            'entity'            => $entity,
            'entity1'           => $entity1,
            'delete_form'       => $deleteForm->createView(),        
            'id_contratacion'   => $id_contratacion,
            'id_presupuesto'    => $id_presupuesto,
            'id_proveedor'      => $id_proveedor,
            'unidad'            => $unidad,
            'estatus'           => $estatus,
            'compras'           => $compras,
            ));
    }

    /*
    *
    * FUNCION PARA MOSTRAR EL FORMULARIO DEL PAGO(PARA EDITAR).
    *
    */
    public function editAction($id,$id_contratacion,$id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO EL TIPO DE PROVEEDOR
        $pres = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
        $prov = $pres->getIdProveedor();

        $prove = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
        $id_prov = $prove->getIdTipoprov();

        $compras = 0;
        if($id_prov == 'COMPRAS')
        {
           $compras=1;
        }

        //OBTENGO INFORMACION DEL PAGO DE ACUERDO AL ID ENVIADO
        $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);
        $uniejec = $entity->getIdUnidadejec()->getId();


        $idpago = $entity->getId();

        $entities = $em->getRepository('ContenidosBundle:Contratacion')->find($id_contratacion);

        $tipomoneda= $entities->getTipoMoneda();

        $entity1 = $em->getRepository('ContenidosBundle:Controlpagounidad')->findByIdPago($idpago);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pago entity.');
        }
        

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $editForm = $this->createForm(new PagoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $editForm1 = $this->createForm(new ControlpagounidadType(), $entity1[0]);      
        $deleteForm1 = $this->createDeleteForm($entity1);


        //ENVIO A LA VISTA EDIT PARA MOSTRAR EL FORMULARIO
        return $this->render('ContenidosBundle:Pago:edit.html.twig', array(
            'entity'            => $entity,
            'edit_form'         => $editForm->createView(),
            'delete_form'       => $deleteForm->createView(),
            'edit_form1'        => $editForm1->createView(),
            'delete_form1'      => $deleteForm1->createView(),
            'id_contratacion'   => $id_contratacion,
            'id_presupuesto'    => $id_presupuesto,
            'id_proveedor'      => $id_proveedor,
            'compras'           => $compras,
            'uniejec'           => $uniejec,
            'tipomoneda'        => $tipomoneda,
        ));
    }

    /*
    *
    * FUNCION PARA INSERTAR DATOS DEL PAGO EN LA BASE DE DATOS
    *
    */
    public function updateAction(Request $request, $id, $id_contratacion,$id_proveedor,$id_presupuesto)
    {
        $datos=$request->request->all();
        $datos=$datos['frontend_contenidosbundle_controlpagounidadtype'];

        $em = $this->getDoctrine()->getManager();

        //OBTENGO INFORMACION DEL PAGO DE ACUERDO A SU ID
        $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);

        $idpago = $entity->getId();
        $entity1 = $em->getRepository('ContenidosBundle:Controlpagounidad')->findByIdPago($idpago);

        $entity1 = $entity1[0];
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pago entity.');
        }

        $status = $entity1->getStatus();

        $deleteForm = $this->createDeleteForm($id);

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $editForm  = $this->createForm(new PagoType(), $entity);
        $editForm1 = $this->createForm(new ControlpagounidadType(), $entity1);    

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $editForm->bind($request);

        //VERIFICO SI EL  FORMULARIO ES VALIDO
        if ($editForm->isValid()) 
        {

            $entities = $em->getRepository('ContenidosBundle:Contratacion')->find($id_contratacion);
            $tipomoneda= $entities->getTipoMoneda();

            $uniejec = $entity->getIdUnidadejec()->getId();

            //INSERTO LOS DATOS EN LA BASE DE DATOS
            $entity->setTipoMoneda($tipomoneda);
            $entity->setIdContratacion($entities);
            
            $ejecutora = $em->getRepository('ContenidosBundle:Unidadejecutora')->find($uniejec);

            $entity1->setIdEjecutora($ejecutora);
            $entity1->setIdContratacion($entities);
            $entity1->setStatus($status);
            $entity1->setIdPago($entity);

            $em->persist($entityfore);
            $em->persist($entity1);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE EDITO EXITOSAMENTE EL PAGO');

            //ENVIO A LA VISTA SHOW PARA VER EL DETALLE DE LOS CAMBIOS
            return $this->redirect($this->generateUrl('pago_show', array(   
                                                                            'id'              => $id,
                                                                            'id_contratacion' => $id_contratacion,
                                                                            'id_proveedor'    => $id_proveedor,
                                                                            'id_presupuesto'  => $id_presupuesto,
                                                                        )));
        }

        //ENVIO A LA VISTA ANTERIOR SI EL FORMULARIO NO ES VALIDO
        return $this->render('ContenidosBundle:Pago:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /*
    *
    * FUNCION PARA ELIMINAR PAGOS.
    *
    */
    public function deleteAction($id, $id_contratacion, $id_presupuesto, $id_proveedor)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);

        $Contratacion= $entity->getIdContratacion();

        $entity2 = $em->getRepository('ContenidosBundle:Contratacion')->find($id_contratacion);

        $monto[0] = $entity->getmontoMe();
        $monto[1] = $entity->getmontoBs();

        $debe_ant[0] = $entity2->getDebeMe();
        $debe_ant[1] = $entity2->getDebeBs();

        $debe_act[0] = $debe_ant[0] + $monto[0];
        $debe_act[1] = $debe_ant[1] + $monto[1];

        if (!$entity) 
        {
            throw $this->createNotFoundException('Unable to find Pago entity.');
        }

        $dql   = "SELECT cpg FROM ContenidosBundle:Controlpagounidad cpg 
                    where cpg.idPago= :id";
        $query = $em->createQuery($dql)->setParameter('id',$id);
        $cpago=$query->getResult();

        if ($cpago != NULL)
        {
            foreach ($cpago as $key) 
            {
               $id_control = $key->getId();
            }
        
            $entity1 = $em->getRepository('ContenidosBundle:Controlpagounidad')->find($id_control);
           
            //ELIMINO PRIMERO LOS DATOS DEL CONTROL DEL PAGO
                $em->remove($entity1);
                $em->flush();
        }

        //AHORA ELIMINO LOS DATOS DEL PAGO
            $em->remove($entity);
            
        //REVERSO LA DEUDA EN LA CONTRATACION
            
            $entity2->setDebeMe($debe_act[0]);
            $entity2->setDebeBs($debe_act[1]);
     
            $em->flush();
        //OBTENGO LOS DATOS DE LOS PAGOS ASOCIADOS A UNA CONTRATACION
        $entities = $em->getRepository('ContenidosBundle:Pago')->findByIdContratacion($id_contratacion);

        //envio a notificacion de que el registro fue creado
        $this->get('session')->getFlashBag()->add('notice', ' SE ELIMINARON LOS DATOS DEL PAGO EXITOSAMENTE');

        //ENVIO A LA VISTA SHOW PARA MOSTRAR PAGO CREADO
        return $this->redirect($this->generateUrl('pago', array(
                                                                'entities'         => $entities,
                                                                'id_contratacion'  => $id_contratacion,
                                                                'id_proveedor'     => $id_proveedor,
                                                                'id_presupuesto'   => $id_presupuesto,
                                                                )));
           
    }

    /**
     * Creates a form to delete a Pago entity by id.
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
}//fin de la clase