<?php
require './Request.php';




$number = Request::read('numero');
if (is_null($number)) {
    $number = 0;
}

/*la primera vez que inicio la sesion hay la incertidumbre de que no se que tengo*/

session_start();
if (isset($_SESSION['suma'])) { /*si esto es true es que en la sesion hay algo guardado que se llama suma, si no hay nada en la sesion la suma es 0*/
    $suma = $_SESSION['suma'];
} else {
    $suma = 0;
}

$suma += $number;
$_SESSION['suma'] = $suma;

?>
<html>
    <head>
        
    </head>
    
    <body>
       <p>Suma de los elementos: <?= $suma ?></p>
        <form action="sumacontinuasesion.php">
            <input type="text" name="numero" value="">
            <input type="submit" value="sumar">
        </form>
    </body>
</html>