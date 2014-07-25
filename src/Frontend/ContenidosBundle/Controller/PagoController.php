<?php

namespace Frontend\ContenidosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

//ASOCIO LAS ENTIDADES QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Entity\Pago;
use Frontend\ContenidosBundle\Entity\Datosproveedor;
use Frontend\ContenidosBundle\Entity\Presupuesto;
use Frontend\ContenidosBundle\Entity\Unidadadministrativa;
use Frontend\ContenidosBundle\Entity\Unidadejecutora;
use Frontend\ContenidosBundle\Entity\Contratacion;
use Frontend\ContenidosBundle\Entity\Controlpagounidad;
use Frontend\ContenidosBundle\Entity\Diasentrega;
use Frontend\ContenidosBundle\Entity\Tipoproveedor;

//ASOCIO LOS FORMULARIOS QUE SE UTILIZARAN
use Frontend\ContenidosBundle\Form\PagoType;
use Frontend\ContenidosBundle\Form\ControlpagounidadType;
use Frontend\ContenidosBundle\Form\DiasType;

/**
 * CONTROLADOR ENTIDAD PAGOS
 *
 */
class PagoController extends Controller
{
    /*
    *
    * LISTA DE TODOS LOS PAGOS 
    *
    */
    public function indexAction($id_contratacion,$id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO LOS DATOS DE LOS PAGOS ASOCIADOS A UNA CONTRATACION
        $entities = $em->getRepository('ContenidosBundle:Pago')->findByIdContratacion($id_contratacion);

        //RETORNO A LA VISTA PARA MOSTRAR LISTADO
        return $this->render('ContenidosBundle:Pago:index.html.twig', array(
            'entities'          => $entities,
            'id_contratacion'   => $id_contratacion,
            'id_presupuesto'    => $id_presupuesto,
            'id_proveedor'      => $id_proveedor,
        ));
    }

 
    //calcula los dias entre dos fechas
    public function dias($fecha1, $fecha2){

            $timestamp1 = mktime(0,0,0,$fecha2[0],$fecha2[1],$fecha2[2]);
            $timestamp2 = mktime(0,0,0,$fecha1[0],$fecha1[1],$fecha1[2]);
            $segundos_diferencia = $timestamp1 - $timestamp2; 
            $dias_diferencia = $segundos_diferencia / (60 * 60 * 24);
            return $dias_diferencia; 
    }

    /*
    *
    * FUNCION PARA VER EL DETALLE  DEL SEGUIMIENTO DEL PAGO (RUTA Y TIEMPOS)
    *
    */
    public function rutapagoAction()
    {          
        $id_tipoproveedor = 1;
        $estatus = 'A';

        $dql = "select d from ContenidosBundle:Datosproveedor d 
                where d.idTipoprov=:id_tipoproveedor and d.estatus=:estatus";
        $consulta = $em->createQuery($dql)->setParameters(
                                                            array(
                                                                    'id_tipoproveedor'=> $id_tipoproveedor, 
                                                                    'estatus' => $estatus,
                                                                 )


                                                         );
        $entities = $consulta->getResult();
        return $this->render('ContenidosBundle:Pago:rutapago.html.twig', array(
            'entities' => $entities
        ));
    }

