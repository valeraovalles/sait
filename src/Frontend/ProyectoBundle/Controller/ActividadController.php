<?php

namespace Frontend\ProyectoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\ProyectoBundle\Entity\Actividad;
use Frontend\ProyectoBundle\Form\ActividadType;

use Administracion\UsuarioBundle\Resources\Misclases\Funcion;

/**
 * Actividad controller.
 *
 */
class ActividadController extends Controller
{


    //se llama desde el index de la actividad
    public function estatustarea($idtarea){
        $estatus=1;
        
        $em = $this->getDoctrine()->getManager();
        
        //busco si hay en proceso
        $dql = "select x from ProyectoBundle:Actividad x where x.tarea= :idtarea";
        $query = $em->createQuery($dql);
        $query->setParameter('idtarea',$idtarea);
        $act = $query->getResult();
        
        $nuevo=false;$proceso=false;$revision=false;$culminado=false;$dependencia=false;
        foreach ($act as $a) {
            if($a->getUbicacion()==1)$nuevo=true;  
            if($a->getUbicacion()==2)$proceso=true;
            if($a->getUbicacion()==3)$revision=true;
            if($a->getUbicacion()==4)$culminado=true;
            if($a->getUbicacion()==5)$dependencia=true;
        }
        
        //si hay en proceso
        if($proceso==true or $revision==true or $dependencia==true)$estatus=2;
        //si estan nuevos pero hay cerrados
        else if($proceso==false and $revision==false and $dependencia==false and $nuevo==true and $culminado==true)$estatus=2;
        //si solo hay cerrados
        else if($culminado=true and $nuevo==false and $proceso==false and $revision==false and $dependencia==false)$estatus=3;

        //actualizo campos en ticket
        $query = $em->createQuery('update ProyectoBundle:Tarea x set x.estatus= :estatus WHERE x.id = :idtarea');
        $query->setParameter('estatus', $estatus);
        $query->setParameter('idtarea', $idtarea);
        $query->execute();  
    }
    

    //se llama desde el index de la actividad
    public function estatusproyecto($idproyecto){
        $em = $this->getDoctrine()->getManager();
        
            //busco si solo hay en proceso, revicion o dependencia
            $dql = "select x from ProyectoBundle:Tarea x where x.proyecto= :idproyecto and x.estatus!=1 and x.estatus!=3";
            $query = $em->createQuery($dql);
            $query->setParameter('idproyecto',$idproyecto);
            $act = $query->getResult();
        if(!empty($act))$estatus=2;
        else{
            //busco solo hay cerrados
            $dql = "select x from ProyectoBundle:Tarea x where x.proyecto= :idproyecto and x.estatus=3 and x.estatus!=1 and x.estatus!=2";
            $query = $em->createQuery($dql);
            $query->setParameter('idproyecto',$idproyecto);
            $act = $query->getResult();
            if(!empty($act))$estatus=3;
            else $estatus=1;
        }
        
            //actualizo campos en ticket
            $query = $em->createQuery('update ProyectoBundle:Proyecto x set x.estatus= :estatus WHERE x.id = :idproyecto');
            $query->setParameter('estatus', $estatus);
            $query->setParameter('idproyecto', $idproyecto);
            $query->execute();  
    }
    
    //se llama desde el index de la actividad
    public function porcentajeproyecto($idproyecto){

        //actividades
        $em = $this->getDoctrine()->getManager();
        
        //cuento las actividades cerradas
        $dql = "select count(x) from ProyectoBundle:Actividad x join x.tarea t where t.proyecto = :idproyecto and (x.ubicacion=4 or x.ubicacion=3)";
        $query = $em->createQuery($dql);
        $query->setParameter('idproyecto',$idproyecto);
        $totalcerrado = $query->getSingleResult();
        
        //cuento actividades abiertas
        $dql = "select count(x) from ProyectoBundle:Actividad x join x.tarea t where t.proyecto = :idproyecto and x.ubicacion!=4 and x.ubicacion!=3";
        $query = $em->createQuery($dql);
        $query->setParameter('idproyecto',$idproyecto);
        $totalabierto = $query->getSingleResult();

        $total=$totalcerrado[1]+$totalabierto[1];
        
        if($total!=0)
        $porcentaje=($totalcerrado[1]*100)/$total;
        else $porcentaje=0;
        
        //actualizo campos en ticket
        $query = $em->createQuery('update ProyectoBundle:Proyecto x set x.porcentaje= :porcentaje WHERE x.id = :idproyecto');
        $query->setParameter('porcentaje', number_format($porcentaje,0));
        $query->setParameter('idproyecto', $idproyecto);
        $query->execute(); 

    }
    
