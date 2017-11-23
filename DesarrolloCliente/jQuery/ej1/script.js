$(function () {
    $('form').submit(function (e) {
        if (!validarMail() || !comprobarNombres()) {
            e.preventDefault();
        }
    });
    
    function validarMail() {
        var mail = $('input[name="mail"]');
        var regex = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        var r = false;
        if (regex.test(mail.val().trim())) {
            r = true;
        } else {
            $('span').filter('#errors1').text("Mail incorrecto");
        }
        return r;
    }
    
    function comprobarNombres () {
        var n1 = $('input[name="nombre1"]').val();
        var n2 = $('input[name="nombre2"]').val();
        var r = false;
        if (n1 === n2) {
            r = true;      
        } else {
            $('span').filter('#errors2').text("Nombres no coinciden");
        }
        return r;
    }
});