<?php
    require'../classes/AutoLoad.php';
    $id = Request::get('id');
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
        <h1>¿Borrar contacto? <?php echo $contacto->getNombre(); ?></h1>
        <a href="action_dodelete.php?id=<?php echo $contacto->getId(); ?>">Si</a>
        <a href="index.php">No</a>
        <form action="action_dodelete.php" method="POST">
            <input type="hidden" name="id" value = "<?php echo $contacto->getId(); ?>"/>
            <br>
            <input type="submit" value="Borrar"/>
        </form>
    </body>
</html>