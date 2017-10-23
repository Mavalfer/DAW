<?php
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

if ($conexion === null) {
    //echo 'No se ha podido conectar';
    header('Location: error.html'); //como antes hemos hecho un echo y ya se han mandado datos al cliente, ya no se puede poner el header, estoen un servidor en condiciones falla, esta prohibido mandar la cabecera despues de la respuesta
    
    exit(); //Esto lo para todo y aqui acaba, de ahi palante nada
}
?>
<!doctype html>
<html>
<head></head>
<body>
    <h1>Conectado</h1>
    <?php
    //esto es solo de ejemplo, consultas sin preparar no
    //tres formas de hacer insert con distintos parametros
//    $sql = 'insert into car(id, marca, modelo) values (null, "ford", "fiesta")';
//    $res = $conexion->query( $sql );
//    echo Util::varDump($res);
//    
//    $sql = 'insert into car(marca, modelo) values ("mini", "cooper")';
//    $res = $conexion->query( $sql );
//    echo Util::varDump($res);
//    
//    $sql = 'insert into car values (null, "vw", "polo")';
//    $res = $conexion->query( $sql );
//    echo Util::varDump($res);
    
    $sql = 'insert into car values (null, "citroën", "c3")';
    $res = $conexion->query( $sql );
    if ($res !== false){
        $insertados = $res->rowCount();    
        echo 'Se han insertado ' . $insertados . '<br>';
        $id = $conexion->lastInsertId(); //da el id del ultimo elemento insertado sasdasd
        echo 'Se han insertado con el id ' . $id . '<br>';
    }   
    echo Util::varDump($res);
    ?>
</body>
</html>


<?php
/*cerrar la conexion*/
$conexion = null;
?>