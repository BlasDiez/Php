<?php

    const PRECIO_JUDIAS   = 3.50;
    const PRECIO_PATATAS  = 0.40;
    const PRECIO_TOMATES  = 1.00;
    const PRECIO_MANZANAS = 1.20;
    const PRECIO_UVAS     = 2.50;

    echo "Comparación de precios individuales: <br>";

    if(PRECIO_JUDIAS < PRECIO_TOMATES) {
        echo "Las judías son más baratas que los tomates <br>";
    } else {
        echo "Los tomates son más baratos que las judías <br>";
    }

    if(PRECIO_JUDIAS < PRECIO_PATATAS) {
        echo "Las judías son más baratas que las patatas <br>";
    } else {
        echo "Las patatas son más baratas que las judías <br>";
    }

    if(PRECIO_JUDIAS < PRECIO_MANZANAS) {
        echo "Las judías son más baratas que las manzanas <br>";
    } else {
        echo "Las manzanas son más baratas que las judías <br>";
    }

    if(PRECIO_JUDIAS < PRECIO_UVAS) {
        echo "Las judías son más baratas que las uvas <br>";
    } else {
        echo "Las uvas son más baratas que las judías <br>";
    }

    if(PRECIO_PATATAS < PRECIO_TOMATES) {
        echo "Las patatas son más baratas que los tomates <br>";
    } else {
        echo "Los tomates son más baratos que las patatas <br>";
    }

    if(PRECIO_PATATAS < PRECIO_MANZANAS) {
        echo "Las patatas son más baratas que las manzanas <br>";
    } else {
        echo "Las manzanas son más baratas que las patatas <br>";
    }

    if(PRECIO_PATATAS < PRECIO_UVAS) {
        echo "Las patatas son más baratas que las uvas <br>";
    } else {
        echo "Las uvas son más baratas que las patatas <br>";
    }

    if(PRECIO_TOMATES < PRECIO_MANZANAS) {
        echo "Los tomates son más baratos que las manzanas <br>";
    } else {
        echo "Las manzanas son más baratas que los tomates <br>";
    }

    if(PRECIO_TOMATES < PRECIO_UVAS) {
        echo "Los tomates son más baratos que las uvas <br>";
    } else {
        echo "Las uvas son más baratas que los tomates <br>";
    }

    if(PRECIO_MANZANAS < PRECIO_UVAS) {
        echo "Las manzanas son más baratas que las uvas <br>";
    } else {
        echo "Las uvas son más baratas que las manzanas <br>";
    }

?>