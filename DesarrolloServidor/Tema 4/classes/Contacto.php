<?php

class Contacto {
    
    private $id , $nombre;
    
    function __construct($id = null, $nombre = null) {
        $this->id = $id;
        $this->nombre = $nombre;
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
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
