/* ejDOM1.js */
(function() {
    window.addEventListener('load', inicio);

    function inicio() {
        var miBoton = document.getElementById('ocultar');
        var miBoton2 = document.getElementById('rellenar');
        var miBoton3 = document.getElementById('cambiar');
		var btMostrar=document.getElementById('mostrar');
        miBoton.addEventListener('click', insertar);
        miBoton2.addEventListener('click', rellenar);
        miBoton3.addEventListener('click', cambiar);
		btMostrar.addEventListener('click', mostrar);

        function insertar() {
            var ocultar = document.getElementsByClassName("ocultar"),
                ocultarLongitud = ocultar.length;
            // Recorremos todos lo elementos cuya clase sea "ocultar"
            for (var i = 0; i < ocultarLongitud; i++) {
                ocultar[i].classList.add('oculto');
            }
			miBoton.setAttribute('class','oculto');
            btMostrar.removeAttribute('class');
            miBoton.setAttribute('display','none');
        }

        function rellenar() {
            var spanVacio = document.querySelector("#miParrafo span:last-child"); // Obtiene el último span
            spanVacio.textContent = "Ya no está vacío "; // Y le pone texto
            miBoton2.setAttribute('class','oculto');
            miBoton3.removeAttribute('class');
        }

        function cambiar() {
            //Otra forma, ahora partimos de un nodo, no de todo el documento:
            var miParrafo = document.getElementById("miParrafo"), // Obtiene una referencia a miParrafo
                miSpan = miParrafo.querySelector("span:last-child"); // Obtiene una referencia al último span en el párrafo
            miSpan.textContent = "Lo cambio de nuevo"
            miBoton3.setAttribute('class','oculto');
        }
		
		function mostrar(){
			var mostrar1 = document.getElementsByClassName('oculto');
			var mostrarTamanio = mostrar1.length;
			for (var i=0;i<mostrarTamanio;i++){
                if(mostrar1[i].getAttribute('type')!=='button'){
                    mostrar1[i].classList.remove('oculto');
                }
			}
            btMostrar.setAttribute('class','oculto');
            miBoton.removeAttribute('class');
            
			// como cada vez se reduce en 1 el NodeList, siempre va a ser el tamaño 0 (posición única) para cada vez que recorra el array
		}
    }
}());