$(document).ready(function() {
	// precarga las imágenes
	$("#image_list a").each(function() {
		var swappedImage = new Image();
		swappedImage.src = $(this).attr("href"); //Carga la imagen en el navegador
	});
		$("#image_list a").click(function(evt) {
		var imageURL = $(this).attr("href");
		$("#image").attr("src", imageURL);
		var caption = $(this).attr("title");
		$("#caption").text(caption);
	    evt.preventDefault();  
	}); 
	//$("li:first-child a:first-child").focus();
    $("li").first().find('a').first().focus(); //Otra forma
}); 