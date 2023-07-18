<?php
require_once("conexion.php");
// Validar el método de solicitud
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response = array("success" => false, "message" => "Acceso denegado");
    echo json_encode($response);
    exit();
}

$nombre = $_POST["usuario"];
$ape = $_POST["apellidos"];
$fecha = $_POST["fecha"];
$nickname = $_POST["nameusuario"];
$password = $_POST["password"];
$password1 = $_POST["password1"];
$perfil = $_POST['perfil'];
//Evalua que los campos no estan vacios
if (empty($_POST["usuario"]) || empty($_POST["apellidos"]) || empty($_POST["fecha"]) || empty($_POST["nameusuario"]) || empty($_POST["password"]) || empty($_POST["password1"]) || empty($_POST["perfil"])) {
    $response = array("success" => false, "message" => "Acceso denegado por datos");
    echo json_encode($response);
    exit();
}
//Compara la contraseña y la verificacion de la contraseña
if ($password !== $password1) {
    $response = array("success" => false, "message" => "Datos contraseñas  no son iguales");
    echo json_encode($response);
    exit();
}
// Insertar los datos en la base de datos
$conexion = new Conexion;
// $sql = $conexion->conectar()->query("SELECT * FROM rolperfil_01");
$sql = $conexion->conectar()->query("INSERT INTO usuario_01 (Nombre, Apellidos, Fecha_de_nacimiento, Nick_name, Contrasena, Perfil) 
                                        VALUES ('$nombre', '$ape', '$fecha', '$nickname', '$password', '$perfil')");
// echo $sql->num_rows;
if ($sql) {
    $response = array("success" => true, "message" => "Registro del usuario exitoso");
    echo json_encode($response);
} else {
    $response = array("success" => false, "message" => "Error al registrar usuario");
    echo json_encode($response);
}
