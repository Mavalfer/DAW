<?php
    require'../classes/AutoLoad.php';
    $db = new DataBase();
    
    $gestor = new ManageContactoTelefono($db); /*Gestor para manejar las dos tablas al mismo tiempo*/
    $listaDeContactosTelefonos = $gestor->getAll();
    
    $action = Request::get('action');
    $r = Request::get('r');
    

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
    <h1>Gestion de contactos y sus telefonos</h1>
    <table border="1">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Telefono</td>
                <td>Descripcion</td>
                <td>...</td>
                <td>...</td>
            </tr>
        </thead>
        <tbody>
    <?php
        foreach ($listaDeContactosTelefonos as $key => $contactoTelefono) {
            $contacto = $contactoTelefono['contacto'];
            $telefono = $contactoTelefono['telefono'];
            ?>
            <tr>
                <td><?php echo $contacto->getNombre(); ?></td>
                <td><?php echo $telefono->getTelefono(); ?></td>
                <td><?php echo $telefono->getDescripcion(); ?></td>
                <td><a href="action_viewEdit.php?id=<?php echo $contacto->getId(); ?>">Editar</a></td>
                <td><a href="action_viewDelete.php?idcontacto=<?php echo $contacto->getId(); ?>&idtelefono=<?php echo $telefono->getId(); ?>">Borrar</a></td>
            </tr>
            <?php
        }      
    ?>
        </tbody>   
    </table>
    <a href="action_viewInsert.php">insertar contacto</a>
</body>
</html>
<?php
$db->closeConnection();