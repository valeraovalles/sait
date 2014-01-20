<?php

namespace Frontend\ContratosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ContratosBundle\Entity\Contratos;
use Frontend\ContratosBundle\Entity\Contratosanteriores;
use Frontend\ContratosBundle\Form\ContratosType;
use Frontend\ContratosBundle\Form\ContratosanterioresType;

/**
 * Contratos controller.
 *
 */
class ContratosController extends Controller
{

    /**
     * Lists all Contratos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContratosBundle:Contratos')->findAll();

        return $this->render('ContratosBundle:Contratos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Contratos entity.
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity  = new Contratos();
        $form = $this->createForm(new ContratosType(), $entity);
        $form->bind($request);

        $dql   = "SELECT cont FROM ContratosBundle:Contratos cont";
        $query = $em->createQuery($dql);
        $cant_contratos=$query->getResult();

        $cont= 0;
        foreach ($cant_contratos as $key) {
            $prese[$key->getId()]=$key->getCodigo();
            $cont = $cont+1;
        }
        $cont = $cont + 1;
        $anio_actual =  date("y");

        
        $direccion = $entity->getIdDireccion();

        if($cont < 10 )
        {
            $codigo = "CJ/0".$cont."/".$anio_actual."/".$direccion;
        }else
        {
            $codigo = "CJ/".$cont."/".$anio_actual."/".$direccion;
        }

        $entity->setCodigo($codigo);

        $hoy = date_create_from_format('Y-m-d', \date("Y-m-d"));
        $entity->setFechaRegistro($hoy);

        if ($form->isValid()) {

            if($form['file']->getData())
            {

                $file=$form['file']->getData();

                $tamaño=number_format($file->getClientSize(),0, ',', '')/1000;
                $extension = $file->guessExtension();
                $nombre=$file->getClientOriginalName();
                $nombre=explode(".", $nombre);
                $nombre=$nombre[0];

                //valido tamaño
                if ($tamaño>2000) {
                    $this->get('session')->getFlashBag()->add('alert', 'El archivo no puede ser mayor a 2MB.');

                    return $this->render('ContratosBundle:Contratos:new.html.twig', array(
                        'entity' => $entity,
                        'form'   => $form->createView(),
                    ));

                }
                $extensiones=array('jpg','jpeg','png','gif','doc','odt','xls','xlsx','docx','pdf');
                //valido las extensiones
                if (!array_search($extension,$extensiones)) {
                    $this->get('session')->getFlashBag()->add('alert', 'El formato de archivo que intenta subir no está permitido.');

                    return $this->render('ContratosBundle:Contratos:new.html.twig', array(
                        'entity' => $entity,
                        'form'   => $form->createView(),
                    ));
                }
                
                $nombre=str_replace(array(" ","/",".","_","-"),array("","","","",""),trim($nombre));

                //GUARDO EL ARCHIVO
                if($file->move('uploads/contratos/',$nombre.'_'.\date("Gis").'.'.$extension) )
                {
                     $entity->setArchivo($nombre.'_'.\date("Gis").'.'.$extension);
                }
            }

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contratos_show', array('id' => $entity->getId())));
        }

        return $this->render('ContratosBundle:Contratos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Contratos entity.
     *
     */
    public function newAction()
    {
        $entity = new Contratos();
        $form   = $this->createForm(new ContratosType(), $entity);

        return $this->render('ContratosBundle:Contratos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Contratos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContratosBundle:Contratos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContratosBundle:Contratos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Contratos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContratosBundle:Contratos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratos entity.');
        }

        $editForm = $this->createForm(new ContratosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContratosBundle:Contratos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Contratos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContratosBundle:Contratos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratos entity.');
        }


        $codigo = $entity->getCodigo();
        $fechareg = $entity->getFechaRegistro();

        $archivo = $entity->getArchivo();

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContratosType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) 
        {
            
            $entity->setArchivo($archivo); 
            $entity->setCodigo($codigo);
            $entity->setFechaRegistro($fechareg);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contratos_show', array('id' => $entity->getId())));
        }

        return $this->render('ContratosBundle:Contratos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }



    /**
     * Deletes a Contratos entity.
     *
     */
    public function deleteAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ContratosBundle:Contratos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratos entity.');
        }

        $nombre = $entity->getArchivo();
        unlink('uploads/contratos/'.$nombre.'');

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('contratos'));
    }


