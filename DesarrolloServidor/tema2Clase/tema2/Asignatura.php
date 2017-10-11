<?php
//POJO-Plain old java objects  POPO - plain old php objects
class Asignatura {

    private $nombre;
    private $horas;
    private $nombrelargo;
    
    function __construct($nombre = null, $horas = null, $nombrelargo = null) {
        $this->nombre = $nombre;
        $this->horas = $horas;
        $this->nombrelargo = $nombrelargo;
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
    function getNombrelargo() {
        return $this->nombrelargo;
    }

    function setNombrelargo($nombrelargo) {
        $this->nombrelargo = $nombrelargo;
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
    
    function read(){
        foreach($this as $atributo => $valor){
            $this->$atributo = Request::read($atributo);
        }
    }

    function __toString() {
        return $this->nombre . ' ' . $this->horas . ' ' . $this->nombrelargo; 
    }


}