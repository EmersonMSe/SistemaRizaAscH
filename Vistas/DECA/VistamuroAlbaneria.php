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
                        <h1>DISEÑO DE MUROS DE ALBAÑERIA</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
                            <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                            <li class="breadcrumb-item active">DISEÑO DE MUROS DE ALBAÑERIA</li>
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
                                    <div class="col-5">
                                        <form id="data" method="post">
                                            <h2 class="text-center"><strong><u>Datos Generales</u></strong></h2>
                                           
                                            <div class="conteiner">
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md-0 bg-secondary">Desc</span>
                                                    <input class="col-md-4 : form-control" id="desc" name="desc" placeholder="descripción">
                                                    <div class="input-group-append text-blue">
                                                        &nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;">Descripción general del diseño</label>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md31 bg-secondary"> Ubic.</span>
                                                    <input class="col-md-4 : form-control" id="ubi" name="ubi" placeholder="Agrega la ubicación">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;"> Ubicación del diseño</label>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-secondary"> F'm</span>
                                                    <input class="form-control" id="fm" name="fm" placeholder="Agrega la ubicación">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;Tn/m2&nbsp;&nbsp;</div>
                                                    <label class="form-control" style="border: none;">Resistencia a la <br>Compresión de la Albañilería</label>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md31 bg-secondary">L</span>
                                                    <input class="col-md-4 : form-control" id="l" name="l" placeholder="Agrega la ubicación">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                        m&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;">Longitud</label>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md31 bg-secondary">t</span>
                                                    <input class="col-md-4 : form-control" id="t" name="t" placeholder="Agrega la ubicación">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                        m&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;">Espesor</label>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md31 bg-secondary">h</span>
                                                    <input class="col-md-4 : form-control" id="h" name="h" placeholder="Agrega la ubicación">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                        m&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;">Altura</label>
                                                </div>

                                            </div>
                                            <br>
                                            <br>
                                            <h5 class="text-center"><strong><u>2. CARGAS Y COMBINACIONES PARA EL DISEÑO</u></strong></h5>
                                            <div class="conteiner">
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md-0 bg-secondary">At</span>
                                                    <input class="col-md-4 : form-control" id="tributaria_area" name="tributaria_area" placeholder="Área tributaria">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                        m
                                                        &nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;">Ancho tributario</label>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md31 bg-secondary"> At_m</span>
                                                    <input class="col-md-3 : form-control" id="area_tributaria" name="area_tributaria" placeholder="Área tributaria">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                        m
                                                        &nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;"> Ancho tributario entre montantes:</label>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <h5 class="text-center"><strong><u>4. VERIFICACIÓN DEL AGRIETAMIENTO EN LOS MUROS</u></strong></h5>
                                            <div class="conteiner">
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md-0 bg-secondary">At</span>
                                                    <input class="col-md-4 : form-control" id="tributaria_area" name="tributaria_area" placeholder="Área tributaria">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                        m
                                                        &nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;">Ancho tributario</label>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md31 bg-secondary"> At_m</span>
                                                    <input class="col-md-3 : form-control" id="area_tributaria" name="area_tributaria" placeholder="Área tributaria">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                        m
                                                        &nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;"> Ancho tributario entre montantes:</label>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <h5 class="text-center"><strong><u>6. VERIFICACIÓN DE LA NECESIDAD DE COLOCAR REFUERZO HORIZONTAL</u></strong></h5>
                                            <div class="conteiner">
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md-0 bg-secondary">At</span>
                                                    <input class="col-md-4 : form-control" id="tributaria_area" name="tributaria_area" placeholder="Área tributaria">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                        m
                                                        &nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;">Ancho tributario</label>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md31 bg-secondary"> At_m</span>
                                                    <input class="col-md-3 : form-control" id="area_tributaria" name="area_tributaria" placeholder="Área tributaria">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                        m
                                                        &nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;"> Ancho tributario entre montantes:</label>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <h5 class="text-center"><strong><u>7.2 DETERMINACIÓN DE LA SECCIÓN DE CONCRETO DE LA COLUMNA DE CONFINAMIENTO</u></strong></h5>
                                            <div class="conteiner">
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md-0 bg-secondary">At</span>
                                                    <input class="col-md-4 : form-control" id="tributaria_area" name="tributaria_area" placeholder="Área tributaria">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                        m
                                                        &nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;">Ancho tributario</label>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md31 bg-secondary"> At_m</span>
                                                    <input class="col-md-3 : form-control" id="area_tributaria" name="area_tributaria" placeholder="Área tributaria">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                        m
                                                        &nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;"> Ancho tributario entre montantes:</label>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <h5 class="text-center"><strong><u>8. DETERMINACIÓN DE LA SECCIÓN DE CONCRETO DE LA COLUMNA DE CONFINAMIENTO</u></strong></h5>
                                            <div class="conteiner">
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md-0 bg-secondary">At</span>
                                                    <input class="col-md-4 : form-control" id="tributaria_area" name="tributaria_area" placeholder="Área tributaria">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                        m
                                                        &nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;">Ancho tributario</label>
                                                </div>
                                                <br>
                                                <div class="input-group">
                                                    <span class="input-group-text : col-md31 bg-secondary"> At_m</span>
                                                    <input class="col-md-3 : form-control" id="area_tributaria" name="area_tributaria" placeholder="Área tributaria">
                                                    <div class="input-group-append text-blue">&nbsp;&nbsp;
                                                        m
                                                        &nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <label class="col-md-9 : form-control" style="border: none;"> Ancho tributario entre montantes:</label>
                                                </div>
                                            </div>
                                            <br>
                                            <br>

                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <!--<label>CARGAS MUERTAS: </label>-->
                                                    <div class="input-group">
                                                        <span class="input-group-text : col-2">Desc</span>
                                                        <input class="col-5 : form-control" id="desc" name="desc" placeholder="descripción">
                                                        <label class="col-5 : form-control" style="border: none;">Descripción general del diseño</label>
                                                    </div>

                                                    <br>
                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">Ubic.</span>
                                                        <input class="col-md-3 : form-control" id="ubi" name="ubi" placeholder="Agrega la ubicación">
                                                        <label class="col-md-9 : form-control" style="border: none;">Ubicación del diseño</label>
                                                    </div>

                                                    <br>
                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">F'm</span>
                                                        <input class="col-md-3 : form-control" id="fm" name="fm" placeholder="...." value="700">
                                                        <div class="input-group-append">
                                                            <select class="form-select : form-control" id="fmSelect">
                                                                <option value="op1">Tn/m2</option>
                                                            </select>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </div>
                                                        <label class="col-md-9 : form-control" style="border: none;">Resistencia a la Compresión de la Albañilería
                                                        </label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">L</span>
                                                        <input class="col-md-3 : form-control" id="l" name="l" placeholder="...." value="5">
                                                        <div class="input-group-append">
                                                            <select class="form-select : form-control" id="lSelect">
                                                                <option value="op1">m</option>
                                                            </select>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </div>
                                                        <label class="col-md-9 : form-control" style="border: none;">Longitud</label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">t</span>
                                                        <input class="col-md-3 : form-control" id="t" name="t" placeholder="...." value="0.13">
                                                        <div class="input-group-append">
                                                            <select class="form-select : form-control" id="tSelect">
                                                                <option value="op1">m</option>
                                                            </select>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </div>
                                                        <label class="col-md-9 : form-control" style="border: none;">Espesor</label>
                                                    </div>
                                                    <br>


                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">h</span>
                                                        <input class="col-md-3 : form-control" id="h" name="h" placeholder="...." value="2.9">
                                                        <div class="input-group-append">
                                                            <select class="form-select : form-control" id="hSelect">
                                                                <option value="op1">m</option>
                                                            </select>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </div>
                                                        <label class="col-md-9 : form-control" style="border: none;">Altura</label>
                                                    </div>

                                                    <br>
                                                    <hr>
                                                    <h4>2. CARGAS Y COMBINACIONES PARA EL DISEÑO</h4><br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">Pm</span>
                                                        <input class="col-md-3 : form-control" id="pm" name="pm" placeholder="...." value="27.82">
                                                        <label class="col-md-9 : form-control" style="border: none;">Carga de gravedad máxima</label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">Pg</span>
                                                        <input class="col-md-3 : form-control" id="pg" name="pg" placeholder="...." value="23.72">
                                                        <label class="col-md-9 : form-control" style="border: none;">Carga de gravedad</label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">Ve</span>
                                                        <input class="col-md-3 : form-control" id="ve" name="ve" placeholder="...." value="3.92">
                                                        <label class="col-md-9 : form-control" style="border: none;">Fuerza cortante producida por sismo moderado
                                                        </label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">Me</span>
                                                        <input class="col-md-3 : form-control" id="me" name="me" placeholder="...." value="18.54">
                                                        <label class="col-md-9 : form-control" style="border: none;">Momento flector en el muro generado por sismo moderado
                                                        </label>
                                                    </div>

                                                    <br>
                                                    <hr>
                                                    <h4>4. VERIFICACIÓN DEL AGRIETAMIENTO EN LOS MUROS</h4><br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">V'm</span>
                                                        <input class="col-md-3 : form-control" id="vdm" name="vdm" placeholder="...." value="81">
                                                        <div class="input-group-append">
                                                            <select class="form-select : form-control" id="hSelect">
                                                                <option value="op1">m</option>
                                                            </select>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </div>
                                                        <label class="col-md-9 : form-control" style="border: none;">Resistencia característica corte de la albañilería
                                                        </label>
                                                    </div>

                                                    <br>
                                                    <hr>
                                                    <h4>6. VERIFICACIÓN DE LA NECESIDAD DE COLOCAR REFUERZO HORIZONTAL</h4><br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">Hiladas</span>
                                                        <div class="input-group-append">
                                                            <select class="form-select : form-control" id="nh" name="nh">
                                                                <option value="2">2 Hiladas</option>
                                                                <option value="3">3 Hiladas</option>
                                                            </select>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </div>
                                                        <label class="col-md-9 : form-control" style="border: none;">Número de hiladas
                                                        </label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">Barras</span>
                                                        <div class="input-group-append">
                                                            <select class="form-select : form-control" id="db" name="db">
                                                                <option value="8">8 mm</option>
                                                                <option value="1/4">1/4''</option>
                                                            </select>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </div>
                                                        <label class="col-md-9 : form-control" style="border: none;">Dimensión de barras
                                                        </label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">Nc</span>
                                                        <input class="col-md-3 : form-control" id="nc" name="nc" placeholder="...." value="2">
                                                        <label class="col-md-9 : form-control" style="border: none;">Número de columnas de confinamiento
                                                        </label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">F'c</span>
                                                        <input class="col-md-3 : form-control" id="fdc" name="fdc" placeholder="...." value="210">
                                                        <div class="input-group-append">
                                                            <select class="form-select : form-control" id="hSelect">
                                                                <option value="op1">Kg/cm2</option>
                                                            </select>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </div>
                                                        <label class="col-md-9 : form-control" style="border: none;">Resistencia característica corte de la albañilería
                                                        </label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">Pt1</span>
                                                        <input class="col-md-3 : form-control" id="pt1" name="pt1" placeholder="...." value="6.02">
                                                        <label class="col-md-9 : form-control" style="border: none;">1/4 pg muro perdendicular
                                                        </label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">Pt2</span>
                                                        <input class="col-md-3 : form-control" id="pt2" name="pt2" placeholder="...." value="0">
                                                        <label class="col-md-9 : form-control" style="border: none;">1/4 pg muro perdendicular
                                                        </label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">Lm</span>
                                                        <input class="col-md-3 : form-control" id="lm" name="lm" placeholder="...." value="5">
                                                        <div class="input-group-append">
                                                            <select class="form-select : form-control" id="lmSelect">
                                                                <option value="op1">m</option>
                                                            </select>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </div>
                                                        <label class="col-md-9 : form-control" style="border: none;">Longitud del paño mayor a 0.5L
                                                        </label>
                                                    </div>

                                                    <br>
                                                    <hr>
                                                    <h4>7.2 Determinación de la Sección de Concreto de la Columna de Confinamiento</h4>
                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">Ø Col. Ext.</span>
                                                        <input class="col-md-3 : form-control" id="pce" name="pce" placeholder="...." value="0.7">
                                                        <label class="col-md-9 : form-control" style="border: none;">Ø Columna Exterior</label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">Ø Col. Int.</span>
                                                        <input class="col-md-3 : form-control" id="pci" name="pci" placeholder="...." value="0.7">
                                                        <label class="col-md-9 : form-control" style="border: none;">Ø Columna Interior</label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">δ Col. Ext.</span>
                                                        <input class="col-md-3 : form-control" id="dce" name="dce" placeholder="...." value="1">
                                                        <label class="col-md-9 : form-control" style="border: none;">δ Columna Exterior</label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">δ Col. Int.</span>
                                                        <input class="col-md-3 : form-control" id="dci" name="dci" placeholder="...." value="1">
                                                        <label class="col-md-9 : form-control" style="border: none;">δ Columna Interior</label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">PCE</span>
                                                        <input class="col-md-3 : form-control" id="pce" name="pcex" placeholder="...." value="0.15">
                                                        <label class="col-md-9 : form-control" style="border: none;">Peralte Col. Ext.
                                                        </label>
                                                    </div>

                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">PCI</span>
                                                        <input class="col-md-3 : form-control" id="pci" name="pcin" placeholder="...." value="0">
                                                        <label class="col-md-9 : form-control" style="border: none;">Peralte Col. Int.
                                                        </label>
                                                    </div>

                                                    <br>
                                                    <hr>
                                                    <h4>8. 7.2 Determinación de la Sección de Concreto de la Columna de Confinamiento</h4><br>

                                                    <div class="input-group">
                                                        <span class="input-group-text : col-md-1">D</span>
                                                        <div class="input-group-append">
                                                            <select class="form-select : form-control" id="dmtr" name="dmtr">
                                                                <option value="3/8">3/8</option>
                                                            </select>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        </div>
                                                        <label class="col-md-9 : form-control" style="border: none;">Diámetro</label>
                                                    </div>

                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card-body">
                                                                <button type="submit" class="btn btn-primary btn-lg btn-block">Cargar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-1">
                                        <div class="v-line"></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="card">
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
<script src="js/cimiento.js"></script>