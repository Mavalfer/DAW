<?php 
require 'Util.php';
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
        
       // var_dump($meses);
        
       // echo '<pre>' . var_export($meses, true) . '</pre>';
        echo Util::varDump($meses);
        
        $meses2 = array();
        $meses2[] = "enero";
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
        
        $diasemana = array('lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo');
        
        echo Util::varDump($meses2);
        
        //array asociativo
        $diames = [];
        $diames['enero'] = 31;
        $diames['febrero'] = 28;
        $diames['marzo'] = 31;
        $diames['abril'] = 30;
        $diames['mayo'] = 31;
        $diames['junio'] = 30;
        $diames['julio'] = 31;
        $diames['agosto'] = 31;
        $diames['septiembre'] = 30;
        $diames['octubre'] = 31;
        $diames['noviembre'] = 30;
        $diames['diciembre'] = 31;
        
        echo Util::varDump($diames);
        
        for ($i=0; $i < count($meses); $i++){
            echo $i . ' ' . $meses[$i] . '<br>';
        }
        
        foreach ($meses as $indice => $mes) {
            echo $indice . ' ' . $mes . '<br>';
        }
        
        foreach ($meses as $mes) {  //este foreach no saca los indices
            echo $mes . '<br>';
        }
        
        $dia = [];
        
        foreach ($diames as $valor){
            $dia[] = $valor;
        }
        echo Util::varDump($dia);
        
        $semanadia = [];
        foreach($diasemana as $numero => $diadelasemana){
            $semanadia[$diadelasemana] = $numero;
        }
        echo Util::varDump($semanadia);
        
        $alu1 = array('pepe', 'perez', 'dwes', 4.7);
        $alu2 = array('juana', 'lopez', 'dwes', 5.8);
        $alu3 = array('manolo', 'gomez', 'dwes');
        
        $alumno = array($alu1, $alu2, $alu3);
        
        echo Util::varDump($alumno);
        echo '<br>';
        $alum1 = array('nombre' => 'pepe','apellidos' => 'perez','asignatura' => 'dwes','nota' => 4.7);
        $alum2 = array('nombre' => 'paco','apellidos' => 'lopez','asignatura' => 'dwes','nota' => 6.8);
        $alum3 = array('nombre' => 'juana','apellidos' => 'moreno','asignatura' => 'dwes','nota' => 5.7);
        
        $alumno2 = array($alum1, $alum2, $alum3);
        
        echo Util::varDump($alumno2);
        echo '<br>';
        
        foreach ($alumno2 as $i => $alumno){
            foreach ($alumno as $j => $campo){
                echo "$j : $campo <hr>";
            }
        }
        
        
        $nota = 0;
        $notas = 0;
        foreach ($alumno2 as $i => $alumno){
            foreach ($alumno as $j => $campo){
                if ($j === 'nota') {
                    $nota += $campo;
                    $notas++;
                }
            }
        }
        
        $notamedia = $nota / $notas;
        echo "La nota edia es $notamedia";
        
        $suma = 0;
        $numAlums = 0;
        foreach ($alumno2 as $alu) {
            if (isset ($alu['nota'])) {
                $suma += $alu['nota'];
                $numAlums++;
            }
        }
        
        echo "<br><br>La media de la clase es: " . $suma / $numAlums;
        
        ?>
    </body>
</html>
