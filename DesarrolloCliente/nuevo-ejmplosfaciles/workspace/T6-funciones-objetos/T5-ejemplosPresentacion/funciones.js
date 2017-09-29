(function() {
    document.getElementById('miFormulario').addEventListener('submit', comprobar);
    var elTotal = sumar([1, 5, 3, 9]);
    alert('La funcion suma devuelve: ' + elTotal);
    var miArray = [1, 2, 3, 4];
    elTotal = sumar(miArray);
    alert('La funcion suma devuelve: ' + elTotal);
    var masUno = sumarUno; //Asignamos la función a una variable
    var resultado = masUno(1); //La variable masUno puede ser llamada como una función y pasarle argumentos
    alert(resultado); // resultado vale 2

    function comprobar(e) {
        e.preventDefault();
        var suposicionInput = document.getElementById("suposicion");
        var suposicion = suposicionInput.value;
        var respuesta = comprobarSuposicion(suposicion);
        alert(respuesta);
    }

    function comprobarSuposicion(suposicion) {
        var respuestas = ["rojo", "verde", "azul"];
        var indice = Math.floor(Math.random() * respuestas.length);
        if (suposicion == respuestas[indice]) {
            respuesta = "Has acertado! " + respuestas[indice];
        }
        else {
            respuesta = "Lo siento, estaba pensando en " + respuestas[indice];
        }
        return respuesta; //Esto es opcional, si no existe return, la función devuelve “undefined”
    }

    function sumar(numarray) {
        var total = 0;
        for (var i = 0; i < numarray.length; i++) {
            total += numarray[i];
        }
        return total;
    }

    function sumarUno(num) {
        return num + 1;
    }
}());
