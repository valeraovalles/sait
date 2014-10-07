<?php

namespace Frontend\ProyectoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ProyectoBundle\Entity\Proyecto;
use Frontend\ProyectoBundle\Form\ProyectoType;

use Frontend\ProyectoBundle\Entity\Proyectogeneral;
use Frontend\ProyectoBundle\Form\ProyectogeneralType;

use Administracion\UsuarioBundle\Resources\Misclases\Funcion;
use Frontend\ProyectoBundle\Resources\Misclases\Proyectofunciones;
/**
 * Proyecto controller.
 *
 */
class ProyectoController extends Controller
{

    /**
     * Lists all Proyecto entities.
     *
     */
    public function totaltarea() {
        $em = $this->getDoctrine()->getManager();
        
        //cuento las tareas del proyecto
        $dql = "select x from ProyectoBundle:Tarea x";
        $query = $em->createQuery($dql);
        $tareas = $query->getResult();
        $totaltarea=array();
        
        //inicializo
        foreach ($tareas as $v) {
            $totaltarea[$v->getProyecto()->getId()]=0;
        }  
        //sumo
        foreach ($tareas as $v) {
            $totaltarea[$v->getProyecto()->getId()]=$totaltarea[$v->getProyecto()->getId()]+1;
        } 
        
        return $totaltarea;
        
    }
    
    public function generalAction()
    {
        $em = $this->getDoctrine()->getManager();
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
        
        //PARA MOSTRAR EN TABLAS
        $dql = "select x from ProyectoBundle:Proyecto x join x.nivelorganizacional no where no.codigo like :no order by x.estatus ASC";
        $query = $em->createQuery($dql);
        $query->setParameter('no',"%".$perfil->getNivelorganizacional()->getCodigo()."___");
        $entities = $query->getResult();
        
        //PARA MOSTRAR EN TARJETAS
        //obtengo los niveles
        $dql = "select x from UsuarioBundle:Nivelorganizacional x where x.codigo like :codigo order by x.codigo ASC";
        $query = $em->createQuery($dql);
        $query->setParameter('codigo',"%".$perfil->getNivelorganizacional()->getCodigo()."___");
        $niveles = $query->getResult();

        $dql = "select x from ProyectoBundle:Proyecto x join x.nivelorganizacional no where no.codigo like :no order by x.porcentaje ASC";
        $query = $em->createQuery($dql);
        $query->setParameter('no',"%".$perfil->getNivelorganizacional()->getCodigo()."___");
        $proyectos = $query->getResult();
        return $this->render('ProyectoBundle:Proyecto:general.html.twig', array(
            'entities' => $entities,
            'perfil'=>$perfil,
            'totaltarea'=>$this->totaltarea(),
            'niveles'=>$niveles,
            'proyectos'=>$proyectos
        ));  
    }
  
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        //$servicio = $this->get('Servicio');
        //$mensaje = $servicio->holamundo();
        
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
        
        $dql = "select x from ProyectoBundle:Proyecto x join x.nivelorganizacional no where no.codigo = :codigo";
        $query = $em->createQuery($dql);
        $query->setParameter('codigo',$perfil->getNivelorganizacional()->getCodigo());
        $entities = $query->getResult();
        
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $f=new Funcion; 
        $integrantes=$this->usuariounidad= $f->Usuariounidad($em,$idusuario);
        $responsable=null;
        foreach ($integrantes as $v) {
            $responsable[]=$v->getId();
        }
        
        $dql = "select x from ProyectoBundle:Actividad x join x.tarea t where x.ubicacion=1 and x.responsable in (:responsable) order by t.fechafinestimada ASC";
        $query = $em->createQuery($dql);
        $query->setParameter('responsable',$responsable);
        $actpendiente = $query->getResult();
        
        $dql = "select x from ProyectoBundle:Actividad x where x.ubicacion=2 and x.responsable in (:responsable)";
        $query = $em->createQuery($dql);
        $query->setParameter('responsable',$responsable);
        $actividades = $query->getResult();
        
