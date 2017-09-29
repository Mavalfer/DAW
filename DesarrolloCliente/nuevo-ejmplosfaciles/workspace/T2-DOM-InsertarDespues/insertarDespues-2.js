(function() {

    window.addEventListener('load',inicio);

    function inicio() {
        var miBoton = document.getElementById('miBoton');
        miBoton.addEventListener('click', insertar);

        function insertar() {
            var miSpan = document.createElement("span");
            miSpan.textContent = "probando...";
            var div1 = document.getElementById("div1");
            var miBody = document.getElementsByTagName('body')[0];
            miBody._insertarDespues(miSpan, div1);
        }
    }
    //Añadimos un nuevo método a los elementos HTML
    window.HTMLElement.prototype._insertarDespues = function(nuevoNodo, nodoReferencia) {
        this.insertBefore(nuevoNodo, nodoReferencia.nextElementSibling);
    }
}());