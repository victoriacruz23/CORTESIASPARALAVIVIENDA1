<?php
require_once("conexion.php");
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "
    <script>
    alert(' Método no permitido');
    window.location = '../RegistroUser.php';
    </script>
    ";
    exit;
}

$nombre=$_POST["usuario"];
$ape=$_POST["apellidos"];
$fecha=$_POST["fecha"];
$nickname = $_POST["nameusuario"];
$password = $_POST["password"];
$password1 = $_POST["verifica"];
$perfil = $_POST['perfil'];
//Evalua que los campos no estan vacios
if (empty($_POST["usuario"]) || empty($_POST["apellidos"]) || empty($_POST["fecha"]) || empty($_POST["nameusuario"]) || empty($_POST["password"]) || empty($_POST["verifica"]) || empty($_POST["perfil"])) {
    echo "
    <script>
    alert('Error: Datos incompletos');
    window.location = '../RegistroUser.php';
    </script>
    ";
    exit;
}
//Compara la contraseña y la verificacion de la contraseña
if($password !== $password1){
    echo "
    <script>
    alert('Datos contraseñas  no son iguales');
    window.location = '../RegistroUser.php';
    </script>
    ";
    exit;
}
// Insertar los datos en la base de datos
$conexion = new Conexion;
// $sql = $conexion->conectar()->query("SELECT * FROM rolperfil_01");
$sql = $conexion->conectar()->query("INSERT INTO usuario_01 (Nombre, Apellidos, Fecha_de_nacimiento, Nick_name, Contrasena, Perfil) 
                                        VALUES ('$nombre', '$ape', '$fecha', '$nickname', '$password', '$perfil')") ;
// echo $sql->num_rows;
if ($sql) {
    echo "
    <script>
    alert('Se registro correctamente');
    window.location = '../index.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('Error');
    window.location = '../RegistroUser.php';
    </script>
    ";
}
