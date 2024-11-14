<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Socio</title>
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

    // Mostrar el formulario
    ?>
    <form method="POST" action="">
        <label for="cadena">Búsqueda por nombre:</label>
        <input id="cadena" name="cadena" maxlength="30" required><br><br>
        <input type="submit" value="Buscar">
    </form>
    <?php

    // Procesar el formulario si se ha enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cadena = $_POST['cadena'];
        $socios = $gestor->buscar($cadena);
       if (count($socios) > 0) {
            echo "<table border='1'>\n";
            echo "<tr><th>Nombre</th><th>Correo electrónico</th><th>Teléfono</th><th>Dirección</th></tr>\n";
            foreach ($socios as $socio) {
                echo "<tr>\n";
                echo "<td>{$socio->getNombre()}</td>\n";
                echo "<td>{$socio->getCorreo()}</td>\n";
                echo "<td>{$socio->getTelefono()}</td>\n";
                echo "<td>{$socio->getDireccion()}</td>\n";
                echo "</tr>\n";
            }
            echo "</table>\n";
        } else {
            echo "<p>No se encontraron registros.</p>";
        }
    }

    echo '<a href="index.php">Volver al menú principal</a>';
    ?>
</body>
</html>

