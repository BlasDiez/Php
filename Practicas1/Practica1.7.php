<?php

    const EARTH_RADIUS_KM = 6378;
    const DISTANCE_EARTH_TO_SUN_KM = 150000000;
    const PI = 3.1415926535897932384626433;

    // Calculate Earth's circumference (2 * pi * radius)
    $earthCircumference = 2 * PI * EARTH_RADIUS_KM;
    // Calculate how many Earth circumferences equal the distance to the Sun
    $equivalentRevolutions = DISTANCE_EARTH_TO_SUN_KM / $earthCircumference;

    // Improved output with formatting and clear descriptions
    echo "Circunferencia de la tierra: "
        . number_format($earthCircumference, 2)
        . " km<br>";
    echo "Distancia de la tierra al sol: "
        . number_format(DISTANCE_EARTH_TO_SUN_KM)
        . " km<br>";
    echo "Vueltas a la tierra hasta el sol: "
        . number_format($equivalentRevolutions, 2);

?>