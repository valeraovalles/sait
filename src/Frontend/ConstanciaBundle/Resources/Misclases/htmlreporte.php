<?php

namespace Frontend\ConstanciaBundle\Resources\Misclases;
use Administracion\UsuarioBundle\Resources\Misclases\Funcion;
use Administracion\UsuarioBundle\Resources\Misclases\Conexion;

class htmlreporte
{
    public function constancia($em,$constancia,$usuario,$datosnomina,$parametros)
    {

      $a=new Conexion;
      $conn=$a->postgresql_sigefirrhh();
      $query="
        select 
        c.cod_concepto, hq.monto_asigna, hq.anio, gn.nombre as tipo_nomina
       
        from 
        historicoquincena hq, concepto c, conceptoTipoPersonal ctp, trabajador t, gruponomina gn, conceptofijo cf
       
        where 
        t.cedula='".$usuario->getCedula()."' and
        t.estatus='A' and
        c.cod_concepto<>'0102' and
        t.id_trabajador=hq.id_trabajador and

        hq.id_concepto<>0 and
        cf.id_trabajador=t.id_trabajador and    
        cf.id_concepto_tipo_personal=ctp.id_concepto_tipo_personal and 
        c.id_concepto=ctp.id_concepto and
        ctp.id_concepto_tipo_personal = hq.id_concepto_tipo_personal and

        hq.id_grupo_nomina=gn.id_grupo_nomina 

        and hq.anio=(select max(anio) from historicoquincena where numero_nomina=0) 

        and hq.mes=(select max(mes) from historicoquincena where anio = (select max(anio) from historicoquincena where numero_nomina=0) and numero_nomina=0) 

        and hq.semana_quincena=(select max(semana_quincena) from historicoquincena where anio=(select max(anio) from historicoquincena where numero_nomina=0) 
        and mes = (select max(mes) from historicoquincena where anio = (select max(anio) from historicoquincena where numero_nomina=0) and numero_nomina=0) and numero_nomina=0) and hq.numero_nomina=0
";

      $rs = pg_query($conn, $query);

      $suma_conceptos=0;
      while ($row = pg_fetch_array($rs)){
          $tipo_nomina = $row['tipo_nomina'];
            if($row['cod_concepto']=='0001') $sueldo = $row['monto_asigna']*2;
            else{
                $suma_conceptos += $row['monto_asigna']*2;            
            }
      }



      //DOMINGOS DE JORNADA
      /*$query="
        select sum(hq.monto_asigna) as monto_asigna from historicoquincena hq, trabajador t, conceptotipopersonal ctp 
        where hq.id_trabajador=t.id_trabajador and t.cedula='".$usuario->getCedula()."' 
        and hq.anio=(select max(anio) from historicoquincena where numero_nomina=0) 
        and hq.mes=(select max(mes-1) from historicoquincena where anio = (select max(anio) from historicoquincena where numero_nomina=0) and numero_nomina=0) 
        and ctp.id_concepto='1061' and ctp.id_tipo_personal=hq.id_tipo_personal 
        and ctp.id_concepto_tipo_personal=hq.id_concepto_tipo_personal


      ";

      $rs = pg_query($conn, $query);
      $row = pg_fetch_array($rs);
      if(!empty($row))$domingojornada=$row[0];else $domingojornada=0;*/


     $s_basico=$sueldo;
     $s_normal=$sueldo+$suma_conceptos/*+$domingojornada*/;
     $s_integral=($s_normal/30)*41.25;   
     $s_anual_integral= $s_integral * 12;
     $s_anual_basico=$s_basico * 12;
     $s_anual_normal=$s_normal * 12;

     if($tipo_nomina=='CONTRATADOS'){
        $sicont=" bajo la figura de contratado(a)";
     } else $sicont="";

    if($constancia->getTipo()=='sb'){
            $sueldo=number_format($s_basico, 2, ",", ".");  
            $tipo_salario="Salario Básico Mensual";
    }

    else if($constancia->getTipo()=='sn'){
            $sueldo=number_format($s_normal, 2, ",", ".");
            $tipo_salario="Salario Normal Mensual"; 
    }

    else if($constancia->getTipo()=='si'){
            $sueldo=number_format($s_integral, 2, ",", ".");
            $tipo_salario="Salario Integral Mensual"; 
    }

    else if($constancia->getTipo()=='sia'){
            $sueldo=number_format($s_anual_integral, 2, ",", ".");
            $tipo_salario="Salario Integral Anual"; 
    }

    else if($constancia->getTipo()=='sba'){
            $sueldo=number_format($s_anual_basico, 2, ",", ".");
            $tipo_salario="Salario Básico Anual"; 
    }

    else if($constancia->getTipo()=='sna'){
            $sueldo=number_format($s_anual_normal, 2, ",", ".");
            $tipo_salario="Salario Normal Anual"; 
    }

    //PARAMETROS
      //variable para enviar a la funcion convertir en letras
      $sueldox=str_replace(".","",$sueldo);
      $sueldox=str_replace(",", ".",$sueldox);

      //imagen de reporte con logo telesur
      $img_telesur = "<img width='150px' src='images/logo.jpg'>";

      //monto cesta tickets
      $monto_cesta_ticket=$parametros['montoticket'];

      //ciudadano o ciudadana dependiendo del sexo
      if($datosnomina['sexo']=='M')$ciudada="el ciudadano"; else $ciudada="la ciudadana";

      //si el solicitante marca bono de alimentacion muestro esto al final de la constancia
      if($constancia->getBonoalimentacion()==true)
      $nota="<br><br><div align='justify' class='letra'><span class='agregado'>Nota:</span> ".ucwords($ciudada)." recibe adicional un monto de Bs. ".$monto_cesta_ticket." por concepto de Beneficio de Alimentación.</div>";
      else $nota="";

      //nombre completo del solicitante
      $nombre=$usuario->getPrimernombre().' '.$usuario->getSegundonombre().' '.$usuario->getPrimerapellido().' '.$usuario->getSegundoapellido();

      //funciones
      $fc=new funcion;
    //FIN PARAMETROS
      

    $fechaingreso=explode("-",$datosnomina['fecha_ingreso']);
    $fechaingreso=$fechaingreso[2].'-'.$fechaingreso[1].'-'.$fechaingreso[0];
    //armo el html
    $html ="<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
    $html .="
            <div align=left>
                    <div class='agregado' style='margin-left:-20px'>".$img_telesur."</div>
                    <div class='agregado'>RIF. G-20004500-0</div>
                    <div class='agregado'>DRH-".date('Y')."</div>

                    <br><br>

                    <div class='letra'>Señores:</div>
                    <div><span class='agregado letra'>".strtoupper($constancia->getDirigida())."</span></div>
                    <div class='letra'>Presente.-</div>

                    <br><br>

                    <div align='justify' class='interlineado'>

                            Quien suscribe, Director(a) de Recursos Humanos de La Nueva Televisión del Sur, C.A., por medio de la presente hace constar que ".$ciudada." <span class='agregado'>".strtoupper(($nombre))."</span>, titular de la cédula de identidad N° <span class='agregado'>".number_format($usuario->getCedula(),0, ",", ".")."</span> labora en esta empresa desde el <span class='agregado'>".$fechaingreso."</span>".$sicont.", desempeñando el cargo de <span class='agregado'>".strtoupper($datosnomina['descripcion_cargo'])."</span>, devengando un <span class='agregado'>".$tipo_salario."</span> de <span class='agregado'>".str_replace("é","É",strtoupper($fc->ValorEnLetras($sueldox,"BOLÍVARES")))."</span>(Bs. ".$sueldo.").

                    </div>

                    <br><br>

                    <div align='justify'>Constancia que se expide en Caracas, a los ".strtolower($fc->ValorEnLetras(date('d'),""))." (".date('d').") día(s) del mes de ".$fc->mes($mes = date("n"))." del año ".strtolower($fc->ValorEnLetras(date('Y'),""))." (".date('Y').").</div>

                    <br><br>

                    <div class='letra'>Atentamente,</div>

                    <br><br>

                    <div><span class='agregado' style='font-size:14px;'>".$parametros['directora']."</div>


                    ".$nota."

                    <br>
                    <div style='font-size:10px;' align='center'>Calle Vargas con calle Santa Clara, edificio Telesur, Boleita Norte, Caracas-Venezuela - Teléfono : 0212-6000202 -Ext . 303/306</div>
            </div>
    ";

    return $html;
    die;
    }
}