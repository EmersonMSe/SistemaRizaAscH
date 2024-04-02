<?php
session_start();
if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2) {
    ?>
    <title>Adm | DISEÑO DE ZAPATAS</title>
    <?php
    include_once "assets/views/header.php";
    include_once "assets/views/nav.php";
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"
        integrity="sha512-7U4rRB8aGAHGVad3u2jiC7GA5/1YhQcQjxKeaVms/bT66i3LVBMRcBI9KwABNWnxOSwulkuSXxZLGuyfvo7V1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DISEÑO DE MUROS DE ALBAÑERIA</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../adm_principal.php">Home</a></li>
                            <li class="breadcrumb-item active">DISEÑO DE MUROS DE ALBAÑERIA</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Datos Principales &nbsp;&nbsp;&nbsp;&nbsp;<small>Método de la NTP
                                        E.070</small></h3>
                            </div>
                            <form action="" id="murosAlb">
                                <div class="card-body">
                                    <section class="content">
                                        <div class="row">
                                            <hr class="bg-info">
                                            <h1>Datos Generales</h1>
                                            <hr class="bg-info">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <label for="">Dimensiones del ladrillo</label>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Alto</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    cm
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Ancho</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    cm
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Largo</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    cm
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <label for="">Columna Izquierda</label>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>d</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>tc</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <label for="">Viga</label>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>b</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>h</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <label for="">Columna derecha</label>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>d</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>tc</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <label for="">Datos del Elementos de Confinamiento</label>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>d</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>tc</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <label for="">Sobrecimiento</label>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>b</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>h</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <label for="">Sobrecimiento</label>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>b</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>h</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>UBICACION</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <select name="Columna" class="form-control" id="Columna"
                                                                required>
                                                                <option disabled selected>UBICACIONs
                                                                </option>
                                                                <option value="40">Primer Nivel</option>
                                                                <option value="30">SEGUNDO Nivel</option>
                                                                <option value="20">TERCER Nivel</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>TIPO MURO</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <select name="Columna" class="form-control" id="Columna"
                                                                required>
                                                                <option disabled selected>TIPO MUROS
                                                                </option>
                                                                <option value="40">Soga</option>
                                                                <option value="30">Cabeza</option>
                                                                <option value="20">otros</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Altura, h</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Longitud</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Espesor, t</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>f'b</label>
                                                        <div class="input-group date" id="fc" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fc"
                                                                placeholder="fc" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    kgf/cm<sup>2</sup>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <div class="input-group date" id="b" data-target-input="nearest">
                                                            <select name="Columna" class="form-control" id="Columna"
                                                                required>
                                                                <option disabled selected>seleccione una opcion
                                                                </option>
                                                                <option value="40">King Kong Artesanal</option>
                                                                <option value="30">King Kong Industrial</option>
                                                                <option value="20">Rejilla Industrial</option>
                                                                <option value="20">King Kong Normal</option>
                                                                <option value="20">Dédalo</option>
                                                                <option value="20">Estándar y mecano (*)</option>
                                                                <option value="20">Bloque Tipo P (*)</option>
                                                                <option value="20">Bloque Tipo P (**)</option>
                                                                <option value="20">Bloque Tipo P (***)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>f'm</label>
                                                        <div class="input-group date" id="l" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="l"
                                                                placeholder="l" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    kgf/cm<sup>2</sup>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Rv'm</label>
                                                        <div class="input-group date" id="DZY" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="DZY"
                                                                placeholder="Dimension de zapata en Y" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    kgf/cm<sup>2</sup>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Ф Varilla X</label>
                                                        <select name="VarillaX" class="form-control" id="VarillaX" required>
                                                            <option disabled selected>Ф Varilla
                                                            </option>
                                                            <option value="0">Ø 0"</option>
                                                            <option value="0.283">6mm</option>
                                                            <option value="0.503">8mm</option>
                                                            <option value="0.713">Ø 3/8"</option>
                                                            <option value="1.131">12mm</option>
                                                            <option value="1.267">Ø 1/2"</option>
                                                            <option value="1.979">Ø 5/8"</option>
                                                            <option value="2.850">Ø 3/4"</option>
                                                            <option value="5.067">Ø 1"</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <br>
                                            <hr>
                                            <h1>Resistencia de la albañileria</h1>
                                            <hr>
                                            <br>
                                            <hr>
                                            <h1>Refuerzo Horizontal</h1>
                                            <hr>
                                            <br>
                                            <hr>
                                            <h1>Dis. col de conf </h1>
                                            <hr>
                                            <br>
                                            <hr>
                                            <h1>Dis. col de conf estr</h1>
                                            <hr>
                                            <br>
                                            <hr>
                                            <h1>Dis. col de conf estr</h1>
                                            <hr>
                                        </div>
                                    </section>
                                </div>
                                <div class="card-footer">
                                    <div class="group-form">
                                        <button class="btn btn-primary" type="submit">DISEÑAR</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">RESULTADOS <small><button id="generarPDF"
                                            onclick="pruebaDivAPdf()">Generar PDF</button></small></h3>
                            </div>
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