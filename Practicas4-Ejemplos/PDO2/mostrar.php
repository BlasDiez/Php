<?php 
include 'conexion.php'; // Incluimos el archivo de conexión
$link = conectar(); // Establecer la conexión a la base de datos
try {
    // Realizamos la consulta para obtener los datos
    $sql = "SELECT nombre, email, telefono, direccion FROM socios";
    $stmt = $link->prepare($sql); // Preparar la consulta
    $stmt->execute(); // Ejecutar la consulta
    // Verificamos si hay resultados
    if ($stmt->rowCount() > 0) {
        // Creamos la tabla
        echo "<table border='1'> \n";  
        echo "<tr><th>Nombre</th><th>Correo electrónico</th><th>Teléfono</th><th>Dirección</th></tr> \n";   
        // Incluimos los resultados de la búsqueda
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
            echo "<tr><td>{$row['nombre']}</td> <td>{$row['email']}</td> <td>{$row['telefono']}</td> <td>{$row['direccion']}</td></tr> \n"; 
        } 
        echo "</table> \n"; 
    } else {
        // Mensaje si no se encontraron resultados
        echo "No se encontraron registros.";
    }
} catch (PDOException $e) {
    // Manejo de errores
    echo "Error en la consulta: " . $e->getMessage();
}
// Cerrar la conexión
$link = null;
?>
