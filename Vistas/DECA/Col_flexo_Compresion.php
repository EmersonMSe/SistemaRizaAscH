<?php
session_start();
if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2) {
    ?>
    <title>Adm | DISEÑO COLUMNAS</title>
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
                        <h1>DISEÑO DE COLUMNAS</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../adm_principal.php">Home</a></li>
                            <li class="breadcrumb-item active">DISEÑO DE COLUMNAS</li>
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
                                        E.030</small></h3>
                            </div>
                            <form method="post" id="ColumnaF">
                                <div class="card-body">
                                    <div class="d-flex justify-content align-items-center">
                                        <div class="col-md-3">
                                            <div class="input-group mb-2">
                                                <label for="fc">f´c</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="number" name="fc" class="form-control" id="fc"
                                                    placeholder="210" min="0" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">kg/cm<sup>2</sup></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group mb-2">
                                                <label for="fy">f´y</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="number" name="fy" class="form-control" id="fy"
                                                    placeholder="4200" min="0" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">kg/cm<sup>2</sup></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="col-md-3">
                                            <div class="input-group mb-2">
                                                <label for="altura">H</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input name="altura" class="form-control" id="altura" placeholder="altura"
                                                    min="0" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">m</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group mb-2">
                                                <label for="L1">Lx</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input name="L1" class="form-control" id="L1" placeholder="base" min="0"
                                                    required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">cm</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group mb-2">
                                                <label for="L2">Ly</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input name="L2" class="form-control" id="L2" placeholder="altura" min="0"
                                                    required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">cm</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group mb-2">
                                                <label for="d">d</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input name="d" class="form-control" id="d" placeholder="d" min="0"
                                                    required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">cm</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;

                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div id="Scrga"></div>
                                                <div id="Scrga"></div>
                                            </div>
                                        </div>
                                    </section>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <!-- Incluido -->
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div id="diagramaxx"></div>
                                                <div id="myDiagramsxx"></div>
                                            </div>
                                        </div>
                                    </section>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div id="diagramayy"></div>
                                                <div id="myDiagramsyy"></div>
                                            </div>
                                        </div>
                                    </section>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;

                                    <!-- excluido  -->
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div id="diagramaex"></div>
                                                <div id="myDiagramex"></div>
                                            </div>
                                        </div>
                                    </section>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div id="diagramaexy"></div>
                                                <div id="myDiagramexy"></div>
                                            </div>
                                        </div>
                                    </section>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h1 class="text-center">Diseño por Corte</h1>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Condicion de Esbeltez</label>
                                                        <select name="CDEsbelZ" class="form-control" id="CDEsbelZ" required>
                                                            <option disabled selected>Condicion de Esbeltez
                                                            </option>
                                                            <option value="1.01">Biarticulada</option>
                                                            <option value="0.5">Empotrado Impedido</option>
                                                            <option value="2">Empotrado y Libre</option>
                                                            <option value="1.02">Empotrado Permitido</option>
                                                            <option value="1">Según Norma</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Sistema Estructural</label>
                                                        <select name="SEstru" class="form-control" id="SEstru" required>
                                                            <option value="" disabled selected>Sistema Estructural
                                                            </option>
                                                            <option value="Porticos">Pórticos</option>
                                                            <option value="DualTipI">Dual Tipo I</option>
                                                            <option value="DualTipII">Dual Tipo II</option>
                                                            <option value="MEstructurales">Muros Estructurales</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Tipo de Grapas</label>
                                                        <select name="Tgrapas" class="form-control" id="Tgrapas" required>
                                                            <option value="" disabled selected>Tipo de Grapas
                                                            </option>
                                                            <option value="caso I">CASO I</option>
                                                            <option value="caso II">CASO II</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Pu inf</label>
                                                        <div class="input-group date" id="puinf"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control" name="puinf"
                                                                placeholder="Pu inf" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    (Ton)
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Pu Sup</label>
                                                        <div class="input-group date" id="pusup"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control" name="pusup"
                                                                placeholder="Pu sup" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    (Ton)
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Mn inf</label>
                                                        <div class="input-group date" id="Mninf"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control" name="Mninf"
                                                                placeholder="Mn inf" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    (Ton.m)
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Mn Sup</label>
                                                        <div class="input-group date" id="Mnsup"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control" name="Mnsup"
                                                                placeholder="Mn Sup" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    (Ton.m)
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Vud etabs (Ton)</label>
                                                        <div class="input-group date" id="VudEtaps"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control" name="VudEtaps"
                                                                placeholder="Vud etabs (Ton)" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    (Ton)
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Area del Acero Total:</label>
                                                        <div class="input-group date" id="AAceroTotal"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control" name="AAceroTotal"
                                                                placeholder="AAceroTotal" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text"> cm<sup>2</sup>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Acero de Estribo</label>
                                                        <select name="AEstribos" class="form-control" id="AEstribos"
                                                            required>
                                                            <option disabled selected>Acero de Estribos
                                                            </option>
                                                            <option value="0.28">ø6mm</option>
                                                            <option value="1.13">12mm</option>
                                                            <option value="0.50">8mm</option>
                                                            <option value="0.71">ø3/8"</option>
                                                            <option value="1.27">ø1/2"</option>
                                                            <option value="1.98">ø5/8"</option>
                                                            <option value="2.85">ø3/4"</option>
                                                            <option value="5.10">ø1"</option>
                                                            <option value="7.92">ø1 1/4"</option>
                                                            <option value="11.40">ø1 1/2"</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Acero Maximo Longitudinal:</label>
                                                        <select name="AmaxLong" class="form-control" id="AmaxLong" required>
                                                            <option disabled selected>Acero de Estribos
                                                            </option>
                                                            <option value="0.28">ø6mm</option>
                                                            <option value="1.13">12mm</option>
                                                            <option value="0.50">8mm</option>
                                                            <option value="0.71">ø3/8"</option>
                                                            <option value="1.27">ø1/2"</option>
                                                            <option value="1.98">ø5/8"</option>
                                                            <option value="2.85">ø3/4"</option>
                                                            <option value="5.10">ø1"</option>
                                                            <option value="7.92">ø1 1/4"</option>
                                                            <option value="11.40">ø1 1/2"</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="dataFromHandsontable" id="dataFromHandsontable" value="">
                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">DISEÑAR</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- EXCLUIDO -->

        <!-- <script>
            $(document).ready(function () {
                var dataExcluidoX = [
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0]
                ];

                var container = document.getElementById('diagramaex');
                var hot = new Handsontable(container, {
                    data: dataExcluidoX,
                    rowHeaders: true,
                    colHeaders: true,
                    contextMenu: true,
                    colWidths: 100,
                    nestedHeaders: [
                        [{ label: 'Diagrama de Interacción (excluido "Ø") - Dirección X-X', colspan: 6 }],
                        [{ label: 'CURVA a 0°', colspan: 3 }, { label: 'CURVA a 180°', colspan: 3 }],
                        ['P', 'M2', 'M3', 'P', 'M2', 'M3'],
                    ],
                    collapsibleColumns: [
                        { row: -3, col: 1, collapsible: false },
                        { row: -2, col: 1, collapsible: false },
                        { row: -1, col: 1, collapsible: false },
                    ],
                    licenseKey: 'non-commercial-and-evaluation',
                    beforeChange: function (changes, src) {
                        if (src !== 'loadData') {
                            changes.forEach((change) => {
                                var row = change[0];
                                var column = change[1];
                                var value = change[3] === '' ? 0 : parseFloat(change[3]);

                                dataFromHandsontable[row][column] = value;
                            });

                            updateChartData();
                        }
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function () {
                var data = [
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0]
                ];

                var container = document.getElementById('diagramaexy');
                var hot = new Handsontable(container, {
                    data: data,
                    rowHeaders: true,
                    colHeaders: true,
                    contextMenu: true,
                    colWidths: 100,
                    nestedHeaders: [
                        [{ label: 'Diagrama de Interacción (Excluido "Ø") - Dirección Y-Y', colspan: 6 }],
                        [{ label: 'CURVA a 0°', colspan: 3 }, { label: 'CURVA a 180°', colspan: 3 }],
                        ['P', 'M2', 'M3', 'P', 'M2', 'M3'],
                    ],
                    collapsibleColumns: [
                        { row: -3, col: 1, collapsible: false },
                        { row: -2, col: 1, collapsible: false },
                        { row: -1, col: 1, collapsible: false },
                    ],
                    licenseKey: 'non-commercial-and-evaluation'
                });
            });
        </script> -->

        <script>
            $(document).ready(function () {
                var data = [
                    ['CL-01', 'CM', 0, 0, 0, 0, 0, 0, 0],
                    ['', 'CV', 0, 0, 0, 0, 0, 0, 0],
                    ['', 'CSX', 0, 0, 0, 0, 0, 0, 0],
                    ['', 'CSY', 0, 0, 0, 0, 0, 0, 0],
                ];

                var container = document.getElementById('Scrga');
                var hot = new Handsontable(container, {
                    data: data,
                    rowHeaders: true,
                    colHeaders: true,
                    contextMenu: true,
                    colWidths: 100,
                    nestedHeaders: [
                        [{ label: 'Columna', rowspan: 2 }, { label: 'TipoCarga', rowspan: 2 }, { label: 'P (Ton)', colspan: 1 }, 'V2 (Ton)', 'V3 (Ton)', { label: 'M2 (Ton.m)', colspan: 2 }, { label: 'M3 (Ton.m)', colspan: 2 }],
                        ['', '', '', '', '', 'Top', 'Bottom', 'Top', 'Bottom'],
                    ],
                    collapsibleColumns: [
                        { row: -2, col: 1, collapsible: false },
                        { row: -1, col: 1, collapsible: false },
                    ],
                    licenseKey: 'non-commercial-and-evaluation'
                });

                // Captura el formulario
                const form = document.getElementById('ColumnaF');
                const dataFromHandsontable = document.querySelector('#dataFromHandsontable');

                // Agrega un manejador de eventos para el envío del formulario
                form.addEventListener('submit', function (event) {
                    event.preventDefault();

                    // Obtén los datos de Handsontable y conviértelos a JSON
                    const tableData = hot.getData();
                    const jsonData = JSON.stringify(tableData);

                    dataFromHandsontable.value = jsonData;
                    const formData = new FormData(form);

                    // Envía los datos mediante una solicitud POST AJAX
                    fetch('Controladores/Dcolumna.php', {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => response.text())
                        .then(data => {
                            const resultadosContainer = document.getElementById('ObtenerResultados');
                            resultadosContainer.innerHTML = data;
                        })
                        .catch(error => {
                            console.error('Error al enviar la solicitud Ajax', error);
                        });
                });
            });
        </script>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">RESULTADOS <small></small></h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" id="ObtenerResultados">

                                </div>
                            </div>
                            <div class="card-footer">
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Diagrama de Interacción X-X</h3>
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="remove">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <script
                                                            src="https://npmcdn.com/chart.js@latest/dist/chart.umd.js"></script>
                                                        <div class="myChartDiv">
                                                            <canvas id="DIXXs"
                                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card card-info">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Diagrama de Interacción Y-Y</h3>

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="remove">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="myChartDiv">
                                                            <canvas id="DIejey"
                                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <script>
            var dataFromHandsontable = [
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0]
            ];
            $(document).ready(function () {
                var container = document.getElementById('diagramaxx');
                var ctx = document.getElementById("DIXXs");
                var myChart;

                var hot = new Handsontable(container, {
                    data: dataFromHandsontable,
                    rowHeaders: true,
                    colHeaders: true,
                    contextMenu: true,
                    colWidths: 100,
                    nestedHeaders: [
                        [{ label: 'Diagrama de Interacción (Incluido "Ø") - Dirección X-X', colspan: 6 }],
                        [{ label: 'CURVA a 90°', colspan: 3 }, { label: 'CURVA a 270°', colspan: 3 }],
                        ['P (Ton)', 'M2 (Ton.m)', 'M3 (Ton.m)', 'P (Ton)', 'M2 (Ton.m)', 'M3 (Ton.m)'],
                    ],
                    collapsibleColumns: [
                        { row: -3, col: 1, collapsible: false },
                        { row: -2, col: 1, collapsible: false },
                        { row: -1, col: 1, collapsible: false },
                    ],
                    licenseKey: 'non-commercial-and-evaluation',
                    beforeChange: function (changes, src) {
                        if (src !== 'loadData') {
                            changes.forEach((change) => {
                                var row = change[0];
                                var column = change[1];
                                var value = change[3] === '' ? 0 : parseFloat(change[3]);

                                dataFromHandsontable[row][column] = value;
                            });

                            updateChartData();
                        }
                    }
                });
                var dataExcluidoX = [
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0]
                ];

                var container = document.getElementById('diagramaex');
                var hot = new Handsontable(container, {
                    data: dataExcluidoX,
                    rowHeaders: true,
                    colHeaders: true,
                    contextMenu: true,
                    colWidths: 100,
                    nestedHeaders: [
                        [{ label: 'Diagrama de Interacción (excluido "Ø") - Dirección X-X', colspan: 6 }],
                        [{ label: 'CURVA a 0°', colspan: 3 }, { label: 'CURVA a 180°', colspan: 3 }],
                        ['P', 'M2', 'M3', 'P', 'M2', 'M3'],
                    ],
                    collapsibleColumns: [
                        { row: -3, col: 1, collapsible: false },
                        { row: -2, col: 1, collapsible: false },
                        { row: -1, col: 1, collapsible: false },
                    ],
                    licenseKey: 'non-commercial-and-evaluation',
                    beforeChange: function (changes, src) {
                        if (src !== 'loadData') {
                            changes.forEach((change) => {
                                var row = change[0];
                                var column = change[1];
                                var value = change[3] === '' ? 0 : parseFloat(change[3]);

                                dataExcluidoX[row][column] = value;
                            });

                            updateChartData();
                        }
                    }
                });

                function updateChartData() {
                    var dataneg = dataFromHandsontable.map(function (row) {
                        return { x: row[1], y: row[0], z: row[2] };
                    });
                    var datafi = dataFromHandsontable.map(function (row) {
                        return { x: row[4], y: row[3], z: row[5] };
                    });
                    var datanegEX = dataExcluidoX.map(function (row) {
                        return { x: row[1], y: row[0], z: row[2] };
                    });

                    var datafiEX = dataExcluidoX.map(function (row) {
                        return { x: row[4], y: row[3], z: row[5] };
                    });

                    myChart.data.datasets[0].data = datafi;
                    myChart.data.datasets[1].data = dataneg;
                    myChart.data.datasets[2].data = datanegEX;
                    myChart.data.datasets[3].data = datafiEX;
                    myChart.update();
                }


                var dataneg = dataFromHandsontable.map(function (row) {
                    return { x: row[1], y: row[0], z: row[2] };
                });
                var datafi = dataFromHandsontable.map(function (row) {
                    return { x: row[4], y: row[3], z: row[5] };
                });
                var datanegEX = dataExcluidoX.map(function (row) {
                    return { x: row[1], y: row[0], z: row[2] };
                });

                var datafiEX = dataExcluidoX.map(function (row) {
                    return { x: row[4], y: row[3], z: row[5] };
                });


                const data = {
                    datasets: [
                        {
                            label: 'Diseño',
                            data: datafi,
                            fill: false,
                            borderColor: 'red',
                            backgroundColor: 'red',
                        },
                        {
                            label: 'Diseño',
                            data: dataneg,
                            fill: false,
                            borderColor: 'blue',
                            backgroundColor: 'blue',
                        },
                        {
                            label: 'Nominal',
                            data: datanegEX,
                            fill: false,
                            borderColor: 'green',
                            backgroundColor: 'green',
                        },
                        {
                            label: 'Nominal',
                            data: datafiEX,
                            fill: false,
                            borderColor: 'yellow',
                            backgroundColor: 'yellow',
                        }
                    ]
                };

                const config = {
                    type: 'scatter',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Diagrama de Interacción X-X'
                            }
                        },
                        scales: {
                            x: {
                                min: 'auto',
                                max: 'auto',
                                position: 'center',
                            },
                            y: {
                                min: 'auto',
                                max: 'auto',
                                position: 'left',
                            }
                        }
                    },
                };

                myChart = new Chart(ctx, config);
            });
        </script>

        <script>
            var dataFromHandsontableys = [
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0]
            ];

            $(document).ready(function () {
                var container = document.getElementById('diagramayy');
                var ctx = document.getElementById("DIejey");
                var myChart;

                var hot = new Handsontable(container, {
                    data: dataFromHandsontableys,
                    rowHeaders: true,
                    colHeaders: true,
                    contextMenu: true,
                    colWidths: 100,
                    nestedHeaders: [
                        [{ label: 'Diagrama de Interacción (Incluido "Ø") - Dirección Y-Y', colspan: 6 }],
                        [{ label: 'CURVA a 90°', colspan: 3 }, { label: 'CURVA a 270°', colspan: 3 }],
                        ['P (Ton)', 'M2 (Ton.m)', 'M3 (Ton.m)', 'P (Ton)', 'M2 (Ton.m)', 'M3 (Ton.m)'],
                    ],
                    collapsibleColumns: [
                        { row: -3, col: 1, collapsible: false },
                        { row: -2, col: 1, collapsible: false },
                        { row: -1, col: 1, collapsible: false },
                    ],
                    licenseKey: 'non-commercial-and-evaluation',
                    beforeChange: function (changes, src) {
                        if (src !== 'loadData') {
                            changes.forEach((change) => {
                                var row = change[0];
                                var column = change[1];
                                var value = change[3] === '' ? 0 : parseFloat(change[3]);

                                dataFromHandsontableys[row][column] = value;
                            });

                            updateChartData();
                        }
                    }
                });
                var dataExcluidoy = [
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0],
                    [0, 0, 0, 0, 0, 0]
                ];

                var containerEx = document.getElementById('diagramaexy');
                var hotEx = new Handsontable(containerEx, {
                    data: dataExcluidoy,
                    rowHeaders: true,
                    colHeaders: true,
                    contextMenu: true,
                    colWidths: 100,
                    nestedHeaders: [
                        [{ label: 'Diagrama de Interacción (excluido "Ø") - Dirección X-X', colspan: 6 }],
                        [{ label: 'CURVA a 0°', colspan: 3 }, { label: 'CURVA a 180°', colspan: 3 }],
                        ['P', 'M2', 'M3', 'P', 'M2', 'M3'],
                    ],
                    collapsibleColumns: [
                        { row: -3, col: 1, collapsible: false },
                        { row: -2, col: 1, collapsible: false },
                        { row: -1, col: 1, collapsible: false },
                    ],
                    licenseKey: 'non-commercial-and-evaluation',
                    beforeChange: function (changes, src) {
                        if (src !== 'loadData') {
                            changes.forEach((change) => {
                                var row = change[0];
                                var column = change[1];
                                var value = change[3] === '' ? 0 : parseFloat(change[3]);

                                dataExcluidoy[row][column] = value;
                            });

                            updateChartData();
                        }
                    }
                });

                function updateChartData() {
                    var datanegy = dataFromHandsontableys.map(function (row) {
                        return { x: row[1], y: row[0], z: row[2] };
                    });
                    var datafiy = dataFromHandsontableys.map(function (row) {
                        return { x: row[4], y: row[3], z: row[5] };
                    });
                    var datanegEy = dataExcluidoy.map(function (row) {
                        return { x: row[1], y: row[0], z: row[2] };
                    });

                    var datafiEy = dataExcluidoy.map(function (row) {
                        return { x: row[4], y: row[3], z: row[5] };
                    });

                    myChart.data.datasets[0].data = datafiy;
                    myChart.data.datasets[1].data = datanegy;
                    myChart.data.datasets[2].data = datanegEy;
                    myChart.data.datasets[3].data = datafiEy;
                    myChart.update();
                }


                var datanegy = dataFromHandsontableys.map(function (row) {
                    return { x: row[1], y: row[0], z: row[2] };
                });
                var datafiy = dataFromHandsontableys.map(function (row) {
                    return { x: row[4], y: row[3], z: row[5] };
                });
                var datanegEy = dataExcluidoy.map(function (row) {
                    return { x: row[1], y: row[0], z: row[2] };
                });

                var datafiEy = dataExcluidoy.map(function (row) {
                    return { x: row[4], y: row[3], z: row[5] };
                });


                const data = {
                    datasets: [
                        {
                            label: 'Diseño',
                            data: datafiy,
                            fill: false,
                            borderColor: 'red',
                            backgroundColor: 'red',
                        },
                        {
                            label: 'Diseño',
                            data: datanegy,
                            fill: false,
                            borderColor: 'blue',
                            backgroundColor: 'blue',
                        },
                        {
                            label: 'Nominal',
                            data: datanegEy,
                            fill: false,
                            borderColor: 'green',
                            backgroundColor: 'green',
                        },
                        {
                            label: 'Nominal',
                            data: datafiEy,
                            fill: false,
                            borderColor: 'yellow',
                            backgroundColor: 'yellow',
                        }
                    ]
                };

                const config = {
                    type: 'scatter',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Diagrama de Interacción Y-Y'
                            }
                        },
                        scales: {
                            x: {
                                min: 'auto',
                                max: 'auto',
                                position: 'center',
                            },
                            y: {
                                min: 'auto',
                                max: 'auto',
                                position: 'left',
                            }
                        }
                    },
                };

                myChart = new Chart(ctx, config);
            });
        </script>

    </div>
    <?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>