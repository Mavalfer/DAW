(function() {
    window.onload = inicio;

    function inicio() {
        var miBoton = document.getElementById('miBoton');
        miBoton.addEventListener('click', insertar);

        function insertar() {
            var miSpan = document.createElement("span");
            miSpan.textContent = "probando...";
            var div1 = document.getElementById("div1");
            insertarDespues(miSpan, div1); //miSpan después de div1
        }

    }

    function insertarDespues(nuevoNodo, nodoReferencia) {
        nodoReferencia.parentNode.insertBefore(nuevoNodo, nodoReferencia.nextElementSibling);
        // probar la diferencia entre NextElementSibling y nextSibling
    }
}());