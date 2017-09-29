
$(function() {
	$( "#faqs" ).accordion({ //Declaramos que el elemento #faqs tendrá un comportamiento en forma de acordeón
       event: "mouseover" , // Indicamos que mouseover también permitirá el cambio de pestañas
		collapsible: true 
    });
	$("#datepicker").datepicker({
		inline: true
	});
});