    /*
    *
    * FUNCION PARA VER EL DETALLE  DEL SEGUIMIENTO DEL PAGO (RUTA Y TIEMPOS)
    *
    */
    public function controlrutaAction($id_contratacion,$id_presupuesto,$id_proveedor, $id)
    {
        $em = $this->getDoctrine()->getManager();  

        $entity = $em->getRepository('ContenidosBundle:Controlpagounidad')->findByIdPago($id);
        $entity = $entity[0];

        $status = $entity->getStatus();

        $fecha[1] = $entity->getFechaUnidaduno();
        $fecha[2] = $entity->getFechaUnidaddos();
        $fecha[3] = $entity->getFechaUnidadtres();
        $fecha[4] = $entity->getFechaUnidadcuatro();
        $fecha[5] = $entity->getFechaUnidadcinco();
        $fecha[6] = $entity->getFechaUnidadseis();
        $fecha[7] = $entity->getFechaUnidadsiete();

        $hoy = date('m-d-Y'); 
        if($fecha[1] != NULL)
        {
            $fecha_uno = $fecha[1]->format('m-d-Y');
        }
        if($fecha[2] != NULL)
        {
            $fecha_dos = $fecha[2]->format('m-d-Y');
        }
        if($fecha[3] != NULL)
        {
            $fecha_tres = $fecha[3]->format('m-d-Y');
        }
        if($fecha[4] != NULL)
        {
           $fecha_cuatro = $fecha[4]->format('m-d-Y');
        }
        if($fecha[5] != NULL)
        {
            $fecha_cinco = $fecha[5]->format('m-d-Y');
        }
        if($fecha[6] != NULL)
        {
            $fecha_seis = $fecha[6]->format('m-d-Y');
        }
        if($fecha[7] != NULL)
        {
            $fecha_siete = $fecha[7]->format('m-d-Y');
        } 
        $dias_diferencia = array();
        
        if ($status == 1)
        {
            $fecha1 = explode("-", $fecha_uno);
            $fecha2 = explode("-", $hoy);
            $dias_diferencia[1]= $this->dias($fecha1,$fecha2);
            $dias_diferencia[8] = $dias_diferencia[1];


        }elseif ($status == 2) {
            $fecha_dos = $fecha[2]->format('m-d-Y');

            $fecha1 = explode("-", $fecha_dos);
            $fecha2 = explode("-", $hoy);
            $dias_diferencia[2]= $this->dias($fecha1,$fecha2);
            $dias_diferencia[8] = $dias_diferencia[2];

        }elseif ($status == 3) {

            $fecha1 = explode("-", $fecha_tres);
            $fecha2 = explode("-", $hoy);
            $dias_diferencia[3]= $this->dias($fecha1,$fecha2);

            if ($fecha[1] != NULL or $fecha[2] != NULL)
            {
                $fecha2 = explode("-", $fecha_tres);
                if ($fecha[1] != NULL)
                {
                    $fecha1 = explode("-", $fecha_uno);
                    $dias_diferencia[1]= $this->dias($fecha1,$fecha2); 

                    $fecha1 = explode("-", $fecha_uno);
                    $fecha2 = explode("-", $hoy);
                    $dias_diferencia[8]= $this->dias($fecha1,$fecha2);  
                }else
                {
                    $fecha1 = explode("-", $fecha_dos);
                    $dias_diferencia[2]= $this->dias($fecha1,$fecha2);

                    $fecha1 = explode("-", $fecha_dos);
                    $fecha2 = explode("-", $hoy);
                    $dias_diferencia[8]= $this->dias($fecha1,$fecha2); 
                }                 
            }else
            {   $dias_diferencia[1]= NULL;
                $dias_diferencia[2]= NULL;
                $dias_diferencia[8]= $dias_diferencia[3];
            }

        }elseif ($status == 4) {

            $fecha1 = explode("-", $fecha_cuatro);
            $fecha2 = explode("-", $hoy);
            $dias_diferencia[4]= $this->dias($fecha1,$fecha2);

            $fecha1 = explode("-", $fecha_tres);
            $fecha2 = explode("-", $fecha_cuatro);
            $dias_diferencia[3]= $this->dias($fecha1,$fecha2);

            if ($fecha[1] != NULL or $fecha[2] != NULL)
            {
                $fecha2 = explode("-", $fecha_tres);
                if ($fecha[1] != NULL)
                {
                    $fecha1 = explode("-", $fecha_uno);
                    $dias_diferencia[1]= $this->dias($fecha1,$fecha2); 

                    $fecha1 = explode("-", $fecha_uno);
                    $fecha2 = explode("-", $hoy);
                    $dias_diferencia[8]= $this->dias($fecha1,$fecha2);                  
                }else
                {
                    $fecha1 = explode("-", $fecha_dos);
                    $dias_diferencia[2]= $this->dias($fecha1,$fecha2);

                    $fecha1 = explode("-", $fecha_dos);
                    $fecha2 = explode("-", $hoy);
                    $dias_diferencia[8]= $this->dias($fecha1,$fecha2);
                }                 
            }else
            {
                $fecha1 = explode("-", $fecha_tres);
                $fecha2 = explode("-", $hoy);
                $dias_diferencia[8]= $this->dias($fecha1,$fecha2);
            }
        }elseif ($status == 5) {

            $fecha1 = explode("-", $fecha_cinco);
            $fecha2 = explode("-", $hoy);
            $dias_diferencia[5]= $this->dias($fecha1,$fecha2);

            $fecha1 = explode("-", $fecha_cuatro);
            $fecha2 = explode("-", $fecha_cinco);
            $dias_diferencia[4]= $this->dias($fecha1,$fecha2);

            $fecha1 = explode("-", $fecha_tres);
            $fecha2 = explode("-", $fecha_cuatro);
            $dias_diferencia[3]= $this->dias($fecha1,$fecha2);

            if ($fecha[1] != NULL or $fecha[2] != NULL)
            {
                $fecha2 = explode("-", $fecha_tres);
                if ($fecha[1] != NULL)
                {
                    $fecha1 = explode("-", $fecha_uno);
                    $dias_diferencia[1]= $this->dias($fecha1,$fecha2); 

                    $fecha1 = explode("-", $fecha_uno);
                    $fecha2 = explode("-", $hoy);
                    $dias_diferencia[8]= $this->dias($fecha1,$fecha2);                  
                }else
                {
                    $fecha1 = explode("-", $fecha_dos);
                    $dias_diferencia[2]= $this->dias($fecha1,$fecha2);

                    $fecha1 = explode("-", $fecha_dos);
                    $fecha2 = explode("-", $hoy);
                    $dias_diferencia[8]= $this->dias($fecha1,$fecha2);
                }                 
            }else
            {
                $fecha1 = explode("-", $fecha_tres);
                $fecha2 = explode("-", $hoy);
                $dias_diferencia[8]= $this->dias($fecha1,$fecha2);
            }

        }elseif ($status == 6) {

            $fecha1 = explode("-", $fecha_seis);
            $fecha2 = explode("-", $hoy);
            $dias_diferencia[6]= $this->dias($fecha1,$fecha2);

            $fecha1 = explode("-", $fecha_cinco);
            $fecha2 = explode("-", $fecha_seis);
            $dias_diferencia[5]= $this->dias($fecha1,$fecha2);

            $fecha1 = explode("-", $fecha_cuatro);
            $fecha2 = explode("-", $fecha_cinco);
            $dias_diferencia[4]= $this->dias($fecha1,$fecha2);

            $fecha1 = explode("-", $fecha_tres);
            $fecha2 = explode("-", $fecha_cuatro);
            $dias_diferencia[3]= $this->dias($fecha1,$fecha2);

            if ($fecha[1] != NULL or $fecha[2] != NULL)
            {
                $fecha2 = explode("-", $fecha_tres);
                if ($fecha[1] != NULL)
                {
                    $fecha1 = explode("-", $fecha_uno);
                    $dias_diferencia[1]= $this->dias($fecha1,$fecha2); 

                    $fecha1 = explode("-", $fecha_uno);
                    $fecha2 = explode("-", $hoy);
                    $dias_diferencia[8]= $this->dias($fecha1,$fecha2);                  
                }else
                {
                    $fecha1 = explode("-", $fecha_dos);
                    $dias_diferencia[2]= $this->dias($fecha1,$fecha2);

                    $fecha1 = explode("-", $fecha_dos);
                    $fecha2 = explode("-", $hoy);
                    $dias_diferencia[8]= $this->dias($fecha1,$fecha2);
                }                 
            }else
            {
                $fecha1 = explode("-", $fecha_tres);
                $fecha2 = explode("-", $hoy);
                $dias_diferencia[8]= $this->dias($fecha1,$fecha2);
            }

        }elseif ($status == 7) {

            $fecha1 = explode("-", $fecha_siete);
            $fecha2 = explode("-", $hoy);
            $dias_diferencia[7]= $this->dias($fecha1,$fecha2);

            $fecha1 = explode("-", $fecha_seis);
            $fecha2 = explode("-", $fecha_siete);
            $dias_diferencia[6]= $this->dias($fecha1,$fecha2);

            $fecha1 = explode("-", $fecha_cinco);
            $fecha2 = explode("-", $fecha_seis);
            $dias_diferencia[5]= $this->dias($fecha1,$fecha2);

            $fecha1 = explode("-", $fecha_cuatro);
            $fecha2 = explode("-", $fecha_cinco);
            $dias_diferencia[4]= $this->dias($fecha1,$fecha2);

            $fecha1 = explode("-", $fecha_tres);
            $fecha2 = explode("-", $fecha_cuatro);
            $dias_diferencia[3]= $this->dias($fecha1,$fecha2);

            if ($fecha[1] != NULL or $fecha[2] != NULL)
            {
                $fecha2 = explode("-", $fecha_tres);
                if ($fecha[1] != NULL)
                {
                    $fecha1 = explode("-", $fecha_uno);
                    $dias_diferencia[1]= $this->dias($fecha1,$fecha2); 

                    $fecha1 = explode("-", $fecha_uno);
                    $fecha2 = explode("-", $fecha_siete);
                    $dias_diferencia[8]= $this->dias($fecha1,$fecha2);                  
                }else
                {
                    $fecha1 = explode("-", $fecha_dos);
                    $dias_diferencia[2]= $this->dias($fecha1,$fecha2);

                    $fecha1 = explode("-", $fecha_dos);
                    $fecha2 = explode("-", $fecha_siete);
                    $dias_diferencia[8]= $this->dias($fecha1,$fecha2);
                }                 
            }else
            {
                $fecha1 = explode("-", $fecha_tres);
                $fecha2 = explode("-", $fecha_siete);
                $dias_diferencia[8]= $this->dias($fecha1,$fecha2);
            }
        }

        //RETORNO A LA VISTA PARA MOSTRAR LISTADO
        return $this->render('ContenidosBundle:Pago:controlruta.html.twig', array(
            'dias_diferencia'   => $dias_diferencia,
            'estatus'           => $status,
            'fecha'             => $fecha,
            'id_contratacion'   => $id_contratacion,
            'id_presupuesto'    => $id_presupuesto,
            'id_proveedor'      => $id_proveedor,
        ));
    }
    
