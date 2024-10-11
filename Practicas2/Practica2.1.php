<?php

$cadena = "A quien madruga Dios le ayuda";
mostrar_impares($cadena);
function mostrar_impares($cadena)
{
    for($i = 0; $i < strlen($cadena); $i++) {
        if($i % 2 != 0) {
            echo $cadena[$i];
        }
    }
}
