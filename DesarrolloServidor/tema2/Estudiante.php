<?php

    class Estudiante {
        private $nombre, $apellido;
        private static $centro;
        
        function __construct($nombre, $apellido) {
            $this->nombre = $nombre;
            $this->apellido = $apellido;
        }
        
        function getNombre() {
            return $this->nombre;
        }

        function getApellido() {
            return $this->apellido;
        }

        static function getCentro() {
            return self::$centro;
        }

        function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        function setApellido($apellido) {
            $this->apellido = $apellido;
        }

        static function setCentro($centro) {
            self::$centro = $centro;
        }
        
        function introspeccion() {
            //sintaxis: foreach($variable as $indice => $valor)
            //sintaxis2: foreach($variable as $valor)
            foreach($this as $atributo => $valor) {
                echo "El atributo $atributo tiene el valor $valor <br>";
            }
        }
        
        function getAtributos() { 
            $atributos = [];
            foreach ($this as $atributo => $valor){
                $atributos[] = $atributo;
            }
            return $atributos;
        }
        
        function getValores() {
            $valores = [];
            foreach ($this as $valor) {
                $valores[] = $valor;
            }
            return $valores;
        }
        
        function getValoresAtributos() {
            $valoresCompletos = [];
            foreach($this as $atributo => $valor) {
                $valoresCompletos[$atributo] = $valor;
            }
            return $valoresCompletos;
        }
    }