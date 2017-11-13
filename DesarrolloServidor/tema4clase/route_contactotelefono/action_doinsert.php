<?php
require'../classes/AutoLoad.php';
$db = new DataBase();
$gestor = new ManageContacto($db);
$contacto = new Contacto();
$contacto->read();
echo '<br>antes el id del contacto a insertar es: ' . $contacto->getId();
$r = $gestor->add($contacto);
echo '<br>despues el id del contacto insertado es: ' . $contacto->getId();
echo '<br>despues el id del contacto insertado es: ' . $r;
if($r > 0) {
    $gestor = new ManageTelefono($db);
    $telefono = new Telefono();
    $telefono->read();
    $telefono->setIdcontacto($r);
    $r = $gestor->add($telefono);
    echo '<br>despues el id del telefono insertado es: ' . $r;
}
//si $r es 0 -> fallo
//header('Location: index.php?action=insertar&r=' . $r);
//$db->closeConnection();