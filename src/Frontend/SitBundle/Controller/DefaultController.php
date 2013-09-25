<?php

namespace Frontend\SitBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\SitBundle\Entity\Ticket;
use Frontend\SitBundle\Form\TicketType;

use Administracion\UsuarioBundle\Entity\Perfil;
use Administracion\UsuarioBundle\Form\PerfilType;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $datos="";
        $message = \Swift_Message::newInstance()     // we create a new instance of the Swift_Message class

        ->setSubject('Hello Email')     // we configure the title

        ->setFrom('jvalera@telesurtv.net')     // we configure the sender

        ->setTo('jvalera@telesurtv.net')     // we configure the recipient

        ->setBody( $this->renderView(
                'SitBundle:Correo:solicitud.html.twig',
                array('datos' => $datos)
            ));

        $this->get('mailer')->send($message);     // then we send the message.



    	//consulto el perfil del usuario
    	$idusuario = $this->get('security.context')->getToken()->getUser()->getId();
    	$em = $this->getDoctrine()->getManager();
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

        $form2   = $this->createForm(new PerfilType(), $perfil[0]);

        return $this->render('SitBundle:Default:index.html.twig', array(
            'form'   => $form->createView(),
            'form2'   => $form2->createView(),
            'ticketusuario'=>$ticketusuario
        ));

        return $this->render('SitBundle:Default:index.html.twig');
    }
}
