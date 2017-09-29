/* 3ajax.js */
/*
 * Obtiene el contenido de un fichero JSON usando Ajax. El fichero tiene el siguiente contenido:
 
 [{"nombre":"GRANADA","tiempo":1308774240669,"ventas":8},
 {"nombre":"MONACHIL","tiempo":1308774240669,"ventas":2},
 {"nombre":"MADRID","tiempo":1308774240669,"ventas":8},
 {"nombre":"JAEN","tiempo":1308774240669,"ventas":2},
 {"nombre":"CORDOBA","tiempo":1308774240669,"ventas":2},
 {"nombre":"MALAGA","tiempo":1308774240669,"ventas":9},
 {"nombre":"CADIZ","tiempo":1308774240669,"ventas":5},
 {"nombre":"ALMERIA","tiempo":1308774240669,"ventas":7},
 {"nombre":"BENALUA","tiempo":1308774240669,"ventas":10}]
 */

window.onload = inicio;

function inicio() {

	obtenerVentas();
}

//Función escrita usando XMLHttpRequest Nivel 1, en IE o Opera, o versiones antiguas
// de Firefox, Safari o Chrome, hay que usar esto en lugar del nivel 2
// Podríamos llamarlo si el navegador no soporta el nivel 2
function obtenerVentas_antiguo() {
	var url = "./ventas.json"; //funciona en local ejecutandolo desde brackets (para no montar un servidor web)
    
	var solicitud = new XMLHttpRequest();
	solicitud.open("GET", url);
	solicitud.onreadystatechange = function() {
		if (solicitud.readyState == 4 && solicitud.status == 200) {
			actualizaVentas(solicitud.responseText);
		}
	};
	solicitud.send(null);
}

//
// Función escrita con  XMLHttpRequest Nivel 2 (implementado en nuevas versiones de Safari, Firefox y Chrome)
// Podemos chequear el progreso y el evento "load" en lugar de onreadystatechange
//
function obtenerVentas() {
	var url = "./ventas.json"; // Siempre va a devolver un string 
	var solicitud = new XMLHttpRequest();
	solicitud.open("GET", url);
	solicitud.onload = function() {
		if (solicitud.status == 200) {
			actualizaVentas(solicitud.responseText);
		}
	};
	solicitud.send(null);
}

function actualizaVentas(respuesta) {
	var divVentas = document.getElementById("ventas");
	var ventas = JSON.parse(respuesta);  // pasamos el dato recibido en un string JSON  a un objeto (o array de objetos)
	for (var i = 0; i < ventas.length; i++) {
		var venta = ventas[i];
		var div = document.createElement("div");
		div.setAttribute("class", "venta");
		div.textContent = venta.nombre + " vendió " + venta.ventas + " galletas";
		divVentas.appendChild(div);
	}
}

