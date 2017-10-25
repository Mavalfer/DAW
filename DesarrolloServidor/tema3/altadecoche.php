<?php

/*cosas hechas mal a proposito*/
$alta = Request::read('alta');
if ($alta === 'alta') {
    $car = new Car();
    $car->read();
    echo Util::varDump($car);
    /*NUNCA componer el sql con los datos externos*/
    $sql = 'insert into car(marca, modelo) values ( "'. $car->getMarca() /*eso, nunca*/. '" "' etc etc)
}
?>


<!doctype html>
<html>
<head></head>
<body>
    <form action="altadecoche.php" method="post"> <!--NUNCA hacer el destino a la propia pagina (en este caso)-->
        <input type="text" name="marca" placeholder="marca">
        <input type="text" name=modelo placeholder="modelo">
        <input type="submit" name="alta" value="alta">
    </form>
</body>
</html>