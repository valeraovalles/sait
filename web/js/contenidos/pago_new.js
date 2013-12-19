$(document).ready(function() {

    jQuery.validator.addMethod("digits", function(value, element) {
        return this.optional(element) || /^\d+$/i.test(value);
    }, "<p>Sólo dígitos.</p>");

    $("#pagonew").validate({
        errorPlacement: function(error, element) {
                error.insertAfter(element);
        },
        rules: {
            'form[categoria]': {
                required: true
            },
            'form[descripcion]': {
                required: true
            },
            'form[fecha]': {
                required: true
            },
            'form[costoEntrada]': {
                required: true,
                number: true
            },
            'form[cupos]': {
                required: true,
                minlength: 3,
                digits: true
            }
        },
        messages: {
            'form[categoria]': {
                required: "<p>Requerido.</p>"
            },
            'form[descripcion]': {
                required: "<p>Requerido.</p>"
            },
            'form[fecha]': {
                required: "<p>Requerido.</p>"
            },
            'form[costoEntrada]': {
                required: "<p>Requerido.</p>",
                number: "<p>Debe ser numérico</p>"
            },
            'form[cupos]': {
                required: "<p>Requerido.</p>",
                minlength: "<p>Debe ser mínimo 3 dígitos</p>"

            }
        }
    });

});
