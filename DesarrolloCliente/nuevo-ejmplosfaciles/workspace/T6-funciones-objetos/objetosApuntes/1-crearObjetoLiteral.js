window.onload = inicio;

function inicio() {
    var miObjetoLiteral = {
        propiedad1: "uno",
        propiedad2: "dos",
        metodo1: function() {
            alert("Hola mundo!");
        }
    }
    //accedemos a su método
    miObjetoLiteral.metodo1(); // sacará "Hola mundo!"
}