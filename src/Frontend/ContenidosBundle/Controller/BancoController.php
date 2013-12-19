<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

//ASOCIO LAS ENTIDADES QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Entity\Banco;
use Frontend\ContenidosBundle\Entity\Datosproveedor;

//ASOCIO LOS FORMULARIOS QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Form\BancoType;

/*
*
* CONTROTADOR ENTIDAD BANCO
*
*/
class BancoController extends Controller
{

    /*
    *
    * MUESTA TODOS LOS BANCOS ASOCIADOS AL PROVEEDOR. 
    *
    */
    public function indexAction($id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LA INFORMACION DE LOS BANCOS ASOCIADOS AL PROVEEDOR SELECCIONADO
        $entities = $em->getRepository('ContenidosBundle:Banco')->findByidProveedor($id_proveedor);

        //ENVIO A LA VISTA LOS DATOS QUE SE OBTENGAN
        return $this->render('ContenidosBundle:Banco:index.html.twig', array(
            'entities' => $entities,
            'id_proveedor' => $id_proveedor,
        ));
    }

    /*
    *
    * CREAR EL REGISTRO DE UN BANCO. 
    *
    */
    public function createAction(Request $request, $id_proveedor)
    {
      
      $em = $this->getDoctrine()->getManager();

      //INSTANCIO LA VARIABLE $entity A LA CLASE BANCO
      $entity  = new Banco();

      //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
      $form = $this->createForm(new BancoType(), $entity);

      //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
      $form->bind($request);

      //VERIFICO SI EL FORMULARIO ES VALIDO
      if ($form->isValid()) 
      {
  
       //OBTENGO LOS DATOS DEL PROVEEDOR
        $prove = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id_proveedor);            
        
        //INSERTO EL ID DEL PROVEEDOR EN LA ENTIDAD
        $entity->setIdProveedor($prove);

        //INSERTO LOS DATOS DE LA VARIABLE ENTITY EN LA TABLA BANCO
        $em->persist($entity);
        $em->flush();

        //envio a notificacion de que el registro fue creado
        $this->get('session')->getFlashBag()->add('notice', 'SE REGISTRARON EXITOSAMENTE LOS DATOS BANCARIOS');
        //RETORNO A LA VISTA SHOW PARA OBSERVAR LOS DETALLES DEL BANCO CREADO
        return $this->redirect($this->generateUrl('banco_show', array('id' => $entity->getId(),
                                                                      'id_proveedor' => $id_proveedor,
                                                                     ))); 
      }

