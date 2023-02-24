<?php 
    require_once('conexion.php');
    require_once('procesosdelcrudretos.php');
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
                <li>Categorías</li>
                <li id="reto">Retos</li>
                <li>Alumnos</li>
                <li>Equipos</li>
            </ul>
        </nav>
        <h1>Lista de retos</h1>

        <?php

            $objeto = new Procesos();

            $consulta = "SELECT retos.nombre as nombrereto, dirigido, descripcion, fechaInicioInscripcion, fechaFinInscripcion, fechaInicioReto, fechFinReto, profesores.nombre
                         FROM retos INNER JOIN profesores ON retos.idProfesor = profesores.id";

            $datos = $objeto->mostrarDatos($consulta);

            if(empty($datos))
            {
                echo('No ningun reto aun');
            }
            else
            {
                foreach($datos as $valor)
                {
                    echo('<div><p>Nombre del reto: '.$valor['nombrereto'].'</p><p>Dirigido a: '.$valor['dirigido'].'</p><p>Descripcion: '.$valor['descripcion'].'</p><p>Fecha inicio inscripcion: '.$valor['fechaInicioInscripcion'].'
                         '.$valor['fechaFinInscripcion'].'</p><p>'.$valor['fechaInicioReto'].''.$valor['fechFinReto'].'</p><p>'.$valor['fechFinReto'].'</p><p>Profesor: '.$valor['nombre'].'</p></div>');
                }
            }
        ?> 
    </body>
 </html>