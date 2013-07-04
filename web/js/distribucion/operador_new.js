$(document).ready(function () {

    //ajax de pais
    $('#frontend_distribucionbundle_operadortype_pais').change(function(){
        $('#estado').load('/sait/web/app_dev.php/distribucion/paisestadociudad/'+$("#frontend_distribucionbundle_operadortype_pais").val()+'/estado');
        $('#cod').load('/sait/web/app_dev.php/distribucion/paisestadociudad/'+$("#frontend_distribucionbundle_operadortype_pais").val()+'/codigo');

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
