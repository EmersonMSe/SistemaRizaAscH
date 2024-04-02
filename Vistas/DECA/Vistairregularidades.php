<?php
session_start();
if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2) {
?>
    <title>Adm | MEMORIA DE CALCULO</title>
    <?php
    include_once "assets/views/header.php";
    include_once "assets/views/nav.php";
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js" integrity="sha512-7U4rRB8aGAHGVad3u2jiC7GA5/1YhQcQjxKeaVms/bT66i3LVBMRcBI9KwABNWnxOSwulkuSXxZLGuyfvo7V1A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>VERIFICACION POR IRREGULARIDADES</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../adm_principal.php">Home</a></li>
                            <li class="breadcrumb-item active">VERIFICACION POR IRREGULARIDADES</li>
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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Datos Principales</h3>
                            </div>
                            <form action="" id="irregularidadesDat" method="post">
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Limite para la distorsion del entrepiso -->
                                        <div class="col-4 text-center">
                                            <div class="form-group">
                                                <label>Limmite Para la distorsion del entrepiso</label>
                                                <div class="input-group" data-target-input="nearest">
                                                    <select class="form-control select2" name="limDE" id="limDE">
                                                        <option value="" selected="true" disabled="disabled">Seleccione</option>
                                                        <option value="0.007">CONCRETO ARMADO</option>
                                                        <option value="0.001">ACERO</option>
                                                        <option value="0.005">ALBAÑILERIA</option>
                                                        <option value="0.01">MADERA</option>
                                                        <option value="se remite a la norma 080">ESTRUCTURAS DE TIERRA</option>
                                                    </select>
                                                    <!-- <input type="text" class="form-control text-center text-danger" id="limDE" name="limDE" placeholder="0.007" value="0.007" /> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- desplazamiento lateral en direccion xx -->
                                        <div class="col-6 text-center">
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <label class="text-center" for="">Desplazamiento Laterales Direccion XX</label>
                                                    <div class="row">
                                                        <div id="DesLateralx"></div>
                                                        <div id="DesLateralx"></div>
                                                    </div>
                                                </div>
                                            </section>
                                            <input type="hidden" name="dataDesplaX" id="dataDesplaX" value="">
                                        </div>
                                        <!-- desplazamiento lataral en direccion YY -->
                                        <div class="col-6 text-center">
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <label class="text-center" for="">Desplazamiento Laterales Direccion YY</label>
                                                    <div class="row">
                                                        <div id="DesLateraly"></div>
                                                        <div id="DesLateraly"></div>
                                                    </div>
                                                </div>
                                            </section>
                                            <input type="hidden" name="dataDesplay" id="dataDesplay" value="">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <hr class="bg-red">
                                    <div class="text-center">
                                        <!-- desplazamiento lateral en direccion xx -->
                                        <div class="col-12">
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <label class="text-center" for="">RESULTADOS DE ANALISIS (SE.SD)-"T" y %MP Segun NTE E.030-2018</label>
                                                    <div class="row">
                                                        <div id="SESD"></div>
                                                        <div id="SESD"></div>
                                                    </div>
                                                </div>
                                            </section>
                                            <input type="hidden" name="resultAnalisis" id="resultAnalisis" value="">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <hr class="bg-red">
                                    <!-- -----------------SISTEMA ESTRUCTURAL---------------------- -->
                                    <div class="text-center">
                                        <!-- Fuerza Cortante de Placas - SE_X -->
                                        <div class="col-12 d-flex justify-content-center">
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <label class="text-center" for="">Fuerza Cortante de Placas - SE_X</label>
                                                    <div class="row">
                                                        <div id="fuerCortPlacasSe_X"></div>
                                                        <div id="fuerCortPlacasSe_X"></div>
                                                    </div>
                                                </div>
                                            </section>
                                            <input type="hidden" name="resulSEX" id="resulSEX" value="">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <hr class="bg-red">
                                    <div class="text-center">
                                        <!-- Fuerza Cortante de Placas - SE_Y-->
                                        <div class="col-12 d-flex justify-content-center">
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <label class="text-center" for="">Fuerza Cortante de Placas - SE_Y</label>
                                                    <div class="row">
                                                        <div id="fuerCortPlacasSe_y"></div>
                                                        <div id="fuerCortPlacasSe_y"></div>
                                                    </div>
                                                </div>
                                            </section>
                                            <input type="hidden" name="resulSEy" id="resulSEy" value="">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <hr class="bg-red">
                                    <div class="text-center">
                                        <!-- Fuerza Cortante de Placas - SD_X-->
                                        <div class="col-12 d-flex justify-content-center">
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <label class="text-center" for="">Fuerza Cortante de Placas - SD_X-</label>
                                                    <div class="row">
                                                        <div id="fuerCortpSDX"></div>
                                                        <div id="fuerCortpSDX"></div>
                                                    </div>
                                                </div>
                                            </section>
                                            <input type="hidden" name="resulfuercortpDX" id="resulfuercortpDX" value="">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <hr class="bg-red">
                                    <div class="text-center">
                                        <!-- Fuerza Cortante de Placas - SD_Y -->
                                        <div class="col-12 d-flex justify-content-center">
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <label class="text-center" for=""> Fuerza Cortante de Placas - SD_Y</label>
                                                    <div class="row">
                                                        <div id="fuerCortpSDY"></div>
                                                        <div id="fuerCortpSDY"></div>
                                                    </div>
                                                </div>
                                            </section>
                                            <input type="hidden" name="resulfuercortpDY" id="resulfuercortpDY" value="">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <hr class="bg-red">
                                    <div class="text-center">
                                        <!-- TABLE:  Base Reactions -->
                                        <div class="col-12 d-flex justify-content-center">
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <label class="text-center" for="">TABLE: Base Reactions</label>
                                                    <div class="row">
                                                        <div id="tableBaseReactions"></div>
                                                        <div id="tableBaseReactions"></div>
                                                    </div>
                                                </div>
                                            </section>
                                            <input type="hidden" name="resulbaseReactions" id="resulbaseReactions" value="">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <hr class="bg-red">
                                    <div class="text-center">
                                        <!-- CORTANTE FINAL (PLANOS) -->
                                        <div class="col-12 d-flex justify-content-center">
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <label class="text-center" for="">CORTANTE FINAL (PLANOS)</label>
                                                    <div class="row">
                                                        <div id="cortFinPlanos"></div>
                                                        <div id="cortFinPlanos"></div>
                                                    </div>
                                                </div>
                                            </section>
                                            <input type="hidden" name="resulCFplanos" id="resulCFplanos" value="">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <hr class="bg-red">
                                    <div class="row">
                                        <!-- modulo -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Modulo</label>
                                                <div class="input-group" id="Modlulo" data-target-input="nearest">
                                                    <input type="text" class="form-control" name="Modlulo" placeholder="Modlulo 1" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- nombre Proyecto -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nombre Proyecto</label>
                                                <div class="input-group date" id="namePro" data-target-input="nearest">
                                                    <input type="text" class="form-control" name="namePro" placeholder="Nombre Proyecto" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- entidad -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Entidad</label>
                                                <div class="input-group date" id="entidad_pro" data-target-input="nearest">
                                                    <input type="text" class="form-control" name="entidad_pro" placeholder="Entidad" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- direccion -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Direccion</label>
                                                <div class="input-group date" id="direccionPro" data-target-input="nearest">
                                                    <input type="text" class="form-control" name="direccionPro" placeholder="Direccion" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Codigo Local -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Codigo Local</label>
                                                <div class="input-group date" id="codLocal" data-target-input="nearest">
                                                    <input type="text" class="form-control" name="codLocal" placeholder="Codigo Local" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Codigo Modular -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Codigo Modular</label>
                                                <div class="input-group date" id="codMod" data-target-input="nearest">
                                                    <input type="text" class="form-control" name="codMod" placeholder="Codigo Modular" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Unidad Ejecutora -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Unidad Ejecutora</label>
                                                <div class="input-group date" id="undejec" data-target-input="nearest">
                                                    <input type="text" class="form-control" name="undejec" placeholder="unidad Ejecutora" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Img_Logos -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Logo Encabezado</label>
                                                <div class="input-group date" id="logo_pro" data-target-input="nearest">
                                                    <input type="file" class="form-control" name="logo_pro" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Imagen Portada</label>
                                                <div class="input-group date" id="img_portada" data-target-input="nearest">
                                                    <input type="file" class="form-control" name="img_portada" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Imagen Modulo</label>
                                                <div class="input-group date" id="img_modulo" data-target-input="nearest">
                                                    <input type="file" class="form-control" name="img_modulo" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- codigos -->
                                    </div>
                                    <hr class="bg-red">
                                    <hr class="bg-red">
                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-primary previ-doc" type="submit">Previsualizar Documento</button>
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
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Previsualizar el documento</h3>
                            </div>
                            <div class="card-body" id="ObtenerResultadosMC" style="height: 600px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>
<script src="js/irregularidades.js"></script>