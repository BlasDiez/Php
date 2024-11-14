<?php
// Incluir el archivo que establece la conexión a la base de datos
include 'conectar_bd.php';
// Variables con los datos a insertar en la tabla 'empleados'
$id = 6;
$nombre = "Paulina";
$puesto = "Analista";
$fecha_nacimiento = "1998-01-01";
$salario = 2000;
// Preparación de la consulta SQL
$stmt = $con->prepare("INSERT INTO empleados (id, nombre, puesto, fecha_nacimiento, salario) VALUES (:id, :nombre, :puesto, :fecha_nac, :sal)");
// Ejecución de la consulta y verificación
if ($stmt->execute(array(
    ':id' => $id,
    ':nombre' => $nombre,
    ':puesto' => $puesto,
    ':fecha_nac' => $fecha_nacimiento,
    ':sal' => $salario
))) {
    echo "¡Registro creado satisfactoriamente!";
} else {
    echo "Error al crear el registro.";
}
