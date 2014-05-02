<?php

namespace Frontend\DirectorioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\DirectorioBundle\Entity\Personalidad;
use Frontend\DirectorioBundle\Form\PersonalidadType;

use Frontend\DistribucionBundle\Entity\Pais;
use Frontend\DistribucionBundle\Entity\Representante;

use Frontend\DirectorioBundle\Entity\Especialidad;
use Frontend\DirectorioBundle\Form\EspecialidadType;


/**
 * Personalidad controller.
 *
 */
class PersonalidadController extends Controller
{

    /**
     * Lists all Personalidad entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DirectorioBundle:Personalidad')->findAll();

        return $this->render('DirectorioBundle:Personalidad:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Personalidad entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Personalidad();
        $form = $this->createForm(new PersonalidadType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

          //GUARDO EL ARCHIVO
            if($form['file']->getData()){
      
                $file=$form['file']->getData();

                $tamaño=number_format($file->getClientSize(),0, ',', '')/1000;
                $extension = $file->guessExtension();
                $nombre=$file->getClientOriginalName();
                $nombre=explode(".", $nombre);
                $extension=$nombre[1];
                $nombre=$nombre[0];

                $nombre=str_replace(array(" ","/",".","_","-"),array("","","","",""),trim($nombre));

                //GUARDO EL ARCHIVO
                if($file->move('uploads/directorio/',$nombre.'_'.\date("Gis").'.'.$extension) )
                {
                     $entity->setArchivo($nombre.'_'.\date("Gis").'.'.$extension);
                }

            }
            //fin archivo


            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('personalidad_show', array('id' => $entity->getId())));
        }

        return $this->render('DirectorioBundle:Personalidad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Personalidad entity.
     *
     */
    public function newAction()
    {
        $entity = new Personalidad();
        $form   = $this->createForm(new PersonalidadType(), $entity);

        return $this->render('DirectorioBundle:Personalidad:new.html.twig', array(
            'form'=>$form->createView(),
            'entity' => $entity,
        ));

    }

    /**
     * Finds and displays a Personalidad entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DirectorioBundle:Personalidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personalidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DirectorioBundle:Personalidad:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Personalidad entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DirectorioBundle:Personalidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personalidad entity.');
        }

        $editForm = $this->createForm(new PersonalidadType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DirectorioBundle:Personalidad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Personalidad entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DirectorioBundle:Personalidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personalidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PersonalidadType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $delfile=$editForm['archivo']->getData();
            $subio="false";

          //GUARDO EL ARCHIVO
            if($editForm['file']->getData()){
      
                $file=$editForm['file']->getData();
              
                $tamaño=number_format($file->getClientSize(),0, ',', '')/1000;
                $extension = $file->guessExtension();
                $nombre=$file->getClientOriginalName();
                $nombre=explode(".", $nombre);
                $extension=$nombre[1];
                $nombre=$nombre[0];
               
                
                $nombre=str_replace(array(" ","/",".","_","-"),array("","","","",""),trim($nombre));
        
                //GUARDO EL ARCHIVO
                if($file->move('uploads/directorio/',$nombre.'_'.\date("Gis").'.'.$extension) )
                {
                    $entity->setArchivo($nombre.'_'.\date("Gis").'.'.$extension);
                    $subio="true";
                }

            }
            //fin archivo

            $em->persist($entity);
            $em->flush();
            if ($delfile && $subio=="true"){                        
                unlink('uploads/directorio/'.$delfile);
            }

            $this->get('session')->getFlashBag()->add('notice', 'La actualización de realizó correctamente.');
            return $this->redirect($this->generateUrl('personalidad_edit', array('id' => $id)));
        }

        return $this->render('DirectorioBundle:Personalidad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Personalidad entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DirectorioBundle:Personalidad')->find($id);
            
            $delfile=$entity->getArchivo();
            
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Personalidad entity.');
            }

            $em->remove($entity);
            $em->flush();
            if ($delfile){                        
                unlink('uploads/directorio/'.$delfile);
            }
        }

        return $this->redirect($this->generateUrl('personalidad'));
    }

    /**
     * Creates a form to delete a Personalidad entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->add('archivo', 'hidden')
            ->getForm()
        ;
    }
}
