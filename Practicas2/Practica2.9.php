<?php
$nombreProductos = array("Judias", "Patatas", "Tomates", "Manzanas", "Uvas");
$precio_kg = array("Judias" => 3.50,
                   "Patatas" => 0.40,
                   "Tomates" => 1.00,
                   "Manzanas" => 1.20,
                   "Uvas" => 2.50);

$lista_compra = array("Judias" => 1.21,
                      "Patatas" => 1.73,
                      "Tomates" => 2.08,
                      "Manzanas" => 2.15,
                      "Uvas" => 0.77);

foreach ($nombreProductos as $nombreProducto) {

    echo "El precio de  $nombreProducto es de : $precio_kg[$nombreProducto] €/kg<br>";

    echo "Has comprado un total de $lista_compra[$nombreProducto]kg de $nombreProducto<br>";

    echo "El coste de tu compra de $nombreProducto es de : "
        . round($lista_compra[$nombreProducto] * $precio_kg[$nombreProducto], 2)
        . "€<br><br>";

}