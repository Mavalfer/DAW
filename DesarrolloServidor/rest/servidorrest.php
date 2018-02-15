<?php

function varDump($valor){
    echo '<pre>' . var_export($valor, true) . '</pre>';   
}

echo 'yo soy el servidor rest';

$parametro = $_GET['parametro'];

echo '<br>parametro: ' . $parametro;

$cabeceras = getallheaders();
varDump($cabeceras);
echo 'la region es: ' . $cabeceras['x-region'];
echo '<br> el metodo es: ' . $_SERVER['REQUEST_METHOD'];

$parametrosBody = file_get_contents('php://input');
echo 'parametros del body: ';
varDump($parametrosBody);
$parametrosBodyJson = json_decode(file_get_contents('php://input'), false); //true para array
//$parametrosBodyJson es un objeto de php basico, puedo acceder directamente a sus
//propiedades, en este caso dato1 y dato2
echo $parametrosBodyJson->dato1;
echo '<br>';
echo $parametrosBodyJson->dato2;
varDump($parametrosBodyJson);

$cabecera = $cabeceras['authorization'];
echo 'la cabecera de autorizacion es: ' . $cabecera;
$partesCabecera = explode(' ',$cabecera);
if($partesCabecera[0] === 'Basic'){
    $descifrado = base64_decode($partesCabecera[1]);
    echo '<br>'.$descifrado;
    $partesUsuario = explode(':',$descifrado);
    echo "\nusuario: " . $partesUsuario[0];
    echo "\nclave: " . $partesUsuario[1];
    $fecha = new DateTime();
    $token = array(
        'usuario' => $partesUsuario[0],
        'tiempodevida' => $fecha->getTimestamp() + 10 * 60
    );
    //$token = JWT::encode($token, 'clavesecreta');
    $token = json_encode($token);
    echo $token;
}
if($partesCabecera[0] === 'Bearer'){
    $token = $partesCabecera[1];
    //$tokenDescifrado = JWT::decode($token, 'clavesecreta', 'HSA512');
    $tokenDescifrado = json_decode($token);
    echo 'eres el usuario: ' . $tokenDescifrado->usuario;
    echo 'tu tiempo de vida es: ' . $tokenDescifrado->tiempodevida;
    $fecha = new DateTime();
    if($tokenDescifrado->tiempodevida > $fecha->getTimestamp()){
        echo 'sigues siendo valido';
    } else {
        echo 'token expirado';
    }
    $token = array(
        'usuario' => $partesUsuario[0],
        'tiempodevida' => $fecha->getTimestamp() + 10 * 60
    );
    $token = json_encode($token);
    echo $token;
}