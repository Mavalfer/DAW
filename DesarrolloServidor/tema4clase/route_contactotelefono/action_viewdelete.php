<?php
    require'../classes/AutoLoad.php';
    $sesion = new Session('sesion');
    $user = $sesion->getUser();
    if($user === null){
        header('Location: ../');
        exit();
    }
    $idContacto = Request::get('idcontacto');
    $idTelefono = Request::get('idtelefono');
    
    $db = new DataBase();
    $gestor = new ManageContactoTelefono($db);
    $telefonos = $gestor->getWithContactId($idContacto);
    $cuenta = $gestor->countTelefonos($idContacto);
    
    if(count($telefonos) > 1){
        $enlace = 'action_dodelete.php?idtelefono=' . $idTelefono . '&idcontacto=null';
    }else{
        if(count($telefonos) === 0){
            $idTelefono = null;
        }
        $enlace = 'action_dodelete.php?idtelefono=' . $idTelefono. '&idcontacto=' . $idContacto;
    }
    $telefono = new Telefono();
    for ($i = 0; $i < count($telefonos); $i++) {
         if($telefonos[$i]->getId() === $idTelefono){
             $telefono = $telefonos[$i];
         }
    }
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
    <h1>¿Estas seguro que deseas eliminar a <?php echo $telefono->getTelefono(); ?>?</h1>
    <a href="<?php echo $enlace; ?>">Si</a>
    <a href="index.php">No</a>
</body>
</html>
<?php
$db->closeConnection();