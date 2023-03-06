<?php
    class Procesos{

        public function mostrarDatos($consulta)
        {
            $connect = new Conexion();
            $conexion = $connect->conectar();

            $resultado = mysqli_query($conexion, $consulta);

            return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
        }

        public function anadirDatos($consulta)
        {
            $connect = new Conexion();
            $conexion = $connect->conectar();

            $result = mysqli_query($conexion, $consulta);
        }

        public function borrarDatos($delete)
        {
            $connect = new Conexion();
            $conexion = $connect->conectar();

            $result = mysqli_query($conexion, $delete);
        }
    }
?>