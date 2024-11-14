<?php
require_once 'Cliente.php';
$cliente = new Cliente();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dni = $_POST['dni'];
    $resultado = $cliente->buscarPorDni($dni);
    if ($resultado) {
        echo "Cliente encontrado: " . htmlspecialchars($resultado['nombre']);
    } else {
        echo "No se encontró el cliente con el DNI proporcionado.";
    }
}
?>
