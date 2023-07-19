<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if(!isset($_SESSION['datosuser'])){
    header("Location: inicio");
    exit();
} 