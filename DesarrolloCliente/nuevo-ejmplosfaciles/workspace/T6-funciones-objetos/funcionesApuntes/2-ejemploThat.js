//The good parts (libro:funciones). Ejemplo uso that
var suma =function (a, b) {
	return a + b;
};
//Definimos un objeto con una propiedad y un método
var miObjeto = {
	valor: 0,
	incremento: function (inc) {
		if (typeof(inc)==='number'){
			this.valor+=inc;
		}else{
			this.valor+=1;
		}
	}
};

miObjeto.incremento();
console.log("miObjeto.valor: "+miObjeto.valor);
miObjeto.incremento(2);
console.log("miObjeto.valor: "+miObjeto.valor);

// Añadimos un método a miObjeto. En este método this apunta a miObjeto.  
// En este método se llama a la función ayuda, dentro de la cual this apunta al objeto global Windows (o indefined si se puso "use strict") 

miObjeto.double = function ( ) {
	var that = this; // asignamos el entorno de la función double a la variable that (para manejarlo dentro de ayuda)
	var ayuda = function ( ) { 
		console.log("this: "+this); //Object Window
		console.log("that: "+that); //Object miObjeto
		that.valor = suma(that.valor, that.valor);
	}();
};
// Invocamos double como un método de miObjeto
miObjeto.double( );
//alert(miObjeto.valor);
console.log("miObjeto.valor: "+miObjeto.valor);
