<?php

    class Procesos{

        public function mostrarDatos($sql)
        {
            $connect = new Conexion(); //Instaciamos un objeto de la clase Conexion
            $conexion = $connect->conectar();

            $resultado = mysqli_query($conexion, $sql);
        
            return mysqli_fetch_all($resultado, MYSQLI_ASSOC);      
        
        }

        public function anadirDatos($consulta)
        {
          $connect = new Conexion();
          $conexion = $connect->conectar();
          
          $resultado = mysqli_query($conexion, $consulta);
        }

        public function borrarDatos($delete)
        {
            $connect = new Conexion();
            $conexion = $connect->conectar();

            $resultrado = mysqli_query($conexion, $delete);
        }
    }
?>