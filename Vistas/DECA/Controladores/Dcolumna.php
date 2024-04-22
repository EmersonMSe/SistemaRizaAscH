<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pisos = $_POST["piso"];
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
    $dataFromHandsontableLAX = json_decode($_POST["dataFromHandsontableLAX"], true);
    $dataFromHandsontablesLAX = array();
    $dataFromHandsontableLAY = json_decode($_POST["dataFromHandsontableLAY"], true);
    $dataFromHandsontablesLAY = array();
    print_r($dataFromHandsontableLAX);
    print_r($dataFromHandsontableLAY);
    $indiceQX = array();
    $tipoEstructuraX = array();
    $indiceQY = array();
    $tipoEstructuraY = array();
    $hx = array();
    $p = array();
    $vx = array();
    $vy = array();
    $topmx = array();
    $buttonmx = array();
    $topmy = array();
    $buttonmy = array();


    for ($i = count($dataFromHandsontableLAX)-2; $i >= 0; $i--) {
        $indiceQX[] = $dataFromHandsontableLAX[$i][7];
        print_r($dataFromHandsontableLAX[$i][7]);
    }
    for ($i = count($dataFromHandsontableLAX)-2; $i >= 0; $i--) {
        $tipoEstructuraX[] = $dataFromHandsontableLAX[$i][9];
        print_r($dataFromHandsontableLAX[$i][9]);
    }
    for ($i = count($dataFromHandsontableLAY)-1; $i >= 0; $i--) {
        $indiceQY[] = $dataFromHandsontableLAY[$i][7];
        print_r($dataFromHandsontableLAY[$i][7]);
    }
    for ($i = count($dataFromHandsontableLAY)-1; $i >= 0; $i--) {
        echo $i;
        $tipoEstructuraY[] = $dataFromHandsontableLAY[$i][9];
        print_r($dataFromHandsontableLAY[$i][9]);
    }
    for ($i = count($dataFromHandsontableLAX)-2; $i >= 0; $i--) {
        $hx[] = $dataFromHandsontableLAX[$i][1];
    }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
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
    <h1 class="tab_encabezados text-2xl font-bold decoration-indigo-500">
        1.- Condicion de Esbeltez
    </h1>
    <!-- <h3><u><strong>1.0 Condición de Esbeltez:</strong></u></h3> -->
    <!-- Condicion Esbeltez -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="tablaBody">
            <thead class="bg-info">
                <tr class="sub_encabezados">
                    <th scope="col" style="vertical-align: middle;" class="text-center" rowspan="3">
                        Piso</th>
                    <th scope="col" style="vertical-align: middle;" class="text-center" rowspan="3">
                        Combinaciones de Carga</th>
                    <th scope="col" style="vertical-align: middle;" class="text-center" colspan="7">
                        Direcciones X-X</th>
                    <th scope="col" style="vertical-align: middle;" class="text-center" colspan="7">
                        Direcciones Y-Y</th>
                </tr>
                <tr class="sub_encabezados">
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
                <tr class="sub_encabezados">
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
            <tbody>
                <?php
                    //////////////////////////////////////////////////////////
                    //                                                      //
                    //                  CUADRANTE en X-X                    //
                    //                                                      //
                    //////////////////////////////////////////////////////////
                    // Procesar los datos de $p
                    $datos_por_piso_p = array_chunk($p, 4);
                    $pisos_json_p = array();
                    for ($piso_num = 0; $piso_num < $pisos; $piso_num++) {
                        $datos_piso_actual = array(
                            "Piso" => $piso_num + 1,
                            "Datos" => $datos_por_piso_p[$piso_num]
                        );
                        $pisos_json_p[] = $datos_piso_actual;
                    }
                    $pisos_datos_p = json_encode($pisos_json_p);
                    $pisos_datos_array_p = json_decode($pisos_datos_p, true);

                    // Procesar los datos de $vx
                    $datos_por_piso_vx = array_chunk($vx, 4);
                    $pisos_json_vx = array();
                    for ($piso_num = 0; $piso_num < $pisos; $piso_num++) {
                        $datos_piso_actual = array(
                            "Piso" => $piso_num + 1,
                            "Datos" => $datos_por_piso_vx[$piso_num]
                        );
                        $pisos_json_vx[] = $datos_piso_actual;
                    }
                    $pisos_datos_vx = json_encode($pisos_json_vx);
                    $pisos_datos_array_vx = json_decode($pisos_datos_vx, true);

                    // Procesar los datos de $vuy
                    $datos_por_piso_vy = array_chunk($vy, 4);
                    $pisos_json_vy = array();
                    for ($piso_num = 0; $piso_num < $pisos; $piso_num++) {
                        $datos_piso_actual = array(
                            "Piso" => $piso_num + 1,
                            "Datos" => $datos_por_piso_vy[$piso_num]
                        );
                        $pisos_json_vy[] = $datos_piso_actual;
                    }
                    $pisos_datos_vy = json_encode($pisos_json_vy);
                    $pisos_datos_array_vy = json_decode($pisos_datos_vy, true);

                    // Procesar los datos de $topmx
                    $datos_por_piso_topmx = array_chunk($topmx, 4);
                    $pisos_json_topmx = array();
                    for ($piso_num = 0; $piso_num < $pisos; $piso_num++) {
                        $datos_piso_actual = array(
                            "Piso" => $piso_num + 1,
                            "Datos" => $datos_por_piso_topmx[$piso_num]
                        );
                        $pisos_json_topmx[] = $datos_piso_actual;
                    }
                    $pisos_datos_topmx = json_encode($pisos_json_topmx);
                    $pisos_datos_array_topmx = json_decode($pisos_datos_topmx, true);

                    // Procesar los datos de $buttonmx
                    $datos_por_piso_buttonmx = array_chunk($buttonmx, 4);
                    $pisos_json_buttonmx = array();
                    for ($piso_num = 0; $piso_num < $pisos; $piso_num++) {
                        $datos_piso_actual = array(
                            "Piso" => $piso_num + 1,
                            "Datos" => $datos_por_piso_buttonmx[$piso_num]
                        );
                        $pisos_json_buttonmx[] = $datos_piso_actual;
                    }
                    $pisos_datos_buttonmx = json_encode($pisos_json_buttonmx);
                    $pisos_datos_array_buttonmx = json_decode($pisos_datos_buttonmx, true);

                    // Procesar los datos de $topmy
                    $datos_por_piso_topmy = array_chunk($topmy, 4);
                    $pisos_json_topmy = array();
                    for ($piso_num = 0; $piso_num < $pisos; $piso_num++) {
                        $datos_piso_actual = array(
                            "Piso" => $piso_num + 1,
                            "Datos" => $datos_por_piso_topmy[$piso_num]
                        );
                        $pisos_json_topmy[] = $datos_piso_actual;
                    }
                    $pisos_datos_topmy = json_encode($pisos_json_topmy);
                    $pisos_datos_array_topmy = json_decode($pisos_datos_topmy, true);

                    // Procesar los datos de $buttonmy
                    $datos_por_piso_buttonmy = array_chunk($buttonmy, 4);
                    $pisos_json_buttonmy = array();
                    for ($piso_num = 0; $piso_num < $pisos; $piso_num++) {
                        $datos_piso_actual = array(
                            "Piso" => $piso_num + 1,
                            "Datos" => $datos_por_piso_buttonmy[$piso_num]
                        );
                        $pisos_json_buttonmy[] = $datos_piso_actual;
                    }
                    $pisos_datos_buttonmy = json_encode($pisos_json_buttonmy);
                    $pisos_datos_array_buttonmy = json_decode($pisos_datos_buttonmy, true);
                    //////////////////////////////////////////////////////////
                    //                                                      //
                    //                  CUADRANTE en Y-Y                    //
                    //                                                      //
                    //////////////////////////////////////////////////////////
                    $max_values = array();
                    $P_values = [];
                    $Pc_values = [];
                    $Pcn_values = [];
                    $Pms_values = [];
                    $Pmns_values = [];

                    $topmx1_values=[];
                    $topmxcs_values=[];
                    $topmxcns_values=[];
                    $topmxms_values=[];
                    $topmxmns_values=[];
                    
                    $buttonmx1_values=[];
                    $buttonmxcs_values=[];
                    $buttonmxcns_values=[] ;
                    $buttonmxms_values=[];
                    $buttonmxmns_values=[];

                    $max_valuesyy = array();

                    $max_pisovux_values=[];
                    $max_pisoVy_values=[];

                    $Py_values=[];
                    $Pcsy_values=[];
                    $Pcnsy_values=[];
                    $Pmsy_values=[];
                    $Pmnsy_values=[];

                    $topmyy2_values=[];
                    $topmyycss_values=[];
                    $topmyycns_values=[];
                    $topmsmyy_values=[];
                    $topmsmnyy_values=[];

                    
                    $buttonmyy_values=[];
                    $buttonmyycs_values=[];
                    $buttonmyycns_values=[];
                    $buttonmsmyy_values=[];
                    $buttonmsmnyy_values=[];

                    for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                        // Si es el inicio de un nuevo piso, generamos la fila del piso con rowspan=5
                        echo "<tr>";
                        echo "<th rowspan='5' style='vertical-align: middle;' scope='row'>Piso " . ($piso_num + 1) . "</th>";
                        //////////////////////////////////////////////////////////
                        //                                                      //
                        //                  CUADRANTE en X-X                    //
                        //                                                      //
                        //////////////////////////////////////////////////////////
                        // Obtener los datos del piso actual P
                        $datos_piso_p = $pisos_datos_array_p[$piso_num]['Datos'];
                        $P = round((1.4 * $datos_piso_p[0] + 1.7 * $datos_piso_p[1]), 2, PHP_ROUND_HALF_UP);
                        $Pc = round((1.25 * ($datos_piso_p[0] + $datos_piso_p[1]) + $datos_piso_p[2]), 2, PHP_ROUND_HALF_UP);
                        $Pcn = round((1.25 * ($datos_piso_p[0] + $datos_piso_p[1]) - $datos_piso_p[2]), 2, PHP_ROUND_HALF_UP);
                        $Pms = round((0.9 * $datos_piso_p[0] + $datos_piso_p[2]), 2, PHP_ROUND_HALF_UP);
                        $Pmns = round((0.9 * $datos_piso_p[0] - $datos_piso_p[2]), 2, PHP_ROUND_HALF_UP);

                        $max_piso = max($P, $Pc, $Pcn, $Pms, $Pmns);
                        // Guardar el valor máximo en un array
                        $max_values[] = $max_piso;
                        $P_values[] = $P;
                        $Pc_values[] = $Pc;
                        $Pcn_values[] = $Pcn;
                        $Pms_values[] = $Pms;
                        $Pmns_values[] = $Pmns;

                        // Obtener los datos del piso actual VX
                        $datos_piso_vx = $pisos_datos_array_vx[$piso_num]['Datos'];
                        $vux = round((1.4 * $datos_piso_vx[0] + 1.7 * $datos_piso_vx[1]), 2, PHP_ROUND_HALF_UP);
                        $vucx = round((1.25 * ($datos_piso_vx[0] + $datos_piso_vx[1]) + $datos_piso_vx[2]), 2, PHP_ROUND_HALF_UP);
                        $vucnx = round((1.25 * ($datos_piso_vx[0] + $datos_piso_vx[1]) - $datos_piso_vx[2]), 2, PHP_ROUND_HALF_UP);
                        $vums = round((0.9 * $datos_piso_vx[0] + $datos_piso_vx[2]), 2, PHP_ROUND_HALF_UP);
                        $vumns = round((0.9 * $datos_piso_vx[0] - $datos_piso_vx[2]), 2, PHP_ROUND_HALF_UP);

                        $max_pisovux = max($vux, $vucx, $vucnx, $vums, $vumns);
                        // Guardar el valor máximo en un array
                        $max_pisovux_values[] = $max_pisovux;

                        // Obtener los datos del piso actual Vy
                        $datos_piso_vy = $pisos_datos_array_vy[$piso_num]['Datos'];
                        $v1y = round((1.4 * $datos_piso_vy[0] + 1.7 * $datos_piso_vy[1]), 2, PHP_ROUND_HALF_UP);
                        $vcsy = round((1.25 * ($datos_piso_vy[0] + $datos_piso_vy[1]) + $datos_piso_vy[2]), 2, PHP_ROUND_HALF_UP);
                        $vcnsy = round((1.25 * ($datos_piso_vy[0] + $datos_piso_vy[1]) - $datos_piso_vy[2]), 2, PHP_ROUND_HALF_UP);
                        $vyms = round((0.9 * $datos_piso_vy[0] + $datos_piso_vy[2]), 2, PHP_ROUND_HALF_UP);
                        $vymns = round((0.9 * $datos_piso_vy[0] - $datos_piso_vy[2]), 2, PHP_ROUND_HALF_UP);

                        // Obtener los datos del piso actual topmx
                        $datos_piso_topmx = $pisos_datos_array_topmx[$piso_num]['Datos'];
                        $topmx1 = round((1.4 * $datos_piso_topmx[0] + 1.7 * $datos_piso_topmx[1]), 2, PHP_ROUND_HALF_UP);
                        $topmxcs = round((1.25 * ($datos_piso_topmx[0] + $datos_piso_topmx[1]) + $datos_piso_topmx[2]), 2, PHP_ROUND_HALF_UP);
                        $topmxcns = round((1.25 * ($datos_piso_topmx[0] + $datos_piso_topmx[1]) - $datos_piso_topmx[2]), 2, PHP_ROUND_HALF_UP);
                        $topmxms = round((0.9 * $datos_piso_topmx[0] + $datos_piso_topmx[2]), 2, PHP_ROUND_HALF_UP);
                        $topmxmns = round((0.9 * $datos_piso_topmx[0] - $datos_piso_topmx[2]), 2, PHP_ROUND_HALF_UP);

                        $topmx1_values[] = $topmx1;
                        $topmxcs_values[] = $topmxcs;
                        $topmxcns_values[] = $topmxcns;
                        $topmxms_values[] = $topmxms;
                        $topmxmns_values[] = $topmxmns;

                        // Obtener los datos del piso actual buttonmx1
                        $datos_piso_buttonmx = $pisos_datos_array_buttonmx[$piso_num]['Datos'];
                        $buttonmx1 = round((1.4 * $datos_piso_buttonmx[0] + 1.7 * $datos_piso_buttonmx[1]), 2, PHP_ROUND_HALF_UP);
                        $buttonmxcs = round((1.25 * ($datos_piso_buttonmx[0] + $datos_piso_buttonmx[1]) + $datos_piso_buttonmx[2]), 2, PHP_ROUND_HALF_UP);
                        $buttonmxcns = round((1.25 * ($datos_piso_buttonmx[0] + $datos_piso_buttonmx[1]) - $datos_piso_buttonmx[2]), 2, PHP_ROUND_HALF_UP);
                        $buttonmxms = round((0.9 * $datos_piso_buttonmx[0] + $datos_piso_buttonmx[2]), 2, PHP_ROUND_HALF_UP);
                        $buttonmxmns = round((0.9 * $datos_piso_buttonmx[0] - $datos_piso_buttonmx[2]), 2, PHP_ROUND_HALF_UP);

                        $buttonmx1_values[] = $buttonmx1;
                        $buttonmxcs_values[] = $buttonmxcs;
                        $buttonmxcns_values[] = $buttonmxcns;
                        $buttonmxms_values[] = $buttonmxms;
                        $buttonmxmns_values[] = $buttonmxmns;

                        // Obtener los datos del piso actual  topmy
                        $datos_piso_topmy = $pisos_datos_array_topmy[$piso_num]['Datos'];
                        $topmy1 = round((1.4 * $datos_piso_topmy[0] + 1.7 * $datos_piso_topmy[1]), 2, PHP_ROUND_HALF_UP);
                        $topmycs = round((1.25 * ($datos_piso_topmy[0] + $datos_piso_topmy[1]) + $datos_piso_topmy[2]), 2, PHP_ROUND_HALF_UP);
                        $topmycns = round((1.25 * ($datos_piso_topmy[0] + $datos_piso_topmy[1]) - $datos_piso_topmy[2]), 2, PHP_ROUND_HALF_UP);
                        $topmyms = round((0.9 * $datos_piso_topmy[0] + $datos_piso_topmy[2]), 2, PHP_ROUND_HALF_UP);
                        $topmymns = round((0.9 * $datos_piso_topmy[0] - $datos_piso_topmy[2]), 2, PHP_ROUND_HALF_UP);

                        // Obtener los datos del piso actual  buttonmy
                        $datos_piso_buttonmy = $pisos_datos_array_buttonmy[$piso_num]['Datos'];
                        $buttonmy1 = round((1.4 * $datos_piso_buttonmy[0] + 1.7 * $datos_piso_buttonmy[1]), 2, PHP_ROUND_HALF_UP);
                        $buttonmycs = round((1.25 * ($datos_piso_buttonmy[0] + $datos_piso_buttonmy[1]) + $datos_piso_buttonmy[2]), 2, PHP_ROUND_HALF_UP);
                        $buttonmycns = round((1.25 * ($datos_piso_buttonmy[0] + $datos_piso_buttonmy[1]) - $datos_piso_buttonmy[2]), 2, PHP_ROUND_HALF_UP);
                        $buttonmyms = round((0.9 * $datos_piso_buttonmy[0] + $datos_piso_buttonmy[2]), 2, PHP_ROUND_HALF_UP);
                        $buttonmymns = round((0.9 * $datos_piso_buttonmy[0] - $datos_piso_buttonmy[2]), 2, PHP_ROUND_HALF_UP);

                        //////////////////////////////////////////////////////////
                        //                                                      //
                        //                  CUADRANTE en Y-Y                    //
                        //                                                      //
                        //////////////////////////////////////////////////////////

                        // Obtener los datos del piso actual  py
                        $datos_piso_p = $pisos_datos_array_p[$piso_num]['Datos'];
                        $Py = round((1.4 * $datos_piso_p[0] + 1.7 * $datos_piso_p[1]), 2, PHP_ROUND_HALF_UP);
                        $Pcsy = round((1.25 * ($datos_piso_p[0] + $datos_piso_p[1]) + $datos_piso_p[3]), 2, PHP_ROUND_HALF_UP);
                        $Pcnsy = round((1.25 * ($datos_piso_p[0] + $datos_piso_p[1]) - $datos_piso_p[3]), 2, PHP_ROUND_HALF_UP);
                        $Pmsy = round((0.9 * $datos_piso_p[0] + $datos_piso_p[3]), 2, PHP_ROUND_HALF_UP);
                        $Pmnsy = round((0.9 * $datos_piso_p[0] - $datos_piso_p[3]), 2, PHP_ROUND_HALF_UP);

                        $max_pisoyy = max($Py, $Pcsy, $Pcnsy, $Pmsy, $Pmnsy);
                        // Guardar el valor máximo en un array
                        $max_valuesyy[] = $max_pisoyy;

                        $Py_values[] = $Py;
                        $Pcsy_values[] = $Pcsy;
                        $Pcnsy_values[] = $Pcnsy;
                        $Pmsy_values[] = $Pmsy;
                        $Pmnsy_values[] = $Pmnsy;

                        // Obtener los datos del piso actual VX
                        $datos_piso_vx = $pisos_datos_array_vx[$piso_num]['Datos'];
                        $vux1 = round((1.4 * $datos_piso_vx[0] + 1.7 * $datos_piso_vx[1]), 2, PHP_ROUND_HALF_UP);
                        $vucsy = round((1.25 * ($datos_piso_vx[0] + $datos_piso_vx[1]) + $datos_piso_vx[3]), 2, PHP_ROUND_HALF_UP);
                        $vucnsy = round((1.25 * ($datos_piso_vx[0] + $datos_piso_vx[1]) - $datos_piso_vx[3]), 2, PHP_ROUND_HALF_UP);
                        $vuxms = round((0.9 * $datos_piso_vx[0] + $datos_piso_vx[3]), 2, PHP_ROUND_HALF_UP);
                        $vuxmns = round((0.9 * $datos_piso_vx[0] - $datos_piso_vx[3]), 2, PHP_ROUND_HALF_UP);


                        // Obtener los datos del piso actual Vy
                        $datos_piso_vy = $pisos_datos_array_vy[$piso_num]['Datos'];
                        $vyY = round((1.4 * $datos_piso_vy[0] + 1.7 * $datos_piso_vy[1]), 2, PHP_ROUND_HALF_UP);
                        $vycs = round((1.25 * ($datos_piso_vy[0] + $datos_piso_vy[1]) + $datos_piso_vy[3]), 2, PHP_ROUND_HALF_UP);
                        $vycns = round((1.25 * ($datos_piso_vy[0] + $datos_piso_vy[1]) - $datos_piso_vy[3]), 2, PHP_ROUND_HALF_UP);
                        $vmsy = round((0.9 * $datos_piso_vy[0] + $datos_piso_vy[3]), 2, PHP_ROUND_HALF_UP);
                        $vmnsy = round((0.9 * $datos_piso_vy[0] - $datos_piso_vy[3]), 2, PHP_ROUND_HALF_UP);

                        $max_pisoVy = max($vyY, $vycs, $vycns, $vmsy, $vmnsy);
                        // Guardar el valor máximo en un array
                        $max_pisoVy_values[] = $max_pisoVy;


                        // Obtener los datos del piso actual topmx
                        $datos_piso_topmx = $pisos_datos_array_topmx[$piso_num]['Datos'];
                        $topmx2 = round((1.4 * $datos_piso_topmx[0] + 1.7 * $datos_piso_topmx[1]), 2, PHP_ROUND_HALF_UP);
                        $topmxycs = round((1.25 * ($datos_piso_topmx[0] + $datos_piso_topmx[1]) + $datos_piso_topmx[3]), 2, PHP_ROUND_HALF_UP);
                        $topmxycns = round((1.25 * ($datos_piso_topmx[0] + $datos_piso_topmx[1]) - $datos_piso_topmx[3]), 2, PHP_ROUND_HALF_UP);
                        $topmsmx = round((0.9 * $datos_piso_topmx[0] + $datos_piso_topmx[3]), 2, PHP_ROUND_HALF_UP);
                        $topmsmnx = round((0.9 * $datos_piso_topmx[0] - $datos_piso_topmx[3]), 2, PHP_ROUND_HALF_UP);

                        // Obtener los datos del piso actual buttonmx1
                        $datos_piso_buttonmx = $pisos_datos_array_buttonmx[$piso_num]['Datos'];
                        $buttonmyx2 = round((1.4 * $datos_piso_buttonmx[0] + 1.7 * $datos_piso_buttonmx[1]), 2, PHP_ROUND_HALF_UP);
                        $buttonmyxcs = round((1.25 * ($datos_piso_buttonmx[0] + $datos_piso_buttonmx[1]) + $datos_piso_buttonmx[3]), 2, PHP_ROUND_HALF_UP);
                        $buttonmyxcns = round((1.25 * ($datos_piso_buttonmx[0] + $datos_piso_buttonmx[1]) - $datos_piso_buttonmx[3]), 2, PHP_ROUND_HALF_UP);
                        $buttonmsmy = round((0.9 * $datos_piso_buttonmx[0] + $datos_piso_buttonmx[3]), 2, PHP_ROUND_HALF_UP);
                        $buttonmsmny = round((0.9 * $datos_piso_buttonmx[0] - $datos_piso_buttonmx[3]), 2, PHP_ROUND_HALF_UP);

                        // Obtener los datos del piso actual  topmy
                        $datos_piso_topmy = $pisos_datos_array_topmy[$piso_num]['Datos'];
                        $topmyy2 = round((1.4 * $datos_piso_topmy[0] + 1.7 * $datos_piso_topmy[1]), 2, PHP_ROUND_HALF_UP);
                        $topmyycss = round((1.25 * ($datos_piso_topmy[0] + $datos_piso_topmy[1]) + $datos_piso_topmy[3]), 2, PHP_ROUND_HALF_UP);
                        $topmyycns = round((1.25 * ($datos_piso_topmy[0] + $datos_piso_topmy[1]) - $datos_piso_topmy[3]), 2, PHP_ROUND_HALF_UP);
                        $topmsmyy = round((0.9 * $datos_piso_topmy[0] + $datos_piso_topmy[3]), 2, PHP_ROUND_HALF_UP);
                        $topmsmnyy = round((0.9 * $datos_piso_topmy[0] - $datos_piso_topmy[3]), 2, PHP_ROUND_HALF_UP);

                        $topmyy2_values[] = $topmyy2;
                        $topmyycss_values[] = $topmyycss;
                        $topmyycns_values[] = $topmyycns;
                        $topmsmyy_values[] = $topmsmyy;
                        $topmsmnyy_values[] = $topmsmnyy;

                        // Obtener los datos del piso actual  buttonmy
                        $datos_piso_buttonmy = $pisos_datos_array_buttonmy[$piso_num]['Datos'];
                        $buttonmyy = round((1.4 * $datos_piso_buttonmy[0] + 1.7 * $datos_piso_buttonmy[1]), 2, PHP_ROUND_HALF_UP);
                        $buttonmyycs = round((1.25 * ($datos_piso_buttonmy[0] + $datos_piso_buttonmy[1]) + $datos_piso_buttonmy[3]), 2, PHP_ROUND_HALF_UP);
                        $buttonmyycns = round((1.25 * ($datos_piso_buttonmy[0] + $datos_piso_buttonmy[1]) - $datos_piso_buttonmy[3]), 2, PHP_ROUND_HALF_UP);
                        $buttonmsmyy = round((0.9 * $datos_piso_buttonmy[0] + $datos_piso_buttonmy[3]), 2, PHP_ROUND_HALF_UP);
                        $buttonmsmnyy = round((0.9 * $datos_piso_buttonmy[0] - $datos_piso_buttonmy[3]), 2, PHP_ROUND_HALF_UP);
                        
                        $buttonmyy_values[] = $buttonmyy;
                        $buttonmyycs_values[] = $buttonmyycs;
                        $buttonmyycns_values[] = $buttonmyycns;
                        $buttonmsmyy_values[] = $buttonmsmyy;
                        $buttonmsmnyy_values[] = $buttonmsmnyy;
                        // Mostrar los resultados para este piso
                        echo "<td style='vertical-align: middle;'>1.40CM+1.70CV</td>";
                        echo "<td>$P</td>";
                        echo "<td>$vux</td>";
                        echo "<td>$v1y</td>";
                        echo "<td>$topmx1</td>";
                        echo "<td>$buttonmx1</td>";
                        echo "<td>$topmy1</td>";
                        echo "<td>$buttonmy1</td>";
                        echo "<td>$Py</td>";
                        echo "<td>$vux1</td>";
                        echo "<td>$vyY</td>";
                        echo "<td>$topmx2</td>";
                        echo "<td>$buttonmyx2</td>";
                        echo "<td>$topmyy2</td>";
                        echo "<td>$buttonmyy</td>";
                        // Cerramos la fila del piso
                        echo "</tr>";

                        // Generamos las 4 subfilas restantes para este piso
                        for ($subfila = 2; $subfila <= 5; $subfila++) {
                            echo "<tr>";
                            switch ($subfila) {
                                case 2:
                                    echo "<td style='vertical-align: middle;'>1.25(CM+CV)+CS</td>";
                                    echo "<td>$Pc</td>";
                                    echo "<td>$vucx</td>";
                                    echo "<td>$vcsy</td>";
                                    echo "<td>$topmxcs</td>";
                                    echo "<td>$buttonmxcs</td>";
                                    echo "<td>$topmycs</td>";
                                    echo "<td>$buttonmycs</td>";
                                    //cuadrante yy
                                    echo "<td>$Pcsy</td>";
                                    echo "<td>$vucsy</td>";
                                    echo "<td>$vycs</td>";
                                    echo "<td>$topmxycs</td>";
                                    echo "<td>$buttonmyxcs</td>";
                                    echo "<td>$topmyycss</td>";
                                    echo "<td>$buttonmyycs</td>";
                                    break;
                                case 3:
                                    echo "<td style='vertical-align: middle;'>1.25(CM+CV)-CS</td>";
                                    echo "<td>$Pcn</td>";
                                    echo "<td>$vucnx</td>";
                                    echo "<td>$vcnsy</td>";
                                    echo "<td>$topmxcns</td>";
                                    echo "<td>$buttonmxcns</td>";
                                    echo "<td>$topmycns</td>";
                                    echo "<td>$buttonmycns</td>";
                                    //cuadrante yy
                                    echo "<td>$Pcnsy</td>";
                                    echo "<td>$vucnsy</td>";
                                    echo "<td>$vycns</td>";
                                    echo "<td>$topmxycns</td>";
                                    echo "<td>$buttonmyxcns</td>";
                                    echo "<td>$topmyycns</td>";
                                    echo "<td>$buttonmyycns</td>";
                                    break;
                                case 4:
                                    echo "<td style='vertical-align: middle;'>0.90CM+CS</td>";
                                    echo "<td>$Pms</td>";
                                    echo "<td>$vums</td>";
                                    echo "<td>$vyms</td>";
                                    echo "<td>$topmxms</td>";
                                    echo "<td>$buttonmxms</td>";
                                    echo "<td>$topmyms</td>";
                                    echo "<td>$buttonmyms</td>";
                                    //cuadrante yy
                                    echo "<td>$Pmsy</td>";
                                    echo "<td>$vuxms</td>";
                                    echo "<td>$vmsy</td>";
                                    echo "<td>$topmsmx</td>";
                                    echo "<td>$buttonmsmy</td>";
                                    echo "<td>$topmsmyy</td>";
                                    echo "<td>$buttonmsmyy</td>";
                                    break;
                                case 5:
                                    echo "<td style='vertical-align: middle;'>0.90CM-CS</td>";
                                    echo "<td>$Pmns</td>";
                                    echo "<td>$vumns</td>";
                                    echo "<td>$vymns</td>";
                                    echo "<td>$topmxmns</td>";
                                    echo "<td>$buttonmxmns</td>";
                                    echo "<td>$topmymns</td>";
                                    echo "<td>$buttonmymns</td>";
                                    //cuadrante yy
                                    echo "<td>$Pmnsy</td>";
                                    echo "<td>$vuxmns</td>";
                                    echo "<td>$vmnsy</td>";
                                    echo "<td>$topmsmnx</td>";
                                    echo "<td>$buttonmsmny</td>";
                                    echo "<td>$topmsmnyy</td>";
                                    echo "<td>$buttonmsmnyy</td>";
                                    break;
                            }
                            // Aquí puedes agregar más columnas según sea necesario para cada subdivisión
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-danger">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th scope="col" style="vertical-align: middle;" class="text-center sub_encabezados">
                                    Piso</th>
                                <th scope="col" colspan="3" style="vertical-align: middle;" class="text-center sub_encabezados">
                                    DIRECCION X-X</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $valorpm = []; // Array para almacenar los valores de $max_values
                                $mulMax_values = [];
                                $mu2Max_values = [];
                                foreach ($max_values as $max_piso) {
                                    $valorpm[] = $max_piso;
                                }

                                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                                    // Si es el inicio de un nuevo piso, generamos la fila del piso con rowspan=5
                                    echo "<tr>";
                                    echo "<th rowspan='5' style='vertical-align: middle;' scope='row'>Piso " . ($piso_num + 1) . "</th>";
                                    echo "<td style='vertical-align: middle;'>Pu máx</td>";
                                    
                                    $valor_piso_actual = isset($valorpm[$piso_num]) ? $valorpm[$piso_num] : ''; // Obtener el valor o cadena vacía si no está definido          
                                     
                                    $P_value = isset($P_values[$piso_num]) ? $P_values[$piso_num] : '';
                                    $Pc_value = isset($Pc_values[$piso_num]) ? $Pc_values[$piso_num] : '';
                                    $Pcn_value = isset($Pcn_values[$piso_num]) ? $Pcn_values[$piso_num] : '';
                                    $Pms_value = isset($Pms_values[$piso_num]) ? $Pms_values[$piso_num] : '';
                                    $Pmns_value = isset($Pmns_values[$piso_num]) ? $Pmns_values[$piso_num] : '';

                                    $topmx1_value = isset($topmx1_values[$piso_num]) ? $topmx1_values[$piso_num] : '';
                                    $topmxcs_value = isset($topmxcs_values[$piso_num]) ? $topmxcs_values[$piso_num] : '';
                                    $topmxcns_value = isset($topmxcns_values[$piso_num]) ? $topmxcns_values[$piso_num] : '';
                                    $topmxms_value = isset($topmxms_values[$piso_num]) ? $topmxms_values[$piso_num] : '';
                                    $topmxmns_value = isset($topmxmns_values[$piso_num]) ? $topmxmns_values[$piso_num] : '';
                                
                                    $buttonmx1_value = isset($buttonmx1_values[$piso_num]) ? $buttonmx1_values[$piso_num] : '';
                                    $buttonmxcs_value = isset($buttonmxcs_values[$piso_num]) ? $buttonmxcs_values[$piso_num] : '';
                                    $buttonmxcns_value = isset($buttonmxcns_values[$piso_num]) ? $buttonmxcns_values[$piso_num] : '';
                                    $buttonmxms_value = isset($buttonmxms_values[$piso_num]) ? $buttonmxms_values[$piso_num] : '';
                                    $buttonmxmns_value = isset($buttonmxmns_values[$piso_num]) ? $buttonmxmns_values[$piso_num] : '';
                                
                                    // Calcular $mulMax según el valor actual del piso
                                    $mulMax = 0;
                                    if ($valor_piso_actual == $P_value) {
                                        $mulMax = $buttonmx1_value;
                                    } else if ($valor_piso_actual == $Pc_value) {
                                        $mulMax = $buttonmxcs_value;
                                    } elseif ($valor_piso_actual == $Pcn_value) {
                                        $mulMax = $buttonmxcns_value;
                                    } elseif ($valor_piso_actual == $Pms_value) {
                                        $mulMax = $buttonmxms_value;
                                    }
                                    $mulMax_values[] = $mulMax;
                                 
                                    if ($valor_piso_actual == $P_value) {
                                        $mu2Max = $topmx1_value;
                                    } else if ($valor_piso_actual == $Pc_value) {
                                        $mu2Max = $topmxcs_value;
                                    } elseif ($valor_piso_actual == $Pcn_value) {
                                        $mu2Max = $topmxcns_value;
                                    } elseif ($valor_piso_actual == $Pms_value) {
                                        $mu2Max = $topmxms_value;
                                    } else {
                                        $mu2Max = $topmxmns_value;
                                    }
                                    $mu2Max_values[] = $mu2Max;
                                    echo "<td>$valor_piso_actual</td>";
                                    echo "<td>Ton</td>";
                                    for ($subfila = 2; $subfila <= 5; $subfila++) {
                                        echo "<tr>";
                                        switch ($subfila) {
                                            case 2:
                                                echo "<td style='vertical-align: middle;'>Mu1 máx</td>";
                                                echo "<td>$mulMax</td>";
                                                echo "<td>Ton.m</td>";
                                                break;
                                            case 3:
                                                echo "<td style='vertical-align: middle;'>Mu2 máx</td>";
                                                echo "<td>$mu2Max</td>";
                                                echo "<td>Ton.m</td>";
                                                break;
                                        }
                                        // Aquí puedes agregar más columnas según sea necesario para cada subdivisión
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-info">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover ">
                        <thead class="sub_encabezados">
                            <th scope="col" style="vertical-align: middle;" class="text-center">
                                Piso</th>
                            <th scope="col" colspan="3" style="vertical-align: middle;" class="text-center">
                                DIRECCION Y-Y</th>
                        </thead>
                        <tbody>
                            <?php
                                $valorpmyy = []; // Array para almacenar los valores de $max_values
                                $muylMax_values = []; 
                                $muy2Max_values = []; 
                                foreach ($max_valuesyy as $max_pisoyy) {
                                    $valorpmyy[] = $max_pisoyy;
                                }

                                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                                    // Si es el inicio de un nuevo piso, generamos la fila del piso con rowspan=5
                                    echo "<tr>";
                                    echo "<th rowspan='5' style='vertical-align: middle;' scope='row'>Piso " . ($piso_num + 1) . "</th>";
                                    echo "<td style='vertical-align: middle;'>Pu máx</td>";
                                    
                                    $valor_piso_actualyy = isset($valorpmyy[$piso_num]) ? $valorpmyy[$piso_num] : ''; // Obtener el valor o cadena vacía si no está definido          
                                     
                                    $Py_value = isset($Py_values[$piso_num]) ? $Py_values[$piso_num] : '';
                                    $Pcsy_value = isset($Pcsy_values[$piso_num]) ? $Pcsy_values[$piso_num] : '';
                                    $Pcnsy_value = isset($Pcnsy_values[$piso_num]) ? $Pcnsy_values[$piso_num] : '';
                                    $Pmsy_value = isset($Pmsy_values[$piso_num]) ? $Pmsy_values[$piso_num] : '';
                                    $Pmnsy_value = isset($Pmnsy_values[$piso_num]) ? $Pmnsy_values[$piso_num] : '';
                                    
                                    $topmyy2_value = isset($topmyy2_values[$piso_num]) ? $topmyy2_values[$piso_num] : '';
                                    $topmyycss_value = isset($topmyycss_values[$piso_num]) ? $topmyycss_values[$piso_num] : '';
                                    $topmyycns_value = isset($topmyycns_values[$piso_num]) ? $topmyycns_values[$piso_num] : '';
                                    $topmsmyy_value = isset($topmsmyy_values[$piso_num]) ? $topmsmyy_values[$piso_num] : '';
                                    $topmsmnyy_value = isset($topmsmnyy_values[$piso_num]) ? $topmsmnyy_values[$piso_num] : '';
                                
                                    $buttonmyy_value = isset($buttonmyy_values[$piso_num]) ? $buttonmyy_values[$piso_num] : '';
                                    $buttonmyycs_value = isset($buttonmyycs_values[$piso_num]) ? $buttonmyycs_values[$piso_num] : '';
                                    $buttonmyycns_value = isset($buttonmyycns_values[$piso_num]) ? $buttonmyycns_values[$piso_num] : '';
                                    $buttonmsmyy_value = isset($buttonmsmyy_values[$piso_num]) ? $buttonmsmyy_values[$piso_num] : '';
                                    $buttonmsmnyy_value = isset($buttonmsmnyy_values[$piso_num]) ? $buttonmsmnyy_values[$piso_num] : '';
                                
                                    // Calcular $mulMax según el valor actual del piso
                                    $muylMax = 0;
                                    if ($valor_piso_actualyy == $Py_value) {
                                        $muylMax = $buttonmyy_value;
                                    } else if ($valor_piso_actualyy == $Pcsy_value) {
                                        $muylMax = $buttonmyycs_value;
                                    } else if ($valor_piso_actualyy == $Pcnsy_value) {
                                        $muylMax = $buttonmyycns_value;
                                    } else if ($valor_piso_actualyy == $Pmsy_value) {
                                        $muylMax = $buttonmsmyy_value;
                                    } else {
                                        $muylMax = $buttonmsmnyy_value;
                                    }
                                    $muylMax_values[] = $muylMax;

                                    $muy2Max = 0;
                                    if ($valor_piso_actualyy == $Py_value) {
                                        $muy2Max = $topmyy2_value;
                                    } else if ($valor_piso_actualyy == $Pcsy_value) {
                                        $muy2Max = $topmyycss_value;
                                    } elseif ($valor_piso_actualyy == $Pcnsy_value) {
                                        $muy2Max = $topmyycns_value;
                                    } elseif ($valor_piso_actualyy == $Pmsy_value) {
                                        $muy2Max = $topmsmyy_value;
                                    } else {
                                        $muy2Max = $topmsmnyy_value;
                                    }
                                    $muy2Max_values[] = $muy2Max;

                                    echo "<td>$valor_piso_actualyy</td>";
                                    echo "<td>Ton</td>";
                                    for ($subfila = 2; $subfila <= 5; $subfila++) {
                                        echo "<tr>";
                                        switch ($subfila) {
                                            case 2:
                                                echo "<td style='vertical-align: middle;'>Mu1 máx</td>";
                                                echo "<td>$muylMax</td>";
                                                echo "<td>Ton.m</td>";
                                                break;
                                            case 3:
                                                echo "<td style='vertical-align: middle;'>Mu2 máx</td>";
                                                echo "<td>$muy2Max</td>";
                                                echo "<td>Ton.m</td>";
                                                break;
                                        }
                                        // Aquí puedes agregar más columnas según sea necesario para cada subdivisión
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <table class="table table-bordered table-hover">
        <thead class="bg-info text-center">
            <tr class="sub_encabezados">
                <th colspan="4" scope="col" style="vertical-align: middle;" class="text-center">Artículo 10.11.3. <br>
                    Longitud no Arriostrada de un Elemento
                    a Compresión</th>
                <th colspan="5" scope="col" style="vertical-align: middle;" class="text-center">Cálculo de la Esbeltez
                    de la Columna</th>
            </tr>
            <tr class="sub_encabezados">
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
        <tbody>
            <?php
                $klu_values = []; 
                $kluy_values = []; 
                $tipDes="Con Desplazamiento Lateral";
                $longq=0.190;
                $longqy=0.116;
                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                    // Si es el inicio de un nuevo piso, generamos la fila del piso con rowspan=5
                    echo "<tr>";
                    echo "<th rowspan='5' style='vertical-align: middle;' scope='row'>Piso " . ($piso_num + 1) . "</th>";
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

                    $ag = $L1 * $L2;
                    $Igx = $L1 * pow($L2, 3) / 12;
                    $Igy = $L2 * pow($L1, 3) / 12;
                    $rx = round(sqrt($Igx / $ag), 2, PHP_ROUND_HALF_UP);
                    $ry = round(sqrt($Igy / $ag), 2, PHP_ROUND_HALF_UP);

                    $klu = round($CDEZ * ($H * 100) / $rx, 2, PHP_ROUND_HALF_UP);
                    $klu_values[] = $klu;

                    $kluy = round($CDEZ * ($H * 100) / $ry, 2, PHP_ROUND_HALF_UP);
                    $kluy_values[] = $kluy;

                    if ($klu < 100) {
                        $verfi = "Si Cumple";
                    } else {
                        $verfi = "No Cumple";
                    }

                    if ($kluy < 100) {
                        $verfiy = "Si Cumple";
                    } else {
                        $verfiy = "No Cumple";
                    }

                 
                    echo "<td style='vertical-align: middle;'>Dirección X-X</td>";
                    echo "<td>$indiceQX[$piso_num]</td>";
                    echo "<td>$tipoEstructuraX[$piso_num]</td>";
                    echo "<td>$RREX</td>";
                    echo "<td>$CDEZ</td>";
                    echo "<td>$H</td>";
                    echo "<td>$klu</td>";
                    echo "<td>$verfi</td>";
                    for ($subfila = 2; $subfila <= 5; $subfila++) {
                        echo "<tr>";
                        switch ($subfila) {
                            case 2:
                                echo "<td style='vertical-align: middle;'>Dirección Y-Y</td>";
                                echo "<td>$indiceQY[$piso_num]</td>";
                                echo "<td>$tipoEstructuraY[$piso_num]</td>";
                                echo "<td>$RREX</td>";
                                echo "<td>$CDEZ</td>";
                                echo "<td>$H</td>";
                                echo "<td>$kluy</td>";
                                echo "<td>$verfiy</td>";
                                break;
                        }
                        // Aquí puedes agregar más columnas según sea necesario para cada subdivisión
                        echo "</tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <table class="table table-bordered table-hover">
        <thead class="bg-info text-center">
            <tr class="sub_encabezados">
                <th colspan="15" scope="col" style="vertical-align: middle;" class="text-center">Artículo 10.12. <br>
                Momentos Magnificados en Estructuras sin Desplazamiento Lateral</th>
            </tr>
            <tr class="sub_encabezados">
                <th scope="col" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" style="vertical-align: middle;">DIRECCION</th>
                <th scope="col" style="vertical-align: middle;">M1 <br>(Ton.m)</th>
                <th scope="col" style="vertical-align: middle;">M2 <br>(Ton.m)</th>
                <th scope="col" style="vertical-align: middle;">M1/M2</th>
                <th scope="col" style="vertical-align: middle;">Tipo de Flexión del Elemento</th>
                <th scope="col" style="vertical-align: middle;">34-12(M1/M2)</th>
                <th scope="col" style="vertical-align: middle;">Verificación de Esbeltez</th>
                <th scope="col" style="vertical-align: middle;">βd</th>
                <th scope="col" style="vertical-align: middle;">EI <br>(Ton.m²)</th>
                <th scope="col" style="vertical-align: middle;">Pc <br>(Ton)</th>
                <th scope="col" style="vertical-align: middle;">M2 mín <br>(Ton.m)</th>
                <th scope="col" style="vertical-align: middle;">Cm</th>
                <th scope="col" style="vertical-align: middle;">δns</th>
                <th scope="col" style="vertical-align: middle;">Mc <br>(Ton.m)</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // $mulMax_values = [];
                // $mu2Max_values = [];
                // $muylMax_values = []; 
                // $muy2Max_values = []; 
                // var_dump($muylMax_values);
                // var_dump($muy2Max_values);
                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                    // Si es el inicio de un nuevo piso, generamos la fila del piso con rowspan=5
                    echo "<tr>";
                    echo "<th rowspan='5' style='vertical-align: middle;' scope='row'>Piso " . ($piso_num + 1) . "</th>";
                    $valor_piso_actual = isset($valorpm[$piso_num]) ? $valorpm[$piso_num] : ''; // Obtener el valor o cadena vacía si no está definido          
                    $valor_piso_actualyy = isset($valorpmyy[$piso_num]) ? $valorpmyy[$piso_num] : ''; // Obtener el valor o cadena vacía si no está definido          
                                        
                    // Realizar la operación similar para cada array
                    $mulMax_value = isset($mulMax_values[$piso_num]) ? $mulMax_values[$piso_num] : '';
                    $mu2Max_value = isset($mu2Max_values[$piso_num]) ? $mu2Max_values[$piso_num] : '';

                    $muylMax_value = isset($muylMax_values[$piso_num]) ? $muylMax_values[$piso_num] : '';
                    $muy2Max_value = isset($muy2Max_values[$piso_num]) ? $muy2Max_values[$piso_num] : '';

                    $klu_value = isset($klu_values[$piso_num]) ? $klu_values[$piso_num] : '';
                    $kluy_value = isset($kluy_values[$piso_num]) ? $kluy_values[$piso_num] : '';
                    
                    $max_pisovux_value = isset($max_pisovux_values[$piso_num]) ? $max_pisovux_values[$piso_num] : '';
                    $max_pisoVy_value = isset($max_pisoVy_values[$piso_num]) ? $max_pisoVy_values[$piso_num] : '';

                    $m1ton=min($mulMax_value,$mu2Max_value);
                    $m2ton=abs(max($mulMax_value,$mu2Max_value));

                    $m1tony=min($muylMax_value,$muy2Max_value);
                    $m2tony=abs(max($muylMax_value,$muy2Max_value));

                    $m1m2= round($m1ton/$m2ton,2,PHP_ROUND_HALF_DOWN);
                    $m1m2y= round($m1tony/$m2tony,2,PHP_ROUND_HALF_DOWN);

                    if ($m1m2<0) {
                       $tipflexion="Curvatura Doble";
                    } else {
                        $tipflexion="Curvatura Simple";
                    }

                    if ($m1m2y<0) {
                        $tipflexiony="Curvatura Doble";
                    } else {
                         $tipflexiony="Curvatura Simple";
                    }

                    if (34-12*($m1ton/$m2ton)>40) {
                       $calmm=40;
                    } else {
                        $calmm=34-12*($m1ton/$m2ton);
                    }
                    
                    if (34-12*($m1tony/$m2tony)>40) {
                        $calmmy=40;
                    } else {
                         $calmmy=34-12*($m1tony/$m1tony);
                    }

                    if ($tipoEstructuraX[$piso_num]=="Con Desplazamiento Lateral") {
                        $veresbeltez="No Considerar Efectos de Esbeltez";
                    } else {
                        if ($klu_value<=$calmm) {
                            $veresbeltez="No Considerar Efectos de Esbeltez";
                        } else {
                            $veresbeltez="Considerar Efectos de Esbeltez";
                        }
                    }

                    if ($tipoEstructuraY[$piso_num]=="Con Desplazamiento Lateral") {
                        $veresbeltezy="No Considerar Efectos de Esbeltez";
                    } else {
                        if ($kluy_value<=$calmmy) {
                            $veresbeltezy="No Considerar Efectos de Esbeltez";
                        } else {
                            $veresbeltezy="Considerar Efectos de Esbeltez";
                        }
                    }

                    //bd
                    $datos_piso_p = $pisos_datos_array_p[$piso_num]['Datos'];
                    $datos_piso_vx = $pisos_datos_array_vx[$piso_num]['Datos'];
                    $datos_piso_vy = $pisos_datos_array_vy[$piso_num]['Datos'];

                    //XX
                    if ($tipoEstructuraX[$piso_num]=="Sin Desplazamiento Lateral") {
                        $bd=round(max(1.4*$datos_piso_p[0]+1.7*$datos_piso_p[1],1.25*($datos_piso_p[0]+$datos_piso_p[1]))/$valor_piso_actual,2,PHP_ROUND_HALF_UP);
                    } else {
                        $bd=round(max(1.4*$datos_piso_vx[0]+1.7*$datos_piso_vx[1],1.25*($datos_piso_vx[0]+$datos_piso_vx[1]))/$max_pisovux_value,2,PHP_ROUND_HALF_UP);
                    }

                    //YY
                    if ($tipoEstructuraY[$piso_num]=="Sin Desplazamiento Lateral") {
                        $bdy=round(max(1.4*$datos_piso_p[0]+1.7*$datos_piso_p[1],1.25*($datos_piso_p[0]+$datos_piso_p[1]))/$valor_piso_actualyy,2,PHP_ROUND_HALF_UP);
                    } else {
                        $bdy=round(max(1.4*$datos_piso_vy[0]+1.7*$datos_piso_vy[1],1.25*($datos_piso_vy[0]+$datos_piso_vy[1]))/$max_pisoVy_value,2,PHP_ROUND_HALF_UP);
                    }

                    ///////////////-XX-EL////////////////////
                    if ($veresbeltez=="No Considerar Efectos de Esbeltez") {
                        $elton="-";
                    }else{
                        $ec=1500*sqrt($fc);
                        $elton=(0.4*$ec*$Igx/(1+$bd))/pow(10,7);
                    }
                    ///////////////-XX-pc////////////////////
                    if ($veresbeltez=="No Considerar Efectos de Esbeltez") {
                        $pcton="-";
                    }else{
                        $pcton = (pow(pi(), 2) * $elton) / pow($CDEZ * $H, 2);
                    }
                    ///////////////-XX-m2min////////////////////
                    if ($veresbeltez=="No Considerar Efectos de Esbeltez") {
                        $m2min="-";
                    }else{
                        $m2min = ($valor_piso_actual*(15+0.03*$H*1000)/1000);
                    }
                    ///////////////-XX-cm////////////////////
                    if ($veresbeltez=="No Considerar Efectos de Esbeltez") {
                        $cm="-";
                    }else{
                        if (0.6+0.4*($m1ton/$m2ton)>=0.4) {
                            $cm= 0.6+0.4*($m1ton/$m2ton);
                        } else {
                            $cm= 0.4;
                        }
                    }
                     ///////////////-XX-ns////////////////////
                    if ($veresbeltez=="No Considerar Efectos de Esbeltez") {
                        $ns=1;
                    }else{
                        if ($cm/(1-($valor_piso_actual/(0.75*$pcton)))>=1) {
                            $ns = $cm/(1-($valor_piso_actual/(0.75*$pcton)));
                        } else {
                            $ns = 1;
                        }
                    }
                    ///////////////-XX-mcTon////////////////////
                    $mcTon=$m2ton*$ns;

                    //////////////------------------------//////////////////////
                    ///////////////-YY-EL////////////////////
                    if ($veresbeltezy=="No Considerar Efectos de Esbeltez") {
                        $eltony="-";
                    }else{
                        $ec=1500*sqrt($fc);
                        $eltony=(0.4*$ec*$Igx/($CDEZ+$bdy))/pow(10,7);
                    }

                    ///////////////-YY-pc////////////////////
                    if ($veresbeltezy=="No Considerar Efectos de Esbeltez") {
                        $pctony="-";
                    }else{
                        $pctony = (pow(pi(), 2) * $eltony) / pow(1 * $H, 2);
                    }

                    ///////////////-XX-m2min////////////////////
                    if ($veresbeltezy=="No Considerar Efectos de Esbeltez") {
                        $m2miny="-";
                    }else{
                        $m2miny = ($valor_piso_actualyy*(15+0.03*$H*1000)/1000);
                    }
                    ///////////////-XX-cm////////////////////
                    if ($veresbeltezy=="No Considerar Efectos de Esbeltez") {
                        $cmy="-";
                    }else{
                        if (0.6+0.4*($m1tony/$m2tony)>=0.4) {
                            $cmy= 0.6+0.4*($m1tony/$m2tony);
                        } else {
                            $cmy= 0.4;
                        }
                    }
                     ///////////////-XX-ns////////////////////
                    if ($veresbeltezy=="No Considerar Efectos de Esbeltez") {
                        $nsy=1;
                    }else{
                        if ($cmy/(1-($valor_piso_actualyy/(0.75*$pctony)))>=1) {
                            $nsy = $cmy/(1-($valor_piso_actualyy/(0.75*$pctony)));
                        } else {
                            $nsy = 1;
                        }
                    }
                    ///////////////-YY-mcTon////////////////////
                    $mcTony=$m2tony*$nsy;

                    echo "<td style='vertical-align: middle;'>Dirección X-X</td>";
                    echo "<td>$m1ton</td>";
                    echo "<td>$m2ton</td>";
                    echo "<td>$m1m2</td>";
                    echo "<td>$tipflexion</td>";
                    echo "<td>$calmm</td>";
                    echo "<td>$veresbeltez</td>";
                    echo "<td>$bd</td>";
                    echo "<td>$elton</td>";
                    echo "<td>$pcton</td>";
                    echo "<td>$m2min</td>";
                    echo "<td>$cm</td>";   
                    echo "<td>$ns</td>";
                    echo "<td>$mcTon</td>";

                    for ($subfila = 2; $subfila <= 5; $subfila++) {
                        echo "<tr>";
                        switch ($subfila) {
                            case 2:
                                echo "<td style='vertical-align: middle;'>Dirección Y-Y</td>";
                                echo "<td>$m1tony</td>";
                                echo "<td>$m2tony</td>";
                                echo "<td>$m1m2y</td>";
                                echo "<td>$tipflexiony</td>";
                                echo "<td>$calmmy</td>";
                                echo "<td>$veresbeltezy</td>";
                                echo "<td>$bdy</td>";
                                echo "<td>$eltony</td>";
                                echo "<td>$pctony</td>";
                                echo "<td>$m2miny</td>";
                                echo "<td>$cmy</td>";  
                                echo "<td>$nsy</td>";
                                echo "<td>$mcTony</td>";  
                                break;
                        }
                        // Aquí puedes agregar más columnas según sea necesario para cada subdivisión
                        echo "</tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <table class="table table-bordered table-hover">
        <thead class="bg-info text-center">
            <tr class="sub_encabezados">
                <th colspan="17" scope="col" style="vertical-align: middle;" class="text-center">Artículo 10.13. <br>
                Momentos Magnificados en Estructuras con Desplazamiento Lateral</th>
            </tr>
            <tr class="sub_encabezados">
                <th scope="col" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" style="vertical-align: middle;">DIRECCION</th>
                <th scope="col" style="vertical-align: middle;">(𝒌𝒍_𝒖)/𝒓</th>
                <th scope="col" style="vertical-align: middle;">Verificación de Esbeltez</th>
                <th scope="col" style="vertical-align: middle;">δs1</th>
                <th scope="col" style="vertical-align: middle;">ƩPu <br>(Ton)</th>
                <th scope="col" style="vertical-align: middle;">Pc <br>(Ton)</th>
                <th scope="col" style="vertical-align: middle;">ƩPc <br>(Ton)</th>
                <th scope="col" style="vertical-align: middle;">δs2</th>
                <th scope="col" style="vertical-align: middle;">δs</th>
                <th scope="col" style="vertical-align: middle;">𝒍_𝒖/𝒓</th>
                <th scope="col" style="vertical-align: middle;">√(𝑷_𝒖/(〖𝒇′〗_𝒄  𝑨_𝒈 ))</th>
                <th scope="col" style="vertical-align: middle;">Verificación del <br>Artículo 10.13.5.</th>
                <th scope="col" style="vertical-align: middle;">M1 <br>(Ton.m)</th>
                <th scope="col" style="vertical-align: middle;">M2 <br>(Ton.m)</th>
                <th scope="col" style="vertical-align: middle;">Cm</th>
                <th scope="col" style="vertical-align: middle;">δns</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                    // Si es el inicio de un nuevo piso, generamos la fila del piso con rowspan=5
                    echo "<tr>";
                    echo "<th rowspan='5' style='vertical-align: middle;' scope='row'>Piso " . ($piso_num + 1) . "</th>";
                    switch ($tipoEstructuraX[$piso_num]) {
                        case 'Sin Desplazamiento Lateral':
                            $kluart="-";
                            break;
                        
                        default:
                            //$kluart=$klu_value;
                            $kluart = $klu_values[$piso_num];
                            break;
                    }
                    switch ($tipoEstructuraY[$piso_num]) {
                        case 'Sin Desplazamiento Lateral':
                            $kluarty="-";
                            break;
                        
                        default:
                            $kluarty=$kluy_values[$piso_num];
                            break;
                    }
                    switch ($tipoEstructuraX[$piso_num]) {
                        case 'Sin Desplazamiento Lateral':
                           $verez="Sin Desplazamiento Lateral";
                            break;
                        
                        default:
                            if ($kluart<=22) {
                                $verez="No Considerar Efectos de Esbeltez";
                            } else {
                                $verez="Considerar Efectos de Esbeltez";
                            }
                            break;
                    }
                    switch ($tipoEstructuraY[$piso_num]) {
                        case 'Sin Desplazamiento Lateral':
                           $verezy="Sin Desplazamiento Lateral";
                            break;
                        
                        default:
                            if ($kluarty<=22) {
                                $verezy="No Considerar Efectos de Esbeltez";
                            } else {
                                $verezy="Considerar Efectos de Esbeltez";
                            }
                            break;
                    }
                    //cuarta columna
                    switch ($verez) {
                        case 'No Considerar Efectos de Esbeltez':
                           $os1="-";
                            break;
                        
                        default:
                            if (1/(1-$indiceQX[$piso_num])>=1) {
                                $os1=round(1/(1-$indiceQX[$piso_num]),2,PHP_ROUND_HALF_UP);
                            } else {
                                $os1=1;
                            }
                            break;
                    }
                    switch ($verezy) {
                        case 'No Considerar Efectos de Esbeltez':
                           $os1y="-";
                            break;
                        
                        default:
                            if (1/(1-$indiceQY[$piso_num])>=1) {
                                $os1y=round(1/(1-$indiceQY[$piso_num]),2,PHP_ROUND_HALF_UP);
                            } else {
                                $os1y=1;
                            }
                            break;
                    }

                    echo "<td style='vertical-align: middle;'>Dirección X-X</td>";
                    echo "<td>$kluart</td>";
                    echo "<td>$verez</td>";
                    echo "<td>$os1</td>";
                    for ($subfila = 2; $subfila <= 5; $subfila++) {
                        echo "<tr>";
                        switch ($subfila) {
                            case 2:
                                echo "<td style='vertical-align: middle;'>Dirección Y-Y</td>";
                                echo "<td>$kluarty</td>";
                                echo "<td>$verezy</td>";
                                echo "<td>$os1y</td>";
                                break;
                            }
                            // Aquí puedes agregar más columnas según sea necesario para cada subdivisión
                        echo "</tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <h1 class="tab_encabezados text-2xl font-bold decoration-indigo-500">
        2.- Condicion de Biaxial
    </h1>
    <table class="table table-bordered table-hover">
        <thead class="bg-info text-center">
            <tr class="sub_encabezados">
                <th colspan="12" scope="col">Condicion Biaxial</th>
            </tr>
            <tr class="sub_encabezados">
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
        <tbody>
            <?php
              for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                // Genera una fila para cada piso
                echo "<tr>";
                echo "<th scope='row'>Piso " . ($piso_num + 1) . "</th>";
                $IFy = 0.70;
                $AgL = $L1 * $L2;
                $Pon = round((0.85 * $fc * ($AgL - $AAceroTotal) + $fy * $AAceroTotal) / 1000, 2, PHP_ROUND_HALF_UP);
                $PnMax = round(0.8 * $IFy * $Pon, 2, PHP_ROUND_HALF_UP);
                $pnx = round(0.8 * $Pon, 2, PHP_ROUND_HALF_UP);
                $pny = round(0.8 * $Pon, 2, PHP_ROUND_HALF_UP);
                $PonFy = round(0.1 * $IFy * $Pon, 2, PHP_ROUND_HALF_UP);
                $Pn = round(1 / ((1 / $pnx) + (1 / $pny) - (1 / $Pon)), 2, PHP_ROUND_HALF_UP);
                $pnFy = round($IFy * $Pn, 2, PHP_ROUND_HALF_UP);
                //VerificacionSegunArticulo
                if ($pnFy < $PnMax) {
                    $VerifiArt = "Si Cumple";
                } else {
                    $VerifiArt = "No Cumple,'<br>' Verificar";
                }
                echo "<td>$hx[$piso_num]</td>"; 
                echo "<td>$AAceroTotal</td>"; 
                echo "<td>$AgL</td>"; 
                echo "<td>$Pon</td>"; 
                echo "<td>$PnMax</td>"; 
                echo "<td>$pnx</td>"; 
                echo "<td>$pny</td>"; 
                echo "<td>$PonFy</td>"; 
                echo "<td>$Pn</td>"; 
                echo "<td>$pnFy</td>"; 
                echo "<td>$VerifiArt</td>"; 
                // Agrega columnas adicionales aquí según sea necesario para cada piso
                echo "</tr>";
            }
            
            ?>

        </tbody>
    </table>
    <br>
    <br>
    <table class="table table-bordered table-hover">
        <thead class="bg-info text-center">
            <tr class="sub_encabezados">
                <th colspan="8" class="text-left">Columna C-01 Piso 1</th>
            </tr>
            <tr class="sub_encabezados">
                <th scope="col" style="vertical-align: middle;">NIVEL</th>
                <th scope="col">Combinaciones <br> de Carga</th>
                <th scope="col">Pux (Ton)</th>
                <th scope="col">Py (Ton)</th>
                <th scope="col">rx</th>
                <th scope="col">ry</th>
                <th scope="col">Verificacion del <br>Articulo 10.3.7 <br>Direccion X-X</th>
                <th scope="col">Verificacion del <br>Articulo 10.3.7 <br>Direccion Y-Y</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                    // Si es el inicio de un nuevo piso, generamos la fila del piso con rowspan=5
                    echo "<tr>";
                    echo "<th rowspan='5' style='vertical-align: middle;' scope='row'>Piso " . ($piso_num + 1) . "</th>";
                    // Obtener los datos del piso actual P
                    $datos_piso_p = $pisos_datos_array_p[$piso_num]['Datos'];
                    $P = round((1.4 * $datos_piso_p[0] + 1.7 * $datos_piso_p[1]), 2, PHP_ROUND_HALF_UP);
                    $Pc = round((1.25 * ($datos_piso_p[0] + $datos_piso_p[1]) + $datos_piso_p[2]), 2, PHP_ROUND_HALF_UP);
                    $Pcn = round((1.25 * ($datos_piso_p[0] + $datos_piso_p[1]) - $datos_piso_p[2]), 2, PHP_ROUND_HALF_UP);
                    $Pms = round((0.9 * $datos_piso_p[0] + $datos_piso_p[2]), 2, PHP_ROUND_HALF_UP);
                    $Pmns = round((0.9 * $datos_piso_p[0] - $datos_piso_p[2]), 2, PHP_ROUND_HALF_UP);

                    $datos_piso_p = $pisos_datos_array_p[$piso_num]['Datos'];
                    $Py = round((1.4 * $datos_piso_p[0] + 1.7 * $datos_piso_p[1]), 2, PHP_ROUND_HALF_UP);
                    $Pcsy = round((1.25 * ($datos_piso_p[0] + $datos_piso_p[1]) + $datos_piso_p[3]), 2, PHP_ROUND_HALF_UP);
                    $Pcnsy = round((1.25 * ($datos_piso_p[0] + $datos_piso_p[1]) - $datos_piso_p[3]), 2, PHP_ROUND_HALF_UP);
                    $Pmsy = round((0.9 * $datos_piso_p[0] + $datos_piso_p[3]), 2, PHP_ROUND_HALF_UP);
                    $Pmnsy = round((0.9 * $datos_piso_p[0] - $datos_piso_p[3]), 2, PHP_ROUND_HALF_UP);

                    if ($P=='-') {
                        $rx="-";
                    } else {
                        $rx=round($P/$pnFy,2,PHP_ROUND_HALF_UP);
                    }

                    if ($Pc == '-') {
                        $rPc = "-";
                    } else {
                        $rPc = round($Pc / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }
                    
                    if ($Pcn == '-') {
                        $rPcn = "-";
                    } else {
                        $rPcn = round($Pcn / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }

                    if ($Pms == '-') {
                        $rPms = "-";
                    } else {
                        $rPms = round($Pms / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }

                    if ($Pmns == '-') {
                        $rPmns = "-";
                    } else {
                        $rPmns = round($Pmns / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }
                    
                    if ($Py == '-') {
                        $ry = "-";
                    } else {
                        $ry = round($Py / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }

                    if ($Pcsy == '-') {
                        $rPcsy = "-";
                    } else {
                        $rPcsy = round($Pcsy / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }

                    if ($Pcnsy == '-') {
                        $rPcnsy = "-";
                    } else {
                        $rPcnsy = round($Pcnsy / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }

                    if ($Pmsy == '-') {
                        $rPmsy = "-";
                    } else {
                        $rPmsy = round($Pmsy / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }

                    if ($Pmnsy == '-') {
                        $rPmnsy = "-";
                    } else {
                        $rPmnsy = round($Pmnsy / $pnFy, 2, PHP_ROUND_HALF_UP);
                    }
                    //VERIFICACION XX
                    if ($P=="-") {
                        $verartxx="-";
                    } else {
                        if ($rx<=1) {
                            $verartxx="Si Cumple";
                        } else {
                            $verartxx="No Cumple,verificar";
                        }
                    }
                    
                    if ($Pc=="-") {
                        $verartxxpc="-";
                    } else {
                        if ($rPc<=1) {
                            $verartxxpc="Si Cumple";
                        } else {
                            $verartxxpc="No Cumple,verificar";
                        }
                    }

                    if ($Pcn=="-") {
                        $verpcn="-";
                    } else {
                        if ($rPcn<=1) {
                            $verpcn="Si Cumple";
                        } else {
                            $verpcn="No Cumple,verificar";
                        }
                    }

                    if ($Pms=="-") {
                        $verpms="-";
                    } else {
                        if ($rPms<=1) {
                            $verpms="Si Cumple";
                        } else {
                            $verpms="No Cumple,verificar";
                        }
                    }
                    
                    if ($Pmns=="-") {
                        $verpmns="-";
                    } else {
                        if ($rPmns<=1) {
                            $verpmns="Si Cumple";
                        } else {
                            $verpmns="No Cumple,verificar";
                        }
                    }
                    //VERIFICACION YY
                    if ($Py=="-") {
                        $verartyy="-";
                    } else {
                        if ($ry<=1) {
                            $verartyy="Si Cumple";
                        } else {
                            $verartyy="No Cumple,verificar";
                        }
                    }

                    if ($Pcsy=="-") {
                        $verartcsy="-";
                    } else {
                        if ($rPcsy<=1) {
                            $verartcsy="Si Cumple";
                        } else {
                            $verartcsy="No Cumple,verificar";
                        }
                    }

                    if ($Pcnsy=="-") {
                        $verartpsy="-";
                    } else {
                        if ($rPcnsy<=1) {
                            $verartpsy="Si Cumple";
                        } else {
                            $verartpsy="No Cumple,verificar";
                        }
                    }

                    if ($Pmsy=="-") {
                        $verartpmy="-";
                    } else {
                        if ($rPmsy<=1) {
                            $verartpmy="Si Cumple";
                        } else {
                            $verartpmy="No Cumple,verificar";
                        }
                    }

                    if ($Pmnsy=="-") {
                        $verpmsy="-";
                    } else {
                        if ($rPmnsy<=1) {
                            $verpmsy="Si Cumple";
                        } else {
                            $verpmsy="No Cumple,verificar";
                        }
                    }

                    echo "<td style='vertical-align: middle;'>1.40CM+1.70CV</td>";
                    echo "<td>$P</td>";
                    echo "<td>$Py</td>";
                    echo "<td>$rx</td>";
                    echo "<td>$ry</td>";
                    echo "<td>$verartxx</td>";
                    echo "<td>$verartyy</td>";
                    for ($subfila = 2; $subfila <= 5; $subfila++) {
                        echo "<tr>";
                        switch ($subfila) {
                            case 2:
                                echo "<td style='vertical-align: middle;'>1.25(CM+CV)+CS</td>";
                                echo "<td>$Pc</td>";
                                echo "<td>$Pcsy</td>";
                                echo "<td>$rPc</td>";
                                echo "<td>$rPcsy</td>";
                                echo "<td>$verartxxpc</td>";
                                echo "<td>$verartcsy</td>";
                                
                                break;
                            
                            case 3:
                                echo "<td style='vertical-align: middle;'>1.25(CM+CV)-CS</td>";
                                echo "<td>$Pcn</td>";
                                echo "<td>$Pcnsy</td>";
                                echo "<td>$rPcn</td>";
                                echo "<td>$rPcnsy</td>";
                                echo "<td>$verpcn</td>";
                                echo "<td>$verartpsy</td>";
                                break;
                            
                            case 4:
                                echo "<td style='vertical-align: middle;'>0.90CM+CS</td>";
                                echo "<td>$Pms</td>";
                                echo "<td>$Pmsy</td>";
                                echo "<td>$rPms</td>";
                                echo "<td>$rPmsy</td>";
                                echo "<td>$verpms</td>";
                                echo "<td>$verartpmy</td>";
                                break;
                            
                            case 5:
                                echo "<td style='vertical-align: middle;'>0.90CM-CS</td>";
                                echo "<td>$Pmns</td>";
                                echo "<td>$Pmnsy</td>";
                                echo "<td>$rPmns</td>";
                                echo "<td>$rPmnsy</td>";
                                echo "<td>$verpmns</td>";
                                echo "<td>$verpmsy</td>";
                                break;
                            }
                            // Aquí puedes agregar más columnas según sea necesario para cada subdivisión
                        echo "</tr>";
                    }
                }
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <h1 class="tab_encabezados text-2xl font-bold decoration-indigo-500">
        3.- Diseño por corte
    </h1>
    <h1 class="tab_encabezados text-2xl font-bold decoration-indigo-500">
        Analisis en Direccion "X"
    </h1>
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="sub_encabezados">
                <th scope="col" colspan="16">Diseño por CORTE</th>
            </tr>
            <tr class="sub_encabezados">
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
            <tr class="sub_encabezados">
                <th colspan="2" scope="col">caso I</th>
                <th colspan="2" scope="col">caso II</th>
            </tr>
            <tr class="sub_encabezados">
                <th scope="col">Mpri</th>
                <th scope="col">Mprs</th>
                <th scope="col">Mpri</th>
                <th scope="col">Mprs</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                    // Genera una fila para cada piso
                    echo "<tr>";
                    echo "<th scope='row'>Piso " . ($piso_num + 1) . "</th>";
                    $dx = $L1 - 6;
                    $dy = $L2 - 6;
                    if ($SEstru == "Porticos") {
                        $Mpri = 125 * $Mninf;
                    } else if ($SEstru == "DualTipI") {
                        $Mpri = $Mninf;
                    } elseif ($SEstru == "DualTipII") {
                        $Mpri = 125 * $Mninf;
                    } elseif ($SEstru == "MEstructurales") {
                        $Mpri = $Mninf;
                    }

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

                    $VN = round(max(($Mpri + $Mpr) / $H, ($MpriII + $MprII) / $H), 2, PHP_ROUND_HALF_UP);
                    $VUD = round($VN * (0.5 * $H - ($dx / 100)) / (0.5 * $H), 2, PHP_ROUND_HALF_UP);
                    $VUMAX = max($VUD, $VudEtap);
                    $VC = round(0.53 * sqrt($fc) * (1 + (MAX($puinf, $pusup) * 1000) / (140 * $L1 * $L2)) * $L2 * $dx / 1000, 2, PHP_ROUND_HALF_UP);

                    if ($VUMAX > 0.70 * $VC) {
                        $VerifiUtEstribo = "Necesita Estribos";
                    } else {
                        $VerifiUtEstribo = "Refuerzo Mínimo";
                    }
                    echo "<td>$H</td>"; 
                    echo "<td>$puinf</td>"; 
                    echo "<td>$pusup</td>"; 
                    echo "<td>$Mninf</td>"; 
                    echo "<td>$Mnsup</td>"; 
                    echo "<td>$Mpri</td>"; 
                    echo "<td>$Mpr</td>"; 
                    echo "<td>$MpriII</td>"; 
                    echo "<td>$MprII</td>"; 
                    echo "<td>$VN</td>";
                    echo "<td>$VUD</td>";
                    echo "<td>$VudEtap</td>"; 
                    echo "<td>$VUMAX</td>"; 
                    echo "<td>$VC</td>"; 
                    echo "<td>$VerifiUtEstribo</td>"; 
                    // Agrega columnas adicionales aquí según sea necesario para cada piso
                    echo "</tr>";
                }
                
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="sub_encabezados">
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
            <tr class="sub_encabezados">
                <th scope="col" style="vertical-align: middle;">Acero</th>
                <th scope="col" style="vertical-align: middle;">D (cm)</th>
                <th scope="col" style="vertical-align: middle;">Área (cm<Sup>2</Sup>)</th>
                <th scope="col" style="vertical-align: middle;">Acero</th>
                <th scope="col" style="vertical-align: middle;">D (cm)</th>
                <th scope="col" style="vertical-align: middle;">Área (cm<Sup>2</Sup>)</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                    // Genera una fila para cada piso
                    echo "<tr>";
                    echo "<th scope='row'>Piso " . ($piso_num + 1) . "</th>";
                    if ($VerifiUtEstribo == "Refuerzo Mínimo") {
                        $VsRef = 0;
                    } else {
                        $VsRef = round($VUMAX / 0.70 - $VC, 2, PHP_ROUND_HALF_UP);
                    }
                    $VsRefMax = round(2.1 * sqrt($fc) * $L2 * $dx / 1000, 2, PHP_ROUND_HALF_UP);

                    if ($VsRef <= $VsRefMax) {
                        $VerifArticulo = "Si Cumple";
                    } else {
                        $VerifArticulo = "No Cumple, <br>Verificar";
                    }

                    switch ($AEstribos) {
                        case 0.28:
                            $AceroEstribo = "6mm";
                            break;
                        case 1.13:
                            $AceroEstribo = "12mm";
                            break;
                        case 0.50:
                            $AceroEstribo = "8mm";
                            break;
                        case 0.71:
                            $AceroEstribo = "ø3/8";
                            break;
                        case 1.27:
                            $AceroEstribo = "ø1/2";
                            break;
                        case 1.98:
                            $AceroEstribo = "ø5/8";
                            break;
                        case 2.85:
                            $AceroEstribo = "ø3/4";
                            break;
                        case 5.10:
                            $AceroEstribo = "ø1";
                            break;
                        case 7.92:
                            $AceroEstribo = "ø1 1/4";
                            break;
                        case 11.40:
                            $AceroEstribo = "ø1 1/2";
                            break;
                        default:
                            $AceroEstribo = "Valor no encontrado";
                            break;
                    }
                    switch ($AEstribos) {
                        case 0.28:
                            $DiaAcero = 0.6;
                            break;
                        case 1.13:
                            $DiaAcero = 1.2;
                            break;
                        case 0.50:
                            $DiaAcero = 0.8;
                            break;
                        case 0.71:
                            $DiaAcero = 0.95;
                            break;
                        case 1.27:
                            $DiaAcero = 1.27;
                            break;
                        case 1.98:
                            $DiaAcero = 1.59;
                            break;
                        case 2.85:
                            $DiaAcero = 1.9;
                            break;
                        case 5.10:
                            $DiaAcero = 2.54;
                            break;
                        case 7.92:
                            $DiaAcero = 3.175;
                            break;
                        case 11.40:
                            $DiaAcero = 3.81;
                            break;
                        default:
                            $DiaAcero = "Valor no encontrado";
                            break;
                    }
                    switch ($AceroEstribo) {
                        case "6mm":
                            $areaAcer = 0.28;
                            break;
                        case "12mm":
                            $areaAcer = 1.13;
                            break;
                        case "8mm":
                            $areaAcer = 0.50;
                            break;
                        case "ø3/8":
                            $areaAcer = 0.71;
                            break;
                        case "ø1/2":
                            $areaAcer = 1.27;
                            break;
                        case "ø5/8":
                            $areaAcer = 1.98;
                            break;
                        case "ø3/4":
                            $areaAcer = 2.85;
                            break;
                        case "ø1":
                            $areaAcer = 5.10;
                            break;
                        case "ø1 1/4":
                            $areaAcer = 7.92;
                            break;
                        case "ø1 1/2":
                            $areaAcer = 11.40;
                            break;
                        default:
                            $areaAcer = "Valor no encontrado";
                            break;
                    }
                      
                    switch ($AaceromaxLong) {
                        case 0.28:
                            $aceroMxLon = "6mm";
                            break;
                        case 1.13:
                            $aceroMxLon = "12mm";
                            break;
                        case 0.50:
                            $aceroMxLon = "8mm";
                            break;
                        case 0.71:
                            $aceroMxLon = "ø3/8";
                            break;
                        case 1.27:
                            $aceroMxLon = "ø1/2";
                            break;
                        case 1.98:
                            $aceroMxLon = "ø5/8";
                            break;
                        case 2.85:
                            $aceroMxLon = "ø3/4";
                            break;
                        case 5.10:
                            $aceroMxLon = "ø1";
                            break;
                        case 7.92:
                            $aceroMxLon = "ø1 1/4";
                            break;
                        case 11.40:
                            $aceroMxLon = "ø1 1/2";
                            break;
                        default:
                            $aceroMxLon = "Valor no encontrado";
                            break;
                    }
                    switch ($AaceromaxLong) {
                        case 0.28:
                            $DiaAceroMxLong = 0.6;
                            break;
                        case 1.13:
                            $DiaAceroMxLong = 1.2;
                            break;
                        case 0.50:
                            $DiaAceroMxLong = 0.8;
                            break;
                        case 0.71:
                            $DiaAceroMxLong = 0.95;
                            break;
                        case 1.27:
                            $DiaAceroMxLong = 1.27;
                            break;
                        case 1.98:
                            $DiaAceroMxLong = 1.59;
                            break;
                        case 2.85:
                            $DiaAceroMxLong = 1.9;
                            break;
                        case 5.10:
                            $DiaAceroMxLong = 2.54;
                            break;
                        case 7.92:
                            $DiaAceroMxLong = 3.175;
                            break;
                        case 11.40:
                            $DiaAceroMxLong = 3.81;
                            break;
                        default:
                            $DiaAceroMxLong = "Valor no encontrado";
                            break;
                    }
                    switch ($aceroMxLon) {
                        case "6mm":
                            $areaAcerl = 0.28;
                            break;
                        case "12mm":
                            $areaAcerl = 1.13;
                            break;
                        case "8mm":
                            $areaAcerl = 0.50;
                            break;
                        case "ø3/8":
                            $areaAcerl = 0.71;
                            break;
                        case "ø1/2":
                            $areaAcerl = 1.27;
                            break;
                        case "ø5/8":
                            $areaAcerl = 1.98;
                            break;
                        case "ø3/4":
                            $areaAcerl = 2.85;
                            break;
                        case "ø1":
                            $areaAcerl = 5.10;
                            break;
                        case "ø1 1/4":
                            $areaAcerl = 7.92;
                            break;
                        case "ø1 1/2":
                            $areaAcerl = 11.40;
                            break;
                        default:
                            $areaAcerl = "Valor no encontrado";
                            break;
                    }

                    $ach = $dx * $dy;
                    $Ac = 30;
                    $bc = 20;
                    $spaciamiento = 10;
                    $Ash1 = round(0.3 * $spaciamiento * $bc * $fc / $fy * ($ag / $ach - 1), 2, PHP_ROUND_HALF_UP);
                    $Ash2 = 0.09 * $spaciamiento * $bc * $fc / $fy;
                    $nRe = round((MAX($Ash2, $Ash1) / $DiaAcero));
                    $AV = $nRe * $AEstribos;
                    if ($VerifiUtEstribo == "Refuerzo Mínimo") {
                        $So = "-";
                    } else {
                        $So = round($AV * $fy * $dx / ($VsRef * 1000), 2, PHP_ROUND_HALF_UP);
                    }
                    echo "<td>$VsRef</td>"; 
                    echo "<td>$VsRefMax</td>"; 
                    echo "<td>$VerifArticulo</td>"; 
                    echo "<td>$AceroEstribo</td>"; 
                    echo "<td>$DiaAcero</td>";
                    echo "<td>$areaAcer</td>";
                    echo "<td>$aceroMxLon</td>";
                    echo "<td>$DiaAceroMxLong</td>";
                    echo "<td>$areaAcerl</td>";
                    echo "<td>$nRe</td>";
                    echo "<td>$AV</td>";
                    echo "<td>$So</td>";
                    // Agrega columnas adicionales aquí según sea necesario para cada piso
                    echo "</tr>";
                }
                
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <!-- Falta Corregir -->
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="sub_encabezados">
                <th scope="col" rowspan="3" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" colspan="7" style="vertical-align: middle;">Artículo 21.4.5.3. y/o Artículo 21.6.4.2 / 21.6.4.4. <br>Separación de Estribos por Confinamiento</th>
                <th scope="col" colspan="4" style="vertical-align: middle;">Artículo 7.10.5.2. <br>Espaciamiento Vertical de Estribos Máximo</th>
                <th scope="col" colspan="4" style="vertical-align: middle;">Artículo 11.5.5.1.<br>Espaciamiento Vertical de Estribos Máximo</th>
            </tr>
            <tr class="sub_encabezados">
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
            <tr class="sub_encabezados">
                <th scope="col" style="vertical-align: middle;">Lo1</th>
                <th scope="col" style="vertical-align: middle;">Lo2</th>
                <th scope="col" style="vertical-align: middle;">Lo3</th>
                <th scope="col" style="vertical-align: middle;">So1</th>
                <th scope="col" style="vertical-align: middle;">So2</th>
                <th scope="col" style="vertical-align: middle;">So3</th>

            </tr>
        </thead>
        <tbody>
            <?php
                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                    // Genera una fila para cada piso
                    echo "<tr>";
                    echo "<th scope='row'>Piso " . ($piso_num + 1) . "</th>";
                    $lo3 = 50;
                    $so3 = 10;
                    $sII = 30;
                    $Smax6 = 60;
                    $lo1 = round($H * 100 / 6, 2, PHP_ROUND_HALF_UP);
                    $lo2 = max($L1, $L2);
                    if ($SEstru == "Porticos") {
                        $ZconfinaSo = 6 * $AaceromaxLong;
                    } else if ($SEstru == "DualTipI") {
                        $ZconfinaSo = 8 * $AaceromaxLong;
                    } elseif ($SEstru == "DualTipII") {
                        $ZconfinaSo = 6 * $AaceromaxLong;
                    } elseif ($SEstru == "MEstructurales") {
                        $ZconfinaSo = 8 * $AaceromaxLong;
                    }

                    if ($SEstru == "Porticos") {
                        $ZconfinaSo2 = min($L1, $L2) / 3;
                    } else if ($SEstru == "DualTipI") {
                        $ZconfinaSo2 = 0.5 * min($L1, $L2);
                    } elseif ($SEstru == "DualTipII") {
                        $ZconfinaSo2 = min($L1, $L2) / 3;
                    } elseif ($SEstru == "MEstructurales") {
                        $ZconfinaSo2 = 0.5 * min($L1, $L2);
                    }

                    $Smax = 16 * $DiaAceroMxLong;
                    $Smax2 = 48 * $DiaAcero;
                    $Smax3 = MIN($L1, $L2);
                    $Smaxx = MIN($Smax, $Smax2, $Smax3);
                    $Smax4 = $dx / 2;
                    $Smax5 = $dy / 2;
                    $Smax7 = min($Smax4, $Smax5, $Smax6);
                    echo "<td>$lo1</td>"; 
                    echo "<td>$lo2</td>"; 
                    echo "<td>$lo3</td>";
                    echo "<td>$ZconfinaSo</td>"; 
                    echo "<td>$ZconfinaSo2</td>"; 
                    echo "<td>$so3</td>"; 
                    echo "<td>$sII</td>"; 
                    echo "<td>$Smax</td>"; 
                    echo "<td>$Smax2</td>"; 
                    echo "<td>$Smax2</td>"; 
                    echo "<td>$Smax3</td>"; 
                    echo "<td>$Smaxx</td>"; 
                    echo "<td>$Smax4</td>"; 
                    echo "<td>$Smax5</td>"; 
                    echo "<td>$Smax7</td>"; 
                    // Agrega columnas adicionales aquí según sea necesario para cada piso
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="sub_encabezados">
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
            <tr class="sub_encabezados">
                <th scope="col" colspan="2" style="vertical-align: middle;">Extremos</th>
                <th scope="col" colspan="2" style="vertical-align: middle;">Zona de Confinamiento</th>
                <th scope="col" colspan="2" style="vertical-align: middle;">Zona Central</th>
            </tr>
            <tr class="sub_encabezados">
                <th scope="col" style="vertical-align: middle;">N° de Estribos</th>
                <th scope="col" style="vertical-align: middle;">separacion (cm)</th>
                <th scope="col" style="vertical-align: middle;">N° de Estribos</th>
                <th scope="col" style="vertical-align: middle;">separacion (cm)</th>
                <th scope="col" style="vertical-align: middle;">N° de Estribos</th>
                <th scope="col" style="vertical-align: middle;">separacion (cm)</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                    // Genera una fila para cada piso
                    echo "<tr>";
                    echo "<th scope='row'>Piso " . ($piso_num + 1) . "</th>";
                    $lo = max($lo1, $lo2, $lo3);

                    $sO = 0;
                    if ($So == "-") {
                        $sO = min($ZconfinaSo, $ZconfinaSo2, $so3);
                    } else {
                        $sO = min($ZconfinaSo, $ZconfinaSo2, $so3);
                    }

                    $SI = min($sII, $Smaxx, $Smax7);
                    $base = 5;
                    $multiplo_superior = ceil($SI / $base) * $base;

                    $VSton = round(($AV * $fy * $dx / $sO) / 1000, 2, PHP_ROUND_HALF_UP);
                    $FyVcVs = 0.70 * ($VC + $VSton);

                    $VrfResistencia = "";
                    if ($FyVcVs >= $VUMAX) {
                        $VrfResistencia = "SI CUMPLE";
                    } else {
                        $VrfResistencia = "NO CUMPLE, <br> Verificar";
                    }
                    $NEstribos = $lo / $sO;

                    echo "<td class='text-center'>$lo</td>";
                    echo "<td class='text-center'>$sO</td>";
                    echo "<td class='text-center'>$multiplo_superior</td>";
                    echo "<td class='text-center'>15</td>";
                    echo "<td class='text-center'>$VSton</td>";
                    echo "<td class='text-center'>$FyVcVs</td>";
                    echo "<td class='text-center'>$VrfResistencia</td>";
                    echo "<td class='text-center'>1</td>";
                    echo "<td class='text-center'>5</td>";
                    echo "<td class='text-center'>$NEstribos</td>";
                    echo "<td class='text-center'>$sO</td>";
                    echo "<td class='text-center'>resto</td>";
                    echo "<td class='text-center'>$multiplo_superior</td>";
                    // Agrega columnas adicionales aquí según sea necesario para cada piso
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="sub_encabezados">
                <th scope="col" rowspan="2" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" colspan="9" style="vertical-align: middle;">Artículo 21.6.4.<br>Verificación del Refuerzo Transversal para Sistemas Estructurales de Pórticos y Dual Tipo II</th>
            </tr>
            <tr class="sub_encabezados">
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
        <tbody>
            <?php
                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                    // Genera una fila para cada piso
                    echo "<tr>";
                    echo "<th scope='row'>Piso " . ($piso_num + 1) . "</th>";
                    $tet=55;
                    $n_grapas=1;
                    if ($SEstru == "MEstructurales") {
                        $AshArt = "-";
                    } else if ($SEstru == "DualTipI") {
                        $AshArt = "-";
                    } elseif ($Tgrapas == "caso I") {
                        $AshArt = "-";
                    } elseif ($Tgrapas == "caso II") {
                        $AshArt = "-";
                    }

                    if ($SEstru == "MEstructurales") {
                        $ashresul = "-";
                    } else {
                        if ($SEstru == "Dual Tipo I") {
                            $ashresul = "-";
                        } else {
                            if ($Tgrapas == "Dual Tipo I") {
                                $ashresul = 2 * ($areaAcer + $areaAcer * cos(deg2rad($tet)));
                            } else {
                                $ashresul = 2 * $areaAcer + $n_grapas * $areaAcer;
                            }
                            
                        }
                        
                    }
                    
                    if ($SEstru == "MEstructurales") {
                        $bc = "-";
                    } else{
                        if ($SEstru == "Dual Tipo I") {
                            $bc = "-";
                        } else {
                            // Segunda condición
                            $bc = $L1 - 2 * (4 + 0.5 * $DiaAcero);
                        }
                    }

                    if ($SEstru == "MEstructurales") {
                        $ach = "-";
                    } else{
                        if ($SEstru == "Dual Tipo I") {
                            $ach = "-";
                        } else {
                            // Segunda condición
                            $ach = ($L1 - 2 * (4 + 0.5 * $areaAcer)) * ($L2 - 2 * (4 + 0.5 * $areaAcer));
                        }
                    }

                    if ($SEstru == "MEstructurales") {
                        $ashmin1 = "-";
                    } else{
                        if ($SEstru == "Dual Tipo I") {
                            $ashmin1 = "-";
                        } else {
                            // Segunda condición
                            $ashmin1 = 0.3 * ($sO * $bc * $fc / $fy) * (($L1 * $L2 / $ach) - 1);
                        }
                    }

                    if ($SEstru == "MEstructurales") {
                        $ashmin2 = "-";
                    } else{
                        if ($SEstru == "Dual Tipo I") {
                            $ashmin2 = "-";
                        } else {
                            // Segunda condición
                            $ashmin2 =0.09 * ($sO * $bc * $fc / $fy);
                        }
                    }

                    if ($SEstru == "MEstructurales") {
                        $verarti = "-";
                    } else{
                        if ($SEstru == "Dual Tipo I") {
                            $verarti = "-";
                        } else {
                            if ($ash >= max($ashmin1, $ashmin2)) {
                                $verarti = "Si Cumple";
                            } else {
                                $verarti = "No Cumple, Verificar";
                            }
                        }
                    }

                    echo "<td class='text-center'>$Tgrapas</td>";
                    echo "<td class='text-center'>$tet</td>";
                    echo "<td class='text-center'>$n_grapas</td>";
                    echo "<td class='text-center'>$ashresul</td>";
                    echo "<td class='text-center'>$bc</td>"; 
                    echo "<td class='text-center'>$ach</td>"; 
                    echo "<td class='text-center'>$ashmin1</td>"; 
                    echo "<td class='text-center'>$ashmin2</td>"; 
                    echo "<td class='text-center'>$verarti</td>"; 
                    // Agrega columnas adicionales aquí según sea necesario para cada piso
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <h1 class="tab_encabezados text-2xl font-bold decoration-indigo-500">
        Analisis en Direccion "Y"
    </h1>
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="sub_encabezados">
                <th scope="col" colspan="16">Diseño por CORTE</th>
            </tr>
            <tr class="sub_encabezados">
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
            <tr class="sub_encabezados">
                <th colspan="2" scope="col">caso I</th>
                <th colspan="2" scope="col">caso II</th>
            </tr>
            <tr class="sub_encabezados">
                <th scope="col">Mpri</th>
                <th scope="col">Mprs</th>
                <th scope="col">Mpri</th>
                <th scope="col">Mprs</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                    // Genera una fila para cada piso
                    echo "<tr>";
                    echo "<th scope='row'>Piso " . ($piso_num + 1) . "</th>";

                    switch ($SEstru) {
                        case "Porticos":
                            $Mpriy = 125 * $Mninf;
                            break;
                        case "DualTipI":
                            $Mpriy = $Mninf;
                            break;
                        case "DualTipII":
                            $Mpriy = 125 * $Mninf;
                            break;
                        case "MEstructurales":
                            $Mpriy = $Mninf;
                            break;
                        default:
                            // Manejar el caso por defecto si es necesario
                            break;
                    }   

                    switch ($SEstru) {
                        case "Porticos":
                            $Mpry = 125 * $Mnsup;
                            break;
                        case "DualTipI":
                            $Mpry = $Mnsup;
                            break;
                        case "DualTipII":
                            $Mpry = 125 * $Mnsup;
                            break;
                        case "MEstructurales":
                            $Mpry = $Mnsup;
                            break;
                        default:
                            // Manejar el caso por defecto si es necesario
                            break;
                    }
                    
                    switch ($SEstru) {
                        case "Porticos":
                            $MpriIIy = 125 * $Mninf;
                            break;
                        case "DualTipI":
                            $MpriIIy = $Mninf;
                            break;
                        case "DualTipII":
                            $MpriIIy = 125 * $Mninf;
                            break;
                        case "MEstructurales":
                            $MpriIIy = $Mninf;
                            break;
                        default:
                            // Manejar el caso por defecto si es necesario
                            break;
                    }
                    
                    switch ($SEstru) {
                        case "Porticos":
                            $MprIIy = 125 * $Mnsup;
                            break;
                        case "DualTipI":
                            $MprIIy = $Mnsup;
                            break;
                        case "DualTipII":
                            $MprIIy = 125 * $Mnsup;
                            break;
                        case "MEstructurales":
                            $MprIIy = $Mnsup;
                            break;
                        default:
                            // Manejar el caso por defecto si es necesario
                            break;
                    }

                    $VNy = round(max(($Mpri + $Mpr) / $H, ($MpriIIy + $MprIIy) / $H), 2, PHP_ROUND_HALF_UP);

                    $VUDy = round($VNy * (0.5 * $H - ($dx / 100)) / (0.5 * $H), 2, PHP_ROUND_HALF_UP);

                    $VCy = round(0.53 * sqrt($fc) * (1 + (MAX($puinf, $pusup) * 1000) / (140 * $L1 * $L2)) * $L2 * $dx / 1000, 2, PHP_ROUND_HALF_UP);
                    $VUMAXy = max($VUDy, $VudEtap);
                    if ($VUMAXy > 0.70 * $VCy) {
                        $VerifiUtEstriboy = "Necesita Estribos";
                    } else {
                        $VerifiUtEstriboy = "Refuerzo Mínimo";
                    }

                    echo "<td>$H</td>";
                    echo "<td>$puinf</td>";
                    echo "<td>$pusup</td>";
                    echo "<td>$Mninf</td>";
                    echo "<td>$Mnsup</td>";

                    echo "<td>$Mpriy</td>";
                    echo "<td>$Mpry</td>";
                    echo "<td>$MpriIIy</td>";
                    echo "<td>$MprIIy</td>";
                    echo "<td>$VNy</td>";
                    echo "<td>$VUDy</td>";
                    echo "<td>$VudEtap</td>";
                    echo "<td>$VUMAXy</td>";
                    echo "<td>$VCy</td>";
                    echo "<td>$VerifiUtEstriboy</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="sub_encabezados">
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
            <tr class="sub_encabezados">
                <th scope="col" style="vertical-align: middle;">Acero</th>
                <th scope="col" style="vertical-align: middle;">D (cm)</th>
                <th scope="col" style="vertical-align: middle;">Área (cm<Sup>2</Sup>)</th>
                <th scope="col" style="vertical-align: middle;">Acero</th>
                <th scope="col" style="vertical-align: middle;">D (cm)</th>
                <th scope="col" style="vertical-align: middle;">Área (cm<Sup>2</Sup>)</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                    // Genera una fila para cada piso
                    echo "<tr>";
                    echo "<th scope='row'>Piso " . ($piso_num + 1) . "</th>";
                    if ($VerifiUtEstribo == "Refuerzo Mínimo") {
                        $VsRefy = 0;
                    } else {
                        $VsRefy = round($VUMAXy / 0.70 - $VCy, 2, PHP_ROUND_HALF_UP);
                    }
                    
                    $VsRefMaxy = round(2.1 * sqrt($fc) * $L2 * $dx / 1000, 2, PHP_ROUND_HALF_UP);

                    if ($VsRef <= $VsRefMax) {
                        $VerifArticuloy = "Si Cumple";
                    } else {
                        $VerifArticuloy = "No Cumple, <br>Verificar";
                    }

                    $AceroEstriboy = "";
                    switch ($AEstribos) {
                        case 0.28:
                            $AceroEstriboy = "6mm";
                            break;
                        case 1.13:
                            $AceroEstriboy = "12mm";
                            break;
                        case 0.50:
                            $AceroEstriboy = "8mm";
                            break;
                        case 0.71:
                            $AceroEstriboy = "ø3/8";
                            break;
                        case 1.27:
                            $AceroEstriboy = "ø1/2";
                            break;
                        case 1.98:
                            $AceroEstriboy = "ø5/8";
                            break;
                        case 2.85:
                            $AceroEstriboy = "ø3/4";
                            break;
                        case 5.10:
                            $AceroEstriboy = "ø1";
                            break;
                        case 7.92:
                            $AceroEstriboy = "ø1 1/4";
                            break;
                        case 11.40:
                            $AceroEstriboy = "ø1 1/2";
                            break;
                        default:
                            // Manejar el caso por defecto si es necesario
                            break;
                    }

                    $DiaAceroy = 0;
                    switch ($AEstribos) {
                        case 0.28:
                            $DiaAceroy = 0.6;
                            break;
                        case 1.13:
                            $DiaAceroy = 1.2;
                            break;
                        case 0.50:
                            $DiaAceroy = 0.8;
                            break;
                        case 0.71:
                            $DiaAceroy = 0.95;
                            break;
                        case 1.27:
                            $DiaAceroy = 1.27;
                            break;
                        case 1.98:
                            $DiaAceroy = 1.59;
                            break;
                        case 2.85:
                            $DiaAceroy = 1.9;
                            break;
                        case 5.10:
                            $DiaAceroy = 2.54;
                            break;
                        case 7.92:
                            $DiaAceroy = 3.175;
                            break;
                        case 11.40:
                            $DiaAceroy = 3.81;
                            break;
                        default:
                            // Manejar el caso por defecto si es necesario
                            break;
                    }

                    switch ($AceroEstriboy) {
                        case "6mm":
                            $areaAcery = 0.28;
                            break;
                        case "12mm":
                            $areaAcery = 1.13;
                            break;
                        case "8mm":
                            $areaAcery = 0.50;
                            break;
                        case "ø3/8":
                            $areaAcery = 0.71;
                            break;
                        case "ø1/2":
                            $areaAcery = 1.27;
                            break;
                        case "ø5/8":
                            $areaAcery = 1.98;
                            break;
                        case "ø3/4":
                            $areaAcery = 2.85;
                            break;
                        case "ø1":
                            $areaAcery = 5.10;
                            break;
                        case "ø1 1/4":
                            $areaAcery = 7.92;
                            break;
                        case "ø1 1/2":
                            $areaAcery = 11.40;
                            break;
                        default:
                            $areaAcery = "Valor no encontrado";
                            break;
                    }

                    $aceroMxLony = "";
                    switch ($AaceromaxLong) {
                        case 0.28:
                            $aceroMxLony = "6mm";
                            break;
                        case 1.13:
                            $aceroMxLony = "12mm";
                            break;
                        case 0.50:
                            $aceroMxLony = "8mm";
                            break;
                        case 0.71:
                            $aceroMxLony = "ø3/8";
                            break;
                        case 1.27:
                            $aceroMxLony = "ø1/2";
                            break;
                        case 1.98:
                            $aceroMxLony = "ø5/8";
                            break;
                        case 2.85:
                            $aceroMxLony = "ø3/4";
                            break;
                        case 5.10:
                            $aceroMxLony = "ø1";
                            break;
                        case 7.92:
                            $aceroMxLony = "ø1 1/4";
                            break;
                        case 11.40:
                            $aceroMxLony = "ø1 1/2";
                            break;
                        default:
                            // Manejar el caso por defecto si es necesario
                            break;
                    }

                    $DiaAceroMxLongy = 0;
                    switch ($AaceromaxLong) {
                        case 0.28:
                            $DiaAceroMxLongy = 0.6;
                            break;
                        case 1.13:
                            $DiaAceroMxLongy = 1.2;
                            break;
                        case 0.50:
                            $DiaAceroMxLongy = 0.8;
                            break;
                        case 0.71:
                            $DiaAceroMxLongy = 0.95;
                            break;
                        case 1.27:
                            $DiaAceroMxLongy = 1.27;
                            break;
                        case 1.98:
                            $DiaAceroMxLongy = 1.59;
                            break;
                        case 2.85:
                            $DiaAceroMxLongy = 1.9;
                            break;
                        case 5.10:
                            $DiaAceroMxLongy = 2.54;
                            break;
                        case 7.92:
                            $DiaAceroMxLongy = 3.175;
                            break;
                        case 11.40:
                            $DiaAceroMxLongy = 3.81;
                            break;
                        default:
                            // Manejar el caso por defecto si es necesario
                            break;
                    }

                    $ach = $dx * $dy;
                    $Ac = 30;
                    $bc = 20;
                    $spaciamiento = 10;
                    $Ash1y = round(0.3 * $spaciamiento * $bc * $fc / $fy * ($ag / $ach - 1), 2, PHP_ROUND_HALF_UP);
                    $Ash2y = 0.09 * $spaciamiento * $bc * $fc / $fy;
                    $nRey = round((MAX($Ash2y, $Ash1y) / $DiaAceroy));
                    $AVy = $nRey * $AEstribos;
                    if ($VerifiUtEstriboy == "Refuerzo Mínimo") {
                        $Soy = "-";
                    } else {
                        $Soy = round($AVy * $fy * $dx / ($VsRefy * 1000), 2, PHP_ROUND_HALF_UP);
                    }
                    echo "<td>$VsRefy</td>";
                    echo "<td>$VsRefMaxy</td>";
                    echo "<td>$VerifArticuloy</td>";
                    echo "<td>$AceroEstriboy</td>";
                    echo "<td>$DiaAceroy</td>";
                    echo "<td>$areaAcery</td>";//ver
                    echo "<td>$aceroMxLony</td>";
                    echo "<td>$DiaAceroMxLongy</td>";
                    echo "<td>$AaceromaxLong</td>";
                    echo "<td>$nRey</td>";
                    echo "<td>$AVy</td>";
                    echo "<td>$Soy</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
        </tbody>
    </table>
    <br>
    <br>
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="sub_encabezados">
                <th scope="col" rowspan="3" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" colspan="7" style="vertical-align: middle;">Artículo 21.4.5.3. y/o Artículo 21.6.4.2 / 21.6.4.4. <br>Separación de Estribos por Confinamiento</th>
                <th scope="col" colspan="4" style="vertical-align: middle;">Artículo 7.10.5.2. <br>Espaciamiento Vertical de Estribos Máximo</th>
                <th scope="col" colspan="4" style="vertical-align: middle;">Artículo 11.5.5.1.<br>Espaciamiento Vertical de Estribos Máximo</th>
            </tr>
            <tr class="sub_encabezados">
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
            <tr class="sub_encabezados">
                <th scope="col" style="vertical-align: middle;">Lo1</th>
                <th scope="col" style="vertical-align: middle;">Lo2</th>
                <th scope="col" style="vertical-align: middle;">Lo3</th>
                <th scope="col" style="vertical-align: middle;">So1</th>
                <th scope="col" style="vertical-align: middle;">So2</th>
                <th scope="col" style="vertical-align: middle;">So3</th>

            </tr>
        </thead>
        <tbody>
            <?php
                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                    // Genera una fila para cada piso
                    echo "<tr>";
                    echo "<th scope='row'>Piso " . ($piso_num + 1) . "</th>";
                    $lo3 = 50;
                    $so3 = 10;
                    $sII = 30;
                    $Smax6 = 60;
                    $lo1y = round($H * 100 / 6, 2, PHP_ROUND_HALF_UP);

                    $lo2y = max($L1, $L2);

                    $ZconfinaSoy = 0;
                    switch ($SEstru) {
                        case "Porticos":
                            $ZconfinaSoy = 6 * $AaceromaxLong;
                            break;
                        case "DualTipI":
                            $ZconfinaSoy = 8 * $AaceromaxLong;
                            break;
                        case "DualTipII":
                            $ZconfinaSoy = 6 * $AaceromaxLong;
                            break;
                        case "MEstructurales":
                            $ZconfinaSoy = 8 * $AaceromaxLong;
                            break;
                        default:
                            // Manejar el caso por defecto si es necesario
                            break;
                    }

                    $ZconfinaSo2y = 0;
                    switch ($SEstru) {
                        case "Porticos":
                            $ZconfinaSo2y = min($L1, $L2) / 3;
                            break;
                        case "DualTipI":
                            $ZconfinaSo2y = 0.5 * min($L1, $L2);
                            break;
                        case "DualTipII":
                            $ZconfinaSo2y = min($L1, $L2) / 3;
                            break;
                        case "MEstructurales":
                            $ZconfinaSo2y = 0.5 * min($L1, $L2);
                            break;
                        default:
                            // Manejar el caso por defecto si es necesario
                            break;
                    }


                    $Smaxy = 16 * $DiaAceroMxLongy;
                    $Smax2y = 48 * $DiaAceroy;
                    $Smax3y = MIN($L1, $L2);
                    $Smaxxy = MIN($Smaxy, $Smax2y, $Smax3y);
                    $Smax4y = $dx / 2;
                    $Smax5y = $dy / 2;
                    $Smax7y = min($Smax4y, $Smax5y, $Smax6);

                    echo "<td>$lo1y</td>";
                    echo "<td>$lo2y</td>";
                    echo "<td>$lo3</td>";
                    echo "<td>$ZconfinaSoy</td>";
                    echo "<td>$ZconfinaSo2y</td>";
                    echo "<td>$so3</td>";
                    echo "<td>$sII</td>";
                    echo "<td>$Smaxy</td>";
                    echo "<td>$Smax2y</td>";
                    echo "<td>$Smax3y</td>";
                    echo "<td>$Smaxxy</td>";
                    echo "<td>$Smax4y</td>";
                    echo "<td>$Smax5y</td>";
                    echo "<td>$Smax6</td>";
                    echo "<td>$Smax7y</td>";
                 
                 
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="sub_encabezados">
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
            <tr class="sub_encabezados">
                <th scope="col" colspan="2" style="vertical-align: middle;">Extremos</th>
                <th scope="col" colspan="2" style="vertical-align: middle;">Zona de Confinamiento</th>
                <th scope="col" colspan="2" style="vertical-align: middle;">Zona Central</th>
            </tr>
            <tr class="sub_encabezados">
                <th scope="col" style="vertical-align: middle;">N° de Estribos</th>
                <th scope="col" style="vertical-align: middle;">separacion (cm)</th>
                <th scope="col" style="vertical-align: middle;">N° de Estribos</th>
                <th scope="col" style="vertical-align: middle;">separacion (cm)</th>
                <th scope="col" style="vertical-align: middle;">N° de Estribos</th>
                <th scope="col" style="vertical-align: middle;">separacion (cm)</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                    // Genera una fila para cada piso
                    echo "<tr>";
                    $loy = MAX($lo1y, $lo2y, $lo3);

                    $sOy = 0;
                    if ($sOy == "-") {
                        $resultadoOy = min(min($ZconfinaSoy, $ZconfinaSo2y, $so3), 30);
                    } else {
                        $resultadoOy =min(min($ZconfinaSoy, $ZconfinaSo2y, $so3), 30);
                    }
                    $sOy = floor($resultadoOy / 5) * 5;

                    $SIy =  ceil(min($sII, $Smaxxy, $Smax7y) / 5) * 5;

                    $VStony = round(($AVy * $fy * $dx / $sOy) / 1000, 2, PHP_ROUND_HALF_UP);

                    $FyVcVsy = 0.70 * ($VCy + $VStony);

                    $VrfResistenciay = "";
                    
                    if ($FyVcVsy >= $VUMAXy) {
                        $VrfResistenciay = "SI CUMPLE";
                    } else {
                        $VrfResistenciay = "NO CUMPLE, <br> Verificar";
                    }
                    $NEstribosy = $loy / $sOy;

                    echo "<th scope='row'>Piso " . ($piso_num + 1) . "</th>";

                    echo "<td class='text-center'>$loy</td>";
                    echo "<td class='text-center'>$sOy</td>";
                    echo "<td class='text-center'>$SIy</td>";
                    echo "<td class='text-center'>15</td>";
                    echo "<td class='text-center'>$VStony</td>";
                    echo "<td class='text-center'>$FyVcVsy</td>";
                    echo "<td class='text-center'>$VrfResistenciay</td>";
                    echo "<td class='text-center'>1</td>";
                    echo "<td class='text-center'>5</td>";
                    echo "<td class='text-center'>$NEstribosy</td>";
                    echo "<td class='text-center'>$sOy</td>";
                    echo "<td class='text-center'>resto</td>";
                    echo "<td class='text-center'>$SIy</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="sub_encabezados">
                <th scope="col" rowspan="2" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" colspan="9" style="vertical-align: middle;">Artículo 21.6.4.<br>Verificación del Refuerzo Transversal para Sistemas Estructurales de Pórticos y Dual Tipo II</th>
            </tr>
            <tr class="sub_encabezados">
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
        <tbody>
            <?php
                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                    // Genera una fila para cada piso
                    echo "<tr>";
                    echo "<th scope='row'>Piso " . ($piso_num + 1) . "</th>";
                    $tet=55;
                    $n_grapas=1;
                    if ($SEstru == "MEstructurales") {
                        $AshArt = "-";
                    } else if ($SEstru == "DualTipI") {
                        $AshArt = "-";
                    } elseif ($Tgrapas == "caso I") {
                        $AshArt = "-";
                    } elseif ($Tgrapas == "caso II") {
                        $AshArt = "-";
                    }

                    if ($SEstru == "MEstructurales") {
                        $ashresul = "-";
                    } else {
                        if ($SEstru == "Dual Tipo I") {
                            $ashresul = "-";
                        } else {
                            if ($Tgrapas == "Dual Tipo I") {
                                $ashresul = 2 * ($areaAcer + $areaAcer * cos(deg2rad($tet)));
                            } else {
                                $ashresul = 2 * $areaAcer + $n_grapas * $areaAcer;
                            }
                            
                        }
                        
                    }
                    
                    if ($SEstru == "MEstructurales") {
                        $bc = "-";
                    } else{
                        if ($SEstru == "Dual Tipo I") {
                            $bc = "-";
                        } else {
                            // Segunda condición
                            $bc = $L1 - 2 * (4 + 0.5 * $DiaAcero);
                        }
                    }

                    if ($SEstru == "MEstructurales") {
                        $ach = "-";
                    } else{
                        if ($SEstru == "Dual Tipo I") {
                            $ach = "-";
                        } else {
                            // Segunda condición
                            $ach = ($L1 - 2 * (4 + 0.5 * $areaAcer)) * ($L2 - 2 * (4 + 0.5 * $areaAcer));
                        }
                    }

                    if ($SEstru == "MEstructurales") {
                        $ashmin1 = "-";
                    } else{
                        if ($SEstru == "Dual Tipo I") {
                            $ashmin1 = "-";
                        } else {
                            // Segunda condición
                            $ashmin1 = 0.3 * ($sO * $bc * $fc / $fy) * (($L1 * $L2 / $ach) - 1);
                        }
                    }

                    if ($SEstru == "MEstructurales") {
                        $ashmin2 = "-";
                    } else{
                        if ($SEstru == "Dual Tipo I") {
                            $ashmin2 = "-";
                        } else {
                            // Segunda condición
                            $ashmin2 =0.09 * ($sO * $bc * $fc / $fy);
                        }
                    }

                    if ($SEstru == "MEstructurales") {
                        $verarti = "-";
                    } else{
                        if ($SEstru == "Dual Tipo I") {
                            $verarti = "-";
                        } else {
                            if ($ash >= max($ashmin1, $ashmin2)) {
                                $verarti = "Si Cumple";
                            } else {
                                $verarti = "No Cumple, Verificar";
                            }
                        }
                    }

                    echo "<td class='text-center'>$Tgrapas</td>";
                    echo "<td class='text-center'>$tet</td>";
                    echo "<td class='text-center'>$n_grapas</td>";
                    echo "<td class='text-center'>$ashresul</td>";
                    echo "<td class='text-center'>$bc</td>"; 
                    echo "<td class='text-center'>$ach</td>"; 
                    echo "<td class='text-center'>$ashmin1</td>"; 
                    echo "<td class='text-center'>$ashmin2</td>"; 
                    echo "<td class='text-center'>$verarti</td>"; 
                    // Agrega columnas adicionales aquí según sea necesario para cada piso
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <br>
    <br>
    <h1 class="tab_encabezados text-2xl font-bold decoration-indigo-500">
       Armado Final
    </h1>
    <table class="table table-bordered table-responsive">
        <thead class="text-center">
            <tr class="sub_encabezados">
                <th scope="col" rowspan="3" style="vertical-align: middle;">NIVEL</th>
                <th scope="col" colspan="6" style="vertical-align: middle;">Artículo 21.6.4.<br>Verificación del Refuerzo Transversal para Sistemas Estructurales de Pórticos y Dual Tipo II</th>
                <th scope="col" rowspan="3" style="vertical-align: middle;">Esquema de Armado Final</th>
            </tr>
            <tr class="sub_encabezados">
                <th scope="col" colspan="2" style="vertical-align: middle;">Extremos</th>
                <th scope="col" colspan="2" style="vertical-align: middle;">Zona de Confinamiento</th>
                <th scope="col" colspan="2" style="vertical-align: middle;">Zona Central</th>
            </tr>
            <tr class="sub_encabezados">
                <th scope="col" style="vertical-align: middle;">N° de Estribos</th>
                <th scope="col" style="vertical-align: middle;">Separacion (cm)</th>
                <th scope="col" style="vertical-align: middle;">N° de Estribos</th>
                <th scope="col" style="vertical-align: middle;">Separacion (cm)</th>
                <th scope="col" style="vertical-align: middle;">N° de Estribos</th>
                <th scope="col" style="vertical-align: middle;">Separacion (cm)</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($piso_num = 0; $piso_num < count($pisos_datos_array_p); $piso_num++) {
                    // Genera una fila para cada piso
                    echo "<tr>";
                    echo "<th scope='row'>Piso " . ($piso_num + 1) . "</th>";
                    $NEstrFinalEX=1;
                    $spaciaFinalEX=5;

                    $NEstrFinalConf=max($NEstribos,$NEstribosy);
                    $spaciaFinalConf=min($sO,$sOy);
                    
                    $NEstrFinalCen="Resto";
                    $spaciaFinalCent=min($multiplo_superior,$SIy);

                    $EsqArFinal="ø3/8'' 1@5 + 7@10 + Resto@20 a c/e";

                    echo "<td class='text-center'>$NEstrFinalEX</td>";
                    echo "<td class='text-center'>$spaciaFinalEX</td>";
                    echo "<td class='text-center'>$NEstrFinalConf</td>";
                    echo "<td class='text-center'>$spaciaFinalConf</td>";
                    echo "<td class='text-center'>$NEstrFinalCen</td>";
                    echo "<td class='text-center'>$spaciaFinalCent</td>";
                    echo "<td class='text-center'>$EsqArFinal</td>";

                    // Agrega columnas adicionales aquí según sea necesario para cada piso
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>

</html>