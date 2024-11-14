<?php
session_start();
if ($_SESSION['rol'] !== 'administrador') {
    header("Location: login.php");
    exit;
}

require_once 'Cliente.php';
$cliente = new Cliente();
$clientes = $cliente->obtenerTodosLosClientes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
</head>
<body>

<h1>Panel de Administración</h1>

<!-- Formulario para Buscar Cliente por DNI -->
<h2>Buscar Cliente</h2>
<form action="buscar_cliente.php" method="POST">
    <label for="dni">Buscar Cliente por DNI:</label>
    <input type="text" name="dni" id="dni" required>
    <button type="submit">Buscar</button>
</form>

<!-- Lista de Clientes con opción de Eliminar -->
<h2>Lista de Clientes</h2>
<table border="1">
    <tr>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($clientes as $usuario): ?>
        <tr>
            <td><?= htmlspecialchars($usuario->dni) ?></td>
            <td><?= htmlspecialchars($usuario->nombre) ?></td>
            <td>
                <a href="eliminar_usuario.php?id=<?= urlencode($usuario->dni) ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
