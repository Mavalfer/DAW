/*global $*/
$(function() {

    function validarTextField(input, clave = /^\w/, error = "Campo incorrecto") {
        var r = false;
        if (clave.test(input.val())) {
            error = "";
            r = true;
        }
        if (error !== "") {
            var span = $('<span>', {'text': error});
            input.after(span);
        }
        return r;
    }
    
    $("#formInscripcion").submit(function(e) {
        $('span').remove();
        var mail = validarTextField($('#email'), /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i);
        var pass = false;
        var pass1 = $('#password');
        var pass2 = $('#verificar').val();
        if (pass1.val() === pass2) {
            pass = validarTextField(pass1);
        }
        var nombre = validarTextField($('#nombre'));
        var apellidos = validarTextField($('#apellidos'));
        var provincia = validarTextField($('#provincia'), /^\w{2}$/, "Maximo 2 letras");
        var postal = validarTextField($('#codPostal'), /^\d{5}$/);
        var telefono = validarTextField($('#telefono'), /^(\d{3}-){2}\d{3}$/);
        var fecha = validarFecha($('#fecha'));
        
        if (!mail || !pass || !nombre || !apellidos || !provincia || !postal || !telefono || !fecha) {
            e.preventDefault();
        }
    });
    
    function validarFecha(input, error = "Fecha no valida") {
        var currVal = input.val();
        var r = true;
        if (currVal == '') {
            r = false;
        }
        //--
        var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
        var dtArray = currVal.match(rxDatePattern);
    
        if (dtArray == null) {
            r = false;
        }
        
        var dtDay = dtArray[1];
        var dtMonth = dtArray[3];
        var dtYear = dtArray[5];
    
        if (dtDay < 1 || dtDay > 31) {
            r = false;
        }
        else if (dtMonth < 1 || dtMonth > 12) {
            r = false;
        }
        else if ((dtMonth == 4 || dtMonth == 6 || dtMonth == 9 || dtMonth == 11) && dtDay == 31) {
            r = false;
        }
        else if (dtMonth == 2) {
            var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
            if (dtDay > 29 || (dtDay == 29 && !isleap))
                r = false;
        }
        //--
        if (r) {
            error = "";
        } 
        if (error !== "") {
            var span = $('<span>', {'text': error});
            input.after(span);
        }
        return r;
    
    }
});