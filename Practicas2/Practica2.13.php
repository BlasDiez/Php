<?php

function codificar($phrase, $displacement): string {

    $codifiedPhrase = "";

    for($i = 0; $i < strlen($phrase); $i++) {

        if($phrase[$i] == " ") {

            $codifiedPhrase .= " ";
        }
        else {

            $codifiedPhrase .= chr(codificarLetra($phrase[$i], $displacement));
        }
    }

    return $codifiedPhrase;
}

function decodificar($phrase, $displacement): string {

    $deCodifiedPhrase = "";

    for($i = 0; $i < strlen($phrase); $i++) {

        if($phrase[$i] == " ") {

            $deCodifiedPhrase .= " ";
        }
        else {

            $deCodifiedPhrase .= chr(decodificarLetra($phrase[$i], $displacement));
        }
    }

    return $deCodifiedPhrase;
}
function codificarLetra($letter, $displacement): int {

    $asciiValue = ord($letter);

    if ($asciiValue >= ord('a') && $asciiValue <= ord('z')) {

        return ord('a') + (($asciiValue - ord('a') + $displacement) % 26);
    }

    return $asciiValue;
}

function decodificarLetra($letter, $displacement): int {

    $asciiValue = ord($letter);

    if ($asciiValue >= ord('a') && $asciiValue <= ord('z')) {

        return ord('a') + (($asciiValue - ord('a') - $displacement) % 26);
    }

    return $asciiValue;
}


