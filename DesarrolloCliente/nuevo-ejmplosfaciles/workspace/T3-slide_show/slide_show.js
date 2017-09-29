(function() {
    window.onload = function() {
        var listaImagenes = document.getElementById("lista_imagenes");
        var nodoTitulo = document.getElementById("titulo");
        var nodoImagen = document.getElementById("imagen");
        var enlaces = listaImagenes.getElementsByTagName("a");
        var i, nodoEnlace, imagen;
        var cacheImagenes = [];
        for (i = 0; i < enlaces.length; i++) {
            nodoEnlace = enlaces[i];
            // Precarga de imágenes y asignación de título
            imagen = document.createElement('img');
            imagen.src = nodoEnlace.getAttribute("href");
            imagen.title = nodoEnlace.getAttribute("title");
            cacheImagenes.push(imagen);
        }

        // Comienza el pase de diapositivas
        var contadorImagen = 0;
        var timer = setInterval(
            function() {
                contadorImagen = (contadorImagen + 1) % cacheImagenes.length;
                imagen = cacheImagenes[contadorImagen];
                nodoImagen.src = imagen.src;
                nodoTitulo.textContent = imagen.title;
            },
            2000);
    }
}());