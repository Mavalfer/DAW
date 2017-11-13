<?php
require '../classes/AutoLoad.php';
$db = new DataBase();
$gestor = new ManageContacto($db);
$listaDeContactos = $gestor->getAll();
$action = Request::read('action');
$result = Request::read('r');
$mensaje = '';
if($action !== null) {
    switch ($action) {
        case 'borrar':
            if($result > 0){
                $mensaje = 'Borrado correctamente.';
            } else {
                $mensaje = 'NO se ha podido borrar.';
            }
            break;
        case 'editar':
            break;
        case 'insertar':
            break;
        default:
            $mensaje = 'No sé por qué he llagado aquí';
            break;
    }
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
        <h1>Gestión de contactos</h1>
        <h2><a href="action_viewinsert.php">insertar contacto</a></h2>
        <?php
        echo $mensaje;
        ?>
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
                foreach ($listaDeContactos as $key => $contacto) {
                    ?>
                    <tr>
                        <td><?php echo $contacto->getId(); ?></td>
                        <td><?= $contacto->getNombre() ?></td>
                        <!--<td>editar: enlace al archivo action_viewedit.php?id=ID</td>
                        <td>borrar: enlace al archivo action_viewdelete.php?id=ID</td>
                        en action_viewedit: mostrar un formulario prerelleno con
                        los datos del usuario para poder modificarlo
                        en action_viewdelete: ¿de verdad quieres borrar a NOMBRE?
                        -->
                        <td><a href="action_viewedit.php?id=<?= $contacto->getId() ?>">
                                Editar
                            </a>
                            <!--
                            Siempre hay que pasar como parámetro el valor de 
                            la clave principal.
                            -->
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