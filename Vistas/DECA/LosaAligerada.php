<?php
/* session_start();
if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 2) { */
?>
<title>Adm | LOSA ALIGERADA</title>
<style>
    tbody {
        font-size: 11px;
    }
    thead {
        font-size: 13px;
    }
</style>
<?php
include_once "assets/views/header.php";
include_once "assets/views/nav.php";
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Solo encabezado -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DISEÑO DE LOSA ALIGERADA</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../adm_principal.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Diseño de Losa Aligerada</li>
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
                        <!-- Primer form table input -->
                        <form id="FlexionViga" method="post">
                            <div class="card-body">
                                <div class="row d-flex justify-content-between align-items-center mb-4">
                                    <!-- fc Input id="fc" name="fc" -->
                                    <div class="col-md-3 mr-5">
                                        <div class="input-group mb-2">
                                            <label for="fc">fc</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="number" name="fc" class="form-control" id="fc" value="210" min="0" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">kg/cm2</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- fy Input id="fy" name="fy" -->
                                    <div class="col-md-3 mr-5">
                                        <div class="input-group mb-2">
                                            <label for="fy">fy</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="number" name="fy" class="form-control" id="fy" value="4200" min="0" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">kg/cm2</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- fy Input id="num_tramos" name="num_tramos" -->
                                    <div class="col-md-3 mr-5">
                                        <div class="input-group mb-2">
                                            <label for="num_tramos">N° Tramos</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="number" name="num_tramos" class="form-control" id="num_tramos" placeholder="Numero de TRAMOS" min="0" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                            <div class="input-group-append">
                                                <span class="input-group-text"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- button type="submit" value=DISEÑAR -->
                                    <div class="col-md-3">
                                        <div class="input-group mb-2">
                                            <button class="btn btn-primary" type="submit">DISEÑAR</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tabla de label de input: LUZ LIBRE m, CARGA MUERTA (Ton. m), CARGA VIVA (Ton. m), BASE (cm), ALTURA (losa)(cm), b (cm), Mi (Tonf-m), Md (Tonf-m), δ1 (cm), δ2 (cm), δ3 (cm) -->
                                <div class="table-responsive">
                                    <table class="table" id="LuzLibreTramo">
                                        <tbody>
                                            <tr style="font-size: 13px;background-color: #4e5c77; color:white">
                                                <th scope="row">Datos principales</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Luz libre (m)</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Carga Muerta (Ton. m)</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Carga Viva (Ton. m)</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Base (cm)</th>
                                            </tr>
                                            <tr>
                                                <th scope="row">Altura (losa)(cm)</th>
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
                                    <!-- Tabla de label de input: 
                                    Eje Negativo: (MU (TN-M)-, Vu (TNF)-, Tu (TNF)-)
                                    Eje Positivo: (MU (TN-M)+, Vu (TNF)+, Tu (TNF)+) -->
                                    <table class="table" id="tablaTramos">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Eje</th>
                                            </tr>
                                            <tr class="bg-primary">
                                                <th scope="row">Negativo(-)</th>
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
                                                <th scope="row">Positivo(+)</th>
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

    <!-- It listens a input event to create tds next to each th brother inside a tr
