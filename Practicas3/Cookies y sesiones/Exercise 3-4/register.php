<?php
require 'Conectar_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn = Conectar_db();
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, clave, rol) VALUES (?, ?, 'usuario')");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Registro exitoso";
        echo "<br><a href='index.php'>Ahora puedes iniciar sesión</a>";
    } else {
        echo "Error en el registro";
        echo "<br><a href='index.php'>Volver</a>";
    }
}
?>
