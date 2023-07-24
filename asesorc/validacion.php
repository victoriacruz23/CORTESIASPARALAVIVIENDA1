<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['datosuser'])) {
    switch ($_SESSION['datosuser']['perfil']) {
        case 1:

            break;
        default:
            $response = array("success" => false, "message" => "Existio un error");
            echo json_encode($response);
            exit;
            break;
    }
}else{
    $response = array("success" => false, "message" => "Existio un error");
    echo json_encode($response);
    exit;
}