    /*
    *
    * FUNCION PARA REGISTRAR EL SEGUIMIENTO DEL PAGO
    *
    */
    public function controlAction($id_contratacion,$id_presupuesto,$id_proveedor, $id)
    {
        $em = $this->getDoctrine()->getManager();  

        $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);
        $entity1 = $em->getRepository('ContenidosBundle:Controlpagounidad')->findByIdPago($id);

        foreach ($entity1 as $key) 
        {
            $est[$key->getId()]=$key->getStatus();
            $estatus = $est[$key->getId()];
        }

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $editForm = $this->createForm(new PagoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $editForm1 = $this->createForm(new ControlpagounidadType(), $entity1[0]);      
        $deleteForm1 = $this->createDeleteForm($entity1);

        //RETORNO A LA VISTA
        return $this->render('ContenidosBundle:Pago:control.html.twig', array(
            'entity'            => $entity,
            'entity1'           => $entity1,
            'estatus'           => $estatus,
            'edit_form'         => $editForm->createView(),
            'delete_form'       => $deleteForm->createView(),
            'edit_form1'        => $editForm1->createView(),
            'delete_form1'      => $deleteForm1->createView(),
            'id_contratacion'   => $id_contratacion,
            'id_presupuesto'    => $id_presupuesto,
            'id_proveedor'      => $id_proveedor,
        )); 

    }

