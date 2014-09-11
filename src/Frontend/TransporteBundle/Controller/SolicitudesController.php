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
use Frontend\TransporteBundle\Form\AsignacionesType;
use Frontend\TransporteBundle\Entity\Asignaciones;
use Frontend\TransporteBundle\Entity\personalExterno;

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
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('TransporteBundle:Solicitudes')->findAll();
        
        return $this->render('TransporteBundle:Solicitudes:index.html.twig', array(
            'entities' => $entities
        ));
    }
    
    public function missolicitudesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $IdUsuario = $this->get('security.context')->getToken()->getUser()->getId();
        $entities = $em->getRepository('TransporteBundle:Solicitudes')->findByIdSolicitante($IdUsuario);

        return $this->render('TransporteBundle:Solicitudes:missolicitudesindex.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Solicitudes entity.
     *
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entity  = new Solicitudes();
        $form = $this->createForm(new SolicitudesType(), $entity);
        $form->bind($request);     

        if ($form->isValid()) 
        {

            // OBTENGO LOS DATOS DEL FORMULARIO AJAX
            $datos=$request->request->all();
            $datos=$datos['form_solicitud'];

            if(!empty($datos['asistentes']))
            {
                $datos=explode("@", $datos['asistentes']);
                $codigos = NULL;
                foreach ($datos as $key) 
                {
                    if ( stripos($key,'-') !== FALSE ) 
                    {   
                        if($codigos == NULL)
                        {
                            $codigos = $key;
                        }else
                        {
                            $codigos = $codigos.",".$key;
                        }
                    }            
                }

                $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
                $usuario = $em->getRepository('UsuarioBundle:User')->find($idusuario);
                $entity->setIdSolicitante($usuario);

                $str = \date("Y-m-d");
                $fechaactual = \DateTime::createFromFormat('Y-m-d', $str);                        
                $entity->setFechaSolicitud($fechaactual);

                $entity->setEstatus("N"); 

                $entity->setAsistentes($codigos);

                $em->persist($entity);
                $em->flush();
                $this->get('session')->getFlashBag()->add('notice', 'EL REGISTRO FUE CREADO CON EXITO');
                
                //CORREO
                $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
                $usuario = $em->getRepository('UsuarioBundle:User')->find($idusuario);
            
                $message = \Swift_Message::newInstance()     // we create a new instance of the Swift_Message class
                ->setSubject('Solicitud de transporte')
                ->setTo(array($usuario->getUsername().'@telesurtv.net', 'transporte@telesurtv.net'))
                ->setFrom('app_transporte@telesurtv.net')    // we configure the recipient
                ->setBody( $this->renderView(
                        'TransporteBundle:Correo:solicitud_transporte.html.twig',
                        array('perfil' => $perfil,
                            'solicitud' => $entity,
                            'status' => $estatus,
                        )
                    ), 
                'text/html');
                 $this->get('mailer')->send($message); 
                //FIN CORREO
                
                return $this->redirect($this->generateUrl('showmissolicitudes', array('id' => $entity->getId())));
            }else
            {
                $this->get('session')->getFlashBag()->add('alert', 'DEBE SELECCIONAR COMO MÍNIMO UN ASISTENTE');
 
            }                
        }else
        {            
            $this->get('session')->getFlashBag()->add('alert', 'ERROR EN EL FORMULARIO AL CREAR SOLICITUD');
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
        
        $form1 = $this->createFormBuilder()
                ->add('buscar', 'text')
                ->getForm();



        return $this->render('TransporteBundle:Solicitudes:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'form1'   => $form1->createView(),
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
            throw $this->createNotFoundException('La solicitud no existe.');
        }

        $asistentes=explode(",", $entity->getAsistentes());
        $i = 0;
        foreach ($asistentes as $key) {
            $usuarios[$i] = explode("-", $key);
            if($usuarios[$i][1] == 'I')
            {
                $user = $em->getRepository('UsuarioBundle:Perfil')->findByUser($usuarios[$i][0]);
                $users[$i] = $user[0];
                $campo[$i]= $users[$i]->getPrimerNombre()." ".$users[$i]->getPrimerApellido()." C.I: ".$users[$i]->getCedula();
            }else
            {
                $user = $em->getRepository('TransporteBundle:PersonalExterno')->find($usuarios[$i][0]);
                $campo[$i]= $users[$i]->getNombre()." C.I: ".$users[$i]->getCedula();
            }
            $i++;
        }

        $form = $this->createFormBuilder()
            ->add('estatus','choice',array( 'choices'   =>array( 'S' => 'Seleccione..', 'AP'=>'Aprobar', 'R'=>'Rechazar' ) ) )
            ->getForm();
       
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TransporteBundle:Solicitudes:show.html.twig', array(
            'entity'      => $entity,   
            'form'        => $form->createView(),  
            'campo'       => $campo,   
            'delete_form' => $deleteForm->createView(),        ));
    }

    public function ajaxapruebarechazaAction($datos)
    {

        $form = $this->createFormBuilder()
            ->add('justificacion','textarea')
            ->getForm();          

        return $this->render('TransporteBundle:Solicitudes:ajaxapruebarechaza.html.twig', array(
            'datos'   => $datos, 
            'form'    => $form->createView(),            ));
    }


    /**
     * Finds and displays a Solicitudes entity.
     *
     */
    public function showmissolicitudesAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TransporteBundle:Solicitudes')->find($id);
      
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Solicitudes entity.');
        }

        $asistentes=explode(",", $entity->getAsistentes());
        $i = 0;
        foreach ($asistentes as $key) {
            $usuarios[$i] = explode("-", $key);
            if($usuarios[$i][1] == 'I')
            {
                $user = $em->getRepository('UsuarioBundle:Perfil')->findByUser($usuarios[$i][0]);
                $users[$i] = $user[0];
                $campo[$i]= $users[$i]->getPrimerNombre()." ".$users[$i]->getPrimerApellido()." C.I: ".$users[$i]->getCedula();
            }else
            {
                $user = $em->getRepository('TransporteBundle:PersonalExterno')->find($usuarios[$i][0]);
                $campo[$i]= $users[$i]->getNombre()." C.I: ".$users[$i]->getCedula();
            }
            $i++;
        }


        $deleteForm = $this->createDeleteForm($id);

        return $this->render('TransporteBundle:Solicitudes:missolicitudesshow.html.twig', array(
            'entity'      => $entity,    
            'campo'       => $campo,        
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
        die;
        $deleteForm = $this->createDeleteForm($id);

        if($this->get('security.context')->isGranted('ROLE_TRANSPORTE'))
        {
            return $this->render('TransporteBundle:Solicitudes:missolicitudesedit.html.twig', array(
                'entity'      => $entity,
                'edit_form'   => $editForm->createView(),
                'delete_form' => $deleteForm->createView(),
                'estatus'     => $entity->getEstatus(),
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

        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();

        $datosform = $request->request->all();
        $datosform = $datosform['form'];

        $estatus = $datosform['estatus'];
        $justificacion = $datosform['justificacion'];

        $entity = $em->getRepository('TransporteBundle:Solicitudes')->find($id);
        $editForm = $this->createForm(new SolicitudesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Solicitudes entity.');
        }
            
        $entity->setEstatus($estatus);
        $entity->setJustificacion($justificacion);

        $em->persist($entity);
        $em->flush();

     
        //CORREO
        $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
        $usuario = $em->getRepository('UsuarioBundle:User')->find($idusuario);
        
        
        if ($estatus=='AP')
        {
            $aaa= "Solicitud de transporte - APROBADA";  
        }elseif($estatus == "R")
        {
            $aaa= "Solicitud de transporte - RECHAZADA";     
        }

        $message = \Swift_Message::newInstance()     // we create a new instance of the Swift_Message class
        ->setSubject($aaa)
        ->setTo(array($usuario->getUsername().'@telesurtv.net'))
        ->setFrom('app_transporte@telesurtv.net')    // we configure the recipient
        ->setBody( $this->renderView(
                    'TransporteBundle:Correo:solicitud_transporte.html.twig',
                    array('perfil' => $perfil,
                        'solicitud' => $entity,
                        'status' => $estatus,
                    )
                ), 
        'text/html');
         $this->get('mailer')->send($message); 
        //FIN CORREO

        $this->get('session')->getFlashBag()->add('notice', 'LA SOLICITUD FUE MODIFICADA CON EXITO');
        return $this->redirect($this->generateUrl('solicitudes_show', array('id' => $id)));
        
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
        
        $idSolicitante=$entity->getIdSolicitante();
        $solicitante = $em->getRepository('UsuarioBundle:User')->find($idSolicitante);

        //CORREO
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $usuario = $em->getRepository('UsuarioBundle:User')->find($idusuario);
        $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
        
        $message = \Swift_Message::newInstance()     // we create a new instance of the Swift_Message class
        ->setSubject('Solicitud de Transporte')     // we configure the title
        ->setFrom(array($usuario->getUsername().'@telesurtv.net'))     // we configure the sender
        ->setTo(array('transporte@telesurtv.net', $solicitante->getUsername().'@telesurtv.net'))     //enviamos a trasnporte y al solicitante        
        ->setBody( $this->renderView(
                    'TransporteBundle:Correo:solicitud_transporte.html.twig',
                    array('perfil' => $perfil,
                        'solicitud' => $entity,
                        'status' => $accion,
                    )
                ), 
        'text/html');
        $this->get('mailer')->send($message); 
        //FIN CORREO
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
            return $this->redirect($this->generateUrl('solicitudes_status', array('id' => $id, 'accion' => 'R')));
                     
        }
        return $this->render('TransporteBundle:Solicitudes:justificar.html.twig', array(
            'entity'      => $entity,
            'justificar_form'   => $justificar_form->createView(),
            'id' => $id
        ));        
    }

    public function ajaxListaUsuariosAction($val)
    {                
        $val=strtoupper($val);

        //echo $val;

        $em = $this->getDoctrine()->getManager();
        $dql = "select u from UsuarioBundle:Perfil u where u.primerNombre like :nombre or u.primerApellido like :ape or u.cedula like :ced";  
        $query = $em->createQuery($dql);
        $query->setParameter('nombre','%'.$val.'%');
        $query->setParameter('ape','%'.$val.'%');
        $query->setParameter('ced','%'.$val.'%');
        $query->setMaxResults(10);
        $usuarios = $query->getResult(); 
        $cont = 0;
        foreach ($usuarios as $usu) {
            $id = $usu->getId()."<br>";
        }
        return $this->render('TransporteBundle:Solicitudes:ajaxlistausuarios.html.twig',array('usuarios'=>$usuarios, 'tipo'=>'I', 'id'=>$id));

    }
    public function ajaxListaExternosAction($val)
    {
        //$val=strtoupper($val);
        $em = $this->getDoctrine()->getManager();
        $dql = "select e from TransporteBundle:personalExterno e where e.nombre like :nombre or e.cedula like :nombre";
        $query = $em->createQuery($dql);
        $query->setParameter('nombre','%'.$val.'%');        
        $query->setMaxResults(10);
        $usuarios = $query->getResult();  

        return $this->render('TransporteBundle:Solicitudes:ajaxlistausuarios.html.twig',array('usuarios'=>$usuarios, 'tipo'=>'E'));

    }
}
