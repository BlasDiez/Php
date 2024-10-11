<?php
    const ERROR_MESSAGE = "ERROR";

    $firstNumber  = 5;
    $secondNumber = 11;
    $limit        = 5;

    if($limit < 2) {
        echo ERROR_MESSAGE;
        exit;
    }

    echo $firstNumber . " " . $secondNumber . " ";

    for($i = 2; $i < $limit; $i++) {
        $sumNumbers = $firstNumber + $secondNumber;
        echo $sumNumbers . " ";

        $firstNumber = $secondNumber;
        $secondNumber = $sumNumbers;
    }

?>