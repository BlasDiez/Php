<?php
include 'conexion.php'; // Incluye el archivo de conexión
// Comprobamos que se ha enviado la cadena de búsqueda
if (!isset($_POST['cadena']) || empty(trim($_POST['cadena']))) {
    echo "Debe especificar una cadena a buscar.";
    exit;
}
// Establecer conexión
$link = conectar();
// Capturamos la cadena de búsqueda
$cadena = $_POST['cadena'];
// Realizamos la consulta usando parámetros para prevenir inyecciones SQL
$sql = "SELECT * FROM socios WHERE nombre LIKE :cadena ORDER BY nombre";
try {
    $stmt = $link->prepare($sql); // Preparar la consulta
    $stmt->bindValue(':cadena', "%$cadena%", PDO::PARAM_STR); // Asociar la cadena de búsqueda
    $stmt->execute(); // Ejecutar la consulta
    // Mostramos los resultados si los hay
    if ($stmt->rowCount() > 0) {     
        echo "<table border='1'> \n";  
        echo "<tr><th>Nombre</th><th>Correo electrónico</th><th>Teléfono</th><th>Dirección</th></tr> \n";   
        // Mostramos los datos con array asociativo
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>\n";
            echo "<td>{$row['nombre']}</td>\n";
            echo "<td>{$row['email']}</td>\n";
            echo "<td>{$row['telefono']}</td>\n";
            echo "<td>{$row['direccion']}</td>\n";
            echo "</tr>\n";
        }
        echo "</table>\n";
    } else {
        echo "¡No se ha encontrado ningún registro!";
    }
} catch (PDOException $e) {
    // Manejo de errores
    echo "Error en la consulta: " . $e->getMessage();
}
// Cerramos la conexión
$link = null; 
?>
