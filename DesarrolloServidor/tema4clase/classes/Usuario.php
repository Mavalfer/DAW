<?php
    class Usuario{
        private $usuario, $clave;
        function __construct($usuario=null, $clave=null) {
            $this->usuario = $usuario;
            $this->clave = $clave;
        }
        function getUsuario() {
            return $this->usuario;
        }
    
        function getClave() {
            return $this->clave;
        }
    
        function setUsuario($usuario) {
            $this->usuario = $usuario;
        }
    
        function setClave($clave) {
            $this->clave = $clave;
        }
        function getAttributes(){
            $atributos = [];
            foreach($this as $atributo => $valor){
                $atributos[] = $atributo;
            }
            return $atributos;
        }
    
        /*
        Devuelve un array numérico con los valores de los atributos
        del objeto.
        */
        function getValues(){
            $valores = [];
            foreach($this as $valor){
                $valores[] = $valor;
            }
            return $valores;
        }
        
        /*
        Devuelve un array asociativo, en el que los índices son los nombres de los
        atributos y en el que los valores son los valores de los atributos.
        */
        function getAttributesValues(){
            $valoresCompletos = [];
            foreach($this as $atributo => $valor){
                $valoresCompletos[$atributo] = $valor;
            }
            return $valoresCompletos;
        }
        
        /*
        Lee un objeto de la clase entero desde $_GET o $_POST.
        */
        function read(){
            foreach($this as $atributo => $valor){
                $this->$atributo = Request::read($atributo);
            }
        }
        
        /* 
        Toma los valores del objeto entero a partir de un array numérico.
        */
        function set(array $array, $pos = 0){
            foreach ($this as $campo => $valor) {
                if (isset($array[$pos]) ) {
                    $this->$campo = $array[$pos];
                }
                $pos++;
            }
        }
        
        /* 
        Toma los valores del objeto entero a partir de un array asociativo.
        */
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