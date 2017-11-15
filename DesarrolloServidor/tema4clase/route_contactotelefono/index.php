<?php
require '../classes/AutoLoad.php';
$db = new DataBase();

$gestor = new ManageContactoTelefono($db);
$rows = $gestor->count();

$action = Request::read('action');
$result = Request::read('r');

$page = Request::read('page');//página actual
if($page === null) {
    $page = 1;
}
$rpp = 2;
$pagination = new Pagination($rows, $page, $rpp);

//$offset = $rpp * ($page - 1);
//$rowcount = $rpp;
//$pages = ceil($rows / $rpp); //numero total de páginas

$listaDeContactosTelefonos = $gestor->getAllLimit($pagination->getOffset(), $pagination->getRpp());
$sesion = new Session('sesion');
$user = $sesion->getUser();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Gestión integral de contactos y sus teléfonos</h1>
        <h2><?php if($user === null){echo "No eres nadie";} else {echo 'Eres ' . $user->getUsuario();} ?></h2>
        <h3><a href="../route_user/actiondologon.php">Cerrar sesión</a></h3>
        <h2><a href="action_viewinsert.php">insertar contacto</a></h2>
        <table border="1">
            <thead>
                <tr>
                    <th>número</th>
                    <th>nombre</th>
                    <th>teléfono</th>
                    <th>descripción</th>
                    <!--<th>...</th>-->
                    <th>...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaDeContactosTelefonos as $key => $contactoTelefono) {
                    $contacto = $contactoTelefono['contacto'];
                    $telefono = $contactoTelefono['telefono'];
                    ?>
                    <tr>
                        <td><?= $key + $offset ?></td>
                        <td><a href="action_vieweditcontacto.php?idcontacto=<?php echo $contacto->getId();?>"><?= $contacto->getNombre() ?></a></td>
                        <td><a href="action_viewedittelefono.php?idtelefono=<?php echo $telefono->getId();?>"><?= $telefono->getTelefono() ?></a></td>
                        <td><?= $telefono->getDescripcion() ?></td>

                        <!--<td>
                            <a href="action_viewedit.php?id=< ?= $contacto->getId() ?>">
                                Editar
                            </a>
                        </td>-->
                        <td>
                            <a href="action_viewdelete.php?idcontacto=<?= $contacto->getId() ?>&idtelefono=<?= $telefono->getId() ?>">
                                <!--action_viewdelete.php?idcontacto=IDCONTACTO&idtelefono=IDTELEFONO-->
                                Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td colspan=5>
                        <a href='?page=1'>&lt;&lt;</a>
                        <a href='?page=<?php echo $pagination->previous(); ?>'>&lt;</a>
                        <?php
                        $rango = $pagination->getRange();
                        foreach($rango as $pagina){
                            echo '<a href="?page=' . $pagina . '">' . $pagina . '</a> ';
                        }
                        ?>
                        <a href='?page=<?php echo $pagination->next(); ?>'>&gt;</a>
                        <a href='?page=<?php echo $pagination->last() ?>'>&gt;&gt;</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
<?php
$db->closeConnection();