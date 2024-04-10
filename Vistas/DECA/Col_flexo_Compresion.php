<?php
session_start();
if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2) {
?>
    <title>Adm | DISEÑO COLUMNAS</title>
    <?php include_once "assets/views/nav.php"; ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/echarts@latest/dist/echarts.min.js"></script>

    <div class="wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="text-left text-3xl font-bold underline decoration-indigo-500">
                                DISEÑO DE COLUMNAS
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../adm_principal.php">Home</a></li>
                                <li class="breadcrumb-item active text-1xl font-bold underline decoration-indigo-500">DISEÑO DE COLUMNAS</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header h-30 bg-gradient-to-r from-cyan-500 to-blue-500 sm:rounded-lg">
                                    <h1 class="text-center text-3xl font-bold decoration-indigo-500">
                                        DISEÑO DE COLUMNAS
                                    </h1>
                                    <h3 class="text-center text-2xl font-bold decoration-indigo-500">Datos Principales Método de la NTP E.030</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" id="ColumnaF">
                                        <div class="card">
                                            <div class="car-body relative overflow-x-auto shadow-md sm:rounded-lg">
                                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                                    </thead>
                                                    <tbody>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                Cantidad de pisos
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                # Piso
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <input type="text" id="piso" name="piso" class="bg-gray-50 w-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" value="1" required />
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                unidad
                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                Esfuerzo de compresion de concreto
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                fc
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <input type="text" id="fc" name="fc" class="bg-gray-50 w-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="210" value="210" required />
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                kg/cm<sup>2</sup>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                Esfuerzo de fluencia del acero
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                fy
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <input type="text" id="fy" name="fy" class="bg-gray-50 w-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="4200" value="4200" />
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                kg/cm<sup>2</sup>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                Altura
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                H
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <input type="text" id="altura" name="altura" class="bg-gray-50 w-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" value="0" />
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                cm
                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                Longitud en eje X
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                Lx
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <input type="text" id="L1" name="L1" class="bg-gray-50 w-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" value="0" />
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                cm
                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                Longitud en eje Y
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                Ly
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <input type="text" id="L2" name="L2" class="bg-gray-50 w-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" value="0" />
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                cm
                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                Peralte efectivo en "cm"
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                d
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <input type="text" id="d" name="d" class="bg-gray-50 w-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" value="0" />
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                cm
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <br>
                                            <!-- condicion ezbeltes -->
                                            <div class="card-body sm:rounded-lg">
                                                <div class="card-header  h-30 bg-gradient-to-r from-cyan-500 to-blue-500 sm:rounded-lg">
                                                    <h1 class="text-center text-2xl font-bold decoration-indigo-500">
                                                        Condicion de Ezbeltez
                                                        <button id="btncez" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                                                            Ver
                                                        </button>
                                                    </h1>
                                                </div>
                                                <div class="card-body" id="contentCE">
                                                    <section class="content">
                                                        <div class="container-fluid">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div id="Scrga"></div>
                                                                <div id="Scrga"></div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <!-- incluido XX -->
                                            <div class="card-body sm:rounded-lg">
                                                <div class="card-header  h-30 bg-gradient-to-r from-cyan-500 to-blue-500 sm:rounded-lg">
                                                    <h1 class="text-center text-2xl font-bold decoration-indigo-500">
                                                        Diagrama de Interacción (Incluido "Ø") - Dirección X-X
                                                        <button type="button" id="btnDIIYY" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                                                            Ver
                                                        </button>
                                                    </h1>
                                                </div>
                                                <div class="card-body" id="contentDIIYY">
                                                    <section class="content">
                                                        <div class="container-fluid">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div id="diagramaxx"></div>
                                                                <div id="myDiagramsxx"></div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <!-- Excluido xx -->
                                            <div class="card-body sm:rounded-lg">
                                                <div class="card-header  h-30 bg-gradient-to-r from-cyan-500 to-blue-500 sm:rounded-lg">
                                                    <h1 class="text-center text-2xl font-bold decoration-indigo-500">
                                                        Diagrama de Interacción (Excludio "Ø") - Dirección X-X
                                                        <button type="button" id="btnDIIXX" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                                                            Ver
                                                        </button>
                                                    </h1>
                                                </div>
                                                <div class="card-body" id="contentDIIXX">
                                                    <section class="content">
                                                        <div class="container-fluid">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div id="diagramaex"></div>
                                                                <div id="myDiagramex"></div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <!-- Incuido YY -->
                                            <div class="card-body sm:rounded-lg">
                                                <div class="card-header  h-30 bg-gradient-to-r from-cyan-500 to-blue-500 sm:rounded-lg">
                                                    <h1 class="text-center text-2xl font-bold decoration-indigo-500">
                                                        Diagrama de Interacción (Incluido "Ø") - Dirección Y-Y
                                                        <button type="button" id="btnDIEYY" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                                                            Ver
                                                        </button>
                                                    </h1>
                                                </div>
                                                <div class="card-body" id="contentDIEYY">
                                                    <section class="content">
                                                        <div class="container-fluid">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div id="diagramayy"></div>
                                                                <div id="myDiagramsyy"></div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <!-- excluido YY -->
                                            <div class="card-body sm:rounded-lg">
                                                <div class="card-header  h-30 bg-gradient-to-r from-cyan-500 to-blue-500 sm:rounded-lg">
                                                    <h1 class="text-center text-2xl font-bold decoration-indigo-500">
                                                        Diagrama de Interacción (Excluido "Ø") - Dirección Y-Y
                                                        <button type="button" id="btnDIEXX" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                                                            Ver
                                                        </button>
                                                    </h1>
                                                </div>
                                                <div class="card-body" id="contentDIEXX">
                                                    <section class="content">
                                                        <div class="container-fluid">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div id="diagramaexy"></div>
                                                                <div id="myDiagramexy"></div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <script>
                                                document.getElementById('btncez').addEventListener('click', function() {
                                                    var contentCE = document.getElementById('contentCE');
                                                    if (contentCE.style.display === "none") {
                                                        contentCE.style.display = "block";
                                                    } else {
                                                        contentCE.style.display = "none";
                                                    }
                                                });
                                                document.getElementById('btnDIIYY').addEventListener('click', function() {
                                                    var contentDIIYY = document.getElementById('contentDIIYY');
                                                    if (contentDIIYY.style.display === "none") {
                                                        contentDIIYY.style.display = "block";
                                                    } else {
                                                        contentDIIYY.style.display = "none";
                                                    }
                                                });
                                                document.getElementById('btnDIEYY').addEventListener('click', function() {
                                                    var contentDIEYY = document.getElementById('contentDIEYY');
                                                    if (contentDIEYY.style.display === "none") {
                                                        contentDIEYY.style.display = "block";
                                                    } else {
                                                        contentDIEYY.style.display = "none";
                                                    }
                                                });
                                                document.getElementById('btnDIIXX').addEventListener('click', function() {
                                                    var contentDIIXX = document.getElementById('contentDIIXX');
                                                    if (contentDIIXX.style.display === "none") {
                                                        contentDIIXX.style.display = "block";
                                                    } else {
                                                        contentDIIXX.style.display = "none";
                                                    }
                                                });
                                                document.getElementById('btnDIEXX').addEventListener('click', function() {
                                                    var contentDIEXX = document.getElementById('contentDIEXX');
                                                    if (contentDIEXX.style.display === "none") {
                                                        contentDIEXX.style.display = "block";
                                                    } else {
                                                        contentDIEXX.style.display = "none";
                                                    }
                                                });
                                            </script>
                                            <div class="car-body relative overflow-x-auto shadow-md sm:rounded-lg">
                                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                                        <th colspan="4" scope="col" class="px-10 py-3 text-gray-900 whitespace-nowrap bg-gradient-to-r from-cyan-500 to-blue-500 sm:rounded-lg">
                                                            <h1 class="text-center text-2xl font-bold decoration-indigo-500">
                                                                Diseño por corte
                                                            </h1>
                                                        </th>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                Condicion de Esbeltez
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                Condicion de Esbeltez
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <select name="CDEsbelZ" id="CDEsbelZ" class="bg-gray-100 w-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                                    <option disabled selected>Condicion de Esbeltez
                                                                    </option>
                                                                    <option value="1.01">Biarticulada</option>
                                                                    <option value="0.5">Empotrado Impedido</option>
                                                                    <option value="2">Empotrado y Libre</option>
                                                                    <option value="1.02">Empotrado Permitido</option>
                                                                    <option value="1">Según Norma</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">

                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                Sistema Estructural
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                Sistema Estructural
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <select name="SEstru" id="SEstru" class="bg-gray-100 w-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                                    <option value="" disabled selected>Sistema Estructural
                                                                    </option>
                                                                    <option value="Porticos">Pórticos</option>
                                                                    <option value="DualTipI">Dual Tipo I</option>
                                                                    <option value="DualTipII">Dual Tipo II</option>
                                                                    <option value="MEstructurales">Muros Estructurales</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">

                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                Tipo de Grapas
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                Tipo de Grapas
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <select name="Tgrapas" id="Tgrapas" class="bg-gray-100 w-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                                    <option value="" disabled selected>Tipo de Grapas
                                                                    </option>
                                                                    <option value="caso I">CASO I</option>
                                                                    <option value="caso II">CASO II</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">

                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">

                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                Pu inf
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <input type="text" id="puinf" name="puinf" class="bg-gray-50 w-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" value="0" />
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                (Ton)
                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">

                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                Pu Sup
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <input type="text" id="pusup" name="pusup" class="bg-gray-50 w-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" value="0" />
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                (Ton)
                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">

                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                Mn inf
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <input type="text" id="Mninf" name="Mninf" class="bg-gray-50 w-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" value="0" />
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                (Ton.m)
                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">

                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                Mn Sup
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <input type="text" id="Mnsup" name="Mnsup" class="bg-gray-50 w-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" value="0" />
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                (Ton.m)
                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">

                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                Vud etabs (Ton)
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <input type="text" id="VudEtaps" name="VudEtaps" class="bg-gray-50 w-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" value="0" />
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                (Ton)
                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                                Area del Acero Total:
                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                Area del Acero Total:
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <input type="text" id="AAceroTotal" name="AAceroTotal" class="bg-gray-50 w-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" value="0" />
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                cm<sup>2</sup>
                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">

                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                Acero de Estribo
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <select name="AEstribos" id="AEstribos" class="bg-gray-100 w-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                                    <option disabled selected>Acero de Estribos
                                                                    </option>
                                                                    <option value="0.28">ø6mm</option>
                                                                    <option value="1.13">12mm</option>
                                                                    <option value="0.50">8mm</option>
                                                                    <option value="0.71">ø3/8"</option>
                                                                    <option value="1.27">ø1/2"</option>
                                                                    <option value="1.98">ø5/8"</option>
                                                                    <option value="2.85">ø3/4"</option>
                                                                    <option value="5.10">ø1"</option>
                                                                    <option value="7.92">ø1 1/4"</option>
                                                                    <option value="11.40">ø1 1/2"</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">

                                                            </td>
                                                        </tr>
                                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">

                                                            </th>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                Acero Maximo Longitudinal
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                                                <select name="AmaxLong" id="AmaxLong" class="bg-gray-100 w-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                                    <option disabled selected>Acero de Estribos
                                                                    </option>
                                                                    <option value="0.28">ø6mm</option>
                                                                    <option value="1.13">12mm</option>
                                                                    <option value="0.50">8mm</option>
                                                                    <option value="0.71">ø3/8"</option>
                                                                    <option value="1.27">ø1/2"</option>
                                                                    <option value="1.98">ø5/8"</option>
                                                                    <option value="2.85">ø3/4"</option>
                                                                    <option value="5.10">ø1"</option>
                                                                    <option value="7.92">ø1 1/4"</option>
                                                                    <option value="11.40">ø1 1/2"</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-6 py-4 bg-gray-50 dark:bg-gray-800">

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <input type="hidden" name="dataFromHandsontable" id="dataFromHandsontable" value="">
                                        <button class="btn btn-primary" type="submit">DISEÑAR</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- resultados de columnas -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header h-30 bg-gradient-to-r from-cyan-500 to-blue-500 sm:rounded-lg">
                                    <h3 class="card-title">RESULTADOS <small></small></h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" id="ObtenerResultados">

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-header h-30 bg-gradient-to-r from-cyan-500 to-blue-500 sm:rounded-lg">
                                                            <h3 class="card-title">Diagrama de Interacción X-X</h3>
                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                    <i class="fas fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <script src="https://npmcdn.com/chart.js@latest/dist/chart.umd.js"></script>
                                                            <div class="myChartDiv">
                                                                <canvas id="DIXXs" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-header h-30 bg-gradient-to-r from-cyan-500 to-blue-500 sm:rounded-lg">
                                                            <h3 class="card-title">Diagrama de Interacción Y-Y</h3>

                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                    <i class="fas fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="myChartDiv">
                                                                <canvas id="DIejey" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var data = [
                ['CL-01', 'CM', 0, 0, 0, 0, 0, 0, 0],
                ['', 'CV', 0, 0, 0, 0, 0, 0, 0],
                ['', 'CSX', 0, 0, 0, 0, 0, 0, 0],
                ['', 'CSY', 0, 0, 0, 0, 0, 0, 0],
            ];

            var container = document.getElementById('Scrga');
            var hot = new Handsontable(container, {
                data: data,
                rowHeaders: true,
                colHeaders: true,
                contextMenu: true,
                colWidths: 100,
                nestedHeaders: [
                    [{
                        label: 'Columna',
                        rowspan: 2
                    }, {
                        label: 'TipoCarga',
                        rowspan: 2
                    }, {
                        label: 'P (Ton)',
                        colspan: 1
                    }, 'V2 (Ton)', 'V3 (Ton)', {
                        label: 'M2 (Ton.m)',
                        colspan: 2
                    }, {
                        label: 'M3 (Ton.m)',
                        colspan: 2
                    }],
                    ['', '', '', '', '', 'Top', 'Bottom', 'Top', 'Bottom'],
                ],
                collapsibleColumns: [{
                        row: -2,
                        col: 1,
                        collapsible: false
                    },
                    {
                        row: -1,
                        col: 1,
                        collapsible: false
                    },
                ],
                licenseKey: 'non-commercial-and-evaluation'
            });

            // Captura el formulario
            const form = document.getElementById('ColumnaF');
            const dataFromHandsontable = document.querySelector('#dataFromHandsontable');

            // Agrega un manejador de eventos para el envío del formulario
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Obtén los datos de Handsontable y conviértelos a JSON
                const tableData = hot.getData();
                const jsonData = JSON.stringify(tableData);

                dataFromHandsontable.value = jsonData;
                const formData = new FormData(form);

                // Envía los datos mediante una solicitud POST AJAX
                fetch('Controladores/Dcolumna.php', {
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
        var dataFromHandsontable = [
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0]
        ];
        $(document).ready(function() {
            var container = document.getElementById('diagramaxx');
            var ctx = document.getElementById("DIXXs");
            var myChart;

            var hot = new Handsontable(container, {
                data: dataFromHandsontable,
                rowHeaders: true,
                colHeaders: true,
                contextMenu: true,
                colWidths: 100,
                nestedHeaders: [
                    [{
                        label: 'Diagrama de Interacción (Incluido "Ø") - Dirección X-X',
                        colspan: 6
                    }],
                    [{
                        label: 'CURVA a 90°',
                        colspan: 3
                    }, {
                        label: 'CURVA a 270°',
                        colspan: 3
                    }],
                    ['P (Ton)', 'M2 (Ton.m)', 'M3 (Ton.m)', 'P (Ton)', 'M2 (Ton.m)', 'M3 (Ton.m)'],
                ],
                collapsibleColumns: [{
                        row: -3,
                        col: 1,
                        collapsible: false
                    },
                    {
                        row: -2,
                        col: 1,
                        collapsible: false
                    },
                    {
                        row: -1,
                        col: 1,
                        collapsible: false
                    },
                ],
                licenseKey: 'non-commercial-and-evaluation',
                beforeChange: function(changes, src) {
                    if (src !== 'loadData') {
                        changes.forEach((change) => {
                            var row = change[0];
                            var column = change[1];
                            var value = change[3] === '' ? 0 : parseFloat(change[3]);

                            dataFromHandsontable[row][column] = value;
                        });

                        updateChartData();
                    }
                }
            });
            var dataExcluidoX = [
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0]
            ];

            var container = document.getElementById('diagramaex');
            var hot = new Handsontable(container, {
                data: dataExcluidoX,
                rowHeaders: true,
                colHeaders: true,
                contextMenu: true,
                colWidths: 100,
                nestedHeaders: [
                    [{
                        label: 'Diagrama de Interacción (Excluido "Ø") - Dirección X-X',
                        colspan: 6
                    }],
                    [{
                        label: 'CURVA a 90°',
                        colspan: 3
                    }, {
                        label: 'CURVA a 270',
                        colspan: 3
                    }],
                    ['P', 'M2', 'M3', 'P', 'M2', 'M3'],
                ],
                collapsibleColumns: [{
                        row: -3,
                        col: 1,
                        collapsible: false
                    },
                    {
                        row: -2,
                        col: 1,
                        collapsible: false
                    },
                    {
                        row: -1,
                        col: 1,
                        collapsible: false
                    },
                ],
                licenseKey: 'non-commercial-and-evaluation',
                beforeChange: function(changes, src) {
                    if (src !== 'loadData') {
                        changes.forEach((change) => {
                            var row = change[0];
                            var column = change[1];
                            var value = change[3] === '' ? 0 : parseFloat(change[3]);

                            dataExcluidoX[row][column] = value;
                        });

                        updateChartData();
                    }
                }
            });

            function updateChartData() {
                var dataneg = dataFromHandsontable.map(function(row) {
                    return {
                        x: row[1],
                        y: row[0],
                        z: row[2]
                    };
                });
                var datafi = dataFromHandsontable.map(function(row) {
                    return {
                        x: row[4],
                        y: row[3],
                        z: row[5]
                    };
                });
                var datanegEX = dataExcluidoX.map(function(row) {
                    return {
                        x: row[1],
                        y: row[0],
                        z: row[2]
                    };
                });

                var datafiEX = dataExcluidoX.map(function(row) {
                    return {
                        x: row[4],
                        y: row[3],
                        z: row[5]
                    };
                });

                myChart.data.datasets[0].data = datafi;
                myChart.data.datasets[1].data = dataneg;
                myChart.data.datasets[2].data = datanegEX;
                myChart.data.datasets[3].data = datafiEX;
                console.log(datafi)
                console.log(dataneg)
                console.log(datanegEX)
                console.log(datafiEX)
                myChart.update();
            }


            var dataneg = dataFromHandsontable.map(function(row) {
                return {
                    x: row[1],
                    y: row[0],
                    z: row[2]
                };
            });
            var datafi = dataFromHandsontable.map(function(row) {
                return {
                    x: row[4],
                    y: row[3],
                    z: row[5]
                };
            });
            var datanegEX = dataExcluidoX.map(function(row) {
                return {
                    x: row[1],
                    y: row[0],
                    z: row[2]
                };
            });

            var datafiEX = dataExcluidoX.map(function(row) {
                return {
                    x: row[4],
                    y: row[3],
                    z: row[5]
                };
            });

            const data = {
                datasets: [{
                        label: 'Diseño',
                        data: datafi,
                        fill: false,
                        borderColor: 'red',
                        backgroundColor: 'red',
                        type: 'line', // Tipo de gráfico para conectar los puntos con líneas
                    },
                    {
                        label: 'Diseño',
                        data: dataneg,
                        fill: false,
                        borderColor: 'blue',
                        backgroundColor: 'blue',
                        type: 'line', // Tipo de gráfico para conectar los puntos con líneas
                    },
                    {
                        label: 'Nominal',
                        data: datanegEX,
                        fill: false,
                        borderColor: 'green',
                        backgroundColor: 'green',
                        type: 'line', // Tipo de gráfico para conectar los puntos con líneas
                    },
                    {
                        label: 'Nominal',
                        data: datafiEX,
                        fill: false,
                        borderColor: 'yellow',
                        backgroundColor: 'yellow',
                        type: 'line', // Tipo de gráfico para conectar los puntos con líneas
                    }
                ]
            };

            const config = {
                type: 'scatter',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Diagrama de Interacción X-X'
                        }
                    },
                    scales: {
                        x: {
                            min: 'auto',
                            max: 'auto',
                            position: 'center',
                        },
                        y: {
                            min: 'auto',
                            max: 'auto',
                            position: 'left',
                        }
                    }
                },
            };

            myChart = new Chart(ctx, config);
        });
    </script>

    <script>
        var dataFromHandsontableys = [
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0],
            [0, 0, 0, 0, 0, 0]
        ];

        $(document).ready(function() {
            var container = document.getElementById('diagramayy');
            var ctx = document.getElementById("DIejey");
            var myChart;

            var hot = new Handsontable(container, {
                data: dataFromHandsontableys,
                rowHeaders: true,
                colHeaders: true,
                contextMenu: true,
                colWidths: 100,
                nestedHeaders: [
                    [{
                        label: 'Diagrama de Interacción (Incluido "Ø") - Dirección Y-Y',
                        colspan: 6
                    }],
                    [{
                        label: 'CURVA a 0°',
                        colspan: 3
                    }, {
                        label: 'CURVA a 180°',
                        colspan: 3
                    }],
                    ['P (Ton)', 'M2 (Ton.m)', 'M3 (Ton.m)', 'P (Ton)', 'M2 (Ton.m)', 'M3 (Ton.m)'],
                ],
                collapsibleColumns: [{
                        row: -3,
                        col: 1,
                        collapsible: false
                    },
                    {
                        row: -2,
                        col: 1,
                        collapsible: false
                    },
                    {
                        row: -1,
                        col: 1,
                        collapsible: false
                    },
                ],
                licenseKey: 'non-commercial-and-evaluation',
                beforeChange: function(changes, src) {
                    if (src !== 'loadData') {
                        changes.forEach((change) => {
                            var row = change[0];
                            var column = change[1];
                            var value = change[3] === '' ? 0 : parseFloat(change[3]);

                            dataFromHandsontableys[row][column] = value;
                        });

                        updateChartData();
                    }
                }
            });
            var dataExcluidoy = [
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0],
                [0, 0, 0, 0, 0, 0]
            ];

            var containerEx = document.getElementById('diagramaexy');
            var hotEx = new Handsontable(containerEx, {
                data: dataExcluidoy,
                rowHeaders: true,
                colHeaders: true,
                contextMenu: true,
                colWidths: 100,
                nestedHeaders: [
                    [{
                        label: 'Diagrama de Interacción (excluido "Ø") - Dirección Y-Y',
                        colspan: 6
                    }],
                    [{
                        label: 'CURVA a 0°',
                        colspan: 3
                    }, {
                        label: 'CURVA a 180°',
                        colspan: 3
                    }],
                    ['P', 'M2', 'M3', 'P', 'M2', 'M3'],
                ],
                collapsibleColumns: [{
                        row: -3,
                        col: 1,
                        collapsible: false
                    },
                    {
                        row: -2,
                        col: 1,
                        collapsible: false
                    },
                    {
                        row: -1,
                        col: 1,
                        collapsible: false
                    },
                ],
                licenseKey: 'non-commercial-and-evaluation',
                beforeChange: function(changes, src) {
                    if (src !== 'loadData') {
                        changes.forEach((change) => {
                            var row = change[0];
                            var column = change[1];
                            var value = change[3] === '' ? 0 : parseFloat(change[3]);

                            dataExcluidoy[row][column] = value;
                        });

                        updateChartData();
                    }
                }
            });

            function updateChartData() {
                var datanegy = dataFromHandsontableys.map(function(row) {
                    return {
                        /* x: row[1], */
                        x: row[2],
                        y: row[0],
                        z: row[2]
                    };
                });
                var datafiy = dataFromHandsontableys.map(function(row) {
                    return {
                        /* x: row[4], */
                        x: row[5],
                        y: row[3],
                        z: row[5]
                    };
                });
                var datanegEy = dataExcluidoy.map(function(row) {
                    return {
                        /* x: row[1], */
                        x: row[2],
                        y: row[0],
                        z: row[2]
                    };
                });
                var datafiEy = dataExcluidoy.map(function(row) {
                    return {
                        /* x: row[4], */
                        x: row[5],
                        y: row[3],
                        z: row[5]
                    };
                });

                myChart.data.datasets[0].data = datafiy;
                myChart.data.datasets[1].data = datanegy;
                myChart.data.datasets[2].data = datanegEy;
                myChart.data.datasets[3].data = datafiEy;
                myChart.update();
            }


            var datanegy = dataFromHandsontableys.map(function(row) {
                return {
                    /* x: row[1], */
                    x: row[2],
                    y: row[0],
                    //z: row[2]
                };
            });
            var datafiy = dataFromHandsontableys.map(function(row) {
                return {
                    /* x: row[4], */
                    x: row[5],
                    y: row[3],
                    //z: row[5]
                };
            });
            var datanegEy = dataExcluidoy.map(function(row) {
                return {
                    /* x: row[1], */
                    x: row[2],
                    y: row[0],
                    //z: row[2]
                };
            });

            var datafiEy = dataExcluidoy.map(function(row) {
                return {
                    /* x: row[4], */
                    x: row[5],
                    y: row[3],
                    //z: row[5]
                };
            });

            const data = {
                datasets: [{
                        label: 'Diseño',
                        data: datafiy,
                        fill: false,
                        borderColor: 'red',
                        backgroundColor: 'red',
                        type: 'line', // Tipo de gráfico para conectar los puntos con líneas
                    },
                    {
                        label: 'Diseño',
                        data: datanegy,
                        fill: false,
                        borderColor: 'blue',
                        backgroundColor: 'blue',
                        type: 'line', // Tipo de gráfico para conectar los puntos con líneas
                    },
                    {
                        label: 'Nominal',
                        data: datanegEy,
                        fill: false,
                        borderColor: 'green',
                        backgroundColor: 'green',
                        type: 'line', // Tipo de gráfico para conectar los puntos con líneas
                    },
                    {
                        label: 'Nominal',
                        data: datafiEy,
                        fill: false,
                        borderColor: 'yellow',
                        backgroundColor: 'yellow',
                        type: 'line', // Tipo de gráfico para conectar los puntos con líneas
                    }
                ]
            };

            const config = {
                type: 'scatter',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Diagrama de Interacción Y-Y'
                        }
                    },
                    scales: {
                        x: {
                            min: 'auto',
                            max: 'auto',
                            position: 'center',
                        },
                        y: {
                            min: 'auto',
                            max: 'auto',
                            position: 'left',
                        }
                    }
                },
            };

            myChart = new Chart(ctx, config);
        });
    </script>
<?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>
<!-- <script src="js/columnas.js"></script> -->