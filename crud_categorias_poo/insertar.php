<?php
    require_once('conexion.php');
    require_once('procesosdelcrud.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Añadir una categoría</title>
    </head>
    <body>
        <h1>Insertar nueva categoria</h1>
        <hr>
        <form action="insertar.php" method="POST">
            <label>Nombre de la categoria <input type="text" name="nombre"></label><br><br>
            <input type="submit" value="Añadir" name="btn">
        </form><br><br>
        <a href="index.php"><button>Volver a la lista</button></a>
    </body>
</html>

<?php

    if(isset($_POST['btn']))
    {
        $nombre = $_POST['nombre'];

        $objeto = new Procesos();

        $consulta = "INSERT INTO categorias (nombre) VALUES('$nombre')";
    
        $insertardatos = $objeto->anadirDatos($consulta);

        header('Location: index.php');
    }
    
?>