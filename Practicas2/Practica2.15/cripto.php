<?php

function procesarFrase($phrase, $displacement): string {

    $processedPhrase = "";
    $displacement = $displacement % 26;

    for ($i = 0; $i < strlen($phrase); $i++) {

        $currentChar = $phrase[$i];

        if ($currentChar == " ") {
            $processedPhrase .= " ";
        } else {
            $processedPhrase .= procesarLetra($currentChar, $displacement);
        }
    }

    return $processedPhrase;
}

function procesarLetra($letter, $displacement): string {

    $asciiValue = ord($letter);

    if ($asciiValue >= ord('a') && $asciiValue <= ord('z')) {

        return chr(ord('a') + ( ($asciiValue - ord('a') + $displacement + 26) % 26 ));

    } elseif ($asciiValue >= ord('A') && $asciiValue <= ord('Z')) {

        return chr(ord('A') + ( ($asciiValue - ord('A') + $displacement + 26) % 26 ));
    }

    return $letter;
}

function codificar($phrase, $displacement): string {
    return procesarFrase($phrase, $displacement);
}

function decodificar($phrase, $displacement): string {
    return procesarFrase($phrase, -$displacement);
}
