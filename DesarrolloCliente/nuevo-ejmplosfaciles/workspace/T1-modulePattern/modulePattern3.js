var misGradosCalculate = (function () {
    
  // Mantenemos las variables misGrados, media y fallos privadas dentro de esta función
  var misGrados = [93, 95, 88, 0, 55, 91];
  
  var average = function() {
    var total = misGrados.reduce(function(accumulator, item) {
      return accumulator + item;
      }, 0);
      
    return'La media es: ' + total / misGrados.length + '.';
  };

  var fallos = function() {
    var gradosFallados = misGrados.filter(function(item) {
        return item < 70;
      });

    return 'Has fallado ' + gradosFallados.length + ' veces.';
  };

  // Revelamos explicitamente punteros a funciones privadas que queremos que sean públicas 

  return {
    average: average,
    fallos: fallos
  }
})();

console.log(misGradosCalculate.fallos()); // 'Has fallado 2 veces.' 
console.log(misGradosCalculate.average()); // 'La media es 70.33333333333333.'