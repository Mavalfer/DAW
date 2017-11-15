<?php
require '../classes/AutoLoad.php';
$sesion = new Session('sesion');
$sesion->close();
header('Location: ./');