<?php
// Incluir el archivo para la conexión a la base de datos
include 'conectar_bd.php';
?>
<table border="1">
    <tr>
        <td>Id</td>
        <td>Nombre</td>
        <td>Puesto</td>
        <td>Fecha de Nacimiento</td>
        <td>Salario</td>
    </tr>
<?php
// Preparación y ejecución de la consulta
$stmt = $con->prepare("SELECT * FROM empleados");
$stmt->execute();
// Iteración sobre cada fila obtenida de la consulta
while ($fila = $stmt->fetch()) {
    echo "<tr>";
    echo "<td>{$fila['id']}</td>";              
    echo "<td>{$fila['nombre']}</td>";          
    echo "<td>{$fila['puesto']}</td>";          
    echo "<td>{$fila['fecha_nacimiento']}</td>";
    echo "<td>{$fila['salario']}</td>";         
    echo "</tr>";
}
?>
</table>
