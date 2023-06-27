<?php
class Conexion{
    public function conectar(){
        $conexion =  mysqli_connect("localhost", "root", "", "cortesias");
        return $conexion;
    }
}