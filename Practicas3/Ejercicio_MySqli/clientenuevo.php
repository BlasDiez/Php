<?php
require_once 'Conectar_db.php';
$conn = conectar_db();

$error = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];
    $provincia = $_POST['provincia'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    if (empty($nombre)) {
        $error['nombre'] = "El nombre es requerido.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Formato de email inválido.";
    }
    if (!preg_match("/^\d{8}[A-Za-z]$/", $dni)) {
        $error['dni'] = "El DNI debe tener 8 cifras y una letra.";
    }

    $checkDNI = $conn->query("SELECT * FROM clientes WHERE dni='$dni'");
    if ($checkDNI->num_rows > 0) {
        $error['dni'] = "El DNI ya está registrado.";
    }

    if (empty($error)) {
        $stmt = $conn->prepare("INSERT INTO clientes (dni, nombre, direccion, localidad, provincia, telefono, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $dni, $nombre, $direccion, $localidad, $provincia, $telefono, $email);

        if ($stmt->execute()) {
            $success = true;
            header("Location: index.php");
            exit();
        } else {
            $error['insert'] = "Error al insertar el cliente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Cliente</title>
</head>
<body>
<h1>Nuevo Cliente</h1>
<form action="" method="post">
    DNI: <input type="text" name="dni" required value="<?php echo isset($dni) ? $dni : ''; ?>" class="<?php echo isset($error['dni']) ? 'error' : ''; ?>"><br>
    <?php echo isset($error['dni']) ? $error['dni'] : ''; ?><br>

    Nombre: <input type="text" name="nombre" required value="<?php echo isset($nombre) ? $nombre : ''; ?>" class="<?php echo isset($error['nombre']) ? 'error' : ''; ?>"><br>
    <?php echo isset($error['nombre']) ? $error['nombre'] : ''; ?><br>

    Dirección: <input type="text" name="direccion" required value="<?php echo isset($direccion) ? $direccion : ''; ?>"><br>
    Localidad: <input type="text" name="localidad" required value="<?php echo isset($localidad) ? $localidad : ''; ?>"><br>
    Provincia: <input type="text" name="provincia" required value="<?php echo isset($provincia) ? $provincia : ''; ?>"><br>
    Teléfono: <input type="text" name="telefono" required value="<?php echo isset($telefono) ? $telefono : ''; ?>"><br>
    Email: <input type="text" name="email" required value="<?php echo isset($email) ? $email : ''; ?>" class="<?php echo isset($error['email']) ? 'error' : ''; ?>"><br>
    <?php echo isset($error['email']) ? $error['email'] : ''; ?><br>

    <input type="submit" value="Añadir Cliente">
</form>
<a href="index.php">Volver</a>
</body>
</html>

<?php
$conn->close();
?>
