
window.onload = function(){
	var faqs=$("faqs");
	var elementosH2=faqs.getElementsByTagName("h2");
	var nodoH2;
	for (var i= 0; i<elementosH2.length; i++){
		nodoH2 = elementosH2[i];
		nodoH2.onclick = cambiar;
	}
}
function cambiar (){
	var h2=this; // h2 es el nodoH2 actual
	/*if (h2.hasAttribute("class")){
		h2.removeAttribute("class");
	}
	else {
		h2.setAttribute("class", "menos");
	}
	if (h2.nextElementSibling.hasAttribute("class")){
		h2.nextElementSibling.removeAttribute("class");
	}
	else{
		h2.nextElementSibling.setAttribute("class", "abierto");
	}*/
	
	h2.classList.toggle("menos");
	h2.nextElementSibling.classList.toggle("abierto");
	
}
var $ = function (id){
	return document.getElementById(id);
}