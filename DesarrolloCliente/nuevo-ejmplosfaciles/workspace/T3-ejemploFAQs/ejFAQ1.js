(function() {
	window.addEventListener('load', inicio);

	function inicio() {
		var faqs = document.getElementById("faqs");
		var elementosH2 = faqs.getElementsByTagName("h2");
		var nodoH2;
		for (var i = 0; i < elementosH2.length; i++) {
			nodoH2 = elementosH2[i];
			nodoH2.addEventListener("click", cambiar);
		}

		function cambiar() {
			var h2 = this; // h2 es el nodoH2 actual
			if (h2.getAttribute("class") == "mas") {
				h2.setAttribute("class", "menos");
			}
			else {
				h2.setAttribute("class", "mas");
			}
			if (h2.nextElementSibling.getAttribute("class") == "cerrado") {
				h2.nextElementSibling.setAttribute("class", "abierto");
			}
			else {
				h2.nextElementSibling.setAttribute("class", "cerrado");
			}
		}
	}
}());