<?php

function procesarFrase($phrase, $displacement): string {
    $processedPhrase = "";

    // Ajustar el desplazamiento a un rango válido dentro de las letras del alfabeto
    $displacement = $displacement % 26;

    for ($i = 0; $i < strlen($phrase); $i++) {
        $currentChar = $phrase[$i];

        if ($currentChar == " ") {
            $processedPhrase .= " "; // Mantener espacios sin cambios
        } else {
            // Codificar o decodificar la letra según el desplazamiento
            $processedPhrase .= procesarLetra($currentChar, $displacement);
        }
    }

    return $processedPhrase;
}

function procesarLetra($letter, $displacement): string {
    $asciiValue = ord($letter);

    if ($asciiValue >= ord('a') && $asciiValue <= ord('z')) {
        // Letras minúsculas
        return chr(ord('a') + ( ($asciiValue - ord('a') + $displacement + 26) % 26 ));
    } elseif ($asciiValue >= ord('A') && $asciiValue <= ord('Z')) {
        // Letras mayúsculas
        return chr(ord('A') + ( ($asciiValue - ord('A') + $displacement + 26) % 26 ));
    }

    // Mantener caracteres no alfabéticos sin cambios
    return $letter;
}

function codificar($phrase, $displacement): string {
    return procesarFrase($phrase, $displacement);
}

function decodificar($phrase, $displacement): string {
    return procesarFrase($phrase, -$displacement); // Solo invertir el desplazamiento
}

/*
$fraseOriginal = "Aspe Alicante Murcia Novelda Elche";
$desplazamiento = -1;

$fraseCodificada = codificar($fraseOriginal, $desplazamiento);
echo "Frase codificada: " . $fraseCodificada . "<br>";

$fraseDecodificada = decodificar($fraseCodificada, $desplazamiento);
echo "Frase decodificada: " . $fraseDecodificada . "<br>";*/

