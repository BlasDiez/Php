<?php

$nombres = array("Blas", "María", "Pedro", "Juan", "Fulanita");
$personas = array("Blas" => 1.70,
                  "María" => 1.60,
                  "Pedro" => 1.57,
                  "Juan" => 1.68,
                  "Fulanita" => 1.85);

foreach ($nombres as $nombre){
    echo "$nombre mide {$personas[$nombre]} m <br>";
}