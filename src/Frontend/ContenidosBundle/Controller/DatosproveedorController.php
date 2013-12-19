<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

//ASOCIO LAS ENTIDADES QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Entity\Datosproveedor;
use Frontend\ContenidosBundle\Entity\DetalleTipoproveedor;
use Frontend\ContenidosBundle\Entity\Unidadsolicitante;
use Frontend\ContenidosBundle\Entity\Presupuesto;
use Administracion\UsuarioBundle\Entity\User;

//ASOCIO LOS FORMULARIOS QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Form\DatosproveedorType;

/**
 * CONTROLADOR ENTIDAD DATOSPROVEEDOR
 *
 */
class DatosproveedorController extends Controller
{

    /**
     * LISTA DE TODOS PROVEEDORES EXISTENTES
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        if ($this->get('security.context')->isGranted('ROLE_CONTENIDOS_ADMIN'))
        {
            //OBTENGO LA INFORMACION DE TODOS LOS PROVEEDORES ACTIVOS
            $titulo = "COMPLETO DE PROVEEDORES";
            $estatus = 'A';

            $dql = "select d from ContenidosBundle:Datosproveedor d where d.estatus=:estatus";
            $consulta = $em->createQuery($dql)->setParameter('estatus', $estatus);
            $entities = $consulta->getResult();

        }elseif($this->get('security.context')->isGranted('ROLE_CONTENIDOS_COMPRAS'))
        {
            //OBTENGO LA INFORMACION  DE LOS PROVEEDORES DE COMPRAS QUE ESTEN ACTIVOS
            $titulo = "PROVEEDORES (COMPRAS)";            
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

        }elseif($this->get('security.context')->isGranted('ROLE_CONTENIDOS_EQUIPOS'))
        {
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

        }elseif($this->get('security.context')->isGranted('ROLE_CONTENIDOS_CONTENIDOS'))
        {
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
        }

        return $this->render('ContenidosBundle:Datosproveedor:index.html.twig', array(
            'entities' => $entities,
            'titulo' => $titulo,
        )); 
    }

    /**
     * LISTA DE TODOS PROVEEDORES DE COMPRAS  
     *
     */
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

    /**
     * LISTA DE TODOS PROVEEDORES DE INFORMACION  
     *
     */
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

    /**
     * LISTA DE TODOS PROVEEDORES DE EQUIPOS TELESUR  
     *
     */
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

    /**
     * LISTA DE TODOS PROVEEDORES CON ESTATUS INACTIVOS  
     *
     */
    public function inactivosAction()
    {
        $em = $this->getDoctrine()->getManager();

        if ($this->get('security.context')->isGranted('ROLE_CONTENIDOS_ADMIN'))
        {
            //OBTENGO LA INFORMACION  DE LOS PROVEEDORES QUE ESTEN INACTIVOS
            $estatus = 'I';
            $titulo = "PROVEEDORES INACTIVOS";
            $dql = "select d from ContenidosBundle:Datosproveedor d where d.estatus=:estatus";
            $consulta = $em->createQuery($dql)->setParameter('estatus', $estatus);
            $entities = $consulta->getResult();
        }
        elseif($this->get('security.context')->isGranted('ROLE_CONTENIDOS_COMPRAS'))
        {
            //OBTENGO LA INFORMACION  DE LOS PROVEEDORES DE COMPRAS QUE ESTEN INACTIVOS
            $titulo = "PROVEEDORES INACTIVOS (COMPRAS)";            
            $id_tipoproveedor = 1;
            $estatus = 'I';

            $dql = "select d from ContenidosBundle:Datosproveedor d 
                    where d.idTipoprov=:id_tipoproveedor and d.estatus=:estatus";
            $consulta = $em->createQuery($dql)->setParameters(
                                                                array(
                                                                        'id_tipoproveedor'=> $id_tipoproveedor, 
                                                                        'estatus' => $estatus,
                                                                     )


                                                             );
            $entities = $consulta->getResult();

        }elseif($this->get('security.context')->isGranted('ROLE_CONTENIDOS_EQUIPOS'))
        {
            //OBTENGO LA INFORMACION  DE LOS PROVEEDORES DE EQUIPOS QUE ESTEN INACTIVOS
            $id_tipoproveedor = 4;
            $estatus = 'I';
            $titulo = "DE EQUIPOS TELESUR (INACTIVOS)";

            $dql = "select d from ContenidosBundle:Datosproveedor d 
                    where d.idTipoprov=:id_tipoproveedor and d.estatus=:estatus";
            $consulta = $em->createQuery($dql)->setParameters(
                                                                array(
                                                                        'id_tipoproveedor'=> $id_tipoproveedor, 
                                                                        'estatus' => $estatus,
                                                                     )


                                                             );
            $entities = $consulta->getResult();

        }elseif($this->get('security.context')->isGranted('ROLE_CONTENIDOS_CONTENIDOS'))
        {
            //OBTENGO LA INFORMACION  DE LOS PROVEEDORES DE INFORMACION QUE ESTEN INACTIVOS
            $id_tipoproveedor = 2;
            $estatus = 'I';
            $titulo = "PROVEEDORES INACTIVOS (VP DE CONTENIDOS)";

            $dql = "select d from ContenidosBundle:Datosproveedor d 
                    where d.idTipoprov=:id_tipoproveedor and d.estatus=:estatus";
            $consulta = $em->createQuery($dql)->setParameters(
                                                                array(
                                                                        'id_tipoproveedor'=> $id_tipoproveedor, 
                                                                        'estatus' => $estatus,
                                                                     )


                                                             );

            $entities = $consulta->getResult();
        }


        return $this->render('ContenidosBundle:Datosproveedor:index.html.twig', array(
            'entities' => $entities,
            'titulo' => $titulo,
        ));
    }

