<?php

class Persona {

protected $nombre; protected $edad;

public function cargar($nom, $ed) {
$this->nombre = $nom;
$this->edad = $ed;
}

public function imprimir() {
echo "La persona ".$this->nombre." tiene ".$this->edad." años.<br/>";
}

}

$persona_1 = new Persona();
$persona_1->cargar("Pablo", 35);
$persona_2 = new Persona();
$persona_2->cargar("Juan", 40);
$persona_3 = new Persona();
$persona_3->cargar("Ana", 30);
$array = array($persona_1, $persona_2, $persona_3); echo "Array original:<br/>";
for($i = 0; $i < count($array); $i++) {
$array[$i]->imprimir();
}
 
$array_copia = $array;
$array_copia[0]->cargar("Pablo_cambiado", 135);
$array_copia[1]->cargar("Juan_cambiado", 140);
$array_copia[2]->cargar("Ana_cambiado", 130);

echo "<br/>";
echo "Array copia:<br/>";

for($i = 0; $i < count($array); $i++) {

$array_copia[$i]->imprimir();

}
echo "Array original:<br/>";
for($i = 0; $i < count($array); $i++) {

$array[$i]->imprimir();
}

//Como clonar un array de objetos de manera correctamente

$array_clonado = array(); foreach($array_copia as $valor) {
$array_clonado[] = clone($valor); //hago un clonado en cada posición del array

}
//ahora modifico los objetos del array clonado

$array_clonado[0]->cargar("Pablo_clonado", 1135);
$array_clonado[1]->cargar("Juan_clonado", 1140);
$array_clonado[2]->cargar("Ana_clonado", 1130);

echo "<br/>";
echo "Array copia:<br/>";
for($i = 0; $i < count($array); $i++) {
$array_copia[$i]->imprimir();
}

echo "Array clonado:<br/>";

for($i = 0; $i < count($array); $i++) {
$array_clonado[$i]->imprimir();
}

?>
