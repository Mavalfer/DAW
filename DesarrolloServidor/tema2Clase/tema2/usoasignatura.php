<?php
    require './Asignatura.php';
?>
<!DOCTYPE html>
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
        //echo '<meta charset="UTF-8">';
        //echo "<meta charset=\"UTF-8\">";
        $valor = 8;
        $nuevovalor = $valor;
        $nuevovalor = $nuevovalor + 1; 
        
        $asig3 = new Asignatura('DWES', 8);
        //$asig4 = $asig3;
        $asig4 = new Asignatura($asig3->getNombre(), $asig3->getHoras());
        $asig4->setHoras($asig4->getHoras()+1);
        
        echo $asig3 . '<br>';
        echo $asig4 . '<br>';
        
        
        ?>
    </body>
</html>
