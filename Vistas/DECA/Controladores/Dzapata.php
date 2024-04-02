<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fc = $_POST["fc"];
    $fy = $_POST["fy"];
    $ys = $_POST["ys"];
    $df = $_POST["df"];
    $t = $_POST["t"];
    $b = $_POST["b"];
    $l = $_POST["l"];
    $B = $_POST["DZY"];
    $cps = $_POST["cps"];
    $columna = $_POST["Columna"];
    $Varillax = $_POST["VarillaX"];
    $Varillay = $_POST["VarillaY"];
    $espaciamientox = $_POST["espaciamientox"];
    $espaciamientoy = $_POST["espaciamientoy"];
    $CargaCondicionServicio = json_decode($_POST["dataFromHandsontable"], true);
    $CargaCondicionServicios = array();
    $p = array();
    $Mx = array();
    $My = array();

    for ($i = 0; $i < count($CargaCondicionServicio); $i++) {
        $p[] = $CargaCondicionServicio[$i][1];
    }
    for ($i = 0; $i < count($CargaCondicionServicio); $i++) {
        $Mx[] = $CargaCondicionServicio[$i][2];
    }
    for ($i = 0; $i < count($CargaCondicionServicio); $i++) {
        $My[] = $CargaCondicionServicio[$i][3];
    }
    //variables generales
    $d = 50;
    $H = ($d + 10) / 100;
    $AZapata = $l * $B;
    $PCime = round(2.4 * $l * $B * $H, 2, PHP_ROUND_HALF_UP);
    $Psu = round(+$ys * $AZapata * ($df - $H), 2, PHP_ROUND_HALF_UP);
    $cPortante = round($cps * 10, 2, PHP_ROUND_HALF_UP);
    $Eneto = round($cPortante - $ys * $df - 0.5, 2, PHP_ROUND_HALF_UP);
    $EsfuerzoNeto = round($cPortante * 0.8, 2, PHP_ROUND_HALF_UP);
    $LoT = sqrt($EsfuerzoNeto) + ($t - $b) / 2;
    $peralteEfectivo = $H - 0.10;
    $lvx = ($l - $t) / 2;
    $lvy = ($B - $b) / 2;

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <!-- combinaciones de Carga Ultimas -->
    <h3><u><strong>1.0 COMBINACIONES DE CARGA ÚLTIMAS :</strong></u></h3>

    <table class="table text-center" id="CombiCar">
        <thead>
            <tr>
                <th scope="col" colspan="4">COMBINACIONES DE CARGA ÚLTIMAS</th>
            </tr>
            <tr>
                <th scope="col">Comb. cargas de Ultimas</th>
                <th scope="col">P (Tonf)</th>
                <th scope="col">Mx (Tonf-m)</th>
                <th scope="col">My (Tonf-m)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="col">1.4CM+1.7CV</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $P = round((1.4 * $p[$i] + 1.7 * $p[$i + 1]), 2, PHP_ROUND_HALF_UP);
                    $Ps[] = $P;

                    $MX = round((1.4 * $Mx[$i] + 1.7 * $Mx[$i + 1]), 2, PHP_ROUND_HALF_UP);
                    $MXs[] = $MX;

                    $MY = round((1.4 * $My[$i] + 1.7 * $My[$i + 1]), 2, PHP_ROUND_HALF_UP);
                    $MYs[] = $MY;
                }
                if (isset($Ps)) {
                    foreach ($Ps as $P) {
                        echo "<td>$P</td>";
                    }
                }
                if (isset($MXs)) {
                    foreach ($MXs as $MX) {
                        echo "<td>$MX</td>";
                    }
                }
                if (isset($MYs)) {
                    foreach ($MYs as $MY) {
                        echo "<td>$MY</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">1.25(CM+CV)+Sx</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $Pc = round((1.25 * ($p[$i] + $p[$i + 1]) + $p[$i + 2]), 2, PHP_ROUND_HALF_UP);
                    $Pcs[] = $Pc;

                    $MXMsx = round((1.25 * ($Mx[$i] + $Mx[$i + 1]) + $Mx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                    $MXMsxs[] = $MXMsx;

                    $MYMsx = round((1.25 * ($My[$i] + $My[$i + 1]) + $My[$i + 2]), 2, PHP_ROUND_HALF_UP);
                    $MYMsxs[] = $MYMsx;
                }
                if (isset($Pcs)) {
                    foreach ($Pcs as $Pc) {
                        echo "<td>$Pc</td>";
                    }
                }
                if (isset($MXMsxs)) {
                    foreach ($MXMsxs as $MXMsx) {
                        echo "<td>$MXMsx</td>";
                    }
                }
                if (isset($MYMsxs)) {
                    foreach ($MYMsxs as $MYMsx) {
                        echo "<td>$MYMsx</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">1.25(CM+CV)-Sx</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $Pcn = round((1.25 * ($p[$i] + $p[$i + 1]) - $p[$i + 2]), 2, PHP_ROUND_HALF_UP);
                    $Pcns[] = $Pcn;

                    $MXnsx = round((1.25 * ($Mx[$i] + $Mx[$i + 1]) - $Mx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                    $MXnsxs[] = $MXnsx;

                    $MYnsx = round((1.25 * ($My[$i] + $My[$i + 1]) - $My[$i + 2]), 2, PHP_ROUND_HALF_UP);
                    $MYnsxs[] = $MYnsx;
                }
                if (isset($Pcns)) {
                    foreach ($Pcns as $Pcn) {
                        echo "<td>$Pcn</td>";
                    }
                }
                if (isset($MXnsxs)) {
                    foreach ($MXnsxs as $MXnsx) {
                        echo "<td>$MXnsx</td>";
                    }
                }
                if (isset($MYnsxs)) {
                    foreach ($MYnsxs as $MYnsx) {
                        echo "<td>$MYnsx</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">1.25(CM+CV)+Sy</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $PSy = round((1.25 * ($p[$i] + $p[$i + 1]) + $p[$i + 3]), 2, PHP_ROUND_HALF_UP);
                    $PSys[] = $PSy;

                    $MXSy = round((1.25 * ($Mx[$i] + $Mx[$i + 1]) + $Mx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                    $MXSys[] = $MXSy;

                    $MYsy = round((1.25 * ($My[$i] + $My[$i + 1]) + $My[$i + 3]), 2, PHP_ROUND_HALF_UP);
                    $MYsys[] = $MYsy;
                }
                if (isset($PSys)) {
                    foreach ($PSys as $PSy) {
                        echo "<td>$PSy</td>";
                    }
                }
                if (isset($MXSys)) {
                    foreach ($MXSys as $MXSy) {
                        echo "<td>$MXSy</td>";
                    }
                }
                if (isset($MYsys)) {
                    foreach ($MYsys as $MYsy) {
                        echo "<td>$MYsy</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">1.25(CM+CV)-Sy</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $PSny = round((1.25 * ($p[$i] + $p[$i + 1]) - $p[$i + 3]), 2, PHP_ROUND_HALF_UP);
                    $PSnys[] = $PSny;

                    $MXnSy = round((1.25 * ($Mx[$i] + $Mx[$i + 1]) - $Mx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                    $MXnSys[] = $MXnSy;

                    $MYnsy = round((1.25 * ($My[$i] + $My[$i + 1]) - $My[$i + 3]), 2, PHP_ROUND_HALF_UP);
                    $MYnsys[] = $MYnsy;
                }
                if (isset($PSnys)) {
                    foreach ($PSnys as $PSny) {
                        echo "<td>$PSny</td>";
                    }
                }
                if (isset($MXnSys)) {
                    foreach ($MXnSys as $MXnSy) {
                        echo "<td>$MXnSy</td>";
                    }
                }
                if (isset($MYnsys)) {
                    foreach ($MYnsys as $MYnsy) {
                        echo "<td>$MYnsy</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">0.9CM+Sx</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $Pms = round((0.9 * $p[$i] + $p[$i + 2]), 2, PHP_ROUND_HALF_UP);
                    $Pmss[] = $Pms;

                    $MxCmSx = round((0.9 * $Mx[$i] + $Mx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                    $MxCmSxs[] = $MxCmSx;

                    $MyCmSx = round((0.9 * $My[$i] + $My[$i + 2]), 2, PHP_ROUND_HALF_UP);
                    $MyCmSxs[] = $MyCmSx;
                }
                if (isset($Pmss)) {
                    foreach ($Pmss as $Pms) {
                        echo "<td>$Pms</td>";
                    }
                }
                if (isset($MxCmSxs)) {
                    foreach ($MxCmSxs as $MxCmSx) {
                        echo "<td>$MxCmSx</td>";
                    }
                }
                if (isset($MyCmSxs)) {
                    foreach ($MyCmSxs as $MyCmSx) {
                        echo "<td>$MyCmSx</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">0.9CM-Sx</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $Pmns = round((0.9 * $p[$i] - $p[$i + 2]), 2, PHP_ROUND_HALF_UP);
                    $Pmnss[] = $Pmns;

                    $MxCmSxn = round((0.9 * $Mx[$i] - $Mx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                    $MxCmSxns[] = $MxCmSxn;

                    $MyCmSxn = round((0.9 * $My[$i] - $My[$i + 2]), 2, PHP_ROUND_HALF_UP);
                    $MyCmSxns[] = $MyCmSxn;
                }
                if (isset($Pmnss)) {
                    foreach ($Pmnss as $Pmns) {
                        echo "<td>$Pmns</td>";
                    }
                }
                if (isset($MxCmSxns)) {
                    foreach ($MxCmSxns as $MxCmSxn) {
                        echo "<td>$MxCmSxn</td>";
                    }
                }
                if (isset($MyCmSxns)) {
                    foreach ($MyCmSxns as $MyCmSxn) {
                        echo "<td>$MyCmSxn</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th>0.9CM+Sy</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $Pmys = round((0.9 * $p[$i] + $p[$i + 3]), 2, PHP_ROUND_HALF_UP);
                    $Pmyss[] = $Pmys;

                    $MxCmSxy = round((0.9 * $Mx[$i] + $Mx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                    $MxCmSxys[] = $MxCmSxy;

                    $MyCmSxy = round((0.9 * $My[$i] + $My[$i + 3]), 2, PHP_ROUND_HALF_UP);
                    $MyCmSxys[] = $MyCmSxy;
                }
                if (isset($Pmyss)) {
                    foreach ($Pmyss as $Pmys) {
                        echo "<td>$Pmys</td>";
                    }
                }
                if (isset($MxCmSxys)) {
                    foreach ($MxCmSxys as $MxCmSxy) {
                        echo "<td>$MxCmSxy</td>";
                    }
                }
                if (isset($MyCmSxys)) {
                    foreach ($MyCmSxys as $MyCmSxy) {
                        echo "<td>$MyCmSxy</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th>0.9CM-Sy</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $Pmnys = round((0.9 * $p[$i] - $p[$i + 3]), 2, PHP_ROUND_HALF_UP);
                    $Pmnyss[] = $Pmnys;

                    $MxCmSxny = round((0.9 * $Mx[$i] - $Mx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                    $MxCmSxnys[] = $MxCmSxny;

                    $MyCmSxny = round((0.9 * $My[$i] - $My[$i + 3]), 2, PHP_ROUND_HALF_UP);
                    $MyCmSxnys[] = $MyCmSxny;
                }
                if (isset($Pmnyss)) {
                    foreach ($Pmnyss as $Pmnys) {
                        echo "<td>$Pmnys</td>";
                    }
                }
                if (isset($MxCmSxnys)) {
                    foreach ($MxCmSxnys as $MxCmSxny) {
                        echo "<td>$MxCmSxny</td>";
                    }
                }
                if (isset($MyCmSxnys)) {
                    foreach ($MyCmSxnys as $MyCmSxny) {
                        echo "<td>$MyCmSxny</td>";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>

    <h3><u><strong>1.2 COMBINACIONES DE CARGA DE SERVICIO :</strong></u></h3>

    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col" colspan="4">COMBINACIONES DE CARGA DE SERVICIO</th>
            </tr>
            <tr>
                <th scope="col">Comb. cargas de servicio</th>
                <th scope="col">P (Tonf)</th>
                <th scope="col">Mx (Tonf-m)</th>
                <th scope="col">My (Tonf-m)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="col">CM+CV</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $pcc = round(($p[$i] + $p[$i + 1]), 2, PHP_ROUND_HALF_UP);
                    $pccs[] = $pcc;

                    $MXcc = round(($Mx[$i] + $Mx[$i + 1]), 2, PHP_ROUND_HALF_UP);
                    $MXccs[] = $MXcc;

                    $MYcc = round(($My[$i] + $My[$i + 1]), 2, PHP_ROUND_HALF_UP);
                    $MYccs[] = $MYcc;
                }
                if (isset($pccs)) {
                    foreach ($pccs as $pcc) {
                        echo "<td>$pcc</td>";
                    }
                }
                if (isset($MXccs)) {
                    foreach ($MXccs as $MXcc) {
                        echo "<td>$MXcc</td>";
                    }
                }
                if (isset($MYccs)) {
                    foreach ($MYccs as $MYcc) {
                        echo "<td>$MYcc</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">CM+CV + 0.8Sx</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $Pcps = round((($p[$i] + $p[$i + 1]) + (0.8 * $p[$i + 2])), 2, PHP_ROUND_HALF_UP);
                    $Pcpss[] = $Pcps;

                    $MXps = round((($Mx[$i] + $Mx[$i + 1]) + (0.8 * $Mx[$i + 2])), 2, PHP_ROUND_HALF_UP);
                    $MXpss[] = $MXps;

                    $MYps = round((($My[$i] + $My[$i + 1]) + (0.8 * $My[$i + 2])), 2, PHP_ROUND_HALF_UP);
                    $MYpss[] = $MYps;
                }
                if (isset($Pcpss)) {
                    foreach ($Pcpss as $Pcps) {
                        echo "<td>$Pcps</td>";
                    }
                }
                if (isset($MXpss)) {
                    foreach ($MXpss as $MXps) {
                        echo "<td>$MXps</td>";
                    }
                }
                if (isset($MYpss)) {
                    foreach ($MYpss as $MYps) {
                        echo "<td>$MYps</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">CM+CV - 0.8Sx</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $Pcns = round((($p[$i] + $p[$i + 1]) - (0.8 * $p[$i + 2])), 2, PHP_ROUND_HALF_UP);
                    $Pcnss[] = $Pcns;

                    $MXns = round((($Mx[$i] + $Mx[$i + 1]) - (0.8 * $Mx[$i + 2])), 2, PHP_ROUND_HALF_UP);
                    $MXnss[] = $MXns;

                    $MYns = round((($My[$i] + $My[$i + 1]) - (0.8 * $My[$i + 2])), 2, PHP_ROUND_HALF_UP);
                    $MYnss[] = $MYns;
                }
                if (isset($Pcnss)) {
                    foreach ($Pcnss as $Pcns) {
                        echo "<td>$Pcns</td>";
                    }
                }
                if (isset($MXnss)) {
                    foreach ($MXnss as $MXns) {
                        echo "<td>$MXns</td>";
                    }
                }
                if (isset($MYnss)) {
                    foreach ($MYnss as $MYns) {
                        echo "<td>$MYns</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">CM+CV + 0.8Sy</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $Pcpys = round((($p[$i] + $p[$i + 1]) + (0.8 * $p[$i + 3])), 2, PHP_ROUND_HALF_UP);
                    $Pcpyss[] = $Pcpys;

                    $MXpys = round((($Mx[$i] + $Mx[$i + 1]) + (0.8 * $Mx[$i + 3])), 2, PHP_ROUND_HALF_UP);
                    $MXpyss[] = $MXpys;

                    $MYpys = round((($My[$i] + $My[$i + 1]) + (0.8 * $My[$i + 3])), 2, PHP_ROUND_HALF_UP);
                    $MYpyss[] = $MYpys;
                }
                if (isset($Pcpyss)) {
                    foreach ($Pcpyss as $Pcpys) {
                        echo "<td>$Pcpys</td>";
                    }
                }
                if (isset($MXpyss)) {
                    foreach ($MXpyss as $MXpys) {
                        echo "<td>$MXpys</td>";
                    }
                }
                if (isset($MYpyss)) {
                    foreach ($MYpyss as $MYpys) {
                        echo "<td>$MYpys</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">CM+CV - 0.8Sy</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $Pcnys = round((($p[$i] + $p[$i + 1]) - (0.8 * $p[$i + 3])), 2, PHP_ROUND_HALF_UP);
                    $Pcnyss[] = $Pcnys;

                    $MXnys = round((($Mx[$i] + $Mx[$i + 1]) - (0.8 * $Mx[$i + 3])), 2, PHP_ROUND_HALF_UP);
                    $MXnyss[] = $MXnys;

                    $MYnys = round((($My[$i] + $My[$i + 1]) - (0.8 * $My[$i + 3])), 2, PHP_ROUND_HALF_UP);
                    $MYnyss[] = $MYnys;
                }
                if (isset($Pcnyss)) {
                    foreach ($Pcnyss as $Pcnys) {
                        echo "<td>$Pcnys</td>";
                    }
                }
                if (isset($MXnyss)) {
                    foreach ($MXnyss as $MXnys) {
                        echo "<td>$MXnys</td>";
                    }
                }
                if (isset($MYnyss)) {
                    foreach ($MYnyss as $MYnys) {
                        echo "<td>$MYnys</td>";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>

    <hr class="bg-info">

    <!-- Presiones en el suelo en condiciones de servicio -->
    <h3><u><strong>2.0 PRESIONES EN EL SUELO EN CONDICIONES DE SERVICIO :</strong></u></h3>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col" colspan="7">PRESIONES EN EL SUELO EN CONDICIONES DE SERVICIO</th>
            </tr>
            <tr>
                <th scope="col">Comb. cargas de servicio</th>
                <th scope="col">σ p (tonf/m<sup>2</sup>)</th>
                <th scope="col">σ Mx (tonf/m<sup>2</sup>)</th>
                <th scope="col">σ My (tonf/m<sup>2</sup>)</th>
                <th scope="col">σ tot. (tonf/m<sup>2</sup>)</th>
                <th scope="col">σ s (tonf/m<sup>2</sup>)</th>
                <th scope="col">Condicion</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="col">CM+CV</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $CmCv = round(($pcc / $AZapata), 2, PHP_ROUND_HALF_UP);
                    $CmCvs[] = $CmCv;

                    $CmCvmx = round(6 * abs($MXcc) / ($l * pow($B, 2)), 3, PHP_ROUND_HALF_UP);
                    $CmCvmxs[] = $CmCvmx;

                    $CmCvmy = round(6 * abs($MYcc) / (pow($l, 2) * $B), 2, PHP_ROUND_HALF_UP);
                    $CmCvmys[] = $CmCvmy;

                    $tot = $CmCv + $CmCvmx + $CmCvmy;
                    $tots[] = $tot;

                    $Condicion = "";
                    if ($tot < $cPortante) {
                        $Condicion = "Cumple";
                    } else {
                        $Condicion = "No Cumple";
                    }
                    $Condicions[] = $Condicion;
                }
                if (isset($CmCvs)) {
                    foreach ($CmCvs as $CmCv) {
                        echo "<td>$CmCv</td>";
                    }
                }
                if (isset($CmCvmxs)) {
                    foreach ($CmCvmxs as $CmCvmx) {
                        echo "<td>$CmCvmx</td>";
                    }
                }
                if (isset($CmCvmys)) {
                    foreach ($CmCvmys as $CmCvmy) {
                        echo "<td>$CmCvmy</td>";
                    }
                }
                if (isset($tots)) {
                    foreach ($tots as $tot) {
                        echo "<td>$tot</td>";
                    }
                }
                echo "<td>$cPortante</td>";
                if (isset($Condicions)) {
                    foreach ($Condicions as $Condicion) {
                        echo "<td>$Condicion</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">CM+CV + 0.8Sx</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $CmCvsx = round(($Pcps / $AZapata), 2, PHP_ROUND_HALF_UP);
                    $CmCvsxs[] = $CmCvsx;

                    $CmCvsxmx = round(6 * ABS($MXps) / ($l * pow($B, 2)), 2, PHP_ROUND_HALF_UP);
                    $CmCvsxmxs[] = $CmCvsxmx;

                    $CmCvsxmy = round(6 * ABS($MYps) / (pow($l, 2) * $B), 2, PHP_ROUND_HALF_UP);
                    $CmCvsxmys[] = $CmCvsxmy;

                    $totsx = $CmCvsx + $CmCvsxmx + $CmCvsxmy;
                    $totsxs[] = $totsx;
                    $CPCC = $cPortante * 1.3;

                    $Condicionsx = "";
                    if ($totsx < $CPCC) {
                        $Condicionsx = "Cumple";
                    } else {
                        $Condicionsx = "No Cumple";
                    }
                    $Condicionsxs[] = $Condicionsx;
                }
                if (isset($CmCvsxs)) {
                    foreach ($CmCvsxs as $CmCvsx) {
                        echo "<td>$CmCvsx</td>";
                    }
                }
                if (isset($CmCvsxmxs)) {
                    foreach ($CmCvsxmxs as $CmCvsxmx) {
                        echo "<td>$CmCvsxmx</td>";
                    }
                }
                if (isset($CmCvsxmys)) {
                    foreach ($CmCvsxmys as $CmCvsxmy) {
                        echo "<td>$CmCvsxmy</td>";
                    }
                }
                if (isset($totsxs)) {
                    foreach ($totsxs as $totsx) {
                        echo "<td>$totsx</td>";
                    }
                }
                echo "<td>$CPCC</td>";
                if (isset($Condicions)) {
                    foreach ($Condicions as $Condicion) {
                        echo "<td>$Condicion</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">CM+CV - 0.8Sx</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {

                    $CmCvnsx = round(($Pcns / $AZapata), 2, PHP_ROUND_HALF_UP);
                    $CmCvnsxs[] = $CmCvnsx;

                    $CmCvnsxmx = round(6 * ABS($MXns) / ($l * pow($B, 2)), 2, PHP_ROUND_HALF_UP);
                    $CmCvnsxmxs[] = $CmCvnsxmx;

                    $CmCvnsxmy = round(6 * ABS($MYns) / (pow($l, 2) * $B), 2, PHP_ROUND_HALF_UP);
                    $CmCvnsxmys[] = $CmCvnsxmy;

                    $totnsx = $CmCvsx + $CmCvsxmx + $CmCvsxmy;
                    $totnsxs[] = $totnsx;
                    $CPCCn = $cPortante * 1.3;

                    $Condicionnsx = "";
                    if ($totnsx < $CPCCn) {
                        $Condicionnsx = "Cumple";
                    } else {
                        $Condicionnsx = "No Cumple";
                    }
                    $Condicionnsxs[] = $Condicionnsx;
                }
                if (isset($CmCvnsxs)) {
                    foreach ($CmCvnsxs as $CmCvnsx) {
                        echo "<td>$CmCvnsx</td>";
                    }
                }
                if (isset($CmCvnsxmxs)) {
                    foreach ($CmCvnsxmxs as $CmCvnsxmx) {
                        echo "<td>$CmCvnsxmx</td>";
                    }
                }
                if (isset($CmCvnsxmys)) {
                    foreach ($CmCvnsxmys as $CmCvnsxmy) {
                        echo "<td>$CmCvnsxmy</td>";
                    }
                }
                if (isset($totnsxs)) {
                    foreach ($totnsxs as $totnsx) {
                        echo "<td>$totnsx</td>";
                    }
                }
                echo "<td>$CPCCn</td>";

                if (isset($Condicionnsxs)) {
                    foreach ($Condicionnsxs as $Condicionnsx) {
                        echo "<td>$Condicionnsx</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">CM+CV + 0.8Sy</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $CmCvsy = round(($Pcpys / $AZapata), 2, PHP_ROUND_HALF_UP);
                    $CmCvsys[] = $CmCvsy;

                    $CmCvsymx = round(6 * ABS($MXpys) / ($l * pow($B, 2)), 2, PHP_ROUND_HALF_UP);
                    $CmCvsymxs[] = $CmCvsymx;

                    $CmCvsymy = round(6 * ABS($MYpys) / (pow($l, 2) * $B), 2, PHP_ROUND_HALF_UP);
                    $CmCvsymys[] = $CmCvsymy;

                    $totsy = $CmCvsy + $CmCvsymx + $CmCvsymy;
                    $totsys[] = $totsy;
                    $CPCCy = $cPortante * 1.3;

                    $Condicionsy = "";
                    if ($totsy < $CPCCy) {
                        $Condicionsy = "Cumple";
                    } else {
                        $Condicionsy = "No Cumple";
                    }
                    $Condicionsys[] = $Condicionsy;
                }
                if (isset($CmCvsys)) {
                    foreach ($CmCvsys as $CmCvsy) {
                        echo "<td>$CmCvsy</td>";
                    }
                }
                if (isset($CmCvsymxs)) {
                    foreach ($CmCvsymxs as $CmCvsymx) {
                        echo "<td>$CmCvsymx</td>";
                    }
                }
                if (isset($CmCvsymys)) {
                    foreach ($CmCvsymys as $CmCvsymy) {
                        echo "<td>$CmCvsymy</td>";
                    }
                }
                if (isset($totsys)) {
                    foreach ($totsys as $totsy) {
                        echo "<td>$totsy</td>";
                    }
                }
                echo "<td>$CPCCy</td>";

                if (isset($Condicionsys)) {
                    foreach ($Condicionsys as $Condicionsy) {
                        echo "<td>$Condicionsy</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">CM+CV - 0.8Sy</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $CmCvnsy = round(($Pcnys / $AZapata), 2, PHP_ROUND_HALF_UP);
                    $CmCvnsys[] = $CmCvnsy;

                    $CmCvsnymx = round(6 * ABS($MXnys) / ($l * pow($B, 2)), 2, PHP_ROUND_HALF_UP);
                    $CmCvsnymxs[] = $CmCvsnymx;

                    $CmCvsnymy = round(6 * ABS($MYnys) / (pow($l, 2) * $B), 2, PHP_ROUND_HALF_UP);
                    $CmCvsnymys[] = $CmCvsnymy;

                    $totsny = $CmCvnsy + $CmCvsnymx + $CmCvsnymy;
                    $totsnys[] = $totsny;
                    $CPCCny = $cPortante * 1.3;

                    $Condicionsny = "";
                    if ($totsny < $CPCCny) {
                        $Condicionsny = "Cumple";
                    } else {
                        $Condicionsny = "No Cumple";
                    }
                    $Condicionsnys[] = $Condicionsny;
                }
                if (isset($CmCvnsys)) {
                    foreach ($CmCvnsys as $CmCvnsy) {
                        echo "<td>$CmCvnsy</td>";
                    }
                }
                if (isset($CmCvsnymxs)) {
                    foreach ($CmCvsnymxs as $CmCvsnymx) {
                        echo "<td>$CmCvsnymx</td>";
                    }
                }
                if (isset($CmCvsnymys)) {
                    foreach ($CmCvsnymys as $CmCvsnymy) {
                        echo "<td>$CmCvsnymy</td>";
                    }
                }
                if (isset($totsnys)) {
                    foreach ($totsnys as $totsny) {
                        echo "<td>$totsny</td>";
                    }
                }
                echo "<td>$CPCCny</td>";

                if (isset($Condicionsnys)) {
                    foreach ($Condicionsnys as $Condicionsny) {
                        echo "<td>$Condicionsny</td>";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>

    <h3><u><strong>2.1 PRESIONES ÚLTIMOS DE DISEÑO :</strong></u></h3>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col" colspan="5">PRESIONES ÚLTIMOS DE DISEÑO</th>
            </tr>
            <tr>
                <th scope="col">Comb. cargas de servicio</th>
                <th scope="col">σ p(tonf/m<sup>2</sup>)</th>
                <th scope="col">σ Mx (tonf/m<sup>2</sup>)</th>
                <th scope="col">σ My (tonf/m<sup>2</sup>)</th>
                <th scope="col">σ tot. (tonf/m<sup>2</sup>)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="col">1.4CM+1.7CV</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $cmv = round(($P / $AZapata), 2, PHP_ROUND_HALF_UP);
                    $cmvs[] = $cmv;

                    $Cmvmx = round(6 * ABS($MX) /($l *  pow($B, 2)), 2, PHP_ROUND_HALF_UP);
                    $Cmvmxs[] = $Cmvmx;

                    $Cmvmy = round(6 * ABS($MY) / (pow($l, 2) * $B), 2, PHP_ROUND_HALF_UP);
                    $Cmvmys[] = $Cmvmy;

                    $totPD = $cmv + $Cmvmx + $Cmvmy;
                    $totPDs[] = $totPD;
                }
                if (isset($cmvs)) {
                    foreach ($cmvs as $cmv) {
                        echo "<td>$cmv</td>";
                    }
                }
                if (isset($Cmvmxs)) {
                    foreach ($Cmvmxs as $Cmvmx) {
                        echo "<td>$Cmvmx</td>";
                    }
                }
                if (isset($Cmvmys)) {
                    foreach ($Cmvmys as $Cmvmy) {
                        echo "<td>$Cmvmy</td>";
                    }
                }
                if (isset($totPDs)) {
                    foreach ($totPDs as $totPD) {
                        echo "<td>$totPD</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">1.25(CM+CV)+Sx</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $Cmvsx = round(($Pc / $AZapata), 2, PHP_ROUND_HALF_UP);
                    $Cmvsxs[] = $Cmvsx;

                    $Cmvsxmx = round(6 * ABS($MXMsx) / ($l * pow($B, 2)), 2, PHP_ROUND_HALF_UP);
                    $Cmvsxmxs[] = $Cmvsxmx;

                    $Cmvsxmy = round(6 * ABS($MYMsx) / (pow($l, 2) * $B), 2, PHP_ROUND_HALF_UP);
                    $Cmvsxmys[] = $Cmvsxmy;

                    $totcv = $Cmvsx + $Cmvsxmx + $Cmvsxmy;
                    $totcvs[] = $totcv;
                }
                if (isset($Cmvsxs)) {
                    foreach ($Cmvsxs as $Cmvsx) {
                        echo "<td>$Cmvsx</td>";
                    }
                }
                if (isset($Cmvsxmxs)) {
                    foreach ($Cmvsxmxs as $Cmvsxmx) {
                        echo "<td>$Cmvsxmx</td>";
                    }
                }
                if (isset($Cmvsxmys)) {
                    foreach ($Cmvsxmys as $Cmvsxmy) {
                        echo "<td>$Cmvsxmy</td>";
                    }
                }
                if (isset($totcvs)) {
                    foreach ($totcvs as $totcv) {
                        echo "<td>$totcv</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">1.25(CM+CV)-Sx</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {

                    $Cmvnsx = round(($Pcn / $AZapata), 2, PHP_ROUND_HALF_UP);
                    $Cmvnsxs[] = $Cmvnsx;

                    $Cmvnsxmx = round(6 * ABS($MXnsx) / ($l * pow($B, 2)), 2, PHP_ROUND_HALF_UP);
                    $Cmvnsxmxs[] = $Cmvnsxmx;

                    $Cmvnsxmy = round(6 * ABS($MYnsx) / (pow($l, 2) * $B), 2, PHP_ROUND_HALF_UP);
                    $Cmvnsxmys[] = $Cmvnsxmy;

                    $totcmx = $Cmvnsx + $Cmvnsxmx + $Cmvnsxmy;
                    $totcmxs[] = $totcmx;
                }
                if (isset($Cmvnsxs)) {
                    foreach ($Cmvnsxs as $Cmvnsx) {
                        echo "<td>$Cmvnsx</td>";
                    }
                }
                if (isset($Cmvnsxmxs)) {
                    foreach ($Cmvnsxmxs as $Cmvnsxmx) {
                        echo "<td>$Cmvnsxmx</td>";
                    }
                }
                if (isset($Cmvnsxmys)) {
                    foreach ($Cmvnsxmys as $Cmvnsxmy) {
                        echo "<td>$Cmvnsxmy</td>";
                    }
                }
                if (isset($totcmxs)) {
                    foreach ($totcmxs as $totcmx) {
                        echo "<td>$totcmx</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">1.25(CM+CV)+Sy</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $Cmvsy = round(($PSy / $AZapata), 2, PHP_ROUND_HALF_UP);
                    $Cmvsys[] = $Cmvsy;

                    $Cmvsymx = round(6 * ABS($MXSy) / ($l * pow($B, 2)), 2, PHP_ROUND_HALF_UP);
                    $Cmvsymxs[] = $Cmvsymx;

                    $Cmvsymy = round(6 * ABS($MYsy) / (pow($l, 2) * $B), 2, PHP_ROUND_HALF_UP);
                    $Cmvsymys[] = $Cmvsymy;

                    $totcmsy = $Cmvsy + $Cmvsymx + $Cmvsymy;
                    $totcmsys[] = $totcmsy;
                }
                if (isset($Cmvsys)) {
                    foreach ($Cmvsys as $Cmvsy) {
                        echo "<td>$Cmvsy</td>";
                    }
                }
                if (isset($Cmvsymxs)) {
                    foreach ($Cmvsymxs as $Cmvsymx) {
                        echo "<td>$Cmvsymx</td>";
                    }
                }
                if (isset($Cmvsymys)) {
                    foreach ($Cmvsymys as $Cmvsymy) {
                        echo "<td>$Cmvsymy</td>";
                    }
                }
                if (isset($totcmsys)) {
                    foreach ($totcmsys as $totcmsy) {
                        echo "<td>$totcmsy</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">1.25(CM+CV)-Sy</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $Cmvnsy = round(($PSny / $AZapata), 2, PHP_ROUND_HALF_UP);
                    $Cmvnsys[] = $Cmvnsy;

                    $Cmvsnymx = round(6 * ABS($MXnSy) / ($l * pow($B, 2)), 2, PHP_ROUND_HALF_UP);
                    $Cmvsnymxs[] = $Cmvsnymx;

                    $Cmvsnymy = round(6 * ABS($MYnsy) / (pow($l, 2) * $B), 2, PHP_ROUND_HALF_UP);
                    $Cmvsnymys[] = $Cmvsnymy;

                    $totcmny = $Cmvnsy + $Cmvsnymx + $Cmvsnymy;
                    $totcmnys[] = $totcmny;

                }
                if (isset($Cmvnsys)) {
                    foreach ($Cmvnsys as $Cmvnsy) {
                        echo "<td>$Cmvnsy</td>";
                    }
                }
                if (isset($Cmvsnymxs)) {
                    foreach ($Cmvsnymxs as $Cmvsnymx) {
                        echo "<td>$Cmvsnymx</td>";
                    }
                }
                if (isset($Cmvsnymys)) {
                    foreach ($Cmvsnymys as $Cmvsnymy) {
                        echo "<td>$Cmvsnymy</td>";
                    }
                }
                if (isset($totcmnys)) {
                    foreach ($totcmnys as $totcmny) {
                        echo "<td>$totcmny</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">0.9CM+Sx</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $ccx = round(($Pms / $AZapata), 2, PHP_ROUND_HALF_UP);
                    $ccxs[] = $ccx;

                    $ccmx = round(6 * ABS($MxCmSx) / ($l * pow($B, 2)), 2, PHP_ROUND_HALF_UP);
                    $ccmxs[] = $ccmx;

                    $ccmy = round(6 * ABS($MyCmSx) / (pow($l, 2) * $B), 2, PHP_ROUND_HALF_UP);
                    $ccmys[] = $ccmy;

                    $cctot = $ccx + $ccmx + $ccmy;
                    $cctots[] = $cctot;

                }
                if (isset($ccxs)) {
                    foreach ($ccxs as $ccx) {
                        echo "<td>$ccx</td>";
                    }
                }
                if (isset($ccmxs)) {
                    foreach ($ccmxs as $ccmx) {
                        echo "<td>$ccmx</td>";
                    }
                }
                if (isset($ccmys)) {
                    foreach ($ccmys as $ccmy) {
                        echo "<td>$ccmy</td>";
                    }
                }
                if (isset($cctots)) {
                    foreach ($cctots as $cctot) {
                        echo "<td>$cctot</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">0.9CM-Sx</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $ccnx = round(($Pmns / $AZapata), 2, PHP_ROUND_HALF_UP);
                    $ccnxs[] = $ccnx;

                    $ccnmx = round(6 * ABS($MxCmSxn) / ($l * pow($B, 2)), 2, PHP_ROUND_HALF_UP);
                    $ccnmxs[] = $ccnmx;

                    $ccnmy = round(6 * ABS($MyCmSxn) / (pow($l, 2) * $B), 2, PHP_ROUND_HALF_UP);
                    $ccnmys[] = $ccnmy;

                    $ccntot = $ccnx + $ccnmx + $ccnmy;
                    $ccntots[] = $ccntot;

                }
                if (isset($ccnxs)) {
                    foreach ($ccnxs as $ccnx) {
                        echo "<td>$ccnx</td>";
                    }
                }
                if (isset($ccnmxs)) {
                    foreach ($ccnmxs as $ccnmx) {
                        echo "<td>$ccnmx</td>";
                    }
                }
                if (isset($ccnmys)) {
                    foreach ($ccnmys as $ccnmy) {
                        echo "<td>$ccnmy</td>";
                    }
                }
                if (isset($ccntots)) {
                    foreach ($ccntots as $ccntot) {
                        echo "<td>$ccntot</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">0.9CM+Sy</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $ccyx = round(($Pmys / $AZapata), 2, PHP_ROUND_HALF_UP);
                    $ccyxs[] = $ccyx;

                    $ccymx = round(6 * ABS($MxCmSxy) / ($l * pow($B, 2)), 2, PHP_ROUND_HALF_UP);
                    $ccymxs[] = $ccymx;

                    $ccymy = round(6 * ABS($MyCmSxy) / (pow($l, 2) * $B), 2, PHP_ROUND_HALF_UP);
                    $ccymys[] = $ccymy;

                    $ccytot = $ccyx + $ccymx + $ccymy;
                    $ccytots[] = $ccytot;

                }
                if (isset($ccyxs)) {
                    foreach ($ccyxs as $ccyx) {
                        echo "<td>$ccyx</td>";
                    }
                }
                if (isset($ccymxs)) {
                    foreach ($ccymxs as $ccymx) {
                        echo "<td>$ccymx</td>";
                    }
                }
                if (isset($ccymys)) {
                    foreach ($ccymys as $ccymy) {
                        echo "<td>$ccymy</td>";
                    }
                }
                if (isset($ccytots)) {
                    foreach ($ccytots as $ccytot) {
                        echo "<td>$ccytot</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">0.9CM-Sy</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $ccnyx = round(($Pmnys / $AZapata), 2, PHP_ROUND_HALF_UP);
                    $ccnyxs[] = $ccnyx;

                    $ccnymx = round(6 * ABS($MxCmSxny) / ($l * pow($B, 2)), 2, PHP_ROUND_HALF_UP);
                    $ccnymxs[] = $ccnymx;

                    $ccnymy = round(6 * ABS($MyCmSxny) / (pow($l, 2) * $B), 2, PHP_ROUND_HALF_UP);
                    $ccnymys[] = $ccnymy;

                    $ccnytot = $ccnyx + $ccnymx + $ccnymy;
                    $ccnytots[] = $ccnytot;

                }
                if (isset($ccnyxs)) {
                    foreach ($ccnyxs as $ccnyx) {
                        echo "<td>$ccnyx</td>";
                    }
                }
                if (isset($ccnymxs)) {
                    foreach ($ccnymxs as $ccnymx) {
                        echo "<td>$ccnymx</td>";
                    }
                }
                if (isset($ccnymys)) {
                    foreach ($ccnymys as $ccnymy) {
                        echo "<td>$ccnymy</td>";
                    }
                }
                if (isset($ccnytots)) {
                    foreach ($ccnytots as $ccnytot) {
                        echo "<td>$ccnytot</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>σ últ (tonf/m<sup>2</sup>)</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $Pulti = max($totPD, $totcv, $totcmx, $totcmsy, $totcmny, $cctot, $ccntot, $ccytot, $ccnytot);
                    $Pultis[] = $Pulti;

                }
                if (isset($Pultis)) {
                    foreach ($Pultis as $Pulti) {
                        echo "<td>$Pulti</td>";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>
    <hr class="bg-info">

    <!-- Verificaion por extrensidades -->
    <h3><u><strong>3.0 VERIFICACION DE EXTRENSIDADES :</strong></u></h3>
    <table class="table text-center" style="vertical-align: middle;">
        <thead>
            <tr>
                <th colspan="10" scope="col">VERIFICACION DE EXTRENSIDADES</th>
            </tr>
            <tr>
                <th scope="col"></th>
                <th colspan="2" scope="col">Fuerza axial</th>
                <th colspan="2" scope="col">Momento en X</th>
                <th colspan="2" scope="col">Momento en Y</th>
                <th colspan="2" scope="col">Resultante</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th style="vertical-align: middle;" rowspan="2" scope="col">CM+CV</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $ResultanteA = $CmCv + $CmCvmx + (-$CmCvmy);
                    $Resultanteb = $CmCv + $CmCvmx + $CmCvmy;

                    $VrfEx = "";
                    if ($ResultanteA >= 0 || $Resultanteb >= 0) {
                        $VrfEx = "Cumple";
                    } else {
                        $VrfEx = "No Cumple";
                    }
                    $VrfExs[] = $VrfEx;


                }
                echo "<td>$CmCv</td>";
                echo "<td>$CmCv</td>";
                echo "<td>$CmCvmx</td>";
                echo "<td>$CmCvmx</td>";
                echo "<td>-$CmCvmy</td>";
                echo "<td>$CmCvmy</td>";
                echo "<td>$ResultanteA</td>";
                echo "<td>$Resultanteb</td>";
                if (isset($VrfExs)) {
                    foreach ($VrfExs as $VrfEx) {
                        echo "<td>$VrfEx</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $ResultanteA = $CmCv + (-$CmCvmx) + (-$CmCvmy);
                    $Resultanteb = $CmCv + (-$CmCvmx) + $CmCvmy;

                    $VrfEx2 = "";
                    if ($ResultanteA >= 0 || $Resultanteb >= 0) {
                        $VrfEx2 = "Cumple";
                    } else {
                        $VrfEx2 = "No Cumple";
                    }
                    $VrfEx2s[] = $VrfEx2;


                }
                echo "<td>$CmCv</td>";
                echo "<td>$CmCv</td>";
                echo "<td>$CmCvmx</td>";
                echo "<td>$CmCvmx</td>";
                echo "<td>-$CmCvmy</td>";
                echo "<td>$CmCvmy</td>";
                echo "<td>$ResultanteA</td>";
                echo "<td>$Resultanteb</td>";
                if (isset($VrfEx2s)) {
                    foreach ($VrfEx2s as $VrfEx2) {
                        echo "<td>$VrfEx2</td>";
                    }
                }
                ?>
            </tr>
            <!-- 2 -->
            <tr>
                <th style="vertical-align: middle;" rowspan="2" scope="col">CM+CV+0.8Sx</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $ResultanteAx = $CmCvsx + $CmCvsxmx + (-$CmCvsxmy);
                    $Resultantebx = $CmCvsx + $CmCvsxmx + $CmCvsxmy;

                    $VrfE = "";
                    if ($ResultanteAx >= 0 || $Resultantebx >= 0) {
                        $VrfE = "Cumple";
                    } else {
                        $VrfE = "No Cumple";
                    }
                    $VrfEs[] = $VrfE;


                }
                echo "<td>$CmCvsx</td>";
                echo "<td>$CmCvsx</td>";
                echo "<td>$CmCvsxmx</td>";
                echo "<td>$CmCvsxmx</td>";
                echo "<td>-$CmCvsxmy</td>";
                echo "<td>$CmCvsxmy</td>";

                echo "<td>$ResultanteAx</td>";
                echo "<td>$Resultantebx</td>";
                if (isset($VrfEs)) {
                    foreach ($VrfEs as $VrfE) {
                        echo "<td>$VrfE</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $ResultanteAx = $CmCvsx + (-$CmCvsxmx) + $CmCvsxmy;
                    $Resultantebx = $CmCvsx + (-$CmCvsxmx) + $CmCvsxmy;

                    $VrfE2 = "";
                    if ($ResultanteAx >= 0 || $Resultantebx >= 0) {
                        $VrfE2 = "Cumple";
                    } else {
                        $VrfE2 = "No Cumple";
                    }
                    $VrfE2s[] = $VrfE2;


                }
                echo "<td>$CmCvsx</td>";
                echo "<td>$CmCvsx</td>";
                echo "<td>-$CmCvsxmx</td>";
                echo "<td>-$CmCvsxmx</td>";
                echo "<td>$CmCvsxmy</td>";
                echo "<td>$CmCvsxmy</td>";

                echo "<td>$ResultanteAx</td>";
                echo "<td>$Resultantebx</td>";
                if (isset($VrfE2s)) {
                    foreach ($VrfE2s as $VrfE2) {
                        echo "<td>$VrfE2</td>";
                    }
                }
                ?>
            </tr>
            <!-- 3 -->
            <tr>
                <th style="vertical-align: middle;" rowspan="2" scope="col">CM+CV-0.8Sx</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $ResultanteASX = $CmCvnsx + $CmCvnsxmx + (-$CmCvnsxmy);
                    $ResultantebSX = $CmCvnsx + $CmCvnsxmx + $CmCvnsxmy;

                    $VrfESX = "";
                    if ($ResultanteASX >= 0 || $ResultantebSX >= 0) {
                        $VrfESX = "Cumple";
                    } else {
                        $VrfESX = "No Cumple";
                    }
                    $VrfESXs[] = $VrfESX;


                }
                echo "<td>$CmCvnsx</td>";
                echo "<td>$CmCvnsx</td>";
                echo "<td>$CmCvnsxmx</td>";
                echo "<td>$CmCvnsxmx</td>";
                echo "<td>-$CmCvnsxmy</td>";
                echo "<td>$CmCvnsxmy</td>";

                echo "<td>$ResultanteASX</td>";
                echo "<td>$ResultantebSX</td>";

                if (isset($VrfESXs)) {
                    foreach ($VrfESXs as $VrfESX) {
                        echo "<td>$VrfESX</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $ResultanteASX2 = $CmCvnsx + (-$CmCvnsxmx) + $CmCvnsxmy;
                    $ResultantebSX2 = $CmCvnsx + (-$CmCvnsxmx) + $CmCvnsxmy;

                    $VrfESX2 = "";
                    if ($ResultanteASX >= 0 || $ResultantebSX >= 0) {
                        $VrfESX2 = "Cumple";
                    } else {
                        $VrfESX2 = "No Cumple";
                    }
                    $VrfESX2s[] = $VrfESX2;


                }
                echo "<td>$CmCvnsx</td>";
                echo "<td>$CmCvnsx</td>";
                echo "<td>-$CmCvnsxmx</td>";
                echo "<td>-$CmCvnsxmx</td>";
                echo "<td>$CmCvnsxmy</td>";
                echo "<td>$CmCvnsxmy</td>";

                echo "<td>$ResultanteASX2</td>";
                echo "<td>$ResultantebSX2</td>";

                if (isset($VrfESX2s)) {
                    foreach ($VrfESX2s as $VrfESX2) {
                        echo "<td>$VrfESX2</td>";
                    }
                }
                ?>
            </tr>
            <!-- 4 -->
            <tr>
                <th style="vertical-align: middle;" rowspan="2" scope="col">CM+CV+0.8Sy</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $ResultanteASy = $CmCvsy + $CmCvsymx + (-$CmCvsymy);
                    $ResultantebSy = $CmCvsy + $CmCvsymx + $CmCvsymy;

                    $VrfESy = "";
                    if ($ResultanteASy >= 0 || $ResultantebSy >= 0) {
                        $VrfESy = "Cumple";
                    } else {
                        $VrfESy = "No Cumple";
                    }
                    $VrfESys[] = $VrfESy;


                }
                echo "<td>$CmCvsy</td>";
                echo "<td>$CmCvsy</td>";
                echo "<td>$CmCvsymx</td>";
                echo "<td>$CmCvsymx</td>";
                echo "<td>-$CmCvsymy</td>";
                echo "<td>$CmCvsymy</td>";

                echo "<td>$ResultanteASy</td>";
                echo "<td>$ResultantebSy</td>";

                if (isset($VrfESys)) {
                    foreach ($VrfESys as $VrfESy) {
                        echo "<td>$VrfESy</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $ResultanteASy2 = $CmCvsy + (-$CmCvsymx) + (-$CmCvsymy);
                    $ResultantebSy2 = $CmCvsy + (-$CmCvsymx) + $CmCvsymy;

                    $VrfESy2 = "";
                    if ($ResultanteASy2 >= 0 || $ResultantebSy2 >= 0) {
                        $VrfESy2 = "Cumple";
                    } else {
                        $VrfESy2 = "No Cumple";
                    }
                    $VrfESy2s[] = $VrfESy2;


                }
                echo "<td>$CmCvsy</td>";
                echo "<td>$CmCvsy</td>";
                echo "<td>$CmCvsymx</td>";
                echo "<td>$CmCvsymx</td>";
                echo "<td>-$CmCvsymy</td>";
                echo "<td>$CmCvsymy</td>";

                echo "<td>$ResultanteASy2</td>";
                echo "<td>$ResultantebSy2</td>";

                if (isset($VrfESy2s)) {
                    foreach ($VrfESy2s as $VrfESy2) {
                        echo "<td>$VrfESy2</td>";
                    }
                }
                ?>
            </tr>
            <!-- 5 -->
            <tr>
                <th style="vertical-align: middle;" rowspan="2" scope="col">CM+CV-0.8Sy</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $ResultanteASny = $CmCvnsy + $CmCvsnymx + (-$CmCvsnymy);
                    $ResultantebSny = $CmCvnsy + $CmCvsnymx + $CmCvsnymy;

                    $VrfESny = "";
                    if ($ResultanteASny >= 0 || $ResultantebSny >= 0) {
                        $VrfESny = "Cumple";
                    } else {
                        $VrfESny = "No Cumple";
                    }
                    $VrfESnys[] = $VrfESny;


                }
                echo "<td>$CmCvnsy</td>";
                echo "<td>$CmCvnsy</td>";
                echo "<td>$CmCvsnymx</td>";
                echo "<td>$CmCvsnymx</td>";
                echo "<td>-$CmCvsnymy</td>";
                echo "<td>$CmCvsnymy</td>";

                echo "<td>$ResultanteASny</td>";
                echo "<td>$ResultantebSny</td>";

                if (isset($VrfESnys)) {
                    foreach ($VrfESnys as $VrfESny) {
                        echo "<td>$VrfESny</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $ResultanteASny2 = $CmCvnsy + (-$CmCvsnymx) + (-$CmCvsnymy);
                    $ResultantebSny2 = $CmCvnsy + (-$CmCvsnymx) + $CmCvsnymy;

                    $VrfESny2 = "";
                    if ($ResultanteASny2 >= 0 || $ResultantebSny2 >= 0) {
                        $VrfESny2 = "Cumple";
                    } else {
                        $VrfESny2 = "No Cumple";
                    }
                    $VrfESny2s[] = $VrfESny2;


                }
                echo "<td>$CmCvnsy</td>";
                echo "<td>$CmCvnsy</td>";
                echo "<td>-$CmCvsnymx</td>";
                echo "<td>-$CmCvsnymx</td>";
                echo "<td>-$CmCvsnymy</td>";
                echo "<td>$CmCvsnymy</td>";

                echo "<td>$ResultanteASny2</td>";
                echo "<td>$ResultantebSny2</td>";

                if (isset($VrfESny2s)) {
                    foreach ($VrfESny2s as $VrfESny2) {
                        echo "<td>$VrfESny2</td>";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>
    <hr class="bg-info">

    <!-- Analisis por PUNZONAMIENTO -->
    <h3><u><strong>4.0 ANÁLISIS POR PUNZONAMIENTO :</strong></u></h3>
    <table class="table text-center">
        <thead class="text-center">
            <tr>
                <th scope="col" colspan="4">ANÁLISIS POR PUNZONAMIENTO</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="col">d</th>
                <td>
                    <?php echo "$peralteEfectivo" ?>
                </td>
                <td>m</td>
                <td>peralte efectivo</td>
            </tr>
            <tr>
                <th scope="col">Pu</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $PUCargaServicio = max($pcc, $Pcps, $Pcns, $Pcpys, $Pcnys);
                    $PUCargaUltima = max($P, $Pc, $Pcn, $PSy, $PSny, $Pms, $Pmns, $Pmys, $Pmnys);

                }
                echo "<td>$PUCargaUltima</td>";
                //echo "<td>$PUCargaServicio</td>";
                // if (isset($VrfExs)) {
                //     foreach ($VrfExs as $VrfEx) {
                //         echo "<td>$VrfEx</td>";
                //     }
                // }
                ?>
                <td>Tonf</td>
                <td>fuerza axial último</td>
            </tr>
            <tr>
                <th scope="col">σu</th>
                <td>
                    <?php echo "$Pulti" ?>
                </td>
                <td>tonf/m<sup>2</sup></td>
                <td>presión último en el suelo</td>
            </tr>
            <tr>
                <th scope="col">b o</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $PCorte = 2 * ($peralteEfectivo + $t) + 2 * ($peralteEfectivo + $b);

                }
                echo "<td>$PCorte</td>";
                ?>
                <td>m</td>
                <td>perimetro de corte</td>
            </tr>
            <tr>
                <th scope="col">A o</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $AefectivaP = ($peralteEfectivo + $b) * ($t + $peralteEfectivo);

                }
                echo "<td>$AefectivaP</td>";
                ?>
                <td>m<sup>2</sup></td>
                <td>área efectiva de punzonamiento</td>
            </tr>
            <tr>
                <th scope="col">β</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $RelacionLLCol = round(MAX($b, $t) / MIN($b, $t), 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$RelacionLLCol</td>";
                ?>
                <td></td>
                <td>relación del lado largo al lado corto de la sección de la columna</td>
            </tr>
            <tr>
                <th scope="col">∅</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $FactorReduccionCortante = 0.85;
                }
                echo "<td>$FactorReduccionCortante</td>";
                ?>
                <td></td>
                <td>factor de reducción a cortante</td>
            </tr>
            <tr>
                <th scope="col">α s</th>
                <td>
                    <?php echo "$columna" ?>
                </td>
                <td></td>
                <td>40 para columnas interiores, 30 para columnas de borde y 20 para columnas en esquina</td>
            </tr>
            <tr>
                <th scope="col">Vu</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $FcortanteUltimo = round($PUCargaUltima - $Pulti * $AefectivaP, 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$FcortanteUltimo</td>";
                ?>
                <td>tonf</td>
                <td>fuerza cortante último</td>
            </tr>
            <tr>
                <th scope="col">∅V c1</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $VC1 = round(($FactorReduccionCortante * 0.53 * (1 + 2 / $RelacionLLCol) * sqrt($fc) * $PCorte * pow(10, 2) * $peralteEfectivo * pow(10, 2)) * pow(10, -3), 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$VC1</td>";
                ?>
                <td>tonf</td>
                <td>NTP E.060 (11.12.2.1)</td>
            </tr>
            <tr>
                <th scope="col">∅V c2</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $VCn2 = round((($FactorReduccionCortante * 0.27 * ($columna * $peralteEfectivo / $PCorte + 2) * sqrt($fc) * $PCorte * pow(10, 2) * $peralteEfectivo * pow(10, 2)) * pow(10, -3)), 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$VCn2</td>";
                ?>
                <td>tonf</td>
                <td>NTP E.060 (11.12.2.1)</td>
            </tr>
            <tr>
                <th scope="col">∅V c3</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $VCn3 = round(($FactorReduccionCortante * 1.06 * sqrt($fc) * $PCorte * pow(10, 2) * $peralteEfectivo * pow(10, 2)) / pow(10, 3), 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$VCn3</td>";
                ?>
                <td>tonf</td>
                <td>NTP E.060 (11.12.2.1)</td>
            </tr>
            <tr>
                <th scope="col">∅V c</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $ResistenciaNominal = min($VC1, $VCn2, $VCn3);
                }
                echo "<td>$ResistenciaNominal</td>";
                ?>
                <td>tonf</td>
                <td>resistencia nominal por punzonamiento del concreto</td>
            </tr>
            <tr>
                <th scope="col">VERIFICACION</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $VerificarCN = "";
                    if ($ResistenciaNominal <= $ResistenciaNominal) {
                        $VerificarCN = "CUMPLE";
                    } else {
                        $VerificarCN = "No Cumple";
                    }

                }
                echo "<td>$VerificarCN</td>";
                ?>
            </tr>
        </tbody>
    </table>

    <h3><u><strong>4.1 VERIFICACIÓN DE CORTE POR FLEXIÓN :</strong></u></h3>
    <table class="table text-center">
        <thead class="text-center">
            <tr>
                <th scope="col" colspan="5">VERIFICACIÓN DE CORTE POR FLEXIÓN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="col">d</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $PEfectivoCM = $peralteEfectivo * 100;
                }
                echo "<td>$PEfectivoCM</td>";
                ?>
                <td>cm</td>
                <td></td>
                <td>peralte efectivo</td>
            </tr>
            <tr>
                <th scope="col">L</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {

                }
                echo "<td>$l</td>";
                ?>
                <td>m</td>
                <td></td>
                <td>dimensión de zapata en X</td>
            </tr>
            <tr>
                <th scope="col">B</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {

                }
                echo "<td>$B</td>";
                ?>
                <td>m</td>
                <td></td>
                <td>dimensión de zapata en Y</td>
            </tr>
            <tr>
                <th scope="col">Lvx</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                }
                echo "<td>$lvx</td>";
                ?>
                <td>m</td>
                <td></td>
                <td>volado en X</td>
            </tr>
            <tr>
                <th scope="col">Lvy</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                }
                echo "<td>$lvy</td>";
                ?>
                <td>m</td>
                <td></td>
                <td>volado en Y</td>
            </tr>
            <!-- ELEMENTO VACIO -->
            <tr>
                <th>
                <td></td>
                <td></td>
                <td></td>
                </th>
            </tr>
            <!-- FIN DEL ELEMENTO VACIO -->
            <tr>
                <th scope="col">∅</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $FactorReduccionCortante = 0.85;
                }
                echo "<td>$FactorReduccionCortante</td>";
                echo "<td>$FactorReduccionCortante</td>";
                ?>
                <td></td>
                <td>factor de reducción a cortante</td>
            </tr>
            <tr>
                <th scope="col">f'c</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                }
                echo "<td>$fc</td>";
                echo "<td>$fc</td>";
                ?>
                <td>kgf/cm<sup>2</sup></td>
                <td>resistencia a compresión del concreto</td>
            </tr>
            <tr>
                <th scope="col">d</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                }
                echo "<td>$PEfectivoCM</td>";
                echo "<td>$PEfectivoCM</td>";
                ?>
                <td>cm</td>
                <td>peralte efectivo</td>
            </tr>
            <tr>
                <th scope="col">b</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $BASE = round($B * 100, 2, PHP_ROUND_HALF_UP);
                    $BASE2 = round($l * 100, 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$BASE</td>";
                echo "<td>$BASE2</td>";
                ?>
                <td>cm</td>
                <td>base</td>
            </tr>
            <tr>
                <th scope="col">Vu</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $FCultimo = round($Pulti * $B * ($lvx - $PEfectivoCM / 100), 2, PHP_ROUND_HALF_UP);
                    $FCultimo2 = round($Pulti * $l * ($lvy - $PEfectivoCM / 100), 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$FCultimo</td>";
                echo "<td>$FCultimo2</td>";
                ?>
                <td>Tonf</td>
                <td>fuerza cortante último</td>
            </tr>
            <tr>
                <th scope="col">∅V c</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $Rnominal1 = round($FactorReduccionCortante * 0.53 * sqrt($fc) * $BASE * $PEfectivoCM / 1000, 2, PHP_ROUND_HALF_UP);
                    $Rnominal2 = round($FactorReduccionCortante * 0.53 * sqrt($fc) * $BASE2 * $PEfectivoCM / 1000, 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$Rnominal1</td>";
                echo "<td>$Rnominal2</td>";
                ?>
                <td>tonf</td>
                <td>resistencia nominal al cortante proporcionada por el concreto</td>
            </tr>
            <tr>
                <th scope="col">VERIFICACION</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $VerificarCN1 = "";
                    if ($FCultimo <= $Rnominal1) {
                        $VerificarCN1 = "CUMPLE";
                    } else {
                        $VerificarCN1 = "No Cumple";
                    }
                    $VerificarCN2 = "";
                    if ($FCultimo2 <= $Rnominal2) {
                        $VerificarCN2 = "CUMPLE";
                    } else {
                        $VerificarCN2 = "No Cumple";
                    }

                }
                echo "<td>$VerificarCN1</td>";
                echo "<td>$VerificarCN2</td>";
                ?>
            </tr>
        </tbody>
    </table>
    <hr class="bg-info">

    <!-- Diseño por Flexion -->
    <h3><u><strong>5.0 DISEÑO POR FLEXIÓN :</strong></u></h3>
    <table class="table text-center">
        <thead class="text-center">
            <tr>
                <th scope="col" colspan="5">DISEÑO POR FLEXIÓN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="col">L</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {

                }
                echo "<td>$l</td>";
                ?>
                <td>m</td>
                <td></td>
                <td>dimensión de zapata en X</td>
            </tr>
            <tr>
                <th scope="col">B</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {

                }
                echo "<td>$B</td>";
                ?>
                <td>m</td>
                <td></td>
                <td>dimensión de zapata en Y</td>
            </tr>
            <tr>
                <th scope="col">Lvx</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                }
                echo "<td>$lvx</td>";
                ?>
                <td>m</td>
                <td></td>
                <td>volado en X</td>
            </tr>
            <tr>
                <th scope="col">Lvy</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                }
                echo "<td>$lvy</td>";
                ?>
                <td>m</td>
                <td></td>
                <td>volado en Y</td>
            </tr>
            <!-- ELEMENTO VACIO -->
            <tr>
                <th> </th>
                <td><strong>"X"</strong></td>
                <td><strong>"Y"</strong></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <!-- FIN DEL ELEMENTO VACIO -->
            <tr>
                <th scope="col">σ últ</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                }
                echo "<td>$Pulti</td>";
                echo "<td>$Pulti</td>";
                ?>
                <td>Tonf/m<sup>2</sup></td>
                <td>presión último en el suelo</td>
            </tr>
            <tr>
                <th scope="col">Mu</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $MomentoUltimo = $Pulti * $l * $lvy * ($lvy / 2);
                    $MomentoUltimo2 = round($Pulti * $B * $lvx * ($lvx / 2), 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$MomentoUltimo</td>";
                echo "<td>$MomentoUltimo2</td>";
                ?>
                <td>tonf/m</td>
                <td>momento Ultimo</td>
            </tr>
            <tr>
                <th scope="col">b</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $BASE = round($B * 100, 2, PHP_ROUND_HALF_UP);
                    $BASE2 = round($l * 100, 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$BASE2</td>";
                echo "<td>$BASE</td>";
                ?>
                <td>cm</td>
                <td>base</td>
            </tr>
            <tr>
                <th scope="col">fy</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                }
                echo "<td>$fy</td>";
                echo "<td>$fy</td>";
                ?>
                <td>kgf/cm<sup>2</sup></td>
                <td>fluencia del acero</td>
            </tr>
            <tr>
                <th scope="col">f'c</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                }
                echo "<td>$fc</td>";
                echo "<td>$fc</td>";
                ?>
                <td>kgf/cm<sup>2</sup></td>
                <td>resistencia a compresión del concreto</td>
            </tr>
            <tr>
                <th scope="col">∅</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $FactorReduccionFlexion = 0.9;
                }
                echo "<td>$FactorReduccionFlexion</td>";
                echo "<td>$FactorReduccionFlexion</td>";
                ?>
                <td></td>
                <td>factor de reducción a cortante</td>
            </tr>
            <tr>
                <th scope="col">d</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                }
                echo "<td>$PEfectivoCM</td>";
                echo "<td>$PEfectivoCM</td>";
                ?>
                <td>cm</td>
                <td>peralte efectivo</td>
            </tr>
            <tr>
                <th scope="col">a</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $BloqueComprimido = round($PEfectivoCM - sqrt(pow($PEfectivoCM, 2) - (2 * abs($MomentoUltimo * pow(10, 5))) / ($FactorReduccionFlexion * 0.85 * $fc * $BASE2)), 2, PHP_ROUND_HALF_UP);
                    $BloqueComprimido2 = round($PEfectivoCM - sqrt(pow($PEfectivoCM, 2) - (2 * abs($MomentoUltimo2 * pow(10, 5))) / ($FactorReduccionFlexion * 0.85 * $fc * $BASE)), 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$BloqueComprimido</td>";
                echo "<td>$BloqueComprimido2</td>";
                ?>
                <td>cm</td>
                <td>bloque comprimido</td>
            </tr>
            <!-- ELEMENTO VACIO -->
            <tr>
                <th> </th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

            </tr>
            <!-- FIN DEL ELEMENTO VACIO -->
            <tr>
                <th scope="col">As</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $RCalculado = round(0.85 * $fc * $BASE2 * $BloqueComprimido / $fy, 2, PHP_ROUND_HALF_UP);
                    $RCalculado2 = round(0.85 * $fc * $BASE * $BloqueComprimido2 / $fy, 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$RCalculado</td>";
                echo "<td>$RCalculado2</td>";
                ?>
                <td>cm<sup>2</sup></td>
                <td>refuerzo calculado</td>
            </tr>
            <tr>
                <th scope="col">A min</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $Rminimo = round(0.0018 * $BASE2 * $PEfectivoCM, 2, PHP_ROUND_HALF_UP);
                    $Rminimos = round(0.0018 * $BASE * $PEfectivoCM, 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$Rminimo</td>";
                echo "<td>$Rminimos</td>";
                ?>
                <td>cm<sup>2</sup></td>
                <td>refuerzo mínimo</td>
            </tr>
            <tr>
                <th scope="col">Ф Varilla</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $AreaVarillax = "";
                    if ($Varillax == 0) {
                        $AreaVarillax = "Ф";
                    } else if ($Varillax == 0.283) {
                        $AreaVarillax = "6mm";
                    } elseif ($Varillax == 0.503) {
                        $AreaVarillax = "8mm";
                    } elseif ($Varillax == 0.713) {
                        $AreaVarillax = "Ø 3/8";
                    } elseif ($Varillax == 1.131) {
                        $AreaVarillax = "12mm";
                    } elseif ($Varillax == 1.267) {
                        $AreaVarillax = "Ø 1/2";
                    } elseif ($Varillax == 1.979) {
                        $AreaVarillax = "Ø 5/8";
                    } elseif ($Varillax == 2.850) {
                        $AreaVarillax = "Ф 3/4";
                    } elseif ($Varillax == 5.067) {
                        $AreaVarillax = "Ф 1";
                    }

                    $AreaVarillay = "";
                    if ($Varillay == 0) {
                        $AreaVarillay = "Ф";
                    } else if ($Varillay == 0.283) {
                        $AreaVarillay = "6mm";
                    } elseif ($Varillay == 0.503) {
                        $AreaVarillay = "8mm";
                    } elseif ($Varillay == 0.713) {
                        $AreaVarillay = "Ø 3/8";
                    } elseif ($Varillay == 1.131) {
                        $AreaVarillay = "12mm";
                    } elseif ($Varillay == 1.267) {
                        $AreaVarillay = "Ø 1/2";
                    } elseif ($Varillay == 1.979) {
                        $AreaVarillay = "Ø 5/8";
                    } elseif ($Varillay == 2.850) {
                        $AreaVarillay = "Ф 3/4";
                    } elseif ($Varillay == 5.067) {
                        $AreaVarillay = "Ф 1";
                    }

                }
                echo "<td>$AreaVarillax</td>";
                echo "<td>$AreaVarillay</td>";
                ?>
                <td></td>
                <td>refuerzo a usar</td>
            </tr>
            <tr>
                <th scope="col">As Varilla</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {

                }
                echo "<td>$Varillax</td>";
                echo "<td>$Varillay</td>";
                ?>
                <td>cm<sup>2</sup></td>
                <td>área del refuerzo</td>
            </tr>
            <tr>
                <th scope="col"># Varilla</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $NumVarrilla1 = ceil(MAX($RCalculado, $Rminimo) / $Varillax);
                    $NumVarrilla2 = ceil(MAX($RCalculado2, $Rminimos) / $Varillay);
                }
                echo "<td>$NumVarrilla1</td>";
                echo "<td>$NumVarrilla2</td>";
                ?>
                <td>varrillas</td>
                <td>Numero de varrillas</td>
            </tr>
            <tr>
                <th scope="col">As real</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $Rreal1 = round($NumVarrilla1 * $Varillax, 2, PHP_ROUND_HALF_UP);
                    $Rreal2 = round($NumVarrilla2 * $Varillay, 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$Rreal1</td>";
                echo "<td>$Rreal2</td>";
                ?>
                <td>cm<sup>2</sup></td>
                <td>refuerzo real</td>
            </tr>
            <tr>
                <th scope="col">areal</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $BCReal1 = round($Rreal1 * $fy / (0.85 * $fc * $BASE2), 2, PHP_ROUND_HALF_UP);
                    $BCReal2 = round($Rreal2 * $fy / (0.85 * $fc * $BASE), 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$BCReal1</td>";
                echo "<td>$BCReal2</td>";
                ?>
                <td>cm</td>
                <td>bloque comprimido real</td>
            </tr>
            <tr>
                <th scope="col"> ϕMn</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $Rnominal1 = round($FactorReduccionFlexion * $Rreal1 * $fy * ($PEfectivoCM - $BCReal1 / 2) / pow(10, 5), 2, PHP_ROUND_HALF_UP);
                    $Rnominal2 = round($FactorReduccionFlexion * $Rreal2 * $fy * ($PEfectivoCM - $BCReal2 / 2) / pow(10, 5), 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$Rnominal1</td>";
                echo "<td>$Rnominal2</td>";
                ?>
                <td>tonf-m</td>
                <td>momento nominal</td>
            </tr>
            <tr>
                <th scope="col">VERIFICACION</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $Vfelxion1 = "";
                    if ($Rreal1 > max($RCalculado, $Rminimo)) {
                        $Vfelxion1 = "CUMPLE";
                    } else {
                        $Vfelxion1 = "No Cumple";
                    }
                    $Vfelxion2 = "";
                    if ($Rreal2 > max($RCalculado2, $Rminimos)) {
                        $Vfelxion2 = "CUMPLE";
                    } else {
                        $Vfelxion2 = "No Cumple";
                    }

                }
                echo "<td>$Vfelxion1</td>";
                echo "<td>$Vfelxion2</td>";
                ?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th scope="col">s</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $Pespaciamiento1 = round($BASE2 / $NumVarrilla1, 2, PHP_ROUND_HALF_UP);
                    $Pespaciamiento2 = round($BASE / $NumVarrilla2, 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$Pespaciamiento1</td>";
                echo "<td>$Pespaciamiento2</td>";
                ?>
                <td>cm</td>
                <td>espaciamiento</td>
            </tr>
            <tr>
                <th scope="col">s</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $Sespaciamiento1 = round($Varillax / (MAX($RCalculado, $Rminimo) / ($BASE2 / 100)) * 100, 2, PHP_ROUND_HALF_UP);
                    $Sespaciamiento2 = round($Varillay / (MAX($RCalculado2, $Rminimos) / ($BASE / 100)) * 100, 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$Sespaciamiento1</td>";
                echo "<td>$Sespaciamiento2</td>";
                ?>
                <td>cm</td>
                <td>espaciamiento</td>
            </tr>
            <tr>
                <th scope="col">s</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    // $EspUsar1 = round($FactorReduccionCortante * 0.53 * sqrt($fc) * $BASE * $PEfectivoCM / 1000, 2, PHP_ROUND_HALF_UP);
                    // $EspUsar2 = round($FactorReduccionCortante * 0.53 * sqrt($fc) * $BASE2 * $PEfectivoCM / 1000, 2, PHP_ROUND_HALF_UP);
                }
                echo "<td>$espaciamientox</td>";
                echo "<td>$espaciamientoy</td>";
                ?>
                <td>cm</td>
                <td>espaciamiento a usar</td>
            </tr>
            <tr>
                <th scope="col">VERIFICACION</th>
                <?php
                for ($i = 0; $i < $datos; $i++) {
                    $Vespaciamiento1 = "";
                    if ($espaciamientox <= round($Sespaciamiento1, 0) || $espaciamientox <= round($Pespaciamiento1, 0)) {
                        $Vespaciamiento1 = "CUMPLE";
                    } else {
                        $Vespaciamiento1 = "No Cumple";
                    }
                    $Vespaciamiento2 = "";
                    if ($espaciamientoy <= round($Sespaciamiento2, 0) || $espaciamientoy <= round($Pespaciamiento2, 0)) {
                        $Vespaciamiento2 = "CUMPLE";
                    } else {
                        $Vespaciamiento2 = "No Cumple";
                    }

                }
                echo "<td>$Vespaciamiento1</td>";
                echo "<td>$Vespaciamiento2</td>";
                ?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <hr class="bg-info">

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