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
    <title>Listado de Películas</title>
</head>
<body>
<h1>Listado de Películas</h1>
<ul>
    <li>Película 1</li>
    <li>Película 2</li>
    <li>Película 3</li>
</ul>
<a href="series.php">Ver Series</a>
<a href="logout.php">Cerrar Sesión</a>
</body>
</html>
