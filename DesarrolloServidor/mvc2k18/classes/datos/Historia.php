<?php

class Historia {
    
    private $id, $motivo, $descripcion, $idpaciente;
    
    function __construct($id = null, $motivo = null, $descripcion = null, $idpaciente = null) {
        $this->id = $id;
        $this->motivo = $motivo;
        $this->descripcion = $descripcion;
        $this->idpaciente = $idpaciente;
    }
    
    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setMotivo($motivo) { $this->motivo = $motivo; }
    function getMotivo() { return $this->motivo; }
    function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    function getDescripcion() { return $this->descripcion; }
    function setIdpaciente($idpaciente) { $this->idpaciente = $idpaciente; }
    function getIdpaciente() { return $this->idpaciente; }
    
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