<?php
// Definición de constantes para el usuario y la contraseña
const USER_DB= "root"; 
const PASSWORD= "";    
try {
    $dsn = "mysql:host=localhost;dbname=empresa";
    $con = new PDO($dsn, USER_DB, PASSWORD);  
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
    echo "Conexión realizada con éxito.";
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
