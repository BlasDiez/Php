<?php
require_once __DIR__ . '/db/ClienteDB.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clienteDB = new ClienteDB();
    $cliente = $clienteDB->buscarPorDni($_POST['dni']);
    if (!$cliente) {
        echo "DNI o contraseña incorrectos";
        echo "<br><a href='login.html'>Volver al login</a>";
        exit;
    }

    $passwordMatches = password_verify($_POST['contrasena'], $cliente->password_hash);
    if (!$passwordMatches) {
        echo "DNI o contraseña incorrectos";
        echo "<br><a href='login.html'>Volver al login</a>";
        exit;
    }

    // Successful login
    $_SESSION['dni'] = $cliente->dni;
    $_SESSION['rol'] = $cliente->rol;

    if ($cliente->rol == 'administrador') {
        header('Location: admin_dashboard.php');
    } else {
        header('Location: usuario_dashboard.php');
    }
}
?>
