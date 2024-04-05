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
                                                <label>Distancia entre ejes de columnas</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">δ</span>
                                                    <input type="number" name="dec" class="form-control text-center" id="dec" placeholder="4.5" step="any" value="4.5" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Distancia entre el limite de propiedad y
                                                    el eje de la columna exterior</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">Δ</span>
                                                    <input type="number" name="dist_limitP" class="form-control text-center" id="dist_limitP" placeholder="0.2" value="0.2" min="0" step="any" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Profundidad de cimentación</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">D<sub>f</sub></span>
                                                    <input type="number" name="df" class="form-control text-center" id="df" step="any" placeholder="1" value="1" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Dimensiones de la columna exterior</label>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">c<sub>1</sub></span>
                                                    <input type="number" name="c1" class="form-control text-center" id="c1" step="any" placeholder="40" value="40" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">c<sub>2</sub></span>
                                                    <input type="number" name="c2" class="form-control text-center" id="c2" step="any" placeholder="40" value="40" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Dimensiones de la columna interior</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">c'<sub>1</sub></span>
                                                    <input type="number" name="cd1_i" class="form-control text-center" id="cd1_i" step="any" placeholder="50" value="50" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">c'<sub>2</sub></span>
                                                    <input type="number" name="cd2_i" class="form-control text-center" id="cd2_i" step="any" placeholder="50" value="50" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Cargas en la columna exterior</label>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">P<sub>D1</sub></span>
                                                    <input type="number" step="any" name="pd1_e" class="form-control text-center" id="pd1_e" placeholder="20" value="20" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">tonnef</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">P<sub>L1</sub></span>
                                                    <input type="number" step="any" name="pl1_e" class="form-control text-center" id="pl1_e" placeholder="12" value="12" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">tonnef</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Cargas en la columna interior</label>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">P<sub>D2</sub></span>
                                                    <input type="number" step="any" name="pd2_i" class="form-control text-center" id="pd2_i" placeholder="38" value="38" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">tonnef</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">P<sub>L2</sub></span>
                                                    <input type="number" step="any" name="pl2_i" class="form-control text-center" id="pl2_i" placeholder="18" value="18" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">tonnef</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Espesor del piso de concreto</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">e<sub>piso</sub></span>
                                                    <input type="number" step="any" name="e_piso" class="form-control text-center" id="e_piso" placeholder="0.1" value="0.1" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Sobrecarga</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">sc</span>
                                                    <input type="number" step="any" name="sc" class="form-control text-center" id="sc" placeholder="0.5" value="0.5" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">tonnef/m<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h2>Propiedades de los materiales</h2>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Resistencia del concreto</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">f'<sub>c</sub></span>
                                                    <input type="number" step="any" name="fdc" class="form-control text-center" id="fdc" placeholder="210" value="210" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kgf/m<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Resistencia a fluencia del
                                                    acero</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">f<sub>y</sub></span>
                                                    <input type="number" step="any" name="fy" class="form-control text-center" id="fy" placeholder="4200" value="4200" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kgf/m<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Concreto de Peso normal</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">λ</span>
                                                    <input type="number" step="any" name="cpn" class="form-control text-center col-9" id="cpn" placeholder="1" value="1" min="0" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Densidad del concreto</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">γ<sub>c</sub></span>
                                                    <input type="number" step="any" name="yc" class="form-control text-center" id="yc" placeholder="2.4" value="2.4" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">tonnef/m<sup>3</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h2>Suelo</h2>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Capacidad admisible del
                                                    suelo</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">q<sub>adm</sub></span>
                                                    <input type="number" step="any" name="q_adm" class="form-control text-center" id="q_adm" placeholder="2" value="2" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kgf/cm<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Densidad de suelo</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">γ<sub>s</sub></span>
                                                    <input type="number" step="any" name="ys" class="form-control text-center" id="ys" placeholder="1.8" value="1.8" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">tonnef/m<sup>3</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>
                                        <hr>
                                        <br>
                                        <h2>Peralte mínimo para Longitud de desarrollo a compresión dentro la zapata</h2>
                                        <br>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Diámetro de la barra de la zapata</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">d<sub>bz</sub></span>
                                                    <input type="number" step="any" name="dbz" class="form-control text-center" id="dbz" placeholder="0.75" value="0.75" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">in</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Recubrimiento</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">r</span>
                                                    <input type="number" step="any" name="r" class="form-control text-center" id="r" placeholder="7.5" value="7.5" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Diámetro de la barra de la columna</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">d<sub>b</sub></span>
                                                    <input type="number" step="any" name="db" class="form-control text-center" id="db" placeholder="0.75" value="0.75" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">in</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Factor de confinamiento</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ψ<sub>r</sub></span>
                                                    <input type="number" step="any" name="fc_yr" class="form-control text-center col-9" id="fc_yr" placeholder="1" value="1" min="0" required>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Peralte adoptado</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">h<sub>z</sub></span>
                                                    <input type="number" step="any" name="hz" class="form-control text-center" id="hz" placeholder="70" value="70" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <br>
                                        <h2>Predimensionamiento</h2>
                                        <br>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Ancho propuesto</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">B'</span>
                                                    <input type="number" step="any" name="Bd" class="form-control text-center" id="Bd" placeholder="80" value="80" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">δ</span>
                                                    <input type="number" step="any" name="delta" class="form-control text-center" id="delta" placeholder="4.5" value="4.5" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Longitudes finales adoptadas</label>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">L</span>
                                                    <input type="number" step="any" name="L" class="form-control text-center" id="L" placeholder="6.1" value="6.1" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">B</span>
                                                    <input type="number" step="any" name="B" class="form-control text-center" id="B" placeholder="85" value="85" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">cm</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>
                                        <h2>Presión ultima de diseño </h2>
                                        <br>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Peralte aproximado</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">h<sub>z</sub></span>
                                                    <input type="number" step="any" name="hz_aprox" class="form-control text-center" id="hz_aprox" placeholder="0.7" value="0.7" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>
                                        <h2>Verificación por cortante en 2 direcciones</h2>
                                        <br>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Diámetro de la barra longitudinal</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">d<sub>v</sub></span>
                                                    <input type="number" step="any" name="dv" class="form-control text-center" id="dv" placeholder="0.75" value="0.75" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">in</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <br>
                                        <h2>Resistencia al punzonamiento (Columna Exterior)</h2>
                                        <br>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Coeficiente de minoración</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">Φ<sub>c</sub></span>
                                                    <input type="number" step="any" name="cm_of" class="form-control text-center col-9" id="cm_of" placeholder="0.75" value="0.75" min="0" required>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">

                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">α<sub>s</sub></span>
                                                    <input type="number" step="any" name="as_e" class="form-control text-center col-9" id="as_e" placeholder="30" value="30" min="0" required>

                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <br>
                                        <h2>Resistencia al punzonamiento (Columna Interior)</h2>
                                        <br>

                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">α<sub>s</sub></span>
                                                    <input type="number" step="any" name="as_i" class="form-control text-center col-9" id="as_i" placeholder="40" value="40" min="0" required>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <br>
                                        <h2>Resistencia a cortante considerando el acero mínimo</h2>
                                        <br>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Cuantía colocada en tracción</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">ρ<sub>w</sub></span>
                                                    <input type="number" step="any" name="pw" class="form-control text-center col-9" id="pw" placeholder="40" value="40" min="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">B</span>
                                                    <input type="number" step="any" name="B_ram" class="form-control text-center" id="B_ram" placeholder="1.25" value="1.25" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">in</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <br>
                                        <h2>Diseño por flexión - Acero longitudinal positivo (superior) </h2>
                                        <br>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Factor de Reducción por flexión</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">Φ<sub>f</sub></span>
                                                    <input type="number" step="any" name="of_frf" class="form-control text-center col-9" id="of_frf" placeholder="0.9" value="0.9" min="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Diámetro de la barra</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">d<sub>bz</sub></span>
                                                    <input type="number" step="any" name="dbz_sup" class="form-control text-center col-9" id="dbz_sup" placeholder="0.75" value="0.75" min="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Numero de barras adoptado</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">N<sub>v1</sub></span>
                                                    <input type="number" step="any" name="Nv1" class="form-control text-center col-9" id="Nv1" placeholder="7" value="7" min="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Deformación máxima útil del
                                                    concreto no confinado</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">ε<sub>c</sub></span>
                                                    <input type="number" step="any" name="ec" class="form-control text-center col-9" id="ec" placeholder="0.003" value="0.003" min="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Modulo de elasticidad del
                                                    acero</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">E<sub>s</sub></span>
                                                    <input type="number" step="any" name="es" class="form-control text-center" id="es" placeholder="200000" value="200000" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">MPa</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <br>
                                        <h2>Acero Transversal (inferior)</h2>
                                        <br>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Diámetro de la barra:</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">d'<sub>bz</sub></span>
                                                    <input type="number" step="any" name="ddbz" class="form-control text-center" id="ddbz" placeholder="0.75" value="0.75" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">in</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Numero de barras adoptado columna interior</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">N<sub>v1</sub></span>
                                                    <input type="number" step="any" name="Nv1_inf" class="form-control text-center col-9" id="Nv1_inf" placeholder="5" value="5" min="0" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Numero de barras adoptado columna exterior</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">N<sub>v1</sub></span>
                                                    <input type="number" step="any" name="Nv1_ext" class="form-control text-center col-9" id="Nv1_ext" placeholder="4" value="4" min="0" required>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <br>
                                        <h2>Desarrollo del refuerzo longitudinal</h2>
                                        <br>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Desarrollo de la varilla superior sin gancho</label>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ψ<sub>t</sub></span>
                                                    <input type="number" step="any" name="yt_sup_sg" class="form-control text-center col-9" id="yt_sup_sg" placeholder="1.3" value="1.3" min="0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ψ<sub>e</sub></span>
                                                    <input type="number" step="any" name="ye_sup_sg" class="form-control text-center col-9" id="ye_sup_sg" placeholder="1" value="1" min="0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ψ<sub>g</sub></span>
                                                    <input type="number" step="any" name="yg_sup_sg" class="form-control text-center col-9" id="yg_sup_sg" placeholder="1" value="1" min="0" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Desarrollo de la varilla superior con gancho</label>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ψ<sub>e</sub></span>
                                                    <input type="number" step="any" name="ye_sup_cg" class="form-control text-center col-9" id="ye_sup_cg" placeholder="1" value="1" min="0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ψ<sub>r</sub></span>
                                                    <input type="number" step="any" name="yr_sup_cg" class="form-control text-center col-9" id="yr_sup_cg" placeholder="1" value="1" min="0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ψ<sub>o</sub></span>
                                                    <input type="number" step="any" name="yo_sup_cg" class="form-control text-center col-9" id="yo_sup_cg" placeholder="1.25" value="1.25" min="0" required>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Desarrollo de la varilla inferior sin gancho</label>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ψ<sub>t</sub></span>
                                                    <input type="number" step="any" name="yt_inf" class="form-control text-center col-9" id="yt_inf" placeholder="1" value="1" min="0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ψ<sub>e</sub></span>
                                                    <input type="number" step="any" name="ye_inf" class="form-control text-center col-9" id="ye_inf" placeholder="1" value="1" min="0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ψ<sub>g</sub></span>
                                                    <input type="number" step="any" name="yg_inf" class="form-control text-center col-9" id="yg_inf" placeholder="1" value="1" min="0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ψ<sub>r</sub></span>
                                                    <input type="number" step="any" name="yr_inf" class="form-control text-center col-9" id="yr_inf" placeholder="1" value="1" min="0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ψ<sub>e</sub></span>
                                                    <input type="number" step="any" name="ye_inf" class="form-control text-center col-9" id="ye_inf" placeholder="1" value="1" min="0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ψ<sub>s</sub></span>
                                                    <input type="number" step="any" name="ys_inf" class="form-control text-center col-9" id="ys_inf" placeholder="1" value="1" min="0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">K<sub>tr</sub></span>
                                                    <input type="number" step="any" name="Ktr_inf" class="form-control text-center col-9" id="Ktr_inf" placeholder="0" value="0" min="0" required>
                                                </div>
                                            </div>

                                        </div>

                                        <hr>
                                        <br>
                                        <h2>Desarrollo del acero transversal</h2>
                                        <br>
                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text col-3">ψ<sub>t</sub></span>
                                                    <input type="number" step="any" name="yt_at" class="form-control text-center col-9" id="yt_at" placeholder="1.3" value="1.3" min="0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ψ<sub>e</sub></span>
                                                    <input type="number" step="any" name="ye_at" class="form-control text-center col-9" id="ye_at" placeholder="1" value="1" min="0" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">ψ<sub>g</sub></span>
                                                    <input type="number" step="any" name="yg_at" class="form-control text-center col-9" id="yg_at" placeholder="1" value="1" min="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <br>
                                        <h2>Transferencia de la carga axial de columna a zapata (Columna interior)</h2>
                                        <br>
                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12">
                                                <div class="col-12">
                                                    <label>Volado a la derecha</label>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">l<sub>vd</sub></span>
                                                    <input type="number" step="any" name="lvd" class="form-control text-center col-9" id="lvd" placeholder="3.773" value="3.773" min="0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">Φ<sub>apls</sub></span>
                                                    <input type="number" step="any" name="o_apls" class="form-control text-center col-9" id="o_apls" placeholder="0.65" value="0.65" min="0" required>
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