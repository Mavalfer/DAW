<?php
require'../classes/AutoLoad.php';
$db = new DataBase();
$gestor = new ManageContacto($db);
$contacto = new Contacto();
$contacto->read();
$r = $gestor->add($contacto);
header('Location: index.php?action=insertar&r=' . $r);
$db->closeConnection();