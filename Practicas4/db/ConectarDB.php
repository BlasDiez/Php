<?php
class ConectarDB {

    private static $conexion=null;
    private static $servername = "localhost";
    private static $dbname = "usuarios";
    private static $username = "root";
    private static $password = "";
    public static function conectar() {
        if (self::$conexion) {
            return self::$conexion;
        }

        try {
            $dns = "mysql:host=" . self::$servername . ";dbname=" . self::$dbname . ";charset=UTF8";
            $mOptions=array(
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => FALSE,

            );
            self::$conexion=new PDO($dns, self::$username, self::$password, $mOptions);
            return self::$conexion;
            }
        catch(PDOException $e)
        {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public static function desconectar() {
        self::$conexion = null;
    }
}
?>
