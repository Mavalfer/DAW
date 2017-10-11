<?php

class Estudiante {

    private $nombre, $apellidos;
    private static $centro;

    function __construct($nombre = null, $apellidos = null) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    static function getCentro() {
        return self::$centro;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    static function setCentro($centro) {
        self::$centro = $centro;
    }

    function introspeccion(){
        //sintaxis 2: foreach($variable as $indice => $valor)
        //sintaxis 1: foreach($variable as $valor)
        foreach($this as $atributo => $valor) {
            echo "el atributo $atributo tiene el valor $valor <br>";
        }
    }
    
    function getAtributos(){
        $atributos = [];
        foreach($this as $atributo => $valor){
            $atributos[] = $atributo;
        }
        return $atributos;
    }

    function getValores(){
        $valores = [];
        foreach($this as $valor){
            $valores[] = $valor;
        }
        return $valores;
    }
    
    function getValoresAtributos(){
        $valoresCompletos = [];
        foreach($this as $atributo => $valor){
            $valoresCompletos[$atributo] = $valor;
        }
        return $valoresCompletos;
    }
}