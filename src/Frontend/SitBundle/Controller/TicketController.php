<?php

namespace Frontend\SitBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\SitBundle\Entity\Ticket;
use Frontend\SitBundle\Form\TicketType;

use Administracion\UsuarioBundle\Entity\Perfil;
use Administracion\UsuarioBundle\Form\PerfilType;


use Doctrine\ORM\EntityRepository;


/**
 * Ticket controller.
 *
 */
class TicketController extends Controller
{

    /**
     * Lists all Ticket entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SitBundle:Ticket')->findAll();

        return $this->render('SitBundle:Ticket:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Ticket entity.
     *
     */
    public function createAction(Request $request)
    {

        $datos=$request->request->all();
        $datos=$datos['administracion_usuariobundle_perfiltype'];

        $entity  = new Ticket();
        $form = $this->createForm(new TicketType(), $entity);
        $form->bind($request);

        $entity2 = new Perfil();
        $form2   = $this->createForm(new PerfilType(), $entity2);
        $form2->bind($request);


        //consulto los tickets del usuario
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $dql = "select t from SitBundle:Ticket t where t.solicitante= :id order by t.estatus ASC";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$idusuario);
        $ticketusuario = $query->getResult();

        if ($form->isValid() && $form2->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $dql = "select p from UsuarioBundle:Perfil p where p.user= :id";
            $query = $em->createQuery($dql);
            $query->setParameter('id',$idusuario);
            $perfil = $query->getResult();
            
            $entity->setSolicitante($perfil[0]);

            $fechactual = date_create_from_format('Y-m-d', \date("Y-m-d"));
            $entity->setFechaSolicitud($fechactual);

            $entity->setHoraSolicitud(new \DateTime(\date("G:i:s")));

            $entity->setEstatus(1);

            //genero y guardo archivo
            if($form['file']->getData()){
                //subo el archivo
                $file=$form['file']->getData();

                $tamaño=number_format($file->getClientSize()/1048576,0);

                $extension = $file->guessExtension();
                $nombre=$file->getClientOriginalName();
                $nombre=explode(".", $nombre);
                $nombre=$nombre[0];

                $extensiones=array('jpg','jpeg','doc','odt','xls','xlsx');
                //valido las extensiones
                if (!array_search($extension,$extensiones)) {
                    $this->get('session')->getFlashBag()->add('alert', 'El formato de archivo que intenta subir no está permitido.');

                    return $this->render('SitBundle:Default:index.html.twig', array(
                        'form'   => $form->createView(),
                        'form2'   => $form2->createView(),
                        'ticketusuario'=>$ticketusuario
                    ));
                }


                //GUARDO EL ARCHIVO
                if($file->move('uploads/sit/',$nombre.'_'.\date("Gis").'.'.$extension) )
                {
                     $entity->setArchivo($nombre.'_'.\date("Gis").'.'.$extension);
                }

            }


            $em->persist($entity);
            $em->flush();

            //actualizo el estatus
            $query = $em->createQuery('update UsuarioBundle:Perfil p set p.extension= :extension WHERE p.id = :id');
            $query->setParameter('extension', $datos['extension']);
            $query->setParameter('id', $perfil[0]->getId());
            $query->execute();

            $this->get('session')->getFlashBag()->add('notice', 'TU SOLICITUD SE HA REALIZADO EXITOSAMENTE');

            return $this->redirect($this->generateUrl('sit_homepage'));
        }




        return $this->render('SitBundle:Default:index.html.twig', array(
            'form'   => $form->createView(),
            'form2'   => $form2->createView(),
            'ticketusuario'=>$ticketusuario
        ));
    }

    /**
     * Displays a form to create a new Ticket entity.
     *
     */
    public function newAction()
    {
        $entity = new Ticket();
        $form   = $this->createForm(new TicketType(), $entity);

        return $this->render('SitBundle:Ticket:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function catsubAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $dql = "select t from SitBundle:Ticket t where t.id= :id";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$id);
        $ticket = $query->getResult();

        if($ticket[0]->getCategoria()!=null and $ticket[0]->getSubcategoria()!=null){
            return $this->redirect($this->generateUrl('ticket_show', array('id' => $id))); 
        }



        //consulto los tickets del usuario
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $dql = "select s from SitBundle:Subcategoria s join s.categoria c where c.id=s.categoria";
        $query = $em->createQuery($dql);
        $subcat = $query->getResult();

        foreach ($subcat as $value) {
            $arraycatsub[$value->getCategoria()->getCategoria()][]=array('idcat'=>$value->getCategoria()->getId(),'idsub'=>$value->getId(),'subcategoria'=>$value->getSubcategoria());
        }

        return $this->render('SitBundle:Ticket:catsub.html.twig', array(
            'arraycatsub' => $arraycatsub,
            'id'=>$id

        ));
    }


    public function guardacatsubAction(Request $request,$id)
    {

        $datos=$request->request->all();
        $datos=$datos['subcat'];
        $ids=explode("-", $datos);

        if(empty($datos)){
            $this->get('session')->getFlashBag()->add('alert', 'Debe seleccionar una subcategoria.');
            return $this->redirect($this->generateUrl('ticket_asignarcatsub', array('id' => $id)));
        }


        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('update SitBundle:Ticket t set t.categoria= :idcat, t.subcategoria= :idsub WHERE t.id = :id');
        $query->setParameter('idsub', $ids[1]);
        $query->setParameter('idcat', $ids[0]);
        $query->setParameter('id', $id);
        $query->execute();  

        $this->get('session')->getFlashBag()->add('alert', 'Categoria asignada exitosamente');
        return $this->redirect($this->generateUrl('ticket_show', array('id' => $id)));      

    }
    /**
     * Finds and displays a Ticket entity.
     *
     */
    public function showAction($id)
    {
        //traigo los datos del usuario conectado
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $datosusuario = $em->getRepository('UsuarioBundle:User')->datosusuario($idusuario);

        //valido que tenga categoria asignada
        $dql = "select t from SitBundle:Ticket t where t.id= :id";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$id);
        $ticket = $query->getResult();

        if($ticket[0]->getCategoria()==null and $ticket[0]->getSubcategoria()==null){
            return $this->redirect($this->generateUrl('ticket_asignarcatsub', array('id' => $id))); 
        }

        $entity = $em->getRepository('SitBundle:Ticket')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ticket entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        $dql = "select u from SitBundle:Unidad u";
        $query = $em->createQuery($dql);
        $unidad = $query->getResult();

        return $this->render('SitBundle:Ticket:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'datosusuario'=>$datosusuario[0],
            'unidad'=>$unidad
        ));
    }

    /**
     * Displays a form to edit an existing Ticket entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SitBundle:Ticket')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ticket entity.');
        }

        $editForm = $this->createForm(new TicketType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SitBundle:Ticket:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Ticket entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SitBundle:Ticket')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Ticket entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TicketType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ticket_edit', array('id' => $id)));
        }

        return $this->render('SitBundle:Ticket:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Ticket entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SitBundle:Ticket')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Ticket entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ticket'));
    }

    /**
     * Creates a form to delete a Ticket entity by id.
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
