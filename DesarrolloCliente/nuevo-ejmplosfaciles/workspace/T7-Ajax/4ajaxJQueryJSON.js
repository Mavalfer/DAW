/* 4ajaxJQUERY.js */
/*
 * Obtiene el contenido de un fichero JSON usando Ajax y jQuery
 */

$(document).ready(inicio);


function inicio() {
    var peticion = $.ajax({
        url: "./ventas.json",
        type: "get",
        dataType: "json"
    });
    peticion.done(function (respuesta) { // En jQuery el objeto ya está traducido a objeto javaScript (no hay que hacer JSON.parse)
            $.each(respuesta, function (indice, venta) {
                var div = $('<div>', {
                    text: venta.nombre + " vendió " + venta.ventas + " galletas",
                    'class': 'venta'
                });
                $('#ventas').append(div);
            });
        });
}