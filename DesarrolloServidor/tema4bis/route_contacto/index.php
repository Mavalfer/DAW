<?php
require '../classes/Autoload.php';
$db = new DataBase();
$gestor = new ManageContacto($db);
$listaContactos = $gestor->getAll();

$action = Request::get('action');
$r = Request::read('r');

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
<!doctype html>
<html>

<head>
    <meta>
    <link rel="stylesheet" href="">
    <title></title>
</head>

<body>
    <!--
        Acciones que siempre se van a hacer en una tabla
        1º listado de todos los contactos  -> getAll()
        2º insertar un contacto            -> add(Contacto c)
        3º editar un contacto              -> edit(Contacto c)
        4º borrar un contacto              -> remove(id)
        5º listar un contacto              -> get(id)
    -->
    <h1>Gestión de contactos</h1>
    
    <!--table>thead>tr>th*4^^tbody>tr>td*4-->

   <h2><a href="action_viewinsert.php">Registrar contacto</a></h2>

    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>nombre</th>
                <th>...</th>
                <th>...</th>
            </tr>
        </thead>
        <tbody>
            <?php
        foreach ($listaContactos as $key => $contacto) {
            ?>
                <tr>
                    <td>
                        <?php echo $contacto->getId(); ?>
                    </td>
                    <td>
                        <?= $contacto->getNombre()?>
                    </td>
                    <td><a href="action_viewedit.php?id=<?= $contacto->getId()?>">Editar</a></td><!--Editar: enlace al archivo action_viewedit.php?id=ID siempre hay que pasar como parametro el id de la clave principal  -->
                    <!--mostrar formulario prerelleno con los datos del usuario -->
                    <td><a href="action_viewdelete.php?id=<?= $contacto->getId()?>">Borrar</a></td>
                    <!-- Borrar: enlace al archivo action_viewdelete.php?id=ID¿de verdad quieres borrar a NOMBRE?-->
                </tr>
                <?php
        }
        ?>

        </tbody>
    </table>
</body>

</html>


<?php
$db->closeConnection();
?>
