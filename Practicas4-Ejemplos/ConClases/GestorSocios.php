<?php
class GestorSocios {
    private $db;
    //Constructor base datos
    public function __construct($db) {
        $this->db = $db;
    }
//Para insertar los datos de los socios
public function insertar(Socio $socio) {
    $sql = "INSERT INTO socios (nombre, email, telefono, direccion) VALUES (:nombre, :email, :telefono, :direccion)";
    try {
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre', $socio->getNombre());
        $stmt->bindValue(':email', $socio->getCorreo());
        $stmt->bindValue(':telefono', $socio->getTelefono());
        $stmt->bindValue(':direccion', $socio->getDireccion());

        if ($stmt->execute()) {
            return "Los datos han sido introducidos satisfactoriamente";
        } else {
            return "Ha habido un error al insertar los valores.";
        }
    } catch (PDOException $e) {
        return "Error al insertar los valores: " . $e->getMessage();
    }
}

//Para mostrar los datos de los socios
    public function mostrar() {
        $sql = "SELECT nombre, email, telefono, direccion FROM socios";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $socios = [];
            foreach ($result as $row) {
                $socios[] = new Socio($row['nombre'], $row['email'], $row['telefono'], $row['direccion']);
            }
            return $socios;
        } catch (PDOException $e) {
            return "Error en la consulta: " . $e->getMessage();
        }
    }
//Para buscar los datos a partir del nombre
    public function buscar($cadena) {
        $sql = "SELECT * FROM socios WHERE nombre LIKE :cadena ORDER BY nombre";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':cadena', "%$cadena%", PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $socios = [];
            foreach ($result as $row) {
                $socios[] = new Socio($row['nombre'], $row['email'], $row['telefono'], $row['direccion']);
            }
            return $socios;
        } catch (PDOException $e) {
            return "Error en la búsqueda: " . $e->getMessage();
        }
    }
//Para modificar los datos a partir del nombre del socio
    public function modificar(Socio $socio) {
        $sql = "UPDATE socios SET email = :correo, telefono = :telefono, direccion = :direccion WHERE nombre = :nombre";
        try {
            $stmt = $this->db->prepare($sql);
            $nombre = $socio->getNombre();
            $correo = $socio->getCorreo();
            $telefono = $socio->getTelefono();
            $direccion = $socio->getDireccion();
            $stmt->bindParam(':correo',  $correo);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':nombre', $nombre);

            if ($stmt->execute()) {
                return "Los datos han sido actualizados satisfactoriamente";
            } else {
                return "No se pudieron actualizar los datos.";
            }
        } catch (PDOException $e) {
            return "Ha habido un error al actualizar los valores: " . $e->getMessage();
        }
    }
//Para eliminar los datos a partir del nombre del socio
    public function eliminar($nombre) {
        $sql = "DELETE FROM socios WHERE nombre = :nombre";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);

            if ($stmt->execute()) {
                return "El socio ha sido eliminado satisfactoriamente";
            } else {
                return "No se pudo eliminar el socio.";
            }
        } catch (PDOException $e) {
            return "Error al eliminar el socio: " . $e->getMessage();
        }
    }
}
?>
