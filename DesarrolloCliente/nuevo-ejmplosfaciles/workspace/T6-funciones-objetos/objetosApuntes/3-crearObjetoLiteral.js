window.onload = inicio;

function inicio() {
    var prop;
    //Creación de los objetos
    var fido = new Perro("Fido", "Pastor alemán", 38);
    var tiny = new Perro("Tiny", "Bulldog", 8);
    var clifford = new Perro("Clifford", "Bóxer", 65);
    //Los métodos se los añadimos al prototipo de la función constructora (lo heredarán todos los objetos creados a partir de ella
    metodos();
    fido.ladrar();
    tiny.ladrar();
    clifford.ladrar();
    fido.nombre = "elFido";
    alert(fido.nombre);
    for (prop in fido) { //prop vale el nombre de la propiedad entre ""
        if (typeof(fido[prop]) == "function") {
            alert("Fido tiene un método " + prop);
        } else {
            alert("Fido tiene una propiedad " + prop);
        }
        if (prop == "nombre") {
            alert("Este es " + fido[prop]);
        }
    }

}

function Perro(nombre, raza, peso) {
    this.nombre = nombre;
    this.raza = raza;
    this.peso = peso;
}

function metodos() {
    Perro.prototype.ladrar = function() { //ladrar es un método añadido al prototype
        if (this.peso > 25) {
            alert(this.nombre + " dice Woof!");
        } else {
            alert(this.nombre + " dice Yip!");
        }
    }
}