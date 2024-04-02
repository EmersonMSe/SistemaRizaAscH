<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario POST y convertirlos a números enteros
    $name_tributaria_area = floatval($_POST["tributaria_area"]);
    $name_area_tributaria = floatval($_POST["area_tributaria"]);
    $name_angulo_inclinacion = floatval($_POST["angulo_inclinacion"]);
    $name_inclinacion_horizontal = floatval($_POST["inclinacion_horizontal"]);
    $name_carga_muerta = floatval($_POST["carga_muerta"]);
    $name_carga_viva = floatval($_POST["carga_viva"]);
    // $name_estimacion_viento = floatval($_POST["estimacion_viento"]);
    // $name_carga_viento = floatval($_POST["carga_viento"]);
    $name_viento_carga = strval($_POST["viento_carga"]);
    $name_viento_carg = strval($_POST["viento_carg"]);
    $name_anguloinclinac_ion = strval($_POST["anguloinclinac_ion"]);
    $QS = floatval($_POST["QS"]);
    $imagen_portada = $_FILES['logo_pro']['tmp_name'];
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
        // Calcula algunas fórmulas simples con los datos del formulario
        $resultado1 = $name_tributaria_area * $name_area_tributaria; // Área tributaria - nudo interior: 
        $resultado2 = $name_tributaria_area * $name_area_tributaria / 2; // Área tributaria - nudo exterior: 
        $resultado3 = 2 * $name_inclinacion_horizontal; // Longitud total centro del claro:
        $resultado4 = round(rad2deg(atan($name_angulo_inclinacion / $name_inclinacion_horizontal)), 3); // Longitud total centro del claro:
        $resultado5 = $resultado1 * $name_carga_muerta; //Carga permanente- nudo interior
        $resultado6 = $resultado2 * $name_carga_muerta; //Carga permanente- nudo exterior
        $resultado7 = $resultado1 * $name_carga_viva; //Carga viva- nudo interior:
        $resultado8 = $resultado2 * $name_carga_viva; //Carga viva- nudo interior:
        $name_H = floatval($_POST["H"]);
        $name_V = floatval($_POST["V"]);

        $Vh = round($name_V * pow(($name_H / 10), 0.22), 3);

    ?>
        <h2 style="font-weight: bold; text-align: center;"><u>CARGAS SOBRE UNA COBERTURA METÁLICA</u></h2>
        <?php
        if (!empty($_FILES['logo_pro']['tmp_name'])) {
            $imagen_portada_tmp = $_FILES['logo_pro']['tmp_name'];

            // Obtener los datos binarios de la imagen
            $imagen_portada_binaria = file_get_contents($imagen_portada_tmp);

            // Codificar la imagen en formato base64
            $imagen_portada_base64 = base64_encode($imagen_portada_binaria);

            // Mostrar la imagen cargada
            echo '<div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <img src="data:image/jpeg;base64,' . $imagen_portada_base64 . '" alt="imagen" class="img-fluid mt-2">
                </div>
            </div>
          </div>';
        } else {
            echo 'No se ha subido ninguna imagen.';
        }
        ?>

        <!-- areas tributarias -->
        <h5 class="text-primary" style="font-weight: bold; text-align: left;"><u>1. CARGAS NODALES</u></h5>
        <h7 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.1. ÁREA TRIBUTARIA</h7>
        <center>
            <table post="1">
                <div class="tabla-container">
                    <tr>
                        <td style="font-weight: bold">Ancho tributario &nbsp;&nbsp;</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>At = <?php echo $name_tributaria_area; ?>&nbsp;&nbsp;<label for="" class="text-blue">m</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Ancho tributario entre montantes&nbsp;&nbsp;</td>
                        <td style="font-weight: bold">:</td>
                        <td>At_m = <?php echo $name_area_tributaria; ?>&nbsp;&nbsp;<label for="" class="text-blue">m</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Área tributaria - nudo interior&nbsp;&nbsp;</td>
                        <td style="font-weight: bold">:</td>
                        <td>Atr1≔At ⋅ At_m =&nbsp;&nbsp;<?php echo $resultado1; ?>&nbsp;&nbsp;<label for="" class="text-blue">m² </label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Área tributaria - nudo exterior &nbsp;&nbsp;</td>
                        <td style="font-weight: bold">:</td>
                        <td>Atr2≔(At ⋅ At_m) / 2 =&nbsp;&nbsp;<?php echo $resultado2; ?>&nbsp;&nbsp;<label for="" class="text-blue">m² </label></td>
                    </tr>
                </div>
            </table>
        </center>
        <br>
        <!-- angulo de inclinacion -->
        <h7 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.2. ÁNGULO DE INCLINACION CON RESPECTO A LA HORIZONTAL</h7>
        <center>
            <table post="3">
                <tr>
                    <td style="font-weight: bold">Altura de la cobertura:</td>
                    <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>h=<?php echo $name_angulo_inclinacion; ?> &nbsp;&nbsp;<label for="" class="text-blue">m </label></td>
                </tr>
                <tr>
                    <td style="font-weight: bold">Longitud hasta centro de luz del claro:</td>
                    <td style="font-weight: bold">:</td>
                    <td>LCL=<?php echo $name_inclinacion_horizontal; ?> &nbsp;&nbsp;<label for="" class="text-blue">m </label></td>
                </tr>
                <tr>
                    <td style="font-weight: bold">Longitud total centro del claro:</td>
                    <td style="font-weight: bold">:</td>
                    <td>L≔2⋅LCL=<?php echo $resultado3; ?> &nbsp;&nbsp;<label for="" class="text-blue">m </label></td>
                </tr>
                <tr>
                    <td style="font-weight: bold">Ángulo de inclinación de la cubierta:</td>
                    <td style="font-weight: bold">:</td>
                    <td>θ≔atan ( h / Lcl) = <?php echo $resultado4; ?>&nbsp;&nbsp;<label for="" class="text-blue">° deg</label></td>
                </tr>
            </table>
        </center>
        <br>
        <!-- estimacion de carga muerta -->
        <h7 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.3. ESTIMACION DE LA CARGA MUERTA</h7>
        <center>
            <table post="3" style="font-weight: bold; text-align: left;">
                <tr>
                    <td style="font-weight: bold">Peso propio (incluye correas, cobertura, etc.)</td>
                    <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>Pp=<?php echo $name_carga_muerta; ?> &nbsp;&nbsp;<label for="" class="text-blue">m </label></td>
                </tr>
                <tr>
                    <td style="font-weight: bold">Carga permanente- nudo interior</td>
                    <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>CMi≔Atr1 ⋅Pp= <?php echo $resultado5; ?>&nbsp;&nbsp;<label for="" class="text-blue">m </label></td>
                </tr>
                <tr>
                    <td style="font-weight: bold">Carga permanente- nudo interior:</td>
                    <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>CMi≔Atr2 ⋅Pp= <?php echo $resultado6; ?>&nbsp;&nbsp;<label for="" class="text-blue">kgf </label></td>
                </tr>
            </table>
        </center>
        <br>
        <!-- estimacion de carga viva -->
        <h7 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.4. ESTIMACION DE LA CARGA VIVA</h7>
        <center>
            <table post="5">
                <tr>
                    <td style="font-weight: bold">Carga viva (E.020)</td>
                    <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>Cv= <?php echo $name_carga_viva; ?> &nbsp;&nbsp;<label for="" class="text-blue">kgf</label></td>
                </tr>
                <tr>
                    <td style="font-weight: bold">Carga viva- nudo interior</td>
                    <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>CVi≔Atr1 ⋅Cv= <?php echo $resultado7; ?> &nbsp;&nbsp;<label for="" class="text-blue">kgf</label></td>
                </tr>
                <tr>
                    <td style="font-weight: bold">Carga viva- nudo exterior</td>
                    <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>CVe≔Atr2 ⋅Cv= <?php echo $resultado8; ?>&nbsp;&nbsp;<label for="" class="text-blue">kgf</label></td>
                </tr>
            </table>
        </center>
        <br>
        <!-- estimacion de la carga de viento -->
        <h7 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5. ESTIMACION DE LA CARGA DE VIENTO</h7><br>
        <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.1. VELOCIDAD DE DISEÑO</h8><br>
        <center>
            <table post="6">
                <tr>
                    <td style="font-weight: bold">Altura o elevación de la estructura</td>
                    <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>H≔ <?php echo $name_H; ?>&nbsp;&nbsp;<label for="" class="text-blue">km/hr</label></td>
                </tr>
                <tr>
                    <td style="font-weight: bold">Velocidad de diseño hasta 10m de altura</td>
                    <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>V≔ <?php echo $name_V; ?>&nbsp;&nbsp;<label for="" class="text-blue">km/hr</label></td>
                </tr>
                <tr>
                    <td style="font-weight: bold">Velocidad de diseño en la altura h</td>
                    <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>Vh≔(V.(H/10)*0.22)= <?php echo $Vh; ?>&nbsp;&nbsp;<label for="" class="text-blue">km/hr</label></td>
                </tr>
            </table>
        </center>
        <br>
        <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.2. CARGA EXTERIOR DE VIENTO</h8><br>
        <?php
        $template = ''; // Inicializa la variable $template
        if ($name_viento_carga == "sve") {
            $C1 = 0.8;
            $C2 = 0;
            $C3 = -0.6;
            $resultado10 = round(0.005 * $C1 * pow($Vh, 2), 1);
            $resultado11 = round(0.005 * $C2 * pow($Vh, 2), 1);
            $resultado12 = round(0.005 * $C3 * pow($Vh, 2), 1);
            // Calcular el ángulo en grados
            $anguloTeta = round(rad2deg(atan($name_angulo_inclinacion / $name_inclinacion_horizontal)), 3);

            // Convertir el ángulo a radianes
            $anguloTetaRad = deg2rad($anguloTeta);

            // Calcular el seno
            $seno = sin($anguloTetaRad);
            //calcular el coseno
            $coseno = cos($anguloTetaRad);

            //Barlovento - Presión 
            // Calcular nudos en X
            $nivi1 = round($Vini1 * $seno, 0);
            $nive1 = round($Vine1 * $seno, 0);

            // Calcular nudos en Y
            $nivi1cs = round($Vini1 * $coseno, 0);
            $nive1cs = round($Vini1 * $coseno, 0);

            //Barlovento - Succión
            // Calcular nudos en X
            $nivi2 = round($Vini2 * $seno, 0);
            $nive2 = round($Vine2 * $seno, 0);

            // Calcular nudos en Y
            $nivi2cs = round($Vini2 * $coseno, 0);
            $nive2cs = round($Vine2 * $coseno, 0);

            //Sotavento - Succión
            // Calcular nudos en X
            $nivi3 = round($Vini3 * $seno, 0);
            $nive3 = round($Vine3 * $seno, 0);

            // Calcular nudos en Y
            $nivi3cs = round($Vini3 * $coseno, 0);
            $nive3cs = round($Vine3 * $coseno, 0);

            // Construye la tabla dentro de la variable $template
            $template = '<center>
                <table post="6">
                    <tr>
                        <td style="font-weight: bold">Barlovento - Presión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C1= ' . $C1 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Barlovento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C2= ' . $C2 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Sotavento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C3= ' . $C3 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                </table>
            </center>
            <br>
            <h6>Presión o Succión del viento a una altura "h":  </h6>
            <br>
            <center>
                <table class="table table-bordered">
                    <tr>
                        <td style="font-weight: bold">CONSTRUCCION</td>
                        <td style="font-weight: bold">BARLOVENTO</td>
                        <td style="font-weight: bold">SOTAVENTO</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales de edificion</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0.6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Anuncios,Muros aislados, elementos con una dimension corta en la direccion del viento</td>
                        <td style="font-weight: normal">+1.5</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion circular o eliptica</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion Cuadrada  o rectangular</td>
                        <td style="font-weight: normal">+2,0</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Arcos y cubiertas cilindricas con un ángulo de inclinacion que no exceda 45°</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,5</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas a 15° o menos</td>
                        <td style="font-weight: normal">+0,3 - 0.7</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas entre 60° y la vertical</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales ó inclinadas (planas ó curvas) paralelas a la direccion del viento</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">-0,7</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="font-weight: normal">* El signo positivo indica presión y el negativo succion</td>
                    </tr>
                </table>
            </center>
            <br>
            <center>
                <table>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph1= 0.005 kgf/m2 . C1 (Vh . hr/km)2=' . $resultado10 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph2= 0.005 kgf/m2 . C2 (Vh . hr/km)2=' . $resultado11 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph3= 0.005 kgf/m2 . C3 (Vh . hr/km)2=' . $resultado12 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                </table> 
            </center>
            <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.3. CARGA DE VIENTO SOBRE LOS NUDOS</h8> <br>
            <pre>
                    <!-- barlovento presion -->
                    <label for="">Barlovento - Presión</label>
                    <label for="">(nudo interior): Vini1≔Atr1 ⋅Ph1=' . $Vini1 . ' kgf</label>
                    <label for="">(nudo exterior): Vine1≔Atr2 ⋅Ph1=' . $Vine1 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi1 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi1cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive1 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive1cs . ' kgf</td>
                        </tr>
                    </table>
                    <!-- barlovento -->
                    <label for="">Barlovento - Succión</label>
                    <label for="">(nudo interior): Vini2≔Atr1 ⋅Ph2=' . $Vini2 . ' kgf</label>
                    <label for="">(nudo exterior): Vine2≔Atr2 ⋅Ph2=' . $Vine2 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi2 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi2cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive2 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive2cs . ' kgf</td>
                        </tr>
                    </table>

                    <!-- sotavento -->
                    <label for="">Sotavento - Succión</label>
                    <label for="">(nudo interior): Vini3≔Atr1 ⋅Ph3=' . $Vini3 . '</label>
                    <label for="">(nudo exterior): Vine3≔Atr2 ⋅Ph3=' . $Vine3 . ' kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi3 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi3cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive3 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive3cs . ' kgf</td>
                        </tr>
                    </table>
            </pre>';
            // Imprime la tabla
            echo $template;
        } else if ($name_viento_carga == "amae") {
            // AMAE
            $C1 = 1.5; // Corregido: Asigna el valor de C1 en el bloque "amae"
            $C2 = 0;
            $C3 = 0;
            $resultado10 = round(0.005 * $C1 * pow($Vh, 2), 1);
            $resultado11 = round(0.005 * $C2 * pow($Vh, 2), 1);
            $resultado12 = round(0.005 * $C3 * pow($Vh, 2), 1);

            // Calcular el ángulo en grados
            $anguloTeta = round(rad2deg(atan($name_angulo_inclinacion / $name_inclinacion_horizontal)), 3);

            // Convertir el ángulo a radianes
            $anguloTetaRad = deg2rad($anguloTeta);

            // Calcular el seno
            $seno = sin($anguloTetaRad);
            //calcular el coseno
            $coseno = cos($anguloTetaRad);

            //Barlovento - Presión 
            // Calcular nudos en X
            $nivi1 = round($Vini1 * $seno, 0);
            $nive1 = round($Vine1 * $seno, 0);

            // Calcular nudos en Y
            $nivi1cs = round($Vini1 * $coseno, 0);
            $nive1cs = round($Vini1 * $coseno, 0);

            //Barlovento - Succión
            // Calcular nudos en X
            $nivi2 = round($Vini2 * $seno, 0);
            $nive2 = round($Vine2 * $seno, 0);

            // Calcular nudos en Y
            $nivi2cs = round($Vini2 * $coseno, 0);
            $nive2cs = round($Vine2 * $coseno, 0);

            //Sotavento - Succión
            // Calcular nudos en X
            $nivi3 = round($Vini3 * $seno, 0);
            $nive3 = round($Vine3 * $seno, 0);

            // Calcular nudos en Y
            $nivi3cs = round($Vini3 * $coseno, 0);
            $nive3cs = round($Vine3 * $coseno, 0);

            // Construye la tabla dentro de la variable $template
            $template = '<center>
                <table post="6">
                    <tr>
                        <td style="font-weight: bold">Barlovento - Presión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C1= ' . $C1 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Barlovento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C2= ' . $C2 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Sotavento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C3= ' . $C3 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                </table>
            </center>
            <br>
            <h6>Presión o Succión del viento a una altura "h":  </h6>
            <br>
            <center>
                <table class="table table-bordered">
                    <tr>
                        <td style="font-weight: bold">CONSTRUCCION</td>
                        <td style="font-weight: bold">BARLOVENTO</td>
                        <td style="font-weight: bold">SOTAVENTO</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales de edificion</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0.6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Anuncios,Muros aislados, elementos con una dimension corta en la direccion del viento</td>
                        <td style="font-weight: normal">+1.5</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion circular o eliptica</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion Cuadrada  o rectangular</td>
                        <td style="font-weight: normal">+2,0</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Arcos y cubiertas cilindricas con un ángulo de inclinacion que no exceda 45°</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,5</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas a 15° o menos</td>
                        <td style="font-weight: normal">+0,3 - 0.7</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas entre 60° y la vertical</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales ó inclinadas (planas ó curvas) paralelas a la direccion del viento</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">-0,7</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="font-weight: normal">* El signo positivo indica presión y el negativo succion</td>
                    </tr>
                </table>
            </center>
            <br>
            <center>
                <table>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph1= 0.005 kgf/m2 . C1 (Vh . hr/km)2=' . $resultado10 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph2= 0.005 kgf/m2 . C2 (Vh . hr/km)2=' . $resultado11 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph3= 0.005 kgf/m2 . C3 (Vh . hr/km)2=' . $resultado12 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                </table> 
            </center>
            <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.3. CARGA DE VIENTO SOBRE LOS NUDOS</h8> <br>
            <pre>
                    <!-- barlovento presion -->
                    <label for="">Barlovento - Presión</label>
                    <label for="">(nudo interior): Vini1≔Atr1 ⋅Ph1=122 kgf</label>
                    <label for="">(nudo exterior): Vine1≔Atr2 ⋅Ph1=61 kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=68 kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=101 kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=34 kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=51 kgf</td>
                        </tr>
                    </table>
                    <!-- barlovento -->
                    <label for="">Barlovento - Succión</label>
                    <label for="">(nudo interior): Vini2≔Atr1 ⋅Ph2=-52 kgf</label>
                    <label for="">(nudo exterior): Vine2≔Atr2 ⋅Ph2=-26 kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=68 kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=101 kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=34 kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=51 kgf</td>
                        </tr>
                    </table>
                    <!-- sotavento -->
                    <label for="">Sotavento - Succión</label>
                    <label for="">(nudo interior): Vini3≔Atr1 ⋅Ph3=-104</label>
                    <label for="">(nudo exterior): Vine3≔Atr2 ⋅Ph3=-52 kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=68 kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=101 kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=34 kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=51 kgf</td>
                        </tr>
                    </table>
            </pre>';
            // Imprime la tabla
            echo $template;
        } else if ($name_viento_carga == "tasr") {
            $C1 = "0.7";
            $C2 = "0";
            $C3 = "0";
            $resultado10 = round(0.005 * $C1 * pow(($Vh), 2), 1);
            $resultado11 = round(0.005 * $C2 * pow(($Vh), 2), 1);
            $resultado12 = round(0.005 * $C3 * pow(($Vh), 2), 1);

            // Calcular el ángulo en grados
            $anguloTeta = round(rad2deg(atan($name_angulo_inclinacion / $name_inclinacion_horizontal)), 3);

            // Convertir el ángulo a radianes
            $anguloTetaRad = deg2rad($anguloTeta);

            // Calcular el seno
            $seno = sin($anguloTetaRad);
            //calcular el coseno
            $coseno = cos($anguloTetaRad);

            //Barlovento - Presión 
            // Calcular nudos en X
            $nivi1 = round($Vini1 * $seno, 0);
            $nive1 = round($Vine1 * $seno, 0);

            // Calcular nudos en Y
            $nivi1cs = round($Vini1 * $coseno, 0);
            $nive1cs = round($Vini1 * $coseno, 0);

            //Barlovento - Succión
            // Calcular nudos en X
            $nivi2 = round($Vini2 * $seno, 0);
            $nive2 = round($Vine2 * $seno, 0);

            // Calcular nudos en Y
            $nivi2cs = round($Vini2 * $coseno, 0);
            $nive2cs = round($Vine2 * $coseno, 0);

            //Sotavento - Succión
            // Calcular nudos en X
            $nivi3 = round($Vini3 * $seno, 0);
            $nive3 = round($Vine3 * $seno, 0);

            // Calcular nudos en Y
            $nivi3cs = round($Vini3 * $coseno, 0);
            $nive3cs = round($Vine3 * $coseno, 0);

            $template = '<center>
                <table post="6">
                    <tr>
                        <td style="font-weight: bold">Barlovento - Presión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C1= ' . $C1 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Barlovento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C2= ' . $C2 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Sotavento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C3= ' . $C3 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                </table>
            </center>
            <br>
            <h6>Presión o Succión del viento a una altura "h":  </h6>
            <br>
            <center>
                <table class="table table-bordered">
                    <tr>
                        <td style="font-weight: bold">CONSTRUCCION</td>
                        <td style="font-weight: bold">BARLOVENTO</td>
                        <td style="font-weight: bold">SOTAVENTO</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales de edificion</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0.6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Anuncios,Muros aislados, elementos con una dimension corta en la direccion del viento</td>
                        <td style="font-weight: normal">+1.5</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion circular o eliptica</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion Cuadrada  o rectangular</td>
                        <td style="font-weight: normal">+2,0</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Arcos y cubiertas cilindricas con un ángulo de inclinacion que no exceda 45°</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,5</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas a 15° o menos</td>
                        <td style="font-weight: normal">+0,3 - 0.7</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas entre 60° y la vertical</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales ó inclinadas (planas ó curvas) paralelas a la direccion del viento</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">-0,7</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="font-weight: normal">* El signo positivo indica presión y el negativo succion</td>
                    </tr>
                </table>
            </center>
            <br>
            <center>
                <table>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph1= 0.005 kgf/m2 . C1 (Vh . hr/km)2=' . $resultado10 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph2= 0.005 kgf/m2 . C2 (Vh . hr/km)2=' . $resultado11 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph3= 0.005 kgf/m2 . C3 (Vh . hr/km)2=' . $resultado12 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                </table> 
            </center>
            <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.3. CARGA DE VIENTO SOBRE LOS NUDOS</h8> <br>
            <pre>
                    <!-- barlovento presion -->
                    <label for="">Barlovento - Presión</label>
                    <label for="">(nudo interior): Vini1≔Atr1 ⋅Ph1=' . $Vini1 . ' kgf</label>
                    <label for="">(nudo exterior): Vine1≔Atr2 ⋅Ph1=' . $Vine1 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi1 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi1cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive1 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive1cs . ' kgf</td>
                        </tr>
                    </table>
                    <!-- barlovento -->
                    <label for="">Barlovento - Succión</label>
                    <label for="">(nudo interior): Vini2≔Atr1 ⋅Ph2=' . $Vini2 . ' kgf</label>
                    <label for="">(nudo exterior): Vine2≔Atr2 ⋅Ph2=' . $Vine2 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi2 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi2cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive2 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive2cs . ' kgf</td>
                        </tr>
                    </table>

                    <!-- sotavento -->
                    <label for="">Sotavento - Succión</label>
                    <label for="">(nudo interior): Vini3≔Atr1 ⋅Ph3=' . $Vini3 . '</label>
                    <label for="">(nudo exterior): Vine3≔Atr2 ⋅Ph3=' . $Vine3 . ' kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi3 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi3cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive3 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive3cs . ' kgf</td>
                        </tr>
                    </table>
            </pre>';
            echo $template;
        } else if ($name_viento_carga == "tasc") {
            $C1 = "0.2";
            $C2 = "0";
            $C3 = "0";
            $resultado10 = round(0.005 * $C1 * pow(($Vh), 2), 1);
            $resultado11 = round(0.005 * $C2 * pow(($Vh), 2), 1);
            $resultado12 = round(0.005 * $C3 * pow(($Vh), 2), 1);

            // Calcular el ángulo en grados
            $anguloTeta = round(rad2deg(atan($name_angulo_inclinacion / $name_inclinacion_horizontal)), 3);

            // Convertir el ángulo a radianes
            $anguloTetaRad = deg2rad($anguloTeta);

            // Calcular el seno
            $seno = sin($anguloTetaRad);
            //calcular el coseno
            $coseno = cos($anguloTetaRad);

            //Barlovento - Presión 
            // Calcular nudos en X
            $nivi1 = round($Vini1 * $seno, 0);
            $nive1 = round($Vine1 * $seno, 0);

            // Calcular nudos en Y
            $nivi1cs = round($Vini1 * $coseno, 0);
            $nive1cs = round($Vini1 * $coseno, 0);

            //Barlovento - Succión
            // Calcular nudos en X
            $nivi2 = round($Vini2 * $seno, 0);
            $nive2 = round($Vine2 * $seno, 0);

            // Calcular nudos en Y
            $nivi2cs = round($Vini2 * $coseno, 0);
            $nive2cs = round($Vine2 * $coseno, 0);

            //Sotavento - Succión
            // Calcular nudos en X
            $nivi3 = round($Vini3 * $seno, 0);
            $nive3 = round($Vine3 * $seno, 0);

            // Calcular nudos en Y
            $nivi3cs = round($Vini3 * $coseno, 0);
            $nive3cs = round($Vine3 * $coseno, 0);

            $template = '<center>
                <table post="6">
                    <tr>
                        <td style="font-weight: bold">Barlovento - Presión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C1= ' . $C1 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Barlovento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C2= ' . $C2 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Sotavento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C3= ' . $C3 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                </table>
            </center>
            <br>
            <h6>Presión o Succión del viento a una altura "h":  </h6>
            <br>
            <center>
                <table class="table table-bordered">
                    <tr>
                        <td style="font-weight: bold">CONSTRUCCION</td>
                        <td style="font-weight: bold">BARLOVENTO</td>
                        <td style="font-weight: bold">SOTAVENTO</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales de edificion</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0.6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Anuncios,Muros aislados, elementos con una dimension corta en la direccion del viento</td>
                        <td style="font-weight: normal">+1.5</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion circular o eliptica</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion Cuadrada  o rectangular</td>
                        <td style="font-weight: normal">+2,0</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Arcos y cubiertas cilindricas con un ángulo de inclinacion que no exceda 45°</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,5</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas a 15° o menos</td>
                        <td style="font-weight: normal">+0,3 - 0.7</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas entre 60° y la vertical</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales ó inclinadas (planas ó curvas) paralelas a la direccion del viento</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">-0,7</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="font-weight: normal">* El signo positivo indica presión y el negativo succion</td>
                    </tr>
                </table>
            </center>
            <br>
            <center>
                <table>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph1= 0.005 kgf/m2 . C1 (Vh . hr/km)2=' . $resultado10 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph2= 0.005 kgf/m2 . C2 (Vh . hr/km)2=' . $resultado11 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph3= 0.005 kgf/m2 . C3 (Vh . hr/km)2=' . $resultado12 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                </table> 
            </center>
            <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.3. CARGA DE VIENTO SOBRE LOS NUDOS</h8> <br>
            <pre>
                    <!-- barlovento presion -->
                    <label for="">Barlovento - Presión</label>
                    <label for="">(nudo interior): Vini1≔Atr1 ⋅Ph1=' . $Vini1 . ' kgf</label>
                    <label for="">(nudo exterior): Vine1≔Atr2 ⋅Ph1=' . $Vine1 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi1 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi1cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive1 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive1cs . ' kgf</td>
                        </tr>
                    </table>
                    <!-- barlovento -->
                    <label for="">Barlovento - Succión</label>
                    <label for="">(nudo interior): Vini2≔Atr1 ⋅Ph2=' . $Vini2 . ' kgf</label>
                    <label for="">(nudo exterior): Vine2≔Atr2 ⋅Ph2=' . $Vine2 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi2 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi2cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive2 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive2cs . ' kgf</td>
                        </tr>
                    </table>

                    <!-- sotavento -->
                    <label for="">Sotavento - Succión</label>
                    <label for="">(nudo interior): Vini3≔Atr1 ⋅Ph3=' . $Vini3 . '</label>
                    <label for="">(nudo exterior): Vine3≔Atr2 ⋅Ph3=' . $Vine3 . ' kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi3 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi3cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive3 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive3cs . ' kgf</td>
                        </tr>
                    </table>
            </pre>';
            echo $template;
        } else if ($name_viento_carga == "ace") {
            // ace
            $C1 = "0.8";
            $C2 = "0";
            $C3 = "-0.5";
            $resultado10 = round(0.005 * $C1 * pow(($Vh), 2), 1);
            $resultado11 = round(0.005 * $C2 * pow(($Vh), 2), 1);
            $resultado12 = round(0.005 * $C3 * pow(($Vh), 2), 1);

            // Calcular el ángulo en grados
            $anguloTeta = round(rad2deg(atan($name_angulo_inclinacion / $name_inclinacion_horizontal)), 3);

            // Convertir el ángulo a radianes
            $anguloTetaRad = deg2rad($anguloTeta);

            // Calcular el seno
            $seno = sin($anguloTetaRad);
            //calcular el coseno
            $coseno = cos($anguloTetaRad);

            //Barlovento - Presión 
            // Calcular nudos en X
            $nivi1 = round($Vini1 * $seno, 0);
            $nive1 = round($Vine1 * $seno, 0);

            // Calcular nudos en Y
            $nivi1cs = round($Vini1 * $coseno, 0);
            $nive1cs = round($Vini1 * $coseno, 0);

            //Barlovento - Succión
            // Calcular nudos en X
            $nivi2 = round($Vini2 * $seno, 0);
            $nive2 = round($Vine2 * $seno, 0);

            // Calcular nudos en Y
            $nivi2cs = round($Vini2 * $coseno, 0);
            $nive2cs = round($Vine2 * $coseno, 0);

            //Sotavento - Succión
            // Calcular nudos en X
            $nivi3 = round($Vini3 * $seno, 0);
            $nive3 = round($Vine3 * $seno, 0);

            // Calcular nudos en Y
            $nivi3cs = round($Vini3 * $coseno, 0);
            $nive3cs = round($Vine3 * $coseno, 0);

            $template = '<center>
                <table post="6">
                    <tr>
                        <td style="font-weight: bold">Barlovento - Presión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C1= ' . $C1 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Barlovento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C2= ' . $C2 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Sotavento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C3= ' . $C3 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                </table>
            </center>
            <br>
            <h6>Presión o Succión del viento a una altura "h":  </h6>
            <br>
            <center>
                <table class="table table-bordered">
                    <tr>
                        <td style="font-weight: bold">CONSTRUCCION</td>
                        <td style="font-weight: bold">BARLOVENTO</td>
                        <td style="font-weight: bold">SOTAVENTO</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales de edificion</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0.6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Anuncios,Muros aislados, elementos con una dimension corta en la direccion del viento</td>
                        <td style="font-weight: normal">+1.5</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion circular o eliptica</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion Cuadrada  o rectangular</td>
                        <td style="font-weight: normal">+2,0</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Arcos y cubiertas cilindricas con un ángulo de inclinacion que no exceda 45°</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,5</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas a 15° o menos</td>
                        <td style="font-weight: normal">+0,3 - 0.7</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas entre 60° y la vertical</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales ó inclinadas (planas ó curvas) paralelas a la direccion del viento</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">-0,7</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="font-weight: normal">* El signo positivo indica presión y el negativo succion</td>
                    </tr>
                </table>
            </center>
            <br>
            <center>
                <table>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph1= 0.005 kgf/m2 . C1 (Vh . hr/km)2=' . $resultado10 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph2= 0.005 kgf/m2 . C2 (Vh . hr/km)2=' . $resultado11 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph3= 0.005 kgf/m2 . C3 (Vh . hr/km)2=' . $resultado12 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                </table> 
            </center>
            <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.3. CARGA DE VIENTO SOBRE LOS NUDOS</h8> <br>
            <pre>
                    <!-- barlovento presion -->
                    <label for="">Barlovento - Presión</label>
                    <label for="">(nudo interior): Vini1≔Atr1 ⋅Ph1=' . $Vini1 . ' kgf</label>
                    <label for="">(nudo exterior): Vine1≔Atr2 ⋅Ph1=' . $Vine1 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi1 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi1cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive1 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive1cs . ' kgf</td>
                        </tr>
                    </table>
                    <!-- barlovento -->
                    <label for="">Barlovento - Succión</label>
                    <label for="">(nudo interior): Vini2≔Atr1 ⋅Ph2=' . $Vini2 . ' kgf</label>
                    <label for="">(nudo exterior): Vine2≔Atr2 ⋅Ph2=' . $Vine2 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi2 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi2cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive2 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive2cs . ' kgf</td>
                        </tr>
                    </table>

                    <!-- sotavento -->
                    <label for="">Sotavento - Succión</label>
                    <label for="">(nudo interior): Vini3≔Atr1 ⋅Ph3=' . $Vini3 . '</label>
                    <label for="">(nudo exterior): Vine3≔Atr2 ⋅Ph3=' . $Vine3 . ' kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi3 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi3cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive3 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive3cs . ' kgf</td>
                        </tr>
                    </table>
            </pre>';
            echo $template;
        } else if ($name_viento_carga == "sim") {
            $C1 = "0.3";
            $C2 = "-0.7";
            $C3 = "-0.6";
            $resultado10 = round(0.005 * $C1 * pow(($Vh), 2), 1);
            $resultado11 = round(0.005 * $C2 * pow(($Vh), 2), 1);
            $resultado12 = round(0.005 * $C3 * pow(($Vh), 2), 1);

            // Calcular el ángulo en grados
            $anguloTeta = round(rad2deg(atan($name_angulo_inclinacion / $name_inclinacion_horizontal)), 3);

            // Convertir el ángulo a radianes
            $anguloTetaRad = deg2rad($anguloTeta);

            // Calcular el seno
            $seno = sin($anguloTetaRad);
            //calcular el coseno
            $coseno = cos($anguloTetaRad);

            //Barlovento - Presión 
            // Calcular nudos en X
            $nivi1 = round($Vini1 * $seno, 0);
            $nive1 = round($Vine1 * $seno, 0);

            // Calcular nudos en Y
            $nivi1cs = round($Vini1 * $coseno, 0);
            $nive1cs = round($Vini1 * $coseno, 0);

            //Barlovento - Succión
            // Calcular nudos en X
            $nivi2 = round($Vini2 * $seno, 0);
            $nive2 = round($Vine2 * $seno, 0);

            // Calcular nudos en Y
            $nivi2cs = round($Vini2 * $coseno, 0);
            $nive2cs = round($Vine2 * $coseno, 0);

            //Sotavento - Succión
            // Calcular nudos en X
            $nivi3 = round($Vini3 * $seno, 0);
            $nive3 = round($Vine3 * $seno, 0);

            // Calcular nudos en Y
            $nivi3cs = round($Vini3 * $coseno, 0);
            $nive3cs = round($Vine3 * $coseno, 0);

            $template = '<center>
                <table post="6">
                    <tr>
                        <td style="font-weight: bold">Barlovento - Presión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C1= ' . $C1 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Barlovento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C2= ' . $C2 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Sotavento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C3= ' . $C3 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                </table>
            </center>
            <br>
            <h6>Presión o Succión del viento a una altura "h":  </h6>
            <br>
            <center>
                <table class="table table-bordered">
                    <tr>
                        <td style="font-weight: bold">CONSTRUCCION</td>
                        <td style="font-weight: bold">BARLOVENTO</td>
                        <td style="font-weight: bold">SOTAVENTO</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales de edificion</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0.6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Anuncios,Muros aislados, elementos con una dimension corta en la direccion del viento</td>
                        <td style="font-weight: normal">+1.5</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion circular o eliptica</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion Cuadrada  o rectangular</td>
                        <td style="font-weight: normal">+2,0</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Arcos y cubiertas cilindricas con un ángulo de inclinacion que no exceda 45°</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,5</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas a 15° o menos</td>
                        <td style="font-weight: normal">+0,3 - 0.7</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas entre 60° y la vertical</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales ó inclinadas (planas ó curvas) paralelas a la direccion del viento</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">-0,7</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="font-weight: normal">* El signo positivo indica presión y el negativo succion</td>
                    </tr>
                </table>
            </center>
            <br>
            <center>
                <table>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph1= 0.005 kgf/m2 . C1 (Vh . hr/km)2=' . $resultado10 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph2= 0.005 kgf/m2 . C2 (Vh . hr/km)2=' . $resultado11 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph3= 0.005 kgf/m2 . C3 (Vh . hr/km)2=' . $resultado12 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                </table> 
            </center>
            <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.3. CARGA DE VIENTO SOBRE LOS NUDOS</h8> <br>
            <pre>
                    <!-- barlovento presion -->
                    <label for="">Barlovento - Presión</label>
                    <label for="">(nudo interior): Vini1≔Atr1 ⋅Ph1=' . $Vini1 . ' kgf</label>
                    <label for="">(nudo exterior): Vine1≔Atr2 ⋅Ph1=' . $Vine1 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi1 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi1cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive1 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive1cs . ' kgf</td>
                        </tr>
                    </table>
                    <!-- barlovento -->
                    <label for="">Barlovento - Succión</label>
                    <label for="">(nudo interior): Vini2≔Atr1 ⋅Ph2=' . $Vini2 . ' kgf</label>
                    <label for="">(nudo exterior): Vine2≔Atr2 ⋅Ph2=' . $Vine2 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi2 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi2cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive2 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive2cs . ' kgf</td>
                        </tr>
                    </table>

                    <!-- sotavento -->
                    <label for="">Sotavento - Succión</label>
                    <label for="">(nudo interior): Vini3≔Atr1 ⋅Ph3=' . $Vini3 . '</label>
                    <label for="">(nudo exterior): Vine3≔Atr2 ⋅Ph3=' . $Vine3 . ' kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi3 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi3cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive3 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive3cs . ' kgf</td>
                        </tr>
                    </table>
            </pre>';
            echo $template;
        } else if ($name_viento_carga == "sie") {
            $C1 = "0.7";
            $C2 = "-0.3";
            $C3 = "-0.6";
            $resultado10 = round(0.005 * $C1 * pow(($Vh), 2), 1);
            $resultado11 = round(0.005 * $C2 * pow(($Vh), 2), 1);
            $resultado12 = round(0.005 * $C3 * pow(($Vh), 2), 1);
            //cargas de viento sobre los nudos
            $Vini1 = round($resultado1 * $resultado10, 0);
            $Vine1 = round($resultado2 * $resultado10, 0);
            $Vini2 = round($resultado1 * $resultado11, 0);
            $Vine2 = round($resultado2 * $resultado11, 0);;
            $Vini3 = round($resultado1 * $resultado12, 0);
            $Vine3 = round($resultado2 * $resultado12, 0);
            // Calcular el ángulo en grados
            $anguloTeta = round(rad2deg(atan($name_angulo_inclinacion / $name_inclinacion_horizontal)), 3);

            // Convertir el ángulo a radianes
            $anguloTetaRad = deg2rad($anguloTeta);

            // Calcular el seno
            $seno = sin($anguloTetaRad);
            //calcular el coseno
            $coseno = cos($anguloTetaRad);

            //Barlovento - Presión 
            // Calcular nudos en X
            $nivi1 = round($Vini1 * $seno, 0);
            $nive1 = round($Vine1 * $seno, 0);

            // Calcular nudos en Y
            $nivi1cs = round($Vini1 * $coseno, 0);
            $nive1cs = round($Vini1 * $coseno, 0);

            //Barlovento - Succión
            // Calcular nudos en X
            $nivi2 = round($Vini2 * $seno, 0);
            $nive2 = round($Vine2 * $seno, 0);

            // Calcular nudos en Y
            $nivi2cs = round($Vini2 * $coseno, 0);
            $nive2cs = round($Vine2 * $coseno, 0);

            //Sotavento - Succión
            // Calcular nudos en X
            $nivi3 = round($Vini3 * $seno, 0);
            $nive3 = round($Vine3 * $seno, 0);

            // Calcular nudos en Y
            $nivi3cs = round($Vini3 * $coseno, 0);
            $nive3cs = round($Vine3 * $coseno, 0);

            $template = '<center>
                <table post="6">
                    <tr>
                        <td style="font-weight: bold">Barlovento - Presión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C1= ' . $C1 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Barlovento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C2= ' . $C2 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Sotavento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C3= ' . $C3 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                </table>
            </center>
            <br>
            <h6>Presión o Succión del viento a una altura "h":  </h6>
            <br>
            <center>
                <table class="table table-bordered">
                    <tr>
                        <td style="font-weight: bold">CONSTRUCCION</td>
                        <td style="font-weight: bold">BARLOVENTO</td>
                        <td style="font-weight: bold">SOTAVENTO</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales de edificion</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0.6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Anuncios,Muros aislados, elementos con una dimension corta en la direccion del viento</td>
                        <td style="font-weight: normal">+1.5</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion circular o eliptica</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion Cuadrada  o rectangular</td>
                        <td style="font-weight: normal">+2,0</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Arcos y cubiertas cilindricas con un ángulo de inclinacion que no exceda 45°</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,5</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas a 15° o menos</td>
                        <td style="font-weight: normal">+0,3 - 0.7</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas entre 60° y la vertical</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales ó inclinadas (planas ó curvas) paralelas a la direccion del viento</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">-0,7</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="font-weight: normal">* El signo positivo indica presión y el negativo succion</td>
                    </tr>
                </table>
            </center>
            <br>
            <center>
                <table>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph1= 0.005 kgf/m2 . C1 (Vh . hr/km)2=' . $resultado10 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph2= 0.005 kgf/m2 . C2 (Vh . hr/km)2=' . $resultado11 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph3= 0.005 kgf/m2 . C3 (Vh . hr/km)2=' . $resultado12 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                </table> 
            </center>
            <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.3. CARGA DE VIENTO SOBRE LOS NUDOS</h8> <br>
            <pre>
                    <!-- barlovento presion -->
                    <label for="">Barlovento - Presión</label>
                    <label for="">(nudo interior): Vini1≔Atr1 ⋅Ph1=' . $Vini1 . ' kgf</label>
                    <label for="">(nudo exterior): Vine1≔Atr2 ⋅Ph1=' . $Vine1 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi1 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi1cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive1 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive1cs . ' kgf</td>
                        </tr>
                    </table>
                    <!-- barlovento -->
                    <label for="">Barlovento - Succión</label>
                    <label for="">(nudo interior): Vini2≔Atr1 ⋅Ph2=' . $Vini2 . ' kgf</label>
                    <label for="">(nudo exterior): Vine2≔Atr2 ⋅Ph2=' . $Vine2 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi2 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi2cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive2 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive2cs . ' kgf</td>
                        </tr>
                    </table>

                    <!-- sotavento -->
                    <label for="">Sotavento - Succión</label>
                    <label for="">(nudo interior): Vini3≔Atr1 ⋅Ph3=' . $Vini3 . '</label>
                    <label for="">(nudo exterior): Vine3≔Atr2 ⋅Ph3=' . $Vine3 . ' kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi3 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi3cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive3 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive3cs . ' kgf</td>
                        </tr>
                    </table>
            </pre>';
            echo $template;
        } else if ($name_viento_carga == "siev") {
            $C1 = "0.8";
            $C2 = "0";
            $C3 = "-0.6";
            $resultado10 = round(0.005 * $C1 * pow(($Vh), 2), 1);
            $resultado11 = round(0.005 * $C2 * pow(($Vh), 2), 1);
            $resultado12 = round(0.005 * $C3 * pow(($Vh), 2), 1);
            // Calcular el ángulo en grados
            $anguloTeta = round(rad2deg(atan($name_angulo_inclinacion / $name_inclinacion_horizontal)), 3);

            // Convertir el ángulo a radianes
            $anguloTetaRad = deg2rad($anguloTeta);

            // Calcular el seno
            $seno = sin($anguloTetaRad);
            //calcular el coseno
            $coseno = cos($anguloTetaRad);

            //Barlovento - Presión 
            // Calcular nudos en X
            $nivi1 = round($Vini1 * $seno, 0);
            $nive1 = round($Vine1 * $seno, 0);

            // Calcular nudos en Y
            $nivi1cs = round($Vini1 * $coseno, 0);
            $nive1cs = round($Vini1 * $coseno, 0);

            //Barlovento - Succión
            // Calcular nudos en X
            $nivi2 = round($Vini2 * $seno, 0);
            $nive2 = round($Vine2 * $seno, 0);

            // Calcular nudos en Y
            $nivi2cs = round($Vini2 * $coseno, 0);
            $nive2cs = round($Vine2 * $coseno, 0);

            //Sotavento - Succión
            // Calcular nudos en X
            $nivi3 = round($Vini3 * $seno, 0);
            $nive3 = round($Vine3 * $seno, 0);

            // Calcular nudos en Y
            $nivi3cs = round($Vini3 * $coseno, 0);
            $nive3cs = round($Vine3 * $coseno, 0);

            $template = '<center>
                <table post="6">
                    <tr>
                        <td style="font-weight: bold">Barlovento - Presión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C1= ' . $C1 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Barlovento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C2= ' . $C2 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Sotavento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C3= ' . $C3 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                </table>
            </center>
            <br>
            <h6>Presión o Succión del viento a una altura "h":  </h6>
            <br>
            <center>
                <table class="table table-bordered">
                    <tr>
                        <td style="font-weight: bold">CONSTRUCCION</td>
                        <td style="font-weight: bold">BARLOVENTO</td>
                        <td style="font-weight: bold">SOTAVENTO</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales de edificion</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0.6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Anuncios,Muros aislados, elementos con una dimension corta en la direccion del viento</td>
                        <td style="font-weight: normal">+1.5</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion circular o eliptica</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion Cuadrada  o rectangular</td>
                        <td style="font-weight: normal">+2,0</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Arcos y cubiertas cilindricas con un ángulo de inclinacion que no exceda 45°</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,5</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas a 15° o menos</td>
                        <td style="font-weight: normal">+0,3 - 0.7</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas entre 60° y la vertical</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales ó inclinadas (planas ó curvas) paralelas a la direccion del viento</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">-0,7</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="font-weight: normal">* El signo positivo indica presión y el negativo succion</td>
                    </tr>
                </table>
            </center>
            <br>
            <center>
                <table>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph1= 0.005 kgf/m2 . C1 (Vh . hr/km)2=' . $resultado10 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph2= 0.005 kgf/m2 . C2 (Vh . hr/km)2=' . $resultado11 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph3= 0.005 kgf/m2 . C3 (Vh . hr/km)2=' . $resultado12 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                </table> 
            </center>
            <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.3. CARGA DE VIENTO SOBRE LOS NUDOS</h8> <br>
            <pre>
                    <!-- barlovento presion -->
                    <label for="">Barlovento - Presión</label>
                    <label for="">(nudo interior): Vini1≔Atr1 ⋅Ph1=' . $Vini1 . ' kgf</label>
                    <label for="">(nudo exterior): Vine1≔Atr2 ⋅Ph1=' . $Vine1 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi1 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi1cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive1 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive1cs . ' kgf</td>
                        </tr>
                    </table>
                    <!-- barlovento -->
                    <label for="">Barlovento - Succión</label>
                    <label for="">(nudo interior): Vini2≔Atr1 ⋅Ph2=' . $Vini2 . ' kgf</label>
                    <label for="">(nudo exterior): Vine2≔Atr2 ⋅Ph2=' . $Vine2 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi2 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi2cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive2 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive2cs . ' kgf</td>
                        </tr>
                    </table>

                    <!-- sotavento -->
                    <label for="">Sotavento - Succión</label>
                    <label for="">(nudo interior): Vini3≔Atr1 ⋅Ph3=' . $Vini3 . '</label>
                    <label for="">(nudo exterior): Vine3≔Atr2 ⋅Ph3=' . $Vine3 . ' kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi3 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi3cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive3 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive3cs . ' kgf</td>
                        </tr>
                    </table>
            </pre>';
            echo $template;
        } else if ($name_viento_carga == "spdv") {
            $C1 = "0";
            $C2 = "-0.7";
            $C3 = "-0.7";
            $resultado10 = round(0.005 * $C1 * pow(($Vh), 2), 1);
            $resultado11 = round(0.005 * $C2 * pow(($Vh), 2), 1);
            $resultado12 = round(0.005 * $C3 * pow(($Vh), 2), 1);
            // Calcular el ángulo en grados
            $anguloTeta = round(rad2deg(atan($name_angulo_inclinacion / $name_inclinacion_horizontal)), 3);

            // Convertir el ángulo a radianes
            $anguloTetaRad = deg2rad($anguloTeta);

            // Calcular el seno
            $seno = sin($anguloTetaRad);
            //calcular el coseno
            $coseno = cos($anguloTetaRad);

            //Barlovento - Presión 
            // Calcular nudos en X
            $nivi1 = round($Vini1 * $seno, 0);
            $nive1 = round($Vine1 * $seno, 0);

            // Calcular nudos en Y
            $nivi1cs = round($Vini1 * $coseno, 0);
            $nive1cs = round($Vini1 * $coseno, 0);

            //Barlovento - Succión
            // Calcular nudos en X
            $nivi2 = round($Vini2 * $seno, 0);
            $nive2 = round($Vine2 * $seno, 0);

            // Calcular nudos en Y
            $nivi2cs = round($Vini2 * $coseno, 0);
            $nive2cs = round($Vine2 * $coseno, 0);

            //Sotavento - Succión
            // Calcular nudos en X
            $nivi3 = round($Vini3 * $seno, 0);
            $nive3 = round($Vine3 * $seno, 0);

            // Calcular nudos en Y
            $nivi3cs = round($Vini3 * $coseno, 0);
            $nive3cs = round($Vine3 * $coseno, 0);

            $template = '<center>
                <table post="6">
                    <tr>
                        <td style="font-weight: bold">Barlovento - Presión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C1= ' . $C1 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Barlovento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C2= ' . $C2 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold">Sotavento - Succión</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>C3= ' . $C3 . '  <label for="" class="text-blue">km/hr</label></td>
                    </tr>
                </table>
            </center>
            <br>
            <h6>Presión o Succión del viento a una altura "h":  </h6>
            <br>
            <center>
                <table class="table table-bordered">
                    <tr>
                        <td style="font-weight: bold">CONSTRUCCION</td>
                        <td style="font-weight: bold">BARLOVENTO</td>
                        <td style="font-weight: bold">SOTAVENTO</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales de edificion</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0.6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Anuncios,Muros aislados, elementos con una dimension corta en la direccion del viento</td>
                        <td style="font-weight: normal">+1.5</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion circular o eliptica</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Tanques de agua, chimeneas y otros de seccion Cuadrada  o rectangular</td>
                        <td style="font-weight: normal">+2,0</td>
                        <td style="font-weight: normal">0</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Arcos y cubiertas cilindricas con un ángulo de inclinacion que no exceda 45°</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,5</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas a 15° o menos</td>
                        <td style="font-weight: normal">+0,3 - 0.7</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies inclinadas entre 60° y la vertical</td>
                        <td style="font-weight: normal">+0,8</td>
                        <td style="font-weight: normal">-0,6</td>
                    </tr>
                    <tr>
                        <td style="font-weight: normal">Superficies verticales ó inclinadas (planas ó curvas) paralelas a la direccion del viento</td>
                        <td style="font-weight: normal">+0,7</td>
                        <td style="font-weight: normal">-0,7</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="font-weight: normal">* El signo positivo indica presión y el negativo succion</td>
                    </tr>
                </table>
            </center>
            <br>
            <center>
                <table>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph1= 0.005 kgf/m2 . C1 (Vh . hr/km)2=' . $resultado10 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph2= 0.005 kgf/m2 . C2 (Vh . hr/km)2=' . $resultado11 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Presión o Succión del viento a una altura "h"</td>
                        <td style="font-weight: bold">:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>Ph3= 0.005 kgf/m2 . C3 (Vh . hr/km)2=' . $resultado12 . '<label for="" class="text-blue">kgf/m²</label></td>
                    </tr>
                </table> 
            </center>
            <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.5.3. CARGA DE VIENTO SOBRE LOS NUDOS</h8> <br>
            <pre>
                    <!-- barlovento presion -->
                    <label for="">Barlovento - Presión</label>
                    <label for="">(nudo interior): Vini1≔Atr1 ⋅Ph1=' . $Vini1 . ' kgf</label>
                    <label for="">(nudo exterior): Vine1≔Atr2 ⋅Ph1=' . $Vine1 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi1 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi1cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive1 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive1cs . ' kgf</td>
                        </tr>
                    </table>
                    <!-- barlovento -->
                    <label for="">Barlovento - Succión</label>
                    <label for="">(nudo interior): Vini2≔Atr1 ⋅Ph2=' . $Vini2 . ' kgf</label>
                    <label for="">(nudo exterior): Vine2≔Atr2 ⋅Ph2=' . $Vine2 . '  kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi2 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi2cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive2 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive2cs . ' kgf</td>
                        </tr>
                    </table>

                    <!-- sotavento -->
                    <label for="">Sotavento - Succión</label>
                    <label for="">(nudo interior): Vini3≔Atr1 ⋅Ph3=' . $Vini3 . '</label>
                    <label for="">(nudo exterior): Vine3≔Atr2 ⋅Ph3=' . $Vine3 . ' kgf</label>
                    <table class="table table-bordered" style="font-weight: bold; text-align: center;">
                        <tr>
                            <td></td>
                            <td>Fuerza "X"</td>
                            <td>Fuerza "Y"</td>
                        </tr>
                        <tr>
                            <td>(nudo interior):</td>
                            <td>Vini1 ⋅ sin((θ))=' . $nivi3 . ' kgf</td>
                            <td>Vini1 ⋅ cos ((θ))=' . $nivi3cs . ' kgf</td>
                        </tr>
                        <tr>
                            <td>(nudo exterior):</td>
                            <td>Vine1 ⋅ sin((θ))=' . $nive3 . ' kgf</td>
                            <td>Vine1 ⋅ cos ((θ))=' . $nive3cs . ' kgf</td>
                        </tr>
                    </table>
            </pre>';
            echo $template;
        }
        ?>
        <!-- <center>
            <table post="6">
                <tr>
                    <td style="font-weight: bold">Factores de forma:</td>
                    <td><?php echo $name_H; ?>&nbsp;&nbsp;<label for="" class="text-blue">km/hr</label></td>
                </tr>
                <tr>
                    <td style="font-weight: bold">Barlovento - Presión:</td>
                    <td>C1= <?php echo $name_V; ?>&nbsp;&nbsp;<label for="" class="text-blue">km/hr</label></td>
                </tr>
                <tr>
                    <td style="font-weight: bold">Barlovento - Succión:</td>
                    <td>C2= <?php echo $Vh; ?>&nbsp;&nbsp;<label for="" class="text-blue">km/hr</label></td>
                </tr>
                <tr>
                    <td style="font-weight: bold">Sotavento- Succión: </td>
                    <td>C3= <?php echo $Vh; ?>&nbsp;&nbsp;<label for="" class="text-blue">km/hr</label></td>
                </tr>
            </table>
        </center> -->
        <br>

    <?php
    }
    ?>
    <br>




    <!-- estimacion de carga nieve -->
    <?php
    $resultado19 = $QS * 1;
    $resultado20 = 0.80 * $resultado19;
    $resultado21 = 1 - 0.025 * (($resultado4 * 1) - 30);
    //$resultado22 = round($resultado21 * (0.80 * $resultado19), 0);
    $resultado22 = $resultado21 * (0.80 * $resultado19);
    ?>
    <h7 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.6. ESTIMACION DE LA CARGA NIEVE</h7><br>
    <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.6.1. CARGA BÁSICA DE NIEVE</h8><br>
    <center>
        <table>
            <tr>
                <td style="font-weight: bold">Carga Básica de nieve soobre el suelo:</td>
                <td>QS = <?php echo $QS; ?><label for="" class="text-blue">kgf/m<sup>2</sup></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"Norma E.020"</td>
            </tr>
            <tr>
                <td style="font-weight: bold"> Ángulo de inclinación de la cubierta:</td>
                <td>θ = <?php echo $resultado4; ?><label for="" class="text-blue">deg</label></td>
            </tr>
        </table>
    </center>
    <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.6.2. CARGA BÁSICA DE NIEVE SOBRE LOS TECHOS</h8><br>
    
    <center>
        <table style="font-weight: bold; text-align: center;">
            <tr>
                <td style="font-weight: bold">Para techos a una o dos aguas con inclinaciones menores o iguales a 15°:</td>
                <td>Qt1≔Qs= <?php echo $resultado19; ?><label for="" class="text-blue">kgf/m²</label></td>
            </tr>
            <tr>
                <td style="font-weight: bold"></td>

            </tr>
            <tr>
                <td style="font-weight: bold">Para techos a una o dos aguas con inclinaciones entre 15° y 30°:</td>
                <td>Qt2≔0.80 ⋅ Qs= <?php echo $resultado20 ?><label for="" class="text-blue">kgf/m²</label></td>
            </tr>
            <tr>
                <td style="font-weight: bold"></td>

            </tr>
            <tr>
                <td style="font-weight: bold">Para techos a una o dos aguas con inclinaciones mayores a 30°: </td>
                <td>Qt3≔Cs . (0-80 . Qs)= <?php echo round($resultado22, 0) ?><label for="" class="text-blue">kgf/m²</label></td>
            </tr>
            <tr>
                <td style="font-weight: bold"></td>

            </tr>
            <tr>
                &nbsp;&nbsp;&nbsp; <td>Cs= <?php echo $resultado21 ?><label for="" class="text-blue"></label></td>
            </tr>
        </table>
    </center>

    <?php
    $templateVientoNieve = '';
    if ($name_viento_carg == "ptaimi") {
        $resultado23 = round($resultado1 * $resultado19, 0); //(nudo interior):
        $resultado24 = round($resultado2 * $resultado19, 0); //(nudo exterior):
        $templateVientoNieve = '
        <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.6.3. Carga de nieve sobre los nudos - ángulos hasta 15°</h8><br>
        <center>
            <table post="6">
                <tr>
                    <td style="font-weight: bold">(nudo interior):</td>
                    <td>Nini1≔Atr1 ⋅ Qt1= ' . $resultado23 . '  <label for="" class="text-blue">kgf</label></td>
                </tr>
                <tr>
                    <td style="font-weight: bold">(nudo exterior):</td>
                    <td>Nine1≔Atr2 ⋅ Qt1= ' . $resultado24 . '  <label for="" class="text-blue">kgf</label></td>
                </tr>
            </table>
        </center>';
        echo $templateVientoNieve;
    } else if ($name_viento_carg == "ptaie") {
        $resultado25 = round($resultado1 * $resultado20, 0); //(nudo interior):
        $resultado26 = round($resultado2 * $resultado20, 0); //(nudo exterior):
        $templateVientoNieve = '
        <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.6.3. Carga de nieve sobre los nudos - entre 15° y 30°</h8><br>
        <center>
            <table post="6">
                <tr>
                    <td style="font-weight: bold">(nudo interior):</td>
                    <td>Nini2≔Atr1 ⋅ Qt2= ' . $resultado25 . '  <label for="" class="text-blue">kgf</label></td>
                </tr>
                <tr>
                    <td style="font-weight: bold">(nudo exterior):</td>
                    <td>Nine2≔Atr2 ⋅ Qt2= ' . $resultado26 . '  <label for="" class="text-blue">kgf</label></td>
                </tr>
            </table>
        </center>';
        echo $templateVientoNieve;
    } else if ($name_viento_carg == "ptaim") {
        $resultado27 = round($resultado1 * $resultado22, 0); //(nudo interior):
        $resultado28 = round($resultado2 * $resultado22, 0); //(nudo exterior):
        $templateVientoNieve = '
        <h8 class="text-primary" style="font-weight: bold; text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.6.3. Carga de nieve sobre los nudos - mayores a 30°</h8><br>
        <center>
            <table post="6">
                <tr>
                    <td style="font-weight: bold">(nudo interior):</td>
                    <td>Nini3≔Atr1 ⋅ Qt3= ' . $resultado27 . '  <label for="" class="text-blue">kgf</label></td>
                </tr>
                <tr>
                    <td style="font-weight: bold">(nudo exterior):</td>
                    <td>Nine3≔Atr2 ⋅ Qt3= ' . $resultado28 . '  <label for="" class="text-blue">kgf</label></td>
                </tr>
            </table>
        </center>';
        echo $templateVientoNieve;
    }

    ?>
    <!-- Puedes agregar más filas según sea necesario para mostrar otros resultados -->
</body>

</html>