<title>Adm | DISEÑO DE ZAPATAS</title>
<?php
include_once "assets/views/header.php";
include_once "assets/views/nav.php";
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js" integrity="sha512-7U4rRB8aGAHGVad3u2jiC7GA5/1YhQcQjxKeaVms/bT66i3LVBMRcBI9KwABNWnxOSwulkuSXxZLGuyfvo7V1A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/paper.js/0.12.15/paper-full.min.js"></script>
<style>
    canvas {
        border: 1px solid black;
    }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DISEÑO DE ZAPATAS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../adm_principal.php">Home</a></li>
                        <li class="breadcrumb-item active">DISEÑO DE ZAPATAS</li>
                    </ol>
                </div>
            </div>|
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- Contenedor de las filas -->
            <div class="row">
                <!-- Primera columna datos generales -->
                <div class="col-3">
                    <div class="card-dark" style="height: 900px; overflow-y: auto;">
                        <div class="card-header">
                            <h3 class="card-title">1. Datos Principales &nbsp;&nbsp;&nbsp;&nbsp;<small>Método de la NTP
                                    E.030</small></h3>
                        </div>
                        <div class="card-body">
                            <form id="DataZapata">
                                <div class="row mb-3">
                                    <div class="col-md-12">




                                        <h4>2. Zapata Conectada</h4><br>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Dimensiones de las columnas</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">c₁</span>
                                                    <input type="number" name="c1" class="form-control text-center" id="c1" placeholder="0.6" step="any" value="0.6" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">c'₁</span>
                                                    <input type="number" name="c_1" class="form-control text-center" id="c_1" value="0.8" min="0" step="any" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Luz libre entre columnas:</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">lₙ</span>
                                                    <input type="number" name="ln" class="form-control text-center" id="ln" step="any" value="5" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Cargas-En los momentos gravitacionales horario positivo</label>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6 text-center">
                                                        <label>Columna 1</label>
                                                    </div>
                                                    <div class="col-6 text-center">
                                                        <label>Columna 2</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>P<sub>D1</sub> </label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input step="any" type="number" id="PD1" name="PD1" class="form-control text-center" value="120" required>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>P <sub>D2</sub> </label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input type="number" step="any" id="PD2" name="PD2" class="form-control text-center" value="200">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>P<sub>L1</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input type="number" step="any" id="PL1" name="PL1" class="form-control text-center" value="70" required>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>P<sub>L2</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input step="any" type="number" id="PL2" name="PL2" class="form-control text-center" value="115">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>P<sub>SX1</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input type="number" step="any" id="PSX1" name="PSX1" class="form-control text-center" value="20" required>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>P<sub>SX2</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input type="number" step="any" id="PSX2" name="PSX2" class="form-control text-center" value="15">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>P<sub>SY1</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input type="number" step="any" id="PSY1" name="PSY1" class="form-control text-center" value="12" required>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>P<sub>SY2</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input type="number" step="any" id="PSY2" name="PSY2" class="form-control text-center" value="13">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>M<sub>Dx1</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input type="number" step="any" id="MDx1" name="MDx1" class="form-control text-center" value="8" required>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>M<sub>Dx2</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input type="number" step="any" id="MDx2" name="MDx2" class="form-control text-center" value="3">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>M<sub>Lx1</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input step="any" type="number" id="MLx1" name="MLx1" class="form-control text-center" value="6" required>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>M<sub>Lx2</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input step="any" type="number" id="MLx2" name="MLx2" class="form-control text-center" value="1.5">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>M<sub>Dy1</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input step="any" type="number" id="MDy1" name="MDy1" class="form-control text-center" value="6" required>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>M<sub>Dy2</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input step="any" type="number" id="MDy2" name="MDy2" class="form-control text-center" value="7">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>M<sub>Ly1</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input step="any" type="number" id="MLy1" name="MLy1" class="form-control text-center" value="4" required>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>M<sub>Ly2</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input step="any" type="number" id="MLy2" name="MLy2" class="form-control text-center" value="5">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>M<sub>SX1</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input step="any" type="number" id="MSX1" name="MSX1" class="form-control text-center" value="9">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>M<sub>SX2</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input step="any" type="number" id="MSX2" name="MSX2" class="form-control text-center" value="10">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>M<sub>SY1</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input step="any" type="number" id="MSY1" name="MSY1" class="form-control text-center" value="6">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 text-center">
                                                        <div class="col12"><label>M<sub>SX2</sub></label></div>
                                                        <div class="col12">
                                                            <div class="input-group">
                                                                <input step="any" type="number" id="MSY2" name="MSY2" class="form-control text-center" value="7">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">tonnef</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- Resto del código -->

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Capacidad portante admisible neta</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">qₙₑₜₐ</span>
                                                    <input type="number" step="any" name="qneta" class="form-control text-center" id="qneta" value="4" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kgf/cm<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Anchos de cada cimentación</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">B₁</span>
                                                    <input type="number" step="any" name="b1" class="form-control text-center" id="b1" value="3.4" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">B₂</span>
                                                    <input type="number" step="any" name="b2" class="form-control text-center" id="b2" value="2.8" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">L <sub>2</sub></span>
                                                    <input type="number" step="any" name="l2" class="form-control text-center" id="l2" value="3.2" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="col-12">
                                                    <label>Factor de amplificación de cargas muertas</label>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">α<sub>D</sub></span>
                                                    <input nameplacehoder="1.4 " value="1.4" type="number" step="any" name="fact_ampli_cm" class="form-control text-center" id="fact_ampli_cm" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="col-12">
                                                    <label>Factor de amplificación de cargas vivas</label>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">α<sub>L</sub></span>
                                                    <input id="fact_ampli_cv" placehoder="1.7 " value="1.7" type="number" step="any" name="fact_ampli_cv" class="form-control text-center" value="50" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="col-12">
                                                    <label>Factor de amplificación de cargas muertas</label>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">α<sub>D</sub></span>
                                                    <input id="fact_ampli_cm_c2" nameplacehoder="1.25 " value="1.25" type="number" step="any" name="fact_ampli_cm_c2" class="form-control text-center" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="col-12">
                                                    <label>Factor de amplificación de cargas vivas</label>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">α<sub>L</sub></span>
                                                    <input id="fact_ampli_cv_c2" placehoder="1.25 " value="1.25" type="number" step="any" name="fact_ampli_cv_c2" class="form-control text-center" value="50" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-body">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Cargar</button>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <!-- <div class="group-form">
                                <button class="btn btn-primary" type="submit">DISEÑAR</button>
                            </div> -->
                        </div>
                    </div>

                </div>
                <div class="card col-9 card-info" style="height: 900px; overflow-y: auto;">
                    <div class="card">
                        <canvas id="myCanvas" width="1000" height="300"></canvas>
                    </div>
                    <div class="card-header ">
                        <h3>Resultados</h3>
                    </div>
                    <div class="card-body col-12">
                        <div class="container">
                            <div class="table-responsive" id="ObtenerResultados">
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <br>
    </section>
    <!-- Main content -->


    <script src="js/zapata.js"></script>
    <script type="text/javascript" src="grafica.js"></script>
</div>
<?php
include_once "assets/views/footer.php";
?>