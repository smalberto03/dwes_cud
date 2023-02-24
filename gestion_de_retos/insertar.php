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
        <title>Insertar reto</title>
    </head>
    <body>
        <form action="insertar.php" method="POST">
            <label>Nombre: <input type="text" placeholder="Carrera se sacos" class="margen" name="nombre"></label><br><br>
            <label>Dirigido a: <input type="text" placeholder="2DAW" id="short" class="margen" name="dirigido"></label><br><br>
            <label>Descripcion: <br><br> <input type="textarea" placeholder="Puede no rellenarse" id="descripcion" name="descripcion"></label></label><br><br>
            <label>Fecha incio inscripcion: <input type="date" class="margen" name="fiincripcion"></label> <label class="derecha">Fecha fin inscripcion <input type="date" placeholder="Puede no rellenarse" class="margen" name="ffincripcion"></label><br><br>
            <label>Fecha de inicio del reto: <input type="date" class="margen" name="fireto"></label> <label class="derecha">Fecha de fin del reto <input type="date" class="margen" name="ffreto"></label><br><br>
            <label>Fecha de publicacion: <input type="date" class = "margen" name="fechap"></label>
            <label>Categoria: </label>
            <select>
                <?php
                    $objeto = new Procesos();

                    $consulta = "SELECT idcategoria, nombre FROM categorias";

                    $nombrecategoria = $objeto->mostrarDatos($consulta);

                    $contador = 1;

                    foreach($nombrecategoria as $valores)
                    {
                        echo('<option value ='.$contador.'>'.$valores['id'].' '.$valores['nombre'].'</option>');
                        $contador = $contador + 1;
                    }
                ?>
            </select>
            <label>Profesor: </label>
            <select>
                <?php
                    $objeto = new Procesos();

                    $consulta = "SELECT id, nombre FROM profesores";

                    $nombrecategoria = $objeto->mostrarDatos($consulta);

                    $contador = 1;

                    foreach($nombrecategoria as $valores)
                    {
                        echo('<option value ='.$contador.'>'.$valores['id'].' '.$valores['nombre'].'</option>');
                        $contador = $contador + 1;
                    }
                ?>
            </select>
            <input type="submit" value="INSERTAR RETO">
        </form>
    </body>
</html>
<?php

    $nombre = $_POST['nombre'];
    $dirigido = $_POST['dirigido'];
    $descripcion = $_POST['descripcion'];
    $fiinscripcion = $_POST['fiincripcion'];
    $ffincripcion = $_POST['ffincripcion'];
    $fireto = $_POST['fireto'];
    $ffreto = $_POST['ffreto'];
    $profesor = $_POST[$valores['id']];
    $categoria = $_POST[$valores['id']];
    $fechap = $_POST['fechap'];
    
    $consulta = "INSERT INTO retos (nombre, dirigido, descripcion, fechaInicioInscripcion, 
    fechaInicioReto, fechFinReto, fechaPublicacion, idProfesor, idCategoria) VALUES('$nombre', '$dirigido', '$descripcion', '$fiinscripcion', '$ffincripcion', 
    '$fireto', '$ffreto', '$fechap', '$profesor', '$categoria')"; //Tengo que cambiar los valorers por los que salen delv formulario 

    $objeto = new Procesos();

    $insertardatos = $objeto->anadirDatos($consulta);
?>