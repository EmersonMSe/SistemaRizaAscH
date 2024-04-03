<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores de los campos
    $fc = isset($_POST["fc"]) ? intval($_POST["fc"]) : 0;
    $fy = isset($_POST["fy"]) ? intval($_POST["fy"]) : 0;
    $num_tramos = isset($_POST["num_tramos"]) ? intval($_POST["num_tramos"]) : 0;

    // Obtener los valores generados dinámicamente
    $luzLibre = array();
    $cargaMuerta = array();
    $cargaViva = array();
    $altura = array();
    $base = array();
    $eje = array();
    $b = array();
    $Mi = array();
    $Md = array();
    $did1 = array();
    $did2 = array();
    $did3 = array();
    $Cv = array();
    $CM = array();
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
        $cargaMuerta[$i] = floatval($_POST["CMuerta$i"]);
        $cargaViva[$i] = floatval($_POST["Cviva$i"]);
        $bpeque[$i] = floatval($_POST["EVB$i"]);
    }

    /* Mu negativos */
    $mu = array();
    $vu = array();
    $tu = array();
    $Vultimonegativo = 0;
    $tUltimoNegativo = 0;
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

    $mu_ = array();
    $vu_ = array();
    $tu_ = array();
    $VultimoPositivo = 0;
    $tUltimoPositiva = 0;
    for ($i = 1; $i <= $num_tramos * 3; $i++) {
        // Los nombres de los campos generados dinámicamente serán como 'Luz_Libre-1', 'Luz_Libre-2', etc.
        $mu_[$i] = isset($_POST["MomentoUltimo+$i"]) ? floatval($_POST["MomentoUltimo+$i"]) : 0;
        $vu_[$i] = isset($_POST["Vu+$i"]) ? floatval($_POST["Vu+$i"]) : 0;
        $tu_[$i] = isset($_POST["Tu+$i"]) ? floatval($_POST["Tu+$i"]) : 0;
        $VultimoPositivo = floatval($_POST["Vu+$i"]);
        $tUltimoPositiva = floatval($_POST["Tu+$i"]);
        //--------------------------------------------------------------------
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <title>Document</title> -->
    <style>
        .tableContainer {
            position: relative;
            margin-bottom: 20px;
            overflow: auto;
        }

        table {
            margin: 0;
            border-collapse: separate;
            border-spacing: 0;
        }

        .scrollArea {
            position: absolute;
            top: 0;
            height: 100%;
            width: 50px;
            cursor: pointer;
            z-index: 1;
        }

        .scrollLeftArea {
            left: 0;
        }

        .scrollRightArea {
            right: 0;
        }

        .scrollLeftArea::before,
        .scrollRightArea::before {
            content: "";
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 30px;
            height: 30px;
            border: 5px solid rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            opacity: 0.5;
            transition: opacity 0.3s ease;
        }

        .scrollLeftArea::before {
            left: 10px;
            border-right: none;
            border-top: none;
            transform: translateY(-50%) rotate(45deg);
        }

        .scrollRightArea::before {
            right: 10px;
            border-left: none;
            border-bottom: none;
            transform: translateY(-50%) rotate(-45deg);
        }

        .scrollArea:hover::before {
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="tableContainer">

        <table class="table">
            <thead style="font-size: 13px;background-color: #4e5c77; color:white">
                <tr>
                    <th colspan="1">1. REQUISITO DE DISEÑO</th>
                    <th scope="col">DATOS</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos; $i++) {
                        echo "<th scope='col'>START</th>";
                        echo "<th scope='col'>MIDDLE</th>";
                        echo "<th scope='col'>END</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody style=" font-size: 11px;">

                <tr>
                    <td>Luz libre</td>
                    <td>LL</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $luzlib = $luzLibre[ceil(($i / 3))];
                        echo "<td>" . $luzlib . " m" . "</td>"; // Celda con el resultado
                    }
                    ?>
                </tr>
                <tr>
                    <td>Carga Muerta</td>
                    <td>CM</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $cargaMrt = $CM[ceil(($i / 3))];
                        echo "<td>" . $cargaMrt . " Ton. m" . "</td>"; // Celda con el resultado
                    }
                    ?>
                </tr>
                <tr>
                    <td>Carga Viva</td>
                    <td>CM</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $cargaViv = $Cv[ceil(($i / 3))];
                        echo "<td>" . $cargaViv . " Ton. m" . "</td>"; // Celda con el resultado
                    }
                    ?>
                </tr>
                <tr>
                    <td>Base de la losa</td>
                    <td>Base</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $bse = $base[ceil(($i / 3))];
                        echo "<td>" . $bse . " cm" . "</td>"; // Celda con el resultado
                    }
                    ?>
                </tr>
                <tr>
                    <td>Altura de la losa</td>
                    <td>h</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $alr = $altura[ceil(($i / 3))];
                        echo "<td>" . $alr . " cm" . "</td>"; // Celda con el resultado
                    }
                    ?>
                </tr>
                <tr>
                    <td>Ancho tributario vigueta</td>
                    <td>b</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $bpa = $bp[ceil(($i / 3))];
                        echo "<td>" . $bpa . " cm" . "</td>"; // Celda con el resultado
                    }
                    ?>
                </tr>
                <tr>
                    <td>Momento lado izquierdo</td>
                    <td>Mi</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $mival = $Mi[ceil(($i / 3))];
                        echo "<td>" . $mival . " Tonf-m" . "</td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td>Momento lado derecho</td>
                    <td>Md</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $mdval = $Md[ceil(($i / 3))];
                        echo "<td>" . $mdval . " Tonf-m" . "</td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td>Deflección debido a la carga muerta</td>
                    <td>δ1</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $did1Q = $did1[ceil(($i / 3))];
                        echo "<td>" . $did1Q . " cm" . "</td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td>Deflección debido a la carga viva</td>
                    <td>δ2</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $did2Q = $did2[ceil(($i / 3))];
                        echo "<td>" . $did2Q . " cm" . "</td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td>Deflección debido al 30% de la carga viva</td>
                    <td>δ3</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $did3Q = $did3[ceil(($i / 3))];
                        echo "<td>" . $did3Q . " cm" . "</td>";
                    }
                    ?>
                </tr>

                <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <th colspan="1">1.2 VALORES NEGATIVOS (-)</th>
                    <th scope="col">DATOS</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos; $i++) {
                        echo "<th scope='col'>START</th>";
                        echo "<th scope='col'>MIDDLE</th>";
                        echo "<th scope='col'>END</th>";
                    }
                    ?>
                </tr>
                <tr>
                    <td>Momento último (-)</td>
                    <td>MU -</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $muQ = $mu[$i];
                        echo "<td>" . $muQ . " Tn-m" . "</td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td>Fuerza cortante (-)</td>
                    <td>VU -</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $vuQ = $vu[$i];
                        echo "<td>" . $vuQ . " Tn-m" . "</td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td>Torsión (-)</td>
                    <td>TU -</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $tuQ = $tu[$i];
                        echo "<td>" . $tuQ . " Tn-m" . "</td>";
                    }
                    ?>
                </tr>

                <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <td colspan="1">1.3 VALORES POTIVOS (+)</td>
                    <th scope="col">DATOS</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos; $i++) {
                        echo "<th scope='col'>START</th>";
                        echo "<th scope='col'>MIDDLE</th>";
                        echo "<th scope='col'>END</th>";
                    }
                    ?>
                </tr>

                <tr>
                    <td>Momento último (+)</td>
                    <td>MU +</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $muQ = $mu_[$i];
                        echo "<td>" . $muQ . " Tn-m" . "</td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td>Fuerza cortante (+)</td>
                    <td>VU +</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $vuQ = $vu_[$i];
                        echo "<td>" . $vuQ . " Tn-m" . "</td>";
                    }
                    ?>
                </tr>
                <tr>
                    <td>Torsión (+)</td>
                    <td>TU +</td>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $tuQ = $tu_[$i];
                        echo "<td>" . $tuQ . " Tn-m" . "</td>";
                    }
                    ?>
                </tr>
            </tbody>

        </table>

        <table class="table">
            <thead style="font-size: 13px; background-color: #4e5c77; color:white">
                <tr>
                    <!-- <th scope="row" colspan="<?php /* echo $num_tramos * 3 + 1; */ ?>">Diseño por Flexión</th> -->
                    <th scope="row" colspan="2">2. DISEÑO POR FLEXIÓN</th>
                    
                    <th scope="col">FÓRMULA</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos; $i++) {
                        echo "<th scope='col'>START</th>";
                        echo "<th scope='col'>MIDDLE</th>";
                        echo "<th scope='col'>END</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody style=" font-size: 11px;">
                <!-- d -->
                <tr>
                    <th scope="row">Peralte efectivo</th>
                    <th scope="row">d</th>
                    <th scope="row">h - 3</th>
                    <?php
                    /* $ds = array(); */
                    $d = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d[$i] = $altura[ceil(($i / 3))] - 3;
                        /* $ds[$i] = $d; */
                        echo "<td class='text center'>$d[$i] cm</td>"; // Celda con el resultado
                    }
                    /* if (isset($ds)) {
                        foreach ($ds as $d) {
                             echo "<td colspan='3' class='text center'>$d</td>"; // Celda con el resultado 
                        }
                    } */
                    ?>
                </tr>
                <!-- a- (cm) -->
                <tr>
                    <th scope="row">(*) Dimensión característica de la sección transversal</th>
                    <th scope="row">a</th>
                    <th scope="row">d-(d²-2*|MU*10^5|/(0.90*0.85*f'c*base))^0.5</th>
                    <?php
                    /* $mus = array(); */
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /* $mus = $mu[$i]; */
                        $q4 = pow($d[ceil(($i / 3))], 2) - 2 * ABS($mu[$i] * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[ceil(($i / 3))]);
                        $a = round($d[ceil(($i / 3))] - sqrt(pow($d[ceil(($i / 3))], 2) - 2 * ABS($mu[$i] * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[ceil(($i / 3))])), 2, PHP_ROUND_HALF_UP);
                        /* $ds[] = $a; */
                        if ($q4 > 0) {
                            echo "<td>$a cm</td>"; // Celda con el resultado
                        } else {
                            echo "<td>Ráiz de negativo</td>"; // Celda con el resultado
                        }
                    }
                    /* if (isset($ds)) {
                        foreach ($ds as $a) {
                            echo "<td>$a</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- As (cm²) -->
                <tr>
                    <th scope="row">Refuerzo usado en claro (*)</th>
                    <th scope="row">As</th>
                    <th scope="row">(0.85 * f'c * base * a) / Fy (*)</th>
                    <?php
                    /* $Ass = array(); // Declarar el array para almacenar los resultados
                    $ds = array(); */
                    /* $mus = array(); */
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /* $d = $Altura - 3;
                        $ds[] = $d; */
                        $FR = 0.90;
                        /* $mus = $mu[$i]; */
                        /* $a = round($d[ceil(($i / 3))] - sqrt(pow($d[ceil(($i / 3))], 2) - 2 * ABS($mu[$i] * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[ceil(($i / 3))])), 2, PHP_ROUND_HALF_UP); */
                        $ds[] = $a;
                        $a = round($d[ceil(($i / 3))] - sqrt(pow($d[ceil(($i / 3))], 2) - 2 * abs($mu[$i] * pow(10, 5)) / ($FR * 0.85 * $fc * $base[ceil(($i / 3))])), 2, PHP_ROUND_HALF_UP);
                        $As = round(((0.85 * $fc * $base[ceil(($i / 3))] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        /* $Ass[] = $As; */
                        echo "<td>$As cm²</td>"; // Celda con el resultado
                    }
                    /* if (isset($Ass)) {
                        foreach ($Ass as $As) {
                            echo "<td>$As</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- As min (cm²) -->
                <tr>
                    <th scope="row">(*)</th>
                    <th scope="row">As min</th>
                    <th scope="row">max(0.7*(f'c)^0.5/Fy*base*d, 14*base*$d/Fy)</th>
                    <?php
                    /* $As_mins = array(); // Declarar el array para almacenar los resultados
                    $ds = array(); */
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /* $d = $Altura - 3; */
                        /* $ds[] = $d; */
                        $As_min = round(max(0.7 * sqrt($fc) / $fy * $base[ceil(($i / 3))] * $d[ceil(($i / 3))], 14 * $base[ceil(($i / 3))] * $d[ceil(($i / 3))] / $fy), 2, PHP_ROUND_HALF_UP);
                        // $res=MAX(0.7*sqrt(210)/4200*30*52,14*30*52/4200);
                        echo "<td>$As_min cm²</td>"; // Celda con el resultado
                        /* $As_mins[] = $As_min; // Agregar $As_max al array $As_maxs */
                    }
                    /* if (isset($As_mins)) {
                        foreach ($As_mins as $As_min) {
                            echo "<td>$As_min</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- As Balanceado (cm²) -->
                <tr>
                    <th scope="row">As Balanceado (*)</th>
                    <th scope="row">As Balanceado</th>
                    <th scope="row">(0.85 * β1 * f'c / Fy * (0.003 / (0.003 + 0.0021))) * base * d</th>
                    <?php
                    /* $As_maxs = array(); // Declarar el array para almacenar los resultados */
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β1 = 0.85;
                        /* $d = $Altura - 3; */
                        /* $ds[] = $d; */
                        $As_max = round((0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[ceil(($i / 3))] * $d[ceil(($i / 3))], 2, PHP_ROUND_HALF_UP);
                        echo "<td>$As_max cm²</td>"; // Celda con el resultado
                        /* $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs */
                    }
                    /* if (isset($As_maxs)) {
                        foreach ($As_maxs as $As_max) {
                            echo "<td>$As_max</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- As Max 75%Abs (cm²) -->
                <tr>
                    <th scope="row">As Max 75%Abs (*)</th>
                    <th scope="row">As Max 75%Abs</th>
                    <th scope="row">0.75 * (0.85 * β1 * f'c / fy * (0.003 / (0.003 + 0.0021))) * base * d</th>
                    <?php
                    /* $As_maxs = array(); // Declarar el array para almacenar los resultados */
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β1 = 0.85;
                        /* $d = $Altura - 3;
                        $ds[] = $d; */
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[ceil(($i / 3))] * $d[ceil(($i / 3))], 2, PHP_ROUND_HALF_UP);
                        echo "<td>$As_max cm²</td>"; // Celda con el resultado
                        /* $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs */
                    }
                    /* if (isset($As_maxs)) {
                        foreach ($As_maxs as $As_max) {
                            echo "<td>$As_max</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- As Usar (cm²) -->
                <tr>
                    <th scope="row">As Usar (*)</th>
                    <th scope="row">As Usar</th>
                    <th scope="row">(condicional)</th>
                    <?php
                    // valores del AS
                    $Ass = array(); // Declarar el array para almacenar los resultados
                    /* $mus = array(); */
                    $As_usars = array(); // Declarar el array para almacenar los resultados
                    $As_maxs = array(); // Declarar el array para almacenar los resultados // valores del As MIN
                    $As_mins = array(); // Declarar el array para almacenar los resultados

                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $FR = 0.90;
                        //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $Bases))));
                        $a = round($d[ceil(($i / 3))] - sqrt(pow($d[ceil(($i / 3))], 2) - 2 * abs($mu[$i] * pow(10, 5)) / ($FR * 0.85 * $fc * $base[ceil(($i / 3))])), 2, PHP_ROUND_HALF_UP);
                        //$a = 6.09;
                        $As = round(((0.85 * $fc * $base[ceil(($i / 3))] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass[] = $As; // Agregar $mn al array $As

                        $β1 = 0.85;
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[ceil(($i / 3))] * $d[ceil(($i / 3))], 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                        $As_min = round(max(0.7 * sqrt($fc) / $fy * $base[ceil(($i / 3))] * $d[ceil(($i / 3))], 14 * $base[ceil(($i / 3))] * $d[ceil(($i / 3))] / $fy), 2, PHP_ROUND_HALF_UP);
                        // $res=MAX(0.7*sqrt(210)/4200*30*52,14*30*52/4200);
                        $As_mins[] = $As_min; // Agregar $As_max al array $As_maxs
                        //OBTENER RESULTADO DEL AS_USAR
                        $As_usar = 0;
                        if ($As < $As_min) {
                            $As_usar = $As_min;
                        } else {
                            if ($As > $As_min || $As < $As_max) {
                                $As_usar = $As;
                            } else {
                                $As_usar = $As_max;
                            }
                        }
                        echo "<td>$As_usar cm²</td>"; // Celda con el resultado
                        /* $As_usars[] = $As_usar; // Agregar $As_max al array $As_maxs */
                    }
                    /* if (isset($As_usars)) {
                        foreach ($As_usars as $As_usar) {
                            echo "<td>$As_usar</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- Aceros A selects and inputs -->
                <tr>
                    <th scope="row">Área de acero</th>
                    <th scope="row">Aceros</th>
                    <th scope="row">diámetro</th>
                    <?php for ($i = 1; $i <= $num_tramos * 3; $i++) { ?>
                        <td>
                            <select class="aceroSelectA" data-column="<?php echo $i; ?>" name="aceroSelectA<?php echo $i; ?>" id="aceroSelectA<?php echo $i; ?>">
                                <option value="0;<?php echo $num_tramos; ?>">Ø 0"</option>
                                <option value="0.283;<?php echo $num_tramos; ?>">6mm</option>
                                <option value="0.503;<?php echo $num_tramos; ?>">8mmm cm²</option>
                                <option value="0.713;<?php echo $num_tramos; ?>">Ø3/8" cm²</option>
                                <option value="1.131;<?php echo $num_tramos; ?>">12 mmm cm²</option>
                                <option value="1.267;<?php echo $num_tramos; ?>">Ø1/2" cm²</option>
                                <option value="1.979;<?php echo $num_tramos; ?>">Ø5/8" cm²</option>
                                <option value="2.85;<?php echo $num_tramos; ?>">Ø3/4" cm²</option>
                                <option value="5.067;<?php echo $num_tramos; ?>">Ø 1" cm²</option>
                                <option value="2.58;<?php echo $num_tramos; ?>">2Ø1/2"</option>
                                <option value="3.87;<?php echo $num_tramos; ?>">3Ø1/2"</option>
                                <option value="3.98;<?php echo $num_tramos; ?>">2Ø5/8"</option>
                                <option value="5.16;<?php echo $num_tramos; ?>">4Ø1/2"</option>
                                <option value="5.27;<?php echo $num_tramos; ?>">2Ø5/8"+1Ø1/2"</option>
                                <option value="5.68;<?php echo $num_tramos; ?>">2Ø3/4"</option>
                                <option value="5.97;<?php echo $num_tramos; ?>">3Ø5/8"</option>
                                <option value="6.45;<?php echo $num_tramos; ?>">5Ø1/2"</option>
                                <option value="6.56;<?php echo $num_tramos; ?>">2Ø5/8"+2Ø1/2"</option>
                                <option value="6.97;<?php echo $num_tramos; ?>">2Ø3/4"+1Ø1/2"</option>
                                <option value="7.67;<?php echo $num_tramos; ?>">2Ø3/4"+1Ø5/8"</option>
                                <option value="7.74;<?php echo $num_tramos; ?>">6Ø1/2"</option>
                                <option value="7.85;<?php echo $num_tramos; ?>">2Ø5/8"+3Ø1/2"</option>
                                <option value="7.96;<?php echo $num_tramos; ?>">4Ø5/8"</option>
                                <option value="8.26;<?php echo $num_tramos; ?>">2Ø3/4"+2Ø1/2"</option>
                                <option value="8.52;<?php echo $num_tramos; ?>">3Ø3/4"</option>
                                <option value="8.55;<?php echo $num_tramos; ?>">3Ø5/8"+2Ø1/2"</option>
                                <option value="9.55;<?php echo $num_tramos; ?>">2Ø3/4"+3Ø1/2"</option>
                                <option value="9.95;<?php echo $num_tramos; ?>">5Ø5/8"</option>
                                <option value="9.66;<?php echo $num_tramos; ?>">2Ø3/4"+2Ø5/8"</option>
                                <option value="10.2;<?php echo $num_tramos; ?>">2Ø1"</option>
                                <option value="10.54;<?php echo $num_tramos; ?>">4Ø5/8"+2Ø1/2"</option>
                                <option value="10.84;<?php echo $num_tramos; ?>">2Ø3/4"+4Ø1/2"</option>
                                <option value="11.1;<?php echo $num_tramos; ?>">3Ø3/4"+2Ø1/2"</option>
                                <option value="11.36;<?php echo $num_tramos; ?>">4Ø3/4"</option>
                                <option value="11.65;<?php echo $num_tramos; ?>">2Ø3/4"+3Ø5/8"</option>
                                <option value="11.94;<?php echo $num_tramos; ?>">6Ø5/8"</option>
                                <option value="12.19;<?php echo $num_tramos; ?>">2Ø1"+1Ø5/8"</option>
                                <option value="12.5;<?php echo $num_tramos; ?>">3Ø3/4"+2Ø5/8"</option>
                                <option value="13.04;<?php echo $num_tramos; ?>">2Ø1"+1Ø3/4"</option>
                                <option value="13.64;<?php echo $num_tramos; ?>">2Ø3/4"+4Ø5/8"</option>
                                <option value="13.94;<?php echo $num_tramos; ?>">4Ø3/4"+2Ø1/2"</option>
                                <option value="14.18;<?php echo $num_tramos; ?>">2Ø1"+2Ø5/8"</option>
                                <option value="14.2;<?php echo $num_tramos; ?>">5Ø3/4"</option>
                                <option value="15.3;<?php echo $num_tramos; ?>">3Ø1"</option>
                                <option value="15.34;<?php echo $num_tramos; ?>">4Ø3/4"+2Ø5/8"</option>
                                <option value="15.88;<?php echo $num_tramos; ?>">2Ø1"+2Ø3/4"</option>
                                <option value="16.17;<?php echo $num_tramos; ?>">2Ø1"+3Ø5/8"</option>
                                <option value="17.04;<?php echo $num_tramos; ?>">6Ø3/4"</option>
                                <option value="18.16;<?php echo $num_tramos; ?>">2Ø1"+4Ø5/8"</option>
                                <option value="18.72;<?php echo $num_tramos; ?>">2Ø1"+3Ø3/4"</option>
                                <option value="19.28;<?php echo $num_tramos; ?>">3Ø1"+2Ø5/8"</option>
                                <option value="20.4;<?php echo $num_tramos; ?>">4Ø1"</option>
                                <option value="20.98;<?php echo $num_tramos; ?>">3Ø1"+2Ø3/4"</option>
                                <option value="21.56;<?php echo $num_tramos; ?>">2Ø1"+4Ø3/4"</option>
                                <option value="24.38;<?php echo $num_tramos; ?>">4Ø1"+2Ø5/8"</option>
                                <option value="25.5;<?php echo $num_tramos; ?>">5Ø1"</option>
                                <option value="26.08;<?php echo $num_tramos; ?>">4Ø1"+2Ø3/4"</option>
                                <option value="30.6;<?php echo $num_tramos; ?>">6Ø1"</option>
                            </select>
                            <!-- <input class="aceroInputA" data-column="<?php /* echo $i */; ?>" type="number" value="1" id="aceroInputA<?php /* echo $i */; ?>" name="aceroInputA<?php /* echo $i */; ?>"> -->
                        </td>
                    <?php } ?>
                </tr>
                <!-- As Real (cm²) -->
                <tr>
                    <th scope="row" id="resultadosAceroA1">As Real (*)</th>
                    <th>As Real</th>
                    <th>(areaAcero * 3) + (areaAcero * 0)</th>
                    <?php for ($i = 1; $i <= $num_tramos * 3; $i++) { ?>
                        <td></td>
                    <?php } ?>
                    <!-- Td con resultados de los cambios en los valores select e input (js)-->
                </tr>
                <!-- ФMn (Tonf-m) -->
                <tr>
                    <th scope="row" id="resultadosAceroA2">ФMn (*)</th>
                    <th>ФMn</th>
                    <th>(0.9 * (0.85 * fc * base * aReal) * (d - aReal / 2) / 100000)</th>
                    <?php for ($i = 1; $i <= $num_tramos * 3; $i++) { ?>
                        <td></td>
                    <?php } ?>
                    <?php
                    /* $mns = array(); // Declarar el array para almacenar los resultados
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
                        } */
                    ?>
                </tr>
                <!-- Verif. -->
                <tr>
                    <th scope="row" id="resultadosAceroA3">Verificación</th>
                    <th scope="row" id="resultadosAceroA3">Verif.</th>
                    <th scope="row" id="resultadosAceroA3">(condicional)</th>
                    <?php for ($i = 1; $i <= $num_tramos * 3; $i++) { ?>
                        <td></td>
                    <?php } ?>
                    <?php
                    /* $mus = array();
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
                        } */
                    ?>
                </tr>

                <!-- Separación -->
                <!-- <tr class="bg-primary">
                    <th class="bg-primary">Negativos</th>
                </tr> -->
                <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <th colspan="2">2.1 VALORES NEGATIVOS (-)</th>                
                    <th>FÓRMULA</th>                
                    <?php
                    for ($i = 1; $i <= $num_tramos; $i++) {
                        echo "<th scope='col'>START</th>";
                        echo "<th scope='col'>MIDDLE</th>";
                        echo "<th scope='col'>END</th>";
                    }
                    ?>
                </tr>

                <!-- Mu positivos -->
                <?php
                /* $mu = array();
                $vu = array();
                $tu = array(); */
                /*                 $mu_ = array();
                $vu_ = array();
                $tu_ = array();
                $VultimoPositivo = 0;
                $tUltimoPositiva = 0;
                for ($i = 1; $i <= $num_tramos * 3; $i++) {
                    // Los nombres de los campos generados dinámicamente serán como 'Luz_Libre-1', 'Luz_Libre-2', etc.
                    $mu_[$i] = isset($_POST["MomentoUltimo+$i"]) ? floatval($_POST["MomentoUltimo+$i"]) : 0;
                    $vu_[$i] = isset($_POST["Vu+$i"]) ? floatval($_POST["Vu+$i"]) : 0;
                    $tu_[$i] = isset($_POST["Tu+$i"]) ? floatval($_POST["Tu+$i"]) : 0;
                    $VultimoPositivo = floatval($_POST["Vu+$i"]);
                    $tUltimoPositiva = floatval($_POST["Tu+$i"]);
                    //--------------------------------------------------------------------
                } */
                ?>

                <!-- PARTE +  -->

                <!-- Mu(-)=1/3Mu(+)(Tnf.m) -->
                <tr>
                    <th scope="row">Mu(-)</th>
                    <th scope="row">Mu(-)</th>
                    <th scope="row">abs(mu / 3)</th>
                    <?php
                    /* $mus = array(); */
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /* $mu_i = isset($_POST["MomentoUltimo-$i"]) ? floatval($_POST["MomentoUltimo-$i"]) : 0; */
                        $mu_dividido = round(abs($mu[$i] / 3), 2, PHP_ROUND_HALF_UP);
                        echo "<td>$mu_dividido Tnf.m</td>"; // Celda con el resultado
                        /* $mus[] = $mu_dividido; */
                    }
                    /*  if (isset($mus)) {
                        foreach ($mus as $mu_dividido) {
                            echo "<td>$mu_dividido</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- </tr> -->
                <!-- Mu (-) usar (Tonf.m) -->
                <tr>
                    <th scope="row">Mu (-) usar</th>
                    <th scope="row">Mu (-) usar</th>
                    <th scope="row">(condicional)</th>
                    <?php
                    $mus = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /* $mu_i = isset($_POST["MomentoUltimo-$i"]) ? floatval($_POST["MomentoUltimo-$i"]) : 0; */
                        /* $mu_2 = isset($_POST["MomentoUltimo+$i"]) ? floatval($_POST["MomentoUltimo+$i"]) : 0; */
                        /* $mu_2 -> $mu_[$i] */
                        $mu_dividido = round(abs($mu[$i] / 3), 2, PHP_ROUND_HALF_UP);

                        $mu_usar = 0;
                        if ($mu_[$i] > $mu_dividido) {
                            $mu_usar = $mu_[$i];
                        } else {
                            $mu_usar = $mu_dividido;
                        }
                        echo "<td>$mu_usar Tonf.m</td>"; // Celda con el resultado
                        /* $mus[] = $mu_usar; */
                    }
                    /* if (isset($mus)) {
                        foreach ($mus as $mu) {
                            echo "<td>$mu</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- d+ (*)-->
                <tr>
                    <th scope="row">Peralte efectivo d+</th>
                    <th scope="row">d+</th>
                    <th scope="row"> h -3 </th>
                    <?php
                    $ds1 = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $ds1[$i] = $altura[ceil(($i / 3))] - 3;
                        echo "<td> $ds1[$i] cm</td>"; // Celda con el resultado
                        /* $d1 = $Altura - 3; */
                        /* $ds1[] = $d1; // Agregar $mn al array $mns */
                    }
                    /* if (isset($ds1)) {
                        foreach ($ds1 as $d1) {
                            echo "<td>$d1</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- a+ (cm) -->
                <tr>
                    <th scope="row">a+ (*)</th>
                    <th scope="row">a+</th>
                    <th scope="row">d-(d²-2*|mu_usar*10^5|/(0.90*0.85*f'c*base))^0.5</th>
                    <?php
                    /* $ds = array(); // Declarar el array para almacenar los resultados
                    $mus = array(); */
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /* $mu_i = isset($_POST["MomentoUltimo-$i"]) ? floatval($_POST["MomentoUltimo-$i"]) : 0;
                        $mu_2 = isset($_POST["MomentoUltimo+$i"]) ? floatval($_POST["MomentoUltimo+$i"]) : 0; */
                        /* $mu_2 -> $mu_[$i] */
                        $mu_dividido = round(abs($mu[$i] / 3), 2, PHP_ROUND_HALF_UP);

                        $mu_usar = 0;
                        if ($mu_[$i] > $mu_dividido) {
                            $mu_usar = $mu_[$i];
                        } else {
                            $mu_usar = $mu_dividido;
                        }
                        /* $mus[] = $mu_usar; */

                        /* $d1 = $Altura - 3; */
                        $q4 = pow($ds1[$i], 2) - 2 * ABS($mu_usar * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[ceil(($i / 3))]);
                        $a = round($ds1[$i] - sqrt(pow($ds1[$i], 2) - 2 * ABS($mu_usar * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[ceil(($i / 3))])), 2, PHP_ROUND_HALF_UP);
                        if ($q4 > 0) {
                            echo "<td>$a cm</td>"; // Celda con el resultado
                        } else {
                            echo "<td>Ráiz de negativo</td>"; // Celda con el resultado
                        }
                        /* $ds[] = $a; */
                    }
                    /* if (isset($ds)) {
                        foreach ($ds as $a) {
                            echo "<td>$a</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- As (cm²) -->
                <tr>
                    <th scope="row">As (*)</th>
                    <th scope="row">As</th>
                    <th scope="row">(0.85*f'c*base*a)/Fy</th>
                    <?php
                    /* $Ass1 = array(); // Declarar el array para almacenar los resultados
                    $ds = array(); // Declarar el array para almacenar los resultados */
                    /* $mus = array(); */
                    /* $d1 -> $ds1 */
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /* $mu_i = isset($_POST["MomentoUltimo-$i"]) ? floatval($_POST["MomentoUltimo-$i"]) : 0;
                        $mu_2 = isset($_POST["MomentoUltimo+$i"]) ? floatval($_POST["MomentoUltimo+$i"]) : 0; */
                        $mu_dividido = round(abs($mu[$i] / 3), 2, PHP_ROUND_HALF_UP);

                        $mu_usar = 0;
                        if ($mu_[$i] > $mu_dividido) {
                            $mu_usar = $mu_[$i];
                        } else {
                            $mu_usar = $mu_dividido;
                        }
                        /* $mus[] = $mu_usar; */

                        /* $d1 = $altura[$i] - 3; */
                        $a = round($ds1[$i] - sqrt(pow($ds1[$i], 2) - 2 * ABS($mu_usar * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[ceil(($i / 3))])), 2, PHP_ROUND_HALF_UP);
                        /* $ds[] = $a; */
                        $As1 = round(((0.85 * $fc * $base[ceil(($i / 3))] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        /* $Ass1[] = $As1; // Agregar $mn al array $mns */
                        echo "<td>$As1 cm²</td>"; // Celda con el resultado
                    }
                    /* if (isset($Ass1)) {
                        foreach ($Ass1 as $As1) {
                            echo "<td>$As1</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- As min (cm²) -->
                <tr>
                    <th scope="row">As min</th>
                    <th scope="row">As min</th>
                    <th scope="row">MAX(0.7 * (f'c)^0.5 / Fy *base*d, 14 * base * $d / Fy)</th>
                    <?php
                    /* $As_mins1 = array(); // Declarar el array para almacenar los resultados
                    $capass = array(); */
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /* $d1 = $Altura - 3; */
                        $As_min1 = round(MAX(0.7 * sqrt($fc) / $fy * $base[ceil(($i / 3))] * $ds1[$i], 14 * $base[ceil(($i / 3))] * $ds1[$i] / $fy), 2, PHP_ROUND_HALF_UP);
                        echo "<td>$As_min1 cm²</td>"; // Celda con el resultado
                        /* $As_mins1[] = $As_min1; // Agregar $As_max al array $As_maxs */
                    }
                    /* if (isset($As_mins1)) {
                        foreach ($As_mins1 as $As_min1) {
                            echo "<td>$As_min1</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- As Balanceado (cm²) -->
                <tr>
                    <th scope="row">As Balanceado</th>
                    <th scope="row">As Balanceado</th>
                    <th scope="row">(0.85 * β11 * f'c / Fy * (0.003 / (0.003 + 0.0021))) * base * $d</th>
                    <?php
                    /* $As_maxs1 = array(); // Declarar el array para almacenar los resultados */
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β11 = 0.85;
                        /* $d1 = $Altura - 3; */
                        $As_max1 = round((0.85 * $β11 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[ceil(($i / 3))] * $ds1[$i], 2, PHP_ROUND_HALF_UP);
                        echo "<td>$As_max1 cm²</td>"; // Celda con el resultado
                        /* $As_maxs1[] = $As_max1; // Agregar $As_max al array $As_maxs */
                    }
                    /* if (isset($As_maxs1)) {
                        foreach ($As_maxs1 as $As_max1) {
                            echo "<td>$As_max1</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- As Max 75%Abs (cm²) -->
                <tr>
                    <th scope="row">As Max 75%Abs</th>
                    <th scope="row">As Max 75%Abs</th>
                    <th scope="row">0.75 * (0.85 * β11 * f'c / Fy * (0.003 / (0.003 + 0.0021))) * base * d</th>
                    <?php
                    /* $As_maxs1 = array(); // Declarar el array para almacenar los resultados */
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β11 = 0.85;
                        $As_max1 = round(0.75 * (0.85 * $β11 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[ceil(($i / 3))] * $ds1[$i], 2, PHP_ROUND_HALF_UP);
                        /* $As_maxs1[] = $As_max1; // Agregar $As_max al array $As_maxs */
                        echo "<td>$As_max1 cm²</td>"; // Celda con el resultado
                    }
                    /* if (isset($As_maxs1)) {
                        foreach ($As_maxs1 as $As_max1) {
                            echo "<td>$As_max1</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- As Usar (cm²) -->
                <tr>
                    <th scope="row">As Usar</th>
                    <th scope="row">As Usar</th>
                    <th scope="row">0.75 * (0.85 * β11 * f'c / Fy * (0.003 / (0.003 + 0.0021))) * base * $d</th>
                    <?php
                    /*  $As_mins1 = array(); // Declarar el array para almacenar los resultados
                    $As_usars1 = array(); // Declarar el array para almacenar los resultados
                    $As_maxs1 = array(); // Declarar el array para almacenar los resultados
                    $Ass1 = array(); // Declarar el array para almacenar los resultados
                    $capass = array(); */
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $a1 = 1.39;
                        /* $d1 = $Altura - 3; */
                        $As1 = round(((0.85 * $fc * $base[ceil(($i / 3))] * $a1) / $fy), 2, PHP_ROUND_HALF_UP);
                        /* $Ass1[] = $As1; // Agregar $mn al array $mns */
                        $β11 = 0.85;
                        $As_max1 = round(0.75 * (0.85 * $β11 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[ceil(($i / 3))] * $ds1[$i], 2, PHP_ROUND_HALF_UP);
                        /* $As_maxs1[] = $As_max1; // Agregar $As_max al array $As_maxs */
                        $As_min1 = MAX(0.7 * sqrt($fc) / $fy * $base[ceil(($i / 3))] * $ds1[$i], 14 * $base[ceil(($i / 3))] * $ds1[$i] / $fy);
                        /* $As_mins1[] = $As_min1; // Agregar $As_max al array $As_maxs */

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
                        echo "<td>$As_usar1 cm²</td>"; // Celda con el resultado
                        /* $As_usars1[] = $As_usar1; // Agregar $As_max al array $As_maxs */
                    }
                    /* if (isset($As_usars1)) {
                        foreach ($As_usars1 as $As_usar1) {
                            echo "<td>$As_usar1</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- Aceros B selects and inputs -->
                <tr>
                    <th scope="row">Área de acero</th>
                    <th scope="row">Aceros</th>
                    <th scope="row">diámetro</th>
                    <?php for ($i = 1; $i <= $num_tramos * 3; $i++) { ?>
                        <td>
                            <select class="aceroSelectB" data-column="<?php echo $i; ?>" name="aceroSelectB<?php echo $i; ?>" id="aceroSelectB<?php echo $i; ?>">
                                <option value="0;<?php echo $num_tramos; ?>">Ø 0"</option>
                                <option value="0.283;<?php echo $num_tramos; ?>">6mm</option>
                                <option value="0.503;<?php echo $num_tramos; ?>">8mmm cm²</option>
                                <option value="0.713;<?php echo $num_tramos; ?>">Ø3/8" cm²</option>
                                <option value="1.131;<?php echo $num_tramos; ?>">12 mmm cm²</option>
                                <option value="1.267;<?php echo $num_tramos; ?>">Ø1/2" cm²</option>
                                <option value="1.979;<?php echo $num_tramos; ?>">Ø5/8" cm²</option>
                                <option value="2.85;<?php echo $num_tramos; ?>">Ø3/4" cm²</option>
                                <option value="5.067;<?php echo $num_tramos; ?>">Ø 1" cm²</option>
                                <option value="2.58;<?php echo $num_tramos; ?>">2Ø1/2"</option>
                                <option value="3.87;<?php echo $num_tramos; ?>">3Ø1/2"</option>
                                <option value="3.98;<?php echo $num_tramos; ?>">2Ø5/8"</option>
                                <option value="5.16;<?php echo $num_tramos; ?>">4Ø1/2"</option>
                                <option value="5.27;<?php echo $num_tramos; ?>">2Ø5/8"+1Ø1/2"</option>
                                <option value="5.68;<?php echo $num_tramos; ?>">2Ø3/4"</option>
                                <option value="5.97;<?php echo $num_tramos; ?>">3Ø5/8"</option>
                                <option value="6.45;<?php echo $num_tramos; ?>">5Ø1/2"</option>
                                <option value="6.56;<?php echo $num_tramos; ?>">2Ø5/8"+2Ø1/2"</option>
                                <option value="6.97;<?php echo $num_tramos; ?>">2Ø3/4"+1Ø1/2"</option>
                                <option value="7.67;<?php echo $num_tramos; ?>">2Ø3/4"+1Ø5/8"</option>
                                <option value="7.74;<?php echo $num_tramos; ?>">6Ø1/2"</option>
                                <option value="7.85;<?php echo $num_tramos; ?>">2Ø5/8"+3Ø1/2"</option>
                                <option value="7.96;<?php echo $num_tramos; ?>">4Ø5/8"</option>
                                <option value="8.26;<?php echo $num_tramos; ?>">2Ø3/4"+2Ø1/2"</option>
                                <option value="8.52;<?php echo $num_tramos; ?>">3Ø3/4"</option>
                                <option value="8.55;<?php echo $num_tramos; ?>">3Ø5/8"+2Ø1/2"</option>
                                <option value="9.55;<?php echo $num_tramos; ?>">2Ø3/4"+3Ø1/2"</option>
                                <option value="9.95;<?php echo $num_tramos; ?>">5Ø5/8"</option>
                                <option value="9.66;<?php echo $num_tramos; ?>">2Ø3/4"+2Ø5/8"</option>
                                <option value="10.2;<?php echo $num_tramos; ?>">2Ø1"</option>
                                <option value="10.54;<?php echo $num_tramos; ?>">4Ø5/8"+2Ø1/2"</option>
                                <option value="10.84;<?php echo $num_tramos; ?>">2Ø3/4"+4Ø1/2"</option>
                                <option value="11.1;<?php echo $num_tramos; ?>">3Ø3/4"+2Ø1/2"</option>
                                <option value="11.36;<?php echo $num_tramos; ?>">4Ø3/4"</option>
                                <option value="11.65;<?php echo $num_tramos; ?>">2Ø3/4"+3Ø5/8"</option>
                                <option value="11.94;<?php echo $num_tramos; ?>">6Ø5/8"</option>
                                <option value="12.19;<?php echo $num_tramos; ?>">2Ø1"+1Ø5/8"</option>
                                <option value="12.5;<?php echo $num_tramos; ?>">3Ø3/4"+2Ø5/8"</option>
                                <option value="13.04;<?php echo $num_tramos; ?>">2Ø1"+1Ø3/4"</option>
                                <option value="13.64;<?php echo $num_tramos; ?>">2Ø3/4"+4Ø5/8"</option>
                                <option value="13.94;<?php echo $num_tramos; ?>">4Ø3/4"+2Ø1/2"</option>
                                <option value="14.18;<?php echo $num_tramos; ?>">2Ø1"+2Ø5/8"</option>
                                <option value="14.2;<?php echo $num_tramos; ?>">5Ø3/4"</option>
                                <option value="15.3;<?php echo $num_tramos; ?>">3Ø1"</option>
                                <option value="15.34;<?php echo $num_tramos; ?>">4Ø3/4"+2Ø5/8"</option>
                                <option value="15.88;<?php echo $num_tramos; ?>">2Ø1"+2Ø3/4"</option>
                                <option value="16.17;<?php echo $num_tramos; ?>">2Ø1"+3Ø5/8"</option>
                                <option value="17.04;<?php echo $num_tramos; ?>">6Ø3/4"</option>
                                <option value="18.16;<?php echo $num_tramos; ?>">2Ø1"+4Ø5/8"</option>
                                <option value="18.72;<?php echo $num_tramos; ?>">2Ø1"+3Ø3/4"</option>
                                <option value="19.28;<?php echo $num_tramos; ?>">3Ø1"+2Ø5/8"</option>
                                <option value="20.4;<?php echo $num_tramos; ?>">4Ø1"</option>
                                <option value="20.98;<?php echo $num_tramos; ?>">3Ø1"+2Ø3/4"</option>
                                <option value="21.56;<?php echo $num_tramos; ?>">2Ø1"+4Ø3/4"</option>
                                <option value="24.38;<?php echo $num_tramos; ?>">4Ø1"+2Ø5/8"</option>
                                <option value="25.5;<?php echo $num_tramos; ?>">5Ø1"</option>
                                <option value="26.08;<?php echo $num_tramos; ?>">4Ø1"+2Ø3/4"</option>
                                <option value="30.6;<?php echo $num_tramos; ?>">6Ø1"</option>
                            </select>
                            <!-- <input class="aceroInputB" data-column="<?php /* echo $i */; ?>" type="number" value="1" id="aceroInputB<?php /* echo $i */; ?>" name="aceroInputB<?php /* echo $i */; ?>"> -->
                        </td>
                    <?php } ?>
                </tr>
                <!-- As Real (cm²) -->
                <tr>
                    <th scope="row" id="resultadosAceroB1">As Real</th>
                    <th scope="row" id="resultadosAceroB1">As Real</th>
                    <th scope="row" id="resultadosAceroB1">(areaAcero * 3) + (areaAcero * 0)</th>
                    <?php for ($i = 1; $i <= $num_tramos * 3; $i++) { ?>
                        <td></td>
                    <?php } ?>
                    <?php
                    /*  $As_reals1 = array(); // Declarar el array para almacenar los resultados
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
                        } */
                    ?>
                </tr>
                <!-- ФMn (Tonf-m) -->
                <tr>
                    <th scope="row" id="resultadosAceroB2">ФMn</th>
                    <th scope="row" id="resultadosAceroB2">ФMn</th>
                    <th scope="row" id="resultadosAceroB2">0.90 * (0.85 * fc * base * aReal1) * (d1 - aReal1 / 2) / 100000</th>
                    <?php for ($i = 1; $i <= $num_tramos * 3; $i++) { ?>
                        <td></td>
                    <?php } ?>
                    <!-- <th scope="row">ФMn (Tonf-m)</th> -->
                    <!-- $aceros = array();
                    $capass = array();
                     $mns = array();  // Declarar el array para almacenar los resultados
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
                        $mns1[] = $mn1;  // Agregar $mn al array $mns }
                    if (isset($mns1)) {
                        foreach ($mns1 as $mn1) {
                            echo "<td>$mn1</td>"; // Celda con el resultado
                        }
                    }  -->
                </tr>
                <!-- Verif. -->
                <tr>
                    <th scope="row" id="resultadosAceroB3">Verificación</th>
                    <th>Verif.</th>
                    <th>(condicional)</th>
                    <?php for ($i = 1; $i <= $num_tramos * 3; $i++) { ?>
                        <td></td>
                    <?php } ?>
                    <!-- <th scope="row">Verif.</th> -->
                    <!--
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
                     -->
                </tr>
            </tbody>
        </table>
        <!-- <div class="scrollArea scrollLeftArea">&nbsp;</div>
        <div class="scrollArea scrollRightArea">&nbsp;</div> -->

    </div>

    <!-- Diseño por Corte Losa -->
    <div class="table-responsive tableContainer">
        <table class="table">
            <thead style="font-size: 13px; background-color: #4e5c77; color:white">
                <tr>
                    <!-- <th scope="row" colspan="<?php /* echo $num_tramos * 3 + 1; */ ?>">Diseño por Flexión</th> -->
                    <th scope="row" colspan="2">LOSA POR CORTE</th>                    
                    <th scope="col">FÓRMULA</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos; $i++) {
                        echo "<th scope='col'>START</th>";
                        echo "<th scope='col'>MIDDLE</th>";
                        echo "<th scope='col'>END</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody style=" font-size: 11px;">
                <!-- Acw (cm²) -->
                <tr>
                    <th scope="row">Acw</th>
                    <th scope="row">Acw</th>
                    <th scope="row">base * d</th>
                    <?php
                    /* $capass = array(); */
                    $acw = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /* $d = $Altura - 3; */
                        $acw[$i] = $base[ceil(($i / 3))] * $d[ceil(($i / 3))];
                        // $mn = round(0.90 * (0.85 * $fc * $base[$i] * $aReal) * ($d - $aReal / 2) / 100000, 2, PHP_ROUND_HALF_UP);
                        /*  $mns[] = $acw; // Agregar 'A' al array $mns */
                        echo "<td>$acw[$i] cm²</td>";
                    }
                    /* if (isset($mns)) {
                        foreach ($mns as $acw) {
                            echo "<td>$acw</td>"; // Celda con el valor de 'A'
                        }
                    }*/
                    ?>
                </tr>
                <!-- VC (Tonf-m) -->
                <tr>
                    <th scope="row">VC</th>
                    <th scope="row">VC</th>
                    <th scope="row">0.53 * (f'c)^0.5 * acw / 1000</th>
                    <?php
                    /* $capass = array(); */
                    $vc = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /* $d = $Altura - 3;

                        $acw = $Bases * $d;
                        $acws[] = $acw; */

                        $vc[$i] = round(0.53 * sqrt($fc) * ($acw[$i]) / 1000, 2, PHP_ROUND_HALF_UP);
                        echo "<td>$vc[$i] Tonf-m</td>";
                        /* $vcs[] = $vc; */
                    }

                    /* if (isset($vcs)) {
                        foreach ($vcs as $vc) {
                            echo "<td>$vc</td>"; // Celda con el valor de 'A'
                        }
                    } */
                    ?>
                </tr>
                <!-- Ø Vc -->
                <tr>
                    <th scope="row">Ø Vc</th>
                    <th scope="row">Ø Vc</th>
                    <th scope="row">0.85 * vc</th>
                    <?php
                    /* $capass = array(); */
                    $vcfr = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /* $d = $Altura - 3;
                        $acw = $Bases * $d;
                        $acws[] = $acw;
                        $vc = 0.53 * sqrt($fc) * ($acw) / 1000;
                        $vcs[] = $vc; */
                        $vcfr[$i] = round(0.85 * $vc[$i], 2, PHP_ROUND_HALF_UP);
                        echo "<td>$vcfr[$i]</td>";
                        /* $vcfrs[] = $vcfr; */
                    }

                    /* if (isset($vcfrs)) {
                        foreach ($vcfrs as $vcfr) {
                            echo "<td>$vcfr</td>"; // Celda con el valor de 'A'
                        }
                    } */
                    ?>
                </tr>
                <!-- Vs (Tonf) -->
                <tr>
                    <th scope="row">Vs</th>
                    <th scope="row">Vs</th>
                    <th scope="row">|( vu / 0.85) - vc|</th>
                    <?php
                    /* $capass = array();
                    $vuss = array(); */
                    $VS = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /* $d = $Altura - 3;
                        $acw = $Bases * $d;
                        $acws[] = $acw;

                        $vc = round(0.53 * sqrt($fc) * ($acw) / 1000, 2, PHP_ROUND_HALF_UP);
                        $vcs[] = $vc;
                        $vus = floatval($_POST["Vu-$i"]); */
                        $VS[$i] = round(abs(($vu[$i] / 0.85) - $vc[$i]), 2, PHP_ROUND_HALF_UP);
                        /* $Vss[] = $VS; */
                        echo "<td>$VS[$i] Tonf</td>";
                    }

                    /* if (isset($Vss)) {
                        foreach ($Vss as $VS) {
                            echo "<td>$VS</td>"; // Celda con el valor de 'A'
                        }
                    } */
                    ?>
                </tr>
                <!-- S(cm) -->
                <tr>
                    <th scope="row">S</th>
                    <th scope="row">S</th>
                    <th scope="row">|0.713 * Fy * d / (VS * 1000)|</th>
                    <?php
                    /* $capass = array(); */
                    for ($i = 1; $i <= $num_tramos * 3; $i++) { # code...
                        /*  $d = $Altura - 3;
                        $acw = $Bases * $d;
                        $acws[] = $acw;

                        $vc = 0.53 * sqrt($fc) * ($acw) / 1000;
                        $vcs[] = $vc;

                        $vus = floatval($_POST["Vu-$i"]);
                        $VS = round($vus / 0.85 - $vc, 2, PHP_ROUND_HALF_UP);
                        $Vss[] = $VS; */

                        $Espacios = round(abs(0.713 * $fy * $d[ceil(($i / 3))] / ($VS[$i] * 1000)), 2, PHP_ROUND_HALF_UP);
                        /* $Espacioss[] = $Espacios; */
                        echo "<td>$Espacios cm</td>";
                    }
                    /* if (isset($Espacioss)) {
                        foreach ($Espacioss as $Espacios) {
                            echo "<td>$Espacios</td>"; // Celda con el valor de 'A'
                        }
                    } */
                    ?>
                </tr>
                <!-- S=d/4 (cm) -->
                <tr>
                    <th scope="row">S</th>
                    <th scope="row">S</th>
                    <th scope="row">d / 4</th>
                    <?php
                    /* $capass = array(); */

                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /*$d = $Altura - 3;
                        $d = $Altura - 3;
                        $acw = $Bases * $d;
                        $acws[] = $acw; */
                        $ped = $d[ceil(($i / 3))] / 4;
                        /* $peds[] = $ped; */
                        echo "<td>$ped cm/td>";
                    }

                    /* if (isset($peds)) {
                        foreach ($peds as $ped) {
                            echo "<td>$ped</td>"; // Celda con el valor de 'A'
                        }
                    } */
                    ?>
                </tr>
                <!-- Lconf (cm) -->
                <tr>
                    <th scope="row">Lconf</th>
                    <th scope="row">Lconf</th>
                    <th scope="row">2 * altura</th>
                    <?php
                    /* $capass = array(); */
                    $Lconfi = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $Lconfi[$i] = 2 * $altura[ceil(($i / 3))];
                        /* $Lconfis[] = $Lconfi; */
                        echo "<td>$Lconfi[$i] cm</td>";
                    }

                    /* if (isset($Lconfis)) {
                        foreach ($Lconfis as $Lconfi) {
                            echo "<td>$Lconfi</td>"; // Celda con el valor de 'A'
                        }
                    } */
                    ?>
                </tr>
                <!-- Usar (cm) -->
                <tr>
                    <th scope="row">UsarS</th>
                    <th scope="row">UsarS</th>
                    <th scope="row">min(S, s2, smax)</th>
                    <?php
                    /* $capass = array(); */
                    $usarS = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $S = 62;
                        $s2 = 13.5;
                        $smax = 10;
                        $usarS[$i] = min($S, $s2, $smax);
                        echo "<td>$usarS[$i] cm</td>";
                        /* $usarSs[] = $usarS; */
                    }

                    /*  if (isset($usarSs)) {
                        foreach ($usarSs as $usarS) {
                            echo "<td>$usarS</td>"; // Celda con el valor de 'A'
                        }
                    } */
                    ?>
                </tr>
                <!-- # estribos zona conf. -->
                <tr>
                    <th scope="row"># estribos zona conf.</th>
                    <th scope="row"># estribos zona conf.</th>
                    <th scope="row">Lconfi / usarS</th>
                    <?php
                    /* $capass = array(); */

                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /* $Lconfi = 2 * $Altura;
                        $Lconfis[] = $Lconfi;
                        $S = 62;
                        $s2 = 13.5;
                        $smax = 10;
                        $usarS = min($S, $s2, $smax);
                        $usarSs[] = $usarS; */

                        $estribos = $Lconfi[$i] / $usarS[$i];
                        echo "<td>$estribos</td>";
                        /* $estriboss[] = $estribos; */
                    }

                    /* if (isset($estriboss)) {
                        foreach ($estriboss as $estribos) {
                            echo "<td>$estribos</td>"; // Celda con el valor de 'A'
                        }
                    } */
                    ?>
                </tr>
                <!-- Verif. -->
                <tr>
                    <th scope="row">Verificación</th>
                    <th scope="row">Verif.</th>
                    <th scope="row">(condicional)</th>
                    <?php
                    /* $capass = array(); */
                    for ($i = 1; $i <= $num_tramos; $i++) {
                        $estribado = "";

                        if ($VultimoPositivo < $vc[$i]) {
                            $estribado = "CUMPLE";
                        } else {
                            if ($Vultimonegativo < $vc[$i]) {
                                $estribado = "NO CUMPLE";
                            } else {
                                $estribado = "CUMPLE";
                            }

                            $estribado = "NO CUMPLE";
                        }

                        echo "<td class='text-center' colspan='3'>$estribado</td>";
                        /* $estribados[] = $estribado; */
                    }

                    /* if (isset($estribados)) {
                        foreach ($estribados as $estribado) {
                            echo "<td class='text-center' colspan='3'>$estribado</td>"; // Celda con el valor de 'A'
                        }
                    } */
                    ?>
                </tr>
            </tbody>
        </table>
        <!-- <div class="scrollArea scrollLeftArea">&nbsp;</div>
        <div class="scrollArea scrollRightArea">&nbsp;</div> -->

    </div>


    <div class="table-responsive tableContainer">
        <table class="table text-center">
            <thead style="font-size: 13px; background-color: #4e5c77; color:white">
                <tr>
                    <!-- <th scope="row" colspan="<?php /* echo $num_tramos * 3 + 1; */ ?>">Diseño por Flexión</th> -->
                    <th scope="row" colspan="2">DISEÑO POR DEFLEXIÓN</th>                    
                    <th scope="col">FÓRMULA</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos; $i++) {
                        echo "<th scope='col'>START</th>";
                        echo "<th scope='col'>MIDDLE</th>";
                        echo "<th scope='col'>END</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody style=" font-size: 11px;">
                <!-- $MoIzq=$Mi[$i];
                $Moder=$Md[$i];
                $DefelxioncargaMuerta=$did1[$i];
                $DefelxioncargaViva=$did2[$i];
                $DefelxioncargaVivaporcentaje=$did3[$i];
                $cargaMuerta=$CM[$i];
                $cargaViva=[$i]; -->
                <!-- VALORES GENERALES -->
                <?php
                /* Ec */
                $EC = 15000 * sqrt($fc);
                /* Es */
                $ES = 2000000;
                /* Mcr */
                $Mcr = 405 / 1000;
                /* lg */
                $lg = 22700 * pow(10, -8);
                $bf = 0;

                $Ma = array();
                $ddef = array();
                $baseP = array();
                $BaseM = array();
                for ($i = 1; $i <= $num_tramos * 3; $i++) {
                    $Ma[$i] = $cargaMuerta[ceil(($i / 3))] + $cargaViva[ceil(($i / 3))];
                    $ddef[$i] = ($altura[ceil(($i / 3))] - 3) / 100;
                    $baseP[$i] = $bp[ceil(($i / 3))] / 100;
                    $BaseM[$i] = $base[ceil(($i / 3))] / 100;
                }
                ?>
                <!-- -------------------------------------------------------------------- -->
                <!-- n -->
                <tr>
                    <th scope="row">Relación modular</th>
                    <th scope="row">n</th>
                    <th scope="row">Es / Ec</th>
                    <?php
                    $n = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        // Realiza la operación que necesites aquí, por ejemplo, suma de base y altura
                        $n[$i] = round($ES / $EC, 2, PHP_ROUND_HALF_UP);
                        echo "<td>$n[$i]</td>";
                        /* $ns[] = $n; // Agregar $mn al array $mns */
                    }
                    /* if (isset($ns)) {
                        foreach ($ns as $n) {
                            echo "<td>$n</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- As (cm²) -->
                <tr>
                    <th scope="row">Refuerzo usado en claro</th>
                    <th scope="row">As</th>
                    <th scope="row">1.98</th>
                    <?php
                    $Asd = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        // Realiza la operación que necesites aquí, por ejemplo, suma de base y altura
                        $Asd[$i] = round(1.98, 2, PHP_ROUND_HALF_UP);
                        echo "<td>$Asd[$i] cm²</td>";
                        /* $Asds[] = $Asd; // Agregar $mn al array $mns */
                    }
                    /* if (isset($Asds)) {
                        foreach ($Asds as $Asd) {
                            echo "<td>$Asd</td>"; // Celda con el resultado
                        }
                    } */
                    ?>
                </tr>
                <!-- c (cm) -->
                <tr>
                    <th scope="row">Altura comprimido</th>
                    <th scope="row">c</th>
                    <th scope="row">((-n * As * 10^-4 + ( ( n * As * 10^-4)² - 4 * ((base/100) / 2) * (-n * As * 10^-4 * (d/100) ) )^0.5 )) / (2 * (base/100) / 2) * 100</th>
                    <?php
                    $CAl = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /* $n = round($ES / $EC, 2, PHP_ROUND_HALF_UP);
                        $ns[] = $n; */
                        /*$Asd = round(1.98, 2, PHP_ROUND_HALF_UP);
                        $Asds[] = $Asd; */
                        $q4 = pow($n[$i] * $Asd[$i] * pow(10, -4), 2) - 4 * ($BaseM[$i] / 2) * (-$n[$i] * $Asd[$i] * pow(10, -4) * $ddef[$i]);
                        $CAl[$i] = round(((-$n[$i] * $Asd[$i] * pow(10, -4) + sqrt(pow($n[$i] * $Asd[$i] * pow(10, -4), 2) - 4 * ($BaseM[$i] / 2) * (-$n[$i] * $Asd[$i] * pow(10, -4) * $ddef[$i])))) / (2 * $BaseM[$i] / 2) * 100, 2, PHP_ROUND_HALF_UP);
                        /* $CAl[$i] = round(((-$n[$i] * $Asd[$i] * pow(10, -4) + sqrt(pow($n[$i] * 0.40 * pow(10, -4), 2) - 4 * ($BaseM[$i] / 2) * (-$n[$i] * $Asd[$i] * pow(10, -4) * $ddef[$i])))) / (2 * $BaseM[$i] / 2) * 100, 2, PHP_ROUND_HALF_UP); */

                        if ($q4 > 0) {
                            echo "<td>$CAl[$i] cm</td>"; // Celda con el resultado
                        } else {
                            echo "<td>Ráiz de negativo</td>"; // Celda con el resultado
                        }
                        /* $CAls[] = $CAl; */
                    }
                    /* if (isset($CAls)) {
                        foreach ($CAls as $CAl) {
                            echo "<td>$CAl</td>";
                        }
                    } */
                    ?>
                </tr>
                <!-- Lcr (cm<sup>4</sup>) -->
                <tr>
                    <th scope="row">Inercia crítica</th>
                    <th scope="row">Lcr</th>
                    <th scope="row">( b * c^3 ) / 3 + n * As * ( d - c)²</th>
                    <?php
                    $ICricicaM = array();
                    $Icritica = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        /* $n = round($ES / $EC, 2, PHP_ROUND_HALF_UP);
                        $ns[] = $n;
                        $Asd = round(1.98, 2, PHP_ROUND_HALF_UP);
                        $Asds[] = $Asd;
                        $CAl[$i] = ((-$n * $Asd * pow(10, -4) + sqrt(pow($n * 0.40 * pow(10, -4), 2) - 4 * (0.40 / 2) * (-$n * $Asd * pow(10, -4) * $ddef[$i])))) / (2 * 0.40 / 2) * 100; */
                        /* $CAls[] = $CAl; */
                        $ICricicaM[$i] = round($baseP[$i] * (pow($CAl[$i] * pow(10, -2), 3)) / 3 + $n[$i] * $Asd[$i] * pow(10, -4) * pow($ddef[$i] - $CAl[$i] * pow(10, -2), 2), 10, PHP_ROUND_HALF_UP);
                        $Icritica[$i] = round($ICricicaM[$i] * pow(10, 8), 2, PHP_ROUND_HALF_UP);
                        echo "<td>$Icritica[$i] cm^4</td>";
                        /* $Icriticas[] = $Icritica; */
                    }
                    /* if (isset($Icriticas)) {
                        foreach ($Icriticas as $Icritica) {
                            echo "<td>$Icritica</td>";
                        }
                    } */
                    ?>
                </tr>
                <!-- Lef (cm<sup>4</sup>) -->
                <tr>
                    <th scope="row">Lef</th>
                    <th scope="row">Lef</th>
                    <th scope="row">(Mcr/ma)^3 * lg + + (1 - (Mcr/Ma)^3 ) * lcr </th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $I = pow($Mcr / $Ma[$i], 3) * $lg + (1 - pow($Mcr / $Ma[$i], 3)) * $ICricicaM[$i];
                        $Linercia = round($I * pow(10, 8), 2, PHP_ROUND_HALF_UP);
                        echo "<td>$Linercia cm^4</td>";
                        /* $Linercias[] = $Linercia; */
                    }
                    /* if (isset($Linercias)) {
                        foreach ($Linercias as $Linercia) {
                            echo "<td>$Linercia</td>";
                        }
                    } */
                    ?>
                </tr>
                <!-- δt (cm) -->
                <tr>
                    <th scope="row">Deflexiones inmediatas dedibo al 100%CM y 100%CV</th>
                    <th scope="row">δt</th>
                    <th scope="row">5 * 5.98² / (48 * (EC * 10) * I) * (1.15 - 0.1 * (Mi + Md)) * 100</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $I = pow($Mcr / $Ma[$i], 3) * $lg + (1 - pow($Mcr / $Ma[$i], 3)) * $ICricicaM[$i];
                        /*c65 excel _> δt  =5*E57^2/(48*(E59*10)*E61)*(E56-0.1*(E54+E55))*100 */
                        $deflexionesT = round(5 * pow(5.98, 2) / (48 * ($EC * 10) * $I) * (1.15 - 0.1 * ($Mi[ceil(($i / 3))] + $Md[ceil(($i / 3))])) * 100, 2, PHP_ROUND_HALF_UP);
                        /* $deflexionesT = round(5 * pow(5.98, 2) / (48 * ($EC * 10) * $I) * (1.15 - 0.1 * ($MoIzq + $Moder)) * 100, 2, PHP_ROUND_HALF_UP); */
                        /* $deflexionesTs[] = $deflexionesT; */
                        echo "<td>$deflexionesT cm</td>";
                    }
                    /* if (isset($deflexionesTs)) {
                        foreach ($deflexionesTs as $deflexionesT) {
                            echo "<td>$deflexionesT</td>";
                        }
                    } */
                    ?>
                </tr>
                <!-- δt/30 (cm) -->
                <tr>
                    <th scope="row">δt/30</th>
                    <th scope="row">δt/30</th>
                    <th scope="row">δ1 + δ3</th>
                    <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $deflexionesTmin = $did1[ceil(($i / 3))] + $did3[ceil(($i / 3))];
                        /* $deflexionesTmin = $DefelxioncargaMuerta + $DefelxioncargaVivaporcentaje; */
                        /* $deflexionesTmins[] = $deflexionesTmin; */
                        echo "<td>$deflexionesTmin cm</td>";
                    }
                    /* if (isset($deflexionesTmins)) {
                        foreach ($deflexionesTmins as $deflexionesTmin) {
                            echo "<td>$deflexionesTmin</td>";
                        }
                    } */
                    ?>
                </tr>
                <!-- p´ (cm) -->
                <tr>
                    <th scope="row">Cuantía del acero en compresión</th>
                    <th scope="row">p´</th>
                    <th scope="row">100 * aceroColocado / (40*22)</th>
                    <?php
                    $pp = 0;
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $aceroColocado = 3.96;
                        $pp = $aceroColocado / (40 * 22);
                        $pprima = ($pp * 100);
                        echo "<td>$pprima cm</td>";
                        /* $pprimas[] = $pprima; */
                    }
                    /* if (isset($pprimas)) {
                        foreach ($pprimas as $pprima) {
                            echo "<td>$pprima%</td>";
                        }
                    } */
                    ?>
                </tr>
                <!-- λ (cm) -->
                <tr>
                    <th scope="row">Deflección diferida</th>
                    <th scope="row">λ</th>
                    <th scope="row">2.00 / (1 + 50 * p')</th>
                    <?php
                    $Ddiferida = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $aceroColocado = 3.96;
                        $Ddiferida[$i] = round(2.00 / (1 + 50 * $pp), 2, PHP_ROUND_HALF_UP);
                        /* $Ddiferidas[] = $Ddiferida; */
                        echo "<td>$Ddiferida[$i] cm</td>";
                    }
                    /* if (isset($Ddiferidas)) {
                        foreach ($Ddiferidas as $Ddiferida) {
                            echo "<td>$Ddiferida</td>";
                        }
                    } */
                    ?>
                </tr>
                <!-- Δcm (cm) -->
                <tr>
                    <th scope="row">deflección diferida debido a la carga muerta</th>
                    <th scope="row">Δcm</th>
                    <th scope="row">λ * δ1</th>
                    <?php
                    $DdiferidaCM = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $aceroColocado = 3.96;
                        /* $Ddiferida = round(2.00 / (1 + 50 * $pp), 2, PHP_ROUND_HALF_UP);
                        $Ddiferidas[] = $Ddiferida; */
                        $DdiferidaCM[$i] = round($Ddiferida[$i] * $did1[ceil(($i / 3))], 2, PHP_ROUND_HALF_UP);
                        /* $DdiferidaCM[$i] = round($Ddiferida[$i] * $DefelxioncargaMuerta, 2, PHP_ROUND_HALF_UP); */
                        /* $DdiferidaCMs[] = $DdiferidaCM; */
                        echo "<td id='DdiferidaCM$i'>$DdiferidaCM[$i] cm</td>";
                    }
                    /* if (isset($DdiferidaCMs)) {
                        foreach ($DdiferidaCMs as $DdiferidaCM) {
                            echo "<td>$DdiferidaCM</td>";
                        }
                    } */
                    ?>
                </tr>
                <!-- Δcv (cm) -->
                <tr>
                    <th scope="row">Deflección diferida debido al 30% de la carga viva</th>
                    <th scope="row">Δcv</th>
                    <th scope="row">λ * δ3</th>
                    <?php
                    $DdiferidaCV = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $aceroColocado = 3.96;
                        /* $Ddiferida = round(2.00 / (1 + 50 * $pp), 2, PHP_ROUND_HALF_UP);
                        $Ddiferidas[] = $Ddiferida; */
                        $DdiferidaCV[$i] = round($Ddiferida[$i] * $did3[ceil(($i / 3))], 2, PHP_ROUND_HALF_UP);
                        /* $DdiferidaCV = round($Ddiferida * $DefelxioncargaVivaporcentaje, 2, PHP_ROUND_HALF_UP); */
                        /* $DdiferidaCVs[] = $DdiferidaCV; */
                        echo "<td id='DdiferidaCV$i'>$DdiferidaCV[$i] cm</td>";
                    }
                    /* if (isset($DdiferidaCVs)) {
                        foreach ($DdiferidaCVs as $DdiferidaCV) {
                            echo "<td>$DdiferidaCV</td>";
                        }
                    } */
                    ?>
                </tr>

                <!-- <tr>
                    <th scope="row">CASOS</th>
                    <td><select class="form-control form-control-sm" style="width:100%" name="casosSelect" id="casosSelect">
                            <option <?php /* $CSO1 = 1 */ ?> value="0.50">CASO 1</option>
                            <option <?php /* $CSO1 = 2 */ ?> value="0.51">CASO 2</option>
                            <option <?php /* $CSO1 = 3 */ ?>value="1.97">CASO 3</option>
                            <option <?php /* $CSO1 = 4 */ ?>value="2">CASO 4</option>
                            <?php
                            /* $Options = array();
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
                            $Options[] = $Option; */
                            ?>
                        </select>
                    </td>
                </tr> -->
                <tr>
                    <th scope="row" colspan="2">CASOS</th>
                    <th scope="row">Fórmula</th>
                    <?php for ($i = 1; $i <= $num_tramos * 3; $i++) { ?>
                        <td>
                            <select class="casosSelectA" data-column="<?php echo $i; ?>" name="casosSelectA<?php echo $i; ?>" id="casosSelectA<?php echo $i; ?>">
                                <option value="0.5">Caso 1</option>
                                <option value="0.51">Caso 2</option>
                                <option value="1.97">Caso 3</option>
                                <option value="2">Caso 4</option>
                            </select>
                        </td>
                    <?php } ?>
                </tr>
                <!-- <tr>
                    <th scope="row">CASOS</th>
                    <td>
                        <select class="form-control form-control-sm" style="width:100%" name="casosSelect" id="casosSelect">
                            <option value="0.50">CASO 1</option>
                            <option value="0.51">CASO 2</option>
                            <option value="1.97">CASO 3</option>
                            <option value="2">CASO 4</option>
                        </select>
                    </td>
                </tr>
                -->
                <tr>
                    <th id="casoResultA" scope="row">Deflección diferida debido a la carga muerta</th>
                    <th>Δ (cm)</th>
                    <th>(condicional)</th>
                    <?php for ($i = 1; $i <= $num_tramos * 3; $i++) { ?>
                        <td></td>
                    <?php } ?>
                    <?php
                    /* if (isset($_POST['casosSelect'])) {
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
                    } */
                    ?>
                </tr>


                <tr>
                    <th id="casoResultB" scope="row">Deflección máximo permitido</th>
                    <th id="casoResultB" scope="row">Δmáx</th>
                    <th id="casoResultB" scope="row">(condicional)</th>
                    <?php for ($i = 1; $i <= $num_tramos * 3; $i++) { ?>
                        <td></td>
                    <?php } ?>
                    <?php
                    /* for ($i = 1; $i <= $num_tramos * 3; $i++) {
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
                    } */
                    ?>
                </tr>
                <tr>
                    <th id="casoResultC" scope="row">Verificación</th>
                    <th id="casoResultC" scope="row">Verif.</th>
                    <th id="casoResultC" scope="row">(condicional)</th>
                    <?php for ($i = 1; $i <= $num_tramos * 3; $i++) { ?>
                        <td></td>
                    <?php } ?>
                    <?php
                    /* for ($i = 1; $i <= $num_tramos * 3; $i++) {
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
                    }*/
                    ?>
                </tr>
            </tbody>
        </table>
        <!-- <div class="scrollArea scrollLeftArea">&nbsp;</div>
        <div class="scrollArea scrollRightArea">&nbsp;</div> -->
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>

    </script>
</body>

</html>