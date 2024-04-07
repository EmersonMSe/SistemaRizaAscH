<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {



    // Datos de Zapata combinada
    //Distancia entre ejes de columnas
    $des = $_POST["des"];
    $qa = $_POST["qa"];
    $p_servicio = $_POST["p_servicio"];


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

    $Az = $qa * $p_servicio;
    $B =  $t2_col1 + $m1 + $fc;
    $L = 0.5 * $t1_col1 + $Le + 0.5 * $t1_col2 + $m2;

    //PRECIONES
    //Cargas en condiciones de servicio

    //Cargas muertas
    $CM_P =  $Col1_cm_pzX + $Col2_cm_pzX;
    $CM_Mx =  $Col1_cm_mxX + $Col2_cm_mxX;
    $CM_My =  $Col1_cm_myY + $Col2_cm_myY;

    //Cargas vivas
    $CV_P =  $Col1_cv_pzX + $Col2_cv_pzX;
    $CV_Mx =  $Col1_cv_mxX + $Col2_cv_mxX;
    $CV_My =  $Col1_cv_myY + $Col2_cv_myY;

    //Cargas sismo x
    $CSx_P =  $Col1_cs_pzX + $Col2_cs_pzX;
    $CSx_Mx =  $Col1_cs_mxX + $Col2_cs_mxX;
    $CSx_My =  0;

    //Cargas sismo y
    $CSy_P =  $Col1_cs_pzY + $Col2_cs_pzY;
    $CSy_Mx =  0;
    $CSy_My =  $Col1_cs_myY + $Col2_cs_myY;

    //Combinaciones de cargas de servicio

    //CM+CV
    $CM_CV_P = $CM_P + $CV_P;
    $CM_CV_MX = $CM_Mx + $CV_Mx;
    $CM_CV_MY = $CM_My + $CV_My;

    //CM+CV+0.8Sx
    $CM_CV_8SX_sum = $CM_P + $CV_P + 0.8* $CSx_P;
    $CM_CV_8SX_sum = $CM_P + $CV_P + 0.8 * $CSx_Mx;
    $CM_CV_8SX_sum = $CM_P + $CV_P + 0.8 * $CSx_My;

    //CM+CV-0.8Sx
    $CM_CV_8SX_rest = $CM_P + $CV_P - 0.8 * $CSx_P;
    $CM_CV_8SX_rest = $CM_P + $CV_P - 0.8 * $CSx_Mx;
    $CM_CV_8SX_rest = $CM_P + $CV_P - 0.8 * $CSx_My;

    //CM+CV+0.8Sy
    $CM_CV_8SY_sum = $CM_P + $CV_P + 0.8 * $CSy_P;
    $CM_CV_8SY_sum = $CM_P + $CV_P + 0.8 * $CSy_Mx;
    $CM_CV_8SY_sum = $CM_P + $CV_P + 0.8 * $CSy_My;

    //CM+CV-0.8Sy
    $CM_CV_8SY_rest = $CM_P + $CV_P - 0.8 * $CSy_P;
    $CM_CV_8SY_rest = $CM_P + $CV_P - 0.8 * $CSy_Mx;
    $CM_CV_8SY_rest = $CM_P + $CV_P - 0.8 * $CSy_My;

    //COMBINACIONES DE CARGA ÚLTIMAS

    //1.4CM+1.7CV
    $CCU1_P= 1.4 * $CM_P + 1.7 * $CV_P;
    $CCC1_MX = 1.4 * $CM_Mx + 1.7 * $CV_Mx;
    $CCC1_MY = 1.4 * $CM_My + 1.7 * $CV_My;

    //1.25(CM+CV) + Sx
    $CCC2_P = 1.25 * ($CM_P + $CV_P) +$CSx_P;
    $CCC2_MX = 1.25 * ($CM_Mx  + $CV_Mx) + $CSx_Mx;
    $CCC2_MY = 1.25 * ($CM_My + $CV_My) + $CSx_My;

    //1.25(CM+CV)-Sx
    $CCC3_P = 1.25 * ($CM_P + $CV_P) - $CSx_P;
    $CCC3_MX = 1.25 * ($CM_Mx  + $CV_Mx) - $CSx_Mx;
    $CCC3_MY = 1.25 * ($CM_My + $CV_My) - $CSx_My;

    //1.25(CM+CV) + Sy
    $CCC4_P = 1.25 * ($CM_P + $CV_P) + $CSy_P;
    $CCC4_MX = 1.25 * ($CM_Mx  + $CV_Mx) + $CSy_Mx;
    $CCC4_MY = 1.25 * ($CM_My + $CV_My) + $CSy_My;

    //1.25(CM+CV) - Sy
    $CCC5_P = 1.25 * ($CM_P + $CV_P) - $CSy_P;
    $CCC5_MX = 1.25 * ($CM_Mx  + $CV_Mx) - $CSy_Mx;
    $CCC5_MY = 1.25 * ($CM_My + $CV_My) - $CSy_My;

    //0.9CM + Sx
    $CCC6_P = 0.9 * $CM_P + $CSx_P;
    $CCC6_MX = 1.25 * $CM_Mx +  $CSx_Mx ;
    $CCC6_MY = 1.25 * $CM_My + $CSx_My;

    //0.9CM - Sx
    $CCC7_P = 0.9 * $CM_P - $CSx_P;
    $CCC7_MX = 1.25 * $CM_Mx -  $CSx_Mx;
    $CCC7_MY = 1.25 * $CM_My - $CSx_My;

    //0.9CM + Sy
    $CCC8_P = 0.9 * $CM_P + $CSy_P;
    $CCC8_MX = 1.25 * $CM_Mx +  $CSy_Mx;
    $CCC8_MY = 1.25 * $CM_My + $CSy_My;

    //0.9CM - Sy
    $CCC9_P = 0.9 * $CM_P - $CSy_P;
    $CCC9_MX = 1.25 * $CM_Mx -  $CSy_Mx;
    $CCC9_MY = 1.25 * $CM_My - $CSy_My;








    
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
                        <td>qa * p servicio</td>
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
                    <tr>
                        <td></td>
                        <td>P<sub>DL2</sub></td>
                        <td>P<sub>D2</sub> + P<sub>L2</sub></td>
                        <td> <?php echo $PDL2 ?> tonnef</td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">2.1 Predimensionamiento de la zapata esquinera</td>
                    </tr>
                    <tr>
                        <td>Área requerida total</td>
                        <td>A<sub>t</sub></td>
                        <td>1.0 * ( P<sub>DL1</sub> + P<sub>DL2</sub>) / (0.9 * q <sub>neta</sub>)</td>
                        <td> <?php echo $at ?> m<sup>2</sup></td>
                    </tr>
                    <tr>
                        <td>Resultante respecto a la columna interior</td>
                        <td>Xc</td>
                        <td> (P<sub>DL1</sub>*δ + M<sub>Dx1</sub> + M<sub>Lx1</sub> + M<sub>Dx2</sub> + M<sub>Lx2</sub>)/(P<sub>DL1</sub> + P<sub>DL2</sub> )</td>
                        <td><?php echo $Xc ?> m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>L<sub>1</sub></td>
                        <td></td>
                        <td> <?php echo $L1 ?>m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>L<sub>2</sub></td>
                        <td></td>
                        <td><?php echo $L2 ?> m</td>
                    </tr>
                    <tr>
                        <td>Excentricidad de la carga en la columna
                            esquinera</td>
                        <td>δ'</td>
                        <td>0.5 * L <sub>1</sub> - Δ</td>
                        <td> <?php echo $ecce ?> m</td>
                    </tr>

                    <tr>
                        <td>Luz libre de la viga del modelo
                            simplificado</td>
                        <td>L</td>
                        <td>δ-δ'</td>
                        <td> <?php echo $L ?> m</td>
                    </tr>
                </tbody>
                <thead style="font-size: 13px; background-color: #4e5c77; color: white;">
                    <tr>
                        <th colspan="2">3. VERIFICACIÓN DE PRESIONES</th>
                        <th scope="col">FORMULAS</th>
                        <th scope="col">RESULTADOS</th>
                    </tr>
                </thead>
                <tbody style=" font-size: 11px;">
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.1 CASO 1: CARGAS GRAVITACIONALES D+L (sin sismo)</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>1</sub></td>
                        <td>P<sub>DL1</sub></td>
                        <td><?php echo $P1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>1</sub></td>
                        <td>M<sub>Dx1</sub> + M<sub>Lx1</sub></td>
                        <td><?php echo $M1 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>1</sub></td>
                        <td>(P<sub>1</sub> * δ - M<sub>1</sub> - M<sub>2</sub>)/L </td>
                        <td><?php echo $R1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>2</sub></td>
                        <td>P<sub>DL2</sub></td>
                        <td><?php echo $P2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>2</sub></td>
                        <td>M<sub>Dx2</sub> + M<sub>Lx2</sub></td>
                        <td><?php echo $M2 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>2</sub></td>
                        <td>(P<sub>1</sub> + P<sub>2</sub> - R<sub>1</sub>) </td>
                        <td><?php echo $R2 ?> tonnef</td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.1.1 Presiones en la zapata 1</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>11max</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) + 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O11max ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>11min</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) - 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O11min ?> tonnef/m <sup>2</sup></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.1.2 Presiones en la zapata 2</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12max</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) + 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O12max ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12min</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) - 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O12min ?> tonnef/m <sup>2</sup></td>
                    </tr>

                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.2 CASO 2: SISMO LONGITUDINAL ANTIHORARIO</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>1</sub></td>
                        <td>P<sub>DL1</sub> + P<sub>SX1</sub></td>
                        <td><?php echo $C2P1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>1</sub></td>
                        <td>M<sub>Dx1</sub> + M<sub>Lx1</sub> - M<sub>SX1</sub></td>
                        <td><?php echo $C2M1 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>1</sub></td>
                        <td>(P<sub>1</sub> * δ - M<sub>1</sub> - M<sub>2</sub>)/L </td>
                        <td><?php echo $C2R1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>2</sub></td>
                        <td>P<sub>DL2</sub> + P<sub>SX2</sub> </td>
                        <td><?php echo $C2P2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>2</sub></td>
                        <td>M<sub>Dx2</sub> + M<sub>Lx2</sub> - M<sub>SX2</sub></td>
                        <td><?php echo $C2M2 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>2</sub></td>
                        <td>(P<sub>1</sub> + P<sub>2</sub> - R<sub>1</sub>) </td>
                        <td><?php echo $C2R2 ?> tonnef</td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.2.1 Presiones en la zapata 1</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>21max</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) + 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O21max ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>21min</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) - 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O21min ?> tonnef/m <sup>2</sup></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.2.2 Presiones en la zapata 2</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>22max</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) + 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O22max ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>22min</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) - 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O22min ?> tonnef/m <sup>2</sup></td>
                    </tr>

                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.3 CASO 3: SISMO LONGITUDINAL HORARIO</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>1</sub></td>
                        <td>P<sub>DL1</sub> - P<sub>SX1</sub> </td>
                        <td><?php echo $C3P1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>1</sub></td>
                        <td>M<sub>Dx1</sub> + M<sub>Lx1</sub> + M<sub>SX1</sub></td>
                        <td><?php echo $C3M1 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>1</sub></td>
                        <td>(P<sub>1</sub> * δ - M<sub>1</sub> - M<sub>2</sub>)/L </td>
                        <td><?php echo $C3R1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>2</sub></td>
                        <td>P<sub>DL2</sub> - P<sub>SX2</sub> </td>
                        <td><?php echo $C3P2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>2</sub></td>
                        <td>M<sub>Dx2</sub> + M<sub>Lx2</sub> + M<sub>SX2</sub></td>
                        <td><?php echo $C3M2 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>2</sub></td>
                        <td>P<sub>1</sub> + P<sub>2</sub> - R<sub>1</sub> </td>
                        <td><?php echo $C3R2 ?> tonnef</td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.3.1 Presiones en la zapata 1</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>21max</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) + 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O31max ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>21min</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) - 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O31min ?> tonnef/m <sup>2</sup></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.3.2 Presiones en la zapata 2</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12max</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) + 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O32max ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12min</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) - 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O32min ?> tonnef/m <sup>2</sup></td>
                    </tr>

                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.4 CASO 4: SISMO TRANSVERSAL</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>1</sub></td>
                        <td>P<sub>DL1</sub> + P<sub>SY1</sub></td>
                        <td><?php echo $C4P1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>1</sub></td>
                        <td>M<sub>Dx1</sub> + M<sub>Lx1</td>
                        <td><?php echo $C4M1 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>1</sub></td>
                        <td>(P<sub>1</sub> * δ - M<sub>1</sub> - M<sub>2</sub>)/L </td>
                        <td><?php echo $C4R1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>2</sub></td>
                        <td>P<sub>DL2</sub> + P<sub>SY2</sub> </td>
                        <td><?php echo $C4P2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>2</sub></td>
                        <td>M<sub>Dx2</sub> + M<sub>Lx2</sub></td>
                        <td><?php echo $C4M2 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>2</sub></td>
                        <td>(P<sub>1</sub> + P<sub>2</sub> - R<sub>1</sub>) </td>
                        <td><?php echo $C4R2 ?> tonnef</td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.4.1 Presiones en la zapata 1</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>21max</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) + 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub> + M<sub>SY1</sub> )/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O41max ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>21min</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) - 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub> + M<sub>SY1</sub> )/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O41min ?> tonnef/m <sup>2</sup></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.4.2 Presiones en la zapata 2</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12max</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub> ) + 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub> + M<sub>SY2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O42max ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12min</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) - 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub> + M<sub>SY2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O42min ?> tonnef/m <sup>2</sup></td>
                    </tr>

                </tbody>

                <thead style="font-size: 13px; background-color: #4e5c77; color: white;">
                    <tr>
                        <th colspan="2">4. PRESIONES AMPLIFICADAS</th>
                        <th scope="col">FORMULAS</th>
                        <th scope="col">RESULTADOS</th>
                    </tr>
                </thead>
                <tbody style=" font-size: 11px;">
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">4.1 CASO 1: CARGAS GRAVITACIONALES D+L (sin sismo)</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>1</sub></td>
                        <td>α<sub>D</sub> * P<sub>D1</sub> + α<sub>L</sub> * P<sub>L1</sub></td>
                        <td><?php echo $C1PAP1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>1</sub></td>
                        <td>α<sub>D</sub> * M<sub>Dx1</sub> + α<sub>L</sub> * M<sub>Lx1</sub></td>
                        <td><?php echo $C1PAM1 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>1</sub></td>
                        <td>(P<sub>1</sub> * δ - M<sub>1</sub> - M<sub>2</sub>)/L </td>
                        <td><?php echo $C1PAR1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>2</sub></td>
                        <td>α<sub>D</sub> * P<sub>D2</sub> + α<sub>L</sub> * P<sub>L2</sub></td>
                        <td><?php echo $C1PAP2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>2</sub></td>
                        <td>α<sub>D</sub> * M<sub>Dx2</sub> + α<sub>L</sub> * M<sub>Lx2</sub></td>
                        <td><?php echo $C1PAM2 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>2</sub></td>
                        <td>(P<sub>1</sub> + P<sub>2</sub> - R<sub>1</sub>) </td>
                        <td><?php echo $C1PAR2 ?> tonnef</td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">4.1.1 Presiones en la zapata 1</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>11max</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) + 6 * ( α<sub>D</sub> * M<sub>Dy1</sub> + α<sub>L</sub> * M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O11PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>11min</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) - 6 * ( α<sub>D</sub> * M<sub>Dy1</sub> + α<sub>L</sub> * M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O11PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">4.1.2 Presiones en la zapata 2</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12max</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) + 6 * ( α<sub>D</sub> * M<sub>Dy2</sub> + α<sub>L</sub> * M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O12PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12min</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) - 6 * ( α<sub>D</sub> * M<sub>Dy2</sub> + α<sub>L</sub> * M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O12PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>

                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">4.2 CASO 2: SISMO LONGITUDINAL ANTIHORARIO</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>1</sub></td>
                        <td>α<sub>D</sub> * P<sub>D1</sub> + α<sub>L</sub> * P<sub>L1</sub> + P<sub>SX1</sub></td>
                        <td><?php echo $C2PAP1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>1</sub></td>
                        <td>α<sub>D</sub> * M<sub>Dx1</sub> + α<sub>L</sub> * M<sub>Lx1</sub> - M<sub>SX1</sub></td>
                        <td><?php echo $C2PAM1 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>1</sub></td>
                        <td>(P<sub>1</sub> * δ - M<sub>1</sub> - M<sub>2</sub>)/L </td>
                        <td><?php echo $C2PAR1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>2</sub></td>
                        <td>α<sub>D</sub> * P<sub>D1</sub> + α<sub>L</sub> * P<sub>L1</sub> + P<sub>SX2</sub></td>
                        <td><?php echo $C2PAP2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>2</sub></td>
                        <td>α<sub>D</sub> * M<sub>Dx2</sub> + α<sub>L</sub> * M<sub>Lx2</sub> - M<sub>SX2</sub></td>
                        <td><?php echo $C2PAM2 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>2</sub></td>
                        <td>(P<sub>1</sub> + P<sub>2</sub> - R<sub>1</sub>) </td>
                        <td><?php echo $C2PAR2 ?> tonnef</td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">4.2.1 Presiones en la zapata 1</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>21max</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) + 6 * ( α<sub>D</sub> * M<sub>Dy1</sub> + α<sub>L</sub> * M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O21PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>21min</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) - 6 * ( α<sub>D</sub> * M<sub>Dy1</sub> + α<sub>L</sub> * M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O21PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">4.2.2 Presiones en la zapata 2</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>22max</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) + 6 * ( α<sub>D</sub> * M<sub>Dy2</sub> + α<sub>L</sub> * M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O22PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>22min</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) - 6 * ( α<sub>D</sub> * M<sub>Dy2</sub> + α<sub>L</sub> * M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O22PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>

                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">4.3 CASO 3: SISMO LONGITUDINAL HORARIO</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>1</sub></td>
                        <td>α<sub>D</sub> * P<sub>D1</sub> + α<sub>L</sub> * P<sub>L1</sub> - P<sub>SX1</sub></td>
                        <td><?php echo $C3PAP1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>1</sub></td>
                        <td>α<sub>D</sub> * M<sub>Dx1</sub> + α<sub>L</sub> * M<sub>Lx1</sub> + M <sub>SX1</sub></td>
                        <td><?php echo $C3PAM1 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>1</sub></td>
                        <td>(P<sub>1</sub> * δ - M<sub>1</sub> - M<sub>2</sub>)/L </td>
                        <td><?php echo $C3PAR1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>2</sub></td>
                        <td>α<sub>D</sub> * P<sub>D1</sub> + α<sub>L</sub> * P<sub>L1</sub> - P<sub>SX2</sub></td>
                        <td><?php echo $C3PAP2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>2</sub></td>
                        <td>α<sub>D</sub> * M<sub>Dx2</sub> + α<sub>L</sub> * M<sub>Lx2</sub> + M <sub>SX2</sub></td>
                        <td><?php echo $C3PAM2 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>2</sub></td>
                        <td>(P<sub>1</sub> + P<sub>2</sub> - R<sub>1</sub>) </td>
                        <td><?php echo $C3PAR2 ?> tonnef</td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">4.3.1 Presiones en la zapata 1</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>31max</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) + 6 * ( α<sub>D</sub> * M<sub>Dy1</sub> + α<sub>L</sub> * M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O31PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>31min</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) - 6 * ( α<sub>D</sub> * M<sub>Dy1</sub> + α<sub>L</sub> * M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O31PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">4.3.2 Presiones en la zapata 2</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>32max</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) + 6 * ( α<sub>D</sub> * M<sub>Dy2</sub> + α<sub>L</sub> * M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O32PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>32min</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) - 6 * ( α<sub>D</sub> * M<sub>Dy2</sub> + α<sub>L</sub> * M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O32PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>

                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">4.4 CASO 4: SISMO TRANSVERSAL</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>1</sub></td>
                        <td>α<sub>D</sub> * P<sub>D1</sub> + α<sub>L</sub> * P<sub>L1</sub> + P<sub>SY1</sub></td>
                        <td><?php echo $C4PAP1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>1</sub></td>
                        <td>α<sub>D</sub> * M<sub>Dx1</sub> + α<sub>L</sub> * M<sub>Lx1</sub></td>
                        <td><?php echo $C4PAM1 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>1</sub></td>
                        <td>(P<sub>1</sub> * δ - M<sub>1</sub> - M<sub>2</sub>)/L </td>
                        <td><?php echo $C4PAR1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>2</sub></td>
                        <td>α<sub>D</sub> * P<sub>D1</sub> + α<sub>L</sub> * P<sub>L1 + P<sub>SY2</sub></sub></td>
                        <td><?php echo $C4PAP2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>2</sub></td>
                        <td>α<sub>D</sub> * M<sub>Dx2</sub> + α<sub>L</sub> * M<sub>Lx2</sub></td>
                        <td><?php echo $C4PAM2 ?> tonnef⋅m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>2</sub></td>
                        <td>(P<sub>1</sub> + P<sub>2</sub> - R<sub>1</sub>) </td>
                        <td><?php echo $C4PAR2 ?> tonnef</td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">4.4.1 Presiones en la zapata 1</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>41max</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) + 6 * ( α<sub>D</sub> * M<sub>Dy1</sub> + α<sub>L</sub> * M<sub>Ly1</sub> + M<sub>SY1</sub> )/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O41PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>41min</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) - 6 * ( α<sub>D</sub> * M<sub>Dy1</sub> + α<sub>L</sub> * M<sub>Ly1</sub> + M<sub>SY1</sub> )/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O41PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">4.4.2 Presiones en la zapata 2</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>42max</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) + 6 * ( α<sub>D</sub> * M<sub>Dy2</sub> + α<sub>L</sub> * M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O42PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>42min</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) - 6 * ( α<sub>D</sub> * M<sub>Dy2</sub> + α<sub>L</sub> * M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O42PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>

                </tbody>
                <thead style="font-size: 13px; background-color: #4e5c77; color: white;">
                    <tr>
                        <th colspan="2">5. </th>
                        <th scope="col">FORMULAS</th>
                        <th scope="col">RESULTADOS</th>
                    </tr>
                </thead>
                <tbody style="font-size: 11px;">

                    <tr>
                        <td></td>
                        <td>A'<sub>sint</sub></td>
                        <td> ((0.85 * f'<sub>c</sub> * b * d) / f<sub>y</sub>) * (1 - (√(1-(2*Mu)/(ϕ<sub>f</sub> * 0.85 * f'<sub>c</sub> * b *d<sup>2</sup> )))) </td>
                        <td><?php echo $Avsint ?> cm<sup>2</sup></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>N</td>
                        <td>A'<sub>sint</sub> / A<sub>v</sub></td>
                        <td><?php echo $N  ?> </td>
                    </tr>

                </tbody>
            </table>
            <br><br>

        </div>
    </div>
</body>

</html>