/*global $*/
$(function() {
    
    var imagenes = ['t1.jpg', 't2.jpg', 't3.jpg', 't4.jpg', 't5.jpg', 't6.jpg'];
    
    preCarga(imagenes);
    $('#thum1').attr('src', imagenes[0]);
    $('#thum2').attr('src', imagenes[1]);
    $('#thum3').attr('src', imagenes[2]);
    $('#thum4').attr('src', imagenes[3]);
    $('#thum5').attr('src', imagenes[4]);
    $('#thum6').attr('src', imagenes[5]);

    function preCarga(array) {
        $(array).each(function(){
            $('<img/>')[0].src = this;
        });
    }
    
    $('img').click(function() {
        $('#imagen').attr('src', $(this).attr('src').replace('t','h'));
        $('p').text($('#imagen').attr('src'));
    });
    $('#imagen').off();
});