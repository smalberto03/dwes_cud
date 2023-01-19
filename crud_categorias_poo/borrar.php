<?php
    require_once('conexion.php');
    require_once('procesosdelcrud.php');

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $objeto = new Procesos();

        $delete = "DELETE FROM categorias WHERE idcategoria = $id";

        $eliminar = $objeto->borrarDatos($delete);

        header('Location: index.php');
    }
?>