<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Insertar categoría</title>
    </head>
    <body>
        <form action="insertar.php" method="POST"><!--Tenemos un formulario de donde se van a introducir los datos
        para ello hay que ponerle un "name" a todos los inputs del formulario (debe ser un "name" significativo)
        También hay que poner en la cabecera del form el "action" (donde se van a tratar los datos del formulario)
        y el "method" (Metodo por el cual se van a enviar los datos, el más reconmendable y seguro es el m etodo POST)-->
            <label>Id <input type="number" name="id"></label>
            <label>Nombre de la categoria <input type="text" name="nombre"></label> 
            <input type="submit" value="Aceptar" name="btn">
        </form>
    </body>
    <?php
        include('conexion.php'); //Incluimos los datos de conexion

        if(isset($_POST["btn"])) //Si existe el boton tipo submit que manda el array $_POST[] con los datos introducidos en el formulario
        {
            /*Creamos las variables donde vamos a guardar el dato sacado de cada campo, mediante $_POST["name" que le hayas puesto en el formulario]*/
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];

            $consulta = "INSERT INTO categorias(idcategoria, nombre) VALUES ('$id', '$nombre')"; //Realizamos la consulta

            $conexion->query($consulta);

            header('Location: listar.php');
        }
    ?>
</html>
