<?php
    //session_start();

    if(!empty($_POST['btninicio']))
    {
        if (!empty($_POST['usuario']) && !empty($_POST['password']))
        {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];


            $connect = new Conexion();
            $conexion = $connect->conectar();

            $consulta = "SELECT * FROM usuario WHERE usuario = '$usuario' AND contrasenia = '$password'";

            $resultado = mysqli_query($conexion, $consulta);
            if($resultado->fetch_object())
            {
                header('Location: inicio.php');
                $_SESSION['id'] = $resultado[0];
                // $_SESSION['usuario'] = $usuario;
                // $_SESSION['id'] = $resultado->id;  
            }
            else{
                echo('Campos incorrectos');
            }


        } 
        else {
            echo('No se puede quedar ningun campo vacío');
        }
        
        // echo('Hola');
    }

?>