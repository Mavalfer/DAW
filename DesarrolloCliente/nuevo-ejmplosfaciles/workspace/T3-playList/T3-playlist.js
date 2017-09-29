(function() {
    function envioFormulario(e) {
        // Primero cancelamos el evento submit (para validar)
        e.preventDefault();
        var cancion = document.getElementById("CancionTextInput");
        var nombreCancion = cancion.value;
        if (nombreCancion == "") {
            alert("Teclea una canción");
        }
        else {
            var nuevoli = document.createElement("li");
            nuevoli.textContent = nombreCancion+'\r \n nueva linea';
            var ul = document.getElementById("listaCanciones");
            ul.appendChild(nuevoli);
        }
        cancion.value = ""; //Limpiamos el campo
    }
    document.getElementById('miFormulario').addEventListener('submit', envioFormulario);
})();