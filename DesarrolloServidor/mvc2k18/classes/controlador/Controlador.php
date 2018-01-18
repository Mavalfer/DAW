<?php

/* vamos a dejarlo con sólo los métodos comunes a todos */

class Controlador {

    private $modelo;
    private $sesion;

    function __construct(Modelo $modelo) {
        $this->modelo = $modelo;
        $this->sesion = new Session('agendamvc');
        if($this->isLogged()) {
            $usuario = $this->getUser();
            $this->getModel()->setDato('usuario', $usuario->getCorreo());
        }
    }

    function getModel() {
        return $this->modelo;
    }
    
    function getSesion() {
        return $this->sesion;
    }

    function getUser() {
        return $this->getSesion()->getUser();
    }

    function index() {
        $this->getModel()->setDato('index', 'index');
    }
    
    function isAdministrator() {
        return $this->isLogged() &&
                $this->getUser()->getCorreo() === 'admin@admin.es';
    }
    
    function isAdvanced() {
        return $this->isLogged() &&
                $this->getUser()->getTipo() === 'avanzado';
    }

    function isLogged() {
        return $this->getSesion()->isLogged();
    }

}