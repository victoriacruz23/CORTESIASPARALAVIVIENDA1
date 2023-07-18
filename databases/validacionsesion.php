<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if(!$_SESSION['datosuser']){
    header("Location: home");
    exit();
} 