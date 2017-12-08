<?php
require'../classes/AutoLoad.php';

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

$offset = $rpp * ($page - 1);
//$rowcount = $rpp;
//$pages = ceil($rows / $rpp); //numero total de páginas



$sesion = new Session('agenda');
$usuario = $sesion->getUser();
if($usuario === null) {
    header('Location: ../index.php');
    exit;
}

$listaDeContactosTelefonos = $gestor->getAllLimitFromId($usuario->getId(), $pagination->getOffset(), $pagination->getRpp());
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
    <h1>Hola <?php echo $usuario->getCorreo(); ?></h1>
    <h2>Estos son tus contactos</h2>
    <table border="1">
            <thead>
                <tr>
                    <th>número</th>
                    <th>nombre</th>
                    <th>teléfono</th>
                    <th>descripción</th>
                    <th>borrar contacto</th>
                    <th>borrar telefono</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaDeContactosTelefonos as $key => $contactoTelefono) {
                    $contacto = $contactoTelefono['contacto'];
                    $telefono = $contactoTelefono['telefono'];
                    ?>
                    <tr>
                        <td><?= $key + $offset + 1 ?></td>
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
                                Eliminar contacto
                            </a>
                        </td>
                        
                        <td>
                            <a href="action_viewdelete.php?idcontacto=<?= $contacto->getId() ?>&idtelefono=<?= $telefono->getId() ?>">
                                <!--action_viewdelete.php?idcontacto=IDCONTACTO&idtelefono=IDTELEFONO-->
                                Eliminar telefono
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td colspan=6>
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
        <h3><a href="../views/viewEditUsuario.php">Editar tus datos</a></h3>
        <br>
        <h3><a href="../usuario/dologout.php">cerrar sesion</a></h3>
</body>
</html>
<?php $db->closeConnection(); ?>