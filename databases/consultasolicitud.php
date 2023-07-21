<?php
// Paso 1: Validar el método de envío
require_once('conexion.php');
// $conexion2 = new Conexion;
// $sql = $conexion2->conectar2()->query("SELECT * FROM AFILIADOS");
// print_r($sql->fetch_assoc());
// exit;
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $response = array("success" => false, "message" => "Acceso denegado");
    echo json_encode($response);
    exit;
}
$conexion2 = new Conexion;
$sql = $conexion2->conectar()->query("SELECT * FROM cortesias_01 INNER JOIN afiliado_01 ON cortesias_01.Afiliado_id = afiliado_01.Id");
// print_r($sql->fetch_assoc());
$datos = array();
while ($fila = $sql->fetch_assoc()) {
    $datos[] = $fila;
}
// Codificar los datos en formato JSON
$json = json_encode($datos);
// Imprimir el resultado
echo $json;
