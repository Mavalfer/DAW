<?php

class Controlador {

    private $modelo;
    private $sesion;

    function __construct(Modelo $modelo) {
        $this->modelo = $modelo;
        $this->sesion = new Session('agendamvc');
    }

    function altabien() {
        $this->getModel()->setDato('archivo', 'plantilla/_index_altabien.html');
    }

    function altamal() {
        $this->getModel()->setDato('archivo', 'plantilla/_index_altamal.html');
    }

    function getModel() {
        return $this->modelo;
    }
    
    function getSesion() {
        return $this->sesion;
    }

    function index() {
        $this->getModel()->setDato('archivo', 'plantilla/_index_index.html');
        if($this->isLogged()){
            $usuario = $this->getSesion()->getUser();
            $this->getModel()->setDato('usuario', $usuario->getCorreo());
            $this->getModel()->setDato('archivo', 'plantilla/_index_index_logged.html');
        }
    }
    
    function isLogged(){
        return $this->getSesion()->isLogged();
    }

    
    function verificabien() {
        $this->getModel()->setDato('archivo', 'plantilla/_index_verificabien.html');
    }

    function verificamal() {
        $this->getModel()->setDato('archivo', 'plantilla/_index_verificamal.html');
    }
    
    function loginbien() {
        $this->getModel()->setDato('archivo', 'plantilla/_index_verificabien.html');
    }
}