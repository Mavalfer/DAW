<?php
require '../classes/Autoload.php';

$idContacto = Request::read('id');

$db = new DataBase();

$gestor = new ManageContacto($db);

$contacto = $gestor->get($idContacto);

?>
<!doctype html>
<html>

<head></head>

<body>

    <?php

?>
</body>

</html>

<?php
$db->closeConnection();
?>