<?php
require_once 'ConectarDB.php';

class Cliente {
    private $db;
    public $dni;
    public $nombre;
    public $direccion;
    public $localidad;
    public $provincia;
    public $telefono;
    public $email;
    public $contrasena;
    public $rol;

    public function __construct() {
        $this->db = ConectarDB::conexion();
    }

    public function crearUsuario($datos) {
        try {
            $stmt = $this->db->prepare("INSERT INTO clientes (dni, nombre, direccion, localidad, provincia, telefono, email, contrasena, rol) VALUES (:dni, :nombre, :direccion, :localidad, :provincia, :telefono, :email, :contrasena, :rol)");
            $stmt->execute($datos);
        } catch (PDOException $e) {
            echo "Error al crear usuario: " . $e->getMessage();
        }
    }

    public function buscarPorDni($dni) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM clientes WHERE dni = :dni");
            $stmt->execute(['dni' => $dni]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al buscar cliente: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerTodosLosClientes() {
        $clientes = [];
        try {
            $stmt = $this->db->query("SELECT * FROM clientes");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cliente = new Cliente();
                $cliente->dni = $row['dni'];
                $cliente->nombre = $row['nombre'];
                $cliente->direccion = $row['direccion'];
                $cliente->localidad = $row['localidad'];
                $cliente->provincia = $row['provincia'];
                $cliente->telefono = $row['telefono'];
                $cliente->email = $row['email'];
                $clientes[] = $cliente;
            }
        } catch (PDOException $e) {
            echo "Error al obtener clientes: " . $e->getMessage();
        }
        return $clientes;
    }

    public function obtenerClientesOrdenadosPorNombre() {
        $clientes = [];
        try {
            $stmt = $this->db->query("SELECT * FROM clientes ORDER BY nombre ASC");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cliente = new Cliente();
                $cliente->dni = $row['dni'];
                $cliente->nombre = $row['nombre'];
                $cliente->direccion = $row['direccion'];
                $cliente->localidad = $row['localidad'];
                $cliente->provincia = $row['provincia'];
                $cliente->telefono = $row['telefono'];
                $cliente->email = $row['email'];
                $clientes[] = $cliente;
            }
        } catch (PDOException $e) {
            echo "Error al ordenar clientes: " . $e->getMessage();
        }
        return $clientes;
    }
}
?>
