(function() {
        window.addEventListener('load', inicio);
    function inicio() {
        var elPie = document.getElementById('pie');
        var mensaje = '';
        var btArrays = document.getElementById("btArrays");
        btArrays.onclick = recorrerArray;
        var btDom = document.getElementById("btDom");
        btDom.onclick = recorrerTag;
        function recorrerArray() {
            // Definimos un array con tres elementos
            var matriz = ["hola", "adios", 200];
            matriz[7] = "el siete"; // length es 8
            elPie.innerHTML = "<strong>Longitud matriz1: </strong>" + matriz.length + '<br/><br/><strong>for (var i in matriz) </strong><br/>';
            for (var i in matriz) {
                elPie.innerHTML += "matriz[" + i + "] = " + matriz[i] + "<br>"; // recorre los elementos no "indefinidos"
            }
            elPie.innerHTML += "<br/> <br/><strong>for (i=0;i&ltmatriz.length;i++) </strong><br/> ";
            for (i = 0; i < matriz.length; i++) {
                elPie.innerHTML += "matriz[" + i + "] = " + matriz[i] + "<br/> ";
            }
            //Definimos ahora un array con dos propiedades (longitud 0) y un elemento
            var miArray = [];
            miArray["foo"] = "bar"; // añade una propiedad, no un nuevo elemento
            miArray["new"] = "old"; // añade una propiedad, no un nuevo elemento
            elPie.innerHTML += "<strong>Longitud matriz: </strong>" + miArray.length + '<br/><br/>'; // sacará 0, porque todavía no hay elementos añadidos al array.
            miArray[0] = 0; // Añade un nuevo elemento al array
            elPie.innerHTML += "<strong>Longitud matriz2: </strong>" + miArray.length; // sacará 1, porque ya hay un elemento en el array
            elPie.innerHTML += "<br/> <br/><strong>for (var i in myArray) </strong><br/> ";
            for (var i in miArray) {
                elPie.innerHTML += "miArray[" + i + "] = " + miArray[i] + "<br/>"; // recorre los elementos no "indefinidos"
            }
            elPie.innerHTML += "<strong>for (var i=0;i&ltmiArray.length;i++)</strong><br/><br/>";
            for (var i = 0; i < miArray.length; i++) { //recorre todos los elementos "numerables"
                elPie.innerHTML += "miArray[" + i + "] = " + miArray[i] + "<br/>";
            }
        }
        

        function recorrerTag() {
            var divs = document.getElementsByTagName("div");
            mensaje = "</br><strong>for (var i=0; i&ltdivs.length; i++) </strong> Es la forma correcta <br/><br/>";
            //recorremos la matriz devuelta document.getElementByTagName sacando la propiedad "id" de cada elemento
            for (var i = 0; i < divs.length; i++) {
                mensaje += "id de div número " + i + ": " + divs[i].id + "<br>"; // id de cada div:contenedor1, cabecera...
            }
            elPie.innerHTML = mensaje;
            mensaje += "<strong>for (i in divs) </strong> Forma incorrecta<br/>";
            for (i in divs) {
                mensaje += "divs[" + i + "]-->" + divs[i] + "<br/>"; // la variable i toma los siguientes valores: 0,1,2,3,4,"length","item"
                // saca por pantalla: ojectHTMLDivElement (una vez por cada div), y por último la longitud:5  y la función item
            }
            elPie.innerHTML = mensaje;
            mensaje += "<strong>for (i in divs) </strong> Si tratamos de obtener el id de cada div de esta forma da indefinidos<br/>";
            for (i in divs) {
                mensaje += i + " divs[" + i + "].id-->" + divs[i].id + "<br/>"; // la variable i toma los siguientes valores: 0,1,2,3,4,"length","item"
                // saca los "id" de cada div, cuando i valga "lenght" o "item" dará indefinido
            }
            elPie.innerHTML = mensaje;
            // Hacemos lo mismo con las etiquetas input
            var inputs = document.getElementsByTagName("input");
            mensaje += "<strong>for(var i=0; i&ltinputs.length; i++)</strong> Forma correcta<br/>";
            for (var i = 0; i < inputs.length; i++) {
                mensaje += "inputs[" + i + "].id: " + inputs[i].id + "<br/>"; // id de cada input
            }
            elPie.innerHTML = mensaje;
            mensaje += "<strong>for i in inputs </strong> Forma incorrecta<br/>";
            for (i in inputs) {
                mensaje += "inputs[" + i + "]-->" + inputs[i] + "<br/>"; // la variable i toma los siguientes valores: 0,1,2,3,4,"length","item"
                // saca por pantalla: ojectHTMLInputElement (una vez por cada input), y por último la longitud:3  y la función item
            }
            elPie.innerHTML = mensaje;
            mensaje += "<strong>for (i in inputs) </strong> Forma incorrecta de obtener los id, obtenemos indefinidos<br/>";
            for (i in inputs) {
                mensaje += "inputs[" + i + "].id-->" + inputs[i].id + "<br/>"; // la variable i toma los siguientes valores: 0,1,2,3,4,"length","item"
                // saca los "id" de cada div, cuando i valga "lenght" o "item" dará indefinido
            }
            elPie.innerHTML = mensaje;
            mensaje += "</br><strong>[].forEach.call(divs, funcionConCall) </strong> Es otra manera <br/><br/>";
            [].forEach.call(divs, funcionConCall);
            elPie.innerHTML = mensaje;
        }
        var funcionConCall = function(miDiv) {
            
            mensaje += miDiv.id+ "<br>"; // id de cada div:contenedor1, cabecera...
        }
    }
}());
