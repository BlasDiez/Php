<html>
<head>
    <title>formulario</title>
</head>
<body>
    <form method="post" action="insertar.php" name="f1">
        Nombre: <input maxlength="30" size="40" name="nombre" required><br><br>
        Correo electrónico: <input maxlength="30" size="30" name="correo"type=”email” required><br><br>
        Teléfono: <input maxlength="15" size="20" name="telefono" required><br><br>
        Dirección: <input maxlength="40" size="40" name="direccion"><br><br>
        <input name="Borrar" value="Vaciar campos" type="reset">&nbsp;&nbsp;&nbsp; 
        <input name="Enviar" value="Enviar datos" type="submit"><br>
    </form>
</body>
</html>