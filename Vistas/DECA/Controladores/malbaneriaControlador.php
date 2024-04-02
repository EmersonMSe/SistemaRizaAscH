<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario POST y convertirlos a números enteros
    $desc = floatval($_POST["desc"]);
    $ubi = floatval($_POST["ubi"]);
    $fm = floatval($_POST["fm"]);
    $l = floatval($_POST["l"]);
    $t = floatval($_POST["t"]);
    $h = floatval($_POST["h"]);

    /* 2 values */
    $pm = floatval($_POST["pm"]);
    $pg = floatval($_POST["pg"]);
    $ve = floatval($_POST["ve"]);
    $me =  floatval($_POST["me"]);


    /* 4 values */
    $vdm = floatval($_POST["vdm"]);

    /* 6 values */
    $nh = $_POST["nh"] . " hiladas";
    $db = $_POST["db"] . " mm";

    /* 7 result */
    $nc = floatval($_POST["nc"]);
    $fdc = floatval($_POST["fdc"]);
    $pt1 = floatval($_POST["pt1"]);
    $pt2 = floatval($_POST["pt2"]);
    $lm = $l/* floatval($_POST["lm"]) */;

    /* 7.2 params */
    $pce = floatval($_POST["pce"]);
    $pci = floatval($_POST["pci"]);
    $dce = floatval($_POST["dce"]);
    $dci = floatval($_POST["dci"]);

    $pcex = floatval($_POST["pcex"]);
    $pcin = floatval($_POST["pcin"]);

    /* 8 value */
    $diameter = floatval($_POST["dmtr"]);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>



