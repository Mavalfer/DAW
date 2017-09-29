var self =(function() { // abrimos la IIFE
    // publicos  (return self)
    var self = {
        metodoPublico1: function(numero, nombre) {
            datoPrivado = datoPrivado + ' ' + nombre;
            funcionPrivada(numero, nombre);
        },
        datoPublico: 0,
        metodoPublico2: function(edad) {
            console.log(this.datoPublico + edad);
            datoPrivado;
            funcionPrivada;
        }
    };
    // privados
    var datoPrivado = 'Me llamo';

    function funcionPrivada(numero, nombre) {
        datoPrivado = datoPrivado + ' he dicho';
        console.log(datoPrivado);
        self.datoPublico =self.datoPublico + 10;
        self.metodoPublico2(self.datoPublico);
    }
    return self; //Devuelve un objeto que contiene métodos que pueden acceder a los datos privados  de la función  
                 //(recordemos que una función siempre tiene acceso al contexto en que fue definida)
}()); // cerramos la IIFE
self.metodoPublico1(9, 'Aurora');
self.metodoPublico2(40);
self.datoPublico = 100;
self.datoPrivado = 'esto añade una nueva propiedad al objeto self, pero no modifica el definido por la IIFE';
self.metodoPublico1(40, 'Pepa');
//self.funcionPrivada();
// A datosPrivado y funcionPrivada no puedo acceder desde fuera de la función