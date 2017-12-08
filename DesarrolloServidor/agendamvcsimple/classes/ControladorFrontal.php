<?php

class ControladorFrontal {

    private $controlador;
    private $modelo;
    private $vista;

    function __construct($nombreRuta = null) {
        echo '2º llego al constructor del controlador frontal<br>';
        $nombreRuta = strtolower($nombreRuta);

        $router = new Enrutador();
        $ruta = $router->getRoute($nombreRuta);//obtengo la ruta

        //a partir de la ruta obtengo el modelo, la vista y el controlador
        $nombreModelo = $ruta->getModel();
        $nombreVista = $ruta->getView();
        $nombreControlador = $ruta->getController();

        //creo las tres clases
        $this->modelo = new $nombreModelo();
        $this->vista = new $nombreVista($this->modelo);
        $this->controlador = new $nombreControlador($this->modelo);
        //en el constructor creo las tres clases con las que voy a trabajar
    }

    function doAction($accion = null) {
        echo '5º empiezo a ejecutar la acción<br>';
        //elijo el método que debe ejecutar
        $accion = strtolower($accion);
        if (method_exists($this->controlador, $accion)) {
            echo '6º la acción existe<br>';
            $this->controlador->$accion();
        } else {
            //si el método no existe voy al index
            echo '6º la acción no existe, cojo la acción predeterminada<br>';
            $this->controlador->index();
        }
    }
    
    function doOutput($accion = null) {
        echo '9º empieza el output<br>';
        return $this->vista->render($accion);
    }

}