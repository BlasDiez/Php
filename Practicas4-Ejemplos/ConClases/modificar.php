<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Socio</title>
</head>
<body>
    <?php
    // Incluir el archivo de conexión y las clases necesarias
    include 'config.php';
    include 'Socio.php';
    include 'GestorSocios.php';
    $conexion = conectar();
    $gestor = new GestorSocios($conexion);
    // Solicitud POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['nombre'], $_POST['correo'], $_POST['telefono'], $_POST['direccion'])) {
            // Modificar datos del socio
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $socio = new Socio($nombre, $correo, $telefono, $direccion);
            $resultado = $gestor->modificar($socio);
            echo "<p>$resultado</p>";
            echo '<a href="index.php">Volver al menú principal</a>';
        } else {
            // Buscar el socio y mostrar formulario de modificación
            $nombre = $_POST['nombre'];
            $socios = $gestor->buscar($nombre);
            if (count($socios) == 1) {
                $socio = $socios[0];
                ?>

                <h2>Modificar datos del socio</h2>
                <form method="POST" action="modificar.php">
                    <label for="nombre">Nombre:</label>
                    <input id="nombre" name="nombre" maxlength="30" value="<?php echo htmlspecialchars($socio->getNombre()); ?>" readonly><br><br>
                    <label for="correo">Correo electrónico:</label>
                    <input id="correo" name="correo" type="email" maxlength="50" value="<?php echo htmlspecialchars($socio->getCorreo()); ?>" required><br><br>
                    <label for="telefono">Teléfono:</label>
                    <input id="telefono" name="telefono" maxlength="15" value="<?php echo htmlspecialchars($socio->getTelefono()); ?>" required><br><br>
                    <label for="direccion">Dirección:</label>
                    <input id="direccion" name="direccion" maxlength="100" value="<?php echo htmlspecialchars($socio->getDireccion()); ?>" required><br><br>
                    <input type="submit" value="Modificar">
                </form>
                <?php
            } else {
                echo "<p>No se encontró el socio con el nombre proporcionado.</p>";
                echo '<a href="modificar.php">Volver a intentar</a>';
            }
        }
    } else {
        // Mostrar el formulario para pedir el nombre del socio a modificar
        ?>

        <h2>Buscar socio para modificar</h2>
        <form method="POST" action="">
            <label>Nombre del socio a modificar:</label>
            <input id="nombre" name="nombre" maxlength="30" required><br><br>
            <input type="submit" value="Buscar"><br><br>
        </form>
        <a href="index.php">Volver al menú principal</a>
        <?php
    }
    ?>
</body>
</html>
