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
        <input type="text" name="nombre"/>
        <input type="submit" value="Submit"/>
        <input type="text" value="" name="number" placeholder="Numero de telefono" required>
        <input type="text" value="" name="description" placeholder="Descripción" required>
    </form>
</body>
</html>