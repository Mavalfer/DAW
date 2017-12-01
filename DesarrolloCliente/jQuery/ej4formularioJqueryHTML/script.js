/*global $*/
$(function() {
    
    // function validarForm(e, ) { /*Event, functions array*/
        
    // }
    
    function validarTextField(input, clave = /^\w/, error = "Campo incorrecto") {
        var r = false;
        
        if (clave.test(input.text())) {
            error = "";
            r = true;
        }
        if (error !== "") {
            var span = $('<span>' + error + '</span>');
            input.after(span);
        }
        return r;
    }
    
    $("#formInscripcion").submit(function(e) {
        var mail = validarTextField($('#email'), /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i);
        var pass = false;
        var pass1 = $('#password').text();
        var pass2 = $('#verificar').text();
        if (pass1 === pass2) {
            pass = validarTextField(pass1);
        }
        var nombre = validarTextField($('#nombre'));
        var apellidos = validarTextField($('#apellidos'));
        var provincia = validarTextField($('#provincia'), /^\w{2}$/);
        var postal = validarTextField($('#codPostal'), /^\d{5}$/);
        var telefono = validarTextField($('#telefono'), /^(\d{3}-){2}\d{3}$/);
        var fecha = validarTextField($('#fecha'));
        
        if (!mail || !pass || !nombre || !apellidos || !provincia || !postal || !telefono || !fecha) {
            e.preventDefault();
        }
    });
});