    //se llama desde el index de la actividad
    public function porcentajetarea($idtarea){
        //actividades
        //
        $em = $this->getDoctrine()->getManager();
        
        //busco la fecha mas baja de las tareas para que sea la fecha de inicio del proyecto
        $dql = "select count(x) from ProyectoBundle:Actividad x where x.tarea= :idtarea and (x.ubicacion=4 or x.ubicacion=3)";
        $query = $em->createQuery($dql);
        $query->setParameter('idtarea',$idtarea);
        $totalcerrado = $query->getSingleResult();
        
        $dql = "select count(x) from ProyectoBundle:Actividad x where x.tarea= :idtarea and x.ubicacion<>4 and x.ubicacion<>3";
        $query = $em->createQuery($dql);
        $query->setParameter('idtarea',$idtarea);
        $totalabierto = $query->getSingleResult();

        $total=$totalcerrado[1]+$totalabierto[1];
        
        if($total!=0)
        $porcentaje=($totalcerrado[1]*100)/$total;
        else $porcentaje=0;
        
        //actualizo campos en ticket
        $query = $em->createQuery('update ProyectoBundle:Tarea x set x.porcentaje= :porcentaje WHERE x.id = :idtarea');
        $query->setParameter('porcentaje', number_format($porcentaje,0));
        $query->setParameter('idtarea', $idtarea);
        $query->execute(); 

    }
    

    //se llama al crear o borrar una actividad
    public function fechafintarea($idtarea){
        
        $em = $this->getDoctrine()->getManager();
        
        //busco la fecha de inicio
        $tarea = $em->getRepository('ProyectoBundle:Tarea')->find($idtarea);
        $fechainicio = $tarea->getFechainicio()->format("Y-m-d");
        
        //sumo tiempo de las actividades
        $dql = "select x from ProyectoBundle:Actividad x where x.tarea= :idtarea";
        $query = $em->createQuery($dql);
        $query->setParameter('idtarea',$idtarea);
        $actividad = $query->getResult();
        
        if(empty($actividad)){ $nuevafecha=null;die;}
        else{       
            //calculo tiempo de dias horas y minutos
            $dias=0;$horas=0;$minutos=0;
            foreach ($actividad as $t) {
                if($t->getTipotiempo()==1){
                    $dias=$dias+$t->getTiempoestimado();
                }
                else if($t->getTipotiempo()==2){
                    $horas=$horas+$t->getTiempoestimado();
                }
                else if($t->getTipotiempo()==3){
                    $minutos=$minutos+$t->getTiempoestimado();
                }
            }

            $diashoras=$horas/24;
            $minutosdias=$minutos/1440;

            //redondeo hacia arriba
            $totaldias=ceil($dias+$diashoras+$minutosdias);
        
            $nuevafecha = strtotime ( '+'.$totaldias.' day' , strtotime ( $fechainicio ) ) ;
            $nuevafecha = date ( 'Y-m-d' , $nuevafecha );
        }

        //actualizo nuevafecha
        $query = $em->createQuery('update ProyectoBundle:Tarea x set x.fechafinestimada= :ffe WHERE x.id = :idtarea');
        $query->setParameter('ffe', $nuevafecha);
        $query->setParameter('idtarea', $idtarea);
        $query->execute(); 
        
    }
    
