<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Datos de Zapata combinada
    //dimensiones de las columnas
    $c1 = $_POST["c1"];
    $c_1 = $_POST["c_1"];
    //luz libre entre columnas
    $ln = $_POST["ln"];
    //Cargas-En los momentos gravitacionales horario positivo

    //columna 1
    $PD1 = $_POST["PD1"];
    $PL1 = $_POST["PL1"];
    $PSX1 = $_POST["PSX1"];
    $PSY1 = $_POST["PSY1"];
    $MDx1 = $_POST["MDx1"];
    $MLx1 = $_POST["MLx1"];
    $MDy1 = $_POST["MDy1"];
    $MLy1 = $_POST["MLy1"];
    $MSX1 = $_POST["MSX1"];
    $MSY1 = $_POST["MSY1"];


    //columna 2
    $PD2 = $_POST["PD2"];
    $PL2 = $_POST["PL2"];
    $PSX2 = $_POST["PSX2"];
    $PSY2 = $_POST["PSY2"];
    $MDx2 = $_POST["MDx2"];
    $MLx2 = $_POST["MLx2"];
    $MDy2 = $_POST["MDy2"];
    $MLy2 = $_POST["MLy2"];
    $MSX2 = $_POST["MSX2"];
    $MSY2 = $_POST["MSY2"];

    $qneta = $_POST["qneta"];

    //Anchos de cada cimentación
    $b1 = $_POST["b1"];
    $b2 = $_POST["b2"];
    $L1 = $_POST["l1"];

    //preciones amplificadas
    $facm = $_POST["fact_ampli_cm"];
    $facv = $_POST["fact_ampli_cv"];

    //preciones amplificadas caso 2
    $facmc2 = $_POST["fact_ampli_cm_c2"];
    $facvc2 = $_POST["fact_ampli_cv_c2"];


    //CALCULOS

    //Luz entre ejes de columnas
    $lec = $ln + 0.5 * ($c1 + $c_1);
    //Excentricidad de la columna esquinera
    $ece = 0.5 * $c1;

    //PDL1 
    $PDL1 = $PD1 + $PL1;
    //PDL2 
    $PDL2 = $PD2 + $PL2;

    //Área requerida total (convertido de cm2 a m2)
    $at = round(((1.0 * ($PDL1 + $PDL2)) / (0.9 * $qneta)) / 10, 3);

    //Resultante respecto a la columna interior
    $Xc = round((($PDL1 * $lec) + $MDx1 + $MLx1 + $MDx2 + $MLx2) / ($PDL1 + $PDL2), 3);

    //Anchos de cada cimentación
    $A1_L1 = $b1 * $L1;
    // $L1 = 1.757;
    $L1 = 1.8;
    // $L2 = ($at - $A1_L1) / $b2;
    $L2 = 3.2;

    //Excentricidad de la carga en la columna esquinera
    $ecce = round(0.5 * $L1 - $ece, 1);

    //Luz libre de la viga del modelo simplificado
    $L = round($lec - $ecce, 1);

    //VERIFICACION DE PRESIONES
    //CASO 1: CARGAS GRAVITACIONALES D+L (sin sismo)

    $P1 = $PDL1;
    $M1 = $MDx1 + $MLx1;

    $P2 = $PDL2;
    $M2 = $MDx2 + $MLx2;

    $R1 = round(($P1 * $lec - $M1 - $M2) / ($L), 3);
    $R2 = round(($P1 + $P2 - $R1), 3);

    //Presiones en la zapata 1
    $O11max = round(($R1 * 1.05) / ($b1 * $L1) + 6 * ($MDy1 + $MLy1) / (pow($b1, 2) * $L1), 3);
    $O11min = round(($R1 * 1.05) / ($b1 * $L1) - 6 * ($MDy1 + $MLy1) / (pow($b1, 2) * $L1), 3);

    //Presiones en la zapata 2
    $O12max = round(($R2 * 1.05) / ($b2 * $L2) + 6 * ($MDy2 + $MLy2) / (pow($b2, 2) * $L2), 2);
    $O12min = round(($R2 * 1.05) / ($b2 * $L2) - 6 * ($MDy2 + $MLy2) / (pow($b2, 2) * $L2), 2);

    //CASO 2: SISMO LONGITUDINAL ANTIHORARIO

    $C2P1 = $PDL1 + $PSX1;
    $C2M1 = $MDx1 + $MLx1 - $MSX1;

    $C2P2 = $PDL2 + $PSX2;
    $C2M2 = $MDx2 + $MLx2 - $MSX2;

    $C2R1 = round(($C2P1 * $lec - $C2M1 - $C2M2) / ($L), 3);;
    $C2R2 = round(($C2P1  + $C2P2 - $C2R1), 3);

    //Presiones en la zapata 1
    $O21max = round(($C2R1 * 1.05) / ($b1 * $L1) + 6 * ($MDy1 + $MLy1) / (pow($b1, 2) * $L1), 3);
    $O21min = round(($C2R1 * 1.05) / ($b1 * $L1) - 6 * ($MDy1 + $MLy1) / (pow($b1, 2) * $L1), 3);

    //Presiones en la zapata 2
    $O22max = round(($C2R2 * 1.05) / ($b2 * $L2) + 6 * ($MDy2 + $MLy2) / (pow($b2, 2) * $L2), 3);
    $O22min = round(($C2R2 * 1.05) / ($b2 * $L2) - 6 * ($MDy2 + $MLy2) / (pow($b2, 2) * $L2), 3);

    //CASO 3: SISMO LONGITUDINAL HORARIO

    $C3P1 = $PDL1 - $PSX1;
    $C3M1 = $MDx1 + $MLx1 + $MSX1;

    $C3P2 = $PDL2 - $PSX2;
    $C3M2 = $MDx2 + $MLx2 + $MSX2;

    $C3R1 = round(($C3P1 * $lec - $C3M1 - $C3M2) / ($L), 3);
    $C3R2 = round($C3P1 + $C3P2 -$C3R1, 3);


    //Presiones en la zapata 1
    $O31max = round(($C3R1 * 1.05) / ($b1 * $L1) + 6 * ($MDy1 + $MLy1) / (pow($b1, 2) * $L1), 3);
    $O31min = round(($C3R1 * 1.05) / ($b1 * $L1) - 6 * ($MDy1 + $MLy1) / (pow($b1, 2) * $L1), 3);

    //Presiones en la zapata 2
    $O32max = round(($C3R2 * 1.05) / ($b2 * $L2) + 6 * ($MDy2 + $MLy2) / (pow($b2, 2) * $L2), 3);
    $O32min = round(($C3R2 * 1.05) / ($b2 * $L2) - 6 * ($MDy2 + $MLy2) / (pow($b2, 2) * $L2), 3);

    //CASO 4: SISMO TRANSVERSAL

    $C4P1 = $PDL1 + $PSY1;
    $C4M1 = $MDx1 + $MLx1;

    $C4P2 = $PDL2 + $PSY2;
    $C4M2 = $MDx2 + $MLx2;

    $C4R1 = round(($C4P1 * $lec - $C4M1 - $C4M2) / ($L), 3);
    $C4R2 = round(($C4P1 + $C4P2 - $C4R1), 3);

    //Presiones en la zapata 1
    $O41max = round(($C4R1 * 1.05) / ($b1 * $L1) + 6 * ($MDy1 + $MLy1 + $MSY1) / (pow($b1, 2) * $L1), 3);
    $O41min = round(($C4R1 * 1.05) / ($b1 * $L1) - 6 * ($MDy1 + $MLy1 + $MSY1) / (pow($b1, 2) * $L1), 3);

    //Presiones en la zapata 2
    $O42max = round(($C4R2 * 1.05) / ($b2 * $L2) + 6 * ($MDy2 + $MLy2 + $MSY2) / (pow($b2, 2) * $L2), 3);
    $O42min = round(($C4R2 * 1.05) / ($b2 * $L2) - 6 * ($MDy2 + $MLy2 + $MSY2) / (pow($b2, 2) * $L2), 3);

    // PRECIONES AMPLIFICADAS
    //CASO 1: CARGAS GRAVITACIONALES D+L (sin sismo)

    $C1PAP1 = $facm * $PD1 + $facv * $PL1;
    $C1PAM1 = $facm * $MDx1 +  $facv * $MLx1;

    $C1PAP2 = $facm * $PD2 + $facv * $PL2;
    $C1PAM2 = $facm * $MDx2 + $facv * $MLx2;

    $C1PAR1 = round(($C1PAP1 * $lec - $C1PAM1 - $C1PAM2) / ($L), 3);
    $C1PAR2 = round($C1PAP1 + $C1PAP2 -
    $C1PAR1, 3);

    //Presiones en la zapata 1
    $O11PAmax = round(($C1PAR1 * 1.05) / ($b1 * $L1) + 6 * ($facm * $MDy1 + $facv * $MLy1) / (pow($b1, 2) * $L1), 3);
    $O11PAmin = round(($C1PAR1 * 1.05) / ($b1 * $L1) - 6 * ($facm * $MDy1 + $facv * $MLy1) / (pow($b1, 2) * $L1), 3);

    //Presiones en la zapata 2
    $O12PAmax = round(($C1PAR2 * 1.05) / ($b2 * $L2) + 6 * ($facm * $MDy2 + $facv * $MLy2) / (pow($b2, 2) * $L2), 3);
    $O12PAmin = round(($C1PAR2 * 1.05) / ($b2 * $L2) - 6 * ($facm * $MDy2 + $facv * $MLy2) / (pow($b2, 2) * $L2), 3);

    //CASO 2: SISMO LONGITUDINAL ANTIHORARIO

    $C2PAP1 = $facmc2 * $PD1 + $facvc2 * $PL1 + $PSX1;
    $C2PAM1 = $facmc2 * $MDx1 +  $facvc2 * $MLx1 - $MSX1;

    $C2PAP2 = $facmc2 * $PD1 + $facvc2 * $PL1 + $PSX2;
    $C2PAM2 = $facmc2 * $MDx2 + $facvc2 * $MLx2 - $MSX2;

    $C2PAR1 = ($C1PAP1 * $lec - $C2PAM1 - $C2PAM2) / ($L);
    $C2PAR2 = $C2PAP1 + $C2PAP2 - $C2PAR1;

    //Presiones en la zapata 1
    $O21PAmax = ($C1PAR1 * 1.05) / ($b1 * $L1) + 6 * ($facmc2 * $MDy1 + $facvc2 * $MLy1) / (pow($b1, 2) * $L1);
    $O21PAmin = ($C1PAR1 * 1.05) / ($b1 * $L1) - 6 * ($facmc2 * $MDy1 + $facvc2 * $MLy1) / (pow($b1, 2) * $L1);

    //Presiones en la zapata 2
    $O22PAmax = ($C2PAR2 * 1.05) / ($b2 * $L2) + 6 * ($facmc2 * $MDy2 + $facvc2 * $MLy2) / (pow($b2, 2) * $L1);
    $O22PAmin = ($C1PAR2 * 1.05) / ($b2 * $L2) - 6 * ($facmc2 * $MDy2 + $facvc2 * $MLy2) / (pow($b2, 2) * $L1);

    //CASO 3: SISMO LONGITUDINAL HORARIO

    $C3PAP1 = $facmc2 * $PD1 + $facvc2 * $PL1 - $PSX1;
    $C3PAM1 = $facmc2 * $MDx1 +  $facvc2 * $MLx1 + $MSX1;

    $C3PAP2 = $facmc2 * $PD1 + $facvc2 * $PL1 - $PSX2;
    $C3PAM2 = $facmc2 * $MDx2 + $facvc2 * $MLx2 + $MSX2;

    $C3PAR1 = ($C3PAP1 * $lec - $C3PAM1 - $C3PAM2) / ($L);
    $C3PAR2 = $C3PAP1 + $C3PAP2 - $C3PAR1;


    //Presiones en la zapata 1
    $O31PAmax = ($C1PAR1 * 1.05) / ($b1 * $L1) + 6 * ($facmc2 * $MDy1 + $facvc2 * $MLy1) / (pow($b1, 2) * $L1);
    $O31PAmin = ($C1PAR1 * 1.05) / ($b1 * $L1) - 6 * ($facmc2 * $MDy1 + $facvc2 * $MLy1) / (pow($b1, 2) * $L1);

    //Presiones en la zapata 2
    $O32PAmax = ($C2PAR2 * 1.05) / ($b2 * $L2) + 6 * ($facmc2 * $MDy2 + $facvc2 * $MLy2) / (pow($b2, 2) * $L2);
    $O32PAmin = ($C1PAR2 * 1.05) / ($b2 * $L2) - 6 * ($facmc2 * $MDy2 + $facvc2 * $MLy2) / (pow($b2, 2) * $L2);

    //CASO 4: SISMO TRANSVERSAL

    $C4PAP1 = $facmc2 * $PD1 + $facvc2 * $PL1 - $PSY1;
    $C4PAM1 = $facmc2 * $MDx1 +  $facvc2 * $MLx1;

    $C4PAP2 = $facmc2 * $PD1 + $facvc2 * $PL1 + $PSY2;
    $C4PAM2 = $facmc2 * $MDx2 + $facvc2 * $MLx2;

    $C4PAR1 = ($C4PAP1 * $lec - $C4PAM1 - $C4PAM2) / ($L);
    $C4PAR2 = $C4PAP1 + $C4PAP2 - $C4PAR1;

    //Presiones en la zapata 1
    $O41PAmax = ($C4PAR1 * 1.05) / ($b1 * $L1) + 6 * ($facmc2 * $MDy1 + $facvc2 * $MLy1 + $MSY1) / (pow($b1, 2) * $L1);
    $O41PAmin = ($C4PAR1 * 1.05) / ($b1 * $L1) - 6 * ($facmc2 * $MDy1 + $facvc2 * $MLy1 + $MSY1) / (pow($b1, 2) * $L1);

    //Presiones en la zapata 2
    $O42PAmax = ($C4PAR2 * 1.05) / ($b2 * $L2) + 6 * ($facmc2 * $MDy2 + $facvc2 * $MLy2 + $MSY2) / (pow($b2, 2) * $L2);
    $O42PAmin = ($C4PAR2 * 1.05) / ($b2 * $L2) - 6 * ($facmc2 * $MDy2 + $facvc2 * $MLy2 + $MSY2) / (pow($b2, 2) * $L2);
}
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table-responsive">
                <thead style="font-size: 13px;background-color: #4e5c77; color:white">
                    <tr>
                        <th colspan="2">1. REQUISITO DE DISEÑO</th>
                        <th scope="col">DATOS</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody style=" font-size: 11px;">

                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">1.1 DATOS GENERALES</td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">1.1.1 Dimensiones de las columnas</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>c<sub>1</sub></td>
                        <td><?php echo $c1 ?> m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>c'<sub>1</sub></td>
                        <td><?php echo $c_1 ?> m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Luz libre entre columnas</td>
                        <td>l<sub>n</sub></td>
                        <td><?php echo $ln ?> m</td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">1.1.2 Cargas: *En los momentos gravitacionales horario positivo</td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Columna 1</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>D1</sub> </td>
                        <td><?php echo $PD1  ?> tonnef</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>L1</sub></td>
                        <td><?php echo $PL1  ?> tonnef</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>SX1</sub></td>
                        <td><?php echo $PSX1  ?> tonnef</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>SY1</sub></td>
                        <td><?php echo $PSY1  ?> tonnef</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>Dx1</sub></td>
                        <td><?php echo $MDx1  ?> tonnef⋅m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>Lx1</sub></td>
                        <td><?php echo $MLx1  ?> tonnef⋅m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>Dy1</sub></td>
                        <td><?php echo $MDy1  ?> tonnef⋅m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>Ly1</sub></td>
                        <td><?php echo $MLy1  ?> tonnef⋅m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>SX1</sub></td>
                        <td><?php echo $MSX1  ?> tonnef⋅m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>SY1</sub></td>
                        <td><?php echo $MSY1  ?> tonnef⋅m</td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Columna 2</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P <sub>D2</sub> </td>
                        <td><?php echo $PD2  ?> m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>L2</sub></td>
                        <td><?php echo $PL2  ?> m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>SX2</sub></td>
                        <td><?php echo $PSX2  ?> m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>SY2</sub></td>
                        <td><?php echo $PSY2  ?> m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>Dx2</sub></td>
                        <td><?php echo $MDx2  ?> tonnef⋅m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>Lx2</sub></td>
                        <td><?php echo $MLx2  ?> tonnef⋅m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>Dy2</sub></td>
                        <td><?php echo $MDy2  ?> tonnef⋅m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>Ly2</sub></td>
                        <td><?php echo $MLy2  ?> tonnef⋅m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>SX2</sub></td>
                        <td><?php echo $MSX2  ?> tonnef⋅m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Capacidad portante admisible
                            neta</td>
                        <td>q<sub>neta</sub></td>
                        <td><?php echo $qneta  ?> kgf/cm<sup>2</sup></td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">1.1.3 Anchos de cada cimentación</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>B<sub>1</sub></td>
                        <td><?php echo $b1  ?> m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>B<sub>2</sub></td>
                        <td><?php echo $b2  ?> m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>L<sub>1</sub></td>
                        <td><?php echo $L1  ?> m</td>
                        <td></td>
                    </tr>
                </tbody>

                <thead style="font-size: 13px; background-color: #4e5c77; color: white;">
                    <tr>
                        <th colspan="2">2. </th>
                        <th scope="col">FORMULAS</th>
                        <th scope="col">RESULTADOS</th>
                    </tr>
                </thead>
                <tbody style="font-size: 11px;">

                    <tr>
                        <td>Luz entre ejes de columnas</td>
                        <td>δ</td>
                        <td> l<sub>n</sub> + 0.5 * (c<sub>1</sub> + c'<sub>1</sub>)</td>
                        <td><?php echo $lec  ?> m</td>
                    </tr>
                    <tr>
                        <td>Excentricidad de la columna esquinera</td>
                        <td>Δ</td>
                        <td>0.5 * c<sub>1</sub></td>
                        <td><?php echo $ece ?> m</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>DL1</sub></td>
                        <td>P<sub>D1</sub> + P<sub>L1</sub></td>
                        <td> <?php echo $PDL1 ?> tonnef</td>
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
                        <td><?php echo $M2 ?> tonnef</td>
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
                        <td>P<sub>DL1</sub></td>
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
                        <td><?php echo $C2M2 ?> tonnef</td>
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
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) + 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O22max ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>22min</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) - 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O22min ?> tonnef/m <sup>2</sup></td>
                    </tr>

                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.3 CASO 3: SISMO LONGITUDINAL HORARIO</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>1</sub></td>
                        <td>P<sub>DL1</sub></td>
                        <td><?php echo $C3P1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>1</sub></td>
                        <td>M<sub>Dx1</sub> + M<sub>Lx1</sub> - M<sub>SX1</sub></td>
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
                        <td>P<sub>DL2</sub> + P<sub>SX2</sub> </td>
                        <td><?php echo $C3P2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>2</sub></td>
                        <td>M<sub>Dx2</sub> + M<sub>Lx2</sub> - M<sub>SX2</sub></td>
                        <td><?php echo $C3M2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>2</sub></td>
                        <td>(P<sub>1</sub> + P<sub>2</sub> - R<sub>1</sub>) </td>
                        <td><?php echo $C3R2 ?> tonnef</td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.2.1 Presiones en la zapata 1</td>
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
                        <td colspan="4">3.2.2 Presiones en la zapata 2</td>
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
                        <td>P<sub>DL1</sub></td>
                        <td><?php echo $C4P1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>1</sub></td>
                        <td>M<sub>Dx1</sub> + M<sub>Lx1</sub> - M<sub>SX1</sub></td>
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
                        <td>P<sub>DL2</sub> + P<sub>SX2</sub> </td>
                        <td><?php echo $C4P2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>2</sub></td>
                        <td>M<sub>Dx2</sub> + M<sub>Lx2</sub> - M<sub>SX2</sub></td>
                        <td><?php echo $C4M2 ?> tonnef</td>
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
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) + 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O41max ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>21min</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) - 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O41min ?> tonnef/m <sup>2</sup></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.4.2 Presiones en la zapata 2</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12max</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) + 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O42max ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12min</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) - 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
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
                        <td>P<sub>DL1</sub></td>
                        <td><?php echo $C1PAP1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>1</sub></td>
                        <td>M<sub>Dx1</sub> + M<sub>Lx1</sub></td>
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
                        <td>P<sub>DL2</sub></td>
                        <td><?php echo $C1PAP2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>2</sub></td>
                        <td>M<sub>Dx2</sub> + M<sub>Lx2</sub></td>
                        <td><?php echo $C1PAM2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>2</sub></td>
                        <td>(P<sub>1</sub> + P<sub>2</sub> - R<sub>1</sub>) </td>
                        <td><?php echo $C1PAR2 ?> tonnef</td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.1.1 Presiones en la zapata 1</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>11max</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) + 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O11PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>11min</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) - 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O11PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.1.2 Presiones en la zapata 2</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12max</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) + 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O12PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12min</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) - 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O12PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>

                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">4.2 CASO 2: SISMO LONGITUDINAL ANTIHORARIO</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>1</sub></td>
                        <td>P<sub>DL1</sub></td>
                        <td><?php echo $C2PAP1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>1</sub></td>
                        <td>M<sub>Dx1</sub> + M<sub>Lx1</sub> - M<sub>SX1</sub></td>
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
                        <td>P<sub>DL2</sub> + P<sub>SX2</sub> </td>
                        <td><?php echo $C2PAP2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>2</sub></td>
                        <td>M<sub>Dx2</sub> + M<sub>Lx2</sub> - M<sub>SX2</sub></td>
                        <td><?php echo $C2PAM2 ?> tonnef</td>
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
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) + 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O21PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>21min</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) - 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O21PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">4.2.2 Presiones en la zapata 2</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12max</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) + 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O22PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12min</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) - 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O22PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>

                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">4.3 CASO 3: SISMO LONGITUDINAL HORARIO</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>1</sub></td>
                        <td>P<sub>DL1</sub></td>
                        <td><?php echo $C3PAP1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>1</sub></td>
                        <td>M<sub>Dx1</sub> + M<sub>Lx1</sub> - M<sub>SX1</sub></td>
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
                        <td>P<sub>DL2</sub> + P<sub>SX2</sub> </td>
                        <td><?php echo $C3PAP2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>2</sub></td>
                        <td>M<sub>Dx2</sub> + M<sub>Lx2</sub> - M<sub>SX2</sub></td>
                        <td><?php echo $C3PAM2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>2</sub></td>
                        <td>(P<sub>1</sub> + P<sub>2</sub> - R<sub>1</sub>) </td>
                        <td><?php echo $C3PAR2 ?> tonnef</td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.3.1 Presiones en la zapata 1</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>31max</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) + 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O31PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>31min</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) - 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O31PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.3.2 Presiones en la zapata 2</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>32max</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) + 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O32PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>32min</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) - 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O32PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>

                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.4 CASO 4: SISMO TRANSVERSAL</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>1</sub></td>
                        <td>P<sub>DL1</sub></td>
                        <td><?php echo $C4PAP1 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>1</sub></td>
                        <td>M<sub>Dx1</sub> + M<sub>Lx1</sub> - M<sub>SX1</sub></td>
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
                        <td>P<sub>DL2</sub> + P<sub>SX2</sub> </td>
                        <td><?php echo $C4PAP2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>M<sub>2</sub></td>
                        <td>M<sub>Dx2</sub> + M<sub>Lx2</sub> - M<sub>SX2</sub></td>
                        <td><?php echo $C4PAM2 ?> tonnef</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>R<sub>2</sub></td>
                        <td>(P<sub>1</sub> + P<sub>2</sub> - R<sub>1</sub>) </td>
                        <td><?php echo $C4PAR2 ?> tonnef</td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.2.1 Presiones en la zapata 1</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>21max</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) + 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O41PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>21min</sub></td>
                        <td>(R<sub>1</sub> * 1.05 )/(B<sub>1</sub> * L<sub>1</sub>) - 6 * (M<sub>Dy1</sub> + M<sub>Ly1</sub>)/(B<sub>1</sub><sup>2</sup> * L<sub>1</sub>)</td>
                        <td><?php echo $O41PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">3.2.2 Presiones en la zapata 2</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12max</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) + 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O42PAmax ?> tonnef/m <sup>2</sup> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>σ<sub>12min</sub></td>
                        <td>(R<sub>2</sub> * 1.05 )/(B<sub>2</sub> * L<sub>2</sub>) - 6 * (M<sub>Dy2</sub> + M<sub>Ly2</sub>)/(B<sub>2</sub><sup>2</sup> * L<sub>2</sub>)</td>
                        <td><?php echo $O42PAmin ?> tonnef/m <sup>2</sup></td>
                    </tr>

                </tbody>

            </table>
            <br><br>
        </div>

    </div>
</div>