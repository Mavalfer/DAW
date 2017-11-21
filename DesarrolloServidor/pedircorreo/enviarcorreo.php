<?php
session_start();

$origen = "mvalfer92@gmail.com";
$alias = "Pepe Perez";
$destino = "mvalfer92@gmail.com";
$asunto = "Prueba de correo";
$mensaje = "¿Llegará?";

require_once 'vendor/autoload.php';
$cliente = new Google_Client();
$cliente->setApplicationName('Correo Electronico');

/* refresh: necesario al refrescar el token */
$cliente->setClientId('636681053867-uviv30gv3i8ncbfd45qi11kli0kqlpmd.apps.googleusercontent.com');
$cliente->setClientSecret('lzzPNosCJjP8cpTnz-XzcTgf');
/* refresh */

$cliente->setAccessToken(file_get_contents('token.conf'));

if ($cliente->getAccessToken()) {
    $service = new Google_Service_Gmail($cliente);
    try {
        //$mail = new PHPMailer();
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->From = $origen;
        $mail->FromName = $alias;
        $mail->AddAddress($destino);
        $mail->AddReplyTo($origen, $alias);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;
        $mail->preSend();
        $mime = $mail->getSentMIMEMessage();
        $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');
        $mensaje = new Google_Service_Gmail_Message();
        $mensaje->setRaw($mime);
        $service->users_messages->send('me', $mensaje);
        echo "Correo enviado correctamente";
    } catch (Exception $e) {
        echo ("Error en el envío del correo: ".$e->getMessage());
    }
} else {
    echo "no conectado con gmail";
}