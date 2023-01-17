<?php //Le pasamos mediante url el valor del id que se quiere borrar. Lo hacemos cuando ponemos el icono de la papelera en listar.php
    include('conexion.php'); //Incluimos la conexión 


    if(isset($_GET["id"]))/*Si existe el id que se manda. Se pasa por URL por eso usamos el método GET*/
    {
        $id = $_GET["id"];

        $borrar = "DELETE FROM categorias WHERE idcategoria = $id";

        $conexion->query($borrar);
    }

    header('Location: listar.php')
?>