    /*
    *
    * FUNCION PARA ACTUALIZAR EL SEGUIMIENTO DEL PAGO
    *
    */
    public function controlupdateAction(Request $request,$id_contratacion,$id_presupuesto,$id_proveedor, $id)
    {
        $em = $this->getDoctrine()->getManager();  

        $entitys = $em->getRepository('ContenidosBundle:Pago')->find($id);
        $entities = $em->getRepository('ContenidosBundle:Contratacion')->find($id_contratacion);
        $uniejec = $entitys->getIdUnidadejec()->getId();
        $ejecutora = $em->getRepository('ContenidosBundle:Unidadejecutora')->find($uniejec);

        $entitys1 = $em->getRepository('ContenidosBundle:Controlpagounidad')->findByIdPago($id);
        $entitys1 = $entitys1[0];

        $status = $entitys1->getStatus();



        $editForm = $this->createForm(new ControlpagounidadType(), $entitys1);    
        $editForm->bind($request);

        $fecha[1] = $entitys1->getFechaUnidaduno();
        $fecha[2] = $entitys1->getFechaUnidaddos();
        $fecha[3] = $entitys1->getFechaUnidadtres();
        $fecha[4] = $entitys1->getFechaUnidadcuatro();
        $fecha[5] = $entitys1->getFechaUnidadcinco();
        $fecha[6] = $entitys1->getFechaUnidadseis();
        $fecha[7] = $entitys1->getFechaUnidadsiete();

        $alert = 0;
        if ($status == 1)
        {
            if($fecha[3] != NULL)
            {
                $status  = 3;
                $mensaje = 'EL PAG0 ESTA EN LA OFICINA DE LA DIRECTORA';
            }else
            {
                $alert = 1;
            }            
        }elseif($status == 2)
        {
            if($fecha[3] != NULL)
            {
                $status = 3;
                $mensaje = 'EL PAG0 ESTA EN LA OFICINA DE LA DIRECTORA';  
            }else
            {
                $alert = 1;
            }
        }elseif($status == 3)
        {
            if($fecha[4] != NULL)
            {
                $status = 4; 
                $mensaje = 'EL PAG0 ESTA EN LA UNIDAD DE PRESUPUESTO'; 
            }else
            {
                $alert = 1;
            } 
        }elseif($status == 4)
        {
            if($fecha[5] != NULL)
            {
                $status = 5;  
                $mensaje = 'EL PAG0 ESTA EN LA UNIDAD DE FINANZAS';
            }else
            {
                $alert = 1;
            } 
        }elseif($status == 5)
        {
            if($fecha[6] != NULL)
            {
                $status = 6; 
                $mensaje = 'EL PAG0 ESTA EN LA UNIDAD DE TESORERIA'; 
            }else
            {
                $alert = 1;
            } 
        }elseif($status == 6)
        {
            if($fecha[7] != NULL)
            {
                $status = 7; 
                $mensaje = 'EL PAG0 FUE ENTREGADO AL BENEFICIARIO'; 
            }else
            {
                $alert = 1;
            } 
        }
        if ($alert == 0)
        {
            $entitys1->setIdEjecutora($ejecutora);
            $entitys1->setIdContratacion($entities);
            $entitys1->setIdPago($entitys);
            $entitys1->setStatus($status);

            $em->persist($entitys1);
            $em->flush();

            //OBTENGO LOS DATOS DE LOS PAGOS ASOCIADOS A UNA CONTRATACION
            $entities = $em->getRepository('ContenidosBundle:Pago')->findByIdContratacion($id_contratacion);

            //RETORNO A LA VISTA PARA MOSTRAR LISTADO
            $this->get('session')->getFlashBag()->add('notice', $mensaje);
            return $this->render('ContenidosBundle:Pago:index.html.twig', array(
                'entities'          => $entities,
                'id_contratacion'   => $id_contratacion,
                'id_presupuesto'    => $id_presupuesto,
                'id_proveedor'      => $id_proveedor,
            ));
        }else
        {
            $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);
            $entity1 = $em->getRepository('ContenidosBundle:Controlpagounidad')->findByIdPago($id);
            
            //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
            $editForm = $this->createForm(new PagoType(), $entity);
            $deleteForm = $this->createDeleteForm($id);

            $editForm1 = $this->createForm(new ControlpagounidadType(), $entity1[0]);      
            $deleteForm1 = $this->createDeleteForm($entity1);

            $this->get('session')->getFlashBag()->add('alert', 'DEBE INGRESAR UNA FECHA');

            //RETORNO A LA VISTA PARA MOSTRAR LISTADO
            return $this->render('ContenidosBundle:Pago:control.html.twig', array(
                'entity'            => $entitys,
                'entity1'           => $entitys1,
                'estatus'           => $status,
                'edit_form'         => $editForm->createView(),
                'delete_form'       => $deleteForm->createView(),
                'edit_form1'        => $editForm1->createView(),
                'delete_form1'      => $deleteForm1->createView(),
                'id_contratacion'   => $id_contratacion,
                'id_presupuesto'    => $id_presupuesto,
                'id_proveedor'      => $id_proveedor,
            )); 
        }      
    }


    /*
    *
    * FUNCION PARA CREAR UN NUEVO PAGO
    *
    */
    public function createAction(Request $request,$id_contratacion,$id_presupuesto,$id_proveedor, $tipomoneda)
    {
        $alert = 0;

        $em = $this->getDoctrine()->getManager();

        //OBTENGO EL TIPO DE PROVEEDOR
        $pres = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
        $prov = $pres->getIdProveedor();

        $prove = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
        $id_prov = $prove->getIdTipoprov();

        $compras = 0;
        if($id_prov == 'COMPRAS')
        {
           $compras=1;
        }

        //OBTENGO LOS DATOS DE LA CONTRATACION
        $contrat = $em->getRepository('ContenidosBundle:Contratacion')->find($id_contratacion);

        //OBTENGO LOS DATOS DEL PROVEEDOR DE ACUERDO A UNA CONTRATACION 
        $entities = $em->getRepository('ContenidosBundle:Datosproveedor')->findBynombre($id_contratacion);

        //INSTANCIO LAS VARIABLES ENTITY Y ENTITY1
        $entity  = new Pago();
        $entity1 = new Controlpagounidad();
        
        $form   = $this->createForm(new PagoType(), $entity);
        $form1  = $this->createForm(new ControlpagounidadType(), $entity1);

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $form->bind($request);
        $form1->bind($request);

        if ($compras == 1)
        {
            $contraentrega = $entity->getContraEntrega();
            //Obtengo los dias de entrega
            if ($contraentrega == 0 )
            {
                // obtengo los datos del formulario AJAX
                $datosform = $request->request->all();
                $datosform = $datosform['form'];
                $diasentrega = $datosform['diasentrega'];
            }else
            {
                $diasentrega = 0;
            }
        }else
        {
            $diasentrega = 0;
        }

        //OBTENGO LA UNIDAD EJECUTORA
        $ejec= $entity->getIdUnidadejec();
        $ejecu = $em->getRepository('ContenidosBundle:Unidadejecutora')->find($ejec);
        $unidadejecutora = $ejecu->getId();

        //TOMO ESTE CAMPO COMO REFERENCIA, PARA TRAER LOS DATOS DEL PAGO
        $numerofactura= $entity->getNumFactura();        

        //BLOQUE PARA DETERMINAR SI EL NUM DE LA FACTURA ES UNICO
        $pago_repetido = $em->getRepository('ContenidosBundle:Pago')->findBynumFactura($numerofactura);
        $cont = 0;
        
        foreach ($pago_repetido as $key ) {
            $cont ++; 
        }
        if ($cont != 0)
        {
            $alert = 1;
            $mensaje = "EL NUMERO DE LA FACTURA ESTA REPETIDO";
        }

        //BLOQUE PARA DETERMINAR SI SE INGRESARON LOS MONTOS DE ACUERDO AL TIPO DE MONEDA
        $monto[0] = $entity->getMontoBs();
        $monto[1] = $entity->getMontoMe();

        if ($monto[0] != NULL or $monto[0] != 0)
        {
            if ($tipomoneda == 1)
            {
                if ($monto[1] == NULL or $monto[1] == 0 )
                {
                    $alert= 1;
                    $mensaje = "DEBE INGRESAR EL MONTO EN DOLARES";
                }
            }elseif($tipomoneda == 2)
            {
                if ($monto[1] == NULL or $monto[1] == 0 )
                {
                    $alert= 1;
                    $mensaje = "DEBE INGRESAR EL MONTO EN EUROS";
                }
            }
        }else
        {
            $alert= 1;
            $mensaje = "DEBE INGRESAR EL MONTO EN BOLIVARES";
        }

        //BLOQUE PARA DETERMINAR SI EL PAGO ES VÁLIDO
        $debe[0] = $contrat->getDebeBs();
        $debe[1] = $contrat->getDebeMe();
        
        //CALCULO LA DEUDA ACTUAL
        $debe_act[0] = $debe[0] - $monto[0];
        if ($tipomoneda == 1 or $tipomoneda == 2)
        {
            $debe_act[1] = $debe[1] - $monto[1]; 
        }else
        {
            $debe_act[1] = NULL;
        }        

        if (($debe[0]== 0))
        {
            $alert = 1;
            $mensaje = "LA CONTRATACION YA SE PAGO COMPLETAMENTE";
        }else
        {
            if (($debe_act[0]< 0))
            {
                $alert = 1;
                $mensaje = "EL PAGO EXCEDE EL MONTO DE LA DEUDA";
            }else
            {
                $contrat->setDebeBs($debe_act[0]);
                $contrat->setDebeMe($debe_act[1]);
            }
        }

        $fecha[1] = $entity1->getFechaUnidaduno();
        $fecha[2] = $entity1->getFechaUnidaddos();
        $fecha[3] = $entity1->getFechaUnidadtres(); 

        if(!empty($fecha[3]) and (empty($fecha[2])) and (empty($fecha[1])))
        {
            $status = 3;
        }elseif(empty($fecha[3]) and (!empty($fecha[2])) and (empty($fecha[1])))
        {
            $status = 2;
        }elseif(empty($fecha[3]) and (empty($fecha[2])) and (!empty($fecha[1])))
        {
            $status = 1;
        }elseif (!empty($fecha[3]) and (!empty($fecha[2])) and (!empty($fecha[1])))
        {
            $alert = 1; //genera un error porque tiene mas de un fecha de entrega
            $mensaje = "INGRESE SOLO UNA FECHA DE ENTREGA";
        }elseif (!empty($fecha[3]) and (!empty($fecha[2])) and (empty($fecha[1])))
        {
            $alert = 1; //genera un error porque tiene mas de un fecha de entrega
            $mensaje = "INGRESE SOLO UNA FECHA DE ENTREGA";
        }elseif (!empty($fecha[3]) and (empty($fecha[2])) and (!empty($fecha[1])))
        {
            $alert = 1; //genera un error porque tiene mas de un fecha de entrega
            $mensaje = "INGRESE SOLO UNA FECHA DE ENTREGA";
        }elseif (empty($fecha[3]) and (!empty($fecha[2])) and (!empty($fecha[1])))
        {
            $alert = 1; //genera un error porque tiene mas de un fecha de entrega
            $mensaje = "INGRESE SOLO UNA FECHA DE ENTREGA";
        }else
        {
            $alert = 1; //genera un error porque no tiene ninguna fecha de entrega
            $mensaje = "INGRESE AL MENOS UNA FECHA DE ENTREGA";
        }

        if ($alert == 0 )
        {
            //VERIFICO SI EL  FORMULARIO ES VALIDO
            if($form->isValid()) 
            { 

                $cont = $em->getRepository('ContenidosBundle:Contratacion')->find($id_contratacion);
                $dias = $em->getRepository('ContenidosBundle:Diasentrega')->find($diasentrega);
                
                //SETEO VALORES EN LA ENTIDAD PAGO
                $entity->setidContratacion($cont);
                $entity->setDiasEntrega($dias);
                $entity->setTipoMoneda($tipomoneda); 

                if($tipomoneda == 3)
                {
                    $monto = NULL;
                    $entity->setMontoMe($monto);
                }      

                $entity1->setIdEjecutora($ejecu);
                $entity1->setIdContratacion($cont);
                $entity1->setStatus($status);  

                $em->persist($entity);

                $id_pago = $entity->getId();

                $pagooo = $em->getRepository('ContenidosBundle:Pago')->find($id_pago);
                $entity1->setIdPago($pagooo);

                //INSERTO LOS VALORES EN LA TABLA PAGO Y CONTROLPAGOUNIDAD
                
                $em->persist($entity1);
                $em->flush();
            

                //envio a notificacion de que el registro fue creado
                $this->get('session')->getFlashBag()->add('notice', ' SE REGISTRO EXITOSAMENTE EL PAGO');

                //ENVIO A LA VISTA SHOW PARA MOSTRAR PAGO CREADO
                return $this->redirect($this->generateUrl('pago_show', array(
                                                                             'id'               => $entity->getId(),
                                                                             'id_contratacion'  => $id_contratacion,
                                                                             'id_proveedor'     => $id_proveedor,
                                                                             'id_presupuesto'   => $id_presupuesto,
                                                                            )));
                
            }
        }else
        {
            //envio a alerta
            $this->get('session')->getFlashBag()->add('alert', $mensaje);
        }
        //ENVIO A LA VISTA NEW PARA MOSTRAR FORMULARIO DE PAGO
        return $this->render('ContenidosBundle:Pago:new.html.twig', array(
            'entity'            => $entity,
            'entity1'           => $entity1,
            'form'              => $form->createView(),
            'form1'             => $form1->createView(),
            'id_contratacion'   => $id_contratacion,
            'id_proveedor'      => $id_proveedor,
            'id_presupuesto'    => $id_presupuesto,
            'compras'           => $compras,
            'tipomoneda'        => $tipomoneda,
        ));
    }

    /*
    *
    * FUNCION PARA MOSTRAR EL FORMULARIO PARA CREAR NUEVO PAGO.
    *
    */
    public function newAction($id_contratacion,$id_presupuesto,$id_proveedor)
    {

        $em = $this->getDoctrine()->getManager();
     
        //OBTENGO EL TIPO DE PROVEEDOR
         $pres = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
         $prov = $pres->getIdProveedor();

         $prove = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
         $id_prov = $prove->getIdTipoprov();

         $compras = 0;
         if($id_prov == 'COMPRAS')
         {
            $compras=1;
         }

        $entities = $em->getRepository('ContenidosBundle:Contratacion')->find($id_contratacion);

        $tipomoneda= $entities->getTipoMoneda();

        //INSTANCIO LA CLASE PAGO
        $entity         = new Pago();
        $entity1        = new Controlpagounidad();

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $form       = $this->createForm(new PagoType(), $entity);
        $form1      = $this->createForm(new ControlpagounidadType(), $entity1);
        
        //ENVIO A LA VISTA NEW PARA MOSTRAR FORMULARIO
        return $this->render('ContenidosBundle:Pago:new.html.twig', array(
            'entity'            => $entity,
            'entity1'           => $entity1,
            'compras'           => $compras,
            'form'              => $form->createView(),
            'form1'             => $form1->createView(),
            'id_contratacion'   => $id_contratacion,
            'id_proveedor'      => $id_proveedor,
            'id_presupuesto'    => $id_presupuesto,
            'tipomoneda'        => $tipomoneda,
        ));
    }

    /*
    *
    * FUNCION PARA MOSTRAR DETALLES DEL PAGO
    *
    */
    public function showAction($id,$id_contratacion, $id_presupuesto, $id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO EL TIPO DE PROVEEDOR
        $pres = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
        $prov = $pres->getIdProveedor();

        $prove = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
        $id_prov = $prove->getIdTipoprov();

        $compras = 0;
        if($id_prov == 'COMPRAS')
        {
           $compras=1;
        }

        //OBTENGO LOS DATOS DEL PAGO DE ACUERDO AL ID ENVIADO
        $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);
        $idpago = $entity->getId();
        $entity1 = $em->getRepository('ContenidosBundle:Controlpagounidad')->findByIdPago($idpago);

        foreach ($entity1 as $key) 
        {
            $est[$key->getId()]=$key->getStatus();
            $estatus = $est[$key->getId()];

            $entity2 = $em->getRepository('ContenidosBundle:Unidadadministrativa')->find($estatus);
            $unidad = $entity2->getNombre();
        }

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pago entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        //ENVIO A LA VISTA SHOW PARA MOSTRAR LOS DETALLES DEL PAGO
        return $this->render('ContenidosBundle:Pago:show.html.twig', array(
            'entity'            => $entity,
            'entity1'           => $entity1,
            'delete_form'       => $deleteForm->createView(),        
            'id_contratacion'   => $id_contratacion,
            'id_presupuesto'    => $id_presupuesto,
            'id_proveedor'      => $id_proveedor,
            'unidad'            => $unidad,
            'estatus'           => $estatus,
            'compras'           => $compras,
            ));
    }

    /*
    *
    * FUNCION PARA MOSTRAR EL FORMULARIO DEL PAGO(PARA EDITAR).
    *
    */
    public function editAction($id,$id_contratacion,$id_presupuesto,$id_proveedor)
    {
        $em = $this->getDoctrine()->getManager();

        //OBTENGO EL TIPO DE PROVEEDOR
        $pres = $em->getRepository('ContenidosBundle:Presupuesto')->find($id_presupuesto);
        $prov = $pres->getIdProveedor();

        $prove = $em->getRepository('ContenidosBundle:Datosproveedor')->find($prov);
        $id_prov = $prove->getIdTipoprov();

        $compras = 0;
        if($id_prov == 'COMPRAS')
        {
           $compras=1;
        }

        //OBTENGO INFORMACION DEL PAGO DE ACUERDO AL ID ENVIADO
        $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);
        $uniejec = $entity->getIdUnidadejec()->getId();


        $idpago = $entity->getId();

        $entities = $em->getRepository('ContenidosBundle:Contratacion')->find($id_contratacion);

        $tipomoneda= $entities->getTipoMoneda();

        $entity1 = $em->getRepository('ContenidosBundle:Controlpagounidad')->findByIdPago($idpago);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pago entity.');
        }
        

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $editForm = $this->createForm(new PagoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $editForm1 = $this->createForm(new ControlpagounidadType(), $entity1[0]);      
        $deleteForm1 = $this->createDeleteForm($entity1);


        //ENVIO A LA VISTA EDIT PARA MOSTRAR EL FORMULARIO
        return $this->render('ContenidosBundle:Pago:edit.html.twig', array(
            'entity'            => $entity,
            'edit_form'         => $editForm->createView(),
            'delete_form'       => $deleteForm->createView(),
            'edit_form1'        => $editForm1->createView(),
            'delete_form1'      => $deleteForm1->createView(),
            'id_contratacion'   => $id_contratacion,
            'id_presupuesto'    => $id_presupuesto,
            'id_proveedor'      => $id_proveedor,
            'compras'           => $compras,
            'uniejec'           => $uniejec,
            'tipomoneda'        => $tipomoneda,
        ));
    }

    /*
    *
    * FUNCION PARA INSERTAR DATOS DEL PAGO EN LA BASE DE DATOS
    *
    */
    public function updateAction(Request $request, $id, $id_contratacion,$id_proveedor,$id_presupuesto)
    {
        $datos=$request->request->all();
        $datos=$datos['frontend_contenidosbundle_controlpagounidadtype'];

        $em = $this->getDoctrine()->getManager();

        //OBTENGO INFORMACION DEL PAGO DE ACUERDO A SU ID
        $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);

        $idpago = $entity->getId();
        $entity1 = $em->getRepository('ContenidosBundle:Controlpagounidad')->findByIdPago($idpago);

        $entity1 = $entity1[0];
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Pago entity.');
        }

        $status = $entity1->getStatus();

        $deleteForm = $this->createDeleteForm($id);

        //ASOCIO LOS CAMPOS DEL FORMULARIO A LA VARIABLE ENTITY
        $editForm  = $this->createForm(new PagoType(), $entity);
        $editForm1 = $this->createForm(new ControlpagounidadType(), $entity1);    

        //OBTENGO LOS DATOS QUE ENVIO EL USUARIO A TRAVES DEL FORMULARIO $form
        $editForm->bind($request);

        //VERIFICO SI EL  FORMULARIO ES VALIDO
        if ($editForm->isValid()) 
        {

            $entities = $em->getRepository('ContenidosBundle:Contratacion')->find($id_contratacion);
            $tipomoneda= $entities->getTipoMoneda();

            $uniejec = $entity->getIdUnidadejec()->getId();

            //INSERTO LOS DATOS EN LA BASE DE DATOS
            $entity->setTipoMoneda($tipomoneda);
            $entity->setIdContratacion($entities);
            
            $ejecutora = $em->getRepository('ContenidosBundle:Unidadejecutora')->find($uniejec);

            $entity1->setIdEjecutora($ejecutora);
            $entity1->setIdContratacion($entities);
            $entity1->setStatus($status);
            $entity1->setIdPago($entity);

            $em->persist($entity);
            $em->persist($entity1);
            $em->flush();

            //envio a notificacion de que el registro fue creado
            $this->get('session')->getFlashBag()->add('notice', ' SE EDITO EXITOSAMENTE EL PAGO');

            //ENVIO A LA VISTA SHOW PARA VER EL DETALLE DE LOS CAMBIOS
            return $this->redirect($this->generateUrl('pago_show', array(   
                                                                            'id'              => $id,
                                                                            'id_contratacion' => $id_contratacion,
                                                                            'id_proveedor'    => $id_proveedor,
                                                                            'id_presupuesto'  => $id_presupuesto,
                                                                        )));
        }

        //ENVIO A LA VISTA ANTERIOR SI EL FORMULARIO NO ES VALIDO
        return $this->render('ContenidosBundle:Pago:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /*
    *
    * FUNCION PARA ELIMINAR PAGOS.
    *
    */
    public function deleteAction($id, $id_contratacion, $id_presupuesto, $id_proveedor)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ContenidosBundle:Pago')->find($id);

        $Contratacion= $entity->getIdContratacion();

        $entity2 = $em->getRepository('ContenidosBundle:Contratacion')->find($id_contratacion);

        $monto[0] = $entity->getmontoMe();
        $monto[1] = $entity->getmontoBs();

        $debe_ant[0] = $entity2->getDebeMe();
        $debe_ant[1] = $entity2->getDebeBs();

        $debe_act[0] = $debe_ant[0] + $monto[0];
        $debe_act[1] = $debe_ant[1] + $monto[1];

        if (!$entity) 
        {
            throw $this->createNotFoundException('Unable to find Pago entity.');
        }

        $dql   = "SELECT cpg FROM ContenidosBundle:Controlpagounidad cpg 
                    where cpg.idPago= :id";
        $query = $em->createQuery($dql)->setParameter('id',$id);
        $cpago=$query->getResult();

        if ($cpago != NULL)
        {
            foreach ($cpago as $key) 
            {
               $id_control = $key->getId();
            }
        
            $entity1 = $em->getRepository('ContenidosBundle:Controlpagounidad')->find($id_control);
           
            //ELIMINO PRIMERO LOS DATOS DEL CONTROL DEL PAGO
                $em->remove($entity1);
                $em->flush();
        }

        //AHORA ELIMINO LOS DATOS DEL PAGO
            $em->remove($entity);
            
        //REVERSO LA DEUDA EN LA CONTRATACION
            
            $entity2->setDebeMe($debe_act[0]);
            $entity2->setDebeBs($debe_act[1]);
     
            $em->flush();
        //OBTENGO LOS DATOS DE LOS PAGOS ASOCIADOS A UNA CONTRATACION
        $entities = $em->getRepository('ContenidosBundle:Pago')->findByIdContratacion($id_contratacion);

        //envio a notificacion de que el registro fue creado
        $this->get('session')->getFlashBag()->add('notice', ' SE ELIMINARON LOS DATOS DEL PAGO EXITOSAMENTE');

        //ENVIO A LA VISTA SHOW PARA MOSTRAR PAGO CREADO
        return $this->redirect($this->generateUrl('pago', array(
                                                                'entities'         => $entities,
                                                                'id_contratacion'  => $id_contratacion,
                                                                'id_proveedor'     => $id_proveedor,
                                                                'id_presupuesto'   => $id_presupuesto,
                                                                )));
           
    }

    /**
     * Creates a form to delete a Pago entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}//fin de la clase