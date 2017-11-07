(function () {

    var n1, n2;

    var errores = document.getElementById('errores');

    var boton = document.querySelector("input[name=mostrar]");
    var checkbox = document.querySelector("input[name=checkbox]");

    var funciones = [validarNombre, validarContraseña, validarMail, validarFecha, validarCaptcha];

    var span1 = document.getElementById('n1');
    var span2 = document.getElementById('n2');

    document.addEventListener('submit', validarFormulario);
    boton.addEventListener('click', mostrarCaptcha);
    checkbox.addEventListener('change', activarSubmit);

    function validarFormulario(e) {

        errores.innerText = "";
        var cont = 0;
        for (var i = 0; i < funciones.length; i++) {
            if (evaluar(funciones[i], e)) {
                cont++;
            }
        }
        if (cont == funciones.length) {
            alert("Formulario enviado");
        }

    }

    function evaluar(funcion, event) {
        var result = funcion();
        var bool = false;
        if (!result[0]) {
            event.preventDefault();
            errores.innerText += result[1];
        } else {
            bool = true;
        }
        return bool;
    }

    function validarNombre() {
        var nombre = document.querySelector("input[name=nombre]");
        var bool = false;
        var str = "Nombre no válido" + "\n";
        var regEx = /[^A-z0-9]/;
        var longitud = nombre.value.length;
        if (!regEx.test(nombre.value) && (longitud >= 3) && (longitud <= 15) && nombre.value != "") {
            bool = true;
            str = "";
        }
        var result = [bool, str];
        return result;
    }

    function validarContraseña() {
        var contraseña = document.getElementsByName('pass');
        var bool = false;
        var str = "Contraseña incorrecta" + "\n";
        var regEx = /^\b[A-Z]+[a-z]+[0-9]+[A-z0-9_]{3,15}\b/;
        if (regEx.test(contraseña[0].value) && contraseña[0].value == contraseña[1].value) {
            bool = true;
            str = "";
        }
        var result = [bool, str];
        return result;
    }

    function validarMail() {
        var mail = document.querySelector("input[name=mail]");
        var bool = false;
        var str = "Correo incorrecto" + "\n";
        var regEx = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (regEx.test(mail.value)) {
            bool = true;
            str = "";
        }
        var result = [bool, str];
        return result;
    }

    function validarFecha() {
        var fecha = document.querySelector("input[name=fecha]");
        var bool = false;
        var str = "Fecha incorrecta" + "\n";
        var año = new Date().getFullYear();
        var regEx = /^[0-3]?[0-9]\/[01]?[0-9]\/[12][90][0-9][0-9]$/;
        var fechaIntroducida;
        var añoIntroducido;
        if (regEx.test(fecha.value)) {
            bool = true;
            str = "";
            fechaIntroducida = regEx.exec(fecha.value)[0];
            añoIntroducido = parseInt(fechaIntroducida.substr(fechaIntroducida.length - 4, fechaIntroducida.length));
            if (año - añoIntroducido <= 18) {
                bool = false;
                str = "Edad insuficiente" + "\n";
            }
        }

        var result = [bool, str];
        return result;
    }

    function mostrarCaptcha() {
        n1 = Math.floor(Math.random() * 10);
        n2 = Math.floor(Math.random() * 10);
        span1.innerText = n1;
        span2.innerText = n2;
    }

    function validarCaptcha() {
        var captcha = document.querySelector("input[name=captcha]");
        var bool = false;
        var str = "Captcha incorrecto" + "\n";
        if (span1 != "" && span2 != "") {
            var res = parseInt(span1.innerText) + parseInt(span2.innerText);
            if (captcha.value == res) {
                bool = true;
                str = "";
            }
        }

        var result = [bool, str];
        return result;
    }
    
    function activarSubmit() {
        var submit = document.querySelector("input[name=submit]");
        if (submit.disabled == true) {
            submit.disabled = false;
        } else {
            submit.disabled = true;
        }
    }
})();