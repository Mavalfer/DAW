<?php

class Ruta {

    private $model;
    private $view;
    private $controller;

    function __construct($modelo, $vista, $controlador) {
        $this->model = $modelo;
        $this->view = $vista;
        $this->controller = $controlador;
    }

    function getController() {
        return $this->controller;
    }

    function getModel() {
        return $this->model;
    }

    function getView() {
        return $this->view;
    }

}