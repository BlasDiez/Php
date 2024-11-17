<?php

$dni = $_GET['dni'];

session_start();
if ($_SESSION['rol'] !== 'usuario') {
    header("Location: login.html");
    exit;
}


// Solo puedo borrarme a mi mismo
if ($_SESSION['dni'] !== $dni) {
    die("Acceso denegado");
}

require_once './db/ClienteDB.php';
$clienteDB = new ClienteDB();
$resultado = $clienteDB->borrar($dni);
session_destroy();

if ($resultado) {
    echo "Usuario borrado correctamente";
    echo "<br><a href='login.html'>Volver al inicio</a>";
}
else {
    echo "Error al borrar el usuario";
    echo "<br><a href='usuario_dashboard.php'>Volver al panel de usuario</a>";
}

?>

