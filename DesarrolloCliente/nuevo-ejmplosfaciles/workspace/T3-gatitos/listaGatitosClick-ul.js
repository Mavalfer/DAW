(function() {
	window.onload = inicio;

	function inicio() {
		var cesta = document.querySelector(".cesta"),
			gatitos = document.getElementById("gatitos");
		//asignamos al elemento gatitos ('ul')
		//manejadora que cuelga al li (event.target) de cesta y lo descuelga de donde está
		gatitos.addEventListener("click", function(event) {
			if (event.target !== event.currentTarget){
				cesta.appendChild(event.target);
			}
		}, false);
	}
}());