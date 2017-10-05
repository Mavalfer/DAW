<?php

/* $_SERVER
 * es un array asociativo
 * que contiene informacion sobre el servidor (web) y el entorno de ejecucion
 * 
 * vamos a inspeccionarlo
 * 1º Util::varDump
 * 2º var_dump() igual que el prieor pero mas feo
 * 3º recorrer con foreach y ver su informacion
 * 
 */

require './Util.php';

echo Util::varDump($_SERVER);
