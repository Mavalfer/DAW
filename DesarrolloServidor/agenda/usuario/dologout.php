<?php
require'../classes/AutoLoad.php';
$sesion = new Session('agenda');
$sesion->logout();
header('Location: ../index.php?op=logout');