<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Socio</title>
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

    // Procesar el formulario si se ha enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $socio = new Socio($nombre, $correo, $telefono, $direccion);
        $resultado = $gestor->insertar($socio);
        echo "<p>$resultado</p>";
        echo '<a href="index.php">Volver al menú principal</a>';
    } else {
    ?>

    <form method="POST" action="">
        <label>Nombre:</label>
        <input id="nombre" name="nombre" maxlength="30" required><br><br>
        <label>Correo electrónico:</label>
        <input id="correo" name="correo" type="email" maxlength="50" required><br><br>
        <label>Teléfono:</label>
        <input id="telefono" name="telefono" maxlength="15" required><br><br>
        <label>Dirección:</label>
        <input id="direccion" name="direccion" maxlength="100" required><br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    }
    ?>

