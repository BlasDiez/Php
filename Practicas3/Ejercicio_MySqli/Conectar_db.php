<?php
function conectar_db() {
    $host = "localhost";
    $usuario = "root";
    $password = "";
    $base_datos = "clientes_DB";

    $link = mysqli_connect($host, $usuario, $password, $base_datos);

    if (!$link) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    return $link;
}
?>
