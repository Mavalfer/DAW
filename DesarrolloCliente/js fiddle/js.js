window.onload = function () {
    
    var dia = new Date().getDay();
    
  var boton = document.getElementById("boton");
    boton.addEventListener('click', function(e){
        queDia(dia, e);
    });
  //boton.onclick = queDia(dia);
    var boton2 = document.getElementById("boton2");
    boton2.addEventListener('click', function() {
        finde(dia);
        
        
    }());
    //boton2.onclick = finde(dia);
    
    
}
function queDia(dia, e)
{
  var x;
  var id = e.target.getAttribute("id");
  //var dia=new Date().getDay();
  switch (dia){
    case 0:
      x="Hoy es domingo";
      break;
    case 1:
      x="Hoy es lunes";
      break;
    case 2:
      x="Hoy es martes";
      break;
    case 3:
      x="Hoy es miércoles";
      break;
    case 4:
      x="Hoy es jueves";
      break;
    case 5:
      x="Hoy es viernes";
      break;
    case 6:
      x="Hoy es sábado";
      break;
  }
    x += " " + id;
  document.getElementById("demo").innerHTML=x;
}
function finde(dia)
{
  var x;
  //var dia=new Date().getDay();
  switch (dia){
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
      x="Día de trabajo";
      break;
    case 6: //Ejecuta hacia abajo hasta que encuentra un break
    case 0:
         x="Finde!!!";
    break; 
  }
  document.getElementById("demo").textContent=x;
    return function() {
        alert('has hecho click en un boton');
    }
}