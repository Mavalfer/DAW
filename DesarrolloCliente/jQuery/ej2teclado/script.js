$(function() {
    
    var p = $('<p id="p"></p>');
    $('body').append(p);
    alert($('body').length);
    
    $(document).on('keypress', function(e) {
        $('#p').text(e.which + " tecla: " + String.fromCharCode(e.which));
    });
    
});