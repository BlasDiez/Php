<?php
session_start();
$_SESSION['convivientes'] = $_POST['convivientes'];
$_SESSION['aficiones'] = $_POST['aficiones'];
$_SESSION['menu'] = $_POST['menu'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Resumen de Datos</title>
</head>
<body>
<h2>Resumen de tus datos</h2>
<ul>
    <li><strong>Nombre y Apellidos:</strong> <?= $_SESSION['nombre'] ?></li>
    <li><strong>Email:</strong> <?= $_SESSION['email'] ?></li>
    <li><strong>URL Página Personal:</strong> <?= $_SESSION['url'] ?></li>
    <li><strong>Sexo:</strong> <?= $_SESSION['sexo'] ?></li>
    <li><strong>Número de Convivientes:</strong> <?= $_SESSION['convivientes'] ?></li>
    <li><strong>Aficiones:</strong> <?= implode(", ", $_SESSION['aficiones']) ?></li>
    <li><strong>Menú Favorito:</strong> <?= implode(", ", $_SESSION['menu']) ?></li>
</ul>
</body>
</html>
