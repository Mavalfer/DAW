<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>dwes: proyecto agenda</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <!-- jumbotron -->
        <?php
        include '../template/header.html';
        require '../classes/AutoLoad.php';
        
        $r = Request::read('r');
        if ($r !== null) {
            echo '<h1 class="container">' . $r . ' Muy bien o no</h1>';
        }
        
        include '../template/bodycontacto.html';
        
        //lista de contactos
        $sql = 'select * from contacto order by nombre';
        $db = new DataBase();
        $res = $db->execute($sql);
        $sentencia = $db->getStatement();
        while($row = $sentencia->fetch()) {
            $contacto = new Contacto();
            $contacto->set($row);
            echo Util::varDump($contacto);
        }
        
        
        include '../template/footer.html';
        
        ?>
        <!-- jumbotron -->
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>