        $dql = "select x from ProyectoBundle:Actividad x where x.ubicacion=3 and x.responsable in (:responsable)";
        $query = $em->createQuery($dql);
        $query->setParameter('responsable',$responsable);
        $revision = $query->getResult();
        
        $pf=new Proyectofunciones;
        foreach ($actividades as $a) {
            if($a->getCorreoretardoproceso()==false){
                $st=$pf->vertieactpro($em, $a);
                if($st==='true'){
                    $message = \Swift_Message::newInstance()   
                    ->setSubject('Proyectos-ActividadRetrasada')  
                    ->setFrom($perfil->getNivelorganizacional()->getCorreo())     // we configure the sender
                    ->setTo($a->getResponsable()->getUser()->getUsername()."@telesurtv.net")   
                    ->setBody( $this->renderView(
                            'ProyectoBundle:Correo:actividadretraso.html.twig',
                            array('actividad' => $a)
                        ), 'text/html');

                    $this->get('mailer')->send($message);    
                    
                    //comienzo el conteo
                    $query = $em->createQuery('update ProyectoBundle:Actividad x set x.correoretardoproceso=true WHERE x.id = :idactividad');             
                    $query->setParameter('idactividad', $a->getId());
                    $query->execute();  
                }
                


            }
        }
        
        
        
        
                
