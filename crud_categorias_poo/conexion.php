<?php

    class Conexion{

        private $usuario = 'user2daw_17';
        private $clave = 'T7(Wz6(2ncL4';
        private $servidor = '2daw.esvirgua.com';
        private $basededatos = 'user2daw_BD2-17';

        public function conectar() //Método de la clase Coenxion que conecta con la base de datos
        {
            $conexion = mysqli_connect($this->servidor, $this->usuario, $this->clave, $this->basededatos); //Con $this->... hacemos referencia a un atributo de la misma clase

            return $conexion;
        }
    }

    
    /*
    $objeto = new Conexion(); //Creamos un objeto y le decimos que es de la clase conexion

    if($objeto->conectar()) //LLamamos al metodo de la clase con ese objeto, si se produce la conexion todo ha ido bien
    {
        echo('Todo ha ido bien');
    }
    else{
        echo('Algo salió mal');
    }
    */
?>