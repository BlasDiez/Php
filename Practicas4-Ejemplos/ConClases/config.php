<?php
function conectar() {
    $dsn = "mysql:host=localhost;dbname=club";
    $username = "root";
    $password = "";
    try {
        $link = new PDO($dsn, $username, $password);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $link;
    } catch (PDOException $e) {
        die("Fallo de conexión: " . $e->getMessage());
    }
}

