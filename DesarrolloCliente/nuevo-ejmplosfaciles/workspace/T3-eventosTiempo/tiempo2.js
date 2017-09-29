(function() {
  window.addEventListener('load', function() {
    
    var finalizarYcomenzarTimer = (function() {
      var timer; // variable persistente 
      var milisegundo=0;
      return function() {
        window.clearTimeout(timer);
        timer = window.setTimeout(function() {
          alert('No has pulsado antes de 5 segundos!');
        }, 5000);
      };
    })();
    finalizarYcomenzarTimer();
    var boton = document.getElementById('boton');
    boton.addEventListener('click',finalizarYcomenzarTimer);
  });
}());