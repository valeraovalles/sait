<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

//ASOCIO LAS ENTIDADES QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Entity\Presupuesto;
use Frontend\ContenidosBundle\Entity\Datosproveedor;

//ASOCIO LOS FORMULARIOS QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Form\PresupuestoType;
use Frontend\ContenidosBundle\Form\DatosproveedorType;

/*
*
* CONTROLADOR DE LA ENTIDAD PRESUPUESTO
*
*/
class PresupuestoController extends Controller
{

    /*
    *
    * LISTADO DE PRESUPUESTOS TIPO N
    *
    */
    public function indexAction($id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        $tipo = 'N';
        //query para que muestre solo los presupuestos tipo N (no deben ser extension)
        $dql = "select p from ContenidosBundle:Presupuesto p 
                where p.idProveedor=:id_proveedor and p.tipo=:tipo";
        $consulta = $em->createQuery($dql)->setParameters(
                                                            array(
                                                                    'id_proveedor'=> $id_proveedor, 
                                                                    'tipo' => $tipo,
                                                                 )
                                                         );
        $entities = $consulta->getResult();

        //envío a la vista
        return $this->render('ContenidosBundle:Presupuesto:index.html.twig', array(
            'id_proveedor'  => $id_proveedor,
            'entities'      => $entities,
        ));
    }
    /*
    *
    * CREAR PRESUPUESTO TIPO N.
    *
    */
    public function createAction(Request $request,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();
        
        //instancio la clase, asocio el formulario y obtengo los datos enviados por el usuario
        $entity  = new Presupuesto();
        $form = $this->createForm(new PresupuestoType(), $entity);
        $form->bind($request);  
       
        $bolivares = $entity->getMontoBs();
        
        $alert = 0;
        if($bolivares == NULL or $bolivares == 0)
        {
            $alert = 1;
        }

        //verifico el formulario
        if ($form->isValid()) 
        {
            if($alert == 0)
            {
                $tipo = 'N';

                //obtengo la disponibilidad en las diferentes monedas
                $disponibilidad = $entity->getMontoBs();
                $disponibilidad_dolares = $entity->getMontoDolares();
                $disponibilidad_euros = $entity->getMontoEuros();
                $id_prov = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id_proveedor);

                //seteo los valores
                $entity->setTipo($tipo);
                $entity->setIdProveedor($id_prov);
                $entity->setDisponibilidad($disponibilidad);
                $entity->setDisponibilidadDolares($disponibilidad_dolares);
                $entity->setDisponibilidadEuros($disponibilidad_euros);

                //inserto los datos en la BD
                $em->persist($entity);
                $em->flush();

                //envio a notificacion de que el registro fue creado
                $this->get('session')->getFlashBag()->add('notice', 'SE REGISTRO EXITOSAMENTE EL PRESUPUESTO');

                //envio a la vista
                return $this->redirect($this->generateUrl('presupuesto_show', array(
                                                'id' => $entity->getId(), 
                                                'id_proveedor' => $id_proveedor,)));
            }else
            {
                //envio la alerta de que no se creo el presupuesto
                $this->get('session')->getFlashBag()->add('alert', 'FORMULARIO NO VALIDO'); 
            }
        }    
        //envio a otra vista si el form no es válido
        return $this->render('ContenidosBundle:Presupuesto:new.html.twig', array(
            'entity'        => $entity,
            'id_proveedor'  => $id_proveedor,
            'form'          => $form->createView(),
        ));
    }

    /*
    *
    * FORMULARIO PARA CREAR PRESUPUESTO TIPO N.
    *
    */
    public function newAction($id_proveedor)
    {
        //instancio la clase y asocio el formulario
        $entity = new Presupuesto();
        $form   = $this->createForm(new PresupuestoType(), $entity);

        //envio a la vista
        return $this->render('ContenidosBundle:Presupuesto:new.html.twig', array(
            'entity'        => $entity,
            'id_proveedor'  => $id_proveedor,
            'form'          => $form->createView(),
        ));
    }

    /*
    *
    * DETALLES DE UN PRESUPUESTO TIPO N
    *
    */
    public function showAction($id,$id_proveedor)
    {

        $em = $this->getDoctrine()->getManager();

        //obtengo todos los datos de un presupuesto segun su iD
        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);
        $entity1 = $em->getRepository('ContenidosBundle:Presupuesto')->findByIdPresext($id);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
    
        $monto[0] = $entity->getMontoBs();
        $monto[1] = $entity->getMontoDolares();
        $monto[2] = $entity->getMontoEuros();

        if($monto[1] != NULL and $monto[2] == NULL)
        {
            $tipomoneda = 1;
        }elseif($monto[1] == NULL and $monto[2] != NULL)
        {
            $tipomoneda = 2;
        }elseif($monto[1] == NULL and $monto[2] == NULL)
        {
            $tipomoneda = 3;
        }

        $subtotal[0] = 0;
        $subtotal[1] = 0;
        $subtotal[2] = 0;

        foreach ($entity1 as $key) 
        {
            $subtot_bs[$key->getId()]=$key->getMontoBs();
            $subtot_dolares[$key->getId()]=$key->getMontoDolares();
            $subtot_euros[$key->getId()]=$key->getMontoEuros();
            
            $subtotal[0] = $subtotal[0] + $subtot_bs[$key->getId()];
            $subtotal[1] = $subtotal[1] + $subtot_dolares[$key->getId()];
            $subtotal[2] = $subtotal[2] + $subtot_euros[$key->getId()];   
        }

        $total[0] = $monto[0] + $subtotal[0];
        $total[1] = $monto[1] + $subtotal[1];
        $total[2] = $monto[2] + $subtotal[2];

        //envio a la vista
        return $this->render('ContenidosBundle:Presupuesto:show.html.twig', array(
            'entity'        => $entity,
            'tipomoneda'    => $tipomoneda,
            'subtotal'      => $subtotal,
            'total'         => $total,
            'id_proveedor'  => $id_proveedor,
            'delete_form'   => $deleteForm->createView(),        ));
    }

    /*
    *
    * FORMULARIO PARA EDITAR UN PRESUPUESTIPO TIPO N.
    *
    */
    public function editAction($id,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //obtengo los datos del presupuesto segun su ID
        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

        $dolares = $entity->getMontoDolares();
        $euros = $entity->getMontoEuros();

        if($dolares != NULL and $euros == NULL)
        {
            $tipomoneda = 1;
        }elseif($dolares == NULL and $euros != NULL)
        {
            $tipomoneda = 2;
        }elseif($dolares == NULL and $euros == NULL)
        {
            $tipomoneda = 3;
        }

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        //asocio clase al formulario
        $editForm = $this->createForm(new PresupuestoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        //envio a la vista
        return $this->render('ContenidosBundle:Presupuesto:edit.html.twig', array(
            'entity'        => $entity,
            'id_proveedor'  => $id_proveedor,
            'tipomoneda'    => $tipomoneda,
            'edit_form'     => $editForm->createView(),
            'delete_form'   => $deleteForm->createView(),
        ));
    }

    /*
    *
    * ACTUALIZAR UN PRESUPUESTO TIPO N.
    *
    */
    public function updateAction(Request $request,$id,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //obtengo los datos del Presupuesto segun ID
        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        $dolares = $entity->getMontoDolares();
        $euros = $entity->getMontoEuros();

        if($dolares != NULL and $euros == NULL)
        {
            $tipomoneda = 1;
            $disponibilidad[0] = $entity->getDisponibilidad();
            $disponibilidad[1] = $entity->getDisponibilidadDolares();
            $disponibilidad[2] = NULL;
        }elseif($dolares == NULL and $euros != NULL)
        {
            $tipomoneda = 2;
            $disponibilidad[0] = $entity->getDisponibilidad();
            $disponibilidad[1] = NULL;
            $disponibilidad[2] = $entity->getDisponibilidadEuros();
        }elseif($dolares == NULL and $euros == NULL)
        {
            $tipomoneda = 3;
            $disponibilidad[0] = $entity->getDisponibilidad();
            $disponibilidad[1] = NULL;
            $disponibilidad[2] = NULL;
        }     

        $tipo = 'N';
        //asocio $entity con el formulario y obtengo los datos enviados
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PresupuestoType(), $entity);
        $editForm->bind($request);

            //verifico el formulario
            if ($editForm->isValid())
            {                           
                //obtengo los datos del proveedor para setearlo xq es una clave foranea
                $id_prov = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id_proveedor);
                $entity->setIdProveedor($id_prov);

                //seteo el tipo de presupuesto "N"
                $entity->setTipo($tipo);

                //seteo la disponibilidad que se tenia
                $entity->setDisponibilidad($disponibilidad[0]);
                $entity->setDisponibilidadDolares($disponibilidad[1]);
                $entity->setDisponibilidadEuros($disponibilidad[2]);

                //inserto la info en la BD
                $em->persist($entity);
                $em->flush();

                //envio a notificacion de que el registro fue creado
                $this->get('session')->getFlashBag()->add('notice', 'SE EDITO EXITOSAMENTE EL PRESUPUESTO');

                //envio a la vista
                return $this->redirect($this->generateUrl('presupuesto_show', array(
                                                    'id'           => $id,
                                                    'id_proveedor' => $id_proveedor,)));
            }   

        return $this->render('ContenidosBundle:Presupuesto:edit.html.twig', array(
                                                                'entity'        => $entity,
                                                                'id_proveedor'  => $id_proveedor,
                                                                'tipomoneda'    => $tipomoneda,
                                                                'edit_form'     => $editForm->createView(),
                                                                'delete_form'   => $deleteForm->createView(),
                                                            ));
    }
    /*
    *
    * ELIMINAR UN PRESUPUESTO TIPO N.
    *
    */
    public function deleteAction($id,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();
        
        $tipo = 'N';
        //query para que muestre solo los presupuestos tipo N (no deben ser extension)
        $dql = "select p from ContenidosBundle:Presupuesto p 
                where p.idProveedor=:id_proveedor and p.tipo=:tipo";
        $consulta = $em->createQuery($dql)->setParameters(
                                                            array(
                                                                    'id_proveedor'=> $id_proveedor, 
                                                                    'tipo' => $tipo,
                                                                 )
                                                         );
        $entities = $consulta->getResult();

        //obtengo datos del presupuesto
        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        $dql   = "SELECT pre FROM ContenidosBundle:Presupuesto pre
                    where pre.idPresext= :id";
        $query = $em->createQuery($dql)->setParameter('id',$id);
        $pr_ext=$query->getResult();

        $dql   = "SELECT cont FROM ContenidosBundle:Contratacion cont
                    where cont.idPresupuesto= :id";
        $query = $em->createQuery($dql)->setParameter('id',$id);
        $contr=$query->getResult();


        if ($pr_ext == NULL and $contr == NULL)
        {
            //ELIMINO LOS DATOS DE LA CONTRATACION SI NO TENGO PAGOS ASOCIADOS
            $em->remove($entity);
            $em->flush();
            
            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE ELIMINO EL PRESUPUESTO EXITOSAMENTE');
        }elseif ($pr_ext == NULL and $contr != NULL)
        {
            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('alert', 'EL PRESUPUESTO TIENE CONTRATACIONES ASOCIADAS');
        }elseif ($pr_ext != NULL and $contr == NULL)
        {
            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('alert', 'EL PRESUPUESTO TIENE EXTENSIONES DE PRESUPUESTO ASOCIADAS');  
        }elseif ($pr_ext != NULL and $contr != NULL)
        {
            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('alert', 'EL PRESUPUESTO TIENE CONTRATACIONES Y ESTENSIONES DE PRESUPUESTO ASOCIADAS');
 
        }


        //ENVIO A LA VISTA SHOW PARA MOSTRAR PAGO CREADO
        return $this->redirect($this->generateUrl('presupuesto', array(
                                                                        'entities'         => $entities,
                                                                        'id_proveedor'     => $id_proveedor,
                                                                        )));
    }