        return $this->render('ProyectoBundle:Proyecto:index.html.twig', array(
            'entities' => $entities,
            'perfil'=>$perfil,
            'totaltarea'=>$this->totaltarea(),
            'integrantes'=>$integrantes,
            'actividades'=>$actividades,
            'revision'=>$revision,
            'actpendiente'=>$actpendiente
        ));
        
        
        
    }
    /**
     * Creates a new Proyecto entity.
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        
        //genero formulario con los integrantes de la unidad
        $f=new Funcion; 
        $usuariounidad=$this->usuariounidad= $f->Usuariounidad($em,$idusuario);
        $entity = new Proyecto();
        $form = $this->createCreateForm($entity,$usuariounidad);
        $form->handleRequest($request);

        if ($form->isValid()) {
            
            //guardo valores por defecto
            $entity->setEstatus(1);
            $entity->setPorcentaje(0);
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            $entity->addNivelorganizacional($perfil->getNivelorganizacional());
            
            $em->persist($entity);
            $em->flush();

            
            $responsable=$entity->getResponsable();
            foreach ($responsable as $v) {
                $arrayresponsable[]=$v->getUser()->getUsername()."@telesurtv.net";
            }

            $message = \Swift_Message::newInstance()   
            ->setSubject('Proyectos')  
            ->setFrom($perfil->getNivelorganizacional()->getCorreo())     // we configure the sender
            ->setTo($arrayresponsable)   
            ->setBody( $this->renderView(
                    'ProyectoBundle:Correo:proyecto.html.twig',
                    array('proyecto' => $entity)
                ), 'text/html');

            $this->get('mailer')->send($message);   
            
            
            $this->get('session')->getFlashBag()->add('notice', 'Proyecto creado exitosamente.');
            return $this->redirect($this->generateUrl('proyecto_show', array('id' => $entity->getId())));
        }else $this->get('session')->getFlashBag()->add('alert', 'Ha ocurrido un error en el formulario.');


        
        return $this->render('ProyectoBundle:Proyecto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
public function creategeneralAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        
        //genero formulario con los integrantes de la unidad
        $f=new Funcion; 
        $usuariounidad=$this->usuariounidad= $f->Usuariounidad($em,$idusuario);
        $entity = new Proyectogeneral();
        $form = $this->createCreateFormGeneral($entity,$usuariounidad);
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $nombre=$entity->getNombre();
            $desc=$entity->getDescripcion();

            $nivel=$entity->getNivelorganizacional();

            $entity = new Proyecto();
            //guardo valores por defecto
            $entity->setNombre($nombre);
            $entity->setDescripcion($desc);
            foreach ($nivel as $v) {
                $entity->addNivelorganizacional($v);
            }
            $entity->setEstatus(1);
            $entity->setPorcentaje(0);
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            
            $em->persist($entity);
            $em->flush();

            foreach ($nivel as $v) {
                $message = \Swift_Message::newInstance()   
                ->setSubject('Proyectos')  
                ->setFrom($perfil->getUser()->getUsername()."@telesurtv.net")     // we configure the sender
                ->setTo($v->getCorreo())   
                ->setBody( $this->renderView(
                        'ProyectoBundle:Correo:proyecto.html.twig',
                        array('proyecto' => $entity)
                    ), 'text/html');

                $this->get('mailer')->send($message);   
            }
            
            
            $this->get('session')->getFlashBag()->add('notice', 'Proyecto creado exitosamente.');
            return $this->redirect($this->generateUrl('proyecto_general', array('id' => $entity->getId())));
        }

        return $this->render('ProyectoBundle:Proyecto:newgeneral.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Proyecto entity.
     *
     * @param Proyecto $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Proyecto $entity,$usuariounidad)
    {
        $form = $this->createForm(new ProyectoType($usuariounidad), $entity, array(
            'action' => $this->generateUrl('proyecto_create'),
            'method' => 'POST',
        ));

        return $form;
    }
    
    private function createCreateFormGeneral(Proyectogeneral $entity,$usuariounidad)
    {
        $form = $this->createForm(new ProyectogeneralType($usuariounidad), $entity, array(
            'action' => $this->generateUrl('proyecto_creategeneral'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Proyecto entity.
     *
     */
    public function newAction()
    {
        $em = $this->getDoctrine()->getManager();

        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $f=new Funcion; 
        $usuariounidad=$this->usuariounidad= $f->Usuariounidad($em,$idusuario);
        
        $entity = new Proyecto();
        $form   = $this->createCreateForm($entity,$usuariounidad);

        return $this->render('ProyectoBundle:Proyecto:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    /**
     * Displays a form to create a new Proyecto entity.
     *
     */
    public function newgeneralAction()
    {
        $em = $this->getDoctrine()->getManager();
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $f=new Funcion; 
        $usuariounidad=$this->usuariounidad= $f->Usuariounidad($em,$idusuario);
        
        $entity = new Proyectogeneral();
        $form = $this->createCreateFormGeneral($entity,$usuariounidad);
        
        return $this->render('ProyectoBundle:Proyecto:newgeneral.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Proyecto entity.
     *
     */
    public function showAction($id)
    {
        
        $em = $this->getDoctrine()->getManager();

        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        
        $entity = $em->getRepository('ProyectoBundle:Proyecto')->find($id);

        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProyectoBundle:Proyecto:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Proyecto entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $f=new Funcion; 
        $usuariounidad=$this->usuariounidad= $f->Usuariounidad($em,$idusuario);

        $entity = $em->getRepository('ProyectoBundle:Proyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proyecto entity.');
        }

        $editForm = $this->createEditForm($entity,$usuariounidad);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProyectoBundle:Proyecto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    /**
     * Displays a form to edit an existing Proyecto entity.
     *
     */
    public function editgeneralAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $f=new Funcion; 
        $usuariounidad=$this->usuariounidad= $f->Usuariounidad($em,$idusuario);

        $entity = $em->getRepository('ProyectoBundle:Proyecto')->find($id);
       
        $entityx = new Proyectogeneral($entity);
        $entityx->setNombre($entity->getNombre());
        $entityx->setDescripcion($entity->getDescripcion());
        foreach ($entity->getNivelorganizacional() as $v) {
            $entityx->addNivelorganizacional($v);
        }
                
        $editForm = $this->createEditFormGeneral($entityx,$id,$usuariounidad);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProyectoBundle:Proyecto:editgeneral.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
    * Creates a form to edit a Proyecto entity.
    *
    * @param Proyecto $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Proyecto $entity,$usuariounidad)
    {
        $form = $this->createForm(new ProyectoType($usuariounidad), $entity, array(
            'action' => $this->generateUrl('proyecto_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    
    private function createEditFormGeneral(Proyectogeneral $entity,$id,$usuariounidad)
    {
        $form = $this->createForm(new ProyectogeneralType($usuariounidad), $entity, array(
            'action' => $this->generateUrl('proyecto_update', array('id' => $id)),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Proyecto entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $f=new Funcion; 
        $usuariounidad=$this->usuariounidad= $f->Usuariounidad($em,$idusuario);


        $entity = $em->getRepository('ProyectoBundle:Proyecto')->find($id);

        //guardo el valor de las variables ya que no se envian por formulario
        $estatus=$entity->getEstatus();
        $porcentaje=$entity->getPorcentaje();
        $fechainicio=$entity->getFechainicio();
        $fechafin=$entity->getFechafin();
        $nivelorg=$entity->getNivelorganizacional();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity,$usuariounidad);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            $entity->setEstatus($estatus);
            $entity->setPorcentaje($porcentaje);
            $entity->setFechainicio($fechainicio);
            $entity->setFechafin($fechafin);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('notice', 'Proyecto editado exitosamente.');
            return $this->redirect($this->generateUrl('proyecto_show', array('id' => $id)));
        }

        return $this->render('ProyectoBundle:Proyecto:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    public function updategeneralAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $f=new Funcion; 
        $usuariounidad=$this->usuariounidad= $f->Usuariounidad($em,$idusuario);

        $entity = $em->getRepository('ProyectoBundle:Proyecto')->find($id);

        //guardo el valor de las variables ya que no se envian por formulario
        $estatus=$entity->getEstatus();
        $porcentaje=$entity->getPorcentaje();
        $fechainicio=$entity->getFechainicio();
        $fechafin=$entity->getFechafin();

        //envio los dato de la entidad asi porque proyecto general no es una entity de la bd
        $entityx = new Proyectogeneral();
        $entityx->setNombre($entity->getNombre());
        $entityx->setDescripcion($entity->getDescripcion());
        foreach ($entity->getNivelorganizacional() as $v) {
            $entityx->addNivelorganizacional($v);
        }
        
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditFormGeneral($entityx,$id,$usuariounidad);
        $editForm->handleRequest($request);
        
        if ($editForm->isValid()) {

            $entity->setNombre($editForm->getData()->getNombre());
            $entity->setDescripcion($editForm->getData()->getDescripcion());
            $entity->setEstatus($estatus);
            $entity->setPorcentaje($porcentaje);
            $entity->setFechainicio($fechainicio);
            $entity->setFechafin($fechafin);
            foreach ($editForm->getData()->getNivelorganizacional() as $v) {
                $entity->removeNivelorganizacional($v);
                $entity->addNivelorganizacional($v);
            }
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('notice', 'Proyecto editado exitosamente.');
            return $this->redirect($this->generateUrl('proyecto_editgeneral', array('id' => $id)));
        }

        return $this->render('ProyectoBundle:Proyecto:editgeneral.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Proyecto entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProyectoBundle:Proyecto')->find($id);
            $tareas=$em->getRepository('ProyectoBundle:Tarea')->findByProyecto($entity->getId());

            if(!empty($tareas)){
                $this->get('session')->getFlashBag()->add('alert', 'No puede borrar el proyecto porque tiene tareas asignadas.');
            }else{

                if (!$entity) {
                    throw $this->createNotFoundException('Unable to find Proyecto entity.');
                }

                $em->remove($entity);
                $em->flush();
                $this->get('session')->getFlashBag()->add('notice', 'Borrado exitoso.');
            }
        }
        
        
        if ($this->get('security.context')->isGranted('ROLE_PROYECTO_GENERAL')) {
            return $this->redirect($this->generateUrl('proyecto_general'));
        }else return $this->redirect($this->generateUrl('proyecto'));
    }

    /**
     * Creates a form to delete a Proyecto entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proyecto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'BORRAR'))
            ->getForm()
        ;
    }
}
