(function () {

    var mover = document.getElementById('eo');
    var elemento = document.getElementById('oe');
    
    
    function insertAfter(mover, elemento) {
        
        if (elemento.nextElementSibling == null) {
            mover.parentElement.appendChild(mover);
        } else {
            mover.parentElement.insertBefore(mover, elemento.nextElementSibling);
        } 
    }
    
    insertAfter(mover, elemento);
    
}());