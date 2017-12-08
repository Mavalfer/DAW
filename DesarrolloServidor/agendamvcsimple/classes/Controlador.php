<?php

class Controlador {
    
    private $modelo;
    
    function __construct(Modelo $modelo) {
        $this->modelo = $modelo;
    }

    function getModel(){
        return $this->modelo;
    }

    function index() {
        echo '7º la acción index<br>';
        $this->getModel()->setDato('estoy en la ruta index en la acción index');
    }
    
    function saludo() {
        echo '7º la acción saludo<br>';
        $this->getModel()->setDato('estoy en la ruta index en la acción saludo');
    }
}