<?php

namespace Frontend\SitBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Administracion\UsuarioBundle\Entity\User;




/**
 * Categoria controller.
 *
 */
class AjaxController extends Controller
{

    //ajax para mostrar listado de correos en sit seguimiento
    public function listadocorreoAction($letra)
    {
        $em = $this->getDoctrine()->getManager();
        $dql = "select u from UsuarioBundle:User u where u.username like :username and u.password is null";
        $query = $em->createQuery($dql);
        $query->setParameter('username','%'.strtolower($letra).'%');
        $query->setMaxResults(10);
        $username = $query->getResult();
        

        
        return $this->render('SitBundle:Ajax:listacorreo.html.twig',array('username'=>$username));

    }
    /**
     * Lists all Categoria entities.
     *
     */
    public function ajaxinformegestionAction($datos,$mostrar)
    {

        if($mostrar=='anio'){

            if($datos=='s'){ echo ""; die;}
            $anios=array("s"=>"Seleccione",\date("Y")-1=>\date("Y")-1,\date("Y")=>\date("Y"));

            $form = $this->createFormBuilder()
                ->add('anios', 'choice', array(
                    'choices'   => $anios,
                ))->getForm();
        }

        if($mostrar=='mes'){

            if($datos=='s'){ echo ""; die;}
            $meses= array('s'=>'seleccione','01'=>'Enero','02'=>'Febrero','03'=>'Marzo','04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio','08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');

            $form = $this->createFormBuilder()
                ->add('meses', 'choice', array(
                    'choices'   => $meses,
                ))->getForm();
        }


        if($mostrar=='boton'){

            if($datos=='s'){ echo ""; die;}
            echo "

                <input class='btn btn-primary' type='submit' value='Generar imágenes'>
            ";
            die;
        }

        return $this->render('SitBundle:Ajax:ajaxformreporte.html.twig',array('form'=>$form->createView(),'mostrar'=>$mostrar));
        


        die;
    }
}