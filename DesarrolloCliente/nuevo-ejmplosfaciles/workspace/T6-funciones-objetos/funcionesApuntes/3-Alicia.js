var $ = function(id) {
    return document.getElementById(id);
}
var alicia = {
    nombre: "Alicia",
    cansarse: function() {
        alert("this es :"+ this+"\n"+this.nombre + " se ha cansado de esperar");
	}
};
var miFuncion = alicia.cansarse; //miFuncion apunta a alicia.cansarse() pero el objeto this, será window
var miOtraFuncion = alicia.cansarse.bind(alicia); //miOtraFunción siempre será ejecutada en el contexto alicia
window.onload = inicio;

function inicio() {
    var boton1 = $("1");
    boton1.addEventListener("click", f1);
    $("2").addEventListener("click", f2);
    $("3").addEventListener("click", f3);
    $("4").addEventListener("click", f4);
    $("5").addEventListener("click", f5);
    $("6").addEventListener("click", f6);

}
// Ejecutamos directamente el método (contexto es el objeto alicia)
function f1() {
    alicia.cansarse();
}

/* En la siguiente llamada a la función esperarUnSegundo, el código de la función alicia.cansarse es asignado a la variable callback pero está sacado de su contexto original (que era el objeto alicia), por tanto this.nombre será window.nombre y el resultado en pantalla será "undefined se ha cansado de esperar" */
function f2() {
    esperarUnSegundo(alicia.cansarse);
}

/* Ejecutamos miFuncion (tiene asignado el código de la función alicia.cansarse pero sacado de su contexto original)
	this.nombre será window.nombre y el resultado en pantalla será "undefined se ha cansado de esperar" */
function f3() {
    miFuncion();
}
    
/* Ejecutamos el método call de miFunción pasándole el contexto. En este caso this se referirá al objeto alicia y el mensaje por pantalla será "Alicia se ha cansado de esperar" */
function f4() {
    miFuncion.call(alicia);
}

/*miOtraFunción tiene asignado el método alicia.cansarse.bind(alicia) por tanto  el mensaje será: "Alicia se ha cansado de esperar" */
function f5() {
    miOtraFuncion();
}
/* Llamamos a la función esperarUnSegundo pasándole miOtraFunción, que siempre se ejecuta en el contexto alicia
	 mensaje: "Alicia se ha cansado de esperar" */
function f6() {
    esperarUnSegundo(miOtraFuncion);
}


function esperarUnSegundo(callback) {
    alert("estoy en la funcion esperarUnSegundo");
    //el parámetro callback tendrá el nombre de la función que le pasamos en la llamada, pero habrá perdido su contexto original
    setTimeout(function() {
        callback();
    }, 1000);
}