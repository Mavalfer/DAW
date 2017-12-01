$(function() {
    
    // function validarForm(e, ) { /*Event, functions array*/
        
    // }
    
    function validarTextField(valor, clave, error = "Campo incorrecto") {
        if (clave.test(valor)) {
            error = "";
        }
        return error;
    }
    
});