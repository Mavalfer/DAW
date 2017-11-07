(function () {

    const NUMPREGUNTAS = 9;
    var nRespondidas = 0;
    var nAciertos = 0;
    var porcAciertos = 0;
    var nFalladas = 0;
    var noContestadas = NUMPREGUNTAS - nRespondidas;

    var preguntas = document.getElementsByTagName('div');

    var comentario = preguntas[9].querySelector('textarea');
    var spanComent = preguntas[9].querySelector('span');
    var longComent = comentario.getAttribute('maxlength');
    comentario.addEventListener('keyup', function() {
        
        
    }),
    
    
    function checkRespondidas(preguntas) {

    }


    /*
    Las funciones para evaluar las preguntas retornan:
        -1 = No contestada
         0 = Fallada
         1 = Acertada
     */

    function evaluarP1() { /*Son correctas primera y segunda*/
        var p = preguntas[0].getElementsByName('check1');
        var r;
        var a = 0;

        var cont = 0;
        for (var i = 0; i < p.length; i++) {
            if (!p[i].checked) {
                cont++;
            } else if ((i == 0 && p[i].checked) || (i == 1 && p[i].checked)) {
                a++;
            }
        }

        if (cont == p.length) {
            r = -1;
        } else if (a != 2) {
            r = 0;
        } else {
            r = 1;
        }

        return r;
    }

    function evaluarP2() {
        var p = preguntas[1].querySelector('input').value;
        var r;
        var sol = "asd";
        
        switch (p) {
            case "":
                r = -1;
                break;
            
            case sol:
                r = 1;
                break;
            
            default:
                r = 0;
                break;
        }
        
        return r;
        
    }
    
    function evaluarP3() {
        var p = preguntas[2].querySelector('input').value;
        var r;
        var sol = "asd";
        
        switch (p) {
            case "":
                r = -1;
                break;
            
            case sol:
                r = 1;
                break;
            
            default:
                r = 0;
                break;
        }
        
        return r;
    }
    
    function evaluarP4() {
        var p = preguntas[3].querySelector('input').value;
        var r;
        var sol = "asd";
        
        switch (p) {
            case "":
                r = -1;
                break;
            
            case sol:
                r = 1;
                break;
            
            default:
                r = 0;
                break;
        }
        
        return r;
    }
    
    function evaluarP5() { /*Correcta la tercera opcion*/
        var p = preguntas[4].querySelector('select').selectedIndex;
        var r;
        var sol = 2;
        
        if (p == sol) {
            r = 1;
        } else {
            r = 0;
        }
        
        return r;
    }
    
    function evaluarP6() { /*Correcta la primera opcion*/
        var p = preguntas[5].getElementsByTagName('input');
        var r;
        var a = 0;

        var cont = 0;
        for (var i = 0; i < p.length; i++) {
            if (!p[i].checked) {
                cont++;
            } else if (i == 0 && p[i].checked) {
                a++;
            }
        }

        if (cont == p.length) {
            r = -1;
        } else if (a != 1) {
            r = 0;
        } else {
            r = 1;
        }

        return r;
        
    }
    
    function evaluarP7() {
        var p = preguntas[6].querySelector('input').value;
        var r;
        var sol = "asd";
        
        switch (p) {
            case "":
                r = -1;
                break;
            
            case sol:
                r = 1;
                break;
            
            default:
                r = 0;
                break;
        }
        
        return r;
    }
    
    function evaluarP8() {
        var p = preguntas[7].querySelector('input').value;
        var r;
        var sol = "asd";
        
        switch (p) {
            case "":
                r = -1;
                break;
            
            case sol:
                r = 1;
                break;
            
            default:
                r = 0;
                break;
        }
        
        return r;
    }
    
    function evaluarP9() {
        var p = preguntas[8].querySelector('input').value;
        var r;
        var sol = "asd";
        
        switch (p) {
            case "":
                r = -1;
                break;
            
            case sol:
                r = 1;
                break;
            
            default:
                r = 0;
                break;
        }
        
        return r;
    }
    
    
    
    
})();