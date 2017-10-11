<?php

$nombre = $_POST['nombre'];
echo "$nombre<br>";
foreach ($_POST['telefono'] as $key => $value) {
    echo "telefono $key: $value<br>";
}
//$telefono = $_POST['telefono'];
//$telefono = $_POST['telefono'];
//$telefono = $_POST['telefono'];

//echo "$nombre $telefono $telefono $telefono <br>";