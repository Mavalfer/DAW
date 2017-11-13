<?php
    require'../classes/AutoLoad.php';
    $id = Request::read('id');
    $db = new DataBase();
    $gestor = new ManageTelefono($db);
    $telefono = $gestor->get($id);
    $db->closeConnection();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1>EDITAR TELEFONO: <?php echo $telefono->getTelefono(); ?></h1>
        <form action="action_doedittelefono.php" method="POST">
            <input type="hidden" name="id" value = "<?php echo $telefono->getId(); ?>"/>
            <input type="text" name="telefono" placeholder="numero de telefono" 
                   value="<?php echo $telefono->getTelefono(); ?>"/>
            <input type="submit" value="Actualizar"/>
        </form>
    </body>
</html>