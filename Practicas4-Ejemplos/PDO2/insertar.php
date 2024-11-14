<?php
include 'conexion.php'; // Incluye el archivo de conexión
// Establecer conexión
$link = conectar();
// Comprobamos que todos los campos obligatorios estén completos
if (!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['telefono']) && isset($_POST['direccion'])) {
    // Capturamos los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    // Preparar la consulta SQL para insertar datos
    $sql = "INSERT INTO socios (nombre, email, telefono, direccion) VALUES (:nombre, :email, :telefono, :direccion)"; 
    try {
        // Preparar la sentencia
        $stmt = $link->prepare($sql);  
        // Asociar los parámetros con los valores
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $correo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':direccion', $direccion);
        // Ejecutar la sentencia
        if ($stmt->execute()) {
            echo "Los datos han sido introducidos satisfactoriamente";
        } else {
            echo "Ha habido un error al insertar los valores.";
        }
    } catch (PDOException $e) {
        // Manejo de errores en caso de fallo
        echo "Error al insertar los valores: " . $e->getMessage();
    }
} else {
    echo "Error, no ha introducido todos los datos obligatorios";
}
?>
