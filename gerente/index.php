<?php
require_once("conexion.php");
// print_r($_POST);
$usuario = $_POST ["nameusuario"];
$contra = $_POST ["password"];
// $consulta = $conexion-> query("");
$consulta = $conexion->query("SELECT * FROM usuarios_01 WHERE Nick_name = '$usuario'");
$consultaSession = $conexion->query("SELECT * FROM usuarios_01 WHERE Contrasena = '$contra'");
if($consultaSession->num_rows == 1){
    $datoSession = $consultaSession ->fetch_assoc();
}
// print_r($consulta->fetch_assoc());
if($consulta->num_rows == 1){
    while($info = $consulta->fetch_assoc()){
        $pass =  $info['Contrasena'];
        $rol = $info['Perfil'];
    }
    // password_verify(Contreaseña sin hash, contraseña con hash)
    if (password_verify($contra, $pass)) {
        // sesiones
        session_start();
        $_SESSION["Nick_name"] = $datoSession;
        echo "<script>
        alert ('Acceso correcto !Conexión Exitosa!');
        

        if($rol == 1){
            window.location = '../asesor/index.php';
           }else if($rol == 2){
            window.location = '../gerente/index.php';
           }else if($rol == 3){
            window.location = '../direccion/index.php';
           }else if($rol == 4){
            window.location = '../area_de_ti/index.php';
           }

        </script>";
        exit;
   
    }else{
        echo "
        <script>
        alert('Contraseña incorrecta');
        window.location = '../index.php';
        </script>
        ";
    }
}else{
    echo "
    <script>
    alert('El usuario no existe');
    window.location = '../index.php';
    </script>
    ";
}
?>
