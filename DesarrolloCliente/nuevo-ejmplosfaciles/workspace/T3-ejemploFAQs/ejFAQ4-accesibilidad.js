
/*El manejador de eventos onClick se activa cuando se pulsa el ratón sobre un elemento HTML. onClick es un manejador de eventos dependiente del ratón. Sin embargo , si el controlador de eventos onClick se utiliza con enlaces navegables por teclado o controles de formulario , entonces la mayoría de los principales navegadores  desencadenan el evento onClick si se pulsa la tecla Intro cuando el enlace o el control tiene el foco . En estos casos, onClick es un controlador de eventos independiente del dispositivo.
    http://webaim.org/techniques/javascript/eventhandlers*/
(function() {
    window.addEventListener('load', function() {
        var faqs = document.getElementById("faqs");
        var elementosH2 = faqs.getElementsByTagName("h2");
        var nodoH2;
        for (var i = 0; i < elementosH2.length; i++) {
            nodoH2 = elementosH2[i];
            nodoH2.addEventListener('click',cambiar);
        }
        document.getElementById("primer-link").focus();
        function cambiar(e) {
            e.preventDefault();
            var h2 = e.currentTarget; // h2 es el nodoH2 actual
            h2.classList.toggle("menos");
            h2.classList.toggle("mas");
            h2.nextElementSibling.classList.toggle("abierto");
            h2.nextElementSibling.classList.toggle("cerrado");
        }
    });
}());