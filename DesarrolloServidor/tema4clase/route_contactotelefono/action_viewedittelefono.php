<?php
    require'../classes/AutoLoad.php';

    $sesion = new Session('sesion');
    $user = $sesion->getUser();
    if($user === null){
        header('Location: ../');
        exit();
    }

    $id = Request::read('idtelefono');
    $db = new DataBase();
    $gestor = new ManageTelefono($db);
    $gestor2 = new ManageContacto($db);
    $telefono = $gestor->get($id);
    $contacto=new Contacto();
    $contacto=$gestor2->get($telefono->getIdcontacto());
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
        <h1>EDITAR TELEFONO DE: <?php echo $contacto->getNombre();?> CON EL TELEFONO <?php echo $telefono->getTelefono();?></h1>
        <form action="action_doedittelefono.php" method="POST">
            <input type="hidden" name="id" value = "<?php echo $telefono->getId(); ?>"/>
            <input type="text" name="telefono" placeholder="numero de telefono" 
                   value="<?php echo $telefono->getTelefono(); ?>"/>
            <br>
            <input type="hidden" name="idcontacto" placeholder="id del contacto" 
                   value="<?php echo $telefono->getIdcontacto(); ?>"/>
            <br>
            <input type="text" name="descripcion" placeholder="descripcion" 
                   value="<?php echo $telefono->getDescripcion(); ?>"/>
            <br>
            <input type="submit" value="Actualizar"/>
        </form>
    </body>
</html>