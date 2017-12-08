<?php
error_reporting(E_ALL);  /*Para compensar que en el php de c9 no esta el perfil de desarrollo, con esto se activan que salgan errores en todas las paginas*/
ini_set('display_errors', 1);

class AutoLoad {

    static function searchClass($className) {
        $archivo = dirname(__FILE__) . '/' . $className . '.php';
        if(file_exists($archivo)) {
            require $archivo;
        }
    }

}

spl_autoload_register('AutoLoad::searchClass');