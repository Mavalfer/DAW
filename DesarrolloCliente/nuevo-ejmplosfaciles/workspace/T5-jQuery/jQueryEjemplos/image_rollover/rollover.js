$(document).ready(function() {
	(function() {
		var manejaEvento = function(evento) {
			// obtiene las URL antiguas y nuevas
			var oldURL = $(this).attr("src");
			var newURL = $(this).attr("id");

			// precarga las imágenes		
			var rolloverImage = new Image();
			rolloverImage.src = newURL;

			// añade los manejadores de eventos			
			$(this).hover(
				function() {
					$(this).attr("src", newURL);
				},
				function() {
					$(this).attr("src", oldURL);
				}
			);
		}
		$("#image_rollovers img").each(manejaEvento);
	})();
});