</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fy = 4200;
        $pt1 = 24 * 0.9;
        $pt2 = 0;
        /*$vu = 11.76; */
        /* $mu = 55.62; */
        // Calcula algunas fórmulas simples con los datos del formulario
        $pm = round($pm / ($l * $t), 2); // 
        $fa = round(0.2 * $fm * (1 - pow($h / (35 * $t), 2)), 2);

        $qfm = round($fm * 0.15, 2); // Longitud total centro del claro:
        $al = 0;
        if (($ve * $l) / $me > 1) {
            $al = 1;
        } else {
            $al = round(($ve * $l) / $me, 2);
        }

        /* 4 result */
        $vm = round(0.5 * $vdm * $al * $t * $l + 0.23 * $pg, 2); // Longitud total centro del claro:
        $qvm = round(0.55 * $vm, 2);
        $cond = '';
        if ($qvm >  $ve) {
            $cond = "No agrietado";
        } else {
            $cond = "Agrietado";
        }
        $max = 0;
        $r1 = 0;
        $r2 = 0;
        if ($vm / $ve > 3) {
            $r1 = 3;
        } else {
            $r1 = round($vm / $ve, 2);
        }
        if ($vm / $ve < 2) {
            $r2 = 2;
        } else {
            $r2 = 0;
        }
        if ($r1 > $r2) {
            $max = round($r1, 2);
        } else {
            $max = round($r2, 2);
        }

        /* 5 result */
        $vu = round($max * $ve, 2);
        $mu = round($max * $me, 2);
        /* 6 result */
        $qqfm = round(0.05 * $fm, 2);
        $text = '';
        if ($pm > $qqfm) {
            $text = "Refuerzo corrido";
        } else {
            $text = "Solo mechas";
        }
        $cantB = 0;
        if ($nh == "2 hiladas") {
            $cantB = 5;
        } else {
            $cantB = 4;
        }
        $ph = 0;
        if ($db == "8 mm") {
            $ph = 0.5 * $cantB / (100 * $t * 100);
        } else {
            $ph = 0.32 * $cantB / (100 * $t * 100);
        }
        $arm = "";
        if ($ph > 0.001) {
            $arm = "Ø " . $db . " @ " . $nh;
        } else {
            $arm = "No cumple";
        }

        /* 7 result */
        $m = round($mu - 0.5 * ($vm * $h), 2);
        $pc = $pg / $nc;
        $f = round($m / $l, 2);
        $ts1 = round($vm * $lm / ($l * ($nc - 1)), 2);
        $ts2 = round($vm * $h / $l - $pc, 2);
        $ts3 = round($pc - $vm * $h / (2 * $l), 2);
        $ts4 = round(1.5 * $vm * $lm / ($l * ($nc + 1)), 2);
        $ts5 = round(abs($f - $pc - $pt1), 2);
        $ts6 = round($pc + $m + $pt1 + $pt2, 2);
        

            /* $tso1 = $vm*$lm/($l*($nc+1)); */
            /* 7.1 result */;

        /* 7.1 scnd table */
        $tso1 = 0;
        if (round($ts1 * 1000 / (0.2 * $fdc * 0.85), 2) > 15 * $t * 100) {
            $tso1 = round($ts1 * 1000 / (0.2 * $fdc * 0.85), 2);
        } else {
            $tso1 = 15 * $t * 100;
        }
        $tso2 = round($ts1 * 1000 / ($fy * 1 * 0.85), 2);
        $tso3 = round($ts2 * 1000 / ($fy * 0.85), 2);
        $tso4 = $tso2 + $tso3;
        $tso5 = 0.1 * $fdc * $tso1 / $fy;
        $use1 = '';
        if ($tso4 > $tso5) {
            $use1 = "Usar As";
        } else {
            $use1 = "Usar 4 Ø 8mm";
        }
        $tso6 = $tso4;

        $tso7 = 0;
        if (round($ts4 * 1000 / (0.2 * $fdc * 0.85), 2) > 15 * $t * 100) {
            $tso7 = round($ts4 * 1000 / (0.2 * $fdc * 0.85), 2);
        } else {
            $tso7 = 15 * $t * 100;
        }
        $tso8 = round($ts4 * 1000 / ($fy * 1 * 0.85), 2);
        $tso9 = round($ts5 * 1000 / ($fy * 0.85), 2);
        $tso10 = $tso8 + $tso9;
        $tso11 = 0.1 * $fdc * $tso7 / $fy;
        $use2 = '';
        if ($tso10 > $tso11) {
            $use2 = "Usar As";
        } else {
            $use2 = "Usar 4 Ø 8mm";
        }
        $tso12 = $tso10;

        /* 7.1 scnd table */
        $tsoo1 = 0.5;
        $tsoo2 = 4;
        $tsoo3 = 5.07 * pow($tsoo1, 2) * $tsoo2;
        $tsoo4 = "Armado " . $tsoo2 . " Ø";
        $tsoo5 = $tsoo1;

        $tsoo6 = 0.5;
        $tsoo7 = 4;
        $tsoo8 = 5.07 * pow($tsoo6, 2) * $tsoo7;
        $tsoo9 = "Armado " . $tsoo7 . " Ø";
        $tsoo10 = $tsoo6;

        /* 7.2 results */
        $tst1 = 15 * $t * 100;
        $tst2 = ($ts3 * 1000 / $pce) - $tsoo3 * 4200;
        $tst3 = 0.85 * $dce * $fdc;
        $tst4 = $tsoo3 + $tst2 / $tst3;
        $tst5 = $tso1;
        $tst6 = 15 * $t * 100;
        $tst7 = ($ts6 * 1000 / $pci) - $tsoo8 * 4200;
        $tst8 = 0.85 * $dci * $fdc;
        $tst9 = $tsoo8 + $tst7 / $tst8;
        $tst10 = $tso7;

        /* 7.3 values */
        $tstr1e = 0.58;
        $tstr2e = 7.16;
        $tstr3e = 12.89;
        $tstr4e = 10;
        $tstr5e = 6;

        $tstr1i = "0.58 cm2  = 6mm @";
        $tstr2i = 0.58;
        $tstr3i = 5.32;
        $tstr4i = 10;
        $tstr5i = 5;

        /* 8 values */
        $ts = $vm * $l / (2 * $l);
        $as = $ts * 1000 / (0.9 * $fy);
        $peralte = 20;
        $barten = $as / (5.07 * pow($diameter, 2));
        $barfin = 4;


    ?>

        <!-- Second result -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-bold text-center"><u>2. CARGAS Y COMBINACIONES PARA EL DISEÑO</u></h2>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <table class="table table-bordered text-center">
                    <thead class="thead-light">
                        <tr>
                            <th class="bg-yellow-light">Descripción</th>
                            <th class="bg-yellow-light">Pm = D + L</th>
                            <th>Pg = D + 0.25l</th>
                            <th>Ve</th>
                            <th>Me</th>
                            <th>Vu</th>
                            <th>Mu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="font-weight-bold">Valor</td>
                            <td class="bg-yellow-light">27.82</td>
                            <td>23.72</td>
                            <td>3.92</td>
                            <td>18.54</td>
                            <td><?php echo $vu; ?></td>
                            <td><?php echo $mu; ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-bold text-center"><u>3. VERIFICACIÓN POR CARGAS VERTICALES</u></h2>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-6 text-center">
                    <img src="assets/img/f1.png" alt="imagen" class="img-fluid">
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold">Esfuerzo Axial Máximo</td>
                            <td>σm = <?php echo $pm . " Tn/m2"; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Esfuerzo Admisible por Carga Vertical:</td>
                            <td>Fa = <?php echo $fa . " Tn/m2"; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Área tributaria - nudo exterior:</td>
                            <td>0.15 f'm = <?php echo $qfm . " Tn/m2"; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Fourth result -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-bold text-center"><u>4. VERIFICACIÓN DEL AGRIETAMIENTO EN LOS MUROS</u></h2>
                    <h4 class="text-center">El muro de deberá agrietarse ante la acción de sismos moderados, deberá comprobarse la relación siguiente:</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <img src="assets/img/ve.png" alt="imagen" class="img-fluid mt-3">
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold">Resistencia característica corte de la albañilería:</td>
                            <td>Vm = <?php echo $vm . " Tn"; ?></td>
                            <td></td>
                            <td>α = <?php echo $al; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Fuerza cortante asociada al agrietamiento diagonal:</td>
                            <td>V'm = <?php echo $vdm . " Tn/m2"; ?></td>
                            <td></td>
                            <td>0.55Vm = <?php echo $qvm . " Tn"; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Ve = <?php echo $ve; ?></td>
                            <td></td>
                            <td>Condición = <?php echo $cond; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Fifth result -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-bold text-center"><u>5. OBTENCIÓN DEL CORTANTE Y MOMENTOS POR EL SISMO SEVERO</u></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <img src="assets/img/vumu.png" alt="imagen" class="img-fluid mt-3">
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Vu = <?php echo $vu . " Tn"; ?></td>
                            <td></td>
                            <td>Mu = <?php echo $mu . " Tn-m"; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Sixth result -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-bold text-center"><u>6. VERIFICACIÓN DE LA NECESIDAD DE COLOCAR REFUERZO HORIZONTAL</u></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <img src="assets/img/vuvm.png" alt="imagen" class="img-fluid mt-3">
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Vu = <?php echo $vu . " Tn"; ?></td>
                            <td></td>
                            <td>Vm = <?php echo $vm . " Tn"; ?></td>
                        </tr>
                        <tr>
                            <td>σm = <?php echo $pm . " Tn/m2"; ?></td>
                            <td></td>
                            <td>0.05 f'm = <?php echo $qqfm . " Tn/m2"; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <p>La cuantía mínima a ser considerada es: <span>ρAs/(s.t)≥0.001</span></p>
                            </td>
                            <td></td>
                            <td><?php echo $text; ?></td>
                        </tr>
                        <tr>
                            <td>
                                <p>Distribución del acero de refuerzo horizontal en el muro: ph = <?php echo $ph; ?></p>
                            </td>
                            <td></td>
                            <td>N Hiladas = <?php echo $nh; ?></td>
                            <td>Barra = <?php echo $db; ?></td>
                            <td>N barras = <?php echo $cantB; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-12 text-center">
                    <p>Armado = <?php echo $arm; ?></p>
                </div>
            </div>
        </div>

        <!-- Seventh result -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-bold text-center"><u>7. DISEÑO DE LAS COLUMNAS DE CONFINAMIENTO
                        </u></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <img src="assets/img/7.png" alt="imagen" class="img-fluid mt-3">
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>M = <?php echo $m . " Tn-m"; ?></td>
                            <td></td>
                            <td>F = <?php echo $f . " Tn"; ?></td>
                        </tr>
                        <tr>
                            <td>Nc = <?php echo $nc . " "; ?></td>
                            <td></td>
                            <td>Lm = <?php echo $lm . " m"; ?></td>
                        </tr>
                        <tr>
                            <td>F'c = <?php echo $fdc . " Kg/cm2"; ?></td>
                            <td></td>
                            <td>Fy = <?php echo $fy . " Kg/cm2"; ?></td>
                        </tr>
                        <tr>
                            <td>Pc = <?php echo $pc . " Tn"; ?></td>
                            <td></td>
                            <td>Vm = <?php echo $vm . " "; ?></td>
                        </tr>
                        <tr>
                            <td>Pt1 = <?php echo $pt1 . " 1/4 pg muro"; ?></td>
                            <td></td>
                            <td>L = <?php echo $l . " "; ?></td>
                        </tr>
                        <tr>
                            <td>Pt2 = <?php echo $pt2 . " 1/4 pg muro"; ?></td>
                            <td></td>
                            <td>H = <?php echo $h . " "; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="container">
                <div class="row justify-content-center mt-3">
                    <div class="col-6">
                        <table class="table table-bordered text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Descripción</th>
                                    <th>Vc (cortante)</th>
                                    <th>T (tracción)</th>
                                    <th>C (compresión)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Col. Interior</td>
                                    <td><?php echo $ts1; ?></td>
                                    <td><?php echo $ts2; ?></td>
                                    <td><?php echo $ts3; ?></td>
                                </tr>
                                <tr>
                                    <td>Col. Exterior</td>
                                    <td><?php echo $ts4; ?></td>
                                    <td><?php echo $ts5; ?></td>
                                    <td><?php echo $ts6; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- 7.1 result -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-bold text-center"><u>7.1 Diseño por corte fricción y tracción combinada
                        </u></h2>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>F'c = <?php echo $fdc . " Kg/cm2"; ?></td>
                            <td></td>
                            <td>Fy = <?php echo $fy . " "; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <img src="assets/img/7_1.png" alt="imagen" class="img-fluid mt-3">
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Descripción</td>
                            <td>Acf(cm²)</td>
                            <td>Asf(cm²)</td>
                            <td>Ast(cm²)</td>
                            <td>As(cm²)</td>
                            <td>0.1*f'c*Ac/fy</td>
                            <td>Comparación</td>
                            <td>Final</td>
                        </tr>
                        <tr>
                            <td>Col. Exterior</td>
                            <td><?php echo $tso1; ?></td>
                            <td><?php echo $tso2; ?></td>
                            <td><?php echo $tso3; ?></td>
                            <td><?php echo $tso4; ?></td>
                            <td><?php echo $tso5; ?></td>
                            <td><?php echo $use1; ?></td>
                            <td><?php echo $tso6; ?></td>
                        </tr>
                        <tr>
                            <td>Col. Interior</td>
                            <td><?php echo $tso7; ?></td>
                            <td><?php echo $tso8; ?></td>
                            <td><?php echo $tso9; ?></td>
                            <td><?php echo $tso10; ?></td>
                            <td><?php echo $tso11; ?></td>
                            <td><?php echo $use2; ?></td>
                            <td><?php echo $tso12; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row justify-content-center mt-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Descripción</td>
                            <td>Barras</td>
                            <td>Número</td>
                            <td>As colocado</td>
                            <td>Armado</td>
                            <td>final</td>
                        </tr>
                        <tr>
                            <td>Col. Exterior</td>
                            <td><?php echo $tsoo1; ?></td>
                            <td><?php echo $tsoo2; ?></td>
                            <td><?php echo $tsoo3; ?></td>
                            <td><?php echo $tsoo4; ?></td>
                            <td><?php echo $tsoo5; ?></td>
                        </tr>
                        <tr>
                            <td>Col. Interior</td>
                            <td><?php echo $tsoo6; ?></td>
                            <td><?php echo $tsoo7; ?></td>
                            <td><?php echo $tsoo8; ?></td>
                            <td><?php echo $tsoo9; ?></td>
                            <td><?php echo $tsoo10; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 7.2 result -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-bold text-center"><u>7.2 Determinación de la Sección de Concreto de la Columna de Confinamiento
                        </u></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <img src="assets/img/7_2a.png" alt="imagen" class="img-fluid mt-3">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <img src="../vista/assets/img/7_2b.png" alt="imagen" class="img-fluid mt-3">
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Descripción</td>
                            <td>Ø</td>
                            <td>δ</td>
                            <td>15 x t</td>
                            <td>C/Ø-Asfy</td>
                            <td>0.85*δ*fc</td>
                            <td>An</td>
                            <td>Acf</td>
                        </tr>
                        <tr>
                            <td>Col. Exterior</td>
                            <td><?php echo $pce; ?></td>
                            <td><?php echo $dce; ?></td>
                            <td><?php echo $tst1; ?></td>
                            <td><?php echo $tst2; ?></td>
                            <td><?php echo $tst3; ?></td>
                            <td><?php echo $tst4; ?></td>
                            <td><?php echo $tst5; ?></td>
                        </tr>
                        <tr>
                            <td>Col. Interior</td>
                            <td><?php echo $pci; ?></td>
                            <td><?php echo $dci; ?></td>
                            <td><?php echo $tst6; ?></td>
                            <td><?php echo $tst7; ?></td>
                            <td><?php echo $tst8; ?></td>
                            <td><?php echo $tst9; ?></td>
                            <td><?php echo $tst10; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Peralte Col. Ext.</td>
                            <td><?php echo $pcex; ?></td>
                            <td></td>
                            <td>Peralte Col. Int.</td>
                            <td><?php echo $pcin; ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 7.3 result -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-bold text-center"><u>7.3 Determinación de los Estribos de Confinamiento
                        </u></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <img src="assets/img/7_3.png" alt="imagen" class="img-fluid mt-3">
                </div>
            </div>

            <div class="row justify-content-center mt-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Descripción</td>
                            <td>s1</td>
                            <td>s2</td>
                            <td>s3</td>
                            <td>s4</td>
                            <td>s</td>
                        </tr>
                        <tr>
                            <td>Col. Exterior</td>
                            <td><?php echo $tstr1e; ?></td>
                            <td><?php echo $tstr2e; ?></td>
                            <td><?php echo $tstr3e; ?></td>
                            <td><?php echo $tstr4e; ?></td>
                            <td><?php echo $tstr5e; ?></td>
                        </tr>
                        <tr>
                            <td>Col. Interior</td>
                            <td><?php echo $tstr1i; ?></td>
                            <td><?php echo $tstr2i; ?></td>
                            <td><?php echo $tstr3i; ?></td>
                            <td><?php echo $tstr4i; ?></td>
                            <td><?php echo $tstr5i; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row justify-content-center mt-3">
                <div class="col-12 text-center">
                    <p>Av. col. exterior = <?php echo " s [ ] 0.58 cm2  = 6mm @  : 1 @ 5, 7.5 @ 6, Rto. @ 25"; ?></p>
                    <p>Av. col. interior = <?php echo " s [ ] 0.58 cm2  = 6mm @  : 1 @ 5, 9 @ 5, Rto. @ 25"; ?></p>
                </div>
            </div>
        </div>

        <!-- 8 result -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-weight-bold text-center"><u>8 DISEÑO DE LAS VIGAS DE CONFINAMIENTO
                        </u></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <img src="assets/img/8.png" alt="imagen" class="img-fluid mt-3">
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Ts = <?php echo $ts . " Tn"; ?></td>
                            <td></td>
                            <td>As = <?php echo $as . " cm²"; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row justify-content-center mt-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Peralte= <?php echo $peralte . " Tn"; ?></td>
                            <td>Diámetro= <?php echo $diameter; ?></td>
                            <td>Barras Tentativas= <?php echo $barten; ?></td>
                            <td>Barras finales= <?php echo $barfin; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row justify-content-center mt-3">
                <div class="col-12 text-center">
                    <p>As viga = <?php echo $barfin . " Ø" . $diameter; ?></p>
                    <p>Av viga = <?php echo " [ ] 6mm: 1 @ 5, 4 @ 10, Rto @ 25"; ?></p>
                </div>
            </div>
        </div>



    <?php
    }
    ?>
</body>

</html>