<?php
$sesion = new Session('sesion');
$user = $sesion->getUser();
if($user === null){
    header('Location: ../');
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Insertar contacto</h1>
        <form action="action_doinsert.php" method="POST">
            <input required type="text" name="nombre" value="" placeholder="nombre del contacto"/>
            <br>
            <input required type="text" name="telefono" value="" placeholder="telefono"/>
            <br>
            <input type="text" name="descripcion" value="" placeholder="descripcion"/>
            <br>
            <input type="submit" value="Insertar"/>
        </form>
    </body>
</html>