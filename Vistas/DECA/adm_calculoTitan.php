<?php

?>
<title>Adm || Gestion Usuario</title>
<?php include_once "assets/views/nav.php"; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/echarts@latest/dist/echarts.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/echarts@latest/dist/echarts.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js" integrity="sha512-OqcrADJLG261FZjar4Z6c4CfLqd861A3yPNMb+vRQ2JwzFT49WT4lozrh3bcKxHxtDTgNiqgYbEUStzvZQRfgQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/canvas@2.11.2/browser.min.js"></script>

<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Calc</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">calc</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <!-- Contenedor de las filas -->
                <div class="row">
                    <!-- Primera columna datos generales -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3>Datos generales</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <style>
                                        .v-line {
                                            border-left: thick solid #000;
                                            /* Estilo de la línea */
                                            height: 100%;
                                            /* Altura igual a la altura del contenedor padre */
                                            position: absolute;
                                            /* Posicionamiento absoluto para superponer la línea */
                                            left: 50%;
                                            /* Ubicación horizontal en el medio del contenedor padre */
                                            transform: translateX(-50%);
                                            /* Centrar horizontalmente la línea */
                                        }

                                        .contenedor::-webkit-scrollbar {
                                            width: 0px;
                                            /* Oculta el scroll en navegadores webkit como Chrome y Safari */
                                        }
                                    </style>
                                    <div class="col-3">
                                        <form id="calcTitan" method="post">
                                            <h2 class="text-center"><strong>Datos Generales</strong></h2>
                                            <h5 class="text-center"><strong>Diseño</strong><button type="button" id="toggleButton" style="border: none; background: none;"></button></h5>
                                            <div class="contenedor" id="contenedor_dcc" style="display: block; overflow-y: auto; max-height: 400px;">
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="inputl">L</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="inputl" id="inputl" value="10" class="form-control text-center" placeholder="10" step="0.1" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">l</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="inputa">a</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="inputa" id="inputa" value="3" class="form-control text-center" placeholder="3" step="0.1" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="inputl1">l1</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="inputl1" id="inputl1" value="6" class="form-control text-center" placeholder="6" step="0.1" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <!-- Button Submit para Empezar a Diseñar el DOCUMENTO -->
                                            <div class="col-md-12 mx-auto text-center">
                                                <div class="d-grid gap-2 col-6 mx-auto">
                                                    <button class="btn btn-primary btn- text-center" type="submit">DISEÑAR</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-1">
                                        <div class="v-line"></div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card">
                                            <div id="main" style="width: 100%; height: 400px;"></div>
                                            <div class="card-header bg-info">Resultados</div>
                                            <div class="card-body" id="ObtenerResultados">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin del contenedor de las filas -->
            </div>
        </section>

        <!-- /.content -->
    </div>

</div>
<?php
include_once "assets/views/footer.php";
?>
<script src="js/calculoTitan.js"></script>