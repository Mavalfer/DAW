(function () {
    
    
    var form = document.getElementById('formulario1');
    
    form.addEventListener('submit', function(e) {
        var campo = document.getElementById('nombre');
        var mail = document.getElementById('email');
        
        var validarCampo = validarNumCaracteres(campo, 3);
        var validarMail = validarEmail(mail);
        
        if (!validarCampo || !validarMail) { /*a aurora le gusta con &&*/
            e.preventDefault();
        }
      
                          });
    
    
    function validarNumCaracteres(campo, minCaracteres) {
        var valido = true;
        if (campo.value.length < minCaracteres) {
            campo.nextElementSibling.innerText = '¡Mas de ' + minCaracteres + 'caracteres!';
            valido = false;
        } else {
            campo.nextElementSibling.innerText = "";
        }
        return valido;
    }

    function validarEmail(campoEmail) {
        var valido = 'true';
        var expresion = /^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i;
        var email = campoEmail.value;
        if (!expresion.test(email) || email === "") {
            campoEmail.nextElementSibling.innerText = "Teclee un e-mail correcto";
            valido = false;
        } else {
            campoEmail.nextElementSibling.innerText = "*";
        }
        return valido;
    }
}());