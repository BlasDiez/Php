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
<ul>
    <li>Serie 1</li>
    <li>Serie 2</li>
    <li>Serie 3</li>
</ul>
<a href="peliculas.php">Ver Películas</a>
<a href="logout.php">Cerrar Sesión</a>
</body>
</html>
