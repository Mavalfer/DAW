<?php
require'../classes/AutoLoad.php';
$contacto = new Contacto();
$contacto->read();
echo Util::varDump($contacto);
$db = new DataBase();
$gestor = new ManageContacto($db);
$r = $gestor->edit($contacto);
header('Location: index.php?action=editar&r=' . $r);
$db->closeConnection();