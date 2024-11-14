<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Archivo</title>
</head>
<body>
    <h1>Subir un archivo</h1>
    <form action="confirmar.php" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo" required>
        <br><br>
        <button type="submit">Subir archivo</button>
    </form>
</body>
</html>
