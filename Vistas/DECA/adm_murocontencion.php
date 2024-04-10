<?php
session_start();
if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2) {
?>
    <title>Adm || MUROS DE CONTENCION</title>
    <?php include_once "assets/views/nav.php"; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/echarts@latest/dist/echarts.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/paper.js/0.12.17/paper-full.min.js" integrity="sha512-NApOOz1j2Dz1PKsIvg1hrXLzDFd62+J0qOPIhm8wueAnk4fQdSclq6XvfzvejDs6zibSoDC+ipl1dC66m+EoSQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- <script src="https://unpkg.com/konva@9.3.6/konva.min.js"></script> -->

    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="text-left text-3xl font-bold underline decoration-indigo-500">
                                DISEÑO DE MURO DE CONTENCION
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item active text-1xl font-bold underline decoration-indigo-500">DISEÑO DE MURO DE CONTENCION</li>
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
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header h-30 bg-gradient-to-r from-cyan-500 to-blue-500 sm:rounded-lg">
                                    <h1 class="text-center text-2xl font-bold decoration-indigo-500">
                                        Datos generales
                                    </h1>
                                </div>
                                <div class="card-body ">
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

                                        .contenedor_cc::-webkit-scrollbar {
                                            width: 0px;
                                            /* Oculta el scroll en navegadores webkit como Chrome y Safari */
                                        }
                                    </style>
                                    <h5 class="text-left text-1xl font-bold underline decoration-indigo-500">
                                        Datos
                                        <button type="button" id="toggleButton" style="border: none; background: none;"><i class="fas fa-eye"></i></button>
                                    </h5>
                                    <form id="cimientosControler" method="post">
                                        <div class="contenedor" id="contenedor_dcc" style="display: block; overflow-y: auto; max-height: 400px;">
                                            <br>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="df" title="DESPLANTE">Df</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="df" id="df" value="1" class="form-control text-center" placeholder="1" step="0.1" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="H" title="ALTURA">H</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="H" id="H" class="form-control text-center" value="3.5" placeholder="3.5" step="0.1" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="e" title="Espesor del Muro">e</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="e" id="e" class="form-control text-center" value="0.2" placeholder="3.5" step="0.1" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="angterr" title="ANGULO DE INCLINACION">ϕ</label>&nbsp;&nbsp;&nbsp;&nbsp;
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
                                                <label for="b1" title="LONGITUD DE LA PUNTA">B1</label>&nbsp;&nbsp;&nbsp;&nbsp;
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
                                        <h5 class="text-left text-1xl font-bold underline decoration-indigo-500">
                                            Presiones del suelo
                                            <button type="button" id="calccargars" style="border: none; background: none;"><i class="fas fa-eye"></i></button>
                                        </h5>
                                        <div class="contenedor_cc" id="contenedor_cc" style="display: block; overflow-y: auto; max-height: 400px;">
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="gc">gc</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="gc" id="gc" value="2.4" class="form-control text-center" placeholder="2.4" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Tn/m<sup>3</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="gs">gs</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="gs" id="gs" value="1.75" class="form-control text-center" placeholder="1.75" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Tn/m<sup>3</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="tet">Ø</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="tet" id="tet" value="20" placeholder="20" class="form-control text-center" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">°</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="z">z</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="z" id="z" value="0" class="form-control text-center" placeholder="0" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="d">d</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="d" id="d" value="10" class="form-control text-center" placeholder="10" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">°</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="SC">S/C</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="SC" id="SC" value="0" class="form-control text-center" placeholder="0" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Tn/m<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="hs">hs</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="hs" id="hs" value="0" class="form-control text-center" placeholder="0" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="ka">ka</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="ka" id="ka" value="0.53" class="form-control text-center" placeholder="0.53" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="Kp">Kp</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="Kp" id="Kp" value="1.83" class="form-control text-center" placeholder="1.83" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="considerar">CONSIDERARMOS?</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <select name="considerar" id="considerar" class="form-control text-center">
                                                        <option value="si">SI</option>
                                                        <option value="no">NO</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- <h5 class="text-left text-1xl font-bold underline decoration-indigo-500">
                                            Predimensionamiento
                                            <button type="button" id="calccargars" style="border: none; background: none;"><i class="fas fa-eye"></i></button>
                                        </h5>
                                        <div class="contenedor_cc" id="contenedor_cc" style="display: block; overflow-y: auto; max-height: 400px;">
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="considerar">CONSIDERARMOS?</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <select name="considerar" id="considerar" class="form-control text-center">
                                                        <option value="si">SI</option>
                                                        <option value="no">NO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="Hmc">H</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="Hmc" id="Hmc" value="3.50" class="form-control text-center" placeholder="3.50" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="sADM">sADM</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="sADM" id="sADM" value="12.50" placeholder="12.50" class="form-control text-center" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">Tn/m<sup>2</sup></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="punta">PUNTA</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="punta" id="punta" value="0.2" class="form-control text-center" placeholder="0.2" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="K" title="BASE DE LA PANTALLA">K</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="K" id="K" value="10" class="form-control text-center" placeholder="10" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="kperz">K</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="kperz" id="kperz" value="10" class="form-control text-center" placeholder="10" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="kanchz">k</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="kanchz" id="kanchz" value="0.7" class="form-control text-center" placeholder="0.7" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mx-auto text-center">
                                                <label for="ka">ka</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="input-group mb-2">
                                                    <input type="number" name="ka" id="ka" value="0.53" class="form-control text-center" placeholder="0.53" min="0" step="any">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- Button Submit para Empezar a Diseñar el DOCUMENTO -->
                                        <div class="col-md-12 mx-auto text-center">
                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                <button id="btn_calc" class="btn btn-primary btn- text-center" type="submit">DISEÑAR</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header h-30 bg-gradient-to-r from-cyan-500 to-blue-500 sm:rounded-lg">
                                    <h1 class="text-center text-2xl font-bold decoration-indigo-500">
                                        Resultado Y Dibujo
                                    </h1>
                                </div>
                                <div>
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
                                    <table class="table table-hover">
                                        <thead style="background-color:gold;">
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">SUELO</th>
                                                <th scope="col">S/C</th>
                                                <th scope="col">TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody class="datos_relleno" id="primerTabla">
                                            <!-- Aquí se agregarán las filas generadas por la función calcularPrimerCuadro -->
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <canvas id="canvasSec" style="width: auto; height: 400px;"></canvas>
                                        </div>
                                        <div class="col-4">
                                            <h5 class="text-center text-1xl font-bold underline decoration-indigo-500">Datos</h5>
                                            <div class="contenedor_cc" id="contenedor_cc" style="display: block; overflow-y: auto; max-height: 400px;">
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="zonaok">MONONOBE-OKABE?</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <select name="zonaok" id="zonaok" class="form-control text-center">
                                                            <option value="0">ZONA</option>
                                                            <option value="0.4">1</option>
                                                            <option value="0.3">2</option>
                                                            <option value="0.15">3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="kvran">Kv esta en el rango de 0.3-0.6 Kh</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <select name="kvran" id="kvran" class="form-control text-center">
                                                            <option value="0.045">0.3Kh</option>
                                                            <option value="0.0525">0.34Kh</option>
                                                            <option value="0.06">0.4Kh</option>
                                                            <option value="0.0675">0.45Kh</option>
                                                            <option value="0.075">0.5Kh</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="b1graf">b1</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="b1graf" id="b1graf" value="1" class="form-control text-center" placeholder="1" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="hzgraf">hz</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="hzgraf" id="hzgraf" value="0.4" placeholder="0.4" class="form-control text-center" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="hprgraf">H´</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="hprgraf" id="hprgraf" value="3.50" class="form-control text-center" placeholder="3.50" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="egraf" title="BASE DE LA PANTALLA">e</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="egraf" id="egraf" value="0.2" class="form-control text-center" placeholder="0.2" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="epgraf">ep</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="epgraf" id="epgraf" value="0.15" class="form-control text-center" placeholder="0.15" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="b2graf">b2</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="b2graf" id="b2graf" value="1.25" class="form-control text-center" placeholder="1.25" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div>
                                    <table class="table table-hover">
                                        <thead class="sub_encabezados">
                                            <tr>
                                                <th scope="col" colspan="6">3. VERIFICACIONES</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" colspan="6">3.1 VERIFICACIONES SIN EFECTOS SISMICOS</th>
                                            </tr>
                                            <tr class="text-center">
                                                <th scope="col">COMPONENTE</th>
                                                <th scope="col">AREA <br>(m<sup>2</sup>)</th>
                                                <th scope="col">PESO <br>(Tn)</th>
                                                <th scope="col">BRAZO <br>(m)</th>
                                                <th scope="col">MOMENTO <br>(Tn-m)</th>
                                                <th scope="col">DESCRIPCION</th>
                                            </tr>
                                        </thead>
                                        <tbody class="datos_relleno" id="segundaTabla">
                                            <!-- Aquí se agregarán las filas generadas por la función calcularPrimerCuadro -->
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>

                                <div id="main" style="width: 70%; height: 400px; margin: 0 auto;"></div>

                                <div class="card-body" id="ObtenerResultados"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>

<?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>
<!-- <script type="module" src="js/graficaMC.js"></script> -->
<script src="js/adm_murocontencion.js"></script>