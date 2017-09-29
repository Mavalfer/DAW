/* 4JSONP.js */
/*
 * obtiene el contenido de un fichero JSON usando JSONP (<script>)
 * actualiza cada 3 segundos.
 *
 */
var horaUltimoInforme = 0;

window.onload = init;

function init() {
	var intervalo = setInterval(refresco, 3000);
	refresco();
}

function refresco() {
	// Creamos una etiqueta script que insertamos en el DOM. De esta forma se ejecuta el script del servidor que nos devuelve los datos como argumentos
	// de una llamada a la función callback (en este caso actualizaVentas)
	var url = "http://gumball.wickedlysmart.com" +
				"?callback=actualizaVentas" +  // Cuando se cree la etiqueta script, se irá a la página wickedlysmart.com que nos devolverá un
											 // array de objetos en  JSON 
				"&lastreporttime=" + horaUltimoInforme +
				"&random=" + (new Date()).getTime(); //para que no nos aparezca la página cacheada por el navegador
	var elementoScript = document.createElement("script");
	elementoScript.setAttribute("src", url);
	elementoScript.setAttribute("id", "jsonp");
	var antiguoElementoScript = document.getElementById("jsonp");
	var head = document.getElementsByTagName("head")[0];
	if (antiguoElementoScript == null) {
		head.appendChild(elementoScript);
	}
	else {
		head.replaceChild(elementoScript, antiguoElementoScript);
	}
}

function actualizaVentas(ventas) {
	//ventas es un array de objetos en formato json, ahora extraemos la información para mostrarla adecuadamente
	var divVentas = document.getElementById("ventas");
	for (var i = 0; i < ventas.length; i++) {
		var venta = ventas[i];
		var div = document.createElement("div");
		div.setAttribute("class", "saleItem");
		div.innerHTML = venta.name + " vendió " + venta.sales + " bolas de chicle";
		//divVentas.appendChild(div);
		if (divVentas.childElementCount == 0) {
			divVentas.appendChild(div);
		}
		else {
			divVentas.insertBefore(div, divVentas.lastChild);
		}
	}

	if (ventas.length > 0) {
		horaUltimoInforme = ventas[ventas.length-1].time;
	}
}


