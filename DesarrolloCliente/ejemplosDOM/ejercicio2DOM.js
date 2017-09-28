(function() {
    window.onload = function() {
        var miBoton = document.getElementById("boton");
        miBoton.addEventListener("click", cambiarColor, true);
    }

    function cambiarColor() {
        var myLink = document.querySelector("#myParagraph a");
        myLink.classList.toggle("fondoRojo");
    }
}());