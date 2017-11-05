<?php
    require'../classes/AutoLoad.php';
    $db = new DataBase();
    $gestor = new ManagerContacto($db);
    $listaDeContactos = $gestor->getAll();
    
    $action = Request::get('action');
    $r = Request::get('r');
    
    if($action === 'add'){
        if($r === '0'){
            echo '<h1>la inserción ha fallado</h1>';
        }else{
            echo '<h1>insertado con exito con id: ' . $r . '</h1>';
        }
    }elseif($action === 'editar'){
        if($r === '-1'){
            echo '<h1>Ha fallado la edición</h1>';
        }else{
            echo '<h1>Se han editado: ' . $r . ' filas con exito</h1>';
        }
    }elseif($action === 'remove'){
        if($r === '-1'){
            echo '<h1>el borrado ha fallado</h1>';
        }else{
            echo '<h1>Se han borrado: ' . $r . ' filas con exito</h1>';
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
    <h1>Gestion de contactos</h1>
    <table border="1">
        <thead>
            <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>...</td>
                <td>...</td>
            </tr>
        </thead>
        <tbody>
    <?php
        foreach ($listaDeContactos as $key => $contacto) {
            ?>
            <tr>
                <td><?php echo $contacto->getId(); ?></td>
                <td><?php echo $contacto->getNombre(); ?></td>
                <td><a href="action_viewEdit.php?id=<?php echo $contacto->getId(); ?>">Editar</a></td>
                <td><a href="action_viewDelete.php?id=<?php echo $contacto->getId(); ?>">Borrar</a></td>
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