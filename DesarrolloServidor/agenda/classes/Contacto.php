<?php

class Contacto {
    
    private $id, $idUsuario, $nombre;
    
    function __construct($id = null, $idUsuario = null, $nombre = null){
        $this->id = $id;
        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
    }
    
    function getId() {
        return $this->id;
    }
    
    function getIdUsuario() {
        return $this->idUsuario;
    }
    
    function getNombre() {
        return $this->nombre;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
    
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    function getAttributes(){
        $atributos = [];
        foreach($this as $atributo => $valor){
            $atributos[] = $atributo;
        }
        return $atributos;
    }

    function getValues(){
        $valores = [];
        foreach($this as $valor){
            $valores[] = $valor;
        }
        return $valores;
    }
    
    /* común a todas las clases */
    
    function getAttributesValues(){
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
    
    function set(array $array, $pos = 0){
        foreach ($this as $campo => $valor) {
            if (isset($array[$pos]) ) {
                $this->$campo = $array[$pos];
            }
            $pos++;
        }
    }
    
    function setFromAssociative(array $array){
        foreach($this as $indice => $valor){
            if(isset($array[$indice])){
                $this->$indice = $array[$indice];
            }
        }
    }
    
    public function __toString() {
        $cadena = get_class() . ': ';
        foreach($this as $atributo => $valor){
            $cadena .= $atributo . ': ' . $valor . ', ';
        }
        return substr($cadena, 0, -2);
    }
}