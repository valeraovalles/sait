<?php

namespace Frontend\DistribucionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\DistribucionBundle\Entity\Operador;
use Frontend\DistribucionBundle\Form\OperadorType;

use Frontend\DistribucionBundle\Entity\Representante;
use Frontend\DistribucionBundle\Form\RepresentanteType;

use Administracion\UsuarioBundle\Entity\Perfil;

use Symfony\Component\Security\Core\SecurityContext;

use Doctrine\ORM\EntityRepository;

/**
 * Operador controller.
 *
 */
class OperadorController extends Controller
{
    /**
     * Lists all Operador entities.
     *
     */

    public function infoAction()
    {
        header('Content-Type: text/html; charset=UTF-8');

        $em = $this->getDoctrine()->getManager();

        $dql = "select distinct p.id, p.pais, p.latitud, p.longitud from DistribucionBundle:Operador o join o.pais p order by p.pais ASC";
        $consulta = $em->createQuery($dql);
        $paises = $consulta->getResult();

        $dql = "
            select top.id as idtipo, count (top.operador) as cantidad, top.operador, sum(o.numeroabonados) as totalabonados, p.pais, p.id as idpais
            from DistribucionBundle:Operador o join o.pais p join o.tipooperador top
            where o.tipooperador=top.id and o.pais=p.id
            group by top.operador, p.pais, top.id, p.id
            order by p.pais ASC
        ";
        $consulta = $em->createQuery($dql);
        $operadores = $consulta->getResult();       


        $tipooperador = $em->getRepository('DistribucionBundle:Tipooperador')->findAll();

        $canttipop=0;
        foreach ($tipooperador as $top) {
            $canttipop++;
        }

        foreach ($paises as $pais) {
            
            foreach ($operadores as $operador) {

                if($pais['pais']==$operador['pais']){
                    $cont=1;
                    foreach ($tipooperador as $top) {
                        if ($top->getOperador()==$operador['operador'])
                            $datos[$pais['pais']][$cont]= array('operador'=>$operador['operador'],'totalabonados'=>$operador['totalabonados'],'cantidad'=>$operador['cantidad'],'idtipooperador'=>$operador['idtipo'],'idpais'=>$operador['idpais']); 

                        $cont++;
                        
                    }
                }        
            }

            for($i=1;$i<$canttipop+1;$i++){
                if(!isset($datos[$pais['pais']][$i]))
                    $datos[$pais['pais']][$i]=array('operador'=>'0','totalabonados'=>'0','cantidad'=>'0','idpais'=>'0','idtipooperador'=>'0');
            }
        }



        /*header('Content-type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=nombre_del_archivo.xls");
        header("Pragma: no-cache");
        header("Expires: 0");*/

        return $this->render('DistribucionBundle:Operador:info.html.twig',array('datos'=>$datos,'tipooperador'=>$tipooperador,'cantidadtipooperador'=>$canttipop));
    }



    public function paisestadociudadAction($id,$mostrar)
    {
            $entity = new Operador();
            $form   = $this->createForm(new OperadorType($id), $entity);
        
            $em = $this->getDoctrine()->getManager();
            $pais = $em->getRepository('DistribucionBundle:Pais')->find($id);

            return $this->render('DistribucionBundle:Operador:paisestadociudad.html.twig',array('form'=>$form->createView(),'pais'=>$pais,'mostrar'=>$mostrar));
    }
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $dql   = "SELECT o FROM DistribucionBundle:Operador o JOIN o.pais p JOIN o.tipooperador t order by o.id DESC
";
        $query = $em->createQuery($dql);
        $datos=$query->getResult();

