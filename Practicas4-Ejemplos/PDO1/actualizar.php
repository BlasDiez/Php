<?php
// Incluir el archivo de conexión
include 'conectar_bd.php';
// Id del registro a modificar
$id = 6;
// Nuevo salario
$nuevo_salario = 3000;
// Preparar la consulta SQL para actualizar el salario
$sql = "UPDATE empleados SET salario = :salario WHERE id = :id";
$stmt = $con->prepare($sql);
// Ejecutar la consulta y verificar
if ($stmt->execute([':salario' => $nuevo_salario, ':id' => $id])) {
    if ($stmt->rowCount() > 0) {
        echo "El registro ha sido actualizado.";
    } else {
        echo "No se encontró el registro con Id: $id.";
    }
} else {
    echo "Error al actualizar el registro: " . $stmt->errorInfo()[2];
}
?>
