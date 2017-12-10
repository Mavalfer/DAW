<?php
require'../classes/AutoLoad.php';

$sesion = new Session('agenda');
$usuario = $sesion->getUser();
if($usuario === null) {
    header('Location: ../index.php');
    exit;
}

$db = new DataBase();

$gestor = new ManageContactoTelefono($db);
$rows = $gestor->count();

$opt = Request::read('opt');
$opt2 = Request::read('telborrados');
$opt3 = Request::read('contborrado');

$page = Request::read('page');
if($page === null) {
    $page = 1;
}
$rpp = 2;
$pagination = new Pagination($rows, $page, $rpp);

$offset = $rpp * ($page - 1);

if ($opt === 'editado') {
    echo '<h1>Contacto editado</h1>';
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
                        <td><a href="../views/viewEditContactos.php?idcontacto=<?php echo $contacto->getId();?>&ncontacto=<?php echo $contacto->getNombre();?>"><?= $contacto->getNombre() ?></a></td>
                        <td><a href="../views/viewEditTelefonos.php?idtelefono=<?php echo $telefono->getId();?>&idcontacto=<?php echo $contacto->getId();?>&dtelefono=<?php echo $telefono->getDescripcion();?>&ncontacto=<?php echo $contacto->getNombre();?>"><?= $telefono->getTelefono() ?></a></td>
                        <td><?= $telefono->getDescripcion() ?></td>
                        <td>
                            <a href="../views/viewDeleteContactos.php?idcontacto=<?= $contacto->getId() ?>">
                                Eliminar contacto
                            </a>
                        </td>
                        
                        <td>
                            <a href="../views/viewDeleteTelefono.php?idtelefono=<?= $telefono->getId() ?>">
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
        <h3><a href="viewAddContacto.php">Añadir contacto</a></h3>
        <br>
        <h3><a href="../views/viewEditUsuario.php">Editar tus datos</a></h3>
        <br>
        <h3><a href="../usuario/dologout.php">cerrar sesion</a></h3>
        <br>
        <span>
        <?php 
            if ($opt === 'editado') {
                echo '<h1>Contacto editado</h1>';
            }
            
            if ($opt === 'editadotel') {
                echo '<h1>Telefono editado</h1>';
            }
            
            if ($opt === 'borrarcontacto') {
                echo '<h1>Borrados ' . $opt2 . ' telefonos y ' . $opt3 . ' contacto' . '</h1>';
            }
            
            if ($opt === 'borrartelefono') {
                echo '<h1>Borrado ' . $opt2 . ' telefono' . '</h1>';
            }
        ?>
</body>
</html>
<?php $db->closeConnection(); ?>