    /*
    *
    * FUNCION PARA CREAR UN NUEVO PROVEEDOR.
    *
    */
    public function createAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        //instancio la clase Datosproveedor()
        $entity  = new Datosproveedor();


        //obtengo el formulario
        $form = $this->createForm(new DatosproveedorType(), $entity);

        //obtengo los datos enviados por los usuarios a traves del formulario
        $form->bind($request);


        // obtengo los datos del formulario AJAX
        $datosform = $request->request->all();
        $datosform = $datosform['form'];


        //verifico si el formulario es valido
        if ($form->isValid()) 
        {
           //obtengo la unidad solicitante
            $unidad = $datosform['unidadsolicitante'];

            //inicializo las variables $detalle y $tiposat
            $detalle = NULL;
            $tiposat = NULL;

            //obtengo el id del tipo de proveedor
            $tipoprov = $entity->getIdTipoprov();


            //si el tipo de proveedor no es compras
            if ($tipoprov != 'COMPRAS')
            {
                //obtengo el id del detalle del tipo de proveedor
                $detalle = $datosform['detalle'];

                //obtengo los datos del detalle, ya que es un clave foranea y la seteo en $entity
                $det = $em->getRepository('ContenidosBundle:DetalleTipoproveedor')->find($detalle);
                $entity->setIdDetalletipoproveedor($det);

                //si el detalle del tipo de prov es "SATELITES"
                if ($det == 'SATELITES')
                {
                    //obtengo el tipo de satelites y lo seteo
                    $tiposat = $datosform['tipoSatelite'];
                    $entity->setTipoSatelite($tiposat);
                }

            }
            
            //coloco el estatus en activo (por defecto)
            $estatus= 'A';
            $entity->setEstatus($estatus);

            //obtengo los datos de la unidad, ya que es una clave foranea y la seteo en $entity
            $unid = $em->getRepository('ContenidosBundle:Unidadsolicitante')->find($unidad);
            $entity->setIdUnidad($unid);

            //busco los datos del usuario conectado y lo seteo en $entity
            $idUsuario = $this->get('security.context')->getToken()->getUser()->getId();       
            $user = $em->getRepository('UsuarioBundle:User')->find($idUsuario);
            $entity->setUsuario($user);

            //tomo la fecha actual para setearla como fecha de registro en $entity
            $hoy = date_create_from_format('Y-m-d', \date("Y-m-d"));
            $entity->setFechaRegistro($hoy);
            
            //inserto la informacion en la BD
            $em->persist($entity);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', 'SE REGISTRO EXITOSAMENTE EL PROVEEDOR');

            //envio a la vista
            return $this->redirect($this->generateUrl('datosproveedor_show', array('id' => $entity->getId())));
        }

