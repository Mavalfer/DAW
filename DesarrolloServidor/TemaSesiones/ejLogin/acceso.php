<?php
require './Request.php';
require './Session.php';

$session = new Session('login'); /*en cada archivo php hay que hace el new session, para acceder a la sesion*/
//$user = $session->get('user');
$user = $session->getUser();
$mensaje = 'Acceso restringido';

if ($user !== null) {
    $mensaje = 'Hola ' . $user;
}
?>
   

<html>
    <head></head>
    <body>
        <h1><?php echo $mensaje ?></h1>
    </body>
</html>