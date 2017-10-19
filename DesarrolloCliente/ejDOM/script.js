(function () {

    var mover = document.getElementById('eo');
    var elemento = document.getElementById('oe');
    
    
    function insertAfter(mover, elemento) {
        mover.parentElement.insertBefore(mover, elemento.nextElementSibling);
    }
    
    insertAfter(mover, elemento);
    
}());