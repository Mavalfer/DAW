<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CuentaBancaria
 *
 * @author daw
 */
class CuentaBancaria {
    
    private $titular;
    private $dni;
    private $fechaNacimiento;
    private $numeroCuenta;
    private $saldo;
    
    function __construct($titular = null, $dni = null, $fechaNacimiento = null, $numeroCuenta = null, $saldo = null) {
        $this->titular = $titular;
        $this->dni = $dni;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->numeroCuenta = $numeroCuenta;
        $this->saldo = $saldo;
    }

    function getTitular() {
        return $this->titular;
    }

    function getDni() {
        return $this->dni;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function getNumeroCuenta() {
        return $this->numeroCuenta;
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

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function setNumeroCuenta($numeroCuenta) {
        $this->numeroCuenta = $numeroCuenta;
    }

    function setSaldo($saldo) {
        $this->saldo = $saldo;
    }

    function getAtributos() { 
        $atributos = [];
        foreach ($this as $atributo => $valor){
            $atributos[] = $atributo;
        }
    return $atributos;
    }

    function getValores() {
        $valores = [];
        foreach ($this as $valor) {
            $valores[] = $valor;
        }
        return $valores;
    }

    function getValoresAtributos() {
        $valoresCompletos = [];
        foreach($this as $atributo => $valor) {
            $valoresCompletos[$atributo] = $valor;
        }
        return $valoresCompletos;
    }
    
    function read() { //leer las variables de instancia y leerlas del get o del post
        foreach ($this as $atributo => $valor) {
            $this->$atributo = Request::read($atributo); //por cada atributo que tiene la asignatura leo el atributo y se lo asigno, si uno de ellos falla devuelve null
        }
    }
    
    public function __toString() {
        return $this->titular . ' ' . $this->dni . ' ' . $this->fechaNacimiento . ' ' . $this->numeroCuenta . ' ' . $this->saldo;
    }

}
