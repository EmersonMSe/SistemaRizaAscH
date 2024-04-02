<?php
session_start();
if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2) {
?>
    <title>Adm | VIGAS</title>
    <?php
    include_once "assets/views/header.php";
    include_once "assets/views/nav.php";
    ?>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script> -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DISEÑO POR FLEXION EN VIGAS</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../adm_principal.php">Home</a></li>
                            <li class="breadcrumb-item active">DISEÑO POR FLEXION EN VIGAS</li>
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
                        <div class="card card-success" style="overflow-x: auto; overflow-y: hidden; max-width: 100vw;">
                            <div class="card-header">
                                <h3 class="card-title">Datos Principales <small></small></h3>
                            </div>
                            <!-- /.card-header -->
                            <style>
                                #LuzLibreTramo {
                                    border: none;
                                }

                                #LuzLibreTramo th,
                                #LuzLibreTramo td {
                                    border: none;
                                }

                                #tablaTramos {
                                    border: none;
                                }

                                #tablaTramos th,
                                #tablaTramos td {
                                    border: none;
                                    padding: 0.5em;
                                }
                            </style>
                            <!-- form start -->
                            <form id="FlexionViga" method="post">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="col-md-3">
                                            <div class="input-group mb-2">
                                                <label for="fc">fc</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="number" name="fc" class="form-control" id="fc" placeholder="210" min="0" value="210" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">kg/cm2</span>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="col-md-3">
                                            <div class="input-group mb-2">
                                                <label for="fy">fy</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="number" name="fy" class="form-control" id="fy" placeholder="4200" min="0" value="4200" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">kg/cm2</span>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="col-md-3">
                                            <div class="input-group mb-2">
                                                <label for="num_tramos">N° Tramos</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="number" name="num_tramos" class="form-control" id="num_tramos" placeholder="Numero de TRAMOS" min="0" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"></span>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>


                                    <div class="table">
                                        <!-- Agregar esta clase para hacer la tabla -->
                                        <table class="table table-hover" id="LuzLibreTramo">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">LUZ LIBRE m</th>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="table table-hover" id="tablaTramos">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">EJE</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">BASE (m)</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">ALTURA (m)</th>
                                                </tr>

                                                <tr class="bg-primary">
                                                    <th scope="row">NEGATIVO(-)</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">M(CM)(tn.m)-</th>

                                                </tr>
                                                <tr>
                                                    <th scope="row">M(CV)(tn.m)-</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">MU (TN-M)-</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Vu (TNF)-</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Tu (TNF)-</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">N° CAPAS-</th>
                                                </tr>


                                                <tr class="bg-primary">
                                                    <th scope="row">POSITIVO(+)</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">M(CM)(tn.m)+</th>

                                                </tr>
                                                <tr>
                                                    <th scope="row">M(CV)(tn.m)+</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">MU (TN-M)+</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Vu (TNF)+</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Tu (TNF)+</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">N° CAPAS+</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="input-group mb-2">
                                        <button id="accionButton" class="btn btn-primary" type="button">DISEÑAR</button>
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
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">RESULTADOS</h3>
                                <button type="button" id="boton_print">Crear Pdf</button>
                            </div>
                            <div class="card-body">
                                <style>
                                    body {
                                        font-family: 'Helvetica Neue', Helvetica, sans-serif;
                                        /* font-size: 0.3cm */
                                    }

                                    table {
                                        font-family: 'Helvetica Neue', Helvetica, sans-serif;
                                    }

                                    table.table {
                                        margin-bottom: 0;
                                        /* Eliminar el espacio inferior de la tabla */
                                    }

                                    .tab_encabezados {
                                        font-family: 'Helvetica Neue', Helvetica, sans-serif;
                                        font-size: 16pt;
                                        font-weight: 700;
                                    }

                                    .sub_encabezados {
                                        background-color: #4f5d78;
                                        color: #fff;
                                        font-family: 'Helvetica Neue', Helvetica, sans-serif;
                                        font-size: 11pt;
                                        font-weight: bold;
                                    }

                                    .sub_sub_encabezados {
                                        background-color: #a6b7c7;
                                        color: #fff;
                                        font-family: 'Helvetica Neue', Helvetica, sans-serif;
                                        font-size: 11pt;
                                        font-weight: bold;
                                    }

                                    .datos_relleno {
                                        font-family: 'Helvetica Neue', Helvetica, sans-serif;
                                        font-size: 11pt;
                                    }
                                </style>
                                <div id="calc_vigas" style="overflow-x: auto; overflow-y: hidden; max-width: 100vw;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--<script>
            document.getElementById('FlexionViga').addEventListener('submit', function(event) {
                event.preventDefault();

                const formData = new FormData(this);

                fetch('Controladores/DesingVigas.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text()) // Convertir la respuesta en texto
                    .then(data => {
                        // Cargar los resultados en la tabla de resultados
                        const resultadosContainer = document.getElementById('ObtenerResultados');
                        resultadosContainer.innerHTML = data;
                    })
                    .catch(error => {
                        console.error('Error al enviar la solicitud Ajax', error);
                    });
            });
        </script>

        <script>
            document.getElementById('FlexionViga2').addEventListener('submit', function(event) {
                event.preventDefault();

                const formData = new FormData(this);

                // Realiza la segunda solicitud POST
                fetch('Controladores/DesingVigas.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        const resultadosContainer = document.getElementById('ObtenerResultados');
                        resultadosContainer.innerHTML = data;
                    })
                    .catch(error => {
                        console.error('Error en la segunda solicitud POST', error);
                    });
            });
        </script> -->

        <!-- <script>
            $(document).ready(function () {
                $("#form1").submit(function (event) {
                    event.preventDefault();
                    var formData = $(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: "Controladores/pruebaR.php",
                        data: formData,
                        success: function (response) {
                            $("#result").html(response);
                        }
                    });
                });
            });
        </script> -->
    </div>
<?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>
<script src="js/admvigas.js"></script>