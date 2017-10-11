<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require './Estudiante.php';
        require './Util.php';
        $e = new Estudiante('Pepe', 'Pérez López');
        echo '<h1>Eres: '. $e->getNombre() . ' ' . $e->getApellidos() . '</h1>';
        ?>
        <h2>Vamos a realizar una introspección:</h2>
        <?php
        $e->introspeccion();
        echo '<hr>';
        echo Util::varDump($e->getAtributos());
        echo Util::varDump($e->getValores());
        echo Util::varDump($e->getValoresAtributos());
        ?>
    </body>
</html>
