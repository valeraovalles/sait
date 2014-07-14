<?php

namespace Frontend\CreatvBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Frontend\CreatvBundle\Entity\Txt;
use Frontend\CreatvBundle\Form\TxtType;

use Administracion\UsuarioBundle\Resources\Misclases\Funcion;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CreatvBundle:Default:index.html.twig');
    }

    public function formtxtAction()
    {
        $entity = new Txt();
        $form   = $this->createForm(new TxtType($id), $entity);
        return $this->render('CreatvBundle:Default:formtxt.html.twig',array('form'=>$form->createView()));
    }

    public function generatxtAction(Request $request)
    {

        $entity = new Txt();
        $form   = $this->createForm(new TxtType($id), $entity);
        $form->bind($request);

        if ($form->isValid()) {

        	$datos=$request->request->all();
        	$datos=$datos['frontend_creatvbundle_txttype'];

        	$archivo=$this->procesatxt($datos['fecha'],$datos['tipo']);

        	if($archivo==true)
	        return $this->redirect($this->generateUrl('creatv_descargatxt',array('fecha'=>$datos['fecha'],'tipo'=>$datos['tipo'])));	   
        }

        return $this->render('CreatvBundle:Default:formtxt.html.twig',array('form'=>$form->createView()));
    }

    public function procesatxt($fecha_escaleta,$tipo){

		    $f=new Funcion;

	        $link = mssql_connect('192.168.70.7', 'sa', '') or die("Could not connect !");
	        $selected = mssql_select_db("creatv_data", $link);
		        
			# Cambie estos datos por los de su Servidor FTP
			define("SERVER","10.10.11.243"); //IP o Nombre del Servidor
			define("PORT",21); //Puerto
			define("USER","jhoan"); //Nombre de Usuario
			define("PASSWORD","123456"); //Contraseña de acceso
		        
		     /*   
		        # Cambie estos datos por los de su Servidor FTP
			define("SERVER","192.168.100.30"); //IP o Nombre del Servidor
		      	define("PORT",21); //Puerto
			define("USER","creatv"); //Nombre de Usuario
			define("PASSWORD","..*creatv*.."); //Contraseña de acceso*/

			# Funcion
			function ConectarFTP(){
				//Permite conectarse al Servidor FTP
				$id_ftp=ftp_connect(SERVER,PORT); //Obtiene un manejador del Servidor FTP
				ftp_login($id_ftp,USER,PASSWORD); //Se loguea al Servidor FTP
				return $id_ftp; //Devuelve el manejador a la función
			}

			function SubirArchivo($archivo_local,$archivo_remoto){
				//Sube archivo de la maquina Cliente al Servidor (Comando PUT)
				$id_ftp=ConectarFTP(); //Obtiene un manejador y se conecta al Servidor FTP
				ftp_put($id_ftp,$archivo_remoto,$archivo_local,FTP_BINARY);
				//Sube un archivo al Servidor FTP en modo Binario
				ftp_quit($id_ftp); //Cierra la conexion FTP
			}

			//verifico si el programa con video source diferente a "A" se transmitió en otra fecha, esto para no indicar el video source
	        function transmitidootrafecha($clipname,$fecha_escaleta){
	            $f=new Funcion;
	            $repetido='';
	            $query="SELECT count(*) as total FROM [creatv_data].[dbo].[Escaleta] es,[creatv_data].[dbo].[Evento] ev
	            where es.IdEscaleta=ev.IdEscaleta and EV.ClipName LIKE '%".$clipname."%' and es.IdCanal='10' and es.Data_Emissio<'".$f->voltea_fecha($fecha_escaleta)."'";
	            $result = mssql_query($query);
	            while($row = mssql_fetch_array($result)){$repetido=$row['total'];}
	            return $repetido;
	        }
	        
	        //verifico si el programa se ha repetido el mismo dia
	        function transmitidomismafecha($clipname,$fecha_escaleta){
	            $f=new Funcion;
	            $repetido='';
	            $query="SELECT count(*) as total FROM [creatv_data].[dbo].[Escaleta] es,[creatv_data].[dbo].[Evento] ev
	            where es.IdEscaleta=ev.IdEscaleta and EV.ClipName LIKE '%".$clipname."%' and es.IdCanal='10' and es.Data_Emissio='".$f->voltea_fecha($fecha_escaleta)."'";
	            $result = mssql_query($query);
	            while($row = mssql_fetch_array($result)){$repetido=$row['total'];}
	            return $repetido;
	        }
	        
	        function eliminar_acentos($str){
				$a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','�»','ü','ý','ÿ','Ā','ā','Ă','ă','Ą','ą','Ć','ć','Ĉ','ĉ','Ċ','ċ','Č','č','Ď','ď','Đ','đ','Ē','ē','Ĕ','ĕ','Ė','ė','Ę','ę','Ě','ě','Ĝ','ĝ','Ğ','ğ','Ġ','ġ','Ģ','ģ','Ĥ','ĥ','Ħ','ħ','Ĩ','ĩ','Ī','ī','Ĭ','ĭ','Į','į','İ','ı','Ĳ','ĳ','Ĵ','ĵ','Ķ','ķ','Ĺ','ĺ','�»','ļ','Ľ','ľ','Ŀ','ŀ','Ł','ł','Ń','ń','Ņ','ņ','Ň','ň','ŉ','Ō','ō','Ŏ','ŏ','Ő','ő','Œ','œ','Ŕ','ŕ','Ŗ','ŗ','Ř','ř','Ś','ś','Ŝ','ŝ','Ş','ş','Š','š','Ţ','ţ','Ť','ť','Ŧ','ŧ','Ũ','ũ','Ū','ū','Ŭ','ŭ','Ů','ů','Ű','ű','Ų','ų','Ŵ','ŵ','Ŷ','ŷ','Ÿ','Ź','ź','�»','ż','Ž','ž','ſ','ƒ','Ơ','ơ','Ư','ư','Ǻ','�»','Ǽ','ǽ','Ǿ','ǿ');
				$b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','A','a','AE','ae','O','o');
				return str_replace($a, $b, $str);
	        }
	        

        
	        $query="
	        select 
	                EV.VideoSource, EV.ClipName, EV.SegName, EV.StartTime, C.Titol_Emissio AS titulo_contenido, p.Titol_Emissio as titulo_produccion, ev.DurPrev  
	        from 
	                [creatv_data].[dbo].[Escaleta] e, [creatv_data].[dbo].[Evento] ev, [creatv_data].[dbo].[Contenido] c, [creatv_data].[dbo].[Produccion] p, [creatv_data].[dbo].[Parrilla] pa
	        where 
	                ev.IdEscaleta=e.IdEscaleta and 
	                p.IdProduccio = ev.IdProduccio and 
	                c.IdPrograma = p.IdPrograma and
	                EV.Observacio = 'N' and
	                EV.Separador = 'N' and
	                e.Data_Emissio='".$f->voltea_fecha($fecha_escaleta)."' and 
	                pa.IdCanal=10 and
					EV.ClipName!=''	and 
					e.IdParrilla=pa.IdParrilla and pa.Nom='".$tipo."'

	        order by EV.OrderNum ASC
	        ";

	        $result = mssql_query($query);

	        $txt='';$segmento='';$programa='';
	        while($row = mssql_fetch_array($result)){

	        	//inicializo
	        	if(!isset($programa[$row["ClipName"]]))$programa[$row["ClipName"]]=0;

	        	//inicializo
	            $transmitido_otrafecha=2;
	            

	            //verifico las transmisiones de los programas en vivo
	            if($row["VideoSource"]!='A'){

	            	//verifico si el programa se transmitió una fecha anterior	                
	                $transmitido_otrafecha=transmitidootrafecha($row["ClipName"],$fecha_escaleta);
	               
	                //si no se transmitió en una fecha anterior
	                if ($transmitido_otrafecha==0){

	                	//verifico si se cuantas veces se transmitirá la fecha enviada
	                    $transmitido_mismafecha=transmitidomismafecha($row["ClipName"],$fecha_escaleta);

	                    //si es mayor a uno significa que se esta repitiendo en el dia
	                    if($transmitido_mismafecha>1){ 

	                        $programa[$row["ClipName"]]=$programa[$row["ClipName"]]+1;

	                    } 
	                    //si no se ha repetido el dia de hoy entonces le indico que es 1
	                    else $programa[$row["ClipName"]]=1;
	                } 
	                
	            }//fin verifico las transmisiones de los programas en vivo

	                if($row["SegName"]!='1/1')$segmento=$row["SegName"]." "; else $segmento='';

	                //si no se ha transmitido en otra fecha o si se va a transmitir varias veces pero esta es la primera transmición agrega el estudio
	                if(($row["VideoSource"]!='A' && $transmitido_otrafecha==0 && $programa[$row["ClipName"]]==1))
	                $txt .=str_replace(".00","",$row["StartTime"])."\t".$row["ClipName"]."\t\t".$segmento.$row["titulo_contenido"]." - ".$row["titulo_produccion"]."\t".str_replace(".00","",$row["DurPrev"])."\t".$row["VideoSource"]."\r\n";
	                else 
	                $txt .=str_replace(".00","",$row["StartTime"])."\t".$row["ClipName"]."\t\t".$segmento.$row["titulo_contenido"]." - ".$row["titulo_produccion"]."\t".str_replace(".00","",$row["DurPrev"])."\r\n";
	        }

	        if(empty($txt)){
            	$this->get('session')->getFlashBag()->add('alert', 'No existe información para la fecha seleccionada, por favor verifique que el nombre de la parrilla sea '.$tipo.', si es así por favor contacte con el administrador a través de la Ext. 339/264.');
            	return;
        	}

	        $txt=eliminar_acentos(utf8_encode($txt));
	        
	        $archivo = fopen ("/var/www/sait/web/uploads/creatv/txt/".$fecha_escaleta."_".$tipo.".txt", "w+");

	        fwrite($archivo, $txt);
	        fclose($archivo);

	        SubirArchivo("/var/www/sait/web/uploads/creatv/txt/".$fecha_escaleta."_".$tipo.".txt",$fecha_escaleta."_".$tipo.".txt");
	        
	        $archivo = ftp_nlist(ConectarFTP(), $fecha_escaleta.'_'.$tipo.'.txt');

	        if (!$archivo)
				$this->get('session')->getFlashBag()->add('alert', "EL ARCHIVO NO SE HA SUBIDO POR FAVOR CONTACTE CON EL ADMINISTRADOR");
	        else {
	        	$this->get('session')->getFlashBag()->add('notice', "ARCHIVO ENVIADO A LA CARPETA COMPARTIDA");
	        	return true;
	        }

	        return;
	}

    public function descargatxtAction($fecha,$tipo){
        $entity = new Txt();
        $form   = $this->createForm(new TxtType($id), $entity);
        return $this->render('CreatvBundle:Default:formtxt.html.twig',array('form'=>$form->createView(),'fecha'=>$fecha,'tipo'=>$tipo));

    }

}
