<?php

namespace Frontend\ProyectoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ProyectoBundle\Entity\Documento;
use Frontend\ProyectoBundle\Form\DocumentoType;

/**
 * Documento controller.
 *
 */
class DocumentoController extends Controller
{

    /**
     * Lists all Documento entities.
     *
     */
    public function indexAction($proyecto)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoBundle:Documento')->findByProyectoId($proyecto);

        $cont = 0;
        $entities= array();
        $i = 0;
        foreach ($entity as $key) 
        {
            $id[$key->getId()]=$key->getId();
            $entities[$i]['id'] = $id[$key->getId()];

            $proyect[$key->getId()]=$key->getProyectoId();
            $entities[$i]['proyecto'] = $proyect[$key->getId()];

            $file[$key->getId()]=$key->getArchivo();
            $entities[$i]['file'] = $file[$key->getId()];

            $descripcion[$key->getId()]=$key->getDescripcion();
            $entities[$i]['descripcion'] = $descripcion[$key->getId()];

            $cont ++;
            $i++;
        }

        return $this->render('ProyectoBundle:Documento:index.html.twig', array(
            'entities' => $entities,
            'proyecto'    => $proyecto,
        ));
   }
    /**
     * Creates a new Documento entity.
     *
     */
    public function createAction(Request $request, $proyecto)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = new Documento();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        $proyect = $em->getRepository('ProyectoBundle:Proyecto')->find($proyecto);

        if ($form->isValid()) {

            if(!empty($form['file']))
            {
                $file=$form['file']->getData();

                $tamaño=number_format($file->getClientSize(),0, ',', '')/1000;
                $extension = $file->guessExtension();
                $nombre=$file->getClientOriginalName();
                $nombre=explode(".", $nombre);
                $nombre=$nombre[0];

                #VALIDACIONES DE TAMAÑO Y EXTENSION

                $alert = 0;
                //valido tamaño
                if ($tamaño>2000) {
                    $alert = 1;
                    $this->get('session')->getFlashBag()->add('alert', 'El archivo no puede ser mayor a 2MB.');

                }
                $extensiones=array('jpg','jpeg','png','gif','doc','odt','xls','xlsx','docx','pdf');
                //valido las extensiones
                if (!array_search($extension,$extensiones)) {
                    $alert = 1;
                    $this->get('session')->getFlashBag()->add('alert', 'El formato de archivo que intenta subir no está permitido.');
                }
                if($alert == 1)
                {
                    return $this->render('ProyectoBundle:Documento:new.html.twig', array(
                        'entity' => $entity,
                        'proyecto'  => $proyecto,
                        'proyect'  => $proyect,
                        'form'   => $form->createView(),
                    ));
                }

                $nombre=str_replace(array(" ","/",".","_","-"),array("","","","",""),trim($nombre));

                //GUARDO EL ARCHIVO
                if($file->move('uploads/documentosproyectos/',$nombre.'_'.\date("Gis").'.'.$extension) )
                {
                     $entity->setArchivo($nombre.'_'.\date("Gis").'.'.$extension);
                }
                $entity->setProyectoId($proyect);

                $em->persist($entity);
                $em->flush();

                return $this->redirect($this->generateUrl('documentoproyecto_show', array('id' => $entity->getId())));
            }
        }

        return $this->render('ProyectoBundle:Documento:new.html.twig', array(
                        'entity' => $entity,
                        'proyecto'  => $proyecto,
                        'proyect'  => $proyect,
                        'form'   => $form->createView(),
                    ));
    }

    /**
     * Creates a form to create a Documento entity.
     *
     * @param Documento $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Documento $entity)
    {
        $form = $this->createForm(new DocumentoType(), $entity, array(
            'action' => $this->generateUrl('documentoproyecto_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Documento entity.
     *
     */
    public function newAction($proyecto)
    {
        $entity = new Documento();
        $form   = $this->createCreateForm($entity);

        $em = $this->getDoctrine()->getManager();
        $proyect = $em->getRepository('ProyectoBundle:Proyecto')->find($proyecto);


        return $this->render('ProyectoBundle:Documento:new.html.twig', array(
            'entity' => $entity,
            'proyecto'  => $proyecto,
            'proyect'  => $proyect,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Documento entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoBundle:Documento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Documento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $proyecto = $entity->getProyectoId()->getId();
        return $this->render('ProyectoBundle:Documento:show.html.twig', array(
            'entity'      => $entity,
            'proyecto'    => $proyecto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Documento entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoBundle:Documento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Documento entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProyectoBundle:Documento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Documento entity.
    *
    * @param Documento $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Documento $entity)
    {
        $form = $this->createForm(new DocumentoType(), $entity, array(
            'action' => $this->generateUrl('documento_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Documento entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoBundle:Documento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Documento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('documento_edit', array('id' => $id)));
        }

        return $this->render('ProyectoBundle:Documento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Documento entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProyectoBundle:Documento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Documento entity.');
            }
            $proyecto = $entity->getProyectoId()->getId();
            $em->remove($entity);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('documentoproyecto', array('proyecto' => $proyecto)));

    }

    /**
     * Creates a form to delete a Documento entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentoproyecto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
