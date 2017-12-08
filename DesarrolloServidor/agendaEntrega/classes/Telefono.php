<?php

class Telefono {
    
    private $id, $idContacto, $telefono, $descripcion;
    
    function __construct($id = null, $idContacto = null, $telefono = null, $descripcion = null) {
        $this->id = $id;
        $this->idContacto = $idContacto;
        $this->telefono = $telefono;
        $this->descripcion = $descripcion;
    }
    
    function getId() {
        return $this->id;
    }
    
    function getIdContacto() {
        return $this->idContacto;
    }
    
    function getTelefono() {
        return $this->telefono;
    }
    
    function getDescripcion() {
        return $this->descripcion;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function setIdContacto($idContacto) {
        $this->idContacto = $idContacto;
    }
    
    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
    /* común a todas las clases */

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