function descargaArchivo() {
    // Crear el objeto para la solicitud
    solicitud = new XMLHttpRequest();

    // Preparar la funcion de respuesta
    solicitud.onload = muestraContenido; // Cada vez que cambia la propiedad readystate 
    // Realizar peticion HTTP
    solicitud.open('GET', './holamundo.txt', true);
    solicitud.send(null);

    function muestraContenido() {
        if (solicitud.status == 200) {
            alert(solicitud.responseText);
        }
    }

}
window.onload = descargaArchivo;
