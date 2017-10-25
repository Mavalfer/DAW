<!doctype html>
<html>
<head></head>
<body>
   <?php
    require './classes/Autoload.php';
    $resultado = Request::read('resultado');
    if ($resultado !== null) {
        echo "<h1>Resultado: $resultado</h1>";
    }
    ?>
    <form action="sentenciaspreparadas.php" method="post">
        <input type="text" name="marca" placeholder="marca">
        <input type="text" name=modelo placeholder="modelo">
        <input type="submit" name="alta" value="alta">
    </form>
</body>
</html>