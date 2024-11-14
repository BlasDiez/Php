<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Listado de Series</title>
</head>
<body>
<h1>Listado de Series</h1>

<?php
require 'Conectar_db.php';
$conn = Conectar_db();
$stmt = $conn->prepare("SELECT * FROM series");
$stmt->execute();
$result = $stmt->get_result();
echo '<ul>';
while ($row = $result->fetch_assoc()) {
    echo '<li>' . $row['nombre'] . '</li>';
}
echo '</ul>';
?>

<?php
if ($_SESSION['user']['rol'] === 'administrador') {
    echo '<a href="admin.php">Página de Administración</a>';
}
?>
<a href="peliculas.php">Ver Películas</a>
<a href="logout.php">Cerrar Sesión</a>
</body>
</html>
