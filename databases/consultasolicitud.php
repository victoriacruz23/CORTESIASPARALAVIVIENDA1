<?php
session_start();
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
// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['datosuser'])) {
    $ID_user = $_SESSION['datosuser']['id'];
    switch ($_SESSION['datosuser']['perfil']) {
        case 1:
            $sql = $conexion2->conectar()->query("SELECT cortesias_01.*, afiliado_01.REFERENCIA_AFI, afiliado_01.REFERENCIA_AH, afiliado_01.PATERNO, afiliado_01.MATERNO, afiliado_01.NOMBRES, afiliado_01.SEXO, afiliado_01.CORREO, afiliado_01.MUNICIPIO, afiliado_01.SALDO FROM cortesias_01 INNER JOIN afiliado_01 ON cortesias_01.Afiliado_id = afiliado_01.Id WHERE cortesias_01.Usuario_id = $ID_user");
            break;
        case 2:
            $sql = $conexion2->conectar()->query("SELECT cortesias_01.*, afiliado_01.REFERENCIA_AFI, afiliado_01.REFERENCIA_AH, afiliado_01.PATERNO, afiliado_01.MATERNO, afiliado_01.NOMBRES, afiliado_01.SEXO, afiliado_01.CORREO, afiliado_01.MUNICIPIO, afiliado_01.SALDO FROM cortesias_01 INNER JOIN afiliado_01 ON cortesias_01.Afiliado_id = afiliado_01.Id");
            break;
        default:
            $response = array("success" => false, "message" => "Existio un error");
            echo json_encode($response);
            exit;
            break;
    }
}

$datos = array();
while ($fila = $sql->fetch_assoc()) {
    $datos[] = $fila;
}
// Codificar los datos en formato JSON
$json = json_encode($datos);
// Imprimir el resultado
echo $json;
