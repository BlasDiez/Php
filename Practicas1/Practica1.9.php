<?php

    const PRECIO_JUDIAS   = 3.50;
    const PRECIO_PATATAS  = 0.40;
    const PRECIO_TOMATES  = 1.00;
    const PRECIO_MANZANAS = 1.20;
    const PRECIO_UVAS     = 2.50;
    const PRECIO_A_COMPARAR = 1.50;

    echo "Artículos que cuestan menos de 1.50€: <br>";

    if(PRECIO_JUDIAS < PRECIO_A_COMPARAR) {
        echo "Judias <br>";
    }

    if(PRECIO_PATATAS < PRECIO_A_COMPARAR) {
        echo "Patatas <br>";
    }

    if(PRECIO_TOMATES < PRECIO_A_COMPARAR) {
        echo "Tomates <br>";
    }

    if(PRECIO_MANZANAS < PRECIO_A_COMPARAR) {
        echo "Manzanas <br>";
    }

    if(PRECIO_UVAS < PRECIO_A_COMPARAR) {
        echo "Uvas <br>";
    }


?>