
'use strict'; //usa un motor que analiza el codigo en mas detalle

(function() {
    
    var formulario = document.getElementById("formulario");
    formulario.addEventListener('submit', validarFormulario);
    
    function comprobarPreguntas() {
        var preguntas = document.getElementsByName("radio");
        for (var i = 0; i < preguntas.length; i++) {
            if (preguntas[i].checked) {
                return true;
            }        
        }
        return false;
    }

    function validarFormulario(evento) {
        if (comprobarPreguntas() == true) {
            window.alert("El formulario se va a enviar");
        } else {
            evento.preventDefault();
            window.alert("El formulario no se ha enviado");
        }
    }
 }())