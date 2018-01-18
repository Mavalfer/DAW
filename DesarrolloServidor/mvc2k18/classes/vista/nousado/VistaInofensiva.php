<?php

class VistaInofensiva extends Vista {
    
    function gentelella() {
        return file_get_contents('plantilla/gentelella/_index.html');
    }

    function plantilla3() {
        return '<h1>plantilla 3</h1>';
    }

    function plantilla4() {
        $archivo = $this->getModel()->getDato('trozoquemefalta');//_archivo1.html
        $trozo = file_get_contents($archivo);//contenido del archivo1
        $contenido = file_get_contents('plantilla/bootstrap/_index.html');
        return str_replace('{{trozoquemefalta}}', $trozo, $contenido);
    }

    function plantilla5() {
        return $this->plantilla4();
        /*$archivo = $this->getModel()->getDato('trozoquemefalta');//_archivo2.html
        $trozo = file_get_contents($archivo);
        $contenido = file_get_contents('plantilla/bootstrap/_index.html');
        return str_replace('{{trozoquemefalta}}', $trozo, $contenido);*/
    }

    function render($accion) {
        $existeMetodo = method_exists(get_class(), $accion);
        if(!$existeMetodo){
            $archivo = $this->getModel()->getDato('archivo');
            if($archivo !== null) {
                return file_get_contents($archivo);
            } else {
                return Util::varDump($this->getModel()->getDatos());
            }
        } else {
            return $this->$accion();
        }
    }

}