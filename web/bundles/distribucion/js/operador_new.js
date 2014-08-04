$(document).ready(function () {

    if($("#frontend_distribucionbundle_operadortype_tipooperador").val()=='3'){
        $("#franjatransmision").show();
    }

   //AJAX DE CAMPOS QUE CAMBIAN DEPENDIENDO DEL TIPO DE OPERADOR
   $("#frontend_distribucionbundle_operadortype_tipooperador").change(function(evento){
      evento.preventDefault();
        //televisoraabierta
        if($("#frontend_distribucionbundle_operadortype_tipooperador").val()=='3'){
            $("#usuario").html("Canal");
            $("#ubicacion1").html("Potenciales televidentes1");
            $("#ubicacion2").html("Potenciales televidentes2");
            $("#franjatransmision").show();
        }

        //iptv
        else if($("#frontend_distribucionbundle_operadortype_tipooperador").val()=='4'){
            $("#usuario").html("Suscriptores");
            $("#ubicacion1").html("dial1");
            $("#ubicacion2").html("dial2");
            $("#franjatransmision").hide();
        }

        //televisión por cable
        else if($("#frontend_distribucionbundle_operadortype_tipooperador").val()=='5'){
            $("#usuario").html("Abonados");
            $("#ubicacion1").html("dial1");
            $("#ubicacion2").html("dial2");
            $("#franjatransmision").hide();
        }

        //cableoperador
        else if($("#frontend_distribucionbundle_operadortype_tipooperador").val()=='2'){
            $("#usuario").html("Abonados");
            $("#ubicacion1").html("dial1");
            $("#ubicacion2").html("dial2");
            $("#franjatransmision").hide();
        }

        //cableoperador
        else if($("#frontend_distribucionbundle_operadortype_tipooperador").val()=='1'){
            $("#usuario").html("Abonados");
            $("#ubicacion1").html("dial1");
            $("#ubicacion2").html("dial2");
            $("#franjatransmision").hide();
        }
   });

});

// efecto de escondido de el formulario

jQuery("#a").click(function  (){
        jQuery("#operador").delay(200).slideToggle();
});

jQuery("#b").click(function  (){
        jQuery("#comodato").delay(200).slideToggle();
});

jQuery("#c").click(function  (){
        jQuery("#representante").delay(200).slideToggle();
});