<?php
session_start();
require_once 'Cliente.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cliente = new Cliente();
    $usuario = $cliente->buscarPorDni($_POST['dni']);

    print_r($usuario);

    if ($usuario && password_verify($_POST['contrasena'], $usuario['password_hash'])) {
        $_SESSION['dni'] = $usuario['dni'];
        $_SESSION['rol'] = $usuario['rol'];

        if ($usuario['rol'] == 'administrador') {
            header('Location: admin_dashboard.php');
        } else {
            header('Location: usuario_dashboard.php');
        }
        exit;
    } else {
        echo "DNI o contraseña incorrectos";
    }
}
?>
