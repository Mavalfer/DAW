(function () {
    if (navigator.geolocation){ // Nos aseguramos de que el navegador soporta la API Geolocation
		navigator.geolocation.getCurrentPosition(visualizarSituacion, errorSituacion); //Llamamos al método getCurrentPosition y le pasamos las funciones manejadoras
	} else {
		alert("No hay soporte de geolocalización");
	}
    // El manejador que será llamado cuando el navegador tenga una situación
    // Recibe una variable que contiene la longitud y la latitud así como información sobre la exactitud
    function visualizarSituacion(posicion) {
        // Obtenemos latitud y longitud del objeto position.coords
        var latitud = posicion.coords.latitude;
        var longitud = posicion.coords.longitude;
        var div = document.getElementById("situacion");
        div.textContent = "Estás en Latitud: " + latitud + ", Longitud: " + longitud;
    }

    function errorSituacion(error) { // 2016: En Firefox no va aquí cuando el usuario no permite acceso a localización, en Chrome si
        var tiposError = {
            0: "Error desconocido"
            , 1: "Permiso denegado por el usuario"
            , 2: "Posicion no disponible"
            , 3: "Tiempo excedido"
        };
        var mensajeError = tiposError[error.code];
        if (error.code === 0 || error.code === 2) {
            mensajeError = mensajeError + " " + error.message;
        }
        var div = document.getElementById("situacion");
        div.textContent = mensajeError;
    }
}());