
(function () {
    'use strict';
    // Funcion anonima IIFE (Immediately-invoked function expression)
    // Mantenemos las variables misGrados, media y fallos privadas dentro de esta función
  
    var misGrados = [93, 95, 88, 0, 55, 91];
    var media = function () {
        var total = misGrados.reduce(function (suma, item) {
            return suma + item; }, 0);
        return 'La media de tus grados es: ' + total / misGrados.length + '.';
    }

    var fallos = function (){
        var gradosErroneos = misGrados.filter(function(item) {
            return item < 70;});
        return 'Has fallado ' + gradosErroneos.length + ' veces.';
    }

    console.log(fallos());
    console.log(media());
}());