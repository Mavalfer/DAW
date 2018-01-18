<?php

class ControladorUsuario extends Controlador { 

    function __construct(Modelo $modelo) {
        parent::__construct($modelo);
    }

    function index() {
        if($this->isLogged()){
            $this->getModel()->setDato('archivo', 'plantilla/bootstrap/_index_logged.html');
            $this->getModel()->setDato('usuario', 'Juanito López');
        } else {
            $this->getModel()->setDato('archivo', 'plantilla/bootstrap/_index.html');
            $this->getModel()->setDato('contenido', file_get_contents('plantilla/bootstrap/_presentacion.html'));
        }
    }

}