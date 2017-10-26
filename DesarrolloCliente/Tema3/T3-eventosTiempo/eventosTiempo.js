(function() {
    var ejemploTiempo = (function() { //ejemploTiempo es la función que hay en el return pero las variables son persistentes
        //Las siguientes variables van a conservar su valor entre llamadas a la función de retorno (clausura)
        // y son variables privadas para la función ejemploTiempo
        var suma = 0;
        return function() {
            window.setTimeout(function() {
             suma = suma + 1;
                console.log('suma vale: '+suma);
            }, 6000);
        };
    })(); //esto hace que la asignación a la variable ejemploTiempo sea el resultado de la ejecución de la funcion anónima
    ejemploTiempo();
    ejemploTiempo();
}());