    //se llama al crear o borrar una actividad
    public function fechafinproyecto($idproyecto){

        $em = $this->getDoctrine()->getManager();
        
        //busco la fecha mas baja de las tareas para que sea la fecha de inicio del proyecto
        $dql = "select max(x.fechafinestimada) from ProyectoBundle:Tarea x where x.proyecto= :idproyecto";
        $query = $em->createQuery($dql);
        $query->setParameter('idproyecto',$idproyecto);
        $tarea = $query->getResult();
        
        if(!empty($tarea))
            $fechafin=$tarea[0][1];
        else $fechafin=null;

        //actualizo campos en proyecto
        $query = $em->createQuery('update ProyectoBundle:Proyecto x set x.fechafinestimada= :ffe WHERE x.id = :idproyecto');
        $query->setParameter('ffe', $fechafin);
        $query->setParameter('idproyecto', $idproyecto);
        $query->execute();

    }
    
    //se llama al crear o borrar una actividad
    public function actualiza($idtarea){
        
        $em = $this->getDoctrine()->getManager();
        $tarea = $em->getRepository('ProyectoBundle:Tarea')->find($idtarea);
        
        $idtarea=$tarea->getId();
        $idproyecto=$tarea->getProyecto()->getId();
        $this->fechafintarea($idtarea);
        $this->fechafinproyecto($idproyecto); 
        
    }



    /**
     * Lists all Actividad entities.
     *
     */
    public function indexAction($idtarea)
    {
        $em = $this->getDoctrine()->getManager();

        $tarea = $em->getRepository('ProyectoBundle:Tarea')->find($idtarea);
        $entities = $em->getRepository('ProyectoBundle:Actividad')->findBy(array('tarea'=>$tarea), array('id' => 'ASC'));
        
        //actualizo el estatus de las tareas si hay o no actividades
        $this->estatustarea($idtarea);
        $this->estatusproyecto($tarea->getProyecto()->getId());
        $this->porcentajetarea($idtarea);
        $this->porcentajeproyecto($tarea->getProyecto()->getId());
        

        return $this->render('ProyectoBundle:Actividad:index.html.twig', array(
            'entities' => $entities,
            'tarea'=>$tarea,
        ));
    }
    
    /**
     * Lists all Actividad entities.
     *
     */
    public function generalAction($idtarea)
    {
        $em = $this->getDoctrine()->getManager();

        $tarea = $em->getRepository('ProyectoBundle:Tarea')->find($idtarea);
        $entities = $em->getRepository('ProyectoBundle:Actividad')->findBy(array('tarea'=>$tarea), array('id' => 'ASC'));
        
        return $this->render('ProyectoBundle:Actividad:general.html.twig', array(
            'entities' => $entities,
            'tarea'=>$tarea,
        ));
    }
    /**
     * Creates a new Actividad entity.
     *
     */
    public function createAction(Request $request,$idtarea)
    {
        $em = $this->getDoctrine()->getManager();

        //genero formulario con los integrantes de la unidad
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $f=new Funcion; 
        $usuariounidad=$this->usuariounidad= $f->Usuariounidad($em,$idusuario);
        
        $tarea = $em->getRepository('ProyectoBundle:Tarea')->find($idtarea);
        
        $entity = new Actividad();
        $form = $this->createCreateForm($entity,$idtarea,$usuariounidad);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setUbicacion(1);
            $entity->setTarea($tarea);
            $entity->setEstatuscomienzo(false);
            $entity->setEstatusfin(false);
            $em->persist($entity);
            $em->flush();

            
            return $this->redirect($this->generateUrl('actividad_show', array('id' => $entity->getId())));
        }

