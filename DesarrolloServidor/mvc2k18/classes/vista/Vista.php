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
        return Util::varDump($this->getModel()->getDatos());
    }
}