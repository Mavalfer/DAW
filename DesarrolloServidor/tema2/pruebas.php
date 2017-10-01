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
        if( 2 < 3 ) echo "holas";
        $a='10'; 
        $b=$a + 2;
        echo $b;
        echo "<br>";
        $vocales = array( 1 => "a", 3=> "e","i","o","u");
        foreach ($vocales as $i => $valor) {
            echo "$i " . "$valor<br>";
        }

        $paises = array( '2' => "Argentina", 'b'=> "Bolivia", 'c' => "Colombia");
        $paises[] = "Perú";

        foreach ($paises as $i => $valor) {
            echo "$i " . "$valor<br>";
        }

        $letras = array ('a' => 'Letra A', 'b' =>'Letra B');
        $letras[] = 'letra C';

        
        foreach ($letras as $i => $valor) {
            echo "$i " . "$valor<br>";
        }
        ?>
    </body>
</html>