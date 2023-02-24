<?php
    class Conexion{

        private $usuario = 'user2daw_17';
        private $clave = 'T7(Wz6(2ncL4';
        private $servidor = '2daw.esvirgua.com';
        private $basededatos = 'user2daw_BD2-17';


        public function conectar()
        {
            $conexion = mysqli_connect($this->servidor, $this->usuario, $this->clave, $this->basededatos);
            
            return $conexion;
        }

    }

?>