<?php
// Función para conectar a la base de datos utilizando PDO
function conectar() {
    try {
        // Crear una nueva instancia de PDO para conectar a la base de datos
        $link = new PDO("mysql:host=localhost;dbname=club", "root", "");
        // Configurar PDO para lanzar excepciones en caso de error
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Manejo de errores: terminar ejecución e imprimir el mensaje de error
        die("Fallo de conexión: " . $e->getMessage());
    }
    // Devuelve el objeto de conexión
    return $link;
}

