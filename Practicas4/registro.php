<?php
require_once 'Cliente.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cliente = new Cliente();
    $datos = [
        'dni' => $_POST['dni'],
        'nombre' => $_POST['nombre'],
        'direccion' => $_POST['direccion'],
        'localidad' => $_POST['localidad'],
        'provincia' => $_POST['provincia'],
        'telefono' => $_POST['telefono'],
        'email' => $_POST['email'],
        'contrasena' => password_hash($_POST['contrasena'], PASSWORD_DEFAULT),
        'rol' => 'usuario'
    ];

    if (!$cliente->buscarPorDni($datos['dni'])) {
        $cliente->crearUsuario($datos);
        echo "Usuario registrado correctamente";
    } else {
        echo "El DNI ya está registrado";
    }
}
?>
