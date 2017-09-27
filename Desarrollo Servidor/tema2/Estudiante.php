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
    }