        //envio a otra vista si el formulario no es valido
        return $this->render('ContenidosBundle:Datosproveedor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /*
    *
    * FUNCION PARA TRAER EL FORMULARIO DE ENTIDAD DATOSPROVEEDOR (NUEVO REGISTRO)
    *
    */
    public function newAction()
    {
        //instancio la clase Datosproveedor
        $entity = new Datosproveedor();

        //obtengo el formulario
        $form   = $this->createForm(new DatosproveedorType(), $entity);

        //envio a la plantilla
        return $this->render('ContenidosBundle:Datosproveedor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /*
    *
    * MUESTRA EL DETALLE DE LOS DATOS DE UN PROVEEDOR.
    *
    */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        //obtengo datos del proveedor segun ID
        $entity = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Datosproveedor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //envio a la plantilla
        return $this->render('ContenidosBundle:Datosproveedor:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /*
    *
    * MUESTRA EL FORMULARIO PARA EDITAR LOS DATOS DE UN PROVEEDOR.
    *
    */
    public function editAction($id)
    {
       
        $em = $this->getDoctrine()->getManager();

        //obtengo datos de proveedor segun ID
        $entity = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id);
    
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Datosproveedor entity.');
        }

        //obtengo el formulario
        $editForm = $this->createForm(new DatosproveedorType(), $entity);

        $deleteForm = $this->createDeleteForm($id);

        //envio a la plantilla
        return $this->render('ContenidosBundle:Datosproveedor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /*
    *
    * FUNCION PARA EDITAR LOS DATOS DEL NUEVO PROVEEDOR.
    *
    */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        //obtengo datos del proveedor segun ID
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
                //obtengo datos
                $datosform = $datosform['form'];

                //asocio los datos traidos a variable unidad
                $unid = $datosform['unidadsolicitante'];
                $unidad = $em->getRepository('ContenidosBundle:Unidadsolicitante')->find($unid);

                //inicializo variables
                $detalle = NULL;
                $tiposat = NULL;

                // obtengo el tipo de proveedor
                $tipoprov = $entity->getIdTipoprov();

                //si el tipo de proveedor es diferente a compras
                if (($tipoprov == 'VICEPRESIDENCIA DE CONTENIDOS') or ($tipoprov == 'EQUIPOS TELESUR' ))
                {
                    //obtengo el detalle del tipo de proveedor
                    $detalle = $datosform['detalle'];
                    $detalle = $em->getRepository('ContenidosBundle:DetalleTipoproveedor')->find($detalle);
                    
                    //si el detalle del tipo de prov es SATELITES se asocia el valor a variable
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

        //obtengo formulario y datos que envio el usuario
        $editForm = $this->createForm(new DatosproveedorType(), $entity);
        $editForm->bind($request);

        //verifico si el formulario es valido
        if ($editForm->isValid()) 
        {
            // inserto A LA VARIABLE  $entity LA FECHA, USUARIO, UNIDAD, DETALLE Y TIPO DE SATELITE    
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

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE EDITO EXITOSAMENTE EL PROVEEDOR');

            //envio a la plantilla
            return $this->redirect($this->generateUrl('datosproveedor_show', array('id' => $id)));
        }

       //envio a otra plantilla si formaulario no es valido
        return $this->render('ContenidosBundle:Datosproveedor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * FUNCION PARA ELIMINAR UN REGISTRO DE TABLA DATOSPROVEEDOR
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $titulo = "COMPLETO DE PROVEEDORES";

        //OBTENGO LA INFORMACION DE TODOS LOS PROVEEDORES ACTIVOS

        $estatus = 'A';
        $dql = "select d from ContenidosBundle:Datosproveedor d where d.estatus=:estatus";
        $consulta = $em->createQuery($dql)->setParameter('estatus', $estatus);
        $entities = $consulta->getResult();


        //obtengo datos del proveedor segun ID
        $entity = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Datosproveedor entity.');
        }

        $dql   = "SELECT pre FROM ContenidosBundle:Presupuesto pre
                    where pre.idProveedor= :id";
        $query = $em->createQuery($dql)->setParameter('id',$id);
        $pres=$query->getResult();



        $dql   = "SELECT cont FROM ContenidosBundle:Banco cont
                    where cont.idProveedor= :id";
        $query = $em->createQuery($dql)->setParameter('id',$id);
        $banco=$query->getResult();


        if ($pres == NULL and $banco == NULL)
        {   
            //ELIMINO LOS DATOS DE LA CONTRATACION SI NO TENGO PAGOS ASOCIADOS
            $em->remove($entity);
            $em->flush();
            
            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE ELIMINO EL PROVEEDOR EXITOSAMENTE');
        }elseif ($pres == NULL and $banco != NULL)
        {
            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('alert', 'EL PROVEEDOR TIENE BANCOS ASOCIADOS');
        }elseif ($pres != NULL and $banco == NULL)
        {
            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('alert', 'EL PROVEEDOR TIENE PRESUPUESTOS ASOCIADOS');  
        }elseif ($pres != NULL and $banco != NULL)
        {
            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('alert', 'EL PROVEEDOR TIENE BANCOS Y PRESUPUESTOS ASOCIADOS');
        }

        //ENVIO A LA VISTA SHOW PARA MOSTRAR PAGO CREADO
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
}//fin de la clase