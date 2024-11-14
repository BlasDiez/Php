<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Socio</title>
</head>
<body>
    <?php
    // Incluir el archivo de conexión y las clases necesarias
    include 'config.php';
    include 'Socio.php';
    include 'GestorSocios.php';
    // Establecer conexión
    $conexion = conectar();
    $gestor = new GestorSocios($conexion);

    // Eliminar si es necesario
    if (isset($_GET['eliminar'])) {
        $nombreEliminar = $_GET['eliminar'];
        $resultado = $gestor->eliminar($nombreEliminar);
        echo "<p>$resultado</p>";
    }
    // Consultar los datos
    $socios = $gestor->mostrar();
    if (count($socios) > 0) {
        echo "<table border='1'>\n";
        echo "<tr><th>Nombre</th><th>Correo electrónico</th><th>Teléfono</th><th>Dirección</th><th>Eliminar</th></tr>\n";
        foreach ($socios as $socio) {
            echo "<tr>\n";
            echo "<td>{$socio->getNombre()}</td>\n";
            echo "<td>{$socio->getCorreo()}</td>\n";
            echo "<td>{$socio->getTelefono()}</td>\n";
            echo "<td>{$socio->getDireccion()}</td>\n";
            echo "<td><a href='eliminar.php?eliminar={$socio->getNombre()}'>Eliminar</a></td>\n";
            echo "</tr>\n";
        }
        echo "</table>\n";
    } else {
        echo "<p>No se encontraron registros.</p>";
    }
    ?>

    <a href="index.php">Volver al menú principal</a>
</body>
</html>

