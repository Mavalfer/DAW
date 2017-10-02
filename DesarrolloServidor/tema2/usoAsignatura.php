<?php
require './Asignatura.php';
?>
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
        $asig1 = new Asignatura();
        $asig2 = new Asignatura('EIE');
        $asig3 = new Asignatura('DWES', 8);
        
        echo $asig1 . '<br>';
        echo $asig2 . '<br>';
        echo $asig3 . '<br>';
        
        $valor = 8;
        $nuevoValor = $valor;
        $nuevoValor = $nuevoValor + 1;
        $asig4 = $asig3; //esta asignando asig4 al mismo objeto que asig3, por eso ambos tienen el mismo valor
        $asig4->setHoras($asig4->getHoras() + 1);
        
        echo $asig3 . '<br>';
        echo $asig4 . '<br>';
        
        $asig4 = new Asignatura($asig3->getNombre(), $asig3->getHoras()); //ahora si tengo dos objetos independientes
        $asig4->setHoras($asig4->getHoras() + 1);
        
        echo $asig3 . '<br>';
        echo $asig4 . '<br>';
        
        
        
        ?>
    </body>
</html>
