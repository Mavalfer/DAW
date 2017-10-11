<?php

require './Request.php';
require './Util.php';
require './FileUpload.php';
$nombre = Request::post('nombre');


echo 'El nombre que s ele debe poner es: ' . $nombre;
echo Util::varDump($_FILES['archivo']);

/*crear, set size, set target, setname, upload*/