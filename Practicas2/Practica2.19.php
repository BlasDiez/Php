<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio Obligatorio 2.19</title>
</head>
<body>

<?php

function mostrarDato($id, $texto): void
{
    if(isset($_POST[$id])){
        echo $texto . $_POST[$id] . "<br>";
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['name']) && isset($_POST['apellido'])) {
        echo "Tu nombre completo es: " . htmlspecialchars($_POST['name']) . " " . htmlspecialchars($_POST['apellido']) . "<br>";
    }

    mostrarDato('email', "Tu correo electrónico es: ");
    mostrarDato('sport', "Tu deporte favorito es: ");
    mostrarDato('sexo', "Eres: ");

    echo isset($_POST['conduce']) ? "Conduces <br>" : "No conduces <br>";


    echo isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK
        ? "Has enviado el curriculum<br>"
        : "No has enviado el curriculum<br>";

    mostrarDato('aficiones','Mis aficiones son: ');

}

?>


<h1>Formulario Actividades:</h1>
<form action="Practica2.19.php" method="post" enctype="multipart/form-data">

    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" placeholder="Nombre" required>

    <br><br>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" placeholder="Apellido" size="30" required>

    <br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" size="45">

    <br><br>

    <label for="sport">Selecciona un deporte:</label>
    <select id="sport" name="sport">
        <option value="futbol">fútbol</option>
        <option value="baloncesto">baloncesto</option>
        <option value="curling" selected>curling</option>
        <option value="buzkashi">buzkashi</option>
    </select>

    <br>

    <p>Sexo:</p>

    <input type="radio" id="masculino" name="sexo" value="masculino" checked>
    <label for="masculino">Masculino</label>

    <br><br>

    <input type="radio" id="femenino" name="sexo" value="femenino">
    <label for="femenino">Femenino</label>

    <br><br>

    <input type="checkbox" id="conduce" name="conduce" value="conduce">
    <label for="conduce">Conduzco</label>

    <br>

    <p>Archivo curriculum para subir: <input type="file" id="archivo" name="archivo" value="enviado"></p>

    <label for="aficiones">Aficiones:</label>
    <br><br>
    <textarea id="aficiones" name="aficiones" cols="45" rows="4"></textarea>

    <br><br>

    <button type="submit" name="button">enviar</button>
    <button type="reset" name="resetButton">borrar</button>

</form>

</body>
</html>
