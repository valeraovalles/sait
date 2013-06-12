$(document).ready(function () {

    //notificaciones en selects multiples
    $('#frontend_distribucionbundle_operadortype_convenio_objetoconvenio').gips({ 'theme': 'red', placement: 'right',text:'Mantener presionada la tecla ctr para seleccionar varios elementos y de igual manera para quitarlos.', autoHide: true, pause: 5000 });
    $('#frontend_distribucionbundle_operadortype_estado').gips({ 'theme': 'red', placement: 'right',text:'Mantener presionada la tecla ctr para seleccionar varios elementos y de igual manera para quitarlos.', autoHide: true, pause: 5000 });


    //ajax de pais
    $('#frontend_distribucionbundle_operadortype_pais').change(function(){
        $('#estado').load('/sait/web/app_dev.php/distribucion/paisestadociudad/'+$("#frontend_distribucionbundle_operadortype_pais").val());
    });

    /*if($("#frontend_distribucionbundle_operadortype_pais").val()!=null)
        $('#estado').load('/sait/web/app_dev.php/distribucion/paisestadociudad/'+$("#frontend_distribucionbundle_operadortype_pais").val());*/
});

// efecto de escondido de el formulario

jQuery("#a").click(function  (){
        jQuery("#operador").delay(200).slideToggle();
});

jQuery("#b").click(function  (){
        jQuery("#convenio").delay(200).slideToggle();
});

jQuery("#c").click(function  (){
        jQuery("#representante").delay(200).slideToggle();
});