name="Luz_Libre${columna}" name="CMuerta${columna}" name="Cviva${columna}" name="BASE${columna}" name="ALTURA${columna}" name="EVB${columna}" name="Mi${columna}" name="Md${columna}" name="δ1${columna}" name="δ2${columna}" name="δ3${columna}" -->
    <script>
        document.getElementById('num_tramos').addEventListener('input', function() {
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
                        if (tr.querySelector('th').textContent.includes('Luz libre (m)')) {
                            const cellIndex = td.cellIndex;
                            const input = document.createElement('input');
                            input.type = 'number';
                            input.step = 'any';
                            input.name = 'Luz_Libre' + (i + 1); // Asignar nombre único
                            input.placeholder = 'LL';
                            input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                            input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
                            td.appendChild(input);
                        } else if (tr.querySelector('th').textContent === 'Carga Muerta (Ton. m)') {
                            const input = document.createElement('input');
                            input.type = 'number';
                            input.step = 'any';
                            input.name = 'CMuerta' + (i + 1); // Asignar nombre único
                            input.placeholder = 'CM';
                            input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                            input.classList.add('form-control', 'form-control-sm'); // Agregar
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
                            td.appendChild(input);
                        } else if (tr.querySelector('th').textContent === 'Carga Viva (Ton. m)') {
                            const input = document.createElement('input');
                            input.type = 'number';
                            input.step = 'any';
                            input.name = 'Cviva' + (i + 1); // Asignar nombre único
                            input.placeholder = 'Cviva';
                            input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                            input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
                            td.appendChild(input);
                        } else if (tr.querySelector('th').textContent === 'Base (cm)') {
                            const input = document.createElement('input');
                            input.type = 'number';
                            input.step = 'any';
                            input.name = 'BASE' + (i + 1); // Asignar nombre único
                            input.placeholder = 'BASE';
                            input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                            input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
                            td.appendChild(input);
                        } else if (tr.querySelector('th').textContent === 'Altura (losa)(cm)') {
                            const input = document.createElement('input');
                            input.type = 'number';
                            input.step = 'any';
                            input.name = 'ALTURA' + (i + 1); // Asignar nombre único
                            input.placeholder = 'ALTURA';
                            input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                            input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
                            td.appendChild(input);
                        } else if (tr.querySelector('th').textContent === 'b (cm)') {
                            const input = document.createElement('input');
                            input.type = 'number';
                            input.step = 'any';
                            input.name = 'EVB' + (i + 1); // Asignar nombre único
                            input.placeholder = 'EVB';
                            input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                            input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
                            td.appendChild(input);
                        } else if (tr.querySelector('th').textContent === 'Mi (Tonf-m)') {
                            const input = document.createElement('input');
                            input.type = 'number';
                            input.step = 'any';
                            input.name = 'Mi' + (i + 1); // Asignar nombre único
                            input.placeholder = 'Mi';
                            input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                            input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
                            td.appendChild(input);
                        } else if (tr.querySelector('th').textContent === 'Md (Tonf-m)') {
                            const input = document.createElement('input');
                            input.type = 'number';
                            input.step = 'any';
                            input.name = 'Md' + (i + 1); // Asignar nombre único
                            input.placeholder = 'Md';
                            input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                            input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
                            td.appendChild(input);
                        } else if (tr.querySelector('th').textContent === 'δ1 (cm)') {
                            const input = document.createElement('input');
                            input.type = 'number';
                            input.step = 'any';
                            input.name = 'δ1' + (i + 1); // Asignar nombre único
                            input.placeholder = 'δ1';
                            input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                            input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
                            td.appendChild(input);
                        } else if (tr.querySelector('th').textContent === 'δ2 (cm)') {
                            const input = document.createElement('input');
                            input.type = 'number';
                            input.step = 'any';
                            input.name = 'δ2' + (i + 1); // Asignar nombre único
                            input.placeholder = 'δ2';
                            input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                            input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
                            td.appendChild(input);
                        } else if (tr.querySelector('th').textContent === 'δ3 (cm)') {
                            const input = document.createElement('input');
                            input.type = 'number';
                            input.step = 'any';
                            input.name = 'δ3' + (i + 1); // Asignar nombre único
                            input.placeholder = 'δ3';
                            input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                            input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
                            td.appendChild(input);
                        }
                        tr.appendChild(td);
                    }
                }
            });
        });
    </script>

    <!-- It listens a input event that creates tds next to each th brother which are inside a tr
