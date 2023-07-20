<?php
// Paso 1: Validar el método de envío
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    $response = array("success" => false, "message" => "Acceso denegado");
    echo json_encode($response);
    exit;
}
$conex = mysqli_connect("sql5c75f.carrierzone.com", "industrial703811", "Sec10042023+", "BDPV01_industrial703811");
// SELECT * FROM cursos INNER JOIN usuario ON cursos.Id_Usuario = usuario.Id_Usuario;
$consulta = $conex->prepare("SELECT * FROM AFILIADOS");
$consulta->execute();
$resultado = $consulta->get_result();
$datos = array();
while ($fila = $resultado->fetch_assoc()) {
    $datos[] = $fila;
}
// Codificar los datos en formato JSON
$json = json_encode($datos);
// Imprimir el resultado
echo $json;