<?php

    $usuario = 'user2daw_17';
    $clave = 'T7(Wz6(2ncL4';
    $servidor = '2daw.esvirgua.com';
    $basededatos = 'user2daw_BD2-17';

    $conexion = new mysqli($servidor, $usuario, $clave, $basededatos); /*Estamos creando un objeto de la clase mysqli*/


    //Para saber si tenemos un error de conexion
    if($conexion->connect_errno) //connect_error devuelve el error de la ultima conexion
    {
        echo('Hubo un fallo en la conexion con la base de datos');
        $conexion->connect_error;
    }
?>