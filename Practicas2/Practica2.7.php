<?php

$phrase = strtolower("Perro ladrador poco mordedor");
$codifiedPhrase = "";
$displacement = 3;

for($i = 0; $i < strlen($phrase); $i++) {

    if($phrase[$i] == " ") {

        $codifiedPhrase .= " ";
    }
    else {

        $codifiedPhrase .= chr(charCodification($phrase[$i], $displacement));
    }
}

echo "FRASE: " . $phrase . "<br>";
echo "FRASE CODIFICADA: " . $codifiedPhrase;

function charCodification($letter, $displacement): int {

    $asciiValue = ord($letter);

    if ($asciiValue >= ord('a') && $asciiValue <= ord('z')) {

        return ord('a') + (($asciiValue - ord('a') + $displacement) % 26);
    }

    return $asciiValue;
}
