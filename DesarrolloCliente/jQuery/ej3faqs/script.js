$(function() {
    $('#primer-link').focus();
    $('h2').on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('menos');
        $(this).toggleClass('mas');
        $(this).next(".cerrado").toggle();
    });
});