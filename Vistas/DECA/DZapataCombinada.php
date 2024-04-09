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
        border: 1px solid black;
    }

    .tamaño-tabla {
        height: 160px;
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
                                            <div class="col-12">
                                                <label>Descripción</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" name="des" class="form-control text-center col-12" id="des" placeholder="Zapata A1" step="any" value="Zapata A1" min=" 0" required>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 
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
                                        </div> -->

                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label></label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">qa</span>
                                                    <input type="number" name="qa" class="form-control text-center" id="qa" step="any" placeholder="3" value="3" min="0" required>
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
                                                    <input type="number" name="p_servicio" class="form-control text-center" id="p_servicio" step="any" placeholder="8" value="8" min="0" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Ton/m<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Factor K</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="number" name="fk" class="form-control text-center" id="fk" step="any" placeholder="1" value="1" min="0" required>

                                                </div>
                                            </div>
                                        </div>
                                        <h2 class="text-center"><strong>Predimencionamiento</strong></h2>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>columna 1</label>
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
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text col-3">t1</span>
                                                    <input type="number" name="t1_col2" class="form-control text-center" id="t1_col2" step="any" placeholder="0.5" value="0.5" min="0" required>
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

                                        <h2 class="text-center"><strong>Análisis por Punzonamiento</strong></h2>
                                        <div class="row mb-3 text-center">
                                            <div class="col-12">
                                                <label>Peralte Efectivo</label>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input type="text" name="d" class="form-control text-center col-12" id="d" placeholder="42.50" step="any" value="42.50" min=" 0" required>
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
                    <div class="card">
                        <div class="d-flex justify-content-center">
                            <canvas id="myChart" width="1000" height="400"></canvas>
                        </div>
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
    <script src="js/zapataCombinada.js"></script>
    <!-- 

    <script type="text/javascript" src="grafica.js"></script> -->

    <script>
        // Datos de los puntos (x, y)
        // Datos de los puntos (x, y)
        var t1_col1 = document.getElementById('t1_col1').value;
        var Le = document.getElementById('Le').value;
        var m2 = document.getElementById('m2').value;
        var t1_col2 = document.getElementById('t1_col2').value;

        // Convertir los valores a números de punto flotante (float)
        var t1_col1_float = parseFloat(t1_col1);
        var Le_float = parseFloat(Le);
        var m2_float = parseFloat(m2);
        var t1_col2_float = parseFloat(t1_col2);

        // Puntos en X
        var puntoX1 = 0; // Supongamos que calculamos este punto dinámicamente
        var puntoX2 = 0.5 * t1_col1_float;
        var puntoX3 = puntoX2;
        var puntoX4 = 0.5 * t1_col1_float + Le_float;
        var puntoX5 = puntoX4;
        var puntoX6 = puntoX4 + m2_float + 0.5 * t1_col2_float;

        // Imprimir los valores en la consola
        console.log("Punto X1:", puntoX1);
        console.log("Punto X2:", puntoX2);
        console.log("Punto X3:", puntoX3);
        console.log("Punto X4:", puntoX4);
        console.log("Punto X5:", puntoX5);
        console.log("Punto X6:", puntoX6);

        //puntos en Y


        var puntoY1 = 0; // Supongamos que calculamos este punto dinámicamente
        var puntoY2 = 0.5 * t1_col1_float;
        var puntoY3 = puntoX2;
        var puntoY4 = 0.5 * t1_col1_float + Le_float;
        var puntoY5 = puntoX4;
        var puntoY6 = 0;



        var data = {
            labels: ['0.00', '0.25', '0.25', '5.25', '5.25', '6.50'],
            datasets: [{
                label: 'Puntos',
                backgroundColor: 'rgba(255, 99, 132, 0.2)', // Color del fondo de la línea
                borderColor: 'rgba(255, 99, 132, 1)', // Color del borde de la línea
                data: [{
                        x: 0.00,
                        y: 0.00
                    },
                    {
                        x: 0.25,
                        y: 26.27
                    },
                    {
                        x: 0.25,
                        y: -156.58
                    },
                    {
                        x: 5.25,
                        y: 222.58
                    },
                    {
                        x: 5.25,
                        y: -131.34
                    },
                    {
                        x: 6.50,
                        y: 0.00
                    }
                ],
                fill: false // Para deshabilitar el relleno debajo de la línea
            }]
        };

        // Opciones del gráfico
        var options = {
            scales: {
                x: {
                    type: 'linear',
                    position: 'bottom',
                    min: -1, // Mínimo valor en el eje X
                    max: 7 // Máximo valor en el eje X
                },
                y: {
                    type: 'linear', // Tipo de escala lineal para permitir valores negativos
                    position: 'left',
                    min: -200, // Mínimo valor en el eje Y
                    max: 250 // Máximo valor en el eje Y
                }
            }
        };

        // Crear el gráfico de líneas
        var ctx = document.getElementById('myChart').getContext('2d');
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options
        });
    </script>
</div>
<?php
include_once "assets/views/footer.php";
?>