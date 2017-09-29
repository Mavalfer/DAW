window.onload = function() {
    "use strict"
    var abuelo = { //Estas propiedades son modificables tanto en este objeto como en los siguientes
        a: 10,
        b: 50
    }
    var padre = Object.create(abuelo, { //Las propiedades nuevaPadre y edadPadre no son modificables (por defecto)
        nuevaPadre: {
            value: 'la nueva del padre',
            enumerable: true  // esta será enumnerable
        },
        edadPadre: {
            value: 26 //esta será "no enumerable", no saldrá en un if..in
        }
    });
    var nieto = Object.create(padre);
    // Comprobamos cuales son las propiedades enumerables del objeto padre
    var divResultados = document.getElementById('resultados');
    divResultados.innerText += '\nPropiedades de padre\n';
    for (var i in padre){
        divResultados.innerText += i + ': ' + padre[i] +'\r\n';
    }
    divResultados.innerText += '\nPropiedades de nieto\n';
    for (var i in nieto){
        divResultados.innerText += i + ': ' + nieto[i] +'\r\n';
    }
    abuelo.a = 20;
    var mensaje = "\n abuelo.a = 20;  ";
    // nieto.a busca una propiedad a en nieto, como no la encuentra la busca en su prototipo (padre), como no la encuentra busca en su prototipo (abuelo) y allí la encuentra
    mensaje += "nieto.a: " + nieto.a + "   padre.a :" + padre.a + "   abuelo.a : " + abuelo.a; // 20 (heredado), 20 (heredado), 20
    divResultados.innerText += mensaje;

    padre.a = 30; // Añadimos una propiedad "a" a padre (sigue teniendo la propiedad "a" heredada)
    //padre.nuevaPadre='Intentamos modificar la nuevaPadre que como no es writable no podemos';
    mensaje = "\n padre.a = 30; ";
    // nieto.a busca una propiedad a en nieto, como no la encuentra la busca en su prototipo (padre) y allí la encuentra (vale 30)
    mensaje += "nieto.a: " + nieto.a + "  padre.a :" + padre.a + "  abuelo.a : " + abuelo.a; //30 (heredada), 30, 20
    divResultados.innerText += mensaje;

    nieto.a = 40; // Añadimos una propiedad "a" a nieto
    // nieto.nuevaPadre='nuevaPadre del hijo'; //No podemos porque nuevaPadre no es modificable (por la forma en que la hemos definido)
    mensaje = "\n nieto.a = 40; ";
    mensaje += "nieto.a: " + nieto.a + " padre.a :" + padre.a + " abuelo.a : " + abuelo.a; //40, 30, 20
     divResultados.innerText += mensaje;

    abuelo.a = 50; // modificamos la propiedad en abuelo, y se hereda a través de la cadena de prototipos en padre y nieto.Como padre y nieto tienen una propiedad 'a', le hace sombra a la heredada
    mensaje = "\n abuelo.a = 50; ";
    mensaje += "nieto.a: " + nieto.a + "  padre.a :" + padre.a + "  abuelo.a : " + abuelo.a; //40, 30, 50 (ya no se buscan las propiedades 'a' en los prototipos, cada objeto tiene la suya propia)
     divResultados.innerText += mensaje;

    abuelo.c = "hello";
     mensaje = "\n abuelo.c = 'hello'";
    mensaje +=" padre.c :" + padre.c + " nieto.c :" + nieto.c; // sacará"hello", "hello"
     divResultados.innerText += mensaje;
}