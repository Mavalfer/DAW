<?php

/*
sentencias preparadas: la UNICA forma fiable de ejecutar sentencias sql, sin que se puedan hacer inyecciones de sql

¿como funcionan? -> todos los datos que provienen del exterior (formularios, parametros de la URL, etc) se tienen que usar como parametros de la sentencia SQL
*/

require './classes/Autoload.php';
//establezco la conexion (abrir, trabajar, cerrar)

$servidor = 'localhost:3306';
$baseDatos = 'dwes';
$usuario = 'udwes';
$clave = 'cdwes';
try{
    $conexion = new PDO(
        'mysql:host=' . $servidor . ';dbname=' . $baseDatos,
        $usuario,
        $clave,
        array(
            PDO::ATTR_PERSISTENT => true, //atributo de persistencia, crea un pool de conexiones, es una forma agil de distribuir las conexiones
            PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8'
        )
    );
}catch (PDOException $e){
    //echo $e->errorInfo();
    $conexion = null; //deja libre 
}

$alta = Request::read('alta');
if ($alta === 'alta') {
    $car = new Car();
    $car->read();
    echo Util::varDump($car);
    /*NUNCA componer el sql con los datos externos*/
    $sql = 'insert into car(marca, modelo) values ( "'. $car->getMarca() /*eso, nunca*/. '", "' . $car->getModelo() . '")';  //esto es mierda, inyecciones aseguradas
    
    /*sentencia preparada*/
    $sql = 'insert into car(marca,modelo) values (:marca, :modelo)';
    //esa sentencia tiene un significado que no es posible modificar con inyecciones sql
    $sentencia = $conexion->prepare($sql); //el prepare asegura que la sentencia que se va a ejecutar es esa y solo esa
    $sentencia->bindValue('marca', $car->getMarca()); //ese 'marca' es :marca
    $sentencia->bindValue('modelo', $car->getModelo())
    //$res = $conexion->query($sql); entonces eso ya no se ejecuta asi
    $res = $sentencia->execute();
    if($res !== false){
        $r=1;
    } else {
        $r=0;
    }
}
header('Location: altadecochemejorado.php?resultado=' . $r);

/*Hemos corregido el primer error, */















