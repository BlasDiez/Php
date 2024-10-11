<?php

    $totalIterations = 5;
    $concatenated    = "";

    for($i = 1; $i <= $totalIterations; $i++) {
        $concatenated .= $i . " ";
        echo $concatenated . "<br>";
    }

?>