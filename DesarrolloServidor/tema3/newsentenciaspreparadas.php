<?php
require './classes/Autoload.php';

$bd = new DataBase();

$alta = Request::read('alta');
$r = 0;
if ($alta === 'alta') {
    $car = new Car();
    $car->read();
    $sql = 'insert into car(marca,modelo) values (:marca, :modelo)';
    $parametros = array(
        'marca'  => $car->getMarca(),
        'modelo' => $car->getModelo()
    );
    $res = $bd->execute($sql, $parametros);
    if($res !== false){
        $r=1;
    }
}
//en caso de error 1º comentar la siguiente linea y descomentar el comentario en DataBase
//header('Location: altadecochemejorado.php?resultado=' . $r);