#######################################################################################################
#######################################################################################################
##
##                          FUNCIONES PARA AÑOS ANTERIORES
##
#######################################################################################################
#######################################################################################################

   
    /**
     * Lists all Contratos entities.
     *
     */
    public function indexpasadosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ContratosBundle:Contratosanteriores')->findAll();

        return $this->render('ContratosBundle:Contratospasados:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Contratos entity.
     *
     */
    public function showpasadosAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContratosBundle:Contratosanteriores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratospasados entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContratosBundle:Contratospasados:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Contratos entity.
     *
     */
    public function editpasadosAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContratosBundle:Contratosanteriores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratosanteriores entity.');
        }

        $editForm = $this->createForm(new ContratosanterioresType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ContratosBundle:Contratospasados:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Contratos entity.
     *
     */
    public function updatepasadosAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContratosBundle:Contratosanteriores')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratosanteriores entity.');
        }


        $codigo = $entity->getCodigo();
        $fechareg = $entity->getFechaRegistro();

        $archivo = $entity->getArchivo();

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContratosanterioresType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) 
        {
            
            $entity->setArchivo($archivo); 
            $entity->setCodigo($codigo);
            $entity->setFechaRegistro($fechareg);

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contratos_pasados_show', array('id' => $entity->getId())));
        }

        return $this->render('ContratosBundle:Contratospasados:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Creates a new Contratos años anteriores entity.
     *
     */
    public function createpasadosAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $entity  = new Contratosanteriores();
        $form = $this->createForm(new ContratosanterioresType(), $entity);
        $form->bind($request);

        $codigo = $entity->getCodigo();
        $cod_repetido = $em->getRepository('ContratosBundle:Contratosanteriores')->findByCodigo($codigo);
        
        $codig = 0; 
        foreach ($cod_repetido as $key) {
            $codigo_rep =  $key->getCodigo();

            
            if (!empty($codigo_rep))
            {
                $codig = $codig + 1 ;
            }
           
        }

        if($codig == 1)
        {            
            $this->get('session')->getFlashBag()->add('alert', 'EL CODIGO YA EXISTE');
            return $this->render('ContratosBundle:Contratospasados:new.html.twig', array(
                                                                        'entity' => $entity,
                                                                        'form'   => $form->createView(),
                                                                    ));
        }else
        {
            if ($form->isValid()) 
            {
                if($form['file']->getData())
                {

                    $file=$form['file']->getData();

                    $tamaño=number_format($file->getClientSize(),0, ',', '')/1000;
                    $extension = $file->guessExtension();
                    $nombre=$file->getClientOriginalName();
                    $nombre=explode(".", $nombre);
                    $nombre=$nombre[0];

                    //valido tamaño
                    if ($tamaño>2000) {
                        $this->get('session')->getFlashBag()->add('alert', 'El archivo no puede ser mayor a 2MB.');

                        return $this->render('ContratosBundle:Contratospasados:new.html.twig', array(
                            'entity' => $entity,
                            'form'   => $form->createView(),
                        ));

                    }
                    $extensiones=array('jpg','jpeg','png','gif','doc','odt','xls','xlsx','docx','pdf');
                    //valido las extensiones
                    if (!array_search($extension,$extensiones)) {
                        $this->get('session')->getFlashBag()->add('alert', 'El formato de archivo que intenta subir no está permitido.');

                        return $this->render('ContratosBundle:Contratospasados:new.html.twig', array(
                            'entity' => $entity,
                            'form'   => $form->createView(),
                        ));
                    }
                    
                    $nombre=str_replace(array(" ","/",".","_","-"),array("","","","",""),trim($nombre));

                    //GUARDO EL ARCHIVO
                    if($file->move('uploads/contratos/',$nombre.'_'.\date("Gis").'.'.$extension) )
                    {
                         $entity->setArchivo($nombre.'_'.\date("Gis").'.'.$extension);
                    }
                }
        
                $em->persist($entity);
                $em->flush();
                return $this->redirect($this->generateUrl('contratos_pasados_show', array('id' => $entity->getId())));
            }

        }            

        return $this->render('ContratosBundle:Contratospasados:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Contratos entity.
     *
     */
    public function newpasadosAction()
    {

        $entity = new Contratosanteriores();
        $form   = $this->createForm(new ContratosanterioresType(), $entity);

        return $this->render('ContratosBundle:Contratospasados:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Deletes a Contratos entity.
     *
     */
    public function deletepasadosAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ContratosBundle:Contratospasados')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contratospasados entity.');
        }

        $nombre = $entity->getArchivo();
        unlink('uploads/contratos/'.$nombre.'');

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('contratos_pasados'));
    }

#######################################################################################################
#######################################################################################################
##
##                          FUNCION CREATE DELETE
##
#######################################################################################################
#######################################################################################################


    /**
     * Creates a form to delete a Contratos entity by id.
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
