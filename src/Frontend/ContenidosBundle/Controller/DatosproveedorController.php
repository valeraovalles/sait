<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ContenidosBundle\Entity\Datosproveedor;
use Frontend\ContenidosBundle\Form\DatosproveedorType;


use Frontend\ContenidosBundle\Entity\DetalleTipoproveedor;
use Frontend\ContenidosBundle\Entity\Unidadsolicitante;
use Administracion\UsuarioBundle\Entity\User;

/**
 * Datosproveedor controller.
 *
 */
class DatosproveedorController extends Controller
{

    /**
     * Lists all Datosproveedor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $titulo = "COMPLETO DE PROVEEDORES";

        //OBTENGO LA INFORMACION DE TODOS LOS PROVEEDORES ACTIVOS

        $estatus = 'A';
        $dql = "select d from ContenidosBundle:Datosproveedor d where d.estatus=:estatus";
        $consulta = $em->createQuery($dql)->setParameter('estatus', $estatus);
        $entities = $consulta->getResult();

        return $this->render('ContenidosBundle:Datosproveedor:index.html.twig', array(
            'entities' => $entities,
            'titulo' => $titulo,
        ));
    }

    public function comprasAction()
    {
        $em = $this->getDoctrine()->getManager();
        $titulo = "PROVEEDORES (COMPRAS)";


        //OBTENGO LA INFORMACION  DE LOS PROVEEDORES DE COMPRAS QUE ESTEN ACTIVOS

        $id_tipoproveedor = 1;
        $estatus = 'A';

        $dql = "select d from ContenidosBundle:Datosproveedor d 
                where d.idTipoprov=:id_tipoproveedor and d.estatus=:estatus";
        $consulta = $em->createQuery($dql)->setParameters(
                                                            array(
                                                                    'id_tipoproveedor'=> $id_tipoproveedor, 
                                                                    'estatus' => $estatus,
                                                                 )


                                                         );


        $entities = $consulta->getResult();
        return $this->render('ContenidosBundle:Datosproveedor:index.html.twig', array(
            'entities' => $entities,
            'titulo' => $titulo,
        ));
    }

    public function informacionAction()
    {
        $em = $this->getDoctrine()->getManager();


        //OBTENGO LA INFORMACION  DE LOS PROVEEDORES DE INFORMACION QUE ESTEN ACTIVOS
        $id_tipoproveedor = 2;
        $estatus = 'A';
        $titulo = "PROVEEDORES (VP DE CONTENIDOS)";

        $dql = "select d from ContenidosBundle:Datosproveedor d 
                where d.idTipoprov=:id_tipoproveedor and d.estatus=:estatus";
        $consulta = $em->createQuery($dql)->setParameters(
                                                            array(
                                                                    'id_tipoproveedor'=> $id_tipoproveedor, 
                                                                    'estatus' => $estatus,
                                                                 )


                                                         );

        $entities = $consulta->getResult();
        return $this->render('ContenidosBundle:Datosproveedor:index.html.twig', array(
            'entities' => $entities,
            'titulo' => $titulo,
        ));
    }

    public function equiposAction()
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LA INFORMACION  DE LOS PROVEEDORES DE EQUIPOS QUE ESTEN ACTIVOS

        $id_tipoproveedor = 4;
        $estatus = 'A';
        $titulo = "DE EQUIPOS TELESUR";

        $dql = "select d from ContenidosBundle:Datosproveedor d 
                where d.idTipoprov=:id_tipoproveedor and d.estatus=:estatus";
        $consulta = $em->createQuery($dql)->setParameters(
                                                            array(
                                                                    'id_tipoproveedor'=> $id_tipoproveedor, 
                                                                    'estatus' => $estatus,
                                                                 )


                                                         );
        $entities = $consulta->getResult();
        return $this->render('ContenidosBundle:Datosproveedor:index.html.twig', array(
            'entities' => $entities,
            'titulo' => $titulo,
        ));
    }

    public function inactivosAction()
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LA INFORMACION  DE LOS PROVEEDORES QUE ESTEN INACTIVOS

        $estatus = 'I';
        $titulo = "PROVEEDORES INACTIVOS";
        $dql = "select d from ContenidosBundle:Datosproveedor d where d.estatus=:estatus";
        $consulta = $em->createQuery($dql)->setParameter('estatus', $estatus);
        $entities = $consulta->getResult();
        return $this->render('ContenidosBundle:Datosproveedor:index.html.twig', array(
            'entities' => $entities,
            'titulo' => $titulo,
        ));
    }

    /**
     * Creates a new Datosproveedor entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Datosproveedor();
        $form = $this->createForm(new DatosproveedorType(), $entity);
        $form->bind($request);

            $em = $this->getDoctrine()->getManager();

            // OBTENGO LOS DATOS DEL FORMULARIO AJAX
            $datosform = $request->request->all();
            $datosform = $datosform['form'];

            $unidad = $datosform['unidadsolicitante'];
            $detalle = $datosform['detalle'];
            $tiposat = $datosform['tipoSatelite'];
            
            if (!empty($tiposat))
            {
                $entity->setTipoSatelite($tiposat);
            }



            $det = $em->getRepository('ContenidosBundle:DetalleTipoproveedor')->find($detalle);
            $entity->setIdDetalletipoproveedor($det);

            $unid = $em->getRepository('ContenidosBundle:Unidadsolicitante')->find($unidad);
            $entity->setIdUnidad($unid);

            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();       
            $user = $em->getRepository('UsuarioBundle:User')->find($idUsuario);
            $entity->setUsuario($user);

            $hoy = date_create_from_format('Y-m-d', \date("Y-m-d"));
            $entity->setFechaRegistro($hoy);
            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('datosproveedor_show', array('id' => $entity->getId())));
        
    }

    /**
     * Displays a form to create a new Datosproveedor entity.
     *
     */
    public function newAction()
    {
        $entity = new Datosproveedor();
        $form   = $this->createForm(new DatosproveedorType(), $entity);

        return $this->render('ContenidosBundle:Datosproveedor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Datosproveedor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Datosproveedor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContenidosBundle:Datosproveedor:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Datosproveedor entity.
     *
     */
    public function editAction($id)
    {

       
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id);
    
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Datosproveedor entity.');
        }

        $editForm = $this->createForm(new DatosproveedorType(), $entity);

        $deleteForm = $this->createDeleteForm($id);

        
        return $this->render('ContenidosBundle:Datosproveedor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Datosproveedor entity.
     *
     */
    public function updateAction(Request $request, $id)
    {


        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id);


        // OBTENGO LOS DATOS DEL FORMULARIO AJAX
        $datosform = $request->request->all();
        $cont = 0;
        if (!empty($datosform))
        {
           // hace un bucle con variable $datosform porque si el contador es mayor a 2 quiere decir que
           // entro al ajax pero si es menor los datos quedaron iguales
            foreach ($datosform as $key) {
                $cont ++;
            }
            if ($cont > 2)
            {

                $datosform = $datosform['form'];
       
                $unid = $datosform['unidadsolicitante'];
                $unidad = $em->getRepository('ContenidosBundle:Unidadsolicitante')->find($unid);
                $detalle = NULL;
                $tiposat = NULL;

                // ASOCIO A VARIABLE SEGUN EL TIPO DE PROVEEDOR
                $tipoprov =      $entity->getIdTipoprov();
                if (($tipoprov == 'VICEPRESIDENCIA DE CONTENIDOS') or ($tipoprov == 'EQUIPOS TELESUR' ))
                {
                    $detalle = $datosform['detalle'];
                    $detalle = $em->getRepository('ContenidosBundle:DetalleTipoproveedor')->find($detalle);
                    
                    if ($detalle == 'SATELITES')
                    {
                        $tiposat = $datosform['tipoSatelite'];
                    }
                }

            }
        }
               

        // OBTENGO LA FECHA EN LA QUE SE CREO EL REGISTRO Y EL USUARIO QUE LO CREO
        $fecha= $entity->getFechaRegistro();
        $usuario=$entity->getUsuario(); 
        $usuarioss = $em->getRepository('UsuarioBundle:User')->find($usuario);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Datosproveedor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DatosproveedorType(), $entity);
        $editForm->bind($request);

        // AGREGO A LA VARIABLE  $entity LA FECHA, USUARIO, UNIDAD, DETALLE Y TIPO DE SATELITE    

        $entity->setFechaRegistro($fecha);
        $entity->setUsuario($usuarioss);

        if ($cont > 2)
        {
            $entity->setIdUnidad($unidad);
            $entity->setIdDetalletipoproveedor($detalle);
            $entity->setTipoSatelite($tiposat);
        }
        //INGRESO LA INFORMACION EN LA BASE DE DATOS
        $em->persist($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('datosproveedor_edit', array('id' => $id)));
        
    }
    /**
     * FUNCION PARA ELIMINAR UN REGISTRO DE TABLA DATOSPROVEEDOR
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Datosproveedor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('datosproveedor'));
    }

    /**
     * Creates a form to delete a Datosproveedor entity by id.
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
}
