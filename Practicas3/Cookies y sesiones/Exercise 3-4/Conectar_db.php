<?php
function conectar_db() {
    $host = "localhost";
    $usuario = "root";
    $password = "";
    $base_datos = "blasdiez";

    //Hacemos la conexión
    $link = mysqli_connect($host, $usuario, $password, $base_datos);

    //Comprobamos la conexión
    if (!$link) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    return $link;
}
?>