      //REGRESO A LA VISTA ANTERIOR SI EL FORMULARIO NO ES VALIDO
      return $this->render('ContenidosBundle:Banco:new.html.twig', array(
        'entity'      => $entity,
        'id_proveedor'=> $id_proveedor,
        'form'   => $editForm->createView(),
      ));  
    }

    /*
    *
    * FUNCION PARA EL FORMULARIO PARA CREAR UN REGISTRO DEL BANCO
    *
    */
    public function newAction($id_proveedor)
    {
      //INSTANCIO LA VARIABLE ENTITY A LA CLASE BANCO
      $entity = new Banco();

      //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
      $form   = $this->createForm(new BancoType(), $entity);

      //ENVIO A LA VISTA LOS DATOS DEL FORMULARIO Y EL ID DEL PROVEEDOR
      return $this->render('ContenidosBundle:Banco:new.html.twig', array(
        'entity' => $entity,
        'id_proveedor' => $id_proveedor,
        'form'   => $form->createView(),
      ));
    }

    /*
    *
    * MUESTRA LOS DETALLES DEL BANCO
    *
    */
    public function showAction($id,$id_proveedor)
    {
      $em = $this->getDoctrine()->getManager();

      //OBTENGO LOS DATOS DEL BANCO 
      $entity = $em->getRepository('ContenidosBundle:Banco')->find($id);

      if (!$entity) 
      {
        throw $this->createNotFoundException('Unable to find Banco entity.');
      }

      $deleteForm = $this->createDeleteForm($id);

      //ENVIO A LA VISTA SHOW LOS DATOS PARA MOSTRAR DETALLES DEL BANCO
      return $this->render('ContenidosBundle:Banco:show.html.twig', array(
        'entity'      => $entity,
        'id_proveedor'=> $id_proveedor,
        'delete_form' => $deleteForm->createView(),        
      ));
    }

    /*
    *
    * FUNCION PARA TRAER EL FORMULARIO PARA EDITAR LOS DATOS DEL BANCO
    *
    */
    public function editAction($id,$id_proveedor)
    {
      $em = $this->getDoctrine()->getManager();

      //OBTENGO LOS DATOS DEL BANCO 
      $entity = $em->getRepository('ContenidosBundle:Banco')->find($id);

      if (!$entity) 
      {
        throw $this->createNotFoundException('Unable to find Banco entity.');
      }

      $editForm = $this->createForm(new BancoType(), $entity);
      $deleteForm = $this->createDeleteForm($id);

      //ENVIO A LA VISTA EDIT LOS DATOS PARA MOSTRAR EL FORMULARIO DE EDICION
      return $this->render('ContenidosBundle:Banco:edit.html.twig', array(
        'entity'      => $entity,
        'id_proveedor'=>$id_proveedor,
        'edit_form'   => $editForm->createView(),
        'delete_form' => $deleteForm->createView(),
      ));
    }

    /*
    *
    * FUNCION PARA EDITAR LOS DATOS DEL BANCO
    *
    */
    public function updateAction(Request $request, $id, $id_proveedor)
    {
      $em = $this->getDoctrine()->getManager();

      //OBTENGO LOS DATOS DEL BANCO         
      $entity = $em->getRepository('ContenidosBundle:Banco')->find($id);

      if (!$entity) 
      {
        throw $this->createNotFoundException('Unable to find Banco entity.');
      }

      $deleteForm = $this->createDeleteForm($id);
      $editForm = $this->createForm(new BancoType(), $entity);
      $editForm->bind($request);

      //VERIFICO SI EL FORMUALRIO ENVIADO ES VALIDO
      if ($editForm->isValid()) 
      {

        //OBTENGO LOS DATOS DEL PROVEEDOR SEGUN SU ID Y LO SETEO EN LA VARIABLE ENTITY
        $user = $em->getRepository('ContenidosBundle:Datosproveedor')->find($id_proveedor);            
        $entity->setIdProveedor($user);

        //INSERTO LOS VALORES TRAIDOS DEL FORM Y EL IDPROVEEDOR EN LA BASE DE DATOS
        $em->persist($entity);
        $em->flush();

        //envio a notificacion de que el registro fue creado
        $this->get('session')->getFlashBag()->add('notice', ' SE EDITARON EXITOSAMENTE LOS DATOS BANCARIOS');

        //RETORNO A LA VISTA
        return $this->redirect($this->generateUrl('banco_show', array('id' => $entity->getId(),
                                                                          'id_proveedor' => $id_proveedor,
                                                                            ))); 
      }

      //ENVIO A LA VISTA ANTERIOR SI EL FORMULARIO NO ES VALIDO
      return $this->render('ContenidosBundle:Banco:edit.html.twig', array(
        'entity'      => $entity,
        'id_proveedor'=> $id_proveedor,
        'edit_form'   => $editForm->createView(),
        'delete_form' => $deleteForm->createView(),
      ));
    }
    /*
    *
    * FUNCION PARA ELIMINAR LOS DATOS DE UN BANCO
    *
    */
    public function deleteAction($id, $id_proveedor)
    {
      
      //OBTENGO LOS DATOS DEL BANCO
      $em = $this->getDoctrine()->getManager();
      $entity = $em->getRepository('ContenidosBundle:Banco')->find($id);
      if (!$entity) 
      {
        throw $this->createNotFoundException('Unable to find Banco entity.');
      }
      //ELIMINO LOS DATOS ASOCIADOS A ESE BANCO DE LA BASE DE DATOS
      $em->remove($entity);
      $em->flush();
      
      //envio a notificacion de que el registro fue eliminado
      $this->get('session')->getFlashBag()->add('notice', 'SE ELIMINARON EXITOSAMENTE LOS DATOS BANCARIOS');

      //RETORNO A LA VISTA DE TODOS LOS BANCOS (INDEX DE BANCOS)
      return $this->redirect($this->generateUrl('banco', array('id' => $entity->getId(),
                                                                'id_proveedor' => $id_proveedor,
                                                              ))); 
    }

    /*
    *
    * Creates a form to delete a Banco entity by id.
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