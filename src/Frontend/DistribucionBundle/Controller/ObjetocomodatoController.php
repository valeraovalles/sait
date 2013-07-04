<?php

namespace Frontend\DistribucionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\DistribucionBundle\Entity\Objetocomodato;
use Frontend\DistribucionBundle\Form\ObjetocomodatoType;

/**
 * Objetocomodato controller.
 *
 */
class ObjetocomodatoController extends Controller
{
    /**
     * Lists all Objetocomodato entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DistribucionBundle:Objetocomodato')->findAll();

        return $this->render('DistribucionBundle:Objetocomodato:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Objetocomodato entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Objetocomodato();
        $form = $this->createForm(new ObjetocomodatoType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            $entity->setUser($perfil);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('objetocomodato_show', array('id' => $entity->getId())));
        }

        return $this->render('DistribucionBundle:Objetocomodato:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Objetocomodato entity.
     *
     */
    public function newAction()
    {
        $entity = new Objetocomodato();
        $form   = $this->createForm(new ObjetocomodatoType(), $entity);

        return $this->render('DistribucionBundle:Objetocomodato:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Objetocomodato entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Objetocomodato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Objetocomodato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DistribucionBundle:Objetocomodato:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Objetocomodato entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Objetocomodato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Objetocomodato entity.');
        }

        $editForm = $this->createForm(new ObjetocomodatoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DistribucionBundle:Objetocomodato:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Objetocomodato entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Objetocomodato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Objetocomodato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ObjetocomodatoType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            $entity->setUser($perfil);

            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Actualización exitosa!');
            return $this->redirect($this->generateUrl('objetocomodato_show', array('id' => $id)));
        }

        return $this->render('DistribucionBundle:Objetocomodato:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Objetocomodato entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DistribucionBundle:Objetocomodato')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Objetocomodato entity.');
            }

        //valido que no esté asociado a un operador
        $dql = "select c from DistribucionBundle:Comodato c join c.objetocomodato o where o.id= :idobjetocomodato";
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('idobjetocomodato', $id);
        $comodato = $consulta->getResult();

            if($comodato){
                $this->get('session')->getFlashBag()->add('alert', 'No se puede eliminar el objeto "'.$entity->getObjeto().'" porque se encuentra asociado a un operador.');            
            }
            else{

                //guardo el id del usuario antes de eliminar
                $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
                $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
                $objcom = $em->getRepository('DistribucionBundle:Objetocomodato')->find($id);
                $objcom->setUser($perfil);
                $em->persist($objcom);
                $em->flush();

                //elimino el objeto de comodato
                $em->remove($entity);
                $em->flush();
                $this->get('session')->getFlashBag()->add('notice', 'Objeto '.$entity->getObjeto().' eliminado con exito.');
            }

        }

        return $this->redirect($this->generateUrl('objetocomodato'));
    }

    /**
     * Creates a form to delete a Objetocomodato entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
