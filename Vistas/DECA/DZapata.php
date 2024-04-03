
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
                            <form action="" id="DataZapata">
                                <div class="card-body">
                                    <section class="content">
                                        <div class="row">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>f'c</label>
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
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>fy</label>
                                                        <div class="input-group date" id="fy" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="fy"
                                                                placeholder="fy" />
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
                                                        <label>γs</label>
                                                        <div class="input-group date" id="ys" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="ys"
                                                                placeholder="γs" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    tonf/m<sup>3</sup>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Df</label>
                                                        <div class="input-group date" id="df" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="df"
                                                                placeholder="df" />
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
                                                        <label>t</label>
                                                        <div class="input-group date" id="t" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="t"
                                                                placeholder="t" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    m
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>b</label>
                                                        <div class="input-group date" id="b" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="b"
                                                                placeholder="b" />
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
                                                        <label>L</label>
                                                        <div class="input-group date" id="l" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="l"
                                                                placeholder="l" />
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
                                                        <label>B</label>
                                                        <div class="input-group date" id="DZY" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="DZY"
                                                                placeholder="Dimension de zapata en Y" />
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
                                                        <label>σs</label>
                                                        <div class="input-group date" id="cps" data-target-input="nearest">
                                                            <input type="text" class="form-control" name="cps"
                                                                placeholder="cps" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    kgf/m<sup>2</sup>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>α s</label>
                                                        <select name="Columna" class="form-control" id="Columna" required>
                                                            <option disabled selected>α s
                                                            </option>
                                                            <option value="40">Columna Interior</option>
                                                            <option value="30">Columna de Borde</option>
                                                            <option value="20">Columna en Esquina</option>
                                                        </select>
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
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Ф Varilla Y</label>
                                                        <select name="VarillaY" class="form-control" id="VarillaY" required>
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
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Espaciamiento X</label>
                                                        <div class="input-group date" id="espaciamientox"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control" name="espaciamientox"
                                                                placeholder="espaciamiento x" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    Cm
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Espaciamiento Y</label>
                                                        <div class="input-group date" id="espaciamientoy"
                                                            data-target-input="nearest">
                                                            <input type="text" class="form-control" name="espaciamientoy"
                                                                placeholder="espaciamiento y" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    Cm
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Inercia</label>
                                                        <select name="inercia" class="form-control" id="inercia" required>
                                                            <option disabled selected>Inercia
                                                            </option>
                                                            <option value="Sregular">Seccion Regular</option>
                                                            <option value="Sirregular">Seccion Irregular</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="bg-red">
                                        <div class="row" id="Data" style="display: none;">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Ix</label>
                                                    <div class="input-group date" id="B" data-target-input="nearest">
                                                        <input type="text" class="form-control" name="B" placeholder="B" />
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                cm<sup>4</sup>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Iy</label>
                                                    <div class="input-group date" id="B" data-target-input="nearest">
                                                        <input type="text" class="form-control" name="B" placeholder="B" />
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                cm<sup>4</sup>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <hr class="bg-red">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div id="CargaConServ"></div>
                                                <div id="CargaConServ"></div>
                                            </div>
                                        </div>
                                    </section>
                                    <input type="hidden" name="dataFromHandsontable" id="dataFromHandsontable" value="">
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

        <script>
            $(document).ready(function () {
                var data = [
                    ['CM', 0, 0, 0],
                    ['CV', 0, 0, 0],
                    ['CSX', 0, 0, 0],
                    ['CSY', 0, 0, 0],
                ];

                var container = document.getElementById('CargaConServ');
                var hot = new Handsontable(container, {
                    data: data,
                    rowHeaders: true,
                    colHeaders: true,
                    contextMenu: true,
                    colWidths: 100,
                    nestedHeaders: [
                        ['Cargas de Servicio', 'P (Tonf)', 'Mx (Ton-m)', 'My (Ton.m)']
                    ],
                    collapsibleColumns: [
                        { row: -1, col: 1, collapsible: false },
                    ],
                    licenseKey: 'non-commercial-and-evaluation'
                });

                // Captura el formulario
                const form = document.getElementById('DataZapata');
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
                    fetch('Controladores/Dzapata.php', {
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

        <script>
            var Inercia = document.getElementById("inercia");
            var DataZapata = document.getElementById("Data");

            Inercia.addEventListener("change", function () {
                switch (Inercia.value) {
                    case "Sregular":
                        DataZapata.style.display = 'none';
                        break;

                    case "Sirregular":
                        DataZapata.style.display = 'block';
                        break;
                }
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"
            integrity="sha512-cLuyDTDg9CSseBSFWNd4wkEaZ0TBEpclX0zD3D6HjI19pO39M58AgJ1SjHp6c7ZOp0/OCRcC2BCvvySU9KJaGw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">RESULTADOS <small><button id="generarPDF"
                                            onclick="pruebaDivAPdf()">Generar PDF</button></small></h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" id="ObtenerResultados">
                                    <!-- Aquí va el contenido de la tabla -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
            function pruebaDivAPdf() {
                var pdf = new jsPDF('p', 'pt', 'letter');
                var source = $('#ObtenerResultados')[0]; // Obtén el contenido del div con id "ObtenerResultados"

                var specialElementHandlers = {
                    '#bypassme': function (element, renderer) {
                        return true;
                    }
                };

                var margins = {
                    top: 80,
                    bottom: 60,
                    left: 40,
                    width: 522
                };

                var content = {
                    startY: margins.top,
                    html: source,
                    margin: margins,
                    // autoTable: { startY: margins.top }
                };

                pdf.fromHTML(content.html, content.margin.left, content.margin.top, {
                    'width': content.margin.width,
                    'elementHandlers': specialElementHandlers
                }, function (dispose) {
                    pdf.autoTable(content);
                    pdf.save('Prueba.pdf');
                }, content.margin);
            }
        </script>
    </div>
    <?php
    include_once "assets/views/footer.php";

?>