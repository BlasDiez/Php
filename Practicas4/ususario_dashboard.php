<?php
session_start();
if ($_SESSION['rol'] != 'usuario') {
    header("Location: login.php");
    exit;
}

echo "Bienvenido, Usuario";

?>
