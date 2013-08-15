<?php

namespace Frontend\DistribucionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\DistribucionBundle\Entity\Representante;
use Frontend\DistribucionBundle\Form\RepresentanteType;

use Frontend\DistribucionBundle\Entity\Operador;
use Administracion\UsuarioBundle\Entity\Perfil;

/**
 * Representante controller.
 *
 */
class RepresentanteController extends Controller
{
    /**
     * Lists all Representante entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dql   = "SELECT r FROM DistribucionBundle:Representante r JOIN r.operador o order by r.id DESC
";
        $query = $em->createQuery($dql);
        $datos=$query->getResult();

        return $this->render('DistribucionBundle:Representante:index.html.twig', array(
            'datos' => $datos,
        ));
    }

    /**
     * Creates a new Representante entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Representante();
        $form = $this->createForm(new RepresentanteType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $str = \date("Y-m-d G:i:s");
            $fechaactual = \DateTime::createFromFormat('Y-m-d G:i:s', $str);
            $entity->setFechamodificacion($fechaactual);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('representante_show', array('id' => $entity->getId())));
        }

        return $this->render('DistribucionBundle:Representante:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function createAddAction(Request $request,$id)
    {
        $entity  = new Representante();
        $form = $this->createForm(new RepresentanteType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();

            $em = $this->getDoctrine()->getManager();
            $operador = $em->getRepository('DistribucionBundle:Operador')->find($id);
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            $entity->setOperador($operador);
            $entity->setUser($perfil);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('operador_show', array('id' => $id)));
        }

        $em = $this->getDoctrine()->getManager();
        $operador = $em->getRepository('DistribucionBundle:Operador')->find($id);


        return $this->render('DistribucionBundle:Representante:new_add.html.twig', array(
            'entity' => $entity,
            'operador'=>$operador,
            'form'   => $form->createView(),
        ));
    }
    /**
     * Displays a form to create a new Representante entity.
     *
     */
    public function newAction()
    {
        $entity = new Representante();
        $form   = $this->createForm(new RepresentanteType(), $entity);

        return $this->render('DistribucionBundle:Representante:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function newAddAction($id)
    {
        $entity = new Representante();
        $form   = $this->createForm(new RepresentanteType(), $entity);

        $em = $this->getDoctrine()->getManager();
        $operador = $em->getRepository('DistribucionBundle:Operador')->find($id);

        return $this->render('DistribucionBundle:Representante:new_add.html.twig', array(
            'entity' => $entity,
            'operador'=>$operador,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Representante entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Representante')->find($id);
        

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Representante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DistribucionBundle:Representante:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Representante entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Representante')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Representante entity.');
        }


        $editForm = $this->createForm(new RepresentanteType(), $entity);

        $deleteForm = $this->createDeleteForm($id);


        return $this->render('DistribucionBundle:Representante:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Representante entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Representante')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Representante entity.');
        }


        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RepresentanteType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            $str = \date("Y-m-d G:i:s");
            $fechaactual = \DateTime::createFromFormat('Y-m-d G:i:s', $str);
            $entity->setFechamodificacion($fechaactual);
            $entity->setUser($perfil);
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Actualización exitosa!');
            return $this->redirect($this->generateUrl('representante_edit', array('id' => $id)));
        }
        return $this->render('DistribucionBundle:Representante:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Representante entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DistribucionBundle:Representante')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Representante entity.');
            }

            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            $entity->setUser($perfil);
            $em->persist($entity);
            $em->flush();

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('representante'));
    }

    /**
     * Creates a form to delete a Representante entity by id.
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
