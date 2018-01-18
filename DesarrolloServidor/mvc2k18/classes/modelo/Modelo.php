<?php

/* vamos a dejarlo con sólo los métodos comunes a todos */

class Modelo {

    private $dataBase;
    private $datos;

    function __construct() {
        $this->dataBase = new DataBase();
        $this->datos = array();
    }

    function __destruct() {
        $this->dataBase->closeConnection();
    }

    function getDataBase() {
        return $this->dataBase;
    }

    function getDato($nombre) {
        if(isset($this->datos[$nombre])){
            return $this->datos[$nombre];
        }
        return null;
    }

    function getDatos() {
        return $this->datos;
    }

    function setDato($nombre, $dato) {
        $this->datos[$nombre] = $dato;
    }

}