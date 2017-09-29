var misGradosCalculate = (function () {
    'use strict';
    // Object interface: una funcion IIFE que devuelve un objeto con las funciones 
    // Mantenemos las variables misGrados, media y fallos privadas dentro de esta función
  var misGrados = [93, 95, 88, 0, 55, 91];

  // Exponemos estas funciones mediante una interfaz

  return {
    media: function() {
      var total = misGrados.reduce(function(suma, item) {
        return suma + item;
        }, 0);
        
      return'La media es: ' + total / misGrados.length + '.';
    },

    fallo: function() {
      var gradosErroneos = misGrados.filter(function(item) {
          return item < 70;
        });

      return 'Has fallado ' + gradosErroneos.length + ' veces.';
    }
  }
})();

console.log(misGradosCalculate.fallo()); // 'Has fallado 2 veces.' 
console.log(misGradosCalculate.media()); // 'La media es: 70.33333333333333.