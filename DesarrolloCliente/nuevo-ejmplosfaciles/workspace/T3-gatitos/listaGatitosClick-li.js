(function() {
	window.onload = inicio;

	function inicio() {
		var cesta = document.querySelector(".cesta"),
			gatitos = document.querySelectorAll("li"),
			gatitosLength = gatitos.length,
			i;
		// Asignamos un manejador de eventos a cada li (no al ul)
		for (i = 0; i < gatitosLength; i++) {
			gatitos[i].addEventListener("click", function(event) {
				cesta.appendChild(event.target);
			}, false);
		}

	}
}());