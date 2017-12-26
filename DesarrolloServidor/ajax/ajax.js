/*global $*/
(function() {
    var botonAjax, enlaceAjax;
    $('#botonAjax').click(function() {
        $.ajax(
            //paso 1 hago la llamada
            { //parametro JSON con todos los datos para la peticion
                url: 'peticion1.php', //relativa a la carpeta
                type: 'get', //o post
                dataType: 'json' //!!!!importante
            }
        ).done(
            //paso 3 recibo la respuesta 5 segundos despues (el paso 2 es del servidor)
            //funcion que procesa el resultado
            function(json) {
                //alert(json.respuesta);
                $('#destino').html(json.respuesta);
            }
            
        ).fail(
            // paso 3 no recibo la respuesta, hay un error
            //funcion que procesa el error
            function() {
                alert('error');
            }
        ).always(
            //paso 4 se ejecuta siempre (como un try catch finally)
            //funcion que se ejecuta siempre
            function() {
                //alert('siempre');
            }
        );
    });
     $('#enlaceAjax').on('click', function(evento) {
        $.ajax(/* objeto JS */).done(/* funcion */).fail(/* funcion */).always(/* funcion */);
        $.ajax(/* objeto JS */).done(/* funcion */).fail(/* funcion */);
        $.ajax(/* objeto JS */).done(/* funcion */);
    });
})();
//http://pr0gramm.com/top/2278975