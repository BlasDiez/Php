<?php
require_once 'Conectar_db.php';
$conn = conectar_db();

$dni = $_GET['dni'];
$error = [];
$success = false;

$result = $conn->query("SELECT * FROM clientes WHERE dni='$dni'");
$cliente = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];
    $provincia = $_POST['provincia'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    // Validaciones
    if (empty($nombre)) {
        $error['nombre'] = "El nombre es requerido.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Formato de email inválido.";
    }

    if (empty($error)) {
        $stmt = $conn->prepare("UPDATE clientes SET nombre=?, direccion=?, localidad=?, provincia=?, telefono=?, email=? WHERE dni=?");
        $stmt->bind_param("ssssssi", $nombre, $direccion, $localidad, $provincia, $telefono, $email, $dni);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            $error['update'] = "Error al actualizar el cliente.";
        }
    }
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
<form action="" method="post">
    DNI: <input type="text" name="dni" value="<?php echo $cliente['dni']; ?>" readonly><br>
    Nombre: <input type="text" name="nombre" required value="<?php echo $cliente['nombre']; ?>" class="<?php echo isset($error['nombre']) ? 'error' : ''; ?>"><br>
    <?php echo isset($error['nombre']) ? $error['nombre'] : ''; ?><br>

    Dirección: <input type="text" name="direccion" required value="<?php echo $cliente['direccion']; ?>"><br>
    Localidad: <input type="text" name="localidad" required value="<?php echo $cliente['localidad']; ?>"><br>
    Provincia: <input type="text" name="provincia" required value="<?php echo $cliente['provincia']; ?>"><br>
    Teléfono: <input type="text" name="telefono" required value="<?php echo $telefono['telefono']; ?>"><br>
    Email: <input type="text" name="email" required value="<?php echo $cliente['email']; ?>" class="<?php echo isset($error['email']) ? 'error' : ''; ?>"><br>
    <?php echo isset($error['email']) ? $error['email'] : ''; ?><br>

    <input type="submit" value="Guardar">
</form>