        return $this->render('DistribucionBundle:Operador:index.html.twig', array(
            'datos' => $datos,
        ));
    }

    public function listaAction($idpais, $idtipooperador)
    {
        if($idpais==0 && $idtipooperador==0)
             return $this->redirect($this->generateUrl('infooperadores'));

        $em = $this->getDoctrine()->getManager();

        $dql   = "
        SELECT o FROM DistribucionBundle:Operador o JOIN o.pais p JOIN o.tipooperador t 
        where p.id= :idpais and t.id= :idtipooperador
        order by o.id DESC
        ";
        $query = $em->createQuery($dql);
        $query->setParameter('idpais', $idpais);
        $query->setParameter('idtipooperador', $idtipooperador);
        $operadores = $query->getResult(); 


        $pais = $em->getRepository('DistribucionBundle:Pais')->find($idpais);
        $top = $em->getRepository('DistribucionBundle:Tipooperador')->find($idtipooperador);
        return $this->render('DistribucionBundle:Operador:lista.html.twig', array(
            'operador' => $operadores,
            'pais' => $pais,
            'top' => $top
        ));
    }

    /**
     * Creates a new Operador entity.
     *
     */
    public function createAction(Request $request)
    {
        
        $datos=$request->request->all();
        $datos=$datos['frontend_distribucionbundle_operadortype'];

        if($datos['pais']==null){
            $id=0;
        } else $id=$datos['pais'];


        $entity  = new Operador();
        $form = $this->createForm(new OperadorType($id), $entity);
        $form->bind($request);

        $entity2 = new Representante();
        $form2   = $this->createForm(new RepresentanteType(), $entity2);
        $form2->bind($request);
        
        if ($form->isValid() && $form2->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $dql = "select a.codigo from DistribucionBundle:Comodato a order by a.id DESC";
            $query = $em->createQuery($dql)->SetMaxResults (1);
            $ultimocomodato = $query->getResult();

            if(!empty($ultimocomodato)){
                $mes=substr($ultimocomodato[0]['codigo'],8,2);
                $cont=substr($ultimocomodato[0]['codigo'],12,2);

                if($mes==date("m")){
                    $cont=$cont+1;
                } else $cont=1;
            } else $cont=1;

            if(strlen($cont) < 2) $cont="0".$cont;
            $codigo=$entity->getTipooperador($datos['tipooperador'])->getCodigo().substr($entity->getPais($datos['pais']),0,3).date("dmy").$cont;

            $em = $this->getDoctrine()->getManager();
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            $str = \date("Y-m-d G:i:s");
            $fechaactual = \DateTime::createFromFormat('Y-m-d G:i:s', $str);
            $entity->setFecharegistro($fechaactual);
            $entity->setFechamodificacion($fechaactual);
            $entity->setUser($perfil);
            $entity->getComodato()->setFechamodificacion($fechaactual);
            $entity->getComodato()->setUser($perfil);
            $entity2->setUser($perfil);

            $entity->getComodato()->setCodigo(strtoupper($codigo));
            $entity2->setOperador($entity);
            $em->persist($entity);
            $em->persist($entity2);
            $em->flush();

            return $this->redirect($this->generateUrl('operador_show', array('id' => $entity->getId())));
        } else $this->get('session')->getFlashBag()->add('alert', 'Alerta!! Hay errores en el formulario, por favor revise.');;

        return $this->render('DistribucionBundle:Operador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'entity2' => $entity2,
            'form2'   => $form2->createView(),
        ));
    }

    /**
     * Displays a form to create a new Operador entity.
     *
     */
    public function newAction(Request $request)
    {
        $entity = new Operador();
        $form   = $this->createForm(new OperadorType(0), $entity);

        $entity2 = new Representante();
        $form2   = $this->createForm(new RepresentanteType(), $entity2);
        return $this->render('DistribucionBundle:Operador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'entity2' => $entity2,
            'form2'   => $form2->createView(),
        ));
    }

    /**
     * Finds and displays a Operador entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Operador')->find($id);
        $representante = $em->getRepository('DistribucionBundle:Representante')->RepresentanteOperador($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Operador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DistribucionBundle:Operador:show.html.twig', array(
            'entity'      => $entity,
            'representante' => $representante,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Operador entity.
     *
     */
    public function editAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Operador')->find($id);
     
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Operador entity.');
        }

        $editForm = $this->createForm(new OperadorType($entity->getPais()->getId()), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $representante = $em->getRepository('DistribucionBundle:Representante')->RepresentanteOperador($id);


        $verifica=null;
        return $this->render('DistribucionBundle:Operador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'representante' => $representante,
            'verifica'=>$verifica
        ));
    }

    /**
     * Edits an existing Operador entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DistribucionBundle:Operador')->find($id);
        $representante = $em->getRepository('DistribucionBundle:Representante')->RepresentanteOperador($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Operador entity.');
        }


        $datos=$request->request->all();
        $datos=$datos['frontend_distribucionbundle_operadortype'];

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new OperadorType($datos['pais']), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);

            $str = \date("Y-m-d G:i:s");
            $fechaactual = \DateTime::createFromFormat('Y-m-d G:i:s', $str);

            $entity->setFechamodificacion($fechaactual);
            $entity->setUser($perfil);
            $entity->getComodato()->setFechamodificacion($fechaactual);
            $entity->getComodato()->setUser($perfil);
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Actualización exitosa!');
            return $this->redirect($this->generateUrl('operador_edit', array('id' => $id)));
        }

        $verifica="Verifica los campos del formulario.";
        return $this->render('DistribucionBundle:Operador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'representante' => $representante,
            'verifica'=>$verifica
        ));
    }

    /**
     * Deletes a Operador entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $idusuario = $this->get('security.context')->getToken()->getUser()->getId();

            //desactivo operador
            $consulta = $em->createQuery('update DistribucionBundle:Operador o set o.user= :idusuario, o.estatus=false
                              WHERE o.id = :idoperador');
            $consulta->setParameter('idoperador', $id);
            $consulta->setParameter('idusuario', $idusuario);
            $consulta->execute();

            $entity = $em->getRepository('DistribucionBundle:Operador')->find($id);
            $this->get('session')->getFlashBag()->add('notice', 'Se ha desactivado el operador '.$entity->getNombre());
            return $this->redirect($this->generateUrl('operador'));


//COMENTO ESTO PORQUE NO SE DEBEN ELIMINAR LOS REGISTROS
/*
            //antes de eliminar representante actualizo el id del usuario
            $consulta = $em->createQuery('update DistribucionBundle:Representante r set r.user= :idusuario
                              WHERE r.operador = :idoperador');
            $consulta->setParameter('idoperador', $id);
            $consulta->setParameter('idusuario', $idusuario);
            $consulta->execute();

            //elimino primero los representantes
            $consulta = $em->createQuery('DELETE DistribucionBundle:Representante r 
                                          WHERE r.operador = :idoperador');
            $consulta->setParameter('idoperador', $id);
            $consulta->execute();

            $entity = $em->getRepository('DistribucionBundle:Operador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Operador entity.');
            }

            //guardo el id del usuario antes de eliminar
            
            $perfil = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);
            $entity->setUser($perfil);
            $entity->getComodato()->setUser($perfil);
            $em->persist($entity);
            $em->flush();

            $em->remove($entity);
            $em->flush();
        }

        $this->get('session')->getFlashBag()->add('notice', 'Se ha borrado el operador '.$entity->getNombre().' y sus representantes.');
        return $this->redirect($this->generateUrl('operador'));*/
    }
    }

    /**
     * Creates a form to delete a Operador entity by id.
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

    public function topAction(Request $request)
    {

        $entity = new Operador();
        $form   = $this->createForm(new OperadorType(0), $entity);


        // create a task and give it some dummy data for this example
        $form = $this->createFormBuilder()
            ->add('pais', 'entity', array(
                    'class' => 'DistribucionBundle:Pais',
                    'property' => 'pais',
                    'empty_value' => 'Seleccione...',
                    'query_builder' => function(EntityRepository $er) {
                            return $er->createQueryBuilder('u')
                            ->orderBy('u.pais', 'ASC')
                            ;
                    },
                ))
        ->getForm();

        return $this->render('DistribucionBundle:Operador:top.html.twig', array('form'   => $form->createView()));


    }
}
