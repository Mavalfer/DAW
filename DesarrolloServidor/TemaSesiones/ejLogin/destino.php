<?php
require './Request.php';
require './Session.php';

$users = array(
    'admin' => '1234',
    'root' => 'abc'
);

$login = Request::read('login');
$password = Request::read('password');

$session = new Session('login');
if (isset($users[$login]) && $users[$login] === $password) {
    echo 'ok';
    //$session->set('user', $login);
    $session->setUser()
} else {
    echo 'no';
    $session->close();
}
?>

<a href="acceso.php">acceso.php</a>
