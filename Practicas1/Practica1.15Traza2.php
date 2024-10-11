<?php
const ERROR_MESSAGE = "ERROR";

// Entrada: $firstNumber = 6, $secondNumber = 7, $limit = 1
$firstNumber  = 6;  // Primer número de la serie
$secondNumber = 7;  // Segundo número de la serie
$limit        = 1;  // Límite de números en la serie

if($limit < 2) {
    // El límite es menor a 2, por lo tanto se imprime el mensaje de error y se detiene la ejecución.
    echo ERROR_MESSAGE;
    exit;
}

// No se llega a ejecutar más código, ya que el programa finaliza por el límite inválido.