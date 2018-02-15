<?php

class Usuario {

    private $id, $nombre, $apellidos, $alias, $correo, $clave, $tipo, $fechaalta, $verificado;
    
    function __construct($id = null, $nombre = null, $apellidos = null, $alias = null, $correo = null, $clave = null, $tipo = null, $fechaalta = null, $verificado = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->alias = $alias;
        $this->correo = $correo;
        $this->clave = $clave;
        $this->tipo = $tipo;
        $this->fechaalta = $fechaalta;
        $this->verificado = $verificado;
    }

    function getId() {
        return $this->id;
    }

    function getNombre(){
        return $this->nombre;    
    }
    
    function getApellidos() {
        return $this->apellidos;    
    }
    
    function getAlias() {
        return $this->alias;    
    }

    function getCorreo() {
        return $this->correo;
    }

    function getClave() {
        return $this->clave;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getFecha() {
        return $this->fechaalta;
    }

    function getVerificado() {
        $r = false; 
        if($this->verificado) {
            $r = true;
        }
        return $r;
    }

    function isVerificado() {
        return $this->getVerificado();
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setVerificado($verificado) {
        $this->verificado = $verificado;
    }
    
    function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    
    function setFechaAlta($fecha) {
        $this->fechaalta = $fecha;
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