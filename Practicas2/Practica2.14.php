<?php

include("Practica2.13b.php");

$ciudades = array("Aspe", "Alicante", "Murcia", "Novelda", "Elche");
$codificado = array();
$decodificado = array();

for($i = 0; $i < count($ciudades); $i++) {
    $codificado[] = codificar($ciudades[$i], 1);
}

for($i = 0; $i < count($codificado); $i++) {
    $decodificado[] = decodificar($codificado[$i], 1);
}

echo "<b>Palabras sin codificar</b><br>";
foreach($ciudades as $ciudad) {
    echo $ciudad . " ";
}

echo "<br>";
echo "<b>Palabras tras codificar</b><br>";

foreach ($codificado as $ciudadCodificada) {
    echo $ciudadCodificada . " ";
}

echo "<br>";
echo "<b>Palabras tras decodificar</b><br>";

foreach ($decodificado as $ciudadDecodificada) {
    echo $ciudadDecodificada . " ";
}
