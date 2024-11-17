<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    die("Acceso denegado");
}

session_start();
if ($_SESSION['rol'] !== 'administrador') {
    header("Location: login.php");
    exit;
}

require_once './db/ClienteDB.php';
$dni = $_POST['dni'];
$clienteDB = new ClienteDB();
$cliente = $clienteDB->buscarPorDni($dni);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Cliente</title>
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
<h1>Buscar Cliente</h1>

<?php
if ($cliente == false) {

?>
<h2>Cliente no encontrado</h2>
<?php
}
else {
?>
<h2>Cliente encontrado</h2>
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
    <tr>
        <td><?php echo htmlspecialchars($cliente->dni); ?></td>
        <td><?php echo htmlspecialchars($cliente->nombre); ?></td>
        <td><?php echo htmlspecialchars($cliente->direccion); ?></td>
        <td><?php echo htmlspecialchars($cliente->localidad); ?></td>
        <td><?php echo htmlspecialchars($cliente->provincia); ?></td>
        <td><?php echo htmlspecialchars($cliente->telefono); ?></td>
        <td><?php echo htmlspecialchars($cliente->email); ?></td>
        <td><a href="editarcliente.php?dni=<?php echo urlencode($cliente->dni); ?>" class="edit">📝</a></td>
        <td><a href="borrarcliente.php?dni=<?php echo urlencode($cliente->dni); ?>" class="delete" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?');">❌</a></td>
    </tr>
</table>
<?php
}
?>
<a href="admin_dashboard.php">Volver al panel de administración</a>
</body>
</html>