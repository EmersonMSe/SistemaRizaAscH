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
    $eje = array();
    $base = array();
    $altura = array();
    $capas = array();
    $MomentoUltimos = array();
    $vu = array();
    $tu = array();
    $muCM = array();
    $muCv = array();
    $luzLibre = array();
    $acero = array();
    $cantidadAcero = array();
    for ($i = 1; $i <= $num_tramos * 3; $i++) {
        // Los nombres de los campos generados dinámicamente serán como 'Luz_Libre-1', 'Luz_Libre-2', etc.
        $base[$i] = isset($_POST["BASE$i"]) ? floatval($_POST["BASE$i"]) : 0;
        $altura[$i] = isset($_POST["ALTURA$i"]) ? floatval($_POST["ALTURA$i"]) : 0;
        $capas[$i] = isset($_POST["CAPAS-$i"]) ? intval($_POST["CAPAS-$i"]) : 0;
        $MomentoUltimos[$i] = isset($_POST["MomentoUltimo-$i"]) ? floatval($_POST["MomentoUltimo-$i"]) : 0;
        $vu[$i] = isset($_POST["Vu-$i"]) ? floatval($_POST["Vu-$i"]) : 0;
        $tu[$i] = isset($_POST["Tu-$i"]) ? floatval($_POST["Tu-$i"]) : 0;
        $muCv[$i] = isset($_POST["MuCV-$i"]) ? floatval($_POST["MuCV-$i"]) : 0;
        $muCM[$i] = isset($_POST["MuCM-$i"]) ? floatval($_POST["MuCM-$i"]) : 0;
        $luzLibre[$i] = isset($_POST["Luz_Libre$i"]) ? floatval($_POST["Luz_Libre$i"]) : 0;
        $cantidadAcero[$i] = isset($_POST["CAcero-$i"]) ? floatval($_POST["CAcero-$i"]) : 0;
        $acero[$i] = isset($_POST["TipoAc-$i"]) ? floatval($_POST["TipoAc-$i"]) : 0;

        //--------------------------------------------------------------------
    }
}
?>
<?php
    $luzLibre1 = array();
    $carga_muerta1 = array();
    $carga_viva1 = array();
    $base1 = array();
    $altura1 = array();
    $capas1 = array();
    $mu1 = array();
    $vu1 = array();
    $tu1 = array();
    $acero1 = array();
    $cantidadAcero1 = array();
    for ($i = 1; $i <= $num_tramos * 3; $i++) {
        //Los nombres de los campos generados dinámicamente serán como 'Luz_Libre+1', 'Luz_Libre+2', etc. DIFERENTE AL POSITIVO
        $capas_[$i] = isset($_POST["CAPAS+$i"]) ? intval($_POST["CAPAS+$i"]) : 0;
        $mu_[$i] = isset($_POST["MomentoUltimo+$i"]) ? floatval($_POST["MomentoUltimo+$i"]) : 0;
        $vu_[$i] = isset($_POST["Vu+$i"]) ? floatval($_POST["Vu+$i"]) : 0;
        $tu_[$i] = isset($_POST["Tu+$i"]) ? floatval($_POST["Tu+$i"]) : 0;
        $acero_[$i] = isset($_POST["ACERO+$i"]) ? intval($_POST["ACERO+$i"]) : 0;
        $muCv_[$i] = isset($_POST["MuCV+$i"]) ? floatval($_POST["MuCV+$i"]) : 0;
        $muCM_[$i] = isset($_POST["MuCM+$i"]) ? floatval($_POST["MuCM+$i"]) : 0;
        $cantidadAcero_[$i] = isset($_POST["CAcero+$i"]) ? floatval($_POST["CAcero+$i"]) : 0;
        $acero_[$i] = isset($_POST["TipoAc+$i"]) ? floatval($_POST["TipoAc+$i"]) : 0;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document1</title>
</head>
<style>
    body {
        font-family: 'Helvetica Neue', Helvetica, sans-serif;
        /* font-size: 0.3cm */
    }

    table {
        font-family: 'Helvetica Neue', Helvetica, sans-serif;
    }

    table.table {
        margin-bottom: 0;
        /* Eliminar el espacio inferior de la tabla */
    }

    .tab_encabezados {
        font-family: 'Helvetica Neue', Helvetica, sans-serif;
        font-size: 16pt;
        font-weight: 700;
    }

    .sub_encabezados {
        background-color: #4f5d78;
        color: #fff;
        font-family: 'Helvetica Neue', Helvetica, sans-serif;
        font-size: 11pt;
        font-weight: bold;
    }
    .sub_sub_encabezados {
        background-color: #a6b7c7;
        color: #fff;
        font-family: 'Helvetica Neue', Helvetica, sans-serif;
        font-size: 11pt;
        font-weight: bold;
    }

    .datos_relleno {
        font-family: 'Helvetica Neue', Helvetica, sans-serif;
        font-size: 11pt;
    }
</style>

<body>
    <!-- <h3 class="tab_encabezados">1.- Requisitos de diseño</h3> -->
    <table class="table table-hover">
        <!-- requisitos de diseño -->
        <thead>
            <tr class="sub_encabezados">
                <th scope="col" class="tab_encabezados">1.- Requisitos de diseño</th>
                <th scope="col"></th>
                <?php
                    // Calcular el número total de columnas requeridas
                    $num_columnas = $num_tramos * 3;

                    // Generar las etiquetas <th> según el número de columnas
                    for ($i = 0; $i < $num_columnas; $i++) {
                        // Determinar la etiqueta para cada columna (START, MIDDLE, END)
                        $etiqueta = "";
                        switch ($i % 3) {
                            case 0:
                                $etiqueta = "START";
                                break;
                            case 1:
                                $etiqueta = "MIDDLE";
                                break;
                            case 2:
                                $etiqueta = "END";
                                break;
                        }
                        // Imprimir la etiqueta en una columna <th>
                        echo "<th class='text-center' scope='col'>$etiqueta</th>";
                    }
                ?>
            </tr>
        </thead>
        <tbody class="datos_relleno">
            <tr>
                <td>Esfuerzo de fluencia del acero</td>
                <td>fy</td>
                <?php
                    $efas = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $efa = $fy;
                        $efas[] = $efa;
                    }
                    if (isset($efas)) {
                        foreach ($efas as $efa) {
                            echo "<td class='text-center'>$efa kg/cm<sup>2</sup></td>"; // Imprimir el valor de cada $efa en una celda de la tabla
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Esfuerzo de comprension del concreto</td>
                <td>f'c</td>
                <?php
                    $eccs = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $ecc = $fc;
                        $eccs[] = $ecc;
                    }
                    if (isset($eccs)) {
                        foreach ($eccs as $ecc) {
                            echo "<td class='text-center'>$ecc kg/cm<sup>2</sup></td>"; // Imprimir el valor de cada $efa en una celda de la tabla
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Altura de la Viga</td>
                <td>h</td>
                <?php
                    $alturas = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $alt = isset($altura[$i]) ? $altura[$i] : 0;
                        $alturas[] = $alt;
                    }

                    if (isset($alturas)) {
                        foreach ($alturas as $altura) {
                            echo "<td class='text-center'>$altura cm</td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Base de la Viga</td>
                <td>b</td>
                <?php
                    $bases = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $bas = isset($base[$i]) ? $base[$i] : 0; // Verificamos si $base[$i] está definido
                        $bases[] = $bas;
                    }

                    if (isset($bases)) {
                        foreach ($bases as $base) {
                            echo "<td class='text-center'>$base cm</td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Parámetro en función de la resistencia del concreto</td>
                <td>β1</td>
                <?php
                    $parfres = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $parfre = 0;
                        if ($fc <= 280) {
                            $parfre = 0.85;
                        } else {
                            if ($fc > 280 || $fc <= 560) {
                                $parfre = 1.05 - 0.714 * $fc / 1000;
                            } else {
                                $parfre = 0.65;
                            }
                        }

                        $parfres[] = $parfre;
                    }
                    if (isset($parfres)) {
                        foreach ($parfres as $parfre) {
                            echo "<td class='text-center'>$parfre</td>"; // Imprimir el valor de cada $efa en una celda de la tabla
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Deformación última del concreto</td>
                <td>εcu</td>
                <?php
                    $defultcs = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $defultc = 0.003;
                        $defultcs[] = $defultc;
                    }
                    if (isset($defultcs)) {
                        foreach ($defultcs as $defultc) {
                            echo "<td class='text-center'>$defultc</td>"; // Imprimir el valor de cada $efa en una celda de la tabla
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Deformación de fluencia del acero</td>
                <td>εy</td>
                <?php
                    $deffluacers = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $deffluacer = 0.0021;
                        $deffluacers[] = $deffluacer;
                    }
                    if (isset($deffluacers)) {
                        foreach ($deffluacers as $deffluacer) {
                            echo "<td class='text-center'>$deffluacer</td>"; // Imprimir el valor de cada $efa en una celda de la tabla
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Factor de reducción a flexión sin carga axial</td>
                <td>Ф</td>
                <?php
                    $facredfs = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $facredf = 0.90;
                        $facredfs[] = $facredf;
                    }
                    if (isset($facredfs)) {
                        foreach ($facredfs as $facredf) {
                            echo "<td class='text-center'>$facredf</td>"; // Imprimir el valor de cada $efa en una celda de la tabla
                        }
                    }
                ?>
            </tr>
        </tbody>
        <!-- diseño de flexion negativo-->
        <thead>
            <tr class="sub_encabezados">
                <th scope="col" class="tab_encabezados">2.- Diseño de flexion</th>
                <th scope="col"></th>
                <?php
                    // Calcular el número total de columnas requeridas
                    $num_columnas = $num_tramos * 3;

                    // Generar las etiquetas <th> según el número de columnas
                    for ($i = 0; $i < $num_columnas; $i++) {
                        // Determinar la etiqueta para cada columna (START, MIDDLE, END)
                        $etiqueta = "";
                        switch ($i % 3) {
                            case 0:
                                $etiqueta = "START";
                                break;
                            case 1:
                                $etiqueta = "MIDDLE";
                                break;
                            case 2:
                                $etiqueta = "END";
                                break;
                        }
                        // Imprimir la etiqueta en una columna <th>
                        echo "<th class='text-center' scope='col'>$etiqueta</th>";
                    }
                    ?>
            </tr>
            <tr>
                <th scope="col" class="sub_sub_encabezados">Parte negativo</th>
            </tr>
        </thead>
        <tbody class="datos_relleno">
            <tr>
                <td>Peralte efectivo en "cm"</td>
                <td>d</td>
                <?php
                    $ds = array(); // Declarar el array para almacenar los resultados
                    $altura = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $altura[$i] = floatval($_POST["ALTURA$i"]);
                        $d = 0; // Valor predeterminado en caso de que $capas[$i] no esté definido o no sea un array
                        if (isset($capas[$i]) && is_array($altura)) {
                            switch ($capas[$i]) {
                                case 1:
                                    $d = $altura[$i] - 6;
                                    break;
                                case 2:
                                    $d = $altura[$i] - 8;
                                    break;
                                case 3:
                                    $d = $altura[$i] - 10;
                                    break;
                                case 4:
                                    $d = $altura[$i] - 12;
                                    break;
                                case 5:
                                    $d = $altura[$i] - 14;
                                    break;
                                case 6:
                                    $d = $altura[$i] - 16;
                                    break;
                                default:
                                    $d = $altura[$i]; // Si no hay una correspondencia en el switch, se mantiene el valor original
                            }
                        }
                        $ds[] = $d;
                    }

                    if (isset($ds)) {
                        foreach ($ds as $d) {
                            echo "<td class='text-center'>$d cm</td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Altura del bloque comprimido en "cm"</td>
                <td>a</td>
                <?php
                    $ds = array(); // Declarar el array para almacenar los resultados
                    $mus = array();
                    $base = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $base[$i] = floatval($_POST["BASE$i"]);
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $a = round($d - sqrt(pow($d, 2) - 2 * ABS($MomentoUltimos[$i] * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        $ds[] = $a;
                    }
                    if (isset($ds)) {
                        foreach ($ds as $a) {
                            echo "<td class='text-center'>$a cm</td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Refuerzo calculado en "cm2"</td>
                <td>As</td>
                <?php
                    $Ass = array(); // Declarar el array para almacenar los resultados
                    $ds = array();
                    $mus = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $FR = 0.90;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $ds[] = $d;
                        //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $base[$i]))));
                        $a = round($d - sqrt(pow($d, 2) - 2 * abs($MomentoUltimos[$i] * pow(10, 5)) / ($FR * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        //$a = 6.09;
                        $As = round(((0.85 * $fc * $base[$i] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass[] = $As; // Agregar $mn al array $As
                    }
                    if (isset($Ass)) {
                        foreach ($Ass as $As) {
                            echo "<td class='text-center'>$As cm<sup>2</sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Refuerzo mínimo en "cm2"</td>
                <td>As_min</td>
                <?php
                    $As_mins = array(); // Declarar el array para almacenar los resultados
                    $ds = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $ds[] = $d;
                        $As_min = round(max(0.7 * sqrt($fc) / $fy * $base[$i] * $d, 14 * $base[$i] * $d / $fy),2);
                        // $res=MAX(0.7*sqrt(210)/4200*30*52,14*30*52/4200);
                        $As_mins[] = $As_min; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_mins)) {
                        foreach ($As_mins as $As_min) {
                            echo "<td class='text-center'>$As_min cm<sup>2</sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Area de acero balanceado</td>
                <td>As Balanceado</td>
                <?php
                    $As_maxs = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β1 = 0.85;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $As_max = round((0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_maxs)) {
                        foreach ($As_maxs as $As_max) {
                            echo "<td class='text-center'>$As_max cm<sup>2</sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Refuerzo máximo en "cm2"</td>
                <td>As_máx 75%Asb</td>
                <?php
                    $As_maxs = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β1 = 0.85;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_maxs)) {
                        foreach ($As_maxs as $As_max) {
                            echo "<td class='text-center'>$As_max cm<sup>2</sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Acero a Usar</td>
                <td>As_usar</td>
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
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $ds[] = $d;
                        //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $base[$i]))));
                        $a = round($d - sqrt(pow($d, 2) - 2 * abs($MomentoUltimos[$i] * pow(10, 5)) / ($FR * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        //$a = 6.09;
                        $As = round(((0.85 * $fc * $base[$i] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass[] = $As; // Agregar $mn al array $As

                        $β1 = 0.85;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else {
                            $d = $altura[$i] - 8;
                        }
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else {
                            $d = $altura[$i] - 8;
                        }
                        $ds[] = $d;
                        $As_min =  round(max(0.7 * sqrt($fc) / $fy * $base[$i] * $d, 14 * $base[$i] * $d / $fy),2);
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
                            echo "<td class='text-center'>$As_usar cm<sup>2<sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <!-- formular y asignacion de variables -->
           

            <!-- Cantidad Aceros -->
            <tr>
                <td>Cantidad de Aceros </td>
                <td>cantidad/ unidad</td>
                <?php
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        echo "<td><input class='form-control form-control-sm' name='CANTIDAD_ACERO' id='CANTIDAD_ACERO'></td>";
                    }
                ?>
            </tr>
            <!-- tipo de Aceros -->
            <tr>
                <td>Tipo de Aceros </td>
                <td>Diametro mm</td>
                <?php
                $num_tramos = isset($_POST["num_tramos"]) ? intval($_POST["num_tramos"]) : 0;
                // Generar los elementos <select> dinámicamente
                for ($i = 1; $i <= $num_tramos * 3; $i++) {
                    echo "<td><select class='form-control form-control-sm' name='TipoA' id='TipoA'>";
                    $options = [
                        ['text' => 'Ø 0', 'value' => '0.000'],
                        ['text' => '6mm', 'value' => '0.283'],
                        ['text' => '8mm', 'value' => '0.503'],
                        ['text' => 'Ø 3/8', 'value' => '0.713'],
                        ['text' => '12mm', 'value' => '1.131'],
                        ['text' => 'Ø 1/2', 'value' => '1.267'],
                        ['text' => 'Ø 5/8', 'value' => '1.979'],
                        ['text' => 'Ø 3/4', 'value' => '2.850'],
                        ['text' => 'Ø 1', 'value' => '5.067'],
                    ];
                    foreach ($options as $option) {
                        $text = $option['text'];
                        $value = $option['value'];
                        $selected = ($value == $cantidad) ? 'selected' : '';
                        echo "<option value=\"$value\" $selected>$text</option>";
                    }
                    echo "</select></td>";
                }
                ?>
            </tr>

            <tr>
                <td>Aceros </td>
                <td>As_real (cm<sup>2</sup>)</td>
                <?php
                    $As_reala = array(); // Declarar el array para almacenar los resultados
                    $aceros = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $As_real = round(($acero[$i] * $cantidadAcero[$i]) + ($acero[$i] * $cantidadAcero[$i]), 2, PHP_ROUND_HALF_DOWN);
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
                <td>Aceros </td>
                <td>ФMn (Tonf-m)</td>
                <?php
                    $mns = array(); // Declarar el array para almacenar los resultados
                    $aceros = array();
                    $capass = array();
                    $Ass = array(); // Declarar el array para almacenar los resultados
                    $ds = array();
                    $mus = array();
                    $As_usars = array(); // Declarar el array para almacenar los resultados
                    $As_maxs = array(); // Declarar el array para almacenar los resultados // valores del As MIN
                    $As_mins = array(); // Declarar el array para almacenar los resultados
                    $ds = array();

                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $FR = 0.90;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $ds[] = $d;
                        //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $base[$i]))));
                        $a = round($d - sqrt(pow($d, 2) - 2 * abs($MomentoUltimos[$i] * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        //$a = 6.09;
                        $As = round(((0.85 * $fc * $base[$i] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass[] = $As; // Agregar $mn al array $As

                        $β1 = 0.85;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else {
                            $d = $altura[$i] - 8;
                        }
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else {
                            $d = $altura[$i] - 8;
                        }
                        $ds[] = $d;
                        $As_min = max(0.7 * sqrt($fc) / $fy * $base[$i] * $d, 14 * $base[$i] * $d / $fy);
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

                        $aReal = round(($acero[$i] * $cantidadAcero[$i]) + ($acero[$i] * $cantidadAcero[$i]), 2, PHP_ROUND_HALF_DOWN); //$AR * $fy / (0.85 * $fc * $base[$i]);


                        $mn = round(0.90 * (0.85 * $fc * $base[$i] * $aReal) * ($d - $aReal / 2) / 100000, 2, PHP_ROUND_HALF_UP);
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
                <td>Aceros </td>
                <td>Verif.</td>
                <?php
                    $Ass = array();
                    $ds = array();
                    $mus = array();
                    $As_usars = array();
                    $As_maxs = array();
                    $As_mins = array();
                    $ds = array();
                    $Verifs = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $FR = 0.90;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $ds[] = $d;
                        //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $base[$i]))));
                        $a = round($d - sqrt(pow($d, 2) - 2 * abs($MomentoUltimos[$i] * pow(10, 5)) / ($FR * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        //$a = 6.09;
                        $As = round(((0.85 * $fc * $base[$i] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass[] = $As; // Agregar $mn al array $As

                        $β1 = 0.85;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else {
                            $d = $altura[$i] - 8;
                        }
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else {
                            $d = $altura[$i] - 8;
                        }
                        $ds[] = $d;
                        $As_min = max(0.7 * sqrt($fc) / $fy * $base[$i] * $d, 14 * $base[$i] * $d / $fy);
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
                        $As_usars[] = $As_usar;
                        $β1 = 0.85;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max;

                        $Verif = "";
                        if ($aReal < $As_max && $As_max >= $As_usar) {
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
        </tbody>
         <!-- diseño de flexion positivo -->
        <thead>
            <tr>
                <th scope="col" class="sub_sub_encabezados">Parte positivo</th>
            </tr>
        </thead>
        <tbody class="datos_relleno">
            <tr>
                <td>momento último de análisis en "tonf-m"</td>
                <td>Mu(-)=1/3Mu(+)(Tnf.m)</td>
                <?php
                    $mus = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $mu_i = isset($_POST["MomentoUltimo-$i"]) ? floatval($_POST["MomentoUltimo-$i"]) : 0;
                        $mu_dividido = round(abs($mu_i / 3), 2, PHP_ROUND_HALF_UP);
                        $mus[] = $mu_dividido;
                    }

                    if (isset($mus)) {
                        foreach ($mus as $mu_dividido) {
                            echo "<td class='text-center'>$mu_dividido Tnf.m</td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>momento último de análisis en "tonf-m"</td>
                <td>Mu (-) usar (Tonf.m)</td>
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
                            echo "<td class='text-center'>$mu Tonf.m</td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Peralte efectivo en "cm"</td>
                <td>d</td>
                <?php
                    $ds1 = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d1 = $capas_[$i];
                        if ($d1 == 1) {
                            $d1 = $altura[$i] - 6;
                        } else if ($d1 == 2) {
                            $d1 = $altura[$i] - 8;
                        } else if ($d1 == 3) {
                            $d1 = $altura[$i] - 10;
                        } elseif ($d1 == 4) {
                            $d1 = $altura[$i] - 12;
                        } elseif ($d1 == 5) {
                            $d1 = $altura[$i] - 14;
                        } elseif ($d1 == 6) {
                            $d1 = $altura[$i] - 16;
                        }
                        $ds1[] = $d1; // Agregar $mn al array $mns
                    }
                    if (isset($ds1)) {
                        foreach ($ds1 as $d1) {
                            echo "<td class='text-center'>$d1 cm</td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Altura del bloque comprimido en "cm"</td>
                <td>a</td>
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

                        $d1 = $capas_[$i];
                        if ($d1 == 1) {
                            $d1 = $altura[$i] - 6;
                        } else if ($d1 == 2) {
                            $d1 = $altura[$i] - 8;
                        } else if ($d1 == 3) {
                            $d1 = $altura[$i] - 10;
                        } elseif ($d1 == 4) {
                            $d1 = $altura[$i] - 12;
                        } elseif ($d1 == 5) {
                            $d1 = $altura[$i] - 14;
                        } elseif ($d1 == 6) {
                            $d1 = $altura[$i] - 16;
                        }
                        $ds1[] = $d1;
                        $a = round($d1 - sqrt(pow($d1, 2) - 2 * ABS($mu_usar * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        $ds[] = $a;
                    }
                    if (isset($ds)) {
                        foreach ($ds as $a) {
                            echo "<td class='text-center'>$a cm</td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Refuerzo calculado en "cm2"</td>
                <td>As</td>
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

                        $d1 = $capas_[$i];
                        if ($d1 == 1) {
                            $d1 = $altura[$i] - 6;
                        } else if ($d1 == 2) {
                            $d1 = $altura[$i] - 8;
                        } else if ($d1 == 3) {
                            $d1 = $altura[$i] - 10;
                        } elseif ($d1 == 4) {
                            $d1 = $altura[$i] - 12;
                        } elseif ($d1 == 5) {
                            $d1 = $altura[$i] - 14;
                        } elseif ($d1 == 6) {
                            $d1 = $altura[$i] - 16;
                        }
                        $ds1[] = $d1;
                        $a = round($d1 - sqrt(pow($d1, 2) - 2 * ABS($mu_usar * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        $ds[] = $a;
                        $As1 = round(((0.85 * $fc * $base[$i] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass1[] = $As1; // Agregar $mn al array $mns
                    }
                    if (isset($Ass1)) {
                        foreach ($Ass1 as $As1) {
                            echo "<td class='text-center'>$As1 cm<sup>2</sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>refuerzo mínimo en "cm2"</td>
                <td>As_min</td>
                <?php
                    $As_mins1 = array(); // Declarar el array para almacenar los resultados
                    $capass = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $capass = $capas[$i];

                        $d1 = $capas_[$i];
                        if ($d1 == 1) {
                            $d1 = $altura[$i] - 6;
                        } else if ($d1 == 2) {
                            $d1 = $altura[$i] - 8;
                        } else if ($d1 == 3) {
                            $d1 = $altura[$i] - 10;
                        } elseif ($d1 == 4) {
                            $d1 = $altura[$i] - 12;
                        } elseif ($d1 == 5) {
                            $d1 = $altura[$i] - 14;
                        } elseif ($d1 == 6) {
                            $d1 = $altura[$i] - 16;
                        }
                        $capas1s = $capas_[$i];
                        $As_min1 = round(max(0.7 * sqrt($fc) / $fy * $base[$i] * $d1, 14 * $base[$i] * $d / $fy),2);
                        $As_mins1[] = $As_min1; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_mins1)) {
                        foreach ($As_mins1 as $As_min1) {
                            echo "<td class='text-center'>$As_min1 cm<sup>2</sup></td>"; // Celda con el resultado
                        }
                    }
                    ?>
            </tr>
            <tr>
                <td>Area de acero balanceado</td>
                <td>As Balanceado</td>
                <?php
                    $As_maxs1 = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β11 = 0.85;
                        $As_max1 = round((0.85 * $β11 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d1, 2, PHP_ROUND_HALF_UP);
                        $As_maxs1[] = $As_max1; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_maxs1)) {
                        foreach ($As_maxs1 as $As_max1) {
                            echo "<td class='text-center'>$As_max1 cm<sup>2</sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>refuerzo máximo en "cm2"</td>
                <td>As_máx 75%Asb cm<sup>2</sup></td>
                <?php
                    $As_maxs1 = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β11 = 0.85;
                        $As_max1 = round(0.75 * (0.85 * $β11 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d1, 2, PHP_ROUND_HALF_UP);
                        $As_maxs1[] = $As_max1; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_maxs1)) {
                        foreach ($As_maxs1 as $As_max1) {
                            echo "<td class='text-center'>$As_max1 cm<sup>2</sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Acero a Usar</td>
                <td>As_usar cm<sup>2</sup></td>
                <?php
                    $As_mins1 = array(); // Declarar el array para almacenar los resultados
                    $As_usars1 = array(); // Declarar el array para almacenar los resultados
                    $As_maxs1 = array(); // Declarar el array para almacenar los resultados
                    $Ass1 = array(); // Declarar el array para almacenar los resultados
                    $capass = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $a1 = 1.39;
                        $As1 = round(((0.85 * $fc * $base[$i] * $a1) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass1[] = $As1; // Agregar $mn al array $mns
                        $β11 = 0.85;
                        $As_max1 = round(0.75 * (0.85 * $β11 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d1, 2, PHP_ROUND_HALF_UP);
                        $As_maxs1[] = $As_max1; // Agregar $As_max al array $As_maxs

                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $capass = $capas[$i];

                        $d1 = $capas_[$i];
                        if ($d1 == 1) {
                            $d1 = $altura[$i] - 6;
                        } else if ($d1 == 2) {
                            $d1 = $altura[$i] - 8;
                        } else if ($d1 == 3) {
                            $d1 = $altura[$i] - 10;
                        } elseif ($d1 == 4) {
                            $d1 = $altura[$i] - 12;
                        } elseif ($d1 == 5) {
                            $d1 = $altura[$i] - 14;
                        } elseif ($d1 == 6) {
                            $d1 = $altura[$i] - 16;
                        }
                        $capas1s = $capas_[$i];
                        $As_min1 = round(max(0.7 * sqrt($fc) / $fy * $base[$i] * $d1, 14 * $base[$i] * $d / $fy),2);
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
                            echo "<td class='text-center'>$As_usar1 cm<sup>2</sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
        </tbody>
        <!-- diseño cortante -->
        <thead>
            <tr class="sub_encabezados">
                <th scope="col" class="tab_encabezados">3.- Diseño por cortante</th>
                <th scope="col"></th>
                <?php
                    // Calcular el número total de columnas requeridas
                    $num_columnas = $num_tramos * 3;

                    // Generar las etiquetas <th> según el número de columnas
                    for ($i = 0; $i < $num_columnas; $i++) {
                        // Determinar la etiqueta para cada columna (START, MIDDLE, END)
                        $etiqueta = "";
                        switch ($i % 3) {
                            case 0:
                                $etiqueta = "START";
                                break;
                            case 1:
                                $etiqueta = "MIDDLE";
                                break;
                            case 2:
                                $etiqueta = "END";
                                break;
                        }
                        // Imprimir la etiqueta en una columna <th>
                        echo "<th class='text-center' scope='col'>$etiqueta</th>";
                    }
                    ?>
            </tr>
        </thead>
        <tbody class="datos_relleno">
            <!-- negativo -->
            <tr>
                <td>Peralte efectivo en "cm"</td>
                <td>d</td>
                <?php
                    $ds = array(); // Declarar el array para almacenar los resultados
                    $altura = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $altura[$i] = floatval($_POST["ALTURA$i"]);
                        $d = 0; // Valor predeterminado en caso de que $capas[$i] no esté definido o no sea un array
                        if (isset($capas[$i]) && is_array($altura)) {
                            switch ($capas[$i]) {
                                case 1:
                                    $d = $altura[$i] - 6;
                                    break;
                                case 2:
                                    $d = $altura[$i] - 8;
                                    break;
                                case 3:
                                    $d = $altura[$i] - 10;
                                    break;
                                case 4:
                                    $d = $altura[$i] - 12;
                                    break;
                                case 5:
                                    $d = $altura[$i] - 14;
                                    break;
                                case 6:
                                    $d = $altura[$i] - 16;
                                    break;
                                default:
                                    $d = $altura[$i]; // Si no hay una correspondencia en el switch, se mantiene el valor original
                            }
                        }
                        $ds[] = $d;
                    }

                    if (isset($ds)) {
                        foreach ($ds as $d) {
                            echo "<td class='text-center'>$d cm</td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Altura del bloque comprimido en "cm"</td>
                <td>a</td>
                <?php
                    $ds = array(); // Declarar el array para almacenar los resultados
                    $mus = array();
                    $base = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $base[$i] = floatval($_POST["BASE$i"]);
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $a = round($d - sqrt(pow($d, 2) - 2 * ABS($MomentoUltimos[$i] * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        $ds[] = $a;
                    }
                    if (isset($ds)) {
                        foreach ($ds as $a) {
                            echo "<td class='text-center'>$a cm</td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Refuerzo calculado en "cm2"</td>
                <td>As</td>
                <?php
                    $Ass = array(); // Declarar el array para almacenar los resultados
                    $ds = array();
                    $mus = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $FR = 0.90;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $ds[] = $d;
                        //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $base[$i]))));
                        $a = round($d - sqrt(pow($d, 2) - 2 * abs($MomentoUltimos[$i] * pow(10, 5)) / ($FR * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        //$a = 6.09;
                        $As = round(((0.85 * $fc * $base[$i] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass[] = $As; // Agregar $mn al array $As
                    }
                    if (isset($Ass)) {
                        foreach ($Ass as $As) {
                            echo "<td class='text-center'>$As cm<sup>2</sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Refuerzo mínimo en "cm2"</td>
                <td>As_min</td>
                <?php
                        $As_mins = array(); // Declarar el array para almacenar los resultados
                        $ds = array();
                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }
                            $ds[] = $d;
                            $As_min = max(0.7 * sqrt($fc) / $fy * $base[$i] * $d, 14 * $base[$i] * $d / $fy);
                            // $res=MAX(0.7*sqrt(210)/4200*30*52,14*30*52/4200);
                            $As_mins[] = $As_min; // Agregar $As_max al array $As_maxs
                        }
                        if (isset($As_mins)) {
                            foreach ($As_mins as $As_min) {
                                echo "<td class='text-center'>$As_min cm<sup>2</sup></td>"; // Celda con el resultado
                            }
                        }
                    ?>
            </tr>
            <tr>
                <td>Area de acero balanceado</td>
                <td>As Balanceado</td>
                <?php
                    $As_maxs = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β1 = 0.85;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $As_max = round((0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_maxs)) {
                        foreach ($As_maxs as $As_max) {
                            echo "<td class='text-center'>$As_max cm<sup>2</sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Refuerzo máximo en "cm2"</td>
                <td>As_máx 75%Asb</td>
                <?php
                    $As_maxs = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β1 = 0.85;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_maxs)) {
                        foreach ($As_maxs as $As_max) {
                            echo "<td class='text-center'>$As_max cm<sup>2</sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Acero a Usar</td>
                <td>As_usar</td>
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
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $ds[] = $d;
                        //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $base[$i]))));
                        $a = round($d - sqrt(pow($d, 2) - 2 * abs($MomentoUltimos[$i] * pow(10, 5)) / ($FR * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        //$a = 6.09;
                        $As = round(((0.85 * $fc * $base[$i] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass[] = $As; // Agregar $mn al array $As

                        $β1 = 0.85;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else {
                            $d = $altura[$i] - 8;
                        }
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else {
                            $d = $altura[$i] - 8;
                        }
                        $ds[] = $d;
                        $As_min = max(0.7 * sqrt($fc) / $fy * $base[$i] * $d, 14 * $base[$i] * $d / $fy);
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
                            echo "<td class='text-center'>$As_usar cm<sup>2<sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
        </tbody>
    </table>






    <!-- <h3 class="tab_encabezados">2.- Diseño de flexion</h3> -->
    <!-- <table class="table table-hover">
        <thead>
            <tr class="sub_encabezados">
                <th scope="col"></th>
                <th scope="col"></th>
                <?php
                    // Calcular el número total de columnas requeridas
                    $num_columnas = $num_tramos * 3;

                    // Generar las etiquetas <th> según el número de columnas
                    for ($i = 0; $i < $num_columnas; $i++) {
                        // Determinar la etiqueta para cada columna (START, MIDDLE, END)
                        $etiqueta = "";
                        switch ($i % 3) {
                            case 0:
                                $etiqueta = "START";
                                break;
                            case 1:
                                $etiqueta = "MIDDLE";
                                break;
                            case 2:
                                $etiqueta = "END";
                                break;
                        }
                        // Imprimir la etiqueta en una columna <th>
                        echo "<th class='text-center' scope='col'>$etiqueta</th>";
                    }
                    ?>
            </tr>
        </thead>
        <tbody class="datos_relleno">
            <tr>
                <td>Peralte efectivo en "cm"</td>
                <td>d</td>
                <?php
                    $ds = array(); // Declarar el array para almacenar los resultados
                    $altura = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $altura[$i] = floatval($_POST["ALTURA$i"]);
                        $d = 0; // Valor predeterminado en caso de que $capas[$i] no esté definido o no sea un array
                        if (isset($capas[$i]) && is_array($altura)) {
                            switch ($capas[$i]) {
                                case 1:
                                    $d = $altura[$i] - 6;
                                    break;
                                case 2:
                                    $d = $altura[$i] - 8;
                                    break;
                                case 3:
                                    $d = $altura[$i] - 10;
                                    break;
                                case 4:
                                    $d = $altura[$i] - 12;
                                    break;
                                case 5:
                                    $d = $altura[$i] - 14;
                                    break;
                                case 6:
                                    $d = $altura[$i] - 16;
                                    break;
                                default:
                                    $d = $altura[$i]; // Si no hay una correspondencia en el switch, se mantiene el valor original
                            }
                        }
                        $ds[] = $d;
                    }

                    if (isset($ds)) {
                        foreach ($ds as $d) {
                            echo "<td class='text-center'>$d cm</td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Altura del bloque comprimido en "cm"</td>
                <td>a</td>
                <?php
                    $ds = array(); // Declarar el array para almacenar los resultados
                    $mus = array();
                    $base = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $base[$i] = floatval($_POST["BASE$i"]);
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $a = round($d - sqrt(pow($d, 2) - 2 * ABS($MomentoUltimos[$i] * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        $ds[] = $a;
                    }
                    if (isset($ds)) {
                        foreach ($ds as $a) {
                            echo "<td class='text-center'>$a cm</td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Refuerzo calculado en "cm2"</td>
                <td>As</td>
                <?php
                    $Ass = array(); // Declarar el array para almacenar los resultados
                    $ds = array();
                    $mus = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $FR = 0.90;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $ds[] = $d;
                        //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $base[$i]))));
                        $a = round($d - sqrt(pow($d, 2) - 2 * abs($MomentoUltimos[$i] * pow(10, 5)) / ($FR * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        //$a = 6.09;
                        $As = round(((0.85 * $fc * $base[$i] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass[] = $As; // Agregar $mn al array $As
                    }
                    if (isset($Ass)) {
                        foreach ($Ass as $As) {
                            echo "<td class='text-center'>$As cm<sup>2</sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Refuerzo mínimo en "cm2"</td>
                <td>As_min</td>
                <?php
                        $As_mins = array(); // Declarar el array para almacenar los resultados
                        $ds = array();
                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }
                            $ds[] = $d;
                            $As_min = max(0.7 * sqrt($fc) / $fy * $base[$i] * $d, 14 * $base[$i] * $d / $fy);
                            // $res=MAX(0.7*sqrt(210)/4200*30*52,14*30*52/4200);
                            $As_mins[] = $As_min; // Agregar $As_max al array $As_maxs
                        }
                        if (isset($As_mins)) {
                            foreach ($As_mins as $As_min) {
                                echo "<td class='text-center'>$As_min cm<sup>2</sup></td>"; // Celda con el resultado
                            }
                        }
                    ?>
            </tr>
            <tr>
                <td>Area de acero balanceado</td>
                <td>As Balanceado</td>
                <?php
                    $As_maxs = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β1 = 0.85;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $As_max = round((0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_maxs)) {
                        foreach ($As_maxs as $As_max) {
                            echo "<td class='text-center'>$As_max cm<sup>2</sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Refuerzo máximo en "cm2"</td>
                <td>As_máx 75%Asb</td>
                <?php
                    $As_maxs = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β1 = 0.85;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                    }
                    if (isset($As_maxs)) {
                        foreach ($As_maxs as $As_max) {
                            echo "<td class='text-center'>$As_max cm<sup>2</sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
            <tr>
                <td>Acero a Usar</td>
                <td>As_usar</td>
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
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $ds[] = $d;
                        //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $base[$i]))));
                        $a = round($d - sqrt(pow($d, 2) - 2 * abs($MomentoUltimos[$i] * pow(10, 5)) / ($FR * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        //$a = 6.09;
                        $As = round(((0.85 * $fc * $base[$i] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass[] = $As; // Agregar $mn al array $As

                        $β1 = 0.85;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else {
                            $d = $altura[$i] - 8;
                        }
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else {
                            $d = $altura[$i] - 8;
                        }
                        $ds[] = $d;
                        $As_min = max(0.7 * sqrt($fc) / $fy * $base[$i] * $d, 14 * $base[$i] * $d / $fy);
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
                            echo "<td class='text-center'>$As_usar cm<sup>2<sup></td>"; // Celda con el resultado
                        }
                    }
                ?>
            </tr>
        </tbody>
        <tfoot></tfoot>
    </table> -->

    <div class="table-responsive" id="resultadosTabla">
        <table class="table table-bordered responsive table-hover">
            <thead>
                <tr>
                    <th class="text-center" scope="row" colspan="4">DISEÑO DE FLEXION
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="bg-info">Parte NEGATIVO</th>
                </tr>
                <tr>
                    <th scope="row">d (cm)</th>
                    <?php
                    // $ds = array(); // Declarar el array para almacenar los resultados
                    // for ($i = 1; $i <= $num_tramos * 3; $i++) {
                    //     $d = $capas[$i];
                    //     if ($d == 1) {
                    //         $d = $altura[$i] - 6;
                    //     } else if ($d == 2) {
                    //         $d = $altura[$i] - 8;
                    //     } else if ($d == 3) {
                    //         $d = $altura[$i] - 10;
                    //     } elseif ($d == 4) {
                    //         $d = $altura[$i] - 12;
                    //     } elseif ($d == 5) {
                    //         $d = $altura[$i] - 14;
                    //     } elseif ($d == 6) {
                    //         $d = $altura[$i] - 16;
                    //     }
                    //     $ds[] = $d;
                    // }
                    // if (isset($ds)) {
                    //     foreach ($ds as $d) {
                    //         echo "<td>$d</td>"; // Celda con el resultado
                    //     }
                    // }
                    ?>

                </tr>
                <tr>
                    <th>a (cm)</th>
                    <?php
                    $ds = array(); // Declarar el array para almacenar los resultados
                    $mus = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $a = round($d - sqrt(pow($d, 2) - 2 * ABS($MomentoUltimos[$i] * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
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
                        $FR = 0.90;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $ds[] = $d;
                        //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $base[$i]))));
                        $a = round($d - sqrt(pow($d, 2) - 2 * abs($MomentoUltimos[$i] * pow(10, 5)) / ($FR * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        //$a = 6.09;
                        $As = round(((0.85 * $fc * $base[$i] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass[] = $As; // Agregar $mn al array $As
                    }
                    if (isset($Ass)) {
                        foreach ($Ass as $As) {
                            echo "<td>$As</td>"; // Celda con el resultado
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th scope="row">As_min(cm<sup>2</sup>)</th>
                    <?php
                        $As_mins = array(); // Declarar el array para almacenar los resultados
                        $ds = array();
                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }
                            $ds[] = $d;
                            $As_min = max(0.7 * sqrt($fc) / $fy * $base[$i] * $d, 14 * $base[$i] * $d / $fy);
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
                    <th>As Balanceado(cm<sup>2</sup>) </th>
                    <?php
                        $As_maxs = array(); // Declarar el array para almacenar los resultados
                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $β1 = 0.85;
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }
                            $As_max = round((0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
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
                    <th scope="row">As_máx 75%Asb (cm<sup>2</sup>)</th>
                    <?php
                        $As_maxs = array(); // Declarar el array para almacenar los resultados
                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $β1 = 0.85;
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }
                            $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
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
                    <th scope="row">As_usar (cm<sup>2</sup>)</th>
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
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $ds[] = $d;
                        //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $base[$i]))));
                        $a = round($d - sqrt(pow($d, 2) - 2 * abs($MomentoUltimos[$i] * pow(10, 5)) / ($FR * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        //$a = 6.09;
                        $As = round(((0.85 * $fc * $base[$i] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass[] = $As; // Agregar $mn al array $As

                        $β1 = 0.85;
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else {
                            $d = $altura[$i] - 8;
                        }
                        $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                        $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else {
                            $d = $altura[$i] - 8;
                        }
                        $ds[] = $d;
                        $As_min = max(0.7 * sqrt($fc) / $fy * $base[$i] * $d, 14 * $base[$i] * $d / $fy);
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
                <!-- Cantidad Y tipo de Acero para realizar Verificaciones -->
                <?php
                    // $capass = array(); // Asegúrate de definir $capas antes de usarlo.
                    // for ($i = 1; $i <= $num_tramos * 3; $i++) {
                    //     $cantidad = $capas[$i];

                    //     for ($j = 1; $j <= $cantidad; $j++) {
                    //         echo "<tr>";
                    //         echo "<th scope='row'>Cantidad de Acero-$j</th>";
                    //         for ($i = 1; $i <= $num_tramos * 3; $i++) {
                    //             echo "<td><input class='form-control form-control-sm' name='CANTIDAD_ACERO-$j$i' id='CANTIDAD_ACERO-$j$i'></td>";
                    //         }
                    //     }
                    //     echo "</tr>";

                    //     //TIPO DE ACERO
                    //     for ($j = 1; $j <= $cantidad; $j++) {
                    //         echo "<tr>";
                    //         echo "<th scope='row'>Tipo de acero-$j</th>";
                    //         for ($i = 1; $i <= $num_tramos * 3; $i++) {
                    //             echo "<td><select class='form-control form-control-sm' name='TipoA-$j$i' id='TipoA-$j$i'>";
                    //             $options = [
                    //                 ['text' => 'Ø 0', 'value' => '0.000'],
                    //                 ['text' => '6mm', 'value' => '0.283'],
                    //                 ['text' => '8mm', 'value' => '0.503'],
                    //                 ['text' => 'Ø 3/8', 'value' => '0.713'],
                    //                 ['text' => '12mm', 'value' => '1.131'],
                    //                 ['text' => 'Ø 1/2', 'value' => '1.267'],
                    //                 ['text' => 'Ø 5/8', 'value' => '1.979'],
                    //                 ['text' => 'Ø 3/4', 'value' => '2.850'],
                    //                 ['text' => 'Ø 1', 'value' => '5.067'],
                    //             ];
                    //             foreach ($options as $option) {
                    //                 $text = $option['text'];
                    //                 $value = $option['value'];
                    //                 $selected = ($value == $cantidad) ? 'selected' : '';
                    //                 echo "<option value=\"$value\" $selected>$text</option>";
                    //             }
                    //             echo "</select></td>";
                    //         }
                    //     }
                    //     echo "</tr>";
                    // }
                ?>
                <!-- Ocultar Los Valores y mostrarlo con la cantidad de Acero -->
                <!-- <tr>
                    <th scope="row">As_real (cm<sup>2</sup>)</th>
                    <?php
                    // $As_reala = array(); // Declarar el array para almacenar los resultados
                    // $aceros = array();
                    // for ($i = 1; $i <= $num_tramos * 3; $i++) {
                    //     $As_real = round(($acero[$i] * $cantidadAcero[$i]) + ($acero[$i] * $cantidadAcero[$i]), 2, PHP_ROUND_HALF_DOWN);
                    //     $As_reals[] = $As_real; // Agregar $As_max al array $As_maxs
                    // }
                    // if (isset($As_reals)) {
                    //     foreach ($As_reals as $As_real) {
                    //         echo "<td>$As_real</td>"; // Celda con el resultado
                    //     }
                    // }
                    ?>
                </tr>
                <tr>
                    <th scope="row">ФMn (Tonf-m)</th>
                    <?php
                    // $mns = array(); // Declarar el array para almacenar los resultados
                    // $aceros = array();
                    // $capass = array();
                    // $Ass = array(); // Declarar el array para almacenar los resultados
                    // $ds = array();
                    // $mus = array();
                    // $As_usars = array(); // Declarar el array para almacenar los resultados
                    // $As_maxs = array(); // Declarar el array para almacenar los resultados // valores del As MIN
                    // $As_mins = array(); // Declarar el array para almacenar los resultados
                    // $ds = array();

                    // for ($i = 1; $i <= $num_tramos * 3; $i++) {
                    //     $FR = 0.90;
                    //     $d = $capas[$i];
                    //     if ($d == 1) {
                    //         $d = $altura[$i] - 6;
                    //     } else if ($d == 2) {
                    //         $d = $altura[$i] - 8;
                    //     } else if ($d == 3) {
                    //         $d = $altura[$i] - 10;
                    //     } elseif ($d == 4) {
                    //         $d = $altura[$i] - 12;
                    //     } elseif ($d == 5) {
                    //         $d = $altura[$i] - 14;
                    //     } elseif ($d == 6) {
                    //         $d = $altura[$i] - 16;
                    //     }
                    //     $ds[] = $d;
                    //     //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $base[$i]))));
                    //     $a = round($d - sqrt(pow($d, 2) - 2 * abs($MomentoUltimos[$i] * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                    //     //$a = 6.09;
                    //     $As = round(((0.85 * $fc * $base[$i] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                    //     $Ass[] = $As; // Agregar $mn al array $As

                    //     $β1 = 0.85;
                    //     $d = $capas[$i];
                    //     if ($d == 1) {
                    //         $d = $altura[$i] - 6;
                    //     } else {
                    //         $d = $altura[$i] - 8;
                    //     }
                    //     $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                    //     $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                    //     $d = $capas[$i];
                    //     if ($d == 1) {
                    //         $d = $altura[$i] - 6;
                    //     } else {
                    //         $d = $altura[$i] - 8;
                    //     }
                    //     $ds[] = $d;
                    //     $As_min = max(0.7 * sqrt($fc) / $fy * $base[$i] * $d, 14 * $base[$i] * $d / $fy);
                    //     // $res=MAX(0.7*sqrt(210)/4200*30*52,14*30*52/4200);
                    //     $As_mins[] = $As_min; // Agregar $As_max al array $As_maxs
                    //     //OBTENER RESULTADO DEL AS_USAR
                    //     $As_usar = "";
                    //     if ($As < $As_min) {
                    //         $As_usar = $As_min;
                    //     } else {
                    //         if ($As > $As_min || $As < $As_max) {
                    //             $As_usar = $As;
                    //         } else {
                    //             $As_usar = $As_max;
                    //         }
                    //     }
                    //     $As_usars[] = $As_usar; // Agregar $As_max al array $As_maxs

                    //     $aReal = round(($acero[$i] * $cantidadAcero[$i]) + ($acero[$i] * $cantidadAcero[$i]), 2, PHP_ROUND_HALF_DOWN); //$AR * $fy / (0.85 * $fc * $base[$i]);


                    //     $mn = round(0.90 * (0.85 * $fc * $base[$i] * $aReal) * ($d - $aReal / 2) / 100000, 2, PHP_ROUND_HALF_UP);
                    //     $mns[] = $mn; // Agregar $mn al array $mns

                    // }
                    // if (isset($mns)) {
                    //     foreach ($mns as $mn) {
                    //         echo "<td>$mn</td>"; // Celda con el resultado
                    //     }
                    // }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Verif.</th>
                    <?php
                        $Ass = array();
                        $ds = array();
                        $mus = array();
                        $As_usars = array();
                        $As_maxs = array();
                        $As_mins = array();
                        $ds = array();
                        $Verifs = array();
                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $FR = 0.90;
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }
                            $ds[] = $d;
                            //$RaizCuadrada = $d - (sqrt(pow($d, 2)) - ((2 * (abs($mu * (pow(10, 5))))) / (($FR * 0.85 * $fc * $base[$i]))));
                            $a = round($d - sqrt(pow($d, 2) - 2 * abs($MomentoUltimos[$i] * pow(10, 5)) / ($FR * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                            //$a = 6.09;
                            $As = round(((0.85 * $fc * $base[$i] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
                            $Ass[] = $As; // Agregar $mn al array $As

                            $β1 = 0.85;
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else {
                                $d = $altura[$i] - 8;
                            }
                            $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                            $As_maxs[] = $As_max; // Agregar $As_max al array $As_maxs
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else {
                                $d = $altura[$i] - 8;
                            }
                            $ds[] = $d;
                            $As_min = max(0.7 * sqrt($fc) / $fy * $base[$i] * $d, 14 * $base[$i] * $d / $fy);
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
                            $As_usars[] = $As_usar;
                            $β1 = 0.85;
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }
                            $As_max = round(0.75 * (0.85 * $β1 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d, 2, PHP_ROUND_HALF_UP);
                            $As_maxs[] = $As_max;

                            $Verif = "";
                            if ($aReal < $As_max && $As_max >= $As_usar) {
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
                </tr> -->

                <!-- PARTE POSITIVA -->

                <?php
                    $luzLibre1 = array();
                    $carga_muerta1 = array();
                    $carga_viva1 = array();
                    $base1 = array();
                    $altura1 = array();
                    $capas1 = array();
                    $mu1 = array();
                    $vu1 = array();
                    $tu1 = array();
                    $acero1 = array();
                    $cantidadAcero1 = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        //Los nombres de los campos generados dinámicamente serán como 'Luz_Libre+1', 'Luz_Libre+2', etc. DIFERENTE AL POSITIVO
                        $capas_[$i] = isset($_POST["CAPAS+$i"]) ? intval($_POST["CAPAS+$i"]) : 0;
                        $mu_[$i] = isset($_POST["MomentoUltimo+$i"]) ? floatval($_POST["MomentoUltimo+$i"]) : 0;
                        $vu_[$i] = isset($_POST["Vu+$i"]) ? floatval($_POST["Vu+$i"]) : 0;
                        $tu_[$i] = isset($_POST["Tu+$i"]) ? floatval($_POST["Tu+$i"]) : 0;
                        $acero_[$i] = isset($_POST["ACERO+$i"]) ? intval($_POST["ACERO+$i"]) : 0;
                        $muCv_[$i] = isset($_POST["MuCV+$i"]) ? floatval($_POST["MuCV+$i"]) : 0;
                        $muCM_[$i] = isset($_POST["MuCM+$i"]) ? floatval($_POST["MuCM+$i"]) : 0;
                        $cantidadAcero_[$i] = isset($_POST["CAcero+$i"]) ? floatval($_POST["CAcero+$i"]) : 0;
                        $acero_[$i] = isset($_POST["TipoAc+$i"]) ? floatval($_POST["TipoAc+$i"]) : 0;
                    }
                ?>
                <tr>
                    <th class="bg-info">Parte POSITIVA</th>
                </tr>
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
                    <th scope="row">d (cm<sup>2</sup>)</th>
                    <?php
                    $ds1 = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d1 = $capas_[$i];
                        if ($d1 == 1) {
                            $d1 = $altura[$i] - 6;
                        } else if ($d1 == 2) {
                            $d1 = $altura[$i] - 8;
                        } else if ($d1 == 3) {
                            $d1 = $altura[$i] - 10;
                        } elseif ($d1 == 4) {
                            $d1 = $altura[$i] - 12;
                        } elseif ($d1 == 5) {
                            $d1 = $altura[$i] - 14;
                        } elseif ($d1 == 6) {
                            $d1 = $altura[$i] - 16;
                        }
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
                    <th>a+ (cm<sup>2</sup>)</th>
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

                        $d1 = $capas_[$i];
                        if ($d1 == 1) {
                            $d1 = $altura[$i] - 6;
                        } else if ($d1 == 2) {
                            $d1 = $altura[$i] - 8;
                        } else if ($d1 == 3) {
                            $d1 = $altura[$i] - 10;
                        } elseif ($d1 == 4) {
                            $d1 = $altura[$i] - 12;
                        } elseif ($d1 == 5) {
                            $d1 = $altura[$i] - 14;
                        } elseif ($d1 == 6) {
                            $d1 = $altura[$i] - 16;
                        }
                        $ds1[] = $d1;
                        $a = round($d1 - sqrt(pow($d1, 2) - 2 * ABS($mu_usar * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
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

                        $d1 = $capas_[$i];
                        if ($d1 == 1) {
                            $d1 = $altura[$i] - 6;
                        } else if ($d1 == 2) {
                            $d1 = $altura[$i] - 8;
                        } else if ($d1 == 3) {
                            $d1 = $altura[$i] - 10;
                        } elseif ($d1 == 4) {
                            $d1 = $altura[$i] - 12;
                        } elseif ($d1 == 5) {
                            $d1 = $altura[$i] - 14;
                        } elseif ($d1 == 6) {
                            $d1 = $altura[$i] - 16;
                        }
                        $ds1[] = $d1;
                        $a = round($d1 - sqrt(pow($d1, 2) - 2 * ABS($mu_usar * pow(10, 5)) / (0.90 * 0.85 * $fc * $base[$i])), 2, PHP_ROUND_HALF_UP);
                        $ds[] = $a;
                        $As1 = round(((0.85 * $fc * $base[$i] * $a) / $fy), 2, PHP_ROUND_HALF_UP);
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
                    <th scope="row">As_min (cm<sup>2</sup>)</th>
                    <?php
                    $As_mins1 = array(); // Declarar el array para almacenar los resultados
                    $capass = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $capass = $capas[$i];

                        $d1 = $capas_[$i];
                        if ($d1 == 1) {
                            $d1 = $altura[$i] - 6;
                        } else if ($d1 == 2) {
                            $d1 = $altura[$i] - 8;
                        } else if ($d1 == 3) {
                            $d1 = $altura[$i] - 10;
                        } elseif ($d1 == 4) {
                            $d1 = $altura[$i] - 12;
                        } elseif ($d1 == 5) {
                            $d1 = $altura[$i] - 14;
                        } elseif ($d1 == 6) {
                            $d1 = $altura[$i] - 16;
                        }
                        $capas1s = $capas_[$i];
                        $As_min1 = MAX(0.7 * sqrt($fc) / $fy * $base[$i] * $d1, 14 * $base[$i] * $d / $fy);
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
                    <th scope="row">As Balanceado(cm<sup>2</sup>)</th>
                    <?php
                    $As_maxs1 = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β11 = 0.85;
                        $As_max1 = round((0.85 * $β11 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d1, 2, PHP_ROUND_HALF_UP);
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
                    <th scope="row">As_máx 75%Asb(cm<sup>2</sup>)</th>
                    <?php
                    $As_maxs1 = array(); // Declarar el array para almacenar los resultados
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $β11 = 0.85;
                        $As_max1 = round(0.75 * (0.85 * $β11 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d1, 2, PHP_ROUND_HALF_UP);
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
                    <th scope="row">As_usar (cm<sup>2</sup>)</th>
                    <?php
                    $As_mins1 = array(); // Declarar el array para almacenar los resultados
                    $As_usars1 = array(); // Declarar el array para almacenar los resultados
                    $As_maxs1 = array(); // Declarar el array para almacenar los resultados
                    $Ass1 = array(); // Declarar el array para almacenar los resultados
                    $capass = array();
                    for ($i = 1; $i <= $num_tramos * 3; $i++) {
                        $a1 = 1.39;
                        $As1 = round(((0.85 * $fc * $base[$i] * $a1) / $fy), 2, PHP_ROUND_HALF_UP);
                        $Ass1[] = $As1; // Agregar $mn al array $mns
                        $β11 = 0.85;
                        $As_max1 = round(0.75 * (0.85 * $β11 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d1, 2, PHP_ROUND_HALF_UP);
                        $As_maxs1[] = $As_max1; // Agregar $As_max al array $As_maxs

                        $d = $capas[$i];
                        if ($d == 1) {
                            $d = $altura[$i] - 6;
                        } else if ($d == 2) {
                            $d = $altura[$i] - 8;
                        } else if ($d == 3) {
                            $d = $altura[$i] - 10;
                        } elseif ($d == 4) {
                            $d = $altura[$i] - 12;
                        } elseif ($d == 5) {
                            $d = $altura[$i] - 14;
                        } elseif ($d == 6) {
                            $d = $altura[$i] - 16;
                        }
                        $capass = $capas[$i];

                        $d1 = $capas_[$i];
                        if ($d1 == 1) {
                            $d1 = $altura[$i] - 6;
                        } else if ($d1 == 2) {
                            $d1 = $altura[$i] - 8;
                        } else if ($d1 == 3) {
                            $d1 = $altura[$i] - 10;
                        } elseif ($d1 == 4) {
                            $d1 = $altura[$i] - 12;
                        } elseif ($d1 == 5) {
                            $d1 = $altura[$i] - 14;
                        } elseif ($d1 == 6) {
                            $d1 = $altura[$i] - 16;
                        }
                        $capas1s = $capas_[$i];
                        $As_min1 = MAX(0.7 * sqrt($fc) / $fy * $base[$i] * $d1, 14 * $base[$i] * $d / $fy);
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
                <!-- <tr>
                    <th scope="row">As_real (cm<sup>2</sup>)</th>
                    <?php
                    // $As_reals1 = array(); // Declarar el array para almacenar los resultados
                    // for ($i = 1; $i <= $num_tramos * 3; $i++) {
                    //     $As_real1 = round(($acero_[$i] * $cantidadAcero_[$i]) + ($acero_[$i] * $cantidadAcero_[$i]), 2, PHP_ROUND_HALF_DOWN);
                    //     $As_reals1[] = $As_real1; // Agregar $As_max al array $As_maxs
                    // }
                    // if (isset($As_reals1)) {
                    //     foreach ($As_reals1 as $As_real1) {
                    //         echo "<td>$As_real1</td>"; // Celda con el resultado
                    //     }
                    // }
                    ?>
                </tr>
                <tr>
                    <th scope="row">ФMn (Tonf.m)</th>
                    <?php
                    // $aceros = array();
                    // $capass = array();
                    // $mns = array(); // Declarar el array para almacenar los resultados
                    // for ($i = 1; $i <= $num_tramos * 3; $i++) {

                    //     $As_real1 = round(($acero_[$i] * $cantidadAcero_[$i]) + ($acero_[$i] * $cantidadAcero_[$i]), 2, PHP_ROUND_HALF_DOWN);
                    //     $As_reals1[] = $As_real1;
                    //     //ZONA DE Capas
                    //     $aReal1 = round($As_real1 * $fy / (0.85 * $fc * $base[$i]), 2, PHP_ROUND_HALF_UP);
                    //     $d1 = $capas_[$i];
                    //     if ($d1 = 1) {
                    //         $d1 = $altura[$i] - 6;
                    //     } else if ($d1 == 2) {
                    //         $d1 = $altura[$i] - 8;
                    //     } else if ($d1 == 3) {
                    //         $d1 = $altura[$i] - 10;
                    //     } elseif ($d1 == 4) {
                    //         $d1 = $altura[$i] - 12;
                    //     } elseif ($d1 == 5) {
                    //         $d1 = $altura[$i] - 14;
                    //     } elseif ($d1 == 6) {
                    //         $d1 = $altura[$i] - 16;
                    //     }

                    //     $capass = $capas_[$i];
                    //     $mn1 = round(0.90 * (0.85 * $fc * $base[$i] * $aReal1) * ($d1 - $aReal1 / 2) / 100000, 2, PHP_ROUND_HALF_UP);
                    //     $mns1[] = $mn1; // Agregar $mn al array $mns
                    // }
                    // if (isset($mns1)) {
                    //     foreach ($mns1 as $mn1) {
                    //         echo "<td>$mn1</td>"; // Celda con el resultado
                    //     }
                    // }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Verificacion de cuatia de aceros</th>
                    <?php
                    // $Verifs1 = array(); // Declarar el array para almacenar los resultados
                    // $As_mins1 = array(); // Declarar el array para almacenar los resultados
                    // $As_usars1 = array(); // Declarar el array para almacenar los resultados
                    // $As_maxs1 = array(); // Declarar el array para almacenar los resultados
                    // $Ass1 = array(); // Declarar el array para almacenar los resultados
                    // $capass = array();
                    // for ($i = 1; $i <= $num_tramos * 3; $i++) {
                    //     $a1 = 1.39;
                    //     $As1 = round(((0.85 * $fc * $base[$i] * $a1) / $fy), 2, PHP_ROUND_HALF_UP);
                    //     $Ass1[] = $As1; // Agregar $mn al array $mns
                    //     $β11 = 0.85;
                    //     $As_max1 = round(0.75 * (0.85 * $β11 * $fc / $fy * (0.003 / (0.003 + 0.0021))) * $base[$i] * $d1, 2, PHP_ROUND_HALF_UP);
                    //     $As_maxs1[] = $As_max1; // Agregar $As_max al array $As_maxs

                    //     $d = $capas[$i];
                    //     if ($d == 1) {
                    //         $d = $altura[$i] - 6;
                    //     } else if ($d == 2) {
                    //         $d = $altura[$i] - 8;
                    //     } else if ($d == 3) {
                    //         $d = $altura[$i] - 10;
                    //     } elseif ($d == 4) {
                    //         $d = $altura[$i] - 12;
                    //     } elseif ($d == 5) {
                    //         $d = $altura[$i] - 14;
                    //     } elseif ($d == 6) {
                    //         $d = $altura[$i] - 16;
                    //     }
                    //     $capass = $capas[$i];

                    //     $d1 = $capas_[$i];
                    //     if ($d1 == 1) {
                    //         $d1 = $altura[$i] - 6;
                    //     } else if ($d1 == 2) {
                    //         $d1 = $altura[$i] - 8;
                    //     } else if ($d1 == 3) {
                    //         $d1 = $altura[$i] - 10;
                    //     } elseif ($d1 == 4) {
                    //         $d1 = $altura[$i] - 12;
                    //     } elseif ($d1 == 5) {
                    //         $d1 = $altura[$i] - 14;
                    //     } elseif ($d1 == 6) {
                    //         $d1 = $altura[$i] - 16;
                    //     }
                    //     $capas1s = $capas_[$i];
                    //     $As_min1 = MAX(0.7 * sqrt($fc) / $fy * $base[$i] * $d1, 14 * $base[$i] * $d / $fy);
                    //     $As_mins1[] = $As_min1; // Agregar $As_max al array $As_maxs

                    //     $As_usar1 = 0;
                    //     if ($As1 < $As_min1) {
                    //         $As_usar1 = $As_min1;
                    //     } else {
                    //         if ($As1 > $As_min1 || $As < $As_max1) {
                    //             $As_usar1 = $As1;
                    //         } else {
                    //             $As_usar1 = $As_max1;
                    //         }
                    //     }
                    //     $As_usars1[] = $As_usar1; // Agregar $As_max al array $As_maxs

                    //     $Verif1 = "";
                    //     if ($As_real1 < $As_max1 || $As_max1 >= $As_usar1) {
                    //         $Verif1 = "CUMPLE";
                    //     } else {
                    //         $Verif1 = "NO CUMPLE";
                    //     }
                    //     $Verifs1[] = $Verif1; // Agregar $As_max al array $As_maxs
                    // }
                    // if (isset($Verifs1)) {
                    //     foreach ($Verifs1 as $Verif1) {
                    //         echo "<td>$Verif1</td>"; // Celda con el resultado
                    //     }
                    // }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Verificacion de Separación</th>

                </tr> -->
            </tbody>
        </table>
    </div>
    formas de insertar los datos input a una tabla
    // Crear las filas de inputs según el valor máximo
        // for (let i = 0; i < valorMaximo; i++) {
        //     // Crear la fila para los inputs
        //     let trInputs = document.createElement('tr');
        //     let tdCantidadAceros = document.createElement('td');
        //     tdCantidadAceros.textContent = 'Cantidad de Aceros';
        //     trInputs.appendChild(tdCantidadAceros);

        //     let tdCantidadUnidad = document.createElement('td');
        //     tdCantidadUnidad.textContent = `Capa ${i + 1}`;
        //     trInputs.appendChild(tdCantidadUnidad);

        //     // Crear los inputs para cada tramo
        //     for (let j = 0; j < tramos * 3; j++) {
        //         let tdInput = document.createElement('td');
        //         let input = document.createElement('input');
        //         input.type = 'text';
        //         input.className = 'form-control form-control-sm';
        //         input.name = `cantAcero${j}_capa${i}`;
        //         input.id = `cantAcero${j}_capa${i}`;
        //         tdInput.appendChild(input);
        //         trInputs.appendChild(tdInput);
        //     }

        //     // Agregar la fila de inputs al template
        //     template += trInputs.outerHTML;
        // }
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Verificar Tipo de Acero </h4>
            </div>
            <form id="form2" class="form-group text-center">
                <div class="card-body">
                    <table class="table table-bordered">
                        <?php
                        echo "<tr>";
                        echo "<th class='bg-info'>PARTE NEGATIVA</th>";
                        echo "</tr>";
                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $cantidad = $capas[$i];
                            for ($j = 1; $j <= $cantidad; $j++) {
                                echo "<tr>";
                                echo "<th scope='row'>Cantidad de Acero-$j</th>";
                                for ($i = 1; $i <= $num_tramos * 3; $i++) {
                                    echo "<td><input class='form-control form-control-sm' name='CANTIDAD_ACERO-$j$i' id='CANTIDAD_ACERO-$j$i'></td>";
                                }
                            }
                            echo "</tr>";
                        }
                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $cantidad = $capas[$i];
                            for ($j = 1; $j <= $cantidad; $j++) {
                                echo "<tr>";
                                echo "<th scope='row'>Tipo de acero-$j</th>";
                                for ($i = 1; $i <= $num_tramos * 3; $i++) {
                                    echo "<td><select class='form-control form-control-sm' name='TipoA-$j$i' id='TipoA-$j$i'>";
                                    $options = [
                                        ['text' => 'Ø 0', 'value' => '0.000'],
                                        ['text' => '6mm', 'value' => '0.283'],
                                        ['text' => '8mm', 'value' => '0.503'],
                                        ['text' => 'Ø 3/8', 'value' => '0.713'],
                                        ['text' => '12mm', 'value' => '1.131'],
                                        ['text' => 'Ø 1/2', 'value' => '1.267'],
                                        ['text' => 'Ø 5/8', 'value' => '1.979'],
                                        ['text' => 'Ø 3/4', 'value' => '2.850'],
                                        ['text' => 'Ø 1', 'value' => '5.067'],
                                    ];
                                    foreach ($options as $option) {
                                        $text = $option['text'];
                                        $value = $option['value'];
                                        $selected = ($value == $cantidad) ? 'selected' : '';
                                        echo "<option value=\"$value\" $selected>$text</option>";
                                    }
                                    echo "</select></td>";
                                }
                            }
                        }
                        echo "</tr>";
                        echo "<tr>";
                        echo "<th class='bg-info'>PARTE POSITIVA</th>";
                        echo "</tr>";
                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $cantidad = $capas_[$i];
                            for ($j = 1; $j <= $cantidad; $j++) {
                                echo "<tr>";
                                echo "<th scope='row'>Cantidad de Acero+$j</th>";
                                for ($i = 1; $i <= $num_tramos * 3; $i++) {
                                    echo "<td><input class='form-control form-control-sm' name='CANTIDAD_ACERO+$j$i' id='CANTIDAD_ACERO+$j$i'></td>";
                                }
                            }
                            echo "</tr>";
                        }
                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $cantidad = $capas_[$i];
                            for ($j = 1; $j <= $cantidad; $j++) {
                                echo "<tr>";
                                echo "<th scope='row'>Tipo de acero+$j</th>";
                                for ($i = 1; $i <= $num_tramos * 3; $i++) {
                                    echo "<td><select class='form-control form-control-sm' name='TipoA+$j$i' id='TipoA+$j$i'>";
                                    $options = [
                                        ['text' => 'Ø 0', 'value' => '0.000'],
                                        ['text' => '6mm', 'value' => '0.283'],
                                        ['text' => '8mm', 'value' => '0.503'],
                                        ['text' => 'Ø 3/8', 'value' => '0.713'],
                                        ['text' => '12mm', 'value' => '1.131'],
                                        ['text' => 'Ø 1/2', 'value' => '1.267'],
                                        ['text' => 'Ø 5/8', 'value' => '1.979'],
                                        ['text' => 'Ø 3/4', 'value' => '2.850'],
                                        ['text' => 'Ø 1', 'value' => '5.067'],
                                    ];
                                    foreach ($options as $option) {
                                        $text = $option['text'];
                                        $value = $option['value'];
                                        $selected = ($value == $cantidad) ? 'selected' : '';
                                        echo "<option value=\"$value\" $selected>$text</option>";
                                    }
                                    echo "</select></td>";
                                }
                            }
                        }
                        echo "</tr>";
                        // Campos ocultos con valores
                        echo "<input type='hidden' name='fc' value='$fc'>";
                        echo "<input type='hidden' name='fy' value='$fy'>";
                        echo "<input type='hidden' name='num_tramos' value='$num_tramos'>";
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            echo "<input type='hidden' name='luzLibre$i' value='" . $luzLibre[$i] . "'>";
                        }
                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            echo "<input type='hidden' name='BASE$i' value='" . $base[$i] . "'>";
                            echo "<input type='hidden' name='ALTURA$i' value='" . $altura[$i] . "'>";
                            echo "<input type='hidden' name='CAPAS-$i' value='" . $capas[$i] . "'>";
                            echo "<input type='hidden' name='MomentoUltimo-$i' value='" . $MomentoUltimos[$i] . "'>";
                            echo "<input type='hidden' name='Vu+$i' value='" . $vu[$i] . "'>";
                            echo "<input type='hidden' name='Tu-$i' value='" . $tu[$i] . "'>";
                            echo "<input type='hidden' name='MuCM-$i' value='" . $muCM[$i] . "'>";
                            echo "<input type='hidden' name='MuCV-$i' value='" . $muCv[$i] . "'>";

                            // Campos para valores negativos
                            echo "<input type='hidden' name='CAPAS+$i' value='" . $capas_[$i] . "'>";
                            echo "<input type='hidden' name='MomentoUltimo+$i' value='" . $mu_[$i] . "'>";
                            echo "<input type='hidden' name='Vu+$i' value='" . $vu_[$i] . "'>";
                            echo "<input type='hidden' name='Tu+$i' value='" . $tu_[$i] . "'>";
                            echo "<input type='hidden' name='MuCM+$i' value='" . $muCM_[$i] . "'>";
                            echo "<input type='hidden' name='MuCV+$i' value='" . $muCv_[$i] . "'>";
                        }
                        ?>
                    </table>
                </div>
                <div class="card-footer">
                    <button class="btn btn-outline-success" type="submit">Verificar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- DISEÑO POR CORTANTE -->
    <div class="table-responsive">
        <table class="table table-bordered  responsive table-hover">
            <thead>
                <tr>
                    <th class="text-center bg-info" scope="row" colspan="4">DISEÑO POR CORTANTE
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Acw (cm<sup>2</sup>)</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else {
                                $d = $altura[$i] - 8;
                            }
                            $capass = $capas[$i];

                            $d1 = $capas_[$i];
                            if ($d1 == 1) {
                                $d1 = $altura[$i] - 6;
                            } else {
                                $d1 = $altura[$i] - 8;
                            }
                            $capas1s = $capas_[$i];

                            $dc = 0;
                            if ($d1 > $d) {
                                $dc = $d1;
                            } else {
                                $dc = $d;
                            }
                            $acw = $base[$i] * $d;
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
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else {
                                $d = $altura[$i] - 8;
                            }
                            $capass = $capas_[$i];

                            $acw = $base[$i] * $d;
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
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else {
                                $d = $altura[$i] - 8;
                            }
                            $capass = $capas_[$i];

                            $acw = $base[$i] * $d;
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
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else {
                                $d = $altura[$i] - 8;
                            }
                            $capass = $capas[$i];

                            $acw = $base[$i] * $d;
                            $acws[] = $acw;
                            $vc = round(0.53 * sqrt($fc) * ($acw) / 1000, 2, PHP_ROUND_HALF_UP);
                            $vcs[] = $vc;

                            $vus = $vu[$i];
                            $vuss[] = $vus;

                            $VS = round(($vus / 0.85) - $vc, 2, PHP_ROUND_HALF_UP);
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
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else {
                                $d = $altura[$i] - 8;
                            }
                            $capass = $capas[$i];

                            $acw = $base[$i] * $d;
                            $acws[] = $acw;
                            $vc = 0.53 * sqrt($fc) * ($acw) / 1000;
                            $vcs[] = $vc;

                            $vus = $vu[$i];
                            $vuss[] = $vus;
                            $VS = round($vus / 0.85 - $vc, 2, PHP_ROUND_HALF_UP);
                            $Vss[] = $VS;

                            $Espacios = round(0.713 * $fy * $d / ($VS * 1000) * 2, PHP_ROUND_HALF_UP);
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
                            $d1 = $capas_[$i];
                            if ($d1 == 1) {
                                $d1 = $altura[$i] - 6;
                            } else {
                                $d1 = $altura[$i] - 8;
                            }
                            $capass = $capas_[$i];

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
                            $Lconfi = 2 * $altura[$i];
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
                            $Lconfi = 2 * $altura[$i];
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
                    <th scope="row">Estribado</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $Lconfi = 2 * $altura[$i];
                            $Lconfis[] = $Lconfi;
                            $S = 62;
                            $s2 = 13.5;
                            $smax = 10;
                            $usarS = min($S, $s2, $smax);
                            $usarSs[] = $usarS;

                            $estribos = $Lconfi / $usarS;
                            $estriboss[] = $estribos;

                            $estribado = "Estribado: 1@5cm; $estribos;@;$usarS;cm;resto@;20;cm";
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
    <!-- DISEÑO POR CAPACIDAD  -->
    <div class="table-responsive">
        <table class="table table-bordered responsive table-hover">
            <thead>
                <tr>
                    <th class="text-center bg-info" scope="row" colspan="4">DISEÑO POR CAPACIDAD
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Mn Izq(Tonf-m)</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {

                            $acwc = round(max(10.15, 11.60) / 0.9, 2, PHP_ROUND_HALF_UP);
                            // $mn = round(0.90 * (0.85 * $fc * $base[$i] * $aReal) * ($d - $aReal / 2) / 100000, 2, PHP_ROUND_HALF_UP);
                            $mn1s[] = $acwc; // Agregar 'A' al array $mns
                        }

                        if (isset($mn1s)) {
                            foreach ($mn1s as $acwc) {
                                echo "<td class='text-center' colspan='3'>$acwc</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Mn Der(Tonf-m)</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $vcc = round(max(10.15, 11.60) / 0.9, 2, PHP_ROUND_HALF_UP);
                            $vc1s[] = $vcc;
                        }

                        if (isset($vc1s)) {
                            foreach ($vc1s as $vcc) {
                                echo "<td class='text-center' colspan='3'>$vcc</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Vu(CAPACIDAD)(Tonf)</th>
                    <?php
                        $capass = array();
                        $muCVss = array();
                        $musCMss = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else {
                                $d = $altura[$i] - 8;
                            }
                            $capass = $capas[$i];


                            $acwc = $base[$i] * $d;
                            $acwsc[] = $acwc;
                            $vcc = round(0.53 * sqrt($fc) * ($acwc) / 1000, 2, PHP_ROUND_HALF_UP);
                            $vc1s[] = $vcc;
                            $vcfr1 = 18.13; //round(0.85 * $vcc, 2, PHP_ROUND_HALF_UP);
                            $vcfr1s[] = $vcfr1;
                        }

                        if (isset($vcfr1s)) {
                            foreach ($vcfr1s as $vcfr1) {
                                echo "<td class='text-center' colspan='3'>$vcfr1</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Vs CAPACIDAD (Tonf)</th>
                    <?php
                        $capass = array();
                        $vuss = array();
                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else {
                                $d = $altura[$i] - 8;
                            }
                            $capass = $capas[$i];

                            $acwc = $base[$i] * $d;
                            $acwsc[] = $acwc;
                            $vcc = round(0.53 * sqrt($fc) * ($acwc) / 1000, 2, PHP_ROUND_HALF_UP);
                            $vc1s[] = $vcc;

                            $vus = $vu[$i];
                            $vuss[] = $vus;
                            $VS1 = round(18.13 / 0.85 - $vcc, 2, PHP_ROUND_HALF_UP);
                            $Vs1s[] = $VS1;
                        }

                        if (isset($Vs1s)) {
                            foreach ($Vs1s as $VS1) {
                                echo "<td>$VS1</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">S(cm)</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos * 3; $i++) { # code...
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else {
                                $d = $altura[$i] - 8;
                            }
                            $capass = $capas[$i];

                            $acw = $base[$i] * $d;
                            $acws[] = $acw;
                            $vc = 0.53 * sqrt($fc) * ($acw) / 1000;
                            $vcs[] = $vc;

                            $vus = $vu[$i];
                            $vuss[] = $vus;
                            $VS = round(18.13 / 0.85 - $vc, 2, PHP_ROUND_HALF_UP);
                            $Vss[] = $VS;

                            $Espacios1 = round(0.713 * $fy * $d / ($VS * 1000) * 2, PHP_ROUND_HALF_UP);
                            $Espacios1s[] = $Espacios1;
                        }
                        if (isset($Espacios1s)) {
                            foreach ($Espacios1s as $Espacios1) {
                                echo "<td>$Espacios1</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">S=d/4 (cm):</th>
                    <?php
                        $capass = array();

                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $d1 = $capas_[$i];
                            if ($d1 == 1) {
                                $d1 = $altura[$i] - 6;
                            } else {
                                $d1 = $altura[$i] - 8;
                            }
                            $capass = $capas_[$i];

                            $ped1 = $d1 / 4;
                            $ped1s[] = $ped1;
                        }

                        if (isset($ped1s)) {
                            foreach ($ped1s as $ped1) {
                                echo "<td>$ped1</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Lconf (cm)</th>
                    <?php
                        $capass = array();

                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $Lconfi1 = 2 * $altura[$i];
                            $Lconfi1s[] = $Lconfi1;
                        }

                        if (isset($Lconfi1s)) {
                            foreach ($Lconfi1s as $Lconfi1) {
                                echo "<td>$Lconfi1</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Usar (cm)</th>
                    <?php
                        $capass = array();

                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $S = 33.3;
                            $s2 = 13.5;
                            $smax = 18.13;
                            $usarS1 = min($S, $s2, $smax);
                            $usarS1s[] = $usarS1;
                        }

                        if (isset($usarS1s)) {
                            foreach ($usarS1s as $usarS1) {
                                echo "<td>$usarS1</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row"># estribos zona conf.</th>
                    <?php
                        $capass = array();

                        for ($i = 1; $i <= $num_tramos * 3; $i++) {
                            $Lconfi1 = 2 * $altura[$i];
                            $Lconfi1s[] = $Lconfi1;
                            $S = 33;
                            $s2 = 13.5;
                            $smax = 10;
                            $usarS1 = min($S, $s2, $smax);
                            $usarS1s[] = $usarS1;

                            $estribos1 = $Lconfi1 / $usarS1;
                            $estribos1s[] = $estribos1;
                        }

                        if (isset($estribos1s)) {
                            foreach ($estribos1s as $estribos1) {
                                echo "<td>$estribos1</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Estribado</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $Lconfi1 = 2 * $altura[$i];
                            $Lconfi1s[] = $Lconfi1;
                            $S = 62;
                            $s2 = 13.5;
                            $smax = 10;
                            $usarS1 = min($S, $s2, $smax);
                            $usarS1s[] = $usarS1;

                            $estribos1 = $Lconfi1 / $usarS1;
                            $estribos1s[] = $estribos1;

                            $estribado1 = "Estribado: 1@5cm; $estribos1;@;$usarS1;cm;resto@;20;cm";
                            $estribado1s[] = $estribado1;
                        }

                        if (isset($estribado1s)) {
                            foreach ($estribado1s as $estribado1) {
                                echo "<td class='text-center' colspan='3'>$estribado1</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- DISEÑO POR DEFELXION -->
    <div class="table-responsive">
        <table class="table table-bordered responsive table-hover">
            <thead>
                <tr>
                    <th class="text-center bg-primary" scope="row" colspan="4"> VERIFICACION POR DEFELXION
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Es (Kg/cm<sup>2</sup>)</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {

                            $es = 2 * pow(10, 6);
                            $ess[] = $es; // Agregar 'A' al array $mns
                        }

                        if (isset($ess)) {
                            foreach ($ess as $es) {
                                echo "<td class='text-center' colspan='3'>$es</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Ec (Kg/cm<sup>2</sup>)</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $ec = round(15000 * sqrt($fc), 2, PHP_ROUND_HALF_UP);
                            $ecs[] = $ec; // Agregar 'A' al array $mns
                        }

                        if (isset($ecs)) {
                            foreach ($ecs as $ec) {
                                echo "<td class='text-center' colspan='3'>$ec</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">n</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $es = 2 * pow(10, 6);
                            $ess[] = $es;
                            $ec = round(15000 * sqrt($fc), 2, PHP_ROUND_HALF_UP);
                            $ecs[] = $ec;

                            $n = round($es / $ec, 2, PHP_ROUND_HALF_UP);
                            $ns[] = $n;
                        }

                        if (isset($ns)) {
                            foreach ($ns as $n) {
                                echo "<td class='text-center' colspan='3'>$n</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">C+</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $As_real = round(($acero[$i] * $cantidadAcero[$i]) + ($acero[$i] * $cantidadAcero[$i]), 2, PHP_ROUND_HALF_DOWN);
                            $As_reals[] = $As_real; // Agregar $As_max al array $As_maxs
                            $es = 2 * pow(10, 6);
                            $ess[] = $es;
                            $ec = round(15000 * sqrt($fc), 2, PHP_ROUND_HALF_UP);
                            $ecs[] = $ec;

                            $d = $capas_[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }
                            $ds[] = $d;

                            $n = round($es / $ec, 2, PHP_ROUND_HALF_UP);

                            $c2 = 2 * ($n * $As_real + ($n - 1) * $As_real);
                            $cn = -2 * $n * $As_real * $d;
                            $ns[] = $n;
                            $C = round((-$c2 + sqrt((pow($c2, 2)) - (4 * $base[$i] * $cn))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $Cn = round((-$c2 - sqrt((pow($c2, 2)) - (4 * $base[$i] * $cn))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $cmax = max($C, $Cn);
                            $Cs[] = $cmax;
                        }

                        if (isset($Cs)) {
                            foreach ($Cs as $cmax) {
                                echo "<td class='text-center' colspan='3'>$cmax</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Icr(+) (cm<sup>4</sup>)</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $As_real = round(($acero[$i] * $cantidadAcero[$i]) + ($acero[$i] * $cantidadAcero[$i]), 2, PHP_ROUND_HALF_DOWN);
                            $As_reals[] = $As_real;
                            $es = 2 * pow(10, 6);
                            $ess[] = $es;
                            $ec = round(15000 * sqrt($fc), 2, PHP_ROUND_HALF_UP);
                            $ecs[] = $ec;

                            $d = $capas_[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }

                            $n = round($es / $ec, 2, PHP_ROUND_HALF_UP);
                            $c2 = 2 * ($n * $As_real + ($n - 1) * $As_real);
                            $cn = -2 * $n * $As_real * $d;
                            $C = round((-$c2 + sqrt((pow($c2, 2)) - (4 * $base[$i] * $cn))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $Cn = round((-$c2 - sqrt((pow($c2, 2)) - (4 * $base[$i] * $cn))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $cmax = max($C, $Cn);
                            //Consultar SOBRE LAS FORUMULAR
                            $lcr = round(($base[$i] * pow($cmax, 3) / 3) + ($n * $As_real * pow(54 - $cmax, 2)) + (($n - 1) * $As_real * pow($cmax - 6, 2)), 2, PHP_ROUND_HALF_DOWN);

                            $ds[] = $d;
                            $ns[] = $n;
                            $Lcrs[] = $lcr;
                        }

                        if (isset($Lcrs)) {
                            foreach ($Lcrs as $Lcr) {
                                echo "<td class='text-center' colspan='3'>$lcr</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">C-</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $As_real = round(($acero[$i] * $cantidadAcero[$i]) + ($acero[$i] * $cantidadAcero[$i]), 2, PHP_ROUND_HALF_DOWN);
                            $As_reals[] = $As_real; // Agregar $As_max al array $As_maxs
                            $es = 2 * pow(10, 6);
                            $ess[] = $es;
                            $ec = round(15000 * sqrt($fc), 2, PHP_ROUND_HALF_UP);
                            $ecs[] = $ec;

                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }
                            $ds[] = $d;

                            $n = round($es / $ec, 2, PHP_ROUND_HALF_UP);
                            $ns[] = $n;

                            $c3 = 2 * $n * $As_real;
                            $cn1 = -2 * $n * $As_real * $d;
                            $C1 = round((-$c3 + sqrt((pow($c3, 2)) - (4 * $base[$i] * $cn1))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $Cn1 = round((-$c3 - sqrt((pow($c3, 2)) - (4 * $base[$i] * $cn1))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $cmax1 = max($C1, $Cn1);
                            $Css[] = $cmax1;
                        }

                        if (isset($Css)) {
                            foreach ($Css as $cmax1) {
                                echo "<td class='text-center' colspan='3'>$cmax1</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Icr(-) (cm<sup>4</sup>)</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $As_real = round(($acero[$i] * $cantidadAcero[$i]) + ($acero[$i] * $cantidadAcero[$i]), 2, PHP_ROUND_HALF_DOWN);
                            $As_reals[] = $As_real; // Agregar $As_max al array $As_maxs
                            $es = 2 * pow(10, 6);
                            $ess[] = $es;
                            $ec = round(15000 * sqrt($fc), 2, PHP_ROUND_HALF_UP);
                            $ecs[] = $ec;

                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }
                            $ds[] = $d;

                            $n = round($es / $ec, 2, PHP_ROUND_HALF_UP);
                            $ns[] = $n;

                            $c3 = 2 * $n * $As_real;
                            $cn1 = -2 * $n * $As_real * $d;
                            $C1 = round((-$c3 + sqrt((pow($c3, 2)) - (4 * $base[$i] * $cn1))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $Cn1 = round((-$c3 - sqrt((pow($c3, 2)) - (4 * $base[$i] * $cn1))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $cmax1 = max($C1, $Cn1);
                            $Css[] = $cmax1;
                            //Consultar SOBRE LAS FORUMULAR
                            $lcr1 = round(($base[$i] * pow($cmax1, 3) / 3) + ($n * $As_real * pow($d - $cmax1, 2)) + (($n - 1) * $As_real * pow($cmax1 - 6, 2)), 2, PHP_ROUND_HALF_DOWN);
                            $ds[] = $d;
                            $ns[] = $n;
                            $Lcrs1s[] = $lcr1;
                        }

                        if (isset($Lcrs1s)) {
                            foreach ($Lcrs1s as $Lcr1) {
                                echo "<td class='text-center' colspan='3'>$lcr1</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Lef (cm<sup>4</sup>)</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $As_real = round(($acero[$i] * $cantidadAcero[$i]) + ($acero[$i] * $cantidadAcero[$i]), 2, PHP_ROUND_HALF_DOWN);
                            $As_reals[] = $As_real;
                            $es = 2 * pow(10, 6);
                            $ess[] = $es;
                            $ec = round(15000 * sqrt($fc), 2, PHP_ROUND_HALF_UP);
                            $ecs[] = $ec;

                            $d = $capas_[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }

                            $n = round($es / $ec, 2, PHP_ROUND_HALF_UP);
                            $c2 = 2 * ($n * $As_real + ($n - 1) * $As_real);
                            $cn = -2 * $n * $As_real * $d;
                            $C = round((-$c2 + sqrt((pow($c2, 2)) - (4 * $base[$i] * $cn))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $Cn = round((-$c2 - sqrt((pow($c2, 2)) - (4 * $base[$i] * $cn))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $cmax = max($C, $Cn);
                            //Consultar SOBRE LAS FORUMULAR
                            $lcr = round(($base[$i] * pow($cmax, 3)) / (3) + ($n * $As_real * pow(52 - $cmax, 2)) + (($n - 1) * $As_real * pow($cmax - 8, 2)), 2, PHP_ROUND_HALF_DOWN);
                            $ds[] = $d;
                            $ns[] = $n;
                            $Lcrs[] = $lcr;

                            $d1 = $capas[$i];
                            if ($d1 == 1) {
                                $d1 = $altura[$i] - 6;
                            } else if ($d1 == 2) {
                                $d1 = $altura[$i] - 8;
                            } else if ($d1 == 3) {
                                $d1 = $altura[$i] - 10;
                            } elseif ($d1 == 4) {
                                $d1 = $altura[$i] - 12;
                            } elseif ($d1 == 5) {
                                $d1 = $altura[$i] - 14;
                            } elseif ($d1 == 6) {
                                $d1 = $altura[$i] - 16;
                            }
                            $ds[] = $d;

                            $c3 = 2 * $n * $As_real;
                            $cn1 = -2 * $n * $As_real * $d1;
                            $C1 = round((-$c3 + sqrt((pow($c3, 2)) - (4 * $base[$i] * $cn1))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $Cn1 = round((-$c3 - sqrt((pow($c3, 2)) - (4 * $base[$i] * $cn1))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $cmax1 = max($C1, $Cn1);
                            $Css[] = $cmax1;
                            //Consultar SOBRE LAS FORUMULAR
                            $lcr1 = round(($base[$i] * pow($cmax1, 3)) / (3) + ($n * $As_real * pow($d1 - $cmax1, 2)) + (($n - 1) * $As_real * pow($cmax1 - 6, 2)), 2, PHP_ROUND_HALF_DOWN);
                            $ds[] = $d1;
                            $ns[] = $n;
                            $Lcrs1s[] = $lcr1;
                            $lef = ($lcr1 + $lcr1 + 2 * $Lcr) / 4;
                            $lefs[] = $lef;
                        }

                        if (isset($lefs)) {
                            foreach ($lefs as $lef) {
                                echo "<td class='text-center' colspan='3'>$lef</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Δzm (cm)</th>
                    <?php
                        $capass = array();
                        $muCMs = array();
                        $muCM1s = array();
                        $luzLibres = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $As_real = round(($acero[$i] * $cantidadAcero[$i]) + ($acero[$i] * $cantidadAcero[$i]), 2, PHP_ROUND_HALF_DOWN);
                            $As_reals[] = $As_real;
                            $es = 2 * pow(10, 6);
                            $ess[] = $es;
                            $ec = round(15000 * sqrt($fc), 2, PHP_ROUND_HALF_UP);
                            $ecs[] = $ec;

                            $d = $capas_[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }

                            $n = round($es / $ec, 2, PHP_ROUND_HALF_UP);
                            $c2 = 2 * ($n * $As_real + ($n - 1) * $As_real);
                            $cn = -2 * $n * $As_real * $d;
                            $C = round((-$c2 + sqrt((pow($c2, 2)) - (4 * $base[$i] * $cn))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $Cn = round((-$c2 - sqrt((pow($c2, 2)) - (4 * $base[$i] * $cn))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $cmax = max($C, $Cn);
                            //Consultar SOBRE LAS FORUMULAR
                            $lcr = round(($base[$i] * pow($cmax, 3)) / (3) + ($n * $As_real * pow(52 - $cmax, 2)) + (($n - 1) * $As_real * pow($cmax - 8, 2)), 2, PHP_ROUND_HALF_DOWN);
                            $ds[] = $d;
                            $ns[] = $n;
                            $Lcrs[] = $lcr;

                            $d1 = $capas[$i];
                            if ($d1 == 1) {
                                $d1 = $altura[$i] - 6;
                            } else if ($d1 == 2) {
                                $d1 = $altura[$i] - 8;
                            } else if ($d1 == 3) {
                                $d1 = $altura[$i] - 10;
                            } elseif ($d1 == 4) {
                                $d1 = $altura[$i] - 12;
                            } elseif ($d1 == 5) {
                                $d1 = $altura[$i] - 14;
                            } elseif ($d1 == 6) {
                                $d1 = $altura[$i] - 16;
                            }
                            $ds[] = $d;

                            $c3 = 2 * $n * $As_real;
                            $cn1 = -2 * $n * $As_real * $d1;
                            $C1 = round((-$c3 + sqrt((pow($c3, 2)) - (4 * $base[$i] * $cn1))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $Cn1 = round((-$c3 - sqrt((pow($c3, 2)) - (4 * $base[$i] * $cn1))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $cmax1 = max($C1, $Cn1);
                            $Css[] = $cmax1;
                            //Consultar SOBRE LAS FORUMULAR
                            $lcr1 = round(($base[$i] * pow($cmax1, 3)) / (3) + ($n * $As_real * pow($d1 - $cmax1, 2)) + (($n - 1) * $As_real * pow($cmax1 - 6, 2)), 2, PHP_ROUND_HALF_DOWN);
                            $ds[] = $d1;
                            $ns[] = $n;
                            $Lcrs1s[] = $lcr1;
                            $lef = ($lcr1 + $lcr1 + 2 * $Lcr) / 4;
                            $lefs[] = $lef;
                            $zm = round(((5 * pow($luzLibre[$i] * 100, 2)) / (48 * $ec * $lef)) * ((($muCM_[2] * 1000) - 0.1 * (($muCM[1] + $muCM[3] * 1000))) * 100), 2, PHP_ROUND_HALF_UP);
                            $zms[] = $zm;
                        }

                        if (isset($zms)) {
                            foreach ($zms as $zm) {
                                echo "<td class='text-center' colspan='3'>$zm</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">ΔzL (cm)</th>
                    <?php
                        $capass = array();
                        $muCvs = array();
                        $muCv1s = array();
                        $luzLibres = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $As_real = round(($acero[$i] * $cantidadAcero[$i]) + ($acero[$i] * $cantidadAcero[$i]), 2, PHP_ROUND_HALF_DOWN);
                            $As_reals[] = $As_real;
                            $es = 2 * pow(10, 6);
                            $ess[] = $es;
                            $ec = round(15000 * sqrt($fc), 2, PHP_ROUND_HALF_UP);
                            $ecs[] = $ec;

                            $d = $capas_[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }

                            $n = round($es / $ec, 2, PHP_ROUND_HALF_UP);
                            $c2 = 2 * ($n * $As_real + ($n - 1) * $As_real);
                            $cn = -2 * $n * $As_real * $d;
                            $C = round((-$c2 + sqrt((pow($c2, 2)) - (4 * $base[$i] * $cn))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $Cn = round((-$c2 - sqrt((pow($c2, 2)) - (4 * $base[$i] * $cn))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $cmax = max($C, $Cn);
                            //Consultar SOBRE LAS FORUMULAR
                            $lcr = round(($base[$i] * pow($cmax, 3)) / (3) + ($n * $As_real * pow(52 - $cmax, 2)) + (($n - 1) * $As_real * pow($cmax - 8, 2)), 2, PHP_ROUND_HALF_DOWN);
                            $ds[] = $d;
                            $ns[] = $n;
                            $Lcrs[] = $lcr;

                            $d1 = $capas[$i];
                            if ($d1 == 1) {
                                $d1 = $altura[$i] - 6;
                            } else if ($d1 == 2) {
                                $d1 = $altura[$i] - 8;
                            } else if ($d1 == 3) {
                                $d1 = $altura[$i] - 10;
                            } elseif ($d1 == 4) {
                                $d1 = $altura[$i] - 12;
                            } elseif ($d1 == 5) {
                                $d1 = $altura[$i] - 14;
                            } elseif ($d1 == 6) {
                                $d1 = $altura[$i] - 16;
                            }
                            $ds[] = $d;

                            $c3 = 2 * $n * $As_real;
                            $cn1 = -2 * $n * $As_real * $d1;
                            $C1 = round((-$c3 + sqrt((pow($c3, 2)) - (4 * $base[$i] * $cn1))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $Cn1 = round((-$c3 - sqrt((pow($c3, 2)) - (4 * $base[$i] * $cn1))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $cmax1 = max($C1, $Cn1);
                            $Css[] = $cmax1;
                            //Consultar SOBRE LAS FORUMULAR
                            $lcr1 = round(($base[$i] * pow($cmax1, 3)) / (3) + ($n * $As_real * pow($d1 - $cmax1, 2)) + (($n - 1) * $As_real * pow($cmax1 - 6, 2)), 2, PHP_ROUND_HALF_DOWN);
                            $ds[] = $d1;
                            $ns[] = $n;
                            $Lcrs1s[] = $lcr1;
                            $lef = ($lcr1 + $lcr1 + 2 * $Lcr) / 4;
                            $lefs[] = $lef;
                            $zl = round(((5 * pow($luzLibre[$i] * 100, 2)) / (48 * $ec * $lef)) * ((($muCv_[2] * 1000) - 0.1 * (($muCv[1] + $muCv[3]) * 1000)) * 100), 2, PHP_ROUND_HALF_UP);
                            $zls[] = $zl;
                        }

                        if (isset($zls)) {
                            foreach ($zls as $zl) {
                                echo "<td class='text-center' colspan='3'>$zl</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">Δz30% (cm)</th>
                    <?php
                        $capass = array();
                        $muCvs = array();
                        $muCv1s = array();
                        $luzLibres = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $As_real = round(($acero[$i] * $cantidadAcero[$i]) + ($acero[$i] * $cantidadAcero[$i]), 2, PHP_ROUND_HALF_DOWN);
                            $As_reals[] = $As_real;
                            $es = 2 * pow(10, 6);
                            $ess[] = $es;
                            $ec = round(15000 * sqrt($fc), 2, PHP_ROUND_HALF_UP);
                            $ecs[] = $ec;

                            $d = $capas_[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }

                            $n = round($es / $ec, 2, PHP_ROUND_HALF_UP);
                            $c2 = 2 * ($n * $As_real + ($n - 1) * $As_real);
                            $cn = -2 * $n * $As_real * $d;
                            $C = round((-$c2 + sqrt((pow($c2, 2)) - (4 * $base[$i] * $cn))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $Cn = round((-$c2 - sqrt((pow($c2, 2)) - (4 * $base[$i] * $cn))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $cmax = max($C, $Cn);
                            //Consultar SOBRE LAS FORUMULAR
                            $lcr = round(($base[$i] * pow($cmax, 3)) / (3) + ($n * $As_real * pow(52 - $cmax, 2)) + (($n - 1) * $As_real * pow($cmax - 8, 2)), 2, PHP_ROUND_HALF_DOWN);
                            $ds[] = $d;
                            $ns[] = $n;
                            $Lcrs[] = $lcr;

                            $d1 = $capas[$i];
                            if ($d1 == 1) {
                                $d1 = $altura[$i] - 6;
                            } else if ($d1 == 2) {
                                $d1 = $altura[$i] - 8;
                            } else if ($d1 == 3) {
                                $d1 = $altura[$i] - 10;
                            } elseif ($d1 == 4) {
                                $d1 = $altura[$i] - 12;
                            } elseif ($d1 == 5) {
                                $d1 = $altura[$i] - 14;
                            } elseif ($d1 == 6) {
                                $d1 = $altura[$i] - 16;
                            }
                            $ds[] = $d;

                            $c3 = 2 * $n * $As_real;
                            $cn1 = -2 * $n * $As_real * $d1;
                            $C1 = round((-$c3 + sqrt((pow($c3, 2)) - (4 * $base[$i] * $cn1))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $Cn1 = round((-$c3 - sqrt((pow($c3, 2)) - (4 * $base[$i] * $cn1))) / (2 * $base[$i]), 2, PHP_ROUND_HALF_UP);
                            $cmax1 = max($C1, $Cn1);
                            $Css[] = $cmax1;
                            //Consultar SOBRE LAS FORUMULAR
                            $lcr1 = round(($base[$i] * pow($cmax1, 3)) / (3) + ($n * $As_real * pow($d1 - $cmax1, 2)) + (($n - 1) * $As_real * pow($cmax1 - 6, 2)), 2, PHP_ROUND_HALF_DOWN);
                            $ds[] = $d1;
                            $ns[] = $n;
                            $Lcrs1s[] = $lcr1;
                            $lef = ($lcr1 + $lcr1 + 2 * $Lcr) / 4;
                            $lefs[] = $lef;
                            $zl = round(((5 * pow($luzLibre[$i] * 100, 2)) / (48 * $ec * $lef)) * ((($muCv_[2] * 1000) - 0.1 * (($muCv[1] + $muCv[3]) * 1000)) * 100), 2, PHP_ROUND_HALF_UP);
                            $zls[] = $zl;

                            $azl = round(0.3 * $zl, 2, PHP_ROUND_HALF_UP);
                            $azls[] = $azl;
                        }

                        if (isset($azls)) {
                            foreach ($azls as $azl) {
                                echo "<td class='text-center' colspan='3'>$azl</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">λΔ</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }
                            $p = 5.94 / ($base[$i] * $d);
                            $e = 2;
                            $dd = round($e / (1 + (50 * $p)), 2, PHP_ROUND_HALF_UP);
                            $dds[] = $dd;
                        }

                        if (isset($dds)) {
                            foreach ($dds as $dd) {
                                echo "<td class='text-center' colspan='3'>$dd</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>

                </tr>
                <tr>
                    <th scope="row">Δmedia (cm)</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }
                            $p = 5.94 / ($base[$i] * $d);
                            $e = 2;
                            $dd = round($e / (1 + (50 * $p)), 2, PHP_ROUND_HALF_UP);
                            $dds[] = $dd;
                            $amedia = $zm * (1 + $dd) + $azl * (1 + $dd);
                            $amedias[] = $amedia;
                        }

                        if (isset($amedias)) {
                            foreach ($amedias as $amedia) {
                                echo "<td class='text-center' colspan='3'>$amedia</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">ΔMáx (cm)</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $d = $capas[$i];
                            if ($d == 1) {
                                $d = $altura[$i] - 6;
                            } else if ($d == 2) {
                                $d = $altura[$i] - 8;
                            } else if ($d == 3) {
                                $d = $altura[$i] - 10;
                            } elseif ($d == 4) {
                                $d = $altura[$i] - 12;
                            } elseif ($d == 5) {
                                $d = $altura[$i] - 14;
                            } elseif ($d == 6) {
                                $d = $altura[$i] - 16;
                            }
                            $p = 5.94 / ($base[$i] * $d);
                            $e = 2;
                            $dd = round($e / (1 + (50 * $p)), 2, PHP_ROUND_HALF_UP);
                            $dds[] = $dd;
                            $amax = $zm + $zl + $dd * $zm + $zl * $azl;
                            $amaxs[] = $amax;
                        }

                        if (isset($amaxs)) {
                            foreach ($amaxs as $amax) {
                                echo "<td class='text-center' colspan='3'>$amax</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">ΔZL</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {

                            $AzlV = ($luzLibre[$i] * 100) / 360;
                            $AzlVs[] = $AzlV;
                        }

                        if (isset($AzlVs)) {
                            foreach ($AzlVs as $AzlV) {
                                echo "<td class='text-center' colspan='3'>$AzlV</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">VERIFICACION</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $AzlV = ($luzLibre[$i] * 100) / 360;
                            $VCV = "";
                            if ($zl < $AzlV) {
                                $VCV = "CUMPLE";
                            } else {
                                $VCV = "NO CUMPLE";
                            }
                            $VCVs[] = $VCV;
                        }

                        if (isset($VCVs)) {
                            foreach ($VCVs as $VCV) {
                                echo "<td class='text-center' colspan='3'>$VCV</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">ΔZT</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {

                            $Aztv = ($luzLibre[$i] * 100) / 480;
                            $Aztvs[] = $Aztv;
                        }

                        if (isset($Aztvs)) {
                            foreach ($Aztvs as $Aztv) {
                                echo "<td class='text-center' colspan='3'>$Aztv</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
                <tr>
                    <th scope="row">VERIFICACION</th>
                    <?php
                        $capass = array();
                        for ($i = 1; $i <= $num_tramos; $i++) {
                            $AzlV1 = ($luzLibre[$i] * 100) / 360;
                            $azt = $dd * $zm + $dd * $azl + $zl;

                            $ZT = "";
                            if ($azt < $AzlV1) {
                                $ZT = "CUMPLE";
                            } else {
                                $ZT = "NO CUMPLE";
                            }
                            $ZTs[] = $ZT;
                        }

                        if (isset($ZTs)) {
                            foreach ($ZTs as $ZT) {
                                echo "<td class='text-center' colspan='3'>$ZT</td>"; // Celda con el valor de 'A'
                            }
                        }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $("#form2").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "Controladores/prueba02.php",
                    data: formData,
                    success: function(response) {
                        $("#ObtenerResultados").html(response);
                    }
                });
            });
        });
    </script>

</body>

</html>