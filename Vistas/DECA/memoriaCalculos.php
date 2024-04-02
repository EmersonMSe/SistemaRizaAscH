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
                        <h1>DISEÑO DE MEMORIA DE CALCULOS</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../adm_principal.php">Home</a></li>
                            <li class="breadcrumb-item active">DISEÑO DE MEMORIA DE CALCULOS</li>
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
                            <form action="" id="data_memoria_calculo" method="post">
                                <div class="card-body">
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
                                    <h5 class="text-center"><strong>NORMATIVA</strong></h5>
                                    <div class="row">
                                        <!-- Normativa -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>MARCO NORMATIVO</label>
                                                <div class="input-group" id="normativa_MC" data-target-input="nearest">
                                                    <select class="form-control select2" name="normativa_MC" id="normativa_MC" class="input-group">
                                                        <option value="" selected="true" disabled="disabled">Seleccione la
                                                            normativa</option>
                                                        <option value="NTEACI318">Norma Técnica de Edificaciones ACI 318</option>
                                                        <option value="NTEACI350">Norma Técnica de Edificaciones ACI 350.3-06
                                                        </option>
                                                        <option value="NTEASCE">Norma Técnica de Edificaciones ASCE</option>
                                                        <option value="NTEAISC">Norma Técnica de Edificaciones AISC</option>
                                                        <option value="NTEAWS">Norma Técnica de Edificaciones AWS</option>
                                                        <!-- puente -->
                                                        <option value="DPAASTHOlRFD">Diseño de puentes según AASTHO LRFD</option>
                                                        <option value="MDPMTC">Manual de diseño de puentes-Ministerio de
                                                            Transporte y Comunicaciones</option>
                                                        <!-- Madera -->
                                                        <option value="MNTE010VIVIENDA">Modificaciones de la Norma Técnica E.010 (D.S.
                                                            005-2014-VIVIENDA)</option>
                                                        <!-- Cargas -->
                                                        <option value="NTEE020C">Norma Técnica de Edificaciones E.020 “Cargas”
                                                        </option>
                                                        <!-- Sismo Resistentes -->
                                                        <option value="NTEE030DSR">Norma Técnica de Edificaciones E.030 “Diseño
                                                            Sismo-Resistente”</option>
                                                        <!-- Suelos -->
                                                        <option value="NTEE050S">Norma Técnica de Edificaciones E.050 “Suelos”
                                                        </option>
                                                        <!-- Concreto Armado -->
                                                        <option value="NTEE060CA">Norma Técnica de Edificaciones E.060 “Concreto
                                                            Armado”</option>
                                                        <!-- Albañeria -->
                                                        <option value="NTEE070A">Norma Técnica de Edificaciones E.070 “Albañilería”
                                                        </option>
                                                        <!-- acero -->
                                                        <option value="NTEE090EM">Norma Técnica de Edificaciones E.090 “Estructuras
                                                            Metálicas</option>
                                                        <!-- Tanque Elevado Cisterna -->
                                                        <!-- Vidrio -->
                                                        <!-- Bambu -->
                                                        <!-- Adobe -->

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="bg-red">
                                    <hr class="bg-red">
                                    <h5 class="text-center"><strong>COMPONENTES ESTRUCTURALES</strong></h5>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>USO</label>
                                                            <div class="input-group" data-target-input="nearest">
                                                                <input type="text" class="form-control uso" placeholder="1° Piso: Escalera">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>#pisos</label>
                                                            <div class="input-group" data-target-input="nearest">
                                                                <input type="text" class="form-control pisosCE" placeholder="3 pisos">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>Elementos verticales</label>
                                                            <div class="input-group" data-target-input="nearest">
                                                                <input type="text" class="form-control elemVCE" placeholder="Placa PL">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>Elementos horizontales</label>
                                                            <div class="input-group" data-target-input="nearest">
                                                                <input type="text" class="form-control elemHCE" placeholder="Vigas en “X” ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>Techo</label>
                                                            <div class="input-group" data-target-input="nearest">
                                                                <input type="text" class="form-control techoCE" placeholder="Losa aligerada">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>IMAGEN</label>
                                                            <div class="input-group" data-target-input="nearest">
                                                                <input type="file" class="form-control iamgen_CE">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>Descripcion</label>
                                                            <div class="input-group" data-target-input="nearest">
                                                                <input type="text" class="form-control descripcionimgCE" placeholder="Describe la IMAGEN">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mt-3">
                                                        <button type="button" id="agregar_producto" class="btn btn-outline-success"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Tabla de datos -->
                                            <div class="col-lg-6">
                                                <div style="max-height: 400px; overflow-y: auto;">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <th>N°</th>
                                                            <th>Uso</th>
                                                            <th>Pisos</th>
                                                            <th>Elementos Verticales</th>
                                                            <th>Elementos Horizontales</th>
                                                            <th>Techo</th>
                                                            <th>Imagen</th>
                                                            <th>Descripcion</th>
                                                            <th>Eliminar</th>
                                                        </thead>
                                                        <tbody id="tablaTemporal" class="text-center"></tbody>
                                                    </table>
                                                </div>
                                                <br>
                                                <button type="button" id="cargar_informacion" class="btn btn-outline-primary"><i class="fa fa-upload" aria-hidden="true"></i>Cargar Informacion de la Tabla</button>
                                                <input type="hidden" id="dataCE" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        // Contador para asignar números a las filas
                                        var contadorFilas = 1;

                                        // Seleccionar el botón "Agregar"
                                        var btnAgregar = document.getElementById('agregar_producto');

                                        // Agregar un event listener para el evento click
                                        btnAgregar.addEventListener('click', function() {
                                            // Obtener los valores de los inputs
                                            var uso = document.querySelector('.uso').value;
                                            var pisos = document.querySelector('.pisosCE').value;
                                            var elemV = document.querySelector('.elemVCE').value;
                                            var elemH = document.querySelector('.elemHCE').value;
                                            var techo = document.querySelector('.techoCE').value;
                                            var imagen = document.querySelector('.iamgen_CE').files[0];
                                            var descripcion = document.querySelector('.descripcionimgCE').value;

                                            // Crear una fila de la tabla
                                            var fila = "<tr>";
                                            fila += "<td>" + contadorFilas + "</td>";
                                            fila += "<td>" + uso + "</td>";
                                            fila += "<td>" + pisos + "</td>";
                                            fila += "<td>" + elemV + "</td>";
                                            fila += "<td>" + elemH + "</td>";
                                            fila += "<td>" + techo + "</td>";

                                            // Mostrar la imagen seleccionada en la fila
                                            var reader = new FileReader(); // Crear un nuevo objeto FileReader

                                            // Cuando la lectura del archivo esté completa, ejecutar esta función
                                            reader.onload = function(e) {
                                                // Agregar una celda a la fila con la imagen previsualizada
                                                fila += "<td><img src='" + e.target.result + "' width='100' height='100'></td>";

                                                // Agregar una celda a la fila con el nombre del archivo
                                                fila += "<td>" + descripcion + "</td>";
                                                fila += "<td><button onclick='eliminarFila(this)' class='btn btn-danger'>Eliminar</button></td>";

                                                // Agregar la fila a la tabla
                                                document.getElementById("tablaTemporal").innerHTML += fila;

                                                // Incrementar el contador de filas
                                                contadorFilas++;

                                                // Limpiar los campos de entrada
                                                limpiarCampos();
                                            };

                                            // Leer el contenido del archivo como una URL de datos (data URL)
                                            reader.readAsDataURL(imagen);
                                        });

                                        // Función para eliminar una fila
                                        function eliminarFila(btn) {
                                            var fila = btn.parentNode.parentNode;
                                            fila.parentNode.removeChild(fila);

                                            // Decrementar el contador de filas
                                            contadorFilas--;
                                        }

                                        // Función para limpiar los campos de entrada
                                        function limpiarCampos() {
                                            document.querySelector('.uso').value = "";
                                            document.querySelector('.pisosCE').value = "";
                                            document.querySelector('.elemVCE').value = "";
                                            document.querySelector('.elemHCE').value = "";
                                            document.querySelector('.techoCE').value = "";
                                            document.querySelector('.iamgen_CE').value = "";
                                            document.querySelector('.descripcionimgCE').value = "";
                                        }

                                        document.getElementById('cargar_informacion').addEventListener('click', function() {
                                            enviarDatosAlServidor();
                                        });

                                        function enviarDatosAlServidor() {
                                            // Obtener los datos de la tabla
                                            const tabla = document.getElementById('tablaTemporal');
                                            const filas = tabla.getElementsByTagName('tr');
                                            const datosTabla = [];

                                            // Recorrer las filas de la tabla y obtener los datos
                                            for (let i = 0; i < filas.length; i++) {
                                                const celdas = filas[i].getElementsByTagName('td');
                                                if (celdas.length === 0) continue; // Ignorar las filas sin celdas (encabezados)
                                                const filaData = {
                                                    numero: celdas[0].innerText,
                                                    uso: celdas[1].innerText,
                                                    pisos: celdas[2].innerText,
                                                    elementosVerticales: celdas[3].innerText,
                                                    elementosHorizontales: celdas[4].innerText,
                                                    techo: celdas[5].innerText,
                                                    imagen: celdas[6].querySelector('img').src, // Acceder al atributo src de la etiqueta img
                                                    descripcion: celdas[7].innerText
                                                };
                                                datosTabla.push(filaData);
                                            }

                                            // Convertir los datos de la tabla a formato JSON
                                            const compEstruc = JSON.stringify(datosTabla);

                                            // Almacenar los datos en el input oculto
                                            const inputDatosCE = document.getElementById('dataCE');
                                            inputDatosCE.value = compEstruc;
                                        }
                                    </script>

                                    <hr class="bg-red">
                                    <!-- irregularidades -->
                                    <!-- <hr class="bg-red">
                                    <h5 class="text-center"><strong>IRREGULARIDADES ETABS</strong></h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div id="CargaConServ"></div>
                                                        <div id="CargaConServ"></div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col-md-6">
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div id="CargaConServs"></div>
                                                        <div id="CargaConServs"></div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <hr class="bg-red"> -->
                                    <!-- espectro -->
                                    <hr class="bg-red">
                                    <h5 class="text-center"><strong>CASOS DE CARGA (ESPECTRO)</strong></h5>
                                    <div class="row">
                                        <!-- factor de zona -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <style>
                                                    .popup-content {
                                                        display: none;
                                                        position: fixed;
                                                        top: 50%;
                                                        left: 50%;
                                                        transform: translate(-50%, -50%);
                                                        background-color: #fff;
                                                        padding: 20px;
                                                        border: 1px solid #ccc;
                                                        border-radius: 5px;
                                                        z-index: 9999;
                                                    }

                                                    .popup-image {
                                                        max-width: 100%;
                                                        /* La imagen se ajustará al ancho máximo de su contenedor */
                                                        max-height: 100%;
                                                        /* La imagen se ajustará a la altura máxima de su contenedor */
                                                        width: auto;
                                                        /* Ajusta automáticamente el ancho de la imagen */
                                                        height: auto;
                                                        /* Ajusta automáticamente la altura de la imagen */
                                                        max-width: 400px;
                                                        /* Establece el ancho máximo de la imagen en 100px */
                                                        max-height: 400px;
                                                        /* Establece la altura máxima de la imagen en 100px */
                                                    }

                                                    .close-icon {
                                                        position: absolute;
                                                        top: 10px;
                                                        right: 10px;
                                                        cursor: pointer;
                                                    }
                                                </style>
                                                <label id="popup-trigger">FACTOR DE ZONA</label>
                                                <div class="input-group" id="factorZona" data-target-input="nearest">
                                                    <select class="form-control select2" name="factorZona" id="factorZona">
                                                        <option value="" selected="true" disabled="disabled">FACTOR DE ZONE
                                                        </option>
                                                        <option value="0.10">Zona 1</option>
                                                        <option value="0.25">Zona 2</option>
                                                        <option value="0.35">Zona 3</option>
                                                        <option value="0.45">Zona 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="popup" class="popup-content">
                                            <i class="fas fa-times close-icon" id="close-popup"></i>
                                            <img src="imgpdf/Zona_sismicaRNE.png" alt="Image" class="popup-image">
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('#popup-trigger').click(function() {
                                                    $('#popup').toggle();
                                                });

                                                $('#close-popup').click(function() {
                                                    $('#popup').hide();
                                                });
                                            });
                                        </script>

                                        <!-- tipo de perfil -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label id="popup-perfilS">TIPO PERFIL</label>
                                                <div class="input-group" id="tipoPerfil" data-target-input="nearest">
                                                    <select class="form-control select2" name="tipoPerfil" id="tipoPerfil">
                                                        <option value="" select="selected" selected="true" disabled="disabled">TIPO PERFIL</option>
                                                        <option value="S0">S0</option>
                                                        <option value="S1">S1</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S3">S3</option>
                                                        <option value="S4">S4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="popup-perfil" class="popup-content">
                                            <i class="fas fa-times close-icon" id="close-popupperfil"></i>
                                            <img src="imgpdf/clasificacion_perfil_suelo.png" alt="Image" class="popup-image">
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('#popup-perfilS').click(function() {
                                                    $('#popup-perfil').toggle();
                                                });

                                                $('#close-popupperfil').click(function() {
                                                    $('#popup-perfil').hide();
                                                });
                                            });
                                        </script>

                                        <!-- factor de USO -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label id="factor_uso">FACTOR DE USO</label>
                                                <div class="input-group" id="factorUsoContainer" data-target-input="nearest">
                                                    <select class="form-control select2" name="factorUso" id="factorUso">
                                                        <option value="" selected="true" disabled="disabled">FACTOR DE USO
                                                        </option>
                                                        <option value="1.5">A= EDIFICACIONES ESENCIALES</option>
                                                        <option value="1.3">B= EDIFICACIONES IMPORTANTES</option>
                                                        <option value="1.0">C= EDIFICACIONES COMUNES</option>
                                                        <option value="1.01">D= EDIFICACIONES TEMPORALES</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="popup_factorUso" class="popup-content">
                                            <i class="fas fa-times close-icon" id="close_factorUso"></i>
                                            <img src="imgpdf/categoriaEdificacionesF.png" alt="Image" class="popup-image">
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('#factor_uso').click(function() {
                                                    $('#popup_factorUso').toggle();
                                                });

                                                $('#close_factorUso').click(function() {
                                                    $('#popup_factorUso').hide();
                                                });
                                            });
                                        </script>
                                        <!-- Opciones A -->
                                        <div class="col-md-4" id="OpcionesA" style="display: none;">
                                            <div class="form-group">
                                                <label for="edificacionesEsenciales">EDIFICACIONES ESENCIALES</label>
                                                <div class="input-group" id="selectEdificacionesEsenciales" data-target-input="nearest">
                                                    <select class="form-control select2" name="edificacionesEsenciales" id="edificacionesEsenciales">
                                                        <option value="" selected="true" disabled="disabled">Seleccione otra opción</option>
                                                        <option value="A1">A1: EDIFICACIONES ESENCIALES</option>
                                                        <option value="A2">A2: EDIFICACIONES ESENCIALES</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- A -->
                                        <div class="col-md-4" id="edificacionesEsencialesA" style="display: none;">
                                            <div class="form-group">
                                                <label id="EEA1Label">A1: EDIFICACIONES ESENCIALES</label>
                                                <div class="input-group" id="EEA1Container" data-target-input="nearest">
                                                    <select class="form-control select2" name="EEA1" id="EEA1">
                                                        <option value="" selected="true" disabled="disabled">Seleccione otra opción</option>
                                                        <option value="esPPZOld">Establecimientos del Sector Salud (Públicos y Privados) del segundo y tercer nivel con aislamiento sísmico en la Base (Zona 4, 3, 2, 1)</option>
                                                        <option value="esPPZ12">Establecimientos del Sector Salud (Públicos y Privados) del segundo y tercer nivel sin aislamiento sísmico (Permitido solo en la Zona 1 y 2)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4" id="edificacionesEsencialesB" style="display: none;">
                                            <div class="form-group">
                                                <label id="EEA2Label">A2: EDIFICACIONES ESENCIALES</label>
                                                <div class="input-group" id="EEA2Container" data-target-input="nearest">
                                                    <select class="form-control select2" name="EEA2" id="EEA2">
                                                        <option value="" selected="true" disabled="disabled">Seleccione otra opción</option>
                                                        <option value="EstSalud">Establecimiento de salud no comprendidos en la Categoria A1</option>
                                                        <option value="Puertos">Puertos</option>
                                                        <option value="Aeropuertos">Aeropuertos</option>
                                                        <option value="EstFerroPax">Estaciones Ferroviarias de Pasajeros</option>
                                                        <option value="SistTrans">Sistemas Masivos de Transporte</option>
                                                        <option value="LocMunicip">Locales Municipales</option>
                                                        <option value="CentCom">Centrales de Comunicacion</option>
                                                        <option value="EstBomberos">Estaciones de Bomberos</option>
                                                        <option value="CuartFuerzas">Cuarteles de las fuerzas Armadas y Policias</option>
                                                        <option value="InstElec">Instalaciones de generacion y tranformacion de electricidad</option>
                                                        <option value="ResPlantaAgua">Reservorios y plantas de Tratamiento de Agua</option>
                                                        <option value="InstEduc">Instituciones Educativas</option>
                                                        <option value="InstSuperior">Instituciones Superiores Tecnologicos y Universidades</option>
                                                        <option value="EdifRiesgo">Edificaciones cuyo colapso puede reprensentar un riesgo adicional</option>
                                                        <option value="GrandesHornos">Grandes Hornos</option>
                                                        <option value="FabDepMateriales">Fabricas y dépositos de materiales inflamable o toxicos</option>
                                                        <option value="EdifArchivos">Edificios que almacenan archivos e informacion esencial del Estado</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- B -->
                                        <div class="col-md-4" id="tercerdiv" style="display: none;">
                                            <div class="form-group">
                                                <label id="factor_uso2">EDIFICACIONES IMPORTANTES</label>
                                                <div class="input-group" id="edifImportante" data-target-input="nearest">
                                                    <select class="form-control select2" name="edifImportante" id="edifImportante">
                                                        <option value="" selected="true" disabled="disabled">Seleccione otra opción</option>
                                                        <option value="EdifPersonas">Edificaciones donde reunen gran cantidad de personas</option>
                                                        <option value="Cines">Cines</option>
                                                        <option value="Teatros">Teatros</option>
                                                        <option value="Estadios">Estadios</option>
                                                        <option value="Coliseos">Coliseos</option>
                                                        <option value="CentComerc">Centros Comerciales</option>
                                                        <option value="TermBus">Terminales de Buses de Pasajeros</option>
                                                        <option value="EstPenitenciarios">Establecimientos Penitenciarios</option>
                                                        <option value="EdifPatrimonio">Edificaciones que guarden Patrimonios valiosos</option>
                                                        <option value="Museos">Museos</option>
                                                        <option value="Bibliotecas">Bibliotecas</option>
                                                        <option value="DepGran">Depositos de granos</option>
                                                        <option value="AlmAbastec">Almacenes Importantes para el Abastecimiento</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- C -->
                                        <div class="col-md-4" id="cuartodiv" style="display: none;">
                                            <div class="form-group">
                                                <label id="factor_uso2">EDIFICACIONES COMUNES</label>
                                                <div class="input-group" id="edifcomunes" data-target-input="nearest">
                                                    <select class="form-control select2" name="edifcomunes" id="edifcomunes">
                                                        <option value="" selected="true" disabled="disabled">Seleccione otra opción</option>
                                                        <option value="EdifProv">Edificaciones Construcciones Provicionales para depósitos, Casetas, y otras similares</option>
                                                        <option value="Viviendas">Viviendas</option>
                                                        <option value="Oficinas">Oficinas</option>
                                                        <option value="Hoteles">Hoteles</option>
                                                        <option value="Restaurantes">Restaurantes</option>
                                                        <option value="DepIndust">Depósitos e instalaciones industriales cuya falta no acarree peligros adicionales de incendios o fugas contaminantes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- D -->
                                        <div class="col-md-4" id="quintodiv" style="display: none;">
                                            <div class="form-group">
                                                <label id="factor_uso2">EDIFICACIONES TEMPORALES</label>
                                                <div class="input-group" id="ediftemporares" data-target-input="nearest">
                                                    <select class="form-control select2" name="ediftemporares" id="ediftemporares">
                                                        <option value="" selected="true" disabled="disabled">Seleccione otra opción</option>
                                                        <!-- Aquí puedes agregar más opciones según lo necesites -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            $(document).ready(function() {
                                                $('#factorUso').change(function() {
                                                    var valorSeleccionado = $(this).val();
                                                    if (valorSeleccionado === "1.5") {
                                                        $('#OpcionesA').show();
                                                        $('#edificacionesEsencialesA').hide(); // Ocultar div A
                                                        $('#edificacionesEsencialesB').hide(); // Ocultar div B
                                                        $('#tercerdiv').hide();
                                                        $('#cuartodiv').hide();
                                                        $('#quintodiv').hide();
                                                    } else if (valorSeleccionado === "1.3") {
                                                        $('#OpcionesA').hide();
                                                        $('#edificacionesEsencialesA').hide(); // Ocultar div A
                                                        $('#edificacionesEsencialesB').hide(); // Ocultar div B
                                                        $('#tercerdiv').show();
                                                        $('#cuartodiv').hide();
                                                        $('#quintodiv').hide();
                                                    } else if (valorSeleccionado === "1.0") {
                                                        $('#OpcionesA').hide();
                                                        $('#edificacionesEsencialesA').hide(); // Ocultar div A
                                                        $('#edificacionesEsencialesB').hide(); // Ocultar div B
                                                        $('#tercerdiv').hide();
                                                        $('#cuartodiv').show();
                                                        $('#quintodiv').hide();
                                                    } else if (valorSeleccionado === "1.01") {
                                                        $('#OpcionesA').hide();
                                                        $('#edificacionesEsencialesA').hide(); // Ocultar div A
                                                        $('#edificacionesEsencialesB').hide(); // Ocultar div B
                                                        $('#tercerdiv').hide();
                                                        $('#cuartodiv').hide();
                                                        $('#quintodiv').show();
                                                    } else {
                                                        $('#OpcionesA').hide();
                                                        $('#edificacionesEsencialesA').hide(); // Ocultar div A
                                                        $('#edificacionesEsencialesB').hide(); // Ocultar div B
                                                        $('#tercerdiv').hide();
                                                        $('#cuartodiv').hide();
                                                        $('#quintodiv').hide();
                                                    }
                                                });

                                                $('#edificacionesEsenciales').change(function() {
                                                    var valorSeleccionado = $(this).val();
                                                    if (valorSeleccionado === "A1") {
                                                        $('#edificacionesEsencialesA').show();
                                                        $('#edificacionesEsencialesB').hide();
                                                    } else if (valorSeleccionado === "A2") {
                                                        $('#edificacionesEsencialesA').hide();
                                                        $('#edificacionesEsencialesB').show();
                                                    } else {
                                                        $('#edificacionesEsencialesA').hide();
                                                        $('#edificacionesEsencialesB').hide();
                                                    }
                                                });
                                            });
                                        </script>

                                        <!-- coeficiente BASICO -->
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label id="coeficienteBRF">COEFICIENTE BASICO REDUCCION FUERZAS S.</label>
                                                <div class="input-group" id="coefX" data-target-input="nearest">
                                                    <select name="coefX" id="coefX" class="form-control select2">
                                                        <option value="" selected="true" disabled="disabled">Rx0</option>
                                                        <option value="8">PÓRTICO ESPECIALES DE ACERO RESISTENTES A MOMENTOS
                                                        </option>
                                                        <option value="5">PÓRTICOS INTERMEDIOS DE ACERO RESISTENTES A
                                                            MOMENTOS</option>
                                                        <option value="4">PÓRTICOS ORDINARIOS DE ACERO RESISTENTES A
                                                            MOMENTOS
                                                        </option>
                                                        <option value="7">PORTICOS ESPECIALES DE ACERO CONCENTRICAMENTE
                                                            ARRIOSTRADO</option>
                                                        <option value="4">PÓRTICOS ORDINARIOS DE ACERO CONCENTRICAMENTE
                                                            ARRIOSTRADO</option>
                                                        <option value="8">PORTICOS ACERO EXCENTRICAMENTE ARRIOSTRADO
                                                        </option>
                                                        <option value="8">PORTICOS DE CONCRETO ARMADO</option>
                                                        <option value="7">DUAL DE CONCRETO ARMADO</option>
                                                        <option value="6">DE MUROS ESTRUCTURALES DE CONCRETO ARMADO</option>
                                                        <option value="4">MUROS DE DUCTIBILIDAD LIMITADA DE CONCRETO ARMADO
                                                        </option>
                                                        <option value="3">ALBAÑERIA ARMADA O CONFINADA</option>
                                                        <option value="7">MADERA</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="input-group" id="coefy" data-target-input="nearest">
                                                    <select class="form-control select2" name="coefy" id="coefy">
                                                        <option value="" selected="true" disabled="disabled">Ry0</option>
                                                        <option value="8">PÓRTICO ESPECIALES DE ACERO RESISTENTES A MOMENTOS
                                                        </option>
                                                        <option value="5">PÓRTICOS INTERMEDIOS DE ACERO RESISTENTES A
                                                            MOMENTOS</option>
                                                        <option value="4">PÓRTICOS ORDINARIOS DE ACERO RESISTENTES A
                                                            MOMENTOS
                                                        </option>
                                                        <option value="7">PORTICOS ESPECIALES DE ACERO CONCENTRICAMENTE
                                                            ARRIOSTRADO</option>
                                                        <option value="4">PÓRTICOS ORDINARIOS DE ACERO CONCENTRICAMENTE
                                                            ARRIOSTRADO</option>
                                                        <option value="8">PORTICOS ACERO EXCENTRICAMENTE ARRIOSTRADO
                                                        </option>
                                                        <option value="8">PORTICOS DE CONCRETO ARMADO</option>
                                                        <option value="7">DUAL DE CONCRETO ARMADO</option>
                                                        <option value="6">DE MUROS ESTRUCTURALES DE CONCRETO ARMADO</option>
                                                        <option value="4">MUROS DE DUCTIBILIDAD LIMITADA DE CONCRETO ARMADO
                                                        </option>
                                                        <option value="3">ALBAÑERIA ARMADA O CONFINADA</option>
                                                        <option value="7">MADERA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="popup_coeficienteBRF" class="popup-content">
                                            <i class="fas fa-times close-icon" id="close_coeficienteBRf"></i>
                                            <img src="imgpdf/coeficienteBasicoR.png" alt="Image" class="popup-image">
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('#coeficienteBRF').click(function() {
                                                    $('#popup_coeficienteBRF').toggle();
                                                });

                                                $('#close_coeficienteBRf').click(function() {
                                                    $('#popup_coeficienteBRF').hide();
                                                });
                                            });
                                        </script>

                                        <!-- factores de irregularidades X-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>FACTOR DE IRREGULARIDAD EN ALTURA EN X</label>
                                                <div class="input-group" id="factorIAX" data-target-input="nearest">
                                                    <select class="form-control select2" name="factorIAX" id="factorIAX">
                                                        <option value="" selected="true" disabled="disabled">Factor de
                                                            irregularidad en ALTURA
                                                        </option>
                                                        <option value="0.75">IRREGULARIDAD DE RIGIDEZ-PISO BLANDO</option>
                                                        <option value="0.75">IRREGULARIDAD DE RESISTENCIA-PISO DEBIL
                                                        </option>
                                                        <option value="0.50">IRREGULARIDAD EXTREMA DE RIGIDEZ</option>
                                                        <option value="0.50">IRREGULARIDAD EXTREMA DE RESISTENCIA</option>
                                                        <option value="0.90">IRREGULARIDAD DE MASA O PESO</option>
                                                        <option value="0.90">IRREGULARIDAD GEOMETRICA VERTICAL</option>
                                                        <option value="0.80">DISCONTINUIDAD EN LOS SISTEMAS RESISTENTES
                                                        </option>
                                                        <option value="0.60">DISCONTINUIDAD EXTREMA DE LOS SISTEMAS
                                                            RESISTENTES
                                                        </option>
                                                        <option value="1">SIN IRREGULARIDAD EN ALTURA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>FACTOR DE IRREGULARIDAD EN PLANTA EN X</label>
                                                <div class="input-group" id="factorIPX" data-target-input="nearest">
                                                    <select class="form-control select2" name="factorIPX" id="factorIPX">
                                                        <option value="" selected="true" disabled="disabled">Factor de
                                                            irregularidad en planta
                                                        </option>
                                                        <option value="0.75">IRREGULARIDAD TORSIONAL</option>
                                                        <option value="0.60">IRREGULARIDAD TORSIONAL EXTREMA</option>
                                                        <option value="0.90">ESQUINAS ENTRANTES</option>
                                                        <option value="0.85">DISCONTINUIDAD DE DIAFRAMAS</option>
                                                        <option value="0.90">SISTEMAS NO PARALELOS</option>
                                                        <option value="1">SIN IRREGULARIDADES EN PLANTA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- factores de irregularidades Y-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>FACTOR DE IRREGULARIDAD EN ALTURA EN Y</label>
                                                <div class="input-group" id="factorIAY" data-target-input="nearest">
                                                    <select class="form-control select2" name="factorIAY" id="factorIAY">
                                                        <option value="" selected="true" disabled="disabled">Factor de
                                                            irregularidad en ALTURA
                                                        </option>
                                                        <option value="0.75">IRREGULARIDAD DE RIGIDEZ-PISO BLANDO</option>
                                                        <option value="0.75">IRREGULARIDAD DE RESISTENCIA-PISO DEBIL
                                                        </option>
                                                        <option value="0.50">IRREGULARIDAD EXTREMA DE RIGIDEZ</option>
                                                        <option value="0.50">IRREGULARIDAD EXTREMA DE RESISTENCIA</option>
                                                        <option value="0.90">IRREGULARIDAD DE MASA O PESO</option>
                                                        <option value="0.90">IRREGULARIDAD GEOMETRICA VERTICAL</option>
                                                        <option value="0.80">DISCONTINUIDAD EN LOS SISTEMAS RESISTENTES
                                                        </option>
                                                        <option value="0.60">DISCONTINUIDAD EXTREMA DE LOS SISTEMAS
                                                            RESISTENTES
                                                        </option>
                                                        <option value="1">SIN IRREGULARIDAD EN ALTURA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>FACTOR DE IRREGULARIDAD EN PLANTA EN Y</label>
                                                <div class="input-group" id="factorIPY" data-target-input="nearest">
                                                    <select class="form-control select2" name="factorIPY" id="factorIPY">
                                                        <option value="" selected="true" disabled="disabled">Factor de
                                                            irregularidad en planta
                                                        </option>
                                                        <option value="0.75">IRREGULARIDAD TORSIONAL</option>
                                                        <option value="0.60">IRREGULARIDAD TORSIONAL EXTREMA</option>
                                                        <option value="0.90">ESQUINAS ENTRANTES</option>
                                                        <option value="0.85">DISCONTINUIDAD DE DIAFRAMAS</option>
                                                        <option value="0.90">SISTEMAS NO PARALELOS</option>
                                                        <option value="1">SIN IRREGULARIDADES EN PLANTA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="bg-red">
                                    <h5 class="text-center"><strong>Combinaciones de Carga</strong></h5>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group" data-target-input="nearest">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="concretoArmado" name="concretoArmado" value="carmado">
                                                    <label class="form-check-label" for="inlineCheckbox1">Concreto Armado</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="acero" name="acero" value="acero">
                                                    <label class="form-check-label" for="acero">Acero</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="inputConcretoArmado" style="display: none;">
                                        <input type="file" id="concretoArmadoFileInput" name="concretoArmadoFileInput">
                                    </div>

                                    <div id="inputAcero" style="display: none;">
                                        <input type="file" id="aceroFileInput" name="aceroFileInput">
                                    </div>

                                    <script>
                                        const concretoArmadoCheckbox = document.getElementById('concretoArmado');
                                        const aceroCheckbox = document.getElementById('acero');
                                        const concretoArmadoInput = document.getElementById('inputConcretoArmado');
                                        const aceroInput = document.getElementById('inputAcero');

                                        concretoArmadoCheckbox.addEventListener('change', function() {
                                            if (concretoArmadoCheckbox.checked) {
                                                concretoArmadoInput.style.display = 'block';
                                                aceroInput.style.display = 'none';
                                                aceroInput.querySelector('input[type="file"]').value = ''; // Limpiar campo de carga de archivos de Acero
                                            } else {
                                                concretoArmadoInput.style.display = 'none';
                                            }
                                        });

                                        aceroCheckbox.addEventListener('change', function() {
                                            if (aceroCheckbox.checked) {
                                                aceroInput.style.display = 'block';
                                                concretoArmadoInput.style.display = 'none';
                                                concretoArmadoInput.querySelector('input[type="file"]').value = ''; // Limpiar campo de carga de archivos de Concreto Armado
                                            } else {
                                                aceroInput.style.display = 'none';
                                            }
                                        });
                                    </script>

                                    <hr class="bg-red">
                                    <h5 class="text-center"><strong>Metrado de Cargas (CM)</strong></h5>
                                    <div class="col">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-2"><label for="yc">YC</label></div>
                                                <div class="col-md-2"> <input type="number" name="yc" class="form-control" id="yc" placeholder="2400" min="0" step="any" required></div>
                                                <div class="col-md-2">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kg/cm<sup>3</sup></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Peso específico del concreto armado</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-2"><label for="ysSimple">YS</label></div>
                                                <div class="col-md-2"><input type="number" name="ysSimple" class="form-control" id="ysSimple" placeholder="2000" min="0" step="any" required></div>
                                                <div class="col-md-2">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kg/m<sup>3</sup></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Peso específico del concreto simple</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-2"><label for="YSCemento">Ys</label></div>
                                                <div class="col-md-2"> <input type="number" name="YSCemento" class="form-control" id="YSCementofy" placeholder="2000" min="0" step="any" required></div>
                                                <div class="col-md-2">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kg/m<sup>3</sup></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Peso específico de cemento</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-3"> <label for="ppm">Peso Porcelanato por m<sup>2</sup></label></div>
                                                <div class="col-md-2"> <input type="number" name="ppm" class="form-control" id="ppm" placeholder="30" min="0" step="any" required></div>
                                                <div class="col-md-2">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kg/m<sup>3</sup></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label for="">Peso de porcelanato por m<sup>2</sup></label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4"> <label for="psctm">Peso Sobrecarga de Cobertura + tijerales de madera</label></div>
                                                <div class="col-md-2"> <input type="number" name="psctm" class="form-control" id="psctm" placeholder="0.00" min="0" step="any" required></div>
                                                <div class="col-md-2">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">kg/m</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="">Peso de sobracarga de cobertura+ tijerales de madera</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-2"> <label for="efp">Espesor de falso piso</label></div>
                                                <div class="col-md-2"> <input type="number" name="efp" class="form-control" id="efp" placeholder="0" min="0" step="any" required></div>
                                                <div class="col-md-2">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Espesor de falso piso</label>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-2"> <label for="etarr">Espesor de tarrajeado</label></div>
                                                <div class="col-md-2"> <input type="number" name="etarr" class="form-control" id="etarr" placeholder="0.02" min="0" step="any" required></div>
                                                <div class="col-md-2">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">m</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Espesor de tarrajeado</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="bg-red">

                                    <hr class="bg-red">
                                    <h5 class="text-center"><strong>Metrado de Cargas (CV)</strong></h5>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>IMAGEN</label>
                                                            <div class="input-group" data-target-input="nearest">
                                                                <input type="file" class="form-control imagenCviva">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label>Descripcion</label>
                                                            <div class="input-group" data-target-input="nearest">
                                                                <input type="text" class="form-control descCviva" placeholder="Describe la IMAGEN">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mt-3">
                                                        <button type="button" id="agregar_CE" class="btn btn-outline-success"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Tabla de datos -->
                                            <div class="col-lg-6">
                                                <div style="max-height: 400px; overflow-y: auto;">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <th>N°</th>
                                                            <th>Imagen</th>
                                                            <th>Descripcion</th>
                                                            <th>Eliminar</th>
                                                        </thead>
                                                        <tbody id="tabla_CE" class="text-center"></tbody>
                                                    </table>
                                                </div>
                                                <br>
                                                <button type="button" id="cargar_CE" class="btn btn-outline-primary"><i class="fa fa-upload" aria-hidden="true"></i>Cargar Informacion de la Tabla</button>
                                                <input type="hidden" id="agregarCV" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        // Contador para asignar números a las filas
                                        var contadorFilasCE = 1;

                                        // Seleccionar el botón "Agregar"
                                        var btnAgregarCE = document.getElementById('agregar_CE');

                                        // Agregar un event listener para el evento click
                                        document.getElementById('agregar_CE').addEventListener('click', function() {
                                            // Obtener los valores de los inputs
                                            var imagenCE = document.querySelector('.imagenCviva').files[0];
                                            var descripcionCE = document.querySelector('.descCviva').value;

                                            // Mostrar la imagen seleccionada en la fila
                                            var readerCE = new FileReader(); // Crear un nuevo objeto FileReader

                                            // Cuando la lectura del archivo esté completa, ejecutar esta función
                                            readerCE.onload = function(e) {
                                                // Crear una fila de la tabla
                                                var filaCE = "<tr>";
                                                filaCE += "<td>" + contadorFilasCE + "</td>";
                                                // Agregar una celda a la fila con la imagen previsualizada
                                                filaCE += "<td><img src='" + e.target.result + "' width='100' height='100'></td>";
                                                // Agregar una celda a la fila con el nombre del archivo
                                                filaCE += "<td>" + descripcionCE + "</td>";
                                                filaCE += "<td><button class='btn btn-danger eliminar-btn'>Eliminar</button></td>";

                                                filaCE += "</tr>";

                                                // Agregar la fila a la tabla
                                                document.getElementById("tabla_CE").innerHTML += filaCE;

                                                // Incrementar el contador de filas
                                                contadorFilasCE++;

                                                // Limpiar los campos de entrada
                                                limpiarCamposCE();
                                            };

                                            // Leer el contenido del archivo como una URL de datos (data URL)
                                            readerCE.readAsDataURL(imagenCE);
                                        });


                                        // Función para eliminar una fila
                                        function eliminarFilaCE(btn) {
                                            var filaCE = btn.parentNode.parentNode;
                                            filaCE.parentNode.removeChild(filaCE);

                                            // Decrementar el contador de filas
                                            contadorFilasCE--;
                                        }

                                        // Función para limpiar los campos de entrada
                                        function limpiarCamposCE() {
                                            document.querySelector('.imagenCviva').value = "";
                                            document.querySelector('.descCviva').value = "";
                                        }

                                        document.getElementById('cargar_CE').addEventListener('click', function() {
                                            enviarDatosAlServidorCE();
                                        });

                                        function enviarDatosAlServidorCE() {
                                            // Obtener los datos de la tabla
                                            const tablaCE = document.getElementById('tabla_CE');
                                            const filasCE = tablaCE.getElementsByTagName('tr');
                                            const datosTablaCE = [];

                                            // Recorrer las filas de la tabla y obtener los datos
                                            for (let i = 0; i < filasCE.length; i++) {
                                                const celdasCE = filasCE[i].getElementsByTagName('td');
                                                if (celdasCE.length === 0) continue; // Ignorar las filas sin celdas (encabezados)
                                                const filaDataCE = {
                                                    numero: celdasCE[0].innerText,
                                                    imagenCE: celdasCE[1].querySelector('img').src, // Acceder al atributo src de la etiqueta img
                                                    descripcionCE: celdasCE[2].innerText
                                                };
                                                datosTablaCE.push(filaDataCE);
                                            }

                                            // Convertir los datos de la tabla a formato JSON
                                            const datosCE = JSON.stringify(datosTablaCE);

                                            // Almacenar los datos en el input oculto
                                            const inputDatosCE = document.getElementById('agregarCV');
                                            inputDatosCE.value = datosCE;
                                        }
                                    </script>

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
<script src="js/memoria_calculo.js"></script>