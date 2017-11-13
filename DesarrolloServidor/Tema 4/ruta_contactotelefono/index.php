<?php
    require'../classes/AutoLoad.php';
    $db = new DataBase();
    $gestor = new ManagerContactoTelefono($db);
    $listaDeContactosTelefonos = $gestor->getAll();
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
    <h1>Gestion de contactos y telefonos</h1>
    <h2><a href="action_viewinsertarcontacto.php">Insertar Contacto</a></h2>
    <table border="1">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Telefono</td>
                <td>Descripcion</td>
            </tr>
        </thead>
        <tbody>
    <?php
        foreach ($listaDeContactosTelefonos as $key => $contactoTelefono) {
            $contacto = $contactoTelefono['contacto'];
            $telefono = $contactoTelefono['telefono'];
            ?>
            <tr>
                <td><a href="action_vieweditcontacto.php?idcontacto=<?php echo $contacto->getId(); ?>"><?php echo $contacto->getNombre(); ?></a></td>
                <td><a href="action_viewedittelefono.php?idtelefono=<?php echo $telefono->getId(); ?>"><?php echo $telefono->getTelefono(); ?></a></td>
                <td><?php echo $telefono->getDescripcion(); ?></td>
                <td><a href="action_viewEdit.php?idcontacto=<?php echo $contacto->getId(); ?>&idtelefono=<?php echo $telefono->getId(); ?>">Editar</a></td>
                <td><a href="action_viewDelete.php?idcontacto=<?php echo $contacto->getId(); ?>&idtelefono=<?php echo $telefono->getId(); ?>">Borrar</a></td>
            </tr>
            <?php
        }      
    ?>
        </tbody>   
    </table>
    <a href="action_viewInsert.php">insertar contacto o telefono</a>
</body>
</html>
<?php
$db->closeConnection();