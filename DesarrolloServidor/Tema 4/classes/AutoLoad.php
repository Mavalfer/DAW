<?php

class AutoLoad {

    static function searchClass($className) {
        $archivo = dirname(__FILE__) . '/' . $className . '.php';
        if(file_exists($archivo)) {
            require $archivo;
        }
    }
    
}

spl_autoload_register('AutoLoad::searchClass');