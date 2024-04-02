$(document).ready(function () {
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
                        input.type = 'text';
                        input.step = 'any';
                        input.name = 'Luz_Libre' + (i + 1); // Asignar nombre único
                        input.placeholder = 'LL';
                        input.setAttribute('maxlength', '6'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                    }
                    tr.appendChild(td);
                }
            }
        });
    });

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
                        input.setAttribute('maxlength', '6'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                    } else if (tr.querySelector('th').textContent === 'BASE (m)') {
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.step = 'any';
                        input.name = 'BASE' + (i + 1); // Asignar nombre único
                        input.placeholder = 'BASE';
                        input.setAttribute('maxlength', '6'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                    } else if (tr.querySelector('th').textContent === 'ALTURA (m)') {
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.step = 'any';
                        input.name = 'ALTURA' + (i + 1); // Asignar nombre único
                        input.placeholder = 'ALTURA';
                        input.setAttribute('maxlength', '6'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                    } else if (tr.querySelector('th').textContent.includes('MU (TN-M)-')) {
                        // Agregar input de tipo número en la fila "MU (TN-M)"
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.step = 'any';
                        input.name = 'MomentoUltimo-' + (i + 1); // Asignar nombre único
                        input.placeholder = 'MomentoUltimo-';
                        input.setAttribute('maxlength', '10'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                    } else if (tr.querySelector('th').textContent.includes('MU (TN-M)+')) {
                        // Agregar input de tipo número en la fila "MU (TN-M)"
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.step = 'any';
                        input.name = 'MomentoUltimo+' + (i + 1); // Asignar nombre único
                        input.placeholder = 'MomentoUltimo+';
                        input.setAttribute('maxlength', '10'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                    } else if (tr.querySelector('th').textContent.includes('Vu (TNF)-')) {
                        // Agregar input de tipo número en la fila "MU (TN-M)"
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.step = 'any';
                        input.name = 'Vu-' + (i + 1); // Asignar nombre único
                        input.placeholder = 'Vu-';
                        input.setAttribute('maxlength', '10'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                    } else if (tr.querySelector('th').textContent.includes('Vu (TNF)+')) {
                        // Agregar input de tipo número en la fila "MU (TN-M)"
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.step = 'any';
                        input.name = 'Vu+' + (i + 1); // Asignar nombre único
                        input.placeholder = 'Vu+';
                        input.setAttribute('maxlength', '10'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                    } else if (tr.querySelector('th').textContent.includes('Tu (TNF)-')) {
                        // Agregar input de tipo número en la fila "MU (TN-M)"
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.step = 'any';
                        input.name = 'Tu-' + (i + 1); // Asignar nombre único
                        input.placeholder = 'Tu-';
                        input.setAttribute('maxlength', '10'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                    } else if (tr.querySelector('th').textContent.includes('Tu (TNF)+')) {
                        // Agregar input de tipo número en la fila "MU (TN-M)"
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.step = 'any';
                        input.name = 'Tu+' + (i + 1); // Asignar nombre único
                        input.placeholder = 'Tu+';
                        input.setAttribute('maxlength', '10'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                    } else if (tr.querySelector('th').textContent.includes('M(CV)(tn.m)+')) {
                        // Agregar input de tipo número en la fila "MU (TN-M)"
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.step = 'any';
                        input.name = 'MuCV+' + (i + 1); // Asignar nombre único
                        input.placeholder = 'MCV+';
                        input.setAttribute('maxlength', '10'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                    } else if (tr.querySelector('th').textContent.includes('M(CV)(tn.m)-')) {
                        // Agregar input de tipo número en la fila "MU (TN-M)"
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.step = 'any';
                        input.name = 'MuCV-' + (i + 1); // Asignar nombre único
                        input.placeholder = 'MCV-';
                        input.setAttribute('maxlength', '10'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                    } else if (tr.querySelector('th').textContent.includes('M(CM)(tn.m)+')) {
                        // Agregar input de tipo número en la fila "MU (TN-M)"
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.step = 'any';
                        input.name = 'MuCM+' + (i + 1); // Asignar nombre único
                        input.placeholder = 'MCM+';
                        input.setAttribute('maxlength', '10'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                    } else if (tr.querySelector('th').textContent.includes('M(CM)(tn.m)-')) {
                        // Agregar input de tipo número en la fila "MU (TN-M)"
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.step = 'any';
                        input.name = 'MuCM-' + (i + 1); // Asignar nombre único
                        input.placeholder = 'MCM-';
                        input.setAttribute('maxlength', '10'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                    } else if (tr.querySelector('th').textContent.includes('N° CAPAS-')) {
                        // Agregar input de tipo número en las filas "N° CAPAS"
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.name = 'CAPAS-' + (i + 1); // Asignar nombre único
                        input.id = 'CAPAS-' + (i + 1);
                        input.placeholder = 'CAPAS-';
                        input.setAttribute('maxlength', '6'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                        const idCapasNegativo = input.id;
                    } else if (tr.querySelector('th').textContent.includes('N° CAPAS+')) {
                        // Agregar input de tipo número en las filas "N° CAPAS" y "ACERO" "|| tr.querySelector('th').textContent.includes('ACERO')"
                        const input = document.createElement('input');
                        input.type = 'text';
                        input.name = 'CAPAS+' + (i + 1); // Asignar nombre único
                        input.id = 'CAPAS+' + (i + 1);
                        input.placeholder = 'CAPAS+';
                        input.setAttribute('maxlength', '6'); // Limitar a 4 dígitos
                        input.style.width = '15ch'; // Establecer el ancho para acomodar 6 números
                        input.classList.add('form-control', 'form-control-sm'); // Agregar clase para reducir el tamaño
                        td.appendChild(input);
                        idPositivo = input.id;
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

    $('#accionButton').click(e => {
        e.preventDefault(); // Prevenir el comportamiento predeterminado del botón
        //variables generales
        const fc = document.getElementById('fc').value;
        const fy = document.getElementById('fy').value;
        const tramos = document.getElementById('num_tramos').value;
        //tramos unitarios
        const luzLibres = [];
        for (let i = 1; i <= tramos; i++) {
            const luzLibreValue = document.querySelector(`input[name="Luz_Libre${i}"]`).value;
            luzLibres.push(parseFloat(luzLibreValue));
        }
        //variables con tramos multiplciados por 3
        // Inicializar arrays para almacenar los valores capturados negativos
        const bases = [];
        const alturas = [];
        const momentosUltimos = [];
        const vus = [];
        const tus = [];
        const muCMs = [];
        const muCvs = [];
        const capasnegativas = [];
        // Capturar los valores de los inputs
        for (let i = 1; i <= tramos * 3; i++) {
            const baseValue = document.querySelector(`input[name="BASE${i}"]`).value;
            bases.push(parseFloat(baseValue));

            const alturaValue = document.querySelector(`input[name="ALTURA${i}"]`).value;
            alturas.push(parseFloat(alturaValue));

            const momentoUltimoValue = document.querySelector(`input[name="MomentoUltimo-${i}"]`).value;
            momentosUltimos.push(parseFloat(momentoUltimoValue));

            const vuValue = document.querySelector(`input[name="Vu-${i}"]`).value;
            vus.push(parseFloat(vuValue));

            const tuValue = document.querySelector(`input[name="Tu-${i}"]`).value;
            tus.push(parseFloat(tuValue));

            const muCMValue = document.querySelector(`input[name="MuCM-${i}"]`).value;
            muCMs.push(parseFloat(muCMValue));

            const muCvValue = document.querySelector(`input[name="MuCV-${i}"]`).value;
            muCvs.push(parseFloat(muCvValue));

            const capaneg = document.querySelector(`input[name="CAPAS-${i}"]`).value;
            capasnegativas.push(parseFloat(capaneg));
        }

        // Inicializar arrays para almacenar los valores capturados positivos
        const momentosUltimosPositivos = [];
        const vusPositivos = [];
        const tusPositivos = [];
        const muCMsPositivos = [];
        const muCvsPositivos = [];
        const capapositivos = []; // Declarar como array
        // Capturar los valores de los inputs que contienen un "+" en su nombre
        for (let i = 1; i <= tramos * 3; i++) {
            const muCMValue = document.querySelector(`input[name="MuCM+${i}"]`).value;
            muCMsPositivos.push(parseFloat(muCMValue));

            const muCvValue = document.querySelector(`input[name="MuCV+${i}"]`).value;
            muCvsPositivos.push(parseFloat(muCvValue));

            const momentoUltimoValue = document.querySelector(`input[name="MomentoUltimo+${i}"]`).value;
            momentosUltimosPositivos.push(parseFloat(momentoUltimoValue));

            const vuValue = document.querySelector(`input[name="Vu+${i}"]`).value;
            vusPositivos.push(parseFloat(vuValue));

            const tuValue = document.querySelector(`input[name="Tu+${i}"]`).value;
            tusPositivos.push(parseFloat(tuValue));

            const capapo = document.querySelector(`input[name="CAPAS+${i}"]`).value;
            capapositivos.push(parseFloat(capapo));

        }

        //================================================================================//
        //                            encabezados                                         //
        //================================================================================//
        const num_columnas = tramos * 3;

        // Array para almacenar las etiquetas <th>
        let etiquetasTH = [];
        // Generar las etiquetas <th> según el número de columnas
        for (let i = 0; i < num_columnas; i++) {
            // Determinar la etiqueta para cada columna (START, MIDDLE, END)
            let etiqueta = "";
            switch (i % 3) {
                case 0:
                    etiqueta = "START";
                    break;
                case 1:
                    etiqueta = "MIDDLE";
                    break;
                case 2:
                    etiqueta = "END";
                    break;
            }
            // Agregar la etiqueta en una columna <th>
            etiquetasTH.push(`<th class='text-center' scope='col'>${etiqueta}</th>`);
        }
        // Combinar las etiquetas en una cadena
        let etiquetasTHString = etiquetasTH.join('');

        //================================================================================//
        //                 Primera Tabla - Requisitos Entradas                            //
        //              Calcular el número total de columnas requeridas                   //
        //================================================================================//


        //datos generales
        let efas = [];
        let eccs = [];
        let baseados = [];
        let altituds = [];
        let parfres = [];
        let defultcs = [];
        let deffluacers = [];
        let facredfs = [];

        // Generas las respuestas para cada conjunto de datos
        for (let i = 0; i < num_columnas; i++) {
            efas.push(fy);
            eccs.push(fc);
            baseados.push(bases[i]);
            altituds.push(alturas[i]);

            let parfre = 0;
            if (fc <= 280) {
                parfre = 0.85;
            } else if (fc > 280 && fc <= 560) {
                parfre = 1.05 - 0.714 * fc / 1000;
            } else {
                parfre = 0.65;
            }
            parfres.push(parfre);

            defultcs.push(0.003);
            deffluacers.push(0.0021);
            facredfs.push(0.90);
        }
        //================================================================================//
        //            Segunda Tabla - Diseño por Flexion Positivo Negativo                //
        //              Calcular el número total de columnas requeridas                   //
        //================================================================================//
        let ds = [];
        let mus = [];
        let Ass = [];
        let As_mins = [];
        let As_balanceados = [];
        let As_maxs = [];
        let As_usars = [];
        let als = [];
        //negativo
        let d = 0;
        var FR = 0.90;

        for (let i = 0; i < tramos * 3; i++) {
            //peralte efectivo
            switch (capasnegativas[i]) {
                case 1:
                    d = alturas[i] - 6;
                    break;
                case 2:
                    d = alturas[i] - 8;
                    break;
                case 3:
                    d = alturas[i] - 10;
                    break;
                case 4:
                    d = alturas[i] - 12;
                    break;
                case 5:
                    d = alturas[i] - 14;
                    break;
                case 6:
                    d = alturas[i] - 16;
                    break;
                default:
                    d = alturas[i];
            }
            ds.push(d);
            //altura del bloque
            var a = (d - Math.sqrt(Math.pow(d, 2) - 2 * Math.abs(momentosUltimos[i] * Math.pow(10, 5)) / (0.90 * 0.85 * fc * bases[i]))).toFixed(2);
            als.push(a);
            //refuerzo calculado
            var As = ((0.85 * fc * bases[i] * a) / fy).toFixed(2);
            Ass.push(As);
            //refuerzo minimo
            var As_min = (Math.max(0.7 * Math.sqrt(fc) / fy * bases[i] * d, 14 * bases[i] * d / fy)).toFixed(2);
            As_mins.push(As_min);
            //as balanceado
            var As_bal = (((0.85 * parfres[i] * fc / fy * (0.003 / (0.003 + 0.0021))) * bases[i] * d)).toFixed(2);
            As_balanceados.push(As_bal);
            //refuero maximo As Max
            var As_max = (0.75 * (0.85 * parfres[i] * fc / fy * (0.003 / (0.003 + 0.0021))) * bases[i] * d).toFixed(2);
            As_maxs.push(As_max);
            //As Usar

            let As_usar = 0;
            if (parseFloat(As) < parseFloat(As_min)) {
                As_usar = parseFloat(As_min);
            } else if (parseFloat(As) > parseFloat(As_min) && parseFloat(As) < parseFloat(As_max)) {
                As_usar = parseFloat(As);
            } else {
                As_usar = parseFloat(As_max);
            }
            As_usars.push(As_usar)

            // console.log(As);
            // console.log(As_min);
            // console.log(As_usar);
        }

        let template = `
        <table class="table table-hover"  id="vigaspdf">
            <thead>
                <tr class="sub_encabezados">
                    <th scope="col" class="tab_encabezados">1.- Requisitos de diseño</th>
                    <th scope="col"></th>
                    ${etiquetasTHString} 
                </tr>
            </thead>
            <tbody class="datos_relleno">
                <tr>
                    <td>Esfuerzo de fluencia del acero</td>
                    <td>fy</td>
                    ${efas.map(efa => `<td class='text-center'>${efa} kg/cm<sup>2</sup></td>`).join('')}
                </tr>
                <tr>
                    <td>Esfuerzo de comprension del concreto</td>
                    <td>f'c</td>
                    ${eccs.map(ecc => `<td class='text-center'>${ecc} kg/cm<sup>2</sup></td>`).join('')}
                </tr>
                <tr>
                    <td>Base de la Viga</td>
                    <td>b</td>
                    ${baseados.map(bas => `<td class='text-center'>${bas} cm</td>`).join('')}
                </tr>
                <tr>
                    <td>Altura de la Viga</td>
                    <td>h</td>
                    ${altituds.map(alt => `<td class='text-center'>${alt} cm</td>`).join('')}
                </tr>
                <tr>
                    <td>Parámetro en función de la resistencia del concreto</td>
                    <td>β1</td>
                    ${parfres.map(parfre => `<td class='text-center'>${parfre}</td>`).join('')}
                </tr>
                <tr>
                    <td>Deformación última del concreto</td>
                    <td>εcu</td>
                    ${defultcs.map(defultc => `<td class='text-center'>${defultc}</td>`).join('')}
                </tr>
                <tr>
                    <td>Deformación de fluencia del acero</td>
                    <td>εy</td>
                    ${deffluacers.map(deffluacer => `<td class='text-center'>${deffluacer}</td>`).join('')}
                </tr>
                <tr>
                    <td>Factor de reducción a flexión sin carga axial</td>
                    <td>Ф</td>
                    ${facredfs.map(facredf => `<td class='text-center'>${facredf}</td>`).join('')}
                </tr>
            </tbody> 

            <thead>
                <tr class="sub_encabezados">
                    <th scope="col" class="tab_encabezados">2.- Diseño de flexion</th>
                    <th scope="col"></th>
                    ${etiquetasTHString}
                </tr>
                <tr>
                    <th scope="col" class="sub_sub_encabezados">Parte negativo</th>
                </tr>
            </thead>
            <tbody class="datos_relleno">
                <tr>
                    <td>Peralte efectivo en "cm"</td>
                    <td>d</td>
                    ${ds.map(d => `<td class='text-center'>${d} cm</td>`).join('')}
                </tr>
                <tr>
                    <td>Altura del bloque comprimido en "cm"</td>
                    <td>a</td>
                    ${als.map(a => `<td class='text-center'>${a} cm</td>`).join('')}
                </tr>
                <tr>
                    <td>Refuerzo calculado en "cm2"</td>
                    <td>As</td>
                    ${Ass.map(As => `<td class='text-center'>${As} cm<sup>2</sup></td>`).join('')}
                </tr>
                <tr>
                    <td>Refuerzo mínimo en "cm2"</td>
                    <td>As_min</td>
                    ${As_mins.map(As_min => `<td class='text-center'>${As_min} cm<sup>2</sup></td>`).join('')}
                </tr>
                <tr>
                    <td>Area de acero balanceado</td>
                    <td>As Balanceado</td>
                    ${As_balanceados.map(As_bal => `<td class='text-center'>${As_bal} cm<sup>2</sup></td>`).join('')}
                </tr>
                <tr>
                    <td>Refuerzo máximo en "cm2"</td>
                    <td>As_máx 75%Asb</td>
                    ${As_maxs.map(As_max => `<td class='text-center'>${As_max}cm<sup>2</sup></td>`).join('')}
                </tr>
                <tr>
                    <td>Acero a Usar</td>
                    <td>As_usar</td>
                    ${As_usars.map(As_usar => `<td class='text-center'>${As_usar}cm<sup>2<sup></td>`).join('')}
                </tr>`;
        ///////////////////////////////////////
        //      verificacion negativas       //
        //////////////////////////////////////

        // Crear filas para botones, inputs y selects para cada tramo
        let trBotones = document.createElement('tr');
        // Crear los botones para cada tramo
        let tdBoton = document.createElement('td');
        let boton = document.createElement('button');
        boton.type = 'button';
        boton.className = 'btn btn-sm btn-primary';
        boton.textContent = 'VERIFICAR';
        boton.name = 'boton_verf';
        boton.id = 'boton_verf';
        tdBoton.appendChild(boton);
        trBotones.appendChild(tdBoton);
        // Agregar la fila de botones al template
        template += trBotones.outerHTML;
        // Encontrar el valor máximo en el array capasnegativas
        const valorMaximo = Math.max(...capasnegativas);

        for (let i = 0; i < valorMaximo; i++) {
            // Crear la fila para los selects
            let trSelect = document.createElement('tr');

            // Agregar la etiqueta "Tipo de Acero"
            let tdTipoAcero = document.createElement('td');
            tdTipoAcero.textContent = 'Tipo de Acero mm';
            trSelect.appendChild(tdTipoAcero);

            // Agregar la etiqueta "Diámetro mm"
            let tdDiametro = document.createElement('td');
            tdDiametro.textContent = `Capa ${i + 1}`;
            trSelect.appendChild(tdDiametro);

            // Crear los selects para cada tramo
            for (let j = 0; j < tramos * 3; j++) {
                // Crear un nuevo select
                let select = document.createElement('select');
                select.className = 'form-control form-control-sm';
                select.name = `tipoAcero${j}_capa${i}`;
                select.id = `tipoAcero${j}_capa${i}`;
                // Definir las opciones del select
                let opciones = [
                    { value: '0', text: 'Ø 0"' },
                    { value: '0.283', text: '6mm' },
                    { value: '0.503', text: '8mm cm²' },
                    { value: '0.713', text: 'Ø 3/8" cm²' },
                    { value: '1.131', text: '12mm cm²' },
                    { value: '1.267', text: 'Ø 1/2" cm²' },
                    { value: '1.979', text: 'Ø 5/8" cm²' },
                    { value: '2.850', text: 'Ø 3/4" cm²' },
                    { value: '5.067', text: 'Ø 1" cm²' },
                    { value: '2.58', text: '2Ø1/2"' },
                    { value: '3.87', text: '3Ø1/2"' },
                    { value: '3.98', text: '2Ø5/8"' },
                    { value: '5.16', text: '4Ø1/2"' },
                    { value: '5.27', text: '2Ø5/8"+1Ø1/2"' },
                    { value: '5.68', text: '2Ø3/4"' },
                    { value: '5.97', text: '3Ø5/8"' },
                    { value: '6.45', text: '5Ø1/2"' },
                    { value: '6.56', text: '2Ø5/8"+2Ø1/2"' },
                    { value: '6.97', text: '2Ø3/4"+1Ø1/2"' },
                    { value: '7.67', text: '2Ø3/4"+1Ø5/8"' },
                    { value: '7.74', text: '6Ø1/2"' },
                    { value: '7.85', text: '2Ø5/8"+3Ø1/2"' },
                    { value: '7.96', text: '4Ø5/8"' },
                    { value: '8.26', text: '2Ø3/4"+2Ø1/2"' },
                    { value: '8.52', text: '3Ø3/4"' },
                    { value: '8.55', text: '3Ø5/8"+2Ø1/2"' },
                    { value: '9.55', text: '2Ø3/4"+3Ø1/2"' },
                    { value: '9.95', text: '5Ø5/8"' },
                    { value: '9.66', text: '2Ø3/4"+2Ø5/8"' },
                    { value: '10.2', text: '2Ø1"' },
                    { value: '10.54', text: '4Ø5/8"+2Ø1/2"' },
                    { value: '10.84', text: '2Ø3/4"+4Ø1/2"' },
                    { value: '11.1', text: '3Ø3/4"+2Ø1/2"' },
                    { value: '11.40', text: '4Ø3/4"' },
                    { value: '11.65', text: '2Ø3/4"+3Ø5/8"' },
                    { value: '11.94', text: '6Ø5/8"' },
                    { value: '12.19', text: '2Ø1"+1Ø5/8"' },
                    { value: '12.5', text: '3Ø3/4"+2Ø5/8"' },
                    { value: '13.04', text: '2Ø1"+1Ø3/4"' },
                    { value: '13.64', text: '2Ø3/4"+4Ø5/8"' },
                    { value: '13.94', text: '4Ø3/4"+2Ø1/2"' },
                    { value: '14.18', text: '2Ø1"+2Ø5/8"' },
                    { value: '14.2', text: '5Ø3/4"' },
                    { value: '15.3', text: '3Ø1"' },
                    { value: '15.34', text: '4Ø3/4"+2Ø5/8"' },
                    { value: '15.88', text: '2Ø1"+2Ø3/4"' },
                    { value: '16.17', text: '2Ø1"+3Ø5/8"' },
                    { value: '17.04', text: '6Ø3/4"' },
                    { value: '18.16', text: '2Ø1"+4Ø5/8"' },
                    { value: '18.72', text: '2Ø1"+3Ø3/4"' },
                    { value: '19.28', text: '3Ø1"+2Ø5/8"' },
                    { value: '20.4', text: '4Ø1"' },
                    { value: '20.98', text: '3Ø1"+2Ø3/4"' },
                    { value: '21.56', text: '2Ø1"+4Ø3/4"' },
                    { value: '24.38', text: '4Ø1"+2Ø5/8"' },
                    { value: '25.5', text: '5Ø1"' },
                    { value: '26.08', text: '4Ø1"+2Ø3/4"' },
                    { value: '30.6', text: '6Ø1"' }
                ];
                // Crear y agregar las opciones al select
                opciones.forEach(opcion => {
                    let option = document.createElement('option');
                    option.value = opcion.value;
                    option.textContent = opcion.text;
                    select.appendChild(option);
                });

                // Agregar el select a la fila
                let tdSelect = document.createElement('td');
                tdSelect.appendChild(select);
                trSelect.appendChild(tdSelect);
            }

            // Agregar la fila de selects al template
            template += trSelect.outerHTML;
        }

        ///////////////////////////////////////
        //      CALCULOS DE ACEROS INTERNOS  //
        //////////////////////////////////////
        //negativo y positivo
        $(document).on('click', '#boton_verf', function () {
            let resultadosCanTip = new Array(tramos * 3).fill(0); // Inicializar con ceros

            // Limpiar resultados anteriores
            $('#calc_vigas tbody .mostrar').empty();

            // Obtener la cantidad de capas y tramos
            const numCapas = valorMaximo;
            const numTramos = tramos * 3;

            for (let i = 0; i < numCapas; i++) {
                for (let j = 0; j < numTramos; j++) {
                    // const cantidad_Acero = parseFloat(document.getElementById(`cantAcero${j}_capa${i}`).value) || 0;
                    const Tipo_Acero = parseFloat(document.getElementById(`tipoAcero${j}_capa${i}`).value) || 0;

                    // Calcular la multiplicación y sumarla al resultado correspondiente en resultadosCanTip
                    resultadosCanTip[j] += Tipo_Acero;
                }
            }

            // Redondear los resultados a 2 decimales
            resultadosCanTip = resultadosCanTip.map(resultado => Math.round(resultado * 100) / 100);

            //actualizarTabla(resultadosCanTip);
            actualizarTabla(resultadosCanTip, null);
        });
        $(document).on('click', '#boton_verfpos', function () {
            let resultadosCanTipos = new Array(tramos * 3).fill(0); // Inicializar con ceros

            // Limpiar resultados anteriores
            $('#calc_vigas tbody .mostrar').empty();

            // Obtener la cantidad de capas y tramos
            const numCapas = valorMaximopos;
            const numTramos = tramos * 3;

            for (let i = 0; i < numCapas; i++) {
                for (let j = 0; j < numTramos; j++) {
                    // const cantidad_Acero = parseFloat(document.getElementById(`cantAcero${j}_capa${i}`).value) || 0;
                    const Tipo_Acero = parseFloat(document.getElementById(`tipoAcero${j}_capapos${i}`).value) || 0;

                    // Calcular la multiplicación y sumarla al resultado correspondiente en resultadosCanTip
                    resultadosCanTipos[j] += Tipo_Acero;
                }
            }

            // Redondear los resultados a 2 decimales
            resultadosCanTipos = resultadosCanTipos.map(resultadopos => Math.round(resultadopos * 100) / 100);

            //actualizarTablapos(resultadosCanTipos);
            actualizarTabla(null, resultadosCanTipos);
        });

        function actualizarTabla(resultadosCanTip, resultadosCanTipos) {
            let mnnegativos = [];
            let mnpositivos = [];
            //NEGATIVOS
            //let mnnegativos = [];
            if (resultadosCanTip !== null) {
                mnnegativos = [];
                let as_realNegativos = [];
                let Verifnevativos = [];
                let ds = []; // Definir array ds
                for (let i = 0; i < tramos * 3; i++) {
                    switch (capasnegativas[i]) {
                        case 1:
                            d = alturas[i] - 6;
                            break;
                        case 2:
                            d = alturas[i] - 8;
                            break;
                        case 3:
                            d = alturas[i] - 10;
                            break;
                        case 4:
                            d = alturas[i] - 12;
                            break;
                        case 5:
                            d = alturas[i] - 14;
                            break;
                        case 6:
                            d = alturas[i] - 16;
                            break;
                        default:
                            d = alturas[i];
                    }
                    ds.push(d);
                    var as_realNegativo = (resultadosCanTip[i] * fy / (0.85 * fc * bases[i])).toFixed(2);
                    as_realNegativos.push(as_realNegativo);
                    let mnmnnegativo = (0.90 * (0.85 * fc * bases[i] * as_realNegativo) * (d - (as_realNegativo / 2)) / 100000).toFixed(2);
                    mnnegativos.push(mnmnnegativo); // Agregar mn al array mns

                    let Verifnevativo = "";
                    if (resultadosCanTip[i] < As_maxs[i] && resultadosCanTip[i] >= As_usars[i]) {
                        Verifnevativo = "CUMPLE";
                    } else {
                        Verifnevativo = "NO CUMPLE";
                    }

                    Verifnevativos.push(Verifnevativo);
                }
                $('#calc_vigas tbody .as_real').html(`
                    <td>As_real</td>
                    <td>Acero Real</td>
                    ${resultadosCanTip.map(resultado => `<td class='text-center'>${resultado}</td>`).join('')}
                `);
                $('#calc_vigas tbody .Momento').html(`
                    <td>Momento</td>
                    <td>ФMn</td>
                    ${mnnegativos.map(mnnegativo => `<td class='text-center'>${mnnegativo}</td>`).join('')}

                `);
                $('#calc_vigas tbody .verificacion').html(`
                    <td>Verifificacion</td>
                    <td>Verif.</td>
                    ${Verifnevativos.map(Verifnevativo => `<td class='text-center'>${Verifnevativo}</td>`).join('')}
                `);
            }
            //POSITIVOS
            //let mnpositivos = [];
            if (resultadosCanTipos !== null) {
                mnpositivos = [];
                let as_realPositivos = [];
                let Verifpositivos = [];
                let ds = []; // Definir array ds
                for (let i = 0; i < tramos * 3; i++) {
                    switch (capapositivos[i]) {
                        case 1:
                            d = alturas[i] - 6;
                            break;
                        case 2:
                            d = alturas[i] - 8;
                            break;
                        case 3:
                            d = alturas[i] - 10;
                            break;
                        case 4:
                            d = alturas[i] - 12;
                            break;
                        case 5:
                            d = alturas[i] - 14;
                            break;
                        case 6:
                            d = alturas[i] - 16;
                            break;
                        default:
                            d = alturas[i];
                    }
                    ds.push(d);
                    var as_realPositivo = (resultadosCanTipos[i] * fy / (0.85 * fc * bases[i])).toFixed(2);
                    as_realPositivos.push(as_realPositivo);
                    let mnpositivo = (parfres[i] * (0.85 * fc * bases[i] * as_realPositivo) * (d - (as_realPositivo / 2)) / 100000).toFixed(2);
                    mnpositivos.push(mnpositivo); // Agregar mn al array mns

                    let Verifpositivo = "";
                    if (resultadosCanTipos[i] < As_maxs[i] && resultadosCanTipos[i] >= As_usars[i]) {
                        Verifpositivo = "CUMPLE";
                    } else {
                        Verifpositivo = "NO CUMPLE";
                    }

                    Verifpositivos.push(Verifpositivo);
                }
                $('#calc_vigas tbody .as_realpos').html(`
                        <td>As_real</td>
                        <td>Acero Real</td>
                        ${resultadosCanTipos.map(resultado => `<td class='text-center'>${resultado}</td>`).join('')}
                `);
                $('#calc_vigas tbody .Momentopos').html(`
                        <td>Momento</td>
                        <td>ФMn</td>
                        ${mnpositivos.map(mnpositivo => `<td class='text-center'>${mnpositivo}</td>`).join('')}

                `);
                $('#calc_vigas tbody .verificacionpos').html(`
                        <td>Verifificacion</td>
                        <td>Verif.</td>
                        ${Verifpositivos.map(Verifpositivo => `<td class='text-center'>${Verifpositivo}</td>`).join('')}
                `);
            }
            //DISEÑO POR CAPACIDAD
            let acwcs = [];
            let vc1s = [];
            let vcfr1s = [];
            let Vs1s = [];
            let Espacios1 = [];
            let Lconfi1s = [];
            let usarS1s = [];
            let estribos1s = [];
            let estribado1s = [];
            for (let i = 0; i < tramos * 3; i++) {
                var acwc = (Math.max(...mnnegativos ?? [0]) / 0.9).toFixed(2);
                acwcs.push(acwc);
                var vc1 = ((mnpositivos ? mnpositivos[Math.floor((mnpositivos.length || 1) / 2)] : 0) / 0.9).toFixed(2);
                vc1s.push(vc1);
            }
            $('#calc_vigas tbody .Mn_Izq').html(`
                <td>-</td>
                <td>Mn Izq(Tonf-m)</td>
                ${acwcs.map(acwc => `<td class='text-center'>${acwc} cm<sup>2</sup></td>`).join('')}
            `);
            $('#calc_vigas tbody .Mn_Der').html(`
                <td>-</td>
                <td>Mn Der(Tonf-m)</td>
                ${vc1s.map(vc1 => `<td class='text-center'>${vc1} cm<sup>2</sup></td>`).join('')}
            `);
            //DISEÑO POR DEFLEXION
            let ess = [];
            let ecs = [];
            let ns = [];
            let Lcrs = [];
            let Lcrs1s = [];
            let lefs = [];
            let zms = [];
            let zls = [];
            let azls = [];
            let dds = [];
            let amedias = [];
            let amaxs = [];
            let AzlVs = [];
            let VCVs = [];
            let Aztvs = [];
            let ZTs = [];
            for (let i = 0; i < tramos * 3; i++) {
                var es = 2 * (Math.pow(10, 6)).toFixed(2);
                ess.push(es);
                var ec = (15000 * Math.sqrt(fc)).toFixed(2);
                ecs.push(ec);
                var n = (es / ec).toFixed(2);
                ns.push(n);
                // //verificar icrpos
                var c1 = bases[i];
                var ccuadrado = 2 * ns[i] * resultadosCanTip[i];
                var e = (-2 * ns[i] * resultadosCanTip[i] * ds[i]);
                var ccomp = (-ccuadrado + Math.sqrt(Math.pow(ccuadrado, 2) - (4 * c1 * e))) / (2 * c1);
                var ccomp1 = (-ccuadrado - Math.sqrt(Math.pow(ccuadrado, 2) - (4 * c1 * e))) / (2 * c1);

                var lcr = (((bases[i] * Math.pow(Math.max(ccomp, ccomp1), 3)) / 3) + (ns[i] * resultadosCanTip[i] * Math.pow((ds[i] - Math.max(ccomp, ccomp1)), 2)) + ((ns[i] - 1) * resultadosCanTip[i] * Math.pow((Math.max(ccomp, ccomp1) - 6), 2))).toFixed(2);
                Lcrs.push(lcr);
                //verificar icrnegativ
                var c1neg = bases[i];
                var ccuadradoneg = 2 * ns[i] * resultadosCanTip[i];
                var eneg = (-2 * ns[i] * resultadosCanTip[i] * ds[i]);
                var ccompneg = (-ccuadradoneg + Math.sqrt(Math.pow(ccuadradoneg, 2) - (4 * c1neg * eneg))) / (2 * c1neg);
                var ccomp1neg = (-ccuadradoneg - Math.sqrt(Math.pow(ccuadradoneg, 2) - (4 * c1neg * eneg))) / (2 * c1neg);

                var lcr1 = (((bases[i] * Math.pow(Math.max(ccompneg, ccomp1neg), 3)) / 3) + (ns[i] * resultadosCanTip[i] * Math.pow((ds[i] - Math.max(ccompneg, ccomp1neg)), 2)) + ((ns[i] - 1) * resultadosCanTip[i] * Math.pow((Math.max(ccompneg, ccomp1neg) - 6), 2))).toFixed(2);
                Lcrs1s.push(lcr1);

                var lef = (((parseFloat(lcr1) + parseFloat(lcr1)) + 2 * parseFloat(lcr)) / 4).toFixed(2);
                lefs.push(lef);

                var zmRounded = (5 * Math.pow(luzLibres * 100, 2)) / (48 * ecs[i] * lefs[i]) * ((muCMsPositivos[1] - 0.1 * (muCMs[0] + muCMs[2])) * 100);
                let zm = zmRounded.toFixed(3);
                zms.push(zm);

                var zl = ((5 * Math.pow(luzLibres * 100, 2)) / (48 * ecs[i] * lefs[i]) * (muCvsPositivos[i] - 0.1 * (muCvs[0] + muCvs[2]) * 100)).toFixed(3);;
                zls.push(zl)

                var azl = (0.3 * zls[i]);
                azls.push(azl);

                //falta corregir λΔ desde esa linea hacia abajo
                var pdifer = resultadosCanTip[i] / (bases[i] * ds[i]);
                var edifer = 2;
                var dd = (edifer / (1 + (50 * pdifer))).toFixed(3);
                dds.push(dd);

                var amedia = (parseFloat(zms[i]) * (1 + parseFloat(dds[i])) + parseFloat(azls[i]) * (1 + parseFloat(dds[i]))).toFixed(3);
                amedias.push(amedia);

                var amax = (parseFloat(zm) + parseFloat(zl) + parseFloat(dd) * parseFloat(zm) + parseFloat(zl) * parseFloat(azl)).toFixed(2);
                amaxs.push(amax)

                var AzlV = ((luzLibres * 100) / 360).toFixed(2);
                AzlVs.push(AzlV);

                var VCV = "";
                if (zl < AzlV) {
                    VCV = "CUMPLE";
                } else {
                    VCV = "NO CUMPLE";
                }
                VCVs.push(VCV)

                var Aztv = ((luzLibres * 100) / 480).toFixed(2);
                Aztvs.push(Aztv);

                var azt = dd * zm + dd * azl + zl;
                var ZT = "";
                if (azt < AzlV) {
                    ZT = "CUMPLE";
                } else {
                    ZT = "NO CUMPLE";
                }
                ZTs.push(ZT);
            }

            $('#calc_vigas tbody .esdeflex').html(`
                <td>-</td>
                <td>Es</td>
                ${ess.map(es => `<td class='text-center'>${es} Kg/cm<sup>2</sup></td>`).join('')}
            `);
            $('#calc_vigas tbody .ecdeflex').html(`
                <td>-</td>
                <td>Ec</td>
                ${ecs.map(ec => `<td class='text-center'>${ec} Kg/cm<sup>2</sup></td>`).join('')}
            `);
            $('#calc_vigas tbody .nsdeflex').html(`
                <td>-</td>
                <td>Ns</td>
                ${ns.map(n => `<td class='text-center'>${n} </td>`).join('')}
            `);
            $('#calc_vigas tbody .Icrdeflex').html(`
                <td>-</td>
                <td>Icr(+)</td>
                ${Lcrs.map(Lcr => `<td class='text-center'>${Lcr} cm<sup>4</sup></td>`).join('')}
            `);
            $('#calc_vigas tbody .Icnegadeflex').html(`
                <td>-</td>
                <td>Icr(-)</td>
                ${Lcrs1s.map(Lcrs1 => `<td class='text-center'>${Lcrs1} cm<sup>4</sup></td>`).join('')}
            `);
            $('#calc_vigas tbody .lefdeflex').html(`
                <td>-</td>
                <td>Lef</td>
                ${lefs.map(lef => `<td class='text-center'>${lef} cm<sup>4</sup></td>`).join('')}
            `);
            $('#calc_vigas tbody .azmdeflex').html(`
                <td>-</td>
                <td>Δzm</td>
                ${zms.map(zm => `<td class='text-center'>${zm} cm</td>`).join('')}
            `);
            $('#calc_vigas tbody .zlsdeflex').html(`
                <td>-</td>
                <td>ΔzL</td>
                ${zls.map(zl => `<td class='text-center'>${zl} cm</td>`).join('')}
            `);
            $('#calc_vigas tbody .azdeflex').html(`
                <td>-</td>
                <td>Δz30%</td>
                ${azls.map(azl => `<td class='text-center'>${azl} cm</td>`).join('')}
            `);
            $('#calc_vigas tbody .deflexdifer').html(`
                <td>-</td>
                <td>λΔ</td>
                ${dds.map(dd => `<td class='text-center'>${dd} cm</td>`).join('')}
            `);
            $('#calc_vigas tbody .amediadeflex').html(`
                <td>-</td>
                <td>Δmedia </td>
                ${amedias.map(amedia => `<td class='text-center'>${amedia} cm</td>`).join('')}
            `);
            $('#calc_vigas tbody .amaxdeflex').html(`
                <td>-</td>
                <td>ΔMáx</td>
                ${amaxs.map(amax => `<td class='text-center'>${amax} cm</td>`).join('')}
            `);
            $('#calc_vigas tbody .azldeflex').html(`
                <td>-</td>
                <td>ΔZL</td>
                ${AzlVs.map(AzlV => `<td class='text-center'>${AzlV}</td>`).join('')}
            `);
            $('#calc_vigas tbody .priverifdeflex').html(`
                <td>-</td>
                <td>VERIFICACION</td>
                ${VCVs.map(VCV => `<td class='text-center'>${VCV}</td>`).join('')}
            `);
            $('#calc_vigas tbody .aztdeflex').html(`
                <td>-</td>
                <td>ΔZT</td>
                ${Aztvs.map(Aztv => `<td class='text-center'>${Aztv}</td>`).join('')}
            `);
            $('#calc_vigas tbody .segverifdeflex').html(`
                <td>-</td>
                <td>VERIFICACION</td>
                ${ZTs.map(ZT => `<td class='text-center'>${ZT}</td>`).join('')}
            `);

        }

        template += `
                <tr class="as_real"></tr>
                <tr class="Momento"></tr>
                <tr class="verificacion"></tr>
               
            </tbody>`;
        //tabla positivo
        let musdivpos = [];
        let muspos = [];
        let dpos = [];
        let apos = [];
        let Asspos = [];
        let As_minpos = [];
        let As_maxpos = [];
        let As_balpos = [];
        let As_usarpos = [];
        for (let i = 0; i < tramos * 3; i++) {
            var musdivpo = (-momentosUltimos[i] / 3).toFixed(2);
            musdivpos.push(musdivpo);
            //Mu (-) usar
            var muspo = 0;
            if (momentosUltimosPositivos[i] > musdivpos[i]) {
                muspo = momentosUltimosPositivos[i];
            } else {
                muspo = musdivpos[i];
            }
            muspos.push(muspo);

            var dpo = 0;
            switch (capapositivos[i]) {
                case 1:
                    dpo = alturas[i] - 6;
                    break;
                case 2:
                    dpo = alturas[i] - 8;
                    break;
                case 3:
                    dpo = alturas[i] - 10;
                    break;
                case 4:
                    dpo = alturas[i] - 12;
                    break;
                case 5:
                    dpo = alturas[i] - 14;
                    break;
                case 6:
                    dpo = alturas[i] - 16;
                    break;
            }
            dpos.push(dpo);

            var apo = (dpos[i] - Math.sqrt(Math.pow(dpos[i], 2) - 2 * Math.abs(muspos[i] * Math.pow(10, 5)) / (0.90 * 0.85 * fc * bases[i]))).toFixed(2);
            apos.push(apo);

            var Asspo = ((0.85 * fc * bases[i] * apos[i]) / fy).toFixed(2);
            Asspos.push(Asspo)

            var As_minpo = (Math.max(0.7 * Math.sqrt(fc) / fy * bases[i] * dpos[i], 14 * bases[i] * ds[i] / fy)).toFixed(2);
            As_minpos.push(As_minpo)

            var As_balpo = ((0.85 * parfres[i] * fc / fy * (0.003 / (0.003 + 0.0021))) * bases[i] * dpos[i]).toFixed(2);
            As_balpos.push(As_balpo)

            var As_maxpo = (0.75 * (0.85 * parfres[i] * fc / fy * (0.003 / (0.003 + 0.0021))) * bases[i] * dpos[i]).toFixed(2);
            As_maxpos.push(As_maxpo)

            let As_usarpo = 0;
            if (parseFloat(Asspo) < parseFloat(As_minpo)) {
                As_usarpo = parseFloat(As_minpo);
            } else if (parseFloat(Asspo) > parseFloat(As_minpo) && parseFloat(Asspo) < parseFloat(As_maxpo)) {
                As_usarpo = parseFloat(Asspo);
            } else {
                As_usarpo = parseFloat(As_maxpo);
            }
            As_usarpos.push(As_usarpo)
        }
        template += `<thead>
                <tr>
                    <th scope="col" class="sub_sub_encabezados">Parte positivo</th>
                </tr>
            </thead>
            <tbody class="datos_relleno">
                <tr>
                    <td></td>
                    <td>Mu(-)=1/3Mu(+)(Tnf.m)</td>
                    ${musdivpos.map(musdivpo => `<td class='text-center'>${musdivpo} Tonf.m</td>`).join('')}
                </tr>
                <tr>
                    <td>-</td>
                    <td>Mu (-) usar (Tonf.m)</td>
                    ${muspos.map(muspo => `<td class='text-center'>${muspo} Tonf.m</td>`).join('')}
                </tr>
                <tr>
                    <td>Peralte efectivo en "cm"</td>
                    <td>d</td>
                    ${dpos.map(dpo => `<td class='text-center'>${dpo} cm</td>`).join('')}
                </tr>
                <tr>
                    <td>Altura del bloque comprimido en "cm"</td>
                    <td>a</td>
                    ${apos.map(apo => `<td class='text-center'>${apo} cm</td>`).join('')}
                </tr>
                <tr>
                    <td>Refuerzo calculado en "cm2"</td>
                    <td>As</td>
                    ${Asspos.map(Asspo => `<td class='text-center'>${Asspo} cm<sup>2</sup></td>`).join('')}
                </tr>
                <tr>
                    <td>Refuerzo mínimo en "cm2"</td>
                    <td>As_min</td>
                    ${As_minpos.map(As_minpo => `<td class='text-center'>${As_minpo} cm<sup>2</sup></td>`).join('')}
                </tr>
                <tr>
                    <td>Area de acero balanceado</td>
                    <td>As Balanceado</td>
                    ${As_balpos.map(As_balpo => `<td class='text-center'>${As_balpo} cm<sup>2</sup></td>`).join('')}
                </tr>
                <tr>
                    <td>Refuerzo máximo en "cm2"</td>
                    <td>As_máx 75%Asb</td>
                    ${As_maxpos.map(As_maxpo => `<td class='text-center'>${As_maxpo}cm<sup>2</sup></td>`).join('')}
                </tr>
                <tr>
                    <td>Acero a Usar</td>
                    <td>As_usar</td>
                    ${As_usarpos.map(As_usarpo => `<td class='text-center'>${As_usarpo}cm<sup>2<sup></td>`).join('')}
                </tr>
                `;
        ///////////////////////////////////////
        //      verificacion positiva       //
        //////////////////////////////////////
        // Crear filas para botones, inputs y selects para cada tramo
        let trBotonespos = document.createElement('tr');
        // Crear los botones para cada tramo
        let tdBotonpos = document.createElement('td');
        let botonpos = document.createElement('button');
        botonpos.type = 'button';
        botonpos.className = 'btn btn-sm btn-primary';
        botonpos.textContent = 'VERIFICAR';
        botonpos.name = 'boton_verfpos';
        botonpos.id = 'boton_verfpos';
        tdBotonpos.appendChild(botonpos);
        trBotonespos.appendChild(tdBotonpos);

        // Agregar la fila de botones al template
        template += trBotonespos.outerHTML;

        // Encontrar el valor máximo en el array capaspositivas
        const valorMaximopos = Math.max(...capapositivos);

        for (let i = 0; i < valorMaximopos; i++) {
            let trSelectpos = document.createElement('tr');

            // Agregar la etiqueta "Tipo de Acero"
            let tdTipoAceroPos = document.createElement('td');
            tdTipoAceroPos.textContent = 'Tipo de Acero mm';
            trSelectpos.appendChild(tdTipoAceroPos);

            // Agregar la etiqueta "Diámetro mm"
            let tdDiametropos = document.createElement('td');
            tdDiametropos.textContent = `Capa ${i + 1}`;
            trSelectpos.appendChild(tdDiametropos);

            // Crear los selects para cada tramo
            for (let j = 0; j < tramos * 3; j++) {
                // Crear un nuevo select
                let selectpos = document.createElement('select');
                selectpos.className = 'form-control form-control-sm';
                selectpos.name = `tipoAcero${j}_capapos${i}`;
                selectpos.id = `tipoAcero${j}_capapos${i}`;
                // Definir las opciones del select
                let opciones = [
                    { value: '0', text: 'Ø 0"' },
                    { value: '0.283', text: '6mm' },
                    { value: '0.503', text: '8mm cm²' },
                    { value: '0.713', text: 'Ø 3/8" cm²' },
                    { value: '1.131', text: '12mm cm²' },
                    { value: '1.267', text: 'Ø 1/2" cm²' },
                    { value: '1.979', text: 'Ø 5/8" cm²' },
                    { value: '2.850', text: 'Ø 3/4" cm²' },
                    { value: '5.067', text: 'Ø 1" cm²' },
                    { value: '2.58', text: '2Ø1/2"' },
                    { value: '3.87', text: '3Ø1/2"' },
                    { value: '3.98', text: '2Ø5/8"' },
                    { value: '5.16', text: '4Ø1/2"' },
                    { value: '5.27', text: '2Ø5/8"+1Ø1/2"' },
                    { value: '5.68', text: '2Ø3/4"' },
                    { value: '5.97', text: '3Ø5/8"' },
                    { value: '6.45', text: '5Ø1/2"' },
                    { value: '6.56', text: '2Ø5/8"+2Ø1/2"' },
                    { value: '6.97', text: '2Ø3/4"+1Ø1/2"' },
                    { value: '7.67', text: '2Ø3/4"+1Ø5/8"' },
                    { value: '7.74', text: '6Ø1/2"' },
                    { value: '7.85', text: '2Ø5/8"+3Ø1/2"' },
                    { value: '7.96', text: '4Ø5/8"' },
                    { value: '8.26', text: '2Ø3/4"+2Ø1/2"' },
                    { value: '8.52', text: '3Ø3/4"' },
                    { value: '8.55', text: '3Ø5/8"+2Ø1/2"' },
                    { value: '9.55', text: '2Ø3/4"+3Ø1/2"' },
                    { value: '9.95', text: '5Ø5/8"' },
                    { value: '9.66', text: '2Ø3/4"+2Ø5/8"' },
                    { value: '10.2', text: '2Ø1"' },
                    { value: '10.54', text: '4Ø5/8"+2Ø1/2"' },
                    { value: '10.84', text: '2Ø3/4"+4Ø1/2"' },
                    { value: '11.1', text: '3Ø3/4"+2Ø1/2"' },
                    { value: '11.36', text: '4Ø3/4"' },
                    { value: '11.65', text: '2Ø3/4"+3Ø5/8"' },
                    { value: '11.94', text: '6Ø5/8"' },
                    { value: '12.19', text: '2Ø1"+1Ø5/8"' },
                    { value: '12.5', text: '3Ø3/4"+2Ø5/8"' },
                    { value: '13.04', text: '2Ø1"+1Ø3/4"' },
                    { value: '13.64', text: '2Ø3/4"+4Ø5/8"' },
                    { value: '13.94', text: '4Ø3/4"+2Ø1/2"' },
                    { value: '14.18', text: '2Ø1"+2Ø5/8"' },
                    { value: '14.2', text: '5Ø3/4"' },
                    { value: '15.3', text: '3Ø1"' },
                    { value: '15.34', text: '4Ø3/4"+2Ø5/8"' },
                    { value: '15.88', text: '2Ø1"+2Ø3/4"' },
                    { value: '16.17', text: '2Ø1"+3Ø5/8"' },
                    { value: '17.04', text: '6Ø3/4"' },
                    { value: '18.16', text: '2Ø1"+4Ø5/8"' },
                    { value: '18.72', text: '2Ø1"+3Ø3/4"' },
                    { value: '19.28', text: '3Ø1"+2Ø5/8"' },
                    { value: '20.4', text: '4Ø1"' },
                    { value: '20.98', text: '3Ø1"+2Ø3/4"' },
                    { value: '21.56', text: '2Ø1"+4Ø3/4"' },
                    { value: '24.38', text: '4Ø1"+2Ø5/8"' },
                    { value: '25.5', text: '5Ø1"' },
                    { value: '26.08', text: '4Ø1"+2Ø3/4"' },
                    { value: '30.6', text: '6Ø1"' }
                ];
                opciones.forEach(opcion => {
                    let option = document.createElement('option');
                    option.value = opcion.value;
                    option.textContent = opcion.text;
                    selectpos.appendChild(option);
                });

                // Agregar el select a la fila
                let tdSelectpos = document.createElement('td');
                tdSelectpos.appendChild(selectpos);
                trSelectpos.appendChild(tdSelectpos);
            }

            // Agregar la fila de selects al template
            template += trSelectpos.outerHTML;
        }

        //verificacion positiva
        template += `
                <tr class="as_realpos"></tr>
                <tr class="Momentopos"></tr>
                <tr class="verificacionpos"></tr>
               
            </tbody>`;
        //================================================================================//
        //            Segunda Tabla - DISEÑO POR CORTANTE                                 //
        //              Calcular el número total de columnas requeridas                   //
        //================================================================================//
        let acws = [];
        let vcs = [];
        let vcfrs = [];
        let Vss = [];
        let Espacioss = [];
        let peds = [];
        let Lconfis = [];
        let usarSs = [];
        let estriboss = [];
        let estribados = [];
        for (let i = 0; i < tramos * 3; i++) {
            var acw = bases[i] * ds[i];
            acws.push(acw);
            var vc = (0.53 * Math.sqrt(fc) * (acws[i] / 1000)).toFixed(2);
            vcs.push(vc);
            var vcfr = (0.85 * vcs[i]).toFixed(2);
            vcfrs.push(vcfr)
            var Vs = ((vus[i] / 0.85) - vcs[i]).toFixed(2);
            Vss.push(Vs);
            var Espacios = Math.ceil(0.713 * fy * ds[i] / (Vss[i] * 1000) * 2);
            Espacioss.push(Espacios);
            var ped = dpos[i] / 4;
            peds.push(ped);
            var Lconfi = 2 * alturas[i];
            Lconfis.push(Lconfi)
            //se va añadir mas datos a cortante
            var usarS = 0;
            usarSs.push(usarS);
            var estribos = 0;
            estriboss.push(estribos);
            var estribado = 0;
            estribados.push(estribado);
        }
        template += `
        <thead>
            <tr class="sub_encabezados">
                <th scope="col" class="tab_encabezados">3.- Diseño de cortante</th>
                <th scope="col"></th>
                ${etiquetasTHString}
            </tr>
        </thead>
        <tbody class="datos_relleno">
            <tr>
                <td>Area de corte</td>
                <td>Acw</td>
                ${acws.map(acw => `<td class='text-center'>${acw} cm<sup>2</sup></td>`).join('')}
            </tr>
            <tr>
                <td>Cortante nominal proporcionada por el concreto</td>
                <td>Vc</td>
                ${vcs.map(vc => `<td class='text-center'>${vc} Tonf</td>`).join('')}
            </tr>
            <tr>
                <td></td>
                <td>Ø Vc</td>
                ${vcfrs.map(vcfr => `<td class='text-center'>${vcfr}Tonf</td>`).join('')}
            </tr>
            <tr>
                <td>Cortante nominal proporcionada por el refuerzo</td>
                <td>Vs</td>
                ${Vss.map(Vs => `<td class='text-center'>${Vs} Tonf</td>`).join('')}
            </tr>
            <tr>
                <td>Espaciamiento requerido</td>
                <td>S</td>
                ${Espacioss.map(Espacios => `<td class='text-center'>${Espacios} cm</td>`).join('')}
            </tr>
            <tr>
                <td>Peralte efectivo dividido entre 4</td>
                <td>S=d/4</td>
                ${peds.map(ped => `<td class='text-center'>${ped} cm</td>`).join('')}
            </tr>
            <tr>
                <td></td>
                <td>Lconf</td>
                ${Lconfis.map(Lconfi => `<td class='text-center'>${Lconfi} cm</td>`).join('')}
            </tr>
            <tr>
                <td></td>
                <td>Usar</td>
                ${usarSs.map(usarS => `<td class='text-center'>${usarS} cm</td>`).join('')}
            </tr>
            <tr>
                <td></td>
                <td># estribos zona conf.</td>
                ${estriboss.map(estribos => `<td class='text-center'>${estribos}</td>`).join('')}
            </tr>
            <tr>
                <td></td>
                <td>Estribado</td>
                ${estribados.map(estribado => `<td class='text-center'>${estribados} </td>`).join('')}
            </tr>
        </tbody>`;
        //================================================================================//
        //            Segunda Tabla - DISEÑO POR CAPACIDAD                                 //
        //              Calcular el número total de columnas requeridas                    //
        //=================================================================================//

        template += `
        <thead>
            <tr class="sub_encabezados">
                <th scope="col" class="tab_encabezados">4.- Diseño por capacidad</th>
                <th scope="col"></th>
                ${etiquetasTHString}
            </tr>
        </thead>
        <tbody class="datos_relleno">
            <tr class="Mn_Izq"></tr>
            <tr class="Mn_Der"></tr>
            <tr>
                <td></td>
                <td>Vu(CAPACIDAD)(Tonf)</td>
                ${musdivpos.map(musdivpo => `<td class='text-center'>${musdivpo} Tonf</td>`).join('')}
            </tr>
            <tr>
                <td></td>
                <td>Vs CAPACIDAD (Tonf)</td>
                ${musdivpos.map(musdivpo => `<td class='text-center'>${musdivpo} Tonf</td>`).join('')}
            </tr>
            <tr>
                <td>Espaciamiento requerido</td>
                <td>S(cm)</td>
                ${musdivpos.map(musdivpo => `<td class='text-center'>${musdivpo} cm</td>`).join('')}
            </tr>
            <tr>
                <td>Peralte efectivo dividido entre 4</td>
                <td>S=d/4 (cm)</td>
                ${musdivpos.map(musdivpo => `<td class='text-center'>${musdivpo} cm</td>`).join('')}
            </tr>
            <tr>
                <td></td>
                <td>Lconf</td>
                ${musdivpos.map(musdivpo => `<td class='text-center'>${musdivpo} cm</td>`).join('')}
            </tr>
            <tr>
                <td></td>
                <td>Usar</td>
                ${musdivpos.map(musdivpo => `<td class='text-center'>${musdivpo} cm</td>`).join('')}
            </tr>
            <tr>
                <td></td>
                <td># estribos zona conf.</td>
                ${musdivpos.map(musdivpo => `<td class='text-center'>${musdivpo} </td>`).join('')}
            </tr>
            <tr>
                <td></td>
                <td>Estribado</td>
                ${musdivpos.map(musdivpo => `<td class='text-center'>${musdivpo}</td>`).join('')}
            </tr>
        </tbody>`;
        //================================================================================//
        //            Segunda Tabla - DISEÑO POR DEFLEXION                                //
        //              Calcular el número total de columnas requeridas                   //
        //================================================================================//

        template += `
        <thead>
            <tr class="sub_encabezados">
                <th scope="col" class="tab_encabezados">5.- Diseño por deflexion</th>
                <th scope="col"></th>
                ${etiquetasTHString}
            </tr>
        </thead>
        <tbody class="datos_relleno">
        
            <tr class="esdeflex"></tr>
            <tr class="ecdeflex"></tr>
            <tr class="nsdeflex"></tr>
            <tr class="Icrdeflex"></tr>
            <tr class="Icnegadeflex"></tr>
            <tr class="lefdeflex"></tr>
            <tr class="azmdeflex"></tr>
            <tr class="zlsdeflex"></tr>
            <tr class="azdeflex"></tr>
            //por verificar
            <tr class="deflexdifer"></tr>
            <tr class="amediadeflex"></tr>
            <tr class="amaxdeflex"></tr>
            <tr class="azldeflex"></tr>
            <tr class="priverifdeflex"></tr>
            <tr class="aztdeflex"></tr>
            <tr class="segverifdeflex"></tr>
        </tbody>
        </table>`;

        // Insertar el template generado en el elemento con el id 'calc_vigas'
        document.getElementById('calc_vigas').innerHTML = template;

        // $(document).on('click', '#boton_print', function () {
        //     const vigas = new window.jspdf.jsPDF();
        //     // Usar autoTable para convertir la tabla a PDF
        //     vigas.autoTable({ html: '#vigaspdf' });

        //     // Guardar el PDF
        //     vigas.save('tabla.pdf');
        // })
    });

})

// document.getElementById('FlexionViga').addEventListener('submit', function (event) {
//     event.preventDefault();

//     // Obtener los datos del primer formulario
//     const formData1 = new FormData(this);

//     // Enviar los datos al servidor
//     fetch('Controladores/DesingVigas.php', {
//         method: 'POST',
//         body: formData1
//     })
//         .then(response => response.text())
//         .then(data => {
//             const resultadosContainer = document.getElementById('ObtenerResultados');
//             resultadosContainer.innerHTML = data;
//         })
//         .catch(error => {
//             console.error('Error en la solicitud POST del primer formulario', error);
//         });
// });