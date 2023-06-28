<?php
session_start();
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
    $_SESSION['datosuser'] = $datos->fetch_assoc();
    $row = $result->fetch_assoc();
    $perfil = $row['Perfil'];

    // Redireccionar según el perfil del usuario
    if ($perfil == 1) {
        header("Location: ../asesor/index.php");
    } elseif ($perfil == 2) {
        header("Location: ../gerente/index.php");
    } elseif ($perfil == 3) {
        header("Location: ../direccion/index.php");
    } elseif ($perfil == 4) {
        header("Location: ../area_de_ti/index.php");
    } else {
        echo "Perfil desconocido";
    }
} else {
    // Usuario inválido
    echo "Credenciales de inicio de sesión incorrectas";
}

?>