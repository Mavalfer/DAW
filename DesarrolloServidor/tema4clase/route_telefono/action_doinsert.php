<?php
require'../classes/AutoLoad.php';
$telefono = new Telefono();
$telefono->read();
$db = new DataBase();
$gestor = new ManageTelefono($db);
$r = $gestor->add($telefono);
header('Location: index.php?action=insertar&r=' . $r);
$db->closeConnection();