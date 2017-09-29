(function () {
    
    // El manejador que será llamado cuando el navegador tenga una ubicación, y se volverá a llamar cuando la ubicación cambie o se obtenga alguna más precisa
    // Recibe una variable que contiene la longitud y la latitud así como información sobre la exactitud
    var visualizarSituacion = function (posicion) {
        // Obtenemos latitud y longitud del objeto position.coords
        var latitud = posicion.coords.latitude;
        var longitud = posicion.coords.longitude;
        divSituacion.textContent = "Estás en Latitud: " + latitud + ", Longitud: " + longitud;
    }

    var  errorSituacion = function (error) { // 2016: En Firefox no va aquí cuando el usuario no permite acceso a localización, en Chrome si
        mensajeError = 'código error: ' + error.code + " " + error.message;
        var div = document.getElementById("situacion");
        div.textContent = mensajeError;
    }
    var pararRastreo = function (){
        navigator.geolocation.clearWatch(idRastreo);
        botonParar.classList.add('oculto');
    }
    var botonParar = document.getElementById('parar');
    var divSituacion = document.getElementById('situacion');
    botonParar.addEventListener('click', pararRastreo);
    if (navigator.geolocation) { // Nos aseguramos de que el navegador soporta la API Geolocation
        var idRastreo = navigator.geolocation.watchPosition(visualizarSituacion, errorSituacion); //Llamamos al método watchPosition y le pasamos las funciones manejadoras
    }
    else {
        alert("No hay soporte de geolocalización");
    }
    
}());