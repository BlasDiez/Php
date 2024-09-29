<?php

    const PRECIO_JUDIAS   = 3.50;
    const PRECIO_PATATAS  = 0.40;
    const PRECIO_TOMATES  = 1.00;
    const PRECIO_MANZANAS = 1.20;
    const PRECIO_UVAS     = 2.50;

    $fruta = "Aguacates";

    switch ($fruta) {
        case "Judias":
            echo "El precio de las judías es de " . PRECIO_JUDIAS . "€/kg";
            break;
        case "Patatas":
            echo "El precio de las patatas es de " . PRECIO_PATATAS . "€/kg";
            break;
        case "Tomates":
            echo "El precio de los tomates es de " . PRECIO_TOMATES . "€/kg";
            break;
        case "Manzanas":
            echo "El precio de las manzanas es de " . PRECIO_MANZANAS . "€/kg";
            break;
        case "Uvas":
            echo "El precio de las uvas es de " . PRECIO_UVAS . "€/kg";
            break;
        default:
            echo "No quedan existencias de esta fruta";
    }

?>