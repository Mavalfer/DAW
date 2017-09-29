// Definimos el constructor Persona
function Persona(primerNombre) {
  this.primerNombre = primerNombre;
}

// Agregamos un par de métodos a Persona.prototype
Persona.prototype.caminar = function() {
  alert("Estoy caminando!");
};
Persona.prototype.diHola = function(){
  alert("Hola, Soy" + this.primerNombre);
};

// Definimos el constructor Estudiante
function Estudiante(primerNombre, asunto) {
  // Llamamos al constructor padre, nos aseguramos (utilizando Function#call) que "this" se
  // ha establecido correctamente durante la llamada
  Persona.call(this, primerNombre);

  //Inicializamos las propiedades específicas de Estudiante
  this.asunto = asunto;
};

// Creamos el objeto Estudiante.prototype que hereda desde Persona.prototype

Estudiante.prototype = Object.create(Persona.prototype);    // Vea las siguientes notas

// Establecer la propiedad "constructor" para referencias  a Estudiante
//Estudiante.prototype.constructor = Estudiante;

// Remplazar el método "diHola"
Estudiante.prototype.diHola = function(){
  alert("Hola, Soy " + this.primerNombre + ". Yo estoy estudiando " + this.asunto + ".");
};

// Agregamos el método "diAdios"
Estudiante.prototype.diAdios = function() {
  alert("¡ Adios !");
};

// Ejemplos de uso
var persona1 = new Persona('Aurora');
var estudiante1 = new Estudiante("Carolina", "Física Aplicada");
estudiante1.diHola();    // muestra "Hola, Soy Carolina. Yo estoy estudianto Física Aplicada."
estudiante1.caminar();   // muestra "Estoy caminando !"
estudiante1.diAdios();   // muestra "¡ Adios !"

// Comprobamos que las instancias funcionan correctamente
alert(estudiante1 instanceof Persona);      // devuelve true
alert(estudiante1 instanceof Estudiante);   // devuelve true