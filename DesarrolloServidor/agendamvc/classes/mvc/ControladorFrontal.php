<?php

class ControladorFrontal {

    private $controlador;
    private $modelo;
    private $vista;

    function __construct($nombreRuta = null) {
        $nombreRuta = strtolower($nombreRuta);

        $router = new Enrutador();
        $ruta = $router->getRoute($nombreRuta);

        $nombreModelo = $ruta->getModel();
        $nombreVista = $ruta->getView();
        $nombreControlador = $ruta->getController();

        $this->modelo = new $nombreModelo();
        $this->vista = new $nombreVista($this->modelo);
        $this->controlador = new $nombreControlador($this->modelo);
    }

    function doAction($accion = null) {
        $accion = strtolower($accion);
        if (method_exists($this->controlador, $accion)) {
            $this->controlador->$accion();
        } else {
            $this->controlador->index();
        }
    }

    function doOutput($accion = null) {
        return $this->vista->render($accion);
    }

}