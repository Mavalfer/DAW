(function() {
    window.onload = function() {
        var primerParrafo = document.getElementById("primerParrafo"),
            segundoParrafo = document.getElementById("segundoParrafo");

        var boton1 = document.getElementById("texto1"),
            boton2 = document.getElementById("2HTML"),
            boton3 = document.getElementById("2texto1"),
            boton4 = document.getElementById("2texto2"),
            boton5 = document.getElementById("2texto3");
        var spanMensajes = document.getElementById("mensajes");
        var mensaje = "Primer parrafo.innerText: " + primerParrafo.innerText + "<br/>" +
            "Segundo parrafo.innerText: " + segundoParrafo.innerText + "<br/>" +
            "Primer parrafo.innerHTML: " + primerParrafo.innerHTML + "<br/>" +
            "Segundo parrafo.innerHTML: " + segundoParrafo.innerHTML;
        spanMensajes.innerHTML = mensaje;
        boton1.addEventListener("click", fboton1, false);
        boton2.addEventListener("click", fboton2);
        boton3.addEventListener("click", fboton3);
        boton4.addEventListener("click", fboton4);
        boton5.addEventListener("click", fboton5);
    }

    function fboton1() {
        document.getElementById("primerParrafo").innerText = "He cambiado el texto"; // cambiará el texto del primer párrafo
    }

    function fboton2() {
        document.getElementById("segundoParrafo").innerHTML = "Y ahora una lista: <ul> <li> Primera linea </li><li>Segunda linea</li></ul>";
        // cambiará el HTML dentro del segundo párrafo
    }

    function fboton3() {
        document.getElementById("segundoParrafo").innerText = "pepe"; // Sustituye a los hijos también, desaparecen 
    }

    function fboton4() {
        document.getElementById("segundoParrafo").textContent = "pepe"; // Sustituye a los hijos también, desaparecen
    }

    function fboton5() {
        document.getElementById("segundoParrafo").firstChild.textContent = "hola"; //Sustituye sólo el texto del segundo párrafo, no el de los hijos
    }
}());