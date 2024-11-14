<?php
// Incluir el archivo de conexión
include 'conectar_bd.php';
$id = 6;
// Verificar si el registro existe
$sql = "SELECT * FROM empleados WHERE id = :id";
$stmt = $con->prepare($sql);
$stmt->execute(array(':id' => $id));
//rowCount cuenta en número de registros de la consulta
if ($stmt->rowCount() > 0) {
    // El registro existe, proceder a eliminar
    $sql = "DELETE FROM empleados WHERE id = :id";
    $stmt = $con->prepare($sql);
    if ($stmt->execute([':id' => $id])) {
        echo "El registro ha sido eliminado.";
    } else {
        echo "Error al eliminar el registro: " . $stmt->errorInfo()[2]; //muestra el mensaje descriptivo del error
    }
} else {
    // El registro con el Id especificado no existe
    echo "No se encontró el registro con Id: $id.";
}
