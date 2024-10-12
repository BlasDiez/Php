<?php

$dollars = 50.0;
$euros = 50.0;

echo $dollars . "$ = " . dolares_a_euros(50) . "€<br>";
echo $euros . "€ = " . euros_a_dolares(50) . "$<br>";

function dolares_a_euros($dolares): float {
    $rateUsdToEur = 0.9134;
    return $dolares * $rateUsdToEur;
}

function euros_a_dolares($euros): float {
    $rateEurToUsd = 1.0944;
    return $euros * $rateEurToUsd;
}