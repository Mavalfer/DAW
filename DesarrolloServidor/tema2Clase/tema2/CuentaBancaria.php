<?php

class CuentaBancaria {
    
    private $titular, $dni, $fechanacimiento, $numerodecuenta, $saldo;
    
    function __construct($titular = null, $dni = null, $fechanacimiento = null, $numerodecuenta = null, $saldo = null) {
        $this->titular = $titular;
        $this->dni = $dni;
        $this->fechanacimiento = $fechanacimiento;
        $this->numerodecuenta = $numerodecuenta;
        $this->saldo = $saldo;
    }
    
    function getTitular() {
        return $this->titular;
    }

    function getDni() {
        return $this->dni;
    }

    function getFechanacimiento() {
        return $this->fechanacimiento;
    }

    function getNumerodecuenta() {
        return $this->numerodecuenta;
    }

    function getSaldo() {
        return $this->saldo;
    }

    function setTitular($titular) {
        $this->titular = $titular;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setFechanacimiento($fechanacimiento) {
        $this->fechanacimiento = $fechanacimiento;
    }

    function setNumerodecuenta($numerodecuenta) {
        $this->numerodecuenta = $numerodecuenta;
    }

    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    function read(){
        foreach($this as $atributo => $valor){
            $this->$atributo = Request::read($atributo);
        }
    }

    function set($array, $pos = 0){
        foreach ($this as $campo => $valor) {
            if (isset($array[$pos]) ) {
                $this->$campo = $array[$pos];
            }
            $pos++;
        }
    }

    function setFase1($array, $inicio = 0){
        $this->titular = $array[0 + $inicio];
        $this->dni = $array[1 + $inicio];
        $this->fechanacimiento = $array[2 + $inicio];
        $this->numerodecuenta = $array[3 + $inicio];
        $this->saldo = $array[4 + $inicio];
    }
    
    function setAsociativo($array){
        foreach($this as $indice => $valor){
            if(isset($array[$indice])){
                $this->$indice = $array[$indice];
            }
        }
    }
    function setAsociativoEzequiel($array){
        foreach($array as $indice => $valor){
            if(property_exists(get_class(), $indice)){
                $this->$indice = $valor;
            }
        }
    }
    
    function __toString() {
        return 'titular: ' . $this->titular . '<br>dni: ' . $this->dni .
                '<br>saldo: ' . $this->saldo . '<br>fecha nacimiento: ' .
                $this->fechanacimiento . '<br>número de cuenta: ' .
                $this->numerodecuenta;
    }
}