<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $miarray = array();
        $miotorarray = [];
        $miarray[] = 'uno';
        $miarray[] = 'dos';
        $miarray[] = 'tres';
        $miarray[] = 23;
        $miarray[] = 'cuatro';
        $miarray[10] = 11;
        $miarray[] = 'cinco';
        $miarray['hola'] = 'adios';
        $miarray[] = 'seis';
        $miarray[] = array('c1' => 1, 'otro' => 'algo', 'sdsds', 'ssdsdsdsdsd');
        foreach ($miarray as $key => $value) {
            if($key===13){
                //echo 'ahora va el array anidado';
                foreach ($value as $keyanidado => $valueanidado) {
                    echo "&nbsp;&nbsp;$keyanidado $valueanidado <br>";
                }
            } else {
                echo "$key $value <br>";
            }
        }
        ?>
    </body>
</html>