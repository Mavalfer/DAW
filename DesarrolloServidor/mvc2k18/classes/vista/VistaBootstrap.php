<?php

class VistaBootstrap extends Vista {

    function __construct(Modelo $modelo) {
        parent::__construct($modelo);
    }
    
    private function index() {
        $datos = $this->getModel()->getDatos();
        $archivo = $datos['archivo'];
        return Util::renderTemplate($archivo, $datos);
    }
    
    function render($accion) {
        if(!method_exists(get_class(), $accion)) {
            $accion = 'index';
        }
        return $this->$accion();
    }
}