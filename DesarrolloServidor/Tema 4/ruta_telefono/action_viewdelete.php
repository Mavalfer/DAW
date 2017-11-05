<?php
require '../classes/AutoLoad.php';
$db = new DataBase();
$gestor = new ManagerTelefono($db);
$id = Request::read('id');

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
        <h1>¿Borrar contacto? <?php echo $telefono->getTelefono(); ?></h1>
        <a href="action_dodelete.php?id=<?php echo $telefono->getId(); ?>">Si</a>
        <a href="index.php">No</a>
	</body>
</html>
<?php
$db->closeConnection();
?>