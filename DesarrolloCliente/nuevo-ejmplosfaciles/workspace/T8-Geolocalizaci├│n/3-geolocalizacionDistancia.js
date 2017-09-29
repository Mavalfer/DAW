(function () {
    var calcularDistancia = function (coordenadasOrigen, coordenadasDestino) {
        var radianesLatInicio = gradosARadianes(coordenadasOrigen.latitude);
        var radianesLongInicio = gradosARadianes(coordenadasOrigen.longitude);
        var radianesLatDestino = gradosARadianes(coordenadasDestino.latitude);
        var radianesLongDestino = gradosARadianes(coordenadasDestino.longitude);
        var Radio = 6371; // radio de la Tierra en Km
        var distancia = Math.acos(Math.sin(radianesLatInicio) * Math.sin(radianesLatDestino) + Math.cos(radianesLatInicio) * Math.cos(radianesLatDestino) * Math.cos(radianesLongInicio - radianesLongDestino)) * Radio;
        return Math.round(distancia * 100) / 100;
    }
    var visualizarSituacion = function (posicion) {
        var latitud = posicion.coords.latitude;
        var longitud = posicion.coords.longitude;
        divSituacion.textContent = "Estás en Latitud: " + Math.round(latitud * 100) / 100 + " , Longitud: " + Math.round(longitud * 100) / 100;
        var km = calcularDistancia(posicion.coords, bena);
        var divElement = document.createElement('div');
        divElement.textContent = "Estás a " + km + " km de Benalúa";
        divSituacion.appendChild(divElement);
        var km = calcularDistancia(posicion.coords, mulhacen);
        var divElement = document.createElement('div');
        divElement.textContent += "Estás a " + km + " km de la cumbre del Mulhacén";
        divSituacion.appendChild(divElement);
    }
    var errorSituacion = function (error) { // 2016: En Firefox no va aquí cuando el usuario no permite acceso a localización, en Chrome si
        mensajeError = 'código error: ' + error.code + " " + error.message;
        divSituacion.textContent = mensajeError;
    }
    var gradosARadianes = function (grados) {
        var radianes = (grados * Math.PI) / 180;
        return radianes;
    }
    
    var bena = { //Benalúa
        latitude: 37.3281446,
        longitude: -3.1755671
    };
    var mulhacen = {
        latitude: 37.5,
        longitude: -3.317
    };
    var divSituacion = document.getElementById('situacion');
    var divDistancia = document.getElementById("distancia");
    if (navigator.geolocation) { // Nos aseguramos de que el navegador soporta la API Geolocation
        navigator.geolocation.getCurrentPosition(visualizarSituacion, errorSituacion); //Llamamos al método getCurrentPosition y le pasamos una función manejadora
    }
    else {
        alert("No hay soporte de geolocalización");
    }
}());