<?php
require_once 'Conectar_db.php';
$conn = conectar_db();

$dni = $_GET['dni'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['confirmar'])) {
        $stmt = $conn->prepare("DELETE FROM clientes WHERE dni=?");
        $stmt->bind_param("s", $dni);
        if ($stmt->execute()) {
            $mensaje = "El cliente con DNI $dni se ha eliminado correctamente.";
        }
    }
    header("Location: index.php?mensaje=" . urlencode($mensaje));
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Borrar Cliente</title>
</head>
<body>
<h1>Confirmar Borrado</h1>
<p>¿Está seguro de que desea borrar al cliente con DNI: <?php echo $dni; ?>?</p>
<form action="" method="post">
    <input type="submit" name="confirmar" value="Sí, borrar">
    <a href="index.php">Cancelar</a>
</form>
</body>
</html>

<?php
$conn->close();
?>