It creates 3 inputs per num_tramos
name="EJE${columna}" 
name="MomentoUltimo-${columna}" name="Vu-${columna}" name="Tu-${columna}"
name="MomentoUltimo+${columna}" name="Vu+${columna}" name="Tu+${columna}" -->
    <script>
        document.getElementById('num_tramos').addEventListener('input', function() {
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
                        if (tr.querySelector('th').textContent === 'Eje') {
                            const input = document.createElement('input');
                            input.type = 'text';
                            input.name = 'EJE' + (i + 1); // Asignar nombre único
                            input.placeholder = 'EJE';
                            input.setAttribute('maxlength', '4'); // Limitar a 4 dígitos
                            input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño                        
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
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
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
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
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
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
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
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
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
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
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
                            input.style.minWidth = '50px'; // Establecer un ancho mínimo de 100px clase para reducir el tamaño
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
        document.getElementById('FlexionViga').addEventListener('submit', function(event) {
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

                    // Llamar select y asignar evento de escucha Change
                    SelectChange('A');
                    /* inputChange('A'); */
                    SelectChange('B');
                    /* inputChange('B'); */
                    CasosChange();
                })
                .catch(error => {
                    console.error('Error al enviar la solicitud Ajax', error);
                });
        });


        function SelectChange(group = 'A') {
            /* Selects generados */
            var aceroSelects = document.querySelectorAll(`.aceroSelect${group}`);
            /* Cantidad de columnas generados por el número de tramos */
            var cantidadElementos = aceroSelects.length;
            /* Llamamos a la función que ejecuta la primera fila de Asreal calculados para cada columna que existe*/
            for (let index = 1; index <= cantidadElementos; index++) {
                /* console.log("vez: " + index) */
                if (group == "A") {
                    resultadosAceroA1(index);
                } else {
                    resultadosAceroB1(index);
                }
            }

            /* Llamamos la función de calcular As real en cada cambio en los selects */
            aceroSelects.forEach(function(aceroSelect) {
                aceroSelect.addEventListener("change", function(e) {
                    // Capturamos valores del select; el select envía un value=x.yz;num_tramos ejem-> value=0.09;1                             
                    var values = this.value.split(";")
                    /* console.log(values) */

                    // Usamos el valor del data-column definido en el select para ver la columna
                    var selectedColumn = this.dataset.column;
                    /* console.log(selectedColumn) */
                    var columna = parseInt(selectedColumn)

                    /* Valor del input de la columna correspondiente */
                    /* var inputColum = document.getElementById(`aceroInput${group}${columna}`).value
                    console.log("Select en la columna " + selectedColumn + " cambió.");
                    console.log("Input en la columna " + selectedColumn + " es " + inputColum); */
                    if (group == "A") {
                        resultadosAceroA1(columna, parseFloat(values[0]), parseFloat(values[1]) /* , parseInt(inputColum) */ );
                    } else {
                        resultadosAceroB1(columna, parseFloat(values[0]), parseFloat(values[1]));
                    }
                })
            })
        }

        function inputChange(group = "A") {
            /* inputs generados */
            var aceroInputs = document.querySelectorAll(`.aceroInput${group}`);

            /* Llamamos la función de calcular As real en cada cambio en los selects */
            aceroInputs.forEach(function(aceroInput) {
                aceroInput.addEventListener("change", function(e) {
                    // Capturamos valores del select; el select envía un value=x.yz;num_tramos ejem-> value=0.09;1                             
                    var value = this.value
                    console.log("Input:" + value)

                    // Usamos el valor del data-column definido en el input para ver la columna
                    var selectedColumn = this.dataset.column;
                    console.log(selectedColumn)
                    var columna = parseInt(selectedColumn)

                    /* Valor del select de la columna correspondiente */
                    var selectColum = document.getElementById(`aceroSelect${group}${columna}`).value
                    // Capturamos valores del select; el select envía un value=x.yz;num_tramos ejem-> value=0.09;1                             
                    var values = selectColum.split(";")
                    console.log("Input en la columna " + selectedColumn + " cambió.");
                    console.log("Select values en la columna " + selectedColumn + " son " + values[0] + " y " + values[1]);

                    if (group == "A") {
                        resultadosAceroA1(columna, parseFloat(values[0]), parseFloat(values[1]), parseInt(value));
                    } else {
                        resultadosAceroB1(columna, parseFloat(values[0]), parseFloat(values[1]), parseInt(value));
                    }
                })
            })
        }

        function CasosChange() {
            /* inputs generados */
            var casosA = document.querySelectorAll(`.casosSelectA`);
            var cantidad = casosA.length
            for (let i = 1; i <= cantidad; i++) {
                resultadosCasos(i);
            }
            casosA.forEach(function(casoA) {
                casoA.addEventListener("change", function(e) {
                    // Capturamos valores del select; el select envía un value=x.yz;num_tramos ejem-> value=0.09;1                             
                    var value = this.value
                    /* console.log("Caso:" + value) */

                    // Usamos el valor del data-column definido en el input para ver la columna
                    var selectedColumn = this.dataset.column;
                    /* console.log(selectedColumn) */
                    var columna = parseInt(selectedColumn)

                    resultadosCasos(columna, parseFloat(value));

                })
            })

        }

        /* AceroA1 cálculos */
        function resultadosAceroA1(columna = 1, value = 0.28, num_tramos = 1, cantidad = 1) {
            var thResultadosA1 = document.getElementById(`resultadosAceroA1`);
            var tdsA1 = thResultadosA1.parentNode.children
            var thResultadosA2 = document.getElementById(`resultadosAceroA2`);
            var tdsA2 = thResultadosA2.parentNode.children
            var thResultadosA3 = document.getElementById(`resultadosAceroA3`);
            var tdsA3 = thResultadosA3.parentNode.children
            
            var tdA1 = tdsA1[columna+2];
            /* console.log(tdA1); */
            if (tdA1.textContent !== '') {
                /* console.log("Fila 1 columna " + columna + " " + tdA1); */
                tdA1.textContent = ''
            }
            var tdA2 = tdsA2[columna+2];
            /* console.log(tdA2); */
            if (tdA2.textContent !== '') {
                /* console.log("Fila 2 columna " + columna + " " + tdA2); */
                tdA2.textContent = ''
            }
            var tdA3 = tdsA3[columna+2];
            /* console.log(tdA3); */
            if (tdA3.textContent !== '') {
                /* console.log("Fila 3 columna " + columna + " " + tdA3); */
                tdA3.textContent = ''
            }

            //First tr
            var As_real = 0;
            As_real = parseFloat((value * 3) + (value * 0).toFixed(2));
            /* As_real = parseFloat((value * cantidad) + (value * 0).toFixed(2)); */
            /* console.log("primer valor:" + As_real) */

            //Second tr
            var fc = parseFloat(document.getElementById('fc').value)
            var fy = parseFloat(document.getElementById('fy').value)
            /* console.log("Fc: " + fc + " ;   Fy: " + fy) */
            var FR = 0.9;
            var B1 = 0.85;
            var filaPadre = Math.ceil(columna / 3);
            var altura = parseFloat(document.getElementsByName(`ALTURA${filaPadre}`)[0].value)
            /*  console.log("altura: " + altura) */
            var base = parseFloat(document.getElementsByName(`BASE${filaPadre}`)[0].value)
            /* console.log("Base: " + base) */
            var d = altura - 3;

            var mu_i = parseFloat(document.getElementsByName(`MomentoUltimo-${columna}`)[0].value)
            /* console.log("mu_i: " + mu_i) */
            var a = parseFloat((d - Math.sqrt(Math.pow(d, 2) - 2 * Math.abs(mu_i * Math.pow(10, 5)) / (0.9 * 0.85 * base))).toFixed(2))
            var As = parseFloat(((0.85 * fc * base * a) / fy).toFixed(2))
            var As_max = parseFloat((0.75 * (0.85 * B1 * fc / fy * (0.003 / (0.003 + 0.0021))) * base * d).toFixed(2))
            var As_min = Math.max(0.7 * Math.sqrt(fc) / fy * base * d, 14 * base * d / fy);
            var As_usar = "";
            if (As < As_min) {
                As_usar = As_min;
            } else {
                if (As > As_min || As < As_max) {
                    As_usar = As;
                } else {
                    As_usar = As_max;
                }
            }
            /* $aReal = 3.49; //$AR * $fy / (0.85 * $fc * $Bases); */
            var aReal = 3.49;
            var mn = parseFloat((0.9 * (0.85 * fc * base * aReal) * (d - aReal / 2) / 100000).toFixed(2))

            // Third tr
            var Verif = "";
            if (As_usar < As_max || As_max >= As_usar) {
                Verif = "CUMPLE";
            } else {
                Verif = "NO CUMPLE";
            }
            /* console.log("Verif: " + Verif) */

            // Add their values in each row inside its td
            tdA1.textContent = `${(As_real).toFixed(4)} cm²`;
            /* tdA2.textContent = mn1; */
            tdA2.textContent = `${mn} Tonf-m`;
            tdA3.textContent = Verif;

        }
        /* AceroA1 cálculos */
        function resultadosAceroB1(columna = 1, value = 0.28, num_tramos = 1, cantidad = 1) {
            var thResultadosB1 = document.getElementById(`resultadosAceroB1`);
            var tdsA1 = thResultadosB1.parentNode.children
            var thResultadosB2 = document.getElementById(`resultadosAceroB2`);
            var tdsA2 = thResultadosB2.parentNode.children
            var thResultadosB3 = document.getElementById(`resultadosAceroB3`);
            var tdsA3 = thResultadosB3.parentNode.children


            var tdA1 = tdsA1[columna+2];
            if (tdA1.textContent !== '') {
                tdA1.textContent = ''
            }
            var tdA2 = tdsA2[columna+2];
            if (tdA2.textContent !== '') {
                tdA2.textContent = ''
            }
            var tdA3 = tdsA3[columna+2];
            if (tdA3.textContent !== '') {
                tdA3.textContent = ''
            }

            //First tr
            var As_real1 = 0;
            As_real1 = parseFloat((value * 3) + (value * 0).toFixed(2));
            // As_real1 = parseFloat((value * cantidad) + (value * 0).toFixed(2));
            /* console.log("primer valor:" + As_real1) */

            //Second tr
            var fc = parseFloat(document.getElementById('fc').value)
            var fy = parseFloat(document.getElementById('fy').value)
            /* console.log("Fc: " + fc + " ;   Fy: " + fy) */

            var filaPadre = Math.ceil(columna / 3);
            var base = parseFloat(document.getElementsByName(`BASE${filaPadre}`)[0].value)
            /* console.log("Base: " + base) */
            var altura = parseFloat(document.getElementsByName(`ALTURA${filaPadre}`)[0].value)
            /* console.log("altura: " + altura) */

            var aReal1 = parseFloat((As_real1 * fy / (0.85 * fc * base)).toFixed(2));
            /* console.log("aReal1: " + aReal1) */
            var d1 = altura - 3;
            var mn1 = 0.90 * (0.85 * fc * base * aReal1) * (d1 - aReal1 / 2) / 100000;

            // Third tr
            var a1 = 1.39;
            var mu_i = parseFloat(document.getElementsByName(`MomentoUltimo-${columna}`)[0].value)
            /* console.log("mu_i: " + mu_i) */

            var mu_2 = parseFloat(document.getElementsByName(`MomentoUltimo+${columna}`)[0].value)
            var mu_dividido = parseFloat((Math.abs(mu_i / 3)).toFixed(2));
            /* console.log("mu_2: " + mu_2)
            console.log("mu_dividido: " + mu_dividido) */

            var mu_usar = 0;
            if (mu_2 > mu_dividido) {
                mu_usar = mu_2;
            } else {
                mu_usar = mu_dividido;
            }
            /* console.log("mu_usar: " + mu_usar) */

            a1 = parseFloat((d1 - Math.sqrt(Math.pow(d1, 2) - 2 * Math.abs(mu_usar * Math.pow(10, 5)) / (0.90 * 0.85 * fc * base))).toFixed(2))
            /* console.log("a1: " + a1) */

            var As1 = parseFloat(((0.85 * fc * base * a1) / fy).toFixed(2));
            /* console.log("As1: " + As1) */

            var β11 = 0.85;
            var As_max1 = parseFloat((0.75 * (0.85 * β11 * fc / fy * (0.003 / (0.003 + 0.0021))) * base * d1).toFixed(2));
            /* console.log("β11: " + β11)
            console.log("As_max1: " + As_max1) */

            var As_min1 = Math.max(0.7 * Math.sqrt(fc) / fy * base * d1, 14 * base * d1 / fy);
            /* console.log("As_min1: " + As_min1) */

            var As_usar1 = 0;
            if (As1 < As_min1) {
                As_usar1 = As_min1;
            } else {
                if (As1 > As_min1 || As1 < As_max1) {
                    As_usar1 = As1;
                } else {
                    As_usar1 = As_max1;
                }
            }
            /* console.log("As_usar1: " + As_usar1) */

            var Verif1 = "";
            if (As_usar1 < As_max1 || As_max1 >= As_usar1) {
                Verif1 = "CUMPLE";
            } else {
                Verif1 = "NO CUMPLE";
            }
            /* console.log("Verif1: " + Verif1) */

            // Add their values in each row inside its td
            tdA1.textContent = `${(As_real1).toFixed(4)} cm²`
            /* tdA2.textContent = mn1; */
            tdA2.textContent = `${(mn1).toFixed(4)} Tonf-m`;
            tdA3.textContent = Verif1;

        }

        /* Casos Calcular */
        function resultadosCasos(columna = 1, value = 0.5) {
            var thA = document.getElementById("casoResultA")
            var tdsA = thA.parentNode.children
            /* console.log(tdsA) */
            var thB = document.getElementById("casoResultB")
            var tdsB = thB.parentNode.children
            /* console.log(tdsB) */
            var thC = document.getElementById("casoResultC")
            var tdsC = thC.parentNode.children
            /* console.log(tdsC) */

            var tdA = tdsA[columna+2]
            /* console.log(tdA) */
            if (tdA.textContent !== '') {
                tdA.textContent = ''
            }
            var tdB = tdsB[columna+2]
            /* console.log(tdB) */
            if (tdB.textContent !== '') {
                tdB.textContent = ''
            }
            var tdC = tdsC[columna+2]
            /* console.log(tdC) */
            if (tdC.textContent !== '') {
                tdC.textContent = ''
            }

            // >Δ (cm)            
            var DefelxioncargaViva = parseFloat(document.getElementsByName(`δ2${Math.ceil(columna / 3)}`)[0].value)
            var DdiferidaCM = parseFloat((parseFloat(document.getElementById(`DdiferidaCM${columna}`).textContent)).toFixed(2));
            var DdiferidaCV = parseFloat((parseFloat(document.getElementById(`DdiferidaCV${columna}`).textContent)).toFixed(2));

            var DFA = 0;
            // Δmáx (cm)
            var Dfmaxa = 0;

            if (value == 0.5) {
                DFA = DefelxioncargaViva;
                Dfmaxa = 5.98 / 180 * 100;
            };
            if (value == 0.51) {
                DFA = DefelxioncargaViva;
                Dfmaxa = 5.98 / 360 * 100;;
            }
            if (value == 1.97) {
                DFA = DefelxioncargaViva + DdiferidaCM;
                Dfmaxa = 5.98 / 480 * 100;;
            }
            if (value == 2) {
                DFA = DefelxioncargaViva + DdiferidaCM + DdiferidaCV;
                Dfmaxa = 5.98 / 240 * 100;;
            }
            /* console.log(Dfmaxa) */

            // Verif
            var verf = ""
            if (DFA < Dfmaxa) {
                verf = "Cumple";
            } else {
                verf = "No Cumple";
            }

            /* console.log(Dfmaxa) */
            /* Results */
            tdA.textContent = `${DFA} cm`;
            tdB.textContent = `${Dfmaxa} cm`;
            tdC.textContent = verf;


        }
    </script>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-warning">
                        <!-- <div class="card-header">
                            <h3 class="card-title">RESULTADOS <small></small></h3>
                        </div> -->
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
        function scrollTable(direction) {
            const tableContainer = document.querySelector('.tableContainer');
            const table = tableContainer.querySelector('table');
            const scrollStep = 100; // Ajusta este valor según la cantidad de desplazamiento deseado

            if (direction === 'left') {
                table.scrollLeft -= scrollStep;
            } else if (direction === 'right') {
                table.scrollLeft += scrollStep;
            }
        }

        const scrollLeftArea = document.querySelector('.scrollLeftArea');
        const scrollRightArea = document.querySelector('.scrollRightArea');

        scrollLeftArea.addEventListener('click', () => scrollTable('left'));
        scrollRightArea.addEventListener('click', () => scrollTable('right'));
        /* (function() {
            ("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        }); */
    </script>
</div>
<?php
include_once "assets/views/footer.php";
/* } else {
    header('Location: ../login.php');
} */
?>