<?php
    //1º importar la clase Request
    require 'Request.php';
    //2º usar los métodos estáticos de la clase Request
    $nombre = Request::read('nombre');
    $apellidos = Request::read('apellidos');
    $telefono = Request::read('telefono');
    $nacimiento = Request::read('nacimiento');
    $correo = Request::read('correo');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Hola <?php echo $nombre; ?></title>
    </head>
    
    <body>
        <?php  
            echo "Has llegado al PHP con el nombre " . $nombre . ", apellido " . $apellidos . ", teléfono " . $telefono . ", correo " . $correo . " y fecha de nacimiento " .$nacimiento;
        ?>
    </body>
</html>