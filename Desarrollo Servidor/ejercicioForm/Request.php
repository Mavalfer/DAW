<?php
class Request { //ojo! el archivo de llama como la clase
    
    /*
    Este metodo va a tratar de leer un parametro, si es que ha llegado.
    */
    function get($nombreDelParametro) {
        if (isset ($_GET[$nombreDelParametro])) {
            return $_GET[$nombreDelParametro];
        }
        return null;
    }
    
    function post($nombreDelParametro) {
        if (isset ($_POST[$nombreDelParametro])) {
            return $_POST[$nombreDelParametro];
        }
        return null;
    }
    
    function read($nombreDelParametro) {
        /*if (isset ($_GET[$nombreDelParametro])) {
            return $_GET[$nombreDelParametro];
        } else if (isset ($_POST[$nombreDelParametro])) {
            return $_POST[$nombreDelParametro];
        }  esto es volver a escribir codigo, mejor: */
        
        $valor = get($nombreDelParametro);
        
        if ($valor == null) {
            $valor = post($nombreDelParametro);
        }
        return $valor;
    }
}
?>