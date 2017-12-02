/*global $*/
$(function() {
    
    var imagenes = ['h1.jpg', 'h2.jpg', 'h3.jpg', 'h4.jpg', 'h5.jpg', 'h6.jpg'];
    
    preCarga(imagenes);
    $('#h1').attr('src', imagenes[0]);
    $('#h2').attr('src', imagenes[1]);
    $('#h3').attr('src', imagenes[2]);

    function preCarga(array) {
        $(array).each(function(){
            $('<img/>')[0].src = this;
        });
    }
    
    $('img').hover(function() {
        var pos = 0;
        var target = $(this).attr('src');
        $(imagenes).each(function(i, val) {
            if (target === val) {
                pos = i;
            }
        });
        $(this).attr('src', imagenes[pos + (imagenes.length / 2)]);
    }, function() {
        var pos = 0;
        var target = $(this).attr('src');
        $(imagenes).each(function(i, val) {
            if (target === val) {
                pos = i;
            }
        });
        $(this).attr('src', imagenes[pos - (imagenes.length / 2)]);
    });
});