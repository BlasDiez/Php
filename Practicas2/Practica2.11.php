<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Practica2.11</title>
    <body>
        <?php

        $dollars = $_GET['Dollars'] ?? 0;
        $euros = $_GET['Euros'] ?? 0;
        $totalEuros = 0;
        $totalDollars = 0;

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // Check if the form has been submitted
            if (isset($_GET['convertEurosToDollars']) || isset($_GET['convertDollarsToEuros'])) {
                $euros = $_GET["Euros"];
                $totalDollars = euros_a_dolares($euros);
                $dollars = $_GET["Dollars"];
                $totalEuros = dolares_a_euros($dollars);
            }
        }

        function dolares_a_euros($dolares): float {
            $rateUsdToEur = 0.9134;
            return $dolares * $rateUsdToEur;
        }

        function euros_a_dolares($euros): float {
            $rateEurToUsd = 1.0944;
            return $euros * $rateEurToUsd;
        }
        ?>

        <form name="conversionFormulary" method="get" action="Practica2.11.php">
            Conversion € a $:
            <input type="number" name="Euros" value="<?php echo $_GET['Euros'] ?? 0; ?>">
            $:
            <input type="number" name="ConvertedEuros" value="<?php echo $totalDollars; ?>" readonly="readonly">
            <br>
            <button type="submit" name="convertEurosToDollars">Convertir €</button>
            <br><br>

            Conversión $ a €:
            <input type="number" name="Dollars" value="<?php echo $_GET['Dollars'] ?? 0; ?>">
            €:
            <input type="number" name="ConvertedDollars" value="<?php echo $totalEuros; ?>" readonly="readonly">
            <br>

            <button type="submit" name="convertDollarsToEuros">Convertir $</button>
            <br><br>
        </form>

    </body>
</html>