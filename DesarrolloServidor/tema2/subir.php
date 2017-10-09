<?php

require './Request.php';
require './Util.php';
$nombre = Request::post('nombre');
echo 'El nombre que s ele debe poner es: ' . $nombre;
echo Util::varDump($_FILES['archivo']);

if(is_uploaded_file($_FILES['archivo']['tmp_name'])) {
  //  move_uploaded_file($_FILES['archivo']['tmp_name'], 'destino'); //lo mueve  a la misma carpeta donde estamos, y efectivamente ahi aparece
  move_uploaded_file($_FILES['archivo']['tmp_name'], '../../media/destino'); //asi es ponerlo a pelo con la ruta, asi no se hace exactaente pero el archivo ya esta fuera de peligro
}