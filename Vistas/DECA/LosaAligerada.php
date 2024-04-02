<?php
session_start();
if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2) {
    ?>
    <title>Adm | LOSA ALIGERADA</title>
    <?php
    include_once "assets/views/header.php";
    include_once "assets/views/nav.php";
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DISEÑO DE LOSA ALIGERADA</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../adm_principal.php">Home</a></li>
                            <li class="breadcrumb-item active">DISEÑO DE LOSA ALIGERADA</li>
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
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Datos Principales <small></small></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="FlexionViga" method="post">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="col-md-3">
                                            <div class="input-group mb-2">
                                                <label for="fc">fc</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="number" name="fc" class="form-control" id="fc"
                                                    placeholder="210" min="0" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">kg/cm2</span>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="col-md-3">
                                            <div class="input-group mb-2">
                                                <label for="fy">fy</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="number" name="fy" class="form-control" id="fy"
                                                    placeholder="4200" min="0" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">kg/cm2</span>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="col-md-3">
                                            <div class="input-group mb-2">
                                                <label for="num_tramos">N° Tramos</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="number" name="num_tramos" class="form-control" id="num_tramos"
                                                    placeholder="Numero de TRAMOS" min="0" required
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"></span>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="col-md-3">
                                            <div class="input-group mb-2">
                                                <button class="btn btn-primary" type="submit">DISEÑAR</button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="table-responsive">
                                        <table class="table table-bordered responsive table-hover" id="LuzLibreTramo">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">LUZ LIBRE m</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">CARGA MUERTA (Ton. m)</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">CARGA VIVA (Ton. m)</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">BASE (cm)</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">ALTURA (losa)(cm)</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">b (cm)</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Mi (Tonf-m)</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Md (Tonf-m)</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">δ1 (cm)</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">δ2 (cm)</th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">δ3 (cm)</th>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <!-- Agregar esta clase para hacer la tabla responsive -->
                                        <table class="table table-bordered responsive table-hover" id="tablaTramos">

                                            <tbody>
                                                <tr>
                                                    <th scope="row">EJE</th>
                                                </tr>

                                                <tr class="bg-primary">
                                                    <th scope="row">NEGATIVO(-)</th>
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


                                                <tr class="bg-primary">
                                                    <th scope="row">POSITIVO(+)</th>
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
                                            </tbody>
                                        </table>
                                    </div>

            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
            </section>

            <script>
                document.getElementById('num_tramos').addEventListener('input', function () {
                    const numTramos = parseInt(this.value);
                    const tbody = document.querySelector('#LuzLibreTramo tbody');
                    const trs = tbody.querySelectorAll('tr:not(.bg-primary)');

                    trs.forEach(tr => {
                        const tds = tr.querySelectorAll('td');
                        if (tds.length > numTramos) {
                            for (let i = numTramos; i < tds.length; i++) {
                                tds[i].remove();
                            }
                        } else {
                            numLuz = (numTramos)
                            for (let i = tds.length; i < numLuz; i++) {
                                const td = document.createElement('td');
                                const uniqueName = generateUniqueName(); // Generar un nombre único
                                const inputContainer = document.createElement('div');
                                inputContainer.classList.add('input-container');
                                if (tr.querySelector('th').textContent.includes('LUZ LIBRE m')) {
                                    const cellIndex = td.cellIndex;
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'Luz_Libre' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'LL';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                } else if (tr.querySelector('th').textContent === 'CARGA MUERTA (Ton. m)') {
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'CMuerta' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'CM';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                }
                                else if (tr.querySelector('th').textContent === 'CARGA VIVA (Ton. m)') {
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'Cviva' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'Cviva';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                }
                                else if (tr.querySelector('th').textContent === 'BASE (cm)') {
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'BASE' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'BASE';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                }
                                else if (tr.querySelector('th').textContent === 'ALTURA (losa)(cm)') {
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'ALTURA' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'ALTURA';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                }
                                else if (tr.querySelector('th').textContent === 'b (cm)') {
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'EVB' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'EVB';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                }
                                else if (tr.querySelector('th').textContent === 'Mi (Tonf-m)') {
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'Mi' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'Mi';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                }
                                else if (tr.querySelector('th').textContent === 'Md (Tonf-m)') {
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'Md' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'Md';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                }
                                else if (tr.querySelector('th').textContent === 'δ1 (cm)') {
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'δ1' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'δ1';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                }
                                else if (tr.querySelector('th').textContent === 'δ2 (cm)') {
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'δ2' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'δ2';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                }
                                else if (tr.querySelector('th').textContent === 'δ3 (cm)') {
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'δ3' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'δ3';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                }
                                tr.appendChild(td);
                            }
                        }
                    });
                });
            </script>

            <script>
                document.getElementById('num_tramos').addEventListener('input', function () {
                    const numTramos = parseInt(this.value);
                    const tbody = document.querySelector('#tablaTramos tbody');
                    const trs = tbody.querySelectorAll('tr:not(.bg-primary)');

                    // Eliminar columnas td en exceso y rellenar los inputs en N° CAPAS y ACERO para NEGATIVO
                    // y las filas correspondientes a las filas con "(+)" para POSITIVO
                    trs.forEach(tr => {
                        const tds = tr.querySelectorAll('td');
                        if (tds.length > numTramos * 3) {
                            for (let i = numTramos * 3; i < tds.length; i++) {
                                tds[i].remove();
                            }
                        } else {
                            numTramoss = (numTramos * 3)
                            for (let i = tds.length; i < numTramoss; i++) {
                                const td = document.createElement('td');
                                const uniqueName = generateUniqueName(); // Generar un nombre único
                                const inputContainer = document.createElement('div');
                                inputContainer.classList.add('input-container');
                                if (tr.querySelector('th').textContent === 'EJE') {
                                    const input = document.createElement('input');
                                    input.type = 'text';
                                    input.name = 'EJE' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'EJE';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                } else if (tr.querySelector('th').textContent.includes('MU (TN-M)-')) {
                                    // Agregar input de tipo número en la fila "MU (TN-M)"
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'MomentoUltimo-' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'MomentoUltimo-';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                } else if (tr.querySelector('th').textContent.includes('MU (TN-M)+')) {
                                    // Agregar input de tipo número en la fila "MU (TN-M)"
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'MomentoUltimo+' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'MomentoUltimo+';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                } else if (tr.querySelector('th').textContent.includes('Vu (TNF)-')) {
                                    // Agregar input de tipo número en la fila "MU (TN-M)"
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'Vu-' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'Vu-';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                } else if (tr.querySelector('th').textContent.includes('Vu (TNF)+')) {
                                    // Agregar input de tipo número en la fila "MU (TN-M)"
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'Vu+' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'Vu+';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                } else if (tr.querySelector('th').textContent.includes('Tu (TNF)-')) {
                                    // Agregar input de tipo número en la fila "MU (TN-M)"
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'Tu-' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'Tu-';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                } else if (tr.querySelector('th').textContent.includes('Tu (TNF)+')) {
                                    // Agregar input de tipo número en la fila "MU (TN-M)"
                                    const input = document.createElement('input');
                                    input.type = 'number';
                                    input.step = 'any';
                                    input.name = 'Tu+' + (i + 1); // Asignar nombre único
                                    input.placeholder = 'Tu+';
                                    input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                                    input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                                    td.appendChild(input);
                                }
                                tr.appendChild(td);
                            }


                        }
                    });
                });
                // Función para generar un nombre de entrada único
                function generateUniqueName() {
                    return 'input_' + Date.now();
                }
            </script>

            <script>
                document.getElementById('FlexionViga').addEventListener('submit', function (event) {
                    event.preventDefault();

                    const formData = new FormData(this);

                    fetch('Controladores/DesingLosa.php', {
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

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">RESULTADOS <small></small></h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" id="ObtenerResultados">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                (function () {
                    ("#example1").DataTable({
                        "responsive": true, "lengthChange": false, "autoWidth": false,
                        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                });
            </script>
    </div>
    <?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>