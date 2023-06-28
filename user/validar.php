<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if($_SESSION['datosuser']){
    
} else {
    // El usuario no ha iniciado sesión, redireccionar a la página de inicio de sesión
    header("Location: ../index.php");
    exit();
}