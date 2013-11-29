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
       
        //verifico el formulario
        if ($form->isValid()) 
        {
            //obtengo disponibilidad y la seteo
            $disponibilidad = $entity->getMontoBs();
            $entity->setDisponibilidad($disponibilidad);
            
            //seteo el tipo de moneda
            $tipo = 'N';
            $entity->setTipo($tipo);

            //seteo el id del proveedor
            $id_prov = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id_proveedor);
            $entity->setIdProveedor($id_prov);

            //inserto los datos en la BD
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', 'SE REGISTRO EXITOSAMENTE EL PRESUPUESTO');

            //envio a la vista
            return $this->redirect($this->generateUrl('presupuesto_show', array(
                                                'id' => $entity->getId(), 
                                                'id_proveedor' => $id_proveedor,)));
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

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //envio a la vista
        return $this->render('ContenidosBundle:Presupuesto:show.html.twig', array(
            'entity'        => $entity,
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

        //obtengo el monto actual y la disponibilidad antes de editar
        $monto_ant = $entity->getMontoBs();
        $disp_actual = $entity->getDisponibilidad();


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
            'monto_ant'     => $monto_ant,
            'disp_actual'   => $disp_actual,
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
    public function updateAction(Request $request,$id,$id_proveedor,$monto_ant,$disp_actual)
    {
        $em = $this->getDoctrine()->getManager();

        //obtengo los datos del Presupuesto segun ID
        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        $tipo = 'N';
        //asocio $entity con el formulario y obtengo los datos enviados
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PresupuestoType(), $entity);
        $editForm->bind($request);

        //verifico el formulario
        if ($editForm->isValid())
        {
            //obtengo el monto actual
            $monto_act = $entity->getMontoBs();

            //calculo la diferencia del monto actual y del monto anterior
            $dife = $monto_act - $monto_ant;

            //calculo la nueva disponibilidad tomando en consideracion la diferencia
            $disp_actual = $disp_actual + $dife;
                        
            //obtengo los datos del proveedor para setearlo xq es una clave foranea
            $id_prov = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id_proveedor);
            $entity->setIdProveedor($id_prov);

            //seteo el tipo de presupuesto "N"
            $entity->setTipo($tipo);

            //seteo la disponibilidad
            $entity->setDisponibilidad($disp_actual);

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

        //envio a otra vista si el formulario no es valido
        return $this->render('ContenidosBundle:Presupuesto:edit.html.twig', array(
                                                                            'id'            => $id,
                                                                            'id_proveedor'  => $id_proveedor,
                                                                            'editForm'      => $editForm,
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

        $dolares=$entity1->getMontoDolares();
        $euros=$entity1->getMontoEuros();

        //obtengo el monto anterior
        $monto_ant= $entity->getMontoBs();

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
            'monto_ant'     => $monto_ant,
            'dolares'       => $dolares,
            'euros'         => $euros,
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

        //tengo el monto antes de actualizarse
        $monto_ant= $entity->getMontoBs();
   
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Presupuesto entity.');
        }

        //obtengo los datos que se enviaron a traves del formulario
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PresupuestoType(), $entity);
        $editForm->bind($request);

        //tengo el monto actual
        $monto_act= $entity->getMontoBs();
        
        //calculo la diferencia
        $dife = $monto_act - $monto_ant;

        //traigo la disponibilidad que se encuentra en el presupuesto del que extiende
        $disp_actual= $entity1->getDisponibilidad();

        //calculo la disponibilidad actual
        $disp_actual = $disp_actual + $dife;
        
        //verifico el formulario
        if($editForm->isValid())
        {
            
            $tipo= 'E';
            //obtengo los datos del proveedor
            $id_prov = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id_proveedor);

            //seteo la disponibilidad
            $entity1->setDisponibilidad($disp_actual);

            //seteo el tipo de presupuesto
            $entity->setTipo($tipo);

            //seteo el id del presupuesto al que extiende
            $entity->setIdPresext($id_presupuesto);

            //seteo el id del proveedor
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

        //envio a otra vista si el formulario no es válido
        return $this->render('ContenidosBundle:Presupuesto:editextension.html.twig', array(
            'entity'            => $entity,
            'id_proveedor'      =>$id_proveedor,
            'id_presupuesto'    => $id_presupuesto,
            'edit_form'         => $editForm->createView(),
            'delete_form'       => $deleteForm->createView(),
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

        //verifico el formulario
        if ($form->isValid()) 
        {
         
            //obtengo los datos del presupuesto al que extiende
            $entity1 = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
            $disp_actual= $entity1->getDisponibilidad();

            //obtengo el monto
            $monto = $entity->getMontoBs();
            
            //calculo la disponibilidad y la seteo
            $disp_actual = $disp_actual + $monto;
            $entity1->setDisponibilidad($disp_actual);

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

        //envio a otra vista si el form no es valido
        return $this->render('ContenidosBundle:Presupuesto:newextension.html.twig', array(
            'entity'        => $entity,
            'id_proveedor'  => $id_proveedor,
            'id_presupuesto'=> $id_presupuesto,
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

        $entity = $em->getRepository('ContenidosBundle:Presupuesto')->find($id);

        //ELIMINO LOS DATOS DE LA CONTRATACION SI NO TENGO PAGOS ASOCIADOS
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