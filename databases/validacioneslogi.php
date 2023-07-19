<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['datosuser'])) {
    switch ($_SESSION['datosuser']['perfil']) {
        case 1:
            header("Location:asesor");
            break;
        case 2:
            header("Location:gerente");
            break;
        case 3:
            header("Location:direccion");
            break;
        case 4:
            header("Location:area-de-ti");
            break;
        default:
            $response = array("success" => false, "message" => "Existio un error");
            echo json_encode($response);
            exit;
            break;
    }
}
