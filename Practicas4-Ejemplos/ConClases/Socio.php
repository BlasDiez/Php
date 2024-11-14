<?php
class Socio {
    private $nombre;
    private $correo;
    private $telefono;
    private $direccion;

    //Constructor
    public function __construct($nombre, $correo, $telefono, $direccion) {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
    }
    // Getters y setters para cada atributo
    public function getNombre() {
        return $this->nombre;
    }
    public function getCorreo() {
        return $this->correo;
    }
    public function getTelefono() {
        return $this->telefono;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function setCorreo($correo) {
        $this->correo = $correo;
    }
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
}
