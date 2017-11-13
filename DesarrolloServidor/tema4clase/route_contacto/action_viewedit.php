<?php
    require'../classes/AutoLoad.php';
    $id = Request::read('id');
    $db = new DataBase();
    $gestor = new ManageContacto($db);
    $contacto = $gestor->get($id);
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
        <h1>EDITAR CONTACTO: <?php echo $contacto->getNombre(); ?></h1>
        <form action="action_doedit.php" method="POST">
            <input type="hidden" name="id" value = "<?php echo $contacto->getId(); ?>"/>
            <input type="text" name="nombre" placeholder="nombre del contacto" 
                   value="<?php echo $contacto->getNombre(); ?>"/>
            <br>
            <input type="submit" value="Actualizar"/>
        </form>
    </body>
</html>