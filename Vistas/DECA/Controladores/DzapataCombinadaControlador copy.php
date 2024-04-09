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

    //Cargas x
    $dataCargaX = $_POST["dataCargaX"];

    // Decodificar los datos JSON en un array de PHP
    $datax = json_decode($dataCargaX, true);

    //Datos de la columna 1
    $Col1_cm_pzX = $datax[0][1];
    $Col1_cm_mxX = $datax[0][2];
    $Col1_cv_pzX = $datax[0][3];
    $Col1_cv_mxX = $datax[0][4];
    $Col1_cs_pzX = $datax[0][5];
    $Col1_cs_mxX = $datax[0][6];

    //Datos de la columna 2
    $Col2_cm_pzX = $datax[1][1];
    $Col2_cm_mxX = $datax[1][2];
    $Col2_cv_pzX = $datax[1][3];
    $Col2_cv_mxX = $datax[1][4];
    $Col2_cs_pzX = $datax[1][5];
    $Col2_cs_mxX = $datax[1][6];


    //Cargas Y
    $dataCargaY = $_POST["dataCargaY"];

    // Decodificar los datos JSON en un array de PHP
    $datay = json_decode($dataCargaY, true);

    //Datos de la columna 1
    $Col1_cm_pzY = $datay[0][1];
    $Col1_cm_myY = $datay[0][2];
    $Col1_cv_pzY = $datay[0][3];
    $Col1_cv_myY = $datay[0][4];
    $Col1_cs_pzY = $datay[0][5];
    $Col1_cs_myY = $datay[0][6];

    //Datos de la columna 2
    $Col2_cm_pzY = $datay[1][1];
    $Col2_cm_myY = $datay[1][2];
    $Col2_cv_pzY = $datay[1][3];
    $Col2_cv_myY = $datay[1][4];
    $Col2_cs_pzY = $datay[1][5];
    $Col2_cs_myY = $datay[1][6];


    // print_r($datax);
    // print_r("----");
    // print_r($datay);
    //Calculos

    $Az = round(($p_servicio) / ($qa * $fk), 2);
    $B =  $t2_col1 + $m1 + $m1;
    $L = 0.5 * $t1_col1 + $Le + 0.5 * $t1_col2 + $m2;

    //PRECIONES
    //Cargas en condiciones de servicio

    //Cargas muertas
    $CM_P = round($Col1_cm_pzX + $Col2_cm_pzX, 2);
    $CM_Mx = round($Col1_cm_mxX + $Col2_cm_mxX, 2);
    $CM_My = round($Col1_cm_myY + $Col2_cm_myY, 2);

    //Cargas vivas
    $CV_P = round($Col1_cv_pzX + $Col2_cv_pzX, 2);
    $CV_Mx = round($Col1_cv_mxX + $Col2_cv_mxX, 2);
    $CV_My = round($Col1_cv_myY + $Col2_cv_myY, 2);

    //Cargas sismo x
    $CSx_P = round($Col1_cs_pzX + $Col2_cs_pzX, 2);
    $CSx_Mx = round($Col1_cs_mxX + $Col2_cs_mxX, 2);
    $CSx_My = 0;

    //Cargas sismo y
    $CSy_P = round($Col1_cs_pzY + $Col2_cs_pzY, 2);
    $CSy_Mx = 0;
    $CSy_My = round($Col1_cs_myY + $Col2_cs_myY, 2);

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

    $B = 1.80;
    $L = 27.28;
    $ot = 6;
    $Az = 49.10;

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
        $VE_TEXT_F1 = "no cumple";
    }

    if ($VE1_R3 >= 0 && $VE1_R4 >= 0) {
        $VE_TEXT_F2 = "cumple";
    } else {
        $VE_TEXT_F2 = "no cumple";
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
        $VE_TEXT_F9 = "cumple";
    } else {
        $VE_TEXT_F9 = "no cumple";
    }

    if (
        $VE5_R3 >= 0 && $VE5_R4 >= 0
    ) {
        $VE_TEXT_F10 = "cumple";
    } else {
        $VE_TEXT_F10 = "no cumple";
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
    <div class="container">
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
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Columna 1</td>
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
                        <td colspan="4">Columna 2</td>
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
                        <td colspan="4">Combinaciones de cargas en el sentido X-X</td>
                    </tr>
                    <tr>
                        <td>Descripción</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; text-align: center;" colspan="2">Cargas muertas "D"</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 50%;">Pz</td>
                                    <td style="border: none; width: 50%;">Mx</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Columna 1</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;"><?php echo $Col1_cm_pzX; ?> Ton</td>
                                    <td style="border: none; width: 50%;"><?php echo $Col1_cm_mxX; ?> T-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Columna 2</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;"><?php echo $Col2_cm_pzX; ?> Ton</td>
                                    <td style="border: none; width: 50%;"><?php echo $Col2_cm_mxX; ?> T-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Descripción</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; text-align: center;" colspan="2">Cargas Vivas "L"</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 50%;">Pz</td>
                                    <td style="border: none; width: 50%;">Mx</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Columna 1</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;"><?php echo $Col1_cv_pzX; ?> Ton</td>
                                    <td style="border: none; width: 50%;"><?php echo $Col1_cv_mxX; ?> T-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Columna 2</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;"><?php echo $Col2_cv_pzX; ?> Ton</td>
                                    <td style="border: none; width: 50%;"><?php echo $Col2_cv_mxX; ?> T-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>Descripción</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; text-align: center;" colspan="2">Cargas por Sismo "Ex"</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 50%;">Pz</td>
                                    <td style="border: none; width: 50%;">Mx</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Columna 1</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;"><?php echo $Col1_cs_pzX; ?> Ton</td>
                                    <td style="border: none; width: 50%;"><?php echo $Col1_cs_mxX; ?> T-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Columna 2</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;"><?php echo $Col2_cs_pzX; ?> Ton</td>
                                    <td style="border: none; width: 50%;"><?php echo $Col2_cs_mxX; ?> T-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Combinaciones de cargas en el sentido Y-Y</td>
                    </tr>
                    <tr>
                        <td>Descripción</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; text-align: center;" colspan="2">Cargas muertas "D"</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 50%;">Pz</td>
                                    <td style="border: none; width: 50%;">Mx</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Columna 1</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;"><?php echo $Col1_cm_pzY; ?> Ton</td>
                                    <td style="border: none; width: 50%;"><?php echo $Col1_cm_myY; ?> T-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Columna 2</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;"><?php echo $Col2_cm_pzY; ?> Ton</td>
                                    <td style="border: none; width: 50%;"><?php echo $Col2_cm_myY; ?> T-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Descripción</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; text-align: center;" colspan="2">Cargas Vivas "L"</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 50%;">Pz</td>
                                    <td style="border: none; width: 50%;">Mx</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Columna 1</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;"><?php echo $Col1_cv_pzY; ?> Ton</td>
                                    <td style="border: none; width: 50%;"><?php echo $Col1_cv_myY; ?> T-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Columna 2</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;"><?php echo $Col2_cv_pzY; ?> Ton</td>
                                    <td style="border: none; width: 50%;"><?php echo $Col2_cv_myY; ?> T-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>Descripción</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; text-align: center;" colspan="2">Cargas por Sismo "Ex"</td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 50%;">Pz</td>
                                    <td style="border: none; width: 50%;">Mx</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Columna 1</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;"><?php echo $Col1_cs_pzY; ?> Ton</td>
                                    <td style="border: none; width: 50%;"><?php echo $Col1_cs_myY; ?> T-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Columna 2</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;"><?php echo $Col2_cs_pzY; ?> Ton</td>
                                    <td style="border: none; width: 50%;"><?php echo $Col2_cs_myY; ?> T-m</td>
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
                        <td>t2 + m1 + fc</td>
                        <td><?php echo $B ?> m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>L</td>
                        <td>0.5 * t1(col1) + Le + 0.5 * t1(col2) + m2</td>
                        <td> <?php echo $L ?> m</td>
                    </tr>
                </tbody>
                <thead style="font-size: 13px; background-color: #4e5c77; color: white;">
                    <tr>
                        <th colspan="2">3. COMBINACIÓN DE CARGAS</th>
                        <th scope="col">FORMULAS</th>
                        <th scope="col">RESULTADOS</th>
                    </tr>
                </thead>
                <tbody style="font-size: 11px;">
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.1 CARGAS EN CONDICIONES DE SERVICIO</td>
                    </tr>
                    <tr>
                        <td>Cargas en condiciones de servicio</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;">P</td>
                                    <td style="border: none; width: 35%;">Mx</td>
                                    <td style="border: none; width: 35%;">My</td>
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
                                    <td style="border: none; width: 30%;"><?php echo $CM_P; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CM_Mx; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CM_My; ?> tonf-m</td>
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
                                    <td style="border: none; width: 30%;"><?php echo $CV_P; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CV_Mx; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CV_My; ?> tonf-m</td>
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
                                    <td style="border: none; width: 30%;"><?php echo $CSx_P; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CSx_Mx; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CSx_My; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Carga Sismo Ey</td>
                        <td>CV</td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $CSy_P; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CSy_Mx; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CSy_My; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.2 COMBINACIONES DE CARGAS DE SERVICIO</td>
                    </tr>
                    <tr>
                        <td>Combinaciones de cargas de servicio</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;">P</td>
                                    <td style="border: none; width: 35%;">Mx</td>
                                    <td style="border: none; width: 35%;">My</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM + CV</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $CM_CV_P; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CM_CV_MX; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CM_CV_MY; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM + CV + 0.8 Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $CM_CV_8SX_sumP; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CM_CV_8SX_sumMX; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CM_CV_8SX_sumMY; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM + CV - 0.8 Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $CM_CV_8SX_restP; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CM_CV_8SX_restMX; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CM_CV_8SX_restMY; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM + CV + 0.8 Sy</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $CM_CV_8SY_sumP; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CM_CV_8SY_sumMX; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CM_CV_8SY_sumMY; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM + CV - 0.8 Sy</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $CM_CV_8SY_restP; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CM_CV_8SY_restMX; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CM_CV_8SY_restMY; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.3 COMBINACIONES DE CARGA ÚLTIMAS</td>
                    </tr>
                    <tr>
                        <td>Combinaciones de cargas de últimas</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;">P</td>
                                    <td style="border: none; width: 35%;">Mx</td>
                                    <td style="border: none; width: 35%;">My</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>1.4*CM + 1.7*CV</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $CCU1_P; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC1_MX; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC1_MY; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>1.25(CM+CV) + Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $CCC2_P; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC2_MX; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC2_MY; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>1.25(CM+CV)-Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $CCC3_P; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC3_MX; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC3_MY; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>1.25(CM+CV) + Sy</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $CCC4_P; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC4_MX; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC4_MY; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>1.25(CM+CV) - Sy</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $CCC5_P; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC5_MX; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC5_MY; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>0.9CM + Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $CCC6_P; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC6_MX; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC6_MY; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>0.9CM - Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $CCC7_P; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC7_MX; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC7_MY; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>0.9CM + Sy</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $CCC8_P; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC8_MX; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC8_MY; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>0.9CM - Sy</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $CCC9_P; ?> tonf</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC9_MX; ?> tonf-m</td>
                                    <td style="border: none; width: 35%;"><?php echo $CCC9_MY; ?> tonf-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.4 PRESIONES EN EL SUELO EN CONDICIONES DE SERVICIO</td>
                    </tr>
                    <tr>
                        <td>Combinaciones de cargas de servicio</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;">σ<sub>p</sub> </td>
                                    <td style="border: none; width: 35%;">σ<sub>Mx</sub></td>
                                    <td style="border: none; width: 35%;">σ<sub>My</sub></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM + CV</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $PSCS1_OP; ?> tonf/m<sup>2</sup> </td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS1_OMX; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS1_OMY; ?> tonf/m<sup>2</sup></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM+CV+0.8Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $PSCS2_OP; ?> tonf/m<sup>2</sup> </td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS2_OMX; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS2_OMY; ?> tonf/m<sup>2</sup></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM + CV - 0.8Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $PSCS3_OP; ?> tonf/m<sup>2</sup> </td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS3_OMX; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS3_OMY; ?> tonf/m<sup>2</sup></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM + CV + 0.8Sy</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $PSCS4_OP; ?> tonf/m<sup>2</sup> </td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS4_OMX; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS4_OMY; ?> tonf/m<sup>2</sup></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM + CV - 0.8Sy</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $PSCS5_OP; ?> tonf/m<sup>2</sup> </td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS5_OMX; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS5_OMY; ?> tonf/m<sup>2</sup></td>
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
                                    <td style="border: none; width: 30%;">σ<sub>tot</sub> </td>
                                    <td style="border: none; width: 35%;">σ<sub>s</sub></td>
                                    <td style="border: none; width: 35%;">Condición</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM + CV</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $PSCS1_OTOT; ?> tonf/m<sup>2</sup> </td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS1_OS; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS1_COND; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM+CV+0.8Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $PSCS2_OTOT; ?> tonf/m<sup>2</sup> </td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS2_OS; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS2_COND; ?> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM + CV - 0.8Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $PSCS3_OTOT; ?> tonf/m<sup>2</sup> </td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS3_OS; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS3_COND; ?> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM + CV + 0.8Sy</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $PSCS4_OTOT; ?> tonf/m<sup>2</sup> </td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS4_OS; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS4_COND; ?> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM + CV - 0.8Sy</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 30%;"><?php echo $PSCS5_OTOT; ?> tonf/m<sup>2</sup> </td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS5_OS; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 35%;"><?php echo $PSCS5_COND; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.5 PRESIONES ÚLTIMOS DE DISEÑO</td>
                    </tr>
                    <tr>
                        <td>Combinaciones de cargas de servicio</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;">σ<sub>p</sub> </td>
                                    <td style="border: none; width: 25%;">σ<sub>Mx</sub></td>
                                    <td style="border: none; width: 25%;">σ<sub>My</td>
                                    <td style="border: none; width: 25%;">σ<sub>tot</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>1.4CM + 1.7CV</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $PUD1_OP; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD1_OMX; ?> tonf/m<sup>2</sup></sub></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD1_OMY; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD1_OTOT; ?> tonf/m<sup>2</sup></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>1.25(CM+CV) + Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $PUD2_OP; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD2_OMX; ?> tonf/m<sup>2</sup></sub></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD2_OMY; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD2_OTOT; ?> tonf/m<sup>2</sup></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>1.25(CM+CV) + Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $PUD2_OP; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD2_OMX; ?> tonf/m<sup>2</sup></sub></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD2_OMY; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD2_OTOT; ?> tonf/m<sup>2</sup></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>1.25(CM + CV) - Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $PUD3_OP; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD3_OMX; ?> tonf/m<sup>2</sup></sub></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD3_OMY; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD3_OTOT; ?> tonf/m<sup>2</sup></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>1.25(CM+CV) + Sy</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $PUD4_OP; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD4_OMX; ?> tonf/m<sup>2</sup></sub></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD4_OMY; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD4_OTOT; ?> tonf/m<sup>2</sup></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>1.25(CM+CV) - Sy</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $PUD5_OP; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD5_OMX; ?> tonf/m<sup>2</sup></sub></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD5_OMY; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD5_OTOT; ?> tonf/m<sup>2</sup></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>0.9CM + Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $PUD6_OP; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD6_OMX; ?> tonf/m<sup>2</sup></sub></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD6_OMY; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD6_OTOT; ?> tonf/m<sup>2</sup></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>0.9CM - Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $PUD7_OP; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD7_OMX; ?> tonf/m<sup>2</sup></sub></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD7_OMY; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD7_OTOT; ?> tonf/m<sup>2</sup></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>0.9CM + Sy</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $PUD8_OP; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD8_OMX; ?> tonf/m<sup>2</sup></sub></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD8_OMY; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD8_OTOT; ?> tonf/m<sup>2</sup></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>0.9CM - Sy</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $PUD9_OP; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD9_OMX; ?> tonf/m<sup>2</sup></sub></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD9_OMY; ?> tonf/m<sup>2</sup></td>
                                    <td style="border: none; width: 25%;"><?php echo $PUD9_OTOT; ?> tonf/m<sup>2</sup></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>ult</sub></td>
                        <td></td>
                        <td><?php echo $OT_ULT; ?> tonf/m<sup>2</sup> </td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.6 CALCULO DE LAS FUERZAS ULTIMAS EN LA BASE DE LA ZAPATA</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Qu(1.4D+1.7)</td>
                        <td><?php echo $CFUBZ1; ?> ton-m</td>
                    </tr>
                    <tr>
                        <td>Descripción</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;">MAX</td>
                                    <td style="border: none; width: 50%;">MIN</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Qu(1.25*(D+L)+EQX)</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;"><?php echo $CFUBZ2_MAX; ?> ton-m</td>
                                    <td style="border: none; width: 50%;"><?php echo $CFUBZ2_MIN; ?> ton-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Qu(1.25*(D+L)+EQY)</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;"><?php echo $CFUBZ3_MAX; ?> ton-m</td>
                                    <td style="border: none; width: 50%;"><?php echo $CFUBZ3_MIN; ?> ton-m</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.7 VERIFICACIÓN DE EXCENTRICIDADES</td>
                    </tr>

                    <tr>
                        <td>Descripción</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 50%;">Fuerza axial</td>
                                    <td style="border: none; width: 50%;">Momento en X</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM+CV</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $VE1_FA1; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE1_FA2; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE1_MX1; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE1_MX2; ?> </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $VE1_FA3; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE1_FA4; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE1_MX3; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE1_MX4; ?> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM+CV+0.8Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $VE2_FA1; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE2_FA2; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE2_MX1; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE2_MX2; ?> </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $VE2_FA3; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE2_FA4; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE2_MX3; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE2_MX4; ?> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM+CV-0.8Sx </td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $VE3_FA1; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE3_FA2; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE3_MX1; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE3_MX2; ?> </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $VE3_FA3; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE3_FA4; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE3_MX3; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE3_MX4; ?> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM+CV+0.8Sy </td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $VE4_FA1; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE4_FA2; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE4_MX1; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE4_MX2; ?> </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $VE4_FA3; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE4_FA4; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE4_MX3; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE4_MX4; ?> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM+CV-0.8Sy </td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $VE5_FA1; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE5_FA2; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE5_MX1; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE5_MX2; ?> </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 25%;"><?php echo $VE5_FA3; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE5_FA4; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE5_MX3; ?> </td>
                                    <td style="border: none; width: 25%;"><?php echo $VE5_MX4; ?> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>Descripción</td>
                        <td></td>
                        <td></td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 40%;">Momento en Y</td>
                                    <td style="border: none; width: 40%;">Resultante</td>
                                    <td style="border: none; width: 20%;"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM+CV</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 20%;"><?php echo $VE1_MY1; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE1_MY2; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE1_R1; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE1_R2; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE_TEXT_F1; ?> </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 20%;"><?php echo $VE1_MY3; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE1_MY4; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE1_R3; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE1_R4; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE_TEXT_F2; ?> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM+CV+0.8Sx</td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 20%;"><?php echo $VE2_MY1; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE2_MY2; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE2_R1; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE2_R2; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE_TEXT_F3; ?> </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 20%;"><?php echo $VE2_MY3; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE2_MY4; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE2_R3; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE2_R4; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE_TEXT_F4; ?> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM+CV-0.8Sx </td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 20%;"><?php echo $VE3_MY1; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE3_MY2; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE3_R1; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE3_R2; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE_TEXT_F5; ?> </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 20%;"><?php echo $VE3_MY3; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE3_MY4; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE3_R3; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE3_R4; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE_TEXT_F6; ?> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM+CV+0.8Sy </td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 20%;"><?php echo $VE4_MY1; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE4_MY2; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE4_R1; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE4_R2; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE_TEXT_F7; ?> </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 20%;"><?php echo $VE4_MY3; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE4_MY4; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE4_R3; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE4_R4; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE_TEXT_F8; ?> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>CM+CV-0.8Sy </td>
                        <td>
                            <table style="border: none; font-size: 11px; width: 100%;">
                                <tr>
                                    <td style="border: none; width: 20%;"><?php echo $VE5_MY1; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE5_MY2; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE5_R1; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE5_R2; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE_TEXT_F9; ?> </td>
                                </tr>
                                <tr>
                                    <td style="border: none; width: 20%;"><?php echo $VE5_MY3; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE5_MY4; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE5_R3; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE5_R4; ?> </td>
                                    <td style="border: none; width: 20%;"><?php echo $VE_TEXT_F10; ?> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>









                </tbody>



            </table>
            <br><br>

        </div>
    </div>
</body>

</html>