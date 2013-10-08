<?php

namespace Frontend\ConstanciaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Frontend\ConstanciaBundle\Entity\Constancia;
use Frontend\ConstanciaBundle\Form\ConstanciaType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $IdUsuario = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('UsuarioBundle:Perfil')->find($IdUsuario);
        if($entity->getUser()->getFueradenomina()==true)
             return $this->redirect($this->generateUrl('usuario_homepage'));

        $IdUsuario = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('UsuarioBundle:Perfil')->find($IdUsuario);
        if($entity->getUser()->getFueradenomina()==true)
            return $this->redirect($this->generateUrl('usuario_homepage'));


        $entity = new Constancia();
        $form   = $this->createForm(new ConstanciaType(), $entity);

        $bloquea=true;
        if(date('N')==1 || date('N')==2){
			$bloquea=false;
		}


		$idusuario = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository('UsuarioBundle:Perfil')->find($idusuario);


        $dql   = "
        SELECT count(c.id) as cantidad FROM ConstanciaBundle:Constancia c where c.user= :iduser and c.culminada=false";
        $query = $em->createQuery($dql);
        $query->setParameter('iduser', $idusuario);
        $constancias = $query->getResult(); 

        return $this->render('ConstanciaBundle:Default:index.html.twig', array('form' => $form->createView(),'bloquea'=>$bloquea,'constancia'=>$constancias));
    }
}
