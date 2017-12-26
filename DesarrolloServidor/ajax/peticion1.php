<?php
//paso 2
//hay que poner un header que diga que la respuesta es JSON
header('Content-Type: application/json');

//esta es la pagina que sera llamada por el cliente con una peticion ajax
sleep(1); //me voy a dormir X segundos para simular internet lento. Para el desarrollo es bueno tenerlo porque ayuda a ver los errores

//genero la respuesta: JSON (o XML, etc)
$respuesta = array('respuesta' => 'php -> ajax');
//los objetos tambien se pueden convertir a JSON
echo json_encode($respuesta);