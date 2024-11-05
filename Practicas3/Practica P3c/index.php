<?php
// Incluir el archivo de conexión
require_once 'Conectar_db.php';
$conn = conectar_db(); // Suponiendo que la función se llama conectarDb()

// Ordenar clientes
$order = $_GET['order'] ?? 'ASC';
$query = "SELECT * FROM clientes ORDER BY nombre $order";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
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
        tr {
            border-bottom: 1px solid #ccc;
        }
        td {
            padding: 8px;
        }
    </style>
</head>
<body>
<h1>Clientes</h1>
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
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['dni']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['localidad']; ?></td>
            <td><?php echo $row['provincia']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><a href="editarcliente.php?dni=<?php echo $row['dni']; ?>" class="edit">📝</a></td>
            <td><a href="borrarcliente.php?dni=<?php echo $row['dni']; ?>" class="delete">❌</a></td>
        </tr>
    <?php endwhile; ?>
</table>
<div style="text-align: center;">
    <a href="clientenuevo.php">Nuevo Cliente</a>
    <div>
        <a href="?order=ASC">Ordenar Ascendente</a>
        <a href="?order=DESC">Ordenar Descendente</a>
    </div>
</div>
</body>
</html>

<?php
$conn->close();
?>
