<?php
class Conexion{
    private $segundos;
    public function conectar(){
        $conexion =  mysqli_connect("localhost", "root", "", "cortesias");
        return $conexion;
    }
    public function conectar2(){    
        $conexion2= mysqli_connect("sql5c75f.carrierzone.com","industrial703811","Sec10042023+", "BDPV01_industrial703811");
        if (!$conexion2 ) {
            die("Error de conexión: " . mysqli_connect_error());
        }
        $conexion2->set_charset("utf8");
        return $conexion2;
    }

}