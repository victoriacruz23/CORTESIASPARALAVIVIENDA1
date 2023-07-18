<?php
session_start();
// Validar el método de solicitud
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response = array("success" => false, "message" => "Acceso denegado");
    echo json_encode($response);
    exit();
}
require_once("conexion.php");
$conexion = new Conexion;
// print_r($_POST);
// Capturar los datos del formulario
$nickname = $_POST['nameusuario'];
$password = $_POST['password'];
// Verificar el usuario en la base de datos
$sql = "SELECT * FROM usuario_01 WHERE Nick_name = '$nickname' AND Contrasena = '$password'";
$result = $conexion->conectar()->query($sql);

if ($result->num_rows == 1) {
    $datos = $conexion->conectar()->query($sql);
    // Usuario válido
    $dato = $datos->fetch_assoc();
       // Validar y sanitizar los datos antes de asignarlos a la variable de sesión
       $datos_validados = array(
        'id' => htmlspecialchars($dato['Id']),
        'perfil' => htmlspecialchars($dato['Perfil']),
        'nombre' => htmlspecialchars($dato['Nombre']),
        'apellidos' => htmlspecialchars($dato['Apellidos']),
        'nombreclave' => htmlspecialchars($dato['Nick_name']),
        // Otros campos que quieras incluir en la variable de sesión
    );
    $_SESSION['datosuser'] = $datos_validados;
    $row = $result->fetch_assoc();
    $perfil = $row['Perfil'];
    // Retornar respuesta exitosa como JSON
    $response = array("success" => true, "message" => "Inicio de sesión exitoso", "tipo" => $perfil);
    echo json_encode($response);
} else {
    $response = array("success" => false, "message" => "Error al inciar sesion");
    echo json_encode($response);

}
