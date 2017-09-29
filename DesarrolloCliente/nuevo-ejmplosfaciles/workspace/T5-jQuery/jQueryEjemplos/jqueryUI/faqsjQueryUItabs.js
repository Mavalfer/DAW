
$(function() {
    /*$( "#faqs" ).on( "tabscreate", function( event, ui ) { //Añadir un manejador de eventos del evento create
		alert ("Creado el tabs!");
	} );*/
	$( "#faqs" ).tabs({ //Declaramos que el elemento #faqs tendrá un comportamiento en forma de pestañas (tabs)
      event: "mouseover", // Indicamos que mouseover también permitirá el cambio de pestañas
	  create: function(){ // Añadimos un manejador del evento create
		  alert("Se ha creado el tab");
	  }
    });


	//var widget=$( "#faqs" ).tabs( "widget");
	//$( "#faqs" ).tabs( "disable", 1); // Deshabilita el panel número 1 (empieza en el 0)
	$("#datepicker").datepicker({
		inline: true
	});
});