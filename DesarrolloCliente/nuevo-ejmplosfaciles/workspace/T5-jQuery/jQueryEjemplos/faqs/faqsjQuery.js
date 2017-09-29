/*window.onload = function(){
	var faqs=$("faqs");
	var elementosH2=faqs.getElementsByTagName("h2");
	var nodoH2;
	for (var i= 0; i<elementosH2.length; i++){
		nodoH2 = elementosH2[i];
		nodoH2.onclick = cambiar;
	}
}
function cambiar (){
	h2.classList.toggle("menos");
	h2.nextElementSibling.classList.toggle("abierto");
	
}
var $ = function (id){
	return document.getElementById(id);
}*/
$(document).ready(function() {
	(function() {
		var manejaEvento = function(evento) {
			$(this).toggleClass('menos');
			$(this).next().toggleClass('abierto');
		}
		$("#faqs h2").on('click', manejaEvento);
		$("div").text('aaaaaaaaaaaaaaaaaaaaa');
	})(); //fin IIF
});

