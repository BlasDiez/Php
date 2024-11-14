<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['url'] = $_POST['url'];
    $_SESSION['sexo'] = $_POST['sexo'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario - Parte 2</title>
</head>
<body>
<form action="formulario3.php" method="POST">
    <label>Número de convivientes:</label>
    <input type="number" name="convivientes" required><br>

    <label>Aficiones:</label><br>
    <input type="checkbox" name="aficiones[]" value="Leer"> Leer
    <input type="checkbox" name="aficiones[]" value="Deporte"> Deporte
    <input type="checkbox" name="aficiones[]" value="Música"> Música
    <input type="checkbox" name="aficiones[]" value="Videojuegos"> Videojuegos<br>

    <label>Menú favorito:</label><br>
    <select name="menu[]" multiple required>
        <option value="Pizza">Pizza</option>
        <option value="Hamburguesa">Hamburguesa</option>
        <option value="Pasta">Pasta</option>
        <option value="Ensalada">Ensalada</option>
    </select><br>

    <input type="submit" value="Enviar">
</form>
</body>
</html>
