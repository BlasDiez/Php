<?php

    const PRECIO_JUDIAS   = 3.50;
    $pesoJudias           = 1.21;
    $costeJudias          = number_format(PRECIO_JUDIAS * $pesoJudias, 2);
    const PRECIO_PATATAS  = 0.40;
    $pesoPatatas          = 1.73;
    $costePatatas         = number_format(PRECIO_PATATAS * $pesoPatatas, 2 );
    const PRECIO_TOMATES  = 1.00;
    $pesoTomates          = 2.08;
    $costeTomates         = number_format(PRECIO_TOMATES * $pesoTomates, 2);
    const PRECIO_MANZANAS = 1.20;
    $pesoManzanas         = 2.15;
    $costeManzanas        = number_format(PRECIO_MANZANAS * $pesoManzanas, 2);
    const PRECIO_UVAS     = 2.50;
    $pesoUvas             = 0.77;
    $costeUvas            = number_format(PRECIO_UVAS * $pesoUvas, 2);

    echo "Producto - Precio/Kg - Peso/kg - Precio/€ <br>";
    echo "Judías - " . PRECIO_JUDIAS . " - " . $pesoJudias . " - " . $costeJudias . "<br>";
    echo "Patatas - " . PRECIO_PATATAS . " - " . $pesoPatatas . " - " . $costePatatas . "<br>";
    echo "Tomates - " . PRECIO_TOMATES . " - " . $pesoTomates . " - " . $costeTomates . "<br>";
    echo "Manzanas - " . PRECIO_MANZANAS . " - " . $pesoManzanas . " - " . $costeManzanas . "<br>";
    echo "Uvas - " . PRECIO_UVAS . " - " . $pesoUvas . " - " . $costeUvas;

?>