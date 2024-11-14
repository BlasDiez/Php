<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

if ($_SESSION['user']['rol'] !== 'administrador') {
    header("Location: peliculas.php");
    exit;
}
?>
<H1>PÁGINA DE ADMINISTRACIÓN</H1>
<a href="peliculas.php">Ver peliculas</a> <br>
<a href="series.php">Ver series</a> <br>
<a href="logout.php">Cerrar sesión</a>
