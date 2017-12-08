<?php

class Modelo {
    
    private $dato;
    
    function __construct() {
        $this->dato = '';
    }
    
    function getDato() {
        echo '11º alguien lee en el modelo<br>';
        return $this->dato;
    }
    
    function setDato($dato) {
        echo '8º alguien guarda algo en el modelo<br>';
        $this->dato = $dato;
    }
}