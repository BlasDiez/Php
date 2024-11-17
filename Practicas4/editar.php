<?php
require_once './db/ClienteDB.php';

if (!isset($_GET['dni']) || empty($_GET['dni'])) {
    echo "Error: El DNI no se ha proporcionado o está vacío.";
    exit;
}

$dni = $_GET['dni'];

$clienteDB = new ClienteDB();

$cliente = $clienteDB->buscarPorDni($dni);

if ($cliente === null) {
    echo "Error: Cliente con DNI $dni no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
<h1>Editar Cliente</h1>
<form action="editar_cliente.php" method="POST">

    <input type="hidden" name="dni" value="<?= htmlspecialchars($cliente->dni) ?>">
    <label for="dni">DNI:</label>
    <input type="text" name="dni" value="<?= htmlspecialchars($cliente->dni) ?>" disabled>
    <br>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($cliente->nombre) ?>" required>
    <br>

    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion" value="<?= htmlspecialchars($cliente->direccion) ?>">
    <br>

    <label for="localidad">Localidad:</label>
    <input type="text" name="localidad" value="<?= htmlspecialchars($cliente->localidad) ?>">
    <br>

    <label for="provincia">Provincia:</label>
    <input type="text" name="provincia" value="<?= htmlspecialchars($cliente->provincia) ?>">
    <br>

    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono" value="<?= htmlspecialchars($cliente->telefono) ?>">
    <br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($cliente->email) ?>" required>
    <br><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" placeholder="Contraseña nueva">
    <br><br>

    <button type="submit">Guardar Cambios</button>
    <a href="admin_dashboard.php">Cancelar</a>
</form>
</body>
</html>
