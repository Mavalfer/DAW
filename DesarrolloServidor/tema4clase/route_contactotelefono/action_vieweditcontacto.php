<?php
    require'../classes/AutoLoad.php';
    $sesion = new Session('sesion');
    $user = $sesion->getUser();
    if($user === null){
        header('Location: ../');
        exit();
    }
    $db = new DataBase();
    $gestor = new ManageContacto($db);
    $contacto = $gestor->get(Request::read('idcontacto'));
    
    $gestor2 = new ManageContactoTelefono($db);
    $telefonos = $gestor2->getWithContactId($contacto->getId());
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
        <h1>EDITAR CONTACTO: <?php echo $contacto->getNombre();?></h1>
        <form action="action_doedittcontacto.php" method="POST">
            <input type="hidden" name="idcontacto" value="<?php echo $contacto->getId() ?>">
            <input type="text" name="contacto" value="<?php echo $contacto->getNombre() ?>">
            <select>
                <?php
                    foreach($telefonos as $key){
                        echo '<option value=' . $key->getId() . '>' . $key->getTelefono() . '</option>';
                    }
                ?>
            </select>
            <input type="submit" value="Editar Contacto">
        </form>
    </body>
</html>