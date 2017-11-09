(function () {

    const NUMPREGUNTAS = 9;
    

    var preguntas = document.getElementsByTagName('div');
    var evaluar = [evaluarP1, evaluarP2, evaluarP3, evaluarP4, evaluarP5, evaluarP6, evaluarP7, evaluarP8, evaluarP9];

    var comentario = preguntas[10].querySelector('textarea');
    var spanComent = preguntas[10].querySelector('span');
    var longComent = comentario.getAttribute('maxlength');
    
    spanComent.innerText = longComent;
    comentario.addEventListener('keyup', function() {
        spanComent.innerText = parseInt(longComent) - parseInt(comentario.value.length);
        
    });
    
        
    var form = document.querySelector('form');
    
    var botonCorreccion = document.querySelector('input[name=correccion]');
    botonCorreccion.addEventListener('click', correccion);
    var stats = document.getElementById('stats');
    
    function correccion(e) {
        e.preventDefault;
        botonCorreccion.value = "Reintentar";
        var estadisticas = checkRespondidas(evaluar);
        stats.innerText = estadisticas[0] + " aciertos.\n" + estadisticas[1] + " fallos.\n" + estadisticas[2] + " respondidas.\n" + estadisticas[3] + " no contestadas.\n" + estadisticas[4] + " % aciertos.\n";
        
        
        
        
    }
    

    function checkRespondidas(evaluar) { /*Retorna un array con aciertos, falladas, respondidas, no contestadas y el porcentaje de aciertos*/
        var r;
        var nRespondidas = 0;
        var nAciertos = 0;
        var porcAciertos = 0;
        var nFalladas = 0;
        
        for (var i = 0; i < evaluar.length; i++) {
            r = evaluar[i]();
            switch (r) {
                case 0:
                    nFalladas++;
                    nRespondidas++;
                    break;
                case 1:
                    nAciertos++;
                    nRespondidas++;
                    break;
                default:
                    break;
            }
        }
        var noContestadas = NUMPREGUNTAS - nRespondidas;
        porcAciertos = (nAciertos * 100) / NUMPREGUNTAS;
        var retorno = [nAciertos, nFalladas, nRespondidas, noContestadas, porcAciertos];
        return retorno;
    }


    /*
    Las funciones para evaluar las preguntas retornan:
        -1 = No contestada
         0 = Fallada
         1 = Acertada
     */

    function evaluarP1() { /*Son correctas primera y segunda*/
        var p = document.getElementsByName('check1');
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
        var p = document.getElementById('text1').value;
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
        var p = document.getElementById('text2').value;
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
        var p = document.getElementById('text3').value;
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
        var p = document.getElementById('select1').selectedIndex;
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
        var p = preguntas[6].getElementsByTagName('input');
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
        var p = document.getElementById('text4').value;
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
        var p = document.getElementById('text5').value;
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
        var p = document.getElementById('text6').value;
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