#########################################################################################################
#########################################################################################################
#
#                                       EXTENSION DE PRESUPUESTO
#
#########################################################################################################
#########################################################################################################

    /*
    *
    * LISTADO DE PRESUPUESTOS TIPO E.
    *
    */
    public function extensionindexAction($id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        $tipo = 'E';

        //query para seleccionar solo los presupuestos que estienden de otro presupuesto
        $dql = "select p from ContenidosBundle:Presupuesto p 
                where p.tipo=:tipo and p.idPresext=:id_presupuesto";
        $consulta = $em->createQuery($dql)->setParameters(
                                                            array(
                                                                    'id_presupuesto'    => $id_presupuesto, 
                                                                    'tipo'              => $tipo,
                                                                 )



                                                         );
        $entities = $consulta->getResult();
        
        //envio a la vista
        return $this->render('ContenidosBundle:Presupuesto:indexextension.html.twig', array(
            'entities'      => $entities,
            'id_presupuesto'=>$id_presupuesto,
            'id_proveedor'  =>$id_proveedor,
        ));

    }

    /*
    *
    * DETALLES DE PRESUPUESTO TIPO E.
    *
    */
    public function extensionshowAction($id, $id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //obtengo los datos del presupuesto segun ID
        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

        //obtengo los datos del presupuesto al que el presupuesto editado extiende
        $entity1 = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);

        $dolares=$entity1->getMontoDolares();
        $euros=$entity1->getMontoEuros();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //envio a la vista
        return $this->render('ContenidosBundle:Presupuesto:showextension.html.twig', array(
            'entity'            => $entity,
            'id_proveedor'      => $id_proveedor,
            'id_presupuesto'    => $id_presupuesto,
            'dolares'           => $dolares,
            'euros'             => $euros,
            'delete_form'       => $deleteForm->createView(),        
            ));
    }

    /*
    *
    * EDITAR UN PRESUPUESTO TIPO E.
    *
    */
    public function extensioneditAction($id, $id_presupuesto, $id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //obtengo datos de presupuesto segun ID
        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);


        //obtengo los datos del presupuesto al que el presupuesto editado extiende
        $entity1 = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        //asocio la clase al formulario 
        $editForm = $this->createForm(new PresupuestoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        //envio a la vista
        return $this->render('ContenidosBundle:Presupuesto:editextension.html.twig', array(
            'entity'        => $entity,
            'id_proveedor'  =>$id_proveedor,
            'id_presupuesto'=> $id_presupuesto,
            'edit_form'     => $editForm->createView(),
            'delete_form'   => $deleteForm->createView(),
        ));
    }

    /*
    *
    * ACTUALIZAR UN PRESUPUESTO TIPO E.
    *
    */
    public function extensionupdateAction(Request $request, $id, $id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //obtengo los datos del presupuesto al que el presupuesto editado extiende
        $entity1 = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);

        //obtengo los datos del presupuesto editado
        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);
   
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        //obtengo los datos que se enviaron a traves del formulario
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PresupuestoType(), $entity);
        $editForm->bind($request);

        
            //verifico el formulario
            if($editForm->isValid())
            {
                $tipo= 'E';
                //obtengo los datos del proveedor
                $id_prov = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id_proveedor);

                //seteo los valores
                $entity->setTipo($tipo);
                $entity->setIdPresext($id_presupuesto);
                $entity->setIdProveedor($id_prov);
                
                //inserto los datos en la BD
                $em->persist($entity);
                $em->flush();

                //envio a notificacion de que el registro fue creado
                $this->get('session')->getFlashBag()->add('notice', 'SE REGISTRO EXITOSAMENTE LA EXTENSION DE PRESUPUESTO');

                //envio a la vista
                return $this->redirect($this->generateUrl('presupuesto_extensionshow', array(
                                                    'id'             => $entity->getId(), 
                                                    'id_proveedor'   => $id_proveedor,
                                                    'id_presupuesto' => $id_presupuesto,
                                                    )));

            }
        //envio a la vista
        return $this->render('ContenidosBundle:Presupuesto:editextension.html.twig', array(
            'entity'        => $entity,
            'id_proveedor'  =>$id_proveedor,
            'id_presupuesto'=> $id_presupuesto,
            'edit_form'     => $editForm->createView(),
            'delete_form'   => $deleteForm->createView(),
        ));

    }

    /*
    *
    * FORMULARIO CREAR UN PRESUPUESTO TIPO E.
    *
    */
    public function extensionnewAction($id_presupuesto,$id_proveedor)
    {
         $em = $this->getDoctrine()->getManager();

        //obtengo los datos del presupuesto al que el presupuesto editado extiende
        $entity1 = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);

        $dolares=$entity1->getMontoDolares();
        $euros=$entity1->getMontoEuros();

        //instancio la clase y asocio el formulario
        $entity = new Presupuesto();
        $form   = $this->createForm(new PresupuestoType(), $entity);

        //envio a la vista
        return $this->render('ContenidosBundle:Presupuesto:newextension.html.twig', array(
            'entity'        => $entity,
            'id_proveedor'  => $id_proveedor,
            'id_presupuesto'=> $id_presupuesto,
            'dolares'       => $dolares,
            'euros'         => $euros,
            'form'          => $form->createView(),
        ));  

    }

    /*
    *
    * CREAR UN PRESUPUESTO TIPO E.
    *
    */
    public function extensioncreateAction(Request $request,$id_presupuesto, $id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //instancio la clase, asocio el formulario y obtengo los datos que se enviaron
        $entity  = new Presupuesto();
        $form = $this->createForm(new PresupuestoType(), $entity);
        $form->bind($request);

        $monto[0] = $entity->getMontoBs();
        $monto[1] = $entity->getMontoDolares();
        $monto[2] = $entity->getMontoEuros();

        if($monto[1] != NULL and $monto[2] == NULL)
        {
            $tipomoneda = 1;
        }elseif($monto[1] == NULL and $monto[2] != NULL)
        {
            $tipomoneda = 2;
        }elseif($monto[1] == NULL and $monto[2] == NULL)
        {
            $tipomoneda = 3;
        }


        $alert = 0;
        if ($monto[0] != NULL or $monto[0] != 0)
        {
            if ($tipomoneda == 1)
            {
                if ($monto[1] == NULL or $monto[1] == 0)
                {
                    $alert = 1;
                    $mensaje = "INGRESE EL MONTO EN DOLARES";
                }
            }elseif($tipomoneda == 2)
            {
                if ($monto[2] == NULL or $monto[2] == 0)
                {
                    $alert = 1;
                    $mensaje = "INGRESE EL MONTO EN EUROS";
                }
            }
        }else
        {
            $alert = 1;
            $mensaje = "INGRESE EL MONTO EN BOLIVARES";
        }

        if($alert == 0)
        {
            //verifico el formulario
            if ($form->isValid()) 
            {         
                //obtengo los datos del presupuesto al que extiende
                $entity1 = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
                $disp_act[0]= $entity1->getDisponibilidad();
                $disp_act[1]= $entity1->getDisponibilidadDolares();
                $disp_act[2]= $entity1->getDisponibilidadEuros();         
                
                //calculo la disponibilidad y la seteo
                $disp_act[0] = $disp_act[0] + $monto[0];
                $disp_act[1] = $disp_act[1] + $monto[1];
                $disp_act[2] = $disp_act[2] + $monto[2];

                $entity1->setDisponibilidad($disp_act[0]);
                $entity1->setDisponibilidadDolares($disp_act[1]);
                $entity1->setDisponibilidadEuros($disp_act[2]);

                $tipo = 'E';
                //seteo el tipo de presupuesto y el id del presupuesto al que extiende
                $entity->setTipo($tipo);
                $entity->setIdPresext($id_presupuesto);

                //obtengo y seteo el id del proveedor
                $id_prov = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id_proveedor);
                $entity->setIdProveedor($id_prov);
                
                //inserto la informacion en la BD
                $em->persist($entity);
                $em->flush();

                //envio a notificacion de que el registro fue creado
                $this->get('session')->getFlashBag()->add('notice', 'SE REGISTRO EXITOSAMENTE LA EXTENSION DE PRESUPUESTO');
                //envio a la vista
                return $this->redirect($this->generateUrl('presupuesto_extensionshow', array(
                                                    'id'            => $entity->getId(), 
                                                    'id_proveedor'  => $id_proveedor,
                                                    'id_presupuesto'=> $id_presupuesto,
                                                    )));
            }
        }else
        {
            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('alert', $mensaje);
        }
       //envio a la vista
        return $this->render('ContenidosBundle:Presupuesto:newextension.html.twig', array(
                                                                        'entity'        => $entity,
                                                                        'id_proveedor'  => $id_proveedor,
                                                                        'id_presupuesto'=> $id_presupuesto,
                                                                        'dolares'       => $dolares,
                                                                        'euros'         => $euros,
                                                                        'form'          => $form->createView(),
        ));  
    }

    /*
    *
    * ELIMINAR UN PRESUPUESTO TIPO E.
    *
    */
    public function extensiondeleteAction($id,$id_presupuesto, $id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();    

        //obtengo los datos del presupuesto tipo E
        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

        //obtengo los datos del presupuesto tipo N
        $entity1 = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
        $disp_ant[0]= $entity1->getDisponibilidad();
        $disp_ant[1]= $entity1->getDisponibilidadDolares();
        $disp_ant[2]= $entity1->getDisponibilidadEuros();

        //obtengo el monto
        $monto[0] = $entity->getMontoBs();
        $monto[1] = $entity->getMontoDolares();
        $monto[2] = $entity->getMontoEuros();        

        $disp_act[0] = $disp_ant[0] - $monto[0];
        $disp_act[1] = $disp_ant[1] - $monto[1];
        $disp_act[2] = $disp_ant[2] - $monto[2];

        $entity1->setDisponibilidad($disp_act[0]);
        $entity1->setDisponibilidadDolares($disp_act[1]);
        $entity1->setDisponibilidadEuros($disp_act[2]);

        //ELIMINO EL PRESUPUESTO
        $em->remove($entity);
        $em->flush();

        $tipo = 'E';
        //query para seleccionar solo los presupuestos que estienden de otro presupuesto
        $dql = "select p from ContenidosBundle:Presupuesto p 
                where p.tipo=:tipo and p.idPresext=:id_presupuesto";
        $consulta = $em->createQuery($dql)->setParameters(
                                                            array(
                                                                    'id_presupuesto'    => $id_presupuesto, 
                                                                    'tipo'              => $tipo,
                                                                 )
                                                         );
        $entities = $consulta->getResult();
        
        //envio a notificacion de que el registro fue creado
        $this->get('session')->getFlashBag()->add('notice', ' SE ELIMINARON LOS DATOS DE LA EXTENSION DE PRESUPUESTO');
            


        //envio a la vista
        return $this->redirect($this->generateUrl('presupuesto_extensionindex', array(
                                                                            'entities'         => $entities,
                                                                            'id_proveedor'     => $id_proveedor,
                                                                            'id_presupuesto'   => $id_presupuesto,
                                                                            )));
    }

