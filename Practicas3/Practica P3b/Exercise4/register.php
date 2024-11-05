<?php
require 'Conectar_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn = Conectar_db();
    $stmt = $conn->prepare("INSERT INTO usuarios (username, password, rol) VALUES (?, ?, 'usuario')");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Registro exitoso";
    } else {
        echo "Error en el registro";
    }
}
?>
