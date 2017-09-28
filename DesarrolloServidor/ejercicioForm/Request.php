<?php
class Request { //ojo! el archivo de llama como la clase, esto siempre es asi
    /*
    Diferencias entre java y php:
    this.nombre seria $this->nombre       no static
    Alumno.centro seria self::$centro     static, si se llama desde fuera usar el nombre de la clase
    */
    /*
    Este metodo va a tratar de leer un parametro, si es que ha llegado.
    */
    static function get($nombreDelParametro) {
        if (isset ($_GET[$nombreDelParametro])) {
            return $_GET[$nombreDelParametro];
        }
        return null;
    }
    
    static function getpost($nombreDelParametro){
        $valor = self::get($nombreDelParametro);
        if ($valor == null) {
            $valor = self::post($nombreDelParametro);
        }
        return $valor;
    }
    
    static function post($nombreDelParametro) {
        if (isset ($_POST[$nombreDelParametro])) {
            return $_POST[$nombreDelParametro];
        }
        return null;
    }
    
    static function postget(){
        $valor = self::post($nombreDelParametro);
        if ($valor == null) {
            $valor = self::get($nombreDelParametro);
        }
        return $valor;
    }
    
    static function read($nombreDelParametro) {
        /*if (isset ($_GET[$nombreDelParametro])) {
            return $_GET[$nombreDelParametro];
        } else if (isset ($_POST[$nombreDelParametro])) {
            return $_POST[$nombreDelParametro];
        }  esto es volver a escribir codigo, mejor: */
        
        /*$valor = get($nombreDelParametro);
        
        if ($valor == null) {
            $valor = post($nombreDelParametro);
        }
        return $valor;*/
        return self::postget($nombreDelParametro);  //alias
        
    } 
    //la recomendacion es que los archivos php puros no se cierran con la interrogacion>
} 