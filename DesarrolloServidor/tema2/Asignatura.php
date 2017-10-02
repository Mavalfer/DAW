<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Asignatura {
    
    private $nombre;
    private $horas;
    private $nombreLargo;
    /*
    function __construct($nombre = null, $horas = null) {
        $this->nombre = $nombre;
        $this->horas = $horas;
    }
    */
   function __construct($nombre = null, $horas = null, $nombreLargo = null) {
       $this->nombre = $nombre;
       $this->horas = $horas;
       $this->nombreLargo = $nombreLargo;
   }

   
    function getNombre() {
        return $this->nombre;
    }

    function getHoras() {
        return $this->horas;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setHoras($horas) {
        $this->horas = $horas;
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
    
    function read() { //leer las variables de instancia y leerlas del get o del post
        foreach ($this as $atributo => $valor) {
            $this->$atributo = Request::read($atributo); //por cada atributo que tiene la asignatura leo el atributo y se lo asigno, si uno de ellos falla devuelve null
        }
    }
    
    function __toString() {
        return $this->nombre . ' ' . $this->horas . ' ' . $this->nombreLargo;
    }
    

}