#########################################################################################################
#########################################################################################################
#
#                                       DISPONIBILIDAD PRESUPUESTARIA
#
#########################################################################################################
#########################################################################################################
    
    /*
    *
    * FORMULARIO PARA LA DISPONIBILIDAD DE UN PRESUPUESTO
    *
    */
    public function disponibilidadhomeAction()
    {
        $em = $this->getDoctrine()->getManager();

        //creo el formualrio
           $form = $this->createFormBuilder()    
                ->add('nombre', 'entity', array(
                                                'class'     => 'ContenidosBundle:Datosproveedor',
                                                'property'  => 'nombre',
                                                'empty_value' => 'Seleccione...',
                                                'multiple'  => false,
                                                ))
            ->getForm();

        //envio a la vista
        return $this->render('ContenidosBundle:Presupuesto:disponibilidadhome.html.twig', array(
            'form'   => $form->createView(),
        ));  
    }

    /*
    *
    * FUNCION PARA OBTENER LA DISPONIBILIDAD DE UN PRESUPUESTO
    *
    */
    public function disponibilidadshowAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //Obtengo los datos del formulario AJAX
        $formulario = $request->request->all();
        $formulario = $formulario['form'];
        $proveedor = $formulario['nombre'];
        $descripcion = $formulario['descripcion'];


        //Obtengo los datos del proveedor segun los datos del formulario
        $prov = $em->getRepository('ContenidosBundle:Datosproveedor')->find($proveedor);
        $nombre= $prov->getNombre();

        //Obtengo los datos del presupuesto tipo N segun la descripción
        $pres = $em->getRepository('ContenidosBundle:Presupuesto')->find($descripcion);
        $presn= $pres->getDescripcion();

        //Obtengo los montos en Bs, Dolares y Euros para determinar los totales
        $totalbspres = $pres->getMontoBs();
        $totaleurospres = $pres->getMontoEuros();
        $totaldolarespres = $pres->getMontoDolares();

        //Obtengo los datos de los presupuestos asociados al presupuesto tipo N
        $tipo='E';          
        $dql   = "SELECT pre FROM ContenidosBundle:Presupuesto pre 
                    where pre.idPresext= :id 
                    and pre.tipo like :tipo";
        $query = $em->createQuery($dql)->setParameters(
                                                        array(
                                                                'id'=> $descripcion, 
                                                                'tipo' => $tipo,
                                                              )
                                                      );
        $presupuesto=$query->getResult();

        //calculo los totales del los presupuestos en Bs, Dolares y Euros
        foreach ($presupuesto as $key) 
        {
                
            $prese[$key->getId()]=$key->getDescripcion();

            $prese[$key->getId()]=$key->getMontoBs();
            $totalbspres = $totalbspres+$prese[$key->getId()];

            $prese[$key->getId()]=$key->getMontoEuros();
            $totaleurospres = $totaleurospres+$prese[$key->getId()];

            $prese[$key->getId()]= $key->getMontoDolares();
            $totaldolarespres = $totaldolarespres+ $prese[$key->getId()];
        }  


        //Obtengo los datos de las contrataciones asociadas al presupuesto tipo N
        $sql = "SELECT cont FROM ContenidosBundle:Contratacion cont
                where cont.idPresupuesto= :presn";
        $consulta = $em->createQuery($sql)->setParameter('presn',$descripcion);
        $contratacion = $consulta->getResult();


        //calculo los totales de las contrataciones y el tipo de moneda

        if(!empty($contratacion))
        {
            $totalbscontr = 0;
            $totalmecontr = 0;
            foreach ($contratacion as $key) 
            {
                $contr[$key->getId()]=$key->gettipoMoneda();
                $tipomoneda= $contr[$key->getId()];

                $contr[$key->getId()]=$key->getMontoMe();
                $totalmecontr=$totalmecontr+$contr[$key->getId()];
            
                $contr[$key->getId()]=$key->getMontoBs();
                $totalbscontr=$totalbscontr+$contr[$key->getId()];    
            }  
        }else
        {
            $totalbscontr = 0;
            $totalmecontr = 0;
            $tipomoneda = 0;
        }
        
        //calculo la disponibilidad en Bs y en Dolares o Euros segun corresponda
        $dispbs = $totalbspres - $totalbscontr;
        if ($totaleurospres == 0)
        {
            $dispdolares = $totaldolarespres - $totalmecontr;
            $dispeuros = 0;
            
        }else
        {
            $dispeuros = $totaleurospres - $totalmecontr;
            $dispdolares = 0;
        }

        //envio a la vista
        return $this->render('ContenidosBundle:Presupuesto:disponibilidadshow.html.twig', array(
            'nombre'            => $nombre,
            'pres'              => $pres,
            'presupuesto'       => $presupuesto,
            'totalbspres'       => $totalbspres,
            'totaleurospres'    => $totaleurospres,
            'totaldolarespres'  => $totaldolarespres,
            'contratacion'      => $contratacion,
            'tipomoneda'        => $tipomoneda,
            'totalmecontr'      => $totalmecontr,
            'totalbscontr'      => $totalbscontr,
            'dispbs'            => $dispbs,
            'dispdolares'       => $dispdolares,
            'dispeuros'         => $dispeuros,

        ));        

    }

#########################################################################################################
#########################################################################################################
#
#                                       CREATE DELETE FORMULARIO
#
#########################################################################################################
#########################################################################################################

    /**
     * Creates a form to delete a Presupuesto entity by id.
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