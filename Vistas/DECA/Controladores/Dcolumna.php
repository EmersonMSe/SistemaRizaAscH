<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fc = $_POST["fc"];
    $fy = $_POST["fy"];
    $H = $_POST["altura"];
    $L1 = $_POST["L1"];
    $L2 = $_POST["L2"];
    $d = $_POST["d"];
    $CDEZ = $_POST["CDEsbelZ"];
    $SEstru = $_POST["SEstru"];
    $Tgrapas = $_POST["Tgrapas"];
    $AAceroTotal = $_POST["AAceroTotal"];
    $AEstribos = $_POST["AEstribos"];
    $AaceromaxLong = $_POST["AmaxLong"];
    $puinf = $_POST["puinf"];
    $pusup = $_POST["pusup"];
    $Mninf = $_POST["Mninf"];
    $Mnsup = $_POST["Mnsup"];
    $VudEtap = $_POST["VudEtaps"];
    $dataFromHandsontable = json_decode($_POST["dataFromHandsontable"], true);
    $dataFromHandsontables = array();
    $p = array();
    $vx = array();
    $vy = array();
    $topmx = array();
    $buttonmx = array();
    $topmy = array();
    $buttonmy = array();


    for ($i = 0; $i < count($dataFromHandsontable); $i++) {
        $p[] = $dataFromHandsontable[$i][2];
    }
    for ($i = 0; $i < count($dataFromHandsontable); $i++) {
        $vx[] = $dataFromHandsontable[$i][3];
    }
    for ($i = 0; $i < count($dataFromHandsontable); $i++) {
        $vy[] = $dataFromHandsontable[$i][4];
    }
    for ($i = 0; $i < count($dataFromHandsontable); $i++) {
        $topmx[] = $dataFromHandsontable[$i][5];
    }
    for ($i = 0; $i < count($dataFromHandsontable); $i++) {
        $buttonmx[] = $dataFromHandsontable[$i][6];
    }
    for ($i = 0; $i < count($dataFromHandsontable); $i++) {
        $topmy[] = $dataFromHandsontable[$i][7];
    }
    for ($i = 0; $i < count($dataFromHandsontable); $i++) {
        $buttonmy[] = $dataFromHandsontable[$i][8];
    }
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
    <h3><u><strong>1.0 Condición de Esbeltez:</strong></u></h3>
    <!-- Condicion Esbeltez -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover ">
            <thead class="bg-info">
                <tr>
                    <th scope="col" style="vertical-align: middle;" class="text-center" rowspan="3">
                        Piso</th>
                    <th scope="col" style="vertical-align: middle;" class="text-center" rowspan="3">
                        Combinaciones de Carga</th>
                    <th scope="col" style="vertical-align: middle;" class="text-center" colspan="7">
                        Direcciones X-X</th>
                    <th scope="col" style="vertical-align: middle;" class="text-center" colspan="7">
                        Direcciones Y-Y</th>
                </tr>
                <tr>
                    <th scope="col" rowspan="2" style="vertical-align: middle;" class="text-center">Pu (Ton)</th>
                    <th scope="col" rowspan="2" style="vertical-align: middle;" class="text-center">Vux (Ton)</th>
                    <th scope="col" rowspan="2" style="vertical-align: middle;" class="text-center">vuy (Ton)</th>
                    <th scope="col" colspan="2" style="vertical-align: middle;" class="text-center">Mux (Ton.m)</th>
                    <th scope="col" colspan="2" style="vertical-align: middle;" class="text-center">Muy (Ton.m)</th>
                    <th scope="col" rowspan="2" style="vertical-align: middle;" class="text-center">Pu (Ton)</th>
                    <th scope="col" rowspan="2" style="vertical-align: middle;" class="text-center">Vux (Ton)</th>
                    <th scope="col" rowspan="2" style="vertical-align: middle;" class="text-center">vuy (Ton)</th>
                    <th scope="col" colspan="2" style="vertical-align: middle;" class="text-center">Mux (Ton.m)</th>
                    <th scope="col" colspan="2" style="vertical-align: middle;" class="text-center">Muy (Ton.m)</th>
                </tr>
                <tr>
                    <th scope="col" class="text-center">Top</th>
                    <th scope="col" class="text-center">Bottom</th>
                    <th scope="col" class="text-center">Top</th>
                    <th scope="col" class="text-center">Bottom</th>
                    <th scope="col" class="text-center">Top</th>
                    <th scope="col" class="text-center">Bottom</th>
                    <th scope="col" class="text-center">Top</th>
                    <th scope="col" class="text-center">Bottom</th>
                </tr>
            </thead>
            <tbody id="tablaBody">
                <tr>
                    <th rowspan="5" style="vertical-align: middle;" scope="row">Piso 1</th>
                    <th>1.40CM+1.70CV</th>
                    <?php
                    $datos = 1;
                    $Ps = array();
                    $vuxs = array();
                    $vys = array();
                    $topmxs = array();
                    $buttonmxs = array();
                    $topmys = array();
                    $buttonmys = array();
                    //cuadrante en X-x
                    for ($i = 0; $i < $datos; $i++) {
                        $P = round((1.4 * $p[$i] + 1.7 * $p[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $Ps[] = $P;
                    }
                    if (isset($Ps)) {
                        foreach ($Ps as $P) {
                            echo "<td>$P</td>";
                        }
                    }

                    //segundo cuadrante vux
                    for ($i = 0; $i < $datos; $i++) {
                        $vux = round((1.4 * $vx[$i] + 1.7 * $vx[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $vuxs[] = $vux;
                    }
                    if (isset($vuxs)) {
                        foreach ($vuxs as $vux) {
                            echo "<td>$vux</td>";
                        }
                    }

                    //tercer cuadrante vy
                    for ($i = 0; $i < $datos; $i++) {
                        $v1y = round((1.4 * $vy[$i] + 1.7 * $vy[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $v1ys[] = $v1y;
                    }
                    if (isset($v1ys)) {
                        foreach ($v1ys as $v1y) {
                            echo "<td>$v1y</td>";
                        }
                    }

                    //cuarto cuadrante top x
                    for ($i = 0; $i < $datos; $i++) {
                        $topmx1 = round((1.4 * $topmx[$i] + 1.7 * $topmx[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $topmx1s[] = $topmx1;
                    }
                    if (isset($topmx1s)) {
                        foreach ($topmx1s as $topmx1) {
                            echo "<td>$topmx1</td>";
                        }
                    }
                    //cuarto cuadrante Button x
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmx1 = round((1.4 * $buttonmx[$i] + 1.7 * $buttonmx[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $buttonmx1s[] = $buttonmx1;
                    }
                    if (isset($buttonmx1s)) {
                        foreach ($buttonmx1s as $buttonmx1) {
                            echo "<td>$buttonmx1</td>";
                        }
                    }

                    //quinto cuadrante top y
                    for ($i = 0; $i < $datos; $i++) {
                        $topmy1 = round((1.4 * $topmy[$i] + 1.7 * $topmy[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $topmy1s[] = $topmy1;
                    }
                    if (isset($topmy1s)) {
                        foreach ($topmy1s as $topmy1) {
                            echo "<td>$topmy1</td>";
                        }
                    }
                    //sexto cuadrante Button y
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmy1 = round((1.4 * $buttonmy[$i] + 1.7 * $buttonmy[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $buttonmy1s[] = $buttonmy1;
                    }
                    if (isset($buttonmy1s)) {
                        foreach ($buttonmy1s as $buttonmy1) {
                            echo "<td>$buttonmy1</td>";
                        }
                    }

                    //CUADRANTE en Y-Y
                    
                    for ($i = 0; $i < $datos; $i++) {
                        $Py = round((1.4 * $p[$i] + 1.7 * $p[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $Pys[] = $Py;
                    }
                    if (isset($Pys)) {
                        foreach ($Pys as $Py) {
                            echo "<td>$Py</td>";
                        }
                    }

                    //segundo cuadrante vux
                    for ($i = 0; $i < $datos; $i++) {
                        $vux1 = round((1.4 * $vx[$i] + 1.7 * $vx[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $vux1s[] = $vux1;
                    }
                    if (isset($vux1s)) {
                        foreach ($vux1s as $vux1) {
                            echo "<td>$vux1</td>";
                        }
                    }
                    //tercer cuadrante vy
                    $vyYs = array();
                    for ($i = 0; $i < $datos; $i++) {
                        $vyY = round((1.4 * $vy[$i] + 1.7 * $vy[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $vyYs[] = $vyY;
                    }
                    if (isset($vyYs)) {
                        foreach ($vyYs as $vyY) {
                            echo "<td>$vyY</td>";
                        }
                    }

                    //cuarto cuadrante top x
                    $vyYs = array();
                    for ($i = 0; $i < $datos; $i++) {
                        $topmx2 = round((1.4 * $topmx[$i] + 1.7 * $topmx[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $topmx2s[] = $topmx2;
                    }
                    if (isset($topmx2s)) {
                        foreach ($topmx2s as $topmx2) {
                            echo "<td>$topmx2</td>";
                        }
                    }


                    //cuarto cuadrante Button x
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmyx2 = round((1.4 * $buttonmx[$i] + 1.7 * $buttonmx[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $buttonmyx2s[] = $buttonmyx2;
                    }
                    if (isset($buttonmyx2s)) {
                        foreach ($buttonmyx2s as $buttonmyx2) {
                            echo "<td>$buttonmyx2</td>";
                        }
                    }

                    //quinto cuadrante top y
                    for ($i = 0; $i < $datos; $i++) {
                        $topmyy2 = round((1.4 * $topmy[$i] + 1.7 * $topmy[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $topmyy2s[] = $topmyy2;
                    }
                    if (isset($topmyy2s)) {
                        foreach ($topmyy2s as $topmyy2) {
                            echo "<td>$topmyy2</td>";
                        }
                    }
                    //sexto cuadrante Button y
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmyy = round((1.4 * $buttonmy[$i] + 1.7 * $buttonmy[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $buttonmyys[] = $buttonmyy;
                    }
                    if (isset($buttonmyys)) {
                        foreach ($buttonmyys as $buttonmyy) {
                            echo "<td>$buttonmyy</td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th>1.25(CM+CV)+CS</th>
                    <?php
                    $datos = 1;
                    $Ps = array();
                    $vuxs = array();
                    $vys = array();
                    $topmxs = array();
                    $buttonmxs = array();
                    $topmys = array();
                    $buttonmys = array();
                    //cuadrante en X-x
                    for ($i = 0; $i < $datos; $i++) {
                        $Pc = round((1.25 * ($p[$i] + $p[$i + 1]) + $p[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $Pcs[] = $Pc;
                    }
                    if (isset($Pcs)) {
                        foreach ($Pcs as $Pc) {
                            echo "<td>$Pc</td>";
                        }
                    }

                    //segundo cuadrante vux
                    for ($i = 0; $i < $datos; $i++) {
                        $vucx = round((1.25 * ($vx[$i] + $vx[$i + 1]) + $vx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $vucxs[] = $vucx;
                    }
                    if (isset($vucxs)) {
                        foreach ($vucxs as $vucx) {
                            echo "<td>$vucx</td>";
                        }
                    }

                    //tercer cuadrante vy
                    for ($i = 0; $i < $datos; $i++) {
                        $vcsy = round((1.25 * ($vy[$i] + $vy[$i + 1]) + $vy[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $vcsys[] = $vcsy;
                    }
                    if (isset($vcsys)) {
                        foreach ($vcsys as $vcsy) {
                            echo "<td>$vcsy</td>";
                        }
                    }

                    //cuarto cuadrante top x
                    for ($i = 0; $i < $datos; $i++) {
                        $topmxcs = round((1.25 * ($topmx[$i] + $topmx[$i + 1]) + $topmx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $topmxcss[] = $topmxcs;
                    }
                    if (isset($topmxcss)) {
                        foreach ($topmxcss as $topmxcs) {
                            echo "<td>$topmxcs</td>";
                        }
                    }
                    //cuarto cuadrante Button x
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmxcs = round((1.25 * ($buttonmx[$i] + $buttonmx[$i + 1]) + $buttonmx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $buttonmxcss[] = $buttonmxcs;
                    }
                    if (isset($buttonmxcss)) {
                        foreach ($buttonmxcss as $buttonmxcs) {
                            echo "<td>$buttonmxcs</td>";
                        }
                    }

                    //quinto cuadrante top y
                    for ($i = 0; $i < $datos; $i++) {
                        $topmycs = round((1.25 * ($topmy[$i] + $topmy[$i + 1]) + $topmy[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $topmycss[] = $topmycs;
                    }
                    if (isset($topmycss)) {
                        foreach ($topmycss as $topmycs) {
                            echo "<td>$topmycs</td>";
                        }
                    }
                    //sexto cuadrante Button y
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmycs = round((1.25 * ($buttonmy[$i] + $buttonmy[$i + 1]) + $buttonmy[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $buttonmycss[] = $buttonmycs;
                    }
                    if (isset($buttonmycss)) {
                        foreach ($buttonmycss as $buttonmycs) {
                            echo "<td>$buttonmycs</td>";
                        }
                    }

                    //CUADRANTE en Y-Y
                    
                    for ($i = 0; $i < $datos; $i++) {
                        $Pcsy = round((1.25 * ($p[$i] + $p[$i + 1]) + $p[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $Pcsys[] = $Pcsy;
                    }
                    if (isset($Pcsys)) {
                        foreach ($Pcsys as $Pcsy) {
                            echo "<td>$Pcsy</td>";
                        }
                    }

                    //segundo cuadrante vux
                    for ($i = 0; $i < $datos; $i++) {
                        $vucsy = round((1.25 * ($vx[$i] + $vx[$i + 1]) + $vx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $vucsys[] = $vucsy;
                    }
                    if (isset($vucsys)) {
                        foreach ($vucsys as $vucsy) {
                            echo "<td>$vucsy</td>";
                        }
                    }
                    //tercer cuadrante vy
                    for ($i = 0; $i < $datos; $i++) {
                        $vycs = round((1.25 * ($vy[$i] + $vy[$i + 1]) + $vy[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $vycss[] = $vycs;
                    }
                    if (isset($vycss)) {
                        foreach ($vycss as $vycs) {
                            echo "<td>$vycs</td>";
                        }
                    }

                    //cuarto cuadrante top x
                    $vyYs = array();
                    for ($i = 0; $i < $datos; $i++) {
                        $topmxycs = round((1.25 * ($topmx[$i] + $topmx[$i + 1]) + $topmx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $topmxycss[] = $topmxycs;
                    }
                    if (isset($topmxycss)) {
                        foreach ($topmxycss as $topmxycs) {
                            echo "<td>$topmxycs</td>";
                        }
                    }


                    //cuarto cuadrante Button x
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmyxcs = round((1.25 * ($buttonmx[$i] + $buttonmx[$i + 1]) + $buttonmx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $buttonmyxcss[] = $buttonmyxcs;
                    }
                    if (isset($buttonmyxcss)) {
                        foreach ($buttonmyxcss as $buttonmyxcs) {
                            echo "<td>$buttonmyxcs</td>";
                        }
                    }

                    //quinto cuadrante top y
                    for ($i = 0; $i < $datos; $i++) {
                        $topmyycs = round((1.25 * ($topmy[$i] + $topmy[$i + 1]) + $topmy[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $topmyycss[] = $topmyycs;
                    }
                    if (isset($topmyycss)) {
                        foreach ($topmyycss as $topmyycs) {
                            echo "<td>$topmyycs</td>";
                        }
                    }
                    //sexto cuadrante Button y
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmyycs = round((1.25 * ($buttonmy[$i] + $buttonmy[$i + 1]) + $buttonmy[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $buttonmyycss[] = $buttonmyycs;
                    }
                    if (isset($buttonmyycss)) {
                        foreach ($buttonmyycss as $buttonmyycs) {
                            echo "<td>$buttonmyycs</td>";
                        }
                    }

                    ?>
                </tr>
                <tr>
                    <th>1.25(CM+CV)-CS</th>
                    <?php
                    $datos = 1;
                    $Ps = array();
                    $vuxs = array();
                    $vys = array();
                    $topmxs = array();
                    $buttonmxs = array();
                    $topmys = array();
                    $buttonmys = array();
                    //cuadrante en X-x
                    for ($i = 0; $i < $datos; $i++) {
                        $Pcn = round((1.25 * ($p[$i] + $p[$i + 1]) - $p[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $Pcns[] = $Pcn;
                    }
                    if (isset($Pcns)) {
                        foreach ($Pcns as $Pcn) {
                            echo "<td>$Pcn</td>";
                        }
                    }

                    //segundo cuadrante vux
                    for ($i = 0; $i < $datos; $i++) {
                        $vucnx = round((1.25 * ($vx[$i] + $vx[$i + 1]) - $vx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $vucnxs[] = $vucnx;
                    }
                    if (isset($vucnxs)) {
                        foreach ($vucnxs as $vucnx) {
                            echo "<td>$vucnx</td>";
                        }
                    }

                    //tercer cuadrante vy
                    for ($i = 0; $i < $datos; $i++) {
                        $vcnsy = round((1.25 * ($vy[$i] + $vy[$i + 1]) - $vy[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $vcnsys[] = $vcnsy;
                    }
                    if (isset($vcnsys)) {
                        foreach ($vcnsys as $vcnsy) {
                            echo "<td>$vcnsy</td>";
                        }
                    }

                    //cuarto cuadrante top x
                    for ($i = 0; $i < $datos; $i++) {
                        $topmxcns = round((1.25 * ($topmx[$i] + $topmx[$i + 1]) - $topmx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $topmxcnss[] = $topmxcns;
                    }
                    if (isset($topmxcnss)) {
                        foreach ($topmxcnss as $topmxcns) {
                            echo "<td>$topmxcns</td>";
                        }
                    }
                    //cuarto cuadrante Button x
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmxcns = round((1.25 * ($buttonmx[$i] + $buttonmx[$i + 1]) - $buttonmx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $buttonmxcnss[] = $buttonmxcns;
                    }
                    if (isset($buttonmxcnss)) {
                        foreach ($buttonmxcnss as $buttonmxcns) {
                            echo "<td>$buttonmxcns</td>";
                        }
                    }

                    //quinto cuadrante top y
                    for ($i = 0; $i < $datos; $i++) {
                        $topmycns = round((1.25 * ($topmy[$i] + $topmy[$i + 1]) - $topmy[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $topmycnss[] = $topmycns;
                    }
                    if (isset($topmycnss)) {
                        foreach ($topmycnss as $topmycns) {
                            echo "<td>$topmycns</td>";
                        }
                    }
                    //sexto cuadrante Button y
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmycns = round((1.25 * ($buttonmy[$i] + $buttonmy[$i + 1]) + $buttonmy[$i + 1]), 2, PHP_ROUND_HALF_UP);
                        $buttonmycnss[] = $buttonmycns;
                    }
                    if (isset($buttonmycss)) {
                        foreach ($buttonmycss as $buttonmycs) {
                            echo "<td>$buttonmycs</td>";
                        }
                    }

                    //CUADRANTE en Y-Y
                    
                    for ($i = 0; $i < $datos; $i++) {
                        $Pcnsy = round((1.25 * ($p[$i] + $p[$i + 1]) - $p[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $Pcnsys[] = $Pcnsy;
                    }
                    if (isset($Pcnsys)) {
                        foreach ($Pcnsys as $Pcnsy) {
                            echo "<td>$Pcnsy</td>";
                        }
                    }

                    //segundo cuadrante vux
                    for ($i = 0; $i < $datos; $i++) {
                        $vucnsy = round((1.25 * ($vx[$i] + $vx[$i + 1]) - $vx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $vucnsys[] = $vucnsy;
                    }
                    if (isset($vucnsys)) {
                        foreach ($vucnsys as $vucnsy) {
                            echo "<td>$vucnsy</td>";
                        }
                    }
                    //tercer cuadrante vy
                    for ($i = 0; $i < $datos; $i++) {
                        $vycns = round((1.25 * ($vy[$i] + $vy[$i + 1]) - $vy[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $vycnss[] = $vycns;
                    }
                    if (isset($vycnss)) {
                        foreach ($vycnss as $vycns) {
                            echo "<td>$vycns</td>";
                        }
                    }

                    //cuarto cuadrante top x
                    $vyYs = array();
                    for ($i = 0; $i < $datos; $i++) {
                        $topmxycns = round((1.25 * ($topmx[$i] + $topmx[$i + 1]) - $topmx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $topmxycnss[] = $topmxycns;
                    }
                    if (isset($topmxycnss)) {
                        foreach ($topmxycnss as $topmxycns) {
                            echo "<td>$topmxycns</td>";
                        }
                    }


                    //cuarto cuadrante Button x
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmyxcns = round((1.25 * ($buttonmx[$i] + $buttonmx[$i + 1]) - $buttonmx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $buttonmyxcnss[] = $buttonmyxcns;
                    }
                    if (isset($buttonmyxcnss)) {
                        foreach ($buttonmyxcnss as $buttonmyxcns) {
                            echo "<td>$buttonmyxcns</td>";
                        }
                    }

                    //quinto cuadrante top y
                    for ($i = 0; $i < $datos; $i++) {
                        $topmyycns = round((1.25 * ($topmy[$i] + $topmy[$i + 1]) - $topmy[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $topmyycnss[] = $topmyycns;
                    }
                    if (isset($topmyycnss)) {
                        foreach ($topmyycnss as $topmyycns) {
                            echo "<td>$topmyycns</td>";
                        }
                    }
                    //sexto cuadrante Button y
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmyycns = round((1.25 * ($buttonmy[$i] + $buttonmy[$i + 1]) - $buttonmy[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $buttonmyycnss[] = $buttonmyycns;
                    }
                    if (isset($buttonmyycnss)) {
                        foreach ($buttonmyycnss as $buttonmyycns) {
                            echo "<td>$buttonmyycns</td>";
                        }
                    }

                    ?>
                </tr>
                <tr>
                    <th>0.90CM+CS</th>
                    <?php
                    $datos = 1;
                    $Ps = array();
                    $vuxs = array();
                    $vys = array();
                    $topmxs = array();
                    $buttonmxs = array();
                    $topmys = array();
                    $buttonmys = array();
                    //cuadrante en X-x
                    for ($i = 0; $i < $datos; $i++) {
                        $Pms = round((0.9 * $p[$i] + $p[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $Pmss[] = $Pms;
                    }
                    if (isset($Pmss)) {
                        foreach ($Pmss as $Pms) {
                            echo "<td>$Pms</td>";
                        }
                    }

                    //segundo cuadrante vux
                    for ($i = 0; $i < $datos; $i++) {
                        $vums = round((0.90 * $vx[$i] + $vx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $vumss[] = $vums;
                    }
                    if (isset($vumss)) {
                        foreach ($vumss as $vums) {
                            echo "<td>$vums</td>";
                        }
                    }

                    //tercer cuadrante vy
                    for ($i = 0; $i < $datos; $i++) {
                        $vyms = round((0.9 * $vy[$i] + $vy[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $vymss[] = $vyms;
                    }
                    if (isset($vymss)) {
                        foreach ($vymss as $vyms) {
                            echo "<td>$vyms</td>";
                        }
                    }

                    //cuarto cuadrante top x
                    for ($i = 0; $i < $datos; $i++) {
                        $topmxms = round((0.9 * $topmx[$i] + $topmx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $topmxmss[] = $topmxms;
                    }
                    if (isset($topmxmss)) {
                        foreach ($topmxmss as $topmxms) {
                            echo "<td>$topmxms</td>";
                        }
                    }
                    //cuarto cuadrante Button x
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmxms = round((0.9 * $buttonmx[$i] + $buttonmx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $buttonmxmss[] = $buttonmxms;
                    }
                    if (isset($buttonmxmss)) {
                        foreach ($buttonmxmss as $buttonmxms) {
                            echo "<td>$buttonmxms</td>";
                        }
                    }

                    //quinto cuadrante top y
                    for ($i = 0; $i < $datos; $i++) {
                        $topmyms = round((0.9 * $topmy[$i] + $topmy[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $topmymss[] = $topmyms;
                    }
                    if (isset($topmymss)) {
                        foreach ($topmymss as $topmyms) {
                            echo "<td>$topmyms</td>";
                        }
                    }
                    //sexto cuadrante Button y
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmyms = round((0.9 * $buttonmy[$i] + $buttonmy[$i + 2]), 4, PHP_ROUND_HALF_UP);
                        $buttonmymss[] = $buttonmyms;
                    }
                    if (isset($buttonmymss)) {
                        foreach ($buttonmymss as $buttonmyms) {
                            echo "<td>$buttonmyms</td>";
                        }
                    }

                    //CUADRANTE en Y-Y
                    
                    for ($i = 0; $i < $datos; $i++) {
                        $Pmsy = round((0.9 * $p[$i] + $p[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $Pmsys[] = $Pmsy;
                    }
                    if (isset($Pmsys)) {
                        foreach ($Pmsys as $Pmsy) {
                            echo "<td>$Pmsy</td>";
                        }
                    }

                    //segundo cuadrante vux
                    for ($i = 0; $i < $datos; $i++) {
                        $vuxms = round((0.9 * $vx[$i] + $vx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $vuxmss[] = $vuxms;
                    }
                    if (isset($vuxmss)) {
                        foreach ($vuxmss as $vuxms) {
                            echo "<td>$vuxms</td>";
                        }
                    }
                    //tercer cuadrante vy
                    $vyYs = array();
                    for ($i = 0; $i < $datos; $i++) {
                        $vmsy = round((0.9 * $vy[$i] + $vy[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $vmsys[] = $vmsy;
                    }
                    if (isset($vmsys)) {
                        foreach ($vmsys as $vmsy) {
                            echo "<td>$vmsy</td>";
                        }
                    }

                    //cuarto cuadrante top x
                    $vyYs = array();
                    for ($i = 0; $i < $datos; $i++) {
                        $topmsmx = round((0.9 * $topmx[$i] + $topmx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $topmsmxs[] = $topmsmx;
                    }
                    if (isset($topmsmxs)) {
                        foreach ($topmsmxs as $topmsmx) {
                            echo "<td>$topmsmx</td>";
                        }
                    }


                    //cuarto cuadrante Button x
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmsmy = round((0.9 * $buttonmx[$i] + $buttonmx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $buttonmsmys[] = $buttonmsmy;
                    }
                    if (isset($buttonmsmys)) {
                        foreach ($buttonmsmys as $buttonmsmy) {
                            echo "<td>$buttonmsmy</td>";
                        }
                    }

                    //quinto cuadrante top y
                    for ($i = 0; $i < $datos; $i++) {
                        $topmsmyy = round((0.9 * $topmy[$i] + $topmy[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $topmsmyys[] = $topmsmyy;
                    }
                    if (isset($topmsmyys)) {
                        foreach ($topmsmyys as $topmsmyy) {
                            echo "<td>$topmsmyy</td>";
                        }
                    }
                    //sexto cuadrante Button y
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmsmyy = round((0.9 * $buttonmy[$i] + $buttonmy[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $buttonmsmyys[] = $buttonmsmyy;
                    }
                    if (isset($buttonmsmyys)) {
                        foreach ($buttonmsmyys as $buttonmsmyy) {
                            echo "<td>$buttonmsmyy</td>";
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <th>0.90CM-CS</th>
                    <?php
                    $datos = 1;
                    $Ps = array();
                    $vuxs = array();
                    $vys = array();
                    $topmxs = array();
                    $buttonmxs = array();
                    $topmys = array();
                    $buttonmys = array();
                    //cuadrante en X-x
                    for ($i = 0; $i < $datos; $i++) {
                        $Pmns = round((0.9 * $p[$i] - $p[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $Pmnss[] = $Pmns;
                    }
                    if (isset($Pmnss)) {
                        foreach ($Pmnss as $Pmns) {
                            echo "<td>$Pmns</td>";
                        }
                    }

                    //segundo cuadrante vux
                    for ($i = 0; $i < $datos; $i++) {
                        $vumns = round((0.90 * $vx[$i] - $vx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $vumnss[] = $vumns;
                    }
                    if (isset($vumnss)) {
                        foreach ($vumnss as $vumns) {
                            echo "<td>$vumns</td>";
                        }
                    }

                    //tercer cuadrante vy
                    for ($i = 0; $i < $datos; $i++) {
                        $vymns = round((0.9 * $vy[$i] - $vy[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $vymnss[] = $vymns;
                    }
                    if (isset($vymnss)) {
                        foreach ($vymnss as $vymns) {
                            echo "<td>$vymns</td>";
                        }
                    }

                    //cuarto cuadrante top x
                    for ($i = 0; $i < $datos; $i++) {
                        $topmxmns = round((0.9 * $topmx[$i] - $topmx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $topmxmnss[] = $topmxmns;
                    }
                    if (isset($topmxmnss)) {
                        foreach ($topmxmnss as $topmxmns) {
                            echo "<td>$topmxmns</td>";
                        }
                    }
                    //cuarto cuadrante Button x
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmxmns = round((0.9 * $buttonmx[$i] - $buttonmx[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $buttonmxmnss[] = $buttonmxmns;
                    }
                    if (isset($buttonmxmnss)) {
                        foreach ($buttonmxmnss as $buttonmxmns) {
                            echo "<td>$buttonmxmns</td>";
                        }
                    }

                    //quinto cuadrante top y
                    for ($i = 0; $i < $datos; $i++) {
                        $topmymns = round((0.9 * $topmy[$i] - $topmy[$i + 2]), 2, PHP_ROUND_HALF_UP);
                        $topmymnss[] = $topmymns;
                    }
                    if (isset($topmymnss)) {
                        foreach ($topmymnss as $topmymns) {
                            echo "<td>$topmymns</td>";
                        }
                    }
                    //sexto cuadrante Button y
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmymns = round((0.9 * $buttonmy[$i] - $buttonmy[$i + 2]), 4, PHP_ROUND_HALF_UP);
                        $buttonmymnss[] = $buttonmymns;
                    }
                    if (isset($buttonmymnss)) {
                        foreach ($buttonmymnss as $buttonmymns) {
                            echo "<td>$buttonmymns</td>";
                        }
                    }

                    //CUADRANTE en Y-Y
                    
                    for ($i = 0; $i < $datos; $i++) {
                        $Pmnsy = round((0.9 * $p[$i] - $p[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $Pmnsys[] = $Pmnsy;
                    }
                    if (isset($Pmnsys)) {
                        foreach ($Pmnsys as $Pmnsy) {
                            echo "<td>$Pmnsy</td>";
                        }
                    }

                    //segundo cuadrante vux
                    for ($i = 0; $i < $datos; $i++) {
                        $vuxmns = round((0.9 * $vx[$i] - $vx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $vuxmnss[] = $vuxmns;
                    }
                    if (isset($vuxmnss)) {
                        foreach ($vuxmnss as $vuxmns) {
                            echo "<td>$vuxmns</td>";
                        }
                    }
                    //tercer cuadrante vy
                    $vyYs = array();
                    for ($i = 0; $i < $datos; $i++) {
                        $vmnsy = round((0.9 * $vy[$i] - $vy[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $vmnsys[] = $vmnsy;
                    }
                    if (isset($vmnsys)) {
                        foreach ($vmnsys as $vmnsy) {
                            echo "<td>$vmnsy</td>";
                        }
                    }

                    //cuarto cuadrante top x
                    $vyYs = array();
                    for ($i = 0; $i < $datos; $i++) {
                        $topmsmnx = round((0.9 * $topmx[$i] - $topmx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $topmsmnxs[] = $topmsmnx;
                    }
                    if (isset($topmsmnxs)) {
                        foreach ($topmsmnxs as $topmsmnx) {
                            echo "<td>$topmsmnx</td>";
                        }
                    }


                    //cuarto cuadrante Button x
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmsmny = round((0.9 * $buttonmx[$i] - $buttonmx[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $buttonmsmnys[] = $buttonmsmny;
                    }
                    if (isset($buttonmsmnys)) {
                        foreach ($buttonmsmnys as $buttonmsmny) {
                            echo "<td>$buttonmsmny</td>";
                        }
                    }

                    //quinto cuadrante top y
                    for ($i = 0; $i < $datos; $i++) {
                        $topmsmnyy = round((0.9 * $topmy[$i] - $topmy[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $topmsmnyys[] = $topmsmnyy;
                    }
                    if (isset($topmsmnyys)) {
                        foreach ($topmsmnyys as $topmsmnyy) {
                            echo "<td>$topmsmnyy</td>";
                        }
                    }
                    //sexto cuadrante Button y
                    for ($i = 0; $i < $datos; $i++) {
                        $buttonmsmnyy = round((0.9 * $buttonmy[$i] - $buttonmy[$i + 3]), 2, PHP_ROUND_HALF_UP);
                        $buttonmsmnyys[] = $buttonmsmnyy;
                    }
                    if (isset($buttonmsmnyys)) {
                        foreach ($buttonmsmnyys as $buttonmsmnyy) {
                            echo "<td>$buttonmsmnyy</td>";
                        }
                    }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-danger">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover ">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col" style="vertical-align: middle;" class="text-center">
                                    Piso</th>
                                <th scope="col" colspan="3" style="vertical-align: middle;" class="text-center">
                                    DIRECCION X-X</th>
                            </tr>
                        </thead>
                        <tbody id="tablaBody" class="text-center">
                            <tr>
                                <th rowspan="3" style="vertical-align: middle;" scope="row">Piso 01</th>
                                <?php
                                $datos = 1;
                                for ($i = 0; $i < $datos; $i++) {
                                    $PuMax = max($P, $Pc, $Pcn, $Pms, $Pmns);
                                    $PuMaxs[] = $PuMax;
                                }
                                if (isset($PuMaxs)) {
                                    foreach ($PuMaxs as $PuMax) {
                                        echo "<td class='text-center'>$PuMax</td>";
                                    }
                                } ?>
                                <td>Ton</td>
                            </tr>
                            <tr>
                                <?php
                                $datos = 1;
                                for ($i = 0; $i < $datos; $i++) {
                                    $mulMax = 0;
                                    if ($PuMax == $P) {
                                        $mulMax = $buttonmx1;
                                    } else if ($PuMax == $Pc) {
                                        $mulMax = $buttonmx;
                                    } elseif ($PuMax == $Pcn) {
                                        $mulMax = $buttonmxcns;
                                    } elseif ($PuMax == $Pms) {
                                        $mulMax = $buttonmxmns;
                                    }
                                    $mulMaxs[] = $mulMax;
                                }
                                if (isset($mulMaxs)) {
                                    foreach ($mulMaxs as $mulMax) {
                                        echo "<td class='text-center'>$mulMax</td>";
                                    }
                                } ?>
                                <td>Ton m</td>
                            </tr>
                            <tr>
                                <?php
                                $datos = 1;
                                for ($i = 0; $i < $datos; $i++) {
                                    $mu2Max = 0;
                                    if ($PuMax == $P) {
                                        $mu2Max = $topmx1;
                                    } else if ($PuMax == $Pc) {
                                        $mu2Max = $topmxcs;
                                    } elseif ($PuMax == $Pcn) {
                                        $mu2Max = $topmxcns;
                                    } elseif ($PuMax == $Pms) {
                                        $mu2Max = $topmxms;
                                    } else {
                                        $mu2Max = $topmxmns;
                                    }
                                    $mu2Maxs[] = $mu2Max;
                                }
                                if (isset($mu2Maxs)) {
                                    foreach ($mu2Maxs as $mu2Max) {
                                        echo "<td class='text-center'>$mu2Max</td>";
                                    }
                                } ?>
                                <td>Ton m</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-info">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover ">
                        <thead class="bg-info">
                            <th scope="col" style="vertical-align: middle;" class="text-center">
                                Piso</th>
                            <th scope="col" colspan="3" style="vertical-align: middle;" class="text-center">
                                DIRECCION Y-Y</th>
                        </thead>
                        <tbody id="tablaBody" class="text-center">
                            <tr>
                                <th rowspan="3" style="vertical-align: middle;" scope="row">Piso 01</th>
                                <?php
                                $datos = 1;
                                for ($i = 0; $i < $datos; $i++) {
                                    $PuyMax = max($Py, $Pcsy, $Pcnsy, $Pmsy, $Pmnsy);
                                    $PuyMaxs[] = $PuyMax;
                                }
                                if (isset($PuyMaxs)) {
                                    foreach ($PuyMaxs as $PuyMax) {
                                        echo "<td class='text-center'>$PuyMax</td>";
                                    }
                                } ?>
                                <td>Ton</td>
                            </tr>
                            <tr>
                                <?php
                                $datos = 1;
                                for ($i = 0; $i < $datos; $i++) {
                                    $muylMax = 0;
                                    if ($PuyMax == $Py) {
                                        $muylMax = $buttonmyy;
                                    } else if ($PuyMax == $Pcsy) {
                                        $muylMax = $buttonmyycs;
                                    } elseif ($PuyMax == $Pcnsy) {
                                        $muylMax = $buttonmyycns;
                                    } elseif ($PuyMax == $Pmsy) {
                                        $muylMax = $buttonmsmyy;
                                    }
                                    $muylMaxs[] = $muylMax;
                                }
                                if (isset($muylMaxs)) {
                                    foreach ($muylMaxs as $muylMax) {
                                        echo "<td class='text-center'>$muylMax</td>";
                                    }
                                } ?>
                                <td>Ton m</td>
                            </tr>
                            <tr>
                                <?php
                                $datos = 1;
                                for ($i = 0; $i < $datos; $i++) {
                                    $muy2Max = 0;
                                    if ($PuyMax == $Py) {
                                        $muy2Max = $topmyy2;
                                    } else if ($PuyMax == $Pcsy) {
                                        $muy2Max = $topmyycs;
                                    } elseif ($PuyMax == $Pcnsy) {
                                        $muy2Max = $topmyycns;
                                    } elseif ($PuyMax == $Pmsy) {
                                        $muy2Max = $topmsmyy;
                                    } else {
                                        $muy2Max = $topmsmnyy;
                                    }
                                    $muy2Maxs[] = $muy2Max;
                                }
                                if (isset($muy2Maxs)) {
                                    foreach ($muy2Maxs as $muy2Max) {
                                        echo "<td class='text-center'>$muy2Max</td>";
                                    }
                                } ?>
                                <td>Ton m</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-hover ">
        <thead class="bg-info text-center">
            <tr>
                <th colspan="4" scope="col" style="vertical-align: middle;" class="text-center">Artículo 10.11.3. <br>
                    Longitud no Arriostrada de un Elemento
                    a Compresión</th>
                <th colspan="5" scope="col" style="vertical-align: middle;" class="text-center">Cálculo de la Esbeltez
                    de la Columna</th>
            </tr>
            <tr>
                <th scope="col" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" style="vertical-align: middle;">DIRECCION</th>
                <th scope="col" style="vertical-align: middle;">Q</th>
                <th scope="col" style="vertical-align: middle;">Verificación del ArriostramientoTipo de Estructura
                    <br>Tipo de Estructura
                </th>
                <th scope="col" style="vertical-align: middle;">Restricción Rotacional en los Extremos</th>
                <th scope="col" style="vertical-align: middle;">k</th>
                <th scope="col" style="vertical-align: middle;">lu (m)</th>
                <th scope="col" style="vertical-align: middle;">(𝒌𝒍_𝒖)/𝒓</th>
                <th scope="col" style="vertical-align: middle;">Verificacion del Articulo 10.11.5.</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th rowspan="2" style="vertical-align: middle;">PISO 1</th>
                <td>Dirección X-X</td>
                <td>0.190</td>
                <td>Con Desplazamiento Lateral</td>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $RREX = "";
                    if ($CDEZ == 1.01) {
                        $RREX = "Biarticulada";
                    } else if ($CDEZ == 0.5) {
                        $RREX = "Empotrado Impedido";
                    } elseif ($CDEZ == 2) {
                        $RREX = "Empotrado y Libre";
                    } elseif ($CDEZ == 1.02) {
                        $RREX = "Empotrado Permitido";
                    } elseif ($CDEZ == 1) {
                        $RREX = "Segun Norma";
                    }
                    $RREXs[] = $RREX;
                }
                if (isset($RREXs)) {
                    foreach ($RREXs as $RREX) {
                        echo "<td class='text-center'>$RREX</td>";
                    }
                }

                ///Valor de K segun normativa
                for ($i = 0; $i < $datos; $i++) {
                    $k = $CDEZ;
                    $ks[] = $k;
                }

                if (isset($ks)) {
                    foreach ($ks as $k) {
                        echo "<td class='text-center'>$k</td>";
                    }
                }
                //Valor de Lu 
                for ($i = 0; $i < $datos; $i++) {
                    $lu = $H;
                    $lus[] = $lu;
                }

                if (isset($lus)) {
                    foreach ($lus as $lu) {
                        echo "<td class='text-center'>$lu</td>";
                    }
                }
                //Scando Formula de Esbeltez por Columna
                for ($i = 0; $i < $datos; $i++) {
                    $ag = $L1 * $L2;
                    $Igx = $L1 * pow($L2, 3) / 12;
                    $Igy = $L2 * pow($L1, 3) / 12;
                    $rx = round(sqrt($Igx / $ag), 2, PHP_ROUND_HALF_UP);
                    $ry = round(sqrt($Igy / $ag), 2, PHP_ROUND_HALF_UP);
                    $klu = round($k * ($lu * 100) / $rx, 2, PHP_ROUND_HALF_UP);
                    $klus[] = $klu;
                }

                if (isset($klus)) {
                    foreach ($klus as $klu) {
                        echo "<td class='text-center'>$klu</td>";
                    }
                }

                //Sacando Condiciones
                for ($i = 0; $i < $datos; $i++) {
                    $verfi = "";

                    if ($klu < 100) {
                        $verfi = "Si Cumple";
                    } else {
                        $verfi = "No Cumple";
                    }

                    $verfis[] = $verfi;
                }

                if (isset($verfis)) {
                    foreach ($verfis as $verfi) {
                        echo "<td class='text-center'>$verfi</td>";
                    }
                }

                ?>
            </tr>
            <tr>
                <td>Dirección Y-Y</td>
                <td>0.116</td>
                <td>Con Desplazamiento Lateral</td>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $RREY = "";
                    if ($CDEZ == 1.01) {
                        $RREY = "Biarticulada";
                    } else if ($CDEZ == 0.5) {
                        $RREY = "Empotrado Impedido";
                    } elseif ($CDEZ == 2) {
                        $RREY = "Empotrado y Libre";
                    } elseif ($CDEZ == 1.02) {
                        $RREY = "Empotrado Permitido";
                    } elseif ($CDEZ == 1) {
                        $RREY = "Segun Norma";
                    }
                    $RREYs[] = $RREY;
                }
                if (isset($RREYs)) {
                    foreach ($RREYs as $RREY) {
                        echo "<td class='text-center'>$RREY</td>";
                    }
                }

                ///Valor de K segun normativa
                for ($i = 0; $i < $datos; $i++) {
                    $ky = $CDEZ;
                    $kys[] = $ky;
                }

                if (isset($kys)) {
                    foreach ($kys as $ky) {
                        echo "<td class='text-center'>$ky</td>";
                    }
                }
                //Valor de Lu 
                for ($i = 0; $i < $datos; $i++) {
                    $luy = $H;
                    $luys[] = $luy;
                }

                if (isset($luys)) {
                    foreach ($luys as $luy) {
                        echo "<td class='text-center'>$luy</td>";
                    }
                }
                //Scando Formula de Esbeltez por Columna
                for ($i = 0; $i < $datos; $i++) {
                    $kluy = round($k * ($lu * 100) / $ry, 2, PHP_ROUND_HALF_UP);
                    $kluys[] = $kluy;
                }

                if (isset($kluys)) {
                    foreach ($kluys as $kluy) {
                        echo "<td class='text-center'>$kluy</td>";
                    }
                }

                //Sacando Condiciones
                for ($i = 0; $i < $datos; $i++) {
                    $verfiy = "";

                    if ($kluy < 100) {
                        $verfiy = "Si Cumple";
                    } else {
                        $verfiy = "No Cumple";
                    }

                    $verfiys[] = $verfiy;
                }

                if (isset($verfiys)) {
                    foreach ($verfiys as $verfiy) {
                        echo "<td class='text-center'>$verfiy</td>";
                    }
                }

                ?>
            </tr>
        </tbody>
    </table>
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    <hr class="bg-red">
    <h3><u><strong>2.0 Condición Biaxial:</strong></u></h3>
    <!-- BIaxial -->
    <table class="table table-bordered table-hover">
        <thead class="bg-info text-center">
            <tr>
                <th colspan="12" scope="col">Condicion Biaxial</th>
            </tr>
            <tr>
                <th scope="col" style="vertical-align: middle;">Nivel</th>
                <th scope="col" style="vertical-align: middle;">ALtura Total "H" (cm)</th>
                <th scope="col" style="vertical-align: middle;">Ast (cm<sup>2</sup>)</th>
                <th scope="col" style="vertical-align: middle;">Ag (cm<sup>2</sup>)</th>
                <th scope="col" style="vertical-align: middle;">Pon (Ton)</th>
                <th scope="col" style="vertical-align: middle;">ØPn máx (Ton)</th>
                <th scope="col" style="vertical-align: middle;">Pnx (Ton)</th>
                <th scope="col" style="vertical-align: middle;">Pny (Ton)</th>
                <th scope="col" style="vertical-align: middle;">0.10ØPon (Ton)</th>
                <th scope="col" style="vertical-align: middle;">Pn (Ton)</th>
                <th scope="col" style="vertical-align: middle;">ØPn (Ton)</th>
                <th scope="col" style="vertical-align: middle;">Verificación del <br> Artículo 10.3.6.3.</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th scope="col">Piso 1</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    //Variables Estaticos
                    $IFy = 0.70;
                    $AlTotal = $H;
                    $AlTotals[] = $AlTotal;
                    //Ast(CM2)
                    $AAceroT = $AAceroTotal;
                    $AAceroTs[] = $AAceroT;
                    //Ag
                    $AgL = $L1 * $L2;
                    $AgLs[] = $AgL;
                    //PON
                    $Pon = round((0.85 * $fc * ($AgL - $AAceroT) + $fy * $AAceroT) / 1000, 2, PHP_ROUND_HALF_UP);
                    $Pons[] = $Pon;
                    //Pon Max
                    $PnMax = round(0.8 * $IFy * $Pon, 2, PHP_ROUND_HALF_UP);
                    $PnMaxs[] = $PnMax;
                    //pnx
                    $pnx = round(0.8 * $Pon, 2, PHP_ROUND_HALF_UP);
                    $pnxs[] = $pnx;
                    //pny
                    $pny = round(0.8 * $Pon, 2, PHP_ROUND_HALF_UP);
                    $pnys[] = $pny;
                    //0.10FyPon
                    $PonFy = round(0.1 * $IFy * $Pon, 2, PHP_ROUND_HALF_UP);
                    $PonFys[] = $PonFy;
                    //pn
                    $Pn = round(1 / ((1 / $pnx) + (1 / $pny) - (1 / $Pon)), 2, PHP_ROUND_HALF_UP);
                    $pns[] = $Pn;
                    //pnFy
                    $pnFy = round($IFy * $Pn, 2, PHP_ROUND_HALF_UP);
                    $pnFys[] = $pnFy;
                    //VerificacionSegunArticulo
                    $VerifiArt = "";
                    if ($pnFy < $PnMax) {
                        $VerifiArt = "Si Cumple";
                    } else {
                        $VerifiArt = "No Cumple,'<br>' Verificar";
                    }
                    $VerifiArts[] = $VerifiArt;

                }
                //Altura Total M
                if (isset($AlTotals)) {
                    foreach ($AlTotals as $AlTotal) {
                        echo "<td class='text-center'>$AlTotal</td>";
                    }
                }
                //Ast(CM2)
                if (isset($AAceroTs)) {
                    foreach ($AAceroTs as $AAceroT) {
                        echo "<td class='text-center'>$AAceroT</td>";
                    }
                }
                //Ag
                if (isset($AgLs)) {
                    foreach ($AgLs as $AgL) {
                        echo "<td class='text-center'>$AgL</td>";
                    }
                }
                //PON
                if (isset($Pons)) {
                    foreach ($Pons as $Pon) {
                        echo "<td class='text-center'>$Pon</td>";
                    }
                }
                //Pn Max fy
                if (isset($PnMaxs)) {
                    foreach ($PnMaxs as $PnMax) {
                        echo "<td class='text-center'>$PnMax</td>";
                    }
                }
                //pnx
                if (isset($pnxs)) {
                    foreach ($pnxs as $pnx) {
                        echo "<td class='text-center'>$pnx</td>";
                    }
                }
                //pny
                if (isset($pnys)) {
                    foreach ($pnys as $pny) {
                        echo "<td class='text-center'>$pny</td>";
                    }
                }
                //0.10FyPon
                if (isset($PonFys)) {
                    foreach ($PonFys as $PonFy) {
                        echo "<td class='text-center'>$PonFy</td>";
                    }
                }
                //pn
                if (isset($pns)) {
                    foreach ($pns as $pn) {
                        echo "<td class='text-center'>$pn</td>";
                    }
                }
                //FyPn
                if (isset($pnFys)) {
                    foreach ($pnFys as $pnFy) {
                        echo "<td class='text-center'>$pnFy</td>";
                    }
                }
                //Verificar Segun Articulo
                if (isset($VerifiArts)) {
                    foreach ($VerifiArts as $VerifiArt) {
                        echo "<td class='text-center'>$VerifiArt</td>";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>
  <!-- CONDICION BIAXIAL -->
    <table class="table table-responsive table-bordered">
        <thead class="bg-info text-center">
            <tr>
                <th colspan="7" class="text-left">Columna C-01 Piso 1</th>
            </tr>
            <tr>
                <th scope="col">Combinaciones <br> de Carga</th>
                <th scope="col">Pux (Ton)</th>
                <th scope="col">Py (Ton)</th>
                <th scope="col">rx</th>
                <th scope="col">ry</th>
                <th scope="col">Verificacion del <br>Articulo 10.3.7 <br>Direccion X-X</th>
                <th scope="col">Verificacion del <br>Articulo 10.3.7 <br>Direccion Y-Y</th>
            </tr>
        </thead>
        <tbody class="text.center">
            <tr>
                <th scope="col">1.40CM+1.70CV</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $CFCb = "";
                    $CFCby = "";
                    $VerifArtCCx = "";
                    $VerifArtCCy = "";
                    $veriRx = "";
                    $veriRy = "";

                    if ($P >= $PonFy) {
                        $CFCb = $P;
                    } else {
                        $CFCb = "-";
                    }
                    $CFCbs[] = $CFCb;

                    //Condicion para ver si es dieño por flexo-compresion o condicion biaxial
                    if ($Py >= $PonFy) {
                        $CFCby = $Py;
                    } else {
                        $CFCby = "-";
                    }
                    $CFCbys[] = $CFCby;

                    //Sacar rx
                    if ($CFCb == "-") {
                        $veriRx = "-";
                    } else {
                        $veriRx = round($CFCb / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }
                    $veriRxs[] = $veriRx;
                    //Sacar ry
                    if ($CFCby == "-") {
                        $veriRy = "-";
                    } else {
                        $veriRy = round($CFCb / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }
                    $veriRys[] = $veriRy;
                    //Condiciones
                    //vERIFICACION EN EJE X 
                    if ($CFCb == "-") {
                        $VerifArtCCx = "SI CUMPLE";
                    } else {
                        if ($veriRx <= 1) {
                            $VerifArtCCx = "SI CUMPLE";
                        } else {
                            $VerifArtCCx = "NO CUMPLE <br> Verificar";
                        }
                    }
                    $VerifArtCCxs[] = $VerifArtCCx;

                    //Verificacion en eje y
                    if ($CFCby == "-") {
                        $VerifArtCCy = "SI CUMPLE";
                    } else {
                        if ($veriRy <= 1) {
                            $VerifArtCCy = "SI CUMPLE";
                        } else {
                            $VerifArtCCy = "NO CUMPLE <br> Verificar";
                        }
                    }
                    $VerifArtCCys[] = $VerifArtCCy;
                }
                //Verificacion en eje X
                if (isset($CFCbs)) {
                    foreach ($CFCbs as $CFCb) {
                        echo "<td class='text-center'>$CFCb</td>";
                    }
                }
                //Verificacion en eje Y
                if (isset($CFCbys)) {
                    foreach ($CFCbys as $CFCby) {
                        echo "<td class='text-center'>$CFCby</td>";
                    }
                }
                //Verificar Rx
                if (isset($veriRxs)) {
                    foreach ($veriRxs as $veriRx) {
                        echo "<td class='text-center'>$veriRx</td>";
                    }
                }
                //verificar ry
                if (isset($veriRys)) {
                    foreach ($veriRys as $veriRy) {
                        echo "<td class='text-center'>$veriRy</td>";
                    }
                }
                //Verificacions de Cumplimiento Segun las normas
                if (isset($VerifArtCCxs)) {
                    foreach ($VerifArtCCxs as $VerifArtCCx) {
                        echo "<td class='text-center'>$VerifArtCCx</td>";
                    }
                }
                //Verificacion en eje Y
                if (isset($VerifArtCCys)) {
                    foreach ($VerifArtCCys as $VerifArtCCy) {
                        echo "<td class='text-center'>$VerifArtCCy</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">1.25(CM+CV)+CS</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $CFCsb = "";
                    $CFCsby = "";
                    $VerifArtCCsx = "";
                    $VerifArtCCsy = "";
                    $veriRx = "";
                    $veriRy = "";

                    if ($Pc >= $PonFy) {
                        $CFCsb = $Pc;
                    } else {
                        $CFCsb = "-";
                    }
                    $CFCsbs[] = $CFCsb;

                    //Condicion para ver si es dieño por flexo-compresion o condicion biaxial
                    if ($Pcsy >= $PonFy) {
                        $CFCsby = $Pcsy;
                    } else {
                        $CFCby = "-";
                    }
                    $CFCsbys[] = $CFCsby;

                    //Sacar rx
                    if ($CFCsb == "-") {
                        $veriRsx = "-";
                    } else {
                        $veriRsx = round($CFCsb / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }
                    $veriRsxs[] = $veriRsx;
                    //Sacar ry
                    if ($CFCsby == "-") {
                        $veriRsy = "-";
                    } else {
                        $veriRsy = round($CFCsby / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }
                    $veriRsys[] = $veriRsy;
                    //Condiciones
                
                    //vERIFICACION EN EJE X 
                    if ($CFCsb == "-") {
                        $VerifArtCCsx = "-";
                    } else {
                        if ($veriRsx <= 1) {
                            $VerifArtCCsx = "SI CUMPLE";
                        } else {
                            $VerifArtCCsx = "NO CUMPLE <br> Verificar";
                        }
                    }

                    $VerifArtCCsxs[] = $VerifArtCCsx;

                    //Verificacion en eje y
                    if ($CFCsby == "-") {
                        $VerifArtCCsy = "-";
                    } else {
                        if ($veriRy <= 1) {
                            $VerifArtCCsy = "SI CUMPLE";
                        } else {
                            $VerifArtCCsy = "NO CUMPLE <br> Verificar";
                        }
                    }

                    $VerifArtCCsys[] = $VerifArtCCsy;
                }
                //Verificacion en eje X
                if (isset($CFCsbs)) {
                    foreach ($CFCsbs as $CFCsb) {
                        echo "<td class='text-center'>$CFCsb</td>";
                    }
                }
                //Verificacion en eje Y
                if (isset($CFCsbys)) {
                    foreach ($CFCsbys as $CFCsby) {
                        echo "<td class='text-center'>$CFCsby</td>";
                    }
                }
                //Verificar Rx
                if (isset($veriRsxs)) {
                    foreach ($veriRsxs as $veriRsx) {
                        echo "<td class='text-center'>$veriRsx</td>";
                    }
                }
                //verificar ry
                if (isset($veriRsys)) {
                    foreach ($veriRsys as $veriRsy) {
                        echo "<td class='text-center'>$veriRsy</td>";
                    }
                }
                //Verificacion en eje X
                if (isset($VerifArtCCsxs)) {
                    foreach ($VerifArtCCsxs as $VerifArtCCsx) {
                        echo "<td class='text-center'>$VerifArtCCsx</td>";
                    }
                }
                //Verificacion en eje Y
                if (isset($VerifArtCCsys)) {
                    foreach ($VerifArtCCsys as $VerifArtCCsy) {
                        echo "<td class='text-center'>$VerifArtCCsy</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">1.25(CM+CV)-CS</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $CFCsnb = "";
                    $CFCsnby = "";
                    $VerifArtCCnx = "";
                    $VerifArtCCny = "";
                    $verisRx = "";
                    $verisRy = "";

                    if ($Pcn >= $PonFy) {
                        $CFCsnb = $Pcn;
                    } else {
                        $CFCsnb = "-";
                    }
                    $CFCsnbs[] = $CFCsnb;

                    //Condicion para ver si es dieño por flexo-compresion o condicion biaxial
                    if ($Pcnsy >= $PonFy) {
                        $CFCsnby = $Pcnsy;
                    } else {
                        $CFCnby = "-";
                    }
                    $CFCsnbys[] = $CFCsnby;

                    //Sacar rx
                    if ($CFCsnb == "-") {
                        $verisRx = "-";
                    } else {
                        $verisRx = round($CFCsnb / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }
                    $verisRxs[] = $verisRx;
                    //Sacar ry
                    if ($CFCsnby == "-") {
                        $verisRy = "-";
                    } else {
                        $verisRy = round($CFCsnby / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }
                    $verisRys[] = $verisRy;
                    //Condiciones
                
                    //vERIFICACION EN EJE X 
                    if ($CFCsnb == "-") {
                        $VerifArtCCnx = "-";
                    } else {
                        if ($verisRx <= 1) {
                            $VerifArtCCnx = "SI CUMPLE";
                        } else {
                            $VerifArtCCnx = "NO CUMPLE <br> Verificar";
                        }
                    }

                    $VerifArtCCnxs[] = $VerifArtCCnx;

                    //Verificacion en eje y
                    if ($CFCsnby == "-") {
                        $VerifArtCCny = "-";
                    } else {
                        if ($verisRy <= 1) {
                            $VerifArtCCny = "SI CUMPLE";
                        } else {
                            $VerifArtCCny = "NO CUMPLE <br> Verificar";
                        }
                    }

                    $VerifArtCCnys[] = $VerifArtCCny;
                }
                //Verificacion en eje X
                if (isset($CFCsnbs)) {
                    foreach ($CFCsnbs as $CFCsnb) {
                        echo "<td class='text-center'>$CFCsnb</td>";
                    }
                }
                //Verificacion en eje Y
                if (isset($CFCsnbys)) {
                    foreach ($CFCsnbys as $CFCsnby) {
                        echo "<td class='text-center'>$CFCsnby</td>";
                    }
                }
                //Verificar Rx
                if (isset($verisRxs)) {
                    foreach ($verisRxs as $verisRx) {
                        echo "<td class='text-center'>$verisRx</td>";
                    }
                }
                //verificar ry
                if (isset($verisRys)) {
                    foreach ($verisRys as $verisRy) {
                        echo "<td class='text-center'>$verisRy</td>";
                    }
                }
                //Verificacion en eje X
                if (isset($VerifArtCCnxs)) {
                    foreach ($VerifArtCCnxs as $VerifArtCCnx) {
                        echo "<td class='text-center'>$VerifArtCCnx</td>";
                    }
                }
                //Verificacion en eje Y
                if (isset($VerifArtCCnys)) {
                    foreach ($VerifArtCCnys as $VerifArtCCny) {
                        echo "<td class='text-center'>$VerifArtCCny</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">0.90CM+CS</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $cccxs = "";
                    $cccys = "";
                    $VerifArtCCmx = "";
                    $VerifArtCCmy = "";
                    $vericsRx = "";
                    $vericsRy = "";

                    if ($Pms >= $PonFy) {
                        $cccxs = $Pms;
                    } else {
                        $cccxs = "-";
                    }
                    $cccxss[] = $cccxs;

                    //Condicion para ver si es dieño por flexo-compresion o condicion biaxial
                    if ($Pmsy >= $PonFy) {
                        $cccys = $Pmsy;
                    } else {
                        $cccys = "-";
                    }
                    $cccyss[] = $cccys;

                    //Sacar rx
                    if ($cccxs == "-") {
                        $vericsRx = "-";
                    } else {
                        $vericsRx = round($CFcccxsCsnb / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }
                    $vericsRxs[] = $vericsRx;
                    //Sacar ry
                    if ($cccys == "-") {
                        $vericsRy = "-";
                    } else {
                        $vericsRy = round($cccys / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }
                    $vericsRys[] = $vericsRy;
                    //Condiciones
                
                    //vERIFICACION EN EJE X 
                    if ($cccxs == "-") {
                        $VerifArtCCmx = "-";
                    } else {
                        if ($vericsRx <= 1) {
                            $VerifArtCCmx = "SI CUMPLE";
                        } else {
                            $VerifArtCCmx = "NO CUMPLE <br> Verificar";
                        }
                    }

                    $VerifArtCCmxs[] = $VerifArtCCmx;

                    //Verificacion en eje y
                    if ($cccys == "-") {
                        $VerifArtCCmy = "-";
                    } else {
                        if ($vericsRy <= 1) {
                            $VerifArtCCmy = "SI CUMPLE";
                        } else {
                            $VerifArtCCmy = "NO CUMPLE <br> Verificar";
                        }
                    }

                    $VerifArtCCmys[] = $VerifArtCCmy;
                }
                //Verificacion en eje X
                if (isset($cccxss)) {
                    foreach ($cccxss as $cccxs) {
                        echo "<td class='text-center'>$cccxs</td>";
                    }
                }
                //Verificacion en eje Y
                if (isset($cccyss)) {
                    foreach ($cccyss as $cccys) {
                        echo "<td class='text-center'>$cccys</td>";
                    }
                }
                //Verificar Rx
                if (isset($vericsRxs)) {
                    foreach ($vericsRxs as $vericsRx) {
                        echo "<td class='text-center'>$vericsRx</td>";
                    }
                }
                //verificar ry
                if (isset($vericsRys)) {
                    foreach ($vericsRys as $vericsRy) {
                        echo "<td class='text-center'>$vericsRy</td>";
                    }
                }
                //Verificacion en eje X
                if (isset($VerifArtCCmxs)) {
                    foreach ($VerifArtCCmxs as $VerifArtCCmx) {
                        echo "<td class='text-center'>$VerifArtCCmx</td>";
                    }
                }
                //Verificacion en eje Y
                if (isset($VerifArtCCmys)) {
                    foreach ($VerifArtCCmys as $VerifArtCCmy) {
                        echo "<td class='text-center'>$VerifArtCCmy</td>";
                    }
                }
                ?>
            </tr>
            <tr>
                <th scope="col">0.90CM-CS</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $cccx1 = "";
                    $cccy1 = "";
                    $VerifArtCCmx = "";
                    $VerifArtCCmy = "";
                    $verics1Rx = "";
                    $verics1Ry = "";

                    if ($Pmns >= $PonFy) {
                        $cccx1 = $Pmns;
                    } else {
                        $cccx1 = "-";
                    }
                    $cccx1s[] = $cccx1;

                    //Condicion para ver si es dieño por flexo-compresion o condicion biaxial
                    if ($Pmnsy >= $PonFy) {
                        $cccy1 = $Pmnsy;
                    } else {
                        $cccy1 = "-";
                    }
                    $cccy1s[] = $cccy1;

                    //Sacar rx
                    if ($cccx1 == "-") {
                        $verics1Rx = "-";
                    } else {
                        $verics1Rx = round($cccx1 / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }
                    $verics1Rxs[] = $verics1Rx;
                    //Sacar ry
                    if ($cccy1 == "-") {
                        $verics1Ry = "-";
                    } else {
                        $verics1Ry = round($cccy1 / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }
                    $verics1Rys[] = $verics1Ry;

                    //Condiciones
                
                    if ($Pmns == "-") {
                        $VerifArtCCmnx = "-";
                    } else {
                        if ($cccx1 <= 1) {
                            $VerifArtCCmnx = "SI CUMPLE";
                        } else {
                            $VerifArtCCmnx = "NO CUMPLE <br> Verificar";
                        }
                    }

                    $VerifArtCCmnxs[] = $VerifArtCCmnx;

                    //Verificacion en eje y
                    if ($Pmnsy == "-") {
                        $VerifArtCCmny = "-";
                    } else {
                        if ($cccy1 <= 1) {
                            $VerifArtCCmny = "SI CUMPLE";
                        } else {
                            $VerifArtCCmny = "NO CUMPLE <br> Verificar";
                        }
                    }

                    $VerifArtCCmnys[] = $VerifArtCCmny;
                }
                //Verificacion en eje X
                if (isset($cccx1s)) {
                    foreach ($cccx1s as $cccx1) {
                        echo "<td class='text-center'>$cccx1</td>";
                    }
                }
                //Verificacion en eje Y
                if (isset($cccy1s)) {
                    foreach ($cccy1s as $cccy1) {
                        echo "<td class='text-center'>$cccy1</td>";
                    }
                }
                //Verificar Rx
                if (isset($verics1Rxs)) {
                    foreach ($verics1Rxs as $verics1Rx) {
                        echo "<td class='text-center'>$verics1Rx</td>";
                    }
                }
                //verificar ry
                if (isset($verics1Rys)) {
                    foreach ($verics1Rys as $verics1Ry) {
                        echo "<td class='text-center'>$verics1Ry</td>";
                    }
                }
                //Verificacion en eje X
                if (isset($VerifArtCCmnxs)) {
                    foreach ($VerifArtCCmnxs as $VerifArtCCmnx) {
                        echo "<td class='text-center'>$VerifArtCCmnx</td>";
                    }
                }
                //Verificacion en eje Y
                if (isset($VerifArtCCmnys)) {
                    foreach ($VerifArtCCmnys as $VerifArtCCmny) {
                        echo "<td class='text-center'>$VerifArtCCmny</td>";
                    }
                }
                ?>
            </tr>

        </tbody>
    </table>

    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    <hr class="bg-red">
    <h3><u><strong>3.0 Diseño por Corte:</strong></u></h3>
    <h2 class="text-center"><strong>Analisis en Direccion "X"</strong></h2>

    <!-- Columa por Corte  En eje X-->
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="text-center bg-info">
                <th scope="col" colspan="16">Diseño por CORTE</th>
            </tr>
            <tr class="text-center bg-info">
                <th scope="col" rowspan="3" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Altura Libre <br> "hn" (m)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Pu info (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Pu Sup (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Mu info (Ton.m)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Mu sup (Ton.m)</th>
                <th scope="col" colspan="4" style="vertical-align: middle;">Artículo 21.4.3. & 21.6.5.1. <br> Fuerzas
                    Cortantes de Diseño</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vu (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vud (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vud Etaps (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vud Max (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vc (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Verificacion de Utilizacion <br> de Estribos
                </th>
            </tr>
            <tr class="text-center bg-info">
                <th colspan="2" scope="col">caso I</th>
                <th colspan="2" scope="col">caso II</th>
            </tr>
            <tr class="text-center bg-info">
                <th scope="col">Mpri</th>
                <th scope="col">Mprs</th>
                <th scope="col">Mpri</th>
                <th scope="col">Mprs</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th>Piso 1</th>
                <th>
                    <?php echo "$H" ?>
                </th>
                <th>
                    <?php echo "$puinf" ?>
                </th>
                <th>
                    <?php echo "$pusup" ?>
                </th>
                <th>
                    <?php echo "$Mninf" ?>
                </th>
                <th>
                    <?php echo "$Mnsup" ?>
                </th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $dx = $L1 - 6;
                    $dy = $L2 - 6;
                    //CASO I
                    //Mpri Valores Unicos
                    $Mpri = 0;
                    if ($SEstru == "Porticos") {
                        $Mpri = 125 * $Mninf;
                    } else if ($SEstru == "DualTipI") {
                        $Mpri = $Mninf;
                    } elseif ($SEstru == "DualTipII") {
                        $Mpri = 125 * $Mninf;
                    } elseif ($SEstru == "MEstructurales") {
                        $Mpri = $Mninf;
                    }
                    $Mpris[] = $Mpri;

                    //Mpri Valores Unicos
                    $Mpr = 0;
                    if ($SEstru == "Porticos") {
                        $Mpr = 125 * $Mnsup;
                    } else if ($SEstru == "DualTipI") {
                        $Mpr = $Mnsup;
                    } elseif ($SEstru == "DualTipII") {
                        $Mpr = 125 * $Mnsup;
                    } elseif ($SEstru == "MEstructurales") {
                        $Mpr = $Mnsup;
                    }
                    $Mprs[] = $Mpr;
                    //CASO II
                    //Mpri Valores Unicos
                    $MpriII = 0;
                    if ($SEstru == "Porticos") {
                        $MpriII = 125 * $Mninf;
                    } else if ($SEstru == "DualTipI") {
                        $MpriII = $Mninf;
                    } elseif ($SEstru == "DualTipII") {
                        $MpriII = 125 * $Mninf;
                    } elseif ($SEstru == "MEstructurales") {
                        $MpriII = $Mninf;
                    }
                    $MpriIIs[] = $MpriII;

                    //Mpri Valores Unicos
                    $MprII = 0;
                    if ($SEstru == "Porticos") {
                        $MprII = 125 * $Mnsup;
                    } else if ($SEstru == "DualTipI") {
                        $MprII = $Mnsup;
                    } elseif ($SEstru == "DualTipII") {
                        $MprII = 125 * $Mnsup;
                    } elseif ($SEstru == "MEstructurales") {
                        $MprII = $Mnsup;
                    }
                    $MprIIs[] = $MprII;

                    $VN = round(max(($Mpri + $Mpr) / $H, ($MpriII + $MprII) / $H), 2, PHP_ROUND_HALF_UP);
                    $VNs[] = $VN;

                    $VUD = round($VN * (0.5 * $H - ($dx / 100)) / (0.5 * $H), 2, PHP_ROUND_HALF_UP);
                    $VUDs[] = $VUD;
                }
                //caso I
                if (isset($Mpris)) {
                    foreach ($Mpris as $Mpri) {
                        echo "<td class='text-center'>$Mpri</td>";
                    }
                }
                //Mprs
                if (isset($Mprs)) {
                    foreach ($Mprs as $Mpr) {
                        echo "<td class='text-center'>$Mpr</td>";
                    }
                }

                //caso II
                if (isset($MpriIIs)) {
                    foreach ($MpriIIs as $MpriII) {
                        echo "<td class='text-center'>$MpriII</td>";
                    }
                }
                //Mprs caso II
                if (isset($MprIIs)) {
                    foreach ($MprIIs as $MprII) {
                        echo "<td class='text-center'>$MprII</td>";
                    }
                }

                //------------------
                if (isset($VNs)) {
                    foreach ($VNs as $VN) {
                        echo "<td class='text-center'>$VN</td>";
                    }
                }
                //-----
                if (isset($VUDs)) {
                    foreach ($VUDs as $VUD) {
                        echo "<td class='text-center'>$VUD</td>";
                    }
                }
                ?>
                <th>
                    <?php echo "$VudEtap" ?>
                </th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $VUMAX = max($VUD, $VudEtap);
                    $VUMAXs[] = $VUMAX;

                    $VC = round(0.53 * sqrt($fc) * (1 + (MAX($puinf, $pusup) * 1000) / (140 * $L1 * $L2)) * $L2 * $dx / 1000, 2, PHP_ROUND_HALF_UP);
                    $VCs[] = $VC;

                    $VerifiUtEstribo = "";
                    if ($VUMAX > 0.70 * $VC) {
                        $VerifiUtEstribo = "Necesita Estribos";
                    } else {
                        $VerifiUtEstribo = "Refuerzo Mínimo";
                    }
                    $VerifiUtEstribos[] = $VerifiUtEstribo;

                }
                //
                if (isset($VUMAXs)) {
                    foreach ($VUMAXs as $VUMAX) {
                        echo "<td class='text-center'>$VUMAX</td>";
                    }
                }
                //VerifiUtEstribos
                if (isset($VCs)) {
                    foreach ($VCs as $VC) {
                        echo "<td class='text-center'>$VC</td>";
                    }
                }
                //Verificacion de utilizacion de estribos
                if (isset($VerifiUtEstribos)) {
                    foreach ($VerifiUtEstribos as $VerifiUtEstribo) {
                        echo "<td class='text-center'>$VerifiUtEstribo</td>";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>

    <!-- S -->
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="text-center bg-info">
                <th scope="col" rowspan="3" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vs (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vs Máx (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Artículo 11.5.7.9. <br>Verificación del Vs
                    máx</th>
                <th scope="col" colspan="3" style="vertical-align: middle;">Acero de Etribos</th>
                <th scope="col" colspan="3" style="vertical-align: middle;">Acero Longitudinal</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">N° de Ramales de Estribos</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Av (cm<Sup>2</Sup>)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">So (cm)</th>
            </tr>
            <tr class="text-center bg-info">
                <th scope="col" style="vertical-align: middle;">Acero</th>
                <th scope="col" style="vertical-align: middle;">D (cm)</th>
                <th scope="col" style="vertical-align: middle;">Área (cm<Sup>2</Sup>)</th>
                <th scope="col" style="vertical-align: middle;">Acero</th>
                <th scope="col" style="vertical-align: middle;">D (cm)</th>
                <th scope="col" style="vertical-align: middle;">Área (cm<Sup>2</Sup>)</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th>Piso 1</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $VsRef = 0;
                    if ($VerifiUtEstribo == "Refuerzo Mínimo") {
                        $VsRef = 0;
                    } else {
                        $VsRef = round($VUMAX / 0.70 - $VC, 2, PHP_ROUND_HALF_UP);
                    }
                    $VsRefs[] = $VsRef;

                    $VsRefMax = round(2.1 * sqrt($fc) * $L2 * $dx / 1000, 2, PHP_ROUND_HALF_UP);
                    $VsRefMaxs[] = $VsRefMax;

                    $VerifArticulo = "";
                    if ($VsRef <= $VsRefMax) {
                        $VerifArticulo = "Si Cumple";
                    } else {
                        $VerifArticulo = "No Cumple, <br>Verificar";
                    }
                    $VerifArticulos[] = $VerifArticulo;

                    $AceroEstribo = "";
                    if ($AEstribos == 0.28) {
                        $AceroEstribo = "6mm";
                    } else if ($AEstribos == 1.13) {
                        $AceroEstribo = "12mm";
                    } else if ($AEstribos == 0.50) {
                        $AceroEstribo = "8mm";
                    } else if ($AEstribos == 0.71) {
                        $AceroEstribo = "ø3/8";
                    } else if ($AEstribos == 1.27) {
                        $AceroEstribo = "ø1/2";
                    } else if ($AEstribos == 1.98) {
                        $AceroEstribo = "ø5/8";
                    } else if ($AEstribos == 2.85) {
                        $AceroEstribo = "ø3/4";
                    } else if ($AEstribos == 5.10) {
                        $AceroEstribo = "ø1";
                    } else if ($AEstribos == 7.92) {
                        $AceroEstribo = "ø1 1/4";
                    } else if ($AEstribos == 11.40) {
                        $AceroEstribo = "ø1 1/2";
                    }
                    $AceroEstribos[] = $AceroEstribo;

                    $DiaAcero = 0;
                    if ($AEstribos == 0.28) {
                        $DiaAcero = 0.6;
                    } else if ($AEstribos == 1.13) {
                        $DiaAcero = 1.2;
                    } else if ($AEstribos == 0.50) {
                        $DiaAcero = 0.8;
                    } else if ($AEstribos == 0.71) {
                        $DiaAcero = 0.95;
                    } else if ($AEstribos == 1.27) {
                        $DiaAcero = 1.27;
                    } else if ($AEstribos == 1.98) {
                        $DiaAcero = 1.59;
                    } else if ($AEstribos == 2.85) {
                        $DiaAcero = 1.9;
                    } else if ($AEstribos == 5.10) {
                        $DiaAcero = 2.54;
                    } else if ($AEstribos == 7.92) {
                        $DiaAcero = 3.175;
                    } else if ($AEstribos == 11.40) {
                        $DiaAcero = 3.81;
                    }
                    $DiaAceros[] = $DiaAcero;

                    //Aceros Maximo Longitudinal
                    $aceroMxLon = "";
                    if ($AaceromaxLong == 0.28) {
                        $aceroMxLon = "6mm";
                    } else if ($AaceromaxLong == 1.13) {
                        $aceroMxLon = "12mm";
                    } else if ($AaceromaxLong == 0.50) {
                        $aceroMxLon = "8mm";
                    } else if ($AaceromaxLong == 0.71) {
                        $aceroMxLon = "ø3/8";
                    } else if ($AaceromaxLong == 1.27) {
                        $aceroMxLon = "ø1/2";
                    } else if ($AaceromaxLong == 1.98) {
                        $aceroMxLon = "ø5/8";
                    } else if ($AaceromaxLong == 2.85) {
                        $aceroMxLon = "ø3/4";
                    } else if ($AaceromaxLong == 5.10) {
                        $aceroMxLon = "ø1";
                    } else if ($AaceromaxLong == 7.92) {
                        $aceroMxLon = "ø1 1/4";
                    } else if ($AaceromaxLong == 11.40) {
                        $aceroMxLon = "ø1 1/2";
                    }
                    $aceroMxLons[] = $aceroMxLon;

                    $DiaAceroMxLong = 0;
                    if ($AaceromaxLong == 0.28) {
                        $DiaAceroMxLong = 0.6;
                    } else if ($AaceromaxLong == 1.13) {
                        $DiaAceroMxLong = 1.2;
                    } else if ($AaceromaxLong == 0.50) {
                        $DiaAceroMxLong = 0.8;
                    } else if ($AaceromaxLong == 0.71) {
                        $DiaAceroMxLong = 0.95;
                    } else if ($AaceromaxLong == 1.27) {
                        $DiaAceroMxLong = 1.27;
                    } else if ($AaceromaxLong == 1.98) {
                        $DiaAceroMxLong = 1.59;
                    } else if ($AaceromaxLong == 2.85) {
                        $DiaAceroMxLong = 1.9;
                    } else if ($AaceromaxLong == 5.10) {
                        $DiaAceroMxLong = 2.54;
                    } else if ($AaceromaxLong == 7.92) {
                        $DiaAceroMxLong = 3.175;
                    } else if ($AaceromaxLong == 11.40) {
                        $DiaAceroMxLong = 3.81;
                    }
                    $DiaAceroMxLongs[] = $DiaAceroMxLong;
                    $ach = $dx * $dy;
                    $Ac = 30;
                    $bc = 20;
                    $spaciamiento = 10;
                    $Ash1 = round(0.3 * $spaciamiento * $bc * $fc / $fy * ($ag / $ach - 1), 2, PHP_ROUND_HALF_UP);
                    $Ash2 = 0.09 * $spaciamiento * $bc * $fc / $fy;
                    $nRe = round((MAX($Ash2, $Ash1) / $DiaAcero));
                    $nRes[] = $nRe;

                    $AV = $nRe * $AEstribos;
                    $AVS[] = $AV;

                    $So = "";
                    if ($VerifiUtEstribo == "Refuerzo Mínimo") {
                        $So = "-";
                    } else {
                        $So = round($AV * $fy * $dx / ($VsRef * 1000), 2, PHP_ROUND_HALF_UP);
                    }
                    $Sos[] = $So;

                }
                //caso I
                if (isset($VsRefs)) {
                    foreach ($VsRefs as $VsRef) {
                        echo "<td class='text-center'>$VsRef</td>";
                    }
                }
                //
                if (isset($VsRefMaxs)) {
                    foreach ($VsRefMaxs as $VsRefMax) {
                        echo "<td class='text-center'>$VsRefMax</td>";
                    }
                }
                //
                if (isset($VerifArticulos)) {
                    foreach ($VerifArticulos as $VerifArticulo) {
                        echo "<td class='text-center'>$VerifArticulo</td>";
                    }
                }
                if (isset($AceroEstribos)) {
                    foreach ($AceroEstribos as $AceroEstribo) {
                        echo "<td class='text-center'>$AceroEstribo</td>";
                    }
                }
                if (isset($DiaAceros)) {
                    foreach ($DiaAceros as $DiaAcero) {
                        echo "<td class='text-center'>$DiaAcero</td>";
                    }
                }
                echo "<td class='text-center'>$AEstribos</td>";
                if (isset($aceroMxLons)) {
                    foreach ($aceroMxLons as $aceroMxLon) {
                        echo "<td class='text-center'>$aceroMxLon</td>";
                    }
                }
                if (isset($DiaAceroMxLongs)) {
                    foreach ($DiaAceroMxLongs as $DiaAceroMxLong) {
                        echo "<td class='text-center'>$DiaAceroMxLong</td>";
                    }
                }
                echo "<td class='text-center'>$AaceromaxLong</td>";

                if (isset($nRes)) {
                    foreach ($nRes as $nRe) {
                        echo "<td class='text-center'>$nRe</td>";
                    }
                }
                if (isset($AVS)) {
                    foreach ($AVS as $AV) {
                        echo "<td class='text-center'>$AV</td>";
                    }
                }
                if (isset($Sos)) {
                    foreach ($Sos as $So) {
                        echo "<td class='text-center'>$So</td>";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>

    <!-- Segun Ariticulo -->
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="text-center bg-info">
                <th scope="col" rowspan="3" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" colspan="7" style="vertical-align: middle;">Artículo 21.4.5.3. y/o Artículo 21.6.4.2 / 21.6.4.4. <br>Separación de Estribos por Confinamiento</th>
                <th scope="col" colspan="4" style="vertical-align: middle;">Artículo 7.10.5.2. <br>Espaciamiento Vertical de Estribos Máximo</th>
                <th scope="col" colspan="4" style="vertical-align: middle;">Artículo 11.5.5.1.<br>Espaciamiento Vertical de Estribos Máximo</th>
            </tr>
            <tr class="text-center bg-info">
                <th scope="col" colspan="3" style="vertical-align: middle;">Zona de Confinamiento "Lo" (cm)</th>
                <th scope="col" colspan="3" style="vertical-align: middle;">Zona de Confinamiento "So" (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">SI1 (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx 1 (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx 2 (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx 3 (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx 4 (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx 5 (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx 6(cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx (cm)</th>

            </tr>
            <tr class="text-center bg-info">
                <th scope="col" style="vertical-align: middle;">Lo1</th>
                <th scope="col" style="vertical-align: middle;">Lo2</th>
                <th scope="col" style="vertical-align: middle;">Lo3</th>
                <th scope="col" style="vertical-align: middle;">So1</th>
                <th scope="col" style="vertical-align: middle;">So2</th>
                <th scope="col" style="vertical-align: middle;">So3</th>

            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th>Piso 1</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $lo3 = 50;
                    $so3 = 10;
                    $sII = 30;
                    $Smax6 = 60;
                    $lo1 = round($H * 100 / 6, 2, PHP_ROUND_HALF_UP);
                    $lo1s[] = $lo1;

                    $lo2 = max($L1, $L2);
                    $lo2s[] = $lo2;

                    $ZconfinaSo = 0;
                    if ($SEstru == "Porticos") {
                        $ZconfinaSo = 6 * $AaceromaxLong;
                    } else if ($SEstru == "DualTipI") {
                        $ZconfinaSo = 8 * $AaceromaxLong;
                    } elseif ($SEstru == "DualTipII") {
                        $ZconfinaSo = 6 * $AaceromaxLong;
                    } elseif ($SEstru == "MEstructurales") {
                        $ZconfinaSo = 8 * $AaceromaxLong;
                    }
                    $ZconfinaSos[] = $ZconfinaSo;

                    $ZconfinaSo2 = 0;
                    if ($SEstru == "Porticos") {
                        $ZconfinaSo2 = min($L1, $L2) / 3;
                    } else if ($SEstru == "DualTipI") {
                        $ZconfinaSo2 = 0.5 * min($L1, $L2);
                    } elseif ($SEstru == "DualTipII") {
                        $ZconfinaSo2 = min($L1, $L2) / 3;
                    } elseif ($SEstru == "MEstructurales") {
                        $ZconfinaSo2 = 0.5 * min($L1, $L2);
                    }
                    $ZconfinaSo2s[] = $ZconfinaSo2;

                    $Smax = 16 * $DiaAceroMxLong;
                    $Smaxs[] = $Smax;

                    $Smax2 = 48 * $DiaAcero;
                    $Smax2s[] = $Smax2;

                    $Smax3 = MIN($L1, $L2);
                    $Smax3s[] = $Smax3;

                    $Smaxx = MIN($Smax, $Smax2, $Smax3);
                    $Smaxxs[] = $Smaxx;

                    $Smax4 = $dx / 2;
                    $Smax4s[] = $Smax4;

                    $Smax5 = $dy / 2;
                    $Smax5s[] = $Smax5;

                    $Smax7 = min($Smax4, $Smax5, $Smax6);
                    $Smax7s[] = $Smax7;

                }
                //caso I
                if (isset($lo1s)) {
                    foreach ($lo1s as $lo1) {
                        echo "<td class='text-center'>$lo1</td>";
                    }
                }
                //
                if (isset($lo2s)) {
                    foreach ($lo2s as $lo2) {
                        echo "<td class='text-center'>$lo2</td>";
                    }
                }
                //
                echo "<td class='text-center'>$lo3</td>";
                //
                if (isset($ZconfinaSos)) {
                    foreach ($ZconfinaSos as $ZconfinaSo) {
                        echo "<td class='text-center'>$ZconfinaSo</td>";
                    }
                }

                if (isset($ZconfinaSo2s)) {
                    foreach ($ZconfinaSo2s as $ZconfinaSo2) {
                        echo "<td class='text-center'>$ZconfinaSo2</td>";
                    }
                }
                echo "<td class='text-center'>$so3</td>";
                echo "<td class='text-center'>$sII</td>";

                if (isset($Smaxs)) {
                    foreach ($Smaxs as $Smax) {
                        echo "<td class='text-center'>$Smax</td>";
                    }
                }
                if (isset($Smax2s)) {
                    foreach ($Smax2s as $Smax2) {
                        echo "<td class='text-center'>$Smax2</td>";
                    }
                }
                if (isset($Smax3s)) {
                    foreach ($Smax3s as $Smax3) {
                        echo "<td class='text-center'>$Smax3</td>";
                    }
                }
                if (isset($Smaxxs)) {
                    foreach ($Smaxxs as $Smaxx) {
                        echo "<td class='text-center'>$Smaxx</td>";
                    }
                }
                if (isset($Smax4s)) {
                    foreach ($Smax4s as $Smax4) {
                        echo "<td class='text-center'>$Smax4</td>";
                    }
                }

                if (isset($Smax5s)) {
                    foreach ($Smax5s as $Smax5) {
                        echo "<td class='text-center'>$Smax5</td>";
                    }
                }
                echo "<td class='text-center'>$Smax6</td>";

                if (isset($Smax7s)) {
                    foreach ($Smax7s as $Smax7) {
                        echo "<td class='text-center'>$Smax7</td>";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>

    <!-- Verificacion de acero -->
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="text-center bg-info">
                <th scope="col" rowspan="3" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Lo (cm)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">So (cm)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">SI (cm)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">SII (cm)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vs (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Ø(Vc+Vs)(Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Verificación de <br>Resistencia a Corte</th>
                <th scope="col" colspan="6" style="vertical-align: middle;">Distribución Final en Dirección "x"</th>
            </tr>
            <tr class="text-center bg-info">
                <th scope="col" colspan="2" style="vertical-align: middle;">Extremos</th>
                <th scope="col" colspan="2" style="vertical-align: middle;">Zona de Confinamiento</th>
                <th scope="col" colspan="2" style="vertical-align: middle;">Zona Central</th>
            </tr>
            <tr class="text-center bg-info">
                <th scope="col" style="vertical-align: middle;">N° de Estribos</th>
                <th scope="col" style="vertical-align: middle;">separacion (cm)</th>
                <th scope="col" style="vertical-align: middle;">N° de Estribos</th>
                <th scope="col" style="vertical-align: middle;">separacion (cm)</th>
                <th scope="col" style="vertical-align: middle;">N° de Estribos</th>
                <th scope="col" style="vertical-align: middle;">separacion (cm)</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th>Piso 1</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $lo = MAX($lo1, $lo2, $lo3);
                    $sO = 0;
                    if ($So == "-") {
                        $sO = MIN($ZconfinaSo, $ZconfinaSo2, $so3, 30);
                    } else {
                        $sO = MIN($So, $ZconfinaSo, $ZconfinaSo2, $so3, 30);
                    }
                    $sOs[] = $sO;

                    $SI = MIN($sII, $Smaxx, $Smax7);
                    $VSton = round(($AV * $fy * $dx / $sO) / 1000, 2, PHP_ROUND_HALF_UP);
                    $FyVcVs = 0.70 * ($VC + $VSton);
                    $VrfResistencia = "";
                    if ($FyVcVs >= $VUMAX) {
                        $VrfResistencia = "SI CUMPLE";
                    } else {
                        $VrfResistencia = "NO CUMPLE, <br> Verificar";
                    }
                    $NEstribos = $lo / $sO;
                }
                echo "<td class='text-center'>$lo</td>";
                //caso I
                if (isset($sOs)) {
                    foreach ($sOs as $sO) {
                        echo "<td class='text-center'>$sO</td>";
                    }
                }
                echo "<td class='text-center'>$SI</td>";
                echo "<td class='text-center'>15</td>";
                echo "<td class='text-center'>$VSton</td>";
                echo "<td class='text-center'>$FyVcVs</td>";
                echo "<td class='text-center'>$VrfResistencia</td>";
                echo "<td class='text-center'>1</td>";
                echo "<td class='text-center'>5</td>";
                echo "<td class='text-center'>$NEstribos</td>";
                echo "<td class='text-center'>$lo</td>";
                echo "<td class='text-center'>resto</td>";
                echo "<td class='text-center'>15</td>";
                ?>
            </tr>
        </tbody>
    </table>

    <!-- Verificacion de acero -->
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="text-center bg-info">
                <th scope="col" rowspan="2" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" colspan="9" style="vertical-align: middle;">Artículo 21.6.4.<br>Verificación del Refuerzo Transversal para Sistemas Estructurales de Pórticos y Dual Tipo II</th>
            </tr>
            <tr class="text-center bg-info">
                <th scope="col" style="vertical-align: middle;">Tipo de Grapas</th>
                <th scope="col" style="vertical-align: middle;">θ (°)</th>
                <th scope="col" style="vertical-align: middle;">N° de Grapas</th>
                <th scope="col" style="vertical-align: middle;">Ash (cm<sup>2</sup>)</th>
                <th scope="col" style="vertical-align: middle;">bc (cm)</th>
                <th scope="col" style="vertical-align: middle;">Ach (cm<sup>2</sup>)</th>
                <th scope="col" style="vertical-align: middle;">Ash mín1 (cm)</th>
                <th scope="col" style="vertical-align: middle;">Ash mín2 4 (cm)</th>
                <th scope="col" style="vertical-align: middle;">Verificación del <br>Artículo 21.6.4.1.b.</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th>Piso 1</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $AshArt = "";
                    if ($SEstru == "MEstructurales") {
                        $AshArt = "-";
                    } else if ($SEstru == "DualTipI") {
                        $AshArt = "-";
                    } elseif ($Tgrapas == "caso I") {
                        $AshArt = "-";
                    } elseif ($Tgrapas == "caso II") {
                        $AshArt = "-";
                    }

                    $AshArts[] = $AshArt;

                }
                echo "<td class='text-center'>$Tgrapas</td>";
                echo "<td class='text-center'>55.00</td>";
                echo "<td class='text-center'>$nRe</td>";
                //caso I
                if (isset($AshArts)) {
                    foreach ($AshArts as $AshArt) {
                        echo "<td class='text-center'>$AshArt</td>";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>

    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    <h2 class="text-center"><strong>Analisis en Direccion "Y"</strong></h2>
     <!-- Columa por Corte  En eje Y-->
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="text-center bg-info">
                <th scope="col" colspan="16">Diseño por CORTE</th>
            </tr>
            <tr class="text-center bg-info">
                <th scope="col" rowspan="3" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Altura Libre <br> "hn" (m)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Pu info (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Pu Sup (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Mu info (Ton.m)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Mu sup (Ton.m)</th>
                <th scope="col" colspan="4" style="vertical-align: middle;">Artículo 21.4.3. & 21.6.5.1. <br> Fuerzas
                    Cortantes de Diseño</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vu (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vud (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vud Etaps (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vud Max (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vc (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Verificacion de Utilizacion <br> de Estribos
                </th>
            </tr>
            <tr class="text-center bg-info">
                <th colspan="2" scope="col">caso I</th>
                <th colspan="2" scope="col">caso II</th>
            </tr>
            <tr class="text-center bg-info">
                <th scope="col">Mpri</th>
                <th scope="col">Mprs</th>
                <th scope="col">Mpri</th>
                <th scope="col">Mprs</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th>Piso 1</th>
                <th>
                    <?php echo "$H" ?>
                </th>
                <th>
                    <?php echo "$puinf" ?>
                </th>
                <th>
                    <?php echo "$pusup" ?>
                </th>
                <th>
                    <?php echo "$Mninf" ?>
                </th>
                <th>
                    <?php echo "$Mnsup" ?>
                </th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $dx = $L1 - 6;
                    $dy = $L2 - 6;
                    //CASO I
                    //Mpri Valores Unicos
                    $Mpriy = 0;
                    if ($SEstru == "Porticos") {
                        $Mpriy = 125 * $Mninf;
                    } else if ($SEstru == "DualTipI") {
                        $Mpriy = $Mninf;
                    } elseif ($SEstru == "DualTipII") {
                        $Mpriy = 125 * $Mninf;
                    } elseif ($SEstru == "MEstructurales") {
                        $Mpriy = $Mninf;
                    }
                    $Mpriys[] = $Mpriy;

                    //Mpri Valores Unicos
                    $Mpry = 0;
                    if ($SEstru == "Porticos") {
                        $Mpr = 125 * $Mnsup;
                    } else if ($SEstru == "DualTipI") {
                        $Mpry = $Mnsup;
                    } elseif ($SEstru == "DualTipII") {
                        $Mpry = 125 * $Mnsup;
                    } elseif ($SEstru == "MEstructurales") {
                        $Mpry = $Mnsup;
                    }
                    $Mprys[] = $Mpry;
                    //CASO II
                    //Mpri Valores Unicos
                    $MpriIIy = 0;
                    if ($SEstru == "Porticos") {
                        $MpriIIy = 125 * $Mninf;
                    } else if ($SEstru == "DualTipI") {
                        $MpriIIy = $Mninf;
                    } elseif ($SEstru == "DualTipII") {
                        $MpriIIy = 125 * $Mninf;
                    } elseif ($SEstru == "MEstructurales") {
                        $MpriIIy = $Mninf;
                    }
                    $MpriIIys[] = $MpriIIy;

                    //Mpri Valores Unicos
                    $MprIIy = 0;
                    if ($SEstru == "Porticos") {
                        $MprIIy = 125 * $Mnsup;
                    } else if ($SEstru == "DualTipI") {
                        $MprIIy = $Mnsup;
                    } elseif ($SEstru == "DualTipII") {
                        $MprIIy = 125 * $Mnsup;
                    } elseif ($SEstru == "MEstructurales") {
                        $MprIIy = $Mnsup;
                    }
                    $MprIIys[] = $MprIIy;

                    $VNy = round(max(($Mpri + $Mpr) / $H, ($MpriIIy + $MprIIy) / $H), 2, PHP_ROUND_HALF_UP);
                    $VNys[] = $VNy;

                    $VUDy = round($VNy * (0.5 * $H - ($dx / 100)) / (0.5 * $H), 2, PHP_ROUND_HALF_UP);
                    $VUDys[] = $VUDy;
                }
                //caso I
                if (isset($Mpriys)) {
                    foreach ($Mpriys as $Mpriy) {
                        echo "<td class='text-center'>$Mpriy</td>";
                    }
                }
                //Mprs
                if (isset($Mprys)) {
                    foreach ($Mprys as $Mpry) {
                        echo "<td class='text-center'>$Mpry</td>";
                    }
                }

                //caso II
                if (isset($MpriIIys)) {
                    foreach ($MpriIIys as $MpriIIy) {
                        echo "<td class='text-center'>$MpriIIy</td>";
                    }
                }
                //Mprs caso II
                if (isset($MpriIIys)) {
                    foreach ($MpriIIys as $MprIIy) {
                        echo "<td class='text-center'>$MprIIy</td>";
                    }
                }

                //------------------
                if (isset($VNys)) {
                    foreach ($VNys as $VNy) {
                        echo "<td class='text-center'>$VNy</td>";
                    }
                }
                //-----
                if (isset($VUDys)) {
                    foreach ($VUDys as $VUDy) {
                        echo "<td class='text-center'>$VUDy</td>";
                    }
                }
                ?>
                <th>
                    <?php echo "$VudEtap" ?>
                </th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $VUMAXy = max($VUDy, $VudEtap);
                    $VUMAXys[] = $VUMAXy;

                    $VCy = round(0.53 * sqrt($fc) * (1 + (MAX($puinf, $pusup) * 1000) / (140 * $L1 * $L2)) * $L2 * $dx / 1000, 2, PHP_ROUND_HALF_UP);
                    $VCys[] = $VCy;

                    $VerifiUtEstriboy = "";
                    if ($VUMAXy > 0.70 * $VCy) {
                        $VerifiUtEstriboy = "Necesita Estribos";
                    } else {
                        $VerifiUtEstriboy = "Refuerzo Mínimo";
                    }
                    $VerifiUtEstriboys[] = $VerifiUtEstriboy;

                }
                //
                if (isset($VUMAXys)) {
                    foreach ($VUMAXys as $VUMAXy) {
                        echo "<td class='text-center'>$VUMAXy</td>";
                    }
                }
                //VerifiUtEstribos
                if (isset($VCys)) {
                    foreach ($VCys as $VCy) {
                        echo "<td class='text-center'>$VCy</td>";
                    }
                }
                //Verificacion de utilizacion de estribos
                if (isset($VerifiUtEstriboys)) {
                    foreach ($VerifiUtEstriboys as $VerifiUtEstriboy) {
                        echo "<td class='text-center'>$VerifiUtEstriboy</td>";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>

    <!-- S -->
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="text-center bg-info">
                <th scope="col" rowspan="3" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vs (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vs Máx (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Artículo 11.5.7.9. <br>Verificación del Vs
                    máx</th>
                <th scope="col" colspan="3" style="vertical-align: middle;">Acero de Etribos</th>
                <th scope="col" colspan="3" style="vertical-align: middle;">Acero Longitudinal</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">N° de Ramales de Estribos</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Av (cm<Sup>2</Sup>)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">So (cm)</th>
            </tr>
            <tr class="text-center bg-info">
                <th scope="col" style="vertical-align: middle;">Acero</th>
                <th scope="col" style="vertical-align: middle;">D (cm)</th>
                <th scope="col" style="vertical-align: middle;">Área (cm<Sup>2</Sup>)</th>
                <th scope="col" style="vertical-align: middle;">Acero</th>
                <th scope="col" style="vertical-align: middle;">D (cm)</th>
                <th scope="col" style="vertical-align: middle;">Área (cm<Sup>2</Sup>)</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th>Piso 1</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $VsRefy = 0;
                    if ($VerifiUtEstribo == "Refuerzo Mínimo") {
                        $VsRefy = 0;
                    } else {
                        $VsRefy = round($VUMAXy / 0.70 - $VCy, 2, PHP_ROUND_HALF_UP);
                    }
                    $VsRefys[] = $VsRefy;

                    $VsRefMaxy = round(2.1 * sqrt($fc) * $L2 * $dx / 1000, 2, PHP_ROUND_HALF_UP);
                    $VsRefMaxys[] = $VsRefMaxy;

                    $VerifArticuloy = "";
                    if ($VsRef <= $VsRefMax) {
                        $VerifArticuloy = "Si Cumple";
                    } else {
                        $VerifArticuloy = "No Cumple, <br>Verificar";
                    }
                    $VerifArticuloys[] = $VerifArticuloy;

                    $AceroEstriboy = "";
                    if ($AEstribos == 0.28) {
                        $AceroEstriboy = "6mm";
                    } else if ($AEstribos == 1.13) {
                        $AceroEstriboy = "12mm";
                    } else if ($AEstribos == 0.50) {
                        $AceroEstriboy = "8mm";
                    } else if ($AEstribos == 0.71) {
                        $AceroEstriboy = "ø3/8";
                    } else if ($AEstribos == 1.27) {
                        $AceroEstriboy = "ø1/2";
                    } else if ($AEstribos == 1.98) {
                        $AceroEstriboy = "ø5/8";
                    } else if ($AEstribos == 2.85) {
                        $AceroEstriboy = "ø3/4";
                    } else if ($AEstribos == 5.10) {
                        $AceroEstriboy = "ø1";
                    } else if ($AEstribos == 7.92) {
                        $AceroEstriboy = "ø1 1/4";
                    } else if ($AEstribos == 11.40) {
                        $AceroEstriboy = "ø1 1/2";
                    }
                    $AceroEstriboys[] = $AceroEstriboy;

                    $DiaAceroy = 0;
                    if ($AEstribos == 0.28) {
                        $DiaAceroy = 0.6;
                    } else if ($AEstribos == 1.13) {
                        $DiaAceroy = 1.2;
                    } else if ($AEstribos == 0.50) {
                        $DiaAceroy = 0.8;
                    } else if ($AEstribos == 0.71) {
                        $DiaAceroy = 0.95;
                    } else if ($AEstribos == 1.27) {
                        $DiaAceroy = 1.27;
                    } else if ($AEstribos == 1.98) {
                        $DiaAceroy = 1.59;
                    } else if ($AEstribos == 2.85) {
                        $DiaAceroy = 1.9;
                    } else if ($AEstribos == 5.10) {
                        $DiaAceroy = 2.54;
                    } else if ($AEstribos == 7.92) {
                        $DiaAceroy = 3.175;
                    } else if ($AEstribos == 11.40) {
                        $DiaAceroy = 3.81;
                    }
                    $DiaAceroys[] = $DiaAceroy;

                    //Aceros Maximo Longitudinal
                    $aceroMxLony = "";
                    if ($AaceromaxLong == 0.28) {
                        $aceroMxLony = "6mm";
                    } else if ($AaceromaxLong == 1.13) {
                        $aceroMxLony = "12mm";
                    } else if ($AaceromaxLong == 0.50) {
                        $aceroMxLony = "8mm";
                    } else if ($AaceromaxLong == 0.71) {
                        $aceroMxLony = "ø3/8";
                    } else if ($AaceromaxLong == 1.27) {
                        $aceroMxLony = "ø1/2";
                    } else if ($AaceromaxLong == 1.98) {
                        $aceroMxLony = "ø5/8";
                    } else if ($AaceromaxLong == 2.85) {
                        $aceroMxLony = "ø3/4";
                    } else if ($AaceromaxLong == 5.10) {
                        $aceroMxLony = "ø1";
                    } else if ($AaceromaxLong == 7.92) {
                        $aceroMxLony = "ø1 1/4";
                    } else if ($AaceromaxLong == 11.40) {
                        $aceroMxLony = "ø1 1/2";
                    }
                    $aceroMxLonys[] = $aceroMxLony;

                    $DiaAceroMxLongy = 0;
                    if ($AaceromaxLong == 0.28) {
                        $DiaAceroMxLongy = 0.6;
                    } else if ($AaceromaxLong == 1.13) {
                        $DiaAceroMxLongy = 1.2;
                    } else if ($AaceromaxLong == 0.50) {
                        $DiaAceroMxLongy = 0.8;
                    } else if ($AaceromaxLong == 0.71) {
                        $DiaAceroMxLongy = 0.95;
                    } else if ($AaceromaxLong == 1.27) {
                        $DiaAceroMxLongy = 1.27;
                    } else if ($AaceromaxLong == 1.98) {
                        $DiaAceroMxLongy = 1.59;
                    } else if ($AaceromaxLong == 2.85) {
                        $DiaAceroMxLongy = 1.9;
                    } else if ($AaceromaxLong == 5.10) {
                        $DiaAceroMxLongy = 2.54;
                    } else if ($AaceromaxLong == 7.92) {
                        $DiaAceroMxLongy = 3.175;
                    } else if ($AaceromaxLong == 11.40) {
                        $DiaAceroMxLongy = 3.81;
                    }
                    $DiaAceroMxLongys[] = $DiaAceroMxLongy;

                    $ach = $dx * $dy;
                    $Ac = 30;
                    $bc = 20;
                    $spaciamiento = 10;
                    $Ash1y = round(0.3 * $spaciamiento * $bc * $fc / $fy * ($ag / $ach - 1), 2, PHP_ROUND_HALF_UP);
                    $Ash2y = 0.09 * $spaciamiento * $bc * $fc / $fy;
                    $nRey = round((MAX($Ash2y, $Ash1y) / $DiaAceroy));
                    $nReys[] = $nRey;

                    $AVy = $nRey * $AEstribos;
                    $AVyS[] = $AVy;

                    $Soy = "";
                    if ($VerifiUtEstriboy == "Refuerzo Mínimo") {
                        $Soy = "-";
                    } else {
                        $Soy = round($AVy * $fy * $dx / ($VsRefy * 1000), 2, PHP_ROUND_HALF_UP);
                    }
                    $Soys[] = $Soy;

                }
                //caso I
                if (isset($VsRefys)) {
                    foreach ($VsRefys as $VsRefy) {
                        echo "<td class='text-center'>$VsRefy</td>";
                    }
                }
                //
                if (isset($VsRefMaxys)) {
                    foreach ($VsRefMaxys as $VsRefMaxy) {
                        echo "<td class='text-center'>$VsRefMaxy</td>";
                    }
                }
                //
                if (isset($VerifArticuloys)) {
                    foreach ($VerifArticuloys as $VerifArticuloy) {
                        echo "<td class='text-center'>$VerifArticuloy</td>";
                    }
                }
                if (isset($AceroEstriboys)) {
                    foreach ($AceroEstriboys as $AceroEstriboy) {
                        echo "<td class='text-center'>$AceroEstriboy</td>";
                    }
                }
                if (isset($DiaAceroys)) {
                    foreach ($DiaAceroys as $DiaAceroy) {
                        echo "<td class='text-center'>$DiaAceroy</td>";
                    }
                }
                echo "<td class='text-center'>$AEstribos</td>";
                if (isset($aceroMxLonys)) {
                    foreach ($aceroMxLonys as $aceroMxLony) {
                        echo "<td class='text-center'>$aceroMxLony</td>";
                    }
                }
                if (isset($DiaAceroMxLongys)) {
                    foreach ($DiaAceroMxLongys as $DiaAceroMxLongy) {
                        echo "<td class='text-center'>$DiaAceroMxLongy</td>";
                    }
                }
                echo "<td class='text-center'>$AaceromaxLong</td>";

                if (isset($nReys)) {
                    foreach ($nReys as $nRey) {
                        echo "<td class='text-center'>$nRey</td>";
                    }
                }
                if (isset($AVyS)) {
                    foreach ($AVyS as $AVy) {
                        echo "<td class='text-center'>$AVy</td>";
                    }
                }
                if (isset($Soys)) {
                    foreach ($Soys as $Soy) {
                        echo "<td class='text-center'>$Soy</td>";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>

    <!-- Segun Ariticulo -->
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="text-center bg-info">
                <th scope="col" rowspan="3" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" colspan="7" style="vertical-align: middle;">Artículo 21.4.5.3. y/o Artículo 21.6.4.2 / 21.6.4.4. <br>Separación de Estribos por Confinamiento</th>
                <th scope="col" colspan="4" style="vertical-align: middle;">Artículo 7.10.5.2. <br>Espaciamiento Vertical de Estribos Máximo</th>
                <th scope="col" colspan="4" style="vertical-align: middle;">Artículo 11.5.5.1.<br>Espaciamiento Vertical de Estribos Máximo</th>
            </tr>
            <tr class="text-center bg-info">
                <th scope="col" colspan="3" style="vertical-align: middle;">Zona de Confinamiento "Lo" (cm)</th>
                <th scope="col" colspan="3" style="vertical-align: middle;">Zona de Confinamiento "So" (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">SI1 (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx 1 (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx 2 (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx 3 (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx 4 (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx 5 (cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx 6(cm)</th>
                <th scope="col" rowspan="2" style="vertical-align: middle;">Smáx (cm)</th>

            </tr>
            <tr class="text-center bg-info">
                <th scope="col" style="vertical-align: middle;">Lo1</th>
                <th scope="col" style="vertical-align: middle;">Lo2</th>
                <th scope="col" style="vertical-align: middle;">Lo3</th>
                <th scope="col" style="vertical-align: middle;">So1</th>
                <th scope="col" style="vertical-align: middle;">So2</th>
                <th scope="col" style="vertical-align: middle;">So3</th>

            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th>Piso 1</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $lo3 = 50;
                    $so3 = 10;
                    $sII = 30;
                    $Smax6 = 60;
                    $lo1y = round($H * 100 / 6, 2, PHP_ROUND_HALF_UP);
                    $lo1ys[] = $lo1y;

                    $lo2y = max($L1, $L2);
                    $lo2ys[] = $lo2y;

                    $ZconfinaSoy = 0;
                    if ($SEstru == "Porticos") {
                        $ZconfinaSoy = 6 * $AaceromaxLong;
                    } else if ($SEstru == "DualTipI") {
                        $ZconfinaSoy = 8 * $AaceromaxLong;
                    } elseif ($SEstru == "DualTipII") {
                        $ZconfinaSoy = 6 * $AaceromaxLong;
                    } elseif ($SEstru == "MEstructurales") {
                        $ZconfinaSoy = 8 * $AaceromaxLong;
                    }
                    $ZconfinaSoys[] = $ZconfinaSoy;

                    $ZconfinaSo2y = 0;
                    if ($SEstru == "Porticos") {
                        $ZconfinaSo2y = min($L1, $L2) / 3;
                    } else if ($SEstru == "DualTipI") {
                        $ZconfinaSo2y = 0.5 * min($L1, $L2);
                    } elseif ($SEstru == "DualTipII") {
                        $ZconfinaSo2y = min($L1, $L2) / 3;
                    } elseif ($SEstru == "MEstructurales") {
                        $ZconfinaSo2y = 0.5 * min($L1, $L2);
                    }
                    $ZconfinaSo2ys[] = $ZconfinaSo2y;

                    $Smaxy = 16 * $DiaAceroMxLongy;
                    $Smaxys[] = $Smaxy;

                    $Smax2y = 48 * $DiaAceroy;
                    $Smax2ys[] = $Smax2y;

                    $Smax3y = MIN($L1, $L2);
                    $Smax3ys[] = $Smax3y;

                    $Smaxxy = MIN($Smaxy, $Smax2y, $Smax3y);
                    $Smaxxys[] = $Smaxxy;

                    $Smax4y = $dx / 2;
                    $Smax4ys[] = $Smax4y;

                    $Smax5y = $dy / 2;
                    $Smax5ys[] = $Smax5y;

                    $Smax7y = min($Smax4y, $Smax5y, $Smax6);
                    $Smax7ys[] = $Smax7y;

                }
                //caso I
                if (isset($lo1ys)) {
                    foreach ($lo1ys as $lo1y) {
                        echo "<td class='text-center'>$lo1y</td>";
                    }
                }
                //
                if (isset($lo2ys)) {
                    foreach ($lo2ys as $lo2y) {
                        echo "<td class='text-center'>$lo2y</td>";
                    }
                }
                //
                echo "<td class='text-center'>$lo3</td>";
                //
                if (isset($ZconfinaSoys)) {
                    foreach ($ZconfinaSoys as $ZconfinaSoy) {
                        echo "<td class='text-center'>$ZconfinaSoy</td>";
                    }
                }

                if (isset($ZconfinaSo2ys)) {
                    foreach ($ZconfinaSo2ys as $ZconfinaSo2y) {
                        echo "<td class='text-center'>$ZconfinaSo2y</td>";
                    }
                }
                echo "<td class='text-center'>$so3</td>";
                echo "<td class='text-center'>$sII</td>";

                if (isset($Smaxys)) {
                    foreach ($Smaxys as $Smaxy) {
                        echo "<td class='text-center'>$Smaxy</td>";
                    }
                }
                if (isset($Smax2ys)) {
                    foreach ($Smax2ys as $Smax2y) {
                        echo "<td class='text-center'>$Smax2y</td>";
                    }
                }
                if (isset($Smax3ys)) {
                    foreach ($Smax3ys as $Smax3y) {
                        echo "<td class='text-center'>$Smax3y</td>";
                    }
                }
                if (isset($Smaxxys)) {
                    foreach ($Smaxxys as $Smaxxy) {
                        echo "<td class='text-center'>$Smaxxy</td>";
                    }
                }
                if (isset($Smax4ys)) {
                    foreach ($Smax4ys as $Smax4y) {
                        echo "<td class='text-center'>$Smax4y</td>";
                    }
                }

                if (isset($Smax5ys)) {
                    foreach ($Smax5ys as $Smax5y) {
                        echo "<td class='text-center'>$Smax5y</td>";
                    }
                }
                echo "<td class='text-center'>$Smax6</td>";

                if (isset($Smax7ys)) {
                    foreach ($Smax7ys as $Smax7y) {
                        echo "<td class='text-center'>$Smax7y</td>";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>

    <!-- Verificacion de acero -->
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="text-center bg-info">
                <th scope="col" rowspan="3" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Lo (cm)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">So (cm)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">SI (cm)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">SII (cm)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Vs (Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Ø(Vc+Vs)(Ton)</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Verificación de <br>Resistencia a Corte</th>
                <th scope="col" colspan="6" style="vertical-align: middle;">Distribución Final en Dirección "x"</th>
            </tr>
            <tr class="text-center bg-info">
                <th scope="col" colspan="2" style="vertical-align: middle;">Extremos</th>
                <th scope="col" colspan="2" style="vertical-align: middle;">Zona de Confinamiento</th>
                <th scope="col" colspan="2" style="vertical-align: middle;">Zona Central</th>
            </tr>
            <tr class="text-center bg-info">
                <th scope="col" style="vertical-align: middle;">N° de Estribos</th>
                <th scope="col" style="vertical-align: middle;">separacion (cm)</th>
                <th scope="col" style="vertical-align: middle;">N° de Estribos</th>
                <th scope="col" style="vertical-align: middle;">separacion (cm)</th>
                <th scope="col" style="vertical-align: middle;">N° de Estribos</th>
                <th scope="col" style="vertical-align: middle;">separacion (cm)</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th>Piso 1</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $loy = MAX($lo1y, $lo2y, $lo3);
                    $sOy = 0;
                    if ($sOy == "-") {
                        $sOy = MIN($ZconfinaSoy, $ZconfinaSo2y, $so3, 30);
                    } else {
                        $sOy = MIN($Soy, $ZconfinaSoy, $ZconfinaSo2y, $so3, 30);
                    }
                    $sOys[] = $sOy;

                    $SIy = MIN($sII, $Smaxxy, $Smax7y);
                    $VStony = round(($AVy * $fy * $dx / $sOy) / 1000, 2, PHP_ROUND_HALF_UP);
                    $FyVcVsy = 0.70 * ($VCy + $VStony);
                    $VrfResistenciay = "";
                    if ($FyVcVsy >= $VUMAXy) {
                        $VrfResistenciay = "SI CUMPLE";
                    } else {
                        $VrfResistenciay = "NO CUMPLE, <br> Verificar";
                    }
                    $NEstribosy = $loy / $sOy;
                }
                echo "<td class='text-center'>$loy</td>";
                //caso I
                if (isset($sOys)) {
                    foreach ($sOys as $sOy) {
                        echo "<td class='text-center'>$sOy</td>";
                    }
                }
                echo "<td class='text-center'>$SIy</td>";
                echo "<td class='text-center'>15</td>";
                echo "<td class='text-center'>$VStony</td>";
                echo "<td class='text-center'>$FyVcVsy</td>";
                echo "<td class='text-center'>$VrfResistenciay</td>";
                echo "<td class='text-center'>1</td>";
                echo "<td class='text-center'>5</td>";
                echo "<td class='text-center'>$NEstribosy</td>";
                echo "<td class='text-center'>$loy</td>";
                echo "<td class='text-center'>resto</td>";
                echo "<td class='text-center'>15</td>";
                ?>
            </tr>
        </tbody>
    </table>

    <!-- Verificacion de acero -->
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="text-center bg-info">
                <th scope="col" rowspan="2" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" colspan="9" style="vertical-align: middle;">Artículo 21.6.4.<br>Verificación del Refuerzo Transversal para Sistemas Estructurales de Pórticos y Dual Tipo II</th>
            </tr>
            <tr class="text-center bg-info">
                <th scope="col" style="vertical-align: middle;">Tipo de Grapas</th>
                <th scope="col" style="vertical-align: middle;">θ (°)</th>
                <th scope="col" style="vertical-align: middle;">N° de Grapas</th>
                <th scope="col" style="vertical-align: middle;">Ash (cm<sup>2</sup>)</th>
                <th scope="col" style="vertical-align: middle;">bc (cm)</th>
                <th scope="col" style="vertical-align: middle;">Ach (cm<sup>2</sup>)</th>
                <th scope="col" style="vertical-align: middle;">Ash mín1 (cm)</th>
                <th scope="col" style="vertical-align: middle;">Ash mín2 4 (cm)</th>
                <th scope="col" style="vertical-align: middle;">Verificación del <br>Artículo 21.6.4.1.b.</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th>Piso 1</th>
                <?php
                $datos = 1;
                for ($i = 0; $i < $datos; $i++) {
                    $AshArt = "";
                    if ($SEstru == "MEstructurales") {
                        $AshArt = "-";
                    } else if ($SEstru == "DualTipI") {
                        $AshArt = "-";
                    } elseif ($Tgrapas == "caso I") {
                        $AshArt = "-";
                    } elseif ($Tgrapas == "caso II") {
                        $AshArt = "-";
                    }

                    $AshArts[] = $AshArt;

                }
                echo "<td class='text-center'>$Tgrapas</td>";
                echo "<td class='text-center'>55.00</td>";
                echo "<td class='text-center'>$nRe</td>";
                //caso I
                if (isset($AshArts)) {
                    foreach ($AshArts as $AshArt) {
                        echo "<td class='text-center'>$AshArt</td>";
                    }
                }
                ?>
            </tr>
        </tbody>
    </table>


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