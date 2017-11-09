<?php
require '../classes/AutoLoad.php';
$db = new DataBase();
$gestor = new ManagerTelefono($db);
$telefonos = $gestor->getAll();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Proyecto Agenda (bis)</title>
        <link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
        <h1>Gestión de telefonos</h1>
        <div class="cosa">
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Id Contacto</th>
                    <th>Numero</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
        <?php
        // Listado de contactos
        foreach($telefonos as $key => $phone){
            ?>
                <tr>
                    <td><?php echo $phone->getId(); ?></td>
                    <td><?php echo $phone->getIdContacto(); ?></td>
                    <td><?php echo $phone->getTelefono(); ?></td>
                    <td><?php echo $phone->getDescripcion(); ?></td>
                    <td><a href="action_viewedit.php?number=<?php echo $phone->getTelefono(); ?>&description=<?php echo $phone->getDescripcion(); ?>&id=<?php echo $phone->getId(); ?>&idcontact=<?php echo $phone->getIdContacto(); ?>">Editar</a></td>
                    <td><a href="action_viewdelete.php?description=<?php echo $phone->getDescripcion(); ?>&id=<?php echo $phone->getId(); ?>">Borrar</a></td>
                </tr>
            <?php
        }
        ?>
                </tbody>
        </table>
        <br>
        <a href="./action_viewinsert.php">Insertar telefono</a>
        </div>
	</body>
</html>
<?php
$db->closeConnection();
?>