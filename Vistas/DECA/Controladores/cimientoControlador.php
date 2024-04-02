<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario POST y convertirlos a números enteros
    $fc = floatval($_POST["fc"]);
    $fy = floatval($_POST["fy"]);
    $columna = floatval($_POST["columna"]);
    $re = floatval($_POST["re"]);
    $yalbañeria = floatval($_POST["yalba"]);
    $ycsimple = floatval($_POST["ycsimple"]);
    $Carmado = floatval($_POST["ycarmado"]);
    $esadterr = floatval($_POST["esadterr"]);
    $pdcimt = floatval($_POST["pdcimt"]);
    $yprom = floatval($_POST["yprom"]);
    $sc = floatval($_POST["sc"]);
    $esmuro = floatval($_POST["esmuro"]);
    $h = 150; //floatval($_POST["h"]);
    $CM = floatval($_POST["CM"]);
    $CV = floatval($_POST["CV"]);
    $b = 145; //floatval($_POST["b"]);
    $hCM = 50; //floatval($_POST["hCM"]);
    $conCiclo = 0.5; //floatval($_POST["conCiclo"]);
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
        //longitud de desarrollo del acero de columna
        $ld1 = round($columna * 0.075 * $fy / pow($fc, 0.5), 2);
        $ld2 = round(0.0044 * $fy * $columna, 2);
        $r = $re;
        $H =  round(max($ld1, $ld2) + $r, 0);
        //calculo de cargas
        $calccua = 01.40 + 1.70;
        $ultCM = 1.40;
        $ultCV = 1.70;
        $cu = $CM * $ultCM + $CV * $ultCV;
        $on = round($esadterr * 10 - $pdcimt * $yprom - $sc, 2, PHP_ROUND_HALF_UP);
        $Acim = round($cu / 1000 / $on, 2, PHP_ROUND_HALF_UP);

        $B = round($Acim, 2, PHP_ROUND_HALF_UP);
        $H2 = ($B * 100) + 2;

        //verificacion
        $qu = round(($cu / 1000) / ($b / 100), 2);
        $Lv = round((($b / 100) - $esmuro) / 2 + ($esmuro / 2) / 2, 2);
        $HVer = $H2 / 100;
        $Verificacion = "";
        if ($HVer < $Lv) {
            $Verificacion = "<";
        } else {
            $Verificacion = ">";
        }
        $VerFinal = "";
        if ($HVer > $Lv) {
            $VerFinal = "Usar V Max";
        } else {
            $VerFinal = "Usar la distancia efectiva Lv-h";
        }

        $VuaTN = round($qu * $Lv * 1, 2, PHP_ROUND_HALF_UP);;
        $VuTN = round(($conCiclo * 0.53 * pow($fc, 0.5) * (1 * 100) * $H2) / 1000, 2, PHP_ROUND_HALF_UP);
        $ccmcca = "";
        if ($VuaTN < $VuTN) {
            $ccmcca = "Cumple";
        } else {
            $ccmcca = "Aumentar Altura";
        }

        $verh2 = $H2 / 2;
        $verh2Div = $verh2 / 100;

        $verfCortPunzo = "";
        if ($verh2Div > $Lv) {
            $verfCortPunzo = "No Aplica";
        } else {
            $verfCortPunzo = "Verificar por punzonamiento a H/2";
        }
    ?>
        <br>
        <h5 class="text-primary" style="font-weight: bold; text-align: left;"><u>1. DISEÑO DE CIMIENTO CORRIDO</u></h5>
        <br>
        <?php
        $acero = "";
        if ($columna == 0.60) {
            $acero = "6 mm";
        } else if ($columna == 0.80) {
            $acero = "8 mm";
        } else if ($columna == 0.95) {
            $acero = "3/8'";
        } else if ($columna == 1.20) {
            $acero = "12 mm";
        } else if ($columna == 1.27) {
            $acero = "1/2";
        } else if ($columna == 1.59) {
            $acero = "5/8";
        } else if ($columna == 1.91) {
            $acero = "3/4";
        } else if ($columna == 2.54) {
            $acero = "1";
        } else if ($columna == 3.49) {
            $acero = "1 3/8";
        }

        ?>
        <table>
            <th>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>f'c</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $fc ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">kg/cm<sup>2</sup></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>f'Y</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $fy ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">kg/cm<sup>2</sup></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>Ø Columna</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $acero ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: left; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">°</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>db</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $columna ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: left; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">Ø</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>re</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $re ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: left; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">cm</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b> γ albanileria</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $yalbañeria ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">kg/cm<sup>3</sup></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>γ C° simple</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $ycsimple ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">kg/cm<sup>3</sup></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>γ C° armado</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $Carmado ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">kg/cm<sup>3</sup></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>Esf Adm del Terr (σt)</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $esadterr ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">kg/cm<sup>2</sup></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>Prof de la Ciment (Df)</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $pdcimt ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: left; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">m</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>γ prom</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $yprom ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: left; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">Tn/m<sup>3</sup></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>s/c</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $sc ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: left; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">Tn/m</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>Esp. muro</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $esmuro ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: left; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">m</b>
                    </td>
                </tr>
            </th>
        </table>

        <!-- longitud de desarrollo -->
        <br>
        <h5 class="text-primary" style="font-weight: bold; text-align: left;"><u>2. Longitud de Desarrollo del acero de Columnas</u></h5>
        <br>
        <table style="font-weight: bold; text-align: center;">
            <th>
                <tr>
                    <td colspan=" 5" style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><img src="imgpdf/formulaLd1.png" alt="" style="width: 150px;height: 30px;"></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>ld1</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $ld1 ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">cm</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><img src="imgpdf/formulaLd2.png" alt="" style="width: 150px;height: 20px;"></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>ld2</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $ld2 ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">cm</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>r</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $r ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">cm</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>H</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $H ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">cm</b>
                    </td>
                </tr>
                <tr>

                    <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>La altura Mínima del <br> cimiento corrido es de 30 cm</b>
                    </td>

                </tr>
                <tr>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>H</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $H + 2 ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">cm</b>
                    </td>
                </tr>
            </th>
        </table>
        <br>
        <br>
        <!-- calculo de cargas -->
        <h5 class="text-primary" style="font-weight: bold; text-align: left;"><u>3. Cálculo de cargas</u></h5>
        <!-- <div style="display: block; margin: 50px 250px;">
            <img src="../vista/assets/img/f1.png" alt="imagen">
        </div> -->
        <table style="font-weight: bold; text-align: center;">
            <tr>
                <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b>Metrado de cargas por <br> el ancho de influencia transformada</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b>CARGA MUERTA</b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b>:</b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b><?php echo $CM ?></b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b>&nbsp;</b>
                </td>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b class="text-danger">kg/m</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b>CARGA VIVA</b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b>:</b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b><?php echo $CV ?></b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b>&nbsp;</b>
                </td>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b class="text-danger">kg/m</b>
                </td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b>Cálculo de Carga ultima amplificada</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b><?php echo $ultCM; ?></b>
                </td>
                <td style="text-align: left; font-weight: bold; font-size: 15px;">
                    <b>CM</b>
                </td>
                <td style="text-align: left; font-weight: bold; font-size: 15px;">
                    <b>+</b>
                </td>
                <td style="text-align: left; font-weight: bold; font-size: 15px;">
                    <b><?php echo $ultCV ?></b>
                </td>
                <td style="text-align: left; font-weight: bold; font-size: 15px;">
                    <b class="text-danger">cv</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b>Cu</b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b>: </b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b><?php echo $cu; ?></b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b></b>
                </td>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b class="text-danger">kg/m</b>
                </td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b>Cálculo del esfuerzo neto del terreno</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b>σn</b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b></b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b><?php echo $on; ?></b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b></b>
                </td>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b class="text-danger">Tn/m<sup>2</sup></b>
                </td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b>Cálculo de las dimensiones</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b>Acim</b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b>:</b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b><?php echo $Acim; ?></b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b></b>
                </td>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b class="text-danger">m<sup>2</sup></b>
                </td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b>El largo se asume de 1 m</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b>B</b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b></b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b><?php echo $B; ?></b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b></b>
                </td>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b class="text-danger">Tn/m<sup>2</sup></b>
                </td>
            </tr>
            <tr>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b>B</b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b></b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b><?php echo $b; ?></b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b></b>
                </td>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b class="text-danger">cm</b>
                </td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b>Por Seguridad H > B</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b>H</b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b></b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b><?php echo $H2; ?></b>
                </td>
                <td style="text-align: center; font-weight: bold; font-size: 15px;">
                    <b></b>
                </td>
                <td style="text-align: right; font-weight: bold; font-size: 15px;">
                    <b class="text-danger">cm</b>
                </td>
            </tr>


            <!-- <tr>
                <td colspan="3">Metrado de cargas por el ancho de influencia transformada</td>
            </tr>
            <tr>
                <td>CARGA MUERTA:</td>
                <td><?php echo $CM; ?></td>
                <td>kg/m</td>
            </tr>
            <tr>
                <td>CARGA VIVA:</td>
                <td><?php echo $CV; ?></td>
                <td>kg/m</td>
            </tr>
            <tr>
                <td colspan="3">Cálculo de Carga ultima amplificada</td>
            </tr>
            <tr>
                <td><?php echo $ultCM; ?> CM</td>
                <td>+</td>
                <td><?php echo $ultCV; ?> CV</td>
            </tr>
            <tr>
                <td>Cu = </td>
                <td><?php echo $cu; ?></td>
                <td>kg/m</td>
            </tr>
            <tr>
                <td colspan="3">Cálculo del esfuerzo neto del terreno</td>
            </tr>
            <tr>
                <td>σn:</td>
                <td>CV =<?php echo $on; ?></td>
                <td>Tn/m<sup>2</sup></td>
            </tr>
            <tr>
                <td colspan="3">Cálculo de las dimensiones</td>
            </tr>
            <tr>
                <td>Acim:</td>
                <td><?php echo $Acim; ?></td>
                <td>m<sup>2</sup></td>
            </tr>
            <tr>
                <td colspan="3">El largo se asume de 1 m:</td>
            </tr>
            <tr>
                <td>B:</td>
                <td><?php echo $B; ?></td>
                <td>m</td>
            </tr>
            <tr>
                <td>B:</td>
                <td><?php echo $b; ?></td>
                <td>cm</td>
            </tr>
            <tr>
                <td colspan="3">Por Seguridad H > B:</td>
            </tr>
            <tr>
                <td>H:</td>
                <td><?php echo $H2; ?></td>
                <td>cm</td>
            </tr> -->
        </table> <br> <br>

        <!-- verificacion -->
        <h5 class="text-primary" style="font-weight: bold; text-align: left;"><u>4. Verificacion</u></h5>
        <!-- <div style="display: block; margin: 50px 150px;">
            <img src="../vista/assets/img/ve.png" alt="imagen">
        </div> -->
        <table class="text-center">
            <th>
                <tr>
                    <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>Cálculo de reacción ultima del suelo:</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b>qu</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $qu ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">tn/m<sup>2</sup></b>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>Verificacion por corte a flexion <br>(Concreo ciclopeo) </b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b>ø</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $conCiclo ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b>Lv</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $Lv ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>&nbsp;</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">m</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b>H</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>Lv</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b><?php echo $HVer; ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $Verificacion; ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $Lv; ?></b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b class="text-danger"><?php echo $VerFinal; ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>Cálculo de cortante maxima <br>Cálculo de cortante admisible</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b>Vua (TN)</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $VuaTN; ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>
                            < </b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>Vu (TN)</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b><?php echo $VuTN; ?></b>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b class="text-danger"><?php echo $ccmcca; ?></b>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>Verificacion a corte por punzonamiento</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b>H/2</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $verh2; ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">cm</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b>H/2</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>
                            >
                        </b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>Lv</b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b><?php echo $verh2Div; ?></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>
                            >
                        </b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b><?php echo $Lv; ?></b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b class="text-danger"><?php echo $verfCortPunzo; ?></b>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>Dimensiones Finales</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b>B</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>
                            <?php echo $H2 ?>
                        </b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">cm</b>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b>H</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>:</b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>
                            <?php echo $H2 + 5 ?>
                        </b>
                    </td>
                    <td style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b></b>
                    </td>
                    <td style="text-align: right; font-weight: bold; font-size: 15px;">
                        <b class="text-danger">cm</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" style="text-align: center; font-weight: bold; font-size: 15px;">
                        <b>Largo = Largo del muro</b>
                    </td>
                </tr>
            </th>
            <!-- <th>
                <tr>
                    <td colspan="3">Cálculo de reacción ultima del suelo:</td>
                </tr>
                <tr>
                    <td>qu</td>
                    <td><?php echo $qu; ?></td>
                    <td>tn/m<sup>2</sup></td>
                </tr>
                <tr>
                    <td colspan="3">Verificacion por corte a flexion</td>
                </tr>
                <tr>
                    <td colspan="3">(Concreo ciclopeo)</td>
                </tr>
                <tr>
                    <td>ø</td>
                    <td><?php echo $conCiclo; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Lv</td>
                    <td><?php echo $Lv; ?></td>
                    <td>m</td>
                </tr>
                <tr>
                    <td>H</td>
                    <td></td>
                    <td>Lv</td>
                </tr>
                <tr>
                    <td><?php echo $HVer; ?></td>
                    <td><?php echo $Verificacion; ?></td>
                    <td><?php echo $Lv; ?></td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo $VerFinal; ?></td>
                </tr>
                <tr>
                    <td>Cálculo de cortante maxima</td>
                    <td></td>
                    <td>Cálculo de cortante admisible</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Vua (TN) = <?php echo $VuaTN; ?></td>
                    <td>
                        < </td>
                    <td>Vu (TN) = <?php echo $VuTN; ?></td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo $ccmcca; ?></td>
                </tr>
                <tr>
                    <td>Verificacion a corte por punzonamiento</td>
                </tr>
                <tr>
                    <td>H/2</td>
                    <td><?php echo $verh2; ?></td>
                    <td>cm</td>
                </tr>
                <tr>
                    <td>H/2</td>
                    <td>></td>
                    <td>Lv</td>
                </tr>
                <tr>
                    <td><?php echo $verh2Div; ?></td>
                    <td>></td>
                    <td><?php echo $Lv; ?></td>
                </tr>
                <tr>
                    <td colspan="3"><?php echo $verfCortPunzo; ?></td>
                </tr>
                <tr>
                    <td>Dimensiones Finales</td>
                </tr>
                <tr>
                    <td>B</td>
                    <td><?php echo $b ?></td>
                    <td>cm</td>
                </tr>
                <tr>
                    <td>H</td>
                    <td><?php echo $H2 ?></td>
                    <td>cm</td>
                </tr>
                <tr>
                    <td>Largo</td>
                    <td></td>
                    <td>Largo del muro</td>
                </tr>
            </th> -->
        </table> <br> <br>


        <!-- Fifth result -->

        <!-- <h5 style="font-weight: bold; text-align: center;"><u>SUELO NORMAL</u></h5> -->
        <!-- <div style="display: block; margin: 30px 300px;">
            <img src="../vista/assets/img/vumu.png" alt="imagen">
        </div> -->
        <!-- <table post="1">
            <div class="tabla-container">
                <tr>
                    <td>Vu =</td>
                    <td style="padding: 20px;">
                    </td>
                    <td>Mu
                        = ></td>
                </tr>
            </div>
        </table> <br> <br> -->


        <!-- sixth result -->

        <!-- <h5 style="font-weight: bold; text-align: center;"><u>SUELO BLANDO</u></h5> -->
        <!-- <div style="display: block; margin: 50px 250px;">
            <img src="../vista/assets/img/vuvm.png" alt="imagen">
        </div> -->
      


    <?php
    }
    ?>
</body>

</html>