<?php
include 'config.php';
include 'Socio.php';
include 'GestorSocios.php';
$conexion = conectar();
$gestor = new GestorSocios($conexion);
$socios = $gestor->mostrar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Socios</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Correo electrónico</th>
            <th>Teléfono</th>
            <th>Dirección</th>
        </tr>
        <?php foreach ($socios as $socio) {?>
            <tr>
                <td><?php echo htmlspecialchars($socio->getNombre()); ?></td>
                <td><?php echo htmlspecialchars($socio->getCorreo()); ?></td>
                <td><?php echo htmlspecialchars($socio->getTelefono()); ?></td>
                <td><?php echo htmlspecialchars($socio->getDireccion()); ?></td>
            </tr>
        <?php } ?>
    </table>
    <a href="index.php">Volver al Menú principal</a>
</body>
</html>

