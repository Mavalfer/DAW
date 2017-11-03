(function() {
    
    var form = document.getElementById('formulario');
    var dni = document.getElementById('dni');
    var letra = document.getElementById('letra');
    var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    var span = document.getElementById('span');
    
    form.addEventListener('submit', check);
    
    function check(e) {
        span.innerText = "";
        var chkDNI = checkDNI(dni);
        var chkLetra = checkLetra(letra);
        if (!chkDNI || !chkLetra) {
            e.preventDefault();
            if(!chkDNI) {
                span.innerText += "Dni no válido" + "\n";
            }
            if(!chkLetra) {
                span.innerText += "Letra no válida" + "\n";
            }
        } else if (!corresponde(letra, dni)) {
            e.preventDefault();
            span.innerText = "La letra no corresponde a ese DNI";
        } else {
            alert("Correcto");
        }
        
    }
      
    function checkDNI(dni) {
        var r = false;
        var string = dni.value;
        var regEx = /[0-9]/;
        if (regEx.test(string) && string.length == 8) {
            r = true;
        }
        return r;
    }
    
    function checkLetra(letra) {
        var r = false;
        var char = letra.value;
        for (var i = 0; i < letras.length; i++) {
            if (char == letras[i]) {
                r = true;
            }
        }
        return r;
    }
    
    function corresponde(letra, dni) {
        var r = false;
        var numero = parseInt(dni.value);
        var resto = numero % 23;
        if (letras[resto] == letra.value) {
            r = true;
        }
        return r;
    }
    
})();