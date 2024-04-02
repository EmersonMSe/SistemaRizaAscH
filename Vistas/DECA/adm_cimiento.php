<?php

?>
<title>Adm || Gestion Usuario</title>
<?php include_once "assets/views/nav.php"; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/echarts@latest/dist/echarts.min.js"></script>

<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DISEÑO DE CIMIENTO CORRIDO</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">DISEÑO DE CIMIENTO CORRIDO</li>
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
                                            <h5 class="text-center"><strong>Diseño de cimiento Corrido</strong><button type="button" id="toggleButton" style="border: none; background: none;"><i class="fas fa-eye"></i></button></h5>
                                            <div class="contenedor" id="contenedor_dcc" style="display: block; overflow-y: auto; max-height: 400px;">
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="fc">f'c</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="fc" class="form-control text-center" id="fc" placeholder="210" min="0" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kg/cm<sup>2</sup></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="fy">fy</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="fy" class="form-control text-center" id="fy" placeholder="4200" min="0" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kg/cm<sup>2</sup></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="l1">L1</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="l1" class="form-control text-center" id="l1" placeholder="30" min="0" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">m</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="l2">L2</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="l2" class="form-control text-center" id="l2" placeholder="50" min="0" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">m</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="columna">Ø Columna</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <select name="columna" id="columna" class="form-control text-center">
                                                            <option value="" selected="selected" disabled>Seleccione</option>
                                                            <option value="0.60">6 mm</option>
                                                            <option value="0.80">8 mm</option>
                                                            <option value="0.95">3/8"</option>
                                                            <option value="1.20">12 mm</option>
                                                            <option value="1.27">1/2"</option>
                                                            <option value="1.59">5/8"</option>
                                                            <option value="1.91">3/4"</option>
                                                            <option value="2.54">1"</option>
                                                            <option value="3.49">1 3/8"</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="re">re</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="re" class="form-control text-center" id="re" placeholder="7.50" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="yalba"> γ albanileria</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="yalba" class="form-control text-center" id="yalba" placeholder="1800" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kg/cm<sup>3</sup></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="ycsimple"> γ C° simple</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="ycsimple" class="form-control text-center" id="ycsimple" placeholder="2300" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kg/cm<sup>3</sup></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="ycarmado"> γ C° armado</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="ycarmado" class="form-control text-center" id="ycarmado" placeholder="2400" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kg/cm<sup>3</sup></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="esadterr">Esf Adm del Terr (σt)</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="esadterr" class="form-control text-center" id="esadterr" placeholder="0.90" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">kg/cm<sup>2</sup></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="pdcimt">Prof de la Ciment (Df)</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="pdcimt" class="form-control text-center" id="pdcimt" placeholder="1.40" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">m</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="yprom">γ prom</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="yprom" class="form-control text-center" id="yprom" placeholder="1.00" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">tn/m<sup>3</sup></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="sc">s/c</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">

                                                        <input type="number" name="sc" class="form-control text-center" id="sc" placeholder="0.20" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">tn/m</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-12 mx-auto text-center">
                                                    <label for="esmuro">Esp. muro</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="input-group mb-2">
                                                        <input type="number" name="esmuro" class="form-control text-center" id="esmuro" placeholder="0.25" min="0" step="any">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">m</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <h5 class="text-center"><strong>Cálculo de cargas</strong><button type="button" id="calccargars" style="border: none; background: none;"><i class="fas fa-eye"></i></button></h5>
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
                                            <br>
                                            <script>
                                                // Obtener el botón y el contenedor
                                                const toggleButton = document.getElementById('toggleButton');
                                                const contenedor_dcc = document.getElementById('contenedor_dcc');
                                                //obtener el boton de calculos de cargas
                                                const buttoneyes = document.getElementById('calccargars');
                                                const contenedorCC = document.getElementById('contenedor_cc');

                                                // Agregar un evento de clic al botón
                                                toggleButton.addEventListener('click', function() {
                                                    // Alternar la visibilidad del contenedor
                                                    contenedor_dcc.style.display = contenedor_dcc.style.display === 'block' ? 'none' : 'block';

                                                    // Cambiar el ícono del botón
                                                    const icon = toggleButton.querySelector('i');
                                                    if (contenedor_dcc.style.display === 'block') {
                                                        icon.classList.remove('fa-eye-slash');
                                                        icon.classList.add('fa-eye');
                                                    } else {
                                                        icon.classList.remove('fa-eye');
                                                        icon.classList.add('fa-eye-slash');
                                                    }
                                                });
                                                // agregar evento de clic al botón calcular cargas
                                                buttoneyes.addEventListener('click', function() {
                                                    // Alternar la visibilidad del contenedor
                                                    contenedorCC.style.display = contenedorCC.style.display === 'block' ? 'none' : 'block';

                                                    // Cambiar el ícono del botón
                                                    const icon = buttoneyes.querySelector('i');
                                                    if (contenedorCC.style.display === 'block') {
                                                        icon.classList.remove('fa-eye-slash');
                                                        icon.classList.add('fa-eye');
                                                    } else {
                                                        icon.classList.remove('fa-eye');
                                                        icon.classList.add('fa-eye-slash');
                                                    }
                                                });
                                            </script>
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
                                        <div id="main" style="width: 100%; height: 400px;"></div>
                                        <div class="card">
                                            <div class="card-header bg-info">Resultados</div>
                                            <div class="card-body" id="ObtenerResultados">
                                            </div>
                                        </div>

                                        <!-- <script>
                                            const g = 9.81;
                                            let fc = document.getElementById('fc');
                                            let fy = document.getElementById('fy');
                                            let l1 = document.getElementById('l1');
                                            let l2 = document.getElementById('l2');

                                            let acero = document.getElementById('columna');
                                            let r = document.getElementById('re');
                                            let esadterr = document.getElementById('esadterr');
                                            let pdcimt = document.getElementById('pdcimt');
                                            let yprom = document.getElementById('yprom');
                                            let sc = document.getElementById('sc');
                                            let es_muro = document.getElementById('esmuro');

                                            let CM = document.getElementById('CM');
                                            let CV = document.getElementById('CV');
                                            var dom = document.getElementById('main'); // Cambio de 'chart-container' a 'main'
                                            var myChart = echarts.init(dom, null, {
                                                renderer: 'canvas',
                                                useDirtyRect: false
                                            });
                                            var app = {};

                                            var option;

                                            function calcular() {
                                                //longitud de desarrollo del acero de columna
                                                const L1 = l1.value;
                                                const L2 = l2.value;
                                                const t = es_muro.value * 100;
                                              
                                               
                                                //----------------------------------------------------------------
                                                const Ld1 = (acero.value * 0.075 * fy.value / Math.sqrt(fc.value));
                                                const Ld2 = (0.0044 * fy.value * acero.value);
                                                const H = Math.round(Math.max(Ld1, Ld2) + r.value);
                                                //calculo de cargas
                                                const calccua = 1.40 + 1.70;
                                                const ultCM = 1.40;
                                                const ultCV = 1.70;
                                                let cu = CM.value * ultCM + CV.value * ultCV;
                                                let on = Math.round((esadterr.value * 10 - pdcimt.value * yprom.value - sc.value) * 100) / 100;
                                                let Acim = Math.round((cu / 1000 / on) * 100) / 100;
                                                let B = Math.round(Acim * 100) / 100;
                                                let Bplus = B * 100 + 2;
                                                let H2 = Bplus + 5;
                                              
                                                var data = [
                                                    [0, 0],
                                                    [(0.5 * Bplus), 0],
                                                    [(0.5 * Bplus), H2],
                                                    [(0.5 * t), H2],
                                                    [(0.5 * t), (L1 + H2)],
                                                    [(0.5 * t), (L2 + H2)],
                                                    [(-0.5 * t), (L2 + H2)],
                                                    [(-0.5 * t), ((L2 + H2) - (l2))],
                                                    [(-0.5 * t), ((L2 + H2) - (L2)) - L1],
                                                    [(-0.5 * Bplus), ((L2 + H2) - (L2)) - L1],
                                                    [(-0.5 * Bplus), 0],
                                                    [0, 0]
                                                ];
                                                option = {
                                                    title: {
                                                        text: 'DISEÑO DE CIMIENTO CORRIDO'
                                                    },
                                                    xAxis: {},
                                                    yAxis: {},
                                                    series: [{
                                                        symbolSize: 20,
                                                        data: data,
                                                        type: 'line'
                                                    }]
                                                };

                                                if (option && typeof option === "object") {
                                                    myChart.setOption(option);
                                                }


                                            }

                                            // Agregar el evento 'oninput' a los campos de entrada
                                            //fc.oninput = calcular;
                                            //fy.oninput = calcular;
                                            l1.oninput = calcular;
                                            l2.oninput = calcular;
                                            acero.oninput = calcular;
                                            es_muro.oninput = calcular;
                                            CM.oninput = calcular;
                                            CV.oninput = calcular;
                                            // Realizar el cálculo inicial
                                            calcular();


                                            window.addEventListener('resize', myChart.resize);
                                        </script> -->
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
<script src="js/cimiento.js"></script>