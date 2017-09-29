window.onload = function() {
    "use strict"
    // Si estamos creando un objeto nuevo
    var a = Object.defineProperty({}, "x", {
        value: 11,
        writable: true,
        enumerable: true,
        configurable: true
    });

    // Si el objeto ya está definido
    var b = {};
    Object.defineProperty(b, "x", {
        value: 11,
        writable: true,
        enumerable: true,
        configurable: true
    });
    // Si la propiedad es nueva, los valores por defecto para cada opción son false.
    var c = Object.defineProperty({}, "x", {
        value: 11
    });
    // Si la propiedad ya existe, entonces las opciones que no pongamos no se modificarán y permanecerán como ya las tuviera la propiedad.Por ejemplo, si hacemos:
    var d = {
        x: 11
    }; // es writable, enumerable y configurable por defecto al definirla como objeto literal
    Object.defineProperty(d, "x", {
        writable: false
    }); // Ahora es no writable, pero sigue siendo  enumerable y  configurable.

    
    var e = {
        x: 1
    };
    Object.defineProperty(e, "x", {
        writable: false,
        configurable: false   //sigue siendo enumerable 
    });

    //Las siguientes líneas dan error (no podemos redefinir la propiedad x)
 
   /* Object.defineProperty(e, "x", {configurable:true});
    Object.defineProperty(e, "x", {
        writable: true //No podemos cambiar el valor
    });
    Object.defineProperty(e, "x", {
        value: 2
    });*/
    // Dan error "TypeError: Cannot redefine property: x"

}