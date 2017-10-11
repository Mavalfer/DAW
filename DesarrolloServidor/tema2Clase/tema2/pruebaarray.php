<?php
    require 'Util.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $meses = array();
        $meses[] = "enero";
        $meses[] = "febrero";
        $meses[] = "marzo";
        $meses[] = "abril";
        $meses[] = "mayo";
        $meses[] = "junio";
        $meses[] = "julio";
        $meses[] = "agosto";
        $meses[] = "septiembre";
        $meses[] = "octubre";
        $meses[] = "noviembre";
        $meses[] = "diciembre";
        
        //var_dump($meses);
        //echo '<pre>' . var_export($meses, true) . '</pre>';
        echo Util::varDump($meses);
        
        $meses2 = array();
        $meses2[1] = "enero";
        $meses2[] = "febrero";
        $meses2[] = "marzo";
        $meses2[] = "abril";
        $meses2[] = "mayo";
        $meses2[] = "junio";
        $meses2[] = "julio";
        $meses2[] = "agosto";
        $meses2[] = "septiembre";
        $meses2[] = "octubre";
        $meses2[] = "noviembre";
        $meses2[] = "diciembre";
        
        echo Util::varDump($meses2);
        
        $diasemana = array('lunes','martes','miercoles','jueves','viernes','sabado','domingo');
        
        echo Util::varDump($diasemana);
        
        //array asociativo
        $diasmes = [];
        $diasmes['enero']=31;
        $diasmes['febrero']=28;
        $diasmes['marzo']=31;
        $diasmes['abril']=30;
        $diasmes['mayo']=31;
        $diasmes['junio']=30;
        $diasmes['julio']=31;
        $diasmes['agosto']=31;
        $diasmes['septiembre']=30;
        $diasmes['octubre']=31;
        $diasmes['noviembre']=30;
        $diasmes['diciembre']=31;
        
        echo Util::varDump($diasmes);
        echo '<hr>';
        for ($i=0; $i < count($meses); $i++){
            echo $i . ' ' . $meses[$i] . '<br>';
        }
        echo '<hr>';
        foreach ($meses as $indice => $mes) {
            echo $indice . ' ' . $mes . '<br>';
        }
        echo '<hr>';
        foreach ($meses as $mes) {
            echo $mes . '<br>';
        }
        echo '<hr>';
        
        $dias = [];
        
        foreach ($diasmes as $valor){
            $dias[]=$valor;
        }
        
        echo Util::varDump($dias);
        
        $semanadia = [];
        
        foreach($diasemana as $numero => $diadelasemana){
            $semanadia[$diadelasemana] = $numero;
        }
        
        echo Util::varDump($semanadia);
        
        
        $alu1 = array('pepe', 'perez', 'dwes', 4.7);
        $alu2 = array('juana', 'lopez', 'dwes', 5.8);
        $alu3 = array('manolo', 'gomez', 'dwes');
        
        $alumno = array ($alu1, $alu2, $alu3);
        
        echo Util::varDump($alumno);
        echo '<br>';
        $alum1 = array('nombre' => 'pepe', 'apellidos' => 'perez', 'asginatura' => 'dwes',
            'nota' => 4.7);
        $alum2 = array('nombre' => 'jose', 'apellidos' => 'lopez', 'asginatura' => 'dwes',
            'nota' => 6.7);
        $alum3 = array('nombre' => 'armando', 'apellidos' => 'moreno', 'asginatura' => 'dwes');
        $alumno2 = array ($alum1, $alum2, $alum3);
        
        echo Util::varDump($alumno2);
        echo '<hr>';
        
        foreach($alumno2 as $i => $alumno){
            foreach($alumno as $j => $campo){
                echo "$j : $campo <hr>";
            }
        }
        
        echo '<hr>';
        $nota = 0;
        $notas = 0;
        foreach($alumno2 as $i => $alumno){
            foreach($alumno as $j => $campo){
                if ($j === "nota"){
                    $nota += $campo;
                    $notas ++;
                }
            }
        }
        $notamedia = $nota / $notas;
        echo "La nota media es: $notamedia";
        $suma = 0;
        $numAlums = 0;
        foreach($alumno2 as $alu) {
            if (isset ($alu['nota']) ) {
                $suma+= $alu['nota'];
                $numAlums++;
            }            
        }        
        echo "<br><br>La media de la clase es: " . $suma / $numAlums;
        ?>
    </body>
</html>