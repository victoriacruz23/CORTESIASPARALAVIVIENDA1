<?php
require_once("conexion.php");

// Validar el método de solicitud
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response = array("success" => false, "message" => "Acceso denegado");
    echo json_encode($response);
    exit();
}

// Recibir los datos enviados desde JavaScript
$data = json_decode(file_get_contents('php://input'), true);

$REFERENCIA_AFI = $data["REFERENCIA_AFI"];
$REFERENCIA_AH = $data["REFERENCIA_AH"];
$PATERNO = $data["PATERNO"];
$MATERNO = $data["MATERNO"];
$NOMBRES = $data["NOMBRES"];
$SEXO = $data["SEXO"];
$CORREO = $data['CORREO'];
$MUNICIPIO = $data['MUNICIPIO'];
$SALDO = $data['SALDO'];

// Insertar los datos en la base de datos
$conexion = new Conexion();

// Verificar si el afiliado ya existe por medio de la REFERENCIA_AFI
$sql_check = $conexion->conectar()->query("SELECT * FROM afiliado_01 WHERE REFERENCIA_AFI = '$REFERENCIA_AFI'");
if ($sql_check->num_rows == 0) {
    // No existe un afiliado con la misma REFERENCIA_AFI, proceder con la inserción
    $sql_insert = $conexion->conectar()->query("INSERT INTO afiliado_01(REFERENCIA_AFI, REFERENCIA_AH, PATERNO, MATERNO, NOMBRES, SEXO, CORREO, MUNICIPIO, SALDO) VALUES ('$REFERENCIA_AFI', '$REFERENCIA_AH', '$PATERNO', '$MATERNO', '$NOMBRES', '$SEXO', '$CORREO', '$MUNICIPIO', '$SALDO')");

    // Verificar si la inserción fue exitosa y responder en consecuencia
    if ($sql_insert) {
        $response = array("success" => true, "message" => "Afiliado insertado correctamente");
        echo json_encode($response);
    } else {
        $response = array("success" => false, "message" => "Error al insertar el afiliado");
        echo json_encode($response);
    }
}
