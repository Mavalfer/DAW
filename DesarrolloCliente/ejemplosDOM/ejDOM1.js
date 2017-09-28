/* ejDOM1.js */
(function() {
    window.addEventListener('load', inicio);

    function inicio() {
        var miBoton = document.getElementById('ocultar');
        var miBoton2 = document.getElementById('rellenar');
        var miBoton3 = document.getElementById('cambiar');
        miBoton.addEventListener('click', insertar);
        miBoton2.addEventListener('click', rellenar);
        miBoton3.addEventListener('click', cambiar);
        
        var botonMostrar = document.getElementById('mostrar');
        botonMostrar.addEventListener('click', mostrar);
        
        

        function insertar() {
            var ocultar = document.getElementsByClassName("ocultar"),
                ocultarLongitud = ocultar.length;
            // Recorremos todos lo elementos cuya clase sea "ocultar"
            for (var i = 0; i < ocultarLongitud; i++) {
                ocultar[i].classList.add('oculto');
            }
            botonMostrar.setAttribute('style', 'visibility: visible');
        }

        function rellenar() {
            var spanVacio = document.querySelector("#miParrafo span:last-child"); // Obtiene el último span
            spanVacio.textContent = "Ya no está vacío "; // Y le pone texto
        }

        function cambiar() {
            //Otra forma, ahora partimos de un nodo, no de todo el documento:
            var miParrafo = document.getElementById("miParrafo"), // Obtiene una referencia a miParrafo
                miSpan = miParrafo.querySelector("span:last-child"); // Obtiene una referencia al último span en el párrafo
            miSpan.textContent = "Lo cambio de nuevo"
        }
        
        function mostrar() {
            var ocultar = document.getElementsByClassName("ocultar"),
                ocultarLongitud = ocultar.length;
            // Recorremos todos lo elementos cuya clase sea "ocultar"
            for (var i = 0; i < ocultarLongitud; i++) {
                ocultar[i].classList.add('visible');
            }
            
        }
    }
}());