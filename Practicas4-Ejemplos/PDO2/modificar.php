<?php
include 'conexion.php'; 
// Establecer conexión
$link = conectar(); 
// Comprobar que todos los campos obligatorios estén completos
if (!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['telefono']) && isset($_POST['direccion'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    // Actualizar los datos en la base de datos utilizando PDO
    $sql = "UPDATE socios SET email = :correo, telefono = :telefono, direccion = :direccion WHERE nombre = :nombre";
    try {
        $stmt = $link->prepare($sql); // Preparar la consulta
        // Vincular parámetros para prevenir inyecciones SQL
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Los datos han sido actualizados satisfactoriamente";
        } else {
            echo "No se pudieron actualizar los datos.";
        }
    } catch (PDOException $e) {
        echo "Ha habido un error al actualizar los valores: " . $e->getMessage();
    }
} else {
    echo "Error, no ha introducido todos los datos obligatorios";
}
// Cerrar la conexión
$link = null; 
// Redirigir a mostrar.php
header("Location: mostrar.php");
exit();
?>
