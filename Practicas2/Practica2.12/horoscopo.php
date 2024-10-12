<?php

$horoscopeSelection = $_GET['HoroscopeSelection'] ?? "Aries";

$horoscopeDates = array(
    "Aries" => "21/03 - 19/04",
    "Tauro" => "20/04 - 20/05",
    "Géminis" => "21/05 - 20/06",
    "Cáncer" => "21/06 - 22/07",
    "Leo" => "23/07 - 22/08",
    "Virgo" => "23/08 - 22/09",
    "Libra" => "23/09 - 22/10",
    "Escorpio" => "23/10 - 21/11",
    "Sagitario" => "22/11 - 21/12",
    "Capricornio" => "22/12 - 19/01",
    "Acuario" => "20/01 - 18/02",
    "Piscis" => "19/02 - 20/03"
);

$horoscopeSymbols = array(
    "Aries" => "♈",
    "Tauro" => "♉",
    "Géminis" => "♊",
    "Cáncer" => "♋",
    "Leo" => "♌",
    "Virgo" => "♍",
    "Libra" => "♎",
    "Escorpio" => "♏",
    "Sagitario" => "♐",
    "Capricornio" => "♑",
    "Acuario" => "♒",
    "Piscis" => "♓"
);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['HoroscopeSelection'])) {
        echo "<h1>" . $horoscopeSelection . "</h1>"; // Escapar caracteres especiales
        echo "Fechas: " . $horoscopeDates[$horoscopeSelection] . "<br>"; // Mostrar fechas
        echo "Símbolo: " . $horoscopeSymbols[$horoscopeSelection]; // Mostrar símbolo
    }
}
?>
