<?php
require './Request.php';
require './CuentaBancaria.php';
require './Util.php';

$cuenta = new CuentaBancaria();
$cuenta->read();//leer la asignatura

//echo $cuenta;

$arrayNormal1 = array(
    'otra información',
    12,
    'Pepito Pérez',
    '12345678H',
    '1980-03-31',
    'ES1212341234121234567890',
    1234.56,
    'más todavía'
);
$arrayNormal2 = array(
    0 => 'Pepito Pérez',
    1 => '12345678H',
    2 => '1980-03-31',
    3 => 'ES1212341234121234567890', 
    4 => 1234.56
);
$arrayNormal3 = [];
$arrayNormal3[] = 'Pepito Pérez';
$arrayNormal3[] = '12345678H';
$arrayNormal3[] = '1980-03-31';
$arrayNormal3[] = 'ES1212341234121234567890';
$arrayNormal3[] = 1234.56;
$arrayAsociativo = array(
    'otro' => 'valor',
    'titular' => 'Pepito Pérez López',
    'dni' => '12345678H',
    'fechanacimiento' => '1980-03-31',
    'numerodecuenta' => 'ES1212341234121234567890', 
    'saldo' => 1234.56
);

$cuenta2 = new CuentaBancaria();
//$cuenta2->set($arrayNormal1, 2);
//$cuenta2->setAsociativo($arrayAsociativo);
$cuenta2->setAsociativoEzequiel($arrayAsociativo);
echo $cuenta2;
echo Util::varDump($cuenta2);

/*echo Util::varDump($arrayNormal1);
echo Util::varDump($arrayNormal2);
echo Util::varDump($arrayNormal3);
echo Util::varDump($arrayAsociativo);*/