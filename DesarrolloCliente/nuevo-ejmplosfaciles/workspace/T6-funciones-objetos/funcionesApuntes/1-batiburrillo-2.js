//__________FUNCIONES: CONTEXTO
var nombre_digito = function() {
    var nombres = ['cero', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve'];
    return function(n) {
        return nombres[n];
    };
}(); //Ojo: es necesario poner () para que se ejecute la función y se guarde el resultado en nombre_digito
console.log(nombre_digito(3)); //'tres'
//___________________________________________________________________________________
function saludar(miNombre) {
    var miSaludo = "Hola " + miNombre; // variable local
    function doAlert() {
        console.log(miSaludo);
    }
    return doAlert; // devuelve la nueva función
}
var saludarPepe = saludar("Pepe"); // saludarPepe es ahora una función que tiene el contecto 					// de cuando se definió (miNombre contiene "Pepe")
saludarPepe(); // "Hola Pepe"
var saludarAna = saludar("Ana"); // saludarAna es ahora una función
saludarAna(); // "Hola Ana"
saludarPepe(); // "Hola Pepe"
//___________________________________________________________________________________

var miObjeto = {
    valor: 0,
    incremento: function(inc) {
        if (typeof(inc) === 'number') {
            this.valor += inc; //this es miObjeto
        } else {
            this.valor += 1;
        }
    }
};
miObjeto.incremento(); //Forma de invocar un método
 console.log(miObjeto.valor); // 1
miObjeto.incremento(2);
 console.log(miObjeto.valor); // 3

var suma = function(a, b) {
    return a + b;
};

miObjeto.double = function() {
    var that = this; // asignamos el entorno de la función double a la variable that (para manejarlo dentro de ayuda)
    var ayuda = function() {
        console.log("this: " + this); //Object Window
        console.log("that: " + that); //Object miObjeto
        that.valor = suma(that.valor, that.valor); //modificamos miObjeto.valor
    }();
}
// Invocamos double como un método de miObjeto
miObjeto.double();
 console.log(miObjeto.valor);

//___________________________________________________________________________________

var jane = {
    name: 'Jane',
    friends: ['Tarzan', 'Cheeta'],
    logHiToFriends: function() { //en esta función this es jane
        'use strict';
        this.friends.forEach(function(friend) {
            // `this` es indefinido aquí  (por "use strict", si no sería window)
 //           console.log(this.name + ' says hi to ' + friend);
        });
    }
}
jane.logHiToFriends();
//Cómo arreglarlo:
//a) Almacenamos this en otra variable (como en el ejemplo anterior)
var jane = {
    name: 'Jane',
    friends: ['Tarzan', 'Cheeta'],
    logHiToFriends: function() {
        'use strict';
        var that = this;
        this.friends.forEach(function(friend) {
            console.log(that.name + ' says hi to ' + friend);
        });
    }
}
jane.logHiToFriends();

//b) ponemos un parámetro al método forEach:*/
var jane = {
    name: 'Jane',
    friends: ['Tarzan', 'Cheeta'],
    logHiToFriends: function() {
        'use strict';
        this.friends.forEach(function(friend) {
            console.log(this.name + ' says hi to ' + friend);
        }, this);
    }
}
jane.logHiToFriends();


//___________ apply() y call()
var contextObject = {
	testContext: 10
}
var otherContextObject = {
	testContext: "Hello World!"
}
var testContext = 15; // variable global 
function testFunction() {
	 console.log(this.testContext);
}
testFunction(); // sacará 15
testFunction.call(contextObject); // Sacará10
testFunction.apply(otherContextObject); // Sacará"Hello World!"
//___________________________________________________________________________________
function miFuncion(x) {
  	return this.numero + x;
}
var elObjeto = {
 	numero:5
}
var resultado = miFuncion.call(elObjeto, 4); 
//elObjeto define el contexto y 4 es el argumento que espera la función miFuncion
 console.log(resultado); 
var resultado = miFuncion.apply(elObjeto, [4]);
 console.log (resultado);
//___________________________________________________________________________________

//___________________________________________________________________________________

var o = { // Un objeto
    m: function() {
        var self = this; // Salvamos el valor de this en una variable
        console.log(this === o); // Imprime 'true': this es el objeto o.
        f(); // Ahora llamamos a la función f()
        function f() { // Función anidada (mantiene referencia a self)
            console.log(this === o); // "false"
            console.log(self === o); // "true"
        }
    }
};
o.m();

