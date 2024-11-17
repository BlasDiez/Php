<?php
require_once './db/ClienteDB.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dni = $_POST['dni'];

    $clienteDB = new ClienteDB();

    $datos = [
        'nombre' => $_POST['nombre'],
        'direccion' => $_POST['direccion'],
        'localidad' => $_POST['localidad'],
        'provincia' => $_POST['provincia'],
        'telefono' => $_POST['telefono'],
        'email' => $_POST['email'],
        'contrasena' => $_POST['contrasena']
    ];

    $clienteExistente = $clienteDB->buscarPorDni($dni);

    if ($clienteExistente === null) {
        echo "Error: Cliente no encontrado.";
        echo "<br><a href='panel_administrador.php'>Volver al panel</a>";
        exit;
    }

    if ($clienteDB->actualizar($dni, $datos)) {
        echo "Cliente actualizado correctamente.";
        echo "<br><a href='admin_dashboard.php'>Volver al panel</a>";
    } else {
        echo "Error al actualizar el cliente.";
        echo "<br><a href='editar_cliente.php?dni=" . htmlspecialchars($dni) . "'>Intentar de nuevo</a>";
    }
}
?>
