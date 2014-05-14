<?php

namespace Frontend\TransporteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Administracion\UsuarioBundle\Entity\Perfil;
use Administracion\UsuarioBundle\Entity\User;

use Frontend\TransporteBundle\Entity\Solicitudes;
use Frontend\TransporteBundle\Form\SolicitudesType;

use Frontend\TransporteBundle\Entity\Vehiculos;
use Frontend\TransporteBundle\Form\VehiculosType;

use Doctrine\ORM\EntityRepository;

/**
 * Solicitudes controller.
 *
 */
class SolicitudesController extends Controller
{

    /**
     * Lists all Solicitudes entities.
     *
     */
    public function indexAction($accion="none") //All por defecto
    {
        $em = $this->getDoctrine()->getManager();
        
        $dql = "select u from TransporteBundle:Vehiculos u where u.estatus = :status ";
        $query = $em->createQuery($dql);
        $query->setParameter('status',1);          
        $vehiculos = $query->getResult();  
        //print_r($vehiculos);

        if ($accion=="none"){
            $entities = $em->getRepository('TransporteBundle:Solicitudes')->findAll();
        }
        if ($accion=="Apro"){
            $entities = $em->getRepository('TransporteBundle:Solicitudes')->findByEstatus("N");
        }
        if ($accion=="Culm"){
            $entities = $em->getRepository('TransporteBundle:Solicitudes')->findByEstatus("AP");
        }     
        
        return $this->render('TransporteBundle:Solicitudes:index.html.twig', array(
            'entities' => $entities,
            'vehiculos' => $vehiculos,
            'accion' => $accion
        ));
    }
    /**
     * Creates a new Solicitudes entity.
     *
     */
    public function createAction(Request $request)
    {
        //public $listaAsi=""; 
        $entity  = new Solicitudes();
        $form = $this->createForm(new SolicitudesType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $usuario = $em->getRepository('UsuarioBundle:User')->find($idusuario);
            $entity->setIdSolicitante($usuario);
            $str = \date("Y-m-d");
            $fechaactual = \DateTime::createFromFormat('Y-m-d', $str);                        
            $entity->setFechaSolicitud($fechaactual);
            $entity->setEstatus("N");        
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'EL REGISTRO FUE CREADO CON EXITO');
            //CORREO
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            $from=$usuario->getUsername().'@telesurtv.net';
            $message = \Swift_Message::newInstance()     // we create a new instance of the Swift_Message class
            ->setSubject('Solicitud de Transporte')     // we configure the title
            ->setFrom(array($usuario->getUsername().'@telesurtv.net'))     // we configure the sender
            ->setTo('jmangarret@telesurtv.net')    // we configure the recipient
            ->setBody( $this->renderView(
                        'TransporteBundle:Correo:solicitud_transporte.html.twig',
                        array('perfil' => $perfil,
                            'solicitud' => $entity,
                        )
                    ), 
            'text/html');
            /* PARA VER LA VISTA EN LA PAG
             return $this->render('TransporteBundle:Correo:solicitud_transporte.html.twig', array(
                            'solicitud' => $entity,
                            'perfil' => $perfil,                            
                        ));
            */
            $this->get('mailer')->send($message); 
            //FIN CORREO
            return $this->redirect($this->generateUrl('solicitudes_show', array('id' => $entity->getId())));
        }else{
            $datos=$request->request->all();
            print_r($datos);         
        }
        return $this->render('TransporteBundle:Solicitudes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Solicitudes entity.
     *
     */
    public function newAction()
    {
        $entity = new Solicitudes();
        $form   = $this->createForm(new SolicitudesType(), $entity);
   
        return $this->render('TransporteBundle:Solicitudes:new.html.twig', array(
            'entity' => $entity,
          //  'usuarios' => $usuarios,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Solicitudes entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:Solicitudes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Solicitudes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TransporteBundle:Solicitudes:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Solicitudes entity.
     *
     */
    public function editAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:Solicitudes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('La solicitud no existe.');
        }

        $editForm = $this->createForm(new SolicitudesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);
        if($this->get('security.context')->isGranted('ROLE_TRANSPORTE'))
        {
            return $this->render('TransporteBundle:Solicitudes:edit.html.twig', array(
                'entity'      => $entity,
                'edit_form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
            ));
        }else{
            $this->get('session')->getFlashBag()->add('alert', 'NO TIENE PERMISOS PARA EDITAR LA SOLICITUD');
            return $this->redirect($this->generateUrl('solicitudes_show', array('id' => $id)));
        }
    }

    /**
     * Edits an existing Solicitudes entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
   
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('TransporteBundle:Solicitudes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Solicitudes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SolicitudesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'LA SOLICITUD FUE MODIFICADA CON EXITO');
            return $this->redirect($this->generateUrl('solicitudes_show', array('id' => $id)));
        }else{
            $errors = $editForm->getErrors();            
            if (count($errors)>0){
                $result['errors'] = array();
                foreach ($errors as $error) {
                    $result['errors'][] = $error->getMessage();
                }
            }
            $this->get('session')->getFlashBag()->add('alert', 'ERROR AL VALIDAR FORMULARIO: '.$result['errors'][0]);

        }
        return $this->render('TransporteBundle:Solicitudes:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Solicitudes entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TransporteBundle:Solicitudes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Solicitudes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('solicitudes'));
    }

    /**
     * Creates a form to delete a Solicitudes entity by id.
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

     public function statusAction($id, $accion)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:Solicitudes')->find($id);
        $entity->setEstatus($accion);
        $em->persist($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('solicitudes_show', array('id' => $id)));
                
    }

    public function rechazarAction($id, Request $request){        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('TransporteBundle:Solicitudes')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('La solicitud no existe.');
        }
        $justificar_form = $this->createForm(new SolicitudesType(), $entity);  
     
        if($request->getMethod()=='PUT'){            
            $datos=$request->request->all();
            $datos=$datos['form_solicitud']; 
            if($datos['justificacionRechazo']==null){
                $this->get('session')->getFlashBag()->add('alert', 'DEBE ESCRIBIR UNA JUSTIFICACION');
                return $this->redirect($this->generateUrl('solicitudes_rechazar',array('id'=>$id)));
            }            
            $query = $em->createQuery('update TransporteBundle:Solicitudes s set s.justificacionRechazo=:justificacion, s.estatus=:estatus WHERE s.id = :idsol');
            $query->setParameter('estatus', 'R');            
            $query->setParameter('justificacion', $datos['justificacionRechazo']);
            $query->setParameter('idsol', $id);
            $query->execute();
            $this->get('session')->getFlashBag()->add('alert', 'LA SOLICITUD FUE RECHAZADA CON EXITO');
            return $this->redirect($this->generateUrl('solicitudes_show', array('id' => $id)));
                     
        }
        return $this->render('TransporteBundle:Solicitudes:justificar.html.twig', array(
            'entity'      => $entity,
            'justificar_form'   => $justificar_form->createView(),
            'id' => $id
        ));        
    }

    public function ajaxListaUsuariosAction($val)
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "select u from UsuarioBundle:Perfil u where u.primerNombre like :nombre or u.primerApellido like :ape ";
        $query = $em->createQuery($dql);
        $query->setParameter('nombre','%'.$val.'%');
        $query->setParameter('ape','%'.$val.'%');
        $query->setMaxResults(10);
        $usuarios = $query->getResult();             
        return $this->render('TransporteBundle:Solicitudes:ajaxlistausuarios.html.twig',array('usuarios'=>$usuarios, 'tipo'=>'I'));

    }
    public function ajaxListaExternosAction($val)
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "select e from TransporteBundle:personalExterno e where e.nombre like :nombre ";
        $query = $em->createQuery($dql);
        $query->setParameter('nombre','%'.$val.'%');        
        $query->setMaxResults(10);
        $usuarios = $query->getResult();             
        return $this->render('TransporteBundle:Solicitudes:ajaxlistausuarios.html.twig',array('usuarios'=>$usuarios, 'tipo'=>'E'));

    }
}
