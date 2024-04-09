<?php
session_start();
/* if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2) { */
if (1 == 1 || 1 == 1) {
?>

    <head>
        <title>Adm | DISEÑO DE PLACAS EN FORMA DE L</title>
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
                <div class="row">
                    <div class="col-md-12">
                        <!-- -------Solicitud de cargas------- -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">SOLICITACIONES DE CARGA</h3>
                                <button class="collapsible-btn" data-target="content1">↓</button>
                            </div>
                            <div class="card-body" class="collapsible-content" id="content1">
                                <div class="d-flex flex-column">
                                    <div class="d-flex flex-column mb-5">
                                        <div id="solicitudCargaT1" class="table-container"></div>
                                        <div class="d-flex justify-content-start">
                                            <button id="saveDataBtn1" class="btn btn-primary mt-3">Guardar Datos Iniciales</button>
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
                                        <div class="d-flex justify-content-start">
                                            <button id="saveDataBtn3" class="btn btn-primary mt-3">Guardar Datos Finales</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- -------end Solicitud de cargas------- -->

                        <!-- -------Diseño por Flexión------- -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">DISEÑO POR FLEXIÓN</h3>
                                <button class="collapsible-btn" data-target="content2">↓</button>
                            </div>
                            <!-- Tablas interiores -->
                            <div class="card-body" class="collapsible-content" id="content2">
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-2" id="formContainerDF" class="mt-1" style="display: block; overflow-y: auto; max-height: 400px;">
                                                <!-- form en js -->
                                            </div>
                                            <!-- <div class="col-1">
                                                <div class="v-line"></div>
                                            </div> -->
                                            <div class="col-10">
                                                <!-- <div style="width: 100%; height: 500px;" class="mb-5 d-none">
                                                    <canvas id="graphDF" width="500" height="500"></canvas>
                                                </div> -->
                                                <!-- Tabla Análisis en Dirección "x" -->
                                                <div class="card">
                                                    <div class="card-header bg-info">Análisis en dirección "X" <button class="collapsible-btn" data-target="contentDFx">↓</button></div>
                                                    <div class="card-body collapsible-content" id="contentDFx">
                                                        <div class="container-fluid">
                                                            <div class="row d-flex flex-column">
                                                                <div class="d-flex flex-column mb-5">
                                                                    <div id="flexDesingT1X" class="table-container"></div>
                                                                    <div class="d-flex justify-content-start">
                                                                        <button id="saveDataBtnDF1X" class="btn btn-primary mt-3">Siguiente</button>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex flex-column mb-5">
                                                                    <div id="flexDesingT2X" class="table-container"></div>
                                                                    <div class="d-flex justify-content-start">
                                                                        <button id="saveDataBtnDF2X" class="btn btn-primary mt-3">Guardar Datos tabla 2</button>
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
                                                </div>
                                                <!-- Tabla Análisis en Dirección "y" -->
                                                <div class="card">
                                                    <div class="card-header bg-info">Análisis en dirección "Y" <button class="collapsible-btn" data-target="contentDFy">↓</button></div>
                                                    <div class="card-body collapsible-content" id="contentDFy">
                                                        <div class="container-fluid">
                                                            <div class="row d-flex flex-column">

                                                                <div class="row d-flex flex-column">
                                                                    <div class="d-flex flex-column mb-5">
                                                                        <div id="flexDesingT1Y" class="table-container"></div>
                                                                        <div class="d-flex justify-content-start">
                                                                            <button id="saveDataBtnDF1Y" class="btn btn-primary mt-3">Siguiente</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex flex-column mb-5">
                                                                        <div id="flexDesingT2Y" class="table-container"></div>
                                                                        <div class="d-flex justify-content-start">
                                                                            <button id="saveDataBtnDF2Y" class="btn btn-primary mt-3">Guardar Datos Iniciales</button>
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
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <!-- -------end Diseño por Flexión------- -->

                        <!-- -------Diseño por Corte------- -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">DISEÑO POR CORTE</h3>
                                <button class="collapsible-btn" data-target="content3">↓</button>
                            </div>
                            <!-- Tablas interiores -->
                            <div class="card-body" class="collapsible-content" id="content3">
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- <div style="width: 100%; height: 500px;" class="mb-5 d-none">
                                                    <canvas id="graphDF" width="500" height="500"></canvas>
                                                </div> -->
                                                <!-- Tabla Análisis en Dirección "x" -->
                                                <div class="card">
                                                    <div class="card-header bg-info">Análisis en dirección "X" <button class="collapsible-btn" data-target="contentDCx">↓</button></div>
                                                    <div class="card-body collapsible-content" id="contentDCx">
                                                        <div class="container-fluid">
                                                            <div class="row d-flex flex-column">
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
                                                </div>
                                                <!-- Tabla Análisis en Dirección "y" -->
                                                <div class="card">
                                                    <div class="card-header bg-info">Análisis en dirección "Y" <button class="collapsible-btn" data-target="contentDCy">↓</button></div>
                                                    <div class="card-body collapsible-content" id="contentDCy">
                                                        <div class="container-fluid">
                                                            <div class="row d-flex flex-column">
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
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <!-- -------end Diseño por Corte------- -->

                        <!-- -------Diagramas de Interacción------- -->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">DIAGRAMAS DE INTEGRACIÓN</h3>
                                <button class="collapsible-btn" data-target="content4">↓</button>
                            </div>
                            <!-- Tablas interiores -->
                            <div class="card-body" class="collapsible-content" id="content4">
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- <div style="width: 100%; height: 500px;" class="mb-5 d-none">
                                                    <canvas id="graphDF" width="500" height="500"></canvas>
                                                </div> -->
                                                <!-- Tabla Análisis en Dirección "x" -->
                                                <div class="card">
                                                    <div class="card-header bg-info">Análisis en dirección "X" <button class="collapsible-btn" data-target="contentDIx">↓</button></div>
                                                    <div class="card-body collapsible-content" id="contentDIx">
                                                        <div class="container-fluid">
                                                            <div class="row d-flex flex-column">
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
                                                </div>
                                                <!-- Tabla Análisis en Dirección "y" -->
                                                <div class="card">
                                                    <div class="card-header bg-info">Análisis en dirección "Y" <button class="collapsible-btn" data-target="contentDIy">↓</button></div>
                                                    <div class="card-body collapsible-content" id="contentDIy">
                                                        <div class="container-fluid">
                                                            <div class="row d-flex flex-column">
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
                                                            <div class="row d-flex" id="diagramsContainer">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <!-- -------end Diagramas de Interacción------- -->

                        <!-- -------Verificación del agrietamiento------- -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">VERIFCACIÓN DEL AGRIETAMIENTO</h3>
                                <button class="collapsible-btn" data-target="content5">↓</button>
                            </div>
                            <!-- Tablas interiores -->
                            <div class="card-body" class="collapsible-content" id="content5">
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- <div style="width: 100%; height: 500px;" class="mb-5 d-none">
                                                    <canvas id="graphDF" width="500" height="500"></canvas>
                                                </div> -->
                                                <!-- Tabla Análisis en Dirección "x" -->
                                                <div class="card">
                                                    <div class="card-header bg-info">Análisis en dirección "X" <button class="collapsible-btn" data-target="contentVAx">↓</button></div>
                                                    <div class="card-body collapsible-content" id="contentVAx">
                                                        <div class="container-fluid">
                                                            <div class="row d-flex flex-column">
                                                                <div id="vaT1X" class="table-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Tabla Análisis en Dirección "y" -->
                                                <div class="card">
                                                    <div class="card-header bg-info">Análisis en dirección "Y" <button class="collapsible-btn" data-target="contentVAy">↓</button></div>
                                                    <div class="card-body collapsible-content" id="contentVAy">
                                                        <div class="container-fluid">
                                                            <div class="row d-flex flex-column">
                                                                <div id="vaT1Y" class="table-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <!-- -------Verificación del agrietamiento------- -->

                        <!-- -------Diseño por Compresión Pura------- -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">DISEÑO POR COMPRESIÓN PURA</h3>
                                <button class="collapsible-btn" data-target="content6">↓</button>
                            </div>
                            <!-- Tablas interiores -->
                            <div class="card-body" class="collapsible-content" id="content6">
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- <div style="width: 100%; height: 500px;" class="mb-5 d-none">
                                                    <canvas id="graphDF" width="500" height="500"></canvas>
                                                </div> -->
                                                <!-- Tabla Análisis en Dirección "x" -->
                                                <div class="card">
                                                    <div class="card-header bg-info">Análisis en dirección "X" <button class="collapsible-btn" data-target="contentDCPx">↓</button></div>
                                                    <div class="card-body collapsible-content" id="contentDCPx">
                                                        <div class="container-fluid">
                                                            <div class="row d-flex flex-column">
                                                                <div id="dcpT1X" class="table-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Tabla Análisis en Dirección "y" -->
                                                <div class="card">
                                                    <div class="card-header bg-info">Análisis en dirección "Y" <button class="collapsible-btn" data-target="contentDCPy">↓</button></div>
                                                    <div class="card-body collapsible-content" id="contentDCPy">
                                                        <div class="container-fluid">
                                                            <div class="row d-flex flex-column">
                                                                <div id="dcpT1Y" class="table-container"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <!-- -------Diseño por Compresión Pura  ------- -->

                        <!-- -------Diseño por Deslizamiento------- -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">DISEÑO POR DESLIZAMIENTO</h3>
                                <button class="collapsible-btn" data-target="content7">↓</button>
                            </div>
                            <!-- Tablas interiores -->
                            <div class="card-body" class="collapsible-content" id="content7">
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- <div style="width: 100%; height: 500px;" class="mb-5 d-none">
                                                    <canvas id="graphDF" width="500" height="500"></canvas>
                                                </div> -->
                                                <!-- Tabla Análisis en Dirección "x" -->
                                                <div class="card">
                                                    <div class="card-header bg-info">Análisis en dirección "X" <button class="collapsible-btn" data-target="contentDDx">↓</button></div>
                                                    <div class="card-body collapsible-content" id="contentDDx">
                                                        <div class="container-fluid">
                                                            <div class="row d-flex flex-column">
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
                                                </div>
                                                <!-- Tabla Análisis en Dirección "y" -->
                                                <div class="card">
                                                    <div class="card-header bg-info">Análisis en dirección "Y" <button class="collapsible-btn" data-target="contentDDy">↓</button></div>
                                                    <div class="card-body collapsible-content" id="contentDDy">
                                                        <div class="container-fluid">
                                                            <div class="row d-flex flex-column">
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
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <!-- -------Diseño por Deslizamiento  ------- -->

                        <!-- -------Efecto Local - Carga Puntual------- -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">EFECTO LOCAL - CARGA PUNTUAL</h3>
                                <button class="collapsible-btn" data-target="content8">↓</button>
                            </div>
                            <!-- Tablas interiores -->
                            <div class="card-body" class="collapsible-content" id="content8">
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- <div style="width: 100%; height: 500px;" class="mb-5 d-none">
                                                    <canvas id="graphDF" width="500" height="500"></canvas>
                                                </div> -->
                                                <div class="card">
                                                    <div class="card-header bg-info">Efecto Local - Carga Puntual<button class="collapsible-btn" data-target="contentDDx">↓</button></div>
                                                    <div class="card-body collapsible-content" id="contentDDx">
                                                        <div class="container-fluid">
                                                            <div class="row d-flex flex-column">
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
                                            </div>
                                        </div>
                                    </div>
                                </section>
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