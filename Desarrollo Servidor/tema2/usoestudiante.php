<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require './Estudiante.php';
        $e = new Estudiante('Pepe', 'Perez');
        echo '<h1>Eres: ' . $e->getNombre() . ' ' . $e->getApellido() . '</h1>';
        ?>
        <h2>Vamos a realizar una introspeccion:</h2>
        <?php
        $e->introspeccion();
        ?>
    </body>
</html>
