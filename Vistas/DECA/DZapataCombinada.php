<title>Adm | DISEÑO DE ZAPATAS</title>
<?php
include_once "assets/views/header.php";
include_once "assets/views/nav.php";
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js" integrity="sha512-7U4rRB8aGAHGVad3u2jiC7GA5/1YhQcQjxKeaVms/bT66i3LVBMRcBI9KwABNWnxOSwulkuSXxZLGuyfvo7V1A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/paper.js/0.12.15/paper-full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    canvas {
        border: none;
    }

    .tamaño-tabla {
        height: 160px;
    }

    /* Estilos generales del select */
    select.form-select {
        display: block;
        width: 100%;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    /* Estilo cuando el select está en foco */
    select.form-select:focus {
        border-color: #80bdff;
        outline: 0;
        box-shadow: 0 0 0 .25rem rgba(0, 123, 255, .25);
    }

    /* Estilo cuando el select está desactivado */
    select.form-select:disabled {
        background-color: #e9ecef;
    }

    /* Estilo para la flecha del select */
    select.form-select::-ms-expand {
        border: 0;
        background-color: transparent;
    }

    /* Estilo para el borde y el fondo del dropdown */
    select.form-select:-moz-focusring {
        color: transparent;
        text-shadow: 0 0 0 #212529;
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
                <div class="col-4">
                    <div class="card-dark" style="height: 900px; overflow-y: auto;">
                        <div class="card-header">
                            <h3 class="card-title">Datos Generales</h3>
                        </div>
                        <div class="card-body">
                            <form id="DataZapataCombinada">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <h2 class="text-center"><strong>Datos Generales</strong></h2>
                                        <div class="row mb-3 text-center">
                                            <div class="col-9">
                                                <label>Descripción</label>
                                            </div>
                                            <div class="col-3">
                                                <label>Factor K</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="text" name="des" class="form-control text-center col-12" id="des" placeholder="Zapata A1" step="any" value="Zapata A1" min=" 0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="input-group">
                                                    <input type="number" name="fk" class="form-control text-center" id="fk" step="any" placeholder="1" value="1" min="0" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-6">
                                                <label></label>
                                            </div>
                                            <div class="col-6">
                                                <label>Presión de Servicio</label>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">qa</span>
                                                    <input type="number" name="qa" class="form-control text-center" id="qa" step="any" placeholder="3" value="3" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Ton/m<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <input type="number" name="p_servicio" class="form-control text-center" id="p_servicio" step="any" placeholder="8" value="8" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Ton/m<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h2 class="text-center"><strong>Predimencionamiento</strong></h2>
                                        <div class="row mb-3 text-center">
                                            <div class="col-6">
                                                <label>columna 1</label>
                                            </div>
                                            <div class="col-6">
                                                <label>columna 2</label>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">t1</span>
                                                    <input type="number" name="t1_col1" class="form-control text-center" id="t1_col1" step="any" placeholder="0.5" value="0.5" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">t1</span>
                                                    <input type="number" name="t1_col2" class="form-control text-center" id="t1_col2" step="any" placeholder="0.5" value="0.5" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">t2</span>
                                                    <input type="number" name="t2_col1" class="form-control text-center" id="t2_col1" step="any" placeholder="0.5" value="0.5" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
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
                                            <div class="col-md-6 mb-3">
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
                                            <div class="col-md-6 mb-3">
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
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12 ">
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
                                            <div class="col-md-12 ">
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
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12 mb-3">
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
                                            <div class="col-md-12 mb-3">
                                                <div class="col-12">
                                                    <label></label>
                                                </div>
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

                                        </div>


                                        <div class="row mb-3 text-center">
                                            <div class="col-md-6 mb-3">
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
                                            <div class="col-md-6 mb-3">
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

                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-md-6 mb-3">
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
                                            <div class="col-md-6 mb-3">
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

                                        </div>


                                        <div class="row mb-3 text-center">
                                            <div class="col-md-6 mb-3">
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
                                            <div class="col-md-6 mb-3">
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
                                        <input name="dataCargacol1" type="hidden" id="dataCargacol1" value="">
                                        <input name="dataCargacol2" type="hidden" id="dataCargacol2" value="">
                                        <h2 class="text-center"><strong>Combinacion de cargas</strong></h2>
                                        <h2 class="text-center"><strong>COLUMNA 1</strong></h2>
                                        <div class="row mb-3 text-center">
                                            <div id="CargaConServ" class="tamaño-tabla"></div>
                                        </div>

                                        <h2 class="text-center"><strong>COLUMNA 2</strong></h2>
                                        <div class="row mb-3 text-center">
                                            <div id="CargaConServcol2" class="tamaño-tabla"></div>
                                        </div>

                                        <h2 class="text-center"><strong>Diseño de verificación por cortante</strong></h2>
                                        <div class="row mb-3 text-center">
                                            <div class="col-6">
                                                <label>Columna 1</label>
                                            </div>
                                            <div class="col-6">
                                                <label>Columna 2</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select id="selectColumna1" name="selectColumna1" class="form-select">
                                                    <option value="fila1_col1">1.4CM+1.7CV</option>
                                                    <option value="fila2_col1">1.25(CM+CV)+Sx</option>
                                                    <option value="fila3_col1">1.25(CM+CV)-Sx</option>
                                                    <option value="fila4_col1">1.25(CM+CV)+Sy</option>
                                                    <option value="fila5_col1">1.25(CM+CV)-Sy</option>
                                                    <option value="fila6_col1">0.9CM+Sx</option>
                                                    <option value="fila7_col1">0.9CM-Sx</option>
                                                    <option value="fila8_col1">0.9CM+Sy</option>
                                                    <option value="fila9_col1">0.9CM-Sx</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-select" id="selectColumna2" name="selectColumna2">
                                                    <option value="fila1_col2">1.4CM+1.7CV</option>
                                                    <option value="fila2_col2">1.25(CM+CV)+Sx</option>
                                                    <option value="fila3_col2">1.25(CM+CV)-Sx</option>
                                                    <option value="fila4_col2">1.25(CM+CV)+Sy</option>
                                                    <option value="fila5_col2">1.25(CM+CV)-Sy</option>
                                                    <option value="fila6_col2">0.9CM+Sx</option>
                                                    <option value="fila7_col2">0.9CM-Sx</option>
                                                    <option value="fila8_col2">0.9CM+Sy</option>
                                                    <option value="fila9_col2">0.9CM-Sx</option>
                                                </select>
                                            </div>

                                        </div>


                                        <h2 class="text-center"><strong>Diseño por Flexión de Zapatas</strong></h2>
                                        <div class="row mb-3 text-center">
                                            <div class="col-md-6">
                                                <div class="col-12">
                                                    <label>Columna 1</label>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">lv</span>
                                                    <input type="number" name="lv_col1" class="form-control text-center col-12" id="lv_col1" placeholder="0.75" step="any" value="0.75" min=" 0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-12">
                                                    <label>Columna 2</label>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">lv</span>
                                                    <input type="number" name="lv_col2" class="form-control text-center col-12" id="lv_col2" placeholder="0.75" step="any" value="0.75" min=" 0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-md-6">

                                                <div class="input-group">
                                                    <span class="input-group-text col-3">d</span>
                                                    <input type="number" name="d_col1" class="form-control text-center col-12" id="d_col1" placeholder="90.6" step="any" value="89.01" min=" 0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="input-group">
                                                    <span class="input-group-text col-3">d</span>
                                                    <input type="number" name="d_col2" class="form-control text-center col-12" id="d_col2" placeholder="90.6" step="any" value="89.01" min=" 0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-6">
                                                <label>Ф Varilla</label>
                                            </div>
                                            <div class="col-6">
                                                <label>Ф Varilla</label>
                                            </div>
                                            <div class="col-md-6">

                                                <select name="VarillaX_Col1" class="form-control" id="VarillaCol1" required>
                                                    <option value="0">Ø 0"</option>
                                                    <option value="0.28">6mm</option>
                                                    <option value="0.5">8mm</option>
                                                    <option value="0.71" selected>Ø 3/8"</option>
                                                    <option value="1.13">12mm</option>
                                                    <option value="1.29">Ø 1/2"</option>
                                                    <option value="1.99">Ø 5/8"</option>
                                                    <option value="2.84">Ø 3/4"</option>
                                                    <option value="5.1">Ø 1"</option>
                                                    <option value="10.06">Ø 1 3/8"</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="VarillaX_Col2" class="form-control" id="VarillaCol2" required>
                                                    </option>
                                                    <option value="0">Ø 0"</option>
                                                    <option value="0.28">6mm</option>
                                                    <option value="0.5">8mm</option>
                                                    <option value="0.71" selected>Ø 3/8"</option>
                                                    <option value="1.13">12mm</option>
                                                    <option value="1.29">Ø 1/2"</option>
                                                    <option value="1.99">Ø 5/8"</option>
                                                    <option value="2.84">Ø 3/4"</option>
                                                    <option value="5.1">Ø 1"</option>
                                                    <option value="10.06">Ø 1 3/8"</option>
                                                </select>

                                            </div>
                                        </div>


                                        <div class="row mb-3 text-center">
                                            <div class="col-md-6">

                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ρmin</span>
                                                    <input type="number" name="pmin_col1" class="form-control text-center col-12" id="pmin_col1" placeholder="0.0018" step="any" value="0.0018" min=" 0" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ρmin</span>
                                                    <input type="number" name="pmin_col2" class="form-control text-center col-12" id="pmin_col2" placeholder="0.0018" step="any" value="0.0018" min=" 0" required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">

                                            <div class="col-md-6">
                                                <select name="selectVFColumna1" id="selectVFColumna1" class="form-select">
                                                    <option value="fila1_col1">1.4CM+1.7CV</option>
                                                    <option value="fila2_col1">1.25(CM+CV)+Sx</option>
                                                    <option value="fila3_col1">1.25(CM+CV)-Sx</option>
                                                    <option value="fila4_col1">1.25(CM+CV)+Sy</option>
                                                    <option value="fila5_col1">1.25(CM+CV)-Sy</option>
                                                    <option value="fila6_col1">0.9CM+Sx</option>
                                                    <option value="fila7_col1">0.9CM-Sx</option>
                                                    <option value="fila8_col1">0.9CM+Sy</option>
                                                    <option value="fila9_col1">0.9CM-Sx</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-select" name="selectVFColumna2" id="selectVFColumna2">
                                                    <option value="fila1_col2">1.4CM+1.7CV</option>
                                                    <option value="fila2_col2">1.25(CM+CV)+Sx</option>
                                                    <option value="fila3_col2">1.25(CM+CV)-Sx</option>
                                                    <option value="fila4_col2">1.25(CM+CV)+Sy</option>
                                                    <option value="fila5_col2">1.25(CM+CV)-Sy</option>
                                                    <option value="fila6_col2">0.9CM+Sx</option>
                                                    <option value="fila7_col2">0.9CM-Sx</option>
                                                    <option value="fila8_col2">0.9CM+Sy</option>
                                                    <option value="fila9_col2">0.9CM-Sx</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12">

                                                <div class="input-group">
                                                    <span class="input-group-text col-3">φ</span>
                                                    <input type="number" name="fi_general" class="form-control text-center col-12" id="fi_general" placeholder="0.9" step="any" value="0.9" min=" 0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h2 class="text-center"><strong>Verificación por Corte y Punzonamiento</strong></h2>
                                        <div class="row mb-3 text-center">
                                            <div class="col-md-6">
                                                <div class="col-12">
                                                    <label>Columna 1</label>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">d</span>
                                                    <input type="number" name="dvc_col1" class="form-control text-center col-12" id="dvc_col1" placeholder="91.55" step="any" value="91.55" min=" 0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-12">
                                                    <label>Columna 2</label>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">d</span>
                                                    <input type="number" name="dvc_col2" class="form-control text-center col-12" id="dvc_col2" placeholder="91.55" step="any" value="91.55" min=" 0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-md-6">

                                                <div class="input-group">
                                                    <span class="input-group-text col-3">r</span>
                                                    <input type="number" name="r_vc_col1" class="form-control text-center col-12" id="r_vc_col1" placeholder="7.5" step="any" value="7.5" min=" 0" required>

                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="input-group">
                                                    <span class="input-group-text col-3">r</span>
                                                    <input type="number" name="r_vc_col2" class="form-control text-center col-12" id="r_vc_col2" placeholder="7.5" step="any" value="7.5" min=" 0" required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-6">
                                                <label>Ф Varilla</label>
                                            </div>
                                            <div class="col-6">
                                                <label>Ф Varilla</label>
                                            </div>
                                            <div class="col-md-6">

                                                <select name="VarillaVC_Col1" class="form-control" id="VarillaVC_Col1" required>
                                                    <option value="0">Ø 0"</option>
                                                    <option value="0.28">6mm</option>
                                                    <option value="0.5">8mm</option>
                                                    <option value="0.71" selected>Ø 3/8"</option>
                                                    <option value="1.13">12mm</option>
                                                    <option value="1.29">Ø 1/2"</option>
                                                    <option value="1.99">Ø 5/8"</option>
                                                    <option value="2.84">Ø 3/4"</option>
                                                    <option value="5.1">Ø 1"</option>
                                                    <option value="10.06">Ø 1 3/8"</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="VarillaVC_Col2" class="form-control" id="VarillaVC_Col2" required>
                                                    </option>
                                                    <option value="0">Ø 0"</option>
                                                    <option value="0.28">6mm</option>
                                                    <option value="0.5">8mm</option>
                                                    <option value="0.71" selected>Ø 3/8"</option>
                                                    <option value="1.13">12mm</option>
                                                    <option value="1.29">Ø 1/2"</option>
                                                    <option value="1.99">Ø 5/8"</option>
                                                    <option value="2.84">Ø 3/4"</option>
                                                    <option value="5.1">Ø 1"</option>
                                                    <option value="10.06">Ø 1 3/8"</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-6">
                                                <label>Tipo de Columna y Factor α</label>
                                            </div>
                                            <div class="col-6">
                                                <label>Tipo de Columna y Factor α</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="fa_Col1" class="form-control" id="fa_Col1" required>
                                                    <option value="40">Columnas Interiores</option>
                                                    <option value="30" selected>Columnas de Borde</option>
                                                    <option value="20">Columnas de Esquina</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="fa_Col2" class="form-control" id="fa_Col2" required>
                                                    <option value="40">Columnas Interiores</option>
                                                    <option value="30" selected>Columnas de Borde</option>
                                                    <option value="20">Columnas de Esquina</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>∅</label>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">∅</span>
                                                    <input type="number" name="ovcp" class="form-control text-center col-12" id="ovcp" placeholder="0.85" step="any" value="0.85" min=" 0" required>

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
                <div class="card col-8 card-info" style="height: 900px; overflow-y: auto;">
                    <div class="card-header">
                        <h3>Diseño</h3>
                    </div>
                    <h2>Predimencionamiento</h2>
                    <div class="card">
                        <div class="d-flex justify-content-center">
                            <canvas id="predimencionamiento" width="1000" height="400"></canvas>
                        </div>
                    </div>
                    <div class="card">
                        <div class="d-flex justify-content-center">
                            <canvas id="vistaplanta" width="1000" height="400"></canvas>
                        </div>
                    </div>
                    <h2>Verificación por cortante</h2>

                    <div class="card">
                        <div class="d-flex justify-content-center">
                            <canvas id="myChart" width="1000" height="400"></canvas>
                        </div>
                    </div>
                    <h2>Verificación por flexión</h2>
                    <div class="card">
                        <div class="d-flex justify-content-center">
                            <canvas id="VC_flexion" width="1000" height="400"></canvas>
                        </div>
                    </div>
                    <h2>Corte y Punzonamiento</h2>
                    <div class="card">
                        <div class="d-flex justify-content-center">
                            <canvas id="corte_punzonamiento" width="1000" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="card col-12 card-info">
                    <div class="card-header ">
                        <h3>Resultados</h3>
                    </div>
                    <div class="card-body col-12">
                        <div class="table-responsive" id="ObtenerResultados">
                        </div>
                    </div>
                </div>


            </div>
            <br>
    </section>
    <!-- Main content -->
    <script src="js/zapataCombinada.js"></script>
    <!-- 

    
</div>
<?php
include_once "assets/views/footer.php";
?>