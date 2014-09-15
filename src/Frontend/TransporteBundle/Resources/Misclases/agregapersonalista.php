<?php

namespace Frontend\TransporteBundle\Resources\Misclases;

class agregarpersonalista
{
    public function agregarpersonalist($datos)
    { 

        $datos=$_GET['datos'];
    
        if(!empty($datos))
        {
            $html="<table class='tablaajaxlist'>
                    <tr>
                        <th>NOMBRES</th>
                        <th>APELLIDOS</th>
                        <th>CEDULA</th>
                        <th>PERSONAL</th>
                    </tr>";

            $personas =  explode(",", $datos);    

            $l = count($personas);  

            foreach ($personas as $p) {

                $psn = explode("-", $p);

                if($psn[1]=='i'){

                    $a = new Criteria();       
                    $a->add(SfGuardUserProfilePeer::USER_ID,$psn[0]);
                    $perfil_i=SfGuardUserProfilePeer::doSelect($a);

                    $datos=ucwords($perfil_i[0]->getNombre1().' '.$perfil_i[0]->getApellido1()).' (C.I: '.$perfil_i[0]->getCedula().')';
                    ?>


                    <tr style="cursor:pointer;" onclick="elimina_lista('<?php echo $datos?>','<?php echo $perfil_i[0]->getUserId()?>')">
                                <td><?php echo ucwords($perfil_i[0]->getNombre1())." ".ucwords($perfil_i[0]->getNombre2())?></td>
                                <td><?php echo ucwords($perfil_i[0]->getApellido1())." ".ucwords($perfil_i[0]->getApellido2())?></td>
                                <td><?php echo ucwords($perfil_i[0]->getCedula())?></td>
                                <td>Interno</td>
                    </tr>  

                <?php } 

                else if($psn[1]=='e'){

                    $a = new Criteria();       
                    $a->add(TraDatosExternosPeer::ID_EXTERNO,$psn[0]);
                    $perfil_e=TraDatosExternosPeer::doSelect($a);

                    $datos=ucwords($perfil_e[0]->getNombre().' '.$perfil_e[0]->getApellido()).' (C.I: '.$perfil_e[0]->getCedula().')';
                    ?>


                    <tr style="cursor:pointer;" onclick="elimina_lista('<?php echo $datos?>','<?php echo $perfil_e[0]->getIdExterno()?>','e')">
                                <td><?php echo ucwords($perfil_e[0]->getNombre())?></td>
                                <td><?php echo ucwords($perfil_e[0]->getApellido())?></td>
                                <td><?php echo ucwords($perfil_e[0]->getCedula())?></td>
                                <td>Externo</td>
                    </tr>  


                <?php } } ?>

                    <tr>
                        <td colspan="3" align="left" style="color:red;">Total: <?php echo $l?></td>
                    </tr>

                </table>
   <?php } else echo "No hay personas agregadas"; ?>