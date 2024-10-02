<?php
const ERROR_MESSAGE = "ERROR";

// Entrada: $firstNumber = 7, $secondNumber = 0, $limit = 10
$firstNumber  = 7;  // Primer número de la serie
$secondNumber = 0;  // Segundo número de la serie
$limit        = 10; // Límite de números en la serie

if($limit < 2) {
    echo ERROR_MESSAGE;
    exit;
}

// El límite es mayor o igual a 2, entonces no hay error.
// Se imprimen los dos primeros números de la serie: 7 0
echo $firstNumber . " " . $secondNumber . " ";

// Comienza la serie de suma consecutiva a partir del índice 2 (los dos primeros ya están impresos)
for($i = 2; $i < $limit; $i++) {
    // Paso 1: $firstNumber = 7, $secondNumber = 0
    // Suma: 7 + 0 = 7
    $sumNumbers = $firstNumber + $secondNumber;
    echo $sumNumbers . " "; // Se imprime el resultado: 7

    // Actualizar valores para la siguiente iteración
    // $firstNumber = 0, $secondNumber = 7
    $firstNumber = $secondNumber;
    $secondNumber = $sumNumbers;

    // Paso 2: $firstNumber = 0, $secondNumber = 7
    // Suma: 0 + 7 = 7
    // Se imprime el resultado: 7

    // Paso 3: $firstNumber = 7, $secondNumber = 7
    // Suma: 7 + 7 = 14
    // Se imprime el resultado: 14

    // Paso 4: $firstNumber = 7, $secondNumber = 14
    // Suma: 7 + 14 = 21
    // Se imprime el resultado: 21

    // Paso 5: $firstNumber = 14, $secondNumber = 21
    // Suma: 14 + 21 = 35
    // Se imprime el resultado: 35

    // Paso 6: $firstNumber = 21, $secondNumber = 35
    // Suma: 21 + 35 = 56
    // Se imprime el resultado: 56

    // Paso 7: $firstNumber = 35, $secondNumber = 56
    // Suma: 35 + 56 = 91
    // Se imprime el resultado: 91

    // Paso 8: $firstNumber = 56, $secondNumber = 91
    // Suma: 56 + 91 = 147
    // Se imprime el resultado: 147
}

// Resultado final para la entrada 7, 0 y límite 10: 7 0 7 7 14 21 35 56 91 147
?>
