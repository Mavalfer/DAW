<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1>INSERTAR Telefono</h1>
        <form action="action_doinsert.php" method="POST">
            <input type="text" name="idcontacto" value="" placeholder="idcontacto"/>
            <!-- DESPUES HAREMOS UN SELECT -->
            <br>
            <input type="text" name="telefono" value="" placeholder="telefono"/>
            <br>
            <input type="text" name="descripcion" value="" placeholder="descripcion"/>
            <br>
            <input type="submit" value="Insertar"/>
        </form>
    </body>
</html>