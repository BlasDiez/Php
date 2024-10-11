<?php

$cadena = "No se puede estar en misa y repicando";

echo countCharacters($cadena) . " letras <br>";
echo countBlankSpaces($cadena) . " espacios en blanco <br>";
echo str_word_count($cadena) . " palabras <br><br>";

printWords($cadena);

function countCharacters($cadena): int {
    return strlen($cadena);
}

function countBlankSpaces($cadena): int {

    $totalBlankSpaces = 0;

    for($i = 0; $i < strlen($cadena); $i++) {
        if($cadena[$i] == " ") {
            ++$totalBlankSpaces;
        }
    }

    return $totalBlankSpaces;
}


function printWords($cadena): void {

    $words = explode(" ", $cadena);

    foreach ($words as $word) {
        echo $word . " " . strlen($word) . " letras<br>";
    }

}