<?php

// $_SERVER
// es un array asociativo
// que contiene información sobre el servidor (web) y el entorno de ejecución

//vamos a inspeccionarlo
//1º Util::varDump
//2º var_dump()
//3º foreach

require './Util.php';
echo Util::varDump($_SERVER);
/*if($_SERVER['REQUEST_METHOD']==='GET'){
    echo "has llegado por get";
} else {
    echo "has llegado por post";
}*/

echo 'line: '. __LINE__ . '<br>';
echo 'file: '. __FILE__ . '<br>';
echo 'dir: '. __DIR__ . '<br>';
echo 'function: '. __FUNCTION__ . '<br>';
echo 'class: '. __CLASS__ . '<br>';
echo 'method: '. __METHOD__ . '<br>';