(function () {

    document.addEventListener('submit', validarFormulario);

    var errores = document.getElementById('errores');

    function validarFormulario(e) {

        if (!validarNombre()) {
            e.preventDefault();
            errores.innerText = "Nombre no válido" + "\n";
        }
    }


    function validarNombre() {
        var nombre = document.querySelector("input[name=nombre]");
        var r = false;
        var regEx = /[A-z0-9]/;
        var longitud = nombre.value.length;
        if (regEx.test(nombre.value) && (longitud => 3) && (longitud <= 15)) {
            r = true;
        }

        
        return r;
    }



})();