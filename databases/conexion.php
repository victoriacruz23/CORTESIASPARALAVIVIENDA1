<?php
$conexion =  mysqli_connect("localhost", "root", "", "cortesias");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}
   
?>