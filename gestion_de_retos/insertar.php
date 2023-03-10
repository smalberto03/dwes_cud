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
        <title>Insertar reto</title>
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
        <div id="contenedor">
            <img src="imagenes/imgmq.png" id="imgmq">
            <div id="ol">
                <img src="../assets/escuela.jpeg">
                <ol>
                    <li><a href="inicio.php">Lista de retos</a></li>
                    <li id="destacado">Añadir un reto</li>
                    <li>Modificar un reto</li>
                    <li>Borrar retos</li>
                </ol>
            </div>
            <div id="formulario">
                <form action="insertar.php" method="POST">
                    <label>Nombre: <input type="text" placeholder="Carrera se sacos" class="margen" name="nombre"></label><br><br>
                    <label>Dirigido a: <input type="text" placeholder="2DAW" id="short" class="margen" name="dirigido"></label><br><br>
                    <label>Descripcion: <br><br> <input type="textarea" placeholder="Puede no rellenarse" id="descripcion" name="descripcion"></label></label><br><br>
                    <label>Fecha incio inscripcion: <input type="date" class="margen" name="fiincripcion"></label> <label class="derecha">Fecha fin inscripcion <input type="date" placeholder="Puede no rellenarse" class="margen" name="ffincripcion"></label><br><br>
                    <label>Fecha de inicio del reto: <input type="date" class="margen" name="fireto"></label> <label class="derecha">Fecha de fin del reto <input type="date" class="margen" name="ffreto"></label><br><br>
                    <label>Fecha de publicacion: <input type="date" class = "margen" name="fechap"></label><br><br>
                    <label>Categoria: </label>
                    <select name="idcategoria" class="margen">
                        <?php
                            $objeto = new Procesos();

                            $consulta = "SELECT idcategoria, nombre FROM categorias";

                            $nombrecategoria = $objeto->mostrarDatos($consulta);

                            $contador = 1;

                            foreach($nombrecategoria as $valores)
                            {
                                echo('<option value ='.$valores['idcategoria'].'>'.$valores['nombre'].'</option>');
                                $contador = $contador + 1;
                            }
                        ?>
                    </select>
                    <label>Profesor: </label>
                    <select name="idprofesor" class="margen">
                        <?php
                            $objeto = new Procesos();

                            $consulta = "SELECT id, nombre FROM profesores";

                            $nombrecategoria = $objeto->mostrarDatos($consulta);

                            $contador = 1;

                            foreach($nombrecategoria as $valores)
                            {
                                echo('<option value ='.$valores['id'].'>'.$valores['nombre'].'</option>');
                                $contador = $contador + 1;
                            }
                        ?>
                    </select>
                    <input type="submit" value="INSERTAR RETO" name="btn">
                </form>
                <?php

                    if(isset($_POST['btn']))
                    {
                        if(empty($_POST['nombre']) || empty($_POST['dirigido']) || empty($_POST['fiincripcion']) || empty($_POST['ffincripcion']) || empty($_POST['fireto']) || empty($_POST['ffreto']) || empty($_POST['fechap']))
                        {
                            echo('<br><span class="rojo">¡UPS. ALGÚN CAMPO NO HA SIDO RELLENADO.!</span>');
                        }
                        else{

                            $nombre = $_POST['nombre'];
                            $dirigido = $_POST['dirigido'];
                            $descripcion = $_POST['descripcion'];
                            $fiinscripcion = $_POST['fiincripcion'];
                            $ffincripcion = $_POST['ffincripcion'];
                            $fireto = $_POST['fireto'];
                            $ffreto = $_POST['ffreto'];
                            $profesor = $_POST['idprofesor'];
                            $categoria = $_POST['idcategoria'];
                            $fechap = $_POST['fechap'];

                            $objeto = new Procesos();
                            
                            $consulta = "INSERT INTO retos (nombre, dirigido, descripcion, fechaInicioInscripcion, fechaFinInscripcion,
                            fechaInicioReto, fechFinReto, fechaPublicacion, idProfesor, idCategoria) VALUES('$nombre', '$dirigido', '$descripcion', '$fiinscripcion', '$ffincripcion', 
                            '$fireto', '$ffreto', '$fechap', '$profesor', '$categoria')"; //Tengo que cambiar los valorers por los que salen delv formulario 


                            $insertardatos = $objeto->anadirDatos($consulta);

                            header('Location: inicio.php');
                        }

                    }
                ?>
            </div>
        </div>
    </body> 
</html>
