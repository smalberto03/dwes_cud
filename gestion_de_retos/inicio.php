<?php 
    session_start();
    require_once('conexion.php');
    require_once('procesosdelcrudretos.php');
    require_once('proceso_de_sesion.php');

    if(!empty($_SESSION['id']))
    {
        header('Location: sesion.php');
    }
 ?>
 <!DOCTYPE html>
 <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Lista de retos</title>
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="../gestion_de_categorias/index.php">Categorías</a></li>
                <li id="reto">Retos</li>
                <li>Alumnos</li>
                <li>Equipos</li>
                <li><a href="salir_sesion.php">Salir</li>
            </ul>
        </nav>
        <?php
            if(isset($_GET['id']))
            {
                echo '<h1>¿Seguro que quiere eliminar este reto?</h1>
                <a href="borrar.php?id='.$_GET['id'].'">Sí</a>
                <a href="inicio.php">No</a>';
            }
        ?>
        <div id="contenedor">
            <div id="ol">
                <img src="../assets/escuela.jpeg">
                <ol>
                    <li id="destacado">Lista de retos</li>
                    <li><a href="insertar.php">Añadir un reto</a></li>
                    <li>Modificar un reto</li>
                    <li>Borrar retos</li>
                </ol>
            </div>
            <?php

                $objeto = new Procesos();

                $consulta = "SELECT retos.id as id, retos.nombre as nombrereto, dirigido, descripcion, fechaInicioInscripcion, fechaFinInscripcion, fechaInicioReto, fechFinReto, profesores.nombre, categorias.nombre as ncategoria
                            FROM retos INNER JOIN profesores ON retos.idProfesor = profesores.id
                            INNER JOIN categorias ON retos.idCategoria = categorias.idcategoria";

                $datos = $objeto->mostrarDatos($consulta);

                if(empty($datos))
                {
                    echo('No ningun reto aun');
                }
                else
                {
                    foreach($datos as $valor)
                    {
                        echo('<div id="divretos"><p>Nombre del reto: '.$valor['nombrereto'].'</p><p>Dirigido a: '.$valor['dirigido'].'</p><p>Descripcion: '.$valor['descripcion'].'</p><p>Fecha inicio inscripcion: '.$valor['fechaInicioInscripcion'].'
                            '.$valor['fechaFinInscripcion'].'</p><p>'.$valor['fechaInicioReto'].''.$valor['fechFinReto'].'</p><p>'.$valor['fechFinReto'].'</p><p>Profesor: '.$valor['nombre'].'</p><p>Categoria: '.$valor['ncategoria'].'<br>
                            <a href="inicio.php?id='.$valor['id'].'&nombrereto ='.$valor['nombrereto'].'"><img src="../assets/borrar.png" id="imgborrar"></a></div>');
                    }
                }
            ?>
            <br><br><a href="exportar.php">Exportar a pdf</a>
        </div>
    </body>
 </html>