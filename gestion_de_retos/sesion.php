<?php
   session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>
<body>
   
    <form method="POST">
       <label>Usuario <input type="text" name="usuario"></label><br> 
       <label>Password <input type="password" name="password"></label><br>
       <input type="submit" value="Iniciar sesión" name="btninicio">
    </form>

    <?php 
        include 'conexion.php';
        include 'proceso_de_sesion.php';  
    ?>
</body>
</html>