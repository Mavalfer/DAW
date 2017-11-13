<?php
//ACTION_DOEDIT.PHP
require'../classes/AutoLoad.php';
$id=Request::read('id');
$idContacto=Request::read('idcontacto');
$numero=Request::read('telefono');
$descripcion=Request::read('descripcion');
$telefono = new Telefono($id,$idContacto,$numero,$descripcion);
$db = new DataBase();
$gestor = new ManageTelefono($db);
$r = $gestor->edit($telefono);
header('Location: index.php?action=editar&r=' . $r);
$db->closeConnection();