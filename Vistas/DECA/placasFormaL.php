<?php
session_start();
/* if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2) { */
if (1 == 1 || 1 == 1) {
?>

    <head>
        <title>Adm | DISEÑO DE PLACAS EN FORMA DE L</title>
        <style>
            #formContainer {
                height: 100%;
                overflow-y: auto;
            }
        </style>
    </head>

    <?php
    include_once "assets/views/header.php";
    include_once "assets/views/nav.php";
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DISEÑO DE PLACAS EN FORMA DE L</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../adm_principal.php">Inicio</a></li>
                            <li class="breadcrumb-item active">DISEÑO DE PLACAS EN FORMA DE L</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <!-- -------Solicitud de cargas------- -->
                <div class="card card-info p-0 m-0">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">SOLICITACIONES DE CARGA</h3>                
                            <button class="collapsible-btn ml-auto" data-target="content1">ver / ocultar</button>                     
                    </div>
                    <div class="card-body p-3 m-0 d-none" class="collapsible-content" id="content1">
                        <div class="d-flex flex-column">
                            <div class="d-flex flex-column">
                                <div id="solicitudCargaT1"></div>
                                <div class="d-flex justify-content-start">
                                    <button id="saveDataBtn1" class="btn btn-primary mt-3">Siguiente</button>
                                </div>
                            </div>
                            <div class="d-flex flex-column mb-5">
                                <div id="solicitudCargaT2" class="table-container"></div>
                                <div class="d-flex justify-content-start">
                                    <button id="saveDataBtn2" class="btn btn-primary mt-3">Ver resultados</button>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <div id="solicitudCargaT3" class="table-container"></div>
                                <!-- <div class="d-flex justify-content-start">
                                    <button id="saveDataBtn3" class="btn btn-primary mt-3">Guardar Datos Finales</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- -------end Solicitud de cargas------- -->

                <div class="row">
                    <div class="col-md-2 mt-3" id="formColumn">
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn btn-primary" type="button" id="toggleFormButton">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        </div>
                        <div id="formContainer" class="mt-1" style="display: block; overflow-y: auto; max-height: 400px;">
                            <!-- form en js -->
                        </div>
                    </div>
                    <div class="col-md-10 p-0 mt-3" id="resultadosContainer">
                        <!-- -------Diseño por Flexión------- -->
                        <div class="card card-info p-0 m-0">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">DISEÑO POR FLEXIÓN</h3>
                                <button class="collapsible-btn ml-auto" data-target="content2">ver / ocultar</button>
                            </div>
                            <!-- Tablas interiores -->
                            <div class="card-body p-0 m-0 d-none" class="collapsible-content" id="content2">
                                <!-- <div style="width: 100%; height: 500px;" class="mb-5 d-none">
                                                    <canvas id="graphDF" width="500" height="500"></canvas>
                                                </div> -->
                                <!-- Tabla Análisis en Dirección "x" -->
                                <div class="card m-0">
                                    <div class="card-header d-flex justify-content-between">Análisis en dirección "X" <button class="collapsible-btn ml-auto mr-5" data-target="contentDFx">ver / ocultar</button></div>
                                    <div class="card-body collapsible-content d-none" id="contentDFx">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex flex-column mb-5">
                                                <div id="flexDesingT1X"></div>
                                                <div class="d-flex justify-content-start">
                                                    <button id="saveDataBtnDF1X" class="btn btn-primary mt-3">Ver tablas siguientes</button>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column mb-5">
                                                <div id="flexDesingT2X" class="table-container"></div>
                                                <div class="d-flex justify-content-start">
                                                    <button id="saveDataBtnDF2X" class="btn btn-primary mt-3">Guardar datos (necesario)</button>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column mb-5">
                                                <div id="flexDesingT3X" class="table-container"></div>
                                                <div class="d-flex justify-content-start">
                                                    <!-- <button id="saveDataBtnDF3X" class="btn btn-primary mt-3">Guardar Datos Iniciales</button> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tabla Análisis en Dirección "y" -->
                                <div class="card m-0">
                                    <div class="card-header d-flex justify-content-between">Análisis en dirección "Y" <button class="collapsible-btn ml-auto mr-5" data-target="contentDFy">ver / ocultar</button></div>
                                    <div class="card-body collapsible-content d-none" id="contentDFy">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex flex-column">
                                                <div class="d-flex flex-column mb-5">
                                                    <div id="flexDesingT1Y" class="table-container"></div>
                                                    <div class="d-flex justify-content-start">
                                                        <button id="saveDataBtnDF1Y" class="btn btn-primary mt-3">Siguiente</button>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column mb-5">
                                                    <div id="flexDesingT2Y" class="table-container"></div>
                                                    <div class="d-flex justify-content-start">
                                                        <button id="saveDataBtnDF2Y" class="btn btn-primary mt-3">Guardar Datos (necesario)</button>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column mb-5">
                                                    <div id="flexDesingT3Y" class="table-container"></div>
                                                    <div class="d-flex justify-content-start">
                                                        <!-- <button id="saveDataBtnDF3X" class="btn btn-primary mt-3">Guardar Datos Iniciales</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- -------end Diseño por Flexión------- -->

                        <!-- -------Diseño por Corte------- -->
                        <div class="card card-info p-0 m-0">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">DISEÑO POR CORTE</h3>
                                <button class="collapsible-btn ml-auto" data-target="content3">ver / ocultar</button>
                            </div>
                            <!-- Tablas interiores -->
                            <div class="card-body p-0 m-0 d-none" class="collapsible-content" id="content3">
                                <!-- <div style="width: 100%; height: 500px;" class="mb-5 d-none">
                                                    <canvas id="graphDF" width="500" height="500"></canvas>
                                                </div> -->
                                <!-- Tabla Análisis en Dirección "x" -->
                                <div class="card m-0">
                                    <div class="card-header d-flex justify-content-between">Análisis en dirección "X" <button class="collapsible-btn ml-auto mr-5" data-target="contentDCx">ver / ocultar</button></div>
                                    <div class="card-body collapsible-content d-none" id="contentDCx">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex flex-column mb-5">
                                                <div id="cutDesingT1X" class="table-container"></div>
                                                <div class="d-flex justify-content-start">
                                                    <button id="saveDataBtnDC1X" class="btn btn-primary mt-3">Siguiente</button>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column mb-5">
                                                <div id="cutDesingT2X" class="table-container"></div>
                                                <div class="d-flex justify-content-start">
                                                    <button id="saveDataBtnDC2X" class="btn btn-primary mt-3">Siguiente</button>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column mb-5">
                                                <div id="cutDesingT3X" class="table-container"></div>
                                                <div class="d-flex justify-content-start">
                                                    <button id="saveDataBtnDC3X" class="btn btn-primary mt-3">Esquema Armado Final</button>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column mb-5">
                                                <div id="cutDesingT4X" class="table-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tabla Análisis en Dirección "y" -->
                                <div class="card m-0">
                                    <div class="card-header d-flex justify-content-between">Análisis en dirección "Y" <button class="collapsible-btn ml-auto mr-5" data-target="contentDCy">ver / ocultar</button></div>
                                    <div class="card-body collapsible-content d-none" id="contentDCy">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex flex-column mb-5">
                                                <div id="cutDesingT1Y" class="table-container"></div>
                                                <div class="d-flex justify-content-start">
                                                    <button id="saveDataBtnDC1Y" class="btn btn-primary mt-3">Siguiente</button>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column mb-5">
                                                <div id="cutDesingT2Y" class="table-container"></div>
                                                <div class="d-flex justify-content-start">
                                                    <button id="saveDataBtnDC2Y" class="btn btn-primary mt-3">Siguiente</button>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column mb-5">
                                                <div id="cutDesingT3Y" class="table-container"></div>
                                                <div class="d-flex justify-content-start">
                                                    <button id="saveDataBtnDC3Y" class="btn btn-primary mt-3">Esquema Armado Final</button>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column mb-5">
                                                <div id="cutDesingT4Y" class="table-container"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- -------end Diseño por Corte------- -->

                        <!-- -------Diagramas de Interacción------- -->
                        <div class="card bg-info p-0 m-0">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">DIAGRAMAS DE INTERACCIÓN</h3>
                                <button class="collapsible-btn ml-auto" data-target="content4">ver / ocultar</button>
                            </div>
                            <!-- Tablas interiores -->
                            <div class="card-body p-0 m-0 d-none" class="collapsible-content" id="content4">
                                <!-- <div style="width: 100%; height: 500px;" class="mb-5 d-none">
                                                    <canvas id="graphDF" width="500" height="500"></canvas>
                                                </div> -->
                                <!-- Tabla Análisis en Dirección "x" -->
                                <div class="card m-0">
                                    <div class="card-header d-flex justify-content-between">Análisis en dirección "X" <button class="collapsible-btn ml-auto mr-5" data-target="contentDIx">ver / ocultar</button></div>
                                    <div class="card-body collapsible-content d-none" id="contentDIx">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex flex-column mb-5">
                                                <div id="diT1X" class="table-container"></div>
                                                <div class="d-flex justify-content-start">
                                                    <button id="saveDataBtnDI1X" class="btn btn-primary mt-3">Siguiente</button>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column mb-5">
                                                <div id="diT2X" class="table-container"></div>
                                                <!-- <div class="d-flex justify-content-start">
                                                                        <button id="saveDataBtnDI2X" class="btn btn-primary mt-3">Siguiente</button>
                                                                    </div> -->
                                            </div>
                                            <div class="d-flex flex-column mb-5">
                                                <div id="diT3X" class="table-container"></div>
                                                <!-- <div class="d-flex justify-content-start">
                                                                        <button id="saveDataBtnDC3X" class="btn btn-primary mt-3">Ancho Efectivo del Ala</button>
                                                                    </div> -->
                                            </div>
                                            <!-- <div class="d-flex flex-column mb-5">
                                                                    <div id="cutDesingT4X" class="table-container"></div>
                                                                </div> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Tabla Análisis en Dirección "y" -->
                                <div class="card m-0">
                                    <div class="card-header d-flex justify-content-between">Análisis en dirección "Y" <button class="collapsible-btn ml-auto mr-5" data-target="contentDIy">ver / ocultar</button></div>
                                    <div class="card-body collapsible-content d-none" id="contentDIy">
                                        <div class="d-flex flex-column">
                                            <div class="d-flex flex-column mb-5">
                                                <div id="diT1Y" class="table-container"></div>
                                                <div class="d-flex justify-content-start">
                                                    <button id="saveDataBtnDI1Y" class="btn btn-primary mt-3">Siguiente</button>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column mb-5">
                                                <div id="diT2Y" class="table-container"></div>
                                                <!-- <div class="d-flex justify-content-start">
                                                                        <button id="saveDataBtnDI2Y" class="btn btn-primary mt-3">Siguiente</button>
                                                                    </div> -->
                                            </div>
                                            <div class="d-flex flex-column mb-5">
                                                <div id="diT3Y" class="table-container"></div>
                                                <!-- <div class="d-flex justify-content-start">
                                                                        <button id="saveDataBtnDI3Y" class="btn btn-primary mt-3">Esquema Armado Final</button>
                                                                    </div> -->
                                            </div>
                                            <!-- <div class="d-flex flex-column mb-5">
                                                                    <div id="cutDesingT4Y" class="table-container"></div>
                                                                </div> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Diagramas -->
                                <div class="card m-0">
                                    <div class="card-header d-flex justify-content-between">Diagramas de Interacción</div>
                                    <div class="card-body">
                                        <div class="d-flex flex-column" id="diagramsContainer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- -------end Diagramas de Interacción------- -->

                        <!-- -------Verificación del agrietamiento------- -->
                        <div class="card card-info p-0 m-0">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">VERIFCACIÓN DEL AGRIETAMIENTO</h3>
                                <button class="collapsible-btn ml-auto" data-target="content5">ver / ocultar</button>
                            </div>
                            <!-- Tablas interiores -->
                            <div class="card-body p-0 m-0 d-none" class="collapsible-content" id="content5">

                                <!-- <div style="width: 100%; height: 500px;" class="mb-5 d-none">
                                                    <canvas id="graphDF" width="500" height="500"></canvas>
                                                </div> -->
                                <!-- Tabla Análisis en Dirección "x" -->
                                <div class="card m-0">
                                    <div class="card-header d-flex justify-content-between">Análisis en dirección "X" <button class="collapsible-btn ml-auto mr-5" data-target="contentVAx">ver / ocultar</button></div>
                                    <div class="card-body collapsible-content d-none" id="contentVAx">

                                        <div class="d-flex flex-column">
                                            <div id="vaT1X" class="table-container"></div>
                                        </div>

                                    </div>
                                </div>
                                <!-- Tabla Análisis en Dirección "y" -->
                                <div class="card m-0">
                                    <div class="card-header d-flex justify-content-between">Análisis en dirección "Y" <button class="collapsible-btn ml-auto mr-5" data-target="contentVAy">ver / ocultar</button></div>
                                    <div class="card-body collapsible-content d-none" id="contentVAy">
                                        <div class="d-flex flex-column">
                                            <div id="vaT1Y" class="table-container"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- -------Verificación del agrietamiento------- -->

                        <!-- -------Diseño por Compresión Pura------- -->
                        <div class="card card-info p-0 m-0">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">DISEÑO POR COMPRESIÓN PURA</h3>
                                <button class="collapsible-btn ml-auto" data-target="content6">ver / ocultar</button>
                            </div>
                            <!-- Tablas interiores -->
                            <div class="card-body p-0 m-0 d-none" class="collapsible-content" id="content6">
                                <!-- <div style="width: 100%; height: 500px;" class="mb-5 d-none">
                                                    <canvas id="graphDF" width="500" height="500"></canvas>
                                                </div> -->
                                <!-- Tabla Análisis en Dirección "x" -->
                                <div class="card m-0">
                                    <div class="card-header d-flex justify-content-between">Análisis en dirección "X" <button class="collapsible-btn ml-auto mr-5" data-target="contentDCPx">ver / ocultar</button></div>
                                    <div class="card-body collapsible-content d-none" id="contentDCPx">
                                        <div class="d-flex flex-column">
                                            <div id="dcpT1X" class="table-container"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tabla Análisis en Dirección "y" -->
                                <div class="card m-0">
                                    <div class="card-header d-flex justify-content-between">Análisis en dirección "Y" <button class="collapsible-btn ml-auto mr-5" data-target="contentDCPy">ver / ocultar</button></div>
                                    <div class="card-body collapsible-content d-none" id="contentDCPy">
                                        <div class="d-flex flex-column">
                                            <div id="dcpT1Y" class="table-container"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- -------Diseño por Compresión Pura  ------- -->

                        <!-- -------Diseño por Deslizamiento------- -->
                        <div class="card card-info p-0 m-0">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">DISEÑO POR DESLIZAMIENTO</h3>
                                <button class="collapsible-btn ml-auto" data-target="content7">ver / ocultar</button>
                            </div>
                            <!-- Tablas interiores -->
                            <div class="card-body p-0 m-0 d-none" class="collapsible-content" id="content7">
                                <!-- <div style="width: 100%; height: 500px;" class="mb-5 d-none">
                                                    <canvas id="graphDF" width="500" height="500"></canvas>
                                                </div> -->
                                <!-- Tabla Análisis en Dirección "x" -->
                                <div class="card m-0">
                                    <div class="card-header d-flex justify-content-between">Análisis en dirección "X" <button class="collapsible-btn ml-auto mr-5" data-target="contentDDx">ver / ocultar</button></div>
                                    <div class="card-body collapsible-content d-none" id="contentDDx">
                                        <div class="d-flex flex-column">
                                            <div id="ddT1X" class="table-container"></div>
                                            <div class="d-flex justify-content-start">
                                                <button id="saveDataBtnDD1X" class="btn btn-primary mt-3">Siguiente</button>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column mb-5">
                                            <div id="ddT2X" class="table-container"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tabla Análisis en Dirección "y" -->
                                <div class="card m-0">
                                    <div class="card-header d-flex justify-content-between">Análisis en dirección "Y" <button class="collapsible-btn ml-auto mr-5" data-target="contentDDy">ver / ocultar</button></div>
                                    <div class="card-body collapsible-content d-none" id="contentDDy">
                                        <div class="d-flex flex-column">
                                            <div id="ddT1Y" class="table-container"></div>
                                            <div class="d-flex justify-content-start">
                                                <button id="saveDataBtnDD1Y" class="btn btn-primary mt-3">Siguiente</button>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column mb-5">
                                            <div id="ddT2Y" class="table-container"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- -------Diseño por Deslizamiento  ------- -->

                        <!-- -------Efecto Local - Carga Puntual------- -->
                        <div class="card card-info p-0 m-0">
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">EFECTO LOCAL - CARGA PUNTUAL</h3>
                                <button class="collapsible-btn ml-auto" data-target="content8">ver / ocultar</button>
                            </div>
                            <!-- Tablas interiores -->
                            <div class="card-body p-0 m-0 d-none" class="collapsible-content" id="content8">
                                <!-- <div style="width: 100%; height: 500px;" class="mb-5 d-none">
                                                    <canvas id="graphDF" width="500" height="500"></canvas>
                                                </div> -->
                                <div class="card m-0">
                                    <div class="card-header d-flex justify-content-between">Efecto Local - Carga Puntual<button class="collapsible-btn ml-auto mr-5" data-target="contentEL">ver / ocultar</button></div>
                                    <div class="card-body collapsible-content d-none" id="contentEL">
                                        <div class="d-flex flex-column">
                                            <div id="elT1" class="table-container"></div>
                                            <div class="d-flex justify-content-start">
                                                <button id="saveDataBtnEL1X" class="btn btn-primary mt-3">Siguiente</button>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column mb-5">
                                            <div id="elT2" class="table-container"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- -------Efecto Local - Carga Puntual------- -->
                        </div>
                    </div>

                </div>
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paper.js/0.12.17/paper-full.min.js"></script>
    <script type="module" src="./js/placasFormaL.js"></script>
<?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>