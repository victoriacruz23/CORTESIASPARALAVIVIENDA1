<?php
session_start();
require_once("conexion.php");

// Validar el método de solicitud
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response = array("success" => false, "message" => "Acceso denegado");
    echo json_encode($response);
    exit();
}
$clientereferencia = $_POST["clientereferencia"];
$descripcion = $_POST["descripcion"];
$montocompleto = $_POST["montocompleto"];
$montodescuento = $_POST["montodescuento"];
$cortesia = $_POST["cortesia"];
if ($cortesia == 1) {
    $montopagar = $montocompleto - ($montodescuento * $montocompleto / 100);
} else if ($cortesia == 2) {
    $montopagar = 0;
} else if ($cortesia == 3) {
    $montopagar = $montocompleto;
} else {
    $montopagar = $montocompleto;
}
// Insertar los datos en la base de datos
$conexion = new Conexion();

// Verificar si el afiliado ya existe por medio de la REFERENCIA_AFI
$sql_check = $conexion->conectar()->query("SELECT * FROM afiliado_01 WHERE REFERENCIA_AFI = '$clientereferencia'");
if ($sql_check->num_rows == 1) {
    $row = $sql_check->fetch_assoc();
    $id_asesor = $_SESSION['datosuser']["id"];
    $id_afiliado = $row["Id"];
    $sql_insert = $conexion->conectar()->query("INSERT INTO cortesias_01(Usuario_id, Afiliado_id, Referenciacliente, Monto_total, Monto_pagar, Porcentaje_descueto, Tipo_cortesia, Descripcion) VALUES ('$id_asesor','$id_afiliado','$clientereferencia','$montocompleto',$montopagar,'$montodescuento','$cortesia','$descripcion')");
    if ($sql_insert) {
        $response = array("success" => true, "message" => "Solicitud registrada con exito");
        echo json_encode($response);
    } else {
        $response = array("success" => false, "message" => "Error al registras la solicitud");
        echo json_encode($response);
    }
}
