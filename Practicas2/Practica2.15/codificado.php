<?php

include("cripto.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $desplazamiento = $_POST['desplazamiento'] ?? "valor por defecto";
    $frase = $_POST['frase'] ?? "valor por defecto";
    echo codificar($frase, $desplazamiento);

} else {
    echo "ERROR Formulario no enviado.";
}