<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Datos de Zapata combinada
    //Distancia entre ejes de columnas
    $dec = $_POST["dec"];

    //Distancia entre el limite de propiedad y el eje de la columna exterior
    $dist_limitP = $_POST["dist_limitP"];

    //Profundidad de cimentación:
    $df = $_POST["df"];

    //Dimensiones de la columna exterior
    $c1 = $_POST["c1"];
    $c2 = $_POST["c2"];

    //Dimensiones de la columna interior
    $cd1_i = $_POST["cd1_i"];
    $cd2_i = $_POST["cd2_i"];

    //Cargas en la columna exterior
    $pd1_e = $_POST["pd1_e"];
    $pl1_e = $_POST["pl1_e"];

    //Cargas en la columna interior
    $pd2_i = $_POST["pd2_i"];
    $pl2_i = $_POST["pl2_i"];

    //espesor del piso
    $e_piso = $_POST["e_piso"];
    //Sobrecarga
    $sc = $_POST["sc"];

    //Propiedades de los materiales 
    $fdc = $_POST["fdc"];
    $fy = $_POST["fy"];
    $cpn = $_POST["cpn"];
    $yc = $_POST["yc"];

    //suelo 
    $q_adm = $_POST["q_adm"];
    $ys = $_POST["ys"];

    //Peralte mínimo para Longitud de desarrollo a compresión dentro la zapata
    $dbz = $_POST["dbz"];
    $r = $_POST["r"];
    $db = $_POST["db"];
    $fc_yr = $_POST["fc_yr"];

    //Peralte adoptado
    $hz = $_POST["hz"];

    //Predimensionamiento
    $Bd = $_POST["Bd"];
    $delta = $_POST["delta"];
    $L = $_POST["L"];
    $B = $_POST["B"];

    //Presión ultima de diseño
    $hz_aprox = $_POST["hz_aprox"];

    //Verificación por cortante en 2 direcciones
    $dv = $_POST["dv"];

    //Resistencia al punzonamiento (Columna Exterior)
    $cm_of = $_POST["cm_of"];
    $as_e = $_POST["as_e"];
    $as_i = $_POST["as_i"];

    //Resistencia a cortante considerando el acero mínimo
    $pw = $_POST["pw"];
    $B_ram = $_POST["B_ram"];

    //Diseño por flexión - Acero longitudinal positivo (superior):
    $of_frf = $_POST["of_frf"];
    $dbz_sup = $_POST["dbz_sup"];
    $Nv1 = $_POST["Nv1"];
    $ec = $_POST["ec"];
    $es = $_POST["es"];

    //Acero Transversal (inferior)
    $ddbz = $_POST["ddbz"];
    $Nv1_inf = $_POST["Nv1_inf"];
    $Nv1_ext = $_POST["Nv1_ext"];
    //Desarrollo del refuerzo longitudinal

    //Desarrollo de la varilla superior sin gancho
    $yt_sup_sg = $_POST["yt_sup_sg"];
    $ye_sup_sg = $_POST["ye_sup_sg"];
    $yg_sup_sg = $_POST["yg_sup_sg"];

    //Desarrollo de la varilla superior con gancho
    $ye_sup_cg = $_POST["ye_sup_cg"];
    $yr_sup_cg = $_POST["yr_sup_cg"];
    $yo_sup_cg = $_POST["yo_sup_cg"];

    //Desarrollo de la varilla inferior sin gancho
    $yt_inf = $_POST["yt_inf"];
    $ye_inf = $_POST["ye_inf"];
    $yg_inf = $_POST["yg_inf"];
    $yr_inf = $_POST["yr_inf"];
    $ye_inf = $_POST["ye_inf"];
    $ys_inf = $_POST["ys_inf"];
    $Ktr_inf = $_POST["Ktr_inf"];

    //Desarrollo del acero transversal
    $yt_at = $_POST["yt_at"];
    $ye_at = $_POST["ye_at"];
    $yg_at = $_POST["yg_at"];

    //Transferencia de la carga axial de columna a zapata
    $lvd = $_POST["lvd"];
    $o_apls = $_POST["o_apls"];

    //CALCULOS
    $PDL1_E = $pd1_e + $pl1_e;
    $PDL2_E = $pd1_i + $pl1_i;

   






    
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
                        <td>Distancia entre ejes de columnas</td>
                        <td>δ</td>
                        <td><?php echo $dec ?> m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Distancia entre el limite de propiedad y
                            el eje de la columna exterior</td>
                        <td>Δ</td>
                        <td><?php echo $dist_limitP ?> m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Profundidad de cimentación</td>
                        <td>D<sub>f</sub></td>
                        <td><?php echo $df ?> m</td>
                        <td></td>
                    </tr>

                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Dimensiones de la columna exterior</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>>c<sub>1</sub> </td>
                        <td><?php echo $c1  ?> cm</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>c<sub>2</sub></td>
                        <td><?php echo $c2  ?> cm</td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Dimensiones de la columna interior</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>>c'<sub>1</sub> </td>
                        <td><?php echo $cd1_i  ?> cm</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>c'<sub>2</sub></td>
                        <td><?php echo $cd2_i  ?> cm</td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Cargas en la columna exterior</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>D1</sub></td>
                        <td><?php echo $pd1_e  ?> tonnef</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>L1</sub></td>
                        <td><?php echo $pl1_e  ?> tonnef</td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Cargas en la columna interior</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>D2</sub></td>
                        <td><?php echo $pd2_i  ?> tonnef</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>P<sub>L2</sub></td>
                        <td><?php echo $pl2_i  ?> tonnef</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>Espesor del piso de concreto</td>
                        <td>e<sub>piso</sub></td>
                        <td><?php echo $e_piso  ?> m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Sobrecarga</td>
                        <td>sc</td>
                        <td><?php echo $sc  ?> tonnef/m<sup>2</sup></td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Propiedades de los materiales</td>
                    </tr>
                    <tr>
                        <td>Resistencia del concreto</td>
                        <td>f'<sub>c</sub></td>
                        <td><?php echo $fdc  ?> kgf/m<sup>2</sup></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Resistencia a fluencia del
                            acero</td>
                        <td>f<sub>y</sub></td>
                        <td><?php echo $fy  ?> kgf/m<sup>2</sup></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Concreto de Peso normal</td>
                        <td>λ</td>
                        <td></td>
                        <td><?php echo $cpn  ?> kgf/m<sup>2</sup></td>
                    </tr>
                    <tr>
                        <td>Densidad del concreto</td>
                        <td>γ<sub>c</sub></td>
                        <td><?php echo $yc  ?> tonnef/m<sup>3</sup></td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Suelo</td>
                    </tr>
                    <tr>
                        <td>Capacidad admisible del
                            suelo</td>
                        <td>q<sub>adm</sub></td>
                        <td><?php echo $q_adm  ?> kgf/cm<sup>2</sup></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Densidad de suelo</td>
                        <td>γ<sub>s</sub></td>
                        <td><?php echo $ys  ?> tonnef/m<sup>3</sup></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Diámetro de la barra de la zapata</td>
                        <td>d<sub>bz</sub></td>
                        <td><?php echo $dbz  ?> in</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Recubrimiento</td>
                        <td>r</td>
                        <td><?php echo $r  ?> cm</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Diámetro de la barra de la columna</td>
                        <td>d<sub>b</sub></td>
                        <td><?php echo $db  ?> in</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Factor de confinamiento</td>
                        <td>ψ<sub>r</sub></td>
                        <td><?php echo $fc_yr  ?> </td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Predimensionamiento</td>
                    </tr>
                    <tr>
                        <td>Ancho propuesto</td>
                        <td>B'</td>
                        <td><?php echo $Bd  ?> cm</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>δ</td>
                        <td><?php echo $delta  ?>m</td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Longitudes finales adoptadas</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>L</td>
                        <td><?php echo $L  ?> m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>B</td>
                        <td><?php echo $B  ?> cm</td>
                        <td></td>
                    </tr>

                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Presión ultima de diseño</td>
                    </tr>
                    <tr>
                        <td>Peralte aproximado</td>
                        <td>h<sub>z</sub></td>
                        <td><?php echo $hz_aprox  ?> m</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Verificación por cortante en 2 direcciones</td>
                        <td>d<sub>v</sub></td>
                        <td><?php echo $dv  ?> m</td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Resistencia al punzonamiento (Columna Exterior)</td>
                    </tr>
                    <tr>
                        <td>Coeficiente de minoración</td>
                        <td>Φ<sub>c</sub></td>
                        <td><?php echo $as_e  ?> </td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Resistencia al punzonamiento (Columna interior)</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>α<sub>s</sub></td>
                        <td><?php echo $as_i  ?> </td>
                        <td></td>
                    </tr>

                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Resistencia a cortante considerando el acero mínimo</td>
                    </tr>
                    <tr>
                        <td>Cuantía colocada en tracción</td>
                        <td>ρ<sub>w</sub></td>
                        <td><?php echo $pw  ?> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>B</td>
                        <td><?php echo $B_ram  ?> in</td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Resistencia a cortante considerando el acero mínimo</td>
                    </tr>
                    <tr>
                        <td>Factor de Reducción por flexión</td>
                        <td>Φ<sub>f</sub></td>
                        <td><?php echo $of_frf  ?> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Diámetro de la barra</td>
                        <td>d<sub>bz</sub></td>
                        <td><?php echo $dbz_sup  ?> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Numero de barras adoptado</td>
                        <td>N<sub>v1</sub></td>
                        <td><?php echo $Nv1  ?> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Deformación máxima útil del
                            concreto no confinado</td>
                        <td>ε<sub>c</sub></td>
                        <td><?php echo $ec  ?> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Modulo de elasticidad del
                            acero</td>
                        <td>E<sub>s</sub></td>
                        <td><?php echo $es  ?> </td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Resistencia a cortante considerando el acero mínimo</td>
                    </tr>
                    <tr>
                        <td>Diámetro de la barra</td>
                        <td>d'<sub>bz</sub></td>
                        <td><?php echo $ddbz  ?> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Numero de barras adoptado columna interior</td>
                        <td>N<sub>v1</sub></td>
                        <td><?php echo $Nv1_inf  ?> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Numero de barras adoptado columna exterior</td>
                        <td>N<sub>v1</sub></td>
                        <td><?php echo $Nv1_ext  ?> </td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Desarrollo de la varilla superior sin gancho</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ψ<sub>t</sub></td>
                        <td><?php echo $yt_sup_sg  ?> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ψ<sub>e</sub></td>
                        <td><?php echo $ye_sup_sg  ?> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ψ<sub>g</sub></td>
                        <td><?php echo $ye_sup_sg  ?> </td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Desarrollo de la varilla superior con gancho</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ψ<sub>e</sub></td>
                        <td><?php echo $ye_sup_cg  ?> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ψ<sub>r</sub></td>
                        <td><?php echo $yr_sup_cg  ?> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ψ<sub>o</sub></td>
                        <td><?php echo $yo_sup_cg  ?> </td>
                        <td></td>
                    </tr>
                    <tr style="font-size: 13px; background-color: #a6b7c9; color: white; font-weight: bold;">
                        <td colspan="4">Desarrollo de la varilla superior con gancho</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ψ<sub>e</sub></td>
                        <td><?php echo $ye_sup_sg  ?> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ψ<sub>e</sub></td>
                        <td><?php echo $ye_sup_sg  ?> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ψ<sub>e</sub></td>
                        <td><?php echo $ye_sup_sg  ?> </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>ψ<sub>e</sub></td>
                        <td><?php echo $ye_sup_sg  ?> </td>
                        <td></td>
                    </tr>



                </tbody>


                <thead style="font-size: 13px; background-color: #4e5c77; color: white;">
                    <tr>
                        <th colspan="2">2. ANALISIS Y DISEÑO DE UNA ZAPATA CONECTADA SEGUN ACI 318-19</th>
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