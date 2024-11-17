<?php

$dni = $_GET['dni'];

session_start();
if ($_SESSION['rol'] !== 'administrador') {
    header("Location: login.html");
    exit;
}


// Puedo borrar cualquiera menos a mi mismo
if ($_SESSION['dni'] === $dni) {
    echo "No puedes eliminarte a ti mismo";
    echo "<br><a href='admin_dashboard.php'>Volver al panel de admin</a>";
    exit;
}


require_once './db/ClienteDB.php';
$clienteDB = new ClienteDB();
$resultado = $clienteDB->borrar($dni);

if ($resultado) {
    echo "Usuario borrado correctamente";
}
else {
    echo "Error al borrar el usuario";
}
echo "<br><a href='admin_dashboard.php'>Volver al panel de admin</a>";

?>

