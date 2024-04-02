$(document).ready(function () {
    var data = [
        [0, 0, 0, 0, ''], // Asegúrate de que la columna DRIFT tenga valores predeterminados vacíos
        [0, 0, 0, 0, ''],
        [0, 0, 0, 0, ''],
        [0, 0, 0, 0, ''],
    ];

    var container = document.getElementById('DesLateralx');
    var hot = new Handsontable(container, {
        data: data,
        rowHeaders: true,
        colHeaders: true,
        contextMenu: true,
        colWidths: 60,
        nestedHeaders: [
            ['TECHO', 'COMBINACION', 'DIRECCION', 'DRIFT', 'VERIFICACION']
        ],
        collapsibleColumns: [{
            row: -1,
            col: 1,
            collapsible: false
        },],
        licenseKey: 'non-commercial-and-evaluation'
    });

    hot.addHook('afterChange', function (changes, source) {
        if (source === 'edit') {
            changes.forEach(function (change) {
                var row = change[0];
                var col = change[1];
                var oldValue = change[2];
                var newValue = change[3];

                // Verifica si la columna modificada es DRIFT (índice 3)
                if (col === 3) {
                    var driftValue = hot.getDataAtCell(row, col);

                    // Si el valor de DRIFT es menor que el límite deseado
                    const limiteEntrepiso = parseFloat(document.getElementById('limDE').value);
                    if (driftValue < limiteEntrepiso) {
                        hot.setDataAtCell(row, 4, 'CUMPLE');
                    } else {
                        hot.setDataAtCell(row, 4, 'NO CUMPLE');
                    }
                }
            });
        }
    });

    // Captura el formulario
    const form = document.getElementById('irregularidadesDat');
    const dataFromHandsontable = document.querySelector('#dataDesplaX');

    // Agrega un manejador de eventos para el envío del formulario
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        // Obtén los datos de Handsontable y conviértelos a JSON
        const tableData = hot.getData();
        const jsonData = JSON.stringify(tableData);

        dataFromHandsontable.value = jsonData;
        const formData = new FormData(form);

        // Envía los datos mediante una solicitud POST AJAX
        fetch('Controladores/Dzapata.php', {
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
$(document).ready(function () {
    var data = [
        [0, 0, 0, 0, ''], // Asegúrate de que la columna DRIFT tenga valores predeterminados vacíos
        [0, 0, 0, 0, ''],
        [0, 0, 0, 0, ''],
        [0, 0, 0, 0, ''],
    ];

    var container = document.getElementById('DesLateraly');
    var hot = new Handsontable(container, {
        data: data,
        rowHeaders: true,
        colHeaders: true,
        contextMenu: true,
        colWidths: 60,
        nestedHeaders: [
            ['TECHO', 'COMBINACION', 'DIRECCION', 'DRIFT', 'VERIFICACION']
        ],
        collapsibleColumns: [{
            row: -1,
            col: 1,
            collapsible: false
        },],
        licenseKey: 'non-commercial-and-evaluation'
    });

    hot.addHook('afterChange', function (changes, source) {
        if (source === 'edit') {
            changes.forEach(function (change) {
                var row = change[0];
                var col = change[1];
                var oldValue = change[2];
                var newValue = change[3];

                // Verifica si la columna modificada es DRIFT (índice 3)
                if (col === 3) {
                    var driftValue = hot.getDataAtCell(row, col);

                    // Si el valor de DRIFT es menor que el límite deseado
                    const limiteEntrepiso = parseFloat(document.getElementById('limDE').value);
                    if (driftValue < limiteEntrepiso) {
                        hot.setDataAtCell(row, 4, 'CUMPLE');
                    } else {
                        hot.setDataAtCell(row, 4, 'NO CUMPLE');
                    }
                }
            });
        }
    });

    // Captura el formulario
    const form = document.getElementById('irregularidadesDat');
    const dataFromHandsontable = document.querySelector('#dataDesplay');

    // Agrega un manejador de eventos para el envío del formulario
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        // Obtén los datos de Handsontable y conviértelos a JSON
        const tableData = hot.getData();
        const jsonData = JSON.stringify(tableData);

        dataFromHandsontable.value = jsonData;
        const formData = new FormData(form);

        // Envía los datos mediante una solicitud POST AJAX
        fetch('Controladores/Dzapata.php', {
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
//----------------------------------------------------------------
$(document).ready(function () {
    var data = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // Asegúrate de que la columna DRIFT tenga valores predeterminados vacíos
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    ];

    var container = document.getElementById('SESD');
    var hot = new Handsontable(container, {
        data: data,
        rowHeaders: true,
        colHeaders: true,
        contextMenu: true,
        colWidths: 50,
        nestedHeaders: [
            ['CASE', 'MODE', 'PERIODO SEC', 'UX(%Masa)', 'UY(%Masa)', 'UZ', 'SumUX(% Acum)', 'SumUy(% Acum)', 'SumUz', 'RX', 'RY', 'RZ(% Masa)', 'SumRX', 'SumRY', 'SumRZ']
        ],
        collapsibleColumns: [{
            row: -1,
            col: 1,
            collapsible: false
        },],
        licenseKey: 'non-commercial-and-evaluation'
    });

    // Captura el formulario
    const form = document.getElementById('irregularidadesDat');
    const dataFromHandsontable = document.querySelector('#resultAnalisis');

    // Agrega un manejador de eventos para el envío del formulario
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        // Obtén los datos de Handsontable y conviértelos a JSON
        const tableData = hot.getData();
        const jsonData = JSON.stringify(tableData);

        dataFromHandsontable.value = jsonData;
        const formData = new FormData(form);

        // Envía los datos mediante una solicitud POST AJAX
        fetch('Controladores/Dzapata.php', {
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
//----------------------------------------------------------------
$(document).ready(function () {
    // Configuración de Handsontable para la primera tabla
    var dataX = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // Asegúrate de que la columna DRIFT tenga valores predeterminados vacíos
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    ];

    var containerX = document.getElementById('fuerCortPlacasSe_X');
    var hotX = new Handsontable(containerX, {
        data: dataX,
        rowHeaders: true,
        colHeaders: true,
        contextMenu: true,
        colWidths: 50,
        nestedHeaders: [
            ['Story', 'Pier', 'Output Case', 'Case Type', 'Step Type', 'Location', 'P kgf', 'V2 kgf', 'V3 kgf', 'T kgf-m', 'M2 kgf-m', 'M3 kgf-m']
        ],
        collapsibleColumns: [{
            row: -1,
            col: 1,
            collapsible: false
        },],
        licenseKey: 'non-commercial-and-evaluation'
    });

    // Configuración de Handsontable para la segunda tabla
    var dataY = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // Asegúrate de que la columna DRIFT tenga valores predeterminados vacíos
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    ];

    var containerY = document.getElementById('fuerCortPlacasSe_y');
    var hotY = new Handsontable(containerY, {
        data: dataY,
        rowHeaders: true,
        colHeaders: true,
        contextMenu: true,
        colWidths: 50,
        nestedHeaders: [
            ['Story', 'Pier', 'Output Case', 'Case Type', 'Step Type', 'Location', 'P kgf', 'V2 kgf', 'V3 kgf', 'T kgf-m', 'M2 kgf-m', 'M3 kgf-m']
        ],
        collapsibleColumns: [{
            row: -1,
            col: 1,
            collapsible: false
        },],
        licenseKey: 'non-commercial-and-evaluation'
    });

    // Configuración de Handsontable para la Tercera tabla
    var dataSDX = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // Asegúrate de que la columna DRIFT tenga valores predeterminados vacíos
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    ];

    var containerSDX = document.getElementById('fuerCortpSDX');
    var hotSDX = new Handsontable(containerSDX, {
        data: dataSDX,
        rowHeaders: true,
        colHeaders: true,
        contextMenu: true,
        colWidths: 50,
        nestedHeaders: [
            ['Story', 'Pier', 'Output Case', 'Case Type', 'Step Type', 'Location', 'P kgf', 'V2 kgf', 'V3 kgf', 'T kgf-m', 'M2 kgf-m', 'M3 kgf-m']
        ],
        collapsibleColumns: [{
            row: -1,
            col: 1,
            collapsible: false
        },],
        licenseKey: 'non-commercial-and-evaluation'
    });

    // Configuración de Handsontable para la cuarta tabla
    var dataSDY = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // Asegúrate de que la columna DRIFT tenga valores predeterminados vacíos
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    ];

    var containerSDY = document.getElementById('fuerCortpSDY');
    var hotSDY = new Handsontable(containerSDY, {
        data: dataSDY,
        rowHeaders: true,
        colHeaders: true,
        contextMenu: true,
        colWidths: 50,
        nestedHeaders: [
            ['Story', 'Pier', 'Output Case', 'Case Type', 'Step Type', 'Location', 'P kgf', 'V2 kgf', 'V3 kgf', 'T kgf-m', 'M2 kgf-m', 'M3 kgf-m']
        ],
        collapsibleColumns: [{
            row: -1,
            col: 1,
            collapsible: false
        },],
        licenseKey: 'non-commercial-and-evaluation'
    });
    // Configuración de Handsontable para la quinta tabla
    var datatR = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    ];

    var containerTR = document.getElementById('tableBaseReactions');
    var hotTR = new Handsontable(containerTR, {
        data: datatR,
        rowHeaders: true,
        colHeaders: true,
        contextMenu: true,
        colWidths: 50,
        nestedHeaders: [
            ['Output Case', 'Case Type', 'Step Type', 'FX kgf', 'FY kgf', 'FZ kgf', 'MX kgf-m', 'MY kgf-m', 'FZ kgf-m', 'X m', 'Y M', 'Z']
        ],
        collapsibleColumns: [{
            row: -1,
            col: 1,
            collapsible: false
        },],
        licenseKey: 'non-commercial-and-evaluation'
    });

    // Configuración de Handsontable para la sexta tabla
    var dataCFP = [
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0], // Asegúrate de que la columna DRIFT tenga valores predeterminados vacíos
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    ];

    var containerCFP = document.getElementById('cortFinPlanos');
    var hotCFP = new Handsontable(containerCFP, {
        data: dataCFP,
        rowHeaders: true,
        colHeaders: true,
        contextMenu: true,
        colWidths: 50,
        nestedHeaders: [
            ['Output Case', 'Case Type', 'Step Type', 'FX kgf', 'FY kgf', 'FZ kgf', 'MX kgf-m', 'MY kgf-m', 'FZ kgf-m', 'X m', 'Y M', 'Z']
        ],
        collapsibleColumns: [{
            row: -1,
            col: 1,
            collapsible: false
        },],
        licenseKey: 'non-commercial-and-evaluation'
    });
    // Captura el formulario y configura la solicitud AJAX para ambas tablas
    $('.tabla').each(function () {
        var hot = $(this).handsontable('getInstance');
        var form = $(this).closest('form')[0];
        var dataFromHandsontable = $(form).find('.resultData')[0];

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            // Obtén los datos de Handsontable y conviértelos a JSON
            const tableData = hot.getData();
            const jsonData = JSON.stringify(tableData);

            dataFromHandsontable.value = jsonData;
            const formData = new FormData(form);

            // Envía los datos mediante una solicitud POST AJAX
            fetch('Controladores/Dzapata.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    const resultadosContainer = $(form).find('.ObtenerResultados')[0];
                    resultadosContainer.innerHTML = data;
                })
                .catch(error => {
                    console.error('Error al enviar la solicitud Ajax', error);
                });
        });
    });
});

