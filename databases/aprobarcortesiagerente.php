<?php

// Paso 1: Validar el método de envío
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response = array("success" => false, "message" => "Acceso denegado");
    echo json_encode($response);
    exit;
}

require_once("conexion.php");
$conex = new Conexion();
// Obtener los datos enviados desde JavaScript
$datos = json_decode(file_get_contents('php://input'), true);

// Acceder a los valores del pago y el ID
$estado = $datos['estado'];
$id = $datos['id'];
// Validar los datos de entrada
if (!is_numeric($estado) || !is_numeric($id)) {
    $response = array("success" => false, "message" => "Datos inválidos");
    echo json_encode($response);
    exit;
}
try {
    // Consulta preparada para obtener el curso por orden_id
    $consulta = $conex->conectar()->query("SELECT * FROM cortesias_01 WHERE Id = '$id'");

    if ($consulta->num_rows) {
        // Sentencia preparada para actualizar el estado de autorización del curso
        // Asignar el valor contrario según el dato recibido
        $valor = ($estado == 0) ? 1 : (($estado == 1) ? 2 : $estado);
        $mensaje = ($estado == 1) ? "Se aprobó la cortesia correctamente" : (($estado == 2) ? "Se desaprobó la cortesia correctamente" : (($estado == 3) ? "Se cancelo la cortesia correctamente" : "Se cancelo la cortesia correctamente"));
        $actualizar = $conex->conectar()->query("UPDATE cortesias_01 SET Estado = '$valor' WHERE Id = '$id'");
        // Comprobar el número de filas afectadas por la actualización
        if ($actualizar) {
            $response = array("success" => true, "message" => $mensaje);
            echo json_encode($response);
            exit;
        } else {
            $response = array("success" => false, "message" => "Error al actualizar el pago");
            echo json_encode($response);
            exit;
        }
    } else {
        $response = array("success" => false, "message" => "No se encontró el curso");
        echo json_encode($response);
        exit;
    }
} catch (Exception $e) {
    $response = array("success" => false, "message" => "Error en la consulta: " . $e->getMessage());
    echo json_encode($response);
    exit;
} finally {
    // Cerrar la conexión a la base de datos
    $consulta->close();
    $actualizar->close();
}
