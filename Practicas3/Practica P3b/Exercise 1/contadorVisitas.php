<?php
// Nombre de la cookie
$cookieName = "BlasDiez";

// Reiniciar contador si se recibe el parámetro "reset"
if (isset($_GET['reset'])) {
    setcookie($cookieName, "", time() - 3600);
    header("Location: contadorVisitas.php");
    exit;
}

// Si la cookie no existe, mostrar bienvenida y establecerla
if (!isset($_COOKIE[$cookieName])) {
    $visitas = 1;
} else {
    // Incrementar visitas si la cookie existe
    $visitas = $_COOKIE[$cookieName] + 1;
}

// Actualizar el valor de la cookie
setcookie($cookieName, $visitas, time() + 86400); // Expira en 1 día

if ($visitas == 1) {
    echo "<h2>¡Bienvenido! Esta es tu primera visita.</h2>";
} else {
    echo "<h2>Has visitado esta página $visitas veces.</h2>";
}


// Botón para reiniciar el contador
echo '<a href="contadorVisitas.php?reset=1">Reiniciar contador de visitas</a>';
?>
