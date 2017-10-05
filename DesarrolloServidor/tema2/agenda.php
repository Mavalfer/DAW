
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        $nombre = $_POST['nombre'];
        echo $nombre . '<br>';
        foreach ($_POST['telefono'] as $key => $value) {
            echo $value . '<br>';
        }
        ?>
    </body>
</html>
