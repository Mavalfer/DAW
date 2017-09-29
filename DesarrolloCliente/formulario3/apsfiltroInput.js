'use strict';

(function() {
    
    var campoNombre = document.getElementById('nombre');
    var campoApellido = document.getElementById('apellido');
    
    campoNombre.addEventListener('change', validarNombre);
    campoApellido.addEventListener('change', validarNombre);
    
    function validarNombre(evento) {
        var nombre = evento.target;
        if (nombre.value.length > 3) {
            document.getElementById('ayudaNombre').innerHTML = 
        }
    }
    
    
 }())