<?php
require '../classes/Autoload.php';
$db = new DataBase();
$gestor = new ManageContacto($db);
$listaContactos = $gestor->getAll();
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
