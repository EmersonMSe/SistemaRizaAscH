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

    .tamaño-tabla {
        height: 80px;
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
                                                    <input type="text" name="des" class="form-control text-center col-12" id="des" placeholder="4.5" step="any" value="Zapata A1" min=" 0" required>
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
                                        <input name="dataCargaX" type="hidden" id="dataCargaX" value="">
                                        <input name="dataCargaY" type="hidden" id="dataCargaY" value="">
                                        <h2 class="text-center"><strong>Combinacion de cargas</strong></h2>
                                        <h2 class="text-center"><strong>En el sentido X-X</strong></h2>
                                        <div class="row mb-3 text-center">
                                            <div id="CargaConServ" class="tamaño-tabla"></div>
                                        </div>

                                        <h2 class="text-center"><strong>En el sentido Y-Y</strong></h2>
                                        <div class="row mb-3 text-center">
                                            <div id="CargaConServy" class="tamaño-tabla"></div>
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
                            <canvas id="myCanvas" width="1000" height="400" style="border: none;"></canvas>
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

    <!-- 
    <script src="js/zapataCombinada.js"></script>
    <script type="text/javascript" src="grafica.js"></script> -->
    <script>
        $(document).ready(function() {
            var data = [
                ['P1', 14.80, 5.61, 1.15, 0.59, 3.1, 5.28],
                ['P2', 21.32, 3.09, 3.96, 0.81, 0.86, 0.05],
            ];

            var container = document.getElementById('CargaConServ');
            var hot = new Handsontable(container, {
                data: data,
                rowHeaders: false,
                colHeaders: true,
                contextMenu: true,
                colWidths: 100,
                nestedHeaders: [
                    ['Nudos', {
                        label: 'Cargas muertas "D"',
                        colspan: 2
                    }, {
                        label: 'Cargas Vivas "L"',
                        colspan: 2
                    }, {
                        label: 'Cargas por Sismo "Ex" ',
                        colspan: 2
                    }],
                    [' ', 'Pz (Ton)', 'Mx (Ton-m)', 'Pz (Ton)', 'Mx (Ton-m)', 'Pz (Ton)', 'Mx (Ton-m)']
                ],
                collapsibleColumns: [{
                    row: -1,
                    col: 1,
                    collapsible: false
                }, ],
                licenseKey: 'non-commercial-and-evaluation'
            });
            var datay = [
                ['P1', 14.80, 12.45, 1.15, 4.86, 9.97, 37.31],
                ['P2', 21.32, 0.74, 3.96, 0.14, 0.28, 0.11],
            ];

            var containery = document.getElementById('CargaConServy');
            var hoty = new Handsontable(containery, {
                data: datay,
                rowHeaders: false,
                colHeaders: true,
                contextMenu: true,
                colWidths: 100,
                nestedHeaders: [
                    ['Nudos', {
                        label: 'Cargas muertas "D"',
                        colspan: 2
                    }, {
                        label: 'Cargas Vivas "L"',
                        colspan: 2
                    }, {
                        label: 'Cargas por Sismo "Ex" ',
                        colspan: 2
                    }],
                    [' ', 'Pz (Ton)', 'Mx (Ton-m)', 'Pz (Ton)', 'Mx (Ton-m)', 'Pz (Ton)', 'Mx (Ton-m)']
                ],
                collapsibleColumns: [{
                    row: -1,
                    col: 1,
                    collapsible: false
                }, ],
                licenseKey: 'non-commercial-and-evaluation'
            });

            // Captura el formulario
            const form = document.getElementById('DataZapataCombinada');
            const dataCargaX = document.querySelector('#dataCargaX');
            const dataCargaY = document.querySelector('#dataCargaY');

            // Agrega un manejador de eventos para el envío del formulario
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Obtén los datos de Handsontable y conviértelos a JSON
                const tableDataX = hot.getData();
                const jsonDataX = JSON.stringify(tableDataX);

                dataCargaX.value = jsonDataX;

                const tableDataY = hoty.getData();
                const jsonDataY = JSON.stringify(tableDataY);

                dataCargaY.value = jsonDataY;
                const formData = new FormData(form);

                // Envía los datos mediante una solicitud POST AJAX
                fetch('Controladores/DzapataCombinadaControlador.php', {
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
</div>
<?php
include_once "assets/views/footer.php";
?>
<script>
    var canvas = document.getElementById('myCanvas');
    var ctx = canvas.getContext('2d');

    // Definir los puntos de la zapata izquierda
    var puntos_zapata_izquierda = [{
            x: -2.25,
            y: 1.00
        },
        {
            x: -2.25,
            y: 1.80
        },
        {
            x: -2.75,
            y: 1.80
        },
        {
            x: -2.75,
            y: 0.00
        },
        {
            x: 3.75,
            y: 0.00
        },
        {
            x: 3.75,
            y: 1.00
        },
        {
            x: 2.75,
            y: 1.00
        },
        {
            x: 2.75,
            y: 1.80
        },
        {
            x: 2.25,
            y: 1.80
        },
        {
            x: 2.25,
            y: 1.00
        },
        {
            x: -2.25,
            y: 1.00
        }
    ];

    // Escalar y trasladar los puntos para ajustar al canvas
    function escalarYTrasladar(puntos) {
        return puntos.map(function(punto) {
            return {
                x: (punto.x + 3.75) * 50, // Escalar y trasladar el eje x
                y: (punto.y + 2) * 50 // Escalar y trasladar el eje y
            };
        });
    }

    // Función para graficar los puntos en el canvas
    function graficarPuntos(ctx, puntos, color) {
        ctx.strokeStyle = color;
        ctx.beginPath();
        puntos.forEach(function(punto) {
            ctx.lineTo(punto.x, punto.y);
        });
        ctx.closePath();
        ctx.stroke();
    }

    // Función para dibujar el eje en el canvas
    function dibujarEje(ctx) {
        ctx.strokeStyle = 'black';
        ctx.beginPath();
        ctx.moveTo(0, canvas.height / 2);
        ctx.lineTo(canvas.width, canvas.height / 2);
        ctx.moveTo(canvas.width / 2, 0);
        ctx.lineTo(canvas.width / 2, canvas.height);
        ctx.stroke();
    }

    // Limpiar el canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Escalar y trasladar los puntos de la zapata izquierda
    var puntos_zapata_izquierda_escalados = escalarYTrasladar(puntos_zapata_izquierda);

    // Graficar los puntos y el eje en el canvas
    dibujarEje(ctx);
    graficarPuntos(ctx, puntos_zapata_izquierda_escalados, 'blue');
</script>