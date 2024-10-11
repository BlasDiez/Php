<?php

$minusLetters = [];

for($i = 97; $i < 122; $i++) {
    $minusLetters[] = chr($i);
}

foreach ($minusLetters as $letter) {
        echo $letter;
    }

echo "<br>";

foreach ($minusLetters as $letter) {
    echo strtoupper($letter);
}
