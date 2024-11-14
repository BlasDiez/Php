<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Archivos Subidos</title>
</head>
<body>
<h1>Lista de Archivos Subidos</h1>
<?php
$directorio = __DIR__ . '/descargas/';
if (is_dir($directorio)) {
    $archivos = array_diff(scandir($directorio), array('.', '..'));
    if (count($archivos) > 0) {
        echo "<ul>";
        foreach ($archivos as $archivo) {
            echo "<li><a href='descargas/$archivo' download>$archivo</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No hay archivos subidos.</p>";
    }
} else {
    echo "<p>No se encontró el directorio de descargas.</p>";
}
?>
<a href="subir.php">Subir un archivo</a>
</body>
</html>
