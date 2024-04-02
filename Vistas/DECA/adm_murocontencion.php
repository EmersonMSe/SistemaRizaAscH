<?php

?>
<title>Adm || Gestion Usuario</title>
<?php include_once "assets/views/nav.php"; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/echarts@latest/dist/echarts.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">
<!-- jspdf -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js" integrity="sha512-OqcrADJLG261FZjar4Z6c4CfLqd861A3yPNMb+vRQ2JwzFT49WT4lozrh3bcKxHxtDTgNiqgYbEUStzvZQRfgQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/paper.js/0.12.17/paper-full.min.js" integrity="sha512-NApOOz1j2Dz1PKsIvg1hrXLzDFd62+J0qOPIhm8wueAnk4fQdSclq6XvfzvejDs6zibSoDC+ipl1dC66m+EoSQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DISEÑO DE MURO DE CONTENCION</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">DISEÑO DE MURO DE CONTENCION</li>
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
                                        <form id="cimientosControler" method="post">
                                            <h2 class="text-center"><strong>Datos Generales</strong></h2>
                                            <h5 class="text-center"><strong>Diseño de muro de contencion</strong><button type="button" id="toggleButton" style="border: none; background: none;"><i class="fas fa-eye"></i></button></h5>
                                            <div class="contenedor" id="contenedor_dcc" style="display: block; overflow-y: auto; max-height: 400px;">
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="df">Df</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="df" id="df" value="1" class="form-control text-center" placeholder="1" step="0.1" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">m</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="H">H</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="H" id="H" class="form-control text-center" value="3.5" placeholder="3.5" step="0.1" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">m</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="angterr">Angulo Terreno</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="angterr" id="angterr" value="10" class="form-control text-center" placeholder="30" min="0" step="0.1" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">m</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="dentellon" name="darkmode" value="yes">
                                                        <label class="form-check-label" for="dentellon">DENTENTLLON</label>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center" id="hdContainer" style="display: none;">
                                                    <label for="hd">HD</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="hd" id="hd" value="1" class="form-control text-center" placeholder="0.82" step="0.1" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">m</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center" id="b1Container" style="display: none;">
                                                    <label for="b1">B1</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="b1" id="b1" value="0.82" class="form-control text-center" placeholder="0.82" step="0.1" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">m</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                            <br>
                                            <!-- <h5 class="text-center"><strong>Cálculo de cargas</strong><button type="button" id="calccargars" style="border: none; background: none;"><i class="fas fa-eye"></i></button></h5>
                                            <div class="contenedor_cc" id="contenedor_cc" style="display: block;">
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="CM">CARGA MUERTA</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="CM" class="form-control text-center" id="CM" placeholder="6805" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kg/m</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="CV">CARGA VIVA</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="CV" class="form-control text-center" id="CV" placeholder="600" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kg/m</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br> -->

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
                                        <div class="card" style="width: 70%; height: 600px;">
                                            <style>
                                                canvas {
                                                    width: 100%;
                                                    height: 100%;
                                                    align-items: center;
                                                }
                                            </style>
                                            <canvas id="grafico"></canvas>
                                        </div>
                                        
                                        <div id="main" style="width: 70%; height: 600px;"></div>
                                        <div class="card">
                                            <div class="card-header bg-info">Resultados</div>
                                            <div class="card-body" id="ObtenerResultados">
                                            </div>
                                            <div id="my-interactive"></div>

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
<script type="module" src="js/graficaMC.js"></script>
<script type="module" src="js/adm_murocontencion.js"></script>