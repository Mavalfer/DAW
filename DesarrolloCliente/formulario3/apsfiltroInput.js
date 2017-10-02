'use strict';

(function() {
    
    var campoNombre = document.getElementById('nombre');
    var codigoPostal = document.getElementById('codPostal');
    
    campoNombre.addEventListener('change', validarNombre);
    codigoPostal.addEventListener('keyup', validarPostal);
    
    function validarNombre(evento) {
        var nombre = evento.target;
        if (nombre.value.length < 3) {
            document.getElementById('ayudaNombre').innerHTML = "Es muy corto";
        } else {
            document.getElementById('ayudaNombre').innerHTML = "*";
        }
    }
    /*
    function validarPostal(e) {
        var postal = e.target;
        for (var i = 0; i < postal.value.length; i++) {
            if (postal.getAttribute("caracteresPermitidos").includes(postal.value.charAt(i))) {
                document.getElementById('ayudaPostal').innerHTML = "";
            } else {
                document.getElementById('ayudaPostal').innerHTML = "Caracter no valido";
            }
        }
    }
    */
    function validarPostal(e) {
        var postal = e.target;
        if (postal.getAttribute("caracteresPermitidos").includes(postal.value)) {
            document.getElementById('ayudaPostal').innerHTML = "";
        } else {
            document.getElementById('ayudaPostal').innerHTML = "Caracter no valido";
        }
    }

    function validarMail(e) {
        var mail = e.target;
        if (mail.value.includes('@') == false || mail.value.charAt(0) == '@') {
            document.getElementById('ayudaMail').innerHTML = "Falta @";
        } else if (mail.value.charAt(0) == '@') {
            document.getElementById('ayudaMail').innerHTML = "Direccion no valida ";
        }
    }
    
 }())