        return $this->render('ProyectoBundle:Actividad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'tarea'=>$tarea,
            'idusuario'=>$idusuario
        ));
    }

    /**
     * Creates a form to create a Actividad entity.
     *
     * @param Actividad $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Actividad $entity,$idtarea,$usuariounidad)
    {
        $form = $this->createForm(new ActividadType($usuariounidad), $entity, array(
            'action' => $this->generateUrl('actividad_create',array('idtarea'=>$idtarea)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Actividad entity.
     *
     */
    public function newAction($idtarea)
    {
        $em = $this->getDoctrine()->getManager();
        $tarea = $em->getRepository('ProyectoBundle:Tarea')->find($idtarea);
        
        //genero formulario con los integrantes de la unidad
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $f=new Funcion; 
        $usuariounidad=$this->usuariounidad= $f->Usuariounidad($em,$idusuario);
        
        $entity = new Actividad();
        $form   = $this->createCreateForm($entity,$idtarea,$usuariounidad);
        return $this->render('ProyectoBundle:Actividad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'tarea'=>$tarea,
            'idusuario'=>$idusuario
        ));
    }

    /**
     * Finds and displays a Actividad entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoBundle:Actividad')->find($id);

        $this->actualiza($entity->getTarea()->getId());
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actividad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProyectoBundle:Actividad:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

        public function showgeneralAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ProyectoBundle:Actividad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actividad entity.');
        }

        return $this->render('ProyectoBundle:Actividad:showgeneral.html.twig', array(
            'entity'      => $entity,
        ));
    }
    public function ubicacionAction($id,$direccion)
    {
        $em = $this->getDoctrine()->getManager();
        $act = $em->getRepository('ProyectoBundle:Actividad')->find($id);
        $num=$act->getUbicacion();
     
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        
        //valido que el que mueva la tarjeta sea unicamente el responsable
        if($act->getResponsable()->getId()!=$idusuario){
              $this->get('session')->getFlashBag()->add('alert', 'Usted no es el responsable de esta actividad, por lo tanto no puede moverla.');
             return $this->redirect($this->generateUrl('actividad', array('idtarea'=>$act->getTarea()->getId()))); 
        }
        
        
        //va directo a dependencia
        if($direccion=='dep')$num=5;
        //sale de dependencia
        else if($direccion=='enpro')$num=2;
        
        else if($direccion=='der' and $num!=4)$num=$num+1;
        else if($direccion=='izq' and $num!=1) $num=$num-1;
        
        //wn proceso
        if($num==2){
            //busco si solo hay en proceso, revision o dependencia
            $dql = "select x from ProyectoBundle:Actividad x where x.responsable= :idresponsable and x.tarea= :idtarea and x.ubicacion=2";
            $query = $em->createQuery($dql);
            $query->setParameter('idresponsable',$act->getResponsable()->getId());
            $query->setParameter('idtarea',$act->getTarea()->getId());
            $actx = $query->getResult();

            if(!empty($actx)){
              $this->get('session')->getFlashBag()->add('alert', 'Debe culminar la actividad en curso y si esta depende de algún otro proceso debe colocarla como dependiente.');
             return $this->redirect($this->generateUrl('actividad', array('idtarea'=>$act->getTarea()->getId())));
           }   
           
            //comienzo el conteo
            $fa=new \DateTime(\date("d-m-Y G:i:s"));
            $query = $em->createQuery('update ProyectoBundle:Actividad x set x.comienzo= :comienzo, x.estatuscomienzo=true WHERE x.estatuscomienzo=false and x.id = :idactividad');
            $query->setParameter('comienzo',$fa);
            $query->setParameter('idactividad', $id);
            $query->execute();  
            
            //comienzo el conteo y pongo null en caso de que se haya guardado el fin
            $fa=new \DateTime(\date("d-m-Y G:i:s"));
            $query = $em->createQuery('update ProyectoBundle:Actividad x set x.fin=null,x.estatusfin=false,x.tiemporeal=null WHERE x.id = :idactividad');
            $query->setParameter('comienzo',$fa);
            $query->setParameter('idactividad', $id);
            $query->execute();  
        }

        //actualizo campos en actividades
        $query = $em->createQuery('update ProyectoBundle:Actividad x set x.ubicacion= :ubicacion WHERE x.id = :idactividad');
        $query->setParameter('ubicacion', $num);
        $query->setParameter('idactividad', $id);
        $query->execute(); 
        
        if($num==3){
          
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            
            $message = \Swift_Message::newInstance()   
            ->setSubject('Proyectos-Revisión de Actividad')  
            ->setFrom($perfil->getNivelorganizacional()->getCorreo())     // we configure the sender
            ->setTo($perfil->getNivelorganizacional()->getCorreo())   
            ->setBody( $this->renderView(
                    'ProyectoBundle:Correo:revisionactividad.html.twig',
                    array('actividad' => $act)
                ), 'text/html');

            $this->get('mailer')->send($message);  
            
            //fecha fin y tiempo real
            $comienzo=new \DateTime($act->getComienzo()->format("d-m-Y G:i:s"));
            $fa=new \DateTime(\date("d-m-Y G:i:s"));
            $intervalo=$comienzo->diff($fa);
            //comienzo el conteo
            $fa=new \DateTime(\date("d-m-Y G:i:s"));
            $query = $em->createQuery('update ProyectoBundle:Actividad x set x.fin= :fin, x.estatusfin=true, x.tiemporeal= :tr WHERE x.estatusfin!=true and x.id = :idactividad');
            $query->setParameter('fin',$fa);
            $query->setParameter('tr',$intervalo->d.'-'.$intervalo->h.'-'.$intervalo->i.'-'.$intervalo->s);
            $query->setParameter('idactividad', $id);
            $query->execute();  
        }
        
        else if($num==1){
            $query = $em->createQuery('update ProyectoBundle:Actividad x set x.comienzo=null, x.estatuscomienzo=false, x.tiemporeal= null,x.fin=null,x.estatusfin=false WHERE x.id = :idactividad');
            $query->setParameter('idactividad', $id);
            $query->execute();              
        }
        
        else if ($num==5){
            //comienzo el conteo y pongo null en caso de que se haya guardado el fin
            $fa=new \DateTime(\date("d-m-Y G:i:s"));
            $query = $em->createQuery('update ProyectoBundle:Actividad x set x.comienzo= :comienzo, x.estatuscomienzo=true WHERE x.estatuscomienzo=false and x.id = :idactividad');
            $query->setParameter('comienzo',$fa);
            $query->setParameter('idactividad', $id);
            $query->execute();  
            
            //comienzo el conteo y pongo null en caso de que se haya guardado el fin
            $fa=new \DateTime(\date("d-m-Y G:i:s"));
            $query = $em->createQuery('update ProyectoBundle:Actividad x set x.fin=null,x.estatusfin=false,x.tiemporeal=null WHERE x.id = :idactividad');
            $query->setParameter('comienzo',$fa);
            $query->setParameter('idactividad', $id);
            $query->execute();  
        }
        
        
        
        return $this->redirect($this->generateUrl('actividad', array('idtarea' => $act->getTarea()->getId())));
    }
    /**
     * Displays a form to edit an existing Actividad entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        //genero formulario con los integrantes de la unidad
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $f=new Funcion; 
        $usuariounidad=$this->usuariounidad= $f->Usuariounidad($em,$idusuario);
        
        $entity = $em->getRepository('ProyectoBundle:Actividad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actividad entity.');
        }

        $editForm = $this->createEditForm($entity,$usuariounidad);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ProyectoBundle:Actividad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Actividad entity.
    *
    * @param Actividad $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Actividad $entity,$usuariounidad)
    {
        $form = $this->createForm(new ActividadType($usuariounidad), $entity, array(
            'action' => $this->generateUrl('actividad_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Actividad entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        
        //genero formulario con los integrantes de la unidad
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $f=new Funcion; 
        $usuariounidad=$this->usuariounidad= $f->Usuariounidad($em,$idusuario);
        
        $entity = $em->getRepository('ProyectoBundle:Actividad')->find($id);
        $ubicacion=$entity->getUbicacion();
        $tarea=$entity->getTarea();
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Actividad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity,$usuariounidad);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->setUbicacion($ubicacion);
            $entity->setTarea($tarea);
            $em->flush();
            return $this->redirect($this->generateUrl('actividad_show', array('id' => $id)));
        }

        return $this->render('ProyectoBundle:Actividad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Actividad entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ProyectoBundle:Actividad')->find($id);
            $idtarea=$entity->getTarea()->getId();

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Actividad entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->actualiza($idtarea);
        }

        return $this->redirect($this->generateUrl('actividad',array('idtarea'=>$idtarea)));
    }

    /**
     * Creates a form to delete a Actividad entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actividad_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'BORRAR'))
            ->getForm()
        ;
    }
}
