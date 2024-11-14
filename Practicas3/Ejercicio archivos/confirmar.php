<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archivo'])) {
    $directorio = __DIR__ . '/descargas/';
    $archivo = $directorio . basename($_FILES['archivo']['name']);

    if (move_uploaded_file($_FILES['archivo']['tmp_name'], $archivo)) {
        echo "<p>Archivo subido exitosamente.</p>";
    } else {
        echo "<p>Error al subir el archivo.</p>";
    }
}
?>

<a href="subir.php">Subir otro archivo</a><br>
<a href="listar.php">Ver archivos subidos</a>
