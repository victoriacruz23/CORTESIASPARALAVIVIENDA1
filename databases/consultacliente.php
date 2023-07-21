<?php
// Paso 1: Validar el método de envío
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $response = array("success" => false, "message" => "Acceso denegado");
    echo json_encode($response);
    exit;
}
require_once('conexion.php');
// Obtener el valor de la referencia enviada por el cliente
$dato = isset($_POST['referencia']) ? $_POST['referencia'] : null;

if ($dato === null) {
    $response = array("success" => false, "message" => "Referencia no recibida");
    echo json_encode($response);
    exit;
}

$conexion2 = new Conexion;
$sql = $conexion2->conectar2()->query("SELECT * FROM AFILIADOS WHERE REFERENCIA_AFI = '$dato'");
// print_r($sql->fetch_assoc());
$datos = array();
while ($fila = $sql->fetch_assoc()) {
    $datos[] = $fila;
}
// Codificar los datos en formato JSON
$json = json_encode($datos);
// Imprimir el resultado
echo $json;
