<?php

class Enrutador {
    
    private $rutas = array();

    function __construct() {
        $this->rutas['index'] = new Ruta('Modelo', 'Vista', 'Controlador');
        $this->rutas['contacto'] = new Ruta('Modelo', 'VistaContacto', 'ControladorContacto');
    }

    function getRoute($ruta) {
        echo '3º obtengo la ruta<br>';
        if (!isset($this->rutas[$ruta])) {
            echo '4º la ruta no existe, cojo la ruta predeterminada<br>';
            return $this->rutas['index'];
        }
        echo '4º la ruta existe, la cojo<br>';
        return $this->rutas[$ruta];
    }
}