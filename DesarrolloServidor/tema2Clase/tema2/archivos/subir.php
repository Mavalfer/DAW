<?php
//el archivo ya está en el servidor
require '../Request.php';
require '../Util.php';
require '../FileUpload.php';

$nombre = Request::post('nombre');
/*echo 'El nombre que se le debe poner es: ' . $nombre;
//var_dump($_FILES['archivo']);
echo Util::varDump($_FILES['archivo']);
if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
    //move_uploaded_file($_FILES['archivo']['tmp_name'], $nombre);
    move_uploaded_file($_FILES['archivo']['tmp_name'], '../../../media/' . $nombre);
}*/
$subir = new FileUpload('archivo');
//$subir->setSize(10000);
$subir->setTarget('./..');
var_dump($subir->upload());