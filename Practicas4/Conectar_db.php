<?php
class ConectarDB {
    public static function conexion() {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=nombre_base_datos", "usuario", "contraseña");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>
