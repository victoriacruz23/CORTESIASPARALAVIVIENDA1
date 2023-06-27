<?php
require_once("conexion.php");
//print_r($_POST);
// Capturar los datos del formulario
$nombre=$_POST["usuario"];
$ape=$_POST["apellidos"];
$fecha=$_POST["fecha"];
$nickname = $_POST["nameusuario"];
$password = $_POST["password"];
$password1 = $_POST["verifica"];
$perfil = $_POST['perfil'];
// Insertar los datos en la base de datos
$sql = "INSERT INTO usuario_01 (Nombre, Apellidos, Fecha_de_nacimiento, Nick_name, Contrasena, Perfil) VALUES ('$nombre', '$ape', '$fecha', '$nickname', '$password', '$perfil')";
if ($conexion->query($sql) === TRUE) {
    echo "
    <script>
    alert('Se registro correctamente');
    window.location = '../index.php';
    </script>
    ";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();

?>