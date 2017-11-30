<?php

class Vista {
    
    private $modelo;
    
    function __construct(Modelo $modelo) {
        $this->modelo = $modelo;
    }

    function getModel(){
        return $this->modelo;
    }

    function render($accion) {
        if (!method_exists(get_class(), $accion)) {
            $accion = 'index';
        }
        return $this->$accion();
    }
    
    private function index(){
        $archivo = $this->getModel()->getDato('archivo');
        if (!file_exists($archivo)) {
            return '<h1>Error 404</h1>';
        }
        $texto = file_get_contents($archivo);
        $datos = $this->getModel()->getDatos();
        foreach($datos as $indice => $dato) {
            $texto = str_replace('{{' . $indice . '}}', $dato, $texto); //busca los {{usuario}} en el html y los cambia por el valor
        }
        return $texto;
    }
}