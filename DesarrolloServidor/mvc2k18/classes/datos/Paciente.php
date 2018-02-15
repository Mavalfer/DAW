<?php

class Paciente {
    
    private $id, $nombre, $especie, $dnidueño, $idusuario;
    
    function __construct($id = null, $nombre = null, $especie = null, $dnidueño, $idusuario) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->especie = $especie;
        $this->dnidueño = $dnidueño;
        $this->idusuario = $idusuario;
    }
    
    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setNombre($nombre) { $this->nombre = $nombre; }
    function getNombre() { return $this->nombre; }
    function setEspecie($especie) { $this->especie = $especie; }
    function getEspecie() { return $this->especie; }
    function setDnidueño($dnidueño) { $this->dnidueño = $dnidueño; }
    function getDnidueño() { return $this->dnidueño; }
    function setIdusuario($idusuario) { $this->idusuario = $idusuario; }
    function getIdusuario() { return $this->idusuario; }
    
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