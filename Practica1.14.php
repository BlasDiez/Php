<?php

    $numbers             = [2, 5, 7, 8, 1, 7, 0, 2];
    $objetiveNumber      = 7;
    $sumNumbers          = array_sum($numbers);
    $countNumbers        = count($numbers);
    $maxNumbersValue     = max($numbers);
    $oddNumbersCounter   = 0;
    $evenNumbersCounter  = 0;
    $objetiveNumberCount = 0;

    foreach ($numbers as $number) {

        $number % 2 == 0 ? ++$evenNumbersCounter : ++$oddNumbersCounter;

        if($number == $objetiveNumber) {
            ++$objetiveNumberCount;
        }
    }

    echo "\"La suma de los valores es\" " . $sumNumbers . "\"<br>";
    echo "\"Total de números insertados " . $countNumbers . "\"<br>";
    echo "\"El número de valores impares es " . $oddNumbersCounter . "\"<br>";
    echo "\"El número objetivo 7 se insertó " . $objetiveNumberCount . " veces" . "\"<br>";
    echo "\"El máximo valor insertado es " . $maxNumbersValue . "\"<br>";

?>