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
        
            if(isset($_GET['enviar'])){
                $num = (integer) $_GET['suma'];
                $num = $num + (integer) $_GET['numero'];
                echo $num;
            }
        ?>
        <form action="formulario.php" method="GET">
            <input type="text" name="numero" value="" />
            <input type="hidden" name="suma" value="<?php 
                if($num === null){
                    echo 0;
                }else{
                    echo $num;
                }
             ?>"/>
            <input type="submit" name="enviar" value="sumar"/>
        </form>
    </body>
</html>
