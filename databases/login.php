<?php
session_start();
require_once("conexion.php");
// print_r($_POST);
// Capturar los datos del formulario
$nickname = $_POST['nameusuario'];
$password = $_POST['password'];
// Verificar el usuario en la base de datos
$sql = "SELECT * FROM usuario_01 WHERE Nick_name = '$nickname' AND Contrasena = '$password'";
$result = $conexion->query($sql);

if ($result->num_rows == 1) {
    // Usuario válido
    $row = $result->fetch_assoc();
    $perfil = $row['Perfil'];

    // Redireccionar según el perfil del usuario
    if ($perfil == 'asesor') {
        header("Location: ../asesor/index.php");
    } elseif ($perfil == 'gerente') {
        header("Location: ../gerente/index.php");
    } elseif ($perfil == 'direccion') {
        header("Location: ../direccion/index.php");
    } elseif ($perfil == 'areati') {
        header("Location: ../area_de_ti/index.php");
    } else {
        echo "Perfil desconocido";
    }
} else {
    // Usuario inválido
    echo "Credenciales de inicio de sesión incorrectas";
}

$conexion->close();
?>