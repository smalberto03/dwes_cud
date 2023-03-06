<?php 

    //Vamos a inicializar el buffer ya que vamosa  guaradr todo el html en una vaeiable
    // para luego mostratla en un pdf graciuas a la libreria dompdf
    ob_start();



    require_once('conexion.php');
    require_once('procesosdelcrudretos.php');

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
                '.$valor['fechaFinInscripcion'].'</p><p>'.$valor['fechaInicioReto'].''.$valor['fechFinReto'].'</p><p>'.$valor['fechFinReto'].'</p><p>Profesor: '.$valor['nombre'].'</p><p>Categoria: '.$valor['ncategoria'].'</div><br><br>');
        }
    }





    $html = ob_get_clean(); //Esttamso sacando todo este arciuvo y guardandoilo en una variable
    //echo($html);


    // Vamos a usar los metodos para gestionar el documnento pdf que vamos a generar
    // cpn la libreria dompdf

    require_once('libreria/autoload.inc.php'); //LLamamos al archvo que carga la libreria

    use Dompdf\Dompdf;
    $dompdf = new Dompdf(); //Cremoa sel objero de la clse Dompdf para usar sus metodos y atributos

    //Gestion de imagenes
    /*
    $options = $dompdf->getOptions();
    $options = set(array('isRemoteEnabled'=> true));
    $dompdf->setOptions($options);
    */    

    $dompdf->loadHtml($html); //Cargamos el html qie queramos y que se mostrará en el pdf
    $dompdf->setPaper('letter'); //Elegimos en que formato que quermeos el pfd puede ser tipo carta, A4, selecionando el ancho de la página ...
    $dompdf->render();
    $dompdf->stream("retos.pdf", array("Attachment" => true)); // Esta linea de codigo usa el metodo stream() donde podemos configuar el nombre del fichero pdf y elegir si este se descarga automaticamnete en el ordenasdor del cliente o si ese abre en una pestaña nueva
    //En mi caso el nombre que le hge puesto ha sido retos.pdf y si el siguiente vakor lo pongo a true porque qiuero que se descargue el archivo, para que no lo haga ponemos false 




 ?>

