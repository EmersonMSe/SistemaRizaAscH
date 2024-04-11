<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {



    // Datos de Zapata combinada
    //Distancia entre ejes de columnas
    $des = $_POST["des"];
    $qa = $_POST["qa"];
    $p_servicio = $_POST["p_servicio"];
    $fk = $_POST["fk"];

    //Dimensiones de la columna 1
    $t1_col1 = $_POST["t1_col1"];
    $t2_col1 = $_POST["t2_col1"];

    //Dimensiones de la columna 2
    $t1_col2 = $_POST["t1_col2"];
    $t2_col2 = $_POST["t2_col2"];

    //
    $fy = $_POST["fy"];
    $fc = $_POST["fc"];
    $df = $_POST["df"];
    $sc = $_POST["sc"];
    $ym = $_POST["ym"];
    $hc = $_POST["hc"];
    $ot = $_POST["ot"];
    $hz = $_POST["hz"];
    $m1 = $_POST["m1"];
    $m2 = $_POST["m2"];
    $r = $_POST["r"];
    $rec = $_POST["rec"];
    $Le = $_POST["Le"];

    //Cargas Columna 1
    $dataCargaCol1 = $_POST["dataCargacol1"];

    // Decodificar los datos JSON en un array de PHP
    $dataCol1 = json_decode($dataCargaCol1, true);


    //Cargas en condiciones de servicio

    //Cargas muertas
    $CM_P = $dataCol1[0][1];
    $CM_Mx = $dataCol1[0][2];
    $CM_My = $dataCol1[0][3];

    //Cargas vivas
    $CV_P = $dataCol1[1][1];
    $CV_Mx = $dataCol1[1][2];
    $CV_My = $dataCol1[1][3];

    //Cargas sismo x
    $CSx_P = $dataCol1[2][1];
    $CSx_Mx = $dataCol1[2][2];
    $CSx_My = $dataCol1[2][3];

    //Cargas sismo y
    $CSy_P = $dataCol1[3][1];
    $CSy_Mx = $dataCol1[3][2];
    $CSy_My = $dataCol1[3][3];

    //Cargas Columna 2
    $dataCargaCol2 = $_POST["dataCargacol2"];

    // Decodificar los datos JSON en un array de PHP
    $dataCol2 = json_decode($dataCargaCol2, true);

    //Cargas muertas
    $CM_P2 = $dataCol2[0][1];
    $CM_Mx2 = $dataCol2[0][2];
    $CM_My2 = $dataCol2[0][3];

    //Cargas vivas
    $CV_P2 = $dataCol2[1][1];
    $CV_Mx2 = $dataCol2[1][2];
    $CV_My2 = $dataCol2[1][3];

    //Cargas sismo x
    $CSx_P2 = $dataCol2[2][1];
    $CSx_Mx2 = $dataCol2[2][2];
    $CSx_My2 = $dataCol2[2][3];

    //Cargas sismo y
    $CSy_P2 = $dataCol2[3][1];
    $CSy_Mx2 = $dataCol2[3][2];
    $CSy_My2 = $dataCol2[3][3];

    // print_r($datax);
    // print_r("----");
    // print_r($datay);


    //Diseño por flexion
    $fi_general = $_POST["fi_general"];
    // col1
    $d_col1 = $_POST["d_col1"];
    $lv_col1 = $_POST["lv_col1"];
    $pmin_col1 = $_POST["pmin_col1"];
    $VarillaX_Col1 = $_POST['VarillaX_Col1'];

    // col2
    $d_col2 = $_POST["d_col2"];
    $lv_col2 = $_POST["lv_col2"];
    $pmin_col2 = $_POST["pmin_col2"];
    $VarillaX_Col2 = $_POST['VarillaX_Col2'];

    //verificacion por corte y punzonamiento
    //
    $ovcp = $_POST["ovcp"];
    //col1
    $r_vc_col1 = $_POST["r_vc_col1"];
    $VarillaVC_Col1 = $_POST["VarillaVC_Col1"];
    $dvc_col1 = $_POST["dvc_col1"];
    $fa_Col1 = $_POST["fa_Col1"];


    //col 2
    $r_vc_col2 = $_POST["r_vc_col2"];
    $VarillaVC_Col2 = $_POST["VarillaVC_Col2"];
    $dvc_col2 = $_POST["dvc_col2"];
    $fa_Col2 = $_POST["fa_Col2"];

    // Calculos

    $Az = round(($p_servicio) / ($qa * $fk), 2);
    $B =  $t2_col1 + $m1 + $m1;
    $L = 0.5 * $t1_col1 + $Le + 0.5 * $t1_col2 + $m2;

    //CALCULOS PARA LA COLUMNA 1
    //Combinaciones de cargas de servicio

    //CM+CV
    $CM_CV_P = round(($CM_P + $CV_P), 2);
    $CM_CV_MX = round($CM_Mx + $CV_Mx, 2);
    $CM_CV_MY = round($CM_My + $CV_My, 2);

    //CM+CV+0.8Sx
    $CM_CV_8SX_sumP = round($CM_P + $CV_P + (0.8 * $CSx_P), 2);
    $CM_CV_8SX_sumMX = round($CM_Mx + $CV_Mx + 0.8 * $CSx_Mx, 2);
    $CM_CV_8SX_sumMY = round($CM_My + $CV_My + 0.8 * $CSx_My, 2);

    //CM+CV-0.8Sx
    $CM_CV_8SX_restP = round($CM_P + $CV_P - 0.8 * $CSx_P, 2);
    $CM_CV_8SX_restMX = round($CM_Mx + $CV_Mx - 0.8 * $CSx_Mx, 2);
    $CM_CV_8SX_restMY = round($CM_My + $CV_My - 0.8 * $CSx_My, 2);

    //CM+CV+0.8Sy
    $CM_CV_8SY_sumP = round($CM_P + $CV_P + 0.8 * $CSy_P, 2);
    $CM_CV_8SY_sumMX = round($CM_Mx + $CV_Mx + 0.8 * $CSy_Mx, 2);
    $CM_CV_8SY_sumMY = round($CM_My + $CV_My + 0.8 * $CSy_My, 2);

    //CM+CV-0.8Sy
    $CM_CV_8SY_restP = round($CM_P + $CV_P - 0.8 * $CSy_P, 2);
    $CM_CV_8SY_restMX = round($CM_Mx + $CV_Mx - 0.8 * $CSy_Mx, 2);
    $CM_CV_8SY_restMY = round($CM_My + $CV_My - 0.8 * $CSy_My, 2);

    //COMBINACIONES DE CARGA ÚLTIMAS

    //1.4CM+1.7CV
    $CCU1_P = round(1.4 * $CM_P + 1.7 * $CV_P, 2);
    $CCC1_MX = round(1.4 * $CM_Mx + 1.7 * $CV_Mx, 2);
    $CCC1_MY = round(1.4 * $CM_My + 1.7 * $CV_My, 2);

    //1.25(CM+CV) + Sx
    $CCC2_P = round(1.25 * ($CM_P + $CV_P) + $CSx_P, 2);
    $CCC2_MX = round(1.25 * ($CM_Mx  + $CV_Mx) + $CSx_Mx, 2);
    $CCC2_MY = round(1.25 * ($CM_My + $CV_My) + $CSx_My, 2);

    //1.25(CM+CV)-Sx
    $CCC3_P = round(1.25 * ($CM_P + $CV_P) - $CSx_P, 2);
    $CCC3_MX = round(1.25 * ($CM_Mx  + $CV_Mx) - $CSx_Mx, 2);
    $CCC3_MY = round(1.25 * ($CM_My + $CV_My) - $CSx_My, 2);

    //1.25(CM+CV) + Sy
    $CCC4_P = round(1.25 * ($CM_P + $CV_P) + $CSy_P, 2);
    $CCC4_MX = round(1.25 * ($CM_Mx  + $CV_Mx) + $CSy_Mx, 2);
    $CCC4_MY = round(1.25 * ($CM_My + $CV_My) + $CSy_My, 2);

    //1.25(CM+CV) - Sy
    $CCC5_P = round(1.25 * ($CM_P + $CV_P) - $CSy_P, 2);
    $CCC5_MX = round(1.25 * ($CM_Mx  + $CV_Mx) - $CSy_Mx, 2);
    $CCC5_MY = round(1.25 * ($CM_My + $CV_My) - $CSy_My, 2);

    //0.9CM + Sx
    $CCC6_P = round(0.9 * $CM_P + $CSx_P, 2);
    $CCC6_MX = round(0.9 * $CM_Mx +  $CSx_Mx, 2);
    $CCC6_MY = round(0.9 * $CM_My + $CSx_My, 2);

    //0.9CM - Sx
    $CCC7_P = round(0.9 * $CM_P - $CSx_P, 2);
    $CCC7_MX = round(0.9 * $CM_Mx -  $CSx_Mx, 2);
    $CCC7_MY = round(0.9 * $CM_My - $CSx_My, 2);

    //0.9CM + Sy
    $CCC8_P = round(0.9 * $CM_P + $CSy_P, 2);
    $CCC8_MX = round(0.9 * $CM_Mx +  $CSy_Mx, 2);
    $CCC8_MY = round(0.9 * $CM_My + $CSy_My, 2);

    //0.9CM - Sy
    $CCC9_P = round(0.9 * $CM_P - $CSy_P, 2);
    $CCC9_MX = round(0.9 * $CM_Mx -  $CSy_Mx, 2);
    $CCC9_MY = round(0.9 * $CM_My - $CSy_My, 2);

    // $B = 1.80;
    // $L = 27.28;
    // $ot = 6;
    // $Az = 49.10;

    $ot = $qa;

    //PRESIONES EN EL SUELO EN CONDICIONES DE SERVICIO

    //CM + CV
    $PSCS1_OP = round($CM_CV_P / $Az, 2);
    $PSCS1_OMX = round((6 * abs($CM_CV_MX)) / ($L * (pow($B, 2))), 2);
    $PSCS1_OMY = round((6 * abs($CM_CV_MY)) / ((pow($L, 2) * $B)), 2);
    $PSCS1_OTOT = round($PSCS1_OP + $PSCS1_OMX + $PSCS1_OMY, 2);
    $PSCS1_OS = $ot;
    if ($PSCS1_OTOT < $PSCS1_OS) {
        $PSCS1_COND = "Cumple";
    } else {
        $PSCS1_COND = "No cumple";
    }

    //CM+CV+0.8Sx
    $PSCS2_OP = round($CM_CV_8SX_sumP / $Az, 2);
    $PSCS2_OMX = round((6 * abs($CM_CV_8SX_sumMX)) / ($L * (pow($B, 2))), 2);
    $PSCS2_OMY = round((6 * abs($CM_CV_8SX_sumMY)) / ((pow($L, 2) * $B)), 2);
    $PSCS2_OTOT = round($PSCS2_OP + $PSCS2_OMX + $PSCS2_OMY, 2);
    $PSCS2_OS = $ot * 1.3;
    if ($PSCS2_OTOT < $PSCS2_OS) {
        $PSCS2_COND = "Cumple";
    } else {
        $PSCS2_COND = "No cumple";
    }

    //CM+CV - 0.8Sx
    $PSCS3_OP = round($CM_CV_8SX_restP / $Az, 2);
    $PSCS3_OMX = round((6 * abs($CM_CV_8SX_restMX)) / ($L * (pow($B, 2))), 2);
    $PSCS3_OMY = round((6 * abs($CM_CV_8SX_restMY)) / ((pow($L, 2) * $B)), 2);
    $PSCS3_OTOT = round($PSCS3_OP - $PSCS3_OMX - $PSCS3_OMY, 2);
    $PSCS3_OS = $ot * 1.3;
    if ($PSCS3_OTOT < $PSCS3_OS) {
        $PSCS3_COND = "Cumple";
    } else {
        $PSCS3_COND = "No cumple";
    }

    //CM+CV+0.8Sy
    $PSCS4_OP = round($CM_CV_8SY_sumP / $Az, 2);
    $PSCS4_OMX = round((6 * abs($CM_CV_8SY_sumMX)) / ($L * (pow($B, 2))), 2);
    $PSCS4_OMY = round((6 * abs($CM_CV_8SY_sumMY)) / ((pow($L, 2) * $B)), 2);
    $PSCS4_OTOT = round($PSCS4_OP + $PSCS4_OMX + $PSCS4_OMY, 2);
    $PSCS4_OS = $ot * 1.3;
    if ($PSCS4_OTOT < $PSCS4_OS) {
        $PSCS4_COND = "Cumple";
    } else {
        $PSCS4_COND = "No cumple";
    }

    //CM+CV-0.8Sy
    $PSCS5_OP = round($CM_CV_8SY_restP / $Az, 2);
    $PSCS5_OMX = round((6 * abs($CM_CV_8SY_restMX)) / ($L * (pow($B, 2))), 2);
    $PSCS5_OMY = round((6 * abs($CM_CV_8SY_restMY)) / ((pow($L, 2) * $B)), 2);
    $PSCS5_OTOT = round($PSCS5_OP - $PSCS5_OMX - $PSCS5_OMY, 2);
    $PSCS5_OS = $ot * 1.3;
    if ($PSCS5_OTOT < $PSCS5_OS) {
        $PSCS5_COND = "Cumple";
    } else {
        $PSCS5_COND = "No cumple";
    }

    //PRESIONES ÚLTIMOS DE DISEÑO

    //1.4CM+1.7CV
    $PUD1_OP = round($CCU1_P / $Az, 2);
    $PUD1_OMX = round((6 * abs($CCC1_MX)) / ($L * (pow($B, 2))), 2);
    $PUD1_OMY = round((6 * abs($CCC1_MY)) / ((pow($L, 2) * $B)), 2);
    $PUD1_OTOT = round($PUD1_OP + $PUD1_OMX + $PUD1_OMY, 2);

    //1.25(CM+CV) + Sx
    $PUD2_OP = round($CCC2_P / $Az, 2);
    $PUD2_OMX = round((6 * abs($CCC2_MX)) / ($L * (pow($B, 2))), 2);
    $PUD2_OMY = round((6 * abs($CCC2_MY)) / ((pow($L, 2) * $B)), 2);
    $PUD2_OTOT = round($PUD2_OP + $PUD2_OMX + $PUD2_OMY, 2);

    //1.25(CM+CV)-Sx
    $PUD3_OP = round($CCC3_P / $Az, 2);
    $PUD3_OMX = round((6 * abs($CCC3_MX)) / ($L * (pow($B, 2))), 2);
    $PUD3_OMY = round((6 * abs($CCC3_MY)) / ((pow($L, 2) * $B)), 2);
    $PUD3_OTOT = round($PUD3_OP + $PUD3_OMX + $PUD3_OMY, 2);

    //1.25(CM+CV) + Sy
    $PUD4_OP = round($CCC4_P / $Az, 2);
    $PUD4_OMX = round((6 * abs($CCC4_MX)) / ($L * (pow($B, 2))), 2);
    $PUD4_OMY = round((6 * abs($CCC4_MY)) / ((pow($L, 2) * $B)), 2);
    $PUD4_OTOT = round($PUD4_OP + $PUD4_OMX + $PUD4_OMY, 2);

    //1.25(CM+CV) - Sy
    $PUD5_OP = round($CCC5_P / $Az, 2);
    $PUD5_OMX = round((6 * abs($CCC5_MX)) / ($L * (pow($B, 2))), 2);
    $PUD5_OMY = round((6 * abs($CCC5_MY)) / ((pow($L, 2) * $B)), 2);
    $PUD5_OTOT = round($PUD5_OP + $PUD5_OMX + $PUD5_OMY, 2);

    //0.9CM + Sx
    $PUD6_OP = round($CCC6_P / $Az, 2);
    $PUD6_OMX = round((6 * abs($CCC6_MX)) / ($L * (pow($B, 2))), 2);
    $PUD6_OMY = round((6 * abs($CCC6_MY)) / ((pow($L, 2) * $B)), 2);
    $PUD6_OTOT = round($PUD6_OP + $PUD6_OMX + $PUD6_OMY, 2);

    //0.9CM - Sx
    $PUD7_OP = round($CCC7_P / $Az, 2);
    $PUD7_OMX = round((6 * abs($CCC7_MX)) / ($L * (pow($B, 2))), 2);
    $PUD7_OMY = round((6 * abs($CCC7_MY)) / ((pow($L, 2) * $B)), 2);
    $PUD7_OTOT = round($PUD7_OP + $PUD7_OMX + $PUD7_OMY, 2);

    //0.9CM + Sy
    $PUD8_OP = round($CCC8_P / $Az, 2);
    $PUD8_OMX = round((6 * abs($CCC8_MX)) / ($L * (pow($B, 2))), 2);
    $PUD8_OMY = round((6 * abs($CCC8_MY)) / ((pow($L, 2) * $B)), 2);
    $PUD8_OTOT = round($PUD8_OP + $PUD8_OMX + $PUD8_OMY, 2);

    //0.9CM - Sy
    $PUD9_OP = round($CCC9_P / $Az, 2);
    $PUD9_OMX = round((6 * abs($CCC9_MX)) / ($L * (pow($B, 2))), 2);
    $PUD9_OMY = round((6 * abs($CCC9_MY)) / ((pow($L, 2) * $B)), 2);
    $PUD9_OTOT = round($PUD9_OP + $PUD9_OMX + $PUD9_OMY, 2);

    $OT_ULT = max($PUD1_OTOT, $PUD2_OTOT, $PUD3_OTOT, $PUD4_OTOT, $PUD5_OTOT, $PUD6_OTOT, $PUD7_OTOT, $PUD8_OTOT, $PUD9_OTOT);

    //CALCULO DE LAS FUERZAS ULTIMAS EN LA BASE DE LA ZAPATA

    //Qu(1.4D+1.7)(ton-m)
    $CFUBZ1 = $PUD1_OTOT * $B;

    //Qu(1.25*(D+L)+EQX)(ton-m)
    $CFUBZ2_MAX = round(max($PUD2_OTOT, $PUD3_OTOT) * $B, 2);
    $CFUBZ2_MIN = round(min($PUD2_OTOT, $PUD3_OTOT) * $B, 2);;

    //Qu(1.25*(D+L)+EQY)(ton-m)
    $CFUBZ3_MAX = round(max($PUD4_OTOT, $PUD5_OTOT) * $B, 2);
    $CFUBZ3_MIN = round(min($PUD4_OTOT, $PUD5_OTOT) * $B, 2);

    //VERIFICACION DE EXCENTRICIDAADES
    //CM+CV
    //FA
    $VE1_FA1 = $PSCS1_OP;
    $VE1_FA2 = $PSCS1_OP;
    $VE1_FA3 = $PSCS1_OP;
    $VE1_FA4 = $PSCS1_OP;

    //MX
    $VE1_MX1 = $PSCS1_OMX;
    $VE1_MX2 = $PSCS1_OMX;
    $VE1_MX3 = -1 * $PSCS1_OMX;
    $VE1_MX4 = -1 * $PSCS1_OMX;

    //MY
    $VE1_MY1 = -1 * $PSCS1_OMY;
    $VE1_MY2 = $PSCS1_OMY;
    $VE1_MY3 = -1 * $PSCS1_OMY;
    $VE1_MY4 = $PSCS1_OMY;

    //RESULTANTE
    $VE1_R1 = $VE1_FA1 + $VE1_MX1 + $VE1_MY1;
    $VE1_R2 = $VE1_FA2 + $VE1_MX2 + $VE1_MY2;
    $VE1_R3 = $VE1_FA3 + $VE1_MX3 + $VE1_MY3;
    $VE1_R4 = $VE1_FA4 + $VE1_MX4 + $VE1_MY4;

    if ($VE1_R1 >= 0 && $VE1_R2 >= 0) {
        $VE_TEXT_F1 = "cumple";
    } else {
        $VE_TEXT_F1 = "No Cumple";
    }

    if ($VE1_R3 >= 0 && $VE1_R4 >= 0) {
        $VE_TEXT_F2 = "cumple";
    } else {
        $VE_TEXT_F2 = "No Cumple";
    }

    //CM+CV+0.8Sx 
    //FA
    $VE2_FA1 = $PSCS2_OP;
    $VE2_FA2 = $PSCS2_OP;
    $VE2_FA3 = $PSCS2_OP;
    $VE2_FA4 = $PSCS2_OP;

    //MX
    $VE2_MX1 = $PSCS2_OMX;
    $VE2_MX2 = $PSCS2_OMX;
    $VE2_MX3 = -1 * $PSCS2_OMX;
    $VE2_MX4 = -1 * $PSCS2_OMX;

    //MY
    $VE2_MY1 = -1 * $PSCS2_OMY;
    $VE2_MY2 = $PSCS2_OMY;
    $VE2_MY3 = -1 * $PSCS2_OMY;
    $VE2_MY4 = $PSCS2_OMY;

    //RESULTANTE
    $VE2_R1 = $VE2_FA1 + $VE2_MX1 + $VE2_MY1;
    $VE2_R2 = $VE2_FA2 + $VE2_MX2 + $VE2_MY2;
    $VE2_R3 = $VE2_FA3 + $VE2_MX3 + $VE2_MY3;
    $VE2_R4 = $VE2_FA4 + $VE2_MX4 + $VE2_MY4;

    if ($VE2_R1 >= 0 && $VE2_R2 >= 0) {
        $VE_TEXT_F3 = "Cumple";
    } else {
        $VE_TEXT_F3 = "No Cumple";
    }

    if (
        $VE2_R3 >= 0 && $VE2_R4 >= 0
    ) {
        $VE_TEXT_F4 = "Cumple";
    } else {
        $VE_TEXT_F4 = "No cumple";
    }

    //CM+CV-0.8Sx 
    //FA
    $VE3_FA1 = $PSCS3_OP;
    $VE3_FA2 = $PSCS3_OP;
    $VE3_FA3 = $PSCS3_OP;
    $VE3_FA4 = $PSCS3_OP;

    //MX
    $VE3_MX1 = $PSCS3_OMX;
    $VE3_MX2 = $PSCS3_OMX;
    $VE3_MX3 = -1 * $PSCS3_OMX;
    $VE3_MX4 = -1 * $PSCS3_OMX;

    //MY
    $VE3_MY1 = -1 * $PSCS3_OMY;
    $VE3_MY2 = $PSCS3_OMY;
    $VE3_MY3 = -1 * $PSCS3_OMY;
    $VE3_MY4 = $PSCS3_OMY;

    //RESULTANTE
    $VE3_R1 = $VE3_FA1 + $VE3_MX1 + $VE3_MY1;
    $VE3_R2 = $VE3_FA2 + $VE3_MX2 + $VE3_MY2;
    $VE3_R3 = $VE3_FA3 + $VE3_MX3 + $VE3_MY3;
    $VE3_R4 = $VE3_FA4 + $VE3_MX4 + $VE3_MY4;

    if ($VE3_R1 >= 0 && $VE3_R2 >= 0) {
        $VE_TEXT_F5 = "Cumple";
    } else {
        $VE_TEXT_F5 = "No Cumple";
    }

    if (
        $VE3_R3 >= 0 && $VE3_R4 >= 0
    ) {
        $VE_TEXT_F6 = "Cumple";
    } else {
        $VE_TEXT_F6 = "No Cumple";
    }

    //CM+CV+0.8Sy 
    //FA
    $VE4_FA1 = $PSCS4_OP;
    $VE4_FA2 = $PSCS4_OP;
    $VE4_FA3 = $PSCS4_OP;
    $VE4_FA4 = $PSCS4_OP;

    //MX
    $VE4_MX1 = $PSCS4_OMX;
    $VE4_MX2 = $PSCS4_OMX;
    $VE4_MX3 = -1 * $PSCS4_OMX;
    $VE4_MX4 = -1 * $PSCS4_OMX;

    //MY
    $VE4_MY1 = -1 * $PSCS4_OMY;
    $VE4_MY2 = $PSCS4_OMY;
    $VE4_MY3 = -1 * $PSCS4_OMY;
    $VE4_MY4 = $PSCS4_OMY;

    //RESULTANTE
    $VE4_R1 = $VE4_FA1 + $VE4_MX1 + $VE4_MY1;
    $VE4_R2 = $VE4_FA2 + $VE4_MX2 + $VE4_MY2;
    $VE4_R3 = $VE4_FA3 + $VE4_MX3 + $VE4_MY3;
    $VE4_R4 = $VE4_FA4 + $VE4_MX4 + $VE4_MY4;

    if ($VE4_R1 >= 0 && $VE4_R2 >= 0) {
        $VE_TEXT_F7 = "Cumple";
    } else {
        $VE_TEXT_F7 = "No Cumple";
    }

    if (
        $VE4_R3 >= 0 && $VE4_R4 >= 0
    ) {
        $VE_TEXT_F8 = "Cumple";
    } else {
        $VE_TEXT_F8 = "No Cumple";
    }

    //CM+CV-0.8Sy 
    //FA
    $VE5_FA1 = $PSCS5_OP;
    $VE5_FA2 = $PSCS5_OP;
    $VE5_FA3 = $PSCS5_OP;
    $VE5_FA4 = $PSCS5_OP;

    //MX
    $VE5_MX1 = $PSCS5_OMX;
    $VE5_MX2 = $PSCS5_OMX;
    $VE5_MX3 = -1 * $PSCS5_OMX;
    $VE5_MX4 = -1 * $PSCS5_OMX;

    //MY
    $VE5_MY1 = -1 * $PSCS5_OMY;
    $VE5_MY2 = $PSCS5_OMY;
    $VE5_MY3 = -1 * $PSCS5_OMY;
    $VE5_MY4 = $PSCS5_OMY;

    //RESULTANTE
    $VE5_R1 = $VE5_FA1 + $VE5_MX1 + $VE5_MY1;
    $VE5_R2 = $VE5_FA2 + $VE5_MX2 + $VE5_MY2;
    $VE5_R3 = $VE5_FA3 + $VE5_MX3 + $VE5_MY3;
    $VE5_R4 = $VE5_FA4 + $VE5_MX4 + $VE5_MY4;

    if ($VE5_R1 >= 0 && $VE5_R2 >= 0) {
        $VE_TEXT_F9 = "Cumple";
    } else {
        $VE_TEXT_F9 = "No cumple";
    }

    if (
        $VE5_R3 >= 0 && $VE5_R4 >= 0
    ) {
        $VE_TEXT_F10 = "Cumple";
    } else {
        $VE_TEXT_F10 = "No Cumple";
    }


    //CALCULOS PARA COLUMNA 2
    //Combinaciones de cargas de servicio

    //CM+CV
    $CM_CV_P2 = round(($CM_P2 + $CV_P2), 2);
    $CM_CV_MX2 = round($CM_Mx2 + $CV_Mx2, 2);
    $CM_CV_MY2 = round($CM_My2 + $CV_My2, 2);

    //CM+CV+0.8Sx
    $CM_CV_8SX_sumP2 = round($CM_P2 + $CV_P2 + (0.8 * $CSx_P2), 2);
    $CM_CV_8SX_sumMX2 = round($CM_Mx2 + $CV_Mx2 + 0.8 * $CSx_Mx2, 2);
    $CM_CV_8SX_sumMY2 = round($CM_My2 + $CV_My2 + 0.8 * $CSx_My2, 2);

    //CM+CV-0.8Sx
    $CM_CV_8SX_restP2 = round($CM_P2 + $CV_P2 - 0.8 * $CSx_P2, 2);
    $CM_CV_8SX_restMX2 = round($CM_Mx2 + $CV_Mx2 - 0.8 * $CSx_Mx2, 2);
    $CM_CV_8SX_restMY2 = round($CM_My2 + $CV_My2 - 0.8 * $CSx_My2, 2);

    //CM+CV+0.8Sy
    $CM_CV_8SY_sumP2 = round($CM_P2 + $CV_P2 + 0.8 * $CSy_P2, 2);
    $CM_CV_8SY_sumMX2 = round($CM_Mx2 + $CV_Mx2 + 0.8 * $CSy_Mx2, 2);
    $CM_CV_8SY_sumMY2 = round($CM_My2 + $CV_My2 + 0.8 * $CSy_My2, 2);

    //CM+CV-0.8Sy
    $CM_CV_8SY_restP2 = round($CM_P2 + $CV_P2 - 0.8 * $CSy_P2, 2);
    $CM_CV_8SY_restMX2 = round($CM_Mx2 + $CV_Mx2 - 0.8 * $CSy_Mx2, 2);
    $CM_CV_8SY_restMY2 = round($CM_My2 + $CV_My2 - 0.8 * $CSy_My2, 2);

    //COMBINACIONES DE CARGA ÚLTIMAS

    //1.4CM+1.7CV
    $CCU1_P2 = round(1.4 * $CM_P2 + 1.7 * $CV_P2, 2);
    $CCC1_MX2 = round(1.4 * $CM_Mx2 + 1.7 * $CV_Mx2, 2);
    $CCC1_MY2 = round(1.4 * $CM_My2 + 1.7 * $CV_My2, 2);

    //1.25(CM+CV) + Sx
    $CCC2_P2 = round(1.25 * ($CM_P2 + $CV_P2) + $CSx_P2, 2);
    $CCC2_MX2 = round(1.25 * ($CM_Mx2 + $CV_Mx2) + $CSx_Mx2, 2);
    $CCC2_MY2 = round(1.25 * ($CM_My2 + $CV_My2) + $CSx_My2, 2);

    //1.25(CM+CV)-Sx
    $CCC3_P2 = round(1.25 * ($CM_P2 + $CV_P2) - $CSx_P2, 2);
    $CCC3_MX2 = round(1.25 * ($CM_Mx2 + $CV_Mx2) - $CSx_Mx2, 2);
    $CCC3_MY2 = round(1.25 * ($CM_My2 + $CV_My2) - $CSx_My2, 2);

    //1.25(CM+CV) + Sy
    $CCC4_P2 = round(1.25 * ($CM_P2 + $CV_P2) + $CSy_P2, 2);
    $CCC4_MX2 = round(1.25 * ($CM_Mx2 + $CV_Mx2) + $CSy_Mx2, 2);
    $CCC4_MY2 = round(1.25 * ($CM_My2 + $CV_My2) + $CSy_My2, 2);

    //1.25(CM+CV) - Sy
    $CCC5_P2 = round(1.25 * ($CM_P2 + $CV_P2) - $CSy_P2, 2);
    $CCC5_MX2 = round(1.25 * ($CM_Mx2  + $CV_Mx2) - $CSy_Mx2, 2);
    $CCC5_MY2 = round(1.25 * ($CM_My2 + $CV_My2) - $CSy_My2, 2);

    //0.9CM + Sx
    $CCC6_P2 = round(0.9 * $CM_P2 + $CSx_P2, 2);
    $CCC6_MX2 = round(0.9 * $CM_Mx2 +  $CSx_Mx2, 2);
    $CCC6_MY2 = round(0.9 * $CM_My2 + $CSx_My2, 2);

    //0.9CM - Sx
    $CCC7_P2 = round(0.9 * $CM_P2 - $CSx_P2, 2);
    $CCC7_MX2 = round(0.9 * $CM_Mx2 -  $CSx_Mx2, 2);
    $CCC7_MY2 = round(0.9 * $CM_My2 - $CSx_My2, 2);

    //0.9CM + Sy
    $CCC8_P2 = round(0.9 * $CM_P2 + $CSy_P2, 2);
    $CCC8_MX2 = round(0.9 * $CM_Mx2 +  $CSy_Mx2, 2);
    $CCC8_MY2 = round(0.9 * $CM_My2 + $CSy_My2, 2);

    //0.9CM - Sy
    $CCC9_P2 = round(0.9 * $CM_P2 - $CSy_P2, 2);
    $CCC9_MX2 = round(0.9 * $CM_Mx2 -  $CSy_Mx2, 2);
    $CCC9_MY2 = round(0.9 * $CM_My2 - $CSy_My2, 2);

    // $B2 = 1.80;
    // $L2 = 27.28;
    // $ot2 = 6;
    // $Az2 = 49.10;

    $B2 = $B;
    $L2 = $L;
    $ot2 = $qa;
    $Az2 = $Az;

    //PRESIONES EN EL SUELO EN CONDICIONES DE SERVICIO

    //CM + CV
    $PSCS1_OP2 = round($CM_CV_P2 / $Az2, 2);
    $PSCS1_OMX2 = round((6 * abs($CM_CV_MX2)) / ($L2 * (pow($B2, 2))), 2);
    $PSCS1_OMY2 = round((6 * abs($CM_CV_MY2)) / ((pow($L2, 2) * $B2)), 2);
    $PSCS1_OTOT2 = round($PSCS1_OP2 + $PSCS1_OMX2 + $PSCS1_OMY2, 2);
    $PSCS1_OS2 = $ot2;
    if ($PSCS1_OTOT2 < $PSCS1_OS2) {
        $PSCS1_COND2 = "Cumple";
    } else {
        $PSCS1_COND2 = "No Cumple";
    }

    //CM+CV+0.8Sx
    $PSCS2_OP2 = round($CM_CV_8SX_sumP2 / $Az2, 2);
    $PSCS2_OMX2 = round((6 * abs($CM_CV_8SX_sumMX2)) / ($L2 * (pow($B2, 2))), 2);
    $PSCS2_OMY2 = round((6 * abs($CM_CV_8SX_sumMY2)) / ((pow($L2, 2) * $B2)), 2);
    $PSCS2_OTOT2 = round($PSCS2_OP2 + $PSCS2_OMX2 + $PSCS2_OMY2, 2);
    $PSCS2_OS2 = $ot2 * 1.3;
    if ($PSCS2_OTOT2 < $PSCS2_OS2) {
        $PSCS2_COND2 = "Cumple";
    } else {
        $PSCS2_COND2 = "No Cumple";
    }

    //CM+CV - 0.8Sx
    $PSCS3_OP2 = round($CM_CV_8SX_restP2 / $Az2, 2);
    $PSCS3_OMX2 = round((6 * abs($CM_CV_8SX_restMX2)) / ($L2 * (pow($B2, 2))), 2);
    $PSCS3_OMY2 = round((6 * abs($CM_CV_8SX_restMY2)) / ((pow($L2, 2) * $B2)), 2);
    $PSCS3_OTOT2 = round($PSCS3_OP2 - $PSCS3_OMX2 - $PSCS3_OMY2, 2);
    $PSCS3_OS2 = $ot2 * 1.3;
    if ($PSCS3_OTOT2 < $PSCS3_OS2) {
        $PSCS3_COND2 = "Cumple";
    } else {
        $PSCS3_COND2 = "No cumple";
    }

    //CM+CV+0.8Sy
    $PSCS4_OP2 = round($CM_CV_8SY_sumP2 / $Az2, 2);
    $PSCS4_OMX2 = round((6 * abs($CM_CV_8SY_sumMX2)) / ($L2 * (pow($B2, 2))), 2);
    $PSCS4_OMY2 = round((6 * abs($CM_CV_8SY_sumMY2)) / ((pow($L2, 2) * $B2)), 2);
    $PSCS4_OTOT2 = round($PSCS4_OP2 + $PSCS4_OMX2 + $PSCS4_OMY2, 2);
    $PSCS4_OS2 = $ot2 * 1.3;
    if ($PSCS4_OTOT2 < $PSCS4_OS2) {
        $PSCS4_COND2 = "Cumple";
    } else {
        $PSCS4_COND2 = "No cumple";
    }

    //CM+CV-0.8Sy
    $PSCS5_OP2 = round($CM_CV_8SY_restP2 / $Az2, 2);
    $PSCS5_OMX2 = round((6 * abs($CM_CV_8SY_restMX2)) / ($L2 * (pow($B2, 2))), 2);
    $PSCS5_OMY2 = round((6 * abs($CM_CV_8SY_restMY2)) / ((pow($L2, 2) * $B2)), 2);
    $PSCS5_OTOT2 = round($PSCS5_OP2 + $PSCS5_OMX2 - $PSCS5_OMY2, 2);
    $PSCS5_OS2 = $ot2 * 1.3;
    if ($PSCS5_OTOT2 < $PSCS5_OS2) {
        $PSCS5_COND2 = "Cumple";
    } else {
        $PSCS5_COND2 = "No cumple";
    }

    // PRESIONES ÚLTIMOS DE DISEÑO

    // 1.4CM+1.7CV
    $PUD1_OP2 = round($CCU1_P2 / $Az2, 2);
    $PUD1_OMX2 = round((6 * abs($CCC1_MX2)) / ($L2 * (pow($B2, 2))), 2);
    $PUD1_OMY2 = round((6 * abs($CCC1_MY2)) / ((pow($L2, 2) * $B2)), 2);
    $PUD1_OTOT2 = round($PUD1_OP2 + $PUD1_OMX2 + $PUD1_OMY2, 2);

    // 1.25(CM+CV) + Sx
    $PUD2_OP2 = round($CCC2_P2 / $Az2, 2);
    $PUD2_OMX2 = round((6 * abs($CCC2_MX2)) / ($L2 * (pow($B2, 2))), 2);
    $PUD2_OMY2 = round((6 * abs($CCC2_MY2)) / ((pow($L2, 2) * $B2)), 2);
    $PUD2_OTOT2 = round($PUD2_OP2 + $PUD2_OMX2 + $PUD2_OMY2, 2);

    // 1.25(CM+CV)-Sx
    $PUD3_OP2 = round($CCC3_P2 / $Az2, 2);
    $PUD3_OMX2 = round((6 * abs($CCC3_MX2)) / ($L2 * (pow($B2, 2))), 2);
    $PUD3_OMY2 = round((6 * abs($CCC3_MY2)) / ((pow($L2, 2) * $B2)), 2);
    $PUD3_OTOT2 = round($PUD3_OP2 + $PUD3_OMX2 + $PUD3_OMY2, 2);

    // 1.25(CM+CV) + Sy
    $PUD4_OP2 = round($CCC4_P2 / $Az2, 2);
    $PUD4_OMX2 = round((6 * abs($CCC4_MX2)) / ($L2 * (pow($B2, 2))), 2);
    $PUD4_OMY2 = round((6 * abs($CCC4_MY2)) / ((pow($L2, 2) * $B2)), 2);
    $PUD4_OTOT2 = round($PUD4_OP2 + $PUD4_OMX2 + $PUD4_OMY2, 2);

    // 1.25(CM+CV) - Sy
    $PUD5_OP2 = round($CCC5_P2 / $Az2, 2);
    $PUD5_OMX2 = round((6 * abs($CCC5_MX2)) / ($L2 * (pow($B2, 2))), 2);
    $PUD5_OMY2 = round((6 * abs($CCC5_MY2)) / ((pow($L2, 2) * $B2)), 2);
    $PUD5_OTOT2 = round($PUD5_OP2 + $PUD5_OMX2 + $PUD5_OMY2, 2);

    // 0.9CM + Sx
    $PUD6_OP2 = round($CCC6_P2 / $Az2, 2);
    $PUD6_OMX2 = round((6 * abs($CCC6_MX2)) / ($L2 * (pow($B2, 2))), 2);
    $PUD6_OMY2 = round((6 * abs($CCC6_MY2)) / ((pow($L2, 2) * $B2)), 2);
    $PUD6_OTOT2 = round($PUD6_OP2 + $PUD6_OMX2 + $PUD6_OMY2, 2);

    // 0.9CM - Sx
    $PUD7_OP2 = round($CCC7_P2 / $Az2, 2);
    $PUD7_OMX2 = round((6 * abs($CCC7_MX2)) / ($L2 * (pow($B2, 2))), 2);
    $PUD7_OMY2 = round((6 * abs($CCC7_MY2)) / ((pow($L2, 2) * $B2)), 2);
    $PUD7_OTOT2 = round($PUD7_OP2 + $PUD7_OMX2 + $PUD7_OMY2, 2);

    // 0.9CM + Sy
    $PUD8_OP2 = round($CCC8_P2 / $Az2, 2);
    $PUD8_OMX2 = round((6 * abs($CCC8_MX2)) / ($L2 * (pow($B2, 2))), 2);
    $PUD8_OMY2 = round((6 * abs($CCC8_MY2)) / ((pow($L2, 2) * $B2)), 2);
    $PUD8_OTOT2 = round($PUD8_OP2 + $PUD8_OMX2 + $PUD8_OMY2, 2);

    // 0.9CM - Sy
    $PUD9_OP2 = round($CCC9_P2 / $Az2, 2);
    $PUD9_OMX2 = round((6 * abs($CCC9_MX2)) / ($L2 * (pow($B2, 2))), 2);
    $PUD9_OMY2 = round((6 * abs($CCC9_MY2)) / ((pow($L2, 2) * $B2)), 2);
    $PUD9_OTOT2 = round($PUD9_OP2 + $PUD9_OMX2 + $PUD9_OMY2, 2);

    $OT_ULT2 = max($PUD1_OTOT2, $PUD2_OTOT2, $PUD3_OTOT2, $PUD4_OTOT2, $PUD5_OTOT2, $PUD6_OTOT2, $PUD7_OTOT2, $PUD8_OTOT2, $PUD9_OTOT2);


    // CÁLCULO DE LAS FUERZAS ÚLTIMAS EN LA BASE DE LA ZAPATA

    // Qu(1.4D+1.7)(ton-m)
    $CFUBZ1_2 = $PUD1_OTOT2 * $B2;

    // Qu(1.25*(D+L)+EQX)(ton-m)
    $CFUBZ2_MAX_2 = round(max($PUD2_OTOT2, $PUD3_OTOT2) * $B2, 2);
    $CFUBZ2_MIN_2 = round(min($PUD2_OTOT2, $PUD3_OTOT2) * $B2, 2);

    // Qu(1.25*(D+L)+EQY)(ton-m)
    $CFUBZ3_MAX_2 = round(max($PUD4_OTOT2, $PUD5_OTOT2) * $B2, 2);
    $CFUBZ3_MIN_2 = round(min($PUD4_OTOT2, $PUD5_OTOT2) * $B2, 2);

    // VERIFICACIÓN DE EXCENTRICIDADES
    // CM+CV
    // FA
    $VE1_FA1_2 = $PSCS1_OP2;
    $VE1_FA2_2 = $PSCS1_OP2;
    $VE1_FA3_2 = $PSCS1_OP2;
    $VE1_FA4_2 = $PSCS1_OP2;

    // MX
    $VE1_MX1_2 = $PSCS1_OMX2;
    $VE1_MX2_2 = $PSCS1_OMX2;
    $VE1_MX3_2 = -1 * $PSCS1_OMX2;
    $VE1_MX4_2 = -1 * $PSCS1_OMX2;

    // MY
    $VE1_MY1_2 = -1 * $PSCS1_OMY2;
    $VE1_MY2_2 = $PSCS1_OMY2;
    $VE1_MY3_2 = -1 * $PSCS1_OMY2;
    $VE1_MY4_2 = $PSCS1_OMY2;

    // RESULTANTE
    $VE1_R1_2 = $VE1_FA1_2 + $VE1_MX1_2 + $VE1_MY1_2;
    $VE1_R2_2 = $VE1_FA2_2 + $VE1_MX2_2 + $VE1_MY2_2;
    $VE1_R3_2 = $VE1_FA3_2 + $VE1_MX3_2 + $VE1_MY3_2;
    $VE1_R4_2 = $VE1_FA4_2 + $VE1_MX4_2 + $VE1_MY4_2;

    if ($VE1_R1_2 >= 0 && $VE1_R2_2 >= 0) {
        $VE_TEXT_F1_2 = "Cumple";
    } else {
        $VE_TEXT_F1_2 = "No Cumple";
    }

    if ($VE1_R3_2 >= 0 && $VE1_R4_2 >= 0) {
        $VE_TEXT_F2_2 = "Cumple";
    } else {
        $VE_TEXT_F2_2 = "No Cumple";
    }

    // CM+CV+0.8Sx 
    // FA
    $VE2_FA1_2 = $PSCS2_OP2;
    $VE2_FA2_2 = $PSCS2_OP2;
    $VE2_FA3_2 = $PSCS2_OP2;
    $VE2_FA4_2 = $PSCS2_OP2;

    // MX
    $VE2_MX1_2 = $PSCS2_OMX2;
    $VE2_MX2_2 = $PSCS2_OMX2;
    $VE2_MX3_2 = -1 * $PSCS2_OMX2;
    $VE2_MX4_2 = -1 * $PSCS2_OMX2;

    // MY
    $VE2_MY1_2 = -1 * $PSCS2_OMY2;
    $VE2_MY2_2 = $PSCS2_OMY2;
    $VE2_MY3_2 = -1 * $PSCS2_OMY2;
    $VE2_MY4_2 = $PSCS2_OMY2;

    // RESULTANTE
    $VE2_R1_2 = $VE2_FA1_2 + $VE2_MX1_2 + $VE2_MY1_2;
    $VE2_R2_2 = $VE2_FA2_2 + $VE2_MX2_2 + $VE2_MY2_2;
    $VE2_R3_2 = $VE2_FA3_2 + $VE2_MX3_2 + $VE2_MY3_2;
    $VE2_R4_2 = $VE2_FA4_2 + $VE2_MX4_2 + $VE2_MY4_2;

    if ($VE2_R1_2 >= 0 && $VE2_R2_2 >= 0) {
        $VE_TEXT_F3_2 = "Cumple";
    } else {
        $VE_TEXT_F3_2 = "No Cumple";
    }

    if ($VE2_R3_2 >= 0 && $VE2_R4_2 >= 0) {
        $VE_TEXT_F4_2 = "Cumple";
    } else {
        $VE_TEXT_F4_2 = "No cumple";
    }

    // CM+CV-0.8Sx 
    // FA
    $VE3_FA1_2 = $PSCS3_OP2;
    $VE3_FA2_2 = $PSCS3_OP2;
    $VE3_FA3_2 = $PSCS3_OP2;
    $VE3_FA4_2 = $PSCS3_OP2;

    // MX
    $VE3_MX1_2 = $PSCS3_OMX2;
    $VE3_MX2_2 = $PSCS3_OMX2;
    $VE3_MX3_2 = -1 * $PSCS3_OMX2;
    $VE3_MX4_2 = -1 * $PSCS3_OMX2;

    // MY
    $VE3_MY1_2 = -1 * $PSCS3_OMY2;
    $VE3_MY2_2 = $PSCS3_OMY2;
    $VE3_MY3_2 = -1 * $PSCS3_OMY2;
    $VE3_MY4_2 = $PSCS3_OMY2;

    // RESULTANTE
    $VE3_R1_2 = $VE3_FA1_2 + $VE3_MX1_2 + $VE3_MY1_2;
    $VE3_R2_2 = $VE3_FA2_2 + $VE3_MX2_2 + $VE3_MY2_2;
    $VE3_R3_2 = $VE3_FA3_2 + $VE3_MX3_2 + $VE3_MY3_2;
    $VE3_R4_2 = $VE3_FA4_2 + $VE3_MX4_2 + $VE3_MY4_2;

    if ($VE3_R1_2 >= 0 && $VE3_R2_2 >= 0) {
        $VE_TEXT_F5_2 = "Cumple";
    } else {
        $VE_TEXT_F5_2 = "No Cumple";
    }

    if ($VE3_R3_2 >= 0 && $VE3_R4_2 >= 0) {
        $VE_TEXT_F6_2 = "Cumple";
    } else {
        $VE_TEXT_F6_2 = "No Cumple";
    }

    // CM+CV+0.8Sy 
    // FA
    $VE4_FA1_2 = $PSCS4_OP2;
    $VE4_FA2_2 = $PSCS4_OP2;
    $VE4_FA3_2 = $PSCS4_OP2;
    $VE4_FA4_2 = $PSCS4_OP2;

    // MX
    $VE4_MX1_2 = $PSCS4_OMX2;
    $VE4_MX2_2 = $PSCS4_OMX2;
    $VE4_MX3_2 = -1 * $PSCS4_OMX2;
    $VE4_MX4_2 = -1 * $PSCS4_OMX2;

    // MY
    $VE4_MY1_2 = -1 * $PSCS4_OMY2;
    $VE4_MY2_2 = $PSCS4_OMY2;
    $VE4_MY3_2 = -1 * $PSCS4_OMY2;
    $VE4_MY4_2 = $PSCS4_OMY2;

    // RESULTANTE
    $VE4_R1_2 = $VE4_FA1_2 + $VE4_MX1_2 + $VE4_MY1_2;
    $VE4_R2_2 = $VE4_FA2_2 + $VE4_MX2_2 + $VE4_MY2_2;
    $VE4_R3_2 = $VE4_FA3_2 + $VE4_MX3_2 + $VE4_MY3_2;
    $VE4_R4_2 = $VE4_FA4_2 + $VE4_MX4_2 + $VE4_MY4_2;

    if ($VE4_R1_2 >= 0 && $VE4_R2_2 >= 0) {
        $VE_TEXT_F7_2 = "Cumple";
    } else {
        $VE_TEXT_F7_2 = "No Cumple";
    }

    if ($VE4_R3_2 >= 0 && $VE4_R4_2 >= 0) {
        $VE_TEXT_F8_2 = "Cumple";
    } else {
        $VE_TEXT_F8_2 = "No Cumple";
    }

    // CM+CV-0.8Sy 
    // FA
    $VE5_FA1_2 = $PSCS5_OP2;
    $VE5_FA2_2 = $PSCS5_OP2;
    $VE5_FA3_2 = $PSCS5_OP2;
    $VE5_FA4_2 = $PSCS5_OP2;

    // MX
    $VE5_MX1_2 = $PSCS5_OMX2;
    $VE5_MX2_2 = $PSCS5_OMX2;
    $VE5_MX3_2 = -1 * $PSCS5_OMX2;
    $VE5_MX4_2 = -1 * $PSCS5_OMX2;

    // MY
    $VE5_MY1_2 = -1 * $PSCS5_OMY2;
    $VE5_MY2_2 = $PSCS5_OMY2;
    $VE5_MY3_2 = -1 * $PSCS5_OMY2;
    $VE5_MY4_2 = $PSCS5_OMY2;

    // RESULTANTE
    $VE5_R1_2 = $VE5_FA1_2 + $VE5_MX1_2 + $VE5_MY1_2;
    $VE5_R2_2 = $VE5_FA2_2 + $VE5_MX2_2 + $VE5_MY2_2;
    $VE5_R3_2 = $VE5_FA3_2 + $VE5_MX3_2 + $VE5_MY3_2;
    $VE5_R4_2 = $VE5_FA4_2 + $VE5_MX4_2 + $VE5_MY4_2;

    if ($VE5_R1_2 >= 0 && $VE5_R2_2 >= 0) {
        $VE_TEXT_F9_2 = "Cumple";
    } else {
        $VE_TEXT_F9_2 = "No Cumple";
    }

    if ($VE5_R3_2 >= 0 && $VE5_R4_2 >= 0) {
        $VE_TEXT_F10_2 = "Cumple";
    } else {
        $VE_TEXT_F10_2 = "No Cumple";
    }

    //DISEÑO POR FLEXION

    // Direccion XX
    // COL 1

    $O_DIS_COL1 = 43.30;
    //lv
    $lv_sal_col1 = round($lv_col1 * $d_col1, 2);

    //b
    $b1_sal = round($d_col1 * $lv_col1  + $t1_col1 * 100, 2);

    //mu
    $MU_COL1 = round(($O_DIS_COL1 * $B * pow(($lv_sal_col1 / 100), 2)) / 2 * 1000, 2);

    //p
    $RAIZ_COL = 1 - ((2 * $MU_COL1) / ($fi_general * $B * pow($d_col1, 2) * 0.85 * $fc));
    $P_COL1 = ((0.85 * $fc) / $fy) * (1 - sqrt($RAIZ_COL));
    $P_COL1 = round($P_COL1, 4);

    //As
    $MAX_P_COL1 = max($P_COL1, $pmin_col1);
    $AS_COL1 = $MAX_P_COL1 * $B * 100 * $hz * 100;

    //Av
    $Avx_col1 = $VarillaX_Col1;

    //#var
    $num_var_col1 = round($AS_COL1 / $Avx_col1, 1);

    //Esp.  S  
    $esp_sx_col1 = round($B * 100 / $num_var_col1, 1);

    //usar
    $opcionesVarillas = array(
        '0' => 'Ø 0"',
        '0.28' => '6mm',
        '0.5' => '8mm',
        '0.71' => 'Ø 3/8"',
        '1.13' => '12mm',
        '1.29' => 'Ø 1/2"',
        '1.99' => 'Ø 5/8"',
        '2.84' => 'Ø 3/4"',
        '5.1' => 'Ø 1"',
        '10.06' => 'Ø 1 3/8"'
    );

    $textovarillaX1 = "";

    // Verificar si el valor buscado existe en el array y guardar el texto asociado
    if (array_key_exists($Avx_col1, $opcionesVarillas)) {
        $textovarillaX1 = $opcionesVarillas[$Avx_col1];
    }

    $usarX_col1 = " ø " . $textovarillaX1 . " @ " . $esp_sx_col1;


    // COL 2
    $O_DIS_COL2 = 43.30;

    //lv
    $lv_sal_col2 = $lv_col2 * $d_col2;

    //b
    $b2_sal =  2 * $d_col2 * $lv_col2 + $t1_col2 * 100;

    //mu
    $MU_COL2 = round(($O_DIS_COL2 * $B * pow(($lv_sal_col2 / 100), 2)) / 2 * 1000, 2);

    //p
    $RAIZ_COL2 = 1 - ((2 * $MU_COL2) / ($fi_general * $B * pow($d_col2, 2) * 0.85 * $fc));
    $P_COL2 = ((0.85 * $fc) / $fy) * (1 - sqrt($RAIZ_COL2));
    $P_COL2 = round($P_COL2, 4);

    //As
    $MAX_P_COL2 = max($P_COL2, $pmin_col2);
    $AS_COL2 = $MAX_P_COL2 * $B * 100 * $hz * 100;

    //Av
    $Avx_col2 = $VarillaX_Col2;

    //#var
    $num_var_col2 = round($AS_COL2 / $Avx_col2, 1);

    //Esp.  S  
    $esp_sx_col2 = round($B * 100 / $num_var_col2, 1);

    //usar

    $textovarillaX2 = "";

    // Verificar si el valor buscado existe en el array y guardar el texto asociado
    if (array_key_exists($Avx_col2, $opcionesVarillas)) {
        $textovarillaX2 = $opcionesVarillas[$Avx_col2];
    }

    $usarX_col2 = " ø " . $textovarillaX2 . " @ " . $esp_sx_col2;


    // Direccion YY
    // COL 1

    $O_DIS_COL1 = 43.30;
    //lv
    $lv_salY_col1 = $lv_sal_col1;

    //mu
    $MUY_COLY1 = round(($O_DIS_COL1 * $m1 * pow(($b1_sal / 100), 2)) / 2 * 1000, 2);

    //p
    $RAIZY_COL = 1 - ((2 * $MUY_COLY1) / ($fi_general * $b1_sal / 100 * pow($d_col1, 2) * 0.85 * $fc));
    $PY_COL1 = ((0.85 * $fc) / $fy) * (1 - sqrt($RAIZY_COL));
    $PY_COL1 = round($PY_COL1, 4);

    //As
    $MAXY_P_COL1 = max($PY_COL1, $pmin_col1);
    $ASY_COL1 = $MAXY_P_COL1 * $b1_sal  * $hz * 100;

    //Av
    $Avy_col1 = $VarillaX_Col1;

    //#var
    $numY_var_col1 = round($ASY_COL1 / $Avy_col1, 1);

    //Esp.  S  
    $esp_sy_col1 = round(($lv_sal_col1 + $t1_col1 * 100) / $numY_var_col1, 1);


    $textovarillaY1 = "";

    // Verificar si el valor buscado existe en el array y guardar el texto asociado
    if (array_key_exists($Avy_col1, $opcionesVarillas)) {
        $textovarillaY1 = $opcionesVarillas[$Avy_col1];
    }

    $usarY_col1 = " ø " . $textovarillaY1 . " @ " . $esp_sy_col1;


    // COL 2
    $O_DIS_COL2 = 43.30;
    //lv
    $lv_salY_col2 = $lv_sal_col1;

    //mu
    $MUY_COLY2 = round(($O_DIS_COL2 * $m2 * pow(($b2_sal / 100), 2)) / 2 * 1000, 2);

    //p
    $RAIZY_COL2 = 1 - ((2 * $MUY_COLY2) / ($fi_general * $b2_sal / 100 * pow($d_col2, 2) * 0.85 * $fc));
    $PY_COL2 = ((0.85 * $fc) / $fy) * (1 - sqrt($RAIZY_COL2));
    $PY_COL2 = round($PY_COL2, 4);

    //As
    $MAXY_P_COL2 = max($PY_COL2, $pmin_col2);
    $ASY_COL2 = $MAXY_P_COL2 * $b2_sal  * $hz * 100;

    //Av
    $Avy_col2 = $VarillaX_Col2;

    //#var
    $numY_var_col2 = round($ASY_COL2 / $Avy_col2, 1);

    //Esp.  S  
    $esp_sy_col2 = round(($b2_sal) / $numY_var_col2, 1);


    $textovarillaY2 = "";

    // Verificar si el valor buscado existe en el array y guardar el texto asociado
    if (array_key_exists($Avy_col2, $opcionesVarillas)) {
        $textovarillaY2 = $opcionesVarillas[$Avy_col2];
    }

    $usarY_col2 = " ø " . $textovarillaY2 . " @ " . $esp_sy_col2;

    //CORTE Y PUNZONAMIENTO
    //COL 1
    //area zapata
    $Areaz_col1 = $L * $B * 10000;

    //Perimetro por punzonamiento
    $PerimetroP_col1 = ($t2_col1 * 100 + $dvc_col1) + 2 * ($t1_col1 * 100 + 0.5 * $dvc_col1);

    //Area por punzonamiento
    $AreaP_col1 = $PerimetroP_col1 * $dvc_col1;

    //Cortante Critico Por Punzonamiento
    
    $CortanteCP_col1 = 40405.26;

    //Factor de DIm de la columna
    $Maxt1_t2_col1 = max($t1_col1, $t2_col1);
    $Mint1_t2_col1 = min($t1_col1, $t2_col1);
    $FactorDim_col1 = $Maxt1_t2_col1 / $Mint1_t2_col1;

    // Tipo de Columna y Factor α
    $fa_Col1 = $fa_Col1;
    $Raiz =
        sqrt($fc);
    //caso1
    $Vc = round(0.53 * $ovcp * (1 + (2 / $FactorDim_col1)) * $Raiz * $PerimetroP_col1 * $dvc_col1, 2);

    //resultado
    if ($Vc > $CortanteCP_col1) {
        $ResultadoCol1VC = "Cumple";
    } else {
        $ResultadoCol1VC = "No Cumple";
    }

    //caso2
    $Vc1 = round(1.06 * $ovcp * sqrt($fc) * $PerimetroP_col1 * $dvc_col1, 2);

    //resultado
    if ($Vc1 > $CortanteCP_col1) {
        $ResultadoCol1VC1 = "Cumple";
    } else {
        $ResultadoCol1VC1 = "No Cumple";
    }

    //caso3
    $Vc2 = round(0.27 * $ovcp * (2 + (($fa_Col1 * $dvc_col1) / $PerimetroP_col1)) * $Raiz * $PerimetroP_col1 * $dvc_col1, 2);

    //resultado
    if ($Vc2 > $CortanteCP_col1) {
        $ResultadoCol1VC2 = "Cumple";
    } else {
        $ResultadoCol1VC2 = "No Cumple";
    }

    //COL 2
    //area zapata
    $Areaz_col2 = $L * $B * 10000;

    //Perimetro por punzonamiento
    $PerimetroP_col2 = 2 * ($t1_col2 * 100 + $dvc_col2) + 2 * ($t2_col2 * 100 + $dvc_col2);

    //Area por punzonamiento
    $AreaP_col2 = $PerimetroP_col2 * $dvc_col1;

    //Cortante Critico Por Punzonamiento
    $CortanteCP_col2 = 40405.26;

    //Factor de DIm de la columna
    $Maxt1_t2_col2 = max($t1_col2, $t2_col2);
    $Mint1_t2_col2 = min($t1_col2, $t2_col2);
    $FactorDim_col2 = $Maxt1_t2_col2 / $Mint1_t2_col2;

    // Tipo de Columna y Factor α
    $fa_Col2 = $fa_Col2;
    $Raiz = sqrt($fc);
    //caso1
    $Vc_c2 = round(0.53 * $ovcp * (1 + (2 / $FactorDim_col1)) * $Raiz * $PerimetroP_col1 * $dvc_col1, 2);

    //resultado
    if ($Vc_c2 > $CortanteCP_col2) {
        $ResultadoCol2VC = "Cumple";
    } else {
        $ResultadoCol2VC = "No Cumple";
    }

    //caso2
    $Vc1_c2 = round(1.06 * $ovcp * sqrt($fc) * $PerimetroP_col1 * $dvc_col1, 2);

    //resultado
    if ($Vc1_c2 > $CortanteCP_col2) {
        $ResultadoCol2VC1 = "Cumple";
    } else {
        $ResultadoCol2VC1 = "No Cumple";
    }

    //caso3
    $Vc2_c2 = round(0.27 * $ovcp * (2 + (($fa_Col2 * $dvc_col2) / $PerimetroP_col2)) * $Raiz * $PerimetroP_col1 * $dvc_col1, 2);

    //resultado
    if ($Vc2_c2 > $CortanteCP_col2) {
        $ResultadoCol2VC2 = "Cumple";
    } else {
        $ResultadoCol2VC2 = "No Cumple";
    }
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

    <div class="table-responsive">
        <table class="table">
            <thead style="font-size: 13px;background-color: #4e5c77; color:white">
                <tr>
                    <th colspan="2">1. REQUISITO DE DISEÑO</th>
                    <th scope="col">DATOS</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody style=" font-size: 11px;">
                <tr>
                    <td>Descripción</td>
                    <td>Des</td>
                    <td><?php echo $des ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>qa</td>
                    <td><?php echo $qa ?> Ton/m<sup>2</sup></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Presión de Servicio</td>
                    <td>P servicio</td>
                    <td><?php echo $p_servicio ?> Ton</td>
                    <td></td>
                </tr>

                <tr>
                    <td>Fluencia del acero</td>
                    <td>fy</td>
                    <td><?php echo $fy  ?> Kgf/cm<sup>2</sup></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Resistencia a compresión del concreto</td>
                    <td>fc</td>
                    <td><?php echo $fc  ?> Kgf/cm<sup>2</sup></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Profundidad de desplante</td>
                    <td>Df</td>
                    <td><?php echo $df  ?> m</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>S/C</td>
                    <td><?php echo $sc ?> Kg/m<sup>2</sup></td>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td>ym</td>
                    <td><?php echo $ym  ?> Kg/m<sup>3</sup></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>hc</td>
                    <td><?php echo $hc  ?> m</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>σt</td>
                    <td><?php echo $ot  ?> Kg/m<sup>2</sup></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>hz</td>
                    <td><?php echo $hz  ?> m</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>m1</td>
                    <td><?php echo $m1  ?> m</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>m2</td>
                    <td><?php echo $m2  ?> m</td>
                    <td></td>
                </tr>

                <tr>
                    <td></td>
                    <td>r</td>
                    <td><?php echo $r  ?> cm</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>rec</td>
                    <td><?php echo $rec  ?> cm</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Le</td>
                    <td><?php echo $Le  ?> m</td>
                    <td></td>
                </tr>
                <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <td colspan="4">Medidas de la columna 1</td>
                </tr>
                <tr>
                    <td></td>
                    <td>t1</td>
                    <td><?php echo $t1_col1 ?> m</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>t2</td>
                    <td><?php echo $t2_col1 ?> m</td>
                    <td></td>
                </tr>

                <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <td colspan="4">Medidas de la columna 2</td>
                </tr>
                <tr>
                    <td></td>
                    <td>t1</td>
                    <td><?php echo $t1_col2 ?> m</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>t2</td>
                    <td><?php echo $t2_col2 ?> m</td>
                    <td></td>
                </tr>
                <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <td colspan="4">COMBINCACIÓN DE CARGAS EN LA COLUMNA 1</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 30%;">P(tonf) </td>
                                <td style="border: none; width: 35%;">Mx (tonf-m)</td>
                                <td style="border: none; width: 35%;">My (tonf-m)</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Carga Muerta</td>
                    <td>CM</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 30%;"><?php echo $CM_P; ?> </td>
                                <td style="border: none; width: 35%;"><?php echo $CM_Mx; ?> </td>
                                <td style="border: none; width: 35%;"><?php echo $CM_My; ?> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Carga Viva</td>
                    <td>CV</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 30%;"><?php echo $CV_P; ?> </td>
                                <td style="border: none; width: 35%;"><?php echo $CV_Mx; ?> </td>
                                <td style="border: none; width: 35%;"><?php echo $CV_My; ?> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Carga Sismo Ex</td>
                    <td>CSx</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 30%;"><?php echo $CSx_P; ?> </td>
                                <td style="border: none; width: 35%;"><?php echo $CSx_Mx; ?> </td>
                                <td style="border: none; width: 35%;"><?php echo $CSx_My; ?> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Carga Sismo Ey</td>
                    <td>CSy</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 30%;"><?php echo $CSy_P; ?> </td>
                                <td style="border: none; width: 35%;"><?php echo $CSy_Mx; ?></td>
                                <td style="border: none; width: 35%;"><?php echo $CSy_My; ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <td colspan="4">COMBINCACIÓN DE CARGAS EN LA COLUMNA 2</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 30%;">P(tonf) </td>
                                <td style="border: none; width: 35%;">Mx (tonf-m)</td>
                                <td style="border: none; width: 35%;">My (tonf-m)</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Carga Muerta</td>
                    <td>CM</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 30%;"><?php echo $CM_P2; ?></td>
                                <td style="border: none; width: 35%;"><?php echo $CM_Mx2; ?> </td>
                                <td style="border: none; width: 35%;"><?php echo $CM_My2; ?> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Carga Viva</td>
                    <td>CV</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 30%;"><?php echo $CV_P2; ?> </td>
                                <td style="border: none; width: 35%;"><?php echo $CV_Mx2; ?> </td>
                                <td style="border: none; width: 35%;"><?php echo $CV_My2; ?> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Carga Sismo Ex</td>
                    <td>CSx</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 30%;"><?php echo $CSx_P2; ?> </td>
                                <td style="border: none; width: 35%;"><?php echo $CSx_Mx2; ?> </td>
                                <td style="border: none; width: 35%;"><?php echo $CSx_My2; ?> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Carga Sismo Ey</td>
                    <td>CSy</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 30%;"><?php echo $CSy_P2; ?> </td>
                                <td style="border: none; width: 35%;"><?php echo $CSy_Mx2; ?> </td>
                                <td style="border: none; width: 35%;"><?php echo $CSy_My2; ?> </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </tbody>


            <thead style="font-size: 13px; background-color: #4e5c77; color: white;">
                <tr>
                    <th colspan="2">2. PREDIMENSIONAMIENTO DE ZAPATAS</th>
                    <th scope="col">FORMULAS</th>
                    <th scope="col">RESULTADOS</th>
                </tr>
            </thead>
            <tbody style="font-size: 11px;">

                <tr>
                    <td>Area de la Zapata</td>
                    <td></td>
                    <td>p servicio / (qa * fk)</td>
                    <td><?php echo $Az  ?> m<sup>2</sup></td>
                </tr>
                <tr>
                    <td></td>
                    <td>B</td>
                    <td>t2 + m1 + t2</td>
                    <td id="valor_b"><?php echo $B ?> m</td>
                </tr>
                <tr>
                    <td></td>
                    <td>L</td>
                    <td>0.5 * t1(col1) + Le + 0.5 * t1(col2) + m2</td>
                    <td id="valor_L"><?php echo $L ?> m</td>
                </tr>
            </tbody>
            <thead style="font-size: 13px; background-color: #4e5c77; color: white;">
                <tr>
                    <th colspan="2">3. COMBINACIÓN DE CARGAS </th>
                    <th scope="col">FORMULAS</th>
                    <th scope="col">RESULTADOS</th>
                </tr>
            </thead>
            <tbody style="font-size: 11px;">

                <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <td colspan="4">3.1 COMBINACIONES DE CARGAS DE SERVICIO</td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 1
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 2
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>Combinaciones de cargas de servicio</td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 30%;">P (tonf)</td>
                                            <td style="border: none; width: 35%;">Mx (tonf-m)</td>
                                            <td style="border: none; width: 35%;">My (tonf-m)</td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 30%;">P (tonf)</td>
                                            <td style="border: none; width: 35%;">Mx (tonf-m)</td>
                                            <td style="border: none; width: 35%;">My (tonf-m)</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">CM + CV</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 30%;"><?php echo $CM_CV_P; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_MX; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_MY; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 30%;"><?php echo $CM_CV_P2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_MX2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_MY2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">CM + CV + 0.8 Sx</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 30%;"><?php echo $CM_CV_8SX_sumP; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SX_sumMX; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SX_sumMY; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 30%;"><?php echo $CM_CV_8SX_sumP2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SX_sumMX2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SX_sumMY2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">CM + CV - 0.8 Sx</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 30%;"><?php echo $CM_CV_8SX_restP; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SX_restMX; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SX_restMY; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 30%;"><?php echo $CM_CV_8SX_restP2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SX_restMX2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SX_restMY2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">CM + CV + 0.8 Sy</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 30%;"><?php echo $CM_CV_8SY_sumP; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SY_sumMX; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SY_sumMY; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 30%;"><?php echo $CM_CV_8SY_sumP2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SY_sumMX2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SY_sumMY2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">CM + CV - 0.8 Sy</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 30%;"><?php echo $CM_CV_8SY_restP; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SY_restMX; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SY_restMY; ?></td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 30%;"><?php echo $CM_CV_8SY_restP2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SY_restMX2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CM_CV_8SY_restMY2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <td colspan="4">3.2 COMBINACIONES DE CARGA ÚLTIMAS</td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 1
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 2
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>Combinaciones de cargas de servicio</td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 30%;">P (tonf)</td>
                                            <td style="border: none; width: 35%;">Mx (tonf-m)</td>
                                            <td style="border: none; width: 35%;">My (tonf-m)</td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 30%;">P (tonf)</td>
                                            <td style="border: none; width: 35%;">Mx (tonf-m)</td>
                                            <td style="border: none; width: 35%;">My (tonf-m)</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">1.4*CM + 1.7*CV</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila1_col1">
                                            <td style="border: none; width: 30%;" id="cel1"><?php echo $CCU1_P; ?> </td>
                                            <td style="border: none; width: 35%;" id="cel2"><?php echo $CCC1_MX; ?> </td>
                                            <td style="border: none; width: 35%;" id="cel3"><?php echo $CCC1_MY; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila1_col2">
                                            <td style="border: none; width: 30%;"><?php echo $CCU1_P2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC1_MX2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC1_MY2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">1.25(CM+CV) + Sx</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila2_col1">
                                            <td style="border: none; width: 30%;"><?php echo $CCC2_P; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC2_MX; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC2_MY; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila2_col2">
                                            <td style="border: none; width: 30%;"><?php echo $CCC2_P2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC2_MX2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC2_MY2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">1.25(CM+CV) - Sx</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila3_col1">
                                            <td style="border: none; width: 30%;"><?php echo $CCC3_P; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC3_MX; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC3_MY; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila3_col2">
                                            <td style="border: none; width: 30%;"><?php echo $CCC3_P2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC3_MX2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC3_MY2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">1.25(CM+CV) + Sy</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila4_col1">
                                            <td style="border: none; width: 30%;"><?php echo $CCC4_P; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC4_MX; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC4_MY; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila4_col2">
                                            <td style="border: none; width: 30%;"><?php echo $CCC4_P2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC4_MX2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC4_MY2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">1.25(CM+CV) - Sy</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila5_col1">
                                            <td style="border: none; width: 30%;"><?php echo $CCC5_P; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC5_MX; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC5_MY; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila5_col2">
                                            <td style="border: none; width: 30%;"><?php echo $CCC5_P2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC5_MX2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC5_MY2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">0.9CM + Sx</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila6_col1">
                                            <td style="border: none; width: 30%;"><?php echo $CCC6_P; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC6_MX; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC6_MY; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila6_col2">
                                            <td style="border: none; width: 30%;"><?php echo $CCC6_P2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC6_MX2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC6_MY2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">0.9CM - Sx</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila7_col1">
                                            <td style="border: none; width: 30%;"><?php echo $CCC7_P; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC7_MX; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC7_MY; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila7_col2">
                                            <td style="border: none; width: 30%;"><?php echo $CCC7_P2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC7_MX2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC7_MY2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">0.9CM + Sy</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila8_col1">
                                            <td style="border: none; width: 30%;"><?php echo $CCC8_P; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC8_MX; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC8_MY; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila2_col2">
                                            <td style="border: none; width: 30%;"><?php echo $CCC8_P2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC8_MX2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC8_MY2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">0.9CM - Sy</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila9_col1">
                                            <td style="border: none; width: 30%;"><?php echo $CCC9_P; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC9_MX; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC9_MY; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr id="fila9_col2">
                                            <td style="border: none; width: 30%;"><?php echo $CCC9_P2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC9_MX2; ?> </td>
                                            <td style="border: none; width: 35%;"><?php echo $CCC9_MY2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <td colspan="4">3.3 PRESIONES EN EL SUELO EN CONDICIONES DE SERVICIO</td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 1
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 2
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 16.5%;">σ<sub>p</sub> (tonf/m<sup>2</sup> ) </td>
                                            <td style="border: none; width: 16.5%;">σ<sub>Mx </sub>(tonf/m<sup>2</sup> )</td>
                                            <td style="border: none; width: 16.5%;">σ<sub>My</sub>(tonf/m<sup>2</sup> )</td>
                                            <td style="border: none; width: 16.5%;">σ<sub>tot</sub>(tonf/m<sup>2</sup> )</td>
                                            <td style="border: none; width: 16.5%;">σ<sub>s</sub>(tonf/m<sup>2</sup> )</td>
                                            <td style="border: none; width: 17.5%;">Condición</td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 16.5%;">σ<sub>p</sub> (tonf/m<sup>2</sup> ) </td>
                                            <td style="border: none; width: 16.5%;">σ<sub>Mx </sub>(tonf/m<sup>2</sup> )</td>
                                            <td style="border: none; width: 16.5%;">σ<sub>My</sub>(tonf/m<sup>2</sup> )</td>
                                            <td style="border: none; width: 16.5%;">σ<sub>tot</sub>(tonf/m<sup>2</sup> )</td>
                                            <td style="border: none; width: 16.5%;">σ<sub>s</sub>(tonf/m<sup>2</sup> )</td>
                                            <td style="border: none; width: 17.5%;">Condición</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS1_OP; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS1_OMX; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS1_OMY; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS1_OTOT; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS1_OS; ?></td>
                                            <td style="border: none; width: 17.5%;"><?php echo $PSCS1_COND; ?></td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS1_OP2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS1_OMX2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS1_OMY2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS1_OTOT2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS1_OS2; ?></td>
                                            <td style="border: none; width: 17.5%;"><?php echo $PSCS1_COND2; ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS2_OP; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS2_OMX; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS2_OMY; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS2_OTOT; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS2_OS; ?></td>
                                            <td style="border: none; width: 17.5%;"><?php echo $PSCS2_COND; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS2_OP2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS2_OMX2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS2_OMY2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS2_OTOT; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS2_OS; ?></td>
                                            <td style="border: none; width: 17.5%;"><?php echo $PSCS2_COND; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS3_OP; ?></td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS3_OMX; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS3_OMY; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS3_OTOT; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS3_OS; ?></td>
                                            <td style="border: none; width: 17.5%;"><?php echo $PSCS3_COND; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS3_OP2; ?></td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS3_OMX2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS3_OMY2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS3_OTOT2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS3_OS2; ?></td>
                                            <td style="border: none; width: 17.5%;"><?php echo $PSCS3_COND2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS4_OP; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS4_OMX; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS4_OMY; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS4_OTOT; ?></td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS4_OS; ?> </td>
                                            <td style="border: none; width: 17.5%;"><?php echo $PSCS4_COND; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS4_OP2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS4_OMX2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS4_OMY2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS4_OTOT2; ?></td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS4_OS2; ?> </td>
                                            <td style="border: none; width: 17.5%;"><?php echo $PSCS4_COND2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS5_OP; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS5_OMX; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS5_OMY; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS5_OTOT; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS5_OS; ?> </td>
                                            <td style="border: none; width: 17.5%;"><?php echo $PSCS5_COND; ?></td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS5_OP2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS5_OMX2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS5_OMY2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS5_OTOT2; ?> </td>
                                            <td style="border: none; width: 16.5%;"><?php echo $PSCS5_OS2; ?> </td>
                                            <td style="border: none; width: 17.5%;"><?php echo $PSCS5_COND2; ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <td colspan="4">3.4 PRESIONES ÚLTIMOS DE DISEÑO</td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;">Descripción</td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 1
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 2
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;">Combinaciones de cargas de servicio</td>
                    <td></td>
                    <td style="vertical-align: middle;"></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;">σ<sub>p</sub> (tonf/m<sup>2</sup> )</td>
                                            <td style="border: none; width: 25%;">σ<sub>Mx</sub> (tonf/m<sup>2</sup> )</td>
                                            <td style="border: none; width: 25%;">σ<sub>My</sub> (tonf/m<sup>2</sup> )</td>
                                            <td style="border: none; width: 25%;">σ<sub>tot </sub> (tonf/m<sup>2</sup> )</td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;">σ<sub>p</sub> (tonf/m<sup>2</sup> )</td>
                                            <td style="border: none; width: 25%;">σ<sub>Mx</sub> (tonf/m<sup>2</sup> )</td>
                                            <td style="border: none; width: 25%;">σ<sub>My</sub> (tonf/m<sup>2</sup> )</td>
                                            <td style="border: none; width: 25%;">σ<sub>tot </sub> (tonf/m<sup>2</sup> )</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">1.4CM + 1.7CV</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD1_OP; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD1_OMX; ?> </sub></td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD1_OMY; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD1_OTOT; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD1_OP2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD1_OMX2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD1_OMY2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD1_OTOT2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">1.25(CM+CV) + Sx</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD2_OP; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD2_OMX; ?> </sub></td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD2_OMY; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD2_OTOT; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD2_OP2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD2_OMX2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD2_OMY2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD2_OTOT2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">1.25(CM+CV) - Sx</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD3_OP; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD3_OMX; ?> </sub></td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD3_OMY; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD3_OTOT; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD3_OP2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD3_OMX2; ?> </sub></td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD3_OMY2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD3_OTOT2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">1.25(CM+CV) + Sy</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD4_OP; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD4_OMX; ?> </sub></td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD4_OMY; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD4_OTOT; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD4_OP2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD4_OMX2; ?> </sub></td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD4_OMY2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD4_OTOT2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">1.25(CM+CV) - Sy</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD5_OP; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD5_OMX; ?> </sub></td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD5_OMY; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD5_OTOT; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD5_OP2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD5_OMX2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD5_OMY2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD5_OTOT2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">0.9CM + Sx</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD6_OP; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD6_OMX; ?> </sub></td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD6_OMY; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD6_OTOT; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD6_OP2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD6_OMX2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD6_OMY2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD6_OTOT2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">0.9CM - Sx</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD7_OP; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD7_OMX; ?> </sub></td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD7_OMY; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD7_OTOT; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD7_OP2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD7_OMX2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD7_OMY2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD7_OTOT2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">0.9CM + Sy</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD8_OP; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD8_OMX; ?> </sub></td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD8_OMY; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD8_OTOT; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD8_OP2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD8_OMX2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD8_OMY2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD8_OTOT2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">0.9CM - Sy</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD9_OP; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD9_OMX; ?> </sub></td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD9_OMY; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD9_OTOT; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;"><?php echo $PUD9_OP2; ?>
                                            </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD9_OMX2; ?>
                                            </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD9_OMY2; ?> </td>
                                            <td style="border: none; width: 25%;"><?php echo $PUD9_OTOT2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: middle;">σ<sub>ult</sub></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $OT_ULT; ?> tonf/m<sup>2</sup>
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $OT_ULT2; ?> tonf/m<sup>2</sup>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <td colspan="4">3.5 CALCULO DE LAS FUERZAS ULTIMAS EN LA BASE DE LA ZAPATA</td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;">Descripción</td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 1
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 2
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: middle;"></td>
                    <td>Qu(1.4D+1.7)</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $CFUBZ1; ?> ton-m
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $CFUBZ1_2; ?> ton-m
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;"></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 50%;">MAX</td>
                                            <td style="border: none; width: 50%;">MIN</td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 50%;">MAX</td>
                                            <td style="border: none; width: 50%;">MIN</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">Qu(1.25*(D+L)+EQX)</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 50%;"><?php echo $CFUBZ2_MAX; ?> ton-m</td>
                                            <td style="border: none; width: 50%;"><?php echo $CFUBZ2_MIN; ?> ton-m</td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 50%;"><?php echo $CFUBZ2_MAX_2; ?> ton-m</td>
                                            <td style="border: none; width: 50%;"><?php echo $CFUBZ2_MIN_2; ?> ton-m</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">Qu(1.25*(D+L)+EQY)</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 50%;"><?php echo $CFUBZ3_MAX; ?> ton-m</td>
                                            <td style="border: none; width: 50%;"><?php echo $CFUBZ3_MIN; ?> ton-m</td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 50%;"><?php echo $CFUBZ3_MAX_2; ?> ton-m</td>
                                            <td style="border: none; width: 50%;"><?php echo $CFUBZ3_MIN_2; ?> ton-m</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <td colspan="4">3.6 VERIFICACIÓN DE EXCENTRICIDADES</td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;">Descripción</td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 1
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 2
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;"></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;">Fuerza axial</td>
                                            <td style="border: none; width: 25%;">Momento en X</td>
                                            <td style="border: none; width: 25%;">Momento en Y</td>
                                            <td style="border: none; width: 25%;">Resultante</td>

                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%;">Fuerza axial</td>
                                            <td style="border: none; width: 25%;">Momento en X</td>
                                            <td style="border: none; width: 25%;">Momento en Y</td>
                                            <td style="border: none; width: 25%;">Resultante</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">CM+CV</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_FA1; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_FA2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_MX1; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_MX2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_MY1; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_MY2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_R1; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_R2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F1; ?> </td>

                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_FA1_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_FA2_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_MX1_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_MX2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_MY1_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_MY2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_R1_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_R2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F1_2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_FA3; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_FA4; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_MX3; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_MX4; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_MY3; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_MY4; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_R3; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_R4; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F2; ?> </td>

                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_FA3_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_FA4_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_MX3_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE1_MX4_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_MY3_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_MY4_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_R3_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE1_R2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F2_2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">CM+CV+0.8Sx</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_FA1; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_FA2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_MX1; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_MX2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_MY1; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_MY2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_R1; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_R2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F3; ?> </td>

                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_FA1_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_FA2_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_MX1_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_MX2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_MY1_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_MY2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_R1_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_R2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F3_2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_FA3; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_FA4; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_MX3; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_MX4; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_MY3; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_MY4; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_R3; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_R4; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F4; ?> </td>

                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_FA3_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_FA4_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_MX3_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE2_MX4_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_MY3_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_MY4_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_R3_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE2_R2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F4_2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">CM + CV - 0.8Sx</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_FA1; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_FA2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_MX1; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_MX2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_MY1; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_MY2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_R1; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_R2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F5; ?> </td>

                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_FA1_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_FA2_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_MX1_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_MX2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_MY1_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_MY2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_R1_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_R2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F5_2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_FA3; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_FA4; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_MX3; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_MX4; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_MY3; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_MY4; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_R3; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_R4; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F6; ?> </td>

                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_FA3_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_FA4_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_MX3_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE3_MX4_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_MY3_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_MY4_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_R3_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE3_R2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F6_2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">CM + CV + 0.8Sy</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_FA1; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_FA2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_MX1; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_MX2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_MY1; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_MY2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_R1; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_R2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F7; ?> </td>

                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_FA1_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_FA2_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_MX1_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_MX2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_MY1_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_MY2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_R1_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_R2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F7_2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_FA3; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_FA4; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_MX3; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_MX4; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_MY3; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_MY4; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_R3; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_R4; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F8; ?> </td>

                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_FA3_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_FA4_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_MX3_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_MX4_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_MY3_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_MY4_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_R3_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE4_R2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F8_2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;">CM + CV - 0.8Sy</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE5_FA1; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE5_FA2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE5_MX1; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE5_MX2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_MY1; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_MY2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_R1; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_R2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F9; ?> </td>

                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE5_FA1_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE5_FA2_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE5_MX1_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE5_MX2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_MY1_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_MY2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_R1_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_R2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F9_2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE5_FA3; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE5_FA4; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE5_MX3; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE4_MX4; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_MY3; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_MY4; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_R3; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_R4; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F10; ?> </td>

                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE5_FA3_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE5_FA4_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE5_MX3_2; ?> </td>
                                            <td style="border: none; width: 12.5%;"><?php echo $VE5_MX4_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_MY3_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_MY4_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_R3_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE5_R2_2; ?> </td>
                                            <td style="border: none; width: 10%;"><?php echo $VE_TEXT_F10_2; ?> </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>


                <thead style="font-size: 13px; background-color: #4e5c77; color: white;">
                    <tr>
                        <th colspan="2">4. DISEÑO POR FLEXIÓN DE ZAPATAS</th>
                        <th scope="col">FORMULAS</th>
                        <th scope="col">RESULTADOS</th>
                    </tr>
                </thead>
            <tbody style="font-size: 11px;">


                <tr>
                    <td style="vertical-align: middle;">Descripción</td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 1
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 2
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: middle;">lv</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $lv_sal_col1; ?> cm
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $lv_sal_col2; ?> cm
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: middle;">b</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $b1_sal; ?> cm
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $b2_sal; ?> cm
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <td colspan="4">4.1 Dirección X-X</td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;">Descripción</td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 1
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 2
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: middle;">Mu</td>
                    <td>(𝜎<sub>u</sub>* 𝐿𝑣^2 * 𝑇)/2</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $MU_COL1; ?> Kg-m
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $MU_COL2; ?> Kg-m
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: middle;">𝜌</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $P_COL1; ?>
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $P_COL2; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: middle;">As</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $AS_COL1; ?> cm<sup>2</sup>
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $AS_COL2; ?> cm<sup>2</sup>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: middle;"> Av</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $Avx_col1; ?> cm<sup>2</sup>
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $Avx_col2; ?> cm<sup>2</sup>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;">Numero de varillas</td>
                    <td style="vertical-align: middle;">#var</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $num_var_col1; ?> cm<sup>2</sup>
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $num_var_col2; ?> cm<sup>2</sup>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: middle;">Esp. S</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $esp_sx_col1; ?> cm
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $esp_sx_col2; ?> cm
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;">Usar</td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $usarX_col1; ?> cm
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $usarX_col2; ?> cm
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <td colspan="4">4.2 Dirección Y-Y</td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 1
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 2
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td style="vertical-align: middle;">Mu</td>
                    <td style="vertical-align: middle;">(𝜎<sub>u</sub>* 𝐿𝑣^2 * 𝑇)/2</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $MUY_COLY1; ?> Kg-m
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $MUY_COLY2; ?> Kg-m
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: middle;">𝜌</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $PY_COL1; ?>
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $PY_COL2; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: middle;">As</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $ASY_COL1; ?> cm<sup>2</sup>
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $ASY_COL2; ?> cm<sup>2</sup>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: middle;">Av</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $Avy_col1; ?> cm<sup>2</sup>
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $Avy_col2; ?> cm<sup>2</sup>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;">Numero de varillas</td>
                    <td style="vertical-align: middle;">#var</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $numY_var_col1; ?> cm<sup>2</sup>
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $numY_var_col2; ?> cm<sup>2</sup>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: middle;">Esp. S</td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $esp_sy_col1; ?> cm
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $esp_sy_col2; ?> cm
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;">Usar</td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $usarY_col1; ?> cm
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $usarY_col2; ?> cm
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
            <thead style="font-size: 13px; background-color: #4e5c77; color: white;">
                <tr>
                    <th colspan="2">5. CORTE Y PUNZONAMIENTO</th>
                    <th scope="col">FORMULAS</th>
                    <th scope="col">RESULTADOS</th>
                </tr>
            </thead>
            <tbody style="font-size: 11px;">
                <!-- <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                    <td colspan="4">4.1 Dirección X-X</td>
                </tr> -->
                <tr>
                    <td style="vertical-align: middle;">Descripción</td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 1
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 2
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;">Area de la Zapata</td>
                    <td>Az</td>
                    <td>LxB</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $Areaz_col1; ?> cm
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $Areaz_col2; ?> cm
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;">Perimetro Por Punzonamiento</td>
                    <td>𝑏𝑜</td>
                    <td>2∙(𝑡1+0.5𝑑)+2∙(𝑡2+𝑑)</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $PerimetroP_col1; ?> cm
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $PerimetroP_col2 ?> cm
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;">Area Por Punzonamiento</td>
                    <td>𝐴𝑝𝑢𝑛</td>
                    <td>𝑏𝑜(𝑑)
                    </td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $AreaP_col1; ?> cm
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $AreaP_col2; ?> cm
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;">Cortante Critico Por Punzonamiento</td>
                    <td>V𝑢</td>
                    <td>𝑃𝑢1−𝑊𝑢(𝑡2+𝑑)(𝑡1+0.5𝑑)
                    </td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $CortanteCP_col1; ?> cm
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $CortanteCP_col2; ?> cm
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;">Factor de Dim de la Columna</td>
                    <td>𝛽𝑐=</td>
                    <td>𝑡1/𝑡2
                    </td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $FactorDim_col1; ?>
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $FactorDim_col2; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;">Tipo de Columna y Factor α</td>
                    <td>α </td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $fa_Col1; ?> cm
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    <?php echo $fa_Col2; ?> cm
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;"></td>
                    <td></td>
                    <td></td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 1
                                </td>
                                <td style="border: none; width: 50%; text-align: center;">
                                    Columna 2
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;"></td>
                    <td>∅𝑉𝑐</td>
                    <td>0,53∙∅∙(1+2/𝛽𝑐)∙√(𝑓^′ 𝑐)∙𝑏_𝑜∙𝑑
                    </td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Vu (Kgf)
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                < </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Ø.Vc (Kgf)
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Resultado
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $CortanteCP_col1; ?>
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $Vc; ?>
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $ResultadoCol1VC; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Vu (Kgf)
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                < </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Ø.Vc (Kgf)
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Resultado
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $CortanteCP_col2; ?>
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $Vc_c2; ?>
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $ResultadoCol2VC; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;"></td>
                    <td>∅𝑉𝑐</td>
                    <td>1.06∙∅∙√(𝑓^′ 𝑐)∙𝑏_𝑜∙𝑑</td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Vu (Kgf)
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                < </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Ø.Vc (Kgf)
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Resultado
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $CortanteCP_col1; ?>
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $Vc1; ?>
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $ResultadoCol2VC1; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Vu (Kgf)
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                < </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Ø.Vc (Kgf)
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Resultado
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $CortanteCP_col2; ?>
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $Vc1_c2; ?>
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $ResultadoCol2VC1; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle;"></td>
                    <td>∅𝑉𝑐</td>
                    <td>0,27∙∅∙(2+(𝛼.𝑑)/𝛽𝑜)∙√(𝑓^′ 𝑐) 〖∙𝑏〗_𝑜∙𝑑
                    </td>
                    <td>
                        <table style="border: none; font-size: 11px; width: 100%;">
                            <tr>
                                <td>
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Vu (Kgf)
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                < </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Ø.Vc (Kgf)
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Resultado
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $CortanteCP_col1; ?>
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $Vc2; ?>
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $ResultadoCol1VC2; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: none; width: 50%;">
                                    <table style="border: none; font-size: 11px; width: 100%;">
                                        <tr>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Vu (Kgf)
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                < </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Ø.Vc (Kgf)
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                Resultado
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $CortanteCP_col2; ?>
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $Vc2_c2; ?>
                                            </td>
                                            <td style="border: none; width: 25%; text-align: center;">
                                                <?php echo $ResultadoCol2VC2; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>

                </tr>


            </tbody>
        </table>
        <br><br>
    </div>
</body>

</html>