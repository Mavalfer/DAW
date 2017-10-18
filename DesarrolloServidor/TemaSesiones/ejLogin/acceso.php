<?php
require './Request.php';
require './Session.php';
require './Util.php';

$session = new Session('login'); /*en cada archivo php hay que hace el new session, para acceder a la sesion*/
//$user = $session->get('user');
$user = $session->getUser();
$nav = $_SERVER['HTTP_USER_AGENT'];
$mensaje = 'Acceso restringido';

if ($user !== null) {
    $mensaje = 'Hola ' . $user;
}
?>
   

<html>
    <head></head>
    <body>
        <h1><?php echo $mensaje ?></h1>
        <?php 
            echo Util::varDump($_SERVER);
            echo '<br>';
            echo $session->getNav();
            echo $session->chkNav($nav);
        ?>
    </body>
</html>