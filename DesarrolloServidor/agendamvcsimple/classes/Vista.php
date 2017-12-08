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
        echo '10º empieza el render<br>';
        return $this->getModel()->getDato();
    }
}