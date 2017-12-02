$(function() {
    
    var p = $('<p id="p"></p>');
    $('body').append(p);
    $(document).on('keypress', function(e) {
        $('#p').text(e.which + " tecla: " + String.fromCharCode(e.which));
    });
    
});