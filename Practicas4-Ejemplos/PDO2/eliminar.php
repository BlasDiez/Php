<?php
// Incluir el archivo de conexión
include 'conexion.php';
// Establecer conexión con PDO
$link = conectar();
try {
    // Comprobar si se ha enviado una solicitud de eliminación
    if (isset($_GET['eliminar'])) {
        $nombreEliminar = $_GET['eliminar'];
        $sqlEliminar = "DELETE FROM socios WHERE nombre = :nombre";
        $stmtEliminar = $link->prepare($sqlEliminar);
        $stmtEliminar->execute([':nombre' => $nombreEliminar]);
    }
    // Consultar los datos
    $sql = "SELECT nombre, email, telefono, direccion FROM socios";
    $stmt = $link->prepare($sql);
    $stmt->execute();
    // Crear la tabla
    echo "<table border='2'>\n"; // Cambiado el borde a 2
    echo "<tr><th>Nombre</th><th>Correo electrónico</th><th>Teléfono</th><th>Dirección</th><th>Eliminar</th></tr>\n";
    // Mostrar los datos
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>\n";
        echo "<td>{$row['nombre']}</td>\n";
        echo "<td>{$row['email']}</td>\n";
        echo "<td>{$row['telefono']}</td>\n";
        echo "<td>{$row['direccion']}</td>\n";
        // Eliminar con la fila en la que estamos
        echo "<td><a href='eliminar.php?eliminar={$row['nombre']}'>Eliminar</a></td>\n";
        echo "</tr>\n";
    }
    echo "</table>\n";
} catch (PDOException $e) {
    // Manejo de errores en caso de que la consulta falle
    echo "Error en la consulta: " . $e->getMessage();
}
// Cerrar la conexión
$link = null; // Cerrar la conexión de forma explícita
?>
