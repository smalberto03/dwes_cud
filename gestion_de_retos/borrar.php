<?php
    require_once('conexion.php'); //Esto llama al archivo de conexion ya que lo vamos a usar, en casonde fallo devuelbe un error fatal
    require_once('procesosdelcrudretos.php');

    if(isset($_GET['id']))//Si existe el array con el dato que nos traemos desde url por eso usamos el metodo GET
    {
        $id = $_GET['id']; //Lo guardamos en una variable

        $objeto = new Procesos(); //Creamos un objeto de la clase procesos

        $delete = "DELETE FROM retos WHERE id = $id";

        $eliminar = $objeto->borrarDatos($delete); //En la variable guardamos que el objeto llama al metodo borrarDatos y le pasamos la consulta
    
        header('Location: inicio.php');
    }

?>