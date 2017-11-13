<?php
require '../classes/AutoLoad.php';
$db = new DataBase();
$gestor = new ManageTelefono($db);
$listaDeTelefonos = $gestor->getAll();
$action = Request::read('action');
$result = Request::read('r');
$mensaje = '';
if($action !== null) {
    $mensaje = '<h2>Acción: ' . $action . ' resultado: ' . $result . '</h2>';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Gestión de telefonos</h1>
        <h2><a href="action_viewinsert.php">insertar telefono</a></h2>
        <?php
        echo $mensaje;
        ?>
        <table border="1">
            <thead>
                <tr>
                    <th>id</th>
                    <th>idcontacto</th>
                    <th>telefono</th>
                    <th>descripcion</th>
                    <th>editar</th>
                    <th>borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaDeTelefonos as $key => $contacto) {
                    ?>
                    <tr>
                        <td><?php echo $contacto->getId(); ?></td>
                        <td><?= $contacto->getIdcontacto() ?></td>
                        <td><?= $contacto->getDescripcion() ?></td>
                        <td><?= $contacto->getTelefono() ?></td>
                        <td><a href="action_viewedit.php?id=<?= $contacto->getId() ?>">
                                Editar
                            </a>                   
                        </td>
                        <td>
                            <a href="action_viewdelete.php?id=<?= $contacto->getId() ?>">
                                Eliminar
                            </a>
                        </td>
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