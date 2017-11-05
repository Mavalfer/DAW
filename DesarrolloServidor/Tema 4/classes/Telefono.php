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
    
    function getValuesAttributes(){
        $completo = [];
        
        foreach($this as $atributo => $valor){
            $completo[$atributo] = $valor;
        }
        
        return $completo;
    }
    
    function set(array $array, $pos = 0){
        foreach($this as $campo => $valor){
            if(isset($array[$pos])){
                $this->$campo = $array[$pos];
            }
            $pos++;
        }
    }
    
    public function __toString() {
        $cadena = '';
        foreach ($this as $atributo => $valor) {
            $cadena .= $atributo . ': ' . $valor . ', ';
        }
        return substr($cadena, 0 , -2);
    }
    
    function setFromAssociative(array $array){
        foreach($this as $indice => $valor){
            if(isset($array[$indice])){
                $this->$indice = $array[$indice];
            }
        }
    }
    
    function read(){
        foreach ($this as $atributo => $valor) {
            $this->$atributo = Request::read($atributo);
        }
    }
}
