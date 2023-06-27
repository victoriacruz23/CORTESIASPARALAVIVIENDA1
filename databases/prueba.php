<?php
require_once ('conexion.php');
$consulta = new Conexion();
$conexion = $consulta->conectar();

$consulta1 = $conexion->query("SELECT * FROM rolperfil_01");

var_dump($consulta1->num_rows);