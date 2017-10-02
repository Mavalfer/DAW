<?php
require './Request.php';
require './CuentaBancaria.php';

$cuenta = new CuentaBancaria();
$cuenta->read();

echo $cuenta;
