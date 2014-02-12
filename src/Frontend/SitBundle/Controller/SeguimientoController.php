<?php

namespace Frontend\SitBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityRepository;


use Frontend\SitBundle\Entity\Ticket;
use Frontend\SitBundle\Entity\Reasignado;
use Frontend\SitBundle\Entity\Unidad;
use Frontend\SitBundle\Form\TicketType;
use Administracion\UsuarioBundle\Entity\Perfil;
use Administracion\UsuarioBundle\Form\PerfilType;
use Administracion\UsuarioBundle\Entity\Extension;
use Administracion\UsuarioBundle\Form\ExtensionType;



/**
 * Ticket controller.
 *
 */
class SeguimientoController extends Controller
{

    public function inicioAction($idticket)
    {
        $em = $this->getDoctrine()->getManager();
        $ticket =  $em->getRepository('SitBundle:Ticket')->find($idticket);
        return $this->render('SitBundle:Seguimiento:inicio.html.twig',array('ticket'=>$ticket));
    }
    
    public function seguimientoprincipalAction($idticket)
    {
        $em = $this->getDoctrine()->getManager();
        $ticket =  $em->getRepository('SitBundle:Ticket')->find($idticket);
        return $this->render('SitBundle:Seguimiento:principal.html.twig',array('ticket'=>$ticket));
        
    }
}