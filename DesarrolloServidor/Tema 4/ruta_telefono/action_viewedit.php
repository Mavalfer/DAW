<?php
require '../classes/AutoLoad.php';
$id = Request::read('id');
$db = new DataBase();
$gestor = new ManagerTelefono($db);
$telefono = $gestor->get($id);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Proyecto Agenda (bis)</title>
        <link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
        <h2>Editar telefono</h2>
        <form action="action_doedit.php" method="POST">
            <input type="text" value="<?php echo $telefono->getTelefono(); ?>" name="number" required/>
            <input type="text" value="<?php echo $telefono->getDescripcion; ?>" name="description" required/>
            <input type="hidden" value="<?php echo $telefono->getId(); ?>" name="id"/>
            <input type="hidden" value="<?php echo $telefono->getIdContacto(); ?>" name="idcontact"/>
            <input type="submit" name="edit" value="enviar"/>
        </form>
	</body>
</html>
<?php
$db->closeConnection();
?>