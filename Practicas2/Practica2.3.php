<?php

$nif = "74006770s";
$nifNumbers = substr($nif, 0, 8);
$nifLetter = strtoupper(substr($nif, 8, 9));

//Compruebo que el NIF tenga 9 caracteres
if(strlen($nif) != 9) {

    echo "¡ERROR! El NIF debe tener 8 números y 1 letra.";
    exit();
}

//Compruebo que los 8 primeros caracteres sean números y el último una letra
if(!isNumber($nifNumbers) || !isValidCharacter($nifLetter)) {

    echo "Caracteres del NIF incorrectos.";
    exit();
}

//Compruebo si el NIF es válido
if(NifIsValid($nifNumbers, $nifLetter)) {

    echo "NIF $nifNumbers$nifLetter VALIDO";
}
else {

    echo "NIF NO VÁLIDO, NO CONCUERDA EL NÚMERO CON LA LETRA";
}

function NifIsValid($nifNumbers, $nifLetter): bool {

    $validNifLetters = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];

    if($validNifLetters[$nifNumbers % 23] == $nifLetter) {

        return true;
    }
    else {

        return false;
    }
}

function isNumber($nifNumbers): bool {

    for($i = 0; $i < strlen($nifNumbers); $i++) {

        if(ord($nifNumbers[$i]) < 48 || ord($nifNumbers[$i]) > 57) {

            return false;
        }
    }

    return true;
}

function isValidCharacter($nifLetter): bool {

    if(ord($nifLetter) < 65 || ord($nifLetter) > 90) {

        return false;
    }

    return true;
}