<?php

$phrase = strtolower("Perro ladrador poco mordedor");
$codifiedPhrase = "";

for($i = 0; $i < strlen($phrase); $i++) {

    if($phrase[$i] == " ") {

        $codifiedPhrase .= " ";
    }
    else {

        $codifiedPhrase .= chr(codification($phrase[$i]));
    }
}

echo "FRASE: " . $phrase . "<br>";
echo "FRASE CODIFICADA: " . $codifiedPhrase;

function codification($letter): int {

    $asciiValue = ord($letter);

    if ($asciiValue >= ord('a') && $asciiValue <= ord('z')) {

        return ord('a') + ($asciiValue - ord('a') + 1) % 26;
    }
    return $asciiValue;
}
