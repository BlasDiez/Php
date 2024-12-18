<?php
session_start();
if ($_SESSION['rol'] !== 'administrador') {
    header("Location: login.html");
    exit;
}

require_once './db/ClienteDB.php';
$order = $_GET['order'] ?? 'ASC';
$clienteDB = new ClienteDB();
$clientes = $clienteDB->obtenerOrdenadosPorNombre($order);

if ($clientes === false) {
    die("Error al obtener clientes");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <style>
        th {
            background-color: orange;
        }
        .edit {
            color: green;
        }
        .delete {
            color: red;
        }
        td {
            padding: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: center;
        }
        a {
            text-decoration: none;
        }
    </style>
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

<!-- Lista de Clientes con opciones -->
<h2>Lista de Clientes</h2>
<table>
    <tr>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Localidad</th>
        <th>Provincia</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Editar</th>
        <th>Borrar</th>
    </tr>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?php echo htmlspecialchars($cliente->dni); ?></td>
            <td><?php echo htmlspecialchars($cliente->nombre); ?></td>
            <td><?php echo htmlspecialchars($cliente->direccion); ?></td>
            <td><?php echo htmlspecialchars($cliente->localidad); ?></td>
            <td><?php echo htmlspecialchars($cliente->provincia); ?></td>
            <td><?php echo htmlspecialchars($cliente->telefono); ?></td>
            <td><?php echo htmlspecialchars($cliente->email); ?></td>
            <td><a href="editar.php?dni=<?php echo urlencode($cliente->dni); ?>" class="edit">📝</a></td>
            <td><a href="borrar_cliente_admin.php?dni=<?php echo urlencode($cliente->dni); ?>" class="delete" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?');">❌</a></td>
        </tr>
        <?php endforeach; ?>
</table>

<div style="text-align: center; margin-top: 20px;">
    <a href="registro.html">Nuevo Cliente</a>
    <div>
        <a href="?order=ASC">Ordenar Ascendente</a>
        <a href="?order=DESC">Ordenar Descendente</a>
    </div>
</div>

<br>
<a href="logout.php">Cerrar Sesión</a>
</body>
</html>
