<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Insertar contacto</h1>
    <form action="action_doInsert.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre del contacto"/>
        <br>
        <input type="text" value="" name="number" placeholder="Numero de telefono" required>
        <br>
        <input type="text" value="" name="description" placeholder="Descripción" required>
        <br>
        <input type="submit" value="Submit"/>
    </form>
</body>
</html>