/*
function preCargarImg(){ //Si quisieramos tenerlas dada una en un nodo 

	var imgs = ['img/flora/1.jpg' , 'img/flora/2.jpg' , 'img/flora/3.jpg'];
	var lista = [];
	var i;
	for(i in imgs){
		lista[i] = document.createElement('img');
		lista[i].src = imgs[i];
        lista[i].id = "img"+i;
	}
    return lista;
}
//la lista que devuelve esta funcion contiene elementos img , solo habría que añadirlos al dom segun la imagen que quieras enseñar
*/
(function() {
    window.addEventListener('load', function() {
        var listNode = document.getElementById("lista_imagenes");
        var captionNode = document.getElementById("titulo");
        var imageNode = document.getElementById("imagen");
        var imageLinks = listNode.getElementsByTagName("a");
        // Procesamos los links a las imagenes 
        var i, linkNode;
        for (i = 0; i < imageLinks.length; i++) {
            linkNode = imageLinks[i];
            // Precarga de imagenes 
            var imagen = new Image();
            imagen.src = linkNode.getAttribute("href")
            linkNode.addEventListener('click', function(evento) {
                var link = evento.currentTarget; 
                imageNode.src = link.getAttribute("href");
                captionNode.firstChild.nodeValue = link.getAttribute("title");
                evento.preventDefault(); 
            });
        };
        document.getElementById("first_link").focus();
    });
}());