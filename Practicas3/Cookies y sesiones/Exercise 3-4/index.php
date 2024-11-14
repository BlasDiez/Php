<?php
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['rol'] === 'administrador') {
        header("Location: admin.php");
    } else {
        header("Location: peliculas.php");
    }
    exit;
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Inicio de Sesión</title>
    </head>
    <body>
    <h2>Iniciar Sesión</h2>
    <form action="login.php" method="POST">
        <label>Usuario:</label>
        <input type="text" name="username" required><br>
        <label>Contraseña:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>

    <h2>Registro</h2>
    <form action="register.php" method="POST">
        <label>Usuario:</label>
        <input type="text" name="username" required><br>
        <label>Contraseña:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Registrarse">
    </form>
    </body>
    </html>
<?php
