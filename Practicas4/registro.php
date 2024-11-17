<?php
require_once './db/ClienteDB.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $clienteDB = new ClienteDB();
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

    $usuarios = $clienteDB->buscarPorDni($datos['dni']);
    if ($usuarios === false) {
        echo "<br><a href='registro.html'>Volver al registro</a>";
        exit;
    }

    if ($usuarios !== null) {
        echo "Error. El usuario ya existe.";
        echo "<br><a href='registro.html'>Volver al registro</a>";
        exit;
    }

    if($clienteDB->crear($datos)) {
        echo "Usuario creado correctamente";
        echo "<br><a href='login.html'>Volver al inicio</a>";
    }
}
?>
