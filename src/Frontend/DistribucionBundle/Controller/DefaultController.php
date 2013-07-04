<?php

namespace Frontend\DistribucionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Frontend\DistribucionBundle\Entity\Operador;
use Frontend\DistribucionBundle\Form\OperadorType;
use Doctrine\ORM\EntityRepository;

class DefaultController extends Controller
{

   	function latlon($pais){
	    //direccion a buscar
	    $direccion= urlencode($pais);

	    //Buscamos la direccion en el servicio de google
	    $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$direccion.'&sensor=false');

	    //decodificamos lo que devuelve google, que esta en formato json
	    $output= json_decode($geocode);


	    if(isset($output->results[0])){
		    //Extraemos la informacion que nos interesa
		    $lat = $output->results[0]->geometry->location->lat;
		    $long = $output->results[0]->geometry->location->lng;
	    }else return "0,0";

	    //la retornamos
	    return $lat.', '.$long;    
	}

    public function indexAction()
    {

    	
    	/*echo $this->latlon('venezuela');
    	die;
    	$em = $this->getDoctrine()->getManager();

    	$entity = $em->getRepository('DistribucionBundle:Pais')->findAll();
    	foreach ($entity as $pais) {
			$latlon = $this->latlon($pais->getPais());
			$latlon=explode(",", $latlon);
			$latitud=$latlon[0];
			$longitud=$latlon[1];

            $consulta = $em->createQuery('update DistribucionBundle:Pais p SET p.latitud = :latitud, p.longitud = :longitud where p.id = :idpais');
            $consulta->setParameter('idpais', $pais->getId());
            $consulta->setParameter('latitud', $latitud);
            $consulta->setParameter('longitud', $longitud);
            $consulta->execute();
    	}*/

    	$em = $this->getDoctrine()->getManager();
        $dql = "select distinct p.id, p.pais, p.latitud, p.longitud from DistribucionBundle:Operador o join o.pais p";
        $consulta = $em->createQuery($dql);
        $paises = $consulta->getResult();


        $em = $this->getDoctrine()->getManager();
        $dql = "
            select top.id, count (top.operador) as cantidad, top.operador, sum(o.numeroabonados) as totalabonados, p.pais, p.latitud, p.longitud 
            from DistribucionBundle:Operador o join o.pais p join o.tipooperador top
            where o.tipooperador=top.id and o.pais=p.id
            group by top.operador, p.pais, p.latitud, p.longitud, top.id
            order by p.pais ASC
        ";

        $consulta = $em->createQuery($dql);
        $operadores = $consulta->getResult();



        /*$dql = "select p.pais, to.operador from DistribucionBundle:Operador o join o.pais p join o.tipooperador to";
        $consulta = $em->createQuery($dql);
        $operadores = $consulta->getResult();*/

        return $this->render('DistribucionBundle:Default:index.html.twig', array('operadores'=>$operadores,'paises'=>$paises));
    }

    public function AjaxAction($datos,$mostrar)
    {

        if($mostrar=='operador'){

            $datos=explode("-", $datos);
            $idpais=$datos[0];
            $idtipooperador=$datos[1];


            // create a task and give it some dummy data for this example
            $form = $this->createFormBuilder()
                ->add('operador', 'entity', array(
                        'class' => 'DistribucionBundle:Operador',
                        'property' => 'nombre',
                        'multiple' => true,
                        'query_builder' => function(EntityRepository $er) use ($idpais, $idtipooperador) {
                        return $er->createQueryBuilder('o')
                        ->where('o.pais = :idpais')
                        ->andWhere('o.tipooperador = :idtipooperador between')
                        ->setParameter('idpais', $idpais)
                        ->setParameter('idtipooperador', %)
                    ;},
                    ))
                ->getForm();
        }

        else if($mostrar=='tipooperador'){

            $id=explode("-", $datos);
            $id=$id[0];

            $em = $this->getDoctrine()->getManager();
            $dql = "select distinct p.id, p.operador from DistribucionBundle:Operador o join o.tipooperador p where o.pais= :idpais order by p.operador ASC";
            $consulta = $em->createQuery($dql);
            $consulta->setParameter('idpais', $id);
            $tipooperador = $consulta->getResult();

            if(!empty($tipooperador)){
                $array['']="seleccione";
                $array[0]="todos";
                foreach ($tipooperador as $tp) {
                    $array[$tp['id']]=$tp['operador'];
                }
            } else $array=array(''=>'vacio');

            // create a task and give it some dummy data for this example
            $form = $this->createFormBuilder()
                    ->add('tipooperador', 'choice', array(
                        'choices'   => $array,
           
                    ))
                ->getForm();
            }


           /* $entity = new Operador();
            $form   = $this->createForm(new OperadorType($id), $entity);*/
            return $this->render('DistribucionBundle:Default:ajax.html.twig',array('form'=>$form->createView(),'mostrar'=>$mostrar,'mostrar'=>$mostrar));
    }
}
