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
                            <h3 class="card-title">1. Datos Principales</h3>
                        </div>
                        <div class="card-body">
                            <form id="DataZapataCombinada">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Descripción</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" name="des" class="form-control text-center col-12" id="des" placeholder="4.5" step="any" value="Zapata A1" min=" 0" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="col-12 text-center">
                                                <label>Tipos de Zapata</label>
                                            </div>
                                            <div class="col-md-12">
                                                <select id="tipoDiseño" class="form-select" aria-label="Seleccionar tipo de diseño">
                                                    <option value="1">Tipo 1</option>
                                                    <option value="2">Tipo 2</option>
                                                    <option value="3">Tipo 3</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label></label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">qa</span>
                                                    <input type="number" name="qa" class="form-control text-center" id="qa" step="any" placeholder="1" value="1" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Ton/m<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Presión de Servicio</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3"></span>
                                                    <input type="number" name="p_servicio" class="form-control text-center" id="p_servicio" step="any" placeholder="1" value="1" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Ton/m<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>columna 1</label>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">t1</span>
                                                    <input type="number" name="t1_col1" class="form-control text-center" id="t1_col1" step="any" placeholder="0.5" value="0.5" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">t2</span>
                                                    <input type="number" name="t2_col1" class="form-control text-center" id="t2_col1" step="any" placeholder="0.5" value="0.5" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>columna 2</label>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">t1</span>
                                                    <input type="number" name="t1_col2" class="form-control text-center" id="t1_col2" step="any" placeholder="0.5" value="0.5" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">t2</span>
                                                    <input type="number" name="t2_col2" class="form-control text-center" id="t2_col2" step="any" placeholder="0.5" value="0.5" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Fluencia del acero</label>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">fy</span>
                                                    <input type="number" name="fy" class="form-control text-center" id="fy" step="any" placeholder="4200" value="4200" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"> Kgf/cm<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Resistencia a compresión del concreto</label>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">fc</span>
                                                    <input type="number" name="fc" class="form-control text-center" id="fc" step="any" placeholder="210" value="210" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kgf/cm<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Profundidad de desplante</label>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">Df</span>
                                                    <input type="number" name="df" class="form-control text-center" id="df" step="any" placeholder="1.5" value="1.5" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">S/C</span>
                                                    <input type="number" name="sc" class="form-control text-center" id="sc" step="any" placeholder="500" value="500" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Kg/m<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ym</span>
                                                    <input type="number" name="ym" class="form-control text-center" id="ym" step="any" placeholder="2000" value="2000" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Kg/m<sup>3</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">hc</span>
                                                    <input type="number" name="hc" class="form-control text-center" id="hc" step="any" placeholder="0.2" value="0.2" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">σt</span>
                                                    <input type="number" name="ot" class="form-control text-center" id="ot" step="any" placeholder="3" value="3" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Kg/m<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">hz</span>
                                                    <input type="number" name="hz" class="form-control text-center" id="hz" step="any" placeholder="1" value="1" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">m1</span>
                                                    <input type="number" name="m1" class="form-control text-center" id="m1" step="any" placeholder="1" value="1" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">m2</span>
                                                    <input type="number" name="m2" class="form-control text-center" id="m2" step="any" placeholder="1" value="1" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">r</span>
                                                    <input type="number" name="r" class="form-control text-center" id="r" step="any" placeholder="1" value="1" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">rec</span>
                                                    <input type="number" name="rec" class="form-control text-center" id="rec" step="any" placeholder="7.5" value="7.5" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">Le</span>
                                                    <input type="number" name="Le" class="form-control text-center" id="Le" step="any" placeholder="5" value="5" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
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
                    <!-- <div class="card-header">
                        <h3>Diseño</h3>
                    </div>
                    <div class="card">
                        <div class="d-flex justify-content-center">
                            <canvas id="myCanvas" width="1000" height="300" style="border: none;"></canvas>
                        </div>
                    </div> -->

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


    <script src="js/zapataCombinada.js"></script>
    <script type="text/javascript" src="grafica.js"></script>
</div>
<?php
include_once "assets/views/footer.php";
?>