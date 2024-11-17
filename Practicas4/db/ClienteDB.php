<?php
require_once __DIR__ . '/ConectarDB.php';
require_once __DIR__ . '/../modelos/Cliente.php';

class ClienteDB {
    private $db;

    public function __construct() {
        $this->db = ConectarDB::conectar();
    }

    public function crear($datos): bool
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO clientes (dni, nombre, direccion, localidad, provincia, telefono, email, password_hash, rol) VALUES (:dni, :nombre, :direccion, :localidad, :provincia, :telefono, :email, :contrasena, :rol)");
            $stmt->execute($datos);
            return true;
        } catch (PDOException $e) {
            echo "Error al crear cliente: " . $e->getMessage();
            return false;
        }
    }

    public function buscarPorDni($dni): Cliente | bool | null {
        try {
            $stmt = $this->db->prepare("SELECT * FROM clientes WHERE dni = :dni");
            $stmt->execute(['dni' => $dni]);
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            if (empty($resultado)) {
                return null;
            }

            return $this->resultadoACliente($resultado);
        } catch (PDOException $e) {
            echo "Error al buscar cliente: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerOrdenadosPorNombre($order): array | bool {
        $clientes = [];
        try {
            $stmt = $this->db->query("SELECT * FROM clientes ORDER BY nombre $order");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cliente = $this->resultadoACliente($row);
                $clientes[] = $cliente;
            }
            return $clientes;
        } catch (PDOException $e) {
            echo "Error al ordenar clientes: " . $e->getMessage();
            return false;
        }
    }

    public function borrar($dni): bool {
        try {
            $stmt = $this->db->prepare("DELETE FROM clientes WHERE dni = :dni");
            $stmt->execute(['dni' => $dni]);
            return true;
        } catch (PDOException $e) {
            echo "Error al borrar cliente: " . $e->getMessage();
            return false;
        }
    }

    public function resultadoACliente(mixed $result): Cliente
    {
        $cliente = new Cliente();
        $cliente->dni = $result['dni'];
        $cliente->nombre = $result['nombre'];
        $cliente->direccion = $result['direccion'];
        $cliente->localidad = $result['localidad'];
        $cliente->provincia = $result['provincia'];
        $cliente->telefono = $result['telefono'];
        $cliente->email = $result['email'];
        $cliente->password_hash = $result['password_hash'];
        $cliente->rol = $result['rol'];
        return $cliente;
    }

    public function actualizar($dni, $datos): bool
    {
        try {
            if (isset($datos['contrasena']) && !empty($datos['contrasena'])) {
                $datos['contrasena'] = password_hash($datos['contrasena'], PASSWORD_DEFAULT);
                $sql = "UPDATE clientes SET nombre = :nombre, direccion = :direccion, localidad = :localidad, 
                        provincia = :provincia, telefono = :telefono, email = :email, password_hash = :contrasena 
                        WHERE dni = :dni";
            } else {
                $sql = "UPDATE clientes SET nombre = :nombre, direccion = :direccion, localidad = :localidad, 
                        provincia = :provincia, telefono = :telefono, email = :email WHERE dni = :dni";
            }

            $stmt = $this->db->prepare($sql);
            $datos['dni'] = $dni;
            $stmt->execute($datos);

            return true;
        } catch (PDOException $e) {
            echo "Error al actualizar cliente: " . $e->getMessage();
            return false;
        }
    }
}
?>
