<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario - Parte 1</title>
</head>
<body>
<form action="formulario2.php" method="POST">
    <label>Nombre y Apellidos:</label>
    <input type="text" name="nombre" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>URL página personal:</label>
    <input type="url" name="url"><br>

    <label>Sexo:</label>
    <input type="radio" name="sexo" value="Masculino" required> Masculino
    <input type="radio" name="sexo" value="Femenino" required> Femenino<br>

    <input type="submit" value="Siguiente">
</form>
</body>
</html>
