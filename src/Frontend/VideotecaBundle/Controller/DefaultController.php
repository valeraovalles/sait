<?php

namespace Frontend\VideotecaBundle\Controller;
use Administracion\UsuarioBundle\Resources\Misclases\Conexion;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	/*$con=new Conexion;
    	$postgres=$con->postgresql_local();

	   	$query="
			select distinct c.cota as ubicacion_cinta, c.id as serial_cinta, p.titulo, f.formato, e.evento, se.servicio
			from  avila.db_cinta c, avila.db_segmentos s, avila.db_ppal p, avila.db_formato f, avila.db_evento e, avila.db_servicio se
			where  c.id=s.id and p.alias=s.alias and c.id_formato=f.id and c.evento=e.id and c.servicio=se.id
			and (c.cota='2' )
    	";

    	$rs = pg_query($postgres, $query);


    	$cont=0;
    	while($row = pg_fetch_array($rs)){
    		$cintas[$cont]=$row;
    		$cont++;
    	}
*/
        return $this->render('VideotecaBundle:Default:index.html.twig');
    }

    public function consultaAction($id)
    {
    	$con=new Conexion;
    	$postgres=$con->postgresql_local();

    	$query="
			select c.cota as ubicacion_cinta, c.id as serial_cinta, 
			s.alias as id_segmento, s.contenido as contenido_segmento, p.titulo, 
			p.tcc as titulo_complementario, p.capitulo, f.formato, e.evento, se.servicio
			from  avila.db_cinta c, avila.db_segmentos s, avila.db_ppal p, avila.db_formato f, avila.db_evento e, avila.db_servicio se
			where  c.id=s.id and p.alias=s.alias and c.id_formato=f.id and c.evento=e.id and c.servicio=se.id
			and (c.cota='".$id."')
			--and (S.contenido like '%ALO %' 
			--OR p.titulo like '%ALO %' 
			--OR p.tcc like '%ALO %'
			--)
			order by p.capitulo ASC
    	";
    	$rs = pg_query($postgres, $query);
    	$cont=0;
    	while($row = pg_fetch_array($rs)){
    		$cintas[$cont]=$row;
    		$cont++;
    	}

        return $this->render('VideotecaBundle:Default:consulta.html.twig',array('cintas'=>$cintas));

    }
}
