<?php
    require_once('conexion.php');
    require_once('procesosdelcrud.php');

    $nombre = $_POST['nombre'];
    $id = $_POST['id'];

    $datos = array($nombre, $id);

    $obj = new Procesos();

    if($obj->modificarDatos($datos)==1){
        header('Location: index.php');
    }else{
        echo('No se puedo modificar l acategoria correctamente');
    }

?>