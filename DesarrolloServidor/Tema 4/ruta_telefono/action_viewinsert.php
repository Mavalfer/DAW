<?php
require '../classes/AutoLoad.php';
$db = new DataBase();
$gestorContact = new ManagerContacto($db);
$gestorTelefono = new ManagerTelefono($db);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Proyecto Agenda (bis)</title>
        <link rel="stylesheet" href="../css/style.css">
	</head>
	<body>
        <h2>Insertar telefono.</h2>
        <form action="action_doinsert.php" method="POST">
            <input type="text" value="" name="number" placeholder="Numero de telefono" required>
            <input type="text" value="" name="description" placeholder="Descripción" required>
            <?php echo Util::selector($gestorContact->getDataForSelect()); ?>
            <input type="submit" name="insert" value="Insertar">
        </form>
	</body>
</html>
<?php
$db->closeConnection();
?>