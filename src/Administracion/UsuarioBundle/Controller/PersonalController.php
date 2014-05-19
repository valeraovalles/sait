<?php

namespace Administracion\UsuarioBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Administracion\UsuarioBundle\Entity\Perfil;

/**
 * Perfil controller.
 *
 */
class PersonalController extends Controller
{

    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UsuarioBundle:Perfil')->findAll();

        $dql = "select p from UsuarioBundle:Perfil p join p.user u where u.isActive=true";
        $query = $em->createQuery($dql);
        $entities = $query->getResult();

        return $this->render('UsuarioBundle:Personal:index.html.twig', array(
            'perfil' => $entities,
        ));
    }
}
