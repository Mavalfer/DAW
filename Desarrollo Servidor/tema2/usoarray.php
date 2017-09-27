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
        $miarray = array();
        $miotroarray = [];
        $miarray[] = 'uno';
        $miarray[] = 'dos';
        $miarray[] = 'tres';
        $miarray[] = 23;
        $miarray[] = 'cuatro';
        $miarray[10] = 11;
        $miarray[] = 'cinco';
        $miarray['hola'] = 'adios';
        $miarray[] = 'seis';
        $miarray[] = array('1' => 1, 'otro' => 'algo', 'sdsa', 'asdasdd');
        foreach ($miarray as $key => $value) {
            
            echo "$key $value <br>";
        }
        //los arrays en php son asociativos
        ?>
    </body>
</html>