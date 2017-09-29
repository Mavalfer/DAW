(function() {
    var nuevoParrafo;
    // Creamos un objeto y lo asignamos a una variable:
    var linda = {
            nombre: "Linda", // Las propiedades se separan por comas
            peso: 40,
            raza: "mezcla",
            gustos: ["pasear", "las bolas"],
            ladrido: function() {
                console.log("guau guau!");
            }
        }
    //Acceder a las propiedades del objeto:
    var nombre = linda.nombre;
    var raza = linda['raza'];
    var miBody = document.getElementsByTagName('body')[0];
    nuevoParrafo = document.createElement('p');
    nuevoParrafo.textContent='Nombre: ' + nombre;
    miBody.appendChild(nuevoParrafo);
    nuevoParrafo = document.createElement('p');
    nuevoParrafo.textContent ='Raza: ' + raza;
    miBody.appendChild(nuevoParrafo);

    //Llamar a un método de un objeto:
    nuevoParrafo = document.createElement('p');
    nuevoParrafo.textContent = 'Ladrido:'+ linda.ladrido();
    miBody.appendChild(nuevoParrafo);
    

    //Cambiar valor de las propiedades de un objeto:
    linda.peso = 27;
    linda.raza = 'caniche';
    linda.gustos.push('Huesos de goma');

    //Pasar un objeto a una funcion (se pasa por referencia)
    ladrar(linda);

    // Enumerar propiedades:
    nuevoParrafo = document.createElement('p');
    nuevoParrafo.textContent = 'EnumerarPropiedades';
    miBody.appendChild(nuevoParrafo);
    enumerarPropiedades(linda);

    // Añadir o eliminar propiedades de un objeto:
    linda.edad = 5;
    nuevoParrafo = document.createElement('p');
    nuevoParrafo.textContent = 'EnumerarPropiedades despues de hacer "linda.edad = 5"';
    miBody.appendChild(nuevoParrafo);
    enumerarPropiedades(linda);
    delete linda.edad;
    nuevoParrafo = document.createElement('p');
    nuevoParrafo.textContent = 'EnumerarPropiedades despues de hacer "delete linda.edad" ';
    miBody.appendChild(nuevoParrafo);
    enumerarPropiedades(linda);


    function ladrar(perro) {
        if (perro.peso > 25) {
            console.log("Estoy en una función que modificará el peso y este perro pesa más de 25 kilos");
        }
        else {
            console.log("Estoy en una función que modificará el peso y este perro no pesa más de 25 kilos");
        }
        //vamos a modificar una propiedad de perro para comprobar que el objeto se ha pasado por referencia
        perro.peso = 10;
    }

    function enumerarPropiedades() {
        var prop;
        
        var mensaje = '';
        for (prop in linda) { //prop va a ser un string, hay que usar la notación linda[prop]
            mensaje = "Linda tiene una propiedad " + prop + ' y su valor es: ' + linda[prop];
            nuevoParrafo = document.createElement('p');
            nuevoParrafo.textContent = mensaje;
            miBody.appendChild(nuevoParrafo);
        }
    }
}());
