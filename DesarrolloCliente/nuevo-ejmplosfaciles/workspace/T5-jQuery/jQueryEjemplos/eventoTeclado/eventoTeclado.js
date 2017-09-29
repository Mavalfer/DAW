
$(document).ready(function() {
    (function() {
        var manejaEvento = function(evento) {
            $("#salida").html($("#salida").html() + evento.type + ": " + evento.which + ",");
            if (evento.type === 'keyup') {
                $("#salida").html($("#salida").html() + "<br>");
            }
        }
        $(document).keypress(manejaEvento);
        $(document).keydown(manejaEvento);
        $(document).keyup(manejaEvento);
    })(); //fin IIF
});
