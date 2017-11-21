<?php
//id de cliente
// 636681053867-uviv30gv3i8ncbfd45qi11kli0kqlpmd.apps.googleusercontent.com

//secreto de cliente
// lzzPNosCJjP8cpTnz-XzcTgf

//Nombre del proyecto
// Correo Electronico
session_start();
require_once 'vendor/autoload.php';
$cliente = new Google_Client();
$cliente->setApplicationName('Correo Electronico');
$cliente->setClientId('636681053867-uviv30gv3i8ncbfd45qi11kli0kqlpmd.apps.googleusercontent.com');
$cliente->setClientSecret('lzzPNosCJjP8cpTnz-XzcTgf');
$cliente->setRedirectUri('https://daw-mavalfer.c9users.io/DesarrolloServidor/pedircorreo/guardartoken.php');
$cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');
$cliente->setAccessType('offline'); //permiso para todo, si nos pillan la clave el correo puede hacer lo que quiera


if (isset($_GET['code'])) {
$cliente->authenticate($_GET['code']);
$_SESSION['token'] = $cliente->getAccessToken();
$archivo = "token.conf";
$fh = fopen($archivo, 'w') or die("error");
fwrite($fh, json_encode($cliente->getAccessToken()));
fclose($fh);
header("Location: terminar.php?code=" . $_GET['code']);
}