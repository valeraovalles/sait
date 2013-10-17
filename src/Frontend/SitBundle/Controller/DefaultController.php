<?php

namespace Frontend\SitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\SitBundle\Entity\Ticket;
use Frontend\SitBundle\Form\TicketType;

use Administracion\UsuarioBundle\Entity\Perfil;
use Administracion\UsuarioBundle\Form\PerfilType;
use Administracion\UsuarioBundle\Entity\Extension;
use Administracion\UsuarioBundle\Form\ExtensionType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        //datos del usuario
        
        //consulto el perfil del usuario
        $idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $datosusuario =  $em->getRepository('UsuarioBundle:User')->datosusuario($idusuario);
    	
        $dql = "select p from UsuarioBundle:Perfil p where p.user= :id";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$idusuario);
        $perfil = $query->getResult();

        //consulto los tickets del usuario
        $dql = "select t from SitBundle:Ticket t where t.solicitante= :id order by t.estatus ASC";
        $query = $em->createQuery($dql);
        $query->setParameter('id',$idusuario);
        $ticketusuario = $query->getResult();

        $entity = new Ticket();
        $form   = $this->createForm(new TicketType(), $entity);

        $entity2 = new Extension();
        $form2   = $this->createForm(new ExtensionType(), $entity2);

        return $this->render('SitBundle:Default:index.html.twig', array(
            'form'   => $form->createView(),
            'form2'   => $form2->createView(),
            'ticketusuario'=>$ticketusuario,
            'datosusuario'=>$datosusuario
        ));

        return $this->render('SitBundle:Default:index.html.twig');
    }
}
