<?php
session_start();
if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2) {
?>
    <title>Adm | Analisis Por Viento</title>
    <?php
    include_once "assets/views/header.php";
    include_once "assets/views/nav.php";
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/echarts@latest/dist/echarts.min.js"></script>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ANALISIS POR VIENTO</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">ANALISIS POR VIENTO</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <!-- Contenedor de las filas -->
                <div class="row">
                    <!-- Primera columna datos generales -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3>Datos Generales</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <style>
                                        .v-line {
                                            border-left: thick solid #000;
                                            /* Estilo de la línea */
                                            height: 100%;
                                            /* Altura igual a la altura del contenedor padre */
                                            position: absolute;
                                            /* Posicionamiento absoluto para superponer la línea */
                                            left: 50%;
                                            /* Ubicación horizontal en el medio del contenedor padre */
                                            transform: translateX(-50%);
                                            /* Centrar horizontalmente la línea */
                                        }

                                        .contenedor::-webkit-scrollbar {
                                            width: 0px;
                                            /* Oculta el scroll en navegadores webkit como Chrome y Safari */
                                        }
                                    </style>
                                    <div class="col-5">
                                        <form id="dato_viento" method="post" enctype="multipart/form-data">
                                            <h2 class="text-center"><strong><u>Datos Generales</u></strong></h2>
                                            <h5 class="text-center"><strong><u>AREA TRIBUTARIA</u></strong></h5>
                                            <div class="conteiner">
                                                <div class="form-group">
                                                    <label>Logo Encabezado</label>
                                                    <div class="input-group date" data-target-input="nearest">
                                                        <input type="file" class="form-control" id="logo_pro" name="logo_pro" />
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md-0 bg-secondary">At</span>
                                                    <input class="col-md-4 : form-control" id="tributaria_area" name="tributaria_area" placeholder="Área tributaria">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                        m
                                                        &nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;">Ancho tributario</label>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md31 bg-secondary"> At_m</span>
                                                    <input class="col-md-3 : form-control" id="area_tributaria" name="area_tributaria" placeholder="Área tributaria">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                        m
                                                        &nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;"> Ancho tributario entre montantes:</label>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <h5 class="text-center"><strong><u>ANGULO DE INCLINACION CON RESPECTO A LA HORIZONTAL</u></strong></h5>
                                            <div class="input-group">
                                                <span class="input-group-text : col-md-0 bg-secondary"> h </span>
                                                <input class="col-md-4 : form-control" id="angulo_inclinacion" name="angulo_inclinacion" placeholder="Ángulo de inclinación con respecto a la horizontal">
                                                <div class="input-group-append text-blue"> &nbsp;&nbsp;
                                                    m
                                                    &nbsp;&nbsp;&nbsp;
                                                </div>
                                                <label class="col-md-9 : form-control" style="border: none;"> Altura de la cobertura: </label>
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <span class="input-group-text : col-md-0 bg-secondary">h</span>
                                                <select class="col-md-4 : form-select : form-control" id="anguloinclinac_ion" name="anguloinclinac_ion" placeholder="Ángulo de inclinación con respecto a la horizontal" required>
                                                    <option value="" disabled selected>Ángulo de inclinación con respecto a la horizontal</option>
                                                    <option value="1">1 agua</option>
                                                    <option value="2">2 aguas</option>
                                                </select>
                                                <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                    m
                                                    &nbsp;&nbsp;&nbsp;
                                                </div>
                                                <label class="col-md-9 : form-control" style="border: none;">Altura de la cobertura</label>
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <span class="input-group-text : col-md-0 bg-secondary"> LCL</span>
                                                <input class="col-md-4 : form-control" id="inclinacion_horizontal" name="inclinacion_horizontal" placeholder="Ángulo de inclinación con respecto a la horizontal" required>
                                                <div class="input-group-append text-blue"> &nbsp;&nbsp;
                                                    m
                                                    &nbsp;&nbsp;&nbsp;
                                                </div>
                                                <label class="col-md-9 : form-control" style="border: none;"> Longitud hasta centro de luz del claro: </label>
                                            </div>
                                            <br>
                                            <br>
                                            <h5 class="text-center"><strong><u>ESTIMACION DE LA CARGA MUERTA Y CARGA VIVA</u></strong></h5>
                                            <div class="input-group">
                                                <span class="input-group-text : col-md-0 bg-secondary"> Pp</span>
                                                <input class="col-md-4 : form-control" id="carga_muerta" name="carga_muerta" placeholder="Estimación de la Carga muerta">
                                                <div class="input-group-append text-blue"> &nbsp;&nbsp;
                                                    kgf/m2
                                                    &nbsp;&nbsp;&nbsp;
                                                </div>
                                                <label class="col-md-9 : form-control" style="border: none;"> Peso propio: </label>
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <span class="input-group-text : col-md-0 bg-secondary">Cv</span>
                                                <input class="col-md-4 : form-control" id="carga_viva" name="carga_viva" placeholder="Estimación de la Carga viva">
                                                <div class="input-group-append text-blue"> &nbsp;&nbsp;
                                                    kgf/m2
                                                    &nbsp;&nbsp;&nbsp;
                                                </div>
                                                <label class="col-md-9 : form-control" style="border: none;">Carga Viva </label>
                                            </div>
                                            <br>
                                            <br>
                                            <h5 class="text-center"><strong><u>ESTIMACION DE LA CARGA DE VIENTO</u></strong></h5>
                                            <div class="input-group">
                                                <span class="input-group-text : col-md-0 bg-secondary"> H</span>
                                                <input class="col-md-4 : form-control" id="H" name="H" placeholder=" Estimación de la Carga de viento">
                                                <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                    m
                                                    &nbsp;&nbsp;&nbsp;
                                                </div>
                                                <label class="col-md-9 : form-control" style="border: none;"> Altura o elevación de la estructura </label>
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <span class="input-group-text : col-md-0 bg-secondary"> V</span>
                                                <input class="col-md-4 : form-control" id="V" name="V" placeholder=" Estimación de la Carga de viento">
                                                <div class="input-group-append text-blue"> &nbsp;&nbsp;
                                                    Km/hr
                                                    &nbsp;&nbsp;&nbsp;
                                                </div>
                                                <label class="col-md-9 : form-control" style="border: none;"> Velocidad de diseño hasta 10m de altura</label>
                                            </div>
                                            <br>
                                            <div class="input-group">
                                                <span class="input-group-text : col-md-0 bg-secondary">Factores de Forma</span>
                                                <select class="form-select form-control col-md-4" id="viento_carga" name="viento_carga" placeholder="CONSTRUCCION" required>
                                                    <option value="CONSTRUACCIÓN" disabled selected>FACTORES DE FORMA</option>
                                                    <option value="sve">Superficies verticales de edificios</option>
                                                    <option value="amae">Anuncios, muros aislados, elementos con una dimension corta en la direccion del viento</option>
                                                    <option value="tasr">Tanques de agua, chimeneas y otros de seccion circular o eliptica</option>
                                                    <option value="tasc">Tanques de agua, dhimeneas y otros de seccion cuadrada o rectangular</option>
                                                    <option value="ace"> Tanques y cubiertas cilindricas con un angulo de inclinacion que excedan 45°</option>
                                                    <option value="sim">Superficies inclinadas en 15° o menos</option>
                                                    <option value="sie">Superficies inclinadas entre 15°-60°</option>
                                                    <option value="siev">Superficies inclinadas entre 60° Y la vertical°</option>
                                                    <option value="spdv">Superficies verticales o inclinadas S(planas o curvas)paralelas a la direccion del viento</option>
                                                </select>
                                                <div class="input-group-append text-blue">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                                <label class="col-md-9 : form-control" style="border: none;">Factores de forma</label>
                                            </div>
                                            <br>
                                            <br>
                                            <h5 class="text-center"><strong><u>ESTIMACION DE LA CARGA DE NIEVE</u></strong></h5>
                                            <div class="input-group">
                                                <span class="input-group-text : col-md-0 bg-secondary"> Qs</span>
                                                <input class="col-md-4 : form-control" id="QS" name="QS" placeholder=" Carga básica de nieve sobre el suelo:">
                                                <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                    Kgf/m2
                                                    &nbsp;&nbsp;&nbsp;
                                                </div>
                                                <label class="col-md-9 : form-control" style="border: none;">Carga básica de nieve sobre el suelo</label>
                                            </div>
                                            <br>
                                            <h6 class="text-aliign text-green">-Carga de nieve sobre los techos</h6>
                                            <div class="input-group">
                                                <select class="form-select : form-control col-md-6" id="viento_carg" name="viento_carg" placeholder="CONSTRUCCION" required>
                                                    <option value="" disabled selected>CARGA DE NIEVE</option>
                                                    <option value="ptaimi">Para techos a una o dos aguas con inclinaciones menores o iguales a 15°</option>
                                                    <option value="ptaie">Para techos a una o dos aguas con inclinaciones entre 15° y 30°c</option>
                                                    <option value="ptaim">Para techos a una o dos aguas con inclinaciones mayores a 30°</option>
                                                </select>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="col-md-12 mx-auto text-center">
                                                <div class="d-grid gap-2 col-6 mx-auto">
                                                    <button class="btn btn-primary btn- text-center" type="submit">DISEÑAR</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-1">
                                        <div class="v-line"></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header bg-info">RESULTADOS</div>
                                            <div class="card-body" id="ObtenerResultados"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin del contenedor de las filas -->
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ver PDF</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container border border-8">
                                <!-- Aquí va el contenido del formulario y resultados -->
                                <div class="card">
                                    <div class="card-header"></div>
                                    <div class="card-body" id="ObtenerResultados">
                                        <!-- Aquí puede ir el contenido del cuerpo de la tarjeta -->
                                        <!-- <div style="display: block; margin: 50px auto;">
                                        <center><img src="../vista/assets/img/logopdf.png" alt="imagen"></center>
                                    </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <!-- <button type="button" class="btn btn-info" onclick="window.print()">Imprimir</button> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>
<script src="js/analisisviento.js"></script>