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
                    <td></td>
                    <td></td>
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