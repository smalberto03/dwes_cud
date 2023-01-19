<?php
    require_once ('conexion.php');
    require_once ('procesosdelcrud.php');

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de categorías</title>
        <link href="style.css">
    </head>
    <body>
        <h1>Lista de categorias</h1>
        <table>
            <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>Procesos</td>
            </tr>
            <?php
                $objeto = new Procesos();

                $sql = "SELECT * FROM categorias";

                $datos = $objeto->mostrarDatos($sql);

                foreach($datos as $clave)
                {
                    echo('<tr><td>'.$clave['idcategoria'].'</td><td>'.$clave['nombre'].'</td>
                          <td><a href="borrar.php?id='.$clave['idcategoria'].'"><img src="borrar.png"></a></td></tr>');
                }
            ?>
        </table><br><br><br<br>
        <a href="insertar.php"><button>Insertar categoria</button></a>
    <body>
</html>
    