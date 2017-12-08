<?php
require'../classes/AutoLoad.php';
$opt = Request::read('opt');
$sesion = new Session('agenda');
$sesion->logout();
header('Location: ../index.php?op=logout&opt=' . $opt);