<?php
const ERROR_MESSAGE = "ERROR";

// Entrada: $firstNumber = 5, $secondNumber = 11, $limit = 5
$firstNumber  = 5;  // Primer número de la serie
$secondNumber = 11; // Segundo número de la serie
$limit        = 5;  // Límite de números en la serie

// Verifico si el límite es menor a 2
if($limit < 2) {
    echo ERROR_MESSAGE;
    exit;
}

// El límite es mayor o igual a 2, entonces no hay error.
// Se imprimen los dos primeros números de la serie: 5 11
echo $firstNumber . " " . $secondNumber . " ";

// Comienza la serie de suma consecutiva a partir del índice 2 (los dos primeros ya están impresos)
for($i = 2; $i < $limit; $i++) {
    // Paso 1: $firstNumber = 5, $secondNumber = 11
    // Suma: 5 + 11 = 16
    $sumNumbers = $firstNumber + $secondNumber;
    echo $sumNumbers . " "; // Se imprime el resultado: 16

    // Actualizar valores para la siguiente iteración
    // $firstNumber = 11, $secondNumber = 16
    $firstNumber = $secondNumber;
    $secondNumber = $sumNumbers;

    // Paso 2: $firstNumber = 11, $secondNumber = 16
    // Suma: 11 + 16 = 27
    // Se imprime el resultado: 27

    // Paso 3: $firstNumber = 16, $secondNumber = 27
    // Suma: 16 + 27 = 43
    // Se imprime el resultado: 43
}

// Resultado final para la entrada 5, 11 y límite 5: 5 11 16 27 43
?>
