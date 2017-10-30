<?php

class Car {
    
    private $marca, $modelo;
    
    function __construct($marca = null, $modelo = null) {
        $this->marca = $marca;
        $this->modelo = $modelo;
    }
    
    /*get y set*/
    
    function getMarca() {
        return $this->marca;
    }
    
    function getModelo() {
        return $this->modelo;
    }
    
    function setMarca($marca) {
        $this->marca = $marca;
    }
    
    function setModelo($modelo) {
        $this->modelo = $modelo;
    }
    
     /*devuelve un array numerico con los nombres de los atributos del objeto*/
    function getAttributes() {
        $atributos = [];
        foreach ($this as $atributo => $valor){
            $atributos[] = $atributo;
        }
        return $atributos;
    }
    
    /*DE AQUI PARA ABAJO LOS METODOS SON GENERICOS*/
    
    /*devuelve un array numerico con los valores de los atributos del objeto*/
    function getValues() {
        $valores = [];
            foreach ($this as $valor) {
            $valores[] = $valor;
            }
        return $valores;
    }
    
    /*devuelve un array asociativo, en el que los indices son los nombres de los atributos y en el que los valores son los valores de los atributos*/
    function getAttributesValues() {
        $valoresCompletos = [];
        foreach($this as $atributo => $valor) {
            $valoresCompletos[$atributo] = $valor;
        }
        return $valoresCompletos;
    }
    
    
    /*lee un objeto de la clase entero desde $_GET o $_POST*/
    function read() { //leer las variables de instancia y leerlas del get o del post
        foreach ($this as $atributo => $valor) {
            $this->$atributo = Request::read($atributo); //por cada atributo que tiene la asignatura leo el atributo y se lo asigno, si uno de ellos falla devuelve null
        }
    }
    
    /*toma los valores del objeto entero a partir de un array numerico*/
    function set(array $array, $pos = 0) { /*la palabra array en el parametro del metodo obliga a que se pase un array*/
        foreach ($this as $campo => $value) {
            if (isset($array[$pos])) {
                $this->$campo = $array[$pos];
            }
            $pos++;
        }
    }
    
    /*toma los valores del objeto entero a partir de un array asociativo*/
    function setFromAssociative(array $array) { 
        foreach ($this as $indice => $valor) {
            if(isset($array[$indice])){
                $this->$indice = $array[$indice];
            }
        }
    }
    
    public function __toString() {
        $cadena = get_Class() . ': ';
        foreach($this as $atributo => $valor) {
            $cadena .= $atributo . ': ' . $valor . ', ';
        }
        return substr($cadena, 0, -2);
    }
    
}