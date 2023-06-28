<?php
session_start();
if($_SESSION['datosuser']){
    session_destroy();
    echo "
    <script>
        alert('La sesion fue cerrada');
        window.location = '../index.php';
    </script>";
}else
{
    echo "
    <script>
        alert('La sesion incorrecta');
        window.location = '../index.php';
    </script>";
}

?>