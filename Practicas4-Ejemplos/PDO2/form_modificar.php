<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Datos</title>
</head>
<body>
    <?php
    include 'conexion.php'; 
    $link = conectar(); // Establecer conexión
    // Obtener los datos de los socios
    try {
        $sql = "SELECT nombre, email, telefono, direccion FROM socios"; 
        $stmt = $link->prepare($sql); // Preparar la consulta
        $stmt->execute(); // Ejecutar la consulta
      // Mostrar los datos en una tabla
        echo "<table border='1'>\n";
        echo "<tr><th>Nombre</th><th>Correo electrónico</th><th>Teléfono</th><th>Dirección</th></tr>\n";   
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>\n";
            echo "<td>{$row['nombre']}</td>\n";
            echo "<td>{$row['email']}</td>\n";
            echo "<td>{$row['telefono']}</td>\n";
            echo "<td>{$row['direccion']}</td>\n";
            echo "</tr>\n";
        }
        echo "</table>\n";
    } catch (PDOException $e) {
        echo "Error al obtener los datos: " . $e->getMessage();
    }
    $link = null; // Cerrar la conexión
    ?>   
    <br><br>Indica el nombre del usuario que quieres modificar y cambia los datos:<br>
    <form method="post" action="modificar.php" name="f1">
        <label for="nombre">Nombre:</label>
        <input id="nombre" maxlength="30" size="40" name="nombre" required><br><br>     
        <label for="correo">Correo electrónico:</label>
        <input id="correo" maxlength="30" size="30" name="correo" required><br><br>  
        <label for="telefono">Teléfono:</label>
        <input id="telefono" maxlength="15" size="20" name="telefono" required><br><br>
        <label for="direccion">Dirección:</label>
        <input id="direccion" maxlength="40" size="40" name="direccion"><br><br>
        <input name="Borrar" value="Vaciar campos" type="reset">
        <input name="Enviar" value="Modificar datos" type="submit"><br>
    </form>
</body>
</html>
