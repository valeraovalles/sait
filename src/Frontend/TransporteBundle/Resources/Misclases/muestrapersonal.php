<?php
    $datos=$_GET['datos'];
    $opc=$_GET['opc'];

        
        $existe=0;
        
        $a = new Criteria();        
        $a->add(SfGuardUserProfilePeer::CEDULA,'%'.$datos.'%',Criteria::LIKE);
        $perfil_i=SfGuardUserProfilePeer::doSelect($a);?>
  

        <?php if($datos!=''){ ?>

        <div class='ajaxlist' align='left'>
            <table class="tablaajaxlist">
                <tr>
                    <th>NOMBRES</th>
                    <th>APELLIDOS</th>
                    <th>CEDULA</th>
                </tr>
        <?php }?>           
                    
        <?php if(isset($perfil_i[0]) && $datos!=''){ ?>

            <?php foreach ($perfil_i as $pf) { $existe=1;
                $datos=ucwords($pf->getNombre1().' '.$pf->getApellido1()).' (C.I: '.$pf->getCedula().')';
            ?>

                    <tr style="cursor:pointer;" onclick="agregar_lista('<?php echo $datos?>','<?php echo $pf->getUserId()?>','i')">
                        <td><?php echo ucwords($pf->getNombre1())." ".ucwords($pf->getNombre2())?></td>
                        <td><?php echo ucwords($pf->getApellido1())." ".ucwords($pf->getApellido2())?></td>
                        <td><?php echo ucwords($pf->getCedula())?></td>
                    </tr>    


            <?php 
            
            }   
        } 
        
        $b = new Criteria();        
        $b->add(TraDatosExternosPeer::CEDULA,'%'.$datos.'%',Criteria::LIKE);
        $perfil_e=TraDatosExternosPeer::doSelect($b);
        
        
        if(isset($perfil_e[0]) && $datos!=''){ ?>

            <?php foreach ($perfil_e as $pf) { $existe=1;
              $datos=ucwords($pf->getNombre().' '.$pf->getApellido()).' (C.I: '.$pf->getCedula().')';
            ?>      
                    <tr style="cursor:pointer;" onclick="agregar_lista('<?php echo $datos?>',<?php echo $pf->getIdExterno()?>,'e')">
                        <td><?php echo ucwords($pf->getNombre())?></td>
                        <td><?php echo ucwords($pf->getApellido())?></td>
                        <td><?php echo ucwords($pf->getCedula())?></td>
                    </tr>    


            <?php 
            
            }    
        }  
        
        if($existe==0 && $datos!=''){
            
            echo "<tr><td colspan='3' align='center'><br>PERSONA NO REGISTRADA<br> <a target= '_blank' href='".url_for("externos/new")."' style='color:red;'>AGREGAR</a></td></tr>";
        }
        
        echo "</table></div>";


?>
