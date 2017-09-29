(function () {
    'use strict';
    var formulario = document.getElementById("formulario1");
    formulario.addEventListener('submit', validarFormulario); // Validamos el formulario antes de que se envíe
    function validarFormulario(e) {
         e.preventDefault();
        //Veamos si se ha elegido alguna opción
        var preguntas = document.getElementsByName("pregunta");
        if (validarPregunta(preguntas)) {
            alert('El formulario se va a enviar');
            formulario.submit(); //Si hubiéramos cancelado el evento al principipio,  seria necesario el envío
        } else {
            alert('Debe elegir una opción');
            document.getElementById('pregunta_si').focus();
            //e.preventDefault(); // Si no hubieramos cancelado el evento al principio 
        }
    }
    var validarPregunta = function (preguntas) {
        var algunSeleccionado = false;
        var i;
        for (i = 0;
            ((i < preguntas.length) && !algunSeleccionado); i++) {
            if (preguntas[i].checked) {
                algunSeleccionado = true;
            }
        }
        return algunSeleccionado;
    }

}());