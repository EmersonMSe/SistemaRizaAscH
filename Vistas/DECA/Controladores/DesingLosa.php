<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de los campos
    $fc = isset($_POST["fc"]) ? intval($_POST["fc"]) : 0;
    $fy = isset($_POST["fy"]) ? intval($_POST["fy"]) : 0;
    $num_tramos = isset($_POST["num_tramos"]) ? intval($_POST["num_tramos"]) : 0;

    // Obtener los valores generados dinámicamente
    $luzLibre = array();
    $carga_muerta = array();
    $carga_viva = array();
    $altura = array();
    $base = array();
    $eje = array();
    $b = array();
    $Mi = array();
    $Md = array();
    $did1 = array();
    $did2 = array();
    $did3 = array();
    $luzLibre = array();
    $bp = array();
    for ($i = 1; $i <= $num_tramos; $i++) {
        $base[$i] = isset($_POST["BASE$i"]) ? floatval($_POST["BASE$i"]) : 0;
        $altura[$i] = isset($_POST["ALTURA$i"]) ? floatval($_POST["ALTURA$i"]) : 0;
        $Cv[$i] = isset($_POST["Cviva$i"]) ? floatval($_POST["Cviva$i"]) : 0;
        $CM[$i] = isset($_POST["CMuerta$i"]) ? floatval($_POST["CMuerta$i"]) : 0;
        $luzLibre[$i] = isset($_POST["Luz_Libre$i"]) ? floatval($_POST["Luz_Libre$i"]) : 0;
        $Mi[$i] = isset($_POST["Mi$i"]) ? floatval($_POST["Mi$i"]) : 0;
        $Md[$i] = isset($_POST["Md$i"]) ? floatval($_POST["Md$i"]) : 0;
        $did1[$i] = isset($_POST["δ1$i"]) ? floatval($_POST["δ1$i"]) : 0;
        $did2[$i] = isset($_POST["δ2$i"]) ? floatval($_POST["δ2$i"]) : 0;
        $did3[$i] = isset($_POST["δ3$i"]) ? floatval($_POST["δ3$i"]) : 0;
        $bp[$i] = isset($_POST["EVB$i"]) ? floatval($_POST["EVB$i"]) : 0;

        $Bases = $base[$i];
        $Altura = $altura[$i];
        $MoIzq = $Mi[$i];
        $Moder = $Md[$i];
        $DefelxioncargaMuerta = $did1[$i];
        $DefelxioncargaViva = $did2[$i];
        $DefelxioncargaVivaporcentaje = $did3[$i];
        $cargaMuerta = floatval($_POST["CMuerta$i"]);
        $cargaViva = floatval($_POST["Cviva$i"]);
        $bpeque = floatval($_POST["EVB$i"]);
    }


    $mu = array();
    $vu = array();
    $tu = array();
    for ($i = 1; $i <= $num_tramos * 3; $i++) {
        // Los nombres de los campos generados dinámicamente serán como 'Luz_Libre-1', 'Luz_Libre-2', etc.
        $mu[$i] = isset($_POST["MomentoUltimo-$i"]) ? floatval($_POST["MomentoUltimo-$i"]) : 0;
        $vu[$i] = isset($_POST["Vu-$i"]) ? floatval($_POST["Vu-$i"]) : 0;
        $tu[$i] = isset($_POST["Tu-$i"]) ? floatval($_POST["Tu-$i"]) : 0;
        //$acero[$i] = isset($_POST["ACERO-$i"]) ? floatval($_POST["ACERO-$i"]) : 0;

        $Vultimonegativo = floatval($_POST["Vu-$i"]);
        $tUltimoNegativo = floatval($_POST["Tu-$i"]);
        //--------------------------------------------------------------------
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Document</title>
</head>

<body>
    <div class="table-responsive">
        <table class="table table-bordered responsive table-hover border-primary">
            <thead>
                <tr>
                    <th class="text-center" scope="row" colspan="4">Diseño POR FLEXION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">d</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos; $i++) {
                        $d = $Altura - 3;
                        $ds[] = $d;
                    }
                    if (isset($ds)) {
                        foreach ($ds as $d) {
                            echo "<td colspan='3' class='text center'>$d</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">a- (cm)</th>
                    <?php
                    $ds = array(); // Declarar el array para almacenar los resultados
                    $mus = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d = $Altura - 3;
                        $mus = $mu[$i];
                        $a = round($d - sqrt(pow($d, 2) - 2 * ABS($mus * pow(10, 5)) / (0.90 * 0.85 * $fc * $Bases)), 2, PHP_ROUND_HALF_UP);
                        $ds[] = $a;

                    }
                    if (isset($ds)) {
                        foreach ($ds as $a) {
                            echo "<td>$a</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">As (cm<sup>2</sup>)</th>
                    <?php
                    $Ass = array(); // Declarar el array para almacenar los resultados
                    $ds = array();
                    $mus = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d = $Altura - 3;
                        $ds[] = $d;
                        $FR = 0.90;
                        $mus = $mu[$i];
                        $a = round($d - sqrt(pow($d, 2) - 2 * ABS($mus * pow(10, 5)) / (0.90 * 0.85 * $fc * $Bases)), 2, PHP_ROUND_HALF_UP);
                        $ds[] = $a;
                        $a = round($d - sqrt(pow($d, 2) - 2 * abs($mus * pow(10, 5)) / ($FR * 0.85 * $fc * $Bases)), 2, PHP_ROUND_HALF_UP);
                        $As = round(((0.85 * $fc * $Bases * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass[] = $As;
                    }
                    if (isset($Ass)) {
                        foreach ($Ass as $As) {
                            echo "<td>$As</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">As min (cm<sup>2</sup>)</th>
                    <?php
                    $As_mins = array(); // Declarar el array para almacenar los resultados
                    $ds = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d = $Altura - 3;
                        $ds[] = $d;
                        $As_min = round(max(0.7 * sqrt($fc) / $fy * $Bases * $d, 14 * $Bases * $d / $fy), 2, PHP_ROUND_HALF_UP);
                        // $res=MAX(0.7*sqrt(210)/4200*30*52,14*30*52/4200);
                        $As_mins[] = $As_min; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_mins)) {
                        foreach ($As_mins as $As_min) {
                            echo "<td>$As_min</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">As Balanceado (cm <sup>2</sup>)</th>
                    <?php
                    $As_maxs = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β1 = 0.85;
                        $d = $Altura - 3;
                        $ds[] = $d;
                        $As_max = round((0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $Bases * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_maxs)) {
                        foreach ($As_maxs as $As_max) {
                            echo "<td>$As_max</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">As Max 75%Abs (cm<sup>2</sup>)</th>
                    <?php
                    $As_maxs = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β1 = 0.85;
                        $d = $Altura - 3;
                        $ds[] = $d;
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $Bases * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_maxs)) {
                        foreach ($As_maxs as $As_max) {
                            echo "<td>$As_max</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">As Usar (cm<sup>2</sup>)</th>
                    <?php
                    // valores del AS
                    $Ass = array(); // Declarar el array para almacenar los resultados
                    $ds = array();
                    $mus = array();
                    $As_usars = array(); // Declarar el array para almacenar los resultados
                    $As_maxs = array(); // Declarar el array para almacenar los resultados // valores del As MIN
                    $As_mins = array(); // Declarar el array para almacenar los resultados
                    $ds = array();

                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $FR = 0.90;
                        $d = $Altura - 3;
                        $ds[] = $d;
                        $mus = $mu[$i];
                        //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $Bases))));
                        $a = round($d - sqrt(pow($d, 2) - 2 * abs($mus * pow(10, 5)) / ($FR * 0.85 * $fc * $Bases)), 2, PHP_ROUND_HALF_UP);
                        //$a = 6.09;
                        $As = round(((0.85 * $fc * $Bases * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass[] = $As; // Agregar $mn al array $As
                    
                        $β1 = 0.85;
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $Bases * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                        $As_min = round(max(0.7 * sqrt($fc) / $fy * $Bases * $d, 14 * $Bases * $d / $fy), 2, PHP_ROUND_HALF_UP);
                        // $res=MAX(0.7*sqrt(210)/4200*30*52,14*30*52/4200);
                        $As_mins[] = $As_min; // Agregar $As_max al array $As_maxs
                        //OBTENER RESULTADO DEL AS_USAR
                        $As_usar = "";
                        if ($As < $As_min) {
                            $As_usar = $As_min;
                        } else {
                            if ($As > $As_min || $As < $As_max) {
                                $As_usar = $As;
                            } else {
                                $As_usar = $As_max;
                            }
                        }
                        $As_usars[] = $As_usar; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_usars)) {
                        foreach ($As_usars as $As_usar) {
                            echo "<td>$As_usar</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Aceros</th>

                </tr>
                <tr>
                    <th scope="row">As Real (cm<sup>2</sup>)</th>
                    <?php
                    $As_reala = array(); // Declarar el array para almacenar los resultados
                    $aceros = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $As_real = round((1.979 * 3) + (1.979 * 0), 2, PHP_ROUND_HALF_UP);
                        $As_reals[] = $As_real; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_reals)) {
                        foreach ($As_reals as $As_real) {
                            echo "<td>$As_real</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">ФMn (Tonf-m)</th>
                    <?php
                    $mns = array(); // Declarar el array para almacenar los resultados
                    $Ass = array(); // Declarar el array para almacenar los resultados
                    $ds = array();
                    $mus = array();
                    $As_usars = array(); // Declarar el array para almacenar los resultados
                    $As_maxs = array(); // Declarar el array para almacenar los resultados // valores del As MIN
                    $As_mins = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $FR = 0.90;
                        $β1 = 0.85;
                        $d = $Altura - 3;
                        $mus = $mu[$i];
                        //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $Bases))));
                        $a = round($d - sqrt(pow($d, 2) - 2 * abs($mus * pow(10, 5)) / (0.90 * 0.85 * $fc * $Bases)), 2, PHP_ROUND_HALF_UP);
                        //$a = 6.09;
                        $As = round(((0.85 * $fc * $Bases * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass[] = $As;
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $Bases * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                        $As_min = max(0.7 * sqrt($fc) / $fy * $Bases * $d, 14 * $Bases * $d / $fy);
                        $As_mins[] = $As_min; // Agregar $As_max al array $As_maxs
                        $As_usar = "";
                        if ($As < $As_min) {
                            $As_usar = $As_min;
                        } else {
                            if ($As > $As_min || $As < $As_max) {
                                $As_usar = $As;
                            } else {
                                $As_usar = $As_max;
                            }
                        }
                        $As_usars[] = $As_usar; // Agregar $As_max al array $As_maxs
                    
                        $aReal = 3.49; //$AR * $fy / (0.85 * $fc * $Bases);
                    

                        $mn = round(0.90 * (0.85 * $fc * $Bases * $aReal) * ($d - $aReal / 2) / 100000, 2, PHP_ROUND_HALF_UP);
                        $mns[] = $mn; // Agregar $mn al array $mns
                    
                    }
                    if (isset($mns)) {
                        foreach ($mns as $mn) {
                            echo "<td>$mn</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Verif.</th>
                    <?php
                    $mus = array();
                    $As_usars = array(); // Declarar el array para almacenar los resultados
                    $As_maxs = array(); // Declarar el array para almacenar los resultados // valores del As MIN
                    $As_mins = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $FR = 0.90;
                        $β1 = 0.85;
                        $d = $Altura - 3;
                        $mus = $mu[$i];
                        //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $Bases))));
                        $a = round($d - sqrt(pow($d, 2) - 2 * abs($mus * pow(10, 5)) / ($FR * 0.85 * $fc * $Bases)), 2, PHP_ROUND_HALF_UP);
                        $As = round(((0.85 * $fc * $Bases * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass[] = $As; // Agregar $mn al array $As
                    

                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $Bases * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                        $As_min = max(0.7 * sqrt($fc) / $fy * $Bases * $d, 14 * $Bases * $d / $fy);
                        $As_mins[] = $As_min; // Agregar $As_max al array $As_maxs
                        //OBTENER RESULTADO DEL AS_USAR
                        $As_usar = "";
                        if ($As < $As_min) {
                            $As_usar = $As_min;
                        } else {
                            if ($As > $As_min || $As < $As_max) {
                                $As_usar = $As;
                            } else {
                                $As_usar = $As_max;
                            }
                        }
                        $As_usars[] = $As_usar;
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $Bases * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max;

                        $Verif = "";
                        if ($As_usar < $As_max && $As_max >= $As_usar) {
                            $Verif = "CUMPLE";
                        } else {
                            $Verif = "NO CUMPLE";
                        }
                        $Verifs[] = $Verif; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($Verifs)) {
                        foreach ($Verifs as $Verif) {
                            echo "<td>$Verif</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>

                <tr class="bg-primary">
                    <th class="bg-primary"></th>
                </tr>

                <?php
                $mu = array();
                $vu = array();
                $tu = array();
                for ($i = 1; $i <= $num_tramos * 3; $i++) {
                    // Los nombres de los campos generados dinámicamente serán como 'Luz_Libre-1', 'Luz_Libre-2', etc.
                    $mu_[$i] = isset($_POST["MomentoUltimo+$i"]) ? floatval($_POST["MomentoUltimo+$i"]) : 0;
                    $vu_[$i] = isset($_POST["Vu+$i"]) ? floatval($_POST["Vu+$i"]) : 0;
                    $tu_[$i] = isset($_POST["Tu+$i"]) ? floatval($_POST["Tu+$i"]) : 0;
                    $VultimoPositivo = floatval($_POST["Vu+$i"]);
                    $tUltimoPositiva = floatval($_POST["Tu+$i"]);
                    //--------------------------------------------------------------------
                }
                ?>

                <!-- PARTE +  -->
                <tr>
                    <th scope="row">Mu(-)=1/3Mu(+)(Tnf.m)</th>
                    <?php
                    $mus = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $mu_i = isset($_POST["MomentoUltimo-$i"]) ? floatval($_POST["MomentoUltimo-$i"]) : 0;
                        $mu_dividido = round(abs($mu_i / 3), 2, PHP_ROUND_HALF_UP);
                        $mus[] = $mu_dividido;
                    }

                    if (isset($mus)) {
                        foreach ($mus as $mu_dividido) {
                            echo "<td>$mu_dividido</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                </tr>
                <tr>
                    <th scope="row">Mu (-) usar (Tonf.m)</th>
                    <?php
                    $mus = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $mu_i = isset($_POST["MomentoUltimo-$i"]) ? floatval($_POST["MomentoUltimo-$i"]) : 0;
                        $mu_2 = isset($_POST["MomentoUltimo+$i"]) ? floatval($_POST["MomentoUltimo+$i"]) : 0;
                        $mu_dividido = round(abs($mu_i / 3), 2, PHP_ROUND_HALF_UP);

                        $mu_usar = 0;
                        if ($mu_2 > $mu_dividido) {
                            $mu_usar = $mu_2;
                        } else {
                            $mu_usar = $mu_dividido;
                        }
                        $mus[] = $mu_usar;
                    }

                    if (isset($mus)) {
                        foreach ($mus as $mu) {
                            echo "<td>$mu</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">d+</th>
                    <?php
                    $ds1 = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d1 = $Altura - 3;
                        $ds1[] = $d1; // Agregar $mn al array $mns
                    }
                    if (isset($ds1)) {
                        foreach ($ds1 as $d1) {
                            echo "<td>$d1</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">a+ (cm)</th>
                    <?php
                    $ds = array(); // Declarar el array para almacenar los resultados
                    $mus = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $mu_i = isset($_POST["MomentoUltimo-$i"]) ? floatval($_POST["MomentoUltimo-$i"]) : 0;
                        $mu_2 = isset($_POST["MomentoUltimo+$i"]) ? floatval($_POST["MomentoUltimo+$i"]) : 0;
                        $mu_dividido = round(abs($mu_i / 3), 2, PHP_ROUND_HALF_UP);

                        $mu_usar = 0;
                        if ($mu_2 > $mu_dividido) {
                            $mu_usar = $mu_2;
                        } else {
                            $mu_usar = $mu_dividido;
                        }
                        $mus[] = $mu_usar;

                        $d1 = $Altura - 3;
                        $a = round($d1 - sqrt(pow($d1, 2) - 2 * ABS($mu_usar * pow(10, 5)) / (0.90 * 0.85 * $fc * $Bases)), 2, PHP_ROUND_HALF_UP);
                        $ds[] = $a;

                    }
                    if (isset($ds)) {
                        foreach ($ds as $a) {
                            echo "<td>$a</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">As (cm<sup>2</sup>)</th>
                    <?php
                    $Ass1 = array(); // Declarar el array para almacenar los resultados
                    $ds = array(); // Declarar el array para almacenar los resultados
                    $mus = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $mu_i = isset($_POST["MomentoUltimo-$i"]) ? floatval($_POST["MomentoUltimo-$i"]) : 0;
                        $mu_2 = isset($_POST["MomentoUltimo+$i"]) ? floatval($_POST["MomentoUltimo+$i"]) : 0;
                        $mu_dividido = round(abs($mu_i / 3), 2, PHP_ROUND_HALF_UP);

                        $mu_usar = 0;
                        if ($mu_2 > $mu_dividido) {
                            $mu_usar = $mu_2;
                        } else {
                            $mu_usar = $mu_dividido;
                        }
                        $mus[] = $mu_usar;

                        $d1 = $Altura - 3;
                        $a = round($d1 - sqrt(pow($d1, 2) - 2 * ABS($mu_usar * pow(10, 5)) / (0.90 * 0.85 * $fc * $Bases)), 2, PHP_ROUND_HALF_UP);
                        $ds[] = $a;
                        $As1 = round(((0.85 * $fc * $Bases * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass1[] = $As1; // Agregar $mn al array $mns
                    }
                    if (isset($Ass1)) {
                        foreach ($Ass1 as $As1) {
                            echo "<td>$As1</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">As min (cm<sup>2</sup>)</th>
                    <?php
                    $As_mins1 = array(); // Declarar el array para almacenar los resultados
                    $capass = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d1 = $Altura - 3;
                        $As_min1 = round(MAX(0.7 * sqrt($fc) / $fy * $Bases * $d1, 14 * $Bases * $d1 / $fy), 2, PHP_ROUND_HALF_UP);
                        $As_mins1[] = $As_min1; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_mins1)) {
                        foreach ($As_mins1 as $As_min1) {
                            echo "<td>$As_min1</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">As Balanceado (cm <sup>2</sup>)</th>
                    <?php
                    $As_maxs1 = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β11 = 0.85;
                        $d1 = $Altura - 3;
                        $As_max1 = round((0.85 * $β11 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $Bases * $d1, 2, PHP_ROUND_HALF_UP);
                        $As_maxs1[] = $As_max1; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_maxs1)) {
                        foreach ($As_maxs1 as $As_max1) {
                            echo "<td>$As_max1</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">As Max 75%Abs (cm<sup>2</sup>)</th>
                    <?php
                    $As_maxs1 = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β11 = 0.85;
                        $As_max1 = round(0.75 * (0.85 * $β11 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $Bases * $d1, 2, PHP_ROUND_HALF_UP);
                        $As_maxs1[] = $As_max1; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_maxs1)) {
                        foreach ($As_maxs1 as $As_max1) {
                            echo "<td>$As_max1</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">As Usar (cm<sup>2</sup>)</th>
                    <?php
                    $As_mins1 = array(); // Declarar el array para almacenar los resultados
                    $As_usars1 = array(); // Declarar el array para almacenar los resultados
                    $As_maxs1 = array(); // Declarar el array para almacenar los resultados
                    $Ass1 = array(); // Declarar el array para almacenar los resultados
                    $capass = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $a1 = 1.39;
                        $d1 = $Altura - 3;
                        $As1 = round(((0.85 * $fc * $Bases * $a1) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass1[] = $As1; // Agregar $mn al array $mns
                        $β11 = 0.85;
                        $As_max1 = round(0.75 * (0.85 * $β11 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $Bases * $d1, 2, PHP_ROUND_HALF_UP);
                        $As_maxs1[] = $As_max1; // Agregar $As_max al array $As_maxs
                        $As_min1 = MAX(0.7 * sqrt($fc) / $fy * $Bases * $d1, 14 * $Bases * $d1 / $fy);
                        $As_mins1[] = $As_min1; // Agregar $As_max al array $As_maxs
                    
                        $As_usar1 = 0;
                        if ($As1 < $As_min1) {
                            $As_usar1 = $As_min1;
                        } else {
                            if ($As1 > $As_min1 || $As < $As_max1) {
                                $As_usar1 = $As1;
                            } else {
                                $As_usar1 = $As_max1;
                            }
                        }
                        $As_usars1[] = $As_usar1; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_usars1)) {
                        foreach ($As_usars1 as $As_usar1) {
                            echo "<td>$As_usar1</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Aceros</th>
                </tr>
                <tr>
                    <th scope="row">As Real (cm<sup>2</sup>)</th>
                    <?php
                    $As_reals1 = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $clave = "ACERO+$i"; // Construir la clave correcta
                        $acero1 = isset($_POST[$clave]) ? $_POST[$clave] : '0.000'; // Obtener el valor como cadena
                        $As_real1 = round((1.979 * 3) + (1.979 * 0), 2, PHP_ROUND_HALF_DOWN);
                        $As_reals1[] = $As_real1; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_reals1)) {
                        foreach ($As_reals1 as $As_real1) {
                            echo "<td>$As_real1</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">ФMn (Tonf-m)</th>
                    <?php
                    $aceros = array();
                    $capass = array();
                    $mns = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        // Realiza la operación que necesites aquí, por ejemplo, suma de base y altura
                        $clave = "ACERO+$i"; // Construir la clave correcta
                        $acero1 = isset($_POST[$clave]) ? $_POST[$clave] : '0.000'; // Obtener el valor como cadena
                        $As_real1 = round((1.979 * 3) + (1.979 * 0), 2, PHP_ROUND_HALF_DOWN);
                        $As_reals1[] = $As_real1;
                        //ZONA DE Capas
                        $aReal1 = round($As_real1 * $fy / (0.85 * $fc * $Bases), 2, PHP_ROUND_HALF_UP);
                        $d1 = $Altura - 3;
                        $mn1 = round(0.90 * (0.85 * $fc * $Bases * $aReal1) * ($d1 - $aReal1 / 2) / 100000, 2, PHP_ROUND_HALF_UP);
                        $mns1[] = $mn1; // Agregar $mn al array $mns
                    }
                    if (isset($mns1)) {
                        foreach ($mns1 as $mn1) {
                            echo "<td>$mn1</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Verif.</th>
                    <?php
                    $Verifs1 = array(); // Declarar el array para almacenar los resultados
                    $As_mins1 = array(); // Declarar el array para almacenar los resultados
                    $As_usars1 = array(); // Declarar el array para almacenar los resultados
                    $As_maxs1 = array(); // Declarar el array para almacenar los resultados
                    $Ass1 = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $a1 = 1.39;
                        $d1 = $Altura - 3;
                        $mu_i = isset($_POST["MomentoUltimo-$i"]) ? floatval($_POST["MomentoUltimo-$i"]) : 0;
                        $mu_2 = isset($_POST["MomentoUltimo+$i"]) ? floatval($_POST["MomentoUltimo+$i"]) : 0;
                        $mu_dividido = round(abs($mu_i / 3), 2, PHP_ROUND_HALF_UP);

                        $mu_usar = 0;
                        if ($mu_2 > $mu_dividido) {
                            $mu_usar = $mu_2;
                        } else {
                            $mu_usar = $mu_dividido;
                        }
                        $mus[] = $mu_usar;

                        $d1 = $Altura - 3;
                        $a1 = round($d1 - sqrt(pow($d1, 2) - 2 * ABS($mu_usar * pow(10, 5)) / (0.90 * 0.85 * $fc * $Bases)), 2, PHP_ROUND_HALF_UP);
                        $ds[] = $a1;
                        $As1 = round(((0.85 * $fc * $Bases * $a1) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass1[] = $As1; // Agregar $mn al array $mns
                        $β11 = 0.85;
                        $As_max1 = round(0.75 * (0.85 * $β11 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $Bases * $d1, 2, PHP_ROUND_HALF_UP);
                        $As_maxs1[] = $As_max1; // Agregar $As_max al array $As_maxs
                    
                        $As_min1 = MAX(0.7 * sqrt($fc) / $fy * $Bases * $d1, 14 * $Bases * $d1 / $fy);
                        $As_mins1[] = $As_min1; // Agregar $As_max al array $As_maxs
                    
                        $As_usar1 = 0;
                        if ($As1 < $As_min1) {
                            $As_usar1 = $As_min1;
                        } else {
                            if ($As1 > $As_min1 || $As < $As_max1) {
                                $As_usar1 = $As1;
                            } else {
                                $As_usar1 = $As_max1;
                            }
                        }
                        $As_usars1[] = $As_usar1; // Agregar $As_max al array $As_maxs
                    
                        $Verif1 = "";
                        if ($As_usar1 < $As_max1 || $As_max1 >= $As_usar1) {
                            $Verif1 = "CUMPLE";
                        } else {
                            $Verif1 = "NO CUMPLE";
                        }
                        $Verifs1[] = $Verif1; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($Verifs1)) {
                        foreach ($Verifs1 as $Verif1) {
                            echo "<td>$Verif1</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Diseño por Corte Losa -->
    <div class="table-responsive">
        <table class="table table-bordered responsive table-hover border-primary">
            <thead>
                <tr class="table bg-primary">
                    <th colspan="4">LOSA POR CORTE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Acw (cm<sup>2</sup>)</th>
                    <?php
                    $capass = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d = $Altura - 3;
                        $acw = $Bases * $d;
                        // $mn = round(0.90 * (0.85 * $fc * $base[$i] * $aReal) * ($d - $aReal / 2) / 100000, 2, PHP_ROUND_HALF_UP);
                        $mns[] = $acw; // Agregar 'A' al array $mns
                    }

                    if (isset($mns)) {
                        foreach ($mns as $acw) {
                            echo "<td>$acw</td>"; // Celda con el valor de 'A'
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">VC (Tonf-m)</th>
                    <?php
                    $capass = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d = $Altura - 3;

                        $acw = $Bases * $d;
                        $acws[] = $acw;

                        $vc = round(0.53 * sqrt($fc) * ($acw) / 1000, 2, PHP_ROUND_HALF_UP);
                        $vcs[] = $vc;
                    }

                    if (isset($vcs)) {
                        foreach ($vcs as $vc) {
                            echo "<td>$vc</td>"; // Celda con el valor de 'A'
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Ø Vc</th>
                    <?php
                    $capass = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d = $Altura - 3;
                        $acw = $Bases * $d;
                        $acws[] = $acw;
                        $vc = 0.53 * sqrt($fc) * ($acw) / 1000;
                        $vcs[] = $vc;
                        $vcfr = round(0.85 * $vc, 2, PHP_ROUND_HALF_UP);
                        $vcfrs[] = $vcfr;
                    }

                    if (isset($vcfrs)) {
                        foreach ($vcfrs as $vcfr) {
                            echo "<td>$vcfr</td>"; // Celda con el valor de 'A'
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Vs (Tonf)</th>
                    <?php
                    $capass = array();
                    $vuss = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d = $Altura - 3;
                        $acw = $Bases * $d;
                        $acws[] = $acw;

                        $vc = round(0.53 * sqrt($fc) * ($acw) / 1000, 2, PHP_ROUND_HALF_UP);
                        $vcs[] = $vc;
                        $vus = floatval($_POST["Vu-$i"]);
                        $VS = round(abs(($vus / 0.85) - $vc), 2, PHP_ROUND_HALF_UP);
                        $Vss[] = $VS;
                    }

                    if (isset($Vss)) {
                        foreach ($Vss as $VS) {
                            echo "<td>$VS</td>"; // Celda con el valor de 'A'
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">S(cm)</th>
                    <?php
                    $capass = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) { # code...
                        $d = $Altura - 3;
                        $acw = $Bases * $d;
                        $acws[] = $acw;

                        $vc = 0.53 * sqrt($fc) * ($acw) / 1000;
                        $vcs[] = $vc;

                        $vus = floatval($_POST["Vu-$i"]);
                        $VS = round($vus / 0.85 - $vc, 2, PHP_ROUND_HALF_UP);
                        $Vss[] = $VS;

                        $Espacios = round(abs(0.713 * $fy * $d / ($VS * 1000)), 2, PHP_ROUND_HALF_UP);
                        $Espacioss[] = $Espacios;
                    }
                    if (isset($Espacioss)) {
                        foreach ($Espacioss as $Espacios) {
                            echo "<td>$Espacios</td>"; // Celda con el valor de 'A'
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">S=d/4 (cm):</th>
                    <?php
                    $capass = array();

                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d = $Altura - 3;
                        $acw = $Bases * $d;
                        $acws[] = $acw;
                        $ped = $d / 4;
                        $peds[] = $ped;
                    }

                    if (isset($peds)) {
                        foreach ($peds as $ped) {
                            echo "<td>$ped</td>"; // Celda con el valor de 'A'
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Lconf (cm)</th>
                    <?php
                    $capass = array();

                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $Lconfi = 2 * $Altura;
                        $Lconfis[] = $Lconfi;
                    }

                    if (isset($Lconfis)) {
                        foreach ($Lconfis as $Lconfi) {
                            echo "<td>$Lconfi</td>"; // Celda con el valor de 'A'
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Usar (cm)</th>
                    <?php
                    $capass = array();

                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $S = 62;
                        $s2 = 13.5;
                        $smax = 10;
                        $usarS = min($S, $s2, $smax);
                        $usarSs[] = $usarS;
                    }

                    if (isset($usarSs)) {
                        foreach ($usarSs as $usarS) {
                            echo "<td>$usarS</td>"; // Celda con el valor de 'A'
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row"># estribos zona conf.</th>
                    <?php
                    $capass = array();

                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $Lconfi = 2 * $Altura;
                        $Lconfis[] = $Lconfi;
                        $S = 62;
                        $s2 = 13.5;
                        $smax = 10;
                        $usarS = min($S, $s2, $smax);
                        $usarSs[] = $usarS;

                        $estribos = $Lconfi / $usarS;
                        $estriboss[] = $estribos;
                    }

                    if (isset($estriboss)) {
                        foreach ($estriboss as $estribos) {
                            echo "<td>$estribos</td>"; // Celda con el valor de 'A'
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Verif.</th>
                    <?php
                    $capass = array();
                    for ($i = 1; $i <= $num_tramos; $i++) {
                        $estribado = "";

                        if ($VultimoPositivo < $vc) {
                            $estribado = "CUMPLE";
                        } else {
                            if ($Vultimonegativo < $vc) {
                                $estribado = "NO CUMPLE";
                            } else {
                                $estribado = "CUMPLE";
                            }

                            $estribado = "NO CUMPLE";
                        }


                        $estribados[] = $estribado;
                    }

                    if (isset($estribados)) {
                        foreach ($estribados as $estribado) {
                            echo "<td class='text-center' colspan='3'>$estribado</td>"; // Celda con el valor de 'A'
                        }
                    }
                    ?>
                </tr>
            </tbody>
        </table>

    </div>


    <div class="table-responsive">
        <table class="table table-bordered responsive table-hover border-primary">
            <thead>
                <tr class="table bg-primary">
                    <th colspan="4">DISEÑO POR DEFLEXION</th>
                </tr>
            </thead>
            <tbody>
                <!-- $MoIzq=$Mi[$i];
            $Moder=$Md[$i];
            $DefelxioncargaMuerta=$did1[$i];
            $DefelxioncargaViva=$did2[$i];
            $DefelxioncargaVivaporcentaje=$did3[$i];
            $cargaMuerta=$CM[$i];
            $cargaViva=[$i]; -->
                <!-- VALORES GENERALES -->
                <?php
                $Ma = $cargaMuerta + $cargaViva;
                $EC = 15000 * sqrt($fc);
                $ES = 2000000;
                $Mcr = 405 / 1000;
                $lg = 22700 * pow(10, -8);
                $ddef = ($Altura - 3) / 100;
                $baseP = $bpeque / 100;
                $BaseM = $Bases / 100;
                $bf = 0;
                ?>
                <!-- -------------------------------------------------------------------- -->
                <tr>
                    <th scope="row">n</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        // Realiza la operación que necesites aquí, por ejemplo, suma de base y altura
                        $n = round($ES / $EC, 2, PHP_ROUND_HALF_UP);
                        $ns[] = $n; // Agregar $mn al array $mns
                    }
                    if (isset($ns)) {
                        foreach ($ns as $n) {
                            echo "<td>$n</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">As (cm<sup>2</sup>)</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        // Realiza la operación que necesites aquí, por ejemplo, suma de base y altura
                        $Asd = round(1.98, 2, PHP_ROUND_HALF_UP);
                        $Asds[] = $Asd; // Agregar $mn al array $mns
                    }
                    if (isset($Asds)) {
                        foreach ($Asds as $Asd) {
                            echo "<td>$Asd</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">c (cm)</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $n = round($ES / $EC, 2, PHP_ROUND_HALF_UP);
                        $ns[] = $n;
                        $Asd = round(1.98, 2, PHP_ROUND_HALF_UP);
                        $Asds[] = $Asd;
                        $CAl = round(((-$n * $Asd * pow(10, -4) + sqrt(pow($n * 0.40 * pow(10, -4), 2) - 4 * ($BaseM / 2) * (-$n * $Asd * pow(10, -4) * $ddef)))) / (2 * $BaseM / 2) * 100, 2, PHP_ROUND_HALF_UP);
                        $CAls[] = $CAl;
                    }
                    if (isset($CAls)) {
                        foreach ($CAls as $CAl) {
                            echo "<td>$CAl</td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Lcr (cm<sup>4</sup>)</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $n = round($ES / $EC, 2, PHP_ROUND_HALF_UP);
                        $ns[] = $n;
                        $Asd = round(1.98, 2, PHP_ROUND_HALF_UP);
                        $Asds[] = $Asd;
                        $CAl = ((-$n * $Asd * pow(10, -4) + sqrt(pow($n * 0.40 * pow(10, -4), 2) - 4 * (0.40 / 2) * (-$n * $Asd * pow(10, -4) * $ddef)))) / (2 * 0.40 / 2) * 100;
                        $CAls[] = $CAl;
                        $ICricicaM = round($baseP * (pow($CAl * pow(10, -2), 3)) / 3 + $n * $Asd * pow(10, -4) * pow($ddef - $CAl * pow(10, -2), 2), 10, PHP_ROUND_HALF_UP);
                        $Icritica = round($ICricicaM * pow(10, 8), 2, PHP_ROUND_HALF_UP);
                        $Icriticas[] = $Icritica;
                    }
                    if (isset($Icriticas)) {
                        foreach ($Icriticas as $Icritica) {
                            echo "<td>$Icritica</td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Lef (cm<sup>4</sup>)</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $I = pow($Mcr / $Ma, 3) * $lg + (1 - pow($Mcr / $Ma, 3)) * $ICricicaM;
                        $Linercia = round($I * pow(10, 8), 2, PHP_ROUND_HALF_UP);
                        $Linercias[] = $Linercia;
                    }
                    if (isset($Linercias)) {
                        foreach ($Linercias as $Linercia) {
                            echo "<td>$Linercia</td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">δt (cm)</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $I = pow($Mcr / $Ma, 3) * $lg + (1 - pow($Mcr / $Ma, 3)) * $ICricicaM;
                        $deflexionesT = round(5 * pow(5.98, 2) / (48 * ($EC * 10) * $I) * (1.15 - 0.1 * ($MoIzq + $Moder)) * 100, 2, PHP_ROUND_HALF_UP);
                        $deflexionesTs[] = $deflexionesT;
                    }
                    if (isset($deflexionesTs)) {
                        foreach ($deflexionesTs as $deflexionesT) {
                            echo "<td>$deflexionesT</td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">δt/30 (cm)</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $deflexionesTmin = $DefelxioncargaMuerta + $DefelxioncargaVivaporcentaje;
                        $deflexionesTmins[] = $deflexionesTmin;
                    }
                    if (isset($deflexionesTmins)) {
                        foreach ($deflexionesTmins as $deflexionesTmin) {
                            echo "<td>$deflexionesTmin</td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">p´ (cm)</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $aceroColocado = 3.96;
                        $pp = $aceroColocado / (40 * 22);
                        $pprima = ($pp * 100);
                        $pprimas[] = $pprima;
                    }
                    if (isset($pprimas)) {
                        foreach ($pprimas as $pprima) {
                            echo "<td>$pprima%</td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">λ (cm)</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $aceroColocado = 3.96;
                        $Ddiferida = round(2.00 / (1 + 50 * $pp), 2, PHP_ROUND_HALF_UP);
                        $Ddiferidas[] = $Ddiferida;
                    }
                    if (isset($Ddiferidas)) {
                        foreach ($Ddiferidas as $Ddiferida) {
                            echo "<td>$Ddiferida</td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Δcm (cm)</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $aceroColocado = 3.96;
                        $Ddiferida = round(2.00 / (1 + 50 * $pp), 2, PHP_ROUND_HALF_UP);
                        $Ddiferidas[] = $Ddiferida;
                        $DdiferidaCM = round($Ddiferida * $DefelxioncargaMuerta, 2, PHP_ROUND_HALF_UP);
                        $DdiferidaCMs[] = $DdiferidaCM;

                    }
                    if (isset($DdiferidaCMs)) {
                        foreach ($DdiferidaCMs as $DdiferidaCM) {
                            echo "<td>$DdiferidaCM</td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Δcv (cm)</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $aceroColocado = 3.96;
                        $Ddiferida = round(2.00 / (1 + 50 * $pp), 2, PHP_ROUND_HALF_UP);
                        $Ddiferidas[] = $Ddiferida;
                        $DdiferidaCV = round($Ddiferida * $DefelxioncargaVivaporcentaje, 2, PHP_ROUND_HALF_UP);
                        $DdiferidaCVs[] = $DdiferidaCV;

                    }
                    if (isset($DdiferidaCVs)) {
                        foreach ($DdiferidaCVs as $DdiferidaCV) {
                            echo "<td>$DdiferidaCV</td>";
                        }
                    }
                    ?>
                </tr>

                <tr>
                    <th scope="row">CASOS</th>
                    <td><select class="form-control form-control-sm" style="width:100%" name="casosSelect"
                            id="casosSelect">
                            <option <?php $CSO1 = 1 ?> value="0.50">CASO 1</option>
                            <option <?php $CSO1 = 2 ?> value="0.51">CASO 2</option>
                            <option <?php $CSO1 = 3 ?>value="1.97">CASO 3</option>
                            <option <?php $CSO1 = 4 ?>value="2">CASO 4</option>
                            <?php
                            $Options = array();
                            $Option = 0;
                            if ($CSO1 == 1) {
                                $Option = 0.50;
                            } else if ($CSO1 == 2) {
                                $Option = 0.52;
                            } elseif ($CSO1 == 3) {
                                $Option = 1.97;
                            } elseif ($CSO1 == 4) {
                                $Option = 2;
                            }
                            $Options[] = $Option;
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th scope="row">CASOS</th>
                    <td>
                        <select class="form-control form-control-sm" style="width:100%" name="casosSelect"
                            id="casosSelect">
                            <option value="0.50">CASO 1</option>
                            <option value="0.51">CASO 2</option>
                            <option value="1.97">CASO 3</option>
                            <option value="2">CASO 4</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <th scope="row">Δ (cm)</th>
                    <?php
                    if (isset($_POST['casosSelect'])) {
                        $selectedOption = $_POST['casosSelect'];

                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $DFA = 0; // Inicializa el valor de DFA en 0
                    
                            if ($selectedOption == 1) {
                                $DFA = $DefelxioncargaViva;
                            } else if ($selectedOption == 2) {
                                $DFA = $DefelxioncargaViva;
                            } else if ($selectedOption == 3) {
                                $DFA = $DefelxioncargaViva + $DdiferidaCM;
                            } else if ($selectedOption == 4) {
                                $DFA = $DefelxioncargaViva + $DdiferidaCM + $DdiferidaCV;
                            }

                            var_dump($selectedOption); // Esto mostrará el valor seleccionado
                            $DFAs[] = $DFA;
                        }

                        if (isset($DFAs)) {
                            foreach ($DFAs as $DFA) {
                                echo "<td>$DFA</td>";
                            }
                        }
                    }
                    ?>
                </tr>


                <tr>
                    <th scope="row">Δmáx (cm)</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $DFMax = "";
                        if ("CASO1") {
                            $DFMax = 2.24;
                        } else if ("CASO2") {
                            $DFMax = $DefelxioncargaViva;
                        } elseif ("CASO3") {
                            $DFMax = $DefelxioncargaViva + $DdiferidaCM;
                        } elseif ("CASO4") {
                            $DFMax = $DefelxioncargaViva + $DdiferidaCM + $DdiferidaCV;
                        }
                        $DFMaxs[] = $DFMax;


                    }
                    if (isset($DFMaxs)) {
                        foreach ($DFMaxs as $DFMax) {
                            echo "<td>$DFMax</td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Verif</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $verf = "";
                        if (2 < 2.49) {
                            $verf = "CUMPLE";
                        } else {
                            $verf = "NO CUMPLE";
                        }
                        $verfs[] = $verf;
                    }
                    if (isset($verfs)) {
                        foreach ($verfs as $verf) {
                            echo "<td>$verf</td>";
                        }
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>

</html>