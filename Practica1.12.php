<?php

    for($i = 0; $i <= 23; $i++) {
        for ($j = 0; $j <= 59; $j++) {

            //También se podría utilizar la función sprintf de la siguiente forma: sprintf("%02d:%02d", $i, $j) . "<br>";
            $formatedHour   = ($i < 10) ? "0" . $i : $i;
            $formatedMinute = ($j < 10) ? "0" . $j : $j;
            echo $formatedHour . ":" . $formatedMinute . "<br>";

        }
    }
?>