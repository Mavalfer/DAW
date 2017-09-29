
/*
 * obtiene el contenido de un fichero JSON usando JSONP con jQuery
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
	var peticion = $.ajax({
		url: "http://gumball.wickedlysmart.com",
		jsonpCallback: 'actualizaVentas',
		dataType: "jsonp",  // Le decimos a jQuery que esperamos JSONP 
		data: { // Le decimos al servidor lo que queremos 
			lastreporttime: horaUltimoInforme,  // espera este dato para sacar sólo los que se han modificado desde entonces
			random: (new Date()).getTime()  //para evitar que el navegador "cachee" la petición (siempre va a ser distinta)
		},
		done: function(response) {
			console.log(response); // server response
		}
	});
}

function actualizaVentas(ventas) {
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
		horaUltimoInforme = ventas[ventas.length - 1].time;
	}
}
