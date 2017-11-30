<?php

class Enrutador {
    
    private $rutas = array();

    function __construct() {
        $this->rutas['index'] = new Ruta('Modelo', 'Vista', 'Controlador');
        $this->rutas['contacto'] = new Ruta('Modelo', 'VistaContacto', 'ControladorContacto');
        $this->rutas['usuario'] = new Ruta('Modelo', 'VistaUsuario', 'ControladorUsuario');
    }

    function getRoute($ruta) {
        if (!isset($this->rutas[$ruta])) {
            return $this->rutas['index'];
        }
        return $this->rutas[$ruta];
    }
}