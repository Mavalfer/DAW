<?php
require '../classes/AutoLoad.php';

$contacto = new Contacto();

$contacto->read();

echo Util::varDump($contacto);

$sql = 'insert into contacto(nombre) values (:nombre)';

$parametros = array(
    'nombre' => $contacto->getNombre()
);
$r = 0;
$db = new DataBase();
$res = $db->execute($sql, $parametros); //true o false
if($res) {
    /*$id = $db->getId();
    $numRow = $db->getRowNumber();
    echo 'El id es ' . $id . ' y el numeor de filas es ' . $numRow;*/
    $r = 1;
}
header('Location: index.php?r=' . $r);
