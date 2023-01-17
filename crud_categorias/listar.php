<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de categorías</title>
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
            include('conexion.php');//Inclu9imos la conexio de base de datos

            $consulta = "SELECT * FROM categorias";

            $resultado = $conexion->query($consulta);

            /*while($categorias = $resultado->fetch_assoc())//fetch_assoc es un metodo que convierte los datos que se devuelben de la cponsulta en un array por fila
            {
                echo('<tr><td>'.$categorias["idcategoria"].'</td><td>'.$categorias["nombre"].'</td></tr>');//Le dicemos que vaya mostrando los datos en una misma fola pero en diferentes celdas
            }*/

            
            while($categorias = $resultado->fetch_assoc())//fetch_assoc es un metodo que convierte los datos que se devuelben de la cponsulta en un array por fila
            {
                echo('<tr><td>'.$categorias["idcategoria"].'</td><td>'.$categorias["nombre"].'</td><td><a href="borrar.php?id='.$categorias["idcategoria"].'"><img src="borrar.png"></a></td></tr>');//Le dicemos que vaya mostrando los datos en una misma fola pero en diferentes celdas
            }
            
            /*Para el proceso de borrar hay que ponerle un icono a cada fila pasandole por url el dato id con href=(archivo donde se borra.php).?id='$categoria["$id"].'*/
        ?>
    </table>
    <a href="insertar.php"><button>Insertar categoria</button></a>
</body>
</html>