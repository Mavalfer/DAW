<?php
require './Request.php';
require './CuentaBancaria.php';
require './Util.php';

$cuenta = new CuentaBancaria();
$cuenta->read();

//echo $cuenta;

$arrayNormal1 = array(
    'otra informacion',
    12,
    'Pepito Perez',
    '12345678H',
    '1980-03-31',
    'ES32154579848645742',
    1234.56
);

$arrayNormal2 = array(
    0 => 'Pepito Perez',
    1 => '12345678H',
    2 => '1980-03-31',
    3 => 'ES32154579848645742',
    4 => 1234.56
);

$arrayNormal3 = [];
$arrayNormal3[] = 'Pepito Perez';
$arrayNormal3[] = '12345678H';
$arrayNormal3[] = '1980-03-31';
$arrayNormal3[] = 'ES32154579848645742';
$arrayNormal3[] = 1234.56;

$arrayAsociativo = array (
    'otro' => 124,
    'titular' => 'PepitoPerez',
    'dni' => '12345678H',
    'fechaNacimiento' => '1980-03-31',
    'numeroCuenta' => 'ES32154579848645742',
    'saldo' => 1234.56
);

/*
echo Util::varDump($arrayNormal1);
echo Util::varDump($arrayNormal2);
echo Util::varDump($arrayNormal3);
echo Util::varDump($arrayAsociativo);
*/

$cuenta2 = new CuentaBancaria();
//$cuenta2->setFase1($arrayNormal1, 2);

$cuenta2->setAsociativo($arrayAsociativo);

echo $cuenta2;

echo Util::varDump($cuenta2);
