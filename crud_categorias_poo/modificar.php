<?php
    require_once('conexion.php');
    require_once('procesosdelcrud.php');

    
    $objeto = new Conexion();
    $conexion = $objeto->conectar();

    $id = $_GET['id'];
    $consulta = "SELECT nombre from categorias WHERE idcategoria = $id";

    $resultado = mysqli_query($conexion, $consulta);
    $mostrar = mysqli_fetch_row($resultado);
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar una categoría</title>
    </head>
    <body>
        <h1>Modificar una categoria</h1>
        <hr>
        <form action="update.php" method="POST">
            <input type="text" hidden="" value="<?php echo($id); ?>" name="id">
            <label>Nombre de la categoria <input type="text" name="nombre" value="<?php echo($mostrar[0]);?>"></label><br><br>
            <input type="submit" value="Modificar" name="btn">
        </form><br><br>
        <a href="index.php"><button>Volver a la lista</button></a>
    </body>
</html>