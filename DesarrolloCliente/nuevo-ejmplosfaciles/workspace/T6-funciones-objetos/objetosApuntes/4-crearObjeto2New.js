// Objetos creados con función constructora
window.onload = inicio;

function ladrar(peso) {
    if (peso > 25) {
        return " dice Woof!";
    }
    else {
        return " dice Yip!";
    }
}

function Perro(nombre, raza, peso) {
    this.nombre = nombre;
    this.raza = raza;
    this.peso = peso;
    this.ladrar = this.nombre + ladrar(peso); //ladrar ahora es una propiedad cuyo valor es un string (hemos ejecutado la función)
}

function Calcular() {
    this.version = "1";
    this.suma = function(a, b) {
        return a + b
    };
    this.multiplica = function(a, b) {
        return a * b
    };
}

function Gato(nombre, raza, peso) {
    this.nombre = nombre;
    this.raza = raza;
    this.peso = peso;
}
Gato.prototype.comer = function () {
    if (this.peso > 10) {
        return(this.nombre + " come muchísimo");
    }
    else {
        return(this.nombre + " come poquito");
    }
}
function inicio() {
    //Podemos utilizar Calcular como constructor para crear objetos capaces de sumar y de multiplicar dos números:
    var calculadora = new Calcular;
    var divResultados = document.getElementById('resultados');
    divResultados.innerHTML += '<br>' + calculadora.version;
    divResultados.innerHTML += '<br>' + calculadora.suma(3, 2);
    divResultados.innerHTML += '<br>' + calculadora.multiplica(3, 2);

    // Crear objetos Perro:
    var fido = new Perro("Fido", "Pastor alemán", 38);
    var tiny = new Perro("Tiny", "Bulldog", 8);
    var clifford = new Perro("Clifford", "Bóxer", 65);
    //Llamar a sus métodos
    divResultados.innerHTML += '<br>' + fido.ladrar;
    divResultados.innerHTML += '<br>' + tiny.ladrar;
    divResultados.innerHTML += '<br>' + clifford.ladrar;
    // Crear objetos Gato:
    var katy = new Gato('katy', 'persa', 11);
    var tigra = new Gato('tigra', 'mezcla', 10);
    divResultados.innerHTML += '<br>' + katy.comer();
    divResultados.innerHTML += '<br>' + tigra.comer();
}
