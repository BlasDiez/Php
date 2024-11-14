<?php
session_start();
require 'Conectar_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = Conectar_db();
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nombre = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['clave'])) {
            $_SESSION['user'] = $user;
            $target = $user['rol'] === 'administrador' ? "admin.php" : "peliculas.php";
            header("Location: $target");
            exit;
        } else {
            echo "Contraseña incorrecta";
            echo "<br><a href='index.php'>Volver</a>";
        }
    } else {
        echo "Usuario no encontrado";
        echo "<br><a href='index.php'>Volver</a>";
    }
}
?>
