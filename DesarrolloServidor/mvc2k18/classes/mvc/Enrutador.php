<?php

class Enrutador {
    
    private $rutas = array();

    function __construct() {
        $this->rutas['index'] = new Ruta('ModeloUsuario', 'VistaBootstrap', 'ControladorUsuario');
        $this->rutas['paciente'] = new Ruta('ModeloPaciente', 'VistaBootstrap', 'ControladorPaciente');
        $this->rutas['ajaxPaciente'] = new Ruta('ModeloAjaxPaciente', 'VistaAjax', 'ControladorAjaxPaciente');
        
    }

    function getRoute($ruta) {
        if (!isset($this->rutas[$ruta])) {
            return $this->rutas['index'];
        }
        return $this->rutas[$ruta];
    }
}