<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

//ASOCIO LAS ENTIDADES QUE SE UTILIZARAN 
use Frontend\ContenidosBundle\Entity\DetalleTipoproveedor;
use Frontend\ContenidosBundle\Entity\Diasentrega;
use Frontend\ContenidosBundle\Entity\Analista;
use Frontend\ContenidosBundle\Entity\Unidadejecutora;
use Frontend\ContenidosBundle\Entity\Unidadadministrativa;
use Frontend\ContenidosBundle\Entity\Unidadsolicitante;

//ASOCIO LOS FORMULARIOS QUE SE NECESITARAN
use Frontend\ContenidosBundle\Form\DetalleType;
use Frontend\ContenidosBundle\Form\DiasType;
use Frontend\ContenidosBundle\Form\AnalistaType;
use Frontend\ContenidosBundle\Form\EjecutoraType;
use Frontend\ContenidosBundle\Form\AdministrativaType;
use Frontend\ContenidosBundle\Form\SolicitanteType;

/*
*
* CONTROLADOR PARA EDITAR LOS DATOS DE TABLAS SECUNDARIAS
*
*/
class editardatosController extends Controller
{
    ##############################################################################################
    #                                   TABLA DETALLETIPOPROVEEDOR
    ##############################################################################################
	/*
    *
    * MUESTRA EL DETALLE DE TODOS LOS TIPO DE PROVEEDOR.
    *
    */
    public function indexdetalleAction()
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE TODOS LOS DETALLES DE TIPO PROVEEDOR 
        $entities = $em->getRepository('ContenidosBundle:DetalleTipoproveedor')->findAll();

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:indexdetalle.html.twig', array(
            'entities' => $entities,
        ));
    }

    /*
    *
    * FUNCION QUE INSERTA LOS DATOS DE UN NUEVO DETALLE DE TIPO PROVEEDOR.
    *
    */
    public function createdetalleAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //INSTANCIO LA CLASE DETALLETIPOPROVEEDOR()
        $entity  = new DetalleTipoproveedor();

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $form = $this->createForm(new DetalleType(), $entity);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form->bind($request);

        //VERIFICO SI EL FORMULARIO ES VALIDO
        if($form->isValid())
        {
            //INSERTO LOS DATOS EN LA BD   
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE CREO EXITOSAMENTE EL DETALLE DE TIPO PROVEEDOR');

            //RETORNO A LA VISTA
            return $this->redirect($this->generateUrl('indexdetalle'));
        }
        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:indexdetalle.html.twig', array(
            'entities' => $entities,
        ));
    }

    /*
    *
    * FUNCION QUE MUESTRA EL FORMULARIO PARA CREAR DETALLE DE TIPO DE PROVEEDOR
    *
    */
    public function newdetalleAction()
    {
        //INSTANCIO LA CLASE DETALLETIPOPROVEEDOR()
        $entity = new DetalleTipoproveedor();

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $form   = $this->createForm(new DetalleType(), $entity);

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:newdetalle.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /*
    *
    * MUESTRA EL FORMULARIO PARA EDITAR EL DETALLE DE TIPO DE PROVEEDOR
    *
    */
    public function editdetalleAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE UN DETALLE DE TIPO DE PROVEEDOR SEGUN ID
        $entity = $em->getRepository('ContenidosBundle:DetalleTipoproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DetalleTipoproveedor entity.');
        }

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $editForm = $this->createForm(new DetalleType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:editdetalle.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /*
    *
    * FUNCION PARA INSERTAR LOS DATOS EN LA TABLA DETALETIPOPROVEEDOR
    *
    */
    public function updatedetalleAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO DATOS DE DETALLETIPOPROVEEDOR SEGUN ID
        $entity = $em->getRepository('ContenidosBundle:DetalleTipoproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DetalleTipoproveedor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $editForm = $this->createForm(new DetalleType(), $entity);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $editForm->bind($request);

        //VERIFICO QUE EL FORMULARIO SEA VALIDO
        if($editForm->isValid())
        {
            //INSERTO LOS DATOS EN LA BD
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE EDITO EXITOSAMENTE EL DETALLE DE TIPO PROVEEDOR');

            //ENVIO A LA VISTA
            return $this->redirect($this->generateUrl('editdetalle', array('id' => $id)));
        }

        //ENVIO A LA OTRA VISTA SI NO ES VALIDO
        return $this->render('ContenidosBundle:Editar:editdetalle.html.twig', array(
                                                        'entity' => $entity,
                                                        'edit_form' => $editForm->createView(),
                                                        'delete_form' => $deleteForm->createView(),
            ));

    }

    /*
    *
    * FUNCION PARA ELIMINDAR DATOS EN LA TABLA DETALETIPOPROVEEDOR
    *
    */
    public function deletedetalleAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        //OBTENGO LOS DATOS DEL DETALLE DEL TIPO DE PROVEEDOR
        $entity = $em->getRepository('ContenidosBundle:DetalleTipoproveedor')->find($id);

        if (!$entity) 
        {
            throw $this->createNotFoundException('Unable to find DetalleTipoproveedor entity.');
        }

        //ELIMINO LOS DATOS DE LA BD
        $em->remove($entity);
        $em->flush();

        //RETORNO A LA VISTA
        return $this->redirect($this->generateUrl('indexdetalle'));
    }
    
    ##############################################################################################
    #                                   TABLA DIASENTREGA
    ##############################################################################################

    /*
    *
    * MUESTRA TODOS LOS DATOS EN LA TABLA DIASENTREGA
    *
    */
    public function indexdiasAction()
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO TODOS LOS DATOS DE LA TABLA DIASENTREGA
        $entities = $em->getRepository('ContenidosBundle:Diasentrega')->findAll();

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:indexdias.html.twig', array(
            'entities' => $entities,
        ));
    }

    public function creatediasAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //INSTANCIO LA CLASE DIASENTREGA()
        $entity  = new Diasentrega();

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form = $this->createForm(new DiasType(), $entity);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form->bind($request);

        //VERIFICO SI EL FORMULARIO ES VALIDO
        if($form->isValid())
        {
            
            //INSERTO LOS DATOS EN LA BD
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE CREO EXITOSAMENTE EL DIA DE ENTREGA');

            //ENVIO A LA VISTA
            return $this->redirect($this->generateUrl('indexdias', array('id' => $entity->getId())));
        }

        //ENVIO A OTRA VISTA SI EL FORMULARIO NO ES VALIDO
        return $this->render('ContenidosBundle:Editar:newdias.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
        
    }

    /**
     * MUESTRA EL FORMULARIO PARA CREAR NUEVO DIA DE ENTREGA
     *
     */
    public function newdiasAction()
    {

        //INSTANCIO LA CLASE DIASENTREGA
        $entity = new Diasentrega();
        
        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form   = $this->createForm(new DiasType(), $entity);

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:newdias.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * FUNCION PARA MOSTRAR FORMULARIO DE EDITAR DIAS DE ENTREGA.
     *
     */
    public function editdiasAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE LA TABLA DIAS DE ENTREGA SEGUN ID
        $entity = $em->getRepository('ContenidosBundle:Diasentrega')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Diasentrega entity.');
        }

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $editForm
        $editForm = $this->createForm(new DiasType(), $entity);

        $deleteForm = $this->createDeleteForm($id);

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:editdias.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /*
    *
    * FUNCION PARA INSERTAR REGISTROS EN ENTIDAD DIASENTREGA
    *
    */
    public function updatediasAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE DIAS DE ENTREGA SEGUN ID
        $entity = $em->getRepository('ContenidosBundle:Diasentrega')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Diasentrega entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $editForm
        $editForm = $this->createForm(new DiasType(), $entity);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $editForm->bind($request); 

        //VERIFICO SI EL FORMULARIO ES VALIDO
        if($editForm->isValid())
        {
            //INSERTO LOS DATOS EN LA BD
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE EDITO EXITOSAMENTE EL DIA DE ENTREGA');

            //ENVIO A LA VISTA
            return $this->redirect($this->generateUrl('indexdias', array('id' => $id)));
        }

        //ENVIO A OTRA VISTA SI EL FORMULARIO NO ES VALIDO
        return $this->render('ContenidosBundle:Editar:editdias.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
        
    }

    /*
    *
    * FUNCION PARA ELIMINAR REGISTROS EN ENTIDAD DIASENTREGA
    *
    */
    public function deletediasAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE LOS DIAS DE ENTREGA SEGUN ID
        $entity = $em->getRepository('ContenidosBundle:Diasentrega')->find($id);

        if (!$entity) 
        {
            throw $this->createNotFoundException('Unable to find Diasentrega entity.');
        }

        
        //INSERTO LOS DATOS EN LA BD
        $em->remove($entity);
        $em->flush();
    
        //ENVIO A LA VISTA
        return $this->redirect($this->generateUrl('indexdias'));
    }

    ##############################################################################################
    #                                   TABLA ANALISTA
    ##############################################################################################

    /*
    *
    * FUNCION PARA MOSTRAR REGISTROS DE ENTIDAD ANALISTA
    *
    */
    public function indexanalistaAction()
    {
        $em = $this->getDoctrine()->getManager();

        //ON¿BTENGO TODOS LOS DATOS DE ENTIDAD ANALISTA
        $entities = $em->getRepository('ContenidosBundle:Analista')->findAll();

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:indexanalista.html.twig', array(
            'entities' => $entities,
        ));
    }

    /*
    *
    * FUNCION PARA CREAR REGISTROS DE ENTIDAD ANALISTA
    *
    */
    public function createanalistaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //INSTANCIO LA CLASE ANALISTA
        $entity  = new Analista();

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form = $this->createForm(new AnalistaType(), $entity);

        //OBTENGO RESULTADOS DE FORMULARIO 
        $form->bind($request);

        //VERIFICO SI EL FORMULARIO ES VALIDO
        if($form->isValid())
        {
            //INSERTO LOS DATOS EN LA BD
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE CREO EXITOSAMENTE EL ANALISTA');

            //ENVIO A LA VISTA
            return $this->redirect($this->generateUrl('indexanalista', array('id' => $entity->getId())));
        }
        //ENVIO A OTRA VISTA SI EL FORMULARIO NO ES VALIDO
        return $this->render('ContenidosBundle:Editar:newanalista.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /*
    *
    * FUNCION PARA MOSTRAR FORMUARIO DE NUEVO ANALISTA.
    *
    */
    public function newanalistaAction()
    {
        //INSTANCIO LA CLASE ANALISTA
        $entity = new Analista();

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form   = $this->createForm(new AnalistaType(), $entity);

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:newanalista.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /*
    *
    * FUNCION PARA MOSTRAR FORMULARIO DE EDITAR ANALISTA.
    *
    */
    public function editanalistaAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DEL ANALISTA SEGUN ID
        $entity = $em->getRepository('ContenidosBundle:Analista')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Analista entity.');
        }

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $editForm 
        $editForm = $this->createForm(new AnalistaType(), $entity);

        $deleteForm = $this->createDeleteForm($id);

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:editanalista.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /*
    *
    * FUNCION PARA ACTUALIZAR LOS DATOS DE LOS ANALISTAS
    *
    */
    public function updateanalistaAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE LA TABLA ANALISTA SEGUN ID
        $entity = $em->getRepository('ContenidosBundle:Analista')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Analista entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $editForm 
        $editForm = $this->createForm(new AnalistaType(), $entity);

        //OBTENGO RESULTADOS DE FORMULARIO 
        $editForm->bind($request);

        //VERIFICO SI EL FORMULARIO ES VALIDO
        if($editForm->isValid())
        {
            //INSERTO LOS VALORES EN LA BD
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE EDITO EXITOSAMENTE EL ANALISTA');

            //ENVIO A LA VISTA
            return $this->redirect($this->generateUrl('editanalista', array('id' => $id)));    
        }
        //ENVIO A OTRA VISTA SI EL FORMULARIO NO ES VALIDO
        return $this->render('ContenidosBundle:Editar:editanalista.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /*
    *
    * FUNCION PARA ELIMINAR DATOS DE LOS ANALISTAS
    *
    */
    public function deleteanalistaAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DEL ANALISTA SEGUN  ID
        $entity = $em->getRepository('ContenidosBundle:Analista')->find($id);
    
        if (!$entity) 
        {
            throw $this->createNotFoundException('Unable to find Analista entity.');
        }

            //ELIMINO LOS DATOS DE LA BD
            $em->remove($entity);
            $em->flush();
        
        //ENVIO A LA VISTA
        return $this->redirect($this->generateUrl('indexanalista'));
    }



    ##############################################################################################
    #                                   TABLA UNIDADEJECUTIVA
    ##############################################################################################

    /*
    *
    * FUNCION PARA MOSTRAR TODAS LAS UNIDADES EJECUTORAS
    *  
    *
    */
    public function indexejecutoraAction()
    {

        $em = $this->getDoctrine()->getManager();

        //OBTENGO TODOS LOS DATOS DE LAS UNIDADES EJECUTORAS
        $entities = $em->getRepository('ContenidosBundle:Unidadejecutora')->findAll();

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:indexejecutora.html.twig', array(
            'entities' => $entities,
        ));
    }


    /*
    *
    * MUESTRA EL FORMULARIO PARA EDITAR EL REGISTRO
    *
    */
    public function editejecutoraAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE LA UNIDAD EJECUTORA SEGUN ID
        $entity = $em->getRepository('ContenidosBundle:Unidadejecutora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unidadejecutora entity.');
        }

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $editForm 
        $editForm = $this->createForm(new EjecutoraType(), $entity);

        $deleteForm = $this->createDeleteForm($id);

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:editejecutora.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /*
    *
    * FUNCION PARA INSERTAR LOS DATOS EN LA TABLA UNIDADEJECUTORA DESPUES DE EDITARLOS
    *
    */
    public function updateejecutoraAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE LA UNIDAD EJECUTORA SEGUN ID
        $entity = $em->getRepository('ContenidosBundle:Unidadejecutora')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unidadejecutora entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $editForm 
        $editForm = $this->createForm(new EjecutoraType(), $entity);

        //OBTENGO LOS DATOS DEL FORMULARIO 
        $editForm->bind($request);

        //VERIFICO SI EL FORMULARIO ES VALIDO
        if($editForm->isValid())
        {

            //INSERTO LA INFO EN LA ENTIDAD
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE EDITO EXITOSAMENTE LA UNIDAD EJECUTORA');

            //RETORNO A LA VISTA
            return $this->redirect($this->generateUrl('editejecutora', array('id' => $id))); 
        }
            //RETORNO A LA VISTA
            return $this->redirect($this->generateUrl('editejecutora', array('id' => $id)));    
    }

    /*
    *
    * FUNCION PARA INSERTAR LOS DATOS DE UNA NUEVA UNIDAD EJECUTORA
    *
    */
    public function createejecutoraAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //INSTANCIO LA CLASE UNIDADEJECUTORA
        $entity  = new Unidadejecutora();

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form = $this->createForm(new EjecutoraType(), $entity);

        //OBTENGO LOS DATOS DEL FORMULARIO
        $form->bind($request);

        //VERIFICO SI EL FORMULARIO ES VALIDO
        if($form->isValid())
        {
            //INSEERTO LOS DATOS EN LA BD
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE CREO EXITOSAMENTE LA UNIDAD EJECUTORA');

            //RETORNO A LA VISTA
            return $this->redirect($this->generateUrl('indexejecutora', array('id' => $entity->getId())));
        }

        //RETORNO A OTRA VISTA SI EL FORM NO ES VALIDO
        return $this->render('ContenidosBundle:Editar:newejecutora.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /*
    *
    * MUESTRA EL FORMULARIO PARA CREAR UNIDAD EJECUTORA.
    *
    */
    public function newejecutoraAction()
    {
        //INSTANCIO LA CLASE
        $entity = new Unidadejecutora();

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form   = $this->createForm(new EjecutoraType(), $entity);

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:newejecutora.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /*
    *
    * FUNCION PARA ELIMINAR UNA UNIDAD EJECUTORA.
    *
    */
    public function deleteejecutoraAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE LA UNIDAD EJECUTORA SEGUN ID
        $entity = $em->getRepository('ContenidosBundle:Unidadejecutora')->find($id);

        if (!$entity) 
        {
            throw $this->createNotFoundException('Unable to find Unidadejecutora entity.');
        }

        //ELIMINO EL REGISTRO DE LA BD
        $em->remove($entity);
        $em->flush();
        
        //ENVIO A UNA VISTA
        return $this->redirect($this->generateUrl('indexejecutora'));
    }


    ##############################################################################################
    #                                   TABLA UNIDADADMINISTRATIVA
    ##############################################################################################

    /*
    *
    * MUESTRA LA LISTA DE LAS UNIDADES EJECUTORAS.
    *
    */
    public function indexadministrativaAction()
    {

        $em = $this->getDoctrine()->getManager();

        //OBTENGO TODOS LOS REGISTROS DE UNIDADES ADMINISTRATIVAS
        $entities = $em->getRepository('ContenidosBundle:Unidadadministrativa')->findAll();

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:indexadministrativa.html.twig', array(
            'entities' => $entities,
        ));
    }


    /*
    *
    * MUESTA EL FORMULARIO PARA EDITAR LA ENTIDAD UNIDADADMINISTRATIVA.
    *
    */
    public function editadministrativaAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE LA UNIDAD ADMINISTRATIVA SEGUN ID
        $entity = $em->getRepository('ContenidosBundle:Unidadadministrativa')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unidadadministrativa entity.');
        }

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $editForm
        $editForm = $this->createForm(new AdministrativaType(), $entity);

        $deleteForm = $this->createDeleteForm($id);

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:editadministrativa.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /*
    *
    * INSERTA LOS DATOS EN LA ENTIDAD Unidadadministrativa DESPUES DE SER EDITADO.
    *
    */
    public function updateadministrativaAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE LA UNIDAD ADMINISTRATIVA SEGUN ID
        $entity = $em->getRepository('ContenidosBundle:Unidadadministrativa')->find($id);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unidadadministrativa entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $editForm
        $editForm = $this->createForm(new AdministrativaType(), $entity);

        //OBTENGO LOS DATOS DEL FORMULARIO
        $editForm->bind($request);

        //VERIFICO SI EL FORMULARIO ES VALIDO
        if($editForm->isValid())
        {

            //INSERTO LA INF. EN LA BD
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE EDITO EXITOSAMENTE LA UNIDAD ADMINISTRATIVA');

            //ENVIO A LA VISTA
            return $this->redirect($this->generateUrl('indexadministrativa', array('id' => $id)));    
        }

        //ENVIO A OTRA VISTA SI EL FORM NO ES VALIDO
        return $this->render('ContenidosBundle:Editar:editadministrativa.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /*
    *
    * INSERTA LOS DATOS DE UNA NUEVA Unidadadministrativa.
    *
    */
    public function createadministrativaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //INSTANCIO LA CLASE
        $entity  = new Unidadadministrativa();

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form = $this->createForm(new AdministrativaType(), $entity);

        //OBTENGO LOS DATOS DEL FORMULARIO
        $form->bind($request);

        //VERIFICO SI EL FORMULARIO ES VALIDO
        if ($form->isValid())
        {
            //INSERTO LA INF. EN LA BD
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE CREO EXITOSAMENTE LA UNIDAD ADMINISTRATIVA');

            //ENVIO A LA VISTA
            return $this->redirect($this->generateUrl('indexadministrativa', array('id' => $entity->getId())));
        }

        //ENVIO A OTRA VISTA SI EL FORM NO ES VALIDO
        return $this->render('ContenidosBundle:Editar:newadministrativa.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /*
    *
    * MUESTRA EL FORMULARIO PARA CREAR NUEVA UNIDAD ADMINISTRATIVA.
    *
    */
    public function newadministrativaAction()
    {
        //INSTANCIO LA CLASE
        $entity = new Unidadadministrativa();

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form   = $this->createForm(new AdministrativaType(), $entity);

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:newadministrativa.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /*
    *
    * FUNCION PARA ELIMINAR UNA UNIDAD ADMINISTRATIVA.
    *
    */
    public function deleteadministrativaAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE UNIDAD ADMINISTRATIVA SEGUN ID    
        $entity = $em->getRepository('ContenidosBundle:Unidadadministrativa')->find($id);

        if (!$entity) 
        {
            throw $this->createNotFoundException('Unable to find Unidadadministrativa entity.');
        }
        
        //ELIMINO LA INFORMACION DE LA TABLA
        $em->remove($entity);
        $em->flush();
    

        //ENVIO A LA VISTA
        return $this->redirect($this->generateUrl('indexadministrativa'));
    }


    ##############################################################################################
    #                                   TABLA UNIDADSOLICITANTE
    ##############################################################################################

    /*
    *
    * LISTA DE TODAS LAS UNIDADES SOLICITANTES.
    *
    */
    public function indexsolicitanteAction()
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO INFORMACION DE TODAS LAS UNIDADES SOLICITANTES
        $entities = $em->getRepository('ContenidosBundle:Unidadsolicitante')->findAll();

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:indexsolicitante.html.twig', array(
            'entities' => $entities,
        ));
    }

    /*
    *
    * FUNCION PARA MOSTRAR EL DETALLE DE UNA UNIDAD SOLICITANTE.
    *
    */
    public function showsolicitanteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LA INFORMACION DE LA UNIDAD SEGUN ID
        $entities = $em->getRepository('ContenidosBundle:Unidadsolicitante')->find($id);

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:showsolicitante.html.twig', array(
            'entity' => $entities,
            ));
    }

    /*
    *
    * MUESTRA EL FORMULARIO PARA EDITAR UNA UNIDAD SOLICITANTE.
    *
    */
    public function editsolicitanteAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        //OBTENGO LA INFORMACION DE LA UNIDAD SOLICITANTE SEGUN ID
        $entity = $em->getRepository('ContenidosBundle:Unidadsolicitante')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unidadsolicitante entity.');
        }

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $editForm
        $editForm = $this->createForm(new SolicitanteType(), $entity);

        $deleteForm = $this->createDeleteForm($id);

        //ENVIA A LA VISTA 
        return $this->render('ContenidosBundle:Editar:editsolicitante.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /*
    *
    * FUNCION QUE INSERTA LOS DATOS DE LA Unidadsolicitante EDITADA.
    *
    */
    public function updatesolicitanteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
    
        //OBTENGO LOS DATOS DE LA UNIDAD SOLICITANTE SEGUN ID
        $entity = $em->getRepository('ContenidosBundle:Unidadsolicitante')->find($id);

        //OBTENGO EL ID DEL PROVEEDOR 
        $id_tipo = $entity->getIdTipoproveedor();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Unidadsolicitante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $editForm
        $editForm = $this->createForm(new SolicitanteType(), $entity);

        //OBTENGO LOS DATOS DEL FORMULARIO
        $editForm->bind($request);

        //VERIFICO SI EL FORMULARIO ES VALIDO
        if($editForm->isValid())
        {
            //INSERTO EL ID DEL PROVEEDOR EN LA VARIABLE $entity
            $entity->setIdTipoproveedor($id_tipo);

            //INSERTO LA INFORMACION CONTENIDA EN $entity
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE EDITO EXITOSAMENTE LA UNIDAD SOLICITANTE');

            //ENVIO A LA VISTA
            return $this->redirect($this->generateUrl('indexsolicitante', array('id' => $id)));    
        }

        //ENVIO A OTRA VISTA SI EL FORM NO ES VALIDO
        return $this->render('ContenidosBundle:Editar:editsolicitante.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));

    }

    /*
    *
    * FUNCION PARA ELIMINAR UNA UNIDAD SOLICITANTE.
    *
    */
    public function createsolicitanteAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        //INSTANCIO LA CLASE UNIDADSOLICITANTE
        $entity  = new Unidadsolicitante();

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form = $this->createForm(new SolicitanteType(), $entity);

        //OBTENGO LOS DATOS DEL FORMULARIO
        $form->bind($request);

        //VERIFICO SI EL FORMULARIO ES VALIDO
        if($form->isValid())
        {
            //INSERTO LA INFORMACION EN LA BD
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE CREO EXITOSAMENTE LA UNIDAD SOLICITANTE');

            //ENVIO A LA VISTA
            return $this->redirect($this->generateUrl('indexsolicitante', array('id' => $entity->getId())));
        }

        //ENVIO A OTRA VISTA SI EL FORMULARIO NO ES VALIDO
        return $this->render('ContenidosBundle:Editar:newsolicitante.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /*
    *
    * MUESTRA EL FORMULARIO PARA CREAR UNA UNIDAD SOLICITANTE.
    *
    */
    public function newsolicitanteAction()
    {
        //INSTANCIO LA CLASE UNIDAD SOLICITANTE
        $entity = new Unidadsolicitante();

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form   = $this->createForm(new SolicitanteType(), $entity);

        //ENVIO A LA VISTA
        return $this->render('ContenidosBundle:Editar:newsolicitante.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /*
    *
    * FUNCION PARA ELIMINAR UNA UNIDAD SOLICITANTE.
    *
    */
    public function deletesolicitanteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE LA UNIDAD SOLICITANTE SEGUN ID 
        $entity = $em->getRepository('ContenidosBundle:Unidadsolicitante')->find($id);

        if (!$entity) 
        {
            throw $this->createNotFoundException('Unable to find SolicitanteType entity.');
        }

        
            $em->remove($entity);
            $em->flush();
            
        //ENVIO A LA VISTA
        return $this->redirect($this->generateUrl('indexsolicitante'));
    }


    ##############################################################################################
    #                                   FUNCION CREATEDELETEFORM
    ##############################################################################################

    /**
     * Creates a form to delete a Tipoproveedor entity by id.
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